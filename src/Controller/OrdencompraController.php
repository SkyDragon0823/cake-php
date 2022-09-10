<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Ordencompra Controller
 *
 * @property \App\Model\Table\OrdencompraTable $Ordencompra
 *
 * @method \App\Model\Entity\Ordencompra[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class OrdencompraController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $ordencompra = $this->paginate($this->Ordencompra);

        $this->set(compact('ordencompra'));
    }

    /**
     * View method
     *
     * @param string|null $id Ordencompra id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $ordencompra = $this->Ordencompra->get($id, [
            'contain' => []
        ]);

        $this->set('ordencompra', $ordencompra);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $ordencompra = $this->Ordencompra->newEntity();
        if ($this->request->is('post')) {
            $ordencompra = $this->Ordencompra->patchEntity($ordencompra, $this->request->getData());
            if ($this->Ordencompra->save($ordencompra)) {
                $this->Flash->success(__('The ordencompra has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ordencompra could not be saved. Please, try again.'));
        }
        $this->set(compact('ordencompra'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Ordencompra id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $ordencompra = $this->Ordencompra->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $ordencompra = $this->Ordencompra->patchEntity($ordencompra, $this->request->getData());
            if ($this->Ordencompra->save($ordencompra)) {
                $this->Flash->success(__('The ordencompra has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ordencompra could not be saved. Please, try again.'));
        }
        $this->set(compact('ordencompra'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Ordencompra id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $ordencompra = $this->Ordencompra->get($id);
        if ($this->Ordencompra->delete($ordencompra)) {
            $this->Flash->success(__('The ordencompra has been deleted.'));
        } else {
            $this->Flash->error(__('The ordencompra could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
