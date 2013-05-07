<?php 
$config_themes = $this->config->item('themes');
$images = $config_themes['myupload_services']; 
?>

<div class="body_resize_bottom">
          <div class="left">
            <h2>Services What we do!</h2>
            <p>Berdasarkan pengalaman kami menyelesaikan proyek, yang kami fokuskan padanya. kami melakukannya dengan cara yang cepat, mudah dan menyenangkan. sebagian dari layanan kami adalah:</p>
            
            <div class="bg"></div>
            <h2>Services List</h2>
            
            
			<?php foreach($services as $services) { ?>
			
			<img src="<?php echo $images.$services['image']; ?>" alt="picture" width="223" height="204" class="floated2" />
			<h4><?php echo $services["title"]; ?></h4>
				<?php echo $services["content"]; ?>
				<a href=<?php echo base_url()."contact"; ?>><strong>Pesan Sekarang &gt; &gt; </strong></a>
			<div class="clr"></div>
            
			
			<?php } ?>		
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