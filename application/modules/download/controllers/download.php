<?php
class Download extends Controller {

	var $ctrl = 'download';
	var $table= 'download';
	var $uploadpath = './myupload/download/';
	
	function __construct()
	{
		parent::Controller();
		$this->load->model('download_m', '', TRUE);
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
		
		/* pagination config */
		$config          = array(
			'base_url'   => site_url("".$this->ctrl."/index")
			,'total_rows'=> $this->db->from($this->table)
			,'total_rows'=> $this->db->count_all_results()
			,'per_page'  => $per_page
		);
		$this->config->load("pagination");
		
		$data['result'] = $this->download_m->get_all($per_page,$data['uri_segment']);
		
		$this->pagination->initialize($config);			
		$this->load->view('admin/templates',$data);
	
	}
	
	function add()
	{
		$this->load->library('upload');	
		// config filter date	
		//$this->form_validation->set_rules('title', 'Title', 'required');
		//$this->form_validation->set_rules('date', 'Date', 'required');
		
		//jika menekan tombol go_upload
		if($this->input->post('go_upload')){
			
			$field1 = 'userfile1';
			$field2 = 'userfile2';
			
			$config['upload_path'] = $this->uploadpath;
			$config['allowed_types'] = 'jpg|jpeg|gif|png';
			$config['max_size'] = '2000';
			$config['remove_spaces'] = TRUE;
			$this->upload->initialize($config);
			$this->upload->do_upload($field1);
			
						
			$config['upload_path'] = $this->uploadpath;
			$config['allowed_types'] = 'txt|zip|rar';
			$config['max_size'] = '2000';
			$this->upload->initialize($config);
			$this->upload->do_upload($field2);
			
			
			$this->load->library('upload',$config);
			
			$gambar = $_FILES['userfile1']['name'];
			$file = $_FILES['userfile2']['name'];
			$size = $_FILES['userfile2']['size'];
			
			$this->download_m->add($gambar,$file,$size);
			$this->session->set_flashdata('sukses', $this->ctrl.' created');
			redirect($this->ctrl.'/index');
				
			
					
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
		$this->form_validation->set_rules('description', 'Description', 'required');
		$this->form_validation->set_rules('date', 'Date', 'required');
		
		if ($this->form_validation->run() == TRUE){
			
			$this->download_m->update();
			$this->session->set_flashdata('sukses', $this->ctrl.' Updated');
			redirect($this->ctrl.'/index');
		
		}else{

			//jika TITLE tidak diisi, diarahkan ke halaman semula	
						
			$data['h2']  = "Create ".$this->ctrl;
			$data['main']= "form";
			$data['result']= $this->download_m->get_detail(array(
				"id" => $id
			));
			$this->load->view('admin/templates',$data);    
			
		} 
		
	}
	
	function delete($id){
		//get image name
		$data['result']= $this->download_m->get_detail(array("id" => $id));
		isset($data['result']['image']) ? $image = $data['result']['image'] : $image = "";
		isset($data['result']['file']) ? $file = $data['result']['file'] : $file = "";
		
		$image 		  = $this->uploadpath.$image;
		$file 		  = $this->uploadpath.$file;

		chmod($image, 0666);
		chmod($file, 0666);
		@unlink($file); //remove file from folder
        @unlink($image); //remove file from folder
 
 
		$this->download_m->delete($id); //remove from database
		$this->session->set_flashdata('sukses', $this->table.' deleted');
		redirect($this->ctrl.'/index');
	}
	
}
?>