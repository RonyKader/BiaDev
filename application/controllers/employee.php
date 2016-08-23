<?php
class Employee extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_auth');
		$this->m_auth->check_access();
	}
	
	function index()
	{
		$this->data['page_title'] = 'Employee'; 
		$this->data['page'] = 'Employee';
		$this->data['menu'] = 'list';
		
		$this->load->view('includes/header', $this->data);
		$this->load->view('includes/sidebar', $this->data);
		$this->load->view('employee/index', $this->data);
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
        
	function add()
	{
		$this->data['page_title'] = 'Add New Employee'; 
		$this->data['page'] = 'Employee';
		$this->data['menu'] = 'add';
		$this->data['action'] = 'add';
		
		 
		$this->form_validation->set_rules('employee_name', 'employee_name', 'required');
		
		$defaults = array ('department_id'=>'','designation_id'=>'','employee_name'=>'',
						   'employee_short_name'=>'',
                     'username'=>'',
                    'password'=>'',
                                                     'employee_address'=>'',
                      'email_address'=>'','user_type'=>'',
						  );
                
                $this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required|matches[cpassword]'); 
		$this->form_validation->set_rules('cpassword', 'Confirm Password', 'cpassword'); 
                
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
                       
			   $data = array('employee_name' => $this->input->post('employee_name'),
							 'employee_short_name' => $this->input->post('employee_short_name'),
                               'employee_address' => $this->input->post('employee_address'),
                                'department_id' => $this->input->post('id_department'),
                               'username' => $this->input->post('username'),
                               'password' => md5($this->input->post('password')),	
                                'designation_id' => $designationid,
                                'email_address' => $this->input->post('email_address'),
                                'user_type' => $this->input->post('user_type'),
							 );
			   
			   $id = $this->m_common->_insert('employee',$data);
                             $data1 = array('user_id' => $id,
		);
                              $id = $this->m_common->_insert('usersrole',$data1);
			   
			   $this->session->set_flashdata('success', "New Collector Type <a href='".site_url('collector_types/edit/'.$id)."'>".$this->input->post('name')." </a> Added Successfully!");
			   
			   redirect('/employee');
		   }
		}
		else
		{
		   $this->data['row'] = $defaults;
		}
                $this->data['designations'] = $this->m_common->get_tabledata('designation','designation');
		
                $this->data['departments'] = $this->m_common->get_tabledata('department','department_name');
		$this->load->view('includes/header', $this->data);
		$this->load->view('includes/sidebar', $this->data);
		$this->load->view('employee/form', $this->data);
		$this->load->view('includes/footer', $this->data);
	}
	
	function edit($id = 0)
	{
		$this->data['page_title'] = 'Edit employee'; 
		$this->data['page'] = 'employee';
		$this->data['menu'] = 'add';
		$this->data['action'] = 'edit';
		
		$this->form_validation->set_rules('employee_name', 'employee_name', 'required[employee.employee_name]');
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
			   $data = array('employee_name' => $this->input->post('employee_name'),
							 'employee_short_name' => $this->input->post('employee_short_name'),
                               'employee_address' => $this->input->post('employee_address'),
                                'department_id' => $this->input->post('id_department'),
                              	
                                'designation_id' => $this->input->post('id_designation'),
                                'email_address' => $this->input->post('email_address'),
                                'user_type' => $this->input->post('user_type'),
							 );
			   
			 
			   
			   $id = $this->m_common->_update('employee',$data,array('id'=>$id));
			   
			   $this->session->set_flashdata('success', "employee <a href='".site_url('employee/edit/'.$id)."'>".$this->input->post('employee_name')." </a> Updated Successfully!");
			   
			   redirect('/employee');
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
		$this->load->view('employee/form', $this->data);
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
		
		$this->m_common->_delete('employee',array('id'=>$id));
		//$this->session->set_flashdata('success', "User <a href='#'>".$['depatment_name']."</a> Deleted Successfully!");
		redirect('/employee');
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
       
	function get()
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
                {
			$this->db->like('employee_name',$_GET['sSearch'],'both');
                       // $this->db->likeor('d.designation',$_GET['sSearch'],'both');
                }
		$this->db->limit($_GET['iDisplayLength'],$_GET['iDisplayStart']);
		$this->db->order_by($sort_column,$sort_order);
		
		$this->db->select('e.employee_name,e.employee_short_name,e.id,d.designation,de.department_name,e.user_type', FALSE);
		$this->db->from('employee e');
                 $this->db->join('designation d', 'e.designation_id = d.id');
                  $this->db->join('department de', 'e.department_id = de.id');
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
                        $hrefval=site_url("employee/edit/".$row->id); 
                   }
                   
                       if($this->session->userdata('roles_delete')!=1) 
                     {
                     $hrefdelval="";
                     $hrefdeljavaval="";
                   }
                   else
                   {
                        $hrefdelval=site_url("employee/delete/".$row->id); 
                       $hrefdeljavaval ='onclick="return confirm_status();"';
                   }	
                    array_push($x->aaData, array(
					$row->employee_name, 
                             $row->designation ,  $row->department_name ,
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
}
