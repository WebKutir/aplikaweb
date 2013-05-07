<?php 
$config_themes = $this->config->item('themes');
$images = $config_themes['path_image']; 
?>


<?php foreach($list as $data) { ?>

<div class="blog">
	<h2>About DigiKreatif</h2>
	<img src="<?php echo $images ?>img_1.jpg" alt="picture" width="274" height="116" />
	<?php echo $data["about"] ?>
	<p><a href="#"><strong>Continue Reading &gt;&gt;</strong></a></p>
  </div>
  
<?php } ?>