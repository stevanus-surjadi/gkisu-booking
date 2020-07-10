<?php
ini_set('display_errors','1');
require_once($_SERVER['DOCUMENT_ROOT'] . '/gkisu/src/config/config.php');
//require_once(ABS_PATH . "gkisu/src/models/top.inc.php");
session_start();
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

  <title> GKI Surya Utama | Setup | Sermon Schedule </title>

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
            <h1 class="m-0 text-dark">Setup Sermon Schedule</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/main">Home</a></li>
              <li class="breadcrumb-item active">Sermon Schedule</li>
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
                        <div class="card-header">
                          <div class="row">
                            <div class="col-sm-6">
                              <button type="button" class="btn btn-primary float-left" data-toggle="modal" data-target="#create-schedule-modal" id="btn-createSchedule">
                                Create Schedule(s)
                              </button>
                            </div>
                          </div>
                          <?php require_once(ABS_PATH . "/gkisu/src/modal/sermon-schedule.modal.php"); ?>
                        </div>
                        <div class="card-body">
                            <table id="sermon-schedule">
                            </table>

                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-sm-12">
                                    <button type="submit" class="btn btn-default">submit</button>
                                </div>
                            </div>
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
<script>

var myj = jQuery.noConflict();

function formIsValidation(oTime,oStartDate,oEndDate)
{
  let errIndex = 0;
  let errMsg = "";
  
  //alert(oStartDate.length);

  if(!myj('#scheduleName').val()){
    errIndex++;
    errMsg+="Schedule Name cannot be empty<br>";
  }
  if(typeof oStartDate === "undefined"){
    errIndex++;
    errMsg+="Start Date cannot be empty<br>";
  }
  if(typeof oEndDate === "undefined"){
    errIndex++;
    errMsg+="End Date cannot be empty<br>";
  }
  if(typeof oTime === "undefined"){
    errIndex++;
    errMsg+="Time cannot be empty<br>";
  }

  if(errIndex!=0){
    myj('#displayStatus').addClass('alert alert-danger').html(errMsg).show();
    return false;
  }else {
    //successMsg="New Schedule successfully saved";
    myj('#displayStatus').removeClass('alert-danger').hide();
    return true;
  }

}

myj(document).ready(function(){

  myj(document).on('show.bs.modal',function(){
    myj('#create-schedule-modal').modal('handleUpdate');
  })

  myj(document).on('shown.bs.modal',function(){
    //alert("modal shown completed");
    //init BS DateTimePicker
    //myj('#create-schedule-modal').modal('handleUpdate');
    
    myj('#pickupStartDate, #pickupEndDate').datetimepicker({
        format: 'DD-MM-YYYY',
        useCurrent: false
        //dateFormat: 'dd-mm-yyyy'
    });

    myj('#pickupTime').datetimepicker({
      inline: true,
      format: 'HH:mm:ss'
      //timeFormat: 'HH:mm'
    });

    myj('#pickupStartDate').on('change.datetimepicker',function(e){
      myj('#pickupEndDate').datetimepicker('minDate',e.date);
    });

    myj('#pickupEndDate').on('change.datetimepicker',function(e){
      myj('#pickupStartDate').datetimepicker('maxDate',e.date);
    });

    myj('#pickupTime').datetimepicker({
      format: 'LT'
    });

    //hide loader bar
    myj('#modalLoaderStatus').hide();

    myj('#formSchedule').on('submit',function(e){
      e.preventDefault();

      let oStartDate = myj('#pickupStartDate').data('date');
      let oEndDate = myj('#pickupEndDate').data('date');
      let oTime = myj('#pickupTime').data('date');
      let oInterval = myj('#selectInterval').children('option:selected').val();
      let oScheduleName = myj('#scheduleName').val();

      let _bodyData = myj('#formSchedule').serializeArray();
      _bodyData.push( { name:"pickupStartDate", value: oStartDate},
                      { name:"pickupEndDate", value: oEndDate},
                      { name:"pickupTime", value:oTime}
       );
      //console.log(_bodyData);
      if(formIsValidation(oTime,oStartDate,oEndDate))
      {
        let _action = "saveSchedule";
        _bodyData.push( {name:"action", value:_action} );
        
        myj.ajax({
          type: "POST",
          url: "/gkisu/src/models/sermon-schedule.inc.php",
          data:  _bodyData,
          success: function(data){

          }
        });
      }
      

    })

  })
})


</script>

</body>
</html>
