<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php $this->load->library('carabiner'); ?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php echo isset($seo_title)?$seo_title:$profile[0]["site_title"] ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="description" content="<?php echo isset($seo_description)?$seo_description:$seo[0]['description']; ?>">
<meta name="robots" content="index, follow">
<meta name="google-site-verification" content="GYAfKQ-9L9Nbqn18tT-67EgOuIV_ilxcn6-2w_mJHmA" />
<?php echo link_tag('assets/images/ico/aplikaweb.ico', 'shortcut icon', 'image/ico'); ?>


<?php $this->carabiner->css('default/style.css'); ?>
<?php $this->carabiner->display('css'); ?>

<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/themes/default/js';?>/fancybox/jquery.fancybox-1.3.4.css" media="screen" />

<?php $this->carabiner->js('default/js/jquery-1.3.2.min.js'); ?>


<?php $this->carabiner->js('default/js/fancybox/jquery.fancybox-1.3.4.pack.js'); ?>
<?php $this->carabiner->js('default/js/fancybox/jquery.mousewheel-3.0.4.pack.js'); ?>
<?php $this->carabiner->js('default/js/fancybox/jquery.cycle.all.min.js'); ?>
<?php $this->carabiner->js('default/js/jquery.cycle.all.min.js'); ?>

<?php $this->carabiner->js('default/js/custom.js'); ?>

<?php $this->carabiner->display('js'); ?>

<!--
<script type="text/javascript" src="<?php echo base_url()."assets/themes/default/js/"; ?>custom.js"></script>
-->


<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-37351479-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

<script>
$(document).ready(function(){
	$("a#style").fancybox({
		'titlePosition'	: 'over',
		'overlayColor'	: '#000',
		'overlayOpacity': 0.9,
		'transitionIn'	: 'elastic',
		'transitionOut'	: 'elastic'
	});
});
</script>

</head>