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
                <a href="<?php echo site_url();?>">Users</a>

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
                        <div class="widget-header widget-header-blue widget-header-flat wi1dget-header-large">
                            <h4 class="lighter"><?php if($action == 'edit'){?>Use this form to update a user.<?php }else{?>Use this form to create a new user.<?php }?></h4>

                            
                        </div>

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
                                                       <input type="text" name="username" id="username" class="span6" value="<?php echo $row['username'];?>" />
                                                    </div>
                                                </div>
                                                
                               <div class="controls">
                                                     <input type="checkbox"  <?php  if ($usersrole['role_insert']==1){?> checked <?php } ?> name="chkInsert" id='chkInsert' value="1"  />
    <span class="lbl"> Insert</span>       
    <input type="checkbox"  <?php  if ($usersrole['role_update']==1){?> checked <?php } ?>  name="chkUpdate" id='chkUpdate' value="1" />
    <span class="lbl"> Update</span> 
    <input type="checkbox"  <?php  if ($usersrole['role_delete']==1){?> checked <?php } ?>  name="chkDelete" id='chkDelete' value="1" />
    <span class="lbl"> Delete</span> 
     <input type="checkbox"  <?php  if ($usersrole['role_approved']==1){?> checked <?php } ?>  name="chkApproved" id='chkApproved' value="1" />
    <span class="lbl"> Approved</span> 
                                                    </div>
                                                  <hr />
                                                       <div class="control-group <?php if(form_error('user_type')){?>error<?php }?>">
                                                    <label class="control-label" for="user_type">User Type:</label>

                                                    <div class="controls">
                                                       <select id="user_type" name="user_type" class="span4">
                                                       	<option value="">Select</option>	
                                                           <option value="0" <?php  if ($row['user_type']==0){?> selected <?php } ?> >Admin</option>
                                                            <?php foreach($designations as $designation){?>
                                                            <option value="<?php echo $designation->roles_code;?>" <?php  if ($row['user_type']==$designation->roles_code){?> selected <?php } ?> ><?php echo $designation->designation;?></option>
                                                            
                                                            <?php }?>
                                                            
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