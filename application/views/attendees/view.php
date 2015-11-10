
    <div class="row">
      <div class="col-md-12">
        <h1>Ficha de Participante</h1>

        <ol class="breadcrumb">
          <li><a href="/">Inicio</a></li>
          <li><a href="/attendees/search">Búsqueda</a></li>
          <li class="active">Ficha</li>
        </ol>
      </div>
    </div>

    <?php if (!empty($msg_success)): ?>
      <div class="alert alert-success alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <?php echo $msg_success; ?>
      </div>
    <?php endif ?>

    <div class="row">
      <div class="col-md-6">
        <section class="panel panel-default">
          <div class="panel-heading"><i class="fa fa-user  icon-margin-right"></i> Información de Adulto</div>
          <div class="panel-body no-padding">
            <table class="table">
              <tbody>
                <tr>
                  <th>Nombre</th>
                  <td><?php echo $adult->nombre ?></td>
                </tr>
                <tr>
                  <th>Nivel</th>
                  <td><?php echo $adult->nivel ?></td>
                </tr>
                <tr>
                  <th>Provincia</th>
                  <td><?php echo $adult->provincia ?></td>
                </tr>

                <?php if ($elements->num_rows() > 0): ?>
                <tr>
                  <td colspan="2" class="text-center">
                    <button type="button" class="btn btn-default">Cambiar Adulto</button>
                  </td>
                </tr>
                <?php endif ?>

              </tbody>
            </table>
          </div>
        </section>
      </div>

      <div class="col-md-6">
        <section class="panel panel-primary">
          <div class="panel-heading"><i class="fa fa-check-circle icon-margin-right"></i> Detalle de Registro</div>
          <div class="panel-body no-padding">
            <table class="table">
              <tbody>
                <tr>
                  <th>Acampado</th>
                  <td><?php echo $adult->name ?></td>
                </tr>
                <tr>
                  <th>Hora de Llegada</th>
                  <td><?php echo $adult->arrive ?></td>
                </tr>
                <tr>
                  <th>Provincia</th>
                  <td><?php echo $adult->provincia ?></td>
                </tr>
                <tr>
                  <td colspan="2" class="text-center">
                    <a href="/attendees/change-camping/<?php echo $adult->cum ?>" class="btn btn-primary">Cambiar Acampado</a>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </section>
      </div>
    </div>

    <section class="panel panel-default">
      <div class="panel-heading"><i class="fa fa-users icon-margin-right"></i> Elementos a Cargo</div>
      <div class="panel-body">
        <div class="table-responsive">
          <table class="table no-margin">
            <thead>
              <tr>
                <th width="10%">CUM</th>
                <th>Nombre</th>
                <th>Nivel</th>
                <th>Provincia</th>
                <th>Grupo</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($elements->result() as $scout): ?>
                <tr>
                  <td><?php echo $scout->cum ?></td>
                  <td><?php echo $scout->nombre ?></td>
                  <td><?php echo $scout->nivel ?></td>
                  <td><?php echo $scout->provincia ?></td>
                  <td><?php echo $scout->grupo ?></td>
                </tr>
              <?php endforeach ?>
            </tbody>
          </table>
        </div>
      </div>
    </section>
