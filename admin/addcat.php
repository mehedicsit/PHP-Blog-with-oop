﻿<?php include "inc/header.php" ;?>
       
        <div class="grid_10">
            <?php 
                $DB=new Database();
                if(isset($_POST['submit'])){
                    $insertcat=$_POST['catname'];
                    $catquery="insert into tbl_category(catname) values('$insertcat')";
                    
                    $insertcat=$DB->insert($catquery);

                }
            
            
            ?>
            <div class="box round first grid">
                <h2>Add New Category</h2>

               <div class="block copyblock"> 
                 <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" placeholder="Enter Category Name..." class="medium" name="catname" />
                            </td>
                        </tr>
						<tr> 
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