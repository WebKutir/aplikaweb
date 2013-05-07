<?php
require_once(APPPATH . "/models/Generic_model.php"); 
class Seo_m extends Generic_model {
	
	/*define global variable*/
	var $table = 'seo';
	
	function add(){
		$data_add = array( 
			'name' => $this->input->post('name')
		);
		$this->db->insert($this->table, $data_add);	
	}
	
	function update(){
		$data_update = array( 
			'description' => $this->input->post('description')
			,'keyword' => $this->input->post('keyword')
			,'goolge_analytic' => $this->input->post('goolge_analytic')
			,'effective_measure' => $this->input->post('effective_measure')
		);

		$this->db->where('id', $this->input->post('id'));
		$this->db->update($this->table, $data_update);
	}
	
	function get_seo($params = array()){
		
		$iscached= isset($params["is_cache"])?$params["is_cache"] : FALSE;
		$lifetime= isset($params["lifetime"])?$params["lifetime"] : 10;	
		
		$data = array();
		
		
		require_once(APPPATH . "/libraries/Lite.php"); 
		$uid = "cache_profile_";
		$options = array(
			'cacheDir'               => APPPATH. '../cache/'
			,'lifeTime'              => $lifetime
			,'automaticSerialization'=> TRUE
		);
		$cacheLite = new Cache_Lite($options);
		
		 
		if($iscached)
		{
			/* ambil cache */ 
			if( $xdata = $cacheLite->get($uid))
			{
				return $xdata;
				exit;
			}
		}
		
		$this->db->order_by('id', 'desc');
		$Q = $this->db->get($this->table,1,0);		
		$data = $Q->result_array();
		
		if ($iscached) {
			/* Simpan cache */
			$cacheLite->save($data, $uid);
			
		}
		
		$Q->free_result();
		
		return $data;
	}

}
?>