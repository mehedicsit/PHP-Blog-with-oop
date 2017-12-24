
<?php  include "inc/header.php";?>
<?php include "helpers/Structure-post.php"; ?>
	<div class="contentsection contemplete clear">
		<div class="maincontent clear">
		<!-- Pagination start here-->

				<?php
				if(isset($_GET['submit'])){
					$searchkey=$_GET['keyword'];
					$squery="select tbl_post.title,tbl_post.content,tbl_post.image,tbl_post.dates,tbl_user.user_id,tbl_user.name from tbl_post,tbl_user where title like '%$searchkey%' or content like '%$searchkey%' and tbl_post.user_id=tbl_user.user_id";
					$finalserach=$DB->select($squery);

				}
			$helper=new sturcturePost();
			?>
    <?php if (is_array($finalserach) || is_object($finalserach)) { foreach ($finalserach as $sres) {?>

			<div class="samepost clear">
				<h2><a href="post.php?id=<?php echo $sres['post_id']; ?>"><?php echo $sres['title']; ?></a></h2>
				<h4><?php echo $helper->dateFormat($sres['dates']); ?>, By <a href="author.php?id=<?php echo $sres['user_id']; ?>"><?php echo $sres['name']; ?></a></h4>
				 <a href="post.php?id=<?php echo $sres['post_id']; ?>"><img src="admin/upload/<?php echo $sres['image']; ?>" alt="post image"/></a>
				<p>
					<?php echo $helper->excerpt($sres['content'],0,250); ?>
				</p>
				<div class="readmore clear">
					<a href="post.php?id=<?php echo $sres['post_id']; ?>">Read More</a>
				</div>
			</div>

    <?php }}else{ echo "nothing match result";}?>			

<!-- End while loop here -->



<!-- End if  here -->

		</div>
<?php include "inc/sidebar.php"; ?>
	</div>

<?php  include "inc/footer.php"?>