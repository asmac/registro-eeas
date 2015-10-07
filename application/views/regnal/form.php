
    <div class="row">
      <div class="col-md-12">
        <h1><?php echo $form_title ?></h1>

        <ol class="breadcrumb">
          <li><a href="/users">Inicio</a></li>
          <li>Usuarios</li>
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

          <?php $error = form_error('data[nombre]'); ?>
          <div class="form-group<?php echo ($error != '') ? ' has-error' : ''; ?>">
            <label for="nombre" class="col-lg-2 control-label">Nombre</label>
            <div class="col-lg-3">
              <input type="text" name="data[nombre]" id="nombre" class="form-control" value="<?php echo set_value('nombre', $nombre); ?>">
            </div>
            <?php echo $error; ?>
          </div>

        </form>
      </div>
    </section>
