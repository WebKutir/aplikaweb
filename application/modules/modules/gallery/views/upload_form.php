<div class="contentcontainer med left">
	<div class="headings alt">
		<h2><?php echo isset($h2)?$h2 : "";  ?></h2>
		
	</div>
	
	
	<div class="contentbox">
	
	<?= isset($error)?$error:"";?>
	<div style="float:right;">
	<a href="<?php echo base_url().$ctrl; ?> "> <input type="submit" value="View Data" class="btnalt" /> </a>
	</div>	
		<?=form_open_multipart('gallery/add'); ?>
		<p> Album : 
		<?php echo form_dropdown('album_id', $options_album); ?>
		
		</p>
			<?php for($i=1; $i<=$max; $i++) { ?>
			
				<div class="form_element">
					<label for="photo<?=$i?>" > Image <?=$i?> </label>
					<?=form_upload(array('name' => 'userfile'.$i,
										'size' => '36'))?>
					<label for="title<?=$i?>" > caption <?=$i?> </label>
					<?php $data = array(
							  'name'        => 'title'.$i,
							  'maxlength'   => '200',
							  'size'        => '80'
							);

							echo form_input($data); ?>					
				</div>
			<?php } ?>
			
		<input type="submit" value="Upload" name="go_upload" class="btn" />
		<?=form_close();?>
		
	</div>
</div>

<div>
	<?php 
	$ret = '';
	if($result != ''){
		
		foreach($result as $item){
			$image_filename	= $item['file_name'];
			$image_size = $item['file_size'];
			$image_width = $item['image_width'];
			$image_height = $item['image_height'];
			
			//config images
			$image_properties = array(
			  'src' => 'myupload/gallery/'.$image_filename,
			  'width' => '75',
			  'height' => '100',
			  'title' => $image_filename,
			  'rel' => 'lightbox',
			);
			
			$ret.= '<div class="result">';
			$ret.= $image_filename.'<br />';			
			$ret.= img($image_properties);
			$ret.= '<br />';
			$ret.= '<span style="">'.$image_width.' x '.$image_height.' ('.$image_size.'kb)</span>';
			$ret.= '</div>';
		}
	}
	echo $ret;
	
	?>
</div>