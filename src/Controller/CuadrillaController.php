<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Cuadrilla Controller
 *
 * @property \App\Model\Table\CuadrillaTable $Cuadrilla
 *
 * @method \App\Model\Entity\Cuadrilla[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CuadrillaController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $cuadrilla = $this->paginate($this->Cuadrilla);

        $this->set(compact('cuadrilla'));
    }

    /**
     * View method
     *
     * @param string|null $id Cuadrilla id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $cuadrilla = $this->Cuadrilla->get($id, [
            'contain' => []
        ]);

        $this->set('cuadrilla', $cuadrilla);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $cuadrilla = $this->Cuadrilla->newEntity();
        if ($this->request->is('post')) {
            $cuadrilla = $this->Cuadrilla->patchEntity($cuadrilla, $this->request->getData());
            if ($this->Cuadrilla->save($cuadrilla)) {
                $this->Flash->success(__('The cuadrilla has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The cuadrilla could not be saved. Please, try again.'));
        }
        $this->set(compact('cuadrilla'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Cuadrilla id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $cuadrilla = $this->Cuadrilla->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $cuadrilla = $this->Cuadrilla->patchEntity($cuadrilla, $this->request->getData());
            if ($this->Cuadrilla->save($cuadrilla)) {
                $this->Flash->success(__('The cuadrilla has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The cuadrilla could not be saved. Please, try again.'));
        }
        $this->set(compact('cuadrilla'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Cuadrilla id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->autoRender = false;
        $id = $this->request->getData('id');
        $this->request->allowMethod(['ajax','post', 'delete']);
        
        $cuadrilla = $this->Cuadrilla->get($id);
        if ($this->Cuadrilla->delete($cuadrilla)) {
            // $this->Flash->success(__('The cuadrilla has been deleted.'));
        } else {
            // $this->Flash->error(__('The cuadrilla could not be deleted. Please, try again.'));
        }

        // return $this->redirect(['action' => 'index']);
    }
}
