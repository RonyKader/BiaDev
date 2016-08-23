<?php
class Users extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_auth');
		$this->m_auth->check_access();
	}

	
	function index()
	{
		$this->data['page_title'] = 'Users'; 
		$this->data['page'] = 'users';
		$this->data['menu'] = 'list';
		
		$this->load->view('includes/header', $this->data);
		$this->load->view('includes/sidebar', $this->data);
		$this->load->view('users/index', $this->data);
		$this->load->view('includes/footer', $this->data);
	}
	
	function add()
	{
		$this->data['page_title'] = 'Add New User'; 
		$this->data['page'] = 'users';
		$this->data['menu'] = 'add';
		$this->data['action'] = 'add';
		
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required|matches[cpassword]'); 
		$this->form_validation->set_rules('cpassword', 'Confirm Password', 'cpassword'); 
		
		$defaults = array ('username'=>'',);
		if($_POST)
		{
		   if (!$this->form_validation->run())
		   {
			   $this->data['row'] = array_merge($defaults, $_POST);
		   }
		   else
		   {
			   $data = array('username' => $this->input->post('username'),
							 'password' => md5($this->input->post('password')),
                               'user_fullname' => $this->input->post('user_fullname')
							 
                               );
			   
			   $this->db->set('created_at', 'NOW()', FALSE); 
			   
			   $id = $this->m_common->_insert('users',$data);
			    $data1 = array('user_id' => $id,
		);
                              $id = $this->m_common->_insert('usersrole',$data1);
                              
			   $this->session->set_flashdata('success', "New User <a href='".site_url('users/edit/'.$id)."'>".$this->input->post('username')." </a> Added Successfully!");
			   
			   redirect('/users');
		   }
		}
		else
		{
		   $this->data['row'] = $defaults;
		}
		
		$this->load->view('includes/header', $this->data);
		$this->load->view('includes/sidebar', $this->data);
		$this->load->view('users/form', $this->data);
		$this->load->view('includes/footer', $this->data);
	}
	
	function edit($id = 0)
	{
		$this->data['page_title'] = 'Edit user'; 
		$this->data['page'] = 'users';
		$this->data['menu'] = 'add';
		$this->data['action'] = 'edit';
	   
	    $this->form_validation->set_rules('username', 'Username', 'required');
	   
		if($_POST)
		{
		   if($this->input->post('password') != '')
		   {
			   $this->form_validation->set_rules('password', 'Password', 'required|matches[cpassword]'); 
			   $this->form_validation->set_rules('cpassword', 'Confirm Password', 'cpassword'); 
		   }
		   
		   if (!$this->form_validation->run())
		   {
			   $this->data['row'] = array_merge($this->m_common->_get('employee',array('id'=>$id)), $_POST);
		   }
		   else
		   {
			 
			   if($this->input->post('password') != '')
		   	   {
					$data['password'] =  md5($this->input->post('password'));
			   }
			   $this->db->set('update_date', 'NOW()', FALSE); 
			   
			   $this->m_common->_update('employee',$data,array('id'=>$id));
			   
			 
			   
			   redirect('/dashboard');
			   
		   }
		}
		else
		{
			$this->data['row'] = $this->m_common->_get('employee',array('id'=>$id));
		}
		
		
		$this->load->view('includes/header', $this->data);
		$this->load->view('includes/sidebar', $this->data);
		$this->load->view('users/form', $this->data);
		$this->load->view('includes/footer', $this->data);
	}
	
	function delete($id = 0)
	{
		$user = $this->m_common->_get('users',array('id_user'=>$id));
		$this->m_common->_delete('users',array('id_user'=>$id));
		$this->session->set_flashdata('success', "User <a href='#'>".$user['username']."</a> Deleted Successfully!");
		redirect('/users');
	}
	
	function get()
	{
		$x = new stdClass();
	
		$x->aaData  = array();
		
		$aColumns = array('id','username');
		
		$sort_column = 'id';
		
		$sort_order = 'desc';
		
		if ( isset( $_GET['iSortCol_0'] ) && isset( $_GET['sSortDir_0'] ))
		{
			$sort_column = $aColumns[ intval( $_GET['iSortCol_0'] ) ];
			$sort_order = $_GET['sSortDir_0'];
		}
		
		if($_GET['sSearch'] != '')
			$this->db->like('username',$_GET['sSearch'],'both');
		
		$this->db->limit($_GET['iDisplayLength'],$_GET['iDisplayStart']);
		$this->db->order_by($sort_column,$sort_order);
		
		$this->db->select('SQL_CALC_FOUND_ROWS  *', FALSE);
		$query = $this->db->get('employee');
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
                        $hrefval=site_url("users/edit/".$row->id); 
                   }
                   
                       if($this->session->userdata('roles_delete')!=1) 
                     {
                     $hrefdelval="";
                     $hrefdeljavaval="";
                   }
                   else
                   {
                        if($this->session->userdata('user_id')!=$row->id) {
                        $hrefdelval=site_url("users/delete/".$row->id); 
                        
                       $hrefdeljavaval ='onclick="return confirm_status();"';
                        }
                        else{ $hrefdelval=""; 
                        
                       $hrefdeljavaval ='onclick="return confirm_status(0);"';
                       
                        }
                   }	
                    array_push($x->aaData, array(
					$row->id, 
					$row->username, 
					($row->create_date?date('Y-m-d h:i A',strtotime($row->create_date)):''),
					($row->update_date?date('Y-m-d h:i A',strtotime($row->update_date)):''),
					'<a href="'.$hrefval.'" class="btn btn-mini btn-info"><i class="icon-edit bigger-120"></i></a>&nbsp;<a href="'.$hrefdelval.'" class="btn btn-mini btn-danger" '.$hrefdeljavaval.'><i class="icon-trash bigger-120"></i></a>'
			));
		}
	
	
		header('Content-Type: application/json');
		echo json_encode($x); 
	}
	
}
