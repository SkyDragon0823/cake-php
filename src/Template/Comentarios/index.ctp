<?php foreach ($comentarios as $comentario): ?>
    <div class="card mb-3">
        <?php if($comentario->has('autor') && $comentario->autor->tipoUsuario == 4) { ?>
        <div class="card-header alert alert-primary mb-0">
        <?php } elseif(!$comentario->has('autor')){?>
        <div class="card-header alert alert-warning mb-0">
        <?php } else{?>
        <div class="card-header alert alert-success mb-0">
        <?php } ?>
            <div class="row">
                <div class="col align-self-start">
                    <?= $comentario->created->i18nFormat('dd-MM-yyyy hh:mm a') ?>
                </div>
                <div class="col">
                <?= $comentario->has('titulo') ? $comentario->titulo : '' ?>
                </div>
                <div class="col align-self-end text-right"> <?= $comentario->has('autor') ? $comentario->autor->nombre .' '. $comentario->autor->apellido1 .' '. $comentario->autor->apellido2 : 'Sistema' ?></div>
            </div>
        </div>
        <?php if($comentario->has('comentario') ) { ?>
            <div class="card-body p-2">
                <?= $comentario->comentario ?>
            </div>
        <?php }?>
    </div>
<?php endforeach; ?>