<?php
require_once(APPPATH . "/models/Generic_model.php"); 
class Profile_m extends Generic_model {
	
	/*define global variable*/
	var $table = 'profile';
	
	function add(){
		$data_add = array( 
			'name' => $this->input->post('name')
		);
		$this->db->insert($this->table, $data_add);	
	}
	
	function update($gambar){

		if(!empty($gambar)){
			//data dengan image	
			$data = array( 
				'first_name' => $this->input->post('first_name'),
				'last_name' => $this->input->post('last_name'),
				'image' => $gambar,
				'about' => $this->input->post('about'),
				'address' => $this->input->post('address'),
				'telephone' => $this->input->post('telephone'),
				'handphone' => $this->input->post('handphone'),
				'fax' => $this->input->post('fax'),
				'email' => $this->input->post('email'),
				'facebook' => $this->input->post('facebook'),
				'twitter' => $this->input->post('twitter'),
				'yahoo' => $this->input->post('yahoo'),
				'site_title' => $this->input->post('site_title')
			);
		
		} else {
			//data tanpa image	
			$data = array( 
				'first_name' => $this->input->post('first_name'),
				'last_name' => $this->input->post('last_name'),
				'about' => $this->input->post('about'),
				'address' => $this->input->post('address'),
				'telephone' => $this->input->post('telephone'),
				'handphone' => $this->input->post('handphone'),
				'fax' => $this->input->post('fax'),
				'email' => $this->input->post('email'),
				'facebook' => $this->input->post('facebook'),
				'twitter' => $this->input->post('twitter'),
				'yahoo' => $this->input->post('yahoo'),
				'site_title' => $this->input->post('site_title')
			);
		}

		$this->db->where('id', $this->input->post('id'));
		$this->db->update($this->table, $data);
	}
	
	function get_profile($params = array()){
		
		$iscached= isset($params["is_cache"])?$params["is_cache"] : FALSE;
		$lifetime= isset($params["lifetime"])?$params["lifetime"] : 10;	
		
		$data = array();
		
		//echo APPPATH. 'cache/';
		
		require_once(APPPATH . "/libraries/Lite.php"); 
		$uid = "seo_profile_".$lifetime;
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
				//print_r($xdata);
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
			//print_r($data); 
			 
			$cacheLite->save($data, $uid);
			
		}
		
		return $data;
	}	
	
}
?>