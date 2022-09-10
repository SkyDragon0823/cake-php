<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Certificaciones Controller
 *
 * @property \App\Model\Table\CertificacionesTable $Certificaciones
 *
 * @method \App\Model\Entity\Certificacione[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CertificacionesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $certificaciones = $this->paginate($this->Certificaciones);

        $this->set(compact('certificaciones'));
    }

    /**
     * View method
     *
     * @param string|null $id Certificacione id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $certificacione = $this->Certificaciones->get($id, [
            'contain' => []
        ]);

        $this->set('certificacione', $certificacione);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $certificacione = $this->Certificaciones->newEntity();
        if ($this->request->is('post')) {
            $certificacione = $this->Certificaciones->patchEntity($certificacione, $this->request->getData());
            if ($this->Certificaciones->save($certificacione)) {
                $this->Flash->success(__('The certificacione has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The certificacione could not be saved. Please, try again.'));
        }
        $this->set(compact('certificacione'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Certificacione id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $certificacione = $this->Certificaciones->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $certificacione = $this->Certificaciones->patchEntity($certificacione, $this->request->getData());
            if ($this->Certificaciones->save($certificacione)) {
                $this->Flash->success(__('The certificacione has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The certificacione could not be saved. Please, try again.'));
        }
        $this->set(compact('certificacione'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Certificacione id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $certificacione = $this->Certificaciones->get($id);
        if ($this->Certificaciones->delete($certificacione)) {
            $this->Flash->success(__('The certificacione has been deleted.'));
        } else {
            $this->Flash->error(__('The certificacione could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
