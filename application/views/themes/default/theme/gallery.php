<script>
$(document).ready(function(){
  $("a#style").fancybox({
    'titlePosition' : 'over',
    'overlayColor'  : '#000',
    'overlayOpacity': 0.9,
    'transitionIn'  : 'elastic',
    'transitionOut' : 'elastic'
  });
});
</script>

<style>
div.img
  {
  margin:2px;
  border:1px solid #000000;
  height:auto;
  width:auto;
  float:left;
  text-align:center;
  }
div.img img
  {
  display:inline;
  margin:3px;
  border:1px solid #ffffff;
  }
div.img a:hover img
  {
  border:1px solid #0000ff;
  }
div.desc
  {
  text-align:center;
  font-weight:normal;
  width:120px;
  margin:2px;
  } 
</style>

		<?php
		$config_themes = $this->config->item('themes');
		$path = $config_themes['myupload_gallery']."thumbs/"; 
		$pathsrc = $config_themes['myupload_gallery']; 
    ?>

    
    <?php
		if(!empty($list)){
			foreach($list as $data){ 
		?>		
			<div class="port">
      <p><a id="style" href="<?php echo $pathsrc.$data['image']; ?>" title="<?php echo $data['title']; ?>" ><img alt="<?php echo $data['title']; ?>" width="200" height="130" src="<?php echo $path.$data['image']; ?>" /></a></p>
        <h4><?php echo $data['title']; ?></h4>
      </div>
		<?php	
      }
 		}?>





