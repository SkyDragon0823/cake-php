<div class="app-title">
	<div>
		<h1><i class="fa fa-building"></i> Clientes</h1>
		<p>Busqueda y creación de nuevos clientes</p>
	</div>
  	<ul class="app-breadcrumb breadcrumb">
		<li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
		<li class="breadcrumb-item"><a href="#">Clientes</a></li>
  	</ul>
</div>
<div class="row">
  	<div class="col-md-12">
    	<div class="tile">
      		<div class="tile-title-w-btn">
			  	<p><?= $this->Html->link('<i class="fas fa-plus-circle fa-fw"></i> Nuevo Clientes', ['action' => 'add'],['escape' => false, 'class' => 'btn btn-primary icon-btn']) ?></p>
      		</div>
			<div class="tile-body">
				<table class="table table-hover table-bordered" id="sampleTable">
					<thead>
						<tr>
							<th>Nombre</th>
							<th>Dirección</th>
							<th>Teléfono</th>
							<th>Protocolo</th>
							<th>Acciones</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($clientes as $clientes): ?>
						<tr>
						<td><?= $clientes->nombre ?></td>
						<td><?= $clientes->direccion ?></td>
						<td><?= $clientes->telefono ?></td>
						<td><?= $clientes->protocolo ?></td>
						<td>
							<?= $this->Html->link('<i class="far fa-edit" data-toggle="tooltip" data-placement="top" title="Editar"></i>', ['action' => 'edit', $clientes->id],['rel' => 'tooltip', 'escape' => false]) ?>
							<?= $this->Html->link('<i class="far fa-address-book" data-toggle="tooltip" data-placement="top" title="Agregar Sucursal"></i>', ['controller' => 'Sucursales','action' => 'add', $clientes->id],['rel' => 'tooltip', 'escape' => false]) ?>
						</td>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
    	</div>
  	</div>
</div>
<?= $this->Html->script(array('plugins/jquery.dataTables.min.js','plugins/dataTables.bootstrap.min.js')) ?>
<script type="text/javascript">$('#sampleTable').DataTable();
$(".js-example-responsive").select2({
            width: 'resolve' // need to override the changed default
        });
</script>
