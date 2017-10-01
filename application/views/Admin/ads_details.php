<?php
$areaInfo = getArea();
$statusOptions = getStatusOptions();
$approveOptions = getApproveOptions();
?>
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
                    	<div class="pull-left"><h1 class="page-header"><?php echo $title?></h1></div>
                        <div class="pull-right"><h3 class="page-header" style="border-bottom:none"><a href="<?php echo base_url()?>admin/ads" title="Back" ><i class="glyphicon glyphicon-arrow-left text-success"></i></a></h3></div>
                    </div>
                 <!-- /.col-lg-12 -->
                 </div>
                 
				<div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Details: <?php echo ucwords($name)?>
                        </div>
                        <div class="panel-body">
                            <form role="form" method="post" id="frmRegistration" name="frmRegistration" action="<?php echo base_url()?>admin/ads/post">
                            <input type="hidden" id="id" name="id" value="<?php if(isset($property_id)) echo $property_id;?>" />
                            <div class="row">
                                <div class="col-lg-6">
                                    
                                        <div class="form-group">
                                            <label>Name</label>
                                            <?php if(isset($name)) echo $name;?>
                                            <p class="help-block"></p>
                                        </div>
                                        <div class="form-group">
                                            <label>Category</label>
                                            <?php if(isset($cat_name)) echo $cat_name;?>
                                            <p class="help-block"></p>
                                        </div>
                                        <div class="form-group">
                                            <label>Owner</label>
                                            <?php if(isset($owner)) echo $owner;?>
                                            <p class="help-block"></p>
                                        </div>
                                        <div class="form-group">
                                            <label>Area</label>
                                            <?php if(isset($area)) echo $area;?>
                                            <p class="help-block"></p>
                                        </div>
                                        <div class="form-group">
                                            <label>Beds</label>
                                            <?php if(isset($beds)) echo $beds;?>
                                            <p class="help-block"></p>
                                        </div>
                                        <div class="form-group">
                                        <label>Approve?</label>
                                        <?php if(isset($approve)) echo $approve;?>
                                    </div>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                                <div class="col-lg-6">
                                	<div class="form-group">
                                        <label>Sale Price</label>
                                        <?php if(isset($sale_price)) echo number_format($sale_price,2);?> RS
                                        <p class="help-block"></p>
                                    </div>
                                    <div class="form-group">
                                        <label>Address</label>
                                        <?php if(isset($address)) echo $address;?>
                                        <p class="help-block"></p>
                                    </div>
                                    <div class="form-group">
                                        <label>State</label>
                                        <?php if(isset($state)) echo $state;?>
                                    </div>
                                    <div class="form-group">
                                        <label>City</label>
                                        <?php if(isset($city)) echo $city;?>
                                        <p class="help-block"></p>
                                    </div>
                                    <div class="form-group">
                                        <label>Status</label>
                                        <?php if(isset($status)) echo $status;?>
                                    </div>
                                    
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                                <div style="clear:both;"></div>
                                <div class="col-lg-12">
                                	<div class="form-group">
                                        <label>Description</label>
                                        <?php if(isset($description)) echo $description;?>
                                    </div>
                                </div>
                                <div style="clear:both;"></div>
                                    <div class="col-lg-12">
                                    	<iframe
                                          width="600"
                                          height="450"
                                          frameborder="0" style="border:0"
                                          src="https://www.google.com/maps/embed/v1/place?key=AIzaSyBRI-NVNYuTRtj2qWIGldn9Q4aae31MdqI&q=<?php echo urlencode($address.", ".$city.", ".$state.", Pakistan")?>" allowfullscreen>
                                        </iframe>
                                    </div>
                                </div>
                                
                                
                                
                            </div>
                            </form>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
                 
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