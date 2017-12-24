<?php
require "../lib/Database.php";
$DB=new Database(); 
if (isset($_POST['register-submit'])){
    $nicname=$_POST['nicname'];
    $username=$_POST['username'];
    $email=$_POST['email'];
    $password=md5(md5(md5($_POST['password'])));
    $userrole=$_POST['user_role'];

     $userregister="INSERT INTO tbl_user (name,username,email , password,rule ) VALUES ('$nicname','$username','$email','$password',$userrole)";
     $afterRegister=$DB->insert($userregister);
    if($afterRegister){
        header('Location: profile.php');


    }
    else{
        header('Location: index.php');

    }
}
