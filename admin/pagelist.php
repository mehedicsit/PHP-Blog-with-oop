<?php include "inc/header.php" ;?>

        <div class="grid_10">
            <div class="box round first grid">
                <h2>Page List</h2>
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Id</th>
							<th>Page Title</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					<?php 
						$DB=new Database();
						$readpage="select * from tbl_page";
						$pagelist=$DB->select($readpage);
					
					?>
					<?php foreach ($pagelist as $pageres){?>
						
						<tr class="gradeX">
							<td style="text-align:center"><?php echo $pageres['page_id']; ?></td>
							<td style="text-align:center"><?php echo $pageres['page_title']; ?></td>
							
							<td style="text-align:center"><a href="edit-page.php?id=<?php echo $pageres['page_id'];  ?>">Edit</a> || <a href="delete-page.php?id=<?php echo $pageres['page_id'];  ?>">Delete</a></td>
						</tr>
					<?php }?>
					</tbody>
				</table>
               </div>
            </div>
        </div>
        <div class="clear">
        </div>
    </div>
    <div class="clear">
    </div>
   <?php include "inc/footer.php";?>