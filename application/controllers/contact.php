<?php

class Contact extends Controller {
	
	function __construct()
	{
		parent::Controller();	
		$this->load->library('session');
		$this->load->library('form_validation');
		$this->load->helper('url');
	}
	
	function index()
	{
		
		/*use for limiter character*/
		$this->load->helper('text');
		$this->load->helper('tools');
		
		/*load model*/
		$this->load->model('content_m');
		$this->load->model('profile_m');
		$this->load->model('seo_m');
		$this->load->model('cat_m');
		
		/*load default themes*/
		$this->config->load('themes');	
		$config_themes = $this->config->item('themes');
		$themes = $config_themes['active_themes'];
		$data['path']  = $config_themes['path_image'];
		$vdata['path'] = $config_themes['path_image'];	
		
		/*get profile data*/
		$vdata["profile"] = $this->profile_m->get_profile(
			array(
				"is_cache" => TRUE
				,"lifetime"=> 35
			)
		);		
		
		/* seo meta data */
		$vdata["seo"] = $this->seo_m->get_seo(
			array(
				"is_cache" => TRUE
				,"lifetime"=> 37
			)
		);
		
				
				
		$vdata["link_active"] = "contact";
		
		/*template parser data*/
		$data['header']= $this->load->view($themes."header",$vdata,TRUE);
		$data['nav']   = $this->load->view($themes."nav",$vdata,TRUE);  
		$data['main']  = $this->load->view($themes."contact/content",$vdata,TRUE);
		$data['footer']= $this->load->view($themes."footer",$vdata,TRUE); 
		$this->load->view($themes."templates",$data);
	}
	
	function validate(){
		
		$code = $this->input->post('code');
		
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		
		$this->form_validation->set_rules('name', 'Name', 'required|min_length[3]|max_length[12]');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('company', 'Company', 'required');
		$this->form_validation->set_rules('subject', 'Subject', 'required');
		$this->form_validation->set_rules('message', 'Message', 'required');
		$this->form_validation->set_rules('code','captcha','required|capctha_check['.$code.']');
				
		
		if ($this->form_validation->run() == FALSE)
		{
			
			/*use for limiter character*/
			$this->load->helper('text');
			$this->load->helper('tools');
			
			/*load model*/
			$this->load->model('content_m');
			$this->load->model('profile_m');
			$this->load->model('seo_m');
			$this->load->model('cat_m');
			
			/*load default themes*/
			$this->config->load('themes');	
			$config_themes = $this->config->item('themes');
			$themes = $config_themes['active_themes'];
			$data['path']  = $config_themes['path_image'];
			$vdata['path'] = $config_themes['path_image'];	
			
			/*get profile data*/
			$vdata["profile"] = $this->profile_m->get_profile(
				array(
					"is_cache" => TRUE
					,"lifetime"=> 35
				)
			);		
			
			/* seo meta data */
			$vdata["seo"] = $this->seo_m->get_seo(
				array(
					"is_cache" => TRUE
					,"lifetime"=> 37
				)
			);
			
			$vdata["link_active"] = "contact";
			/*template parser data*/
			$data['header']= $this->load->view($themes."header",$vdata,TRUE);
			$data['nav']   = $this->load->view($themes."nav",$vdata,TRUE);  
			$data['main']  = $this->load->view($themes."contact/content",$vdata,TRUE);
			$data['footer']= $this->load->view($themes."footer",$vdata,TRUE); 
			$this->load->view($themes."templates",$data);
		}
		else
		{
			
			/* insert to database */
			$this->load->model('contact_m');
			$this->contact_m->add();

			$headers = "From: sales@aplikaweb.com\r\n";
			$headers .= "Reply-to: sales@aplikaweb.com\r\n";
			$mail_sent = @mail("hendar.online@gmail.com", "ORDER", "ISI ORDER", $headers);
			//echo $mail_sent ? "Terkirim" : "
			//Gagal";
			
			/* set flash session */
			$this->session->set_flashdata('sukses', 'Thank you for submit in our contact');		
			redirect('contact/index');		
			
		}
		
	}
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/contact.php */