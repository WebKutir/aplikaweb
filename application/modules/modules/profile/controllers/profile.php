<?php
class Profile extends Controller {

	var $ctrl = 'profile';
	var $table= 'profile';
	var $uploadpath = './myupload/';
	
	function __construct()
	{
		parent::Controller();
		$this->load->model('profile_m', '', TRUE);
		$this->load->model('Generic_model', '', TRUE);
		
		$this->load->library('form_validation');
		
		$this->load->helper('tools_helper');
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
		
		$data['h2']         = "Manage ".$this->table;
		$data['main']       = "content";
		$data['ctrl']		= $this->ctrl;
		
		$data['uri_segment']= $this->uri->segment(3);
		$per_page           = 1;
		
		/* pagination config */
		$config          = array(
			'base_url'   => site_url("".$this->ctrl."/index")
			,'total_rows'=> $this->db->count_all($this->table)
			,'per_page'  => $per_page
		);
		$this->config->load("pagination");
		
		$data['result'] = $this->profile_m->get_all($per_page,$data['uri_segment']);
		
			
		$this->pagination->initialize($config);			
		$this->load->view('admin/templates',$data);
	}
	
	function add()
	{
	 	if ($this->input->post('name')){
		
			$this->profile_m->add();
			$this->session->set_flashdata('sukses', $this->table.' created');
			redirect('profile/index');
		}else{
		
			$data['h2']  = "Create ".$this->table;
			$data['main']= "form";
			$this->load->view('admin/templates',$data);    
		} 
		
	}
	
	function edit($id=0){

		// config filter date	
		$this->form_validation->set_rules('first_name', 'first_name', 'required');
		$this->form_validation->set_rules('last_name', 'last_name', 'required');
	
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
					//update news tanpa merubah photo
					$kosong = "";
					$this->profile_m->update($kosong);
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
					
					$this->profile_m->update($gambar);
					$this->session->set_flashdata('sukses', $this->ctrl.' Updated');
					redirect($this->ctrl.'/index');
				}
		
		
									
			
		}else{
			$id            = $this->uri->segment(3);
			$data['h2']    = "Edit ".$this->table;
			$data['main']  = "form";
			$data['result']= $this->profile_m->get_detail(array(
				"id" => $id
			));
			$this->load->view('admin/templates',$data);     
		}
	}
	
	function delete($id){
		$this->profile_m->delete($id);
		$this->session->set_flashdata('sukses', $this->table.' deleted');
		redirect('cat/index');
	}
	
}
?>