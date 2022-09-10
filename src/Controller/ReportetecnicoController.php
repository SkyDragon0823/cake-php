<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Reportetecnico Controller
 *
 * @property \App\Model\Table\ReportetecnicoTable $Reportetecnico
 *
 * @method \App\Model\Entity\Reportetecnico[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ReportetecnicoController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Usuarios','Tickets','Intervenciones']
        ];
        $reportetecnico = $this->paginate($this->Reportetecnico);

        $this->set(compact('reportetecnico'));
    }

    /**
     * View method
     *
     * @param string|null $id Reportetecnico id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->LoadModel('Tickets');
        $reportetecnico = $this->Reportetecnico->get($id, [
            'contain' => []
        ]);

        $this->set('reportetecnico', $reportetecnico);
        
        $reporteTicketId = $reportetecnico->idTicket;

        $reporteTicket = $this->Tickets->find()->where(['id' => $reporteTicketId]);
        
        foreach ($reporteTicket as $reporteTicket) {
            $reporteTicket = $reporteTicket->folio;
        }
        $this->set(compact('reporteTicket'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add($idTicket = null)
    {
        $this->LoadModel('Tickets');
        $ticketCount = $this->Tickets->find()->count();

        if($ticketCount == 0) {
            $this->set(compact('ticketCount'));
        } else {

            if($idTicket != ''){
                $ticket = $this->Tickets->find()->where(['id' => $idTicket]);
                $this->set(compact('ticket'));
            } else{
                $tickets = $this->Tickets->find('list');
                $this->set(compact('tickets'));
            }
            
            $this->LoadModel('Intervenciones');
            
            // $ticket = $this->Tickets->find('list');
            if($idTicket != null) {
                $intervenciones = $this->Intervenciones->find('list')->where(['idTicket' => $idTicket]);

            } else {
                $intervenciones = $this->Intervenciones->find('list');
            }
    
    
            $reportetecnico = $this->Reportetecnico->newEntity();
            if ($this->request->is('post')) {
                $reportetecnico = $this->Reportetecnico->patchEntity($reportetecnico, $this->request->getData(),['associated' => []]);
                if ($this->Reportetecnico->save($reportetecnico)) {
                    $this->Flash->success(__('The reportetecnico has been saved.'));
    
                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('The reportetecnico could not be saved. Please, try again.'));
            }
            $this->set(compact('reportetecnico','ticket','intervenciones','ticketCount'));

        }

    }

    /**
     * Edit method
     *
     * @param string|null $id Reportetecnico id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->LoadModel('Tickets');
        $this->LoadModel('Intervenciones');

        
        $reportIdTicket = $this->Reportetecnico->find()->where(['id' => $id]);
        foreach ($reportIdTicket as $reportIdTicket) {
            $reportIdTicket = $reportIdTicket->idTicket;
        } 

        $ticket = $this->Tickets->find()->where(['id' => $reportIdTicket]);
        $intervenciones = $this->Intervenciones->find('list');

        $reportetecnico = $this->Reportetecnico->get($id, [
            'contain' => []
        ]);
        
        if ($this->request->is(['patch', 'post', 'put'])) {
            $reportetecnico = $this->Reportetecnico->patchEntity($reportetecnico, $this->request->getData());
            if ($this->Reportetecnico->save($reportetecnico)) {
                $this->Flash->success(__('The reportetecnico has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The reportetecnico could not be saved. Please, try again.'));
        }
        $this->set(compact('reportetecnico','ticket','intervenciones'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Reportetecnico id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $reportetecnico = $this->Reportetecnico->get($id);
        if ($this->Reportetecnico->delete($reportetecnico)) {
            $this->Flash->success(__('The reportetecnico has been deleted.'));
        } else {
            $this->Flash->error(__('The reportetecnico could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
