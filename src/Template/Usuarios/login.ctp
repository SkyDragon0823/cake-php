<div class="login-box">
  <!-- <?= $this->Flash->render() ?> -->
  <?= $this->Form->create('User', array('type' => 'file', 'class' => 'login-form')); ?>
    <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>Iniciar Sesión</h3>
    <div class="form-group">
      <?php echo $this->Form->control('Usuario',['name' => 'username' ,'class' => 'form-control', 'required' => true, 'placeholder' => 'Usuario']); ?>
    </div>
    <div class="form-group">
      <?php echo $this->Form->control('Contraseña',['name'=> 'password','class' => 'form-control', 'required' => true, 'type' => 'password', 'placeholder' => 'Contraseña']); ?>
    </div>
    <div class="form-group text-center">
      <div class="utility">
        <p class="semibold-text mb-4"><a href="#" data-toggle="flip">Olvide la contraseña</a></p>
      </div>
    </div>
    <div class="form-group btn-container">
      <?= $this->Form->button(__('Iniciar Sesión'), ['class' => 'btn btn-primary btn-block']); ?>
    </div>
    <?= $this->Form->end() ?>
  
  <!-- <form class="forget-form" action="index.html"> -->
  <?php
      echo $this->Form->create('User/password',['class' => 'forget-form']);
  ?>
    <h3 class="login-head"><i class="fa fa-lg fa-fw fa-lock"></i>¿Olvidaste tu contraseña?</h3>
    <div class="form-group">
      <?php echo $this->Form->control('Correo',['class' => 'form-control', 'required' => true,'name' => 'correo','placeholder' => 'Correo', 'required' => true]); ?>
      <!-- <label class="control-label">Correo</label>
      <input class="form-control" type="text" placeholder="Correo"> -->
    </div>
    <div class="form-group btn-container">
      <?php echo $this->Form->button(_('<i class="fa fa-unlock fa-lg fa-fw"></i> Reset'),['class' => 'btn btn-primary btn-block']); ?>
      <!-- <button class="btn btn-primary btn-block"><i class="fa fa-unlock fa-lg fa-fw"></i>RESET</button> -->
    </div>
    <div class="form-group mt-3">
      <p class="semibold-text mb-0"><a href="#" data-toggle="flip"><i class="fa fa-angle-left fa-fw"></i> Back to Login</a></p>
    </div>
  <?php echo $this->Form->end(); ?>
</div>