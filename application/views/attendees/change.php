
    <div class="row">
      <div class="col-md-12">
        <h1>Cambio de Pago</h1>

        <ol class="breadcrumb">
          <li><a href="/">Inicio</a></li>
          <li><a href="/attendees">Registro</a></li>
          <li class="active">Cambio de Pago</li>
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

    <?php if ($this->session->flashdata('msg_success')): ?>
      <div class="alert alert-success alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4>Cambio Realizado</h4>
        <?php echo $this->session->flashdata('msg_success'); ?>
      </div>
    <?php endif ?>

    <section class="panel">
      <div class="panel-heading">
        Proporcione el CUM original del pago y el CUM de la persona que ocupará el lugar.
      </div>
      <div class="panel-body">
        <form action="" method="post" class="form-horizontal bordered-group" role="form">
          <?php $error = form_error('paid'); ?>
          <div class="form-group<?php echo ($error != '') ? ' has-error' : ''; ?>">
            <label for="paid" class="col-md-2 control-label">CUM Pagado</label>
            <div class="col-md-4">
              <input type="text" name="paid" id="paid" class="form-control" value="<?php echo set_value('paid'); ?>">
            </div>
            <?php echo $error; ?>
          </div>

          <?php $error = form_error('switch'); ?>
          <div class="form-group<?php echo ($error != '') ? ' has-error' : ''; ?>">
            <label for="switch" class="col-md-2 control-label">CUM Cambio</label>
            <div class="col-md-4">
              <input type="text" name="switch" id="switch" class="form-control" value="<?php echo set_value('switch'); ?>">
            </div>
            <?php echo $error; ?>
          </div>

          <div class="col-md-4 col-md-offset-2 btn-crud">
            <button type="submit" class="btn btn-success">Realizar Cambio</button>
            <a href="/attendees" class="btn btn-default">Registro</a>
          </div>
        </form>
      </div>
    </section>


