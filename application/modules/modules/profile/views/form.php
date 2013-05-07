<?php echo validation_errors(); ?>

<?php if(isset($error)) { ?>
		<div class="status error">
        	<p class="closestatus"><a href="" First Name="Close">x</a></p>
        	<p><img src="<?php echo base_url() ?>assets/img/icons/icon_error.png" alt="Error" /><span>Error!</span> <?php echo $error ?></p>
        </div>
<? } ?>

<div class="contentcontainer med left">
	<div class="headings alt">
		<h2><?php echo isset($h2)?$h2 : "";  ?></h2>
	</div>
	<div class="contentbox">
		<form action="#" method="post" enctype="multipart/form-data">
		
			<p>
				<label for="First Name"><strong>First Name:</strong></label>
				<input type="text" id="First Name" name="first_name" class="validate(required) inputbox" size="60" value="<?php echo isset($result['first_name'])?$result['first_name']:""; ?>" /> <br />
				<span class="smltxt">(inputkan First Name)</span>
			</p>
			
			<p>
				<label for="Last Name"><strong>Last Name:</strong></label>
				<input type="text" id="Last Name" name="last_name" class="validate(required) inputbox" size="60" value="<?php echo isset($result['last_name'])?$result['last_name']:""; ?>" /> <br />
			</p>
			
			<p>	
				<label for="userfile">Upload a Image:</label>
				<input type="file" name="userfile" id="userfile" size="20" />
				<?php echo isset($result['image'])?$result['image']:"-"; ?>
			</p>
			
			<p>

				<label for="about">About:</label>
		
				<textarea id="ckeditor" name="about"  rows="15" cols="70" ><?php echo isset($result['about'])?$result['about']:""; ?></textarea>
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
				<label for="address">Address:</label>
				<textarea name="address" id="address" class="validate(rangelength(10,256))" rows="5" cols="45"><?php echo isset($result['address'])?$result['address']:""; ?></textarea>
			</p>
			
			<p>
				<label for="site_title">Site Title:</label>
				<textarea name="site_title" id="site_title" class="validate(rangelength(10,256))" rows="5" cols="45"><?php echo isset($result['site_title'])?$result['site_title']:""; ?></textarea>
			</p>
			
			
			<p>
				<label for="telephone"><strong>Telephone:</strong></label>
				<input type="text" id="telephone" name="telephone" class="validate(required) inputbox" size="60" value="<?php echo isset($result['telephone'])?$result['telephone']:""; ?>" /> <br />
			</p>
			
			<p>
				<label for="handphone"><strong>Handphone:</strong></label>
				<input type="text" id="handphone" name="handphone" class="validate(required) inputbox" size="60" value="<?php echo isset($result['handphone'])?$result['handphone']:""; ?>" /> <br />
			</p>
			
			<p>
				<label for="fax"><strong>Fax:</strong></label>
				<input type="text" id="fax" name="fax" class="validate(required) inputbox" size="60" value="<?php echo isset($result['fax'])?$result['fax']:""; ?>" /> <br />
			</p>
			
			<p>
				<label for="email"><strong>Email:</strong></label>
				<input type="text" id="email" name="email" class="validate(required) inputbox" size="60" value="<?php echo isset($result['email'])?$result['email']:""; ?>" /> <br />
			</p>
			
			<p>
				<label for="facebook"><strong>Facebook:</strong></label>
				<input type="text" id="facebook" name="facebook" class="validate(required) inputbox" size="60" value="<?php echo isset($result['facebook'])?$result['facebook']:""; ?>" /> <br />
			</p>
			
			<p>
				<label for="twitter"><strong>Twitter:</strong></label>
				<input type="text" id="twitter" name="twitter" class="validate(required) inputbox" size="60" value="<?php echo isset($result['twitter'])?$result['twitter']:""; ?>" /> <br />
			</p>
			
			<p>
				<label for="yahoo"><strong>Yahoo:</strong></label>
				<input type="text" id="yahoo" name="yahoo" class="validate(required) inputbox" size="60" value="<?php echo isset($result['yahoo'])?$result['yahoo']:""; ?>" /> <br />
			</p>
			
			<input type="hidden" name="id" value="<?php echo isset($result['id'])?$result['id'] : ""; ?>" />
			<input type="submit" value="Submit" class="btnalt" />
		</form>         
	</div>
</div>

