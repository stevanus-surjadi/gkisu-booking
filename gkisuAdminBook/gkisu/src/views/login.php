<?php
date_default_timezone_set("Asia/Krasnoyarsk");
ini_set('display_errors', '1');
//include_once($_SERVER['DOCUMENT_ROOT'] . '/gkisu/src/config/config.php');
//include_once(ABS_PATH . "/gkisu/src/models/login.inc.php");
require_once("gkisu/src/config/config.php");
require_once("gkisu/src/models/login.inc.php");

if(isset($_SESSION)) session_destroy();

if(isset($_POST['actionLogin']) && $_POST['actionLogin'] == 1) {
  
  $formPassword = $_POST['inputPassword'];
  $formEmail = $_POST['inputEmail'];
  $isUserExist = isUserExist($formEmail);

  if($isUserExist==1){
    $dbPasswd = getPasswd($formEmail);
    $dbSalt = getSalt($formEmail);
    $dbName = getName($formEmail);
    if(strcmp(hash('sha256',$formPassword.$dbSalt),$dbPasswd)==0) {
      session_start();
      $_SESSION['name'] = $dbName;
      $_SESSION['isLogin'] = true;
      $_SESSION['login']['email'] = $formEmail;
      $_SESSION['lastActivity'] = time();
      $_SESSION['timeout'] = 1*60*60;
      header("Location: http://localhost:8080".ALIAS."/?arg=". base64_encode("main"). " ");
    }else{
      $HTMLoutput = "<div class=\"alert alert-danger col-sm-12\" >Wrong username and/or password</div>";
    }
  }
  else{
    $HTMLoutput = "<div class=\"alert alert-danger col-sm-12\" >Wrong username - Not Found</div>";
  }
}

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 3 | Login Page</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini sidebar-collapse">
<!-- Site wrapper -->
<div class="wrapper">

  

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="dist/img/AdminLTELogo.png"
           alt="AdminLTE Logo"
           class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Login Page</h1> | <a href="<?=ALIAS;?>/?arg=<?=base64_encode("usrRegister");?>">Register</a>
          </div>
          
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <form class="form-horizontal" method="post" action="<?php echo $_SERVER['REQUEST_URI'];?>" id="formLogin" name="formLogin">
      <input type="hidden" name="actionLogin" id="actionLogin" value="0">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Login</h3>
          </div>
          <div class="card-body">
            <div class="form-group row">
              <label class="col-sm-2 col-form-label" for="inputEmail" >Email</label>

              <div class="col-sm-10">
                <input type="email" class="form-control" id="inputEmail" name="inputEmail" placeholder="Email">
              </div>
            </div>

            <div class="form-group row">
              <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>

              <div class="col-sm-10">
                <Input type="password" class="form-control" id="inputPassword" name="inputPassword" placeholder="Password">
              </div>
            </div>
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            <div class="row col-sm-12">              
              <button type="submit" class="btn btn-info float-right" id="signin">Sign in</button>&nbsp;&nbsp;&nbsp;
              <input type="reset" class="btn btn-default float-right" id="reset" value="Clear"></input>
            </div>
            <div class="row mt-3">
              <div class="alert alert-danger col-sm-12 collapse" id="displayError"></div>    
            </div>
            <div class="row">
              <?php echo isset($HTMLoutput) ? $HTMLoutput : ""; ?>
            </div>
          </div>
          <!-- /.card-footer-->
        </div>
      </form>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.0.5
    </div>
    <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>

<script>

var myj = jQuery.noConflict();

myj('document').ready(function(){

  myj(document).on('submit','#formLogin' , function(e){
    
    let errIndex = 0;
    let errMsg = "";

    if(!myj('#inputEmail').val()){
      errIndex++;
      errMsg += "Invalid Email for login. Cannot be empty<br>";
    }
    
    if(!myj('#inputPassword').val()){
      errIndex++;
      errMsg += "Invalid Password for login. Cannot be empty<br>";
    }
  
    
    if(errIndex==0) myj('#actionLogin').val('1');
    else{
      myj('#displayError').html(errMsg).show();
      e.preventDefault();
    }
  })
});

</script>
</body>
</html>
