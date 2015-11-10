
    <div class="row">
      <div class="col-md-12">
        <h1><?php echo $form_title ?></h1>

        <ol class="breadcrumb">
          <li><a href="/">Inicio</a></li>
          <li><a href="/campings">Campos</a></li>
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
        Proporcione el nombre del campo, procure que sea único para ser fácilmente identificable.
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

          <div class="form-group">
            <div class="col-md-3 col-md-offset-2 btn-crud">
              <button type="submit" class="btn btn-primary">Guardar</button>
              <a href="/campings" class="btn btn-default">Regresar</a>
            </div>
          </div>

        </form>
      </div>
    </section>
