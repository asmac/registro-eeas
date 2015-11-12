    <div class="row">
      <div class="col-md-12">
        <h1>Eventos Nacionales</h1>

        <ol class="breadcrumb">
          <li class="active">Inicio</li>
        </ol>
      </div>
    </div>

    <div class="row">
      <div class="col-md-4 col-sm-6 col-xs-12">
        <div class="panel">
          <div class="panel-body">
            <div class="circle-icon bg-primary">
              <i class="fa fa-users"></i>
            </div>
            <div>
              <h3 class="no-margin"><?php echo number_format($regnal) ?></h3>
              Miembros Vigentes
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-4 col-sm-6 col-xs-12">
        <div class="panel">
          <div class="panel-body">
            <div class="circle-icon bg-success">
              <i class="fa fa-check"></i>
            </div>
            <div>
              <h3 class="no-margin"><?php echo number_format($registered) ?></h3>
              Asistentes Registrados
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-4 col-sm-6 col-xs-12">
        <div class="panel">
          <div class="panel-body">
            <div class="circle-icon bg-danger">
              <i class="fa fa-clock-o"></i>
            </div>
            <div>
              <h3 class="no-margin"><?php echo number_format($left) ?></h3>
              Faltan por Llegar
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-4 col-sm-6 col-xs-12">
        <div class="panel">
          <div class="panel-body">
            <div class="circle-icon bg-info">
              <i class="fa fa-map-signs"></i>
            </div>
            <div>
              <h3 class="no-margin"><?php echo number_format($campings) ?></h3>
              Áreas de Acampado
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-4 col-sm-6 col-xs-12">
        <div class="panel">
          <div class="panel-body">
            <div class="circle-icon bg-warning">
              <i class="fa fa-exchange"></i>
            </div>
            <div>
              <h3 class="no-margin"><?php echo number_format($switches) ?></h3>
              Permutas Realizadas
            </div>
          </div>
        </div>
      </div>
    </div>
