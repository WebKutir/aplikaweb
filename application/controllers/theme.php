<?php

class theme extends Controller {
	
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
		
		
		/*get theme image and caption*/
		$vdata["theme"] = $this->gallery_m->get_front_gallery(
			array(
				"view"     => $themes."theme/gallery"
				,"is_view" => TRUE
				,"is_cache"=> FALSE
				,"lifetime"=> 30
				,"id"      => 12 //theme
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
		
		$vdata["seo_title"] = "theme";
		$vdata["seo_description"] = 'Pilihan tema yang tersedia';
		
		/* ads */
		$vdata["ads"] = $this->load->view($themes."share/ads",'',TRUE);
		
		$vdata["link_active"] = "theme";
		
		/*template parser data*/
		$data['header']= $this->load->view($themes."header",$vdata,TRUE);
		$data['nav']   = $this->load->view($themes."nav",$vdata,TRUE);  
		$data['main']  = $this->load->view($themes."theme/content",$vdata,TRUE);
		$data['footer']= $this->load->view($themes."footer",$vdata,TRUE); 
		$this->load->view($themes."templates",$data);		
	}

	function ajax(){

		$id = $_POST['idx'];

		//var_dump($id) or die();

		$this->load->model('gallery_m');

		/*load default themes*/
		$this->config->load('themes');	
		$config_themes = $this->config->item('themes');
		$themes = $config_themes['active_themes'];
		$data['path']  = $config_themes['path_image'];
		$vdata['path'] = $config_themes['path_image'];	

		$vdata["theme"] = $this->gallery_m->get_front_gallery(
			array(
				"view"     => $themes."theme/gallery"
				,"is_view" => TRUE
				,"is_cache"=> TRUE
				,"lifetime"=> 30
				,"id"      => $id //theme
			)
		);

		$this->load->view($themes."theme/ajax",$vdata);
	}


}

/* End of file welcome.php */
/* Location: ./system/application/controllers/theme.php */