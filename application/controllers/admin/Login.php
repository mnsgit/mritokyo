<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();	
		$this->load->model('account_model');
	}
	
	public function index()
	{
		$data  = array();
		$data["title"]  	= "Admin Login";
		$this->load->view('Admin/login',$data);
		
	}//index
	
	public function authenticate(){
		if($_POST){
			
			$userinfo = $this->account_model->athenticateAdmin($_POST);
			
			if(!$userinfo || empty($userinfo)){
				$this->session->set_flashdata('error', 'Invalid Username or Password.');
				redirect(base_url()."admin/login");
			}else{
				 $this->session->set_userdata('ses_username', $userinfo->username);
				 $this->session->set_userdata('ses_name', $userinfo->admin_details);
				 $this->session->set_userdata('ses_user_id',	$userinfo->admin_id);
				 redirect(base_url()."admin/home");
			}
			
			
		}
	}//authenticate
	
	public function logout(){
		
		$this->session->unset_userdata('ses_username');
		$this->session->unset_userdata('ses_name');
		$this->session->unset_userdata('ses_user_id');
		$this->session->set_flashdata('msg', 'You have successfully logged out.');
		redirect(base_url()."admin/login");
	}
	
}
