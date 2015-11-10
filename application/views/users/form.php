
    <div class="row">
      <div class="col-md-12">
        <h1><?php echo $form_title ?></h1>

        <ol class="breadcrumb">
          <li><a href="/">Inicio</a></li>
          <li><a href="/users">Usuarios</a></li>
          <li class="active"><?php echo $breadcrumb ?></li>
        </ol>
      </div>
    </div>

    <?php if (validation_errors() != ''): ?>
      <div class="alert alert-danger alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4>Error</h4>
        La información está incompleta o errónea.
      </div>
    <?php endif ?>

    <section class="panel">
      <div class="panel-heading">
        Proporcione los datos para el usuario del sistema.
        <?php if ($breadcrumb == 'Editar'): ?>
          Si desea cambiar la contraseña, proporcione la nueva en los campos correspondientes.
        <?php endif ?>
      </div>
      <div class="panel-body">
        <form action="" method="post" class="form-horizontal bordered-group">
          <?php $error = form_error('data[name]'); ?>
          <div class="form-group<?php echo ($error != '') ? ' has-error' : ''; ?>">
            <label for="name" class="col-md-2 control-label">Nombre</label>
            <div class="col-md-4">
              <input type="text" name="data[name]" id="name" class="form-control" value="<?php echo set_value('name', $name); ?>">
            </div>
            <?php echo $error; ?>
          </div>

          <?php $error = form_error('data[mail]'); ?>
          <div class="form-group<?php echo ($error != '') ? ' has-error' : ''; ?>">
            <label for="mail" class="col-md-2 control-label">Correo</label>
            <div class="col-md-4">
              <input type="text" name="data[mail]" id="mail" class="form-control" value="<?php echo set_value('mail', $mail); ?>">
            </div>
            <?php echo $error; ?>
          </div>

          <?php $error = form_error('data[user]'); ?>
          <div class="form-group<?php echo ($error != '') ? ' has-error' : ''; ?>">
            <label for="user" class="col-md-2 control-label">Usuario</label>
            <div class="col-md-4">
              <input type="text" name="data[user]" id="user" class="form-control" value="<?php echo set_value('user', $user); ?>">
            </div>
            <?php echo $error; ?>
          </div>

          <?php $error = form_error('data[pass]'); ?>
          <div class="form-group<?php echo ($error != '') ? ' has-error' : ''; ?>">
            <label for="pass" class="col-md-2 control-label">Contraseña</label>
            <div class="col-md-4">
              <input type="password" name="data[pass]" id="pass" class="form-control">
            </div>
            <?php echo $error; ?>
          </div>

          <?php $error = form_error('repeat'); ?>
          <div class="form-group<?php echo ($error != '') ? ' has-error' : ''; ?>">
            <label for="repeat" class="col-md-2 control-label">Repetir</label>
            <div class="col-md-4">
              <input type="password" name="repeat" id="repeat" class="form-control">
            </div>
            <?php echo $error; ?>
          </div>

          <?php $error = form_error('data[active]'); ?>
          <div class="form-group<?php echo ($error != '') ? ' has-error' : ''; ?>">
            <label for="active" class="col-md-2 control-label">Activo</label>
            <div class="col-md-4">
              <input type="hidden" name="data[active]" value="0">
              <input type="checkbox" name="data[active]" value="1" class="js-switch" <?php echo validate_checkbox($active, 1); ?>>
            </div>
            <?php echo $error; ?>
          </div>

          <div class="form-group">
            <div class="col-md-4 col-md-offset-2 btn-crud">
              <button type="submit" class="btn btn-primary">Guardar</button>
              <a href="/users" class="btn btn-default">Regresar</a>
            </div>
          </div>

        </form>
      </div>
    </section>
