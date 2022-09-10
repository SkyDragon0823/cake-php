<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

/**
 * Intervenciones Controller
 *
 * @property \App\Model\Table\IntervencionesTable $Intervenciones
 *
 * @method \App\Model\Entity\Intervencione[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class IntervencionesController extends AppController
{

    public function beforeFilter(Event $event)
    {
        $current_user = $this->Auth->user();
        $userType = $this->Auth->user('tipoUsuario');
        parent::beforeFilter($event);
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index($estatus = null)
    {
        $current_user = $this->Auth->user();
        $userType = $this->Auth->user('tipoUsuario');
        $userId = $this->Auth->user('id');

        $clientes = $this->Intervenciones->Tickets->Clientes->find('list');
        $this->paginate = [
            'contain' => ['Estatusticket','Tickets']
        ];

        if($estatus != null) {
            $intervenciones = $this->paginate($this->Intervenciones->find()->Where(['Intervenciones.estatus' => $estatus]));
        } else {

            switch ($userType) {
                case 1:
                    $intervenciones = $this->paginate($this->Intervenciones);
                    break;
                case 2:
                    $intervenciones = $this->paginate($this->Intervenciones);
                    break;
                case 3:
                    $intervenciones = $this->paginate($this->Intervenciones->find()->where(['Intervenciones.estatus' => 2,'Intervenciones.idTecnicoLider' => $userId]));
                    break;
                case 5:
                    $intervenciones = $this->paginate($this->Intervenciones->find()->where(['Intervenciones.estatus' => 3])->order(['Intervenciones.id' => 'DESC']));
                    break;
                default:
                    break;
            }

        }

        $this->set(compact('intervenciones','clientes'));
        
    }

    /**
     * View method
     *
     * @param string|null $id Intervencione id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $userType = $this->Auth->user('tipoUsuario');
        
        $this->loadModel('Usuarios');
        $this->loadModel('Clientes');
        $this->loadModel('Sucursales');
        $this->loadModel('Serviciosticket');

        $infoTicketInter = $this->Intervenciones->find()->where(['id' => $id]);
        foreach ($infoTicketInter as $infoTicketInter) {
            $idTicket = $infoTicketInter->idTicket;
        }

        $infoTicket = $this->Intervenciones->Tickets->find()->where(['id' => $idTicket]);
        foreach ($infoTicket as $infoTicket) {
            $ticketIdCliente = $infoTicket->idCliente;
            $ticketIdSucursal = $infoTicket->idSucursal;
            $ticketIdCoordinador = $infoTicket->idCoordinador;
        }

        $serviciosAsig = $this->Serviciosticket->find()->where(['idIntervencion' => $id])->contain(['Tiposervicio','Tabulador']);
        $ticketCliente = $this->Clientes->find('list')->where(['id' => $ticketIdCliente]);
        $ticketSucursal = $this->Sucursales->find()->where(['id' => $ticketIdSucursal]);
        $ticketCoordinador = $this->Usuarios->find()->where(['id' => $ticketIdCoordinador]);


        $this->set(compact('ticketCoordinador','ticketCliente','ticketSucursal','serviciosAsig'));


        $intervencione = $this->Intervenciones->get($id, [
            'contain' => ['Vehiculos','Estatusticket','Usuarios']
        ]);

        $this->set('intervencione', $intervencione);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add($idTicket = null)
    {
        $current_user_id = $this->Auth->user('id');
        $this->loadModel('Tecnicos');
        $this->loadModel('Vehiculos');
        $this->loadModel('Slas');
        $this->loadModel('Tickets');

        $tecnicos = $this->Tecnicos->find('list')->where(['subcontrata' => 0]);
        $vehiculos = $this->Vehiculos->find('list');
        $slas = $this->Slas->find('list');
        $ticketsCount = $this->Intervenciones->Tickets->find()->count();
        $tLider = $this->Tickets->Usuarios->find('list')->where(['tipoUsuario' => 3]);
        $tSubcontrata = $this->Tecnicos->find('list')->where(['subcontrata' => 1])->order(['nombre' => 'ASC']);

        if($ticketsCount == 0){
            $this->set(compact('ticketsCount'));
        } else {

            if($idTicket != ''){
                $ticket = $this->Intervenciones->Tickets->find()->where(['id' => $idTicket]);
                $this->set(compact('ticket','tLider','tSubcontrata'));
            }else{
                $tickets = $this->Intervenciones->Tickets->find('list');
                $this->set(compact('tickets','tLider','tSubcontrata'));
            }
    
            $intervencione = $this->Intervenciones->newEntity();
            if ($this->request->is('post')) {
                $intervencione = $this->Intervenciones->patchEntity($intervencione, $this->request->getData(),['associated' => [],'accessibleFields' => ['idTecnico' => true]]);
                if ($inter_model = $this->Intervenciones->save($intervencione)) {
                    $idInter = $inter_model->id;
                    $tecnicoCuadr = $this->request->getData('idTecnico');
                        if($tecnicoCuadr != '' && $idInter != '') {
                            foreach ($tecnicoCuadr as $tecnicoCuadr) {
                                if ($tecnicoCuadr != 0) {
                                    $cuadrilla = $this->Tickets->Cuadrilla->newEntity();
                                    $cuadrilla->idTecnico = $tecnicoCuadr;
                                    $cuadrilla->idIntervencion = $idInter;
                                    $this->Tickets->Cuadrilla->save($cuadrilla);
                                }
                            }
                        }

                    $comentario = $this->Intervenciones->Tickets->Comentarios->newEntity();
                    $comentario->idTicket = $idTicket;
                    $comentario->autor = $current_user_id;
                    $comentario->titulo = 'Nueva intervención generada';
                    $this->Intervenciones->Tickets->Comentarios->save($comentario);

                    $this->Flash->success(__('Interveción guardada correctamente.'));
    
                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('La intervención no se puede guardar. Por favor, intenta de nuevo.'));
            }
            $this->set(compact('intervencione','tecnicos','ticketsCount','vehiculos','slas'));
        }
    }

    /**
     * Edit method
     *
     * @param string|null $id Intervencione id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->loadModel('Vehiculos');
        $this->loadModel('Slas');
        $this->loadModel('Tecnicos');

        $infoTicketInter = $this->Intervenciones->find()->where(['id' => $id]);
        foreach ($infoTicketInter as $infoTicketInter) {
            $idTicket = $infoTicketInter->idTicket;
        }

        $infoTicket = $this->Intervenciones->Tickets->find()->where(['id' => $idTicket]);
        foreach ($infoTicket as $infoTicket) {
            $ticketIdCliente = $infoTicket->idCliente;
        }

        $getDatatab = $this->Intervenciones->Tickets->Tabulador->find()->where(['cliente' => $ticketIdCliente])->count();

        if($getDatatab == null || $getDatatab == '' || $getDatatab == 0) {
            $tabulador = $this->Intervenciones->Tickets->Tabulador->find('list');
        } else {
            $tabulador = $this->Intervenciones->Tickets->Tabulador->find('list')->where(['cliente' => $ticketIdCliente]);
        }

        // $serviciosTicket = $this->Intervenciones->Tickets->Serviciosticket->find()->where(['idIntervencion' => $id])->contain(['Tiposervicio','Tabulador']);
        $tecnicos = $this->Tecnicos->find('list');
        $vehiculos = $this->Vehiculos->find('list');
        $tLider = $this->Intervenciones->Tickets->Usuarios->find('list')->where(['tipoUsuario' => 3]);
        $slas = $this->Slas->find('list');

        $this->set(compact('estatus'));
        $intervencione = $this->Intervenciones->get($id, [
            'contain' => ['Tickets','EstatusTicket']
        ]);

        switch ($intervencione->estatus) {
            case 1:
                $filtro = ['Activo','En proceso','Cancelado'];
                $estatus = $this->Intervenciones->Estatusticket->find('list')->where(['estatus IN' => $filtro]);
                break;
            case 2:
                $filtro = ['En proceso','Pendiente pago','Cancelado'];
                $estatus = $this->Intervenciones->Estatusticket->find('list')->where(['estatus IN' => $filtro]);
                break;
            case 3:
                $filtro = ['Pendiente pago','Pagado'];
                $estatus = $this->Intervenciones->Estatusticket->find('list')->where(['estatus IN' => $filtro]);
                break;
            case 4:
                $filtro = ['Pagado'];
                $estatus = $this->Intervenciones->Estatusticket->find('list')->where(['estatus IN' => $filtro]);
                break;
            default:
                break;
        }


        $tSubcontrata = $this->Tecnicos->find('list')->where(['subcontrata' => 1])->order(['nombre' => 'ASC']);
        // $cuadrillaTicket = $this->Intervenciones->Tickets->Cuadrilla->find()->where(['idIntervencion' => $id])->contain(['Tecnicos']);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $intervencione = $this->Intervenciones->patchEntity($intervencione, $this->request->getData(),['associated' => []]);
            if ($inter_model = $this->Intervenciones->save($intervencione)) {

                $idInter = $inter_model->id;
                $tecnicoCuadr = $this->request->getData('idTecnico');
                if($tecnicoCuadr != '' && $idInter != '') {
                    foreach ($tecnicoCuadr as $tecnicoCuadr) {
                        if ($tecnicoCuadr != 0) {
                            $cuadrilla = $this->Intervenciones->Tickets->Cuadrilla->newEntity();
                            $cuadrilla->idTecnico = $tecnicoCuadr;
                            $cuadrilla->idIntervencion = $idInter;
                            $this->Intervenciones->Tickets->Cuadrilla->save($cuadrilla);
                        }
                    }
                }

                $this->Flash->success(__('Interveción guardada correctamente.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('La intervención no se puede guardar. Por favor, intenta de nuevo.'));
        }
        $this->set(compact('intervencione','vehiculos','slas','tecnicos','tabulador','tLider','tSubcontrata','estatus'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Intervencione id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $intervencione = $this->Intervenciones->get($id);
        if ($this->Intervenciones->delete($intervencione)) {
            $this->Flash->success(__('The intervencione has been deleted.'));
        } else {
            $this->Flash->error(__('The intervencione could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function getFolio() {
        $this->request->allowMethod('ajax');
        
        $idTicket = $this->request->getQuery('keyword');
        $folio = $this->request->getQuery('folio');
        
        $countFolio = $this->Intervenciones->find()->where(['idTicket' => $idTicket])->count();
        
        if($countFolio == 0) {
            $consecutivo = 0;
        } else {
            $consecutivo = $this->Intervenciones->find()->where(['idTicket' => $idTicket])->extract('folio');
            foreach ($consecutivo as $consecutivo) {
                $consecutivo;
            }
            $getnum = strlen($consecutivo);
            switch ($getnum) {
                case 6:
                $consecutivo = substr($consecutivo,5);
                    break;
                case 7:
                $consecutivo = substr($consecutivo,6);
                    break;
                case 8:
                $consecutivo = substr($consecutivo,7);
                    break;
                case 9:
                $consecutivo = substr($consecutivo,8);
                    break;
                case 10:
                $consecutivo = substr($consecutivo,9);
                    break;
                case 11:
                $consecutivo = substr($consecutivo,10);
                    break;
                
                default:
                    
                    break;
            }
        }
        
        $consecutivo = $consecutivo + 1;
        $generatedFolio = $folio . '-' . $consecutivo;

        $this->set(compact('generatedFolio'));
    }

    public function getservicios(){
        $this->loadModel('Serviciosticket');
        $this->request->allowMethod('ajax');
        $idInter = $this->request->getQuery('keyword');
        
        $serviciosTicket = $this->Serviciosticket->find()->where(['Serviciosticket.idIntervencion' => $idInter])->contain('Tabulador');

        $this->set(compact('serviciosTicket'));
    }

    public function getcuadrilla(){
        $this->loadModel('Cuadrilla');
        $this->request->allowMethod('ajax');
        $idInter = $this->request->getQuery('keyword');
        
        $cuadrillaTicket = $this->Cuadrilla->find()->where(['Cuadrilla.idIntervencion' => $idInter])->contain('Tecnicos');

        $this->set(compact('cuadrillaTicket'));
    }
}
