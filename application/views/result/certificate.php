  <form class="form-horizontal"  method="post" action="" name="frm">
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

     
    </div>
<style>
table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
}
</style>



    <div id="page-content" class="clearfix">
     

        <div class="row-fluid">
             <div style="height:120px"></div>
              <table style="width:90%; border: none">
                  <tr style=" border: none">
                      <th style=" border: none">
                            <img  style="width:80%;height: 150px;text-align: center" src="<?php echo base_url();?>assets/images/certificatelogo.png"/>
                      </th>
                     
                  </tr>
                 
              </table>
            </br>
            <div style="height:150px"></div>
            <table border="0" cellpadding="0" cellspacing="0" style="width:100%;text-align: left;border:none;">
                <tr  style=" border:none;">
                    <th style=" border:none; width: 200px">
                        <span style="font-weight: bold; font-size: 30px;  font-style: italic;">
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; This is to certify that Mr/Ms.<span id="txtn" style="color: #0092ef"> <?php echo $row['student_name']?> </span></br><br></br>
                           &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; has successfully completed the training course for the <?php echo $row['type']?></br><br></br>
                           &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Insurance agent from <span id="txtn1" style="color: #0092ef"><?php echo $row['company_name']?></span></br><br></br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; for 72 hours and has been awarded grade <span style="color: #0092ef"><?php echo $row['grade']?></span> 
                    </th>
                    
                </tr>
             
            </table>
            
            </br>
             </br>
              </br>
               </br>
                </br>
             </br>
              </br>
               </br>
                </br> </br>
                 </br>
                  </br>
                  </br>
               </br>
                
                
                
                
            <table style="width:85%;border: none;font-weight: bold; font-size: 30px; ">
                
                 <tr style=" border: none">
                <th style=" text-align: left; border: none">
                   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Course Director
                </th >  
                 
                 <th style="text-align: left; border: none">
                   Cheif Faculty Member
                </th > 
                 <th style=" text-align: left; border: none">
                  Director
                </th> 
                
                </tr>
            </table>
                 
        </div>
        </br>
         <table style="width:85%;border: none;font-weight: bold; font-size: 30px; ">
                
                 <tr style=" border: none">
                <th style=" text-align: left; border: none">
                 &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Date of issue : <?php echo date('d-m-Y'); ?>
                </th >  
                 
                 <th style="text-align: left; border: none">
                  BIA/Agent/<?php echo $row['bia_agent_no']?>/<?php echo $row['year']?>
                </th > 
                
                
                </tr>
            </table>
       
          <div style="height:200px;"></div>
  
       
                                            	
                                                
                                                
                                                                                                                                                
                                                <hr />
                                    
                                              
                                            </form>
                                            
                                      

            <!--PAGE CONTENT ENDS HERE-->
       
    </div><!--/#page-content-->
 <div class="form-actions">
                                                     
                                                    <input type="button" onclick="printDiv('page-content')" value="print" />
                    
                                                    &nbsp; &nbsp; &nbsp;
                                                    
                                                </div>

    <script>
        
        function printDiv(divName) {
             
     var printContents = document.getElementById(divName).innerHTML;
     
      
     var originalContents = document.body.innerHTML;
    
     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
        </script>