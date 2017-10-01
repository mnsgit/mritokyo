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
        <?php
		if($this->session->flashdata('error')):
		?>
        <div class="alert alert-danger">
        <strong>ERROR:</strong> <?php echo $this->session->flashdata('error')?> 
        </div>
		<?php endif;?>
        <?php
        if($this->session->flashdata('message')):
        ?>
            <div class="alert alert-success">
              <?php echo $this->session->flashdata('message')?>   	 
            </div>
        <?php endif;?>
        <button type="button" class="btn btn-info btn-sm" id="column10_search_p">Pending</button> <button type="button" class="btn btn-info btn-sm" id="column10_search_r">Received</button> <button type="button" class="btn btn-warning btn-sm" id="column10_search_all" style="display:none" >Show All</button>
        
        <table class="table-responsive dtTabale display">
        <thead>
            <tr>
                <th>User</th>
                <th>Internal Receiving</th>
                <th>Date</th>
                <th>Department</th>
                <th>D-Type</th>
                <th>Organization</th>
                <th>Org-Type</th>
                <th>File#</th>
                <th>Subject</th>
                <th>File Name</th>
                <th>Status</th>
                <?php if(isset($user_type) && $user_type == "Admin"){?><th>Actions</th><?php }?> 
                
            </tr>
        </thead>
        <tbody>
        <?php 
            if(count($files) > 0)
            {	
                foreach($files as $row)
                {
         ?> 
            <tr>
                <td><?php echo $row->name ?></td>
                <td><?php echo $row->ir; ?></td>
                <td><?php echo date("d-m-Y",strtotime($row->file_date)); ?></td>
                <td><?php echo $row->dpt; ?></td>
                <td><?php echo $row->dpt_type; ?></td>
                <td><?php echo $row->org; ?></td>
                <td><?php echo $row->org_type; ?></td>
                <td><?php echo $row->file_no; ?></td>
                <td><?php echo $row->subject; ?></td>
                <td><?php echo $row->file_name; ?></td>
                <td>
				   <?php
                    $cls = 'text-success';
					if($row->status == "Pending") $cls = 'text-danger';
				   ?> 
                   <p class="<?php echo $cls?>"><strong><?php echo $row->status; ?></strong></p>
                </td>
                <?php if(isset($user_type) && $user_type == "Admin"){?>  
                <td>
                    <?php
                    if($row->status == "Pending"){
				   ?> 
                    <a href="<?php echo base_url()?>accounts/markreceived/<?php echo $row->id ?>" style="margin:5px;" onClick="if(!window.confirm('Are you sure you want to update its status?')) return false;" class="btn btn-info btn-sm"> Mark Received</a>
                   <?php }?>
                    
                    <a href="<?php echo base_url()?>accounts/deletefile/<?php echo $row->id ?>" style="margin:5px;" onClick="if(!window.confirm('Are you sure you want to delete this file?')) return false;" class="btn btn-default btn-sm"> <i class="glyphicon glyphicon-remove" aria-hidden="true"> </i></a>
                    
                    <a href="<?php echo base_url()?>accounts/addfile/<?php echo $row->id ?>" style="margin:5px;" class="btn btn-default btn-sm"> <i class="glyphicon glyphicon-pencil" aria-hidden="true"> </i></a>
                   
                </td>
                <?php }?> 
            </tr>
        <?php
                }
            }
         ?>    
        </tbody>    
    </table>
     </div>
     
  </div>
</div>
</center>
	<link href="<?php echo base_url();?>assets/css/jquery.dataTables.min.css" rel="stylesheet">
	<!-- Core Script -->
    <script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/jquery.dataTables.min.js"></script>
    
    <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/common.js"></script>
    <script>
    	$(document).ready(function() {
			var oTable = $('.dtTabale').DataTable( {
					
			});
			
			$('#column10_search_p').on( 'click', function () {
				oTable.columns( 10 ).search( "Pending" ).draw();
				$('#column10_search_all').show();
			} );
			
			$('#column10_search_r').on( 'click', function () {
				oTable.columns( 10 ).search( "Received" ).draw();
				$('#column10_search_all').show();
			} );
			
			$('#column10_search_all').on( 'click', function () {
				oTable.columns( 10 ).search( "" ).draw();
				$('#column10_search_all').hide();
			} );
			
			
			
		});
    </script> 
</body>
</html>