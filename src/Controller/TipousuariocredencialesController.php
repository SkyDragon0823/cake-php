<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Tipousuariocredenciales Controller
 *
 * @property \App\Model\Table\TipousuariocredencialesTable $Tipousuariocredenciales
 *
 * @method \App\Model\Entity\Tipousuariocredenciale[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TipousuariocredencialesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $tipousuariocredenciales = $this->paginate($this->Tipousuariocredenciales);

        $this->set(compact('tipousuariocredenciales'));
    }

    /**
     * View method
     *
     * @param string|null $id Tipousuariocredenciale id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $tipousuariocredenciale = $this->Tipousuariocredenciales->get($id, [
            'contain' => []
        ]);

        $this->set('tipousuariocredenciale', $tipousuariocredenciale);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $tipousuariocredenciale = $this->Tipousuariocredenciales->newEntity();
        if ($this->request->is('post')) {
            $tipousuariocredenciale = $this->Tipousuariocredenciales->patchEntity($tipousuariocredenciale, $this->request->getData());
            if ($this->Tipousuariocredenciales->save($tipousuariocredenciale)) {
                $this->Flash->success(__('The tipousuariocredenciale has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tipousuariocredenciale could not be saved. Please, try again.'));
        }
        $this->set(compact('tipousuariocredenciale'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Tipousuariocredenciale id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $tipousuariocredenciale = $this->Tipousuariocredenciales->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $tipousuariocredenciale = $this->Tipousuariocredenciales->patchEntity($tipousuariocredenciale, $this->request->getData());
            if ($this->Tipousuariocredenciales->save($tipousuariocredenciale)) {
                $this->Flash->success(__('The tipousuariocredenciale has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tipousuariocredenciale could not be saved. Please, try again.'));
        }
        $this->set(compact('tipousuariocredenciale'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Tipousuariocredenciale id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $tipousuariocredenciale = $this->Tipousuariocredenciales->get($id);
        if ($this->Tipousuariocredenciales->delete($tipousuariocredenciale)) {
            $this->Flash->success(__('The tipousuariocredenciale has been deleted.'));
        } else {
            $this->Flash->error(__('The tipousuariocredenciale could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
