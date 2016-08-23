<?php
class Resultsheet extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_auth');
		$this->m_auth->check_access();
	}
	
	function index()
	{
		$this->data['page_title'] = 'Result sheet list'; 
		$this->data['page'] = 'Resultsheetlist';
		$this->data['menu'] = 'list';
		
		$this->load->view('includes/header', $this->data);
		$this->load->view('includes/sidebar', $this->data);
		$this->load->view('resultsheet/index', $this->data);
		$this->load->view('includes/footer', $this->data);
	}
	
	function add()
	{
		$this->data['page_title'] = 'Add New Result'; 
		$this->data['page'] = 'Result';
		$this->data['menu'] = 'add';
		$this->data['action'] = 'add';
		
		$this->form_validation->set_rules('student_registration_no', 'student_registration_no', 'required');
		
		$defaults = array ('student_id'=>'',
						   'student_registration_no'=>'',
                     'session_id'=>'',
                     'course_id'=>'',
                     'subject_id'=>'',
                     'grade'=>'',
                     'marks'=>'',
                    'result_date'=>'',
                                                    
						  );
		if($_POST)
		{
		   
		   
			   $data = array(
                               'student_registration_no' => $this->input->post('student_registration_no'),
                                'session_id' => $this->input->post('session_id'),
                                'course_id' => $this->input->post('course_id'),
                                'subject_id' => $this->input->post('subject_id'),
                                'grade' => $this->input->post('grade'),
                                'marks' => $this->input->post('marks'),
                                'result_date' => $this->input->post('result_date'),
                               
							 );
			   
			   $id = $this->m_common->_insert('result',$data);
			   
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
		$this->data['page_title'] = 'Edit Subject'; 
		$this->data['page'] = 'Subject';
		$this->data['menu'] = 'add';
		$this->data['action'] = 'edit';
		
		$this->form_validation->set_rules('subject', 'subject', 'required|callback__check_name['.$id.']');
		
		$defaults = array ('subject'=>'',
						   'course_id'=>'',
						  );
		if($_POST)
		{
		   if (!$this->form_validation->run())
		   {
			   $this->data['row'] = array_merge($this->m_common->_get('Department',array('id'=>$id)), $_POST);
		   }
		   else
		   {
			   $data = array('subject' => $this->input->post('subject'),
							 'course_id' => $this->input->post('course_id'),	
                              
							 );
			   
			   $id = $this->m_common->_update('subject',$data,array('id'=>$id));
			   
			   $this->session->set_flashdata('success', "Subject <a href='".site_url('subject/edit/'.$id)."'>".$this->input->post('department_name')." </a> Updated Successfully!");
			   
			   redirect('/department');
		   }
		}
		else
		{
		   $this->data['row'] = $this->m_common->_get('subject',array('id'=>$id));
		}
		
		$this->load->view('includes/header', $this->data);
		$this->load->view('includes/sidebar', $this->data);
		$this->load->view('subject/form', $this->data);
		$this->load->view('includes/footer', $this->data);
	}
        
        function resultsheetview($id = 0)
	{
		$this->data['page_title'] = 'Result Sheet'; 
		$this->data['page'] = 'Result Sheet';
		$this->data['menu'] = 'add';
		$this->data['action'] = 'edit';
		
		
		
		 $this->data['row'] = $this->m_common->_get('session',array('id'=>$id));
                 
		
		 $this->data['resultlists'] = $this->m_common->get_resultsheet($id);
		
		  
		
		
		$this->load->view('includes/header', $this->data);
		$this->load->view('includes/sidebar', $this->data);
		$this->load->view('resultsheet/resultsheet', $this->data);
		$this->load->view('includes/footer', $this->data);
	}
        
	 function delete($id = 0)
	{
		
		$this->m_common->_delete('department',array('id'=>$id));
		//$this->session->set_flashdata('success', "User <a href='#'>".$['depatment_name']."</a> Deleted Successfully!");
		redirect('/department');
	}
	function get()
	{
		$x = new stdClass();
	
		$x->aaData  = array();
		
		$aColumns = array('session_id','course_id');
		
		$sort_column = 'session_id';
		
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
		
		$this->db->select('r.session_id,s.session_name,c.course_name', FALSE);
		$this->db->from('student r');
               $this->db->join('course c', 'c.id = r.course_id');
                 $this->db->join('session s', 's.id = r.session_id');
		  $this->db->distinct();
		$query = $this->db->get();
		$result = $query->result();
		
		$cnt = $this->m_common->get_search_count();
		
		$x->iTotalRecords = $cnt;
		$x->iTotalDisplayRecords = $cnt;
		$x->sEcho = intval($_GET['sEcho']);
		
		foreach ($result as $row) {
			array_push($x->aaData, array(
					
					$row->session_name ,
                            $row->course_name ,
                            
                            '<a href="'.site_url("resultsheet/resultsheetview/".$row->session_id).'" class="btn btn-mini btn-info"><i >Result Generate</i></a>&nbsp;',
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
