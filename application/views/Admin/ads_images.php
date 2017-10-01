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
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/dropzone.css">
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
                            Uplaod Images
                        </div>
                        <div class="panel-body">
                            <form action="<?php echo base_url();?>admin/ads/upload" enctype="multipart/form-data" class="dropzone" id="image-upload"><input type="hidden" id="id" name="id" value="<?php if(isset($property_id)) echo $property_id;?>" /></form>
                             
                           <div class="row" id="dv_images"></div> 
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
<script src="<?php echo base_url();?>assets/js/dropzone.js"></script>
<script>
	listImages();
	Dropzone.options.imageUpload = {
		addRemoveLinks: true,
		maxFilesize:2,
		acceptedFiles: "image/*",
		maxFiles:10,
		init: function() {
		},
		complete: function(file) {
			$.each(file, function(key, element) {
			});
		},
		success: function(data) {
			listImages()
		},
	}
	
	function listImages(){
		$.ajax({
				type: "GET",
				url:  '<?php echo base_url() ?>admin/ads/get_images/<?php if(isset($property_id)) echo $property_id;?>',
				success: function(data) {
				 	$('#dv_images').html(data);
				},
				error: function() {
						alert('some error occurred');
				},
         	 });
	}
	function remove(id) 
	{
		if (confirm('Are you sure you want to delete this?')) 
		{
			if ( 'undefined' != typeof id ) {
				var url = '<?php echo base_url() ?>admin/ads/delimage/'+id;
				$.get(url, function() {
					$('#dv_'+id).remove();
				}).fail(function() { alert('Unable to fetch data, please try again later.') });
			} else alert('Unknown row id.');
		}
	}
	function makeprimary(id) 
	{
		if (confirm('Are you sure you want to make this image as "Primary"?')) 
		{
			if ( 'undefined' != typeof id ) {
				$.ajax({
					type: "POST",
					url:  '<?php echo base_url() ?>admin/ads/makeprimary',
					data: {'id': id,'property_id': '<?php if(isset($property_id)) echo $property_id;?>'},
					success: function(data) {
						window.location.reload();
					},
					error: function() {
							alert('some error occurred');
					}
				 });
			} else alert('Unknown row id.');
		}
	}
	
</script>
</html>