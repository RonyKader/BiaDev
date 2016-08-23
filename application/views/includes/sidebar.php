<div id="sidebar">
    <ul class="nav nav-list">
        <li <?php if ($page == 'User') { ?>class="active" <?php } ?>>
            <a href="<?php echo site_url('users/edit/').'/'.$this->session->userdata('user_id'); ?>">
                <span>Change Password</span>
            </a>
        </li>
      
  <?php
  
   if ($this->session->userdata('user_type')!=''){
                  if ($this->session->userdata('user_type')=='0')
                {?>
       <li <?php if ($page == 'User') { ?>class="active" <?php } ?>>
            <a href="#" class="dropdown-toggle">
               
                <span>User Manage</span>

                <b class="arrow icon-angle-down"></b>
            </a>

            <ul class="submenu">
                <li <?php if ($page == 'User' && $menu == 'list') { ?>class="active" <?php } ?>>
                    <a href="<?php echo site_url('users'); ?>">
                        <i class="icon-double-angle-right"></i>
                      User list
                    </a>
                </li>
            </ul>
        </li>
<li <?php if ($page == 'User') { ?>class="active" <?php } ?>>
            <a href="#" class="dropdown-toggle">
               
                <span>User role Manage</span>

                <b class="arrow icon-angle-down"></b>
            </a>

            <ul class="submenu">
                <li <?php if ($page == 'User' && $menu == 'list') { ?>class="active" <?php } ?>>
                    <a href="<?php echo site_url('usersrole'); ?>">
                        <i class="icon-double-angle-right"></i>
                      Users Roll Add
                    </a>
                </li>

               
                     
              
               
            </ul>
              

               
                
               
            
        </li>
       
        <li <?php if ($page == 'Company') { ?>class="active" <?php } ?>>
            <a href="#" class="dropdown-toggle">
               
                <span>BIA Information</span>

                <b class="arrow icon-angle-down"></b>
            </a>

            <ul class="submenu">
                <li <?php if ($page == 'Company' && $menu == 'list') { ?>class="active" <?php } ?>>
                    <a href="<?php echo site_url('company'); ?>">
                        <i class="icon-double-angle-right"></i>
                        List
                    </a>
                </li>

                <li <?php if ($page == 'Company' && $menu == 'add') { ?>class="active" <?php } ?>>
                    <a href="<?php echo site_url('company/add'); ?>">
                        <i class="icon-double-angle-right"></i>
                        Add
                    </a>
                </li>
            </ul>
        </li>
       
        

         <li <?php if ($page == 'Department') { ?>class="active" <?php } ?>>
            <a href="#" class="dropdown-toggle">
               
                <span>Department Information</span>

                <b class="arrow icon-angle-down"></b>
            </a>

            <ul class="submenu">
                <li <?php if ($page == 'Department' && $menu == 'list') { ?>class="active" <?php } ?>>
                    <a href="<?php echo site_url('department'); ?>">
                        <i class="icon-double-angle-right"></i>
                        List
                    </a>
                </li>

                <li <?php if ($page == 'Department' && $menu == 'add') { ?>class="active" <?php } ?>>
                    <a href="<?php echo site_url('department/add'); ?>">
                        <i class="icon-double-angle-right"></i>
                        Add
                    </a>
                </li>
            </ul>
        </li>
       
               
         <li <?php if ($page == 'Designation') { ?>class="active" <?php } ?>>
            <a href="#" class="dropdown-toggle">
               
                <span>Designation Information</span>

                <b class="arrow icon-angle-down"></b>
            </a>

            <ul class="submenu">
                <li <?php if ($page == 'Designation' && $menu == 'designationlist') { ?>class="active" <?php } ?>>
                    <a href="<?php echo site_url('designation'); ?>">
                        <i class="icon-double-angle-right"></i>
                        List
                    </a>
                </li>

                <li <?php if ($page == 'Designation' && $menu == 'designationadd') { ?>class="active" <?php } ?>>
                    <a href="<?php echo site_url('designation/add'); ?>">
                        <i class="icon-double-angle-right"></i>
                        Add
                    </a>
                </li>
            </ul>
        </li>
                <li <?php if ($page == 'Employee') { ?>class="active" <?php } ?>>
            <a href="#" class="dropdown-toggle">
               
                <span>Employee Information</span>

                <b class="arrow icon-angle-down"></b>
            </a>

            <ul class="submenu">
                <li <?php if ($page == 'Employee' && $menu == 'list') { ?>class="active" <?php } ?>>
                    <a href="<?php echo site_url('employee'); ?>">
                        <i class="icon-double-angle-right"></i>
                        List
                    </a>
                </li>

                <li <?php if ($page == 'Employee' && $menu == 'add') { ?>class="active" <?php } ?>>
                    <a href="<?php echo site_url('employee/add'); ?>">
                        <i class="icon-double-angle-right"></i>
                        Add
                    </a>
                </li>
                
               
            </ul>
        </li>
<!--               <li <?php if ($page == 'Session') { ?>class="active" <?php } ?>>
            <a href="#" class="dropdown-toggle">
               
                <span>Session </span>

                <b class="arrow icon-angle-down"></b>
            </a>

            <ul class="submenu">
                <li <?php if ($page == 'Session' && $menu == 'list') { ?>class="active" <?php } ?>>
                    <a href="<?php echo site_url('session'); ?>">
                        <i class="icon-double-angle-right"></i>
                        List
                    </a>
                </li>

                <li <?php if ($page == 'Session' && $menu == 'add') { ?>class="active" <?php } ?>>
                    <a href="<?php echo site_url('session/add'); ?>">
                        <i class="icon-double-angle-right"></i>
                        Add
                    </a>
                </li>
            </ul>
        </li>-->
              
        <li <?php if ($page == 'Course') { ?>class="active" <?php } ?>>
            <a href="#" class="dropdown-toggle">
               
                <span>Course </span>

                <b class="arrow icon-angle-down"></b>
            </a>

            <ul class="submenu">
                <li <?php if ($page == 'Course' && $menu == 'list') { ?>class="active" <?php } ?>>
                    <a href="<?php echo site_url('course'); ?>">
                        <i class="icon-double-angle-right"></i>
                        List
                    </a>
                </li>

                <li <?php if ($page == 'Course' && $menu == 'add') { ?>class="active" <?php } ?>>
                    <a href="<?php echo site_url('course/add'); ?>">
                        <i class="icon-double-angle-right"></i>
                        Add
                    </a>
                </li>
                
               
            </ul>
        </li>
        <li <?php if ($page == 'Subject') { ?>class="active" <?php } ?>>
            <a href="#" class="dropdown-toggle">
               
                <span>Subject </span>

                <b class="arrow icon-angle-down"></b>
            </a>

            <ul class="submenu">
                <li <?php if ($page == 'Subject' && $menu == 'list') { ?>class="active" <?php } ?>>
                    <a href="<?php echo site_url('subject'); ?>">
                        <i class="icon-double-angle-right"></i>
                        List
                    </a>
                </li>

                <li <?php if ($page == 'Subject' && $menu == 'add') { ?>class="active" <?php } ?>>
                    <a href="<?php echo site_url('subject/add'); ?>">
                        <i class="icon-double-angle-right"></i>
                        Add
                    </a>
                </li>
                
               
            </ul>
        </li>
        <li <?php if ($page == 'Organization') { ?>class="active" <?php } ?>>
            <a href="#" class="dropdown-toggle">
               
                <span>Insurance Information</span>

                <b class="arrow icon-angle-down"></b>
            </a>

            <ul class="submenu">
                <li <?php if ($page == 'Organization' && $menu == 'list') { ?>class="active" <?php } ?>>
                    <a href="<?php echo site_url('organization'); ?>">
                        <i class="icon-double-angle-right"></i>
                        List
                    </a>
                </li>

                <li <?php if ($page == 'Organization' && $menu == 'add') { ?>class="active" <?php } ?>>
                    <a href="<?php echo site_url('organization/add'); ?>">
                        <i class="icon-double-angle-right"></i>
                        Add
                    </a>
                </li>
                
               
            </ul>
        </li>
        <li <?php if ($page == 'Teacher') { ?>class="active" <?php } ?>>
            <a href="#" class="dropdown-toggle">
               
                <span>Resource Person</span>

                <b class="arrow icon-angle-down"></b>
            </a>

            <ul class="submenu">
                <li <?php if ($page == 'Teacher' && $menu == 'list') { ?>class="active" <?php } ?>>
                    <a href="<?php echo site_url('teacher'); ?>">
                        <i class="icon-double-angle-right"></i>
                        List
                    </a>
                </li>

                <li <?php if ($page == 'Teacher' && $menu == 'add') { ?>class="active" <?php } ?>>
                    <a href="<?php echo site_url('teacher/add'); ?>">
                        <i class="icon-double-angle-right"></i>
                        Add
                    </a>
                </li>
                
               
            </ul>
        </li>
        <li <?php if ($page == 'Grademarks') { ?>class="active" <?php } ?>>
            <a href="#" class="dropdown-toggle">
               
                <span>Grade/Marks</span>

                <b class="arrow icon-angle-down"></b>
            </a>

            <ul class="submenu">
                <li <?php if ($page == 'Grademarks' && $menu == 'list') { ?>class="active" <?php } ?>>
                    <a href="<?php echo site_url('grademarks'); ?>">
                        <i class="icon-double-angle-right"></i>
                        List
                    </a>
                </li>

                <li <?php if ($page == 'Grademarks' && $menu == 'add') { ?>class="active" <?php } ?>>
                    <a href="<?php echo site_url('grademarks/add'); ?>">
                        <i class="icon-double-angle-right"></i>
                        Add
                    </a>
                </li>
                
               
            </ul>
        </li>
                <?php } else {?>
         <li <?php if ($page == 'Student') { ?>class="active" <?php } ?>>
            <a href="#" class="dropdown-toggle">
               
                <span>Registration </span>

                <b class="arrow icon-angle-down"></b>
            </a>

            <ul class="submenu">
                <li <?php if ($page == 'Student' && $menu == 'list') { ?>class="active" <?php } ?>>
                    <a href="<?php echo site_url('student'); ?>">
                        <i class="icon-double-angle-right"></i>
                        List
                    </a>
                </li>

                <li <?php if ($page == 'Student' && $menu == 'add') { ?>class="active" <?php } ?>>
                    <a href="<?php echo site_url('student/add'); ?>">
                        <i class="icon-double-angle-right"></i>
                        Registration
                    </a>
                </li>
                <li <?php if ($page == 'Student' && $menu == 'list') { ?>class="active" <?php } ?>>
                    <a href="<?php echo site_url('student/oldindex'); ?>">
                        <i class="icon-double-angle-right"></i>
                       Old List
                    </a>
                </li>
                 <li <?php if ($page == 'Student' && $menu == 'add') { ?>class="active" <?php } ?>>
                    <a href="<?php echo site_url('student/addbasic'); ?>">
                        <i class="icon-double-angle-right"></i>
                        Old Registration
                    </a>
                </li>
                <?php  if ($this->session->userdata('roles_approved')=='1') {?>
               <li <?php if ($page == 'Student' && $menu == 'add') { ?>class="active" <?php } ?>>
                    <a href="<?php echo site_url('student/waitingapprovedindex'); ?>">
                        <i class="icon-double-angle-right"></i>
                        Waiting for Approval
                    </a>
                </li>
                <?php } ?>
            </ul>
        </li>
          <li <?php if ($page == 'Member') { ?>class="active" <?php } ?>>
            <a href="#" class="dropdown-toggle">
               
                <span>Member </span>

                <b class="arrow icon-angle-down"></b>
            </a>

            <ul class="submenu">
                <li <?php if ($page == 'Member' && $menu == 'list') { ?>class="active" <?php } ?>>
                    <a href="<?php echo site_url('student/memberstudentindex'); ?>">
                        <i class="icon-double-angle-right"></i>
                       Student List
                    </a>
                </li>

                <li <?php if ($page == 'Member' && $menu == 'add') { ?>class="active" <?php } ?>>
                    <a href="<?php echo site_url('student/memberindex'); ?>">
                        <i class="icon-double-angle-right"></i>
                        Member List
                    </a>
                </li>
                
               
            </ul>
        </li>
         <li <?php if ($page == 'Counseling') { ?>class="active" <?php } ?>>
            <a href="#" class="dropdown-toggle">
               
                <span>Counseling </span>

                <b class="arrow icon-angle-down"></b>
            </a>

            <ul class="submenu">
                <li <?php if ($page == 'Counseling' && $menu == 'list') { ?>class="active" <?php } ?>>
                    <a href="<?php echo site_url('student/counselingstudentindex'); ?>">
                        <i class="icon-double-angle-right"></i>
                       Member List
                    </a>
                </li>

                <li <?php if ($page == 'Counseling' && $menu == 'add') { ?>class="active" <?php } ?>>
                    <a href="<?php echo site_url('student/counselingindex'); ?>">
                        <i class="icon-double-angle-right"></i>
                        Counseling List
                    </a>
                </li>
                
               
            </ul>
        </li>
        
        </li>
 
        
        
        
        </li>
 
                   
 <li <?php if ($page == 'Result') { ?>class="active" <?php } ?>>
            <a href="#" class="dropdown-toggle">
               
                <span>Result </span>

                <b class="arrow icon-angle-down"></b>
            </a>

            <ul class="submenu">

               
                
                 <li <?php if ($page == 'Result' && $menu == 'add') { ?>class="active" <?php } ?>>
                    <a href="<?php echo site_url('result/addsubjectwise'); ?>">
                        <i class="icon-double-angle-right"></i>
                      Add Result Subject Wise
                    </a>
                </li>
                  <li <?php if ($page == 'Result' && $menu == 'add') { ?>class="active" <?php } ?>>
                    <a href="<?php echo site_url('result/add'); ?>">
                        <i class="icon-double-angle-right"></i>
                      Add Result Reg. No wise
                    </a>
                </li>
                
                <li <?php if ($page == 'Result' && $menu == 'add') { ?>class="active" <?php } ?>>
                    <a href="<?php echo site_url('result'); ?>">
                        <i class="icon-double-angle-right"></i>
                      List Registration Wise
                    </a>
                </li>
                   <li <?php if ($page == 'Result' && $menu == 'add') { ?>class="active" <?php } ?>>
                    <a href="<?php echo site_url('result/sessionindex'); ?>">
                        <i class="icon-double-angle-right"></i>
                      List Session Wise
                    </a>
                </li>
            </ul>
        </li>
        
         
         
           <li <?php if ($page == 'Employee') { ?>class="active" <?php } ?>>
            <a href="#" class="dropdown-toggle">
               
                <span>Tabulation/Result Sheet</span>

                <b class="arrow icon-angle-down"></b>
            </a>

            <ul class="submenu">

               
                
                 <li <?php if ($page == 'Employee' && $menu == 'add') { ?>class="active" <?php } ?>>
                    <a href="<?php echo site_url('result/diplomaresultindex'); ?>">
                        <i class="icon-double-angle-right"></i>
                      Diploma Basic Certificate 
                    </a>
                </li>
                
                <li <?php if ($page == 'Employee' && $menu == 'add') { ?>class="active" <?php } ?>>
                    <a href="<?php echo site_url('result/diplomaresultgeneralindex'); ?>">
                        <i class="icon-double-angle-right"></i>
                      Diploma Associated(General)
                    </a>
                </li>
                <li <?php if ($page == 'Employee' && $menu == 'add') { ?>class="active" <?php } ?>>
                    <a href="<?php echo site_url('result/diplomaresultlifeindex'); ?>">
                        <i class="icon-double-angle-right"></i>
                      Diploma Associated(life)
                    </a>
                </li>
               
            </ul>
        </li>
        
      
         
         
          
        
      
<!--         <li <?php if ($page == 'Reports') { ?>class="active" <?php } ?>>
            <a href="#" class="dropdown-toggle">
              
                <span>Tabulation/Result Sheet  </span>

                <b class="arrow icon-angle-down"></b>
            </a>

            <ul class="submenu">
                <li <?php if ($page == 'Reports' && $menu == 'datewisefile') { ?>class="active" <?php } ?>>
                    <a href="<?php echo site_url('resultsheet'); ?>">
                        <i class="icon-double-angle-right"></i>
                      Result Sheet
                    </a>
                </li>

                
                
                
               
            </ul>
        </li>-->
      
        
        
  

   <?php }}?>
  

    </ul><!--/.nav-list-->

    <div id="sidebar-collapse">
        <i class="icon-double-angle-left"></i>
    </div>
</div>