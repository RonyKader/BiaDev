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
                                           <form class="form-horizontal"  method="post" action="" name="frm" accept-charset="utf-8" enctype="multipart/form-data">
                                            	   <table style="width:100%">
      
        <tr>
             <td colspan="3" style="color: red; font-size: 18px" height="25" align="left" valign="middle" bgcolor="#ADC9AD" class="black12bold">Basic Student Information<span class="red12">*</span></td>
                 
        </tr>
  <tr>
    <td align="left" valign="top" bgcolor="#E4EDE4">
      <table width="100%" border="0" cellpadding="5" cellspacing="0" class="black14">
          
        <tr>
            <td>
                
                                                    <label class="control-label" for="registration_no">Registration No </label>

                                                    <div class="controls">
                                                        <input type="text" readonly style="width:300px" id="registration_no" name="registration_no" class="span6"  value="<?php echo $row["registration_no"];?>">
                                                       
                                                    </div>
                                                    <br>
              
                                                    <label class="control-label" for="student_name">Participant -dddd </label>

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
            <td><script>
                function registration()
                {
                    
                    var regyear=(document.getElementById("registration_no").value);
                    regyear=regyear.substring(0,4);
                     var regno=(document.getElementById("registration_no").value);
                  if(document.getElementById("registration_no").value.length>9) 
                  regno=regno.substring(6,11);
                  else
                     regno=regno.substring(4,9);  
                    
                 
                    var session=document.getElementById("session_month").value;
                    if (session=='May')
                        session='05';
                     if (session=='Oct')
                        session='10';
                    
                     document.getElementById("registration_no").value=regyear+session+regno;
                    
                   
                }
                </script>
               <div class="control-group">
                                                    <label class="control-label" for="course_id">Session </label>

                                                   <div class="controls">
                                                      <select style="width:100px"  id="session_month" name="session_month"   class="span4">
                                                           <?php if ($row['approved_status']==1) {?>
                                                           <option value="<?php echo $row['session_month'] ?>" ><?php echo $row['session_month'] ?></option>
                                                           <?php } else {?>
                                                                    <option value="May" <?php if($row['session_month']== 'May'){?> selected="selected"<?php }?>>May</option>
                                                                        <option value="Oct" <?php if($row['session_month']== 'Oct'){?> selected="selected"<?php }?>>Oct</option>
                                                           <?php } ?>
                                                           
