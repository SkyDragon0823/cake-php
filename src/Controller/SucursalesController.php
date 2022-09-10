<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Sucursales Controller
 *
 * @property \App\Model\Table\SucursalesTable $Sucursales
 *
 * @method \App\Model\Entity\Sucursale[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SucursalesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $clientes = $this->Sucursales->Clientes->find('list')->order(['nombre' => 'ASC']);

        $this->set(compact('clientes'));

        $this->paginate = [
            'contain' => ['Clientes','Estados']
        ];

        $search = $this->request->getQuery('search');
        
        if($search != null){
            $sucursales = $this->paginate($this->Sucursales->find('all')->Where(['idCliente' => $search])->order(['sucursal' => 'ASC']));
            $this->set(compact('sucursales'));
        }
    }

    /**
     * View method
     *
     * @param string|null $id Sucursale id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $sucursal = $this->Sucursales->get($id, [
            'contain' => []
        ]);

        $this->set('sucursal', $sucursal);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add($data = null)
    {
        $clientes = $this->Sucursales->Clientes->find('list');
        $estados = $this->Sucursales->Estados->find('list');

        $this->set(compact('clientes','estados'));
        
        $sucursal = $this->Sucursales->newEntity();
        if ($this->request->is('post')) {
            $sucursal = $this->Sucursales->patchEntity($sucursal, $this->request->getData());
            if ($this->Sucursales->save($sucursal)) {
                $this->Flash->success(__('The sucursale has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The sucursal could not be saved. Please, try again.'));
        }
        $this->set(compact('sucursal','data'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Sucursale id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $clientes = $this->Sucursales->Clientes->find('list');

        $this->set(compact('clientes'));
        
        $sucursal = $this->Sucursales->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $sucursal = $this->Sucursales->patchEntity($sucursal, $this->request->getData());
            if ($this->Sucursales->save($sucursal)) {
                $this->Flash->success(__('The sucursale has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The sucursale could not be saved. Please, try again.'));
        }
        $this->set(compact('sucursal'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Sucursale id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $sucursal = $this->Sucursales->get($id);
        if ($this->Sucursales->delete($sucursal)) {
            $this->Flash->success(__('The sucursale has been deleted.'));
        } else {
            $this->Flash->error(__('The sucursale could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
