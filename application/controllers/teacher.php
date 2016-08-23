<?php
class teacher extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_auth');
		$this->m_auth->check_access();
	}
	
	function index()
	{
		$this->data['page_title'] = 'Teacher'; 
		$this->data['page'] = 'Teacher';
		$this->data['menu'] = 'list';
		
		$this->load->view('includes/header', $this->data);
		$this->load->view('includes/sidebar', $this->data);
		$this->load->view('teacher/index', $this->data);
		$this->load->view('includes/footer', $this->data);
	}
	function delete($id = 0)
	{
		
		$this->m_common->_delete('teacher',array('id'=>$id));
		//$this->session->set_flashdata('success', "User <a href='#'>".$['depatment_name']."</a> Deleted Successfully!");
		redirect('/teacher');
	}
	function add()
	{
		$this->data['page_title'] = 'Add New Teacher'; 
		$this->data['page'] = 'Teacher';
		$this->data['menu'] = 'add';
		$this->data['action'] = 'add';
		
		$this->form_validation->set_rules('teacher_name', 'teacher_name', 'required|is_unique[teacher.teacher_name]');
		
		$defaults = array ('teacher_name'=>'',
                      'organization_name'=>'',
						   'teacher_short_name'=>'',
                                                      'teacher_address'=>'',
						   'contract_no'=>'',
                     'email_address'=>'', 'mobile_cell'=>'',
                     'phone'=>'',
                    'course_id'=>'',
                     'teacher_type'=>'',
                    'area_of_interest'=>'',
                    );
		if($_POST)
		{
		   if (!$this->form_validation->run())
		   {
			   $this->data['row'] = array_merge($defaults, $_POST);
		   }
		   else
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
			   $data = array('teacher_name' => $this->input->post('teacher_name'),
							 'teacher_short_name' => $this->input->post('teacher_short_name'),
                                'designation_id' => $designationid,
                                'organization_name' => $this->input->post('organization_name'),
                                'teacher_address' => $this->input->post('teacher_address'),
					 'contract_no' => $this->input->post('contract_no'),
                                'phone' => $this->input->post('phone'),
                                'course_id' => $this->input->post('course_id'),
                                'mobile_cell' => $this->input->post('mobile_cell'),
                                'email_address' => $this->input->post('email_address'),
                                'teacher_type' => $this->input->post('teacher_type'),
                                'area_of_interest' => $this->input->post('area_of_interest'),
                               );
			   
			   $id = $this->m_common->_insert('teacher',$data);
			   
			   $this->session->set_flashdata('success', "New Collector Type <a href='".site_url('collector_types/edit/'.$id)."'>".$this->input->post('name')." </a> Added Successfully!");
			   
			   redirect('/teacher');
		   }
		}
		else
		{
		   $this->data['row'] = $defaults;
		}
		 $this->data['designations'] = $this->m_common->get_tabledata('designation','designation');
                  $this->data['courses'] = $this->m_common->get_tabledata('course','course_name');
		$this->load->view('includes/header', $this->data);
		$this->load->view('includes/sidebar', $this->data);
		$this->load->view('teacher/form', $this->data);
		$this->load->view('includes/footer', $this->data);
	}
	
	function edit($id = 0)
	{
		$this->data['page_title'] = 'Edit teacher'; 
		$this->data['page'] = 'teacher';
		$this->data['menu'] = 'add';
		$this->data['action'] = 'edit';
		
		$this->form_validation->set_rules('teacher_name', 'teacher_name', 'required|callback__check_name['.$id.']');
		
		$defaults = array ('teacher_name'=>'',
						   'teacher_short_name'=>'',
						  'teacher_address'=>'',
                   'contact_no'=>'', );
		if($_POST)
		{
		   if (!$this->form_validation->run())
		   {
			   $this->data['row'] = array_merge($this->m_common->_get('teacher',array('id'=>$id)), $_POST);
		   }
		   else
		   {
			   $data = array('teacher_name' => $this->input->post('teacher_name'),
							 'teacher_short_name' => $this->input->post('teacher_short_name'),
                                'designation_id' => $this->input->post('id_designation'),
                               'organization_name' => $this->input->post('organization_name'),
                                'teacher_address' => $this->input->post('teacher_address'),
					 'contract_no' => $this->input->post('contract_no'),
                                'phone' => $this->input->post('phone'),
                               'course_id' => $this->input->post('course_id'),
                                'mobile_cell' => $this->input->post('mobile_cell'),
                                'email_address' => $this->input->post('email_address'),
                                'teacher_type' => $this->input->post('teacher_type'),
                                'area_of_interest' => $this->input->post('area_of_interest'),	);
			   
			   $id = $this->m_common->_update('teacher',$data,array('id'=>$id));
			   
			   $this->session->set_flashdata('success', "teacher <a href='".site_url('teacher/edit/'.$id)."'>".$this->input->post('teacher_name')." </a> Updated Successfully!");
			   
			   redirect('/teacher');
		   }
		}
		else
		{
		   $this->data['row'] = $this->m_common->_get('teacher',array('id'=>$id));
		}
                  $this->data['courses'] = $this->m_common->get_tabledata('course','course_name');
		$this->data['designations'] = $this->m_common->get_tabledata('designation','designation');
		$this->load->view('includes/header', $this->data);
		$this->load->view('includes/sidebar', $this->data);
		$this->load->view('teacher/form', $this->data);
		$this->load->view('includes/footer', $this->data);
	}
	
	function get()
	{
		$x = new stdClass();
	
		$x->aaData  = array();
		
		$aColumns = array('id','teacher_name','teacher_short_name');
		
		$sort_column = 'id';
		
		$sort_order = 'desc';
		
		if ( isset( $_GET['iSortCol_0'] ) && isset( $_GET['sSortDir_0'] ))
		{
			$sort_column = $aColumns[ intval( $_GET['iSortCol_0'] ) ];
			$sort_order = $_GET['sSortDir_0'];
		}
		
		if($_GET['sSearch'] != '')
			$this->db->like('teacher',$_GET['sSearch'],'both');
		
		$this->db->limit($_GET['iDisplayLength'],$_GET['iDisplayStart']);
		$this->db->order_by($sort_column,$sort_order);
		
		$this->db->select('SQL_CALC_FOUND_ROWS *', FALSE);
		$this->db->from('teacher');
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
                        $hrefval=site_url("teacher/edit/".$row->id); 
                   }
                   
                       if($this->session->userdata('roles_delete')!=1) 
                     {
                     $hrefdelval="";
                     $hrefdeljavaval="";
                   }
                   else
                   {
                        $hrefdelval=site_url("teacher/delete/".$row->id); 
                       $hrefdeljavaval ='onclick="return confirm_status();"';
                   }	
                    array_push($x->aaData, array(
					$row->teacher_name ,
                            $row->teacher_short_name ,
                             
					  '<a href="'.$hrefval.'" class="btn btn-mini btn-info"><i class="icon-edit bigger-120"></i></a>&nbsp;<a href="'.$hrefdelval.'" class="btn btn-mini btn-danger" '.$hrefdeljavaval.'><i class="icon-trash bigger-120"></i></a>',
					
			));
		}
	
	
		header('Content-Type: application/json');
		echo json_encode($x); 
	}
	
	function _check_name($name,$id)
	{
		$type = $this->m_common->_get('teacher',array('id <>'=>$id,'teacher_name'=>$name));
		
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
