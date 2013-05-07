<?php
require_once(APPPATH . "/models/Generic_model.php"); 
class Album_m extends Generic_model {
	
	/*define global variable*/
	var $table = 'album';
	
	function add($gambar = NULL){
		$data_add = array( 
			'name' => $this->input->post('name'),
			'image' => $gambar
		);
		$this->db->insert($this->table, $data_add);	
	}
	
	function update($gambar){
		
		if(!empty($gambar)){
			//data dengan image
			$data_update = array( 
				'name' => $this->input->post('name'),
				'image' => $gambar
			);
			
		}else {
			//data tanpa image
			$data_update = array( 
				'name' => $this->input->post('name')
			);
		}
		
		$this->db->where('id', $this->input->post('id'));
		$this->db->update($this->table, $data_update);
	}

}
?>