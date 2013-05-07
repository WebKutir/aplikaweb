<?php
require_once(APPPATH . "/models/Generic_model.php"); 
class Webmin_m extends Generic_model {
	
	/*define global variable*/
	var $table = 'user';
	
	function verifyUser($u,$pw){
		$this->db->select('id,username,group');
		$this->db->where('username',$u);
		$this->db->where('password',md5($pw));
		$this->db->where('activate','1');
		$this->db->limit(1);
		
		$Q = $this->db->get($this->table);
		
		if ($Q->num_rows() > 0){
			$data = $Q->row_array();
			$Q->free_result();
			return $data;
		} else {
			return array();
		}
	}
	


}
?>