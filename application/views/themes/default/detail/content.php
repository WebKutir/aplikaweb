<?php $images = base_url()."assets/themes/digitalweb/images/"; ?>

<style>
.error {
  background-color: red;
  color: white;
  font-family: arial;
  font-size: 14px;
}

.success {
  background-color: blue;
  color: white;
  font-family: arial;
  font-size: 14px;
}
</style> 

<div class="body_resize_bottom">
          <div class="left">
            
			<?php 
			// print_r($list); 
			$config_themes = $this->config->item('themes');
			$images = $config_themes['myupload_thumbs']; 
			?>

			<?php if(!empty($detail)) { ?>
			<h2><?php echo $detail['title']; ?></h2>
			<p>Author : <?php echo $detail['first_name']." ".$detail['last_name']; ?></p>
			<p>Date Published : <?php echo tanggal($detail['date']); ?></p>
			<img src="<?php echo $images.$detail["image"]; ?>" />
			<?php echo $detail["content"]; ?>
			
			<div class="clr"></div>
						
			<?php } ?>		


			<!-- comments -->
			
			<?php if($this->session->flashdata('sukses')) { ?>
					<div class="success">	
						<?php echo $this->session->flashdata('sukses'); ?>
					</div>
			<?php } ?>
			
			
			<h2>Leave Comment</h2>
			<?php echo validation_errors(); ?>			
			<form action="<?php echo base_url().'articles/validate/'.$id_articles?>" method="post" id="contactform">
				<input type="hidden" name="id_articles" value="<?php echo $id_articles; ?>" />
              <ol>
                <li>
                  <label for="name">Name <span class="red">*</span></label>
                  <input id="name" name="name" class="text" />
                </li>
                <li>
                  <label for="email">Your email <span class="red">*</span></label>
                  <input id="email" name="email" class="text" />
                </li>
				<li>
                  <label for="message">Message <span class="red">*</span></label>
                  <textarea id="message" name="message" rows="6" cols="50"></textarea>
                </li>
			   
			   
			   <li>	
				<img id="captcha" src="<?php echo base_url()?>assets/addons/secureimage/securimage_show.php" alt="Security Code" style="padding-left:135px;padding-bottom:2px;" />
                <a href="#" onClick="document.getElementById('captcha').src = '<?php echo base_url()?>assets/addons/secureimage/securimage_show.php?' + Math.random(); return false" tabindex="-1">
                <img src="<?php echo base_url()?>assets/addons/secureimage/images/refresh.gif" title="Reload Image" alt="Reload Image" border="0" align="bottom" /></a>		
               </li>				

				<li>
                  <label for="code">Code <span class="red">*</span></label>
                  <input id="code" name="code" class="text" size="12" />
                </li>
			   
			  
				<!-- NOTE: the "name" attribute is "code" so that $img->check($_POST['code']) will check the submitted form field -->
				<?php $image = base_url()."assets/themes/digitalweb/images/";  ?>
                <li class="buttons">
                  <input type="image" name="imageField" id="imageField" src="<?php echo $image; ?>send.gif" class="send" />
                  <div class="clr"></div>
                </li>
				</ol>
			</form>
			
			<?php echo isset($list_comments)?$list_comments:""; ?>
			
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