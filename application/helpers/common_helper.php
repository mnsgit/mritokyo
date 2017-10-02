<?php
function getArea(){
	$arr = array(
		'Punjab' => array('Lahore','Rawalpindi','Attock','Rawalpindi'),
		'Sindh' =>  array('Karachi','Hyderabad'),
		'KPK' => array('Peshawar','Abbottabad'),
		'Blochistan' => array('Qoeta'),
		'Gilgit Baldistan' => array('Gilgit')
	);
	return $arr;
}//getArea

function getStatusOptions(){
	return array('Available','Sold','Hold');
}//getStatusOptions

function getApproveOptions(){
	return array('Yes','No');
}//getStatusOptions


function get_all_bodytypes(){

    $CI = get_instance();
    $CI->load->model('bodytype_model');
    return $CI->bodytype_model->get_all();
}

function get_all_makers(){

    $CI = get_instance();
    $CI->load->model('maker_model');
    return $CI->maker_model->get_all();
}


function get_all_brands(){

    $CI = get_instance();
    $CI->load->model('brand_model');
    return $CI->brand_model->get_all();
}

