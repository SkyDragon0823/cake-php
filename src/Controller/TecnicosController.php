<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Tecnicos Controller
 *
 * @property \App\Model\Table\TecnicosTable $Tecnicos
 *
 * @method \App\Model\Entity\Tecnico[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TecnicosController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $tecnicos = $this->paginate($this->Tecnicos);

        $this->set(compact('tecnicos'));
    }

    /**
     * View method
     *
     * @param string|null $id Tecnico id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $tecnico = $this->Tecnicos->get($id, [
            'contain' => []
        ]);

        $this->set('tecnico', $tecnico);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $tecnico = $this->Tecnicos->newEntity();
        if ($this->request->is('post')) {
            $tecnico = $this->Tecnicos->patchEntity($tecnico, $this->request->getData());
            if ($this->Tecnicos->save($tecnico)) {
                $this->Flash->success(__('The tecnico has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tecnico could not be saved. Please, try again.'));
        }
        $this->set(compact('tecnico'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Tecnico id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $tecnico = $this->Tecnicos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $tecnico = $this->Tecnicos->patchEntity($tecnico, $this->request->getData());
            if ($this->Tecnicos->save($tecnico)) {
                $this->Flash->success(__('The tecnico has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tecnico could not be saved. Please, try again.'));
        }
        $this->set(compact('tecnico'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Tecnico id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $tecnico = $this->Tecnicos->get($id);
        if ($this->Tecnicos->delete($tecnico)) {
            $this->Flash->success(__('The tecnico has been deleted.'));
        } else {
            $this->Flash->error(__('The tecnico could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
