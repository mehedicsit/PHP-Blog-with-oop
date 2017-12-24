<?php 
session_start();
require_once "../lib/Database.php"; 
    if(isset($_POST['login-submit'])){

        $userName=$_POST['username'];
        $password=md5(md5(md5($_POST['password'])));
        $_SESSION['username']=$userName;
        
        $DB= new Database();
        $lquery="select * from tbl_user where username='$userName' and password='$password'";
        $logincheck= $DB->select($lquery);
        
        if($logincheck){
            
           header('Location: admin.php');

        }
        else{
         
            header('Location: index.php');

        }

    }

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Login/Registration</title>

    <!-- Bootstrap -->
    <link href="auth/css/bootstrap.min.css" rel="stylesheet">
    <link href="auth/css/custom.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
 <body>
<div class="container">
<div class="row">
<div class="col-md-6 col-md-offset-3">
<div class="panel panel-login">
<div class="panel-heading">
    <div class="row">
        <div class="col-xs-6">
            <a href="#" class="active" id="login-form-link">Login</a>
        </div>
        <div class="col-xs-6">
            <a href="#" id="register-form-link">Register</a>
        </div>
    </div>
    <hr>
</div>
<div class="panel-body">
    <div class="row">
        <div class="col-lg-12">
            <!-- Login process start from here -->
            <form id="login-form" action="index.php" method="post" role="form" style="display: block;">
                <div class="form-group">
                    <input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Username" value="">
                </div>
                <div class="form-group">
                    <input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password">
                </div>
                <div class="form-group text-center">
                    <input type="checkbox" tabindex="3" class="" name="remember" id="remember">
                    <label for="remember"> Remember Me</label>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3">
                            <input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Log In">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="text-center">
                                <a href="#" tabindex="5" class="forgot-password">Forgot Password?</a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

            <!-- Registration area start from here -->
            <form id="register-form" action="register.php" method="post" role="form" style="display: none;">
              <div class="form-group">
                    <input type="text" name="nicname" id="nickname" tabindex="1" class="form-control" placeholder="NicName" value="">
                </div>
                <div class="form-group">
                    <input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Username" value="">
                </div>
                <div class="form-group">
                    <input type="email" name="email" id="email" tabindex="1" class="form-control" placeholder="Email Address" value="">
                </div>
                <div class="form-group">
                    <input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password">
                </div>
                <div class="form-group">
                    <input type="password" name="confirm-password" id="confirm-password" tabindex="2" class="form-control" placeholder="Confirm Password">
                </div>
                 <div class="form-group">
                    <input type="hidden" name="user_role" value="3" id="user-role" tabindex="2" class="form-control/>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3">
                            <input type="submit" name="register-submit" id="register-submit" tabindex="4" class="form-control btn btn-register" value="Register Now">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
</div>
</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="auth/js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="auth/js/bootstrap.min.js"></script>
    <script src="auth/js/custom.js"></script>
  </body>
</html>
