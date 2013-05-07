<?php 
$config_themes = $this->config->item('themes');
$images = $config_themes['path_image'];  
?>
<h2>Affiliates</h2>

<ul class="ads clearfix">
		<li><a title="ThemeForest" target="_blank" href="http://themeforest.net?ref=jdsans"><img alt="ThemeForest" src="<?php echo $images; ?>/affiliates/themeforest.jpg"></a></li>
		<li><a title="GraphicRiver" target="_blank" href="http://graphicriver.net?ref=jdsans"><img alt="Graphic River" src="<?php echo $images; ?>/affiliates/graphicriver.jpg"></a></li>
		<li><a title="VideoHive" target="_blank" href="http://videohive.net?ref=jdsans"><img alt="VideoHive" src="<?php echo $images; ?>/affiliates/videohive.jpg"></a></li>
		<li><a title="FlashDen" target="_blank" href="http://flashden.net?ref=jdsans"><img alt="FlashDen" src="<?php echo $images; ?>/affiliates/flashden.jpg"></a></li>
</ul>