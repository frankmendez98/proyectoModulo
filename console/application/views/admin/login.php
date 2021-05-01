<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="<?php echo base_url(""); ?>assets/admin/img/logo.png" rel="icon" type="image/png">

  <title>Tu Digital Market</title>

  <link href="<?php echo base_url(""); ?>assets/admin/css/bootstrap.css" rel="stylesheet">
  <link href="<?php echo base_url(""); ?>assets/admin/font-awesome/css/font-awesome.css" rel="stylesheet">
  <link href="<?php echo base_url(""); ?>assets/admin/css/plugins/iCheck/custom.css" rel="stylesheet">

  <!-- Toastr style -->
  <link href="<?php echo base_url(""); ?>assets/admin/css/plugins/toastr/toastr.min.css" rel="stylesheet">

  <!-- Select 2 -->
  <link href="<?php echo base_url(""); ?>assets/admin/css/plugins/select2/select2.min.css" rel="stylesheet">

  <!-- Gritter -->
  <link href="<?php echo base_url(""); ?>assets/admin/js/plugins/gritter/jquery.gritter.css" rel="stylesheet">

  <link href="<?=base_url("");?>assets/admin/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet">

  <!-- Data Tables -->
  <link href="<?php echo base_url(""); ?>assets/admin/css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
  <link href="<?php echo base_url(""); ?>assets/admin/css/plugins/dataTables/dataTables.responsive.css" rel="stylesheet">
  <link href="<?php echo base_url(""); ?>assets/admin/css/plugins/dataTables/dataTables.tableTools.min.css" rel="stylesheet">
  <link href="<?php echo base_url(""); ?>assets/admin/css/plugins/datapicker/datepicker3.css" rel="stylesheet">

  <link href="<?php echo base_url(""); ?>assets/admin/css/main.css" rel="stylesheet">
  <link href="<?php echo base_url(""); ?>assets/admin/css/animate.css" rel="stylesheet">
  <link href="<?php echo base_url(""); ?>assets/admin/css/style.css" rel="stylesheet">

</head>

<body class="white-bg">
  <div class="loginColumns animated fadeInDown">
    <div class="row">
      <div class="col-md-6 text-center">
        <h2 class="font-bold">CONSOLA DE ADMINISTRACION</h2>
        <div>
          <center>
            <img alt="image" style="width: 80%; margin-top:0%;" src="<?php echo base_url("") . "assets/admin/img/logo.png"; ?>" />
          </center>
        </div>
      </div>
      <div class="col-md-6">
        <div class="ibox-content" style="margin-top: 9%;">
          <label>Por favor ingrese sus credenciales.</label>
          <form class="m-t" role="form" method="POST">
            <div class="form-group">
              <input type="text" name="correo" class="form-control" id="correo" placeholder="correo@correo.com" required="">
            </div>
            <div class="form-group">
              <input type="password" class="form-control" id="clave" required="" name="clave" placeholder="Password">
            </div>
            <div class="row">
              <div class="col-lg-6">
                <button type="button" class="btn btn-primary block full-width m-b" id="btn_ini_sesion">Iniciar Sesi&oacute;n</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    <div class="row">
      <hr>
      <p class="text-muted">Open Solutions Systems - Copyright</p>
    </div>
  </div>
</body>
<script src="<?php echo base_url(""); ?>assets/admin/js/plugins/jquery/jquery-2.1.1.js"></script>
<script src="<?php echo base_url(""); ?>assets/admin/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(""); ?>assets/admin/libs/sweetalert2/sweetalert2.min.js"></script>
<!--<script src="--><?php //echo base_url(""); ?><!--assets/admin/js/main.js"></script>-->
<script>var base_url = '<?php echo base_url("admin/") ?>';</script>
<script src="<?php echo base_url(""); ?>assets/admin/js/funciones/login.js"></script>
</html>
