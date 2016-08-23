<?php
class Dashboard extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_auth');
		$this->m_auth->check_access();
	}
	function index()
	{
        //load the helper library
		$this->load->helper('form');
                $this->load->helper('url');
		$this->data['page_title'] = 'Dashboard'; 
		$this->data['page'] = 'Dashboard';
		$this->data['menu'] = 'list';
                if($this->session->userdata('user_type')=="") 
                {
                $this->data['messagedashboard'] = 'You are not authorized to check anything<br>Please contact admistrator';
                }
                else{
                       $this->data['messagedashboard'] ="";
                }
		$this->load->view('includes/header', $this->data);
		$this->load->view('includes/sidebar', $this->data);
		$this->load->view('dashboard/index', $this->data);
		$this->load->view('includes/footer', $this->data);
	
//		$this->data['page_title'] = 'Dashboard'; 
//		$this->data['page'] = 'dashboard';
//		$this->data['menu'] = '';
//		
//		
//                
//		
//		$this->load->view('includes/header', $this->data);
//		$this->load->view('includes/sidebar', $this->data);
//		$this->load->view('dashboard/index', $this->data);
//		$this->load->view('includes/footer', $this->data);
	}
	
	   function namewisefile()
	{
            //load the helper library
		$this->load->helper('form');
                $this->load->helper('url');
		$this->data['page_title'] = 'File'; 
		$this->data['page'] = 'File';
		$this->data['menu'] = 'list';
		$this->load->view('includes/header', $this->data);
		$this->load->view('includes/sidebar', $this->data);
		$this->load->view('file/namewisefile', $this->data);
		$this->load->view('includes/footer', $this->data);
	}
        
        
        function refnowisefile()
	{
            //load the helper library
		$this->load->helper('form');
                $this->load->helper('url');
		$this->data['page_title'] = 'File'; 
		$this->data['page'] = 'File';
		$this->data['menu'] = 'list';
		$this->load->view('includes/header', $this->data);
		$this->load->view('includes/sidebar', $this->data);
		$this->load->view('file/refnowisefile', $this->data);
		$this->load->view('includes/footer', $this->data);
	}
        
        
        function issuebywisefile()
	{
            //load the helper library
		$this->load->helper('form');
                $this->load->helper('url');
		$this->data['page_title'] = 'File'; 
		$this->data['page'] = 'File';
		$this->data['menu'] = 'list';
		$this->load->view('includes/header', $this->data);
		$this->load->view('includes/sidebar', $this->data);
		$this->load->view('file/issuebywisefile', $this->data);
		$this->load->view('includes/footer', $this->data);
	}
        
        
        
        function datewisefile()
	{
            //load the helper library
		$this->load->helper('form');
                $this->load->helper('url');
		$this->data['page_title'] = 'File'; 
		$this->data['page'] = 'File';
		$this->data['menu'] = 'list';
		$this->load->view('includes/header', $this->data);
		$this->load->view('includes/sidebar', $this->data);
		$this->load->view('file/datewisefile', $this->data);
		$this->load->view('includes/footer', $this->data);
	}
        function filefrequencyindex()
	{
            //load the helper library
		$this->load->helper('form');
                $this->load->helper('url');
		$this->data['page_title'] = 'File'; 
		$this->data['page'] = 'File';
		$this->data['menu'] = 'list';
		$this->load->view('includes/header', $this->data);
		$this->load->view('includes/sidebar', $this->data);
		$this->load->view('file/filefrequencyindex', $this->data);
		$this->load->view('includes/footer', $this->data);
	}
	
	function add()
	{
		$this->data['page_title'] = 'Add New File'; 
		$this->data['page'] = 'file';
		$this->data['menu'] = 'add';
		$this->data['action'] = 'add';
		
		$this->form_validation->set_rules('file_name', 'ref_no','file_date', 'required');
		
                
                
                
                
                
                
		$defaults = array (  'file_name'=>'',
                                      'ref_no'=>'',
                                       'file_date'=>'',
                                        'upload_date'=>'',
                                         'upload_by'=>'',
                                         'issue_by'=>'',
                                         'issue_by_remarks'=>'',
                                          'issue_to'=>'',
                                           'issue_to_remarks'=>'',
                                           'file_path'=>'',
                                             'remarks'=>'',
                      'timecomplete'=>'',
					  
						  );
		if($_POST)
		{
	
             
                    
                    	$this->load->helper('form');
		$config['upload_path'] = 'application/views/uploads/';
		$config['allowed_types'] = 'gif|jpg|png';
		$this->load->library('upload', $config);
    $this->upload->initialize($config);
    $this->upload->set_allowed_types('*');
    $this->upload->do_upload('userfile');
                    
		$upload_data = $this->upload->data();	   
			   $data = array('file_name' => $this->input->post('file_name'),
							 'ref_no' =>$this->input->post('ref_no'),	
							 'file_date' => $this->input->post('file_date'),
                                                         'upload_by'=>$this->input->post('upload_by'),
                                'issue_by'=>$this->input->post('issue_by'),
                                'issue_by_remarks'=>$this->input->post('issue_by_remarks'),
                               'issue_to'=>$this->input->post('issue_to'),
                                'issue_to_remarks'=>$this->input->post('issue_to_remarks'),
                                'timecomplete'=>$this->input->post('timecomplete'),
                                'file_path'=>$upload_data['file_name'],
                                 'remarks'=>$this->input->post('remarks'),
							 );
			   
			
			   $id_inspector = $this->m_common->_insert('file',$data);
			   
			  
                           
			   
		
			  // $date_format = $this->input->post('date_format');
			   
			   
			   $this->session->set_flashdata('success', "New Row Inspector <a href='".site_url('file/edit/'.$id_inspector)."'>".$this->input->post('name')." </a> Added Successfully!");
			   
			   redirect('/file');
		   
		}
		else
		{
		   $this->data['row'] = $defaults;
		}
		
		
                
                $this->data['employees'] = $this->m_common->_get_all('employee');
         
		
		$this->load->view('includes/header', $this->data);
		$this->load->view('includes/sidebar', $this->data);
		$this->load->view('file/form', $this->data);
		$this->load->view('includes/footer', $this->data);
	}
	
	function frequencyedit($id = 0)
	{
		$this->data['page_title'] = 'File List'; 
		$this->data['page'] = 'file';
		$this->data['menu'] = 'add';
		$this->data['action'] = 'edit';
		  $this->data['employees'] = $this->m_common->_get_all('employee');
		
		
		if($_POST)
		{
			
			     $data = array('frequency' => $this->input->post('frequency'),
							 'frequency_cycle' =>$this->input->post('frequency_cycle'),	
                                
							
						
							 );
			 
			     $id = $this->m_common->_update('file',$data,array('id'=>$id));
			   $this->session->set_flashdata('success', "Frequncy <a href='".site_url('file/edit/'.$id)."'>".$this->input->post('name')." </a> Updated Successfully!");
			   
			   redirect('/file/filefrequencyindex');
		   
		}
		else
		{
                    $row = $this->m_common->_get('file',array('id'=>$id));
		   $this->data['row'] =$row;
      
                   
		}
		
		
                
               
                
		
		
		$this->load->view('includes/header', $this->data);
		$this->load->view('includes/sidebar', $this->data);
		$this->load->view('file/filefrequencyform', $this->data);
		$this->load->view('includes/footer', $this->data);
	}
	
        
        function edit($id = 0)
	{
		$this->data['page_title'] = 'File List'; 
		$this->data['page'] = 'file';
		$this->data['menu'] = 'add';
		$this->data['action'] = 'edit';
		  $this->data['employees'] = $this->m_common->_get_all('employee');
		
		
		if($_POST)
		{
			   
			    	$this->load->helper('form');
		$config['upload_path'] = 'application/views/uploads/';
		$config['allowed_types'] = 'gif|jpg|png';
		$this->load->library('upload', $config);
    $this->upload->initialize($config);
    $this->upload->set_allowed_types('*');
    $this->upload->do_upload('userfile');
                    
		$upload_data = $this->upload->data();	   
			   $data = array('file_name' => $this->input->post('file_name'),
							 'ref_no' =>$this->input->post('ref_no'),	
							 'file_date' => $this->input->post('file_date'),
                                                         'upload_by'=>$this->input->post('upload_by'),
                                'issue_by'=>$this->input->post('issue_by'),
                                'issue_by_remarks'=>$this->input->post('issue_by_remarks'),
                               'issue_to'=>$this->input->post('issue_to'),
                                'issue_to_remarks'=>$this->input->post('issue_to_remarks'),
                                'timecomplete'=>$this->input->post('timecomplete'),
                                'file_path'=>$upload_data['file_name'],
                                 'remarks'=>$this->input->post('remarks'),
							 );
			   
			
			   $id = $this->m_common->_update('file',$data,array('id'=>$id));
			   
			  
                           
			   
		
			  // $date_format = $this->input->post('date_format');
			   
			   
			   $this->session->set_flashdata('success', "File Upload <a href='".site_url('file/edit/'.$id_inspector)."'>".$this->input->post('name')." </a> Added Successfully!");
			   
			   redirect('/file');
		   
		}
		else
		{
                    $row = $this->m_common->_get('file',array('id'=>$id));
		   $this->data['row'] =$row;
      
                   
		}
		
		
               
                
		
		
		$this->load->view('includes/header', $this->data);
		$this->load->view('includes/sidebar', $this->data);
		$this->load->view('file/form', $this->data);
		$this->load->view('includes/footer', $this->data);
	}
	
        
        
        
        function details($id = 0)
	{
		$this->data['page_title'] = 'File List'; 
		$this->data['page'] = 'file';
		$this->data['menu'] = 'add';
		$this->data['action'] = 'edit';
		  $this->data['employees'] = $this->m_common->_get_all('employee');
		$this->form_validation->set_rules('name', 'Name', 'required');
		
		
                    $row = $this->m_common->_get('file',array('id'=>$id));
		   $this->data['row'] =$row;
      
                   
		
		
		
               
                
		
		
		$this->load->view('includes/header', $this->data);
		$this->load->view('includes/sidebar', $this->data);
		$this->load->view('file/filedetails', $this->data);
		$this->load->view('includes/footer', $this->data);
	}
        
        
        
        
        
        function filefrequencyget()
	{
            
	$x = new stdClass();
	
		$x->aaData  = array();
		
		$aColumns = array('id','file_name','ref_no');
		
		$sort_column = 'id';
		
		$sort_order = 'desc';
		
		if ( isset( $_GET['iSortCol_0'] ) && isset( $_GET['sSortDir_0'] ))
		{
			$sort_column = $aColumns[ intval( $_GET['iSortCol_0'] ) ];
			$sort_order = $_GET['sSortDir_0'];
		}
		
		if($_GET['sSearch'] != '')
			$this->db->like('ref_no',$_GET['sSearch'],'both');
		
		$this->db->limit($_GET['iDisplayLength'],$_GET['iDisplayStart']);
		$this->db->order_by($sort_column,$sort_order);
		
		$this->db->select('SQL_CALC_FOUND_ROWS *', FALSE);
		$this->db->from('file');
		$query = $this->db->get();
		$result = $query->result();
		
		$cnt = $this->m_common->get_search_count();
		
		$x->iTotalRecords = $cnt;
		$x->iTotalDisplayRecords = $cnt;
		$x->sEcho = intval($_GET['sEcho']);
		
		foreach ($result as $row) {
			array_push($x->aaData, array(
					$row->id, 
					'<a href="'.site_url('file/edit/'.$row->id).'">'.$row->file_name.'</a>',
					$row->ref_no ,
                           ($row->file_date),
					($row->upload_date),
					
                            $row->remarks ,
                            '<a href="'.site_url("file/details/".$row->id).'" class="btn btn-mini btn-info"><i>Views</i></a>',
                            '<a href="'.site_url("file/frequencyedit/".$row->id).'" class="btn btn-mini btn-info"><i class="icon-edit bigger-120"></i></a>&nbsp;<a href="'.site_url("file/delete/".$row->id).'" class="btn btn-mini btn-danger" onclick="return confirm_status();"><i class="icon-trash bigger-120"></i></a>'
			));
		}
	
	
		header('Content-Type: application/json');
		echo json_encode($x); 
	}
        
        
        
        
        
        function refnowisefileget()
	{
            
	$x = new stdClass();
	
		$x->aaData  = array();
		
		$aColumns = array('id','file_name','ref_no');
		
		$sort_column = 'id';
		
		$sort_order = 'desc';
		
		if ( isset( $_GET['iSortCol_0'] ) && isset( $_GET['sSortDir_0'] ))
		{
			$sort_column = $aColumns[ intval( $_GET['iSortCol_0'] ) ];
			$sort_order = $_GET['sSortDir_0'];
		}
		
		if($_GET['sSearch'] != '')
			$this->db->like('ref_no',$_GET['sSearch'],'both');
		
		$this->db->limit($_GET['iDisplayLength'],$_GET['iDisplayStart']);
		$this->db->order_by($sort_column,$sort_order);
		
		$this->db->select('SQL_CALC_FOUND_ROWS *', FALSE);
		$this->db->from('file');
		$query = $this->db->get();
		$result = $query->result();
		
		$cnt = $this->m_common->get_search_count();
		
		$x->iTotalRecords = $cnt;
		$x->iTotalDisplayRecords = $cnt;
		$x->sEcho = intval($_GET['sEcho']);
		
		foreach ($result as $row) {
			array_push($x->aaData, array(
					$row->id, 
                            $row->ref_no ,
                            $row->file_name,
					
                            ($row->file_date?date('Y-m-d h:i A',strtotime($row->file_date)):''),
					($row->upload_date?date('Y-m-d h:i A',strtotime($row->upload_date)):''),
					
                           
					
                           
                            '<a href="'.site_url("file/details/".$row->id).'" class="btn btn-mini btn-info"><i>Views Details</i></a>',
                           
			));
		}
	
	
		header('Content-Type: application/json');
		echo json_encode($x); 
	}
        
        
        
        
        function issuebywisefileget()
	{
            
	$x = new stdClass();
	
		$x->aaData  = array();
		
		$aColumns = array('id','file_name','ref_no');
		
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
		
		
                $this->db->select('f.id, f.file_name, f.ref_no,e.employee_name, f.file_date,f.upload_date');
		$this->db->from('file f');
		
                $this->db->join('employee e', 'e.id = f.issue_by');
		
		$query = $this->db->get();
		$result = $query->result();
		
		$cnt = $this->m_common->get_search_count();
		$x->iTotalRecords = $cnt;
		$x->iTotalDisplayRecords = $cnt;
		$x->sEcho = intval($_GET['sEcho']);
		
		foreach ($result as $row) {
			array_push($x->aaData, array(
					$row->id, 
                            $row->employee_name, 
                            $row->file_name,
					$row->ref_no ,
                            ($row->file_date?date('Y-m-d h:i A',strtotime($row->file_date)):''),
					($row->upload_date?date('Y-m-d h:i A',strtotime($row->upload_date)):''),
					
                           
					
                           
                            '<a href="'.site_url("file/details/".$row->id).'" class="btn btn-mini btn-info"><i>Views Details</i></a>',
                           
			));
		}
	
	
		header('Content-Type: application/json');
		echo json_encode($x); 
	}
        
        function namewisefileget()
	{
            
	$x = new stdClass();
	
		$x->aaData  = array();
		
		$aColumns = array('id','file_name','ref_no');
		
		$sort_column = 'id';
		
		$sort_order = 'desc';
		
		if ( isset( $_GET['iSortCol_0'] ) && isset( $_GET['sSortDir_0'] ))
		{
			$sort_column = $aColumns[ intval( $_GET['iSortCol_0'] ) ];
			$sort_order = $_GET['sSortDir_0'];
		}
		
		if($_GET['sSearch'] != '')
			$this->db->like('file_name',$_GET['sSearch'],'both');
		
		$this->db->limit($_GET['iDisplayLength'],$_GET['iDisplayStart']);
		$this->db->order_by($sort_column,$sort_order);
		
		$this->db->select('SQL_CALC_FOUND_ROWS *', FALSE);
		$this->db->from('file');
		$query = $this->db->get();
		$result = $query->result();
		
		$cnt = $this->m_common->get_search_count();
		
		$x->iTotalRecords = $cnt;
		$x->iTotalDisplayRecords = $cnt;
		$x->sEcho = intval($_GET['sEcho']);
		
		foreach ($result as $row) {
			array_push($x->aaData, array(
					$row->id, 
                            $row->file_name,
					$row->ref_no ,
                            ($row->file_date?date('Y-m-d h:i A',strtotime($row->file_date)):''),
					($row->upload_date?date('Y-m-d h:i A',strtotime($row->upload_date)):''),
					
                           
					
                           
                            '<a href="'.site_url("file/details/".$row->id).'" class="btn btn-mini btn-info"><i>Views Details</i></a>',
                           
			));
		}
	
	
		header('Content-Type: application/json');
		echo json_encode($x); 
	}
        
        
	function datewisefileget()
	{
            
	$x = new stdClass();
	
		$x->aaData  = array();
		
		$aColumns = array('id','file_name','ref_no');
		
		$sort_column = 'id';
		
		$sort_order = 'desc';
		
		if ( isset( $_GET['iSortCol_0'] ) && isset( $_GET['sSortDir_0'] ))
		{
			$sort_column = $aColumns[ intval( $_GET['iSortCol_0'] ) ];
			$sort_order = $_GET['sSortDir_0'];
		}
		
		if($_GET['sSearch'] != '')
			$this->db->like('file_date',$_GET['sSearch'],'both');
		
		$this->db->limit($_GET['iDisplayLength'],$_GET['iDisplayStart']);
		$this->db->order_by($sort_column,$sort_order);
		
		$this->db->select('SQL_CALC_FOUND_ROWS *', FALSE);
		$this->db->from('file');
		$query = $this->db->get();
		$result = $query->result();
		
		$cnt = $this->m_common->get_search_count();
		
		$x->iTotalRecords = $cnt;
		$x->iTotalDisplayRecords = $cnt;
		$x->sEcho = intval($_GET['sEcho']);
		
		foreach ($result as $row) {
			array_push($x->aaData, array(
					$row->id, 
                            ($row->file_date?date('Y-m-d h:i A',strtotime($row->file_date)):''),
					($row->upload_date?date('Y-m-d h:i A',strtotime($row->upload_date)):''),
					$row->file_name,
					$row->ref_no ,
                           
					
                           
                            '<a href="'.site_url("file/details/".$row->id).'" class="btn btn-mini btn-info"><i>Views Details</i></a>',
                           
			));
		}
	
	
		header('Content-Type: application/json');
		echo json_encode($x); 
	}
        
        function get()
	{
            
	$x = new stdClass();
	
		$x->aaData  = array();
		
		$aColumns = array('id','file_name','ref_no');
		
		$sort_column = 'id';
		
		$sort_order = 'desc';
		
		if ( isset( $_GET['iSortCol_0'] ) && isset( $_GET['sSortDir_0'] ))
		{
			$sort_column = $aColumns[ intval( $_GET['iSortCol_0'] ) ];
			$sort_order = $_GET['sSortDir_0'];
		}
		
		if($_GET['sSearch'] != '')
			$this->db->like('file_status',$_GET['sSearch'],'both');
		
		$this->db->limit($_GET['iDisplayLength'],$_GET['iDisplayStart']);
		$this->db->order_by($sort_column,$sort_order);
		
		$this->db->select('SQL_CALC_FOUND_ROWS *', FALSE);
		$this->db->from('file');
                if ($this->session->userdata('user_type')!='Admin')
                {
                          $this->db->where('issue_to',  $this->session->userdata('user_id'));
                          $this->db->or_where('forward_to',  $this->session->userdata('user_id'));
                         
                }
		$query = $this->db->get();
		$result = $query->result();
		
		$cnt = $this->m_common->get_search_count();
		
		$x->iTotalRecords = $cnt;
		$x->iTotalDisplayRecords = $cnt;
		$x->sEcho = intval($_GET['sEcho']);
		
		foreach ($result as $row) {
			array_push($x->aaData, array(
					
					$row->file_name,
					$row->ref_no ,
                           ($row->upload_date),
                           ($row->file_date),
                             ($row->timecomplete),
                             ($row->frequency),
			     ($row->file_status),		
					
                           
                            '<a href="'.site_url("file/details/".$row->id).'" class="btn btn-mini btn-info"><i>Click Details</i></a>',
                          
			));
		}
	
	
		header('Content-Type: application/json');
		echo json_encode($x); 
	}
	
	function delete($id = 0)
	{
		$this->m_common->_delete('file',array('id'=>$id));
		$this->m_common->_delete('file_columns',array('id_inspector'=>$id));
		$this->m_common->_delete('log_file',array('id_file'=>$id));
		$this->session->set_flashdata('success', "Row inspector ID ".$id." Deleted Successfully!");
		redirect('/file');
	}
	
	function view($id)
	{
		if ($id > 0) {
			
			$row = $this->m_common->_get('file',array('id'=>$id));
            if (isset($row['id'])) {
                $this->data['row'] = $row;
				$this->data['columns'] = $this->m_common->get_all_columns($id);
				$return['title'] = ucwords($row['name']).' - Columns';
                $return['data'] = $this->load->view('file/detail', $this->data, true);
                $return['success'] = 'true';
            } else {
                $return['error'] = 'No details available';
            }
        } else {
            $return['error'] = 'No details available';
        }
        die(json_encode($return));
		
		
	}
	
}
