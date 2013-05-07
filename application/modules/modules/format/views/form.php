<div class="contentcontainer med left">
	<div class="headings alt">
		<h2><?php echo isset($h2)?$h2 : "";  ?></h2>
	</div>
	<div class="contentbox">
		<form action="#" method="POST">
			<p>
				<label for="cat"><strong>Category Name:</strong></label>
				<input type="text" id="cat" name="name" size="54" class="inputbox" value="<?php echo isset($result['name'])?$result['name']:""; ?>" /> <br />
				<span class="smltxt">(inputkan nama category)</span>
			</p>
			<input type="hidden" name="id" value="<?php echo isset($result['id'])?$result['id'] : ""; ?>" />
			<input type="submit" value="Submit" class="btnalt" />
		</form>         
						
		
	</div>
</div>		 