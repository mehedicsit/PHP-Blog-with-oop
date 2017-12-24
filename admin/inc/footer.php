
 <div id="site_info">
<?php 
    $DB=new Database();
    $copyrightq="select copyright from tbl_slogan ";
    $copyres=$DB->select($copyrightq);


?>
<?php foreach ($copyres as $copres) {?>

     <p>
        <a href="code4webs.com"><?php echo $copres['copyright']; ?></a>
        </p>
    <?php  } ?>
    </div>
</body>
</html>
