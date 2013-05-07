<?php $images = $path; ?>
<div class="footer">
<div class="footer_resize"> 

<a href="#"><img src="<?php echo $images ?>footer_logo.png" alt="picture" width="322" height="61" border="0" class="loggo" /></a>
  <p class="right"> 
	<a href="#"><img src="<?php echo $images ?>rss_1.gif" alt="picture" width="16" height="16" border="0" class="rss" /></a> 
	<a href="#"><img src="<?php echo $images ?>rss_2.gif" alt="picture" width="16" height="16" border="0" class="rss" /></a> 
	<a href="<?php echo isset($profile[0]["twitter"])?$profile[0]["twitter"]:""; ?>"><img src="<?php echo $images ?>rss_3.gif" alt="picture" width="16" height="16" border="0" class="rss" /></a> 
	<a href="<?php echo isset($profile[0]["facebook"])?$profile[0]["facebook"]:""; ?>"><img src="<?php echo $images ?>rss_4.gif" alt="picture" width="16" height="16" border="0" class="rss" /></a> &copy; Copyright aplikaweb . All Rights Reserved<br />
	<a href="<?php echo base_url(); ?>">Home</a> | <a href="#">Contact</a> | <a href="#">RSS</a> (Feed) <a href="<?php echo base_url(); ?>">aplikaweb</a></p>
  <div class="clr"></div>
</div>
<div class="clr"></div>
</div>