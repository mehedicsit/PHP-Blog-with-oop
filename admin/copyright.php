<?php include "inc/header.php" ;?>
<?php 
 
    $DB=new Database();
    if(isset($_POST['submit'])){
        $copyright=$_POST['copyright'];
        $socialquery="update tbl_slogan set copyright='$copyright' where id=1";
        $DB->update($socialquery);

    }


?>
       
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Update Copyright Text</h2>
                <div class="block copyblock"> 
                 <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" placeholder="Enter Copyright Text..." name="copyright" class="large" />
                            </td>
                        </tr>
						
						 <tr> 
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