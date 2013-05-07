<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
 
class Validasiku {
    var $instan;
    function __construct(){
        $CI =& get_instance();
        $this->instan = $CI;
        $this->instan->load->library('form_validation');
    }
    function validasi_string($str){
        $str = preg_replace('/[W]/','-',$str);
        $this->instan->form_validation->set_rules($str, $str,'trim|required|xss_clean');
        if($this->instan->form_validation->run()!=FALSE)
        return $str;
    }
     
    function validasi_angka($str){
        $str = preg_replace('/[^0-9]/','',$s);
        $this->instan->form_validation->set_rules($str, $str,'trim|required|xss_clean|numeric');
        if($this->instan->form_validation->run()!=FALSE)
        return $str;
    }
}
 
/* End of file Validasiku.php */