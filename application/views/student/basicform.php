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
                    <label class="control-label" for="student_name">Participant </label>

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
           
            
        </tr>
        <tr>
             <td>
                <label class="control-label" for="student_name">Mobile No </label>

                                                    <div class="controls">
                                                         <input type="text" style="width:300px" id="mobile_no" name="mobile_no" class="span6" value="<?php echo $row['mobile_no']?>"">
                                                       
                                                    </div>
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
                                                    <label class="control-label" for="course_id">Session </label>

                                                   <div class="controls">
                                                      <select style="width:100px" id="session_month" name="session_month" class="span4">
                                                       		
                                                                    <option value="May" <?php if($row['session_month']== 'May'){?> selected="selected"<?php }?>>May</option>
                                                                        <option value="Oct" <?php if($row['session_month']== 'Oct'){?> selected="selected"<?php }?>>Oct</option>
                                                                
                                                           
<!--                                                            <option value="<?php echo $session->id;?>" <?php if($session->id == $row['session_id']){?> selected="selected"<?php }?>><?php echo $session->session_name;?></option>-->
                                                            
                                                    
                                                       </select>
                                                        <select style="width:100px" id="session_year" name="session_year" class="span4">
                                                            <option value="">Select</option>
                                                           
                                                             
                                                           
                                                                   <option value="2017" <?php if($row['session_year']== '2017'){?> selected="selected"<?php }?>>2017</option>
                                                                    <option value="2016" <?php if($row['session_year']== '2016'){?> selected="selected"<?php }?>>2016</option>
                                                                     <option value="2015" <?php if($row['session_year']== '2015'){?> selected="selected"<?php }?>>2015</option>
                                                                      <option value="2014" <?php if($row['session_year']== '2014'){?> selected="selected"<?php }?>>2014</option>
                                                                       <option value="2013" <?php if($row['session_year']== '2013'){?> selected="selected"<?php }?>>2013</option>
                                                                        <option value="2012" <?php if($row['session_year']== '2012'){?> selected="selected"<?php }?>>2012</option>
                                                                         <option value="2011" <?php if($row['session_year']== '2011'){?> selected="selected"<?php }?>>2011</option>
                                                                          <option value="2010" <?php if($row['session_year']== '2010'){?> selected="selected"<?php }?>>2010</option>
                                                                           <option value="2009" <?php if($row['session_year']== '2009'){?> selected="selected"<?php }?>>2009</option>
                                                                           <option value="2008" <?php if($row['session_year']== '2008'){?> selected="selected"<?php }?>>2008</option>
                                                                           <option value="2007" <?php if($row['session_year']== '2007'){?> selected="selected"<?php }?>>2007</option>
                                                                           <option value="2006" <?php if($row['session_year']== '2006'){?> selected="selected"<?php }?>>2006</option>
                                                                           <option value="2005" <?php if($row['session_year']== '2005'){?> selected="selected"<?php }?>>2005</option>
                                                                           <option value="2004" <?php if($row['session_year']== '2004'){?> selected="selected"<?php }?>>2004</option>
                                                                           <option value="2003" <?php if($row['session_year']== '2003'){?> selected="selected"<?php }?>>2003</option>
                                                                           <option value="2002" <?php if($row['session_year']== '2002'){?> selected="selected"<?php }?>>2002</option>
                                                                           <option value="2001" <?php if($row['session_year']== '2001'){?> selected="selected"<?php }?>>2001</option>
                                                                           <option value="2000" <?php if($row['session_year']== '2000'){?> selected="selected"<?php }?>>2000</option>
                                                                
                                                       		<option value="1999" <?php if($row['session_year']== '1999'){?> selected="selected"<?php }?>>1999</option>
                                                                <option value="1998" <?php if($row['session_year']== '1998'){?> selected="selected"<?php }?>>1998</option>
                                                                 <option value="1997" <?php if($row['session_year']== '1997'){?> selected="selected"<?php }?>>1997</option>
                                                                  <option value="1996" <?php if($row['session_year']== '1996'){?> selected="selected"<?php }?>>1996</option>
                                                                   <option value="1995" <?php if($row['session_year']== '1995'){?> selected="selected"<?php }?>>1995</option>
                                                                    <option value="1994" <?php if($row['session_year']== '1994'){?> selected="selected"<?php }?>>1994</option>
                                                                     <option value="1993" <?php if($row['session_year']== '1993'){?> selected="selected"<?php }?>>1993</option>
                                                                      <option value="1992" <?php if($row['session_year']== '1992'){?> selected="selected"<?php }?>>1992</option>
                                                                       <option value="1991" <?php if($row['session_year']== '1991'){?> selected="selected"<?php }?>>1991</option>
                                                                        <option value="1990" <?php if($row['session_year']== '1990'){?> selected="selected"<?php }?>>1990</option>
                                                                         <option value="1989" <?php if($row['session_year']== '1989'){?> selected="selected"<?php }?>>1989</option>
                                                                          <option value="1988" <?php if($row['session_year']== '1988'){?> selected="selected"<?php }?>>1988</option>
                                                                          <option value="1987" <?php if($row['session_year']== '1987'){?> selected="selected"<?php }?>>1987</option>
                                                                          <option value="1986" <?php if($row['session_year']== '1986'){?> selected="selected"<?php }?>>1986</option>
                                                                          <option value="1985" <?php if($row['session_year']== '1985'){?> selected="selected"<?php }?>>1985</option>
                                                                          <option value="1984" <?php if($row['session_year']== '1984'){?> selected="selected"<?php }?>>1984</option>
                                                                          <option value="1983" <?php if($row['session_year']== '1983'){?> selected="selected"<?php }?>>1983</option>
                                                                          <option value="1982" <?php if($row['session_year']== '1982'){?> selected="selected"<?php }?>>1982</option>
                                                                          <option value="1981" <?php if($row['session_year']== '1981'){?> selected="selected"<?php }?>>1981</option>
                                                                          <option value="1980" <?php if($row['session_year']== '1980'){?> selected="selected"<?php }?> >1980</option>
                                                            
                                                                   
                                                           
