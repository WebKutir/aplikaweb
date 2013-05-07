<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<title>WebDey - Home</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	
	<?php $this->load->library('carabiner'); ?>
	
	<?php $this->carabiner->css('themes/gray/style.css'); ?>

	<!--[if IE 6]><link rel="stylesheet" type="text/css" href="css/ie6.css" /><![endif]-->

	<!--[if IE 7]><link rel="stylesheet" type="text/css" href="css/ie7.css" /><![endif]-->
	
	<?php $this->carabiner->display('css'); ?>

	
	<?php $this->carabiner->js('development-bundle/jquery-1.4.js'); ?>
	<?php $this->carabiner->js('themes/gray/pikachoose.js'); ?>
	
	<?php $this->carabiner->display('js'); ?>
	
	<script type="text/javascript">
		<!--
		$(document).ready(function(){
			$("#pikame").PikaChoose();
		});
		-->
	</script>

</head>