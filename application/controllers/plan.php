<?php
class Plan extends Controller {

	function __construct()
	{
		parent::Controller();
		$this->load->library('session');
		$this->load->model('comment_m');
		$this->load->helper('tools');
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

		/*load model*/
		$this->load->model(array('content_m','profile_m','seo_m','cat_m'));
		/* load Helper */
		$this->load->helper('tools');
		
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

		$vdata["seo_title"] = 'Paket harga pembuatan website - Aplikaweb';
		$vdata["seo_description"] = "Harga Pembuatan Website";
		$vdata["link_active"] = "plan";
		/*template parser data*/
			
		$data['header']= $this->load->view($themes."header",$vdata,TRUE); 
		$data['nav']   = $this->load->view($themes."nav",$vdata,TRUE); 
		$data['main']  = $this->load->view($themes."plan/content",$vdata,TRUE);
		$data['footer']= $this->load->view($themes."footer",$vdata,TRUE); 
		$this->load->view($themes."templates",$data);
		
	}

}