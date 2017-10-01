<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title><?php if(isset($title)) echo $title?></title>
    
    <link rel="icon" href="../../favicon.ico">
    <title><?php if(isset($title)) echo $title?> :. MC060400692</title>
    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="<?php echo base_url();?>assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="<?php echo base_url();?>assets/css/custom.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    
    <link href="<?php echo base_url();?>assets/js/jquery.datetimepicker.min.css" rel="stylesheet">
</head>
<body>	
<center>
<div class="container"> 
  <div style="overflow:hidden; border-top:none;" class="panel panel-default">
  <div style="width:100%; height:80px; background:#000;"></div>
  <div class="header-bar">
        <div class="col-sm-1 site-logo"><a href="<?php echo base_url()?>/accounts/dashboard"><img src="<?php echo base_url()?>assets/images/site-logo.jpg"></a></div>
        <div class="col-sm-8 main-menu">
          <ul>
            <?php 
			 if(isset($user_type) && $user_type == "Admin"){
				echo '<li><a href="'.base_url().'accounts/addfile">add file record</a></li>';	
			 }
			?>
            
            <li><a href="<?php echo base_url()?>accounts/files">show file record</a></li>
            <li><a href="<?php echo base_url()?>aboutus">about us</a></li>
            <li><a href="<?php echo base_url()?>contactus">contact us</a></li>
          </ul>
        </div>
        <div class="col-sm-1 pull-right logout">
          <a style="color:#82807d;" href="<?php echo base_url()?>accounts/logout"><img src="<?php echo base_url()?>assets/images/logout-icon.png"> Logout</a>
        </div>
      </div>
      <div class="panel-body" style="min-height:450px;">
    	<h2 style="border-bottom: dashed #666666 1px; padding-bottom:5px; " ><?php if(isset($title)) echo $title?></h2>
        <div class="row" style="margin-top:15px;" >
                    <div class="col-md-6 col-md-offset-3" >
                        
                        <form role="form" class="form-horizontal" id="frmAddFile" name="frmAddFile" action="<?php echo base_url()?>accounts/postfile" method="post">
                                <input type="hidden" name="id" value="<?php if(isset($id)) echo $id?>" id="id" />
                                <div class="form-group">
                                    <label for="email" class="col-sm-4 control-label">
                                        Associated User:</label>
                                    <div class="col-sm-8">
                                        <select class="form-control" name="user_id" id="user_id" required>
                                            <?php
                                             if(isset($users))
											 foreach($users as $row){
												$sel = '';
												if(isset($user_id) && $user_id == $row->user_id) $sel = 'selected="selected"';  
											  echo '<option value="'.$row->user_id.'" '.$sel.' >'.$row->name.'</option>';
											 }
											?>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label for="email" class="col-sm-4 control-label">
                                        Internal Receiving:</label>
                                    <div class="col-sm-8">
                                        <select class="form-control" name="ir" id="ir" required>
                                            <option value="" >Select Option</option>
                                            <?php
                                             if(isset($FileDate["ir"]))
											 foreach($FileDate["ir"] as $rec){
												$sel = '';
												if(isset($ir) && $ir == $rec) $sel = 'selected="selected"';  
											    echo '<option value="'.$rec.'"'.$sel.' >'.$rec.'</option>';
											 }
											?>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label for="email" class="col-sm-4 control-label">
                                        Department: </label>
                                    <div class="col-sm-8">
                                        <select class="form-control" name="dpt" id="dpt" required>
                                            <option value="" >Select Option</option>
                                            <?php
                                             if(isset($FileDate["dpt"]))
											 foreach($FileDate["dpt"] as $rec){
											    $sel = '';
												if(isset($dpt) && $dpt == $rec) $sel = 'selected="selected"';  
											    echo '<option value="'.$rec.'"'.$sel.' >'.$rec.'</option>';
											 }
											?>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label for="email" class="col-sm-4 control-label">
                                        Department Type: </label>
                                    <div class="col-sm-8">
                                        <select class="form-control" name="dpt_type" id="dpt_type" required>
                                            <option value="" >Select Option</option>
                                            <?php
                                             if(isset($FileDate["dpt_type"]))
											 foreach($FileDate["dpt_type"] as $rec){
											  	$sel = '';
												if(isset($dpt_type) && $dpt_type == $rec) $sel = 'selected="selected"';  
											    echo '<option value="'.$rec.'"'.$sel.' >'.$rec.'</option>';
											 }
											?>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label for="email" class="col-sm-4 control-label">
                                        Organization: </label>
                                    <div class="col-sm-8">
                                        <select class="form-control" name="org" id="org" required>
                                            <option value="" >Select Option</option>
                                            <?php
                                             if(isset($FileDate["org"]))
											 foreach($FileDate["org"] as $rec){
											  	$sel = '';
												if(isset($org) && $org == $rec) $sel = 'selected="selected"';  
											    echo '<option value="'.$rec.'"'.$sel.' >'.$rec.'</option>';
											 }
											?>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label for="email" class="col-sm-4 control-label">
                                        Organization Type: </label>
                                    <div class="col-sm-8">
                                        <select class="form-control" name="org_type" id="org_type" required>
                                            <option value="" >Select Option</option>
                                            <?php
                                             if(isset($FileDate["org_type"]))
											 foreach($FileDate["org_type"] as $rec){
											  	$sel = '';
												if(isset($org_type) && $org_type == $rec) $sel = 'selected="selected"';  
											    echo '<option value="'.$rec.'"'.$sel.' >'.$rec.'</option>';
											 }
											?>
                                        </select>
                                    </div>
                                </div>
                                
                                
                                <div class="form-group">
                                    <label for="exampleInputPassword1" class="col-sm-4 control-label">
                                        File # :</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="file_no" class="form-control" id="file_no" placeholder="Enter File Number" required value="<?php if(isset($file_no)) echo $file_no?>" />
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label for="exampleInputPassword1" class="col-sm-4 control-label">
                                        Date: </label>
                                    <div class="col-sm-8">
                                        <input type="text" name="file_date" class="form-control dtpicker" id="file_date" placeholder="e.g d-m-y" required value="<?php if(isset($file_date)) echo date("d-m-Y",strtotime($file_date))?>" />
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label for="exampleInputPassword1" class="col-sm-4 control-label">
                                        Subject :</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="subject" class="form-control" id="subject" placeholder="Enter File Subject" required value="<?php if(isset($subject)) echo $subject?>" />
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label for="exampleInputPassword1" class="col-sm-4 control-label">
                                        File Name :</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="file_name" class="form-control" id="file_name" placeholder="Enter File Name" required value="<?php if(isset($file_name)) echo $file_name?>" />
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label for="email" class="col-sm-4 control-label">
                                        Status: </label>
                                    <div class="col-sm-8">
                                        <select class="form-control" name="status" id="status" required >
                                            <?php
                                             if(isset($FileDate["status"]))
											 foreach($FileDate["status"] as $rec){
											  	$sel = '';
												if(isset($status) && $status == $rec) $sel = 'selected="selected"';  
											    echo '<option value="'.$rec.'"'.$sel.' >'.$rec.'</option>';
											 }
											?>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-sm-2">
                                    </div>
                                    <div class="col-sm-8">
                                        <button type="submit" class="btn btn-primary btn-sm" ><i class="glyphicon glyphicon-ok-sign" aria-hidden="true"></i> Submit</button>
                                        <button type="reset" class="btn btn-danger btn-sm"><i class="glyphicon glyphicon-refresh" aria-hidden="true"> </i> Reset</button>
                                    </div>
                                </div>
                                </form>
                        
                        
                    </div>
                    
                </div>
     </div>
    <!-- END DEFAULT DATATABLE --> 
  </div>
</div>

</center>
	<!-- Core Script -->
    <script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/jquery.datetimepicker.full.min.js"></script>
    
    <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/common.js"></script>
    <script>
    	$(document).ready(function() {
		
			$(".dtpicker").datetimepicker({
				format: "d-m-Y",
				timepicker:false,
			});

		});
    </script> 
</body>
</html>
