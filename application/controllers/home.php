<?php

class Home extends Controller {
	
	function __construct()
	{
		parent::Controller();
		check_site();		
		//$this->output->enable_profiler(TRUE);		
	}
	
	function index()
	{
		/*load default themes*/
		$this->config->load('themes');	
		$config_themes = $this->config->item('themes');
		$themes = $config_themes['active_themes'];
		$data['path']  = $config_themes['path_image'];
		$vdata['path'] = $config_themes['path_image'];	
			
		/*use for limiter character*/
		$this->load->helper('text');
		$this->load->helper('tools');
		
		/*load model*/
		$this->load->model('content_m');
		$this->load->model('profile_m');
		$this->load->model('seo_m');
		//$this->load->model('setting_m');
		
		

		/*load content news*/
		$vdata["news"] = $this->content_m->get_front_multi_content(
			array(
				"view"     => $themes."home/news" 
				,"is_view" => TRUE
				,"is_cache"=> TRUE
				,"lifetime"=> 30
				,"limit"   => 3  
				,"id"      => 1 //news
				,"id2"     => 11 //coding 
				,"id3"     => 12 //design 
			)
		);
		
		/*get profile data*/
		$vdata["profile"] = $this->profile_m->get_profile(
			array(
				"is_cache" => TRUE
				,"lifetime"=> 300
			)
		);		
		/* seo meta data */
		$vdata["seo"] = $this->seo_m->get_seo(
			array(
				"is_cache" => TRUE
				,"lifetime"=> 37
			)
		);
		
		$vdata["link_active"] = "home";

		/*template parser data*/
			
		$data['header']= $this->load->view($themes."header",$vdata,TRUE); 
		$data['nav']   = $this->load->view($themes."nav",$vdata,TRUE); 
		$data['slide'] = $this->load->view($themes."slide",$vdata,TRUE); 
		$data['main']  = $this->load->view($themes."home/content",$vdata,TRUE);
		$data['footer']= $this->load->view($themes."footer",$vdata,TRUE); 
		$this->load->view($themes."templates",$data);
	}
}

/* End of file home.php */
/* Location: ./system/application/controllers/home.php */