<?php
class Brand_model extends CI_Model{
	
	var $tbl        = 'brand';
    var $tbl_type   = 'bodytype';
    var $tbl_maker  = 'maker';
	
	function get_all($id = ''){

        $this->db->select("$this->tbl.*, $this->tbl_type.name as bodytype_name, $this->tbl_maker.name as maker_name");
        $this->db->join($this->tbl_type, $this->tbl_type.'.id = '.$this->tbl.'.body_type_id', 'left', true);
        $this->db->join($this->tbl_maker,$this->tbl_maker.'.id = '.$this->tbl.'.maker_id', 'left', true);
        if($id){
			$this->db->where("$this->tbl.id", $id);
			$query = $this->db->get($this->tbl, 1);
			return $query->row();
		}
	    $this->db->order_by('id','DESC');
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
            $data["body_type_id"] = $body_type_id;
            $data["maker_id"] = $maker_id;
			$data["name"] = $name;
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