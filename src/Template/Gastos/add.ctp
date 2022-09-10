<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Gasto $gasto
 */
?>
<div class="app-title">
    <div>
        <h1><i class="fa fa-users"></i> Gastos</h1>
        <p>Registro y asignación de gastos</p>
    </div>
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i> Gastos</li>
        <li class="breadcrumb-item"><a href="#">Nuevo Gasto</a></li>
    </ul>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="tile">
            <div class="row">
                <div class="col-md-12">
                    <legend><?= __('Nuevo Gasto') ?></legend>
                    <hr>
                </div>
                <div class="col-lg-12">
                    <?php if($ticketsCount == 0) { ?>
                    <p>No hay tickets registrados</p>
                    <?php }else{?>
                        <?php if($countTickets != 1) { ?>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group row">
                                            <label class="control-label col-md-3">Ticket <span class="text-danger">*</span></label>
                                            <div class="col-md-8">
                                                <?php if(isset($ticket) && $ticket != '') : ?>
                                                    <?php foreach ($ticket as $ticket): ?>
                                                        <?= $this->Form->control('idTicketFolio',['id' => 'addGastoFolio','readonly' => true,'class' => 'form-control', 'required' => true, 'placeholder' => 'Ticket','label' => false, 'value' => $ticket->folio ]); ?>
                                                        <?= $this->Form->control('idTicket',['id' => 'addGastoIdTicket','hidden' => 'hidden','readonly' => true,'class' => 'form-control', 'required' => true, 'placeholder' => 'Ticket','label' => false, 'value' => $ticket->id ]); ?>
                                                    <?php endforeach;?>
                                                <?php endif; ?>
                                                <?php if(!isset($ticket)) : ?>
                                                    <?= $this->Form->control('idTicket',['id' => 'addGastoIdTicket','options' => $tickets,'class' => 'form-control', 'required' => true,'label' => false,'empty' => 'Tickets']); ?>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <?php if(iterator_count($intervenciones)) : ?>
                                        <div class="form-group row">
                                            <label class="control-label col-md-3">Intervención</label>
                                            <div class="col-md-8">
                                                <?= $this->Form->control('idIntervencion',['id' => 'addGastoIdinter','options' => $intervenciones,'class' => 'form-control','label' => false,'empty' => 'Intervención']); ?>
                                            </div>
                                        </div>
                                        <?php endif; ?>
                                        <div class="form-group row">
                                            <label class="control-label col-md-3">Deducible <span class="text-danger">*</span></label>
                                            <div class="col-md-8">
                                                <?= $this->Form->control('deducible', [
                                                    'options' => [1 => 'Si', 0 => 'No'],
                                                    'class' => 'form-control', 'required' => true, 'label' => false, 'empty' => 'Deducible',
                                                    'id' => 'deducibleGastos'
                                                ]); ?>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="control-label col-md-3">Tipo de gasto <span class="text-danger">*</span></label>
                                            <div class="col-md-8">
                                                <select class="form-control" name="tiposGasto" id="formTipoGasto" required>
                                                    <option value=''>Tipo gasto</option>
                                                    <option value="consumibles">Consumibles</option>
                                                    <option value="hospedaje">Hospedaje</option>
                                                    <option value="trasnporte">Trasnporte</option>
                                                    <option value="caseta">Caseta</option>
                                                    <option value="combustible">Combustible</option>
                                                    <option value="alimentacion">Alimentación</option>
                                                    <option value="paqueteria">Paquetería</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="control-label col-md-3">Concepto <span class="text-danger">*</span></label>
                                            <div class="col-md-8">
                                                <?= $this->Form->control('conceptoGasto',['class' => 'form-control', 'required' => true, 'placeholder' => 'Concepto gasto','label' => false,'id' => 'conceptoGasto']); ?>
                                            </div>
                                        </div>
                                        <div class="form-group row" id="folioFiscal">
                                            <label class="control-label col-md-3">Folio Fiscal <span class="text-danger">*</span></label>
                                            <div class="col-md-8">
                                                <?= $this->Form->control('UIDFactura',['id' => 'folioFiscalForm','class' => 'form-control', 'placeholder' => 'Folio fiscal','label' => false,'id' => 'folioFiscalAdd']); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group row">
                                            <label class="control-label col-md-3">Monto <span class="text-danger">*</span></label>
                                            <div class="col-md-8">
                                                <?= $this->Form->control('montoSinIva',['hidden' => true,'class' => 'form-control', 'required' => true, 'placeholder' => 'Monto','label' => false,'id' => 'montoSinIvaAdd']); ?>
                                                <?= $this->Form->control('montoTotal',['class' => 'form-control', 'required' => true, 'placeholder' => 'Monto','label' => false,'id' => 'montoTotalGasto']); ?>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="control-label col-md-3">Detalles</label>
                                            <div class="col-md-8">
                                                <?= $this->Form->control('detalles',['class' => 'form-control', 'required' => true, 'placeholder' => 'Detalles','label' => false, 'type' => 'textarea','id' => 'detallesGastos']); ?>
                                            </div>
                                        </div>
                                        <div class="col-md-2 m-auto">
                                            <button type="button" onclick="gastoUpdate()" id="btnFormAddProducto" class="btn btn-primary"> <i class="fa fa-plus-circle fa-lg fa-fw"></i> Agregar</button>
                                        </div>
                                    </div>
                                </div>
                                <?= $this->Form->create($gasto,['class' => 'form-horizontal', 'id' => 'formGastos']) ?>
                                <legend>Gastos</legend>
                                <div class="row">
                                    <div class="col-md-12">
                                        <table class="table table-hover table-bordered" id="tablaGastos">
                                            <thead>
                                                <tr>
                                                    <th>Tipo de gasto</th>
                                                    <th>Concepto</th>
                                                    <th>Folio Fiscal</th>
                                                    <th>Monto</th>
                                                    <th>Detalles</th>
                                                    <th>Deducible</th>
                                                    <th style="width: 50px;">Acciones</th>
                                                </tr>
                                            </thead>
                                        </table>
                                        <div class="offset-md-10 ">
                                            <button type="button" class="btn btn-primary deleteRow"> Eliminar gastos</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="tile-footer">
                                    <?= $this->Html->link('<i class="fas fa-chevron-left fa-fw"></i> Regresar', ['action' => 'index'],['escape' => false, 'class' => 'btn btn-primary']) ?>
                                    <?= $this->Form->button(_('<i class="fa fa-plus-circle fa-lg fa-fw"></i> Guardar'),['class' => 'btn btn-primary','type' => 'button', 'id' => 'btnSubmitGasto']); ?>
                                </div>
                            <?= $this->Form->end() ?>
                        <?php }else{?>
                            <div class="row">
                                <div class="col-lg-6">
                                    <p>No hay tickets registrados para el usuario: <?= $current_user['nombre'] . ' ' . $current_user['apellido1'] ?>, no se pueden generar gastos</p>
                                    <?= $this->Html->link('<i class="fas fa-chevron-left fa-fw"></i> Regresar', ['action' => 'index'],['escape' => false, 'class' => 'btn btn-primary']) ?>
                                </div>
                            </div>
                        <?php }?>
                    <?php }?>
                </div>
        </div>
    </div>
