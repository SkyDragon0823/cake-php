<?= $this->Form->control('clienteIndirecto',['onchange' => 'getSucursalCliente()','id' => 'ticketClienteIndirecto','options' => $query,'class' => 'form-control js-example-responsive','label' => false, 'empty' => 'Cliente',]); ?>
<script>
$(".js-example-responsive").select2({
    width: 'resolve'
    });
    function getSucursalCliente(){
        var data = $('#ticketClienteIndirecto').val()
        $.ajax({
            method: 'get',
            url : "<?= $this->Url->build( ['action' => 'dropdown' ] ); ?>",
            data: {keyword:data},
            success: function( response )
            {
                $('#addSucursal' ).html(response);
            }
        });
    }
</script>