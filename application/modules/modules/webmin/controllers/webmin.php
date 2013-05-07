<?php
class Webmin extends Controller {

	function __construct()
	{
		parent::Controller();
		$this->load->model('webmin_m', '', TRUE);
		$this->load->library('session');
		//session_start();
	}
		
	function index()
	{
		$data['title'] = "Welcome to webdey Manager";
		$data['main'] = "content";
		$this->load->view('login/templates',$data);
	}
	
	function auth(){
		$this->load->library('encrypt');
		$this->load->library('form_validation');

		//config
		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[2]|max_length[30]|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|max_length[30]|xss_clean');
		
		if ($this->form_validation->run() == TRUE){
			$u = $this->input->post('username',TRUE);
			$pw = $this->input->post('password',TRUE);
			
			$row = $this->webmin_m->verifyUser($u,$pw);
			
			if (count($row)){
				/*create session userid*/
				
				$session_data = array(
					'userid' => $row['id'],
					'username' => $row['username'],
					'group' => $row['group'],
					'logged_in' => TRUE
				);
							
				$this->session->set_userdata($session_data);
				
				
				redirect('news/index','refresh');
			}else{
				redirect('webmin/index','refresh');
			}
		}else{
			redirect('webmin/index','refresh');
		}  
    }
	
	function logout(){
		$this->session->sess_destroy();
		redirect('webmin/index','refresh');
	}
	
	 
}
?>