</div>
<script>
function gastoUpdate() {
    validate();
}

function gastoAddToTable() {
    // First check if a <tbody> tag exists, add one if not
    if ($("#tablaGastos tbody").length == 0) {
        $("#tablaGastos").append("<tbody id='tbGastosAdd'></tbody>");
    }

    $("#tablaGastos tbody").append(
        "<tr>" +
            "<td hidden> <input hidden name='idTicket[]' value='"+ $('#addGastoIdTicket').val() +"' > </td>" +
            "<td hidden> <input hidden name='idintervencion[]' value='"+ $('#addGastoIdinter').val() +"' > </td>" +
            "<td> <input hidden name='tiposGasto[]' value='"+ $('#formTipoGasto').val() +"' >" + $("#formTipoGasto").find('option:selected').text() + "</td>" +
            "<td> <input hidden name='conceptoGasto[]' value='"+ $('#conceptoGasto').val() +"' >" + $("#conceptoGasto").val() + "</td>" +
            "<td> <input hidden name='UIDFactura[]' value='"+ $('#folioFiscalAdd').val() +"' >" + $("#folioFiscalAdd").val() + "</td>" +
            "<td> <input hidden name='montoTotal[]' value='"+ $('#montoTotalGasto').val() +"' >" + $("#montoTotalGasto").val() + "</td>" +
            "<td> <input hidden name='detalles[]' value='"+ $('#detallesGastos').val() +"' >" + $("#detallesGastos").val() + "</td>" +
            "<td> <input hidden name='deducible[]' value='"+ $('#deducibleGastos').val() +"' >" + $("#deducibleGastos").find('option:selected').text() + "</td>" +
            "<td> <input type='checkbox' name='record'>" +
            "</td>" +
        "</tr>"
    );
}

