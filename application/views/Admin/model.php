<?php
$bodytypes = get_all_bodytypes();
$makers = get_all_makers();
$brands = get_all_brands();
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
                        <div class="pull-right"><h3 class="page-header" style="border-bottom:none"><a href="javascript:;" title="Add New" onClick="callDML(0);" ><i class="glyphicon glyphicon-plus-sign text-success"></i></a></h3></div>
                        </div>
                        <table class="table-responsive dtTabale display">
                            <thead>
                                <tr>
                                    <th style="width:5%">Sr. #</th>
                                    <th style="width:5%">ID</th>
                                    <th style="width:10%">Body Type</th>
                                    <th style="width:10%">Maker</th>
                                    <th style="width:10%">Brand</th>
                                    <th style="width:50%">Name</th>
                                    <th style="width:10%">Actions</th>
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
                                <tr id="row-<?php echo $row->id; ?>">
                                    <td><?php echo $i++?></td>
                                    <td><?php echo $row->id ?></td>
                                    <td><?php echo $row->bodytype_name ?></td>
                                    <td><?php echo $row->maker_name ?></td>
                                    <td><?php echo $row->brand_name ?></td>
                                    <td><?php echo $row->name ?></td>
                                    <td>
                                        <a href="javascript:remove('<?php  echo $row->id; ?>');" style="margin:5px;" class="btn btn-default btn-sm"> <i class="glyphicon glyphicon-remove" aria-hidden="true"> </i></a>
                                        <a href="javascript:callDML('<?php  echo $row->id; ?>');" style="margin:5px;" class="btn btn-default btn-sm"> <i class="glyphicon glyphicon-pencil" aria-hidden="true"> </i></a>
                                    </td>
                                </tr>
                                    <?php
                                    }
                                }
                             ?>
                            </tbody>
                        </table>
                        <div class="modal fade" id="dmlModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-md">
                            <form role="form" method="post" class="form-horizontal" id="frmRegistration" name="frmRegistration" action="<?php echo base_url()?>admin/model/post">
                            <input type="hidden" id="id" name="id" value="" />
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                    <h4 class="modal-title" id="myModalLabel"> Add Model </h4>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-10">
                                            <div class="form-group">
                                                <label for="body_type_id" class="col-sm-4 control-label">Body Type </label>
                                                <div class="col-sm-7">
                                                    <select class="form-control" id="body_type_id" name="body_type_id" onChange="populateBrands();" required >
                                                        <option value="">Select...</option>
                                                        <?php
                                                        if(isset($bodytypes))
                                                            foreach($bodytypes as $row){
                                                                echo '<option value="'.$row->id.'">'.$row->id.' - '.$row->name.'</option>';
                                                            }
                                                        ?>
                                                    </select>
                                                </div>
                                                <label for="maker_id" class="col-sm-4 control-label">Maker </label>
                                                <div class="col-sm-7">
                                                    <select class="form-control" id="maker_id" name="maker_id" required onChange="populateBrands();" >
                                                        <option value="">Select...</option>
                                                        <?php
                                                        if(isset($makers))
                                                            foreach($makers as $row){
                                                                echo '<option value="'.$row->id.'">'.$row->id.' - '.$row->name.'</option>';
                                                            }
                                                        ?>
                                                    </select>
                                                </div>

                                                <label for="brand_id" class="col-sm-4 control-label">Brand </label>
                                                <div class="col-sm-7">
                                                    <select class="form-control" id="brand_id" name="brand_id" required >
                                                        <option value="">Select...</option>
                                                        <?php
                                                        if(isset($brands))
                                                            foreach($brands as $row){
                                                                echo '<option value="'.$row->id.'">'.$row->id.' - '.$row->bodytype_name.' - '.$row->maker_name.' - '.$row->name.'</option>';
                                                            }
                                                        ?>
                                                    </select>
                                                </div>


                                                <label for="model" class="col-sm-4 control-label">Model </label>
                                                <div class="col-sm-7">
                                                    <input type="text" name="name" class="form-control" required id="name" placeholder="Enter model name" />
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-ok-sign" aria-hidden="true"> </i> Submit</button>
                                </div>
                            </div>
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
<script>
	
	$(document).ready(function(){
		var oTable = $('.dtTabale').DataTable( {});
        <?php //if(isset($state)) echo 'myfunction(\''.$state.'\');'; else echo 'myfunction(\'Punjab\');';?>
	});

    function populateBrands() {
        //alert('body: ' + $('#body_type_id option:selected').val());
        //alert('maker: ' + $('#maker_id option:selected').val());
        //return;
        //if ($('#body_type_id option:selected').val() > 0 || ) {
            $.ajax({
                type: "POST",
                url:  '<?php echo base_url() ?>admin/model/get_filter',
                data: { 'bt': $('#body_type_id option:selected').val(),
                        'mk': $('#maker_id option:selected').val(),
                        'br': '<?php if(isset($brand_id)) echo $brand_id;?>'},
                success: function(data) {
                    $('#brand_id').html(data);
                },
                error: function() {
                    alert('some error occurred');
                },
            });
       //}
    }

	function callDML(id){
			
		if ( 'undefined' != typeof(id) && id > 0 ) {
			var url = '<?php echo base_url() ?>admin/model/edit/'+id;
			$.getJSON(url, function(obj) {
				$('#id').val(obj.id);
                $('#body_type_id').val(obj.body_type_id);
                $('#maker_id').val(obj.maker_id);
                $('#brand_id').val(obj.brand_id);
				$('#name').val(obj.name);
				$('#myModalLabel').html("Update Model");
				$("#dmlModal").modal('show');
			}).fail(function() { alert('Unable to fetch data, please try again later.') });
		} else {
            $('#id').val('');
            $('#body_type_id').val('');
            $('#maker_id').val('');
            $('#brand_id').val('');
            $('#name').val('');
            $('#myModalLabel').html("Add Model");
            $('#dmlModal').modal('show');
        }
			
	}
	
	function remove(id) 
	{
		if (confirm('Are you sure you want to delete this?')) 
		{
			if ( 'undefined' != typeof id ) {
				var url = '<?php echo base_url() ?>admin/model/delete/'+id;
				$.get(url, function() {
					$('#row-'+id).remove();
				}).fail(function() { alert('Unable to fetch data, please try again later.') });
			} else {
			    alert('Unknown row id.')
			};
		}
	}
	
</script>		
</html>