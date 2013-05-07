<?php $themes = "admin/"; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title> compro gear cms </title>
<meta name="googlebot" content="noindex" />
<?php echo link_tag('assets/images/ico/favicon3.ico', 'shortcut icon', 'image/ico'); ?>
<?php $this->load->library('carabiner'); ?>
<?php echo meta('Content-type', 'text/html; charset=utf-8', 'equiv'); ?>

<?php $this->carabiner->css($themes.'css/layout.css'); ?>
<?php $this->carabiner->css($themes.'css/wysiwyg.css'); ?>
<?php $this->carabiner->css($themes.'css/themes/blue/styles.css'); ?>

<?php $this->carabiner->display('css'); ?>
<?php echo link_tag('assets/themes/admin/js/development-bundle/themes/base/ui.all.css'); ?>


<script type="text/javascript">
//<![CDATA[
base_url = '<?php echo base_url();?>';
//]]>
</script>

<script type="text/javascript">
var base_url = "<?php echo base_url();?>"
</script>

<?php $path = base_url().'assets/themes/admin/js/development-bundle/'; ?>

<script type="text/javascript" src="<?php echo $path;?>jquery-1.4.js"></script>
<script type="text/javascript" src="<?php echo $path;?>ui/ui.core.js"></script>
<script type="text/javascript" src="<?php echo $path;?>ui/ui.datepicker.js"></script>
<script type="text/javascript" src="<?php echo $path;?>ui/i18n/ui.datepicker-id.js"></script>
<script type="text/javascript" src="<?php echo $path;?>ui/effects.core.js"></script>
<script type="text/javascript" src="<?php echo $path;?>ui/effects.drop.js"></script>

<?php $this->carabiner->js($themes.'js/tools/jquery.textareaCounter.plugin.js'); ?>
<?php $this->carabiner->js($themes.'js/tools/jquery_set.js'); ?>

<?php $this->carabiner->display('js'); ?>



<?php //$this->carabiner->empty_cache('both', 'now'); ?>



<script type="text/javascript" src="<?php echo base_url()?>assets/themes/admin/js/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/themes/admin/js/ckfinder/ckfinder.js"></script>

</head>