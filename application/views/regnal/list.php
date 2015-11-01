
<div class="row">
  <div class="col-md-12">
    <h1>Membresía Nacional</h1>

    <ol class="breadcrumb">
      <li><a href="/">Inicio</a></li>
      <li class="active">Regnal</li>
    </ol>
  </div>
</div>

<?php if (!empty($msg_success)): ?>
  <div class="alert alert-success alert-dismissable">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <?php echo $msg_success; ?>
  </div>
<?php endif ?>

<form action="<?php echo (isset($form_action)) ? $form_action:''?>" id="consulta" method="post">
<section class="panel">
  <div class="panel-body">

    <div class="row search-row">
      <div class="col-sm-6">
        <div class="input-group">
          <input type="text" name="search" placeholder="buscar" value="<?php echo $search ?>" class="form-control">
          <span class="input-group-btn">
            <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
          <?php if (!empty($search)): ?>
            <a href="/regnal" class="btn btn-default"><i class="fa fa-undo"></i></a>
          <?php endif ?>

          </span>
        </div>
      </div>

      <div class="col-sm-6 col-btn-add">
        <a href="/regnal/add" class="btn btn-success">
          Agregar Nuevo
        </a>
      </div>
    </div>

    <div class="col-12 table-responsive">
      <table class="table table-hover">
        <thead>
          <tr>
            <th width="1%">#</th>
            <th>Clave</th>
            <th width="30%">Nombre</th>
            <th>Provincia</th>
            <th>Nivel</th>
            <th class="text-center">Opciones</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <td colspan="7">
              &nbsp;
            </td>
          </tr>
        </tfoot>
        <tbody>
        <?php if ($query->num_rows()): ?>

          <?php foreach ($query->result() as $row): ?>

          <tr>
            <td><input type="checkbox" name="del[]" value="<?php echo $row->cum; ?>"></td>
            <td><?php echo $row->cum ?></td>
            <td><?php echo $row->nombre ?></td>
            <td><?php echo $row->provincia ?></td>
            <td><?php echo $row->nivel ?></td>
            <td class="text-center">
              <div class="btn-group table-options">
                <a href="/regnal/edit/<?php echo $row->cum ?>" class="btn btn-default" title="editar"><i class="fa fa-pencil"></i></a>
                <a href="/regnal/delete/<?php echo $row->cum ?>" class="btn btn-danger" title="eliminar"><i class="fa fa-trash-o"></i></a>
              </div>
            </td>
          </tr>

          <?php endforeach ?>

        <?php else: ?>

          <tr>
            <td class="text-center" colspan="6">No se encontraron resultados.</td>
          </tr>

        <?php endif ?>
        </tbody>
      </table>
    </div>

    <div class="row">
      <div class="col-md-12">
        <button type="button" class="btn btn-danger btn-sm" id="btn-delete"><i class="fa fa-trash"></i> Eliminar Seleccion</button>
      </div>

      <div class="col-12 hidden-sm text-center">
        <?php echo $pages ?>
      </div>

      <div class="col-12 visible-sm text-center">
        <?php echo $pages_mobile ?>
      </div>
    </div>

  </div>
</section>
</form>
