<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aboutus extends CI_Controller {

	
	public function index()
	{
		
		//phpinfo();
		$data  = array();
		$data["title"]  = "About Us";
		$data["user_type"]  = $this->session->ses_user_type;
		$this->load->view('page',$data);
	}
}
