<?php
class course extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_auth');
		$this->m_auth->check_access();
                $this->session->userdata('username');
	}
	
	function index()
	{
		$this->data['page_title'] = 'Course'; 
		$this->data['page'] = 'Course';
		$this->data['menu'] = 'list';
		
		$this->load->view('includes/header', $this->data);
		$this->load->view('includes/sidebar', $this->data);
		$this->load->view('course/index', $this->data);
		$this->load->view('includes/footer', $this->data);
	}
	function delete($id = 0)
	{
		
		$this->m_common->_delete('course',array('id'=>$id));
		//$this->session->set_flashdata('success', "User <a href='#'>".$['depatment_name']."</a> Deleted Successfully!");
		redirect('/course');
	}
	function add()
	{
             
		$this->data['page_title'] = 'Add New Course'; 
		$this->data['page'] = 'Course';
		$this->data['menu'] = 'add';
		$this->data['action'] = 'add';
		
		$this->form_validation->set_rules('course_name', 'course_name', 'required|is_unique[course.course_name]');
		
		$defaults = array ('course_name'=>'',
						   'course_short_name'=>'',
                    'course_fee'=>'',
                                                    
						  );
		if($_POST)
		{
		   if (!$this->form_validation->run())
		   {
			   $this->data['row'] = array_merge($defaults, $_POST);
		   }
		   else
		   {
			   $data = array('course_name' => $this->input->post('course_name'),
							 'course_short_name' => $this->input->post('course_short_name'),
                                'course_fee' => $this->input->post('course_fee'),
                               
							 );
			   
			   $id = $this->m_common->_insert('course',$data);
			   
			   $this->session->set_flashdata('success', "New Collector Type <a href='".site_url('collector_types/edit/'.$id)."'>".$this->input->post('name')." </a> Added Successfully!");
			   
			   redirect('/course');
		   }
		}
		else
		{
		   $this->data['row'] = $defaults;
		}
		
		$this->load->view('includes/header', $this->data);
		$this->load->view('includes/sidebar', $this->data);
		$this->load->view('course/form', $this->data);
		$this->load->view('includes/footer', $this->data);
	}
	
	function edit($id = 0)
	{
		$this->data['page_title'] = 'Edit course'; 
		$this->data['page'] = 'course';
		$this->data['menu'] = 'add';
		$this->data['action'] = 'edit';
		
		$this->form_validation->set_rules('course_name', 'course_name', 'required|callback__check_name['.$id.']');
		
		$defaults = array ('course_name'=>'',
						   'course_short_name'=>'',
                      'course_fee'=>'',
						  );
		if($_POST)
		{
		   if (!$this->form_validation->run())
		   {
			   $this->data['row'] = array_merge($this->m_common->_get('course',array('id'=>$id)), $_POST);
		   }
		   else
		   {
			   $data = array('course_name' => $this->input->post('course_name'),
							 'course_short_name' => $this->input->post('course_short_name'),	
                                'course_fee' => $this->input->post('course_fee'),	
                               
							 );
			   
			   $id = $this->m_common->_update('course',$data,array('id'=>$id));
			   
			   $this->session->set_flashdata('success', "course <a href='".site_url('course/edit/'.$id)."'>".$this->input->post('course_name')." </a> Updated Successfully!");
			   
			   redirect('/course');
		   }
		}
		else
		{
		   $this->data['row'] = $this->m_common->_get('course',array('id'=>$id));
		}
		
		$this->load->view('includes/header', $this->data);
		$this->load->view('includes/sidebar', $this->data);
		$this->load->view('course/form', $this->data);
		$this->load->view('includes/footer', $this->data);
	}
	
	function get()
	{
            
             $this->data['usersrole'] = $this->m_common->_get('usersrole',array('user_id'=>35));
		$x = new stdClass();
	
		$x->aaData  = array();
		
		$aColumns = array('id','course_name','course_short_name');
		
		$sort_column = 'id';
		
		$sort_order = 'desc';
		
		if ( isset( $_GET['iSortCol_0'] ) && isset( $_GET['sSortDir_0'] ))
		{
			$sort_column = $aColumns[ intval( $_GET['iSortCol_0'] ) ];
			$sort_order = $_GET['sSortDir_0'];
		}
		
		if($_GET['sSearch'] != '')
			$this->db->like('course',$_GET['sSearch'],'both');
		
		$this->db->limit($_GET['iDisplayLength'],$_GET['iDisplayStart']);
		$this->db->order_by($sort_column,$sort_order);
		
		$this->db->select('SQL_CALC_FOUND_ROWS *', FALSE);
		$this->db->from('course');
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
                        $hrefval=site_url("course/edit/".$row->id); 
                   }
                   
                       if($this->session->userdata('roles_delete')!=1) 
                     {
                     $hrefdelval="";
                     $hrefdeljavaval="";
                   }
                   else
                   {
                        $hrefdelval=site_url("course/delete/".$row->id); 
                       $hrefdeljavaval ='onclick="return confirm_status();"';
                   }
                   
			array_push($x->aaData, array(
					$row->course_name ,
                            $row->course_short_name ,
                                        '<a href="'.$hrefval.'" class="btn btn-mini btn-info"><i class="icon-edit bigger-120"></i>',
					'</a>&nbsp;<a href="'.$hrefdelval.'" class="btn btn-mini btn-danger" '.$hrefdeljavaval.' ><i class="icon-trash bigger-120"></i></a>',
			));
		}
	
	
		header('Content-Type: application/json');
		echo json_encode($x); 
	}
	
	function _check_name($name,$id)
	{
		$type = $this->m_common->_get('course',array('id <>'=>$id,'course_name'=>$name));
		
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
