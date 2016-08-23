<link rel="stylesheet" type="text/css" media="screen"
     href="http://tarruda.github.com/bootstrap-datetimepicker/assets/css/bootstrap-datetimepicker.min.css"/>


    <script type="text/javascript"
     src="http://tarruda.github.com/bootstrap-datetimepicker/assets/js/bootstrap-datetimepicker.min.js">
    </script>
    <script type="text/javascript"
     src="http://tarruda.github.com/bootstrap-datetimepicker/assets/js/bootstrap-datetimepicker.pt-BR.js">
    </script>
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
                <a href="<?php echo site_url('Subject');?>">Result</a>

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
                                            	
                                                 <div class="control-group  <?php if(form_error('subject')){?>error<?php }?>">
                                                    <label class="control-label" for="subject">Registration No :</label>

                                                    <div class="controls">
                                                       <input type="text" style="width:300px"id="student_registration_no" name="student_registration_no" class="span6" value="<?php echo $row['student_registration_no']?>">
                                                    </div>
                                                </div>
                                                
                                                 <div class="control-group  <?php if(form_error('subject')){?>error<?php }?>">
                                                    <label class="control-label" for="subject">Result Publish Date  :</label>

                                                       &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  <div id="datetimepicker" class="dp input-append date">
                                                     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input style="width:270px" type="text" id="result_date" name="result_date" style="width:100px" value="<?php echo $row['result_date']?>">
                                                    <span class="add-on">
                                                     <i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
                                                    </span>
                                                     </div>
                                                </div>
                                                
                                                <div class="control-group">
                                                    <label class="control-label" for="session_id">Session:</label>

                                                    <div class="controls">
                                                         <select id="session_id" name="session_id" class="span4">
                                                       		<option value="">Select</option>
                                                            <?php foreach($sessions as $session){?>
                                                            <option value="<?php echo $session->id;?>" <?php if($session->id == $row['session_id']){?> selected="selected"<?php }?>><?php echo $session->session_name;?></option>
                                                            
                                                            <?php }?>
                                                       </select>
                                                       
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
                                                    <label class="control-label" for="subject_id">subject :</label>

                                                    <div class="controls">
                                                         <select id="subject_id" name="subject_id" class="span4">
                                                       		<option value="">Select</option>
                                                            <?php foreach($subjects as $subject){?>
                                                            <option value="<?php echo $subject->id;?>" <?php if($subject->id == $row['subject_id']){?> selected="selected"<?php }?>><?php echo $subject->subject;?></option>
                                                            
                                                            <?php }?>
                                                       </select>
                                                       
                                                    </div>
                                                </div>
                                                   	
                                               <div class="control-group">
                                                    <label class="control-label" for="grade">Grade :</label>

                                                    <div class="controls">
                                                         <select id="grade" name="grade" class="span4">
                                                       		<option value="">Select</option>
                                                            <?php foreach($grades as $grade){?>
                                                            <option value="<?php echo $grade->id;?>" <?php if($grade->id == $row['grade']){?> selected="selected"<?php }?>><?php echo $grade->grade;?></option>
                                                            
                                                            <?php }?>
                                                       </select>
                                                       
                                                    </div>
                                                </div>
                                                   	 <div class="control-group">
                                                    <label class="control-label" for="subject_id">Marks Range :</label>

                                                    <div class="controls">
                                                         <select id="marks" name="marks" class="span4">
                                                       		<option value="">Select</option>
                                                            <?php foreach($markss as $marks){?>
                                                            <option value="<?php echo $marks->id;?>" <?php if($marks->id == $row['marks']){?> selected="selected"<?php }?>><?php echo $marks->marks;?></option>
                                                            
                                                            <?php }?>
                                                       </select>
                                                       
                                                    </div>
                                                </div>
                                                    <div class="control-group">
                                                    <label class="control-label" for="finalmarks">Final Marks :</label>

                                                    <div class="controls">
                                                         <input type="text" id="finalmarks" name="finalmarks" class="span4" value="<?php echo $row['finalmarks']?>">
                                                       
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
<style>
.errorSummary ul li{
	color:#F00;
}
.lighter{
	width:98%;
}
</style>
<script type="text/javascript">
	  $(document).ready(function () {
    $('#datetimepicker').datepicker({
      format: "dd/mm/yyyy",
      language: 'en-GB',
    });

    $('.dp').on('change', function(){
        $('.datepicker').hide();
    });

});
</script>