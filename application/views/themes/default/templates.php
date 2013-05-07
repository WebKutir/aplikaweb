<?php echo isset($header)?$header : "";  ?>
<body>
<div class="main">
  <div class="header_resize">
    <div class="header">
      <div class="logo"><a href="<?php echo base_url(); ?>"><img src="<?php echo $path ?>logo.png" width="321" height="143" border="0" alt="logo" /></a></div>
	  <?php echo isset($nav)?$nav : "";  ?>
      <div class="clr"></div>
    </div>
  </div>
  <div class="header_blog">
    <?php echo isset($slide)?$slide : "";  ?>
	<div class="clr"></div>
  </div>
  <div class="clr"></div>
  <div class="body">
    <div class="search_bg"> <a href="#"><img src="<?php echo $path ?>clean_prof.gif" alt="picture" width="241" height="21" border="0" class="search1" /></a>
      <div class="search">
        <form id="form1" name="form1" method="post" action="">
          <span>
          <input name="q" type="text" class="keywords" id="textfield" maxlength="50" value="Search..." />
          </span>
          <input name="b" type="image" src="<?php echo $path ?>search.gif" class="button" />
        </form>
      </div>
      <div class="clr"></div>
    </div>
    <div class="body_resize">
      <div class="body_resize_top">
        <?php echo isset($main)?$main : "";  ?>
      </div>
    </div>
  </div>
  <div class="clr"></div>
<?php echo isset($footer)?$footer : "";  ?>
</div>
</body>
</html>