<?php echo validation_errors(); ?>

<?php if(isset($error)) { ?>
		<div class="status error">
        	<p class="closestatus"><a href="" title="Close">x</a></p>
        	<p><img src="<?php echo base_url() ?>assets/img/icons/icon_error.png" alt="Error" /><span>Error!</span> <?php echo $error ?></p>
        </div>
<? } ?>

<div class="contentcontainer med left">
	<div class="headings alt">
		<h2><?php echo isset($h2)?$h2 : "";  ?></h2>
	</div>
	<div class="contentbox">
		<form action="#" method="post" enctype="multipart/form-data">
			
			<?php $default = isset($result['album_id'])?$result['album_id']:""; ?>
			<p>
				<?php echo form_dropdown('album_id', $options_album, $default); ?>
			</p>
			
			<p>
				<label for="title"><strong>Title:</strong></label>
				<input type="text" id="title" name="title" class="validate(required)" size="60" class="inputbox" value="<?php echo isset($result['title'])?$result['title']:""; ?>" /> <br />
				<span class="smltxt">(inputkan title news)</span>
			</p>
			
						
			<p>	
				<label for="userfile">Upload a Image:</label>
				<input type="file" name="userfile" id="userfile" size="20" />
				<?php echo isset($result['image'])? " ".$result['image']." <img src=".base_url().'myupload/gallery/'.$result['image']." width='100' height='100' >":""; ?>
			</p>
			
				
			
			<input type="hidden" name="id" value="<?php echo isset($result['id'])?$result['id'] : ""; ?>" />
			<input type="submit" value="Submit" class="btnalt" />
		</form>         
	</div>
</div>

