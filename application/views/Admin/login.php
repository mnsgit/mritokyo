<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view('Admin/head');?>
	<title><?php echo $this->config->item("SITE_NAME")?></title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><?php echo $title?></h3>
                    </div>
                    <div class="panel-body">
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
                        
                        <form role="form" method="post" action="<?php echo base_url()?>admin/login/authenticate">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control login-username" placeholder="Username" name="email" type="text" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control login-password" placeholder="Password" name="pass" type="password" value="">
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <input type="submit" value="Login" class="btn btn-md btn-success btn-block" >
                                
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<?php $this->load->view('Admin/footer');?>
</html>