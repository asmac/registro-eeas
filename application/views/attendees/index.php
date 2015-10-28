
	  <div class="row">
      <div class="col-md-12">
        <h1>Registro</h1>

        <ol class="breadcrumb">
          <li><a href="/">Inicio</a></li>
          <li class="active">Registro</li>
        </ol>
      </div>
    </div>

    <section class="panel">
      <div class="panel-body">
        <form action="" method="post" class="form-horizontal bordered-group">

          <div class="form-group">
            <label for="responsible" class="col-lg-2 control-label">CUM Adulto</label>
            <div class="col-lg-3">
              <input type="text" name="data[responsible]" id="responsible" class="form-control" value="">
            </div>
          </div>

          <div class="form-group">
            <label for="lead" class="col-lg-2 control-label">Responsable</label>
            <div class="col-lg-3">
              <input type="hidden" name="lead" value="0">
              <input type="checkbox" name="lead" value="1" class="js-switch">
            </div>
          </div>

          <div class="form-group">
            <label class="col-lg-2 control-label">Asignación de Campo</label>
            <div class="col-lg-10 btn-crud">
              <button type="button" class="btn btn-success">Automática</button>
              <button type="button" class="btn btn-info">Manual</button>
            </div>
          </div>

        </form>
      </div>
    </section>
