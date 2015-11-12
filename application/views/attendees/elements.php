
	  <div class="row">
      <div class="col-md-12">
        <h1>Elementos</h1>

        <ol class="breadcrumb">
          <li><a href="/">Inicio</a></li>
          <li><a href="/attendees/search">Búsqueda</a></li>
          <li><a href="/attendees/view/<?php echo $cum ?>">Ficha</a></li>
          <li class="active">Elementos</li>
        </ol>
      </div>
    </div>

    <section class="panel">
      <div class="panel-heading">Proporcione el CUM del elemento a registrar.</div>
      <div class="panel-body">
        <form action="" method="post" class="form-horizontal">
          <div class="form-group">
            <div class="col-md-4 col-md-offset-2">
              <div class="input-group">
                <input type="text" name="add_element" id="add_element" class="form-control" value="">
                <span class="input-group-btn">
                  <button id="validate_element" type="button" class="btn btn-primary">Verificar</button>
                </span>
              </div>
            </div>
          </div>
          <input type="hidden" name="camping" id="camping" value="<?php echo $adult->id_camping ?>">
          <input type="hidden" name="responsible" id="responsible" value="<?php echo $adult->cum ?>">
        </form>
      </div>
    </section>

    <section class="panel">
      <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-hover element-grid-add">
              <thead>
                <tr>
                  <th>CUM</th>
                  <th>Nombre</th>
                  <th>Nivel</th>
                  <th>Grupo</th>
                  <th>Provincia</th>
                  <th>&nbsp;</th>
                </tr>
              </thead>
              <tbody>
              <?php foreach ($elements->result() as $scout): ?>
                <tr>
                  <td><?php echo $scout->cum ?></td>
                  <td><?php echo $scout->nombre ?></td>
                  <td><?php echo $scout->nivel ?></td>
                  <td class="text-center"><?php echo $scout->grupo ?></td>
                  <td><?php echo $scout->provincia ?></td>
                  <td width="5%" class="text-center"><a id="<?php echo $scout->cum ?>" href="#" class="btn btn-danger btn-sm delete-scout"><i class="fa fa-trash"></i></a></td>
                </tr>
              <?php endforeach ?>

              </tbody>
            </table>
          </div>

          <div class="text-center">
            <a href="/attendees/view/<?php echo $cum ?>" class="btn btn-primary">Regresar</a>
          </div>
        </div>
      </div>
    </section>

    <script type="text/html" id="row-tpl">
      <tr>
        <td data-content="cum"></td>
        <td data-content="nombre"></td>
        <td data-content="nivel"></td>
        <td data-content="grupo" class="text-center"></td>
        <td data-content="provincia"></td>
        <td width="5%" class="text-center"><a data-id="cum" href="#" class="btn btn-danger btn-sm delete-scout"><i class="fa fa-trash"></i></a></td>
      </tr>
    </script>


