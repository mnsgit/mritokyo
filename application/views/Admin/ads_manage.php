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
                            <?php echo $mode?>
                        </div>
                        <div class="panel-body">
                            <form role="form" method="post" id="frmRegistration" name="frmRegistration" action="<?php echo base_url()?>admin/ads/post">
                            <input type="hidden" id="id" name="id" value="<?php if(isset($property_id)) echo $property_id;?>" />
                            <div class="row">
                                <div class="col-lg-6">
                                    
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input class="form-control" id="name" name="name" type="text" value="<?php if(isset($name)) echo $name;?>" required >
                                            <p class="help-block"></p>
                                        </div>
                                        <div class="form-group">
                                            <label>Category</label>
                                            <select class="form-control" id="category" name="category" required >
                                            	<?php
                                                 if(isset($cats))
												 foreach($cats as $row){
													if(isset($category) && $category == $row->id) 
														$sel = 'selected="selected"';
													else
														$sel = '';	
													echo '<option value="'.$row->id.'" '.$sel.' >'.$row->category.'</option>';	
												 }
												?>
                                            </select>
                                            <p class="help-block"></p>
                                        </div>
                                        <div class="form-group">
                                            <label>Owner</label>
                                            <select class="form-control" id="owner_id" name="owner_id" required >
                                            	<?php
                                                 if(isset($owners))
												 foreach($owners as $row){
													if(isset($owner_id) && $owner_id == $row->id) 
														$sel = 'selected="selected"';
													else
														$sel = '';	
													echo '<option value="'.$row->id.'" '.$sel.' >'.$row->name.'</option>';	
												 }
												?>
                                            </select>
                                            <p class="help-block"></p>
                                        </div>
                                        <div class="form-group">
                                            <label>Area</label>
                                            <input class="form-control" id="area" name="area" type="text" value="<?php if(isset($area)) echo $area;?>" required >
                                            <p class="help-block"></p>
                                        </div>
                                        <div class="form-group">
                                            <label>Beds</label>
                                            <input class="form-control" id="beds" name="beds" type="number" value="<?php if(isset($beds)) echo $beds;?>" required >
                                            <p class="help-block"></p>
                                        </div>
                                        <div class="form-group">
                                        <label>Approve?</label>
                                        <select class="form-control" id="approve" name="approve" required>
                                            <?php
                                             if(isset($approveOptions))
                                             foreach($approveOptions as $val){
                                                if(isset($approve) && $approve == $val) 
													$sel = 'selected="selected"';
												else
													$sel = '';
												echo '<option value="'.$val.'" '.$sel.'>'.$val.'</option>';	
                                             }
                                            ?>
                                            
                                        </select>
                                    </div>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                                <div class="col-lg-6">
                                	<div class="form-group">
                                        <label>Sale Price</label>
                                        <input class="form-control" id="sale_price" name="sale_price" type="number" value="<?php if(isset($sale_price)) echo $sale_price;?>" required >
                                        <p class="help-block"></p>
                                    </div>
                                    <div class="form-group">
                                        <label>Address</label>
                                        <input class="form-control" id="address" name="address" type="text" value="<?php if(isset($address)) echo $address;?>" required >
                                        <p class="help-block"></p>
                                    </div>
                                    <div class="form-group">
                                        <label>State</label>
                                        <select class="form-control" id="state" name="state" onChange="myfunction(this.value);" required>
                                            <?php
                                             if(isset($areaInfo))
                                             foreach($areaInfo as $key=>$val){
                                                if(isset($state) && $state == $key) 
													$sel = 'selected="selected"';
												else
													$sel = '';
												echo '<option value="'.$key.'" '.$sel.' >'.$key.'</option>';	
                                             }
                                            ?>
                                            
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>City</label>
                                        <select class="form-control" id="city" name="city" required >
                                        </select>
                                        <p class="help-block"></p>
                                    </div>
                                    <div class="form-group">
                                        <label>Status</label>
                                        <select class="form-control" id="status" name="status" required>
                                            <?php
                                             if(isset($statusOptions))
                                             foreach($statusOptions as $val){
												if(isset($status) && $status == $val) 
													$sel = 'selected="selected"';
												else
													$sel = '';
                                                echo '<option value="'.$val.'" '.$sel.' >'.$val.'</option>';	
                                             }
                                            ?>
                                            
                                        </select>
                                    </div>
                                    
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                                <div style="clear:both;"></div>
                                <div class="col-lg-12">
                                	<div class="form-group">
                                        <label>Description</label>
                                        <textarea class="form-control" id="description" name="description" rows="3"><?php if(isset($description)) echo $description;?></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-success">- Submit -</button>
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
<script type="text/javascript" src="<?php echo base_url(); ?>assets/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/ckeditor/config.js?t=<?php echo time()?>"></script>
<script>
	$(document).ready(function(){
		var oTable = $('.dtTabale').DataTable( {});
		CKEDITOR.replace( 'description',
		{
			toolbar : 'Basic', /* this does the magic */
		});
		<?php if(isset($state)) echo 'myfunction(\''.$state.'\');'; else echo 'myfunction(\'Punjab\');';?>
		
	});
	function myfunction(state) 
	{
		if(state)
		{
        	$.ajax({
				type: "POST",
				url:  '<?php echo base_url() ?>admin/ads/getcities',
				data: {'state': state,'city': '<?php if(isset($city)) echo $city;?>'},
				success: function(data) {
				 	$('#city').html(data);
				},
				error: function() {
						alert('some error occurred');
					},
         	 });
		}
	}
</script>		
</html>