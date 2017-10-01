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
                        <div class="pull-right"><h3 class="page-header" style="border-bottom:none"><a href="<?php echo base_url()?>admin/ads/manage" title="Add New" ><i class="glyphicon glyphicon-plus-sign text-success"></i></a></h3></div>
                        </div>
                        
                        <table class="table-responsive dtTabale display">
                        <thead>
                            <tr>
                                <th>Sr. #</th>
                                <th>Name</th>
                                <th>Type</th>
                                <th>Address</th>
                                <th>Price</th>
                                <th>Approve?</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                         <?php 
                            if(isset($datalist))
                            {	
                                $i=1;
							    foreach($datalist as $row)
                                {
                         ?> 
                            <tr id="row-<?php echo $row->property_id; ?>">
                                <td><?php echo $i++?></td>
                                <td><?php echo ucwords($row->name) ?><br>
                                <em style="font-size:11px">by <?php echo $row->owner ?></em>
                                <?php
								$cls = 'text-info';
								if($row->status == "Hold") $cls = 'text-danger';
								if($row->status == "Sold") $cls = 'text-success';
							    ?> 
							    <em style="font-size:12px" class="<?php echo $cls?>"><br>Status: <strong><?php echo $row->status; ?></strong></em>
                                </td>
                                <td><?php echo $row->cat_name ?></td>
                                <td><?php echo $row->address ?><br>
                                <em style="font-size:11px"><?php echo $row->state ?>, <?php echo $row->city ?></em>
                                </td>
                                <td style="text-align:center"><?php echo number_format($row->sale_price,2) ?></td>
                                <td style="text-align:center">
								<?php
								$cls = 'text-success';
								if($row->approve == "No") $cls = 'text-danger';
							    ?> 
							    <p class="<?php echo $cls?>"><strong><?php echo $row->approve; ?></strong></p>
								</td>
                                <td>
                                    <a href="<?php echo base_url()?>admin/ads/images/<?php  echo $row->property_id; ?>"  title="Property Images" class="btn btn-default btn-sm"> <i class="glyphicon glyphicon-picture" aria-hidden="true"> </i></a>
                                    <a href="<?php echo base_url()?>admin/ads/details/<?php  echo $row->property_id; ?>"  title="View Detail" class="btn btn-default btn-sm"> <i class="glyphicon glyphicon-eye-open" aria-hidden="true"> </i></a>
                                    <a href="<?php echo base_url()?>admin/places/index/<?php  echo $row->property_id; ?>"  title="Important Places" class="btn btn-default btn-sm"> <i class="glyphicon glyphicon-map-marker" aria-hidden="true"> </i></a>
                                    <a href="javascript:remove('<?php  echo $row->property_id; ?>');"  class="btn btn-default btn-sm"> <i class="glyphicon glyphicon-remove" aria-hidden="true"> </i></a>
                                    <a href="<?php echo base_url()?>admin/ads/manage/<?php  echo $row->property_id; ?>"  class="btn btn-default btn-sm"> <i class="glyphicon glyphicon-pencil" aria-hidden="true"> </i></a>
                                   
                                </td> 
                            </tr>
                        <?php
                                }
                            }
                         ?>    
                        </tbody>    
                    </table>
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
<script>
	$(document).ready(function(){
		var oTable = $('.dtTabale').DataTable( {});
	});
	function remove(id) 
	{
		if (confirm('Are you sure you want to delete this?')) 
		{
			if ( 'undefined' != typeof id ) {
				var url = '<?php echo base_url() ?>admin/ads/delete/'+id;
				$.get(url, function() {
					$('#row-'+id).remove();
				}).fail(function() { alert('Unable to fetch data, please try again later.') });
			} else alert('Unknown row id.');
		}
	}
</script>		
</html>