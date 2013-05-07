<?php if(!empty($list)) {  
$config_themes = $this->config->item('themes');
$images = $config_themes['path_image'];  
?>

	
	<h2>Latest News</h2>

	<?php foreach($list as $data) { ?>

		<!-- <div id="artikel_img"><img src="<?php //echo $images."notes.png" ?>" /></div> -->
		<p>
			<?php echo tanggal($data['date']); ?> | <span>0 comments</span><br />
			<strong><?php echo $data['title']; ?></strong><br />
			<?php echo character_limiter($data['content'], 70);  ?>
			<a href="<?php echo prettyUrl($data['id'],$data['title'],$data['date']); ?>"> <strong>More &gt; &gt;</strong></a>
		</p>
		
		<p>&nbsp;</p>

	<?php } ?>
<?php } ?>