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
                        <div class="pull-right"><h3 class="page-header" style="border-bottom:none"><a href="javascript:;" title="Add New" onClick="callDML('0')" ><i class="glyphicon glyphicon-plus-sign text-success"></i></a></h3></div>
                        </div>
                        
                        <table class="table-responsive dtTabale display">
                        <thead>
                            <tr>
                                <th>Sr. #</th>
                                <th>Name</th>
                                <th>Address</th>
                                <th>Username</th>
                                <th>Password</th>
                                <th>Phone</th>
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
                            <tr id="row-<?php echo $row->id; ?>">
                                <td><?php echo $i++?></td>
                                <td><?php echo $row->name ?></td>
                                <td><?php echo $row->address ?></td>
                                <td><?php echo $row->username ?></td>
                                <td style="text-align:center">
									<a href="javascript:$('#dv_<?php echo $row->id; ?>').show(); $('#al_<?php echo $row->id; ?>').hide();" id="al_<?php echo $row->id; ?>">********</a>
									<div style="display:none" id="dv_<?php echo $row->id; ?>"><?php echo $row->password ?></div>
                                </td>
                                <td><?php echo $row->phone ?></td>
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
                            <form role="form" method="post" class="form-horizontal" id="frmRegistration" name="frmRegistration" action="<?php echo base_url()?>admin/owners/post">
                            <input type="hidden" id="id" name="id" value="" />
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                        ×</button>
                                    <h4 class="modal-title" id="myModalLabel"> Add Owner </h4>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-10">
                                            <div class="form-group">
                                                <label for="email" class="col-sm-3 control-label">Name</label>
                                                <div class="col-sm-7">
                                                    <input type="text" name="name" class="form-control" required id="name" placeholder="Enter name" />
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="email" class="col-sm-3 control-label">Address</label>
                                                <div class="col-sm-7">
                                                    <input type="text" name="address" class="form-control" required id="address" placeholder="Enter address" />
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="email" class="col-sm-3 control-label">Email/Username</label>
                                                <div class="col-sm-7">
                                                    <input type="text" name="username" class="form-control" required id="username" placeholder="Enter username" />
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="email" class="col-sm-3 control-label">Password</label>
                                                <div class="col-sm-7">
                                                    <input type="password" name="password" class="form-control" required id="password" placeholder="Enter password" />
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="email" class="col-sm-3 control-label">Phone</label>
                                                <div class="col-sm-7">
                                                    <input type="text" name="phone" class="form-control" required id="phone" placeholder="Enter phone" />
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
	});
	
	function callDML(id){
			
		if ( 'undefined' != typeof(id) && id > 0 ) {
			var url = '<?php echo base_url() ?>admin/owners/edit/'+id;
			$.getJSON(url, function(obj) {
				$('#id').val(obj.id);
				$('#name').val(obj.name);
				$('#address').val(obj.address);
				$('#username').val(obj.username);
				$('#password').val(obj.password);
				$('#phone').val(obj.phone);
				$('#myModalLabel').html("Update Owner");
				$("#dmlModal").modal('show');
			}).fail(function() { alert('Unable to fetch data, please try again later.') });
		} else $('#dmlModal').modal('show');
			
	}
	
	function remove(id) 
	{
		if (confirm('Are you sure you want to delete this?')) 
		{
			if ( 'undefined' != typeof id ) {
				var url = '<?php echo base_url() ?>admin/owners/delete/'+id;
				$.get(url, function() {
					$('#row-'+id).remove();
				}).fail(function() { alert('Unable to fetch data, please try again later.') });
			} else alert('Unknown row id.');
		}
	}
	
</script>		
</html>