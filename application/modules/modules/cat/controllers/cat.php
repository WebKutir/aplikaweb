<?php
class Cat extends Controller {

	var $ctrl = 'cat';
	var $table= 'category';
	
	function __construct()
	{
		parent::Controller();
		$this->load->model('cat_m', '', TRUE);
		$this->load->model('Generic_model', '', TRUE);
		
		$this->load->library('session');
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
		$per_page           = 10;
		
		/* pagination config */
		$config          = array(
			'base_url'   => site_url("".$this->ctrl."/index")
			,'total_rows'=> $this->db->count_all($this->table)
			,'per_page'  => $per_page
		);
		$this->config->load("pagination");
		
		$data['result'] = $this->cat_m->get_all($per_page,$data['uri_segment']);
		
		$this->pagination->initialize($config);			
		$this->load->view('admin/templates',$data);
	}
	
	function add()
	{
	 	if ($this->input->post('name')){
		
			$this->cat_m->add();
			$this->session->set_flashdata('sukses', $this->table.' created');
			redirect('cat/index');
		}else{
		
			$data['h2']  = "Create ".$this->table;
			$data['main']= "form";
			$this->load->view('admin/templates',$data);    
		} 
		
	}
	
	function edit($id=0){
		if ($this->input->post('name')){
			$this->cat_m->update();
			$this->session->set_flashdata('sukses', $this->table.' updated');
			redirect('cat/index');
		}else{
			$id            = $this->uri->segment(3);
			$data['h2']    = "Edit ".$this->table;
			$data['main']  = "form";
			$data['result']= $this->cat_m->get_detail(array(
				"id" => $id
			));
			$this->load->view('admin/templates',$data);     
		}
	}
	
	function delete($id){
		$this->cat_m->delete($id);
		$this->session->set_flashdata('sukses', $this->table.' deleted');
		redirect('cat/index');
	}
	
}
?>