<?php 
$config_themes = $this->config->item('themes');
$images = $config_themes['path_image'];  
?>

<div class="body_resize_bottom">

		 <div class="blog">
			<h2>About</h2>
			<img src="<?php echo $images ?>img_2.jpg" alt="picture" width="274" height="116" />
			<?php echo isset($profile[0]["about"])?word_limiter($profile[0]["about"],55):""; ?>
			<p><a href="<?php echo base_url().'about' ?>"><strong>Continue Reading &gt;&gt;</strong></a></p>
		 </div>
  
       		  
          <div class="blog">
            <h2>Use Our CMS</h2>
            <img src="<?php echo $images ?>img_1.jpg" alt="picture" width="274" height="116" />
            
			<p>
				Keamanan dan kecepatan dari proses pengembangan website menjadi masalah yang sangat penting sekali
				, kami coba untuk mengkombinasikan keduanya ada dalam produk kami sehingga menjadi lebih :<br />
				- Cepat <br />
				- Mudah Digunakan <br />
				- Aman <br />
			</p>
			
			
          </div>
		
		   <div class="blog">
		   <?php echo isset($news)?$news:""; ?>
		   </div>
	
          <div class="clr"></div>
</div>