<?php
class Articles extends Controller {
	
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
		
		/* Detail Articles */
		$id_article = $this->uri->segment(3);						
		$id_article = $this->__clean_url($id_article); //filter		
		
		
		$vdata['detail'] = $this->content_m->get_detail(
			array(
				"is_view"=> false
				,"id"    => $id_article
			)
		);				
		
		/* Update Count View */
		!empty($vdata['detail']['id'])?$detail_id = $vdata['detail']['id'] : redirect('home/error/', 'refresh');
		$this->content_m->updateCountView($detail_id);
		
		/* ads */
		$vdata["ads"] = $this->load->view($themes."share/ads",'',TRUE);
		
		
		
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
		
		$vdata["list_comments"] = $this->comment_m->getlist(
			array(
				"id" => $id_article
				,"is_view" => TRUE	
				,"view" => $themes."share/comments" 
			)
		);
		
		
		$vdata["seo_title"] = $vdata['detail']['title'];
		$vdata["seo_description"] = "ini descripsi seorang diri";
		$vdata["link_active"] = "home";
		$vdata["id_articles"] = $id_article;
		/*template parser data*/
			
		$data['header']= $this->load->view($themes."header",$vdata,TRUE); 
		$data['nav']   = $this->load->view($themes."nav",$vdata,TRUE); 
		$data['main']  = $this->load->view($themes."detail/content",$vdata,TRUE);
		$data['footer']= $this->load->view($themes."footer",$vdata,TRUE); 
		$this->load->view($themes."templates",$data);
		
	}
	
	function validate($id_article){
		
		$this->load->library('form_validation');
		
		$code = $this->input->post('code');
		
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		
		$this->form_validation->set_rules('name', 'Name', 'required|min_length[3]|max_length[12]');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('message', 'Message', 'required');
		$this->form_validation->set_rules('code','captcha','required|capctha_check['.$code.']');
		
		if ($this->form_validation->run() == FALSE)
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
			
			/* Detail Articles */
			$id_article = $id_article;
			$vdata['detail'] = $this->content_m->get_detail(
				array(
					"is_view"=> false
					,"id"    => $id_article
				)
			);		

			$vdata["list_comments"] = $this->comment_m->getlist(
				array(
					"id" => $id_article
					,"is_view" => TRUE	
					,"view" => $themes."share/comments" 
				)
			);	
			
			/* Update Count View */
			// $this->content_m->updateCountView($vdata['detail']['id']);
			
			/* ads */
			$vdata["ads"] = $this->load->view($themes."share/ads",'',TRUE);
			
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
			
			$vdata["seo_title"] = $vdata['detail']['title'];
			$vdata["seo_description"] = "ini descripsi seorang diri";
			$vdata["link_active"] = "home";
			$vdata["id_articles"] = $id_article;
			
			/*template parser data*/
				
			$data['header']= $this->load->view($themes."header",$vdata,TRUE); 
			$data['nav']   = $this->load->view($themes."nav",$vdata,TRUE); 
			$data['main']  = $this->load->view($themes."detail/content",$vdata,TRUE);
			$data['footer']= $this->load->view($themes."footer",$vdata,TRUE); 
			$this->load->view($themes."templates",$data);
			
		}else{
			/* insert to database */		
			
			$this->comment_m->add();
			
			
			/* set flash session */
			$this->session->set_flashdata('sukses', 'Thank for your comments');		
			redirect('articles/validate/'.$id_article);		
		}
	}
	
	function __clean_url($a){
		$a = explode("-",$a);				
		if(is_numeric($a[0])){
			$a = $a[0];
		}else{
			 redirect('home/error/', 'refresh');
		}
		return $a;	
	}

	
}

/* End of file newsdetail.php */
/* Location: ./system/application/controllers/newsdetail.php */	