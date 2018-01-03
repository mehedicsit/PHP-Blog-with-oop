<?php include "lib/Database.php"; ?>
<?php include "inc/header.php" ?>
<?php include "inc/slider.php" ?>
<?php 
//custom php start here

	$DB=new Database();
	
	//start pagination


	//stop pagination

?>

	<div class="contentsection contemplete clear">
		<div class="maincontent clear">
		<!-- Pagination start here-->

		<?php 

		$p_query="
			SELECT tbl_user.name, tbl_post.title,tbl_post.content,tbl_post.image,tbl_post.dates,tbl_user.user_id,tbl_post.post_id
			FROM tbl_user,tbl_post 
			where tbl_user.user_id=tbl_post.user_id order by tbl_post.dates desc";
		$p_data=$DB->select($p_query);
		if ($p_data) {
			foreach ($p_data as $P_result ) {

		?>


			<div class="samepost clear">
				<h2><a href="post.php?id=<?php echo $P_result['post_id']; ?>"><?php echo $P_result['title']; ?></a></h2>
				<h4><?php echo $p_format->dateFormat($P_result['dates']); ?>, By <a href="author.php?id=<?php echo $P_result['user_id']; ?>"><?php echo $P_result['name']; ?></a></h4>
				 <a href="post.php?id=<?php echo $P_result['post_id']; ?>"><img src="admin/<?php echo $P_result['image']; ?>" alt="post image"/></a>
				<p>
					<?php echo $p_format->excerpt(html_entity_decode($P_result['content']),0,250); ?>
				</p>
				<div class="readmore clear">
					<a href="post.php?id=<?php echo $P_result['post_id']; ?>">Read More</a>
				</div>
			</div>

			
<?php } ?>
<!-- End while loop here -->
<!-- Pagination start here-->
<?php 
$pgn_query="select * from tbl_post";
$pgn_result=$DB->select($pgn_query);
$total_rows=mysqli_num_rows($pgn_result);
echo "<span class='pagination'><a href='index.php?page=1'>First Page</a>"?>

 1,2,3

<?php echo "<a href='index.php?page=1'>Last Page</a></span>" ?>
<!-- Pagination stop here-->

<?php } else{ header("Location: 404.php");} ?>
<!-- End if  here -->

		</div>
<?php include "inc/sidebar.php"; ?>
	</div>

	<?php include "inc/footer.php"?>