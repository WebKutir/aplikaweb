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
		<form action="#" method="POST" enctype="multipart/form-data">
			<p>
				<label for="cat"><strong>Category Name:</strong></label>
				<input type="text" id="cat" name="name" size="54" class="inputbox" value="<?php echo isset($result['name'])?$result['name']:""; ?>" /> <br />
				<span class="smltxt">(inputkan nama category)</span>
			</p>
			
			<p>	
				<label for="userfile">Upload a Image:</label>
				<input type="file" name="userfile" id="userfile" size="20" />
				<?php echo isset($result['image'])? " ".$result['image']." <img src=".base_url().'myupload/album/thumbs/'.$result['image']." width='100' height='100' >":""; ?>
			</p>
			
			<input type="hidden" name="id" value="<?php echo isset($result['id'])?$result['id'] : ""; ?>" />
			<input type="submit" value="Submit" class="btnalt" />
		</form>         
						
		
	</div>
</div>		 