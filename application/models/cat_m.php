<?php
require_once(APPPATH . "/models/Generic_model.php"); 
class Cat_m extends Generic_model {
	
	/*define global variable*/
	var $table = 'category';
	
	function add(){
		$data_add = array( 
			'name' => $this->input->post('name')
		);
		$this->db->insert($this->table, $data_add);	
	}
	
	function update(){
		$data_update = array( 
			'name' => $this->input->post('name')
		);

		$this->db->where('id', $this->input->post('id'));
		$this->db->update($this->table, $data_update);
	}
	
	function get_submenu($params = array()){
		
		$id      = isset($params["id"])?$params["id"]: 1;  
		$id2     = isset($params["id2"])?$params["id2"]: 2;  
		$id3     = isset($params["id3"])?$params["id3"]: 3;
		$is_view = isset($params["is_view"])?$params["is_view"]: FALSE;
		$limit   = isset($params["limit"])?$params["limit"]: 1; 	
		$iscached= isset($params["is_cache"])?$params["is_cache"] : FALSE;	
		$lifetime= isset($params["lifetime"])?$params["lifetime"] : 10;
		
		$data = array();
		
		require_once(APPPATH . "/libraries/Lite.php"); 
		$uid = "cat_".$limit."_menu_".$id3;
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
		
		
		$this->db->where('id',$id);
		$this->db->or_where('id',$id2);
		$this->db->or_where('id',$id3);
		$this->db->limit($limit);
		$this->db->order_by('name', 'desc'); 
		$Q = $this->db->get($this->table);
		
		if($is_view == TRUE){
			$xdata["list"] = $Q->result_array();
			$data = $this->load->view($view,$xdata,true);
		}
		else{
			$data = $Q->result_array();
		}	
		
		$Q->free_result();
		
		if ($iscached) {
			/* Simpan cache */
			$cacheLite->save($data, $uid);
			
		}
		
		return $data;
	}

}
?>