<?php
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
?>
<head>
    <?= $this->Html->script("https://cdn.jsdelivr.net/npm/sweetalert2@8") ?>
</head>
<script> Swal.fire({type:'error',text:' <?= $message ?>'}); </script>