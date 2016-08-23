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
                <a href="<?php echo site_url('teacher');?>">Teacher</a>

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
                                            	
                                                 <div class="control-group  <?php if(form_error('teacher')){?>error<?php }?>">
                                                    <label class="control-label" for="teacher_name">Speaker :</label>

                                                    <div class="controls">
                                                       <input type="text" id="teacher_name" name="teacher_name" class="span6" value="<?php echo $row['teacher_name']?>">
                                                    </div>
                                                </div>
                                                
                                                <div class="control-group">
                                                    <label class="control-label" for="teacher_short_name"> Short Name:</label>

                                                    <div class="controls">
                                                         <input type="text" id="teacher_short_name" name="teacher_short_name" class="span6" value="<?php echo $row['teacher_short_name']?>">
                                                       
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
                                                    <label class="control-label" for="organization_name">Organization Name :</label>

                                                    <div class="controls">
                                                         <input type="text" id="organization_name" name="organization_name" class="span6" value="<?php echo $row['organization_name']?>">
                                                       
                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                    <label class="control-label" for="contact_no">Email :</label>

                                                    <div class="controls">
                                                         <input type="text" id="email_address" name="email_address" class="span6" value="<?php echo $row['email_address']?>">
                                                       
                                                    </div>
                                                </div>
                                                
                                                 <div class="control-group">
                                                    <label class="control-label" for="contact_no">Phone :</label>

                                                    <div class="controls">
                                                         <input type="text" id="phone" name="phone" class="span6" value="<?php echo $row['phone']?>">
                                                       
                                                    </div>
                                                </div>
                                                 <div class="control-group">
                                                    <label class="control-label" for="contact_no">Mobile/Cell :</label>

                                                    <div class="controls">
                                                         <input type="text" id="mobile_cell" name="mobile_cell" class="span6" value="<?php echo $row['mobile_cell']?>">
                                                       
                                                    </div>
                                                </div>
                                                 <div class="control-group">
                                                    <label class="control-label" for="teacher_address">Address :</label>

                                                    <div class="controls">
                                                         <input type="text" id="teacher_address" name="teacher_address" class="span6" value="<?php echo $row['teacher_address']?>">
                                                       
                                                    </div>
                                                </div>
                                                 <div class="control-group">
                                                    <label class="control-label" for="course_id">Course:</label>

                                                    <div class="controls">
                                                         <select id="course_id" name="course_id" class="span4">
                                                       		<option value="">Select</option>
                                                            <?php foreach($courses as $course){?>
                                                            <option value="<?php echo $course->id;?>" <?php if($course->id == $row['course_id']){?> selected="selected"<?php }?>><?php echo $course->course_name;?></option>
                                                            
                                                            <?php }?>
                                                       </select>
                                                       
                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                    <label class="control-label" for="teacher_type">Type :</label>

                                                    <div class="controls">
                                                         <select id="teacher_type" name="teacher_type" class="span4">
                                                       		<option value="inhouse" <?php if($row['teacher_type'] == 'inhouse'){?> selected="selected"<?php }?>>In house</option>
                                                                <option value="guest" <?php if($row['teacher_type'] == 'guest'){?> selected="selected"<?php }?>>Guest</option>
                                                           
                                                       </select>
                                                       
                                                    </div>
                                                </div>
                                                
                                                <div class="control-group">
                                                    <label class="control-label" for="teacher_address">Area of Interest :</label>

                                                    <div class="controls">
                                                          <textarea id="area_of_interest" name="area_of_interest" class="span6"><?php echo $row['area_of_interest']?></textarea>
                                                       
                                                    </div>
                                                </div>
                                          
                                              	  
                                                                                               
                                                <hr />
                                    
                                                 <?php  if($this->session->userdata('rules_insert')==1) {?>
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
		