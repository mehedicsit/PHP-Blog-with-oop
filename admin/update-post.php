<?php
session_start();
include "../lib/Database.php";
$DB=new Database();       
if (isset($_REQUEST['submit'])) {
if(isset($_REQUEST['id'])){
$updatepostid=$_REQUEST['id'];
}
$title=$_REQUEST['posttitle'];
$cat=$_REQUEST['catlist'];
$content=htmlentities($_REQUEST['postcontent'],true);
//image upload part
if(isset($_FILES["files"]) && $_FILES["files"]["error"] == 0){
$allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
$imgname=$_FILES['files']['name'];
$imgtype=$_FILES['files']['type'];
$imgsize=$_FILES['files']['size'];
$tempname=$_FILES['files']['tmp_name'];

// Verify file extension
$ext = pathinfo($imgname, PATHINFO_EXTENSION);
if(!array_key_exists($ext, $allowed)) die("Error: Please select a valid file format.");
$detination="upload/$imgname";
//check image duplicacy 
/* if(file_exists($detination)){
echo die($imgname . " is already exists.");
} else{ */
move_uploaded_file($tempname,$detination);
//}

}
// Verify file size - 5MB maximum
$maxsize = 1 * 1024 * 1024;
if($imgsize > $maxsize) die("Error: File size is larger than the allowed limit.");
//image upload part
$editq="select * from tbl_post where post_id='$updatepostid'";
$editpost=$DB->select($editq);
//update query
$updatepostquery="update tbl_post set title='$title',content='$content',cat_id='$cat',image='$detination'
where post_id='$updatepostid'";
$updatepost=$DB->update($updatepostquery);
header('Location: edit-post.php');
}

?>              