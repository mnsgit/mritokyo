<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contactus extends CI_Controller {

	
	public function index()
	{
		
		$data  = array();
		$data["title"]  = "Contact Us";
		$data["user_type"]  = $this->session->ses_user_type;
		$this->load->view('page',$data);
	}
}
