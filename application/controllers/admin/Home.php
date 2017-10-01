<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('account_model');
		
		if(!isset($this->session->ses_user_id)){
			$this->session->set_flashdata('error', 'You have to login to proceed!');
			redirect(base_url()."admin/login");
		}
		
	}
	
	public function index()
	{
		$data  = array();
		$data["title"]  	= "Dashboard";
		$this->load->view('Admin/home',$data);
		
	}//index
	
	public function profile(){
		
		$data  = array();
		$data["userinfo"] = $this->account_model->getadmin();
		$data["title"]  	= "Update Profile";
		$this->load->view('Admin/profile',$data);
	}
	
	public function post(){
		echo "<pre>";
		print_r($_POST);
		if($_POST){
			if( $_POST["Pass"] != "" && $_POST["Pass"] != $_POST["Pass_c"] ){
				$this->session->set_flashdata('error', '<strong>Could\'t Update!</strong> Password and Confirm password were not matched.');
				redirect(base_url()."admin/home/profile");
			}else{
				
				$this->account_model->setadmin($_POST);
				$this->session->set_userdata('ses_username', $_POST["Username"]);
				$this->session->set_userdata('ses_name', $_POST["Name"]);
				$this->session->set_flashdata('msg', 'Information updated successfully.');
				redirect(base_url()."admin/home/profile");
			}
		}
		die;
	}
	
}