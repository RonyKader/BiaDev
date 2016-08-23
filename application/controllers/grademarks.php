<?php
class grademarks extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_auth');
		$this->m_auth->check_access();
	}
	
	function index()
	{
		$this->data['page_title'] = 'Grademarks'; 
		$this->data['page'] = 'Grademarks';
		$this->data['menu'] = 'list';
		
		$this->load->view('includes/header', $this->data);
		$this->load->view('includes/sidebar', $this->data);
		$this->load->view('grademarks/index', $this->data);
		$this->load->view('includes/footer', $this->data);
	}
	function delete($id = 0)
	{
		
		$this->m_common->_delete('grademarks',array('id'=>$id));
		//$this->session->set_flashdata('success', "User <a href='#'>".$['depatment_name']."</a> Deleted Successfully!");
		redirect('/course');
	}
	function add()
	{
		$this->data['page_title'] = 'Add New Grademarks'; 
		$this->data['page'] = 'Grademarks';
		$this->data['menu'] = 'add';
		$this->data['action'] = 'add';
		
		$this->form_validation->set_rules('grade', 'grade', 'required|is_unique[grademarks.grade]');
		
		$defaults = array ('grade'=>'',
						   'marks'=>'',
                                                    
						  );
		if($_POST)
		{
		   if (!$this->form_validation->run())
		   {
			   $this->data['row'] = array_merge($defaults, $_POST);
		   }
		   else
		   {
			   $data = array('grade' => $this->input->post('grade'),
							 'marks' => $this->input->post('marks'),
                               
							 );
			   
			   $id = $this->m_common->_insert('grademarks',$data);
			   
			   $this->session->set_flashdata('success', "New Grademarks Type <a href='".site_url('grademarks/edit/'.$id)."'>".$this->input->post('grade')." </a> Added Successfully!");
			   
			   redirect('/grademarks');
		   }
		}
		else
		{
		   $this->data['row'] = $defaults;
		}
		
		$this->load->view('includes/header', $this->data);
		$this->load->view('includes/sidebar', $this->data);
		$this->load->view('grademarks/form', $this->data);
		$this->load->view('includes/footer', $this->data);
	}
	
	function edit($id = 0)
	{
		$this->data['page_title'] = 'Edit Grade'; 
		$this->data['page'] = 'grademarks';
		$this->data['menu'] = 'add';
		$this->data['action'] = 'edit';
		
		$this->form_validation->set_rules('grade', 'grade', 'required|callback__check_name['.$id.']');
		
		$defaults = array ('grade'=>'',
						   'marks'=>'',
						  );
		if($_POST)
		{
		   if (!$this->form_validation->run())
		   {
			   $this->data['row'] = array_merge($this->m_common->_get('grademarks',array('id'=>$id)), $_POST);
		   }
		   else
		   {
			   $data = array('grade' => $this->input->post('grade'),
							 'marks' => $this->input->post('marks'),	
                               
							 );
			   
			   $id = $this->m_common->_update('grademarks',$data,array('id'=>$id));
			   
			   $this->session->set_flashdata('success', "grademarks <a href='".site_url('grademarks/edit/'.$id)."'>".$this->input->post('grade')." </a> Updated Successfully!");
			   
			   redirect('/grademarks');
		   }
		}
		else
		{
		   $this->data['row'] = $this->m_common->_get('grademarks',array('id'=>$id));
		}
		
		$this->load->view('includes/header', $this->data);
		$this->load->view('includes/sidebar', $this->data);
		$this->load->view('grademarks/form', $this->data);
		$this->load->view('includes/footer', $this->data);
	}
	
	function get()
	{
		$x = new stdClass();
	
		$x->aaData  = array();
		
		$aColumns = array('id','grade','marks');
		
		$sort_column = 'id';
		
		$sort_order = 'desc';
		
		if ( isset( $_GET['iSortCol_0'] ) && isset( $_GET['sSortDir_0'] ))
		{
			$sort_column = $aColumns[ intval( $_GET['iSortCol_0'] ) ];
			$sort_order = $_GET['sSortDir_0'];
		}
		
		if($_GET['sSearch'] != '')
			$this->db->like('grade',$_GET['sSearch'],'both');
		
		$this->db->limit($_GET['iDisplayLength'],$_GET['iDisplayStart']);
		$this->db->order_by($sort_column,$sort_order);
		
		$this->db->select('SQL_CALC_FOUND_ROWS *', FALSE);
		$this->db->from('grademarks');
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
                        $hrefval=site_url("grademarks/edit/".$row->id); 
                   }
                   
                       if($this->session->userdata('roles_delete')!=1) 
                     {
                     $hrefdelval="";
                     $hrefdeljavaval="";
                   }
                   else
                   {
                        $hrefdelval=site_url("grademarks/delete/".$row->id); 
                       $hrefdeljavaval ='onclick="return confirm_status();"';
                   }		
                    array_push($x->aaData, array(
					$row->grade ,
                            $row->marks ,
					  '<a href="'.$hrefval.'" class="btn btn-mini btn-info"><i class="icon-edit bigger-120"></i></a>&nbsp;<a href="'.$hrefdelval.'" class="btn btn-mini btn-danger" '.$hrefdeljavaval.'><i class="icon-trash bigger-120"></i></a>',
					
			));
		}
	
	
		header('Content-Type: application/json');
		echo json_encode($x); 
	}
	
	function _check_name($name,$id)
	{
		$type = $this->m_common->_get('grademarks',array('id <>'=>$id,'grade'=>$name));
		
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
