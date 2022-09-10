<div class="app-title">
	<div>
		<h1><i class="fa fa-book"></i> Proveedores</h1>
		<p>Busqueda y creación de nuevos proveedores</p>
	</div>
  	<ul class="app-breadcrumb breadcrumb">
		<li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i> Proveedores</li>
		<!-- <li class="breadcrumb-item"><a href="#"></a></li> -->
  	</ul>
</div>
<div class="row">
  	<div class="col-md-12">
    	<div class="tile">
      		<div class="tile-title-w-btn">
              <p><?= $this->Html->link('<i class="fas fa-plus-circle fa-fw"></i> Nuevo Proveedor', ['action' => 'add'],['escape' => false, 'class' => 'btn btn-primary icon-btn']) ?></p>
      		</div>
			<div class="tile-body">
				<table class="table table-hover table-bordered" id="sampleTable">
					<thead>
						<tr>
							<th>Nombre</th>
							<th>Servicio</th>
							<th>Rfc</th>
							<th>Dirección</th>
							<th>Localidad</th>
							<th>Estado</th>
							<th>País</th>
							<th>Contacto</th>
							<th>Correo</th>
							<th>Teléfono</th>
							<th>Celular</th>
							<!-- <th>Estatus</th> -->
							<th>Acciones</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($proveedores as $proveedor): ?>
							<tr>
								<td> <?= $proveedor->nombre ?></td>
								<td> <?= $proveedor->servicio ?></td>
								<td> <?= $proveedor->rfc ?></td>
								<td> <?= $proveedor->direccion ?></td>
								<td> <?= $proveedor->localidad ?></td>
								<td> <?= $proveedor->has('estado') ? $proveedor->estado->estado : '' ?></td>
								<td> <?= $proveedor->has('pais') ? $proveedor->pais->nombre : '' ?></td>
								<td> <?= $proveedor->contacto ?></td>
								<td> <?= $proveedor->correo ?></td>
								<td> <?= $proveedor->telefono ?></td>
								<td> <?= $proveedor->celular ?></td>
								<td> <?= $this->Html->link('<i class="far fa-edit"></i>', ['action' => 'edit', $proveedor->id],['rel' => 'tooltip', 'escape' => false]) ?></td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
    	</div>
  	</div>
</div>
<?= $this->Html->script(array('plugins/jquery.dataTables.min.js','plugins/dataTables.bootstrap.min.js')) ?>
<script type="text/javascript">$('#sampleTable').DataTable();</script>