<!--                                                            <option value="<?php echo $session->id;?>" <?php if($session->id == $row['session_id']){?> selected="selected"<?php }?>><?php echo $session->session_name;?></option>-->
                                                            
                                                    
                                                       </select>
                                                        <select style="width:100px" id="session_year" name="session_year" class="span4">
                                                              <?php if($action == 'edit') {?>
                                                            
                                                                 <option value="<?php echo $row['session_year'];?>" selected   selected="selected"><?php echo $row['session_year'];?></option>
                                                                 
                                                                 <?php }  else {?>
                                                                 <option value="<?php echo date("Y");?>" selected  <?php if($row['session_year']==date("Y") ){?> selected="selected"<?php }?>><?php echo date("Y");?></option>
                                                                    
                                                                 <?php } ?>
                                                                   
                                                           
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
                                                            <?php foreach($organizations as $organization){if ($organization->organization_group==1){?>
                                                            <option value="<?php echo $organization->id;?>" <?php if($organization->id == $row['organization_id']){?> selected="selected"<?php }?>><?php echo $organization->organization_name;?></option>
                                                            
                                                            <?php }}?>
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
          <tr>
             <td colspan="3" style="color: red; font-size: 18px" height="25" align="left" valign="middle" bgcolor="#ADC9AD" class="black12bold">Personal Information<span class="red12">*</span></td>
                 
        </tr>
  <tr>
    <td align="left" valign="top" bgcolor="#E4EDE4">
      <table width="100%" border="0" cellpadding="5" cellspacing="0" class="black14">
          
        <tr>
            <td>
                
                 <div class="control-group">
                                                    <label class="control-label" for="defaults">Date of Birth</label>

                                                    <div style="margin-top:-40px" class="controls dp input-append date" id="datetimepicker" >
                                                         <input style="width:270px" type="text" id="date_of_birth" name="date_of_birth" style="width:100px" value="<?php echo $row['date_of_birth']?>">
                                                    <span class="add-on">
                                                     <i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
                                                    </span>
                                                       
                                                    </div>
                                                </div>
                
                <div class="control-group">
                                                    <label class="control-label" for="defaults">Emergency Contact No </label>

                                                    <div class="controls">
                                                         <input type="text" style="width:300px" id="emergency_contact_no" name="emergency_contact_no" class="span6" value="<?php echo $row['emergency_contact_no']?>">
                                                       
                                                    </div>
                                                </div>
                 <div class="control-group">
                                                    <label class="control-label" for="defaults">Emergency Contact Name </label>

                                                    <div class="controls">
                                                         <input type="text" style="width:300px" id="emergency_contact_name" name="emergency_contact_name" class="span6" value="<?php echo $row['emergency_contact_name']?>">
                                                       
                                                    </div>
                                                </div>
            </td>
            <td>
                     <div class="control-group">
                                                    <label class="control-label" for="Mobile_no">Mobile No </label>

                                                    <div class="controls">
                                                         <input type="text" style="width:300px" id="mobile_no" name="mobile_no" class="span6" value="<?php echo $row['mobile_no']?>">
                                                       
                                                    </div>
                                                </div>
                <div class="control-group">
                                                    <label class="control-label" for="email">Email </label>

                                                    <div class="controls">
                                                         <input type="text" style="width:300px" id="email" name="email" class="span6" value="<?php echo $row['email']?>">
                                                       
                                                    </div>
                                                </div>
                 <div class="control-group">
                                                    <label class="control-label" for="blood_group">Blood Group </label>

                                                    <div class="controls">
                                                            <select style="width:300px" id="blood_group" name="blood_group" class="span4">
                                                       		<option value="">select</option>
                                    <option <?php if($row['blood_group']== 'A+'){?> selected="selected"<?php }?> value="A+">A+</option>
                                    <option <?php if($row['blood_group']== 'B+'){?> selected="selected"<?php }?> value="B+">B+</option>
                                    <option <?php if($row['blood_group']== 'O+'){?> selected="selected"<?php }?> value="O+">O+</option>
                                    <option <?php if($row['blood_group']== 'AB+'){?> selected="selected"<?php }?> value="O+" value="AB+">AB+</option>
                                    <option <?php if($row['blood_group']== 'AB-'){?> selected="selected"<?php }?> value="O+"value="AB-">AB-</option>
                                    <option <?php if($row['blood_group']== 'O-'){?> selected="selected"<?php }?> value="O+" value="O-">O-</option>
                                    <option <?php if($row['blood_group']== 'B-'){?> selected="selected"<?php }?> value="O+" value="B-">B-</option>
                                    <option <?php if($row['blood_group']== 'A-'){?> selected="selected"<?php }?> value="O+" value="A-">A-</option>
                                                            
                                                       </select>
                                                       
                                                    </div>
                                                </div>
            </td>
            </td>
        </tr>
        <tr>
            <td>
                <div class="control-group">
                                                    <label class="control-label" for="gender">Gender </label>

                                                    <div class="controls">
                                                            <select style="width:300px" id="gender" name="gender" class="span4">
                                                       		<option <?php if($row['gender']== 'Male'){?> selected="selected"<?php }?> value="Male">Male</option>
                                                                <option <?php if($row['gender']== 'Female'){?> selected="selected"<?php }?> value="Female">Female</option>
                                                               
                                                            
                                                       </select>
                                                       
                                                    </div>
                                                </div>
                <div class="control-group">
                                                    <label class="control-label" for="religion">Religion </label>

                                                    <div class="controls">
                                                          <select style="width:300px" id="religion" name="religion" class="span4">
                                                       		<option <?php if($row['religion']== 'Islam'){?> selected="selected"<?php }?> value="Islam">Islam</option>
                                                                <option <?php if($row['religion']== 'Hindu'){?> selected="selected"<?php }?> value="Hindu">Hindu</option>
                                                                  <option <?php if($row['religion']== 'Christian'){?> selected="selected"<?php }?> value="Christian">Christian</option>
                                                                   <option <?php if($row['religion']== 'Others'){?> selected="selected"<?php }?> value="Others">Others</option>
                                                            
                                                       </select>
                                                       
                                                    </div>
                                                </div>
            </td>
            <td>
       <div class="control-group">
                                                    <label class="control-label" for="country">Country </label>

                                                    <div class="controls">
                                                         <input type="text" style="width:300px" id="country" name="country" class="span6" value="<?php echo $row['country']?>">
                                                       
                                                    </div>
                                                </div>
                <div class="control-group">
                                                    <label class="control-label" for="nationality">Nationality </label>

                                                    <div class="controls">
                                                         <input type="text" style="width:300px" id="nationality" name="nationality" class="span6" value="<?php echo $row['nationality']?>"">
                                                       
                                                    </div>
                                                </div>
            </td>
        </tr>
         <tr>
            <td>
                <div class="control-group">
                                                    <label class="control-label" for="marital_status">Marital Status </label>

                                                    <div class="controls">
                                                            <select style="width:300px" id="marital_status" name="marital_status" class="span4">
                                                       		<option <?php if($row['marital_status']== 'Married'){?> selected="selected"<?php }?> value="Married">Married</option>
                                                                <option <?php if($row['marital_status']== 'Unmarried'){?> selected="selected"<?php }?> value="Unmarried">Unmarried</option>
                                                              
                                                            
                                                       </select>
                                                       
                                                    </div>
                                                </div>
              
            </td>
            <td>
       <div class="control-group">
                                                    <label class="control-label" for="nationalid">National ID  </label>

                                                    <div class="controls">
                                                         <input type="text" style="width:300px" id="nationalid" name="nationalid" class="span6" value="<?php echo $row['nationalid']?>"">
                                                       
                                                    </div>
                                                </div>
                 
               
            </td>
        </tr>
      
        
    
      </table>
    </td>
  </tr>
  
  
  
  <tr>
          <td colspan="3" align="left" valign="middle" bgcolor="#D8E7D8" class="black14">
              <table width="102.50%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td width="50%" align="left" valign="middle" class="bdr02">
                  <table width="100%" border="0" cellpadding="3" cellspacing="0" class="black12">
                <tr>
                  <td td height="25" colspan="2" align="left" style="color: red; font-size: 18px" valign="top" bgcolor="#ADC9AD" class="black14">Present Address<span class="red12">*</span></td>
                </tr>
				
                <tr>
                  <td align="left" valign="middle">
				Address
                  <td  align="left" valign="middle">
                    <textarea style="width:300px" name="present_address_village" id="present_address_village"><?php echo $row['present_address_village']?></textarea>
                  </td>
                </tr>
                <tr>
                  <td align="left" valign="middle">District</td>
                   <td align="left" valign="middle" > 
                       
                   
                        
                                                      <select style="width: 300px;" id="present_address_district_code" name="present_address_district_code" onchange="district_select_after_upzilla(value)" class="span4">
                                                       		<option value="">Select</option>
                                                            <?php foreach($districts as $district){?>
                                                            <option value="<?php echo $district->district_code?>" <?php if($district->district_code == $row['present_address_district_code']){?> selected="selected"<?php }?>><?php echo $district->district_name;?></option>
                                                            
                                                            <?php }?>
                                                       </select>
                                                    
                       
                   
                   </td>
                </tr>
                <tr>
                  <td align="left" valign="top">P.S./Upazila <img src="images/loader.gif" border="0" align="absmiddle" name ="loading1" style="visibility:hidden"/></td>
                  <td align="left" valign="middle" bgcolor="#E4EDE4"> 
                               
                                                      <select style="width: 300px;" id="present_address_upzilla_code" name="present_address_upzilla_code" class="span4">
                                                       		<option value="">Select</option>
                                                            <?php $i=1;foreach($upzillas as $upzilla){?>
                                                            <option style="display:none" name="<?php echo $upzilla->upzilla_code?>" id="<?php echo $i?>" value="<?php echo $upzilla->district_code.'-'.$upzilla->upzilla_code;?>" <?php if($upzilla->upzilla_code == $row['present_address_upzilla_code']){?> selected="selected"<?php }?>><?php echo $upzilla->upzilla_name;?></option>
                                                            
                                                            <?php $i=$i+1; }?>
                                                       </select>
                                                    
                  </td>
                </tr>
                <tr>
                  <td align="left" valign="middle">Post Office</td>
                  <td align="left" valign="middle">
                    <input name="present_address_post_office" style="width:300px" type="text" class="textfield06" id="present_address_post_office" value="<?php echo $row['present_address_post_office']?>"/>
                  </td>
                </tr>
                <tr>
                  <td align="left" valign="middle">Post Code</td>
                  <td align="left" valign="middle">
                    <input name="present_address_post_code"  style="width:300px" type="text" class="textfield06" id="present_address_post_code" value="<?php echo $row['present_address_post_code']?>"/>
                  </td>
                </tr>
               
              </table></td>
              <td width="1%" align="left" valign="middle">&nbsp;</td>
              <td width="100%" align="left" valign="middle" class="bdr02"><table width="100%" border="0" cellpadding="3" cellspacing="0" class="black12">
                <tr>
                  <td td height="25" colspan="2" align="left" style="color: red; font-size: 18px" valign="middle" bgcolor="#ADC9AD" class="black14">Permanent Address<span class="red12"></span> <span class="black11i"></span></td>
                </tr>
				
                <tr>
                  <td align="left" valign="middle">
				 Address</td>
                  <td style="width:300px" align="left" valign="middle">
                    <textarea  style="width:300px" name="permanent_address_village" cols="45" rows="2" class="textfield06" id="permanent_address_village" value="<?php echo $row['permanent_address_village']?>"><?php echo $row['permanent_address_village']?></textarea>
                  </td>
                </tr>
                  <tr>
                  <td align="left" valign="middle">District</td>
                   <td align="left" valign="middle" > 
                       
                   
                        
                                                      <select style="width: 300px;" id="permanent_address_district_code" name="permanent_address_district_code" onchange="permanent_district_select_after_upzilla(value)" class="span4">
                                                       		<option value="">Select</option>
                                                            <?php foreach($districts as $district){?>
                                                            <option value="<?php echo $district->district_code?>" <?php if($district->district_code == $row['permanent_address_district_code']){?> selected="selected"<?php }?>><?php echo $district->district_name;?></option>
                                                            
                                                            <?php }?>
                                                       </select>
                                                    
                       
                   
                   </td>
                </tr>
                <tr>
                  <td align="left" valign="top">P.S./Upazila <img src="images/loader.gif" border="0" align="absmiddle" name ="loading1" style="visibility:hidden"/></td>
                  <td align="left" valign="middle" bgcolor="#E4EDE4"> 
                               
                                                      <select style="width: 300px;" id="permanent_address_upzilla_code" name="permanent_address_upzilla_code" class="span4">
                                                       		<option value="">Select</option>
                                                            <?php $i=1;foreach($upzillas as $upzilla){?>
                                                            <option style="display:none" name="<?php echo $upzilla->upzilla_code?>" id="<?php echo "p".$i?>" value="<?php echo $upzilla->district_code.'-'.$upzilla->upzilla_code;?>" <?php if($upzilla->upzilla_code == $row['permanent_address_upzilla_code']){?> selected="selected"<?php }?>><?php echo $upzilla->upzilla_name;?></option>
                                                            
                                                            <?php $i=$i+1; }?>
                                                       </select>
                                                    
                  </td>
                </tr>
                <tr>
                  <td align="left" valign="middle">Post Office</td>
                  <td align="left" valign="middle">
                    <input name="permanent_address_post_office" style="width:300px" type="text" class="textfield06" id="permanent_address_post_office" value="<?php echo $row['permanent_address_post_office']?>"/>
                  </td>
                </tr>
                <tr>
                  <td align="left" valign="middle">Post Code</td>
                  <td align="left" valign="middle">
                    <input name="permanent_address_post_code" style="width:300px" type="text" class="textfield06" id="permanent_address_post_code" value="<?php echo $row['permanent_address_post_code']?>"/>
                  </td>
                </tr>
              </table></td>
              <td width="3%" align="left" valign="middle">&nbsp;</td>
            </tr>
          </table></td>
        </tr>
          <tr>
          <td colspan="3" align="left" valign="middle" bgcolor="#D8E7D8" class="black14"><table width="102.50%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td width="100%" align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td width="50%" height="30" align="left" style="color: red; font-size: 18px" valign="middle">Academic Qualifications:</td>
                  <td width="1%" height="30" align="left" valign="middle">&nbsp;</td>
                  <td width="49%" height="30" align="left" valign="middle">&nbsp;</td>
                </tr>
                <tr>
                  <td align="left" valign="top" class="bdr02"><table width="100%" border="0" cellpadding="3" cellspacing="0">
                    <tr>
                      <td height="25" bgcolor="#ADC9AD" style="color: red; font-size: 18px" class="black12bold">SSC or Equivalent Level<span class="red12">*</span></td>
                    </tr>
                    <tr>
                      <td><table width="100%" border="0" cellpadding="3" cellspacing="0" class="black12">
                        <tr>
                          <td width="50%" align="left" valign="middle">Examination</td>
                          <td width="%" align="left" valign="middle"><select  style="width:350px" name="ssc_examination" class="textfield06a" id="ssc_examination">
                            <option <?php if($row['ssc_examination']== '0'){?> selected="selected"<?php }?>  value="0">Select One</option>
							<option <?php if($row['ssc_examination']== '1'){?> selected="selected"<?php }?> value="1">S.S.C</option>
                                                        <option <?php if($row['ssc_examination']== '2'){?> selected="selected"<?php }?> value="2">Dakhil</option>
                                                        <option <?php if($row['ssc_examination']== '3'){?> selected="selected"<?php }?> value="3">S.S.C Vocational</option>
                                                        <option <?php if($row['ssc_examination']== '4'){?> selected="selected"<?php }?> value="4">O Level/Cambridge</option>
                                                        <option <?php if($row['ssc_examination']== '4'){?> selected="selected"<?php }?> value="5">S.S.C Equivalent</option>
                          </select></td>
                        </tr>
                        <tr>
                          <td align="left" valign="middle">Board</td>
                          <td align="left" valign="middle"><select style="width:350px"  name="ssc_board" class="textfield06a" id="ssc_board">
                            <option >Select One</option>
                            <option <?php if($row['ssc_board']== '1'){?> selected="selected"<?php }?> value="1">Dhaka</option>
                            <option <?php if($row['ssc_board']== '2'){?> selected="selected"<?php }?> value="2">Comilla</option>
                            <option <?php if($row['ssc_board']== '3'){?> selected="selected"<?php }?> value="3">Rajshahi</option>
                            <option <?php if($row['ssc_board']== '4'){?> selected="selected"<?php }?> value="4">Jessore</option>
                            <option <?php if($row['ssc_board']== '5'){?> selected="selected"<?php }?> value="5">Chittagong</option>
                            <option <?php if($row['ssc_board']== '6'){?> selected="selected"<?php }?> value="6">Barisal</option>
                            <option <?php if($row['ssc_board']== '7'){?> selected="selected"<?php }?> value="7">Sylhet</option>
                            <option <?php if($row['ssc_board']== '8'){?> selected="selected"<?php }?> value="8">Dinajpur</option>
                            <option <?php if($row['ssc_board']== '9'){?> selected="selected"<?php }?> value="9">Madrasah</option>
                            <option <?php if($row['ssc_board']== '10'){?> selected="selected"<?php }?> value="10">Technical</option>
                            <option <?php if($row['ssc_board']== '11'){?> selected="selected"<?php }?> value="11">Cambridge International - IGCE</option>
                            <option <?php if($row['ssc_board']== '12'){?> selected="selected"<?php }?> value="12">Edexcel International</option>
                            <option <?php if($row['ssc_board']== '13'){?> selected="selected"<?php }?> value="23">Others</option>
                          </select></td>
                        </tr>
						 <tr>
                          <td height="25" align="left" valign="middle">Roll No</td>
                          <td height="25" align="left" valign="middle"><input style="width:350px"  name="ssc_rollno" type="text" class="textfield07b" id="ssc_rollno" value="<?php echo $row['ssc_rollno']; ?>" /></td>
                        </tr>
                        <tr>
                          <td align="left" valign="middle">Result</td>
                          <td align="left" valign="middle"><table width="100%" border="0" cellpadding="0" cellspacing="1" class="black14" style="margin-bottom:1px;">
                            <tr>
                              <td align="left" valign="middle"><select style="width:280px"  name="ssc_result" class="textfield07" id="ssc_result" onchange="Show_GpaTextBox(this.id,'result_gpa1');" >
                                <option value="0" selected="selected">Select</option>
                                <option <?php if($row['ssc_result']== '1'){?> selected="selected"<?php }?> value="1">1st Division</option>
                                <option <?php if($row['ssc_result']== '2'){?> selected="selected"<?php }?> value="2">2nd Division</option>
                                <option <?php if($row['ssc_result']== '3'){?> selected="selected"<?php }?> value="3">3rd Division</option>
                                <option <?php if($row['ssc_result']== '4'){?> selected="selected"<?php }?> value="4">GPA(out of 4)</option>
                                <option <?php if($row['ssc_result']== '5'){?> selected="selected"<?php }?> value="5">GPA(out of 5)</option>
                              </select>
                               <input style="width:60px"  type="text" id="ssc_result_point" name="ssc_result_point" value="<?php echo $row['ssc_result_point']; ?>"/>
                              </td>
                             
                            </tr>
                          </table></td>
                        </tr>
                        <tr>
                          <td align="left" valign="middle">Group</td>
                          <td align="left" valign="middle"><select style="width:350px"  name="ssc_group" class="textfield07" id="ssc_group">
                            <option selected="selected" value="0">Select One</option>
                            <option <?php if($row['ssc_group']== '1'){?> selected="selected"<?php }?> value="1">Science</option>
                            <option <?php if($row['ssc_group']== '2'){?> selected="selected"<?php }?> value="2">Humanities</option>
                            <option <?php if($row['ssc_group']== '3'){?> selected="selected"<?php }?> value="3">Commerce</option>
                            <option <?php if($row['ssc_group']== '4'){?> selected="selected"<?php }?> value="4">Others</option>
                          </select></td>
                        </tr>
                        <tr>
                          <td align="left" valign="middle">Passing Year</td>
                          <td align="left" valign="middle">
                            <input style="width:350px"  name="ssc_passing_year" type="text" class="textfield07b" id="ssc_passing_year" value="<?php echo $row['ssc_passing_year']; ?>" />
                          </td>
                        </tr>
                      </table></td>
                    </tr>
                  </table></td>
                  <td rowspan="2" align="left" valign="middle">&nbsp;</td>
                  <td align="left" valign="top" class="bdr02"><table width="100%" border="0" cellspacing="0" cellpadding="3">
                    <tr>
                      <td height="25" bgcolor="#ADC9AD" style="color: red; font-size: 18px" class="black12bold">HSC or Equivalent Level<span class="red12">*</span></td>
                    </tr>
                    <tr>
                    <td align="left" valign="top" class="bdr02"><table width="100%" border="0" cellpadding="3" cellspacing="0">
                    
                    <tr>
                        <td><table width="100%" border="0" cellpadding="3" cellspacing="0" class="black12">
                        <tr>
                          <td width="50%" align="left" valign="middle">Examination</td>
                          <td width="%" align="left" valign="middle"><select  style="width:350px" name="hsc_examination" class="textfield06a" id="hsc_examination">
                            <option <?php if($row['hsc_examination']== '0'){?> selected="selected"<?php }?>  value="0">Select One</option>
							<option <?php if($row['hsc_examination']== '1'){?> selected="selected"<?php }?> value="1">S.S.C</option>
                                                        <option <?php if($row['hsc_examination']== '2'){?> selected="selected"<?php }?> value="2">Dakhil</option>
                                                        <option <?php if($row['hsc_examination']== '3'){?> selected="selected"<?php }?> value="3">S.S.C Vocational</option>
                                                        <option <?php if($row['hsc_examination']== '4'){?> selected="selected"<?php }?> value="4">O Level/Cambridge</option>
                                                        <option <?php if($row['hsc_examination']== '4'){?> selected="selected"<?php }?> value="5">S.S.C Equivalent</option>
                          </select></td>
                        </tr>
                        <tr>
                          <td align="left" valign="middle">Board</td>
                          <td align="left" valign="middle"><select style="width:350px"  name="hsc_board" class="textfield06a" id="hsc_board">
                            <option >Select One</option>
                            <option <?php if($row['hsc_board']== '1'){?> selected="selected"<?php }?> value="1">Dhaka</option>
                            <option <?php if($row['hsc_board']== '2'){?> selected="selected"<?php }?> value="2">Comilla</option>
                            <option <?php if($row['hsc_board']== '3'){?> selected="selected"<?php }?> value="3">Rajshahi</option>
                            <option <?php if($row['hsc_board']== '4'){?> selected="selected"<?php }?> value="4">Jessore</option>
                            <option <?php if($row['hsc_board']== '5'){?> selected="selected"<?php }?> value="5">Chittagong</option>
                            <option <?php if($row['hsc_board']== '6'){?> selected="selected"<?php }?> value="6">Barisal</option>
                            <option <?php if($row['hsc_board']== '7'){?> selected="selected"<?php }?> value="7">Sylhet</option>
                            <option <?php if($row['hsc_board']== '8'){?> selected="selected"<?php }?> value="8">Dinajpur</option>
                            <option <?php if($row['hsc_board']== '9'){?> selected="selected"<?php }?> value="9">Madrasah</option>
                            <option <?php if($row['hsc_board']== '10'){?> selected="selected"<?php }?> value="10">Technical</option>
                            <option <?php if($row['hsc_board']== '11'){?> selected="selected"<?php }?> value="11">Cambridge International - IGCE</option>
                            <option <?php if($row['hsc_board']== '12'){?> selected="selected"<?php }?> value="12">Edexcel International</option>
                            <option <?php if($row['hsc_board']== '13'){?> selected="selected"<?php }?> value="23">Others</option>
                          </select></td>
                        </tr>
						 <tr>
                          <td height="25" align="left" valign="middle">Roll No</td>
                          <td height="25" align="left" valign="middle"><input style="width:350px"  name="hsc_rollno" type="text" class="textfield07b" id="hsc_rollno" value="<?php echo $row['hsc_rollno']; ?>" /></td>
                        </tr>
                        <tr>
                          <td align="left" valign="middle">Result</td>
                          <td align="left" valign="middle"><table width="100%" border="0" cellpadding="0" cellspacing="1" class="black14" style="margin-bottom:1px;">
                            <tr>
                              <td align="left" valign="middle"><select style="width:280px"  name="hsc_result" class="textfield07" id="hsc_result" onchange="Show_GpaTextBox(this.id,'result_gpa1');" >
                                <option value="0" selected="selected">Select</option>
                                <option <?php if($row['hsc_result']== '1'){?> selected="selected"<?php }?> value="1">1st Division</option>
                                <option <?php if($row['hsc_result']== '2'){?> selected="selected"<?php }?> value="2">2nd Division</option>
                                <option <?php if($row['hsc_result']== '3'){?> selected="selected"<?php }?> value="3">3rd Division</option>
                                <option <?php if($row['hsc_result']== '4'){?> selected="selected"<?php }?> value="4">GPA(out of 4)</option>
                                <option <?php if($row['hsc_result']== '5'){?> selected="selected"<?php }?> value="5">GPA(out of 5)</option>
                              </select>
                               <input style="width:60px"  type="text" id="hsc_result_point" name="hsc_result_point" value="<?php echo $row['hsc_result_point']; ?>"/>
                              </td>
                             
                            </tr>
                          </table></td>
                        </tr>
                        <tr>
                          <td align="left" valign="middle">Group</td>
                          <td align="left" valign="middle"><select style="width:350px"  name="hsc_group" class="textfield07" id="hsc_group">
                            <option selected="selected" value="0">Select One</option>
                            <option <?php if($row['hsc_group']== '1'){?> selected="selected"<?php }?> value="1">Science</option>
                            <option <?php if($row['hsc_group']== '2'){?> selected="selected"<?php }?> value="2">Humanities</option>
                            <option <?php if($row['hsc_group']== '3'){?> selected="selected"<?php }?> value="3">Commerce</option>
                            <option <?php if($row['hsc_group']== '4'){?> selected="selected"<?php }?> value="4">Others</option>
                          </select></td>
                        </tr>
                        <tr>
                          <td align="left" valign="middle">Passing Year</td>
                          <td align="left" valign="middle">
                            <input style="width:350px"  name="hsc_passing_year" type="text" class="textfield07b" id="hsc_passing_year" value="<?php echo $row['hsc_passing_year']; ?>" />
                          </td>
                        </tr>
                      </table></td>
                    </tr>
                  </table></td>
                   
                    </tr>
                  </table></td>

                </tr>
                <tr>
                  <td align="left" valign="middle" class="gap01">&nbsp;</td>
                  <td align="left" valign="middle" class="gap01">&nbsp;</td>
                </tr>
              </table></td>
              <td width="3%" align="left" valign="top">&nbsp;</td>
            </tr>
            <tr>
              <td align="left" valign="top" class="bdr02"><table width="100%" border="0" cellpadding="3" cellspacing="0" class="black12">
                <tr>
                  <td colspan="3" height="25" align="left" valign="middle" style="color: red; font-size: 18px"  bgcolor="#ADC9AD" class="black12bold">Graduation Level<span class="red12">*</span></td>
                  <td align="left" valign="middle" style="color: red; font-size: 18px" bgcolor="#ADC9AD" class="subblack14">&nbsp;</td>
                </tr>
                <tr>
                  <td width="19%" align="left" valign="top">Examination</td>
                  <td width="34%" align="left" valign="middle">
                    <select  name="graduation_examination" style="width:300px" class="textfield06a" id="graduation_examination" onchange="get_sub_gra(this), Show_ExamTextBox(this.id,'other_exam3'), changeVisibility3(this);">
                      <option  value="0" selected="selected">Select One</option>
                      <option <?php if($row['graduation_examination']== '1'){?> selected="selected"<?php }?>  value="1">B.Sc (Engineering/Architecture)</option>
                      <option <?php if($row['graduation_examination']== '2'){?> selected="selected"<?php }?>  value="2">B.Sc (Agricultural Science)</option>
                      <option <?php if($row['graduation_examination']== '3'){?> selected="selected"<?php }?>  value="3">M.B.B.S/B.D.S</option>
                      <option <?php if($row['graduation_examination']== '4'){?> selected="selected"<?php }?>  value="4">Honours</option>
                      <option <?php if($row['graduation_examination']== '5'){?> selected="selected"<?php }?>  value="5">Pass Course</option>
                      <option <?php if($row['graduation_examination']== '6'){?> selected="selected"<?php }?>  value="6">A & B Section of A.M.I.E</option>
                      <option <?php if($row['graduation_examination']== '7'){?> selected="selected"<?php }?>  value="7">Others</option>
                    </select>
					
                  </td>
                  <td width="17%" align="left" valign="top">Result</td>
                  <td width="30%" align="left" valign="top">
                    <table width="100%" border="0" cellpadding="0" cellspacing="1" class="black14" style="margin-bottom:1px;">
                    <tr>
                      <td width="100%" align="left" valign="middle">
                        <select style="width:200px" name="graduation_result" class="textfield07" id="graduation_result" onchange="Show_GpaTextBox(this.id,'result_gpa3');" >
                          	<option value="0" selected="selected">Select One</option>
                          	<option  <?php if($row['graduation_result']== '1'){?> selected="selected"<?php }?> value="1">1st Class</option>
							<option  <?php if($row['graduation_result']== '2'){?> selected="selected"<?php }?> value="2">2nd Class</option>
							<option <?php if($row['graduation_result']== '3'){?> selected="selected"<?php }?> value="3">3rd Class</option>
							<option <?php if($row['graduation_result']== '4'){?> selected="selected"<?php }?> value="4">GPA/CGPA in scale 4</option>
							<option <?php if($row['graduation_result']== '5'){?> selected="selected"<?php }?> value="5">GPA/CGPA in scale 5</option>
							<option <?php if($row['graduation_result']== '6'){?> selected="selected"<?php }?> value="6">Pass</option>
                        </select><input type="text" style="width:88px" id="graduation_result_point" name="graduation_result_point" value="<?php echo $row['graduation_result_point']?>"/>
                      
                      </td>
                      
                    <td width="20%" align="left" valign="middle" id="Caption_Marks3" class="black11">&nbsp;</td>
					</tr>
                  </table>
                  </td>
                </tr>
                <tr>
                  <td align="left" valign="top">Subject/Degree <img src="images/loader.gif" border="0" align="absmiddle" name ="loading3" style="visibility:hidden"/></td>
                     <td align="left" valign="top">
                       <select style="width:300px" id="graduation_subject" name="graduation_subject" class="span4">
                                                       		<option value="">Select</option>
                                                            
                                                            
                                                             <?php foreach($subjects as $subject){ if ($subject->subject_group==2){?>
                                                            <option    value="<?php echo $subject->id;?>" <?php if($subject->id == $row['graduation_subject']){?> selected="selected"<?php }?>><?php echo $subject->subject;?></option>
                                                            
                                                             <?php  }}?>
                                                       </select>
					
                  </td>
                  <td align="left" valign="top">Passing Year</td>
                  <td align="left" valign="top">
                     <input style="width:350px"  name="graduation_passing_year" type="text" class="textfield07b" id="graduation_passing_year" value="<?php echo $row['graduation_passing_year']; ?>" />
                  </td>
                </tr>
                <tr>
                  <td align="left" valign="top">University/Institute</td>
                  <td align="left" valign="middle">   <select style="width:300px" id="graduation_university" name="graduation_university" class="span4">
                                                       		<option value="">Select</option>
                                                            <?php foreach($organizations as $organization){if ($organization->organization_group==2){?>
                                                            <option value="<?php echo $organization->id;?>" <?php if($organization->id == $row['graduation_university']){?> selected="selected"<?php }?>><?php echo $organization->organization_name;?></option>
                                                            
                                                            <?php }}?>
                                                       </select>
					 </td>
                  <td align="left" valign="top">Course Duration</td>
                  <td align="left" valign="top">
                    <select style="width:300px" name="graduation_course_duration" class="textfield07" id="graduation_course_duration">
                      <option selected="selected" value="0">Select One</option>
                      <option <?php if($row['graduation_course_duration']== '01'){?> selected="selected"<?php }?> value="01">01 Year</option>
                      <option <?php if($row['graduation_course_duration']== '02'){?> selected="selected"<?php }?> value="02">02 Years</option>
                      <option <?php if($row['graduation_course_duration']== '03'){?> selected="selected"<?php }?> value="03">03 Years</option>
                      <option <?php if($row['graduation_course_duration']== '04'){?> selected="selected"<?php }?> value="04">04 Years</option>
                      <option <?php if($row['graduation_course_duration']== '05'){?> selected="selected"<?php }?> value="05">05 Years</option>
                    </select>
                  </td>
                </tr>
              </table>
			  </td>
              <td align="left" valign="top">&nbsp;</td>
            </tr>
			<tr>
              <td align="left" valign="top">&nbsp;</td>
              <td align="left" valign="top">&nbsp;</td>
            </tr>
            <tr>
              <td align="left" valign="top" class="bdr02"><table width="100%" border="0" cellpadding="3" cellspacing="0" class="black12">
                <tr>
                     
                  <td colspan="3" height="25" style="color: red; font-size: 18px"  align="left" valign="middle" bgcolor="#ADC9AD" class="black12bold">Masters Degree </td>
                  <td align="left" valign="middle" bgcolor="#ADC9AD" class="subblack14">&nbsp;</td>
                </tr>
          <tr>
                  <td width="19%" align="left" valign="top">Examination</td>
                  <td width="34%" align="left" valign="middle">
                    <select  name="masters_examination" style="width:300px" class="textfield06a" id="masters_examination" onchange="get_sub_gra(this), Show_ExamTextBox(this.id,'other_exam3'), changeVisibility3(this);">
                      <option  value="0" selected="selected">Select One</option>
                      <option <?php if($row['masters_examination']== '1'){?> selected="selected"<?php }?>  value="1">B.Sc (Engineering/Architecture)</option>
                      <option <?php if($row['masters_examination']== '2'){?> selected="selected"<?php }?>  value="2">B.Sc (Agricultural Science)</option>
                      <option <?php if($row['masters_examination']== '3'){?> selected="selected"<?php }?>  value="3">M.B.B.S/B.D.S</option>
                      <option <?php if($row['masters_examination']== '4'){?> selected="selected"<?php }?>  value="4">Honours</option>
                      <option <?php if($row['masters_examination']== '5'){?> selected="selected"<?php }?>  value="5">Pass Course</option>
                      <option <?php if($row['masters_examination']== '6'){?> selected="selected"<?php }?>  value="6">A & B Section of A.M.I.E</option>
                      <option <?php if($row['masters_examination']== '7'){?> selected="selected"<?php }?>  value="7">Others</option>
                    </select>
					
                  </td>
                  <td width="17%" align="left" valign="top">Result</td>
                  <td width="30%" align="left" valign="top">
                    <table width="100%" border="0" cellpadding="0" cellspacing="1" class="black14" style="margin-bottom:1px;">
                    <tr>
                      <td width="100%" align="left" valign="middle">
                        <select style="width:200px" name="masters_result" class="textfield07" id="masters_result" onchange="Show_GpaTextBox(this.id,'result_gpa3');" >
                          	<option value="0" selected="selected">Select One</option>
                          	<option  <?php if($row['masters_result']== '1'){?> selected="selected"<?php }?> value="1">1st Class</option>
							<option  <?php if($row['masters_result']== '2'){?> selected="selected"<?php }?> value="2">2nd Class</option>
							<option <?php if($row['masters_result']== '3'){?> selected="selected"<?php }?> value="3">3rd Class</option>
							<option <?php if($row['masters_result']== '4'){?> selected="selected"<?php }?> value="4">GPA/CGPA in scale 4</option>
							<option <?php if($row['masters_result']== '5'){?> selected="selected"<?php }?> value="5">GPA/CGPA in scale 5</option>
							<option <?php if($row['masters_result']== '6'){?> selected="selected"<?php }?> value="6">Pass</option>
                        </select><input type="text" style="width:88px" id="masters_result_point" name="masters_result_point" value="<?php echo $row['masters_result_point']?>"/>
                      
                      </td>
                      
                    <td width="20%" align="left" valign="middle" id="Caption_Marks3" class="black11">&nbsp;</td>
					</tr>
                  </table>
                  </td>
                </tr>
                <tr>
                  <td align="left" valign="top">Subject/Degree <img src="images/loader.gif" border="0" align="absmiddle" name ="loading3" style="visibility:hidden"/></td>
                     <td align="left" valign="top">
                       <select style="width:300px" id="masters_subject" name="masters_subject" class="span4">
                                                       		<option value="">Select</option>
                                                            
                                                            
                                                             <?php foreach($subjects as $subject){if ($subject->subject_group==2){?>
                                                            <option    value="<?php echo $subject->id;?>" <?php if($subject->id == $row['masters_subject']){?> selected="selected"<?php }?>><?php echo $subject->subject;?></option>
                                                            
                                                             <?php  }}?>
                                                       </select>
					
                  </td>
                  <td align="left" valign="top">Passing Year</td>
                  <td align="left" valign="top">
                     <input style="width:350px"  name="masters_passing_year" type="text" class="textfield07b" id="masters_passing_year" value="<?php echo $row['masters_passing_year']; ?>" />
                  </td>
                </tr>
                <tr>
                  <td align="left" valign="top">University/Institute</td>
                  <td align="left" valign="middle">   <select style="width:300px" id="masters_university" name="masters_university" class="span4">
                                                       		<option value="">Select</option>
                                                            <?php foreach($organizations as $organization){if ($organization->organization_group==2){?>
                                                            <option value="<?php echo $organization->id;?>" <?php if($organization->id == $row['masters_university']){?> selected="selected"<?php }?>><?php echo $organization->organization_name;?></option>
                                                            
                                                            <?php }}?>
                                                       </select>
					 </td>
                  <td align="left" valign="top">Course Duration</td>
                  <td align="left" valign="top">
                    <select style="width:300px" name="masters_course_duration" class="textfield07" id="masters_course_duration">
                      <option selected="selected" value="0">Select One</option>
                      <option <?php if($row['masters_course_duration']== '01'){?> selected="selected"<?php }?> value="01">01 Year</option>
                      <option <?php if($row['masters_course_duration']== '02'){?> selected="selected"<?php }?> value="02">02 Years</option>
                      <option <?php if($row['masters_course_duration']== '03'){?> selected="selected"<?php }?> value="03">03 Years</option>
                      <option <?php if($row['masters_course_duration']== '04'){?> selected="selected"<?php }?> value="04">04 Years</option>
                      <option <?php if($row['masters_course_duration']== '05'){?> selected="selected"<?php }?> value="05">05 Years</option>
                    </select>
                  </td>
                </tr>
              </table></td>
              <td align="left" valign="top">&nbsp;</td>
            </tr>
             <tr>
              <td align="left" valign="top" class="bdr02"><table width="100%" border="0" cellpadding="3" cellspacing="0" class="black12">
                <tr>
                     
                  <td colspan="3" height="25" style="color: red; font-size: 18px"  align="left" valign="middle" bgcolor="#ADC9AD" class="black12bold">Mphil/PHD Degree </td>
                  <td align="left" valign="middle" bgcolor="#ADC9AD" class="subblack14">&nbsp;</td>
                </tr>
          <tr>
                  <td width="19%" align="left" valign="top">Examination</td>
                  <td width="34%" align="left" valign="middle">
                    <select  name="mphil_phd_examination" style="width:300px" class="textfield06a" id="mphil_phd_examination" onchange="get_sub_gra(this), Show_ExamTextBox(this.id,'other_exam3'), changeVisibility3(this);">
                      <option  value="0" selected="selected">Select One</option>
                      <option <?php if($row['mphil_phd_examination']== '1'){?> selected="selected"<?php }?>  value="1">B.Sc (Engineering/Architecture)</option>
                      <option <?php if($row['mphil_phd_examination']== '2'){?> selected="selected"<?php }?>  value="2">B.Sc (Agricultural Science)</option>
                      <option <?php if($row['mphil_phd_examination']== '3'){?> selected="selected"<?php }?>  value="3">M.B.B.S/B.D.S</option>
                      <option <?php if($row['mphil_phd_examination']== '4'){?> selected="selected"<?php }?>  value="4">Honours</option>
                      <option <?php if($row['mphil_phd_examination']== '5'){?> selected="selected"<?php }?>  value="5">Pass Course</option>
                      <option <?php if($row['mphil_phd_examination']== '6'){?> selected="selected"<?php }?>  value="6">A & B Section of A.M.I.E</option>
                      <option <?php if($row['mphil_phd_examination']== '7'){?> selected="selected"<?php }?>  value="7">Others</option>
                    </select>
					
                  </td>
                  <td width="17%" align="left" valign="top">Result</td>
                  <td width="30%" align="left" valign="top">
                    <table width="100%" border="0" cellpadding="0" cellspacing="1" class="black14" style="margin-bottom:1px;">
                    <tr>
                      <td width="100%" align="left" valign="middle">
                        <select style="width:200px" name="mphil_phd_result" class="textfield07" id="mphil_phd_result" onchange="Show_GpaTextBox(this.id,'result_gpa3');" >
                          	<option value="0" selected="selected">Select One</option>
                          	<option  <?php if($row['mphil_phd_result']== '1'){?> selected="selected"<?php }?> value="1">1st Class</option>
							<option  <?php if($row['mphil_phd_result']== '2'){?> selected="selected"<?php }?> value="2">2nd Class</option>
							<option <?php if($row['mphil_phd_result']== '3'){?> selected="selected"<?php }?> value="3">3rd Class</option>
							<option <?php if($row['mphil_phd_result']== '4'){?> selected="selected"<?php }?> value="4">GPA/CGPA in scale 4</option>
							<option <?php if($row['mphil_phd_result']== '5'){?> selected="selected"<?php }?> value="5">GPA/CGPA in scale 5</option>
							<option <?php if($row['mphil_phd_result']== '6'){?> selected="selected"<?php }?> value="6">Pass</option>
                        </select><input type="text" style="width:88px" id="mphil_phd_result_point" name="mphil_phd_result_point" value="<?php echo $row['mphil_phd_result_point']?>"/>
                      
                      </td>
                      
                    <td width="20%" align="left" valign="middle" id="Caption_Marks3" class="black11">&nbsp;</td>
					</tr>
                  </table>
                  </td>
                </tr>
                <tr>
                  <td align="left" valign="top">Subject/Degree <img src="images/loader.gif" border="0" align="absmiddle" name ="loading3" style="visibility:hidden"/></td>
                     <td align="left" valign="top">
                       <select style="width:300px" id="mphil_phd_subject" name="mphil_phd_subject" class="span4">
                                                       		<option value="">Select</option>
                                                            
                                                            
                                                             <?php foreach($subjects as $subject){if ($subject->subject_group==2){?>
                                                            <option    value="<?php echo $subject->id;?>" <?php if($subject->id == $row['mphil_phd_subject']){?> selected="selected"<?php }?>><?php echo $subject->subject;?></option>
                                                            
                                                             <?php }}?>
                                                       </select>
					
                  </td>
                  <td align="left" valign="top">Passing Year</td>
                  <td align="left" valign="top">
                     <input style="width:350px"  name="mphil_phd_passing_year" type="text" class="textfield07b" id="mphil_phd_passing_year" value="<?php echo $row['mphil_phd_passing_year']; ?>" />
                  </td>
                </tr>
                <tr>
                  <td align="left" valign="top">University/Institute</td>
                  <td align="left" valign="middle">   <select style="width:300px" id="mphil_phd_university" name="mphil_phd_university" class="span4">
                                                       		<option value="">Select</option>
                                                            <?php foreach($organizations as $organization){if ($organization->organization_group==2){?>
                                                            <option value="<?php echo $organization->id;?>" <?php if($organization->id == $row['mphil_phd_university']){?> selected="selected"<?php }?>><?php echo $organization->organization_name;?></option>
                                                            
                                                            <?php }}?>
                                                       </select>
					 </td>
                  <td align="left" valign="top">Course Duration</td>
                  <td align="left" valign="top">
                    <select style="width:300px" name="mphil_phd_course_duration" class="textfield07" id="mphil_phd_course_duration">
                      <option selected="selected" value="0">Select One</option>
                      <option <?php if($row['mphil_phd_course_duration']== '01'){?> selected="selected"<?php }?> value="01">01 Year</option>
                      <option <?php if($row['mphil_phd_course_duration']== '02'){?> selected="selected"<?php }?> value="02">02 Years</option>
                      <option <?php if($row['mphil_phd_course_duration']== '03'){?> selected="selected"<?php }?> value="03">03 Years</option>
                      <option <?php if($row['mphil_phd_course_duration']== '04'){?> selected="selected"<?php }?> value="04">04 Years</option>
                      <option <?php if($row['mphil_phd_course_duration']== '05'){?> selected="selected"<?php }?> value="05">05 Years</option>
                    </select>
                  </td>
                </tr>
              </table></td>
              <td align="left" valign="top">&nbsp;</td>
            </tr>
		 <tr>
               
           Picture <td>
             
                                                  
                                                  
            </td>
        </tr>	
          </table></td>
        </tr>
       
    </table>
                                                 <div class="control-group">
                                                    <label class="control-label" for="picture_path">SelectPicture </label>
                                                    <div class="controls">
                                                      <input type="text" style="display:none" id="txtpicture_path" name="txtpicture_path" value="<?php echo $row['picture_path'] ?>"/>
                                                  
                                                      <image style="width:100px;height:100px"src="<?php echo base_url();?>assets/images/<?php echo $row['picture_path'] ?>"/><br>
                                                      <input type="File"  id="picture_path" style="width: 400px" name="picture_path" style="width:300px;height:60px"/>
                                                    </div>
                                                 </div>
                                                 <script>
                  function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}
                                                function callregistraionno(val) {
                                                     
                                                  var regno=document.getElementById("registration_no").value;
                                                  var session=document.getElementById("session_month").value;
                                                  var year=document.getElementById("session_year").value;
                                                  var course=document.getElementById("course_id").value;
                                                  var subject=document.getElementById("subject_id").value;
                                                      
                                                   
                                                      
                                                    $.ajax({
                                                     type: "POST",
                                                     url: "checkregistration",
                                                    
                                                    data: {'regno' : regno,'session' : session,'year' : year,'course' : course,'subject' : subject},
                                                     success: function(msg) {
                                                      msg = $.parseJSON(msg);
                                                       if (msg.reservation_pop_up<1)
                                                       {
                                                           document.getElementById("registration_no").value="";
                                                           alert("Registration no is Invalid")  ;
                                                          document.getElementById("registration_no").focus();
                                                       }
                                                       else
                                                       {
                                                         if (msg.duplicate<1)
                                                       {
                                                           document.getElementById("registration_no").value="";
                                                           alert("Already Entered ")  ;
                                                          document.getElementById("registration_no").focus();
                                                       }  
                                                       }
                                                     } 
                                                });                                             
                                                  
                                            }
                                            
                                            
                                                </script>

                  <div class="control-group">
                                                    <label class="control-label" for="teacher_short_name">  Passing Year:</label>

                                                    <div class="controls">
                                                       
                                                        <input type="text" style="width: 120px" id="hsc_passing_year" name="hsc_passing_year" class="span6"  value="<?php echo $row['hsc_passing_year']?>">
                                                       Group : <input style="width: 120px" type="text" id="hsc_group" name="hsc_group" class="span6" value="<?php echo $row['hsc_group']?>">
                                                        <?php if($action != 'edit'){?>
                                                        <input type="button" class="btn btn-info" value='Add More'  onclick='add_columns()'/>
                                                        <?php }?>
                                                    </div>
                                                    
                                                    
                                                </div>
                                                <div class="control-group" id="div_issue_to" style="display:none">
                                                <table class="controls" id="tblid">
                                                    <tr ><td style="width: 150px">Passing year</td>
                                                        <td style="width: 150px">Group</td> 
                                                        <td  style="width: 150px; "></td></tr>
                                                    
                                                        <?php if($action == 'edit') {foreach($columns as $column){?>
                                                    <tr ><td></td><td style="width: 50px;display:block"><?php echo $column->item_id;?></td><td style="width: 150px"><?php echo $column->item_name;?></td><td style="width: 150px"><?php echo $column->qty;?></td><td style="width: 50px;display:block"><?php echo $column->unit_id;?></td><td></td><td style="width: 250px"><?php echo $column->item_unit_name;?></td><td></td></tr>
                                                        <?php }}?>
                                                </table>
                                                 
                                                   </div>
                                                
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


