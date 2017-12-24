<?php include "inc/header.php" ;?>
       
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Category List</h2>
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Category Name</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					<?php 
						$DB=new Database();
						$readcat="select * from tbl_category";
						$catlist=$DB->select($readcat);
					
					?>
					<?php foreach ($catlist as $listres){?>
						
						<tr class="<?php if($listres%2==0){echo "even";} else {echo "odd";} ?> gradeX">
							<td><?php echo $listres['cat_id']; ?></td>
							<td><?php echo $listres['catname']; ?></td>
							<td><a href="cat-edit.php?id=<?php echo $listres['cat_id'];  ?>">Edit</a> || <a href="cat-delete.php?id=<?php echo $listres['cat_id'];  ?>">Delete</a></td>
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