<?php 
	if($this->session->userdata('group') == '1'){ ?>
		<!-- admin nav -->
	<!-- Left Dark Bar Start -->
    <div id="leftside">
    	<div class="user">
        	<img src="<?php echo base_url();?>assets/themes/admin/img/avatar.png" width="44" height="44" class="hoverimg" alt="Avatar" />
            <p>Logged in as:</p>
            <p class="username"><?php echo $this->session->userdata('username'); ?></p>
			<p class="userbtn"><a href="<?php echo base_url()."profile";?>" title="">Profile</a></p>
            <p class="userbtn"><a href="<?php echo base_url()."webmin/logout"; ?>" title="">Log out</a></p>
        </div>
        <div class="notifications">
        	<p class="notifycount"><a href="" title="" class="notifypop">10</a></p>
            <p><a href="" title="" class="notifypop">New Notifications</a></p>
            <p class="smltxt">(Click to open notifications)</p>
        </div>
        
        <ul id="nav">
        	<li>
                <ul class="navigation">
                    <li class="heading selected">CMS</li>
                </ul>
            </li>
            <li><a class="expanded heading">Dynamic Page</a>
                <ul class="navigation">
                    <li><a href="<?php echo base_url()."cat" ?>" title="">Categories</a></li>
                    <li><a href="<?php echo base_url()."service" ?>" title="">Services</a></li>
                    <li><a href="<?php echo base_url()."news" ?>" title="">News</a></li>
                    <li><a href="<?php echo base_url()."coding" ?>" title="">Coding</a></li>
                    <li><a href="<?php echo base_url()."design" ?>" title="">Design</a></li>
                    <li><a href="<?php echo base_url()."slideshow" ?>" title="">Slideshow</a></li>
                    <li><a href="<?php echo base_url()."download" ?>" title="">Download</a></li>
                    <li><a href="<?php echo base_url()."event" ?>" title="">Event</a></li>
                    <li><a href="<?php echo base_url()."contacts" ?>" title="">Contacts</a></li>
                </ul>
            </li>
			
			<li>
                <a class="expanded heading">Manage Images</a>
                 <ul class="navigation">
                    <li><a href="<?php echo base_url()."album" ?>" title="">Album</a></li>
                    <li><a href="<?php echo base_url()."gallery" ?>" title="">Gallery</a></li>
				 </ul>
            </li>
			
			<li><a class="expanded heading">Setting</a>
                <ul class="navigation">
                    <li><a href="<?php echo base_url()."profile" ?>" title="">Site Profile</a></li>
                    <li><a href="<?php echo base_url()."seo" ?>" title="seo tools">SEO</a></li>
                    <li><a href="<?php echo base_url()."user" ?>" title="">User</a></li>
				</ul>
            </li>
            <!-- 
			<li>
                <ul class="navigation">
                    <li class="heading selected">E-Commerce</li>
					<li><a href="#" title="">Section link here</a></li>
                </ul>
            </li>
			<li>
                <ul class="navigation">
                    <li class="heading selected">Forum</li>
					<li><a href="#" title="">Section link here</a></li>
                </ul>
            </li>
			-->
        </ul>
    </div>
    <!-- Left Dark Bar End --> 
		
		<!-- end admin nav -->
<?php }else{  ?>
		<!-- member nav -->
		
		<!-- Left Dark Bar Start -->
    <div id="leftside">
    	<div class="user">
        	<img src="<?php echo base_url();?>assets/themes/admin/img/avatar.png" width="44" height="44" class="hoverimg" alt="Avatar" />
            <p>Logged in as:</p>
            <p class="username"><?php echo $this->session->userdata('username'); ?></p>
			
            <p class="userbtn"><a href="<?php echo base_url()."webmin/logout"; ?>" title="">Log out</a></p>
        </div>
        <div class="notifications">
        	<p class="notifycount"><a href="" title="" class="notifypop">10</a></p>
            <p><a href="" title="" class="notifypop">New Notifications</a></p>
            <p class="smltxt">(Click to open notifications)</p>
        </div>
        
        <ul id="nav">
        	<li>
                <ul class="navigation">
                    <li class="heading selected">CMS</li>
                </ul>
            </li>
            <li><a class="expanded heading">Dynamic Page</a>
                <ul class="navigation">
                    
                    <li><a href="<?php echo base_url()."news" ?>" title="">News</a></li>
					<li><a href="<?php echo base_url()."coding" ?>" title="">Coding</a></li>
					<li><a href="<?php echo base_url()."design" ?>" title="">Design</a></li>
                    <li><a href="<?php echo base_url()."download" ?>" title="">Download</a></li>
                    <li><a href="<?php echo base_url()."event" ?>" title="">Event</a></li>
                </ul>
            </li>
			
			<li>
                <a class="expanded heading">Manage Images</a>
                 <ul class="navigation">
                    <li><a href="<?php echo base_url()."album" ?>" title="">Album</a></li>
                    <li><a href="<?php echo base_url()."gallery" ?>" title="">Gallery</a></li>
				 </ul>
            </li>
        </ul>
    </div>
    <!-- Left Dark Bar End --> 
		
		<!-- end member nav -->
<?php		
	}
?>

