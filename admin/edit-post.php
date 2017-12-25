<?php include "inc/header.php" ;?>
        
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Add New Post</h2>
                <div class="block"> 
                <?php 
                    $DB=new Database();
                    
                        if(isset($_GET['id'])){
                        $editid=$_GET['id'];
                        $editq="select * from tbl_post where post_id='$editid'";
                        $editpost=$DB->select($editq);
                        }

                    ?>
                 <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post" enctype="multipart/form-data">
                    <table class="form">
                       <?php if(is_array($editpost)|| is_object($editpost)){foreach ($editpost as $posttitle) {?>
                         
                        <tr>
                            <td>
                                <label>Title</label>
                            </td>
                            <td>
                                <input type="text" value="<?php echo $posttitle['title'] ?>" class="medium" name="posttitle" />
                            </td>
                        </tr>
                      <?php } }?>
                      
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
                                    <?php if(is_array($catres)||is_object($catres)){foreach($catres as $cres){?>
                                        <option value="<?php echo $cres['cat_id']?>"><?php echo $cres['catname']?></option>
                                    <?php }} ?>
                                </select>
                            
                            </td>
                        </tr>
                   
                        <?php if(is_array($editpost)||is_object($editpost)){foreach ($editpost as $postcontent) {?>
                        <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>Content</label>
                            </td>
                            <td>
                                <textarea class="tinymce" name="postcontent" style="resize:none;width:50%;height:150px"><?php echo $postcontent['content'] ?></textarea>
                            </td>
                        </tr>
                        <?php }}?>
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
                        <?php if(is_array($loggeduser)||is_object($loggeduser)){ foreach ($loggeduser as $luser) {?>
                        <tr>
                            <td class="logged-in-user">
                                 <input type="hidden" name="loggeduserid" value="<?php echo  $luser['user_id'] ?>" />
                            </td>
                        </tr>
                       
                        <?php }} ?>
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
    <?php
//post update here
                    
                    if (isset($_REQUEST['submit'])) {
                        if(isset($_REQUEST['id'])){
                        $updatepostid=$_REQUEST['id'];
                        }
                        $title=$_REQUEST['posttitle'];
                        $cat=$_REQUEST['catlist'];
                        $content=$_REQUEST['postcontent'];
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

                        //update query
                        $updatepostquery="update tbl_post set title='$title',content='$content',cat_id='$cat',image='$detination' where post_id='$updatepostid'";
                        $updatepost=$DB->update($updatepostquery);
                    }

                ?>              



    <?php include "inc/footer.php";?>