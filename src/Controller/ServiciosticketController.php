<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Serviciosticket Controller
 *
 * @property \App\Model\Table\ServiciosticketTable $Serviciosticket
 *
 * @method \App\Model\Entity\Serviciosticket[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ServiciosticketController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $serviciosticket = $this->paginate($this->Serviciosticket);

        $this->set(compact('serviciosticket'));
    }

    /**
     * View method
     *
     * @param string|null $id Serviciosticket id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $serviciosticket = $this->Serviciosticket->get($id, [
            'contain' => ['Tabulador']
        ]);

        $this->set('serviciosticket', $serviciosticket);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $serviciosticket = $this->Serviciosticket->newEntity();
        if ($this->request->is('post')) {
            $serviciosticket = $this->Serviciosticket->patchEntity($serviciosticket, $this->request->getData());
            if ($this->Serviciosticket->save($serviciosticket)) {
                $this->Flash->success(__('The serviciosticket has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The serviciosticket could not be saved. Please, try again.'));
        }
        $this->set(compact('serviciosticket'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Serviciosticket id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $serviciosticket = $this->Serviciosticket->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $serviciosticket = $this->Serviciosticket->patchEntity($serviciosticket, $this->request->getData());
            if ($this->Serviciosticket->save($serviciosticket)) {
                $this->Flash->success(__('The serviciosticket has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The serviciosticket could not be saved. Please, try again.'));
        }
        $this->set(compact('serviciosticket'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Serviciosticket id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->autoRender = false;
        $id = $this->request->getData('id');
        $this->request->allowMethod(['ajax','post', 'delete']);

        $serviciosticket = $this->Serviciosticket->get($id);
        if ($this->Serviciosticket->delete($serviciosticket)) {
            // $this->Flash->success(__('The serviciosticket has been deleted.'));
        } else {
            // $this->Flash->error(__('The serviciosticket could not be deleted. Please, try again.'));
        }
        // return $this->redirect(['action' => 'index']);
    }

    public function addjs() {
        $this->autoRender = false;
        $this->request->allowMethod(['ajax']);
       
        $Serviciosticket = TableRegistry::get('Serviciosticket');

        if ($this->request->is('post')) {

            $dataArreglo = $this->request->getData(['servicios']);
            
            $entities = $Serviciosticket->newEntities($dataArreglo,['associated' => []]);

            $this->Serviciosticket->saveMany($entities);
        }
    }
}
