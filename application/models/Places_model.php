<?php
class Places_model extends CI_Model{
	
	var $tbl = 'important_places';
	
	function get_all($property_id='',$id = ''){
		
		if($property_id){
			$this->db->where('property_id', $property_id);
		}
		
		if($id){
			$this->db->where('id', $id);
			$query = $this->db->get($this->tbl, 1);
			return $query->row();
		}
	    $this->db->select('*');
	    $this->db->order_by('place_title','ASC');
		$query = $this->db->get($this->tbl);
		if( $query->num_rows() > 0 ) {
			return $query->result();
		}
		return NULL;
	}
	
	function save($post){
		if($post){
			extract($post);
			$data = array();
			$data["place_title"] = $place_title;
			$data["property_id"] = $property_id;
			if($id > 0){
				$this->db->where('id', $id);
				$this->db->update($this->tbl, $data);
				return $id;
			}else{
				$this->db->insert($this->tbl, $data);
				return $this->db->insert_id();
			}
		}
	}
	
	function del($id){
	  if($id > 0){	
		$this->db->where('id', $id);
		$this->db->delete($this->tbl);
	  }
	}
}