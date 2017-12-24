<?php include "inc/header.php" ;?>
<?php 
require_once "../lib/Database.php"; 
    if(isset($_POST['submit'])){

         $facebook=$_POST['facebook'];
        $twitter=$_POST['twitter'];
        $linkedin=$_POST['linkedin'];
        $googleplus=$_POST['googleplus'];
       
        
        $DB= new Database();
        $socialupdate="update tbl_social set facebook='$facebook',twitter='$twitter',linkedin='$linkedin',gplus ='$googleplus' where id=1";
        
        $insertslogan= $DB->update($socialupdate);
        
    }
    ?>
       
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Update Social Media</h2>
                <div class="block">               
                 <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
                    <table class="form">					
                        <tr>
                            <td>
                                <label>Facebook</label>
                            </td>
                            <td>
                                <input type="text" name="facebook" placeholder="Facebook link.." class="medium" />
                            </td>
                        </tr>
						 <tr>
                            <td>
                                <label>Twitter</label>
                            </td>
                            <td>
                                <input type="text" name="twitter" placeholder="Twitter link.." class="medium" />
                            </td>
                        </tr>
						
						 <tr>
                            <td>
                                <label>LinkedIn</label>
                            </td>
                            <td>
                                <input type="text" name="linkedin" placeholder="LinkedIn link.." class="medium" />
                            </td>
                        </tr>
						
						 <tr>
                            <td>
                                <label>Google Plus</label>
                            </td>
                            <td>
                                <input type="text" name="googleplus" placeholder="Google Plus link.." class="medium" />
                            </td>
                        </tr>
						
						 <tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="Update" />
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