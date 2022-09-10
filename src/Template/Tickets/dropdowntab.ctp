<?= $this->Form->control('idProblemaReportado',['id' => 'ticketIdServicio','options' => $queryTab,'class' => 'form-control js-example-responsive','label' => false, 'empty' => 'Servicios',]); ?>
<script>
$(".js-example-responsive").select2({
    width: 'resolve'
    });
</script>
