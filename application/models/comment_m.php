<?php
require_once(APPPATH . "/models/Generic_model.php"); 
class Comment_m extends Generic_model {
	
	/*define global variable*/
	var $table = 'comment';
	
	function add(){
		$data_add = array( 
			'id_articles' => $this->input->post('id_articles')
			,'name' => $this->input->post('name')
			,'email' => $this->input->post('email')
			,'message' => word_cencor($this->input->post('message'))
			,'date' => date('Y-m-d')
			,'status' => 1			
		);
		$this->db->insert($this->table, $data_add);	
	}
	
	function getlist($params = array())
	{
		$view 			= isset($params["view"])?$params["view"]: "";
		$is_view		= isset($params["is_view"])?$params["is_view"]: FALSE;
		$id				= isset($params["id"])?$params["id"]: "";
				
		$data = array();
		$this->db->where('id_articles',$id);
		$Q = $this->db->get($this->table);

		if($is_view == TRUE){
			$xdata["list"] = $Q->result_array();
			$data = $this->load->view($view,$xdata,true);
		}
		else{
			$data = $Q->result_array();
		}
		
		$Q->free_result();
		return $data;
	}

}
?>