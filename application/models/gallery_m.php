<?php
require_once(APPPATH . "/models/Generic_model.php"); 
class Gallery_m extends Generic_model {
	
	/*define global variable*/
	var $table = 'gallery';
	
	function get_all_join($limit = NULL, $offset = NULL){
		$data = array();
		$Q = array();
		
		 //empty($offset)?$offset=0:$offset;	
		
		$this->db->select('gallery.id,gallery.album_id,gallery.image,gallery.title,album.name');
		$this->db->from('gallery');
		$this->db->join('album', 'gallery.album_id = album.id');
		$this->db->order_by('gallery.id', 'desc');
		$this->db->limit($limit, $offset); 

		$Q = $this->db->get();

		if ($Q->num_rows() > 0){
			foreach ($Q->result_array() as $row){
				$data[] = $row;
			}
		}
		$Q->free_result();  
		return $data; 
	}
	
	function add($gambar = NULL,$title = NULL){
		$data_add = array( 
			'title' => $title		
			,'album_id' => $this->input->post('album_id')			
			,'image' => $gambar		
		);
		$this->db->insert($this->table, $data_add);	
	}
	
	function update($gambar){
		
		
		if(!empty($gambar)){
			//data dengan image	
			$data = array( 
				'title' => $this->input->post('title'),
				'album_id' => $this->input->post('album_id'),
				'image' => $gambar
			);
		
		} else {
			//data tanpa image	
			$data = array( 
				'title' => $this->input->post('title'),
				'album_id' => $this->input->post('album_id')
			);
		}

		$this->db->where('id', $this->input->post('id'));
		$this->db->update($this->table, $data);
	}
	
	function get_front_gallery($params = array()){
		$view    = isset($params["view"])?$params["view"]: ""; 
		$limit   = isset($params["limit"])?$params["limit"]: 200; 
		$id      = isset($params["id"])?$params["id"]: "";  
		$is_view = isset($params["is_view"])?$params["is_view"]: FALSE;
		$iscached= isset($params["is_cache"])?$params["is_cache"] : FALSE;
		$lifetime= isset($params["lifetime"])?$params["lifetime"] : "";
		
				
		/* Include the package */
		require_once(APPPATH . "/libraries/Lite.php"); 
		// Set a uniq id for this cache
		$uid = $id."_".$view."_".$limit;
		// Set a few options for cache
		$options = array(
			'cacheDir' => APPPATH. '../cache/',
			'lifeTime' => $lifetime
		);
		// Create a Cache_Lite object
		$cacheLite = new Cache_Lite($options);
		/* End cache config */
		
		$data = array();
		
		
		if($iscached)
		{
			// /* ambil cache */ 
			if( $xdata = $cacheLite->get($uid))
			{		
				return $xdata;
			}
		}
		
		/*query start*/
		$this->db->where('album_id',$id);
		$this->db->limit($limit);
		$this->db->order_by('id', 'desc'); 
		$Q = $this->db->get($this->table);		
		/*query end*/
		

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