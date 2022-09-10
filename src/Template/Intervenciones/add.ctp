<div class="app-title">
    <div>
        <h1><i class="fa fa-building"></i>Nueva Intervención</h1>
        <p>Registro Intervenciones</p>
    </div>
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i> Tickets</li>
        <li class="breadcrumb-item"><a href="#"> Intervenciones</a></li>
        <li class="breadcrumb-item"><a href="#"> Agregar Intervención</a></li>
    </ul>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="tile">
            <div class="row">
                <div class="col-md-12">
                    <legend><?= __('Nueva Intervención') ?></legend>
                    <hr>
                </div>
                <div class="col-lg-12">
                <?php if($ticketsCount == 0) {?>
                    <p>No hay tickets registrados</p>                
                <?php } else {?>
                
                    <?= $this->Form->create($intervencione,['class' => 'form-horizontal']) ?>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group row">
                                    <label class="control-label col-md-3"> Ticket Folio</label>
                                    <div class="col-md-8">
                                        <?php if(isset($ticket) && $ticket != '') : ?>
                                            <?php foreach ($ticket as $ticket): ?>
                                                <?= $this->Form->control('idTicketFolio',['readonly' => true,'id' => 'interFolio','class' => 'form-control', 'required' => true, 'placeholder' => 'Ticket','label' => false, 'value' => $ticket->folio ]); ?>
                                                <?= $this->Form->control('idTicket',['hidden' => 'hidden','readonly' => true,'id' => 'interIdTicket','class' => 'form-control', 'required' => true, 'placeholder' => 'Ticket','label' => false, 'value' => $ticket->id ]); ?>
                                            <?php endforeach;?>
                                        <?php endif; ?>
                                        <?php if(!isset($ticket)) : ?>
                                            <?= $this->Form->control('idTicket',['options' => $tickets,'class' => 'form-control', 'required' => true, 'placeholder' => 'Ticket','label' => false,'empty' => 'Tickets']); ?>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="form-group row hidden" hidden>
                                    <label class="control-label col-md-3">Folio</label>
                                    <div class="col-md-8" id="folioInterForm">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-3">Subcontrata</label>
                                    <div class="col-md-8">
                                        <?= $this->Form->control('subcontrata',['options' => ['No','Si'],'id' => 'subcontrata','class' => 'form-control', 'empty' => 'Subcontrata','label' => false]); ?>
                                    </div>
                                </div>
                                <div class="form-group row" id="subcontrataAdd" hidden>
                                    <label class="control-label col-md-3">Técnico Subcontratado</label>
                                    <div class="col-md-8">
                                        <?= $this->Form->control('idTecnicoSub',['id' => 'idTecnicoSub','options' => $tSubcontrata,'class' => 'form-control w-100','label' => false, 'empty' => 'Técnico Subcontrata']); ?>
                                    </div>
                                </div>
                                <div class="form-group row" id="liderAdd">
                                    <label class="control-label col-md-3">Técnico Lider</label>
                                    <div class="col-md-8">
                                        <?= $this->Form->control('idTecnicoLider',['id' => 'idTecnicoLider','options' => $tLider,'class' => 'form-control js-example-responsive','label' => false, 'empty' => 'Técnico lider']); ?>
                                    </div>
                                </div>
                                <div class="form-group row" id="cuadrillaAdd">
                                    <label class="control-label col-md-3">Cuadrilla</label>
                                    <div class="col-md-8">
                                        <?= $this->Form->control('idTecnico',['id' => 'idTecnico','options' => $tecnicos,'class' => 'form-control js-example-basic-multiple','label' => false, 'multiple' =>'multiple']); ?>
                                    </div>
                                </div>
                                <div class="form-group row" id="vehiculoAdd">
                                    <label class="control-label col-md-3">Vehículo</label>
                                    <div class="col-md-8">
                                        <?= $this->Form->control('idVehiculo',['id' => 'idVehiculo','options' => $vehiculos,'class' => 'form-control', 'required' => true, 'placeholder' => 'Vehículo','label' => false, 'empty' => 'Vehículos']); ?>
                                    </div>
                                </div>
                                <?= $this->Form->control('estatus',['hidden' => true, 'value' => 1, 'label' => false]) ?>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="control-label col-md-3">Descripción del servicio</label>
                                    <div class="col-md-8">
                                        <?= $this->Form->control('descripcion',['class' => 'form-control', 'required' => true, 'placeholder' => 'Descripción del servicio','label' => false,'type' => 'textarea']); ?>
                                    </div>
                                </div>
                                <!-- <div class="form-group row">
                                    <label class="control-label col-md-3">Fecha de Atención</label>
                                    <div class="col-md-8">
                                        <?= $this->Form->control('fechaAtencion',['class' => 'form-control','label' => false]); ?>
                                    </div>
                                </div> -->
                                <div class="form-group row">
                                    <label class="control-label col-md-3">Sla's</label>
                                    <div class="col-md-8">
                                        <?= $this->Form->control('slas',['class' => 'form-control', 'required' => true, 'placeholder' => 'Slas','label' => false, 'empty' => 'Slas']); ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-3">Folio de apertura</label>
                                    <div class="col-md-8">
                                        <?= $this->Form->control('folioApertura',['class' => 'form-control', 'placeholder' => 'Folio de apertura','label' => false]); ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-3">Folio de cierre</label>
                                    <div class="col-md-8">
                                        <?= $this->Form->control('folioCierre',['class' => 'form-control', 'placeholder' => 'Folio de cierre','label' => false]); ?>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                        <div class="tile-footer">
                            <?= $this->Html->link('<i class="fas fa-chevron-left fa-fw"></i> Intervenciones', ['action' => 'index'],['escape' => false, 'class' => 'btn btn-primary']) ?>
                            <?= $this->Html->link('<i class="fas fa-chevron-left fa-fw"></i> Tickets', ['controller' => 'Tickets','action' => 'index'],['escape' => false, 'class' => 'btn btn-primary']) ?>
                            <?= $this->Form->button(_('<i class="fa fa-plus-circle fa-lg fa-fw"></i> Guardar'),['class' => 'btn btn-primary']); ?>
                        </div>
                    <?= $this->Form->end() ?>
                    <?php } ?>
                </div>
        </div>
    </div>
