<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view('Admin/head');?>
	<title><?php echo $this->config->item("SITE_NAME")?></title>
</head>
<body>
    <div id="wrapper">
        <!-- Navigation -->
        <?php $this->load->view('Admin/top');?>
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header"><?php echo $title?></h1>
                        <?php
                        if($this->session->flashdata('msg')){
						?>
                        <div class="alert alert-success">
                           <?php echo $this->session->flashdata('msg');?>    
                        </div>
                        <?php }?>
                        
                        <?php
                        if($this->session->flashdata('error')){
						?>
                        <div class="alert alert-danger">
                           <?php echo $this->session->flashdata('error');?>    
                        </div>
                        <?php }?>
                        <div class="row">
                        	<div class="col-lg-6">
                            	<form role="form" method="POST" action="<?php echo base_url()?>admin/home/post">
                                    <div class="form-group">
                                        <label class="control-label" for="Name">Name</label>
                                        <input value="<?php if(isset($userinfo)) echo $userinfo->admin_details?>" type="text" required class="form-control" id="Name" name="Name">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label" for="Username">Username</label>
                                        <input value="<?php if(isset($userinfo)) echo $userinfo->username?>" type="text" required class="form-control" id="Username" name="Username">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label" for="Pass">Password</label>
                                        <input value="" type="password" class="form-control" id="Pass" name="Pass">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label" for="Pass_c">Confirm Password</label>
                                        <input value="" type="password" class="form-control" id="Pass_c" name="Pass_c">
                                    </div>
                                    <button type="submit" class="btn btn-deault">Update</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
    </div>
</body>
<?php $this->load->view('Admin/footer');?>
</html>