function formClear() {
    $("#addGastoIdinter").val('');
    $("#deducibleGastos").val('');
    $("#formTipoGasto").val('');
    $("#conceptoGasto").val('');
    $("#folioFiscalAdd").val('');
    $("#montoTotalGasto").val('');
    $("#detallesGastos").val('');
}

function validate() {
    var idTicket = $("#addGastoIdTicket").val();
    var deducible = $("#deducibleGastos").val();
    var tipoGasto = $("#formTipoGasto").val();
    var conGato = $("#conceptoGasto").val();
    var folioFi = $("#folioFiscalAdd").val();
    var totalgasto = $("#montoTotalGasto").val();

    if(deducible == 0) {
        if (idTicket == '' || deducible == '' || tipoGasto == '' || conGato == '' || totalgasto == '') {
            Swal.fire('','Completa todos los campos','error');
            return false;
        }
    } else {
        if (idTicket == '' || deducible == '' || tipoGasto == '' || conGato == '' || folioFi == '' || totalgasto == '') {
            Swal.fire('','Completa todos los campos','error');
            return false;
        }
    }

    
    gastoAddToTable();
    formClear();
}

$(".deleteRow").click(function(){
    $("#tablaGastos tbody").find('input[name="record"]').each(function(){
        if($(this).is(":checked")){
            $(this).parents("tr").remove();
        }
    });
});

$( document ).ready(function() {
    
    $('#deducibleGastos').change(function(){
        var deducible = $('#deducibleGastos').val();
        var montoTotalGasto = $('#montoTotalGasto').val();
        
        if(deducible == 1) {
            var montoSinIva = montoTotalGasto / 1.16;
            $('#montoSinIvaAdd').val(montoSinIva);
            $('#folioFiscalForm').attr('required','required');
            $('#folioFiscal').removeAttr('hidden');
        } else if(deducible == 0) {
            $('#montoSinIvaAdd').val(montoTotalGasto);
            $('#folioFiscalAdd').val('');
            $('#folioFiscal').attr('hidden','hidden');
            $('#folioFiscalForm').removeAttr('required');
        }

    });

});

$('#btnSubmitGasto').click(function(){
    var csrfToken = <?= json_encode($this->request->getParam('_csrfToken')) ?>;
    
    var arr = $("#formGastos tr").get().map(function (tr) {
        return $('input', tr).get().reduce(function (obj, input) {
            obj[input.name.replace(/\[.*\]/,'')] = input.value;
            return obj;
        }, {});
    });

    $.ajax({
            headers: {
                'X-CSRF-Token': csrfToken
            },
            method: 'post',
            url : "<?= $this->Url->build( ['action' => 'addvalues' ] ); ?>",
            data: {gastos:arr},
            success: function(  )
            {
                window.location.href = "<?= $this->Url->build( ['action' => 'index' ] ); ?>";
            }
        });

});


</script>