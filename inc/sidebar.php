	
		<div class="sidebar clear">
			<div class="samesidebar clear">
				<h2>Categories</h2>


				<?php 
					$cat_query="select * 
								from tbl_category ";
					$catres=$DB->select($cat_query);
				
				?>
					<ul>
					<?php foreach ($catres as $cres) {?>

						<li><a href="category.php?id=<?php echo $cres['cat_id']; ?>"><?php echo $cres['catname']; ?></a></li>
	
						<?php } ?>					
					</ul>

			</div>
			
			<div class="samesidebar clear">
				<h2>Latest articles</h2>

				<?php 
					$sidebarpost="select post_id,title,content,image from tbl_post limit 3";
					$newpost=$DB->select($sidebarpost);
					$p_format=new sturcturePost ();
					
				
				?>
				<?php foreach($newpost as $reposres){ ?>
					<div class="popular clear">
						<h3><a href="post.php?id=<?php echo  $reposres['post_id'];?>"><?php echo  $reposres['title']?></a></h3>
						<a href="post.php?id=<?php echo  $reposres['post_id'];?>"><img src="images/<?php echo  $reposres['image']?>" alt="post image"/></a>
						<p><?php echo $p_format->excerpt( $reposres['content'],0,150);?></p>	
					</div>
				<?php }?>	
					
	
			</div>
			
		</div>