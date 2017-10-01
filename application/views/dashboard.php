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
</head>
<body>	
<center>
<div class="container"> 
  <!--<center><h1> e-Filing System  </h1><br />
<h3>bc130402493</h3></center>-->
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
    	<h2>Welcome to e-Filing System.</h2>
     </div>
    <!-- END DEFAULT DATATABLE --> 
  </div>
</div>

</center>
	<!-- Core Script -->
    <script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/plugins/datatables/jquery.dataTables.min.js"></script>
    
    <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/common.js"></script>
    <script>
    	$(document).ready(function() {
			//$('#myModal').modal('show');
		});
    </script> 
</body>
</html>
