<!doctype html>
<html class="no-js" lang="es">
<head>
  <meta charset="utf-8">
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1">
  <title>Eventos Nacionales | <?php echo $title ?></title>
  <link rel="stylesheet" href="/assets/vendor/bootstrap/bootstrap.css">
  <link rel="stylesheet" href="/assets/css/admin.css">
  <link rel="stylesheet" href="/assets/vendor/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="/assets/vendor/offline/theme.css">
  <link rel="stylesheet" href="/assets/vendor/sweetalert/sweetalert.css">

  <?php echo $_styles ?>

  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
  <![endif]-->
  <link rel="icon" type="image/png" href="/assets/img/favicon.png">
  <script src="/assets/vendor/modernizr.js"></script>
</head>

<body>
  <div class="app">

    <header class="header header-fixed navbar">
      <div class="brand">
        <a href="javascript:;" class="fa fa-bars off-left visible-xs" data-toggle="off-canvas" data-move="ltr"></a>

        <a href="/" class="navbar-brand text-white">
          <img src="/assets/img/scout-emblem.svg" class="logo" alt="">
          <span class="heading-font">
            <b>Scouts</b> México
          </span>
        </a>
      </div>

      <ul class="nav navbar-nav navbar-right off-right">
        <li class="hidden-xs">
          <a href="#">
            <?php echo $_SESSION['session_name'] ?>
          </a>
        </li>

        <li class="quickmenu">
          <a href="javascript:;" data-toggle="dropdown">
            <img src="<?php echo $_SESSION['session_gravatar'] ?>" class="avatar pull-left img-circle" alt="user" title="user">
            <i class="caret mg-l-xs hidden-xs no-margin"></i>
          </a>
          <ul class="dropdown-menu dropdown-menu-right mg-r-xs">
            <li>
              <a href="/users/edit/<?php echo $_SESSION['session_id'] ?>">Cambiar Contraseña</a>
            </li>
            <li class="divider"></li>
            <li>
              <a href="/access/logout">Cerrar Sesión</a>
            </li>
          </ul>
        </li>
      </ul>
    </header>

    <section class="layout">
      <aside class="sidebar canvas-left">
        <nav class="main-navigation">
          <ul>
            <li>
              <a href="/">
                <i class="fa fa-dashboard"></i>
                <span>Inicio</span>
              </a>
            </li>
            <li>
              <a href="/attendees">
                <i class="fa fa-check-circle"></i>
                <span>Registro</span>
              </a>
            </li>
            <li>
              <a href="/attendees/switch-payment">
                <i class="fa fa-exchange"></i>
                <span>Cambios</span>
              </a>
            </li>
            <li>
              <a href="/attendees/search">
                <i class="fa fa-search"></i>
                <span>Búsqueda</span>
              </a>
            </li>
            <li>
              <a href="/regnal">
                <i class="fa fa-users"></i>
                <span>Membresía</span>
              </a>
            </li>
            <li>
              <a href="/users">
                <i class="fa fa-user"></i>
                <span>Usuarios</span>
              </a>
            </li>
            <li>
              <a href="/campings">
                <i class="fa fa-map-signs"></i>
                <span>Acampados</span>
              </a>
            </li>
          </ul>
        </nav>

        <footer>
          <div class="footer-toolbar pull-left">
            <a href="javascript:;" class="toggle-sidebar pull-right hidden-xs">
              <i class="fa fa-angle-left"></i>
            </a>
          </div>
        </footer>

      </aside>


      <section class="main-content">
        <div class="content-wrap">
          <?php echo $content ?>
        </div>
      </section>
    </section>

  </div>

  <div id="admin-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="detalle_label" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">

    </div>
    </div>
  </div>

  <script src="/assets/vendor/jquery.js"></script>
  <script src="/assets/vendor/bootstrap/bootstrap.js"></script>
  <script src="/assets/vendor/off-canvas.js"></script>
  <script src="/assets/vendor/jquery.placeholder.js"></script>
  <script src="/assets/vendor/offline/offline.min.js"></script>
  <script src="/assets/vendor/sweetalert/sweetalert.min.js"></script>
  <?php echo $_scripts ?>
  <script src="/assets/js/main.js"></script>
</body>
</html>
