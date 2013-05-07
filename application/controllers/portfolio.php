<?php

class Portfolio extends Controller {
	
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
		$this->load->model('gallery_m');
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
				,"limit"   => 3  
				,"id"      => 1 //news
				,"id2"     => 11 //coding 
				,"id3"     => 12 //design 
			)
		);
		
		/*get portfolio image and caption*/
		$vdata["portfolio"] = $this->gallery_m->get_front_gallery(
			array(
				"view"     => $themes."portfolio/gallery"
				,"is_view" => TRUE
				,"is_cache"=> TRUE
				,"lifetime"=> 30
				,"limit"   => 3
				,"id"      => 10 //portfolio
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
		
		$vdata["seo_title"] = "Portfolio";
		$vdata["seo_description"] = 'portfolio web site company profile';
		
		/* ads */
		$vdata["ads"] = $this->load->view($themes."share/ads",'',TRUE);
		
		$vdata["link_active"] = "portfolio";
		
		/*template parser data*/
		$data['header']= $this->load->view($themes."header",$vdata,TRUE);
		$data['nav']   = $this->load->view($themes."nav",$vdata,TRUE);  
		$data['main']  = $this->load->view($themes."portfolio/content",$vdata,TRUE);
		$data['footer']= $this->load->view($themes."footer",$vdata,TRUE); 
		$this->load->view($themes."templates",$data);		
	}
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/portfolio.php */