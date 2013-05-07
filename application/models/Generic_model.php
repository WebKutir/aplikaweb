<?php 
class Generic_model extends Model {
	
	/*define global variable*/
	var $table = '';
	

	/*contstuctor model*/	
	function __construct()
	{
        parent::Model();
	}
	
	/*default detail by id*/
	function get_detail($params = array())
	{
		$view 			= isset($params["view"])?$params["view"]: "";
		$is_view		= isset($params["is_view"])?$params["is_view"]: FALSE;
		$limit			= isset($params["limit"])?$params["limit"]: 1;
		$id				= isset($params["id"])?$params["id"]: "";
				
		$data = array();
		$this->db->where('id',$id);
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
	
	/* get all data */
	function get_all($limit = NULL, $offset = NULL){
		$data = array();
		$Q = array();
		
		$Q = $this->db->order_by('id','desc');
		$Q = $this->db->get($this->table,$limit,$offset);
		
		
		if ($Q->num_rows() > 0){
			foreach ($Q->result_array() as $row){
				$data[] = $row;
			}
		}
		$Q->free_result();  
		return $data; 
	}
	
		
		
	/* get all by category */
	function get_all_by_id($limit = NULL, $offset = NULL,$cat_id,$author){
		$data = array();
		$Q = array();
		
		/* Jika admin dapat melihat semua */
		if($author == 1){
			$Q = $this->db->order_by('id','desc');
			$Q = $this->db->get_where($this->table, array('category_id' => $cat_id), $limit, $offset);	
		}else{
			/*Bukan admin hanya cuma bisa melihat yang diinputkan oleh id nya saja*/
			$Q = $this->db->order_by('id','desc');
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
	
	/* add record to table */
	function add(){
		$data = array( 
			'field_db' => $this->input->post('field_name_from_form')
		);
	
		$this->db->insert($this->table, $data);	
	}
	
		
	/* update table */
	function update(){
		$data = array( 
			'field_db' => $this->input->post('field_name_from_form')
		);

		$this->db->where('id', $this->input->post('id'));
		$this->db->update($this->table, $data);
	}
	
	/* delete table */
	function delete($id){
		$this->db->where('id', $id);
		$this->db->delete($this->table);
	}

}	
?>