
    <div class="row">
      <div class="col-md-12">
        <h1>Cambio de Adulto</h1>

        <ol class="breadcrumb">
          <li><a href="/">Inicio</a></li>
          <li><a href="/attendees/search">Búsqueda</a></li>
          <li><a href="/attendees/view/<?php echo $cum ?>">Ficha</a></li>
          <li class="active">Cambio de Adulto</li>
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
        Proporcione el CUM del adulto nuevo. Debe estar vigente, inscrito al evento
        y sin haber registrado llegada al evento.
      </div>
      <div class="panel-body">
        <form action="" method="post" class="form-horizontal bordered-group">

          <?php $error = form_error('cum'); ?>
          <div class="form-group<?php echo ($error != '') ? ' has-error' : ''; ?>">
            <label for="cum" class="col-md-2 control-label">CUM Adulto</label>
            <div class="col-md-3">
              <input type="text" name="cum" id="cum" class="form-control" value="<?php echo set_value('cum', ''); ?>">
            </div>
            <?php echo $error; ?>
          </div>

          <div class="form-group">
            <div class="col-md-3 col-md-offset-2 btn-crud">
              <button type="submit" class="btn btn-primary">Cambiar</button>
              <a href="/attendees/view/<?php echo $cum ?>" class="btn btn-default">Regresar</a>
            </div>
          </div>

        </form>
      </div>
    </section>
