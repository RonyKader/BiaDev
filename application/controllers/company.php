<?php
class Company extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_auth');
		$this->m_auth->check_access();
	}
	
	function index()
	{
		$this->data['page_title'] = 'Company'; 
		$this->data['page'] = 'Company';
		$this->data['menu'] = 'list';
		
		$this->load->view('includes/header', $this->data);
		$this->load->view('includes/sidebar', $this->data);
		$this->load->view('company/index', $this->data);
		$this->load->view('includes/footer', $this->data);
	}
	
	function add()
	{
		$this->data['page_title'] = 'Add New Company'; 
		$this->data['page'] = 'Company';
		$this->data['menu'] = 'add';
		$this->data['action'] = 'add';
		
		$this->form_validation->set_rules('company_name', 'company_name', 'required|is_unique[company.company_name]');
		
		$defaults = array ('company_name'=>'',
						   'company_short_name'=>'',
                                                     'company_address'=>'',
						  );
		if($_POST)
		{

		   if (!$this->form_validation->run())
		   {
			   $this->data['row'] = array_merge($defaults, $_POST);
		   }
		   else
		   {
			   $data = array('company_name' => $this->input->post('company_name'),
							 'company_short_name' => $this->input->post('company_short_name'),
                               'company_address' => $this->input->post('company_address'),
							 );
			   
			   $id = $this->m_common->_insert('company',$data);
                          

			   
			   $this->session->set_flashdata('success', "New Collector Type <a href='".site_url('collector_types/edit/'.$id)."'>".$this->input->post('name')." </a> Added Successfully!");
			   
			   redirect('/company');
		   }
		}
		else
		{
		   $this->data['row'] = $defaults;
		}
		
                
                
		$this->load->view('includes/header', $this->data);
		$this->load->view('includes/sidebar', $this->data);
		$this->load->view('company/form', $this->data);
		$this->load->view('includes/footer', $this->data);
	}
	function preview()
        {
            echo "sdsd";
        }
	function edit($id = 0)
	{
		$this->data['page_title'] = 'Edit Company'; 
		$this->data['page'] = 'Company';
		$this->data['menu'] = 'add';
		$this->data['action'] = 'edit';
		
		$this->form_validation->set_rules('company_name', 'company_name', 'required|callback__check_name['.$id.']');
		
		$defaults = array ('company_name'=>'',
						   'company_short_name'=>'',
						  );
		if($_POST)
		{
		   if (!$this->form_validation->run())
		   {
			   $this->data['row'] = array_merge($this->m_common->_get('company',array('id'=>$id)), $_POST);
		   }
		   else
		   {
			   $data = array('company_name' => $this->input->post('company_name'),
							 'company_short_name' => $this->input->post('company_short_name'),	
                               'company_address' => $this->input->post('company_address'),	
							 );
			   
			   $id = $this->m_common->_update('company',$data,array('id'=>$id));
			   
			   $this->session->set_flashdata('success', "Company <a href='".site_url('company/edit/'.$id)."'>".$this->input->post('company_name')." </a> Updated Successfully!");
			   
			   redirect('/company');
		   }
		}
		else
		{
		   $this->data['row'] = $this->m_common->_get('company',array('id'=>$id));
		}
		 
		$this->load->view('includes/header', $this->data);
		$this->load->view('includes/sidebar', $this->data);
		$this->load->view('company/form', $this->data);
		$this->load->view('includes/footer', $this->data);
	}
	
	function get()
	{
		$x = new stdClass();
	
		$x->aaData  = array();
		
		$aColumns = array('id','company_name','company_short_name');
		
		$sort_column = 'id';
		
		$sort_order = 'desc';
		
		if ( isset( $_GET['iSortCol_0'] ) && isset( $_GET['sSortDir_0'] ))
		{
			$sort_column = $aColumns[ intval( $_GET['iSortCol_0'] ) ];
			$sort_order = $_GET['sSortDir_0'];
		}
		
		if($_GET['sSearch'] != '')
			$this->db->like('company_name',$_GET['sSearch'],'both');
		
		$this->db->limit($_GET['iDisplayLength'],$_GET['iDisplayStart']);
		$this->db->order_by($sort_column,$sort_order);
		
		$this->db->select('SQL_CALC_FOUND_ROWS *', FALSE);
		$this->db->from('company');
		$query = $this->db->get();
		$result = $query->result();
		
		$cnt = $this->m_common->get_search_count();
		
		$x->iTotalRecords = $cnt;
		$x->iTotalDisplayRecords = $cnt;
		$x->sEcho = intval($_GET['sEcho']);
		
		foreach ($result as $row) {
			array_push($x->aaData, array(
                            $row->company_name,
					$row->company_short_name,
                                '<a href="'.site_url("company/edit/".$row->id).'" class="btn btn-mini btn-info"><i class="icon-edit bigger-120"></i></a>&nbsp;<a href="'.site_url("company/delete/".$row->id).'" class="btn btn-mini btn-danger" onclick="return confirm_status();"><i class="icon-trash bigger-120"></i></a>',
			));
		}
	
	
		header('Content-Type: application/json');
		echo json_encode($x); 
	}
	
	function _check_name($name,$id)
	{
		$type = $this->m_common->_get('company',array('id <>'=>$id,'company_name'=>$name));
		
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
        function delete($id = 0)
	{
		
		$this->m_common->_delete('company',array('id'=>$id));
		$this->session->set_flashdata('success', "User <a href='#'>".$user['username']."</a> Deleted Successfully!");
		redirect('/company');
	}
}
