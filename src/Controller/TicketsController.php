<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Mailer\Email;
use Cake\I18n\Time;
/**
 * Tickets Controller
 *
 * @property \App\Model\Table\TicketsTable $Tickets
 *
 * @method \App\Model\Entity\Ticket[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TicketsController extends AppController
{
    // public $helpers = array('Js');
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function beforeFilter(Event $event)
    {
        $current_user = $this->Auth->user();
        $userType = $this->Auth->user('tipoUsuario');
        parent::beforeFilter($event);
        if($current_user != null){
            // if($userType == 3){
            //     $this->render('../Layout/errorPage');
            // }
        }
    }

    public function index($estatus = null)
    {
        $userType = $this->Auth->user('tipoUsuario');
        $userClient = $this->Auth->user('idCliente');
        $idUsuario = $this->Auth->user('id');
        if($userType != 4) {
            $clientes = $this->Tickets->Clientes->find('list')->order(['nombre' => 'ASC']);
            $this->set(compact('clientes'));
        }
        
        $search = $this->request->getQuery('search');
        
        // if($userType == 4){
        //     // $this->render('../Layout/errorPage');
            
        // }

        $this->paginate = [
            'contain' => ['Sucursales','Clientes','Estatusticket','Tabulador']
        ];

        if($estatus != null) {
            $tickets = $this->paginate($this->Tickets->find()->Where(['Tickets.estatus' => $estatus]));
        } else {

            if($search != null && $search != -1) {
                if ($userType == 5 ) {
                    $tickets = $this->paginate($this->Tickets->find()->Where(['Tickets.idCliente' => $search])->order(['Tickets.id' => 'ASC']));
                } elseif($userType == 4) {
                    $tickets = $this->paginate($this->Tickets->find()->Where(['Tickets.idCliente' => $userClient])->order(['Tickets.id' => 'ASC']));
                } elseif($userType == 3) {
                    $tickets = $this->paginate($this->Tickets->find()->Where(['Tickets.estatus' => 2,'Tickets.idCliente' => $search,'Tickets.idTecnicoLider' => $idUsuario])->order(['Tickets.id' => 'ASC']));
                } else{
                    $tickets = $this->paginate($this->Tickets->find()->Where(['Tickets.idCliente' => $search])->order(['Tickets.id' => 'ASC']));
                }
    
            } elseif($search == -1 ||  $search == null) {
                if ($userType == 5 ) {
                    $tickets = $this->paginate($this->Tickets->find()->where(['Tickets.estatus' => 3])->order(['Tickets.id' => 'DESC']));
                } elseif($userType == 4) {
                    $tickets = $this->paginate($this->Tickets->find()->Where(['Tickets.idCliente' => $userClient])->order(['Tickets.id' => 'ASC']));
                } elseif($userType == 3) {
                    $tickets = $this->paginate($this->Tickets->find()->Where(['Tickets.estatus' => 2,'Tickets.idTecnicoLider' => $idUsuario])->order(['Tickets.id' => 'ASC']));
                } else {
                    $tickets = $this->paginate($this->Tickets->find()->order(['Tickets.id' => 'DESC']));
                }
            }

        }

        $this->set(compact('tickets'));
    }

    /**
     * View method
     *
     * @param string|null $id Ticket id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $userType = $this->Auth->user('tipoUsuario');

        $ticketCoordinador = $this->Tickets->find()->where(['id' => $id]);
        foreach ($ticketCoordinador as $ticketCoordinador) {
            $ticketCoordinador = $ticketCoordinador->idCoordinador;
        }
        
        $count = $this->Tickets->Usuarios->find()->where(['id' => $ticketCoordinador])->count();
        
        if($count != 0) {
            $coordinador = $this->Tickets->Usuarios->find()->where(['id' => $ticketCoordinador]);
            foreach ($coordinador as $coordinador) {
                $coordinador = $coordinador->nombre .' '. $coordinador->apellido1 .' '. $coordinador->apellido2;
            }
            $this->set(compact('coordinador'));
        }

        $ticket = $this->Tickets->get($id, [
            'contain' => ['Sucursales','Clientes','Estatusticket','Tabulador','Usuarios','Vehiculos']
        ]);
        
        $countInter = $this->Tickets->Intervenciones->find()->where(['Intervenciones.idTicket' => $id])->count();
        
        if($countInter != 0) {
            $interveciones = $this->Tickets->Intervenciones->find()->where(['Intervenciones.idTicket' => $id]);

            $this->paginate = [
                'contain' => ['Estatusticket','Tickets','Cuadrilla']
            ];
            
            $intervenciones = $this->paginate($interveciones);
            $this->set(compact('intervenciones'));
        }

        $serviciosAsig = $this->Tickets->Serviciosticket->find()->where(['idTicket' => $id])->contain(['Tiposervicio','Tabulador']);

        $this->set('ticket', $ticket);
        
        $this->paginate = [
            'contain' => ['Tecnicos']
        ];
        $cuadrilla = $this->paginate($this->Tickets->Cuadrilla->find()->where(['idTicket' => $id]));

        $this->set(compact('cuadrilla','serviciosAsig'));

    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */

    public function add()
    {
        $current_user_id = $this->Auth->user('id');
        $userType = $this->Auth->user('tipoUsuario');
        $userClient = $this->Auth->user('idCliente');
        
        if($userType == 4){
            $clientes = $this->Tickets->Clientes->find('list')->where(['id' => $userClient, 'estatus' => 1])->order(['nombre' => 'ASC']);
        }
        else{
            $clientes = $this->Tickets->Clientes->find('list');
        }
        
        $this->set(compact('clientes'));

        $ticket = $this->Tickets->newEntity();
        
        if ($this->request->is('post')) {
            $ticket = $this->Tickets->patchEntity($ticket, $this->request->getData(),['associated' => [],'accessibleFields' => ['idTecnico' => true,'idServicio' => true,'tipoServicio' => true,'cantidad' => true]]);
            
            if ($ticket_model = $this->Tickets->save($ticket)) {
                
                $dataFolio = $ticket_model->folio;
                $dataCliente = $ticket_model->idCliente;
                $dataCreated = $ticket_model->created;
                $dataSucursal = $ticket_model->idSucursal;
                $dataDescripcion = $ticket_model->descripcion;
                $dataSolicitante = $ticket_model->idSolicitante;
                
                $clienteIn = $this->Tickets->Clientes->find()->where(['id' => $dataCliente]);
                $Sucursal = $this->Tickets->Sucursales->find()->where(['id' => $dataSucursal]);
                $Solicitante = $this->Tickets->Usuarios->find()->where(['id' => $dataSolicitante]);
                
                foreach ($clienteIn as $clienteIn) {
                    $clienteNombre = $clienteIn->nombre;
                }

                foreach ($Sucursal as $Sucursal) {
                    $SucursalNombre = $Sucursal->sucursal;
                    $SucursalCr = $Sucursal->cr;
                    $SucursalDireccion = $Sucursal->direccion;
                }

                foreach ($Solicitante as $Solicitante) {
                    $snombre = $Solicitante->nombre;
                    $sapellido1 = $Solicitante->apellido1;
                    $sapellido2 = $Solicitante->apellido2;
                }
                
                // $email = new Email('default');
                // $email->setEmailFormat('html')
                //     ->setFrom(['soporte@intertrademx.com' => 'Soporte Intertrade'])
                //     ->setTo('dgutierrez@btvmx.com')
                //     ->setSubject('Nuevo Ticket #'. $dataFolio)
                //     ->send('Se genero un nuevo ticket con folio #' . $dataFolio . 
                //     '<br><br>Cliente: ' . $clienteNombre . 
                //     '<br>Sucursal: ' . $SucursalNombre . ' Cr: ' . $SucursalCr .
                //     '<br>Direccion: ' . $SucursalDireccion .
                //     '<br>Fecha de solicitud: ' . $dataCreated->i18nFormat('dd-MMMM-yyyy hh:mm a','Mexico/General') .
                //     '<br> Descripción: '. $dataDescripcion .
                //     '<br> Solicito: '. $snombre .' '. $sapellido1 .' '. $sapellido2);

                $idTicket = $ticket_model->id;
                $servicioIdTicket = $this->request->getData('idServicio');
                $servicioTipoTicket = $this->request->getData('tipoServicio');
                $servicioCantidadTicket = $this->request->getData('cantidad');
                $dataServicios = [$servicioIdTicket];

                if($servicioIdTicket != '') {
                    foreach ($dataServicios as $dataServicios) {
                            $entities = $this->Tickets->Serviciosticket->newEntity();
                            $entities->idTicket = $idTicket;
                            $entities->idServicio = $servicioIdTicket;
                            $entities->tipoServicio = $servicioTipoTicket;
                            $entities->cantidad = $servicioCantidadTicket;
                            $this->Tickets->Serviciosticket->save($entities);
                        }
                }

                $comentario = $this->Tickets->Comentarios->newEntity();
                $comentario->idTicket = $idTicket;
                $comentario->autor = $current_user_id;
                $comentario->titulo = 'Nuevo ticket generado';
                $this->Tickets->Comentarios->save($comentario);


                $this->Flash->success(__('Ticket guardado correctamente.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('No se puede guardar el ticket, Intente de nuevo'));
        }
        $this->set(compact('ticket'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Ticket id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {   
        $current_user_id = $this->Auth->user('id');
        $userType = $this->Auth->user('tipoUsuario');
        
        if($userType == 4 || $userType == 3) {
            $this->render('../Layout/errorPage');
        } else {
            $this->loadModel('Vehiculos');
            $this->loadModel('Slas');
            $this->loadModel('Tecnicos');
            $this->loadModel('Serviciosticket');
            $this->loadModel('Gastos');
            
            $clienteId = $this->Tickets->find()->where(['id' => $id]);
            
            foreach ($clienteId as $clienteId) {
                $clienteIndirecto = $clienteId->clienteIndirecto;
                $idsubcon = $clienteId->idTecnicoSub;
                $clienteId = $clienteId->idCliente;
            }

            switch ($clienteId) {
                case 5:
                    $filtro = [9,10,11];
                    $indirecto = $this->Tickets->Clientes->find('list')->where(['id IN' => $filtro,'estatus' => 1]);
                    break;
                case 6:
                    $indirecto = $this->Tickets->Clientes->find('list')->where(['id' => 9,'estatus' => 1]);
                    break;
                default:
                    $indirecto = 0;
                    break;
            }
            $infosubcontrata = $this->Tecnicos->find()->where(['subcontrata' => 1,'id' => $idsubcon]);
            $clienteId == 2 ? $clienteId = 1 : $clienteId;
            $serviciosTicket = $this->Tickets->Serviciosticket->find()->where(['idTicket' => $id])->contain(['Tiposervicio','Tabulador']);
            $tecnicos = $this->Tickets->Tecnicos->find('list')->where(['subcontrata' => 0]);
            $vehiculos = $this->Vehiculos->find('list');
            $clientes = $this->Tickets->Clientes->find('list')->where(['id' => $clienteId]);
            $sucursales = $this->Tickets->Sucursales->find('list')->where(['idCliente' => $clienteId]);
            $tLider = $this->Tickets->Usuarios->find('list')->where(['tipoUsuario' => 3]);
            $tSubcontrata = $this->Tecnicos->find('list')->where(['subcontrata' => 1]);
            $usuarios = $this->Tickets->Usuarios->find('list')->where(['tipoUsuario is not' => 5]);
            $coordinadores = $this->Tickets->Usuarios->find('list')->where(['tipoUsuario' => 2]);
            $slas = $this->Slas->find('list');
            $estatusinicial = $this->Tickets->find()->where(['id' => $id]);
            $infoGastos = $this->Gastos->find()->where(['idTicket' => $id]);
            
            $getDatatab = $this->Tickets->Tabulador->find()->where(['cliente' => $clienteId])->count();

            if($getDatatab == null || $getDatatab == '' || $getDatatab == 0) {
                $tabulador = $this->Tickets->Tabulador->find('list');
            } else {
                $tabulador = $this->Tickets->Tabulador->find('list')->where(['cliente' => $clienteId]);
            }
            
            foreach ($estatusinicial as $estatusinicial) {
                $estatusinicial = $estatusinicial->estatus;
            }

            // $cuadrillaTicket = $this->Tickets->Cuadrilla->find()->where(['idTicket' => $id]);
            $cuadrillaTicket = $this->Tickets->Cuadrilla->find()->where(['idTicket' => $id])->contain(['Tecnicos']);

            $ticket = $this->Tickets->get($id, [
                'contain' => []
            ]);

            $ticketInfo = $this->Tickets->get($id, [
                'contain' => ['Sucursales','Clientes','Estatusticket','Tabulador','Usuarios','Vehiculos']
            ]);
            
            switch ($ticket->estatus) {
                case 1:
                    $filtro = ['Activo','En proceso','Cancelado'];
                    $estatus = $this->Tickets->Estatusticket->find('list')->where(['estatus IN' => $filtro]);
                    break;
                case 2:
                    $filtro = ['En proceso','Pendiente pago','Cancelado'];
                    $estatus = $this->Tickets->Estatusticket->find('list')->where(['estatus IN' => $filtro]);
                    break;
                case 3:
                    $filtro = ['Pendiente pago','Pagado'];
                    $estatus = $this->Tickets->Estatusticket->find('list')->where(['estatus IN' => $filtro]);
                    break;
                case 4:
                    $filtro = ['Pagado'];
                    $estatus = $this->Tickets->Estatusticket->find('list')->where(['estatus IN' => $filtro]);
                    break;
                default:
                    break;
            }
            
            
            $this->set(compact('clientes','tSubcontrata','tLider','sucursales','estatus','tabulador','infoGastos','coordinadores','usuarios','vehiculos','tecnicos','slas','cuadrillaTicket','serviciosTicket','infosubcontrata'));


            if ($this->request->is(['patch', 'post', 'put'])) {
                
                $ticket = $this->Tickets->patchEntity($ticket, $this->request->getData(),['associated' => [],'accessibleFields' => ['idTecnico' => true]]);
                    $tecnicoCuadr = $this->request->getData('idTecnico');

                    if ($ticket_model = $this->Tickets->save($ticket)) {
                        $tecnicoCuadr = $this->request->getData('idTecnico');
                        
                        if($tecnicoCuadr != '') {
                            foreach ($tecnicoCuadr as $tecnicoCuadr) {
                                if ($tecnicoCuadr != 0) {
                                    $cuadrilla = $this->Tickets->Cuadrilla->newEntity();
                                    // $tecnicoCuadr = (int) implode('', $tecnicoCuadr);
                                    $cuadrilla->idTecnico = $tecnicoCuadr;
                                    $cuadrilla->idTicket = $id;
                                    $this->Tickets->Cuadrilla->save($cuadrilla);
                                }
                            }
                        }

                        $estatusTicket = $ticket_model->estatus;

                        if($estatusinicial == $estatusTicket ) {

                        } else {
                            switch ($estatusTicket) {
                                case 2:
                                    $comentario = $this->Tickets->Comentarios->newEntity();
                                    $comentario->idTicket = $id;
                                    $comentario->autor = $current_user_id;
                                    $comentario->titulo = 'El ticket esta en proceso';
                                    $this->Tickets->Comentarios->save($comentario);
                                    break;
                                case 3:
                                    $comentario = $this->Tickets->Comentarios->newEntity();
                                    $comentario->idTicket = $id;
                                    $comentario->autor = $current_user_id;
                                    $comentario->titulo = 'El ticket esta pendiente de pago';
                                    $this->Tickets->Comentarios->save($comentario);
                                    break;
                                case 4:
                                    $comentario = $this->Tickets->Comentarios->newEntity();
                                    $comentario->idTicket = $id;
                                    $comentario->autor = $current_user_id;
                                    $comentario->titulo = 'Ticket pagado';
                                    $this->Tickets->Comentarios->save($comentario);
                                    break;
                                case 5:
                                    $comentario = $this->Tickets->Comentarios->newEntity();
                                    $comentario->idTicket = $id;
                                    $comentario->autor = $current_user->id;
                                    $comentario->titulo = 'Se canceló el ticket';
                                    $this->Tickets->Comentarios->save($comentario);
                                    break;
                                
                                default:
                                    
                                    break;
                            }
                        }

                        $this->Flash->success(__('El ticket se modifico correctamente.'));
                        return $this->redirect(['action' => 'index']);
                    }
    
                $this->Flash->error(__('No se puede modificar el ticket. Por favor, intenta de nuevo.'));
            }
            $this->set(compact('ticket','ticketInfo','serviciosInfo'));
        }
        $this->paginate = [
            'contain' => ['Tecnicos']
        ];
        $cuadrilla = $this->paginate($this->Tickets->Cuadrilla->find()->where(['idTicket' => $id]));

        $this->set(compact('cuadrilla'));
        
    }

    /**
     * Delete method
     *
     * @param string|null $id Ticket id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $ticket = $this->Tickets->get($id);
        if ($this->Tickets->delete($ticket)) {
            $this->Flash->success(__('The ticket has been deleted.'));
        } else {
            $this->Flash->error(__('The ticket could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function dropdown()
    {
        $this->request->allowMethod('ajax');

        $keyword = $this->request->getQuery('keyword');
        $tipoSucursal = $this->request->getQuery('tipoSucursal');
        
        if($keyword == '') {
            return false;
        }
        
        if($tipoSucursal != '') {
            switch ($tipoSucursal) {
                case 1:
                    $tipo = '%Oficial%';
                    $query = $this->Tickets->Sucursales->find('list')->where(['idCliente' => $keyword, 'tipoSucursal LIKE' => $tipo])->order(['sucursal' => 'ASC']);
                    break;
                case 2:
                    $tipo = 'Postas';
                    $query = $this->Tickets->Sucursales->find('list')->where(['idCliente' => $keyword, 'tipoSucursal' => $tipo])->order(['sucursal' => 'ASC']);
                    break;
                case 3:
                    $tipo = 'Sucursales';
                    $query = $this->Tickets->Sucursales->find('list')->where(['idCliente' => $keyword, 'tipoSucursal' => $tipo])->order(['sucursal' => 'ASC']);
                    break;
                case 4:
                    $tipo = '%Intermex%';
                    $query = $this->Tickets->Sucursales->find('list')->where(['idCliente' => $keyword, 'tipoSucursal LIKE' => $tipo])->order(['sucursal' => 'ASC']);
                    break;
                default:
                    break;
            }
        } else {
            $query = $this->Tickets->Sucursales->find('list')->where(['idCliente' => $keyword])->order(['sucursal' => 'ASC']);
        }
        

        $this->set(compact('query'));
        $this->set('_serialize',['query']);
    }
    public function dropdowntab()
    {
        $this->request->allowMethod('ajax');

        $keyword = $this->request->getQuery('keyword');
        
        if($keyword == '') {
            return false;
        }
        
        $queryTab = $this->Tickets->Tabulador->find('list')->where(['cliente' => $keyword])->order(['clave' => 'ASC']);

        $this->set(compact('queryTab'));
        $this->set('_serialize',['queryTab']);
    }

    public function getfolio(){
        
        $this->request->allowMethod('ajax');
        $idCLiente = $this->request->getQuery('keyword');
        
        $prefijo = $this->Tickets->Clientes->find()->where(['id' => $idCLiente])->extract('prefijo');
        
        foreach ($prefijo as $prefijo) {
            $prefijo;
        }
        
        if($prefijo == '') {
            $prefijo = 'PAR';
        }

        $countFolio = $this->Tickets->find()->where(['idCliente' => $idCLiente])->count();
        
        if($countFolio == 0) {
            $consecutivo = 0;
        } else {
            $consecutivo = $this->Tickets->find()->where(['idCliente' => $idCLiente])->extract('folio');
            foreach ($consecutivo as $consecutivo) {
                $consecutivo;
            }
            $consecutivo = substr($consecutivo,3);
        }

        $consecutivo = $consecutivo + 1;
        
        $generatedFolio = $prefijo . '' . $consecutivo;

        $this->set(compact('generatedFolio'));
    }

    public function clienteindirecto()
    {
        $this->request->allowMethod('ajax');

        $keyword = $this->request->getQuery('keyword');
        
        if($keyword == '') {
            return false;
        }

        switch ($keyword) {
            case 5:
                    $filtro = [9,10,11];
                    $query = $this->Tickets->Clientes->find('list')->where(['id IN' => $filtro]);
                break;
            case 6:
                    $query = $this->Tickets->Clientes->find('list')->where(['id' => 9]);
                break;
            default:
            
                break;
        }

        $this->set(compact('query'));
        $this->set('_serialize',['query']);
    }

    public function addTickets()
    {
        $this->autoRender = false;
        $this->request->allowMethod('ajax');

        $ticket = $this->Tickets->newEntity();
        
        if ($this->request->is('post')) {
            $ticket = $this->Tickets->patchEntity($ticket, $this->request->getData(),['associated' => ['Serviciosticket'],'accessibleFields' => ['idTecnico' => true]]);
            if ($this->Tickets->save($ticket)) {
                $this->Flash->success(__('Ticket guardado correctamente.'));
            } else {
                $this->Flash->error(__('No se puede guardar el ticket, Intente de nuevo'));
            }
        }

        $data = $this->request->getData('Servicios');
        
        if($data != ''){

            if ($this->request->is('post')) {
                
                $entities = $this->Tickets->Serviciosticket->newEntities($data);
    
                if ($this->Tickets->Serviciosticket->saveMany($entities)) {
                    $this->Flash->success(__('La cuadrilla se guardo correctamente.'));
                } else {
                    $this->Flash->error(__('La cuadrilla no se guardo correctamente. Por favor, intenta de nuevo.'));
                }

            }

        }


    }

    public function addprueba()
    {
        $ticket = $this->Tickets->newEntity();
        if ($this->request->is('post')) {
            $ticket = $this->Tickets->patchEntity($ticket, $this->request->getData(),['associated' => ['Serviciosticket'],'accessibleFields' => ['idTecnico' => true]]);
            if ($this->Tickets->save($ticket)) {
                $this->Flash->success(__('The ticket has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ticket could not be saved. Please, try again.'));
        }
        $this->set(compact('ticket'));
    }

    public function getsucursal() {
        $this->autoRender = false;
        $this->request->allowMethod('ajax');

        $keyword = $this->request->getQuery('keyword');

        $this->Tickets->Clientes->Sucursales->find()->where(['id' => $keyword])->order(['cr' => 'DSC']);

    }

    public function ticketpagado($id) {
        $this->autoRender = false;
        $this->request->allowMethod('ajax');

        $ticket = $this->Ticket->get($id, [
            'contain' => []
        ]);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $ticket = $this->Ticket->patchEntity($ticket, $this->request->getQuery('keyword'),['associated' => []]);
            if ($this->Ticket->save($ticket)) {
                $this->Flash->success(__('Ticket pagado'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The Ticket could not be saved. Please, try again.'));
        }
        $this->set(compact('ticket'));
    }

    public function getservicios(){
        $this->loadModel('Serviciosticket');
        $this->request->allowMethod('ajax');
        $idTicket = $this->request->getQuery('keyword');
        
        $serviciosTicket = $this->Serviciosticket->find()->where(['Serviciosticket.idTicket' => $idTicket])->contain('Tabulador');

        $this->set(compact('serviciosTicket'));
    }

    public function getcuadrilla(){
        $this->loadModel('Cuadrilla');
        $this->request->allowMethod('ajax');
        $idTicket = $this->request->getQuery('keyword');
        
        $cuadrillaTicket = $this->Cuadrilla->find()->where(['Cuadrilla.idTicket' => $idTicket])->contain('Tecnicos');

        $this->set(compact('cuadrillaTicket'));
    }

    public function changestatus(){
        $this->autoRender = false;
        $this->request->allowMethod('ajax');

        if ($this->request->is('patch', 'post', 'put')) {
            $tickets = $this->Tickets->patchEntity($tickets, $this->request->getData(),['associated' => []]);
            if ($this->Tickets->save($tickets)) {
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('No se puede guardar el comentario, Intenta de nuevo'));
        }
        $this->set(compact('comentario'));
    }

}
