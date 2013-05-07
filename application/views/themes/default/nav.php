
<?php $link_active = isset($link_active)?$link_active:"error"; ?>

<div class="menu">
<ul>
  <li><a <?php if ($link_active == "home"){ echo " class ='active'"; } ?> href="<?php echo base_url().'home';?>">Home</a></li>
  <li><a <?php if ($link_active == "services"){ echo " class ='active'"; } ?> href="<?php echo base_url().'services';?>">Services </a></li>
  <li><a <?php if ($link_active == "portfolio"){ echo " class ='active'"; } ?> href="<?php echo base_url().'portfolio';?>">Portfolio</a></li>
  <li><a <?php if ($link_active == "theme"){ echo " class ='active'"; } ?> href="<?php echo base_url().'theme';?>">Theme</a></li>
  <li><a <?php if ($link_active == "about"){ echo " class ='active'"; } ?> href="<?php echo base_url().'about';?>">About Us</a></li>
  <li><a <?php if ($link_active == "plan"){ echo " class ='active'"; } ?> href="<?php echo base_url().'plan';?>">Order</a></li>
  <li><a <?php if ($link_active == "contact"){ echo " class ='active'"; } ?> href="<?php echo base_url().'contact';?>">Contact Us</a></li> 
</ul>
</div>