<?php session_start();

//redirect to login page who are not logged
if(!isset($_SESSION['username'])){
    header('Location: ./index.php');
}

include "../lib/Database.php";
$DB=new Database();
   
        $dlpostid=$_GET['id'];
        $delete="delete from tbl_post where post_id='$dlpostid'";
        $deleteres=$DB->delete($delete);


if($deleteres==0){

   header('Location : http://facebook.com');
}

