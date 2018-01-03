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

                

                 <form action="<?php echo urlencode('update-post.php'); ?>" method="post" enctype="multipart/form-data">
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
                                <input type="hidden" name="id" value="<?php echo $editid; ?>">
                               <input type="submit" name="submit" Value="Save" />
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