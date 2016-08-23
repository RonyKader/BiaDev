
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
                <a href="<?php echo site_url('resultsheet');?>">Result Sheet</a>

                <span class="divider">
                    <i class="icon-angle-right"></i>
                </span>
            </li>
           
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
<style>
table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
}
</style>
    <div id="page-content" class="clearfix">
        

        <div class="row-fluid">
              <table style="width:100%; border: none">
                  <tr style=" border: none">
                      <th style=" border: none">
                          Bangladesh Insurance Academy
                      </th>
                     
                  </tr>
                  <tr style=" border: none">
                       <th style=" border: none">
                         53, Mohakhali C/A, Dhaka-1212
                      </th>
                  </tr>
              </table>
            </br>
            <table style="width:100%; border: none">
                  <tr style=" border: none">
                      <th style=" border: none">
                          Tabulation Sheet of <?php echo $row["session_name"] ;?>
                      </th>
                     
                  </tr>
                  <tr style=" border: none">
                       <th style=" border: none">
                         Basic Cerfificate of Insurance
                      </th>
                  </tr>
              </table>
            </br>
            <table style="width:100%;">
                <tr>
                    <th>
                        Roll No
                    </th>
                     <th>
                       Registration NO
                    </th>
                     <th>
                       Name and Address of the Examination
                    </th>
                     <th>
                       BIA-1
                    </th>
                     <th>
                       BIA-2
                    </th>
                     <th>
                        BIA-3
                    </th>
                     <th>
                        BIA-4
                    </th>
                     <th>
                        BIA-5
                    </th>
                     <th>
                       Total Marks
                    </th>
                     <th>
                      Final Result
                    </th>
                     <th>
                       Remarks
                    </th>
                </tr>
                <?php $i=1; foreach($resultlists as $resultlist){?>
                <tr>
                    <td>
                        <?php echo $i; ?>
                    </td>
                      <td>
                      <?php echo $resultlist->registration_no;?>   
                        
                    </td>
                    <td>
                        <?php echo $resultlist->student_name;?>
                    </td>
                  
                    <td>
                      <?php  if ($resultlist->BIAmarks1==0) { echo "";} else {echo $resultlist->BIAmarks1;}?>   
                        
                    </td>
                    <td>
                       <?php  if ($resultlist->BIAmarks2==0) { echo "";} else {echo $resultlist->BIAmarks2;}?>   
                        
                    </td>
                    <td>
                       <?php  if ($resultlist->BIAmarks3==0) { echo "";} else {echo $resultlist->BIAmarks3;}?>   
                        
                    </td>
                    <td>
                       <?php  if ($resultlist->BIAmarks4==0) { echo "";} else {echo $resultlist->BIAmarks4;}?>   
                        
                    </td>
                    <td>
                       <?php  if ($resultlist->BIAmarks5==0) { echo "";} else {echo $resultlist->BIAmarks5;}?>   
                        
                    </td>
                </tr>
                                                            
                                                            
                                                            <?php $i=$i+1;}?>
            </table>
            </br>
             </br>
              </br>
               </br>
                </br> </br>
                 </br>
                  </br>
                  </br>
               </br>
                </br> </br>
                 </br>
                  </br>
                
                
                
            <table style="width:100%;border: none">
                <tr style=" border: none">
                <th style=" border: none">
                  ----------------------
                </th >  
                 <th style=" border: none">
                  ----------------------
                </th> 
                 <th style=" border: none">
                   ----------------------
                </th > 
                 <th style=" border: none">
                   ----------------------
                </th> 
                 <th style=" border: none">
                    ----------------------
                </th> 
                </tr>
                 <tr style=" border: none">
                <th style=" border: none">
                   Course Instructor
                </th >  
                 <th style=" border: none">
                    Faculty Member
                </th> 
                 <th style=" border: none">
                   Director
                </th > 
                 <th style=" border: none">
                  Convener
                </th> 
                 <th style=" border: none">
                 Chairman
                </th> 
                </tr>
            </table>
        </div>
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
                                            	
                                                 
                                                </div>
                                                   	
                                                                                                                                                
                                                <hr />
                                    
                                                <div class="form-actions">
                                                    <button class="btn btn-info" type="submit">
                                                        <i class="icon-ok bigger-110"></i>
                                                        Print
                                                    </button>
                    
                                                    &nbsp; &nbsp; &nbsp;
                                                    
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
<script type="text/javascript">
	$(document).ready(function() {
		$('#type_list').dataTable( {
			"iDisplayLength": 50,
			"aoColumns": [
						   { "sWidth": "10%" },
						   { "sWidth": "10%" },
						   { "sWidth": "10%" }, 
			  
            ],
			"bProcessing": true,
			"bServerSide": true,
			"sAjaxSource": "<?php echo site_url('resultsheet/get');?>",
			"bDeferRender": true
		}); 
	}); 
function confirm_status() {
	var agree = confirm("Are you sure, you want to delete this type?");
	if (!agree) return false;
}
</script>
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
