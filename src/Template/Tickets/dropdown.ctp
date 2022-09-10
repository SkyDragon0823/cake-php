<?= $this->Form->control('idSucursal',['id' => 'ticketIdSucursal','options' => $query,'class' => 'form-control js-example-responsive', 'required' => true,'label' => false, 'empty' => 'Sucursal',]); ?>
<script>
$(".js-example-responsive").select2({
    width: 'resolve'
    });
</script>
