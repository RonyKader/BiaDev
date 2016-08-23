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
                <a href="<?php echo site_url('collector_types');?>">employees</a>

                <span class="divider">
                    <i class="icon-angle-right"></i>
                </span>
            </li>
            <li class="active"><?php if($action == 'edit'){?>Edit<?php }else{?>Add<?php }?></li>
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
                                                <div class="control-group <?php if(form_error('username')){?>error<?php }?>">
                                                    <label class="control-label" for="username">Username:</label>

                                                    <div class="controls">
                                                       <input <?php if($action == 'edit') {echo "readonly";}?> type="text" name="username" id="username" class="span6" value="<?php echo $row['username'];?>" />
                                                    </div>
                                                </div>
                                                <?php if($action != 'edit') {?>
                                            	
                                                
                                                
                                                
                                                <div class="control-group <?php if(form_error('password')){?>error<?php }?>">
                                                    <label class="control-label" for="password">Password:</label>

                                                    <div class="controls">
                                                       <input type="password" name="password" id="password" class="span6"/>
                                                    </div>
                                                </div>
                                                
                                                <div class="control-group <?php if(form_error('cpassword')){?>error<?php }?>">
                                                    <label class="control-label" for="cpassword">Confirm Password:</label>

                                                    <div class="controls">
                                                       <input type="password" name="cpassword" id="cpassword" class="span6" />
                                                    </div>
                                                </div>
                                                <?php }?>
                                                 <div class="control-group  <?php if(form_error('employee_name')){?>error<?php }?>">
                                                    <label class="control-label" for="employee_name">Employee Name:</label>

                                                    <div class="controls">
                                                       <input type="text" id="employee_name" name="employee_name" class="span6" value="<?php echo $row['employee_name']?>">
                                                    </div>
                                                </div>
                                                
                                                <div class="control-group">
                                                    <label class="control-label" for="employee_short_name">Employee short name:</label>

                                                    <div class="controls">
                                                         <input type="text" id="employee_name" name="employee_short_name" class="span6" value="<?php echo $row['employee_short_name']?>">
                                                       
                                                    </div>
                                                </div>
                                              	   <div class="control-group">
                                                    <label class="control-label" for="employee_address">Employee Address :</label>

                                                    <div class="controls">
                                                       <textarea id="employee_address" name="employee_address" class="span6"><?php echo $row['employee_address']?></textarea>
                                                    </div>
                                                </div>
                                                
                                                 <div class="control-group">
                                                      <label class="control-label" for="id_designation">Designation :</label>
                                                <div class="controls">
                                                      <select id="id_designation" name="id_designation" class="span4">
                                                       		<option value="">Select</option>
                                                            <?php foreach($designations as $designation){?>
                                                            <option value="<?php echo $designation->id;?>" <?php if($designation->id == $row['designation_id']){?> selected="selected"<?php }?>><?php echo $designation->designation;?></option>
                                                            
                                                            <?php }?>
                                                       </select>
                                                     <input type="text" id="txtadddesignation" name="txtadddesignation" style="display:none" class="span6" value="">
                                                     <input type="button" id="btnadddesignation" name="btnadddesignation" onclick="adddesignation(this.value)" value="+" />
                                                    </div>
                                                      <script>
                                                      function adddesignation(val)
                                                      {
                                                          if (val=='+')
                                                              {
                                                          document.getElementById("id_designation").style.display="none";
                                                          document.getElementById("txtadddesignation").style.display="block";
                                                           document.getElementById("btnadddesignation").value="Show List";
                                                              }
                                                              else
                                                                  {
                                                                      document.getElementById("id_designation").style.display="block";
                                                          document.getElementById("txtadddesignation").style.display="none";
                                                          document.getElementById("txtadddesignation").value=" ";
                                                           document.getElementById("btnadddesignation").value="+"; 
                                                                  }
                                                      }
                                                      </script>
                                                 </div>
                                                 <div class="control-group">
                                                      <label class="control-label" for="id_department">Department :</label>
                                                <div class="controls">
                                                       <select id="id_department" name="id_department" class="span4">
                                                       		<option value="">Select</option>
                                                            <?php foreach($departments as $department){?>
                                                            <option value="<?php echo $department->id;?>" <?php if($department->id == $row['department_id']){?> selected="selected"<?php }?>><?php echo $department->department_name;?></option>
                                                            
                                                            <?php }?>
                                                       </select>
                                                    </div>
                                                 </div>
                                                 <div class="control-group">
                                                      <label class="control-label" for="user_type">User Type :</label>
                                                <div class="controls">
                                                       <select style="width:150px" id="user_type" name="user_type" class="span4">
                                                         
                                                                    <option value="Normal User" <?php if($row['user_type']== 'Normal User'){?> selected="selected"<?php }?>>Normal User</option>
                                                                        <option value="Admin User" <?php if($row['user_type']== 'Admin User'){?> selected="selected"<?php }?>>Admin User</option>
                                                                                                                          
                                                    
                                                       </select>
                                                    </div>
                                                 </div>
                                                  <div class="control-group">
                                                    <label class="control-label" for="employee_short_name">Email Address :</label>

                                                    <div class="controls">
                                                         <input type="text" id="email_address" name="email_address" class="span6" value="<?php echo $row['email_address']?>">
                                                       
                                                    </div>
                                                </div>
                                              
                                                                                             
                                                <hr />
                                    
                                                <?php  if($this->session->userdata('roles_insert')==1) {?>
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
                                     <?php } ?>
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
		