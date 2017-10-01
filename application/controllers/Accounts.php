<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Accounts extends CI_Controller {

	public function __construct()
	{
		parent::__construct();	
		$this->load->model('account_model');
	}
	
	public function index()
	{
		
		echo ":)";
	}//index
	
	public function authenticate(){
		if($_POST){
			
			$userinfo = $this->account_model->athenticate($_POST);
			
			if(!$userinfo || empty($userinfo)){
				echo 'Error-1';
			}else{
				
				$this->session->set_userdata('ses_emailid', $userinfo->emailid);
				$this->session->set_userdata('ses_name', $userinfo->name);
				 
				if($_POST["admin"] == "1"){
				 $this->session->set_userdata('ses_user_type',	"Admin");
				 $this->session->set_userdata('ses_user_id',	$userinfo->id);
				}else{
				 $this->session->set_userdata('ses_user_id',	$userinfo->user_id);	
				 $this->session->set_userdata('ses_user_type',	"User");
				}
				echo 'Success';
			}
			
			
		}
	}//authenticate
	
	
	public function registration(){
		if($_POST){
			
			if($_POST["access_code"] != "VU-Test-Phase" ){
				echo 'Error-1';
				die;
			}
			$userid = $this->account_model->registration($_POST);
			
			if(!$userid || empty($userid)){
				echo 'Error-2';
			}else{
				$this->session->set_userdata('ses_emailid', $_POST["emailid"]);
				$this->session->set_userdata('ses_name', 	$_POST["name"]);
				$this->session->set_userdata('ses_user_id',		$userid);
				$this->session->set_userdata('ses_user_type',	"User");
				echo 'Success';
			}
			
		}
	}//registration
	
	public function logout(){
		
		$this->session->unset_userdata('ses_emailid');
		$this->session->unset_userdata('ses_name');
		$this->session->unset_userdata('ses_user_id');
		$this->session->unset_userdata('ses_company_id');
		$this->session->unset_userdata('ses_user_type');
		$this->session->set_flashdata('message', 'You have successfully logout!');
		redirect(base_url());
	}
	
	public function dashboard(){
		
		$this->validate();
		
		$data  = array();
		$data["title"]  	= "e-Filing System";
		$data["user_type"]  = $this->session->ses_user_type;
		
		$this->load->view('dashboard',$data);
	}//dashboard
	
	public function files(){
		$this->validate();
		
		$data  = array();
		$data["title"]  	= "Show File Record(s)";
		$data["user_type"]  = $this->session->ses_user_type;
		$data["files"] = $this->account_model->getfiles();
		$this->load->view('files',$data);
	}
	
	public function addfile($id=''){
		
		$this->validate();
		
		if($this->session->ses_user_type != "Admin"){
			$this->session->set_flashdata('error', "You don't have access to that page");
			redirect(base_url()."accounts/files");
		}
		/**/
		$FileDate = array(
			'ir' => array('DSS','SSS','RSS','XSS'),
			'dpt' => array('P&D','PPRA','RFF'),
			'dpt_type' => array('Chairman','Chief','Sectory'),
			'org' => array('DPI(SE/EE)','CEO','DC'),
			'org_type' => array('RWP','BWP','LHR','ISB'),
			'status' => array('Pending','Received'),
		);
		/**/
		
		$data  = array();
		$data["FileDate"] = $FileDate;
		
		if($id > 0) {
			$mod = "Edit"; 
			$data["list"]	= $this->account_model->getfiles($id);
			if($data["list"])
			foreach($data["list"] as $key => $val){
				$data[$key] = $val;
			}
		}else{
			$mod = "Add";
			$data["list"]	= '';
		}
		
		
		$data["users"] = $this->account_model->getusers();
		$data["title"]  	= $mod." File Record";
		$data["user_type"]  = $this->session->ses_user_type;
		
		$this->load->view('addfile',$data);
	}//dashboard
	
	public function postfile(){
		
		$this->validate();
		
		if($_POST){
			$this->account_model->savefile($_POST);
		}
		$this->session->set_flashdata('message', 'New File Added Successfully!');
		redirect(base_url()."accounts/files");
	}
	
	public function markreceived($id){
		
		$this->validate();
		
		if( intval($id) > 0 ){
			$this->account_model->markreceived($id);
		}
		$this->session->set_flashdata('message', 'File Marked as Received Successfully!');
		redirect(base_url()."accounts/files");
	}
	
	public function deletefile($id){
		
		$this->validate();
		
		if( intval($id) > 0 ){
			$this->account_model->deletefile($id);
		}
		$this->session->set_flashdata('message', 'File Deleted Successfully!');
		redirect(base_url()."accounts/files");
	}
	
	private function validate(){
		if(!isset($this->session->ses_user_id)){
			$this->session->set_flashdata('error', 'You have to login to proceed!');
			redirect(base_url());
		}
	}//validate
	
}
