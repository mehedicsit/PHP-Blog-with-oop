<?php include "inc/header.php" ;?>
        
        <div class="grid_10">
            <?php 
                $DB=new Database();
                if(isset($_POST['submit'])){
                    $pagetitle=$_POST['pagetitle'];
                    $pagecontent=$_POST['pagecontent'];
                    $pagequery="insert into tbl_page(page_title,page_content) values('$pagetitle','$pagecontent')";
                    
                    $insertpage=$DB->insert($pagequery);

                }
            
            
            ?>
            <div class="box round first grid">
                <h2>Add New Category</h2>

               <div class="block copyblock"> 
                 <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" placeholder="Enter Page Title" class="medium" name="pagetitle" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <textarea name="pagecontent" id="addpage" cols="30" rows="10">Please add page content here</textarea>
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