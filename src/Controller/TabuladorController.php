<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Tabulador Controller
 *
 * @property \App\Model\Table\TabuladorTable $Tabulador
 *
 * @method \App\Model\Entity\Tabulador[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TabuladorController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {

        $clientes = $this->Tabulador->Clientes->find('list');
        $tabulador = $this->paginate($this->Tabulador);

        $this->set(compact('clientes'));

        $search = $this->request->getQuery('search');
        if($search != null){
            $query = $this->Tabulador->find('all')->where(['cliente' => $search]);
            $this->set('tabulador',$this->paginate($query));
        }
    }

    /**
     * View method
     *
     * @param string|null $id Tabulador id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $tabulador = $this->Tabulador->get($id, [
            'contain' => []
        ]);

        $this->set('tabulador', $tabulador);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $clientes = $this->Tabulador->Clientes->find('list');

        $this->set(compact('clientes'));

        $tabulador = $this->Tabulador->newEntity();
        if ($this->request->is('post')) {
            $tabulador = $this->Tabulador->patchEntity($tabulador, $this->request->getData(),['associated' => []]);
            if ($this->Tabulador->save($tabulador)) {
                $this->Flash->success(__('The tabulador has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tabulador could not be saved. Please, try again.'));
        }
        $this->set(compact('tabulador'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Tabulador id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {

        $clientes = $this->Tabulador->Clientes->find('list');

        $this->set(compact('clientes'));

        $tabulador = $this->Tabulador->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $tabulador = $this->Tabulador->patchEntity($tabulador, $this->request->getData(),['associated' => []]);
            if ($this->Tabulador->save($tabulador)) {
                $this->Flash->success(__('The tabulador has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tabulador could not be saved. Please, try again.'));
        }
        $this->set(compact('tabulador'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Tabulador id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $tabulador = $this->Tabulador->get($id);
        if ($this->Tabulador->delete($tabulador)) {
            $this->Flash->success(__('The tabulador has been deleted.'));
        } else {
            $this->Flash->error(__('The tabulador could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
