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
						<li class="active">Student List</li>
					</ul><!--.breadcrumb-->

					
				</div>

				<div id="page-content" class="clearfix">
					

					<div class="row-fluid">
						<!--PAGE CONTENT BEGINS HERE-->
						<div class="row-fluid">
                        	
							
                            
							

							<table id="type_list" class="table table-striped table-bordered table-hover">
								<thead>
									<tr>
										
										<th style="color:black">Registration No</th>
                                       
                                         <th style="color:black">Student Name</th>
                                          <th style="color:black">Course</th>
                                        
                                        <th style="color:black">Action</th>
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
		$('#type_list').dataTable( {
			"iDisplayLength": 50,
			"aoColumns": [
						   { "sWidth": "30%" },
						   { "sWidth": "30%" },{ "sWidth": "30%" },
						   { "sWidth": "10%" },
			 ],
			"bProcessing": true,
			"bServerSide": true,
			"sAjaxSource": "<?php echo site_url('student/memberget');?>",
			"bDeferRender": true
		}); 
	}); 
function confirm_status() {
	var agree = confirm("Are you sure, you want to delete this type?");
	if (!agree) return false;
}
</script>