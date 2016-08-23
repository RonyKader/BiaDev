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
						<li class="active">Error Logs</li>
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
							<h3 class="header smaller lighter blue">Manage Error Logs</h3>
                            
							<div class="table-header">
								Results for "Error Logs"
							</div>
						<form method="post" action="<?php echo site_url('error_logs');?>" name="frm">
							<table id="errorlog_list" class="table table-striped table-bordered table-hover">
								<thead>
									<tr>
										<th class="center">id</th>
										<th>Collector</th>
										<th>Log</th>
                                        <th>Created</th>
                                        <th><input type="checkbox" name="sel_all" onclick="javascript:selectAll()" /><span class="lbl"></span>&nbsp;Actions</th>
									</tr>
								</thead>
							</table>
                            </form>
						</div>

						<!--PAGE CONTENT ENDS HERE-->
					</div><!--/row-->
				</div><!--/#page-content-->

				<div id="ace-settings-container">
					<div class="btn btn-app btn-mini btn-warning" id="ace-settings-btn">
						<i class="icon-cog"></i>
					</div>

					<div id="ace-settings-box">
						<div>
							<div class="pull-left">
								<select id="skin-colorpicker" class="hidden">
									<option data-class="default" value="#438EB9">#438EB9</option>
									<option data-class="skin-1" value="#222A2D">#222A2D</option>
									<option data-class="skin-2" value="#C6487E">#C6487E</option>
									<option data-class="skin-3" value="#D0D0D0">#D0D0D0</option>
								</select>
							</div>
							<span>&nbsp; Choose Skin</span>
						</div>

						<div>
							<input type="checkbox" class="ace-checkbox-2" id="ace-settings-header" />
							<label class="lbl" for="ace-settings-header"> Fixed Header</label>
						</div>

						<div>
							<input type="checkbox" class="ace-checkbox-2" id="ace-settings-sidebar" />
							<label class="lbl" for="ace-settings-sidebar"> Fixed Sidebar</label>
						</div>
					</div>
				</div><!--/#ace-settings-container-->
			</div><!--/#main-content-->
		</div><!--/.fluid-container#main-container-->
<script type="text/javascript">
	$(document).ready(function() {
		$('#errorlog_list').dataTable( {
			"aoColumnDefs": [
				  { 'bSortable': false, 'aTargets': [4 ] }
				],
			 "aoColumns": [
						   { "sWidth": "5%" },
						   { "sWidth": "10%" },
						   { "sWidth": "57%" },
						   { "sWidth": "14%" },
						   { "sWidth": "13%" }, 
			  ],
			"iDisplayLength": 50,
			"bProcessing": true,
			"bServerSide": true,
			"sAjaxSource": "<?php echo site_url('error_logs/get');?>",
			"bDeferRender": true,
			"fnInitComplete":function() {
				if(this.fnGetNodes().length)
				{
					$('#errorlog_list tr:first').before('<tr><td colspan="8" style=" text-align:right;"><input type="submit" class="btn btn-danger" value="Delete Selected" id="delete"/></td></tr>');
				}
			},
			"fnDrawCallback": function( oSettings ) {
				 if(this.fnGetNodes().length)
				{
					$('#errorlog_list tr:last').after('<tr><td colspan="8" style=" text-align:right;"><input type="submit" class="btn btn-danger" value="Delete Selected" id="delete"/></td></tr>');
				}
			},
		}); 
		
		$(document).on("click","#delete",function(e){
			if(!confirm('Are you sure?'))
				e.preventDefault();
		});
	}); 
function confirm_status() {
	var agree = confirm("Are you sure, you want to delete this error log?");
	if (!agree) return false;
}
function selectAll()
{
	len = document.frm.elements.length;
	if(document.frm.sel_all.checked)
	{
		
		for(i= 0;i<len;++i)
		{
			if(document.frm.elements[i].type == "checkbox")
			{
				document.frm.elements[i].checked = true;
			}
		}
	}
	else
	{
		for(i= 0;i<len;++i)
		{
			if(document.frm.elements[i].type == "checkbox")
			{
				document.frm.elements[i].checked = false;
			}
		}
	}
	
}
</script>