<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Flotilla Controller
 *
 * @property \App\Model\Table\FlotillaTable $Flotilla
 *
 * @method \App\Model\Entity\Flotilla[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class FlotillaController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $flotilla = $this->paginate($this->Flotilla);

        $this->set(compact('flotilla'));
    }

    /**
     * View method
     *
     * @param string|null $id Flotilla id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $flotilla = $this->Flotilla->get($id, [
            'contain' => []
        ]);

        $this->set('flotilla', $flotilla);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $flotilla = $this->Flotilla->newEntity();
        if ($this->request->is('post')) {
            $flotilla = $this->Flotilla->patchEntity($flotilla, $this->request->getData());
            if ($this->Flotilla->save($flotilla)) {
                $this->Flash->success(__('The flotilla has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The flotilla could not be saved. Please, try again.'));
        }
        $this->set(compact('flotilla'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Flotilla id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $flotilla = $this->Flotilla->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $flotilla = $this->Flotilla->patchEntity($flotilla, $this->request->getData());
            if ($this->Flotilla->save($flotilla)) {
                $this->Flash->success(__('The flotilla has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The flotilla could not be saved. Please, try again.'));
        }
        $this->set(compact('flotilla'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Flotilla id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $flotilla = $this->Flotilla->get($id);
        if ($this->Flotilla->delete($flotilla)) {
            $this->Flash->success(__('The flotilla has been deleted.'));
        } else {
            $this->Flash->error(__('The flotilla could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
