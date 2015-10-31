
    <div class="row">
      <div class="col-md-12">
        <h1>Registro</h1>

        <ol class="breadcrumb">
          <li><a href="/">Inicio</a></li>
          <li class="active">Registro</li>
        </ol>
      </div>
    </div>

    <form action="" method="post" class="form-horizontal">
      <div class="fuelux">
        <div id="wizard" data-initialize="wizard" class="wizard">
          <div class="steps-container">
            <ul class="steps">
              <li data-step="1" class="active">Adulto<span class="chevron"></span></li>
              <li data-step="2">Elementos<span class="chevron"></span></li>
              <li data-step="3">Acampado<span class="chevron"></span></li>
            </ul>
          </div>
          <div class="actions">

          </div>
          <div class="step-content">
            <div class="step-pane active sample-pane alert" data-step="1">
              <h2>Registro de Adulto</h2>

              <div class="form-group">
                <label for="responsible" class="col-md-2 control-label">CUM Adulto</label>
                <div class="col-md-4">
                  <div class="input-group">
                    <input type="text" name="responsible" id="responsible" class="form-control" value="">
                    <span class="input-group-btn">
                      <button id="verify_adult" type="button" class="btn btn-default">Verificar</button>
                    </span>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <div class="col-md-4 col-md-offset-2">
                  <p id="adult-name" class="form-control-static"></p>
                </div>
              </div>

              <div class="form-group">
                <label for="lead" class="col-md-2 control-label">Responsable</label>
                <div class="col-md-4">
                  <input type="checkbox" name="lead" value="1" class="js-switch">
                </div>
              </div>

              <div class="form-group">
                <div class="col-md-4 col-md-offset-2">
                  <button type="button" id="first-next" class="btn btn-primary disabled">Siguiente</button>
                </div>
              </div>
            </div>

            <div class="step-pane sample-pane" data-step="2">
              <h2>Registro de Elementos</h2>

              <div class="form-group">
                <label for="element" class="col-md-2 control-label">CUM</label>
                <div class="col-md-4">
                  <div class="input-group">
                    <input type="text" name="element" id="element" class="form-control" value="">
                    <span class="input-group-btn">
                      <button id="verify_element" type="button" class="btn btn-default">Verificar</button>
                    </span>
                  </div>
                </div>
              </div>

              <div class="table-responsive">
                <table class="table table-hover element-grid">
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

                  </tbody>
                </table>
              </div>

              <div class="form-group">
                <div class="col-md-4 col-md-offset-2">
                  <button type="button" id="second-back" class="btn btn-info">Regresar</button>
                  <button type="button" id="second-next" class="btn btn-primary disabled">Siguiente</button>
                </div>
              </div>
            </div>

            <div class="step-pane sample-pane" data-step="3">
              <h2>Asignación de Acampado</h2>

              <div class="form-group">
                <div class="col-md-4 col-md-offset-2">
                  <button type="button" id="third-back" class="btn btn-info">Regresar</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </form>
    <script type="text/html" id="row-tpl">
      <tr>
        <td data-content-prepend="cum"><input type="hidden" name="scouts[]" data-value="cum" value=""></td>
        <td data-content="nombre"></td>
        <td data-content="nivel"></td>
        <td data-content="grupo" class="text-center"></td>
        <td data-content="provincia"></td>
        <td width="5%" class="text-center"><a href="#" class="btn btn-danger btn-sm delete-scout"><i class="fa fa-trash"></i></a></td>
      </tr>
    </script>
