<?php
$config_themes = $this->config->item('themes');
$path = $config_themes['myupload_gallery']."thumbs/"; 
$pathsrc = $config_themes['myupload_gallery']; 


if(!empty($list)){

	foreach($list as $data){ 
		$caption = explode(";",$data['title']);
?>		
			<div class="port">
	          <p><a id="style" href="<?php echo $pathsrc.$data['image']; ?>" title="<?php echo $caption[0].' - '.$caption[1]; ?>" ><img alt="<?php echo $caption[0].' - '.$caption[1]; ?>" width="258" height="214" src="<?php echo $path.$data['image']; ?>" /></a></p>
              <h4><?php echo $caption[0]; ?></h4>
              <p><?php echo $caption[1]; ?></p>
            </div>
		
<?php	}
}
?>