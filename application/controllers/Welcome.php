<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	
	public function index()
	{
		
		//phpinfo();
		$data  = array();
		$data["title"]  = "e-Filing System";
		
		$this->load->view('index',$data);
	}
}
