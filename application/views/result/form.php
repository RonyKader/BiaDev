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
                <a href="<?php echo site_url('result');?>">Result</a>

                <span class="divider">
                    <i class="icon-angle-right"></i>
                </span>
            </li>
            <li class="active"><?php if($action == 'edit'){?>Edit<?php }else{?>Add<?php }?></li>
        </ul><!--.breadcrumb-->

       
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
                                            	
                                                
                                                
                                                
                                                
                                               <div class="control-group">
                                                    <label class="control-label" for="course_id">Session </label>

                                                   <div class="controls">
                                                      <select style="width:140px" id="session_month" onblur="callregistraionno(0)" name="session_month" class="span4">
                                                       		
                                                               <?php if($action == 'edit') {?> 
                                                          
                                                          <option value="<?php echo $row['session_month'] ?>"><?php echo $row['session_month'] ?></option>
                                                          
                                                               <?php } else { ?>
                                                                    <option value="May" <?php if($row['session_month']== 'May'){?> selected="selected"<?php }?>>May</option>
                                                                        <option value="Oct" <?php if($row['session_month']== 'Oct'){?> selected="selected"<?php }?>>Oct</option>
                                                               <?php } ?>
<!--                                                            <option value="<?php echo $session->id;?>" <?php if($session->id == $row['session_id']){?> selected="selected"<?php }?>><?php echo $session->session_name;?></option>-->
                                                            
                                                    
                                                       </select>
                                                        <select onblur="callregistraionno(0)" style="width:140px" id="session_year" name="session_year" class="span4">
                                                            <?php if($action == 'edit') {?> 
                                                          
                                                          <option value="<?php echo $row['session_year'] ?>"><?php echo $row['session_year'] ?></option>
                                                          
                                                               <?php } else { ?>
                                                           
                                                                    <option value="2016" selected <?php if($row['session_year']== '2016'){?> selected="selected"<?php }?>>2016</option>
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
                                                                
                                                               <?php } ?>
                                                           
<!--                                                            <option value="<?php echo $session->id;?>" <?php if($session->id == $row['session_id']){?> selected="selected"<?php }?>><?php echo $session->session_name;?></option>-->
                                                            
                                                    
                                                       </select>
                                                    </div>
                                                </div>
                                                
                                                 <div class="control-group">
                                                    <label class="control-label" for="course_id">Course:</label>

                                                    <div class="controls">
                                                         <select onblur="callregistraionno(0)" id="course_id" name="course_id" class="span4" onchange="course_select_after_subject(value)">
                                                         <?php if($action != 'edit') {?> 
                                                       		<option value="">Select</option>
                                                         <?php } ?>
                                                            <?php foreach($courses as $course){?>
                                                               
                                                               <?php if($action != 'edit') {?> 
                                                                <option value="<?php echo $course->id;?>" <?php if($course->id == $row['course_id']){?> selected="selected"<?php }?>><?php echo $course->course_name;?></option>
                                                               <?php } else {if($course->id == $row['course_id']){?>
                                                            <option value="<?php echo $course->id;?>" <?php if($course->id == $row['course_id']){?> selected="selected"<?php }?>><?php echo $course->course_name;?></option>
                                                               <?php }} ?>
                                                                
                                                                <?php }?>
                                                       </select>
                                                       
                                                    </div>
                                                </div>
                                              	    <div class="control-group">
                                                    <label class="control-label" for="subject_id">subject :</label>

                                                    <div class="controls">
                                                         <select onblur="callregistraionno(0)" id="subject_id" name="subject_id" class="span4">
                                                       		  <?php if($action != 'edit') {?> 
                                                       		<option value="">Select</option>
                                                         <?php } ?>
                                                            
                                                            
                                                             <?php $i=1;foreach($subjects as $subject){?>
                                                            <option style="display:none" name="<?php echo $subject->id?>" id="<?php echo $i?>" value="<?php echo $subject->course_id.'-'.$subject->id;?>" <?php if($subject->id == $row['subject_id']){?> selected="selected"<?php }?>><?php echo $subject->subject_short_name;?></option>
                                                            
                                                            <?php $i=$i+1; }?>
                                                       </select>
                                                       
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
                                                    <label class="control-label" for="teacher_short_name">  Registration No:</label>

                                                    <div class="controls">
                                                        <input type="text" onkeypress="return isNumber(event)" onblur="callregistraionno(this.value)"  <?php if($action == 'edit') { echo 'readonly';}?> style="width: 120px" id="registration_no" name="registration_no" class="span6"  value="<?php echo $row['student_registration_no']?>">
                                                       Marks : <input style="width: 120px" type="text" id="marks" name="marks" class="span6" value="<?php echo $row['marks']?>">
                                                        <?php if($action != 'edit'){?>
                                                        <input type="button" class="btn btn-info" value='Add More'  onclick='add_columns()'/>
                                                        <?php }?>
                                                    </div>
                                                    
                                                    
                                                </div>   	
                                             
                                              
                                                     <div class="control-group" id="div_issue_to" style="display:none">
                                                <table class="controls" id="tblid">
                                                    <tr ><td style="width: 250px">Registration No</td>
                                                        <td style="width: 250px">Marks</td> 
                                                        <td  style="width: 250px; "></td></tr>
                                                    
                                                        <?php if($action == 'edit') {foreach($columns as $column){?>
                                                    <tr ><td></td><td style="width: 50px;display:none"><?php echo $column->item_id;?></td><td style="width: 250px"><?php echo $column->item_name;?></td><td style="width: 150px"><?php echo $column->qty;?></td><td style="width: 50px;display:none"><?php echo $column->unit_id;?></td><td></td><td style="width: 250px"><?php echo $column->item_unit_name;?></td><td></td></tr>
                                                        <?php }}?>
                                                </table>
                                                 
                                                   </div>                                                                                              
                                                <hr />
                                    <input style="display:none" stytype="text" id="noofcolumn" name="noofcolumn" value="0" >
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


function course_select_after_subject(value)
{

var subject_id = document.getElementById("subject_id");
//alert(issue_to.length);
//alert(country.length);
for(i=1;i<subject_id.length;i++)
{
  // var f=document.getElementById('select_tag_id');

//alert(issue_to.options[i].value);
var s=subject_id.options[i].value;

 
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




if (document.getElementById("registration_no").value=="")
    {
     alert("Please Enter Registration No")   ;
     return true;
    }
    
    if (document.getElementById("marks").value=="")
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
input.value= +document.getElementById("registration_no").value;
input.id= "registration_no_"+columnno;
input.name= "registration_no_"+columnno;
    }
if(j==2)
    {
input.type = "text";
//input.style.display="none";
input.value= +document.getElementById("marks").value;
input.id= "marks_"+columnno;
input.name= "marks_"+columnno;
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
document.getElementById("registration_no").value="";
document.getElementById("marks").value="";

	}
</script>