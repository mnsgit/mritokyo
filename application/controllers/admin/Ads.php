<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ads extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('ads_model');
		$this->load->model('category_model');
		$this->load->model('owners_model');
		$this->load->helper('common_helper');
		
		if(!isset($this->session->ses_user_id)){
			$this->session->set_flashdata('error', 'You have to login to proceed!');
			redirect(base_url()."admin/login");
		}
		
	}
	
	public function index()
	{
		$data  = array();
		$data["title"]  	= "Property Ads";
		$data["datalist"] = $this->ads_model->get_all();
		$this->load->view('Admin/ads',$data);
		
	}//index
	
	public function manage($id = ''){
		
		$data  = array();
		$data["cats"] = $this->category_model->get_all();
		$data["owners"] = $this->owners_model->get_all();
		if( trim($id) == "" ){
			$mode = 'Add New';
		}else{
			$datalist = $this->ads_model->get_all($id);
			if(isset($datalist)){
				foreach($datalist as $key => $val)
				{
					$data[$key] = $val;	
				}
			}
			$mode = 'Edit';
		}
		$data["title"]  = "Property Ads";
		$data["mode"]  	= $mode;
		
		$this->load->view('Admin/ads_manage',$data);
	}
	
	public function details($id){
		
		if(trim($id) == "") redirect(base_url()."admin/ads");
		header('X-Frame-Options: GOFORIT'); 
		$data  = array();
		$datalist = $this->ads_model->get_all($id);
		if(isset($datalist)){
			foreach($datalist as $key => $val)
			{
				$data[$key] = $val;	
			}
		}else{
			redirect(base_url()."admin/ads");
		}
		$data["title"]  = "Property Ads: ".ucwords($data["name"]);
		$this->load->view('Admin/ads_details',$data);
		
	}
	public function get_images($id){
		
		$datalist = $this->ads_model->get_images($id);
		$html = '';
		$i=1;
		if(isset($datalist)){
			foreach($datalist as $row)
			{
				$str = '<a href="javascript: makeprimary('.$row->id.')" >Make Primary</a>';
				if($row->image_type == "P"){
					$str = '<spam class="text-success"><strong>Primary</strong></spam>';
				}
				
				$html .=' <div class="col-md-3" id="dv_'.$row->id.'">
					<div class="thumbnail">
					  <a href="'.base_url().$row->image_path.'" target="_blank">
						<div class="caption">
						  <p style="float:left"><a href="javascript: remove('.$row->id.')" class="btn btn-default btn-sm"> <i class="glyphicon glyphicon-remove" aria-hidden="true"> </i></a></p> 
						  <p style="float:right">'.$str.'</p> 
						</div>
						<img src="'.base_url().$row->image_path.'" alt="Lights" style="width:100%">
					  </a>
					</div>
					</div>';
				
				if($i == 4)	
				$html .= '<div style="clear:both"></div>';
				
				$i++;
			}
		}
		echo $html;
	}
	public function images($id){
		
		if(trim($id) == "") redirect(base_url()."admin/ads");
		 
		$data  = array();
		$datalist = $this->ads_model->get_all($id);
		if(isset($datalist)){
			foreach($datalist as $key => $val)
			{
				$data[$key] = $val;	
			}
		}else{
			redirect(base_url()."admin/ads");
		}
		$data["title"]  = "Property Images: ".ucwords($data["name"]);
		$this->load->view('Admin/ads_images',$data);
		
	}
	
	public function upload(){
		$ds = DIRECTORY_SEPARATOR;  
		$storeFolder = 'uploads';  
		if (!empty($_FILES)) {
			$file_name = time()."_".$_FILES['file']['name'];
			$tempFile = $_FILES['file']['tmp_name'];                       
			$targetPath = $_SERVER['DOCUMENT_ROOT']. $this->config->item("ROOT_DIR"). $storeFolder . $ds;  
			$targetFile =  $targetPath.$ds. $file_name;  
			move_uploaded_file($tempFile,$targetFile); 
			$this->ads_model->upload($_POST["id"],$storeFolder ."/". $file_name);
			echo $storeFolder . $file_name;
			
		}
	}
	
	public function post(){
		if($_POST){
			$this->ads_model->save($_POST);
			
			if($_POST["id"] > 0){
				$this->session->set_flashdata('msg', 'Record updated successfully.');
			}else{
				$this->session->set_flashdata('msg', 'Record added successfully.');
			}
			redirect(base_url()."admin/ads");
		}
	}//post
	
	public function delete($id = '')
	{
		if($id > 0)
		{
			$this->ads_model->del($id);
		}
	}//delete
	
	public function delimage($id = '')
	{
		if($id > 0)
		{
			$this->ads_model->delimage($id);
		}

	}//delimage
	
	public function makeprimary()
	{
		if( isset($_POST) && trim($_POST["id"]) != "" && trim($_POST["property_id"]) != ""  )
		{
			$this->ads_model->makeprimary($_POST["id"],$_POST["property_id"]);
		}

	}//makeprimary
	
	public function getcities()
	{
		$state = $this->input->post('state');
		$city = $this->input->post('city');
		$areaInfo = getArea();
		
		if(isset($areaInfo[$state]))
		 foreach($areaInfo[$state] as $key=>$val){
			if(isset($city) && $city == $val) 
				$sel = 'selected="selected"';
			else
				$sel = '';
			echo '<option value="'.$val.'" '.$sel.' >'.$val.'</option>';	
		 }
		
	}//getcities
	
}//class