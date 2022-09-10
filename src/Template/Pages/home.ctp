<?php
use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\Datasource\ConnectionManager;
// use Cake\Error\Debugger;
use Cake\Http\Exception\NotFoundException;

$connection = ConnectionManager::get('default');
if($current_user['tipoUsuario'] == 1 || $current_user['tipoUsuario'] == 2 || $current_user['tipoUsuario'] == 5) :
  $tiketsActivos = $connection->execute('SELECT * FROM tickets WHERE estatus = 1')->fetchAll('assoc');
  $numTicketsActivos = sizeof($tiketsActivos);

  $tiketsEnProceso = $connection->execute('SELECT * FROM tickets WHERE estatus = 2')->fetchAll('assoc');
  $numTicketsProceso = sizeof($tiketsEnProceso);

  $tiketsPendientePago = $connection->execute('SELECT * FROM tickets WHERE estatus = 3')->fetchAll('assoc');
  $numTicketsPendiente = sizeof($tiketsPendientePago);
  
  $InterActivos = $connection->execute('SELECT * FROM intervenciones WHERE estatus = 1')->fetchAll('assoc');
  $numInterActivos = sizeof($InterActivos);

  $InterEnProceso = $connection->execute('SELECT * FROM intervenciones WHERE estatus = 2')->fetchAll('assoc');
  $numInterProceso = sizeof($InterEnProceso);

  $InterPendientePago = $connection->execute('SELECT * FROM intervenciones WHERE estatus = 3')->fetchAll('assoc');
  $numInterPendiente = sizeof($InterPendientePago);

endif;
if($current_user['tipoUsuario'] == 4) {
  $tiketsActivos = $connection->execute('SELECT * FROM tickets WHERE estatus = 1 and idCliente ='.$current_user['idCliente'].' ')->fetchAll('assoc');
  $numTicketsActivos = sizeof($tiketsActivos);

  $tiketsEnProceso = $connection->execute('SELECT * FROM tickets WHERE estatus = 2 and idCliente ='.$current_user['idCliente'].' ')->fetchAll('assoc');
  $numTicketsProceso = sizeof($tiketsEnProceso);

  $tiketsPendientePago = $connection->execute('SELECT * FROM tickets WHERE estatus = 3 and idCliente ='.$current_user['idCliente'].' ')->fetchAll('assoc');
  $numTicketsPendiente = sizeof($tiketsPendientePago);
}
if($current_user['tipoUsuario'] == 3) :
  $tiketsEnProceso = $connection->execute('SELECT * FROM tickets WHERE estatus = 2 and idTecnicoLider ='.$current_user['id'].' ')->fetchAll('assoc');
  $numTicketsProceso = sizeof($tiketsEnProceso);

  $InterEnProceso = $connection->execute('SELECT * FROM intervenciones WHERE estatus = 2 and idTecnicoLider ='.$current_user['id'].' ')->fetchAll('assoc');
  $numInterProceso = sizeof($InterEnProceso);
endif;

