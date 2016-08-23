			<div id="main-content" class="clearfix">
				<div id="breadcrumbs">
					<ul class="breadcrumb">
						<li>
							<i class="icon-home"></i>
							<a href="<?php echo site_url();?>">Home</a>

							<span class="divider">
								<i class="icon-angle-right"></i>
							</span>
						</li>
						<li class="active">Users</li>
					</ul><!--.breadcrumb-->

					
				</div>

				<div id="page-content" class="clearfix">
					

					<div class="row-fluid">
						<!--PAGE CONTENT BEGINS HERE-->
						<div class="row-fluid">
                        	  <?php if($this->session->flashdata('success')){?>
                            <div class="alert alert-block alert-success">
									<p>
										<strong>
											<i class="icon-ok"></i>
											Success!
										</strong>
										<?php echo $this->session->flashdata('success');?>
									</p>
							</div>
                            <?php }?>
							<h3 class="header smaller lighter blue">Manage Users</h3>
                            
							<div class="table-header">
								Results for "Users"
							</div>

							<table id="user_list" class="table table-striped table-bordered table-hover">
								<thead>
									<tr>
										<th class="center">id</th>
										<th>Username</th>
                                        <th>Created</th>
                                        <th>Updated</th>
                                        <th>Actions</th>
									</tr>
								</thead>
							</table>
						</div>

						<!--PAGE CONTENT ENDS HERE-->
					</div><!--/row-->
				</div><!--/#page-content-->

				
			</div><!--/#main-content-->
		</div><!--/.fluid-container#main-container-->
<script type="text/javascript">
	$(document).ready(function() {
		$('#user_list').dataTable( {
			"aoColumnDefs": [
				  { 'bSortable': false, 'aTargets': [4 ] }
				],
			 "iDisplayLength": 50,
			"bProcessing": true,
			"bServerSide": true,
			"sAjaxSource": "<?php echo site_url('usersrole/get');?>",
			"bDeferRender": true
		}); 
	}); 
function confirm_status() {
	var agree = confirm("Are you sure, you want to delete this user?");
	if (!agree) return false;
}
</script>        
        