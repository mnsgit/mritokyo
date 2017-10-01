<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<?php $this->load->view('_head');?>
	<title><?php if(isset($title)) echo $title?></title>
</head>
<body>
<div class="container">
      <div class="page-header">
       	<div class="row">
            <div class="col-sm-3">
                <a href="<?php echo base_url()?>home"><img src="<?php echo base_url()?>assets/images/site-logo.png" width="270" title="<?php echo $this->config->item("SITE_NAME")?>"  /></a>
            </div>
            <div class="col-sm-5" style="text-align:center !important">
               <div class="sub_nav">
                <span>
                    <span class="buy_hdw">&nbsp;</span>
                </span>	
                 <a title="HOMES" class="htb_sel frst_child l" href="https://www.zameen.com/">HOMES</a>
                 <a title="PLOTS" class="l" href="https://www.zameen.com/plots.html">PLOTS</a>
                 <a title="COMMERCIAL" class="l" href="https://www.zameen.com/commercial.html">COMMERCIAL</a>  
               </div>   
            </div>
            <div class="col-sm-2" style="text-align:right">
            	<a href="<?php echo base_url()?>admin/ads/manage" title="Add New" class="btn btn-default btn-md " ><i class="glyphicon glyphicon-user"></i> Login</a>
            </div>
            <div class="col-sm-2" style="text-align:right">
            <h3><a href="<?php echo base_url()?>admin/ads/manage" title="Add New" class="btn btn-default btn-md " ><i class="glyphicon glyphicon-plus-sign"></i> Add Property</a></h3>
            </div>
        </div>
      </div>
     <div class="row">
     asas
     </div> 
      
      
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
      <p class="lead" >
      	<h3 style="text-align:center" > <a href="javascript:;" onClick="userLogin();"  ><span class="glyphicon glyphicon-log-in"></span> Login</a> <a href="javascript:;" data-toggle="modal" data-target="#regiterModal" style="margin-left:20px;"><span class="glyphicon glyphicon-user"></span> Register</a></h3>
        
      </p>
      <p style="margin-top:30px; text-align:center">Admin User <a href="javascript:;" onClick="adminLogin();">click here</a> to login.</p>
</div>

<!-- LOGIN MODLE -->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    ×</button>
                <h4 class="modal-title" id="myModalLabel">
                    Login </h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-10">
                        
                        <form role="form" class="form-horizontal" id="frmLogin" name="frmLogin">
                                <input type="hidden" name="admin" value="" id="admin" />
                                <div class="form-group">
                                    <label for="email" class="col-sm-2 control-label">
                                        Username</label>
                                    <div class="col-sm-8">
                                        <input type="email" name="emailid" class="form-control" required id="emailid" placeholder="Enter username" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1" class="col-sm-2 control-label">
                                        Password</label>
                                    <div class="col-sm-8">
                                        <input type="password" name="password" class="form-control" id="password" placeholder="Enter password" required />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-2">
                                    </div>
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-primary btn-sm" ><i class="glyphicon glyphicon-ok-sign" aria-hidden="true"></i> Submit</button>
                                        <button type="reset" class="btn btn-danger btn-sm"><i class="glyphicon glyphicon-refresh" aria-hidden="true"> </i> Reset</button>
                                    </div>
                                </div>
                                </form>
                        
                        
                    </div>
                    
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><i class="glyphicon glyphicon-remove-circle" aria-hidden="true"> </i> Close</button>
            </div>
        </div>
    </div>
</div>
<!-- REGISTER MODLE -->
<div class="modal fade" id="regiterModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    ×</button>
                <h4 class="modal-title" id="myModalLabel">
                    Registration </h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-10">
                        
                        <form role="form" class="form-horizontal" id="frmRegistration" name="frmRegistration">
                                <div class="form-group">
                                    <label for="email" class="col-sm-3 control-label">
                                        Username</label>
                                    <div class="col-sm-7">
                                        <input type="email" name="emailid_r" class="form-control" required id="emailid_r" placeholder="Enter Username (Email)" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="email" class="col-sm-3 control-label">
                                        Full Name</label>
                                    <div class="col-sm-7">
                                        <input type="text" name="name" class="form-control" required id="name" placeholder="Enter Full Name" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="email" class="col-sm-3 control-label">
                                        Contact Info</label>
                                    <div class="col-sm-7">
                                        <input type="text" name="contact" class="form-control" required id="contact" placeholder="Enter Contact Info" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1" class="col-sm-3 control-label">
                                        Password</label>
                                    <div class="col-sm-7">
                                        <input type="password" class="form-control" required id="password_r" name="password_r" placeholder="Enter Password" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="email" class="col-sm-3 control-label">
                                        Access Code</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" id="access_code" required placeholder="Enter Access Code" name="access_code" />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3">
                                    </div>
                                    <div class="col-sm-9">
                                        <button type="submit" class="btn btn-primary btn-sm" ><i class="glyphicon glyphicon-ok-sign" aria-hidden="true"></i> Submit</button>
                                        <button type="reset" class="btn btn-danger btn-sm"><i class="glyphicon glyphicon-refresh" aria-hidden="true"> </i> Reset</button>
                                    </div>
                                </div>
                                </form>
                        
                        
                    </div>
                    
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><i class="glyphicon glyphicon-remove-circle" aria-hidden="true"> </i> Close</button>
            </div>
        </div>
    </div>
</div>


	<!-- Core Script -->
    <script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
   
    <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/common.js"></script>
    <script>
		
		function adminLogin(){
			$('#admin').val("1");
			$('#loginModal').modal('show');
		}
		
		function userLogin(){
			$('#admin').val("");
			$('#loginModal').modal('show');
		}
		
		$("#frmLogin").submit(function(event){
			// cancels the form submission
			event.preventDefault();
			// Initiate Variables With Form Content
			var emailid = $("#emailid").val();
			var password = $("#password").val();
		    var admin = $("#admin").val();
			$.ajax({
				type: "POST",
				url: "<?php echo base_url();?>accounts/authenticate",
				data: "emailid=" + emailid + "&password=" + password+ "&admin=" + admin,
				success : function(res){
					if(res == 'Success'){
						window.location = '<?php echo base_url();?>accounts/dashboard'
					}else{
						alert('Invalid Username or Password:\nSystem unable to verify the provided information. Please try again.');
					}
				}
			});
		});
		
		$("#frmRegistration").submit(function(event){
			// cancels the form submission
			event.preventDefault();
			// Initiate Variables With Form Content
			var emailid = $("#emailid_r").val();
			var name 	= $("#name").val();
			var contact = $("#contact").val();
			var access_code = $("#access_code").val();
			var password = $("#password_r").val();
		 
			$.ajax({
				type: "POST",
				url: "<?php echo base_url();?>accounts/registration",
				data: "emailid=" + emailid + "&name=" + name + "&contact=" + contact + "&access_code=" + access_code + "&password=" + password,
				success : function(res){
					if(res == 'Success'){
						window.location = '<?php echo base_url();?>accounts/dashboard'
					}else if(res == 'Error-1'){
						alert('Invalid Access Code:\nSystem unable to verify the provided access code. Please try again.');
					}else{
						alert('Unbale to process your request, please try later.');
					}
				}
			});
		});
    </script>
    
</body>
</html>