?>
<div class="app-title">
  <div>
    <h1><i class="fa fa-tachometer-alt"></i> Dashboard</h1>
    <p>BTVMX ADMIN</p>
  </div>
    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
    </ul>
  </div>
  <div class="row justify-content-center">
    <?php if($current_user['tipoUsuario'] == 1 || $current_user['tipoUsuario'] == 2) {?>
      <div class="col">
        <div class="widget-small success coloured-icon"><i class="icon fa fa-ticket-alt fa-3x"></i>
          <div class="info">
            <?= $this->Html->link('<h4>Tickets Activos</h4>', ['controller' => 'tickets','action' => 'index',1],['escape' => false]) ?>
            <p><b><?= $numTicketsActivos ?></b></p>
            <?= $this->Html->link('<h4>Intervenciones Activas</h4>', ['controller' => 'Intervenciones','action' => 'index',1],['escape' => false]) ?>
            <p><b><?= $numInterActivos ?></b></p>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="widget-small info coloured-icon"><i class="icon fa fa-business-time fa-3x"></i>
          <div class="info">
            <?= $this->Html->link('<h4>Tickets en Proceso</h4>', ['controller' => 'tickets','action' => 'index',2],['escape' => false]) ?>
            <p><b> <?= $numTicketsProceso ?> </b></p>
            <?= $this->Html->link('<h4>Intervenciones en Proceso</h4>', ['controller' => 'Intervenciones','action' => 'index',2],['escape' => false]) ?>
            <p><b> <?= $numInterProceso ?> </b></p>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="widget-small danger coloured-icon"><i class="icon fa fa-exclamation-triangle fa-3x"></i>
          <div class="info">
            <?= $this->Html->link('<h4>Tickets Pago Pendiente</h4>', ['controller' => 'tickets','action' => 'index',3],['escape' => false]) ?>
            <p><b> <?= $numTicketsPendiente ?> </b></p>
            <?= $this->Html->link('<h4>Intervenciones Pago Pendiente</h4>', ['controller' => 'Intervenciones','action' => 'index',3],['escape' => false]) ?>
            <p><b> <?= $numInterPendiente ?> </b></p>
          </div>
        </div>
      </div>
    <?php } elseif( $current_user['tipoUsuario'] == 5 ){ ?>
      <div class="col">
        <div class="widget-small danger coloured-icon"><i class="icon fa fa-exclamation-triangle fa-3x"></i>
          <div class="info">
            <?= $this->Html->link('<h4>Tickets Pago Pendiente</h4>', ['controller' => 'tickets','action' => 'index',3],['escape' => false]) ?>
            <p><b> <?= $numTicketsPendiente ?> </b></p>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="widget-small danger coloured-icon"><i class="icon fa fa-exclamation-triangle fa-3x"></i>
          <div class="info">
            <?= $this->Html->link('<h4>Intervenciones Pago Pendiente</h4>', ['controller' => 'Intervenciones','action' => 'index',3],['escape' => false]) ?>
            <p><b> <?= $numInterPendiente ?> </b></p>
          </div>
        </div>
      </div>
    <?php } elseif($current_user['tipoUsuario'] == 4) {?>
      <div class="col">
        <div class="widget-small success coloured-icon"><i class="icon fa fa-ticket-alt fa-3x"></i>
          <div class="info">
            <?= $this->Html->link('<h4>Tickets Activos</h4>', ['controller' => 'tickets','action' => 'index',1],['escape' => false]) ?>
            <p><b><?= $numTicketsActivos ?></b></p>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="widget-small info coloured-icon"><i class="icon fa fa-business-time fa-3x"></i>
          <div class="info">
            <?= $this->Html->link('<h4>Tickets en Proceso</h4>', ['controller' => 'tickets','action' => 'index',2],['escape' => false]) ?>
            <p><b> <?= $numTicketsProceso ?> </b></p>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="widget-small danger coloured-icon"><i class="icon fa fa-exclamation-triangle fa-3x"></i>
          <div class="info">
            <?= $this->Html->link('<h4>Tickets Pago Pendiente</h4>', ['controller' => 'tickets','action' => 'index',3],['escape' => false]) ?>
            <p><b> <?= $numTicketsPendiente ?> </b></p>
          </div>
        </div>
      </div>
    <?php } elseif($current_user['tipoUsuario'] == 3) {?>
      <div class="col">
        <div class="widget-small info coloured-icon"><i class="icon fa fa-business-time fa-3x"></i>
          <div class="info">
            <?= $this->Html->link('<h4>Tickets en Proceso</h4>', ['controller' => 'tickets','action' => 'index'],['escape' => false]) ?>
            <p><b> <?= $numTicketsProceso ?> </b></p>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="widget-small info coloured-icon"><i class="icon fa fa-business-time fa-3x"></i>
          <div class="info">
            <?= $this->Html->link('<h4>Intervenciones en Proceso</h4>', ['controller' => 'intervenciones','action' => 'index'],['escape' => false]) ?>
            <p><b> <?= $numInterProceso ?> </b></p>
          </div>
        </div>
      </div>
    <?php }?>
</div>
<!-- <div class="row">
  <div class="col-md-6">
    <div class="tile">
      <h3 class="tile-title">Monthly Sales</h3>
      <div class="embed-responsive embed-responsive-16by9">
        <canvas class="embed-responsive-item" id="lineChartDemo"></canvas>
      </div>
    </div>
  </div>
  <div class="col-md-6">
    <div class="tile">
      <h3 class="tile-title">Support Requests</h3>
      <div class="embed-responsive embed-responsive-16by9">
        <canvas class="embed-responsive-item" id="pieChartDemo"></canvas>
      </div>
    </div>
  </div>
</div> -->

  <script type="text/javascript">
  var data = {
    labels: ["Enero", "Febrero", "Marzo", "Abril", "Mayo"],
    datasets: [
      {
        label: "My First dataset",
        fillColor: "rgba(220,220,220,0.2)",
        strokeColor: "rgba(220,220,220,1)",
        pointColor: "rgba(220,220,220,1)",
        pointStrokeColor: "#fff",
        pointHighlightFill: "#fff",
        pointHighlightStroke: "rgba(220,220,220,1)",
        data: [65, 59, 80, 81, 56]
      },
      {
        label: "My Second dataset",
        fillColor: "rgba(151,187,205,0.2)",
        strokeColor: "rgba(151,187,205,1)",
        pointColor: "rgba(151,187,205,1)",
        pointStrokeColor: "#fff",
        pointHighlightFill: "#fff",
        pointHighlightStroke: "rgba(151,187,205,1)",
        data: [28, 48, 40, 19, 86]
      }
    ]
  };
  var pdata = [
    {
      value: 300,
      color: "#46BFBD",
      highlight: "#5AD3D1",
      label: "Complete"
    },
    {
      value: 50,
      color:"#F7464A",
      highlight: "#FF5A5E",
      label: "In-Progress"
    }
  ]

  // var ctxl = $("#lineChartDemo").get(0).getContext("2d");
  // var lineChart = new Chart(ctxl).Line(data);

  // var ctxp = $("#pieChartDemo").get(0).getContext("2d");
  // var pieChart = new Chart(ctxp).Pie(pdata);

</script>