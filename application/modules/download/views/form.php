<?php echo validation_errors(); ?>

<?php if(isset($error)) { ?>
		<div class="status error">
        	<p class="closestatus"><a href="" title="Close">x</a></p>
        	<p><img src="<?php echo base_url() ?>assets/img/icons/icon_error.png" alt="Error" /><span>Error!</span> <?php echo $error; ?> </p>
        </div>
<?php } ?>

<div class="contentcontainer med left">
	<div class="headings alt">
		<h2><?php echo isset($h2)?$h2 : "";  ?></h2>
	</div>
	<div class="contentbox">
		<form action="#" method="post" enctype="multipart/form-data">
		
			<p>
				<label for="title"><strong>Title:</strong></label>
				<input type="text" id="title" name="title" class="validate(required)" size="60" class="inputbox" value="<?php echo isset($result['title'])?$result['title']:""; ?>" /> <br />
				<span class="smltxt">(inputkan title news)</span>
			</p>
			
			<p>

				<label for="description">Description:</label>
		
				<textarea id="ckeditor" name="description"  rows="15" cols="70" ><?php echo isset($result['description'])?$result['description']:""; ?></textarea>
				<script>
					CKEDITOR.replace( 'ckeditor',
					{
						toolbar : 'MyToolbar',
						width:"100%",
						filebrowserBrowseUrl : '<?php echo base_url();?>assets/js/ckfinder/ckfinder.html',
						filebrowserImageBrowseUrl : '<?php echo base_url();?>assets/js/ckfinder/ckfinder.html?type=Images',
						filebrowserFlashBrowseUrl : '<?php echo base_url();?>assets/js/ckfinder/ckfinder.html?type=Flash',
					});
				</script>	
						
				
			</p>
			
			<p>
				<label for="date">Date:</label>
				<input type="text" name="date" id="datepicker" size="10" value="<?php echo isset($result['date'])?$result['date']:""; ?>" />
			</p>
			
		
			<p>
				<label for="userfile1" > Image </label>
				<?php echo form_upload(array('name' => 'userfile1',
									'size' => '36'))?>
				
			</p>
			
			<p>
				<label for="userfile2" > File </label>
				<?php echo form_upload(array('name' => 'userfile2',
									'size' => '36'))?>
				
			</p>
			
						
			<p>
				<label for="color">Status</label>
				<input type="radio" name="publish" id="" value="1" <?php echo (isset($result['publish']) && $result['publish'] == 1)? "CHECKED" : ""; ?> />Publish 
				<input type="radio" name="publish" id="" value="0" <?php echo (isset($result['publish']) && $result['publish'] == 0)? "CHECKED" : ""; ?> />Un Publish
			</p>
			
			<p>
				<label for="privileges">Privileges</label>
				<input type="radio" name="privileges" id="" value="1" <?php echo (isset($result['privileges']) && $result['privileges'] == 1)? "CHECKED" : ""; ?> />Premium 
				<input type="radio" name="privileges" id="" value="0" <?php echo (isset($result['privileges']) && $result['privileges'] == 0)? "CHECKED" : ""; ?> />Public
			</p>
			
		
			
			<input type="hidden" name="id" value="<?php echo isset($result['id'])?$result['id'] : ""; ?>" />
			<input type="submit" value="Upload" class="btnalt" name="go_upload" />
		<?php echo form_close();?>         
	</div>
</div>

