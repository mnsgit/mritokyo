<?php
class Account_model extends CI_Model{
	
	var $tbl = 'customers';
	var $tbl_admin = 'admin';
	//var $tbl_files = 'efs_files';
	
	
	function getusers($id = ''){
		if($id){
			$this->db->where('id', $id);
			$query = $this->db->get($this->tbl, 1);
			return $query->row();
		}
		
	    $this->db->select('*');
	    $query = $this->db->get($this->tbl);
		if( $query->num_rows() > 0 ) {
			return $query->result();
		}
		return NULL;
	}
	
	function getfiles($id = ''){
		
		$this->db->select("$this->tbl_files.*".",u.name");
	    $this->db->join("$this->tbl u","u.user_id= $this->tbl_files.user_id", 'left',true);
		
		if($id){
			$this->db->where("$this->tbl_files.id", $id);
			$query = $this->db->get($this->tbl_files, 1);
			return $query->row();
		}
				
	    if($this->session->ses_user_type != "Admin"){
			$this->db->where('u.user_id', $this->session->ses_user_id);
		}
		
	    $query = $this->db->get($this->tbl_files);
		if( $query->num_rows() > 0 ) {
			return $query->result();
		}
		return NULL;
	}
	
	function athenticate($post){
		
		if($post){
			extract($post);
		}
		$sql = "SELECT * FROM `".$this->tbl."` WHERE `username` = '".$email."' AND `password` = '".$pass."' ";
		$query = $this->db->query($sql);
		if( $query->num_rows() > 0 ) {
			return $query->row();
		
		}
		return;
	}
	
	function athenticateAdmin($post){
		
		if($post){
			extract($post);
		}
		$sql = "SELECT * FROM `".$this->tbl_admin."` WHERE `username` = '".$email."' AND `password` = '".md5($pass)."' ";
		$query = $this->db->query($sql);
		if( $query->num_rows() > 0 ) {
			return $query->row();
		
		}
		return;
	}
	
	function getadmin(){
		
		$sql = "SELECT * FROM `".$this->tbl_admin."` WHERE `admin_id` = '".$this->session->ses_user_id."' ";
		$query = $this->db->query($sql);
		if( $query->num_rows() > 0 ) {
			return $query->row();
		
		}
		return;
		
	}
	
	function setadmin($post){
		if($post){
			
			extract($post);
			$data = array();
			$data["admin_details"]				= $Name;
			$data["username"]			= $Username;
			if(trim($Pass) != ""){
				$data["password"]	= md5($Pass);
			}
			$this->db->where('admin_id', $this->session->ses_user_id);
			$this->db->update($this->tbl_admin, $data);
			
		}
	}
	
	function savefile($post){
		if($post){
			extract($post);
			$data = array();
			$data["status"]				= $status;
			$data["org_type"]			= $org_type;
			$data["org"] 				= $org;
			$data["dpt_type"] 			= $dpt_type;
			$data["ir"] 				= $ir;
			$data["dpt"] 				= $dpt;
			$data["file_no"] 			= $file_no;
			$data["file_date"] 			= date("Y-m-d",strtotime($file_date));
			$data["subject"] 			= $subject;
			$data["file_name"] 			= $file_name;
			$data["createdDate"]	= date('Y-m-d H:i:s');
			$data["user_id"] 			= $user_id;
			
			if($id > 0){
				$this->db->where('id', $id);
				$this->db->update($this->tbl_files, $data);
				return $id;
			}else{
				$this->db->insert($this->tbl_files, $data);
				return $this->db->insert_id();
			}
		}
	}
	
	function markreceived($id){
	  if($id > 0){	
		$this->db->where('id', $id);
		$this->db->set("status", "Received");
		$this->db->update($this->tbl_files);
	  }
	}
	
	function deletefile($id){
	  if($id > 0){	
		$this->db->where('id', $id);
		$this->db->delete($this->tbl_files);
	  }
	}
	
	function registration($post){
		
		if($post){
			extract($post);
			$data = array();
			$data["name"]				= $name;
			$data["password"]			= $password;
			$data["emailid"] 			= $emailid;
			$data["contact"] 			= $contact;
			$data["access_code"] 		= $access_code;
			$data["registerationdate"]	= date('Y-m-d H:i:s');
			$data["usertype"] 			= 1;
			
			$this->db->insert($this->tbl, $data);
			return $this->db->insert_id();
		}
			
	}//registration
	
	

}