<?php
require_once(APPPATH . "/models/Generic_model.php"); 
class Contact_m extends Generic_model {
	
	/*define global variable*/
	var $table = 'contact';
	
	function add(){
		$data_add = array( 
			'name' => $this->input->post('name')
			,'company' => $this->input->post('company')
			,'subject' => $this->input->post('subject')
			,'message' => $this->input->post('message')
			,'email' => $this->input->post('email')			
		);
		$this->db->insert($this->table, $data_add);	
	}


}
?>