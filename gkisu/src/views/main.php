<?php
ini_set('display_errors','1');
require_once($_SERVER['DOCUMENT_ROOT'] . '/gkisu/src/config/config.php');
require_once(ABS_PATH . "/gkisu/src/inc/top.inc.php");
?>

<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <title> GKI Surya Utama | Administrator Main Dashboard</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="/logout" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
          <a class="nav-link" href="/logout" ><i class="fas fa-power-off"></i>&nbsp;Logout</a>
      </li>
    </ul>

    <!-- Right navbar links -->

  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <!--
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      -->
      <span class="brand-text font-weight-light">GKI Surya Utama</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $_SESSION['name']; ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <?php require_once(ABS_PATH . "/gkisu/src/inc/sidebar.inc.php"); ?>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Starter Page</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-6">
            <div class="card card-primary card-outline collapse" id="card1">
              <div class="card-header">
                <div class="card-title" id="chartBookingTitle1">Chart 1 - Coming Soon</div>
              </div>
              <div class="card-body">
                <!--DONUT CHART 1 IS HERE -->
                <canvas id="chartBooking1"></canvas>
              </div>
            </div>

            <div class="card card-primary card-outline collapse" id="card3">
              <div class="card-header">
                <div class="card-title" id="chartBookingTitle3">Chart 3 - Coming Soon</div>
              </div>
              <div class="card-body">
                <canvas id="chartBooking3"></canvas>
              </div>
            </div><!-- /.card -->
          </div>
          <!-- /.col-md-6 -->
          <div class="col-lg-6">
            <div class="card card-primary card-outline collapse" id="card2">
              <div class="card-header">
                <div class="card-title" id="chartBookingTitle2">Chart 2 - Coming Soon</div>
              </div>
              <div class="card-body">
                <canvas id="chartBooking2"></canvas>
              </div>
            </div>

            <div class="card card-primary card-outline collapse" id="card4">
              <div class="card-header">
                <div class="card-title">Chart 4 - Coming Soon</div>
              </div>
              <div class="card-body">
                <canvas id="chartBooking4"></canvas>
              </div>
            </div>
          </div>
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
        <div class="row">
          <div class="col-lg-6">
            <div class="card card-outline" id="card5">
              <div class="card-header">
                <div class="card-title">Chart 5 - Coming Soon</div>
              </div>
              <div class="card-body">
                <canvas id="chartSummary1"></canvas>
              </div>
            </div>
          </div>

          <div class="col-lg-6">
            <div class="card card-outline" id="card6">
              <div class="card-header">
                <div class="card-title">Chart 5 - Coming Soon</div>
              </div>
              <div class="card-body">
                <canvas id="chartSummary2"></canvas>
              </div>
            </div>
          </div>
        </div>

      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2014-2019 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- Moment -->
<script src="plugins/moment/moment.min.js"></script>
<!-- Chart JS -->
<script src="gkisu/src/controllers/main-charts.js"></script>

<script>

var myj = jQuery.noConflict();

myj(document).ready(function(){
  
  let sermonSchedule = initMainChartsFunction().getTheNearestSermon();
  
  let sermonQty = typeof sermonSchedule === "undefined" ? 0 : sermonSchedule.size();
  
  //console.log(sermonSchedule);

  for(index=1;index<=sermonQty;index++){
    myj('#card'+index).show();
  }

  let sermonIDArray = new Array();

  for(i=0;i<sermonQty;i++){
    sermonIDArray.push(sermonSchedule[i]['sermonID']);
  };

  //console.log('sermonIDArray', sermonIDArray);
  let totalBookingSermons = initMainChartsFunction().getTotalAttendeesRegistered(sermonIDArray);

  initMainChartsFunction().drawDonutChart();
  
});
</script>
</body>
</html>
