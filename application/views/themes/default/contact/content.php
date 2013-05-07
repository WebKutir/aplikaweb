<?php 
$images = base_url()."assets/themes/digitalweb/images/"; 
$sitename = isset($profile[0]['first_name'])?$profile[0]['first_name']:"";
?>
 
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
            <h2>Send Us an e-mail</h2>
            <p>Butuh informasi lebih lanjut yang berhubungan dengan pembuatan dan pengembangan website aplikasi</p>
            <p>&nbsp;</p>
            <h2>Hubungi kami melalui form ini</h2>
            <p>&nbsp;</p>
			
			<?php if($this->session->flashdata('sukses')) { ?>
					<div class="success">	
						<?php echo $this->session->flashdata('sukses'); ?>
					</div>
			<?php } else { ?>
			<?php echo validation_errors(); ?>
			
            <form action="<?php echo base_url().'contact/validate/'?>" method="post" id="contactform">
              <ol>
                <li>
                  <label for="name">First Name <span class="red">*</span></label>
                  <input id="name" name="name" class="text" />
                </li>
                <li>
                  <label for="email">Your email <span class="red">*</span></label>
                  <input id="email" name="email" class="text" />
                </li>
                <li>
                  <label for="company">Company</label>
                  <input id="company" name="company" class="text" />
                </li>
                <li>
                  <label for="subject">Subject</label>
                  <input id="subject" name="subject" class="text" />
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
				
				
                <li class="buttons">
                  <input type="image" name="imageField" id="imageField" src="<?php echo $images; ?>send.gif" class="send" />
                  <div class="clr"></div>
                </li>
              </ol>
            </form>
			
		<?php } ?>	
          </div>
          <div class="right">
            <h2>Contact Details</h2>
            <p>Kritik & saran? Kami sangat senang mendengarnya dari anda. <br />
              untuk konsultasi bisa menghubungi email atau no telepon dibawah ini.</p>
            <p><strong>Office</strong> : <?php echo isset($profile[0]['telephone'])?$profile[0]['telephone']:''; ?><br />
              <strong>Cell</strong> : <?php echo isset($profile[0]['handphone'])?$profile[0]['handphone']:''; ?><br />
              <strong>Email</strong> : <?php echo isset($profile[0]['email'])?$profile[0]['email']:''; ?></p>
            <h2>Email Support</h2>
            <p><strong>Support</strong> : support@<?php echo $sitename; ?><br />
            </p>
          </div>
          <div class="clr"></div>
        </div>