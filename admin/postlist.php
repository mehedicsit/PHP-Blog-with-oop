<?php include "inc/header.php" ;?>
<?php include "../helpers/Structure-post.php" ;?>
        
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Post List</h2>
                <div class="block">  
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Post Title</th>
							<th>Description</th>
							<th>Category</th>
							<th>Image</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					<?php 
						$postq="select tbl_post.post_id,tbl_post.title,tbl_post.content,tbl_post.image,tbl_post.dates,tbl_post.user_id,tbl_category.cat_id,tbl_category.catname 
						from 
						tbl_post,tbl_category  where tbl_category.cat_id=tbl_post.cat_id ORDER BY tbl_post.post_id desc  ";
						$DB=new Database();
						$postlist=$DB->select($postq);
						$helper=new sturcturePost();


					?>
					<?php foreach($postlist as $postres){?>
						<tr class="odd gradeX">
							<td><?php echo $postres['title'] ?></td>
							<td><?php echo $helper->excerpt($postres['content'],0,100); ?></td>
							<td><?php echo $postres['catname'] ?></td>
							<td class="center"> <?php echo $postres['image'] ?></td>
							<td><a href="edit-post.php?id=<?php echo $postres['post_id'] ?>">Edit</a> || <a href="delete-post.php?id=<?php echo $postres['post_id'] ?>">Delete</a></td>
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
	<script type="text/javascript">
        $(document).ready(function () {
            setupLeftMenu();
            $('.datatable').dataTable();
			setSidebarHeight();
        });
    </script>
   <?php include "inc/footer.php";?>