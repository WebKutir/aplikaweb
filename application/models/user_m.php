<?php
require_once(APPPATH . "/models/Generic_model.php"); 
class User_m extends Generic_model {
	
	/*define global variable*/
	var $table = 'user';
	
	function add($gambar = NULL,$cat_id = NULL){
		$data_add = array( 
			'first_name' => $this->input->post('first_name'),
			'last_name' => $this->input->post('last_name'),
			'birtdate' => $this->input->post('birtdate'),
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password'),
			'email' => $this->input->post('email'),
			'address' => $this->input->post('address'),
			'image' => $gambar,
			'group' => $this->input->post('group'),
			'activate' => $this->input->post('activate')
			
		);
		$this->db->insert($this->table, $data_add);	
	}
	
	function update($gambar){
		
		
		if(!empty($gambar)){
			//data dengan image	
			$data = array( 
				'first_name' => $this->input->post('first_name'),
				'last_name' => $this->input->post('last_name'),
				'birtdate' => $this->input->post('birtdate'),
				'username' => $this->input->post('username'),
				'password' => $this->input->post('password'),
				'email' => $this->input->post('email'),
				'address' => $this->input->post('address'),
				'image' => $gambar,
				'group' => $this->input->post('group'),
				'activate' => $this->input->post('activate')				
			);
		
		} else {
			//data tanpa image	
			$data = array( 
				'first_name' => $this->input->post('first_name'),
				'last_name' => $this->input->post('last_name'),
				'birtdate' => $this->input->post('birtdate'),
				'username' => $this->input->post('username'),
				'password' => $this->input->post('password'),
				'email' => $this->input->post('email'),
				'address' => $this->input->post('address'),
				'group' => $this->input->post('group'),
				'activate' => $this->input->post('activate')
			);
		}

		$this->db->where('id', $this->input->post('id'));
		$this->db->update($this->table, $data);
	}

}
?>