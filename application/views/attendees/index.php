
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
              <li data-step="1" class="active"><span class="badge">1</span>Adulto<span class="chevron"></span></li>
              <li data-step="2"><span class="badge">2</span>Elementos<span class="chevron"></span></li>
              <li data-step="3"><span class="badge">3</span>Acampado<span class="chevron"></span></li>
            </ul>
          </div>
          <div class="actions">

          </div>
          <div class="step-content">
            <div class="step-pane active sample-pane alert" data-step="1">
              <div class="form-group">
                <label for="responsible" class="col-lg-2 control-label">CUM Adulto</label>
                <div class="col-lg-3">
                  <div class="input-group">
                    <input type="text" name="data[responsible]" id="responsible" class="form-control" value="">
                    <span class="input-group-btn">
                      <button type="button" class="btn btn-default">Verificar</button>
                    </span>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <label for="lead" class="col-lg-2 control-label">Responsable</label>
                <div class="col-lg-3">
                  <input type="hidden" name="lead" value="0">
                  <input type="checkbox" name="lead" value="1" class="js-switch">
                </div>
              </div>
            </div>

            <div class="step-pane sample-pane alert" data-step="2">

            </div>

            <div class="step-pane sample-pane alert" data-step="3">

            </div>
          </div>
        </div>
      </div>
    </form>
