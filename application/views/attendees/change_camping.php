
    <div class="row">
      <div class="col-md-12">
        <h1>Cambio de Acampado</h1>

        <ol class="breadcrumb">
          <li><a href="/">Inicio</a></li>
          <li><a href="/attendees/search">Búsqueda</a></li>
          <li><a href="/attendees/view/<?php echo $cum ?>">Ficha</a></li>
          <li class="active">Cambio de Acampado</li>
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
      <div class="panel-heading">Seleccione el área de acampado</div>
      <div class="panel-body">
        <form action="" method="post" class="form-horizontal">
          <div class="form-group">
            <div class="col-md-6">
              <table class="table table-hover camping-grid">
                <thead>
                  <tr>
                    <th width="5%">&nbsp;</th>
                    <th class="text-center">Campo</th>
                    <th class="text-center">Ocupación</th>
                  </tr>
                </thead>
                <tbody>
                <?php foreach ($campings->result() as $camp): ?>
                  <tr>
                    <td width="5%"><input type="radio" name="camp" value="<?php echo $camp->id ?>"></td>
                    <td><?php echo $camp->name ?></td>
                    <td class="text-right"><?php echo $camp->occupation ?></td>
                  </tr>
                <?php endforeach ?>
                </tbody>
              </table>
            </div>
          </div>

          <div class="form-group">
            <div class="col-md-4 col-md-offset-2 btn-crud">
              <button type="submit" class="btn btn-primary">Guardar</button>
              <a href="/attendees/view/<?php echo $cum ?>" class="btn btn-default">Regresar</a>
            </div>
          </div>

        </form>
      </div>
    </section>
