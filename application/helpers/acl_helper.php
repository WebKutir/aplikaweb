<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if (! function_exists('webdey_acl')){
	function acl($ctrl,$group){
		/* 0 = Guest , 1 = Admin */
		$role = array(
			"album"  => array("access"=> "0"),
			"webmin" => array("access"=> "0"),
			"event"  => array("access"=> "0"),
			"gallery"=> array("access"=> "0"),
			"news"   => array("access"=> "0"),
			"coding" => array("access"=> "0"),
			"design" => array("access"=> "0"),
			"slideshow" => array("access"=> "1"),
			"download"=> array("access"=> "0"),
			"profile"=> array("access"=> "1"),
			"seo"    => array("access"=> "1"),
			"user"   => array("access"=> "1"),
			"cat"    => array("access"=> "1"),
			"service"=> array("access"=> "1"),
			"contacts"=> array("access"=> "1")	
		);
		
		
		if($group != $role[$ctrl]['access'] && $group != 1){				
			die('you do not have access to this page');
		}
	}
}

	function check_site(){
		/* get instace singleton of ci model */
		$CI =& get_instance();
		$CI->load->model('setting_m');
		
		$vdata["offline"] = $CI->setting_m->get_offline(
			array(
				"is_cache" => TRUE
				,"lifetime"=> 37
			)
		);
		
		if($vdata["offline"][0]["site_offline"] == 1){
			echo $vdata["offline"][0]["offline_reason"];
			die();	
		}		
	}


?>