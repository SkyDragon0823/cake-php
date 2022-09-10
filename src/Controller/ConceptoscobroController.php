<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Conceptoscobro Controller
 *
 * @property \App\Model\Table\ConceptoscobroTable $Conceptoscobro
 *
 * @method \App\Model\Entity\Conceptoscobro[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ConceptoscobroController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $conceptoscobro = $this->paginate($this->Conceptoscobro);

        $this->set(compact('conceptoscobro'));
    }

    /**
     * View method
     *
     * @param string|null $id Conceptoscobro id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $conceptoscobro = $this->Conceptoscobro->get($id, [
            'contain' => []
        ]);

        $this->set('conceptoscobro', $conceptoscobro);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $conceptoscobro = $this->Conceptoscobro->newEntity();
        if ($this->request->is('post')) {
            $conceptoscobro = $this->Conceptoscobro->patchEntity($conceptoscobro, $this->request->getData());
            if ($this->Conceptoscobro->save($conceptoscobro)) {
                $this->Flash->success(__('The conceptoscobro has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The conceptoscobro could not be saved. Please, try again.'));
        }
        $this->set(compact('conceptoscobro'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Conceptoscobro id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $conceptoscobro = $this->Conceptoscobro->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $conceptoscobro = $this->Conceptoscobro->patchEntity($conceptoscobro, $this->request->getData());
            if ($this->Conceptoscobro->save($conceptoscobro)) {
                $this->Flash->success(__('The conceptoscobro has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The conceptoscobro could not be saved. Please, try again.'));
        }
        $this->set(compact('conceptoscobro'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Conceptoscobro id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $conceptoscobro = $this->Conceptoscobro->get($id);
        if ($this->Conceptoscobro->delete($conceptoscobro)) {
            $this->Flash->success(__('The conceptoscobro has been deleted.'));
        } else {
            $this->Flash->error(__('The conceptoscobro could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
