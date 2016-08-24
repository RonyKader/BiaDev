<style>
    select.custom-session {
        width: 49.5%;
        border-radius: 0;
        height: 39px;
        padding-left: 10px;
        border-color: #ccc;
    }
  .form-control{ height: 40px; border-radius: 0; }
  textarea.form-control.text-add{ height: 40px; }

</style>
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
   </ul>
   <!--.breadcrumb-->
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
   <div class="container">
    <div class="row">
    <form action="">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <header>
                <h2>Basic Student Information <span>*</span></h2>
            </header>
        </div>
        <div class="clearfix"></div>

            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="form-group">
                    <input type="text" name="registration" id="" class="form-control" placeholder="Registration No">
                </div>

                <div class="form-group">
                    <input type="text" name="name" id="" class="form-control" placeholder="Participant Name">
                </div>
            </div>

            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

                <div class="form-group">
                    <input type="text" name="name" id="" class="form-control" placeholder="Father's Name">
                </div>

                <div class="form-group">
                    <input type="text" name="name" id="" class="form-control" placeholder="Mother's Name">
                </div>
            </div>

            <!-- End of Student Basic Information -->

            <!-- START OF Admit Course Information* -->

            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <header>
                    <h2>Admit Course Information <span>*</span></h2>
                </header>
            </div>
            <div class="clearfix"></div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="row">                     
                           
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <label for="">Session</label>
                            <div class="form-group">
                                <select name="session_month" id="" class="custom-session">
                                    <option value="">Month</option>
                                    <option value="">Jan</option>
                                    <option value="">Feb</option>
                                </select>

                                <select name="session_year" id="" class="custom-session">
                                    <option value="">Year</option>
                                    <option value="">2016</option>
                                    <option value="">2015</option>
                                </select>

                            </div>                            
                        </div>

                    </div>

                    <div class="form-group">
                        <select name="session_month" id="" class="form-control">
                            <option value="">Select a course</option>
                            <?php 
                               if ( $course_name ) 
                               {
                                 foreach ($course_name as $coursename ) 
                                 {
                                  ?>
                                   <option value="<?php echo $coursename->course_name;?>"><?php echo $coursename->course_name;?></option>
                                  <?php
                                 }
                               }
                            ?>
                        </select>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <label for="">Registration Fee</label>
                    <div class="form-group">
                        <input type="text" name="name" id="" class="form-control" placeholder="1200 tk">
                    </div>
                    <div class="form-group">
                        <input type="text" name="name" id="" class="form-control" placeholder="Sponsored By">
                    </div>

                </div>

                <!-- END OF Admit Course Information* -->



                <!-- START OF Office Information * -->

                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <header>
                        <h2>Office Information <span>*</span></h2>
                    </header>
                </div>
                <div class="clearfix"></div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="form-group">
                            <input type="text" name="registration" id="" class="form-control" placeholder="Organization">
                        </div>

                        <div class="form-group">
                            <input type="text" name="name" id="" class="form-control" placeholder="Total Experience">
                        </div>

                        <div class="form-group">
                            <select name="session_month" id="" class="form-control">
                                <option value="">Select a Designation</option>
                                <?php 
                                   if ( $designation_name ) 
                                   {
                                     foreach ($designation_name as $designation ) 
                                     {
                                      ?>
                                       <option value="<?php echo $designation->designation;?>"><?php echo $designation->designation;?></option>
                                      <?php
                                     }
                                   }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="form-group">
                            <input type="text" name="name" id="" class="form-control" placeholder="Current Employeement">
                        </div>
                        <div class="form-group">
                            <textarea name="" class="form-control" id="" rows="4" placeholder="Current Employement Address"></textarea>
                        </div>

                    </div>

                    <!-- END OF Office Information * -->


                    <!-- START OF Personal Information * -->

                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <header>
                            <h2>Personal Information <span>*</span></h2>
                        </header>
                    </div>
                    <div class="clearfix"></div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <input type="date" name="registration" id="" class="form-control" placeholder="Date of Birth">
                            </div>

                            <div class="form-group">
                                <input type="text" name="name" id="" class="form-control" placeholder="Emergency Contact No">
                            </div>

                            <div class="form-group">
                                <input type="text" name="name" id="" class="form-control" placeholder="Emergency Contact Name">
                            </div>

                            <div class="form-group">
                                <select name="session_month" id="" class="form-control">
                                    <option value="">Select gender</option>
                                    <option value="">Male</option>
                                    <option value="">Female</option>
                                    <option value="">Other</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <select name="session_month" id="" class="form-control">
                                    <option value="">Select Religion</option>
                                    <option value="">Islam</option>
                                    <option value="">Hindu</option>
                                    <option value="">Christan</option>
                                    <option value="">Others</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <select name="session_month" id="" class="form-control">
                                    <option value="">Select Marital Status</option>
                                    <option value="">Married</option>
                                    <option value="">Unmarried</option>
                                </select>
                            </div>

                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <input type="text" name="name" id="" class="form-control" placeholder="Mobile No">
                            </div>
                            <div class="form-group">
                                <input type="email" name="name" id="" class="form-control" placeholder="E-mail address">                                
                            </div>

                            <div class="form-group">
                                <select name="session_month" id="" class="form-control">
                                    <option value="">Select Blood Group</option>
                                    <option value="">O <sup>+</sup></option>
                                    <option value="">A<sup>+</sup></option>
                                    <option value="">B<sup>+</sup></option>
                                    <option value="">AB<sup>+</sup></option>
                                    <option value="">AB<sup>-</sup></option>
                                </select>
                            </div>

                            <div class="form-group">
                                <input type="email" name="name" id="" class="form-control" placeholder="Country name">                                
                            </div>

                            <div class="form-group">
                                <input type="email" name="name" id="" class="form-control" placeholder="Nationality">                                
                            </div>

                            <div class="form-group">
                                <input type="email" name="name" id="" class="form-control" placeholder="National ID">                                
                            </div>

                        </div>

                        <!-- END OF Personal Information * -->


                        <!-- Start of Address section -->
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <header>
                                <h2>Address <span>*</span></h2>
                            </header>
                        </div>
                        <div class="clearfix"></div>
                        
                            <div id="rem" class="main-wrap">
                                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                        <div class="form-group">
                                            <textarea name="" id="" class="form-control text-add" placeholder="Address"></textarea>
                                        </div>
                                    </div>
            
                                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                        <div class="form-group">
                                            <select name="district_name" id="" class="form-control">
                                                <option value="">Select District</option>
                                                <?php 
                                                    if ( $district_info ) 
                                                    {
                                                      foreach ($district_info as $disInfo ) 
                                                      {
                                                       ?>
                                                        <option value="<?php echo $disInfo->district_name;?>"><?php echo $disInfo->district_name;?></option>
                                                       <?php
                                                      }
                                                    }
                                                 ?>
                                            </select>
                                        </div>
                                    </div>
            
                                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                        <div class="form-group">
                                            <select name="session_month" id="" class="form-control">
                                            <option value="">Select Upzilla</option>
                                                <?php 
                                                    if ( $upzilla_info ) 
                                                    {
                                                      foreach ($upzilla_info as $upzillaInfo ) 
                                                      {
                                                       ?>
                                                        <option value="<?php echo $upzillaInfo->upzilla_name;?>"><?php echo $upzillaInfo->upzilla_name;?></option>
                                                       <?php
                                                      }
                                                    }
                                                 ?>
                                            </select>
                                        </div>
                                    </div>
            
                                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                        <div class="form-group">
                                            <input type="text" name="registration" id="" class="form-control" placeholder="Post Office">
                                        </div>
                                    </div>
            
                                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                        <div class="form-group">
                                            <input type="text" name="registration" id="" class="form-control" placeholder="Post Code">
                                        </div>
                                    </div>
            
                                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                        <div class="form-group">
                                            <button id="add" class="btn btn-primary">Add more</button>
                                        </div>
                                    </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="append-wrapper clearfix"></div>
                        <!-- End of Address section -->
        </form>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.js"></script>
