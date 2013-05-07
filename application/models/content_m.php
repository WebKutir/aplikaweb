<?php
require_once(APPPATH . "/models/Generic_model.php"); 
class Content_m extends Generic_model {
	
	/*define global variable*/
	var $table = 'content';
	
	function add($gambar = NULL,$cat_id = NULL){
		$data_add = array( 
			'title'      => $this->input->post('title'),
			'content'    => $this->input->post('content'),
			'date'       => $this->input->post('date'),
			'image'      => $gambar,
			'keyword'    => $this->input->post('keyword'),
			'category_id'=> $cat_id,
			'publish'    => $this->input->post('publish'),
			'privileges' => $this->input->post('privileges'),
			'author'	 => $this->session->userdata('userid')			
		);
		$this->db->insert($this->table, $data_add);	
	}
	
	/* get all by category */
	function get_all_by_id($limit = NULL, $offset = NULL,$cat_id,$author){
		$data = array();
		$Q = array();
		
		/* Jika admin dapat melihat semua */
		if($author == 1){
			$Q = $this->db->select('content.id, title, content, date, content.image, category_id, keyword, publish, commentable, privileges, count_view, author, user.username');
			$Q = $this->db->order_by('content.id','desc');
			$Q = $this->db->join('user', 'user.id = content.author', 'inner');
			$Q = $this->db->get_where($this->table, array('category_id' => $cat_id), $limit, $offset);	
		}else{
			/*Bukan admin hanya cuma bisa melihat yang diinputkan oleh id nya saja*/
			$Q = $this->db->select('content.id, title, content, date, content.image, category_id, keyword, publish, commentable, privileges, count_view, author, user.username');
			$Q = $this->db->order_by('content.id','desc');
			$Q = $this->db->join('user', 'user.id = content.author', 'inner');
			$Q = $this->db->get_where($this->table, array('category_id' => $cat_id, 'author' => $author), $limit, $offset);	
		}
		
		
		
		if ($Q->num_rows() > 0){
			foreach ($Q->result_array() as $row){
				$data[] = $row;
			}
		}
		
		$Q->free_result();  
		return $data; 
	}
	
	function update($gambar){
		
		
		if(!empty($gambar)){
			//data dengan image	
			$data = array( 
				'title'     => $this->input->post('title'),
				'content'   => $this->input->post('content'),
				'date'      => $this->input->post('date'),
				'image'     => $gambar,
				'keyword'   => $this->input->post('keyword'),
				'publish'   => $this->input->post('publish'),
				'privileges'=> $this->input->post('privileges')
				
			);
		
		} else {
			//data tanpa image	
			$data = array( 
				'title'     => $this->input->post('title'),
				'content'   => $this->input->post('content'),
				'date'      => $this->input->post('date'),
				'keyword'   => $this->input->post('keyword'),
				'publish'   => $this->input->post('publish'),
				'privileges'=> $this->input->post('privileges')
				
			);
		}

		$this->db->where('id', $this->input->post('id'));
		$this->db->update($this->table, $data);
	}
	
	function updateCountView($id){
		$this->db->query('UPDATE '.$this->table.' SET count_view = count_view + 1 where id = '.$id.'');
	}
	
	function get_front_multi_content($params = array()){
		$view    = isset($params["view"])?$params["view"]: ""; 
		$limit   = isset($params["limit"])?$params["limit"]: 1; 
		$id      = isset($params["id"])?$params["id"]: "";  
		$id2     = isset($params["id2"])?$params["id2"]: "";  
		$id3     = isset($params["id3"])?$params["id3"]: "";  
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
			/* ambil cache */ 
			if( $xdata = $cacheLite->get($uid))
			{		
				return $xdata;
			}
		}
		
	
		$this->db->where('category_id',$id);
		$this->db->or_where('category_id',$id2);
		$this->db->or_where('category_id',$id3);
		$this->db->limit($limit);
		$this->db->order_by('date', 'desc'); 
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
	
	function get_content($params = array()){
		$view    = isset($params["view"])?$params["view"]: ""; 
		$limit   = isset($params["limit"])?$params["limit"]: 1; 
		$id      = isset($params["id"])?$params["id"]: "";  
		$is_view = isset($params["is_view"])?$params["is_view"]: FALSE;
		$iscached= isset($params["is_cache"])?$params["is_cache"] : FALSE;
		$lifetime= isset($params["lifetime"])?$params["lifetime"] : 30;
		
		/* Include the package */
		require_once(APPPATH . "/libraries/Lite.php"); 
		// Set a uniq id for this cache
		$uid = $id."_content_".$limit;
		// Set a few options for cache
		
		if($is_view == TRUE){
			$options = array(
				'cacheDir' => APPPATH. '../cache/',
				'lifeTime' => $lifetime
			);	
		} else {
			$options = array(
				'cacheDir' => APPPATH. '../cache/',
				'lifeTime' => $lifetime,
				'automaticSerialization'=> TRUE
			);	
		}
		
		
		// Create a Cache_Lite object
		$cacheLite = new Cache_Lite($options);
		/* End cache config */
		
		$data = array();
		
		
		if($iscached)
		{
			/* ambil cache */ 
			if( $xdata = $cacheLite->get($uid))
			{
				return $xdata;
			}
		}
		
	
		$this->db->where('category_id',$id);
		$this->db->limit($limit);
		$this->db->order_by('date', 'desc'); 
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
	
	function get_detail($params = array())
	{
		$view 			= isset($params["view"])?$params["view"]: "";
		$is_view		= isset($params["is_view"])?$params["is_view"]: FALSE;
		$limit			= isset($params["limit"])?$params["limit"]: 1;
		$id				= isset($params["id"])?$params["id"]: "";
				
		$data = array();
		$this->db->select('content.id, title, content, date, content.image, category_id, keyword, publish, commentable, privileges, count_view, author, user.first_name, user.last_name');
		$this->db->where('content.id',$id);
		$this->db->join('user', 'user.id = content.author', 'inner');
		$this->db->limit($limit);
		
		$Q = $this->db->get($this->table);

		if($is_view == TRUE){
			$xdata["list"] = $Q->row_array();
			$data = $this->load->view($view,$xdata,true);
		}
		else{
			$data = $Q->row_array();
		}
		
		$Q->free_result();
		return $data;
	}

}
?>