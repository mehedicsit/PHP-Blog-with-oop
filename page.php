<?php include "inc/header.php" ?>
<?php 
    if(isset($_GET['id'])){
        $pageid=$_GET['id'];
        $pagedata="select * from tbl_page where page_id='$pageid'";
        $pageres=$DB->select($pagedata);
    }

?>
	<div class="contentsection contemplete clear">
		<div class="maincontent clear">
			<div class="about">
            <?php foreach ($pageres as $pres) {?>
               
           
				<h2><?php echo $pres['page_title']?></h2>
                    <?php echo $pres['page_content']?>
                
                <?php  } ?>
	</div>

		</div>
<?php include "inc/sidebar.php"; ?>
	</div>

		<?php include "inc/footer.php"?>