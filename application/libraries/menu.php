<?php
class Menu{
	function show_menu(){
		$obj =& get_instance();
		$obj->load->helper('url');
		
		$menu = array(
			anchor(base_url().'home','Home')
			,anchor(base_url().'services','Services')
			,anchor(base_url().'portfolio','portfolio')
		);
		
		
		return $menu;
	}		
}
?>
