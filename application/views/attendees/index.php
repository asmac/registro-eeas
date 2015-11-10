
    <div class="row">
      <div class="col-md-12">
        <h1>Registro</h1>

        <ol class="breadcrumb">
          <li><a href="/">Inicio</a></li>
          <li class="active">Registro</li>
        </ol>
      </div>
    </div>

    <form id="form_attendees" action="" method="post" class="form-horizontal">
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
            <button type="button" class="btn btn-default btn-prev">Atrás</button>
            <button type="button" class="btn btn-default btn-next" data-last="Finalizar">Siguiente</button>
          </div>
          <div class="step-content">
            <div class="step-pane active alert" data-step="1">
              <h2>Registro de Adulto</h2>

              <div class="form-group">
                <label for="responsible" class="col-md-2 control-label">CUM</label>
                <div class="col-md-4">
                  <div class="input-group">
                    <input type="text" name="responsible" id="responsible" class="form-control" value="">
                    <span class="input-group-btn">
                      <button id="verify_adult" type="button" class="btn btn-primary">Verificar</button>
                    </span>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <div class="col-md-4 col-md-offset-2">
                  <p id="adult-name" class="form-control-static"></p>
                </div>
              </div>
            </div>

            <div class="step-pane alert" data-step="2">
              <h2>Registro de Elementos</h2>

              <div class="form-group">
                <label for="element" class="col-md-2 control-label">CUM</label>
                <div class="col-md-4">
                  <div class="input-group">
                    <input type="text" name="element" id="element" class="form-control" value="">
                    <span class="input-group-btn">
                      <button id="verify_element" type="button" class="btn btn-primary">Verificar</button>
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
            </div>

            <div class="step-pane alert" data-step="3">
              <h2>Asignación de Acampado</h2>

              <div class="table-responsive">
                <table class="table table-hover camping-grid">
                  <thead>
                    <tr>
                      <th width="5%">&nbsp;</th>
                      <th class="text-center">Campo</th>
                      <th class="text-center">Ocupación</th>
                    </tr>
                  </thead>
                  <tbody>
                  </tbody>
                </table>
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

    <script type="text/html" id="camp-tpl">
      <tr>
        <td><input type="radio" name="camp" data-value="id" value="">&nbsp;</td>
        <td data-content="name"></td>
        <td data-content="occupation" class="text-right"></td>
      </tr>
    </script>
