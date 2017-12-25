<?php 
include "../lib/Database.php";
$DB=new Database();
    if(isset($_GET['id'])){
        $dlpostid=$_GET['id'];
        $delete="delete from tbl_post where post_id='$dlpostid'";
        $deleteres=$DB->delete($delete);
        header('Location: postlist.php');
    } 