</div>
<?= $this->Html->script(array('plugins/select2.min.js')) ?>
<script type="text/javascript">
$(".js-example-responsive").select2({
    width: 'resolve' // need to override the changed default
});
$(".js-example-basic-multiple").select2({
    placeholder: "Selecciona un tecnico"
});
getFolio();
function getFolio(){
    var data = $('#interIdTicket').val()
    var folio = $('#interFolio').val()
    $.ajax({
        method: 'get',
        url : "<?= $this->Url->build( ['action' => 'getfolio' ] ); ?>",
        data: {keyword:data,folio:folio},
        success: function( response )
        {
            $('.hidden').removeAttr('hidden');
            $('#folioInterForm').html(response);
        }
    });
}

$('#subcontrata').change(function(){
    var subcontrata = $('#subcontrata').val();
    if(subcontrata == 1) {
        $('#liderAdd').attr('hidden','hidden');
        $('#idTecnicoLider').val('');
        $('#cuadrillaAdd').attr('hidden','hidden');
        $('#idTecnico').val('');
        $('#vehiculoAdd').attr('hidden','hidden');
        $('#idVehiculo').val('');
        $('#subcontrataAdd').removeAttr('hidden');
    } else {
        $('#liderAdd').removeAttr('hidden');
        $('#cuadrillaAdd').removeAttr('hidden');
        $('#vehiculoAdd').removeAttr('hidden');
        $('#subcontrataAdd').attr('hidden','hidden');
        $('#idTecnicoSub').val('');
      
    }
});
</script>