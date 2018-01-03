<?php 
session_start();
require_once "../lib/Database.php"; 
require "inc/form-validate.php"; 
    $validate=new AuthCheck();
    if(isset($_POST['login-submit'])){

        $userName=$validate->validateInput($_POST['username']);
        $password=$validate->validateInput(md5(md5(md5($_POST['lpassword']))));
        $_SESSION['username']=$userName;
        $DB= new Database();
        $lquery="select * from tbl_user where username='$userName' and password='$password'";
        $logincheck= $DB->select($lquery);
        
        if($logincheck){
            
           header('Location: admin.php');

        }
        else{
         $msg="login information not correct please try again";
         header("Location: index.php?msg={$msg}");

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
                    <input type="password" name="password" id="lpassword" tabindex="2" class="form-control" placeholder="Password">
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
            <?php 
            $DB=new Database(); 
             $errnicname=$nicname=$username=$email=$password=$cpass=$errusername=$erremail=$errpassword=$errcpass=$errregister="";
            if (isset($_POST['register-submit'])){
                
                if(empty($_POST['nicname'])){
                    $errnicname="Nick name field cant be empty";
                }else{
                   $nicname=$validate->validateInput($_POST['nicname']);
                    // check if name only contains letters and whitespace
                    if (!preg_match("/^[a-zA-Z ]*$/",$nicname)) {
                    $errnicname = "Only letters and white space allowed"; 
                    }
                }

              if(empty($_POST['rusername'])){
                    $errusername="Username name field cant be empty";
                }else{
                   $username=$validate->validateInput($_POST['rusername']);
                           // check if name only contains letters and whitespace
                    if (!preg_match("/^[a-zA-Z ]*$/",$username)) {
                    $errusername = "Only letters and white space allowed"; 
                    }
                }
                
                if(empty($_POST['email'])){
                    $erremail="Email field cant be empty";
                }else{
                   $email=$validate->validateInput($_POST['email']);
                       if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $erremail = "Invalid email format"; 
                    }
                }
                
                if(empty($_POST['rpassword']) or empty($_POST['cpassword'])){
                    $errpassword="Password field cant be empty";
                }else{
                   $password=$validate->validateInput(md5(md5(md5($_POST['rpassword']))));
                    $cpass=$validate->validateInput(md5(md5(md5($_POST['cpassword']))));
                    if($password!==$cpass){
                        $errpassword="Both password Must be same";
                    }
                    if(strlen($password)>=8 && strlen($password)<=15){
                            $errpassword="password length must be greater than 8 character and less than 15 character";
                    }
                }
              

                $userrole=$_POST['user_role'];

                $userregister="INSERT INTO tbl_user (name,username,email , password,rule ) VALUES ('$nicname','$username','$email','$password',$userrole)";
                $afterRegister=$DB->insert($userregister);
                if($afterRegister){
                    header('Location: profile.php');


                }
             else{
                $errregister= "registration failed please check again";

                } 
            }


            ?>


            <form id="register-form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" role="form" style="display: none;" id="registerForm" onsubmit="resetForm()">
            <div class="register-error">
              <p style="color:red;text-align:center"> <?php echo  $errregister; ?> </p>
            </div>
              <div class="form-group">
                    <input type="text" name="nicname" id="nickname" tabindex="1" class="form-control" placeholder="NicName" value="">
                    <p style="color:red;text-align:center"><?php echo $errnicname; ?></p>
                </div>
                <div class="form-group">
                    <input type="text" name="rusername" id="rusername" tabindex="1" class="form-control" placeholder="Username" value="">
                 <p style="color:red;text-align:center">   <?php  echo $errusername; ?></p>
                </div>
                <div class="form-group">
                    <input type="email" name="email" id="email" tabindex="1" class="form-control" placeholder="Email Address" value="">
                    <p style="color:red;text-align:center"><?php echo  $erremail;  ?></p>
                </div>
                <div class="form-group">
                    <input type="password" name="rpassword" id="rpassword" tabindex="2" class="form-control" placeholder="Password">
                    <p style="color:red;text-align:center"><?php echo $errpassword;?></p>
                </div>
                <div class="form-group">
                    <input type="password" name="cpassword" id="confirm-password" tabindex="2" class="form-control" placeholder="Confirm Password">
                   <p style="color:red;text-align:center"><?php echo  $errpassword; ?></p>
                </div>
                 <div class="form-group">
                    <input type="hidden" name="user_role" value="3" id="user-role" tabindex="2" class="form-control"/>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3">
                            <input type="submit" name="register-submit" id="register-submit" tabindex="4" class="form-control btn btn-register" value="Register Now">
                        </div>
                    </div>
                </div>
            </form>

            <script>
                function resetForm() {

                    document.getElementById("registerForm").reset();
                    
                }
            </script>
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
