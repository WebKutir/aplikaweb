<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* add Modify ci form validation, with own custom validation */

class MY_Form_validation extends CI_Form_validation {
	
	function capctha_check($code){
		
		include_once("assets/addons/secureimage/securimage.php");
		$img = new Securimage();		
		
		if($img->check( $code ) == false) {
			$this->set_message('capctha_check', "invalid captcha code");
			return FALSE;
		}
		
		return TRUE;
	}
}
// END MY Form Validation Class
/* End of file MY_Form_validation.php */