<?php
class Ads_model extends CI_Model{
	
	var $tbl	 	= 'property_ads';
	var $tbl_cat 	= 'categories';
	var $tbl_owner 	= 'owners_sellers';
	var $tbl_images	= 'property_images';
	
	function get_all($id = ''){
		
		$this->db->select("$this->tbl.*,$this->tbl_cat.category as cat_name,$this->tbl_owner.name as owner");
		$this->db->join($this->tbl_cat,$this->tbl_cat.'.id = '.$this->tbl.'.category', 'left',true);
		$this->db->join($this->tbl_owner,$this->tbl_owner.'.id = '.$this->tbl.'.owner_id', 'left',true);
		if($id){
			$this->db->where("$this->tbl.property_id", $id);
			$query = $this->db->get($this->tbl, 1);
			return $query->row();
		}
	    $this->db->order_by("$this->tbl.property_id",'DESC');
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
			$data["city"] 		= $city;
			$data["state"]	 	= $state;
			$data["sale_price"]	= $sale_price;
			$data["category"] 	= $category;
			$data["owner_id"] 	= $owner_id;
			$data["status"] 	= $status;
			$data["approve"] 	= $approve;
			$data["area"] 		= $area;
			$data["beds"] 		= $beds;
			$data["description"]= $description;
			
			if($id > 0){
				$this->db->where('property_id', $id);
				$this->db->update($this->tbl, $data);
				return $id;
			}else{
				$this->db->insert($this->tbl, $data);
				return $this->db->insert_id();
			}
		}
	}
	
	function makeprimary($id,$property_id){
		
		$sql = "UPDATE `".$this->tbl_images."` SET image_type = 'G' WHERE property_id = '".$property_id."'";
		$this->db->query($sql);
		
		$sql = "UPDATE `".$this->tbl_images."` SET image_type = 'P' WHERE id = '".$id."' ";
		$this->db->query($sql);
		
	}
	
	function upload($property_id,$image_path){
		
		$data = array();
		$data["property_id"] = $property_id;
		$data["image_path"]  = $image_path;
		$this->db->insert($this->tbl_images, $data);
		
	}
	
	function get_images($property_id, $image_type = ''){
		
		$this->db->where("property_id", $property_id);
		if( trim($image_type) != ""){
			$this->db->where("image_type", $image_type);
		}
	    $this->db->order_by("id",'DESC');
		$query = $this->db->get($this->tbl_images);
		if( $query->num_rows() > 0 ) {
			return $query->result();
		}
		return NULL;
	}
	
	function delimage($id){
	  if($id > 0){	
		
		$this->db->where("$this->tbl_images.id", $id);
		$query = $this->db->get($this->tbl_images, 1);
		if( $query->num_rows() > 0 ) {
			$imag_path = $query->row()->image_path;
			if(trim($imag_path) != ""){
				unlink($_SERVER['DOCUMENT_ROOT']. $this->config->item("ROOT_DIR").$imag_path);
			}
		}
		$this->db->where('id', $id);
		$this->db->delete($this->tbl_images);
		
	  }
	}
	
	
	function del($id){
	  if($id > 0){	
		
		$this->db->where("$this->tbl_images.property_id", $id);
		$query = $this->db->get($this->tbl_images);
		if( $query->num_rows() > 0 ) {
			
			foreach($query->result() as $row)
			{
				$imag_path = $row->image_path;
				if(trim($imag_path) != ""){
					@unlink($_SERVER['DOCUMENT_ROOT']. $this->config->item("ROOT_DIR").$imag_path);
				}
				$this->db->where('id', $row->id);
				$this->db->delete($this->tbl_images);
			}
			
			
		}
		
		$this->db->where('property_id', $id);
		$this->db->delete($this->tbl);
		
	  }
	}
}