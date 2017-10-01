<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categories extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		$this->load->model('category_model');
		$this->load->helper('common_helper');
		
		if(!isset($this->session->ses_user_id)){
			$this->session->set_flashdata('error', 'You have to login to proceed!');
			redirect(base_url()."admin/login");
		}
		
	}
	
	public function index()
	{
		$data  = array();
		$data["title"]  	= "Categories";
		$data["datalist"] = $this->category_model->get_all();
		$this->load->view('Admin/categories',$data);
		
	}//index
	
	public function post(){
		if($_POST){
			$this->category_model->save($_POST);
			
			if($_POST["id"] > 0){
				$this->session->set_flashdata('msg', 'Record updated successfully.');
			}else{
				$this->session->set_flashdata('msg', 'Record added successfully.');
			}
			redirect(base_url()."admin/categories");
		}
	}//post
	
	public function edit($id = '')
	{
		if($id > 0)
		{
			$data = $this->category_model->get_all($id);
			echo json_encode($data); 
			die;
		}
	}//edit
	
	public function delete($id = '')
	{
		if($id > 0)
		{
			$this->category_model->del($id);
		}
	}//delete
	
}//class