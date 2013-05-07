<?php $this->load->view("admin/header"); ?>
<?php $this->load->view("admin/search"); ?>
<?php $this->load->view("admin/breadcrumb"); ?>
        

     
    <!-- Right Side/Main Content Start -->
    <div id="rightside">
		
        <!-- Alternative Content Box Start -->
         <?php isset($main)?$this->load->view($main) : "";  ?>
		 
		 <?php echo isset($custom_main)?$custom_main : ""; ?>
        <!-- Alternative Content Box End -->
       
        <div id="footer">
        	&copy; Copyright <?php echo date('Y') ?> compro gear
        </div> 
          
    </div>
    <!-- Right Side/Main Content End -->
    
    <!-- Left Dark Bar Start -->
	<?php $this->load->view("admin/nav"); ?>
    <!-- Left Dark Bar End --> 
    
<?php $this->load->view("admin/footer"); ?>