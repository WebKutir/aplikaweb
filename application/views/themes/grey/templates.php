<?php $this->load->view("themes/grey/header"); ?>

<body>
<div id="titleheader_bg">
<a class="logo" href="<?php echo base_url()?>" title="Home"></a>
</div>

<div class="display_bg">
<?php $this->load->view("themes/grey/nav"); ?>
<?php isset($slide)?$this->load->view($slide) : "";  ?>
</div>

<div id="container">
	<div id="content_container">
		
		<?php isset($main)?$this->load->view($main) : "";  ?>
		
		<?php 
			if($this->uri->segment(1) != "portfolio") {
				$this->load->view("themes/grey/sidebar"); 
			}	
		?>		
		
		<div class="spacer"></div>

	</div>

</div>
<?php $this->load->view("themes/grey/footer"); ?>
</body>
</html>