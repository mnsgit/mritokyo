<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        $this->load->model('bodytype_model');
        $this->load->model('maker_model');
		$this->load->model('brand_model');
        $this->load->model('model_model');
		$this->load->helper('common_helper');
		
		if(!isset($this->session->ses_user_id)){
			$this->session->set_flashdata('error', 'You have to login to proceed!');
			redirect(base_url()."admin/login");
		}
		
	}
	
	public function index()
	{
		$data  = array();
		$data["title"] = "Model";
		$data["datalist"] = $this->model_model->get_all();
		$this->load->view('Admin/model',$data);
		
	}//index
	
	public function post(){
		if($_POST){
			$this->model_model->save($_POST);
			
			if($_POST["id"] > 0){
				$this->session->set_flashdata('msg', 'Record updated successfully.');
			}else{
				$this->session->set_flashdata('msg', 'Record added successfully.');
			}
			redirect(base_url()."admin/model");
		}
	}//post
	
	public function edit($id = '')
	{
        if($id > 0){
			$data = $this->model_model->get_all($id);
			echo json_encode($data); 
			die;
		}
	}//edit
	
	public function delete($id = '')
	{
		if($id > 0) {
			$this->model_model->del($id);
		}
	}//delete

    public function get_filter()
    {
        $bt = $this->input->post('bt');
        $mk = $this->input->post('mk');
        $br = $this->input->post('br');
        $brands = $this->brand_model->get_all('', $bt, $mk);
        //print_r($brands);
        //die;
        if (isset($brands))
            echo '<option value="">Select...</option>';
            foreach ($brands as $row) {
                if (isset($br) && $br == $row->id)
                    $sel = 'selected="selected"';
                else
                    $sel = '';
                echo '<option value="'.$row->id.'" '. $sel . ' >'.$row->id.' - '.$row->bodytype_name.' - '.$row->maker_name.' - '.$row->name.'</option>';
            }
    }

}//class