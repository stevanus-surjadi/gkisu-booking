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
  <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
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
  <!-- Datatables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.css">
  <!-- Select2-->
  <link rel="stylesheet" href="plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">

  <title> GKI Surya Utama | Setup | Booking Confirmation Validation </title>

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
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
          <a class="nav-link" href="/logout" ><i class="fas fa-power-off"></i>&nbsp;Logout</a>
      </li>
    </ul>
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
            <h1 class="m-0 text-dark">Booking Confirmation Validation</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?=ALIAS . "/?arg=".base64_encode("main");?>">Home</a></li>
              <li class="breadcrumb-item active">Booking Confirmation Validation</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <form class="form-horizontal" name="formSchedule" id="formSchedule" method="post">
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <form class="form-horizontal">
                        <div class="card-header ">
                          <div class="row form-group">
                            <label for="pickupSermonDate" class="col-sm-3 col-form-label">Sermon Schedule</label>
                            <div class="input-group date col-sm-3" id="pickupSermonDate" data-target-input="nearest">
                                <input type="text" class="form-control datetimepicker-input" data-target="#pickupSermonDate" placeholder="Select Sermon Date"/>
                                <div class="input-group-append" data-target="#pickupSermonDate" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>
                            </div>
                          </div>
                          <div class="row form-group" id="containerSermonSchedule">
                            <label for="selectSermonSchedule" class="col-sm-3 col-form-label">Select Sermon Schedule</label>
                            <div class="col-sm-5">
                                <select class="form-control select2bs4 select2-hidden-accessible"  style="width: 100%;!important" aria-hidden="true" id="selectSermonDateTime" name="selectSermonDateTime" data-placeholder="Select Sermon Date and Time">
                                    <option></option>
                                </select>
                            </div>
                          </div>
                        </div>
                        <div class="card-body">
                            <Table id="sermonBooking" class="table table-stripped table-hover table-bordered dt-responsive collapse" style="width=100%">
                              <tr>
                                <th>BookingID</th>
                                <th>Sermon Name</th>
                                <th>Sermon Schedule</th>
                                <th>Fullname</th>
                                <th>Attendees</th>
                                <th>Mobile</th>
                              </tr>
                            </Table>
                        </div>
                        </form>
                        <div class="card-footer">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </form>
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
<!-- Bootstrap Datepicker -->
<script src="plugins/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
<!-- Moment -->
<script src="plugins/moment/moment.min.js"></script>
<!-- Bootstrap TempusDominus -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!--Input mask jscript-->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>
<!--Datatables-->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<!--Select2-->
<script src="plugins/select2/js/select2.full.min.js"></script>
<!--Controller Sermon Schedule-->
<script src="gkisu/src/controllers/booking-validation.js"></script>
<script>

var myj = jQuery.noConflict();



myj(document).ready(function(){

  myj('#containerSermonSchedule').hide();
  myj('#pickupSermonDate').datetimepicker({
    format: 'DD-MM-YYYY',
    useCurrent: false
  });
  
  //=SELECT2 EVENTS=//
  myj('#pickupSermonDate').on('change.datetimepicker', function(e){
      myj('#containerSermonSchedule').show();
      let oSermonDate = myj('#pickupSermonDate').data('date');
      //console.log(oSermonDate);
      initBookingValidationFunction().loadSelectSermonDateTime(oSermonDate);
  });

  myj('#selectSermonDateTime').on('change',function(){
    //console.log(e.params.data);
    myj('#sermonBooking').show();
    let sermonID = myj('#selectSermonDateTime option:selected').val();
    let sermonDateTime = myj('#selectSermonDateTime option:selected').text();
    
    let sermonData = [];
    sermonData.push( { "sermonID":sermonID, "sermonDateTime":sermonDateTime });
    //console.log(sermonData);
    
    if (myj.fn.DataTable.isDataTable('#sermonBooking') ) {
        dtSermonBooking.destroy();
    }
    dtSermonBooking = initBookingValidationFunction().loadDataTableBookingConfirmation(sermonData);
  });
      

  //=END SELECT2 EVENTS=/

  //=DATATABLES EVENTS=//
  
  myj(window).on('resize', function() { 
    dtSermonBooking.columns.adjust().draw();
  });

  //let dtSermonSchedule = initSermonScheduleFunction().displaySermonSchedule();

  //dtSermonSchedule.on('click','#btnActionDelete', function(e){
  //  e.preventDefault();
    
  //});

  //=END DATATABLES EVENTS=//

  //=Select2 EVENTS=//

  //=END Select2 EVENTS=//
})


</script>

</body>
</html>
