<style>

#list_comments {
  font-family: arial;
  font-size: 12px;
  border: 1px solid #E9E9E9;
  margin: 5px 0 10px;
  min-height: 140px;
}

#avatar {
	padding-left: 10px;
	padding-right: 10px;
	float: left;
}

#comment_content {
	float: left;
	padding-top: 10px;
}
</style> 



<?php foreach($list as $row){ ?>	
	
<div id="list_comments">
	<div id="avatar">
		<img src="http://localhost/compro/myupload/thumbs/8059.jpg" />
	</div>
	<div id="comment_content">
		<p> Date : <?php echo tanggal($row['date']) ?> </p>
		<p> Name : <?php echo $row['name'] ?> </p>
		<p> Email : <?php echo $row['email'] ?> </p>
		<p> Comment : <?php echo $row['message'] ?> </p>
	</div>
</div>
	
<?php } ?>
