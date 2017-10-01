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
    	<h2><?php if(isset($title)) echo $title?></h2>
        <p style="text-justify:">
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus eget efficitur tellus. Phasellus vitae odio ac lectus fermentum mattis. In hac habitasse platea dictumst. Fusce ac magna in risus consequat luctus. Quisque suscipit tellus aliquet, dignissim massa ut, dictum ex. Aliquam ullamcorper lacus a bibendum imperdiet. Nullam eu justo nisl. Phasellus pretium id nulla sit amet finibus. Aliquam erat volutpat. Suspendisse eget turpis vitae quam pretium rhoncus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas et consectetur tortor, id consectetur tortor. Fusce placerat consequat lacus. Etiam diam mauris, dignissim vel pretium sit amet, cursus id erat.</p>
        <p style="text-justify:"> <br>

            Cras non diam at tortor scelerisque malesuada. Quisque quis lorem in mi tincidunt efficitur accumsan quis nibh. Nunc erat purus, consectetur nec volutpat in, suscipit eget leo. Curabitur placerat fermentum augue ut gravida. Maecenas dignissim, orci sed sollicitudin tincidunt, enim felis accumsan sapien, in ornare tortor purus at leo. Nulla dapibus elementum nunc, ac cursus mauris dapibus varius. Fusce elementum accumsan elementum. Quisque vitae finibus tellus. Sed cursus gravida nisl, id venenatis erat congue id. Curabitur mollis orci elementum, euismod felis eget, pellentesque lectus.
        </p>
        <p style="text-justify:"><br>

            Interdum et malesuada fames ac ante ipsum primis in faucibus. Nullam sollicitudin ipsum odio, non semper lectus auctor quis. Vestibulum in faucibus ligula, tincidunt ultrices dui. Etiam dignissim dui turpis, quis vestibulum nisl facilisis sed. Ut tempor risus mi, et posuere purus iaculis sit amet. Integer efficitur efficitur scelerisque. Mauris ac ipsum massa. Nulla nec placerat neque. Ut bibendum nunc in scelerisque pulvinar. Aenean eget sem a tortor vehicula faucibus id eu metus. Vestibulum vel auctor elit. Praesent scelerisque condimentum felis, nec rutrum tellus mollis in. Vestibulum ut auctor justo. Proin sed odio nibh.
        </p>
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