function remove_column(columnno)
    {
       
        document.getElementById("tblid").deleteRow(columnno);
    }
function add_columns()
  {




if (document.getElementById("hsc_passing_year").value=="")
    {
     alert("Please Enter Registration No")   ;
     return true;
    }
    
    if (document.getElementById("hsc_group").value=="")
    {
     alert("Please Enter Marks")   ;
     return true;
    }
    
   
    
    document.getElementById("div_issue_to").style.display="block";
    

columnno=document.getElementById("noofcolumn").value;
document.getElementById("noofcolumn").value=Number(columnno)+1;
var row = document.createElement("tr");
for(var j=1;j<=3;j++){
    
var input = document.createElement("input");
if(j==1)
    {
input.type = "text";
//input.style.display="none";
input.value= +document.getElementById("hsc_passing_year").value;
input.id= "hsc_passing_year_"+columnno;
input.name= "hsc_passing_year_"+columnno;
    }
if(j==2)
    {
input.type = "text";
//input.style.display="none";
input.value= +document.getElementById("hsc_group").value;
input.id= "hsc_group_"+columnno;
input.name= "hsc_group_"+columnno;
    }

    if(j==3)
    {
input.type = "button";
input.value="Remove";
//input.TEXT_NODE="onclick='remove_column()'";
input.onclick = function() { // Note this is a function
      remove_column(columnno);  
    };
input.id= "remove_"+columnno;
    }
 var cell = document.createElement("td");    
 
cell.appendChild(input);
row.appendChild(cell);
}
var element=document.getElementById("tblid");
element.appendChild(row);
document.getElementById("hsc_passing_year").value="";
document.getElementById("hsc_group").value="";

  }

</script>










