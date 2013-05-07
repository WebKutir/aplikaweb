<?php
require_once(APPPATH . "/models/Generic_model.php"); 
class Setting_m extends Generic_model {
	
	/*define global variable*/
	var $table = 'settings';
	
	
	function get_offline($params = array()){
		
		$iscached= isset($params["is_cache"])?$params["is_cache"] : FALSE;
		$lifetime= isset($params["lifetime"])?$params["lifetime"] : 10;	
		
		$data = array();
		
		
		require_once(APPPATH . "/libraries/Lite.php"); 
		$uid = "b_offline_";
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
		
		$data = array();
		$data = $Q->result_array();		
		$Q->free_result();
		
		if ($iscached) {
			/* Simpan cache */
			$cacheLite->save($data, $uid);
			
		}
		
		return $data;
	}	
	
}
?>