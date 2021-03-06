<?php
class Department extends CI_Controller {
	
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
		$this->load->view('department/index', $this->data);
		$this->load->view('includes/footer', $this->data);
	}
	
	function add()
	{
		$this->data['page_title'] = 'Add New Department'; 
		$this->data['page'] = 'Department';
		$this->data['menu'] = 'add';
		$this->data['action'] = 'add';
		
		$this->form_validation->set_rules('department_name', 'department_name', 'required|is_unique[department.department_name]');
		
		$defaults = array ('department_name'=>'',
						   'department_short_name'=>'',
                                                     'department_address'=>'',
						  );
		if($_POST)
		{
		   if (!$this->form_validation->run())
		   {
			   $this->data['row'] = array_merge($defaults, $_POST);
		   }
		   else
		   {
			   $data = array('department_name' => $this->input->post('department_name'),
							 'department_short_name' => $this->input->post('department_short_name'),
                               'department_address' => $this->input->post('department_address'),
							 );
			   
			   $id = $this->m_common->_insert('department',$data);
			   
			   $this->session->set_flashdata('success', "New Collector Type <a href='".site_url('collector_types/edit/'.$id)."'>".$this->input->post('name')." </a> Added Successfully!");
			   
			   redirect('/department');
		   }
		}
		else
		{
		   $this->data['row'] = $defaults;
		}
		
		$this->load->view('includes/header', $this->data);
		$this->load->view('includes/sidebar', $this->data);
		$this->load->view('department/form', $this->data);
		$this->load->view('includes/footer', $this->data);
	}
	
	function edit($id = 0)
	{
		$this->data['page_title'] = 'Edit Department'; 
		$this->data['page'] = 'Department';
		$this->data['menu'] = 'add';
		$this->data['action'] = 'edit';
		
		//$this->form_validation->set_rules('department_name', 'department_name', 'required|callback__check_name['.$id.']');
		
		$defaults = array ('department_name'=>'',
						   'department_short_name'=>'',
						  );
		if($_POST)
		{
		   if (!$this->form_validation->run())
		
			   $data = array('department_name' => $this->input->post('department_name'),
							 'department_short_name' => $this->input->post('department_short_name'),	
                               'department_address' => $this->input->post('department_address'),	
							 );
			   
			   $id = $this->m_common->_update('Department',$data,array('id'=>$id));
			   
			   $this->session->set_flashdata('success', "Department <a href='".site_url('Department/edit/'.$id)."'>".$this->input->post('department_name')." </a> Updated Successfully!");
			   
			   redirect('/department');
		   
		}
		else
		{
		   $this->data['row'] = $this->m_common->_get('department',array('id'=>$id));
		}
		
		$this->load->view('includes/header', $this->data);
		$this->load->view('includes/sidebar', $this->data);
		$this->load->view('department/form', $this->data);
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
		
		$aColumns = array('id','department_name','department_short_name');
		
		$sort_column = 'id';
		
		$sort_order = 'desc';
		
		if ( isset( $_GET['iSortCol_0'] ) && isset( $_GET['sSortDir_0'] ))
		{
			$sort_column = $aColumns[ intval( $_GET['iSortCol_0'] ) ];
			$sort_order = $_GET['sSortDir_0'];
		}
		
		if($_GET['sSearch'] != '')
                {
			$this->db->like('department_name',$_GET['sSearch'],'both');
                         $this->db->or_like('department_short_name',$_GET['sSearch']);
                }
		
		$this->db->limit($_GET['iDisplayLength'],$_GET['iDisplayStart']);
		$this->db->order_by($sort_column,$sort_order);
		
		$this->db->select('SQL_CALC_FOUND_ROWS *', FALSE);
		$this->db->from('department');
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
                        $hrefval=site_url("department/edit/".$row->id); 
                   }
                   
                       if($this->session->userdata('roles_delete')!=1) 
                     {
                     $hrefdelval="";
                     $hrefdeljavaval="";
                   }
                   else
                   {
                        $hrefdelval=site_url("department/delete/".$row->id); 
                       $hrefdeljavaval ='onclick="return confirm_status();"';
                   }
                    array_push($x->aaData, array(
					$row->department_name ,
					$row->department_short_name ,
                            '<a href="'.$hrefval.'" class="btn btn-mini btn-info"><i class="icon-edit bigger-120"></i></a>&nbsp;<a href="'.$hrefdelval.'" class="btn btn-mini btn-danger" '.$hrefdeljavaval.'><i class="icon-trash bigger-120"></i></a>',
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
