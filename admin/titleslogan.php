<?php include "inc/header.php" ;?>
<?php 
require_once "../lib/Database.php"; 
    if(isset($_POST['submit'])){

         $title=$_POST['title'];
         $slogan=$_POST['slogan'];
       
        
        $DB= new Database();
        $sloganq="update tbl_slogan set title='$title',slogan= '$slogan' where id=1";
        
        $insertslogan= $DB->update($sloganq);
        
    }
    ?>
        
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Update Site Title and Description</h2>
                <div class="block sloginblock">               
                 <form  method="POST" action="<?php echo $_SERVER['PHP_SELF']?>">
                    <table class="form" >					
                        <tr>
                            <td>
                                <label>Website Title</label>
                            </td>
                            <td>
                                <input type="text" placeholder="Enter Website Title..."  name="title" class="medium" />
                            </td>
                        </tr>
						 <tr>
                            <td>
                                <label>Website Slogan</label>
                            </td>
                            <td>
                                <input type="text" placeholder="Enter Website Slogan..." name="slogan" class="medium" />
                            </td>
                        </tr>
						 
						
						 <tr>
                            <td>
                            </td>
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