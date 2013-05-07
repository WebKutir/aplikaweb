<?php
class MY_Exceptions extends CI_Exceptions{

	public function __construct(){
	  parent::__construct();
	}

	function show_404($page = ''){
		$heading = "404 Page Not Found";
        $message = "The page you requested was not found for some strange reason...";

        log_message('error', '404 Page Not Found --> '.$page);

		
		//$data['main'] = 'my404';
		$this->load->view('maintemplate',$data);
		
		
		// $CI =& get_instance();
		// $CI->load->view('template/header');
        //echo $this->show_error($heading, $message, 'error_404', 404);
        //$CI->load->view('template/footer');
        exit;

	}
	
	function show_error($message, $status_code = 500)
    {
        $error =& load_class('Exceptions');
        echo $error->show_error('An Error Was Encountered', $message, 'error_general', $status_code);
        exit;
    }

}
?>