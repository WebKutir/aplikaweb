<div class="contentcontainer med left">
	<div class="headings alt">
		<h2><?php echo isset($h2)?$h2 : "";  ?></h2>
	</div>
	<div class="contentbox">
		<form action="#" method="POST">
			<p>
				<label for="description">Description:</label>
				<textarea name="description" id="description" class="validate(rangelength(10,256))" rows="5" cols="45"><?php echo isset($result['description'])?$result['description']:""; ?></textarea>
			</p>
			
			<p>
				<label for="keyword">Keyword:</label>
				<textarea name="keyword" id="keyword" class="validate(rangelength(10,256))" rows="5" cols="45"><?php echo isset($result['keyword'])?$result['keyword']:""; ?></textarea>
			</p>
			
			<p>
				<label for="goolge_analytic">Goolge Analytic:</label>
				<textarea name="goolge_analytic" id="goolge_analytic" class="validate(rangelength(10,256))" rows="5" cols="45"><?php echo isset($result['goolge_analytic'])?$result['goolge_analytic']:""; ?></textarea>
			</p>
			
			<p>
				<label for="effective_measure">Effective Measure:</label>
				<textarea name="effective_measure" id="effective_measure" class="validate(rangelength(10,256))" rows="5" cols="45"><?php echo isset($result['effective_measure'])?$result['effective_measure']:""; ?></textarea>
			</p>
			
			<input type="hidden" name="id" value="<?php echo isset($result['id'])?$result['id'] : ""; ?>" />
			<input type="submit" value="Submit" class="btnalt" />
		</form>         
						
		
	</div>
</div>		 