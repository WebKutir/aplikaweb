<?php
class Coding extends Controller {

	var $ctrl = 'coding';
	var $table= 'content';
	var $cat_id = 11; //coding
	var $uploadpath = './myupload/';
	
	function __construct()
	{
		parent::Controller();
		$this->load->model('content_m', '', TRUE);
		$this->load->model('Generic_model', '', TRUE);
		$this->load->helper('tools_helper');
		$this->load->library('form_validation');

		
		$this->load->library('session');
		//validate user auth
		session_start();
		if ($this->session->userdata('logged_in') == FALSE){
			redirect('webmin/index','refresh');
		}
		//acl only for admin
		acl($this->ctrl,$this->session->userdata('group'));
		
	}
		
	function index()
	{
		$this->load->library('pagination');
		
		$data['h2']         = "Manage ".$this->ctrl;
		$data['main']       = "content";
		$data['ctrl']		= $this->ctrl;
		
		$data['uri_segment']= $this->uri->segment(3);
		$per_page           = 5;
		
		if($this->session->userdata('userid') == 1){
			/* pagination config as admin */
			 
			$config          = array(
				'base_url'   => site_url("".$this->ctrl."/index")
				,'total_rows'=> $this->db->where('category_id',$this->cat_id)
				,'total_rows'=> $this->db->from($this->table)
				,'total_rows'=> $this->db->count_all_results()
				,'per_page'  => $per_page
			); 
			
		} else {
			/* pagination config not admin */
			$config          = array(
				'base_url'   => site_url("".$this->ctrl."/index")
				,'total_rows'=> $this->db->where('category_id',$this->cat_id)
				,'total_rows'=> $this->db->where('author',$this->session->userdata('userid'))
				,'total_rows'=> $this->db->from($this->table)
				,'total_rows'=> $this->db->count_all_results()
				,'per_page'  => $per_page
			); 
		}
		
		$this->config->load("pagination");
		
		$data['result'] = $this->content_m->get_all_by_id($per_page,$data['uri_segment'],$this->cat_id,$this->session->userdata('userid'));
		
		$this->pagination->initialize($config);			
		$this->load->view('admin/templates',$data);
	
	}
	
	function add()
	{
		// config filter date	
		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('date', 'Date', 'required');
	
		if ($this->form_validation->run() == TRUE){
		
			//config pengacakan nama file
			$acak= rand(0000,9999);
			$tipe= $_FILES["userfile"]["name"];
			$ext = getFileExtension($tipe);
			
			$gambar  = $acak.$ext;
			
			$config             = array(
				'upload_path'   => $this->uploadpath
				,'overwrite' 	=> TRUE
				,'allowed_types'=>'jpg|jpeg|gif|png'
				,'max_size'     => 2000
				,'max_width'    => 1024
				,'max_height'   => 768
				,'file_name'    => $acak
			);
			
			$gambar  = $acak.$ext;
			
			$this->load->library('upload', $config);
			
				if ( ! $this->upload->do_upload())
				{
					
					//jika gagal upload , melanggar config	diarahkan ke halaman semula				
					$data['error'] = $this->upload->display_errors();
					$data['h2']  = "Create ".$this->ctrl;
					$data['main']= "form";
					$this->load->view('admin/templates',$data); 
				} else {
					//jika ada file upload lolos config
					$data = array('upload_data' => $this->upload->data());
					$image_data = $this->upload->data();
						
					//resize thumb image 
					$config = array(
						'source_image'   => $image_data['full_path'],
						'new_image'      => $this->uploadpath.'thumbs',
						'maintain_ration'=>true,
						'width'          =>160,
						'height'         =>120
					);
					//load library resize
					$this->load->library('image_lib', $config);
					$this->image_lib->resize();
					
					$this->content_m->add($gambar,$this->cat_id);
					$this->session->set_flashdata('sukses', $this->ctrl.' created');
					redirect($this->ctrl.'/index');
				}
		
		}else{
		
			//jika TITLE tidak diisi, diarahkan ke halaman semula		
			$data['h2']  = "Create ".$this->ctrl;
			$data['main']= "form";
			$this->load->view('admin/templates',$data);    
			
		} 
	}
	
	function edit($id=0){
		
		
		// config filter date	
		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('date', 'Date', 'required');
	
		if ($this->form_validation->run() == TRUE){
			
			//config pengacakan nama file
			$acak= rand(0000,9999);
			$tipe= $_FILES["userfile"]["name"];
			$ext = getFileExtension($tipe);
			
			$gambar  = $acak.$ext;
			
			$config             = array(
				'upload_path'   => $this->uploadpath
				,'overwrite' 	=> TRUE
				,'allowed_types'=>'jpg|jpeg|gif|png'
				,'max_size'     => 2000
				,'max_width'    => 1024
				,'max_height'   => 768
				,'file_name'    => $acak
			);
			
			$gambar  = $acak.$ext;


			$this->load->library('upload', $config);
		
			if ( ! $this->upload->do_upload())
				{
					//update coding tanpa merubah photo
					$kosong = "";
					$this->content_m->update($kosong);
					$this->session->set_flashdata('sukses', $this->ctrl.' Updated');
					redirect($this->ctrl.'/index');
					
				} else {
				
					//update dengan merubah image default , upload lagi
					
					//jika ada file upload lolos config
					$data = array('upload_data' => $this->upload->data());
					$image_data = $this->upload->data();
						
					//resize thumb image 
					$config = array(
						'source_image'   => $image_data['full_path'],
						'new_image'      => $this->uploadpath.'thumbs',
						'maintain_ration'=>true,
						'width'          =>160,
						'height'         =>120
					);
					//load library resize
					$this->load->library('image_lib', $config);
					$this->image_lib->resize();
					
					$this->content_m->update($gambar);
					$this->session->set_flashdata('sukses', $this->ctrl.' Updated');
					redirect($this->ctrl.'/index');
				}
		
		
									
			
		}else{
			$id            = $this->uri->segment(3);
			$data['h2']    = "Edit ".$this->table;
			$data['main']  = "form";
			$data['result']= $this->content_m->get_detail(array(
				"id" => $id
			));
			$this->load->view('admin/templates',$data);     
		}
	}
	
	function delete($id){
		//get image name
		$data['result']= $this->content_m->get_detail(array("id" => $id));
		isset($data['result']['image']) ? $file = $data['result']['image'] : $file = "";
							
		$image 		  = $this->uploadpath.$file;
		$image_thumbs = $this->uploadpath.'thumbs/'.$file;

		chmod($image, 0666);
        @unlink($image); //remove file from folder
        @unlink($image_thumbs); //remove file from thumbs folder

	
		$this->content_m->delete($id); //remove from database
		$this->session->set_flashdata('sukses', $this->table.' deleted');
		redirect($this->ctrl.'/index');
	}
	
}
?>