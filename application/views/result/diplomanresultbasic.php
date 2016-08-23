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
                          Tabulation Sheet of <?php echo $sessions ;?>
                      </th>
                     
                  </tr>
                  <tr style=" border: none">
                       <th style=" border: none">
                         Basic Cerfificate of Insurance
                      </th>
                  </tr>
              </table>
            </br>
            <table style="width:100%;text-align: center">
                <tr>
                    <th>
                        Sl No
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
                         
                         
                     <?php if ($resultlist->session_year1==0){echo "" ;} else { echo $resultlist->BIAmarks1.'('.$resultlist->session_year1.')';}?>
                        
                    </td>
                    <td>
                      
                     <?php if ($resultlist->session_year2==0){echo "" ;} else { echo $resultlist->BIAmarks2.'('.$resultlist->session_year2.')';}?>   
                    </td>
                    <td>
                      <?php if ($resultlist->session_year3==0){echo "" ;} else { echo $resultlist->BIAmarks3.'('.$resultlist->session_year3.')';}?>
                        
                    </td>
                    <td>
                       <?php if ($resultlist->session_year4==0){echo "" ;} else { echo $resultlist->BIAmarks4.'('.$resultlist->session_year4.')';}?>
                        
                    </td>
                    <td>
                      <?php if ($resultlist->session_year5==0){echo "" ;} else { echo $resultlist->BIAmarks5.'('.$resultlist->session_year5.')';}?>
                        
                    </td>
                      <td>
                            
                        
                        
                    </td>
                      <td>
                       
                        
                    </td>
                      <td>
                        
                        
                    </td>
                </tr>
                                                            
                                                            
                                                            <?php $i=$i+1;}?>
            </table>
            <input type='text' style='display:none' id='totalrowvalue' name='totalrowvalue' value='<?php echo $i; ?>'>
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