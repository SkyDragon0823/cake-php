<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Vehiculos Controller
 *
 * @property \App\Model\Table\VehiculosTable $Vehiculos
 *
 * @method \App\Model\Entity\Vehiculo[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class VehiculosController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $vehiculos = $this->paginate($this->Vehiculos);

        $this->set(compact('vehiculos'));
    }

    /**
     * View method
     *
     * @param string|null $id Vehiculo id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $vehiculo = $this->Vehiculos->get($id, [
            'contain' => []
        ]);

        $this->set('vehiculo', $vehiculo);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $vehiculo = $this->Vehiculos->newEntity();
        if ($this->request->is('post')) {
            $vehiculo = $this->Vehiculos->patchEntity($vehiculo, $this->request->getData());
            if ($this->Vehiculos->save($vehiculo)) {
                $this->Flash->success(__('The vehiculo has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The vehiculo could not be saved. Please, try again.'));
        }
        $this->set(compact('vehiculo'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Vehiculo id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $vehiculo = $this->Vehiculos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $vehiculo = $this->Vehiculos->patchEntity($vehiculo, $this->request->getData());
            if ($this->Vehiculos->save($vehiculo)) {
                $this->Flash->success(__('The vehiculo has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The vehiculo could not be saved. Please, try again.'));
        }
        $this->set(compact('vehiculo'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Vehiculo id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $vehiculo = $this->Vehiculos->get($id);
        if ($this->Vehiculos->delete($vehiculo)) {
            $this->Flash->success(__('The vehiculo has been deleted.'));
        } else {
            $this->Flash->error(__('The vehiculo could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
