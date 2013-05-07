<?php $themes = "admin/"; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php echo meta('Content-type', 'text/html; charset=utf-8', 'equiv'); ?>
<title><?php echo isset($title)?$title:""; ?></title>
<?php $this->load->library('carabiner'); ?>
<?php $this->carabiner->css($themes.'css/layout.css'); ?>
<?php $this->carabiner->css($themes.'css/login.css'); ?>

<!-- Theme Start -->
<?php $this->carabiner->css($themes.'css/themes/blue/styles.css'); ?>
<!-- Theme End -->
<?php $this->carabiner->display('css'); ?>

</head>
<body>
<?php echo validation_errors(); ?>
	<div id="logincontainer">
    	<div id="loginbox">
        	<div id="loginheader">
            	<?php echo img('assets/themes/admin/css/themes/blue/img/cp_logo_login.png'); ?>
			</div>
            <?php isset($main)?$this->load->view($main) : "";  ?>
        </div>
		<?php echo img('assets/themes/admin/img/login_fade.png'); ?>
    </div>
</body>
</html>