<?php
namespace App\Mailer;

use Cake\Mailer\Mailer;

/**
 * Tickets mailer.
 */
class TicketsMailer extends Mailer
{
    /**
     * Mailer's name.
     *
     * @var string
     */
    public static $name = 'Tickets';

    public function ticket($ticket) {
        $dataFolio = $this->request->getData(['folio']);
                $dataCliente = $this->request->getData(['idCliente']);
                $dataSucursal = $this->request->getData(['idSucursal']);
                $dataCreated = Time::now();
                $dataDescripcion = $this->request->getData(['descripcion']);
                $dataSolicitante = $this->request->getData(['idSolicitante']);
                
                $cliente = $this->Tickets->Clientes->find()->where(['id' => $dataCliente]);
                $Sucursal = $this->Tickets->Sucursales->find()->where(['id' => $dataSucursal]);
                $Solicitante = $this->Tickets->Usuarios->find()->where(['id' => $dataSolicitante]);
                
                foreach ($cliente as $cliente) {
                    $cliente = $cliente->nombre;
                }
                
                foreach ($Sucursal as $Sucursal) {
                    $SucursalNombre = $Sucursal->sucursal;
                    $SucursalCr = $Sucursal->cr;
                    $SucursalDireccion = $Sucursal->direccion;
                }

                foreach ($Solicitante as $Solicitante) {
                    $snombre = $Solicitante->nombre;
                    $sapellido1 = $Solicitante->apellido1;
                    $sapellido2 = $Solicitante->apellido2;
                }
                $email = new Email('default');
                $email->setEmailFormat('html')
                    ->setFrom(['soporte@intertrademx.com' => 'Soporte Intertrade'])
                    ->setTo('dgutierrez@btvmx.com')
                    ->setSubject('Nuevo Ticket #'. $dataFolio)
                    ->send('Se genero un nuevo ticket con folio #' . $dataFolio . 
                    '<br><br>Cliente: ' . $cliente . 
                    '<br>Sucursal: ' . $SucursalNombre . ' Cr: ' . $SucursalCr .
                    '<br>Direccion: ' . $SucursalDireccion .
                    '<br>Fecha de solicitud: ' . $dataCreated->i18nFormat('dd-MMMM-yyyy hh:mm a') .
                    '<br> Descripción: '. $dataDescripcion .
                    '<br> Solicito: '. $snombre .' '. $sapellido1 .' '. $sapellido2);
    }
}
