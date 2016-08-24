<?php
class Student extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_auth');
		$this->m_auth->check_access();
	}
	
	function index()
	{
		$this->data['page_title'] = 'Student'; 
		$this->data['page'] = 'Student';
		$this->data['menu'] = 'list';
		
		$this->load->view('includes/header', $this->data);
		$this->load->view('includes/sidebar', $this->data);
		$this->load->view('student/index', $this->data);
		$this->load->view('includes/footer', $this->data);
	}
        
        	function waitingapprovedindex()
	{
		$this->data['page_title'] = 'Student'; 
		$this->data['page'] = 'Student';
		$this->data['menu'] = 'list';
		
		$this->load->view('includes/header', $this->data);
		$this->load->view('includes/sidebar', $this->data);
		$this->load->view('student/waitingapprovedindex', $this->data);
		$this->load->view('includes/footer', $this->data);
	}
        
        
        
	function oldindex()
	{
		$this->data['page_title'] = 'Student'; 
		$this->data['page'] = 'Student';
		$this->data['menu'] = 'list';
		
		$this->load->view('includes/header', $this->data);
		$this->load->view('includes/sidebar', $this->data);
		$this->load->view('student/oldindex', $this->data);
		$this->load->view('includes/footer', $this->data);
	}
        function memberindex()
	{
		$this->data['page_title'] = 'Member'; 
		$this->data['page'] = 'Member';
		$this->data['menu'] = 'list';
		
		$this->load->view('includes/header', $this->data);
		$this->load->view('includes/sidebar', $this->data);
		$this->load->view('student/memberindex', $this->data);
		$this->load->view('includes/footer', $this->data);
	}
        
        
        function counselingindex()
	{
		$this->data['page_title'] = 'Counseling'; 
		$this->data['page'] = 'Counseling';
		$this->data['menu'] = 'list';
		
		$this->load->view('includes/header', $this->data);
		$this->load->view('includes/sidebar', $this->data);
		$this->load->view('student/counselingindex', $this->data);
		$this->load->view('includes/footer', $this->data);
	}
          function counselingstudentindex()
	{
		$this->data['page_title'] = 'Counseling'; 
		$this->data['page'] = 'Counseling';
		$this->data['menu'] = 'list';
		
		$this->load->view('includes/header', $this->data);
		$this->load->view('includes/sidebar', $this->data);
		$this->load->view('student/counselingstudentindex', $this->data);
		$this->load->view('includes/footer', $this->data);
	}
        
	
           function memberstudentindex()
	{
		$this->data['page_title'] = 'Member'; 
		$this->data['page'] = 'Member';
		$this->data['menu'] = 'list';
		
		$this->load->view('includes/header', $this->data);
		$this->load->view('includes/sidebar', $this->data);
		$this->load->view('student/memberstudentindex', $this->data);
		$this->load->view('includes/footer', $this->data);
	}
        
        
        
        function usermanageindex()
	{
		$this->data['page_title'] = 'User'; 
		$this->data['page'] = 'User';
		$this->data['menu'] = 'list';
		
		$this->load->view('includes/header', $this->data);
		$this->load->view('includes/sidebar', $this->data);
		$this->load->view('employee/usermanageindex', $this->data);
		$this->load->view('includes/footer', $this->data);
	}
        
         function userroleindex()
	{
		$this->data['page_title'] = 'User'; 
		$this->data['page'] = 'User';
		$this->data['menu'] = 'list';
		
		$this->load->view('includes/header', $this->data);
		$this->load->view('includes/sidebar', $this->data);
		$this->load->view('employee/userroleindex', $this->data);
		$this->load->view('includes/footer', $this->data);
	}

	function checkduplicateclientID()
        {
                
		
                $this->db->where('client_id',$this->input->post('regno'));
		$query = $this->db->get('student');
		$row = $query->row();
				
                if(!empty($row))
		   {
			 $data['reservation_pop_up']= 1; 
                     
		   } 
                else {
                     $data['reservation_pop_up']= 0;
                     }
                     
                      $str=$this->input->post('subject');
                          
                                 $arrayissueto=explode("-",$str);
                                 $subject_id=$arrayissueto[1];
                                 
                 $this->db->where('student_registration_no',$this->input->post('regno'));
                 $this->db->where('session_month',$this->input->post('session'));
                 $this->db->where('session_year',$this->input->post('year'));
                $this->db->where('course_id',$this->input->post('course'));
                $this->db->where('subject_id',$subject_id);
		 $query1 = $this->db->get('result');
		 $row1 = $query1->row();
		
		
                if(!empty($row1))
		   {
			
                          $data['duplicate']= "0"; 
		   } 
                else
                    {
                     
                        $data['duplicate']= "1"; 
                  }
            
               echo json_encode($data);
  
           
        }
        
	function add()
	{
		$this->data['page_title'] = 'Add New Student'; 
		$this->data['page'] = 'Student';
		$this->data['menu'] = 'add';
		$this->data['action'] = 'add';
	
		//$this->form_validation->set_rules('username', 'username', 'required|is_unique[employee.employee_name]');
		
		$defaults = array ('defaults'=>'','approved_status'=>'','id'=>'', 'registration_no'=>'After Approval,Reg no will be auto generated', 'student_name'=>'', 'designation_id'=>'', 'father_name'=>'', 'mother_name'=>'', 'present_address_village'=>'', 'present_address_district_code'=>'', 'present_address_upzilla_code'=>'', 'present_address_post_office'=>'', 'present_address_post_code'=>'', 'permanent_address_village'=>'', 'permanent_address_district_code'=>'', 'permanent_address_upzilla_code'=>'', 'permanent_address_post_office'=>'', 'permanent_address_post_code'=>'', 'date_of_birth'=>'', 'contact_no'=>'', 'blood_group'=>'', 'emergency_contact_no'=>'', 'emergency_contact_name'=>'', 'mobile_no'=>'', 'email'=>'', 'gender'=>'', 'religion'=>'', 'marital_status'=>'', 'country'=>'', 'nationality'=>'', 'nationalid'=>'', 'session_id'=>'', 'session_month'=>'', 'session_year'=>'', 'session_month_year'=>'', 'course_id'=>'', 'organization_id'=>'', 'self_organization'=>'', 'current_employeement'=>'', 'current_employeement_address'=>'', 'ssc_examination'=>'', 'ssc_board'=>'', 'ssc_rollno'=>'', 'ssc_result'=>'', 'ssc_result_point'=>'', 'ssc_group'=>'', 'ssc_passing_year'=>'', 'hsc_examination'=>'', 'hsc_board'=>'', 'hsc_rollno'=>'', 'hsc_result'=>'', 'hsc_result_point'=>'', 'hsc_group'=>'', 'hsc_passing_year'=>'', 'graduation_examination'=>'', 'graduation_subject'=>'', 'graduation_university'=>'', 'graduation_result'=>'', 'graduation_passing_year'=>'', 'graduation_course_duration'=>'', 'graduation_result_point'=>'', 'masters_examination'=>'', 'masters_subject'=>'', 'masters_university'=>'', 'masters_result'=>'', 'masters_passing_year'=>'', 'masters_course_duration'=>'', 'masters_result_point'=>'', 'mphil_phd_examination'=>'', 'mphil_phd_subject'=>'', 'mphil_phd_university'=>'', 'mphil_phd_result'=>'', 'mphil_phd_passing_year'=>'', 'mphil_phd_course_duration'=>'', 'mphil_phd_result_point'=>'', 'professional_qualification'=>'', 'total_experience'=>'', 'registration_fee'=>'', 'membership_fee'=>'', 'counseling_fee'=>'', 'picture_path'=>'', 'remarks'=>'', 'defaults'=>'', 'create_date'=>'', 'create_by'=>'', 'update_date'=>'', 'update_by'=>'');
		if($_POST)
		{
		   $newdesignation=$this->input->post('txtadddesignation');                       
           if ($newdesignation!="")
           {
             $data = array( 'designation' => $newdesignation, );
              $designationid = $this->m_common->_insert('designation',$data);  
           }
           else
           {
              $designationid= $this->input->post('id_designation');
           }                       
           
           $newcourse=$this->input->post('txtaddcourse');                       
           if ($newcourse!="")
           {
                $data = array('course_name' => $newcourse, );
              $courseid = $this->m_common->_insert('course',$data);  
           }
           else
           {
              $courseid= $this->input->post('course_id');
           }
           
           $neworganization=$this->input->post('txtaddorganization');
           
           if ($neworganization!="")
           {
                $data = array(
                	'organization_name' => $neworganization,
                	'organization_group' => '1',
				 );
              $organizationid = $this->m_common->_insert('organization',$data);  
           }
           else
           {
              $organizationid= $this->input->post('organization_id');
           }
                       
   		$preupzila  =  $this->input->post('present_address_upzilla_code');
     	$preupzilas = explode("-", $preupzila);

		$this->load->helper('form');
		$config['upload_path'] = 'assets/images/';
		$config['allowed_types'] = 'gif|jpg|png';
		$this->load->library('upload', $config);
    	$this->upload->initialize($config);
    	$this->upload->set_allowed_types('*');
    	$this->upload->do_upload('picture_path');
      	$upload_data = $this->upload->data();

	    $data = array(
		   	'student_name'=>$this->input->post('student_name'), 
		   	'father_name'=>$this->input->post('father_name'),
	        'mother_name'=>$this->input->post('mother_name'),
	     	'present_address_district_code'=>$this->input->post('present_address_district_code'),
	        'present_address_upzilla_code'=> $preupzilas[0],
	        'present_address_post_code'=>$this->input->post('present_address_post_code'),
	        'permanent_address_district_code'=>$this->input->post('permanent_address_district_code'),
	        'permanent_address_upzilla_code'=>$this->input->post('permanent_address_upzilla_code'),
	        'permanent_address_post_code'=>$this->input->post('permanent_address_post_code'),
	        'course_id'=>$courseid,
	        'session_id'=>$this->input->post('session_id'),
	        'registration_fee'=>$this->input->post('registration_fee'),              
	        'organization_id'=>$organizationid,
	        'self_organization'=>$this->input->post('self_organization'),
	        'designation_id'=>$designationid,
	        'total_experience'=>$this->input->post('total_experience'),
	        'current_employeement'=>$this->input->post('current_employeement'),
	        'current_employeement_address'=>$this->input->post('current_employeement_address'),
	        'session_month'=>$this->input->post('session_month'),
	        'session_year'=>$this->input->post('session_year'),
	        'session_month_year'=>$this->input->post('session_month').'-'.$this->input->post('session_year'),
	        'date_of_birth'=>$this->input->post('date_of_birth'),
	        'contact_no'=>$this->input->post('contact_no'),
	        'mobile_no'=>$this->input->post('mobile_no'),
	        'email'=>$this->input->post('email'),
	        'gender'=>$this->input->post('gender'),
	        'blood_group'=>$this->input->post('blood_group'),
	        'emergency_contact_no'=>$this->input->post('emergency_contact_no'),
	        'emergency_contact_name'=>$this->input->post('emergency_contact_name'),
	        'religion'=>$this->input->post('religion'),
	        'country'=>$this->input->post('country'),
	        'nationality'=>$this->input->post('nationality'),
	        'nationalid'=>$this->input->post('nationalid'),
	        'marital_status'=>$this->input->post('marital_status'),
	        'present_address_village'=>$this->input->post('present_address_village'),
	        'present_address_district_code'=>$this->input->post('present_address_district_code'),
	        'present_address_upzilla_code'=>$this->input->post('present_address_upzilla_code'),
	        'present_address_post_office'=>$this->input->post('present_address_post_office'),
	        'present_address_post_code'=>$this->input->post('present_address_post_code'),
	        'permanent_address_village'=>$this->input->post('permanent_address_village'),
	        'permanent_address_district_code'=>$this->input->post('permanent_address_district_code'),
	        'permanent_address_upzilla_code'=>$this->input->post('permanent_address_upzilla_code'),
	        'permanent_address_post_office'=>$this->input->post('permanent_address_post_office'),
	        'permanent_address_post_code'=>$this->input->post('permanent_address_post_code'),
	        'ssc_examination'=>$this->input->post('ssc_examination'),
	        'ssc_board'=>$this->input->post('ssc_board'),
	        'ssc_rollno'=>$this->input->post('ssc_rollno'),
	        'ssc_result'=>$this->input->post('ssc_result'),
	        'ssc_result_point'=>$this->input->post('ssc_result_point'),
	        'ssc_group'=>$this->input->post('ssc_group'),
	        'ssc_passing_year'=>$this->input->post('ssc_passing_year'),
	        'hsc_examination'=>$this->input->post('hsc_examination'),
	        'hsc_board'=>$this->input->post('hsc_board'),
	        'hsc_rollno'=>$this->input->post('hsc_rollno'),
	        'hsc_result'=>$this->input->post('hsc_result'),
	        'hsc_result_point'=>$this->input->post('hsc_result_point'),
	        'hsc_group'=>$this->input->post('hsc_group'),
	        'hsc_passing_year'=>$this->input->post('hsc_passing_year'),
	        'graduation_examination'=>$this->input->post('graduation_examination'),
	        'graduation_subject'=>$this->input->post('graduation_subject'),
	        'graduation_university'=>$this->input->post('graduation_university'),
	        'graduation_result'=>$this->input->post('graduation_result'),
	        'graduation_passing_year'=>$this->input->post('graduation_passing_year'),
	        'graduation_course_duration'=>$this->input->post('graduation_course_duration'),
	        'graduation_result_point'=>$this->input->post('graduation_result_point'),
	        'masters_examination'=>$this->input->post('masters_examination'),
	        'masters_subject'=>$this->input->post('masters_subject'),
	        'masters_university'=>$this->input->post('masters_university'),
	        'masters_result'=>$this->input->post('masters_result'),
	        'masters_passing_year'=>$this->input->post('masters_passing_year'),
	        'masters_course_duration'=>$this->input->post('masters_course_duration'),
	        'masters_result_point'=>$this->input->post('masters_result_point'),
	        'mphil_phd_examination'=>$this->input->post('mphil_phd_examination'),
	        'mphil_phd_subject'=>$this->input->post('mphil_phd_subject'),
	        'mphil_phd_university'=>$this->input->post('mphil_phd_university'),
	        'mphil_phd_result'=>$this->input->post('mphil_phd_result'),
	        'mphil_phd_passing_year'=>$this->input->post('mphil_phd_passing_year'),
	        'mphil_phd_course_duration'=>$this->input->post('mphil_phd_course_duration'),
	        'mphil_phd_result_point'=>$this->input->post('mphil_phd_result_point'),
	      	'picture_path' => $upload_data['file_name'],
	        'student_type' =>1,
	        'registriation_status' =>1,
	        'approved_status' =>0,
			);
	   $id = $this->m_common->_insert('student',$data);
	   
	   $this->session->set_flashdata('success', "New Employee Type <a href='".site_url('employee/edit/'.$id)."'>".$this->input->post('name')." </a> Added Successfully!");
	   
	   redirect('/student');
		   //}
		}
		else
		{
		   $this->data['row'] = $defaults;
		}
            $this->data['subjects'] = $this->m_common->get_tabledata('subject','subject');
 			$this->data['organizations'] = $this->m_common->get_tabledata('organization','organization_name');
            $this->data['registration_no'] = $this->m_common->getregistrationno();
            $this->data['courses'] = $this->m_common->get_tabledata('course','course_name');
            $this->data['sessions'] = $this->m_common->get_tabledata('session','session_name');
            $this->data['districts'] = $this->m_common->get_districtdata();
            $this->data['upzillas'] = $this->m_common->get_upzilladata('1');
		    $this->data['designations'] = $this->m_common->get_tabledata('designation','designation');
            $this->data['organizations'] = $this->m_common->get_tabledata('organization','organization_name');
			$this->load->view('includes/header', $this->data);
			$this->load->view('includes/sidebar', $this->data);
			$this->load->view('student/form1', $this->data);
			$this->load->view('includes/footer', $this->data);
	}
        
        
   function addbasic()
	{
		$this->data['page_title'] = 'Add New Student'; 
		$this->data['page'] = 'Student';
		$this->data['menu'] = 'add';
		$this->data['action'] = 'add';
		//$this->form_validation->set_rules('password', 'Password', 'required|matches[repassword]'); 
		//$this->form_validation->set_rules('repassword', 'Confirm Password', 'repassword'); 
		//$this->form_validation->set_rules('username', 'username', 'required|is_unique[employee.employee_name]');
		
		$defaults = array ('defaults'=>'','id'=>'','session_month'=>'','session_year'=>'','picture_path'=>'' ,'session_id'=>'','designation_id'=>'','self_organization'=>'','registration_no'=>'', 'student_name'=>'', 'father_name'=>'', 'mother_name'=>'', 'present_address_upzilla_code'=>'', 'present_address_district_code'=>'', 'present_address_village'=>'', 'present_address_district_id'=>'', 'present_address_upzila'=>'', 'present_address_post_office'=>'', 'present_address_post_code'=>'', 'permanent_address_village'=>'', 'permanent_address_district_code'=>'', 'permanent_address_upzilla_code'=>'', 'permanent_address_post_office'=>'', 'permanent_address_post_code'=>'', 'date_of_birth'=>'', 'contact_no'=>'', 'mobile_no'=>'', 'email'=>'', 'gender'=>'', 'religion'=>'', 'country'=>'', 'nationality'=>'', 'course_id'=>'', 'organization_id'=>'', 'admission_organization_by'=>'', 'current_employeement'=>'', 'current_employeement_address'=>'', 'ssc_examination'=>'', 'ssc_board'=>'', 'ssc_rollno'=>'', 'ssc_result'=>'', 'ssc_group'=>'', 'ssc_passing_year'=>'', 'hsc_examination'=>'', 'hsc_board'=>'', 'hsc_rollno'=>'', 'hsc_result'=>'', 'hsc_group'=>'', 'hsc_passing_year'=>'', 'graduation_examination'=>'', 'graduation_subject'=>'', 'graduation_university'=>'', 'graduation_result'=>'', 'graduation_passing_year'=>'', 'graduation_course_duration'=>'', 'masters_examination'=>'', 'masters_subject'=>'', 'masters_university'=>'', 'masters_result'=>'', 'masters_passing_year'=>'', 'masters_course_duration'=>'', 'mphil_phd_examination'=>'', 'mphil_phd_subject'=>'', 'mphil_phd_university'=>'', 'mphil_phd_result'=>'', 'mphil_phd_passing_year'=>'', 'mphil_phd_course_duration'=>'', 'professional_qualification'=>'', 'total_experience'=>'', 'registration_fee'=>''
                        );
		if($_POST)
		{
              
                    $newdesignation=$this->input->post('txtadddesignation');
                       
                       if ($newdesignation!="")
                       {
                            $data = array('designation' => $newdesignation,
							 );
                          $designationid = $this->m_common->_insert('designation',$data);  
                       }
                       else
                       {
                          $designationid= $this->input->post('id_designation');
                       }
                       
                       
                       $newcourse=$this->input->post('txtaddcourse');
                       
                       if ($newcourse!="")
                       {
                            $data = array('course_name' => $newcourse,
							 );
                          $courseid = $this->m_common->_insert('course',$data);  
                       }
                       else
                       {
                          $courseid= $this->input->post('course_id');
                       }
                       
                       $neworganization=$this->input->post('txtaddorganization');
                       
                       if ($neworganization!="")
                       {
                            $data = array('organization_name' => $neworganization,
							 );
                          $organizationid = $this->m_common->_insert('organization',$data);  
                       }
                       else
                       {
                          $organizationid= $this->input->post('organization_id');
                       }
                       
                       
                       
			   $data = array('registration_no'=>$this->input->post('registration_no'), 'student_name'=>$this->input->post('student_name'), 'father_name'=>$this->input->post('father_name'),
                               'mother_name'=>$this->input->post('mother_name'),
                               'present_address_district_code'=>$this->input->post('present_address_district_code'),
                                 'present_address_upzilla_code'=>$this->input->post('present_address_upzilla_code'),
                                'present_address_post_code'=>$this->input->post('present_address_post_code'),
                                  'permanent_address_district_code'=>$this->input->post('permanent_address_district_code'),
                                 'permanent_address_upzilla_code'=>$this->input->post('permanent_address_upzilla_code'),
                                'permanent_address_post_code'=>$this->input->post('permanent_address_post_code'),
                                'course_id'=>$courseid,
                                'designation_id'=>$designationid,
                                 'session_id'=>$this->input->post('session_id'),
                               'registration_fee'=>$this->input->post('registration_fee'),
                               'registration_no'=>$this->input->post('registration_no'),
                                'organization_id'=>$organizationid,
                               'self_organization'=>$this->input->post('self_organization'),
                                 'total_experience'=>$this->input->post('total_experience'),
                                 'current_employeement'=>$this->input->post('current_employeement'),
                               'current_employeement_address'=>$this->input->post('current_employeement_address'),
                              	'session_month'=>$this->input->post('session_month'),
                                'session_year'=>$this->input->post('session_year'),
                                'mobile_no'=>$this->input->post('mobile_no'),
                               'session_month_year'=>$this->input->post('session_month').'-'.$this->input->post('session_year'),
                                 'student_type' =>2,
                               
							 );
			   
			   $id = $this->m_common->_insert('student',$data);
			   
			   $this->session->set_flashdata('success', "New Employee Type <a href='".site_url('employee/edit/'.$id)."'>".$this->input->post('name')." </a> Added Successfully!");
			   
			   redirect('/student/oldindex');
		   //}
		}
		else
		{
		   $this->data['row'] = $defaults;
		}
                $this->data['courses'] = $this->m_common->get_tabledata('course','course_name');
                 $this->data['sessions'] = $this->m_common->get_tabledata('session','session_name');
                 $this->data['districts'] = $this->m_common->get_districtdata();
                   $this->data['upzillas'] = $this->m_common->get_upzilladata('1');
		 $this->data['designations'] = $this->m_common->get_tabledata('designation','designation');
                $this->data['organizations'] = $this->m_common->get_tabledata('organization','organization_name');
		$this->load->view('includes/header', $this->data);
		$this->load->view('includes/sidebar', $this->data);
		$this->load->view('student/basicform', $this->data);
		$this->load->view('includes/footer', $this->data);
	}
        
        
      
	
        
        
        function memberedit($id = 0)
	{
		$this->data['page_title'] = 'Edit Member Student'; 
		$this->data['page'] = 'Member';
		$this->data['menu'] = 'add';
		$this->data['action'] = 'edit';
		
		
		$defaults = array ('defaults'=>'',
						   
						  );
		if($_POST)
		{
		  
			    $data = array(
                               'membership_fee'=>$this->input->post('membership_fee'),
                              
                               
							 );
			   
			 
			   
			   $id = $this->m_common->_update('student',$data,array('id'=>$id));
			   
			   $this->session->set_flashdata('success', "student <a href='".site_url('student/edit/'.$id)."'>".$this->input->post('student_name')." </a> Updated Successfully!");
			   
			   redirect('/student/memberindex');
		   
		}
		else
		{
                     $this->data['row']=$defaults;
		   $this->data['row'] = $this->m_common->_get('student',array('id'=>$id));
                     $this->data['courses'] = $this->m_common->get_tabledata('course','course_name');
                       $this->data['sessions'] = $this->m_common->get_tabledata('session','session_name');
                 $this->data['districts'] = $this->m_common->get_districtdata();
                   $this->data['upzillas'] = $this->m_common->get_upzilladata('1');
		
                $this->data['organizations'] = $this->m_common->get_tabledata('organization','organization_name');
		}
		
		$this->load->view('includes/header', $this->data);
		$this->load->view('includes/sidebar', $this->data);
		$this->load->view('student/memberform', $this->data);
		$this->load->view('includes/footer', $this->data);
	}
        
        
         function counselingedit($id = 0)
	{
		$this->data['page_title'] = 'Edit Counseling Student'; 
		$this->data['page'] = 'Counseling';
		$this->data['menu'] = 'add';
		$this->data['action'] = 'edit';
		
		
		$defaults = array ('defaults'=>'',
						   
						  );
		if($_POST)
		{
		  
			    $data = array(
                               'counseling_fee'=>$this->input->post('counseling_fee'),
                              
                               
							 );
			   
			 
			   
			   $id = $this->m_common->_update('student',$data,array('id'=>$id));
			   
			   $this->session->set_flashdata('success', "student <a href='".site_url('student/edit/'.$id)."'>".$this->input->post('student_name')." </a> Updated Successfully!");
			   
			   redirect('/student/counselingindex');
		   
		}
		else
		{
                     $this->data['row']=$defaults;
		   $this->data['row'] = $this->m_common->_get('student',array('id'=>$id));
                     $this->data['courses'] = $this->m_common->get_tabledata('course','course_name');
                       $this->data['sessions'] = $this->m_common->get_tabledata('session','session_name');
                 $this->data['districts'] = $this->m_common->get_districtdata();
                   $this->data['upzillas'] = $this->m_common->get_upzilladata('1');
		
                $this->data['organizations'] = $this->m_common->get_tabledata('organization','organization_name');
		}
		
		$this->load->view('includes/header', $this->data);
		$this->load->view('includes/sidebar', $this->data);
		$this->load->view('student/counselingform', $this->data);
		$this->load->view('includes/footer', $this->data);
	}
        
         function edit($id = 0)
	{
		$this->data['page_title'] = 'Edit Student'; 
		$this->data['page'] = 'Student';
		$this->data['menu'] = 'add';
		$this->data['action'] = 'edit';
		
		
		$defaults = array ('defaults'=>'',
						   
						  );
		if($_POST)
		{
                    
			   $newdesignation=$this->input->post('txtadddesignation');
                       
                       if ($newdesignation!="")
                       {
                            $data = array('designation' => $newdesignation,
							 );
                          $designationid = $this->m_common->_insert('designation',$data);  
                       }
                       else
                       {
                          $designationid= $this->input->post('id_designation');
                       }
                       
                       
                       $newcourse=$this->input->post('txtaddcourse');
                       
                       if ($newcourse!="")
                       {
                            $data = array('course_name' => $newcourse,
							 );
                          $courseid = $this->m_common->_insert('course',$data);  
                       }
                       else
                       {
                          $courseid= $this->input->post('course_id');
                       }
                       
                       $neworganization=$this->input->post('txtaddorganization');
                       
                       if ($neworganization!="")
                       {
                            $data = array('organization_name' => $neworganization,
                                'organization_group' => '1',
							 );
                          $organizationid = $this->m_common->_insert('organization',$data);  
                       }
                       else
                       {
                          $organizationid= $this->input->post('organization_id');
                       }
                       
   $preupzila  =  $this->input->post('present_address_upzilla_code');
     $preupzilas = explode("-", $preupzila);




$this->load->helper('form');
		$config['upload_path'] = 'assets/images/';
		$config['allowed_types'] = 'gif|jpg|png';
		$this->load->library('upload', $config);
    $this->upload->initialize($config);
    $this->upload->set_allowed_types('*');
    $this->upload->do_upload('picture_path');
      $upload_data = $this->upload->data();

			   $data = array('student_name'=>$this->input->post('student_name'), 'father_name'=>$this->input->post('father_name'),
                               'mother_name'=>$this->input->post('mother_name'),
                               'present_address_district_code'=>$this->input->post('present_address_district_code'),
                                 'present_address_upzilla_code'=> $preupzilas[0],
                                'present_address_post_code'=>$this->input->post('present_address_post_code'),
                                  'permanent_address_district_code'=>$this->input->post('permanent_address_district_code'),
                                 'permanent_address_upzilla_code'=>$this->input->post('permanent_address_upzilla_code'),
                                'permanent_address_post_code'=>$this->input->post('permanent_address_post_code'),
                                'course_id'=>$courseid,
                                 'session_id'=>$this->input->post('session_id'),
                               'registration_fee'=>$this->input->post('registration_fee'),
                              
                                'organization_id'=>$organizationid,
                               'self_organization'=>$this->input->post('self_organization'),
                               'designation_id'=>$designationid,
                              'total_experience'=>$this->input->post('total_experience'),
                                'current_employeement'=>$this->input->post('current_employeement'),
                               'current_employeement_address'=>$this->input->post('current_employeement_address'),
                                'session_month'=>$this->input->post('session_month'),
                                'session_year'=>$this->input->post('session_year'),
                               'session_month_year'=>$this->input->post('session_month').'-'.$this->input->post('session_year'),
                                  'date_of_birth'=>$this->input->post('date_of_birth'),
                               'contact_no'=>$this->input->post('contact_no'),
                               'mobile_no'=>$this->input->post('mobile_no'),
                               'email'=>$this->input->post('email'),
                               'gender'=>$this->input->post('gender'),
                               'blood_group'=>$this->input->post('blood_group'),
                                'emergency_contact_no'=>$this->input->post('emergency_contact_no'),
                                 'emergency_contact_name'=>$this->input->post('emergency_contact_name'),
                               'religion'=>$this->input->post('religion'),
                               'country'=>$this->input->post('country'),
                                'nationality'=>$this->input->post('nationality'),
                                'nationalid'=>$this->input->post('nationalid'),
                               'marital_status'=>$this->input->post('marital_status'),
                                 'present_address_village'=>$this->input->post('present_address_village'),
                               'present_address_district_code'=>$this->input->post('present_address_district_code'),
                               'present_address_upzilla_code'=>$preupzilas[0],
                               'present_address_post_office'=>$this->input->post('present_address_post_office'),
                               'present_address_post_code'=>$this->input->post('present_address_post_code'),
                               'permanent_address_village'=>$this->input->post('permanent_address_village'),
                               'permanent_address_district_code'=>$this->input->post('permanent_address_district_code'),
                               'permanent_address_upzilla_code'=>$this->input->post('permanent_address_upzilla_code'),
                               'permanent_address_post_office'=>$this->input->post('permanent_address_post_office'),
                               'permanent_address_post_code'=>$this->input->post('permanent_address_post_code'),
                                 'ssc_examination'=>$this->input->post('ssc_examination'),
                                 'ssc_board'=>$this->input->post('ssc_board'),
                                 'ssc_rollno'=>$this->input->post('ssc_rollno'),
                                 'ssc_result'=>$this->input->post('ssc_result'),
                               'ssc_result_point'=>$this->input->post('ssc_result_point'),
                                 'ssc_group'=>$this->input->post('ssc_group'),
                                 'ssc_passing_year'=>$this->input->post('ssc_passing_year'),
                                  'hsc_examination'=>$this->input->post('hsc_examination'),
                                 'hsc_board'=>$this->input->post('hsc_board'),
                                 'hsc_rollno'=>$this->input->post('hsc_rollno'),
                                 'hsc_result'=>$this->input->post('hsc_result'),
                               'hsc_result_point'=>$this->input->post('hsc_result_point'),
                                 'hsc_group'=>$this->input->post('hsc_group'),
                                 'hsc_passing_year'=>$this->input->post('hsc_passing_year'),
                                 'graduation_examination'=>$this->input->post('graduation_examination'),
                                 'graduation_subject'=>$this->input->post('graduation_subject'),
                                 'graduation_university'=>$this->input->post('graduation_university'),
                               'graduation_result'=>$this->input->post('graduation_result'),
                               'graduation_passing_year'=>$this->input->post('graduation_passing_year'),
                               'graduation_course_duration'=>$this->input->post('graduation_course_duration'),
                                'graduation_result_point'=>$this->input->post('graduation_result_point'),
                               'masters_examination'=>$this->input->post('masters_examination'),
                                 'masters_subject'=>$this->input->post('masters_subject'),
                                 'masters_university'=>$this->input->post('masters_university'),
                               'masters_result'=>$this->input->post('masters_result'),
                               'masters_passing_year'=>$this->input->post('masters_passing_year'),
                               'masters_course_duration'=>$this->input->post('masters_course_duration'),
                               'masters_result_point'=>$this->input->post('masters_result_point'),
                               'mphil_phd_examination'=>$this->input->post('mphil_phd_examination'),
                                 'mphil_phd_subject'=>$this->input->post('mphil_phd_subject'),
                                 'mphil_phd_university'=>$this->input->post('mphil_phd_university'),
                               'mphil_phd_result'=>$this->input->post('mphil_phd_result'),
                               'mphil_phd_passing_year'=>$this->input->post('mphil_phd_passing_year'),
                               'mphil_phd_course_duration'=>$this->input->post('mphil_phd_course_duration'),
                                'mphil_phd_result_point'=>$this->input->post('mphil_phd_result_point'),
                              		 'picture_path' => $upload_data['file_name'],
                               'student_type' =>1,
                               
							 ); 
			   $id = $this->m_common->_update('student',$data,array('id'=>$id));
			   
			 
			   
			   redirect('/student');
		   
		}
		else
		{
                    
                      $this->data['subjects'] = $this->m_common->get_tabledata('subject','subject');
                     
		   $this->data['row'] = $this->m_common->_get('student',array('id'=>$id));
                     $this->data['courses'] = $this->m_common->get_tabledata('course','course_name');
                       $this->data['sessions'] = $this->m_common->get_tabledata('session','session_name');
                 $this->data['districts'] = $this->m_common->get_districtdata();
                   $this->data['upzillas'] = $this->m_common->get_upzilladata('1');
		 $this->data['designations'] = $this->m_common->get_tabledata('designation','designation');
                $this->data['organizations'] = $this->m_common->get_tabledata('organization','organization_name');
		}
		
		$this->load->view('includes/header', $this->data);
		$this->load->view('includes/sidebar', $this->data);
		$this->load->view('student/form', $this->data);
		$this->load->view('includes/footer', $this->data);
        }
        
        
          function oldedit($id = 0)
	{
		$this->data['page_title'] = 'Edit Student'; 
		$this->data['page'] = 'Student';
		$this->data['menu'] = 'add';
		$this->data['action'] = 'edit';
		
		
		$defaults = array ('defaults'=>'',
						   
						  );
		if($_POST)
		{
		  
			    $newdesignation=$this->input->post('txtadddesignation');
                       
                       if ($newdesignation!="")
                       {
                            $data = array('designation' => $newdesignation,
							 );
                          $designationid = $this->m_common->_insert('designation',$data);  
                       }
                       else
                       {
                          $designationid= $this->input->post('id_designation');
                       }
                       
                       
                       $newcourse=$this->input->post('txtaddcourse');
                       
                       if ($newcourse!="")
                       {
                            $data = array('course_name' => $newcourse,
							 );
                          $courseid = $this->m_common->_insert('course',$data);  
                       }
                       else
                       {
                          $courseid= $this->input->post('course_id');
                       }
                       
                       $neworganization=$this->input->post('txtaddorganization');
                       
                       if ($neworganization!="")
                       {
                            $data = array('organization_name' => $neworganization,
							 );
                          $organizationid = $this->m_common->_insert('organization',$data);  
                       }
                       else
                       {
                          $organizationid= $this->input->post('organization_id');
                       }
                       
                       
                       
			   $data = array('registration_no'=>$this->input->post('registration_no'), 'student_name'=>$this->input->post('student_name'), 'father_name'=>$this->input->post('father_name'),
                               'mother_name'=>$this->input->post('mother_name'),
                               'present_address_district_code'=>$this->input->post('present_address_district_code'),
                                 'present_address_upzilla_code'=>$this->input->post('present_address_upzilla_code'),
                                'present_address_post_code'=>$this->input->post('present_address_post_code'),
                                  'permanent_address_district_code'=>$this->input->post('permanent_address_district_code'),
                                 'permanent_address_upzilla_code'=>$this->input->post('permanent_address_upzilla_code'),
                                'permanent_address_post_code'=>$this->input->post('permanent_address_post_code'),
                                'course_id'=>$courseid,
                                'designation_id'=>$designationid,
                                 'session_id'=>$this->input->post('session_id'),
                               'registration_fee'=>$this->input->post('registration_fee'),
                               'registration_no'=>$this->input->post('registration_no'),
                                'organization_id'=>$organizationid,
                               'self_organization'=>$this->input->post('self_organization'),
                                 'total_experience'=>$this->input->post('total_experience'),
                                 'current_employeement'=>$this->input->post('current_employeement'),
                               'current_employeement_address'=>$this->input->post('current_employeement_address'),
                              	'session_month'=>$this->input->post('session_month'),
                                'session_year'=>$this->input->post('session_year'),
                               'mobile_no'=>$this->input->post('mobile_no'),
                               'session_month_year'=>$this->input->post('session_month').'-'.$this->input->post('session_year'),
                                 'student_type' =>2,
							 );			 
			   
			   $id = $this->m_common->_update('student',$data,array('id'=>$id));
			   
			   $this->session->set_flashdata('success', "student <a href='".site_url('student/edit/'.$id)."'>".$this->input->post('student_name')." </a> Updated Successfully!");
			   
			   redirect('/student/oldindex');
		   
		}
		else
		{
                    
                    
                     $this->data['row']=$defaults;
		   $this->data['row'] = $this->m_common->_get('student',array('id'=>$id));
                     $this->data['courses'] = $this->m_common->get_tabledata('course','course_name');
                       $this->data['sessions'] = $this->m_common->get_tabledata('session','session_name');
                 $this->data['districts'] = $this->m_common->get_districtdata();
                   $this->data['upzillas'] = $this->m_common->get_upzilladata('1');
		 $this->data['designations'] = $this->m_common->get_tabledata('designation','designation');
                $this->data['organizations'] = $this->m_common->get_tabledata('organization','organization_name');
		}
		
		$this->load->view('includes/header', $this->data);
		$this->load->view('includes/sidebar', $this->data);
		$this->load->view('student/basicform', $this->data);
		$this->load->view('includes/footer', $this->data);
        }
        
        
        function usermanageedit($id = 0)
	{
		$this->data['page_title'] = 'Edit employee'; 
		$this->data['page'] = 'employee';
		$this->data['menu'] = 'add';
		$this->data['action'] = 'edit';
		
		$this->form_validation->set_rules('username', 'username', 'required|callback__check_name['.$id.']');
		
		$defaults = array ('employee_name'=>'',
						   'employee_short_name'=>'',
						  );
		if($_POST)
		{
		   if (!$this->form_validation->run())
		   {
			   $this->data['row'] = array_merge($this->m_common->_get('employee',array('id'=>$id)), $_POST);
		   }
		   else
		   {
			   $data = array(
                                'user_type' => $this->input->post('user_type'),
                               
							 );
			   
			 
			   
			   $id = $this->m_common->_update('employee',$data,array('id'=>$id));
			   
			   $this->session->set_flashdata('success', "employee <a href='".site_url('employee/edit/'.$id)."'>".$this->input->post('employee_name')." </a> Updated Successfully!");
			   
			   redirect('/employee/usermanageindex');
		   }
		}
		else
		{
		   $this->data['row'] = $this->m_common->_get('employee',array('id'=>$id));
                    $this->data['designations'] = $this->m_common->get_tabledata('designation','designation');
		$this->data['departments'] = $this->m_common->get_tabledata('department','department_name');
		}
		
		$this->load->view('includes/header', $this->data);
		$this->load->view('includes/sidebar', $this->data);
		$this->load->view('employee/usermanageform', $this->data);
		$this->load->view('includes/footer', $this->data);
	}
        
        
        function userroleedit($id = 0)
	{
		$this->data['page_title'] = 'Edit employee'; 
		$this->data['page'] = 'employee';
		$this->data['menu'] = 'add';
		$this->data['action'] = 'edit';
		
		$this->form_validation->set_rules('employee_name', 'employee_name', 'required|callback__check_name['.$id.']');
		
		$defaults = array ('employee_name'=>'',
						   'employee_short_name'=>'',
						  );
		if($_POST)
		{
		   if (!$this->form_validation->run())
		   {
			   $this->data['row'] = array_merge($this->m_common->_get('employee',array('id'=>$id)), $_POST);
		   }
		   else
		   {
			   $data = array(
                                'user_type' => $this->input->post('user_type'),
                               
							 );
			   
			 
			   
			   $id = $this->m_common->_update('employee',$data,array('id'=>$id));
			   
			   $this->session->set_flashdata('success', "employee <a href='".site_url('employee/edit/'.$id)."'>".$this->input->post('employee_name')." </a> Updated Successfully!");
			   
			   redirect('/employee/userroleindex');
		   }
		}
		else
		{
		   $this->data['row'] = $this->m_common->_get('employee',array('id'=>$id));
                    $this->data['designations'] = $this->m_common->get_tabledata('designation','designation');
		$this->data['departments'] = $this->m_common->get_tabledata('department','department_name');
		}
		
		$this->load->view('includes/header', $this->data);
		$this->load->view('includes/sidebar', $this->data);
		$this->load->view('employee/userroleform', $this->data);
		$this->load->view('includes/footer', $this->data);
	}
        
        
        function delete($id = 0)
	{
		
		$this->m_common->_delete('student',array('id'=>$id));
		//$this->session->set_flashdata('success', "User <a href='#'>".$['depatment_name']."</a> Deleted Successfully!");
		redirect('/student');
	}
	
        
        
        
        function usermanageget()
	{
		$x = new stdClass();
	
		$x->aaData  = array();
		
		$aColumns = array('id','employee_name','employee_short_name');
		
		$sort_column = 'id';
		
		$sort_order = 'desc';
		
		if ( isset( $_GET['iSortCol_0'] ) && isset( $_GET['sSortDir_0'] ))
		{
			$sort_column = $aColumns[ intval( $_GET['iSortCol_0'] ) ];
			$sort_order = $_GET['sSortDir_0'];
		}
		
		if($_GET['sSearch'] != '')
			$this->db->like('employee_name',$_GET['sSearch'],'both');
		
		$this->db->limit($_GET['iDisplayLength'],$_GET['iDisplayStart']);
		$this->db->order_by($sort_column,$sort_order);
		
		$this->db->select('SQL_CALC_FOUND_ROWS *', FALSE);
		$this->db->from('employee');
		$query = $this->db->get();
		$result = $query->result();
		
		$cnt = $this->m_common->get_search_count();
		
		$x->iTotalRecords = $cnt;
		$x->iTotalDisplayRecords = $cnt;
		$x->sEcho = intval($_GET['sEcho']);
		
		foreach ($result as $row) {
			array_push($x->aaData, array(
					$row->employee_name, 
                            $row->username ,
                             $row->user_type ,
					'<a href="'.site_url("employee/usermanageedit/".$row->id).'" class="btn btn-mini btn-info"><i class="icon-edit bigger-120"></i></a>&nbsp;',
					
			));
		}
	
	
		header('Content-Type: application/json');
		echo json_encode($x); 
	}
        
         function userroleget()
	{
		$x = new stdClass();
	
		$x->aaData  = array();
		
		$aColumns = array('id','employee_name','employee_short_name');
		
		$sort_column = 'id';
		
		$sort_order = 'desc';
		
		if ( isset( $_GET['iSortCol_0'] ) && isset( $_GET['sSortDir_0'] ))
		{
			$sort_column = $aColumns[ intval( $_GET['iSortCol_0'] ) ];
			$sort_order = $_GET['sSortDir_0'];
		}
		
		if($_GET['sSearch'] != '')
			$this->db->like('employee_name',$_GET['sSearch'],'both');
		
		$this->db->limit($_GET['iDisplayLength'],$_GET['iDisplayStart']);
		$this->db->order_by($sort_column,$sort_order);
		
		$this->db->select('SQL_CALC_FOUND_ROWS *', FALSE);
		$this->db->from('employee');
		$query = $this->db->get();
		$result = $query->result();
		
		$cnt = $this->m_common->get_search_count();
		
		$x->iTotalRecords = $cnt;
		$x->iTotalDisplayRecords = $cnt;
		$x->sEcho = intval($_GET['sEcho']);
		
		foreach ($result as $row) {
			array_push($x->aaData, array(
					$row->employee_name, 
                            $row->username ,
                             $row->user_type ,
					'<a href="'.site_url("employee/userroleedit/".$row->id).'" class="btn btn-mini btn-info"><i class="icon-edit bigger-120"></i></a>&nbsp;',
					
			));
		}
	
	
		header('Content-Type: application/json');
		echo json_encode($x); 
	}
       
        
        
        function memberstudentget()
	{
		$x = new stdClass();
	
		$x->aaData  = array();
		
		$aColumns = array('id','registration_no','student_name','course_id');
		
		$sort_column = 'id';
		
		$sort_order = 'desc';
		
		if ( isset( $_GET['iSortCol_0'] ) && isset( $_GET['sSortDir_0'] ))
		{
			$sort_column = $aColumns[ intval( $_GET['iSortCol_0'] ) ];
			$sort_order = $_GET['sSortDir_0'];
		}
		
		if($_GET['sSearch'] != '')
                {
			$this->db->like('student_name',$_GET['sSearch'],'both');
                       // $this->db->likeor('d.designation',$_GET['sSearch'],'both');
                }
		$this->db->limit($_GET['iDisplayLength'],$_GET['iDisplayStart']);
		$this->db->order_by($sort_column,$sort_order);
		
		$this->db->select('s.id,registration_no,student_name,c.course_name,se.session_name', FALSE);
		$this->db->from('student s');
               $this->db->join('course c', 'c.id = s.course_id');
                  $this->db->join('session se', 'se.id = s.session_id');
                  $this->db->where('membership_fee is  NULL', NULL, FALSE);
                   
		$query = $this->db->get();
		$result = $query->result();
		
		$cnt = $this->m_common->get_search_count();
		
		$x->iTotalRecords = $cnt;
		$x->iTotalDisplayRecords = $cnt;
		$x->sEcho = intval($_GET['sEcho']);
		
		foreach ($result as $row) {
			array_push($x->aaData, array(
					$row->registration_no.'/'.$row->session_name, 
                             $row->student_name ,  $row->course_name,
					'<a href="'.site_url("student/memberedit/".$row->id).'" class="btn btn-mini btn-info">Add Membership</a>&nbsp;',
					
			));
		}
	
	
		header('Content-Type: application/json');
		echo json_encode($x); 
	}
        
        
         function counselingstudentget()
	{
		$x = new stdClass();
	
		$x->aaData  = array();
		
		$aColumns = array('id','registration_no','student_name','course_id');
		
		$sort_column = 'id';
		
		$sort_order = 'desc';
		
		if ( isset( $_GET['iSortCol_0'] ) && isset( $_GET['sSortDir_0'] ))
		{
			$sort_column = $aColumns[ intval( $_GET['iSortCol_0'] ) ];
			$sort_order = $_GET['sSortDir_0'];
		}
		
		if($_GET['sSearch'] != '')
                {
			$this->db->like('student_name',$_GET['sSearch'],'both');
                       // $this->db->likeor('d.designation',$_GET['sSearch'],'both');
                }
		$this->db->limit($_GET['iDisplayLength'],$_GET['iDisplayStart']);
		$this->db->order_by($sort_column,$sort_order);
		
		$this->db->select('s.id,registration_no,student_name,c.course_name,se.session_name', FALSE);
		$this->db->from('student s');
               $this->db->join('course c', 'c.id = s.course_id');
                  $this->db->join('session se', 'se.id = s.session_id');
                  $this->db->where('membership_fee is  not NULL', NULL, FALSE);
                  // $this->db->or_where('counseling_fee is   NULL', NULL, FALSE);
                   
		$query = $this->db->get();
		$result = $query->result();
		
		$cnt = $this->m_common->get_search_count();
		
		$x->iTotalRecords = $cnt;
		$x->iTotalDisplayRecords = $cnt;
		$x->sEcho = intval($_GET['sEcho']);
		
		foreach ($result as $row) {
			array_push($x->aaData, array(
					$row->registration_no.'/'.$row->session_name, 
                             $row->student_name ,  $row->course_name,
					'<a href="'.site_url("student/counselingedit/".$row->id).'" class="btn btn-mini btn-info">Add Counseling</a>&nbsp;',
					
			));
		}
	
	
		header('Content-Type: application/json');
		echo json_encode($x); 
	}
        
        
        function counselingget()
	{
		$x = new stdClass();
	
		$x->aaData  = array();
		
		$aColumns = array('id','registration_no','student_name','course_id');
		
		$sort_column = 'id';
		
		$sort_order = 'desc';
		
		if ( isset( $_GET['iSortCol_0'] ) && isset( $_GET['sSortDir_0'] ))
		{
			$sort_column = $aColumns[ intval( $_GET['iSortCol_0'] ) ];
			$sort_order = $_GET['sSortDir_0'];
		}
		
		if($_GET['sSearch'] != '')
                {
			$this->db->like('student_name',$_GET['sSearch'],'both');
                       // $this->db->likeor('d.designation',$_GET['sSearch'],'both');
                }
		$this->db->limit($_GET['iDisplayLength'],$_GET['iDisplayStart']);
		$this->db->order_by($sort_column,$sort_order);
		
		$this->db->select('s.id,registration_no,student_name,c.course_name,se.session_name', FALSE);
		$this->db->from('student s');
               $this->db->join('course c', 'c.id = s.course_id');
                  $this->db->join('session se', 'se.id = s.session_id');
                  $this->db->where('counseling_fee is NOT NULL', NULL, FALSE);
                   
		$query = $this->db->get();
		$result = $query->result();
		
		$cnt = $this->m_common->get_search_count();
		
		$x->iTotalRecords = $cnt;
		$x->iTotalDisplayRecords = $cnt;
		$x->sEcho = intval($_GET['sEcho']);
		
		foreach ($result as $row) {
			array_push($x->aaData, array(
					$row->registration_no.'/'.$row->session_name, 
                             $row->student_name ,  $row->course_name,
					'<a href="'.site_url("student/counselingedit/".$row->id).'" class="btn btn-mini btn-info"><i class="icon-edit bigger-120"></i></a>&nbsp;<a href="'.site_url("employee/delete/".$row->id).'" class="btn btn-mini btn-danger" onclick="return confirm_status();"><i class="icon-trash bigger-120"></i></a>',
					
			));
		}
	
	
		header('Content-Type: application/json');
		echo json_encode($x); 
	}
        
	function memberget()
	{
		$x = new stdClass();
	
		$x->aaData  = array();
		
		$aColumns = array('id','registration_no','student_name','course_id');
		
		$sort_column = 'id';
		
		$sort_order = 'desc';
		
		if ( isset( $_GET['iSortCol_0'] ) && isset( $_GET['sSortDir_0'] ))
		{
			$sort_column = $aColumns[ intval( $_GET['iSortCol_0'] ) ];
			$sort_order = $_GET['sSortDir_0'];
		}
		
		if($_GET['sSearch'] != '')
                {
			$this->db->like('student_name',$_GET['sSearch'],'both');
                       // $this->db->likeor('d.designation',$_GET['sSearch'],'both');
                }
		$this->db->limit($_GET['iDisplayLength'],$_GET['iDisplayStart']);
		$this->db->order_by($sort_column,$sort_order);
		
		$this->db->select('s.id,registration_no,student_name,c.course_name,se.session_name', FALSE);
		$this->db->from('student s');
               $this->db->join('course c', 'c.id = s.course_id');
                  $this->db->join('session se', 'se.id = s.session_id');
                  $this->db->where('membership_fee is NOT NULL', NULL, FALSE);
                   
		$query = $this->db->get();
		$result = $query->result();
		
		$cnt = $this->m_common->get_search_count();
		
		$x->iTotalRecords = $cnt;
		$x->iTotalDisplayRecords = $cnt;
		$x->sEcho = intval($_GET['sEcho']);
		
		foreach ($result as $row) {
			array_push($x->aaData, array(
					$row->registration_no.'/'.$row->session_name, 
                             $row->student_name ,  $row->course_name,
					'<a href="'.site_url("student/memberedit/".$row->id).'" class="btn btn-mini btn-info"><i class="icon-edit bigger-120"></i></a>&nbsp;<a href="'.site_url("employee/delete/".$row->id).'" class="btn btn-mini btn-danger" onclick="return confirm_status();"><i class="icon-trash bigger-120"></i></a>',
					
			));
		}
	
	
		header('Content-Type: application/json');
		echo json_encode($x); 
	}
        
        
        
        
        
        function waitingapprovedget()
	{
		$x = new stdClass();
	
		$x->aaData  = array();
		
		$aColumns = array('id','registration_no','student_name','course_id');
		
		$sort_column = 'id';
		
		$sort_order = 'desc';
		
		if ( isset( $_GET['iSortCol_0'] ) && isset( $_GET['sSortDir_0'] ))
		{
			$sort_column = $aColumns[ intval( $_GET['iSortCol_0'] ) ];
			$sort_order = $_GET['sSortDir_0'];
		}
		
		if($_GET['sSearch'] != '')
                {
			$this->db->like('student_name',$_GET['sSearch'],'both');
                       // $this->db->likeor('d.designation',$_GET['sSearch'],'both');
                }
		$this->db->limit($_GET['iDisplayLength'],$_GET['iDisplayStart']);
		$this->db->order_by($sort_column,$sort_order);
		
		$this->db->select('s.id,registration_no,student_name,c.course_name,s.session_month_year session_name,s.approved_status', FALSE);
		$this->db->from('student s');
               $this->db->join('course c', 'c.id = s.course_id');
               $this->db->where('s.student_type', '1');
               $this->db->where('s.registration_no', NULL);
             // $this->db->where('s.registration_no is null', '');
                 // $this->db->join('session se', 'se.id = s.session_id');
		$query = $this->db->get();
		$result = $query->result();
		
		$cnt = $this->m_common->get_search_count();
		
		$x->iTotalRecords = $cnt;
		$x->iTotalDisplayRecords = $cnt;
		$x->sEcho = intval($_GET['sEcho']);
		
		foreach ($result as $row) {
                    
                    
			if($this->session->userdata('roles_update')!=1) 
                     {
                     $hrefval="";
                   }
                   else
                   {
                      if ($row->approved_status==1) 
                      {
                         $hrefval="";  
                      }
                      else
                      {
                        $hrefval=site_url("student/edit/".$row->id); 
                      }
                   }
                   
                       if($this->session->userdata('roles_delete')!=1) 
                     {
                     $hrefdelval="";
                     $hrefdeljavaval="";
                   }
                   else
                   {
                        $hrefdelval=site_url("student/delete/".$row->id); 
                       $hrefdeljavaval ='onclick="return confirm_status();"';
                   }
                    if($this->session->userdata('roles_approved')!=1) 
                     {
                     $hrefappval="";
                     $hrefapptitle="";
                     
                   }
                   else
                   {
                        if ($row->approved_status==1) {
                        $hrefappval=site_url("student/approvedback/".$row->id); 
                       $hrefapptitle ='Approved Role Back';
                        }
                        else
                        {
                          $hrefappval=site_url("student/approved/".$row->id); 
                       $hrefapptitle ='Approve';   
                        }
                   }
                   
                    if ($this->session->userdata('roles_approved')==1) {
                    array_push($x->aaData, array(
					$row->registration_no, 
                             $row->student_name ,  $row->course_name,
	'<a href="'.$hrefappval.'" class="btn btn-mini btn-info"><i>'.$hrefapptitle.'</i></a>&nbsp;<a href="'.$hrefval.'" class="btn btn-mini btn-info"><i class="icon-edit bigger-120"></i></a>&nbsp;<a href="'.$hrefdelval.'" class="btn btn-mini btn-danger" '.$hrefdeljavaval.'><i class="icon-trash bigger-120"></i></a>',
					
			));
                    }
                    else
                    {
                         array_push($x->aaData, array(
					$row->registration_no, 
                             $row->student_name ,  $row->course_name,
	'<a href="'.$hrefval.'" class="btn btn-mini btn-info"><i class="icon-edit bigger-120"></i></a>',
					
			));   
                    }
                    
                    
                    
                        }
	
	
		header('Content-Type: application/json');
		echo json_encode($x); 
	}
        
        function oldget()
	{
		$x = new stdClass();
	
		$x->aaData  = array();
		
		$aColumns = array('registration_no','student_name','mobile_no');
		
		$sort_column = 'registration_no';
		
		$sort_order = 'desc';
		
		if ( isset( $_GET['iSortCol_0'] ) && isset( $_GET['sSortDir_0'] ))
		{
			$sort_column = $aColumns[ intval( $_GET['iSortCol_0'] ) ];
			$sort_order = $_GET['sSortDir_0'];
		}
		
		if($_GET['sSearch'] != '')
                {
			$this->db->like('CONCAT(registration_no,"/",session_month_year,student_name,mobile_no)',$_GET['sSearch'],'both');
                       // $this->db->likeor('d.designation',$_GET['sSearch'],'both');
                }
		$this->db->limit($_GET['iDisplayLength'],$_GET['iDisplayStart']);
		$this->db->order_by($sort_column,$sort_order);
		
		$this->db->select('d.designation,s.id,mobile_no,registration_no,student_name,c.course_name,s.session_month_year session_name,s.approved_status', FALSE);
		$this->db->from('student s');
               $this->db->join('course c', 'c.id = s.course_id');
                $this->db->join('designation d', 'd.id = s.designation_id');
               $this->db->where('s.student_type', '2');
                 // $this->db->join('session se', 'se.id = s.session_id');
		$query = $this->db->get();
		$result = $query->result();
		
                $this->db->select('SQL_CALC_FOUND_ROWS *', FALSE);
		$this->db->from('student');
              //$this->db->join('designation d', 'd.id = student.designation_id');
                if($_GET['sSearch'] != '')
                {
			$this->db->like('CONCAT(registration_no,"/",session_month_year,student_name,mobile_no)',$_GET['sSearch'],'both');
                      //$this->db->or_like('d.designation',$_GET['sSearch'],'both');
                }
		$query1 = $this->db->get();
		$result1 = $query1->result();
		
		$cnt = $this->m_common->get_search_count();
		
		$x->iTotalRecords = $cnt;
		$x->iTotalDisplayRecords = $cnt;
		$x->sEcho = intval($_GET['sEcho']);
		
		foreach ($result as $row) {
		if($this->session->userdata('roles_update')!=1) 
                     {
                     $hrefval="";
                   }
                   else
                   {
                        $hrefval=site_url("student/oldedit/".$row->id); 
                   }
                   
                       if($this->session->userdata('roles_delete')!=1) 
                     {
                     $hrefdelval="";
                     $hrefdeljavaval="";
                   }
                   else
                   {
                        $hrefdelval=site_url("student/delete/".$row->id); 
                       $hrefdeljavaval ='onclick="return confirm_status();"';
                   }		
                    array_push($x->aaData, array(
					$row->registration_no.'/'.$row->session_name, 
                             $row->student_name , 
                             $row->designation , 
                        $row->course_name,
                        $row->mobile_no ,
					'<a href="'.$hrefval.'" class="btn btn-mini btn-info"><i class="icon-edit bigger-120"></i></a>&nbsp;<a href="'.$hrefdelval.'" class="btn btn-mini btn-danger" '.$hrefdeljavaval.'><i class="icon-trash bigger-120"></i></a>',
					
			));
		}
	
	
		header('Content-Type: application/json');
		echo json_encode($x); 
	}
	function get()
	{
		$x = new stdClass();
	
		$x->aaData  = array();
		
		$aColumns = array('id','registration_no','student_name','course_id');
		
		$sort_column = 'id';
		
		$sort_order = 'desc';
		
		if ( isset( $_GET['iSortCol_0'] ) && isset( $_GET['sSortDir_0'] ))
		{
			$sort_column = $aColumns[ intval( $_GET['iSortCol_0'] ) ];
			$sort_order = $_GET['sSortDir_0'];
		}
		
		if($_GET['sSearch'] != '')
                {
			$this->db->like('student_name',$_GET['sSearch'],'both');
                       // $this->db->likeor('d.designation',$_GET['sSearch'],'both');
                }
		$this->db->limit($_GET['iDisplayLength'],$_GET['iDisplayStart']);
		$this->db->order_by($sort_column,$sort_order);
		
		$this->db->select('s.id,registration_no,student_name,c.course_name,s.session_month_year session_name,s.approved_status', FALSE);
		$this->db->from('student s');
               $this->db->join('course c', 'c.id = s.course_id');
               $this->db->where('s.student_type', '1');
                 // $this->db->join('session se', 'se.id = s.session_id');
		$query = $this->db->get();
		$result = $query->result();
		
		$cnt = $this->m_common->get_search_count();
		
		$x->iTotalRecords = $cnt;
		$x->iTotalDisplayRecords = $cnt;
		$x->sEcho = intval($_GET['sEcho']);
		
		foreach ($result as $row) {
                    
                    
			if($this->session->userdata('roles_update')!=1) 
                     {
                     $hrefval="";
                   }
                   else
                   {
                      if ($row->approved_status==1) 
                      {
                         $hrefval=site_url("student/edit/".$row->id);
                      }
                      else
                      {
                        $hrefval=site_url("student/edit/".$row->id); 
                      }
                   }
                   
                       if($this->session->userdata('roles_delete')!=1) 
                     {
                     $hrefdelval="";
                     $hrefdeljavaval="";
                   }
                   else
                   {
                        $hrefdelval=site_url("student/delete/".$row->id); 
                       $hrefdeljavaval ='onclick="return confirm_status();"';
                   }
                    if($this->session->userdata('roles_approved')!=1) 
                     {
                     $hrefappval="";
                     $hrefapptitle="";
                     
                   }
                   else
                   {
                        if ($row->approved_status==1) {
                        $hrefappval=site_url("student/approvedback/".$row->id); 
                       $hrefapptitle ='Approved Role Back';
                        }
                        else
                        {
                          $hrefappval=site_url("student/approved/".$row->id); 
                       $hrefapptitle ='Approved';   
                        }
                   }
                   
                 if ($this->session->userdata('roles_approved')==1) {
                    if ($row->approved_status==1) {
                     array_push($x->aaData, array(
					$row->registration_no, 
                             $row->student_name ,  $row->course_name,
	'<a href="'.$hrefval.'" class="btn btn-mini btn-info"><i class="icon-edit bigger-120"></i></a>',
					
			));
                    }
 else {
     array_push($x->aaData, array(
					$row->registration_no, 
                             $row->student_name ,  $row->course_name,
	'<a href="'.$hrefval.'" class="btn btn-mini btn-info"><i class="icon-edit bigger-120"></i></a>&nbsp;<a href="'.$hrefdelval.'" class="btn btn-mini btn-danger" '.$hrefdeljavaval.'><i class="icon-trash bigger-120"></i></a>',
					
			)); 
 }
                    }
                    else
                    {
                         if ($row->approved_status==1) {
                        
                         array_push($x->aaData, array(
					$row->registration_no, 
                             $row->student_name ,  $row->course_name,
	'',
					
			));
                         
                         }   
 else {
     array_push($x->aaData, array(
					$row->registration_no, 
                             $row->student_name ,  $row->course_name,
	'<a href="'.$hrefval.'" class="btn btn-mini btn-info"><i class="icon-edit bigger-120"></i></a>',
					
			));
 } 
                         
                         
                    }
		
                    
                    }
	
	
		header('Content-Type: application/json');
		echo json_encode($x); 
	}
        
            function approvedback($id)
        {
            	   $data = array(
                                 'approved_status' =>0,
							 );			 
			   
			   $id = $this->m_common->_update('student',$data,array('id'=>$id));
			   
			  
			   
			   redirect('/student');
        }
        function approved($id)
        {
            $registration_no = $this->m_common->getregistrationno();
            $sessionyear = $this->m_common->getsessionyear($id);
            $session=$sessionyear["session_month"];
           if ($session=='May')
           {
               $session='05';
           }
           if ($session=='Oct')
           {
               $session='10';
           }
             $year=$sessionyear["session_year"];
            $registration_no=$registration_no["registration_no"];
            
           // $registration= $registration_no["registration_no"];
            	   $data = array(
                                 'approved_status' =>1,
                                'registration_no'=>$year.$session.$registration_no,
							 );			 
			   
			   $id = $this->m_common->_update('student',$data,array('id'=>$id));
			   
			  
			   
			   redirect('/student');
        }
        function oldget1()
	{
		$x = new stdClass();
	
		$x->aaData  = array();
		
		$aColumns = array('id','registration_no','student_name','course_id');
		
		$sort_column = 'id';
		
		$sort_order = 'desc';
		
		if ( isset( $_GET['iSortCol_0'] ) && isset( $_GET['sSortDir_0'] ))
		{
			$sort_column = $aColumns[ intval( $_GET['iSortCol_0'] ) ];
			$sort_order = $_GET['sSortDir_0'];
		}
		
		if($_GET['sSearch'] != '')
                {
                    
			$this->db->like('CONCAT(registration_no,"/",session_month_year,student_name)',$_GET['sSearch'],'both');
                       
                }
		$this->db->limit($_GET['iDisplayLength'],$_GET['iDisplayStart']);
		$this->db->order_by($sort_column,$sort_order);
		
		$query=$this->db->query('select s.id,registration_no,student_name,c.course_name,s.session_month_year session_name
from student s,course c
where c.id = s.course_id
and s.student_type=2
order by registration_no');
		
		$result = $query->result();
		
		$cnt = $this->m_common->get_search_count();
		
		$x->iTotalRecords = $cnt;
		$x->iTotalDisplayRecords = $cnt;
		$x->sEcho = intval($_GET['sEcho']);
		
		foreach ($result as $row) {
		if($this->session->userdata('roles_update')!=1) 
                     {
                     $hrefval="";
                   }
                   else
                   {
                        $hrefval=site_url("student/oldedit/".$row->id); 
                   }
                   
                       if($this->session->userdata('roles_delete')!=1) 
                     {
                     $hrefdelval="";
                     $hrefdeljavaval="";
                   }
                   else
                   {
                        $hrefdelval=site_url("student/delete/".$row->id); 
                       $hrefdeljavaval ='onclick="return confirm_status();"';
                   }		
                    array_push($x->aaData, array(
					$row->registration_no.'/'.$row->session_name, 
                             $row->student_name ,  $row->course_name,
					'<a href="'.$hrefval.'" class="btn btn-mini btn-info"><i class="icon-edit bigger-120"></i></a>&nbsp;<a href="'.$hrefdelval.'" class="btn btn-mini btn-danger" '.$hrefdeljavaval.'><i class="icon-trash bigger-120"></i></a>',
					
			));
		}
	
	
		header('Content-Type: application/json');
		echo json_encode($x); 
	}
	
	function _check_name($name,$id)
	{
		$type = $this->m_common->_get('employee',array('id <>'=>$id,'employee_name'=>$name));
		
		if(!empty($type))
		{
			$this->form_validation->set_message('_check_name', 'Name already exists. Try another one.');
			return false;
		}
		else
		{
			return true;
		}
	}



	public function registration()
	{
		$this->load->model( 'students_model' );
		$data['course_name'] = $this->students_model->get_course();
		$data['designation_name'] = $this->students_model->get_designation();
		$data['district_info'] = $this->students_model->get_district();
		$data['upzilla_info'] = $this->students_model->get_upzilla();
		$data['student_regestration'] = 'student_regestration';
		$this->load->view('layouts/main', $data );
	}


}
