<?php

date_default_timezone_set("Asia/Krasnoyarsk");
ini_set('display_errors', '1');

include_once($_SERVER['DOCUMENT_ROOT'] . '/gkisu/src/config/config.php');

//var_dump($_SERVER);
if(isset($_POST['actionRegister']) && $_POST['actionRegister']==1){

}

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 3 | Registration Page</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <a href="https://www.gkisuryautama.org"><b>GKI</b>Surya Utama</a>
  </div>

  <div class="card">
    <div class="card-body register-card-body">
      <p class="login-box-msg">Register a new membership</p>

      <form action="<?php echo $_SERVER['REQUEST_URI'];?>" method="post" name="formRegister" id="formRegister">
        <input type=hidden name="actionRegister" id="actionRegister" value=0 />
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Full name" id="fullname" name="fullname">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="Email" id="email" name="email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" id="passwd" name="passwd">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Retype password" id="confirmPasswd" name="confirmPasswd">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="agreeTerms" name="terms" value="agree">
              <label for="agreeTerms">
               I agree to the <a href="#">terms</a>
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block" id=btnRegister>Register</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
      <!--
      <div class="social-auth-links text-center">
        <p>- OR -</p>
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i>
          Sign up using Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i>
          Sign up using Google+
        </a>
      </div>
      -->
      <!--
      <a href="login.html" class="text-center">I already have a membership</a>
      -->
    </div>
    <!-- /.form-box -->
    <div class="card-footer">
      <div class="row">
        <div class="alert alert-danger collapse" id="displayError"></div>
      </div>
      <div class="row">
        <div class="alert alert-success collapse" id="displaySuccess"></div>
      </div>
    </div>
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="../../../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../../../dist/js/adminlte.min.js"></script>

<script>

var myj = jQuery.noConflict();

function validateForm()
{
  let errMsg = "";
  let errIndex = 0;

  let varFullname = myj('#fullname').val();
  let varEmail = myj('#email').val();
  let varPasswd = myj('#passwd').val();
  let varConfirmPasswd = myj('#confirmPasswd').val();

  if(varFullname.length == 0){
    errIndex++;
    errMsg += "Fullname cannot be empty<br>";
  }
  
  if(varEmail.length == 0){
    errIndex++;
    errMsg += "Email cannot be empty<br>";
  }
  else{
    let varAtIndex = varEmail.indexOf("@");
    let varDotIndex =varEmail.substr(varAtIndex,varEmail.length).indexOf(".") + varAtIndex;
    if((varDotIndex-varAtIndex)<2)
    {
      errIndex++;
      errMsg += "Invalid email format<br>";
    }
  }

  if(varPasswd.length == 0 || varConfirmPasswd == 0){
    errIndex++;
    errMsg += "Password and Confirm Password cannot be empty<br>";
  }
  else{
    if(!(varPasswd===varConfirmPasswd)){
      errIndex++;
      errMsg += "Password and Confirm Password not match<br>";
    }
  }
  myj('#displayError').html(errMsg);
  console.log(errMsg);
  if(errIndex!=0) return false;
  else return true;
}



myj('document').ready(function(){

  myj(document).on('submit','#formRegister',function(e) {
    e.preventDefault();
    myj('#actionRegister').val('1');
    let formIsOK = validateForm();
    if(!formIsOK){
      myj('#displayError').show();
    }else {
      _action = "registerUser";
      _bodydata = myj('#formRegister').serializeArray();
      _bodydata.push( {name:"action", value:_action} );
      console.log(_bodydata);
      myj.ajax({
        type: "POST",
        url: "/gkisu/src/models/register.inc.php",
        data:  _bodydata,
        success: function(data){
          //alert("success");
          //alert(data);
          if(data==1){
            let msg = "New Account has been added successfully. Click here to access <a href=\"\/\">login</a> page";
            myj('#displaySuccess').html(msg).show();
          }
          else if(data==0){
            let msg = "Duplicate account. User already exist";
            myj('#displayError').html(msg).show();
          }
        },
        error: function(XMLHttpRequest, textStatus, errorThrown){
          alert("ajax error");
        }
      });
    }


  });

});

</script>

</body>
</html>
