<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Solicitudcompra Controller
 *
 * @property \App\Model\Table\SolicitudcompraTable $Solicitudcompra
 *
 * @method \App\Model\Entity\Solicitudcompra[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SolicitudcompraController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $solicitudcompra = $this->paginate($this->Solicitudcompra);

        $this->set(compact('solicitudcompra'));
    }

    /**
     * View method
     *
     * @param string|null $id Solicitudcompra id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $solicitudcompra = $this->Solicitudcompra->get($id, [
            'contain' => []
        ]);

        $this->set('solicitudcompra', $solicitudcompra);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $solicitudcompra = $this->Solicitudcompra->newEntity();
        if ($this->request->is('post')) {
            $solicitudcompra = $this->Solicitudcompra->patchEntity($solicitudcompra, $this->request->getData());
            if ($this->Solicitudcompra->save($solicitudcompra)) {
                $this->Flash->success(__('The solicitudcompra has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The solicitudcompra could not be saved. Please, try again.'));
        }
        $this->set(compact('solicitudcompra'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Solicitudcompra id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $solicitudcompra = $this->Solicitudcompra->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $solicitudcompra = $this->Solicitudcompra->patchEntity($solicitudcompra, $this->request->getData());
            if ($this->Solicitudcompra->save($solicitudcompra)) {
                $this->Flash->success(__('The solicitudcompra has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The solicitudcompra could not be saved. Please, try again.'));
        }
        $this->set(compact('solicitudcompra'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Solicitudcompra id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $solicitudcompra = $this->Solicitudcompra->get($id);
        if ($this->Solicitudcompra->delete($solicitudcompra)) {
            $this->Flash->success(__('The solicitudcompra has been deleted.'));
        } else {
            $this->Flash->error(__('The solicitudcompra could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
