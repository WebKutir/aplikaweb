<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Gallery extends Controller {
	
	var $max = 5;
	var $ctrl = 'gallery';
	var $table= 'gallery';
	var $uploadpath = './myupload/gallery/';
	
	
	function __construct()
	{
		parent::Controller();
		$this->load->model('album_m', '', TRUE);
		$this->load->model('gallery_m', '', TRUE);
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
	
	function index(){
		$this->load->library('pagination');
		
		$data['h2']         = "Manage ".$this->table;
		$data['main']       = "content";
		$data['ctrl']		= $this->ctrl;
		
		$data['uri_segment']= $this->uri->segment(3);
		
		$per_page           = 5;
		
		/* pagination config */
		$config          = array(
			'base_url'   => site_url("".$this->ctrl."/index")
			,'total_rows'=> $this->db->count_all($this->table)
			,'per_page'  => $per_page
		);
		$this->config->load("pagination");
		
		$data['result'] = $this->gallery_m->get_all_join($per_page,$data['uri_segment']);
		
		
		$this->pagination->initialize($config);			
		$this->load->view('admin/templates',$data);
		
	}
	
	function add()
	{
		
		$sub_data = array(
			"error" =>''
			,"result" => ''
		);
		
		//jika menekan tombol go_upload
		if($this->input->post('go_upload')){
			
			
			$config['upload_path'] = 'myupload/gallery/';
			$config['allowed_types'] = 'jpg|jpeg|gif|png';
			$config['max_size'] = '2000';
			$config['max_width'] = '1600';
			$config['max_height'] = '1200';
			$config['encrypt_name'] = TRUE;
			$config['remove_spaces'] = TRUE;
			
			
			
			$this->load->library('upload',$config);
			$result_array = array();
			
			for($i=1; $i<=$this->max; $i++){
				if(!empty($_FILES['userfile'.$i]['name'])){
					if(!$this->upload->do_upload('userfile'.$i))	
						$sub_data['error'] =  $this->upload->display_errors();
					else
					
					
						array_push($result_array,$this->upload->data());
						
						$data = array('upload_data' => $this->upload->data());
						$image_data = $this->upload->data();
						
											
						//load library resize
						$config['image_library'] = 'gd2';
						$config['maintain_ratio'] = TRUE;
						$config['new_image'] = $this->uploadpath.'thumbs';
						$config['width'] = 258;
						$config['height'] = 214;
						$this->load->library('image_lib', $config);

						foreach( $image_data as $idata ){
							$config['source_image'] = $idata;
							$this->image_lib->initialize($config);
							$this->image_lib->resize();
						}
						
						
						
						$gambar = $result_array[$i-1]['file_name'];
						$title = $this->input->post('title'.$i);
						$this->gallery_m->add($gambar,$title);
				}	
			}
			$sub_data['result'] = $result_array;
				
		}
		
		$album = $this->album_m->get_all();
		foreach($album as $row)
		{
			$sub_data['options_album'][$row['id']] = $row['name'];
		}
		
		$sub_data['ctrl'] = $this->ctrl;
		$sub_data['h2'] = "Image Gallery Upload";
		$sub_data['max'] = $this->max;
		$data['custom_main'] = $this->load->view('upload_form',$sub_data,true);
		$this->load->view('admin/templates',$data);
	}
	
	function edit($id=0){
		
		
		// config filter date	
		$this->form_validation->set_rules('title', 'Title', 'required');
		
	
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
					$this->gallery_m->update($kosong);
					$this->session->set_flashdata('sukses', $this->ctrl.' Updated');
					redirect($this->ctrl.'/index');
					
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
									
					$this->gallery_m->update($gambar);
					$this->session->set_flashdata('sukses', $this->ctrl.' Updated');
					redirect($this->ctrl.'/index');
				}
		
		
									
			
		}else{
			$id            = $this->uri->segment(3);
			$data['h2']    = "Edit ".$this->table;
			$data['main']  = "form";
			$data['result']= $this->gallery_m->get_detail(array(
				"id" => $id
			));
			
			$album = $this->album_m->get_all();
			foreach($album as $row)
			{
				$data['options_album'][$row['id']] = $row['name'];
			}
			
			$this->load->view('admin/templates',$data);     
		}
	}
	
	function delete($id){
		
		$this->load->helper('file');
		
		//get image name
		$data['result']= $this->gallery_m->get_detail(array("id" => $id));
		isset($data['result']['image']) ? $file = $data['result']['image'] : $file = "";
		
		$image 		  = $this->uploadpath.$file;
				
		chmod($image, 0666);
        @unlink($image); //remove file from folder
		
	
		$this->gallery_m->delete($id); //remove from database
		$this->session->set_flashdata('sukses', $this->table.' deleted');
		redirect($this->ctrl.'/index');
	}
	
}