
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

    <?php if ($this->session->flashdata('msg_success')): ?>
      <div class="alert alert-success alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <?php echo $this->session->flashdata('msg_success'); ?>
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
                <tr>
                  <td colspan="2" class="text-center">
                    <?php if ($elements->num_rows() > 0): ?>
                    <a href="/attendees/change-responsible/<?php echo $adult->cum ?>" class="btn btn-default">Cambiar Adulto</a>
                    <?php endif ?>
                  </td>
                </tr>
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
                <th>Registro</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <td colspan="6" class="text-center">
                  <a href="/attendees/elements/<?php echo $adult->cum ?>" class="btn btn-default">Agregar / Modificar</a>
                </td>
              </tr>
            </tfoot>
            <tbody>
              <?php foreach ($elements->result() as $scout): ?>
                <tr>
                  <td><?php echo $scout->cum ?></td>
                  <td><?php echo $scout->nombre ?></td>
                  <td><?php echo $scout->nivel ?></td>
                  <td><?php echo $scout->provincia ?></td>
                  <td><?php echo $scout->grupo ?></td>
                  <td><?php echo $scout->arrive ?></td>
                </tr>
              <?php endforeach ?>

              <?php if ($elements->num_rows() == 0): ?>
              <tr>
                <td colspan="6" class="text-center">No tiene elementos a su cargo</td>
              </tr>
              <?php endif ?>

            </tbody>
          </table>
        </div>
      </div>
    </section>