<script>
    jQuery(document).ready(function(){
        var i = 1;
        jQuery('#add' ).click(function(){
            i++;
           var htmlWrite = '';
                htmlWrite += '<div id="rem'+i+'" class="main-wrap clearfix">'+
                            '<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">'+
                            '<div class="form-group">'+
                                '<textarea name="" id="'+i+'" class="form-control text-add" placeholder="Address"></textarea>'+
                            '</div>'+
                        '</div>'+
                        '<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">'+
                            '<div class="form-group">'+
                                '<select name="district_name" id="'+i+'" class="form-control">'+
                                    '<option value="">Select District</option>';
                                        
                htmlWrite +=    '</select>'+
                            '</div>'+
                        '</div>'+
                        '<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">'+
                            '<div class="form-group">'+
                                '<select name="session_month" id="'+i+'" class="form-control">'+
                                '<option value="">Select Upzilla</option>'+
                                    
                                '</select>'+
                            '</div>'+
                        '</div>'+
                        '<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">'+
                            '<div class="form-group">'+
                                '<input type="text" name="registration" id="'+i+'" class="form-control" placeholder="Post Office">'+
                            '</div>'+
                        '</div>'+
                        
                        '<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">'+
                            '<div class="form-group">'+
                                '<input type="text" name="registration" id="'+i+'" class="form-control" placeholder="Post Code">'+
                            '</div>'+
                        '</div>'+
                        
                        '<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">'+
                            '<div class="form-group">'+
                                '<a href="javascript:void(0);" id="rem'+i+'" class="btn btn_rl btn-danger">Remove</a>'+
                            '</div>'+
                        '</div>'+
                        '</div>';

            jQuery('.append-wrapper').append( htmlWrite );
            
            jQuery(".btn_rl").click(function(){
                var get_id = $(this).attr('id');
                // alert(get_id);
                jQuery('#'+get_id+'').remove();
            })
            return false;
            });


    });
        
</script>


    </div>

   </div>
</div>