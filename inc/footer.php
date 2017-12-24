<div class="footersection templete clear">
	  <div class="footermenu clear">
		<ul>
			<li><a href="#">Home</a></li>
			<li><a href="#">About</a></li>
			<li><a href="#">Contact</a></li>
			<li><a href="#">Privacy</a></li>
		</ul>
	  </div>
		<?php 
		$copyrightq="select copyright from tbl_slogan";

		$copyres=$DB->select($copyrightq);

		?>
		<?php foreach ($copyres as $res) {?>
	
	  <p><?php echo $res['copyright']; ?></p>
		<?php }?>
	</div>
	<div class="fixedicon clear">
	<?php
		$socialq="select * from tbl_social";
		$socialres=$DB->select($socialq);
	?>
	<?php foreach ($socialres as $res) {?>
	
	
		<a href="<?php echo $res['facebook'] ;?>"><img src="images/fb.png" alt="Facebook"/></a>
		<a href="<?php echo $res['twitter'] ;?>"><img src="images/tw.png" alt="Twitter"/></a>
		<a href="<?php echo $res['linkedin'] ;?>"><img src="images/in.png" alt="LinkedIn"/></a>
		<a href="<?php echo $res['gplus'] ;?>"><img src="images/gl.png" alt="GooglePlus"/></a>
		<?php } ?>
	</div>
<script type="text/javascript" src="js/scrolltop.js"></script>
</body>
</html>