<?php
class Result extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_auth');
		$this->m_auth->check_access();
                
	}
	
	function index()
	{
		$this->data['page_title'] = 'Result'; 
		$this->data['page'] = 'Result';
		$this->data['menu'] = 'list';
		
		$this->load->view('includes/header', $this->data);
		$this->load->view('includes/sidebar', $this->data);
		$this->load->view('result/index', $this->data);
		$this->load->view('includes/footer', $this->data);
	}
        function checkregistration()
        {
                
		
                $this->db->where('registration_no',$this->input->post('regno'));
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
        	function sessionindex()
	{
		$this->data['page_title'] = 'Result'; 
		$this->data['page'] = 'Result';
		$this->data['menu'] = 'list';
		
		$this->load->view('includes/header', $this->data);
		$this->load->view('includes/sidebar', $this->data);
		$this->load->view('result/sessionindex', $this->data);
		$this->load->view('includes/footer', $this->data);
	}
	
          	function certificateindex()
	{
		$this->data['page_title'] = 'Certificate'; 
		$this->data['page'] = 'Certificate';
		$this->data['menu'] = 'list';
		
		$this->load->view('includes/header', $this->data);
		$this->load->view('includes/sidebar', $this->data);
		$this->load->view('result/certificateindex', $this->data);
		$this->load->view('includes/footer', $this->data);
	}
        	function diplomaresultindex()
	{
		$this->data['page_title'] = 'Result'; 
		$this->data['page'] = 'Result';
		$this->data['menu'] = 'list';
		
		$this->load->view('includes/header', $this->data);
		$this->load->view('includes/sidebar', $this->data);
		$this->load->view('result/diplomaresultindex', $this->data);
		$this->load->view('includes/footer', $this->data);
	}
        
        	function diplomaresultgeneralindex()
	{
		$this->data['page_title'] = 'Result'; 
		$this->data['page'] = 'Result';
		$this->data['menu'] = 'list';
		
		$this->load->view('includes/header', $this->data);
		$this->load->view('includes/sidebar', $this->data);
		$this->load->view('result/diplomaresultgeneralindex', $this->data);
		$this->load->view('includes/footer', $this->data);
	}
        
        	function diplomaresultlifeindex()
	{
		$this->data['page_title'] = 'Subject'; 
		$this->data['page'] = 'Subject';
		$this->data['menu'] = 'list';
		
		$this->load->view('includes/header', $this->data);
		$this->load->view('includes/sidebar', $this->data);
		$this->load->view('result/diplomaresultlifelindex', $this->data);
		$this->load->view('includes/footer', $this->data);
	}
        
        function diplomaresultget()
	{
		$x = new stdClass();
	
		$x->aaData  = array();
		
		$aColumns = array('session_month_year','course_id');
		
		$sort_column = 'session_month_year';
		
		$sort_order = 'desc';
		
		if ( isset( $_GET['iSortCol_0'] ) && isset( $_GET['sSortDir_0'] ))
		{
			$sort_column = $aColumns[ intval( $_GET['iSortCol_0'] ) ];
			$sort_order = $_GET['sSortDir_0'];
		}
		
		if($_GET['sSearch'] != '')
			$this->db->like('result',$_GET['sSearch'],'both');
		
		$this->db->limit($_GET['iDisplayLength'],$_GET['iDisplayStart']);
		$this->db->order_by($sort_column,$sort_order);
		
		$this->db->select(' r.session_month_year,r.session_month,r.session_year, c.course_name,r.course_id', FALSE);
		$this->db->from('result r');
               
               //  $this->db->join('grademarks g', 'g.id = r.grade');
                //  $this->db->join('grademarks m', 'm.id = r.marks');
                   $this->db->join('course c', 'c.id = r.course_id');
                   $this->db->where('c.type', 'basic');
                  
     //$this->db->join('session se', 'se.id = r.session_id');
             $this->db->distinct();
		$query = $this->db->get();
		$result = $query->result();
		
		$cnt = $this->m_common->get_search_count();
		
		$x->iTotalRecords = $cnt;
		$x->iTotalDisplayRecords = $cnt;
		$x->sEcho = intval($_GET['sEcho']);
		foreach ($result as $row) {
			array_push($x->aaData, array(
					
					$row->session_month_year ,
                            $row->course_name,
                            
                            '<a href="'.site_url("result/diplomaresultentry/".$row->session_month_year.$row->course_id).'" class="btn btn-mini btn-info"><i >Result Show</i></a>&nbsp;',
			));
		}
	
	
		header('Content-Type: application/json');
		echo json_encode($x); 
	}
        
        
        function certificateget()
	{
		$x = new stdClass();
	
		$x->aaData  = array();
		
		$aColumns = array('session_month_year','course_id');
		
		$sort_column = 'session_month_year';
		
		$sort_order = 'desc';
		
		if ( isset( $_GET['iSortCol_0'] ) && isset( $_GET['sSortDir_0'] ))
		{
			$sort_column = $aColumns[ intval( $_GET['iSortCol_0'] ) ];
			$sort_order = $_GET['sSortDir_0'];
		}
		
		if($_GET['sSearch'] != '')
			$this->db->like('result',$_GET['sSearch'],'both');
		
		$this->db->limit($_GET['iDisplayLength'],$_GET['iDisplayStart']);
		$this->db->order_by($sort_column,$sort_order);
		
		$this->db->select(' r.session_month_year,r.session_month,r.session_year, c.course_name,r.course_id', FALSE);
		$this->db->from('result r');
               
               //  $this->db->join('grademarks g', 'g.id = r.grade');
                //  $this->db->join('grademarks m', 'm.id = r.marks');
                   $this->db->join('course c', 'c.id = r.course_id');
                   $this->db->where('c.type', 'basic');
                  
     //$this->db->join('session se', 'se.id = r.session_id');
             $this->db->distinct();
		$query = $this->db->get();
		$result = $query->result();
		
		$cnt = $this->m_common->get_search_count();
		
		$x->iTotalRecords = $cnt;
		$x->iTotalDisplayRecords = $cnt;
		$x->sEcho = intval($_GET['sEcho']);
		foreach ($result as $row) {
			array_push($x->aaData, array(
					
					$row->session_month_year ,
                            $row->course_name,
                            
                            '<a href="'.site_url("result/certificateentry/".$row->session_month_year.$row->course_id).'" class="btn btn-mini btn-info"><i >Result Show</i></a>&nbsp;',
			));
		}
	
	
		header('Content-Type: application/json');
		echo json_encode($x); 
	}
        
        
         function diplomaresultlifeget()
	{
		$x = new stdClass();
	
		$x->aaData  = array();
		
		$aColumns = array('session_month_year','course_id');
		
		$sort_column = 'session_month_year';
		
		$sort_order = 'desc';
		
		if ( isset( $_GET['iSortCol_0'] ) && isset( $_GET['sSortDir_0'] ))
		{
			$sort_column = $aColumns[ intval( $_GET['iSortCol_0'] ) ];
			$sort_order = $_GET['sSortDir_0'];
		}
		
		if($_GET['sSearch'] != '')
			$this->db->like('result',$_GET['sSearch'],'both');
		
		$this->db->limit($_GET['iDisplayLength'],$_GET['iDisplayStart']);
		$this->db->order_by($sort_column,$sort_order);
		
		$this->db->select(' r.session_month_year,r.session_month,r.session_year, c.course_name,r.course_id', FALSE);
		$this->db->from('result r');
               
               //  $this->db->join('grademarks g', 'g.id = r.grade');
                //  $this->db->join('grademarks m', 'm.id = r.marks');
                   $this->db->join('course c', 'c.id = r.course_id');
                   $this->db->where('c.type', 'life');
                  
     //$this->db->join('session se', 'se.id = r.session_id');
             $this->db->distinct();
		$query = $this->db->get();
		$result = $query->result();
		
		$cnt = $this->m_common->get_search_count();
		
		$x->iTotalRecords = $cnt;
		$x->iTotalDisplayRecords = $cnt;
		$x->sEcho = intval($_GET['sEcho']);
		
		foreach ($result as $row) {
			array_push($x->aaData, array(
					
					$row->session_month_year ,
                            $row->course_name,
                            '<a href="'.site_url("result/diplomaresultlifeentry/".$row->session_month_year.$row->course_id).'" class="btn btn-mini btn-info"><i >Result Show</i></a>&nbsp;',
			));
		}
	
	
		header('Content-Type: application/json');
		echo json_encode($x); 
	}
        
        function diplomaresultgeneralget()
	{
		$x = new stdClass();
	
		$x->aaData  = array();
		
		$aColumns = array('session_month_year','course_id');
		
		$sort_column = 'session_month_year';
		
		$sort_order = 'desc';
		
		if ( isset( $_GET['iSortCol_0'] ) && isset( $_GET['sSortDir_0'] ))
		{
			$sort_column = $aColumns[ intval( $_GET['iSortCol_0'] ) ];
			$sort_order = $_GET['sSortDir_0'];
		}
		
		if($_GET['sSearch'] != '')
			$this->db->like('result',$_GET['sSearch'],'both');
		
		$this->db->limit($_GET['iDisplayLength'],$_GET['iDisplayStart']);
		$this->db->order_by($sort_column,$sort_order);
		
		$this->db->select(' r.session_month_year,r.session_month,r.session_year, c.course_name,r.course_id', FALSE);
		$this->db->from('result r');
               
               //  $this->db->join('grademarks g', 'g.id = r.grade');
                //  $this->db->join('grademarks m', 'm.id = r.marks');
                   $this->db->join('course c', 'c.id = r.course_id');
                   $this->db->where('c.type', 'general');
                  
     //$this->db->join('session se', 'se.id = r.session_id');
             $this->db->distinct();
		$query = $this->db->get();
		$result = $query->result();
		
		$cnt = $this->m_common->get_search_count();
		
		$x->iTotalRecords = $cnt;
		$x->iTotalDisplayRecords = $cnt;
		$x->sEcho = intval($_GET['sEcho']);
		
		foreach ($result as $row) {
			array_push($x->aaData, array(
					
					$row->session_month_year ,
                            $row->course_name,
                            
                            '<a href="'.site_url("result/diplomaresultgeneralentry/".$row->session_month_year.$row->course_id).'" class="btn btn-mini btn-info"><i >Result Show</i></a>&nbsp;',
			));
		}
	
	
		header('Content-Type: application/json');
		echo json_encode($x); 
	}
        
        function diplomaresultgeneralentry($id = 0)
	{
		$this->data['page_title'] = 'Result Sheet'; 
		$this->data['page'] = 'Result Sheet';
		$this->data['menu'] = 'add';
		$this->data['action'] = 'edit';
		
		
		
		 $this->data['sessions'] =$id;
                   if($_POST)
		{
		  $totalrowvalue= $this->input->post('totalrowvalue');
		    for($i=1;$i<$totalrowvalue;$i++){
                        $this->m_common->_delete('result',array('student_registration_no'=>$this->input->post('student_registration_no_'.$i)));
			   $data = array(
                               'student_registration_no' => $this->input->post('student_registration_no_'.$i),
                                'bia10' => $this->input->post('bia1_'.$i),
                                'BIA11' => $this->input->post('bia2_'.$i),
                                'BIA12' => $this->input->post('bia3_'.$i),
                                'BIA13' => $this->input->post('bia4_'.$i),
                                'BIA14' => $this->input->post('bia5_'.$i),
                                'subjectmarks' => $this->input->post('subjectmarks_'.$i),
                                'finalmarks' => $this->input->post('finalmarks_'.$i),
                                'remarks' => $this->input->post('remarks_'.$i),
                                
                               
							 );
			   
			   $id = $this->m_common->_insert('result',$data);
                    }
			   
			   $this->session->set_flashdata('success', "New result  <a href='".site_url('result/'.$id)."'>".$this->input->post('result')." </a> Added Successfully!");
			   
			   redirect('result/diplomaresultgeneralindex');
		   
		}
		
		 $this->data['resultlists'] = $this->m_common->get_resultsheetgeneral($id);
		
		  
		
		
		$this->load->view('includes/header', $this->data);
		$this->load->view('includes/sidebar', $this->data);
		$this->load->view('result/diplomanresultgeneral', $this->data);
		$this->load->view('includes/footer', $this->data);
	}
        
         function diplomaresultentry($id = 0)
	{
		$this->data['page_title'] = 'Result Sheet'; 
		$this->data['page'] = 'Result Sheet';
		$this->data['menu'] = 'add';
		$this->data['action'] = 'edit';
		
		
		
		 $this->data['sessions'] = $id;
                 
                 if($_POST)
		{
		  $totalrowvalue= $this->input->post('totalrowvalue');
		    for($i=1;$i<$totalrowvalue;$i++){
                        $this->m_common->_delete('result',array('student_registration_no'=>$this->input->post('student_registration_no_'.$i)));
			   $data = array(
                               'student_registration_no' => $this->input->post('student_registration_no_'.$i),
                                'bia1' => $this->input->post('bia1_'.$i),
                                'BIA2' => $this->input->post('bia2_'.$i),
                                'BIA3' => $this->input->post('bia3_'.$i),
                                'BIA4' => $this->input->post('bia4_'.$i),
                                'BIA5' => $this->input->post('bia5_'.$i),
                                'subjectmarks' => $this->input->post('subjectmarks_'.$i),
                                'finalmarks' => $this->input->post('finalmarks_'.$i),
                                'remarks' => $this->input->post('remarks_'.$i),
                                
                               
							 );
			   
			   $id = $this->m_common->_insert('result',$data);
                    }
			   
			   $this->session->set_flashdata('success', "New result  <a href='".site_url('result/'.$id)."'>".$this->input->post('result')." </a> Added Successfully!");
			   
			   redirect('result/diplomaresultindex');
		   
		}
	
		
		 $this->data['resultlists'] = $this->m_common->get_resultsheet($id);
		$this->load->view('includes/header', $this->data);
		$this->load->view('includes/sidebar', $this->data);
		$this->load->view('result/diplomanresultbasic', $this->data);
		$this->load->view('includes/footer', $this->data);
	}
        function certificateentry()
	{
		$this->data['page_title'] = 'Result Sheet'; 
		$this->data['page'] = 'Result Sheet';
		$this->data['menu'] = 'add';
		$this->data['action'] = 'edit';
		
		
		
		
                 
                 if($_POST)
		{
                     $this->data['report'] = $this->input->post('txtreportno');
		 $this->load->view('includes/header', $this->data);
		$this->load->view('includes/sidebar', $this->data);
		$this->load->view('result/certificate', $this->data);
		$this->load->view('includes/footer', $this->data);
                    
		   
		}
                else{
		$this->data['report'] = 0;
		 //$this->data['resultlists'] = $this->m_common->get_resultsheet($id);
		$this->load->view('includes/header', $this->data);
		$this->load->view('includes/sidebar', $this->data);
		$this->load->view('result/certificate', $this->data);
		$this->load->view('includes/footer', $this->data);
                }
	}
        
        function showcertificate($id)
	{
		$this->data['page_title'] = 'Result Sheet'; 
		$this->data['page'] = 'Result Sheet';
		$this->data['menu'] = 'add';
		$this->data['action'] = 'edit';
		
		
		
		
                 
                 if($_POST)
		{
                     $this->data['report'] = $this->input->post('txtreportno');
		 $this->load->view('includes/header', $this->data);
		$this->load->view('includes/sidebar', $this->data);
		$this->load->view('result/certificate', $this->data);
		$this->load->view('includes/footer', $this->data);
                    
		   
		}
                else{
		$this->data['report'] = 0;
		 //$this->data['resultlists'] = $this->m_common->get_resultsheet($id);
                $this->data['row'] = $this->m_common->_get('certificate',array('id'=>$id));
		$this->load->view('includes/header', $this->data);
		$this->load->view('includes/sidebar', $this->data);
		$this->load->view('result/certificate', $this->data);
		$this->load->view('includes/footer', $this->data);
                }
	}
        
        
         function diplomaresultlifeentry($id = 0)
	{
		$this->data['page_title'] = 'Result Sheet'; 
		$this->data['page'] = 'Result Sheet';
		$this->data['menu'] = 'add';
		$this->data['action'] = 'edit';
		
		
		
		 $this->data['sessions'] = $id;
                 
                 
	
		
		$this->data['resultlists'] = $this->m_common->get_resultsheetlife($id);
		$this->load->view('includes/header', $this->data);
		$this->load->view('includes/sidebar', $this->data);
		$this->load->view('result/diplomanresultlife', $this->data);
		$this->load->view('includes/footer', $this->data);
	}
        
	function addsubjectwise()
	{
		$this->data['page_title'] = 'Add New Result'; 
		$this->data['page'] = 'Result';
		$this->data['menu'] = 'add';
		$this->data['action'] = 'add';
		
                
                
                
		$defaults = array ('student_id'=>'',
						   'student_registration_no'=>'',
                     'session_id'=>'',
                    'session_month'=>'',
                    'session_year'=>'',
                     'course_id'=>'',
                     'subject_id'=>'',
                     'grade'=>'',
                     'marks'=>'',
                     'finalmarks'=>'',
                    'result_date'=>'',
                                                    
						  );
                
//                 $this->db->where('session_month',$this->input->post('session_month'));
//		$this->db->where('session_year',$this->input->post('session_year'));
//                $this->db->where('course_id',$this->input->post('session_year'));
//		$query = $this->db->get('result');
//		$row = $query->row();
//		
//		
//                if(!empty($row))
//		   {
//			   $this->data['row'] = array_merge($defaults, $_POST);
//		   } 
                   
                   
                if($_POST)
		{
                    
                   
		
		   
		 
                
                           $course_id=$this->input->post('course_id');
                        
                           $session_month=$this->input->post('session_month');
                           $session_year=$this->input->post('session_year');
                             $noofcolumn=$this->input->post('noofcolumn');
                           
                             for($k=0;$k<$noofcolumn;$k++)
                     {
                                    
                          if ($this->input->post('subject_id_'.$k)!="" )                  
                          {
                              $str=$this->input->post('subject_id_'.$k);
                          
                                 $arrayissueto=explode("-",$str);
                                 $subject_id=$arrayissueto[1];
                             $data = array('subject_id' => $subject_id,
				          'course_id' =>$course_id,	
					   'session_month' => $session_month,
                                           'session_year'=>$session_year,
                                         'session_month_year'=>$session_month.'-'.$session_year,
                                  'session_month_year_course_subject'=>$session_month.$session_year.$course_id.$subject_id,
                                 
                                        'student_registration_no'=> $this->input->post('registration_no'),
                                'marks'=> $this->input->post('marks_'.$k),
                                 'remarks'=>$this->input->post('remarks'),
                               
							 );
			    //$this->db->set('upload_date', 'NOW()', FALSE); 
			
			   $id = $this->m_common->_insert('result',$data);
                          }
                     }
                           
                           
			   $this->session->set_flashdata('success', "New result  <a href='".site_url('result/'.$id)."'>".$this->input->post('result')." </a> Added Successfully!");
			   
			   redirect('/result');
                
		   
                }
		else
		{
		   $this->data['row'] = $defaults;
		}
		 $this->data['courses'] = $this->m_common->get_tabledata('course','course_name');
                  $this->data['students'] = $this->m_common->get_tabledata('student','student_name');
                   $this->data['sessions'] = $this->m_common->get_tabledata('session','session_name');
                    $this->data['grades'] = $this->m_common->get_tabledata('grademarks','grade');
                    $this->data['markss'] = $this->m_common->get_tabledata('grademarks','marks');
                     $this->data['subjects'] = $this->m_common->get_tabledata('subject','subject');
		$this->load->view('includes/header', $this->data);
		$this->load->view('includes/sidebar', $this->data);
		$this->load->view('result/subjectwiseform', $this->data);
		$this->load->view('includes/footer', $this->data);
	}
	
	function add()
	{
		$this->data['page_title'] = 'Add New Result'; 
		$this->data['page'] = 'Result';
		$this->data['menu'] = 'add';
		$this->data['action'] = 'add';
		
                
                
                
		$defaults = array ('student_id'=>'',
						   'student_registration_no'=>'',
                     'session_id'=>'',
                    'session_month'=>'',
                    'session_year'=>'',
                     'course_id'=>'',
                     'subject_id'=>'',
                     'grade'=>'',
                     'marks'=>'',
                     'finalmarks'=>'',
                    'result_date'=>'',
                                                    
						  );
                
//                 $this->db->where('session_month',$this->input->post('session_month'));
//		$this->db->where('session_year',$this->input->post('session_year'));
//                $this->db->where('course_id',$this->input->post('session_year'));
//		$query = $this->db->get('result');
//		$row = $query->row();
//		
//		
//                if(!empty($row))
//		   {
//			   $this->data['row'] = array_merge($defaults, $_POST);
//		   } 
                   
                   
                if($_POST)
		{
                    
                   
		
		   
		 
                
                           $course_id=$this->input->post('course_id');
                           $str=$this->input->post('subject_id');
                          
                                 $arrayissueto=explode("-",$str);
                                 $subject_id=$arrayissueto[1];
                           $session_month=$this->input->post('session_month');
                           $session_year=$this->input->post('session_year');
                             $noofcolumn=$this->input->post('noofcolumn');
                           
                             for($k=0;$k<$noofcolumn;$k++)
                     {
                          if ($this->input->post('registration_no_'.$k)!="" )                  
                          {
                              
                             $data = array('subject_id' => $subject_id,
				          'course_id' =>$course_id,	
					   'session_month' => $session_month,
                                           'session_year'=>$session_year,
                                         'session_month_year'=>$session_month.'-'.$session_year,
                                  'session_month_year_course_subject'=>$session_month.$session_year.$course_id.$subject_id,
                                 
                                        'student_registration_no'=> $this->input->post('registration_no_'.$k),
                                'marks'=> $this->input->post('marks_'.$k),
                                 'remarks'=>$this->input->post('remarks'),
                               
							 );
			    //$this->db->set('upload_date', 'NOW()', FALSE); 
			
			   $id = $this->m_common->_insert('result',$data);
                          }
                     }
                           
                           
			   $this->session->set_flashdata('success', "New result  <a href='".site_url('result/'.$id)."'>".$this->input->post('result')." </a> Added Successfully!");
			   
			   redirect('/result');
                
		   
                }
		else
		{
		   $this->data['row'] = $defaults;
		}
		 $this->data['courses'] = $this->m_common->get_tabledata('course','course_name');
                  $this->data['students'] = $this->m_common->get_tabledata('student','student_name');
                   $this->data['sessions'] = $this->m_common->get_tabledata('session','session_name');
                    $this->data['grades'] = $this->m_common->get_tabledata('grademarks','grade');
                    $this->data['markss'] = $this->m_common->get_tabledata('grademarks','marks');
                     $this->data['subjects'] = $this->m_common->get_tabledata('subject','subject');
		$this->load->view('includes/header', $this->data);
		$this->load->view('includes/sidebar', $this->data);
		$this->load->view('result/form', $this->data);
		$this->load->view('includes/footer', $this->data);
	}
	
	function edit($id = 0)
	{
		$this->data['page_title'] = 'Edit Result'; 
		$this->data['page'] = 'Result';
		$this->data['menu'] = 'add';
		$this->data['action'] = 'edit';
		
		$this->form_validation->set_rules('finalmarks', 'subject', 'finalmarks|callback__check_name['.$id.']');
		
		$defaults = array ('subject'=>'',
						   'course_id'=>'',
						  );
		if($_POST)
		{
		   if (!$this->form_validation->run())
		   {
			   $this->data['row'] = array_merge($this->m_common->_get('result',array('id'=>$id)), $_POST);
		   }
		   else
		   {
                       $session_month=$this->input->post('session_month');
                           $session_year=$this->input->post('session_year');
                           
                            $str=$this->input->post('subject_id');
                          
                                 $arrayissueto=explode("-",$str);
                                 $subject_id=$arrayissueto[1];
                           
			   $data = array('student_registration_no' => $this->input->post('registration_no'),
                                 
                                
                                'marks' => $this->input->post('marks'),
                                
							 );
			   
			   $this->m_common->_update('result',$data,array('id'=>$id));
			   
			  // $this->session->set_flashdata('success', "Result <a href='".site_url('result/edit/'.$id)."'>".$this->input->post('department_name')." </a> Updated Successfully!");
			   
			   redirect('/result');
		   }
		}
		else
		{
		   $this->data['row'] = $this->m_common->_get('result',array('id'=>$id));
		}
		 $this->data['courses'] = $this->m_common->get_tabledata('course','course_name');
                  $this->data['students'] = $this->m_common->get_tabledata('student','student_name');
                   $this->data['sessions'] = $this->m_common->get_tabledata('session','session_name');
                    $this->data['grades'] = $this->m_common->get_tabledata('grademarks','grade');
                    $this->data['markss'] = $this->m_common->get_tabledata('grademarks','marks');
                     $this->data['subjects'] = $this->m_common->get_tabledata('subject','subject');
		$this->load->view('includes/header', $this->data);
		$this->load->view('includes/sidebar', $this->data);
		$this->load->view('result/form', $this->data);
		$this->load->view('includes/footer', $this->data);
	}
        
        
        function sessionedit($id = 0)
	{
		$this->data['page_title'] = 'Edit Result'; 
		$this->data['page'] = 'Result';
		$this->data['menu'] = 'add';
		$this->data['action'] = 'edit';
		
		
		
		$defaults = array ('subject'=>'',
						   'course_id'=>'',
						  );
		if($_POST)
		{
		 
                       $course_id=$this->input->post('course_id');
                           $str=$this->input->post('subject_id');
                          
                                 $arrayissueto=explode("-",$str);
                                 $subject_id=$arrayissueto[1];
                           $session_month=$this->input->post('session_month');
                           $session_year=$this->input->post('session_year');
                             $noofcolumn=$this->input->post('noofcolumn');
                           
                             $this->m_common->_delete('result',array('session_month_year_course_subject'=>$id));
                             for($k=1;$k<=$noofcolumn;$k++)
                     {
                          if ($this->input->post('registration_no_'.$k)!="" )                  
                          {
                              
                             $data = array('subject_id' => $subject_id,
				          'course_id' =>$course_id,	
					   'session_month' => $session_month,
                                           'session_year'=>$session_year,
                                         'session_month_year'=>$session_month.'-'.$session_year,
                                  'session_month_year_course_subject'=>$session_month.$session_year.$course_id.$subject_id,
                                 
                                        'student_registration_no'=> $this->input->post('registration_no_'.$k),
                                'marks'=> $this->input->post('marks_'.$k),
                                 'remarks'=>$this->input->post('remarks'),
                               
							 );
			    //$this->db->set('upload_date', 'NOW()', FALSE); 
			
			      $id = $this->m_common->_insert('result',$data);
                          }
                     }
			   
			 
			   
			 
			   
			   redirect('/result/sessionindex');
		   
		}
		else
		{
               
                             $query = $this->db->query("
              select student_registration_no,  session_month, session_year, session_month_year, course_id, subject_id, grade, marks, subjectmarks, finalmarks, result_date
 from result where  session_month_year_course_subject='$id' 

");
      
//                $this->db->where('session_month'.'session_year', '2018'); 
//                 $this->db->where('session_month'.'session_year', '2018'); 
//		$query = $this->db->get();
		$this->data['columns']  = $query->result();
                
                             $query1 = $this->db->query("
              select  distinct  session_month, session_year, session_month_year, course_id, subject_id
 from result where  session_month_year_course_subject='$id' 

");
		  $this->data['row'] = $query1->row_array();
		}
                
                
		 $this->data['courses'] = $this->m_common->get_tabledata('course','course_name');
                  $this->data['students'] = $this->m_common->get_tabledata('student','student_name');
                   $this->data['sessions'] = $this->m_common->get_tabledata('session','session_name');
                    $this->data['grades'] = $this->m_common->get_tabledata('grademarks','grade');
                    $this->data['markss'] = $this->m_common->get_tabledata('grademarks','marks');
                     $this->data['subjects'] = $this->m_common->get_tabledata('subject','subject');
		$this->load->view('includes/header', $this->data);
		$this->load->view('includes/sidebar', $this->data);
		$this->load->view('result/form_detailsedit', $this->data);
		$this->load->view('includes/footer', $this->data);
	}
        
	 function delete($id = 0)
	{
		
		$this->m_common->_delete('result',array('id'=>$id));
		//$this->session->set_flashdata('success', "User <a href='#'>".$['depatment_name']."</a> Deleted Successfully!");
		redirect('/result');
	}
	function get()
	{
		$x = new stdClass();
	
		$x->aaData  = array();
		
		$aColumns = array('id','student_registration_no','course_id');
		
		$sort_column = 'id';
		
		$sort_order = 'desc';
		
		if ( isset( $_GET['iSortCol_0'] ) && isset( $_GET['sSortDir_0'] ))
		{
			$sort_column = $aColumns[ intval( $_GET['iSortCol_0'] ) ];
			$sort_order = $_GET['sSortDir_0'];
		}
		
		if($_GET['sSearch'] != '')
			$this->db->like('result',$_GET['sSearch'],'both');
		
		$this->db->limit($_GET['iDisplayLength'],$_GET['iDisplayStart']);
		$this->db->order_by($sort_column,$sort_order);
		
		$this->db->select('r.id, r.student_registration_no, r.session_month_year, c.course_name, sub.subject_short_name subject, r.marks, r.result_date', FALSE);
		$this->db->from('result r');
                 $this->db->join('student s', 's.registration_no = r.student_registration_no');
               //  $this->db->join('grademarks g', 'g.id = r.grade');
                //  $this->db->join('grademarks m', 'm.id = r.marks');
                   $this->db->join('course c', 'c.id = r.course_id');
                   $this->db->join('subject sub', 'sub.id = r.subject_id');
     //$this->db->join('session se', 'se.id = r.session_id');
             
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
                        $hrefval=site_url("result/edit/".$row->id); 
                   }
                   
                       if($this->session->userdata('roles_delete')!=1) 
                     {
                     $hrefdelval="";
                     $hrefdeljavaval="";
                   }
                   else
                   {
                        $hrefdelval=site_url("result/delete/".$row->id); 
                       $hrefdeljavaval ='onclick="return confirm_status();"';
                   }
                    
                    array_push($x->aaData, array(
					$row->student_registration_no ,
                          
					$row->session_month_year ,
                            $row->course_name,
                            $row->subject ,
                            $row->marks ,
                            
                            '<a href="'.$hrefval.'" class="btn btn-mini btn-info"><i class="icon-edit bigger-120"></i></a>&nbsp;<a href="'.$hrefdelval.'" class="btn btn-mini btn-danger" '.$hrefdeljavaval.'><i class="icon-trash bigger-120"></i></a>',
			));
		}
	
	
		header('Content-Type: application/json');
		echo json_encode($x); 
	}
	
        
        function sessionget()
	{
		$x = new stdClass();
	
		$x->aaData  = array();
		
		$aColumns = array('session_month_year','course_id');
		
		$sort_column = 'session_month_year';
		
		$sort_order = 'desc';
		
		if ( isset( $_GET['iSortCol_0'] ) && isset( $_GET['sSortDir_0'] ))
		{
			$sort_column = $aColumns[ intval( $_GET['iSortCol_0'] ) ];
			$sort_order = $_GET['sSortDir_0'];
		}
		
		if($_GET['sSearch'] != '')
			$this->db->like('result',$_GET['sSearch'],'both');
		
		$this->db->limit($_GET['iDisplayLength'],$_GET['iDisplayStart']);
		$this->db->order_by($sort_column,$sort_order);
		
		$this->db->select(' r.session_month_year,r.session_month,r.session_year, c.course_name,r.course_id,r.subject_id, sub.subject_short_name subject', FALSE);
		$this->db->from('result r');
               
               //  $this->db->join('grademarks g', 'g.id = r.grade');
                //  $this->db->join('grademarks m', 'm.id = r.marks');
                   $this->db->join('course c', 'c.id = r.course_id');
                   $this->db->join('subject sub', 'sub.id = r.subject_id');
     //$this->db->join('session se', 'se.id = r.session_id');
             $this->db->distinct();
		$query = $this->db->get();
		$result = $query->result();
		
		$cnt = $this->m_common->get_search_count();
		
		$x->iTotalRecords = $cnt;
		$x->iTotalDisplayRecords = $cnt;
		$x->sEcho = intval($_GET['sEcho']);
		
		foreach ($result as $row) {
			array_push($x->aaData, array(
					
                          
					$row->session_month_year ,
                            $row->course_name,
                            $row->subject ,
                           
                            
                            '<a href="'.site_url("result/sessionedit/".$row->session_month.$row->session_year.$row->course_id.$row->subject_id).'" class="btn btn-mini btn-info"><i class="icon-edit bigger-120"></i></a>&nbsp;<a href="'.site_url("result/sessiondelete/".$row->session_month_year).'" class="btn btn-mini btn-danger" onclick="return confirm_status();"><i class="icon-trash bigger-120"></i></a>',
			));
		}
	
	
		header('Content-Type: application/json');
		echo json_encode($x); 
	}
        
	function _check_name($name,$id)
	{
		$type = $this->m_common->_get('Department',array('id <>'=>$id,'department_name'=>$name));
		
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
}
