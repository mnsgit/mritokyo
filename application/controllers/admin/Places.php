<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Places extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		$this->load->model('ads_model');
		$this->load->model('places_model');
		$this->load->helper('common_helper');
		
		if(!isset($this->session->ses_user_id)){
			$this->session->set_flashdata('error', 'You have to login to proceed!');
			redirect(base_url()."admin/login");
		}
		
	}
	
	public function index($property_id)
	{
		if(trim($property_id) == "") redirect(base_url()."admin/ads");
		$data  = array();
		$datalist = $this->ads_model->get_all($property_id);
		if(isset($datalist)){
			foreach($datalist as $key => $val)
			{
				$data[$key] = $val;	
			}
		}
		$data["title"]  	= "Important Places: ".$data["name"];
		$data["datalist"] = $this->places_model->get_all($property_id);
		$this->load->view('Admin/places',$data);
		
	}//index
	
	public function post(){
		if($_POST){
			$this->places_model->save($_POST);
			
			if($_POST["id"] > 0){
				$this->session->set_flashdata('msg', 'Record updated successfully.');
			}else{
				$this->session->set_flashdata('msg', 'Record added successfully.');
			}
			redirect(base_url()."admin/places/index/".$_POST["property_id"]);
		}
	}//post
	
	public function edit($id = '')
	{
		if($id > 0)
		{
			$data = $this->places_model->get_all('',$id);
			echo json_encode($data); 
			die;
		}
	}//edit
	
	public function delete($id = '')
	{
		if($id > 0)
		{
			$this->places_model->del($id);
		}
	}//delete
	
}//class