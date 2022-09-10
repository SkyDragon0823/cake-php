<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Estatusticket Controller
 *
 * @property \App\Model\Table\EstatusticketTable $Estatusticket
 *
 * @method \App\Model\Entity\Estatusticket[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class EstatusticketController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $estatusticket = $this->paginate($this->Estatusticket);

        $this->set(compact('estatusticket'));
    }

    /**
     * View method
     *
     * @param string|null $id Estatusticket id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $estatusticket = $this->Estatusticket->get($id, [
            'contain' => []
        ]);

        $this->set('estatusticket', $estatusticket);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $estatusticket = $this->Estatusticket->newEntity();
        if ($this->request->is('post')) {
            $estatusticket = $this->Estatusticket->patchEntity($estatusticket, $this->request->getData());
            if ($this->Estatusticket->save($estatusticket)) {
                $this->Flash->success(__('The estatusticket has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The estatusticket could not be saved. Please, try again.'));
        }
        $this->set(compact('estatusticket'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Estatusticket id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $estatusticket = $this->Estatusticket->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $estatusticket = $this->Estatusticket->patchEntity($estatusticket, $this->request->getData());
            if ($this->Estatusticket->save($estatusticket)) {
                $this->Flash->success(__('The estatusticket has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The estatusticket could not be saved. Please, try again.'));
        }
        $this->set(compact('estatusticket'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Estatusticket id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $estatusticket = $this->Estatusticket->get($id);
        if ($this->Estatusticket->delete($estatusticket)) {
            $this->Flash->success(__('The estatusticket has been deleted.'));
        } else {
            $this->Flash->error(__('The estatusticket could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
