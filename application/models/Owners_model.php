<?php
class Owners_model extends CI_Model{
	
	var $tbl	 = 'owners_sellers';
	var $tbl_cat = 'categories';
	
	function get_all($id = ''){
		if($id){
			$this->db->where('id', $id);
			$query = $this->db->get($this->tbl, 1);
			return $query->row();
		}
	    $this->db->select('*');
	    $this->db->order_by('name','ASC');
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
			$data["name"] 		= $name;
			$data["address"] 	= $address;
			$data["username	"] 	= $username	;
			$data["password"]	= $password;
			$data["phone"]		= $phone;
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