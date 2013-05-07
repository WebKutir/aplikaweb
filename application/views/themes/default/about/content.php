<?php 
$config_themes = $this->config->item('themes');
$images = $config_themes['myupload']; 
?>

<div class="body_resize_bottom">
          <div class="left">
            
            <h2>About Us</h2>
            
			<img src="<?php echo $images.$profile[0]["image"]; ?>" />
			<?php echo isset($profile[0]["about"])?$profile[0]["about"]:""; ?>
			
			<div class="clr"></div>
          </div>
		  
		  
          <div class="right">
            <h2>Subnavigation</h2>
            <ul>
				<?php foreach($submenu as $submenu) { ?>
						<li> <a href="#"><?php echo $submenu["name"]; ?></a></li>
				<?php } ?>
              
            </ul>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
			
			
            <?php echo isset($ads)?$ads:""; ?>
			
			
			
            <p>&nbsp;</p>
            <p>&nbsp;</p>
			
			
			
            <?php echo isset($news)?$news:""; ?>
          
		  </div>
          <div class="clr"></div>
</div>