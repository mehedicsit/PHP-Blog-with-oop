<?php include "inc/header.php" ;?>
        <div class="clear">
        </div>
        <div class="grid_2">
            <div class="box sidemenu">
                <div class="block" id="section-menu">
                    <ul class="section menu">
						<li><a class="menuitem">Site Option</a>
                            <ul class="submenu">
                                <li><a href="titleslogan.php">Title & Slogan</a></li>
                                <li><a href="social.php">Social Media</a></li>
                                <li><a href="copyright.php">Copyright</a></li>
                                
                            </ul>
                        </li>
						
                         <li><a class="menuitem">Update Pages</a>
                            <ul class="submenu">
                                <li><a>About Us</a></li>
                                <li><a>Contact Us</a></li>
                            </ul>
                        </li>
                        <li><a class="menuitem">Category Option</a>
                            <ul class="submenu">
                                 <li><a href="addcat.php">Add Category</a> </li>
                                <li><a href="catlist.php">Category List</a> </li>
                            </ul>
                        </li>
                        <li><a class="menuitem">Post Option</a>
                            <ul class="submenu">
                                <li><a href="addpost.php">Add Post</a> </li>
                                <li><a href="postlist.php">Post List</a> </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Add New Post</h2>
                <div class="block"> 
                <?php 
                    $DB=new Database();
                    $logged_user_id=0;

                    if(isset($_POST['submit'])){
                        $posttitle=$_POST['posttitle'];
                        $postcontent=$_POST['postcontent'];
                        $catname=$_POST['catlist'];
                        $logged_user_id=$_POST['loggeduserid'];
                        $insertpostq="insert into tbl_post(title,content,cat_id,user_id) values('$posttitle','$postcontent','$catname','$logged_user_id')";

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
                                <input type="file" name="feature-image" />
                            </td>
                        </tr>
                        <?php 
                             $sessionuser=$_SESSION['username'];
                            $isuserloggedinquery="select user_id from tbl_user where username='$sessionuser'";
                            $loggeduser= $DB->select($isuserloggedinquery);
                           
                        ?>
                        <?php if(is_array($loggeduser)){ foreach ($loggeduser as $luser) {?>
                        <tr>
                            <td class="logged-in-user">
                                 <input type="hidden" name="loggeduserid" value="<?php echo $luser['user_id'] ?>" />
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
    <?php include "inc/footer.php";?>