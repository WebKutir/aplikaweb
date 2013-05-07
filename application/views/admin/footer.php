<?php $js = base_url().'assets/themes/admin/js/core/'; ?>
<?php $themes = "admin/"; ?>

<script type="text/javascript" src="<?php echo $js; ?>functions.js"></script>

<?php $this->load->library('carabiner'); ?>
<?php $this->carabiner->js($themes.'js/core/enhance.js'); ?>
<?php $this->carabiner->js($themes.'js/core/excanvas.js'); ?>
<?php $this->carabiner->js($themes.'js/core/jquery.wysiwyg.js'); ?>
<?php $this->carabiner->js($themes.'js/core/visualize.jQuery.js'); ?>
<?php $this->carabiner->display('js'); ?>

<!--[if IE 6]>
<script type='text/javascript' src='<?php echo $js; ?>png_fix.js'></script>
<script type='text/javascript'>
  DD_belatedPNG.fix('img, .notifycount, .selected');
</script>	
<![endif]--> 

</body>
</html>