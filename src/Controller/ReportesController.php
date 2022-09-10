<?php

namespace App\Controller;

use Cake\Core\Configure;
use Cake\Http\Exception\ForbiddenException;
use Cake\Http\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;

class ReportesController extends AppController
{
    public function index()
    {
        
    }

    /**
     * View method
     *
     * @param string|null $id Ticket id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $userType = $this->Auth->user('tipoUsuario');
        if($userType == 4){
                $this->render('../Layout/errorPage');
        }
        
        $this->loadModel('Tickets');
        $this->loadModel('Gastos');
        $this->loadModel('Tecnicos');

        $dataTicket = $this->Tickets->find()->where(['id' => $id]);
            
        foreach ($dataTicket as $dataTicket) {
            $idSubcon = $dataTicket->idTecnicoSub;
        }
        
        
        $serviciosAsig = $this->Tickets->Serviciosticket->find()->where(['idTicket' => $id])->contain(['Tiposervicio','Tabulador']);
        $cuadrilla = $this->paginate($this->Tickets->Cuadrilla->find()->where(['idTicket' => $id])->contain(['Tecnicos']));
        $infoGastos = $this->Gastos->find()->where(['idTicket' => $id]);
        $infoSubcontrata = $this->Tecnicos->find()->where(['subcontrata' => 1,'id' => $idSubcon]);
        
        $this->set(compact('cuadrilla','serviciosAsig','infoGastos','infoSubcontrata'));

        $ticket = $this->Tickets->get($id, [
            'contain' => ['Sucursales','Clientes','Estatusticket','Tabulador','Usuarios','Vehiculos']
        ]);

        $this->set('ticket', $ticket);
    }

    public function utilidad()
    {
        $this->loadModel('Clientes');
        $this->loadModel('Tickets');
        $this->loadModel('Tabulador');
        $this->loadModel('Intervenciones');
        // $this->loadModel('Gastos');
        // $this->loadModel('Serviciosticket');

        $ticket = $this->request->getQuery('ticket');

        $tickets = $this->Tickets->find('list');

        $tabulador = $this->request->getQuery('tabulador');
        $cliente = $this->request->getQuery('cliente');
        $firstDate = $this->request->getQuery('fDate');
        $lastDate = $this->request->getQuery('lDate');
        
        $clientesData = $this->Clientes->find('list')->order(['nombre' => 'ASC']);
        $tabuladorData = $this->Tabulador->find('list');

        if($cliente != ''){
            $this->paginate = [
                'contain' => ['Sucursales','Clientes','Estatusticket','Tabulador']
            ];
            $ticketsData = $this->paginate($this->Tickets->find()->where(['Tickets.idCliente' => $cliente,'Tickets.estatus IN' =>[3,4]])->contain(['Sucursales','Clientes','Estatusticket','Tabulador']));
            // $intervencionesData = $this->paginate($this->Intervenciones->find()->where(['Intervenciones.idCliente' => $cliente]));
        } else {
            $intervencionesData = $this->paginate($this->Intervenciones->find()->contain(['Tickets']));
            $ticketsData = $this->paginate($this->Tickets->find()->where(['Tickets.estatus IN' =>[3,4]])->contain(['Sucursales','Clientes','Estatusticket','Tabulador']));
        }

        $this->set(compact('tickets','ticketsData','clientesData','tabuladorData','intervencionesData'));


            //     $monto = $this->Gastos->find()
            //         ->Where(['idTicket' => $ticket]);
                
            //     $GastoMonto = 0;
                
            //     foreach ( $monto as $monto ) {
            //         $GastoMonto += $monto->montoTotal;
            //     }

    }
}
