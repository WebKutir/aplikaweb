<?php if ($this->session->flashdata('sukses')){	 ?>		
<div class='status success'>
	<p class='closestatus'><a href='' title='Close'>x</a></p>
	<p><img src='<?php echo base_url() ?>assets/img/icons/icon_success.png' alt='Success' /><span>Success!</span> <?php echo $this->session->flashdata('sukses') ?></p>
</div> 
 <? } ?>

 <!-- Alternative Content Box Start -->
 <div class="contentcontainer">
	<div class="headings altheading">
		<h2><?php echo isset($h2)?$h2 : "";  ?></h2>
	</div>
	<div class="contentbox">
		<table width="100%">
			<thead>
				<tr>
					<th>No</th>
					<th>Title</th>
					<th>Privileges</th>
					<th>File</th>
					<th>Size</th>
					<th>Status</th>
					<th>Actions</th>
					<th><input name="" type="checkbox" value="" id="checkboxall" /></th>
				</tr>
			</thead>
			<tbody>
			
	<?php if(count($result)) { ?>
			<? $no = $uri_segment + 1; ?>
			<?php foreach($result as $key => $row) { 
				$tr_class = zebra($no);
				$user = usericon($row['privileges']);
				$ispublish = publish_icon($row['publish']);
			?>
					<?php echo $tr_class; ?>
					<td><?php echo $no ?></td>
					<td><?php echo $row['title'] ;?></td>
					<td><?php echo $user;?></td>					
					<td><?php echo $row['file'];?></td>
					<td><?php echo $row['size']." Bytes";?></td>
					<td><?php echo $ispublish ;?></td>

					<td>
						<a href="<?php echo base_url().$ctrl."/edit/".$row['id']; ?>" title="Edit"><img src="<?php echo base_url(); ?>assets/img/icons/icon_edit.png" alt="Edit" /></a>
						<a href="<?php echo base_url().$ctrl."/delete/".$row['id']; ?>" onclick="return confirm('Are you sure you want to delete?');" title="Hapus"><img src="<?php echo base_url(); ?>assets/img/icons/icon_delete.png" alt="Delete" /></a>
					</td>
					<td><input type="checkbox" value="" name="checkall" /></td>
				</tr>
				<? $no++; ?>
			<? } ?>	
	<? } ?>	
				
				
				
			</tbody>
		</table>
		
		<div class="extrabottom">
			<ul>
				<li><img src="<?php echo base_url(); ?>assets/img/icons/icon_edit.png" alt="Edit" /> Edit</li>
				<li><img src="<?php echo base_url(); ?>assets/img/icons/icon_delete.png" alt="Delete" /> Remove</li>
			</ul>
			<div class="bulkactions">
				<select>
					<option>Select bulk action...</option>
				</select>
				<input type="submit" value="Apply" class="btn" />
				<a href="<?php echo base_url().$ctrl."/add"; ?> "> <input type="submit" value="Add New" class="btnalt" /> </a>
			</div>
		</div>
		
		
		<ul class="pagination">
			<?php echo $this->pagination->create_links(); ?>
		</ul>
		
		<div style="clear: both;"></div>
	</div>
	
</div>
<!-- Alternative Content Box End -->		