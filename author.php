<?php include "inc/header.php" ?>
<?php include "helpers/Structure-post.php"; ?>
<?php 
	if(isset($_GET['id'])){
		$singlepostid=$_GET['id'];
		$singlepostquery="select tbl_post.post_id,tbl_post.title,tbl_post.content,tbl_post.dates,tbl_post.image,tbl_post.user_id,tbl_user.user_id,tbl_user.username 
		
		from tbl_post,tbl_user 
		
		where tbl_post.user_id =tbl_user.user_id and tbl_user.user_id='$singlepostid'";
		$singpost=$DB->select($singlepostquery);
	}
	$helper=new sturcturePost(); 

?>
	<div class="contentsection contemplete clear">

		<div class="maincontent clear">
		
			<div class="about">

				<?php if (is_array($singpost) || is_object($singpost)) { foreach ($singpost as $spost) {?>
					<h2><?php echo $spost['title']; ?></h2>
						<h4><?php echo $helper->dateFormat($spost['dates']); ?>, By <a href="author.php?id=<?php echo $spost['user_id']; ?>"><?php echo $spost['username']; ?></a></h4>
					<img src="images/<?php echo $spost['image']; ?>" alt="MyImage"/>
					<p><?php echo html_entity_decode($spost['content']); ?></p>
				<?php 	} }else{ echo "nothing match result";}?>

			<?php 
				$rlquery="
				SELECT tbl_post.post_id,tbl_post.image,tbl_category.catname,tbl_category.cat_id
				
				FROM tbl_category,tbl_post
				WHERE tbl_post.cat_id=tbl_category.cat_id AND tbl_category.cat_id='$singlepostid' limit 6";
				$relatedpost=$DB->select($rlquery);
		
			?>
				<div class="relatedpost clear">
					<h2>Related articles</h2>
					<?php foreach ($relatedpost as $rlres) {?>
					
					<a href="post.php?id=<?php echo $rlres['post_id']; ?>"><img src="admin/<?php echo $rlres['image']; ?>" alt="post image"/></a>

					<?php } ?>
				</div>
			</div>

		</div>
<?php include "inc/sidebar.php"; ?>
	</div>

<?php include "inc/footer.php"; ?>