<?php include "inc/header.php" ;?>
        
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Add New Post</h2>
                <div class="block"> 
                <?php 
                    $DB=new Database();
                    
                    if(isset($_POST['submit'])){
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
                        $posttitle=$_POST['posttitle'];
                        $postcontent=$_POST['postcontent'];
                        $catname=$_POST['catlist'];
                        (isset($_POST['loggeduserid'])? $logged_user_id=$_POST['loggeduserid'] :'value not set yet');
                        
                        $insertpostq="insert into tbl_post(title,content,cat_id,user_id,image) values('$posttitle','$postcontent','$catname','$logged_user_id','$detination')";

                        $insrtpost=$DB->insert($insertpostq);
                    }

                    

                ?>              
                 <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post" enctype="multipart/form-data">
                    <table class="form">
                       
                        <tr>
                            <td>
                                <label>Title</label>
                            </td>
                            <td>
                                <input type="text" placeholder="Enter Post Title..." class="medium" name="posttitle" />
                            </td>
                        </tr>
                     
                        <tr>
                            <td>
                                <label>Category</label>
                            </td>
                            <td>
                            <?php 
                                $catlist="select * from tbl_category";
                                $catres=$DB->select($catlist);
                            ?>
                           
                                <select id="select" name="catlist">
                                    <?php foreach($catres as $cres){?>
                                        <option value="<?php echo $cres['cat_id']?>"><?php echo $cres['catname']?></option>
                                    <?php } ?>
                                </select>
                            
                            </td>
                        </tr>
                   
                       
                        <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>Content</label>
                            </td>
                            <td>
                                <textarea class="tinymce" name="postcontent" style="resize:none;width:50%;height:150px"></textarea>
                            </td>
                        </tr>
                         <tr>
                            <td>
                                <label>Upload Image</label>
                            </td>
                            <td>
                                <input type="file" name="files" />
                            </td>
                        </tr>
                        <?php 
                            $sessionuser=$_SESSION['username'];
                            $isuserloggedinquery="select user_id from tbl_user where username='$sessionuser'";
                            $loggeduser= $DB->select($isuserloggedinquery);
                           
                        ?>
                        <?php  foreach ($loggeduser as $luser) {?>
                        <tr>
                            <td class="logged-in-user">
                                 <input type="hidden" name="loggeduserid" value="<?php echo  $luser['user_id'] ?>" />
                            </td>
                        </tr>
                       
                        <?php } ?>
						<tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="Save" />
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
            </div>
        </div>
        <div class="clear">
        </div>
    </div>
    <div class="clear">
    </div>
    <?php include "inc/footer.php";?>