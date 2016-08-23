<?php
class Nonlifestudent extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_auth');
		$this->m_auth->check_access();
	}
	
	function index()
	{
		$this->data['page_title'] = 'Department'; 
		$this->data['page'] = 'Department';
		$this->data['menu'] = 'list';
		
		$this->load->view('includes/header', $this->data);
		$this->load->view('includes/sidebar', $this->data);
		$this->load->view('nonlifestudent/index', $this->data);
		$this->load->view('includes/footer', $this->data);
	}
	
	function add()
	{
		$this->data['page_title'] = 'Add New Certificate'; 
		$this->data['page'] = 'Certificate';
		$this->data['menu'] = 'add';
		$this->data['action'] = 'add';
		
		$this->form_validation->set_rules('student_name', 'company_name', 'required');
		
		$defaults = array ('student_name'=>'',
						   'company_name'=>'',
                                                     'grade'=>'',
                    'bia_agent_no'=>'','type'=>'',
                    'year'=>'',
						  );
		if($_POST)
		{
		   if (!$this->form_validation->run())
		   {
			   $this->data['row'] = array_merge($defaults, $_POST);
		   }
		   else
		   {
			   $data = array('student_name' => $this->input->post('student_name'),
							 'company_name' => $this->input->post('company_name'),
                               'grade' => $this->input->post('grade'),
                                'bia_agent_no' => $this->input->post('bia_agent_no'),
                                 'type' => $this->input->post('type'),
                                'year' => $this->input->post('year'),
							 );
			   
			   $id = $this->m_common->_insert('certificate',$data);
			   
			 
			   
			   redirect('/nonlifestudent');
		   }
		}
		else
		{
		   $this->data['row'] = $defaults;
		}
		
		$this->load->view('includes/header', $this->data);
		$this->load->view('includes/sidebar', $this->data);
		$this->load->view('nonlifestudent/form', $this->data);
		$this->load->view('includes/footer', $this->data);
	}
	
	function edit($id = 0)
	{
		$this->data['page_title'] = 'Edit  Certificate'; 
		$this->data['page'] = 'Certificate';
		$this->data['menu'] = 'Edit';
		$this->data['action'] = 'Edit';
		
		$this->form_validation->set_rules('student_name', 'company_name', 'required');
		
		$defaults = array ('department_name'=>'',
						   'department_short_name'=>'',
						  );
		if($_POST)
		{
		   if (!$this->form_validation->run())
		   {
			   $this->data['row'] = array_merge($defaults, $_POST);
		   }
		   else
		   {
			   $data = array('student_name' => $this->input->post('student_name'),
							 'company_name' => $this->input->post('company_name'),
                               'grade' => $this->input->post('grade'),
                                'bia_agent_no' => $this->input->post('bia_agent_no'),
                                 'type' => $this->input->post('type'),
                                'year' => $this->input->post('year'),
							 );
			   
			   $id = $this->m_common->_update('certificate',$data,array('id'=>$id));
			   
			 
			   
			   redirect('/nonlifestudent');
		   }
		}
		else
		{
		  $this->data['row'] = $this->m_common->_get('certificate',array('id'=>$id));
		}
		
		$this->load->view('includes/header', $this->data);
		$this->load->view('includes/sidebar', $this->data);
		$this->load->view('nonlifestudent/form', $this->data);
		$this->load->view('includes/footer', $this->data);
		
	}
	 function delete($id = 0)
	{
		
		$this->m_common->_delete('certificate',array('id'=>$id));
		//$this->session->set_flashdata('success', "User <a href='#'>".$['depatment_name']."</a> Deleted Successfully!");
		redirect('/department');
	}
	function get()
	{
		$x = new stdClass();
	
		$x->aaData  = array();
		
		$aColumns = array('id','student_name','company_name');
		
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
                         $this->db->or_like('company_name',$_GET['sSearch']);
                }
		
		$this->db->limit($_GET['iDisplayLength'],$_GET['iDisplayStart']);
		$this->db->order_by($sort_column,$sort_order);
		
		$this->db->select('SQL_CALC_FOUND_ROWS *', FALSE);
		$this->db->from('certificate');
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
                        $hrefval=site_url("nonlifestudent/edit/".$row->id); 
                   }
                   
                       if($this->session->userdata('roles_delete')!=1) 
                     {
                     $hrefdelval="";
                     $hrefdeljavaval="";
                   }
                   else
                   {
                        $hrefdelval=site_url("nonlifestudent/delete/".$row->id); 
                       $hrefdeljavaval ='onclick="return confirm_status();"';
                   }
                    array_push($x->aaData, array($row->bia_agent_no ,
					$row->student_name ,
					$row->company_name ,
                        $row->grade ,
                         $row->type ,
                              '<a href="'.site_url("nonlifestudent/edit/".$row->id).'" class="btn btn-mini btn-info"><i class="icon-edit bigger-120"></i></a>&nbsp;<a href="'.site_url("company/delete/".$row->id).'" class="btn btn-mini btn-danger" onclick="return confirm_status();"><i class="icon-trash bigger-120"></i></a><a href="'.site_url("result/showcertificate/".$row->id).'" class="btn btn-mini btn-info">Show Certificate</a>',
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
