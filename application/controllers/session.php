<?php
class Session extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_auth');
		$this->m_auth->check_access();
	}
	
	function index()
	{
		$this->data['page_title'] = 'Session'; 
		$this->data['page'] = 'Session';
		$this->data['menu'] = 'list';
		
		$this->load->view('includes/header', $this->data);
		$this->load->view('includes/sidebar', $this->data);
		$this->load->view('session/index', $this->data);
		$this->load->view('includes/footer', $this->data);
	}
	
	function add()
	{
		$this->data['page_title'] = 'Add New Session'; 
		$this->data['page'] = 'Session';
		$this->data['menu'] = 'add';
		$this->data['action'] = 'add';
		
		$this->form_validation->set_rules('session_name', 'session_name', 'required|is_unique[session.session_name]');
		
		$defaults = array ('session_name'=>'',
						  
						  );
		if($_POST)
		{

		   if (!$this->form_validation->run())
		   {
			   $this->data['row'] = array_merge($defaults, $_POST);
		   }
		   else
		   {
			   $data = array('session_name' => $this->input->post('session_name'),
							
							 );
			   
			   $id = $this->m_common->_insert('session',$data);

			   
			   $this->session->set_flashdata('success', "New Session  <a href='".site_url('session/edit/'.$id)."'>".$this->input->post('name')." </a> Added Successfully!");
			   
			   redirect('/session');
		   }
		}
		else
		{
		   $this->data['row'] = $defaults;
		}
		
                
                
		$this->load->view('includes/header', $this->data);
		$this->load->view('includes/sidebar', $this->data);
		$this->load->view('session/form', $this->data);
		$this->load->view('includes/footer', $this->data);
	}
	
	function edit($id = 0)
	{
		$this->data['page_title'] = 'Edit Session'; 
		$this->data['page'] = 'Session';
		$this->data['menu'] = 'add';
		$this->data['action'] = 'edit';
		
		$this->form_validation->set_rules('session_name', 'session_name', 'required|callback__check_name['.$id.']');
		
		$defaults = array ('session_name'=>'',
						  
						  );
		if($_POST)
		{
		   if (!$this->form_validation->run())
		   {
			   $this->data['row'] = array_merge($this->m_common->_get('session',array('id'=>$id)), $_POST);
		   }
		   else
		   {
			   $data = array('session_name' => $this->input->post('session_name'),
								
							 );
			   
			   $id = $this->m_common->_update('session',$data,array('id'=>$id));
			   
			   $this->session->set_flashdata('success', "Session <a href='".site_url('session/edit/'.$id)."'>".$this->input->post('session_name')." </a> Updated Successfully!");
			   
			   redirect('/session');
		   }
		}
		else
		{
		   $this->data['row'] = $this->m_common->_get('session',array('id'=>$id));
		}
		 
		$this->load->view('includes/header', $this->data);
		$this->load->view('includes/sidebar', $this->data);
		$this->load->view('session/form', $this->data);
		$this->load->view('includes/footer', $this->data);
	}
	
	function get()
	{
		$x = new stdClass();
	
		$x->aaData  = array();
		
		$aColumns = array('id','session_name');
		
		$sort_column = 'id';
		
		$sort_order = 'desc';
		
		if ( isset( $_GET['iSortCol_0'] ) && isset( $_GET['sSortDir_0'] ))
		{
			$sort_column = $aColumns[ intval( $_GET['iSortCol_0'] ) ];
			$sort_order = $_GET['sSortDir_0'];
		}
		
		if($_GET['sSearch'] != '')
			$this->db->like('session_name',$_GET['sSearch'],'both');
		
		$this->db->limit($_GET['iDisplayLength'],$_GET['iDisplayStart']);
		$this->db->order_by($sort_column,$sort_order);
		
		$this->db->select('SQL_CALC_FOUND_ROWS *', FALSE);
		$this->db->from('session');
		$query = $this->db->get();
		$result = $query->result();
		
		$cnt = $this->m_common->get_search_count();
		
		$x->iTotalRecords = $cnt;
		$x->iTotalDisplayRecords = $cnt;
		$x->sEcho = intval($_GET['sEcho']);
		
		foreach ($result as $row) {
			array_push($x->aaData, array(
                            $row->session_name,
					
                                '<a href="'.site_url("session/edit/".$row->id).'" class="btn btn-mini btn-info"><i class="icon-edit bigger-120"></i></a>&nbsp;<a href="'.site_url("session/delete/".$row->id).'" class="btn btn-mini btn-danger" onclick="return confirm_status();"><i class="icon-trash bigger-120"></i></a>',
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
		
		$this->m_common->_delete('session',array('id'=>$id));
		$this->session->set_flashdata('success', "User <a href='#'>".$user['username']."</a> Deleted Successfully!");
		redirect('/session');
	}
}
