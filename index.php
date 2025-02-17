<!DOCTYPE html>
<html lang="es">

<?php
include_once "site/component/head.php";
?>

<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <b>Bienvenidos</b>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      
      <form action="site/home.php" method="post">
        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="Email" id="email" name="email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" id="contra" name="contra">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <!-- /.col -->
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Ingresar</button>
          </div>
          <!-- /.col -->
        </div>
        <div class="row">
          <!-- /.col -->
          <div class="col-12 pt-2">
            <button type="submit" class="btn btn-danger btn-block">Borrar</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<?php
include_once "site/component/scripts.php";
?>

</body>
</html>
