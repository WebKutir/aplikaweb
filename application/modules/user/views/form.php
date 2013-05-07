<?php echo validation_errors(); ?>

<?php if(isset($error)) { ?>
		<div class="status error">
        	<p class="closestatus"><a href="" title="Close">x</a></p>
        	<p><img src="<?php echo base_url() ?>assets/img/icons/icon_error.png" alt="Error" /><span>Error!</span> <?php echo $error ?></p>
        </div>
<?php } ?>

<div class="contentcontainer med left">
	<div class="headings alt">
		<h2><?php echo isset($h2)?$h2 : "";  ?></h2>
	</div>
	<div class="contentbox">
		<form action="#" method="post" enctype="multipart/form-data">
		
			<p>
				<label for="first_name"><strong>First Name:</strong></label>
				<input type="text" id="first_name" name="first_name" class="validate(required)" size="60" class="inputbox" value="<?php echo isset($result['first_name'])?$result['first_name']:""; ?>" /> <br />
				<span class="smltxt">(inputkan first name)</span>
			</p>
			
			<p>
				<label for="last_name"><strong>Last Name:</strong></label>
				<input type="text" id="last_name" name="last_name" class="validate(required)" size="60" class="inputbox" value="<?php echo isset($result['last_name'])?$result['last_name']:""; ?>" /> <br />
			</p>
			
			<p>
				<label for="birtdate">Birtdate:</label>
				<input type="text" name="birtdate" id="datepicker" size="10" value="<?php echo isset($result['birtdate'])?$result['birtdate']:""; ?>" />
			</p>
			
			<p>
				<label for="username"><strong>User Name:</strong></label>
				<input type="text" id="username" name="username" class="validate(required)" size="60" class="inputbox" value="<?php echo isset($result['username'])?$result['username']:""; ?>" /> <br />
			</p>
			
			<p>
				<label for="password"><strong>Password:</strong></label>
				<input type="text" id="password" name="password" class="validate(required)" size="60" class="inputbox" value="<?php echo isset($result['password'])?$result['password']:""; ?>" /> <br />
			</p>
			
			<p>
				<label for="email"><strong>Email:</strong></label>
				<input type="text" id="email" name="email" class="validate(required)" size="60" class="inputbox" value="<?php echo isset($result['email'])?$result['email']:""; ?>" /> <br />
			</p>
			
			<p>
				<label for="address">Address:</label>
				<textarea name="address" id="address" class="validate(rangelength(10,256))" rows="5" cols="45"><?php echo isset($result['address'])?$result['address']:""; ?></textarea>
			</p>
			
			<p>	
				<label for="userfile">Upload a Image:</label>
				<input type="file" name="userfile" id="userfile" size="20" />
				<?php echo isset($result['image'])? " ".$result['image']." <img src=".base_url().'myupload/'.$result['image']." width='100' height='100' >":""; ?>
			</p>
			

			<?php $options_group = array('1'  => 'Admin','0'  => 'User');
			$group = isset($result['group'])?$result['group']:""; ?>
		
			<p> 
				<label>Group : </label>
				<?php echo form_dropdown('group', $options_group, $group); ?>
			</p>
			
			<p>
				<label for="color">Activate : </label>
				<input type="radio" name="activate" id="" value="1" <?php echo (isset($result['activate']) && $result['activate'] == 1)? "CHECKED" : ""; ?> />Active 
				<input type="radio" name="activate" id="" value="0" <?php echo (isset($result['activate']) && $result['activate'] == 0)? "CHECKED" : ""; ?> />Non Active
			</p>
			
		
			
			<input type="hidden" name="id" value="<?php echo isset($result['id'])?$result['id'] : ""; ?>" />
			<input type="submit" value="Submit" class="btnalt" />
		</form>         
	</div>
</div>

