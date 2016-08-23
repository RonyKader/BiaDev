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
                <a href="<?php echo site_url('collector_types');?>">Student</a>

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
                                            	   <table style="width:100%">
      
        <tr>
             <td colspan="3" style="color: red; font-size: 18px" height="25" align="left" valign="middle" bgcolor="#ADC9AD" class="black12bold">Basic Student Information<span class="red12">*</span></td>
                 
        </tr>
  <tr>
    <td align="left" valign="top" bgcolor="#E4EDE4">
      <table width="100%" border="0" cellpadding="5" cellspacing="0" class="black14">
          
        <tr>
            <td>
                
                                                    <label class="control-label" for="teacher_short_name">Registration No </label>

                                                    <div class="controls">
                                                         <input type="text" style="width:300px" id="registration_no" name="registration_no" class="span6"  value="<?php echo $row['registration_no']?>">
                                                       
                                                    </div>
                                                    <br>
              
                                                    <label class="control-label" for="student_name">Resource Person  </label>

                                                    <div class="controls">
                                                         <input type="text" style="width:300px" id="student_name" name="student_name" class="span6" value="<?php echo $row['student_name']?>"">
                                                       
                                                    </div>
                                                
            </td>
            <td>
                     <div class="control-group">
                                                    <label class="control-label" for="defaults">Father's Name </label>

                                                    <div class="controls">
                                                         <input type="text" style="width:300px" id="father_name" name="father_name" class="span6" value="<?php echo $row['father_name']?>"">
                                                       
                                                    </div>
                                                </div>
                <div class="control-group">
                                                    <label class="control-label" for="mother_name">Mother's Name </label>

                                                    <div class="controls">
                                                         <input type="text" style="width:300px" id="mother_name" name="mother_name" class="span6" value="<?php echo $row['mother_name']?>"">
                                                       
                                                    </div>
                                                </div>
            </td>
            </td>
        </tr>
    
      
        
    
      </table>
    </td>
  </tr>
                <tr>
             <td colspan="3" style="color: red; font-size: 18px" height="25" align="left" valign="middle" bgcolor="#ADC9AD" class="black12bold">Admit Course Information<span class="red12">*</span></td>
                 
        </tr>
  <tr>
    <td align="left" valign="top" bgcolor="#E4EDE4">
      <table width="100%" border="0" cellpadding="5" cellspacing="0" class="black14">
          
        <tr>
            <td>
                <div class="control-group">
                                                    <label class="control-label" for="course_id">Course </label>

                                                   <div class="controls">
                                                      <select style="width:300px" id="course_id" name="course_id" class="span4">
                                                       		<option value="">Select</option>
                                                            <?php foreach($courses as $course){?>
                                                            <option value="<?php echo $course->id;?>" <?php if($course->id == $row['course_id']){?> selected="selected"<?php }?>><?php echo $course->course_name;?></option>
                                                            
                                                            <?php }?>
                                                       </select>
                                                    </div>
                                                </div>
               
            </td>
            <td>
                     <div class="control-group">
                                                    <label class="control-label" for="admission_organization_by">
 Sponsored By
</label>

                                                   
                                                       <div class="controls">
                                                      <select style="width:300px" id="organization_id" name="organization_id" class="span4">
                                                       		<option value="">Select</option>
                                                            <?php foreach($organizations as $organization){?>
                                                            <option value="<?php echo $organization->id;?>" <?php if($organization->id == $row['organization_id']){?> selected="selected"<?php }?>><?php echo $organization->organization_name;?></option>
                                                            
                                                            <?php }?>
                                                       </select>
                                                    </div>
                                                       
                                                  
                                                </div>
       
            </td>
            </td>
        </tr>
           <tr>
            <td>
                <div class="control-group">
                                                    <label class="control-label" for="course_id">Membership Fee </label>

                                                
                                                      <div class="controls">
                                                         <input type="text" style="width:300px" id="membership_fee" name="membership_fee" class="span6" value="<?php echo $row['membership_fee']?>">
                                                       
                                             
                                                    </div>
                                                </div>
               
            </td>
          
        </tr>
   
      
        
    
      </table>
    </td>
  </tr>
  
          </table></td>
        </tr>
       
    </table>
                                                
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


function permanent_district_select_after_upzilla(value)
{

var upzilla_code = document.getElementById("permanent_address_upzilla_code");
//alert(issue_to.length);
//alert(country.length);
for(i=1;i<upzilla_code.length;i++)
{
  // var f=document.getElementById('select_tag_id');

//alert(issue_to.options[i].value);
var s=upzilla_code.options[i].value;

 
    var res = s.split("-");
   // alert(res);
      
//alert(s);
//alert(s);
if (value!=res[0])
    {
     
  document.getElementById("p"+i).style.display="none";
    }
  else
      {
         
    document.getElementById("p"+i).style.display="block";  
      }
}
}


function district_select_after_upzilla(value)
{

var upzilla_code = document.getElementById("present_address_upzilla_code");
//alert(issue_to.length);
//alert(country.length);
for(i=1;i<upzilla_code.length;i++)
{
  // var f=document.getElementById('select_tag_id');

//alert(issue_to.options[i].value);
var s=upzilla_code.options[i].value;

 
    var res = s.split("-");
   // alert(res);
      
//alert(s);
//alert(s);
if (value!=res[0])
    {
     
  document.getElementById(i).style.display="none";
    }
  else
      {
         
    document.getElementById(i).style.display="block";  
      }
}
}

</script>