<!--                                                            <option value="<?php echo $session->id;?>" <?php if($session->id == $row['session_id']){?> selected="selected"<?php }?>><?php echo $session->session_name;?></option>-->
                                                            
                                                    
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
                                                     <input type="text" id="txtaddorganization" name="txtaddorganization" style="width:300px;display:none" class="span6" value="">
                                                     <input type="button" id="btnaddorganization" name="btnaddorganization" onclick="addorganization(this.value)" value="+" />
                                                    </div>
                                                      <script>
                                                      function addorganization(val)
                                                      {
                                                          if (val=='+')
                                                              {
                                                          document.getElementById("organization_id").style.display="none";
                                                          document.getElementById("txtaddorganization").style.display="block";
                                                           document.getElementById("btnaddorganization").value="Show List";
                                                              }
                                                              else
                                                                  {
                                                                      document.getElementById("organization_id").style.display="block";
                                                          document.getElementById("txtaddorganization").style.display="none";
                                                          document.getElementById("txtaddorganization").value=" ";
                                                           document.getElementById("btnaddorganization").value="+"; 
                                                                  }
                                                      }
                                                      </script>
                                                       
                                                  
                                                </div>
       
            </td>
            </td>
        </tr>
           <tr>
               <td>  <div class="control-group">
                                                    <label class="control-label" for="course_id">Course </label>

                                                   <div class="controls">
                                                      <select style="width:300px" id="course_id" name="course_id" class="span4">
                                                       		<option value="">Select</option>
                                                            <?php foreach($courses as $course){?>
                                                            <option value="<?php echo $course->id;?>" <?php if($course->id == $row['course_id']){?> selected="selected"<?php }?>><?php echo $course->course_name;?></option>
                                                            
                                                            <?php }?>
                                                       </select>
                                                     <input type="text" id="txtaddcourse" name="txtaddcourse" style="width:300px;display:none" class="span6" value="">
                                                     <input type="button" id="btnaddcourse" name="btnaddcourse" onclick="addcourse(this.value)" value="+" />
                                                    </div>
                                                      <script>
                                                      function addcourse(val)
                                                      {
                                                          if (val=='+')
                                                              {
                                                          document.getElementById("course_id").style.display="none";
                                                          document.getElementById("txtaddcourse").style.display="block";
                                                           document.getElementById("btnaddcourse").value="Show List";
                                                              }
                                                              else
                                                                  {
                                                                      document.getElementById("course_id").style.display="block";
                                                          document.getElementById("txtaddcourse").style.display="none";
                                                          document.getElementById("txtaddcourse").value=" ";
                                                           document.getElementById("btnaddcourse").value="+"; 
                                                                  }
                                                      }
                                                      </script>
                                                </div></td>
            <td>
                <div class="control-group">
                                                    <label class="control-label" for="course_id">Registration Fee </label>

                                                
                                                      <div class="controls">
                                                         <input type="text" style="width:300px" id="registration_fee" name="registration_fee" class="span6" value="<?php echo $row['registration_fee']?>">
                                                       
                                             
                                                    </div>
                                                </div>
               
            </td>
          
        </tr>
   
      
        
    
      </table>
    </td>
  </tr>
        
        <tr>
             <td colspan="3" style="color: red; font-size: 18px" height="25" align="left" valign="middle" bgcolor="#ADC9AD" class="black12bold">Office Information<span class="red12">*</span></td>
                 
        </tr>
  <tr>
    <td align="left" valign="top" bgcolor="#E4EDE4">
      <table width="100%" border="0" cellpadding="5" cellspacing="0" class="black14">
          
        <tr>
            <td>
                <div class="control-group">
                                                    <label class="control-label" for="organization_id">Organization</label>

                                                    <div class="controls">
                                                         <input type="text" style="width:300px" id="self_organization" name="self_organization" class="span6" value="<?php echo $row['self_organization']?>"">
                                                    

                                                    </div>
                                                </div>
                <div class="control-group">
                                                    <label class="control-label" for="total_experience">	Total Experience </label>

                                                    <div class="controls">
                                                         <input type="text" style="width:300px" id="total_experience" name="total_experience" class="span6" value="<?php echo $row['total_experience']?>"">
                                                       
                                                    </div>
                                                </div>
                 <div class="control-group">
                                                      <label class="control-label" for="id_designation">Designation :</label>
                                                <div class="controls">
                                                      <select id="id_designation" name="id_designation" class="span4" style="width:300px">
                                                       		<option value="">Select</option>
                                                            <?php foreach($designations as $designation){?>
                                                            <option value="<?php echo $designation->id;?>" <?php if($designation->id == $row['designation_id']){?> selected="selected"<?php }?>><?php echo $designation->designation;?></option>
                                                            
                                                            <?php }?>
                                                       </select>
                                                     <input type="text"  id="txtadddesignation" name="txtadddesignation" style="width:300px;display:none" class="span6" value="">
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
            </td>


            <td>
                     <div class="control-group">
                                                    <label class="control-label" for="teacher_short_name">Current Employeement </label>

                                                    <div class="controls">
                                                         <input type="text" style="width:300px" id="current_employeement" name="current_employeement" class="span6" value="<?php echo $row['current_employeement']?>"">
                                                       
                                                    </div>
                                                </div>
                <div class="control-group">
                                                    <label class="control-label" for="defaults">Current Employement Address </label>

                                                    <div class="controls">
                                                        <textarea id="current_employeement_address" style="width:300px; height:100px"name="current_employeement_address" class="span6"><?php echo $row['current_employeement_address']?></textarea>
                                                         
                                                       
                                                    </div>
                                                </div>
            </td>
            </td>
        </tr>
   
      
        
    
      </table>
    </td>
  </tr>
        
          </table></td>
        </tr>
       
    </table>
                                                
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