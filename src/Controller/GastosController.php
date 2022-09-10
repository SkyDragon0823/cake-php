<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Gastos Controller
 *
 * @property \App\Model\Table\GastosTable $Gastos
 *
 * @method \App\Model\Entity\Gasto[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class GastosController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Tickets']
        ];
        $gastos = $this->paginate($this->Gastos->find()->group('idTicket'));
        // $this->Gastos->virtualFields = array('amount_sum' => 'sum(amount)');
        // $gastos = $this->paginate($this->Gastos->find()->select(['Gastos.montoTotal','Gastos.folio']));

        // $gastos = $this->paginate($this->Gastos->find('list',[
        //     'fields' => [
        //         'SUM(montoTotal) as montoGeneral',
        //         'folio'
        //         ],
        //     'group'=> ['idTicket'] ])
        // );

        $this->set(compact('gastos'));
    }

    /**
     * View method
     *
     * @param string|null $id Gasto id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $gasto = $this->Gastos->find()->where(['idTicket' => $id])->contain(['Tickets']);

        $this->set('gasto', $gasto);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add($idTicket = null)
    {
        $this->loadModel('Tickets');
        $this->loadModel('Intervenciones');
        $ticketsCount = $this->Tickets->find()->count();
        if($ticketsCount == 0) {
            $this->set(compact('ticketsCount'));
        } else {

            if($idTicket != ''){
                $ticket = $this->Gastos->Tickets->find()->where(['id' => $idTicket]);
                $this->set(compact('ticket'));
            } else{
                $tickets = $this->Gastos->Tickets->find('list');
                $this->set(compact('tickets'));
            }

            $userType = $this->Auth->user('tipoUsuario');
            $userId = $this->Auth->user('id');
            $this->loadModel('Cuadrilla');
            $tickets = $this->Tickets->find('list');
            $intervenciones = $this->Intervenciones->find('list');

            $countTickets = $this->Cuadrilla->find('list')->where(['idTicket' => $userId])->count();
            
            // $gasto = $this->Gastos->newEntity();
            $gasto = TableRegistry::get('Gastos');
            if ($this->request->is('post')) {
    
                $keyword = $this->request->getQuery('gastosValue');
                $gasto = $this->Gastos->patchEntity($gasto, $this->request->getData(),['associated' => [],'accessibleFields' => ['gastos' => true]]);
                $dataArreglo = $this->request->getData(['gastos']);
                // $entities = $gasto->newEntities($this->request->getData(),['associated' => []]);
                $entities = $gasto->newEntities($dataArreglo);
                
                if ($this->Gastos->saveMany($entities)) {
                    $this->Flash->success(__('Los gastos se guardaron correctamente.'));
    
                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('Los gastos no pueden guardarse. Por favor, intenta de nuevo.'));
            }
    
            $this->set(compact('gasto','tickets','countTickets','ticketsCount','intervenciones'));
            
        }
    }

    public function addvalues(){
        $this->autoRender = false;
        $this->request->allowMethod('ajax');
        
        $data = $this->request->getData('gastos');

        if ($this->request->is('post')) {
            
            $entities = $this->Gastos->newEntities($data);

            if ($this->Gastos->saveMany($entities)) {
                $this->Flash->success(__('Los gastos se guardaron correctamente.'));
            } else {
                $this->Flash->error(__('Los gastos no pueden guardarse. Por favor, intenta de nuevo.'));
            }
        }
    }


    /**
     * Edit method
     *
     * @param string|null $id Gasto id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->loadModel('Tickets');
        
        $gasto = $this->Gastos->get($id, [
            'contain' => []
        ]);

        $gastoTicket = $gasto->idTicket;
        $gastoInter = $gasto->idIntervencion;

        if ($this->request->is(['patch', 'post', 'put'])) {
            $gasto = $this->Gastos->patchEntity($gasto, $this->request->getData(),['associated' => []]);
            if ($this->Gastos->save($gasto)) {
                $this->Flash->success(__('Los gastos se guardaron correctamente.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The gasto could not be saved. Please, try again.'));
        }

        $ticket = $this->Tickets->find()->where(['id' => $gastoTicket]);
        // $intervencion = $this->Tickets->find()->where(['id' => $gastoInter]);

        $this->set(compact('gasto','ticket'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Gasto id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $gasto = $this->Gastos->get($id);
        if ($this->Gastos->delete($gasto)) {
            $this->Flash->success(__('The gasto has been deleted.'));
        } else {
            $this->Flash->error(__('The gasto could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
