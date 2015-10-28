
    <div class="row">
      <div class="col-md-12">
        <h1><?php echo $form_title ?></h1>

        <ol class="breadcrumb">
          <li><a href="/">Inicio</a></li>
          <li><a href="/regnal">Miembros</a></li>
          <li class="active"><?php echo $breadcrumb ?></li>
        </ol>
      </div>
    </div>

    <?php if (validation_errors() != ''): ?>
      <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert">x</button>
        <h4>Error</h4>
        La información está incompleta o errónea.
      </div>
    <?php endif ?>

    <section class="panel">
      <div class="panel-body">
        <form action="" method="post" class="form-horizontal">

          <?php $error = form_error('data[cum]'); ?>
          <div class="form-group<?php echo ($error != '') ? ' has-error' : ''; ?>">
            <label for="cum" class="col-lg-2 control-label">Clave Única</label>
            <div class="col-lg-3">
              <input type="text" name="data[cum]" id="cum" class="form-control" value="<?php echo set_value('cum', $cum); ?>">
            </div>
            <?php echo $error; ?>
          </div>

          <?php $error = form_error('data[nombre]'); ?>
          <div class="form-group<?php echo ($error != '') ? ' has-error' : ''; ?>">
            <label for="nombre" class="col-lg-2 control-label">Nombre</label>
            <div class="col-lg-3">
              <input type="text" name="data[nombre]" id="nombre" class="form-control" value="<?php echo set_value('nombre', $nombre); ?>">
            </div>
            <?php echo $error; ?>
          </div>

          <?php $error = form_error('data[provincia]'); ?>
          <div class="form-group<?php echo ($error != '') ? ' has-error' : ''; ?>">
            <label for="provincia" class="col-lg-2 control-label">Provincia</label>
            <div class="col-lg-3">
              <input type="text" name="data[provincia]" id="provincia" class="form-control" value="<?php echo set_value('provincia', $provincia); ?>">
            </div>
            <?php echo $error; ?>
          </div>

          <?php $error = form_error('data[localidad]'); ?>
          <div class="form-group<?php echo ($error != '') ? ' has-error' : ''; ?>">
            <label for="localidad" class="col-lg-2 control-label">Localidad</label>
            <div class="col-lg-3">
              <input type="text" name="data[localidad]" id="localidad" class="form-control" value="<?php echo set_value('localidad', $localidad); ?>">
            </div>
            <?php echo $error; ?>
          </div>

          <?php $error = form_error('data[grupo]'); ?>
          <div class="form-group<?php echo ($error != '') ? ' has-error' : ''; ?>">
            <label for="grupo" class="col-lg-2 control-label">Grupo</label>
            <div class="col-lg-3">
              <input type="text" name="data[grupo]" id="grupo" class="form-control" value="<?php echo set_value('grupo', $grupo); ?>">
            </div>
            <?php echo $error; ?>
          </div>

          <?php $error = form_error('data[nivel]'); ?>
          <div class="form-group<?php echo ($error != '') ? ' has-error' : ''; ?>">
            <label for="nivel" class="col-lg-2 control-label">Nivel</label>
            <div class="col-lg-3">
              <input type="text" name="data[nivel]" id="nivel" class="form-control" value="<?php echo set_value('nivel', $nivel); ?>">
            </div>
            <?php echo $error; ?>
          </div>

          <?php $error = form_error('data[vigencia]'); ?>
          <div class="form-group<?php echo ($error != '') ? ' has-error' : ''; ?>">
            <label for="vigencia" class="col-lg-2 control-label">Vigencia</label>
            <div class="col-lg-3">
              <input type="text" name="data[vigencia]" id="vigencia" class="form-control" value="<?php echo set_value('vigencia', $vigencia); ?>">
            </div>
            <?php echo $error; ?>
          </div>

          <div class="form-group">
            <div class="col-lg-3 col-sm-offset-2 btn-crud">
              <button type="submit" class="btn btn-success">Guardar</button>
              <a href="/regnal" class="btn btn-default">Regresar</a>
            </div>
          </div>

        </form>
      </div>
    </section>
