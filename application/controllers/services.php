<?php

class Services extends Controller {
	
	function __construct()
	{
		parent::Controller();
		//$this->output->enable_profiler(TRUE);		
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
		
		$vdata["submenu"] = $this->cat_m->get_submenu(
			array(
				"id"       => 1
				,"id2"     => 11
				,"id3"     => 12
				,"limit"   => 3
				,"is_cache"=> TRUE
				,"lifetime"=> 30
			)
		);
		
		/*load content news*/
		$vdata["news"] = $this->content_m->get_front_multi_content(
			array(
				"view"     => $themes."home/news" 
				,"is_view" => TRUE
				,"is_cache"=> TRUE
				,"lifetime"=> 30
				,"limit"   => 1  
				,"id"      => 1 //news
				,"id2"     => 11 //coding 
				,"id3"     => 12 //design 
			)
		);
		
		/*load content services*/
		$vdata["services"] = $this->content_m->get_content(
			array(				
				"is_cache"=> TRUE
				,"lifetime"=> 32
				,"limit"   => 3  
				,"id"      => 15 //services				
			)
		);
		
				
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
		
		/*Meta SEO*/
		$vdata["seo_title"] = "Services";
		$vdata["seo_description"] = $vdata['services'][0]['content'];
		
		/* ads */
		$vdata["ads"] = $this->load->view($themes."share/ads",'',TRUE);
		
		$vdata["link_active"] = "services";
		
		/*template parser data*/
		$data['header']= $this->load->view($themes."header",$vdata,TRUE);
		$data['nav']   = $this->load->view($themes."nav",$vdata,TRUE);  
		$data['main']  = $this->load->view($themes."services/content",$vdata,TRUE);
		$data['footer']= $this->load->view($themes."footer",$vdata,TRUE); 
		$this->load->view($themes."templates",$data);
	}
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/services.php */