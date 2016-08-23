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

            <li>
                <a href="<?php echo site_url('');?>">User</a>

                <span class="divider">
                    <i class="icon-angle-right"></i>
                </span>
            </li>
            <li class="active"><?php if($action == 'edit'){?>Role<?php }else{?>Add<?php }?></li>
        </ul><!--.breadcrumb-->

        <!--<div id="nav-search">
            <form class="form-search">
                <span class="input-icon">
                    <input type="text" placeholder="Search ..." class="input-small search-query" id="nav-search-input" autocomplete="off" />
                    <i class="icon-search" id="nav-search-icon"></i>
                </span>
            </form>
        </div>--><!--#nav-search-->
    </div>

    <div id="page-content" class="clearfix">
        

        <div class="row-fluid">
            <!--PAGE CONTENT BEGINS HERE-->

            <div class="row-fluid">
                <div class="span12">
                    <div class="widget-box">
                        

                        <div class="widget-body">
                            <div class="widget-main">
                                <div class="row-fluid">
                                    <div class="step-content row-fluid position-relative">
                                        <div class="step-pane active" id="step1">
                                          
											
                                            <?php if(validation_errors()){?>
                                            <div class="errorSummary"><p>Please fix the following input errors:</p>
                                                <ul>
                                               		<?php echo validation_errors('<li>', '</li>'); ?>
                                                </ul>
                                            </div>
                                            <?php }?>
                                            <form class="form-horizontal"  method="post" action="" name="frm">
                                            	
                                                 <div class="control-group  <?php if(form_error('employee_name')){?>error<?php }?>">
                                                    <label class="control-label" for="employee_name">Employee Name:</label>

                                                    <div class="controls">
                                                       <input type="text" id="employee_name" name="employee_name" class="span6" value="<?php echo $row['employee_name']?>">
                                                    </div>
                                                </div>
                                                
                                               
                                                 <div class="control-group">
                                                      <label class="control-label" for="id_designation">Designation :</label>
                                                      
                                                <div class="controls">
                                                      <select id="id_designation" name="id_designation" class="span6"  >
                                                       		<option value="">Select</option>
                                                            <?php foreach($designations as $designation){?>
                                                            <option value="<?php echo $designation->id;?>" <?php if($designation->id == $row['designation_id']){?> selected="selected"<?php }?>><?php echo $designation->designation;?></option>
                                                            
                                                            <?php }?>
                                                       </select>
                                                    </div>
                                                 </div>
                                                 <div class="control-group">
                                                      <label class="control-label" for="id_department">Department :</label>
                                                <div class="controls">
                                                       <select id="id_department" name="id_department" class="span6">
                                                       		<option value="">Select</option>
                                                            <?php foreach($departments as $department){?>
                                                            <option value="<?php echo $department->id;?>" <?php if($department->id == $row['department_id']){?> selected="selected"<?php }?>><?php echo $department->department_name;?></option>
                                                            
                                                            <?php }?>
                                                       </select>
                                                    </div>
                                                 </div>
                                                 <div class="control-group">
                                                    <label class="control-label" for="username">User Name:</label>

                                                    <div class="controls">
                                                         <input type="text" id="username" name="username" class="span6" value="<?php echo $row['username']?>">
                                                       
                                                    </div>
                                                </div>
                                                
                                                     <div class="control-group">
                                                      <label class="control-label" for="id_department">User Type :</label>
                                                <div class="controls">
                                                       <select id="user_type" name="user_type" class="span6">
                                                       		<option value="Admin" <?php if($row['user_type'] == 'Admin'){?> selected="selected"<?php }?>>Admin</option>
                                                                <option value="Normal User" <?php if($row['user_type'] == 'Normal User'){?> selected="selected"<?php }?>>Normal User</option>
                                                            
                                                       </select>
                                                    </div>
                                                 </div>                
                                                <hr />
                                    
                                                <div class="form-actions">
                                                    <button class="btn btn-info" type="submit">
                                                        <i class="icon-ok bigger-110"></i>
                                                        Submit
                                                    </button>
                    
                                                    &nbsp; &nbsp; &nbsp;
                                                    <button class="btn" type="reset">
                                                        <i class="icon-undo bigger-110"></i>
                                                        Reset
                                                    </button>
                                                </div>
                                            </form>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div><!--/widget-main-->
                        </div><!--/widget-body-->
                    </div>
                </div>
            </div>

            <!--PAGE CONTENT ENDS HERE-->
        </div><!--/row-->
    </div><!--/#page-content-->

 
</div><!--/#main-content-->
<style>
.errorSummary ul li{
	color:#F00;
}
.lighter{
	width:98%;
}
</style>
		