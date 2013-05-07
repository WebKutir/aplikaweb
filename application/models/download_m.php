<?php
require_once(APPPATH . "/models/Generic_model.php"); 
class Download_m extends Generic_model {
	
	/*define global variable*/
	var $table = 'download';
	
	function add($gambar = NULL,$file = NULL, $size=NULL){
		$data_add = array( 
			'title' => $this->input->post('title'),
			'description' => $this->input->post('description'),
			'size' => $size,
			'date' => $this->input->post('date'),
			'image' => $gambar,
			'file' => $file,
			'publish' => $this->input->post('publish'),
			'privileges' => $this->input->post('privileges')
			
		);
		$this->db->insert($this->table, $data_add);	
	}
	
	function update(){
		
		$data = array( 
				'title' => $this->input->post('title'),
				'description' => $this->input->post('description'),
				'date' => $this->input->post('date'),
				'publish' => $this->input->post('publish'),
				'privileges' => $this->input->post('privileges')
		);
		
		$this->db->where('id', $this->input->post('id'));
		$this->db->update($this->table, $data);
	}

}
?>