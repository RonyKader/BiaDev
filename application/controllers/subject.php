<?php
class Subject extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_auth');
		$this->m_auth->check_access();
	}
	
	function index()
	{
		$this->data['page_title'] = 'Subject'; 
		$this->data['page'] = 'Subject';
		$this->data['menu'] = 'list';
		
		$this->load->view('includes/header', $this->data);
		$this->load->view('includes/sidebar', $this->data);
		$this->load->view('subject/index', $this->data);
		$this->load->view('includes/footer', $this->data);
	}
	
	function add()
	{
		$this->data['page_title'] = 'Add New Subject'; 
		$this->data['page'] = 'Subject';
		$this->data['menu'] = 'add';
		$this->data['action'] = 'add';
		
		$this->form_validation->set_rules('subject', 'subject', 'required|is_unique[subject.subject]');
		
		$defaults = array ('subject'=>'','subject_short_name'=>'',
						   'course_id'=>'',
                                                    
						  );
		if($_POST)
		{
		   if (!$this->form_validation->run())
		   {
			   $this->data['row'] = array_merge($defaults, $_POST);
		   }
		   else
		   {
			   $data = array('subject' => $this->input->post('subject'),
                               'subject_short_name' => $this->input->post('subject_short_name'),
							 'course_id' => $this->input->post('course_id'),
                               'subject_group' =>1,
                              
							 );
			   
			   $id = $this->m_common->_insert('subject',$data);
			   
			   $this->session->set_flashdata('success', "New Subject Type <a href='".site_url('Subject/'.$id)."'>".$this->input->post('subject')." </a> Added Successfully!");
			   
			   redirect('/subject');
		   }
		}
		else
		{
		   $this->data['row'] = $defaults;
		}
		 $this->data['courses'] = $this->m_common->get_tabledata('course','course_name');
		$this->load->view('includes/header', $this->data);
		$this->load->view('includes/sidebar', $this->data);
		$this->load->view('subject/form', $this->data);
		$this->load->view('includes/footer', $this->data);
	}
	
	function edit($id = 0)
	{
		$this->data['page_title'] = 'Edit Subject'; 
		$this->data['page'] = 'Subject';
		$this->data['menu'] = 'add';
		$this->data['action'] = 'edit';
		
		$this->form_validation->set_rules('subject', 'subject', 'required|callback__check_name['.$id.']');
		
		$defaults = array ('subject'=>'','subject_short_name'=>'',
						   'course_id'=>'',
						  );
		if($_POST)
		{
		 
			   $data = array('subject' => $this->input->post('subject'),
                               'subject_short_name' => $this->input->post('subject_short_name'),
							 'course_id' => $this->input->post('course_id'),	
                               'subject_group' =>1,
                              
							 );
			   
			   $id = $this->m_common->_update('subject',$data,array('id'=>$id));
			   
			   $this->session->set_flashdata('success', "Subject <a href='".site_url('subject/edit/'.$id)."'>".$this->input->post('subject')." </a> Updated Successfully!");
			   
			   redirect('/subject');
		   
		}
		else
		{
		   $this->data['row'] = $this->m_common->_get('subject',array('id'=>$id));
		}
		 $this->data['courses'] = $this->m_common->get_tabledata('course','course_name');
		$this->load->view('includes/header', $this->data);
		$this->load->view('includes/sidebar', $this->data);
		$this->load->view('subject/form', $this->data);
		$this->load->view('includes/footer', $this->data);
	}
	 function delete($id = 0)
	{
		
		$this->m_common->_delete('subject',array('id'=>$id));
		//$this->session->set_flashdata('success', "User <a href='#'>".$['depatment_name']."</a> Deleted Successfully!");
		redirect('/subject');
	}
	function get()
	{
		$x = new stdClass();
	
		$x->aaData  = array();
		
		$aColumns = array('id','subject','course_id');
		
		$sort_column = 'id';
		
		$sort_order = 'desc';
		
		if ( isset( $_GET['iSortCol_0'] ) && isset( $_GET['sSortDir_0'] ))
		{
			$sort_column = $aColumns[ intval( $_GET['iSortCol_0'] ) ];
			$sort_order = $_GET['sSortDir_0'];
		}
		
		if($_GET['sSearch'] != '')
			$this->db->like('subject',$_GET['sSearch'],'both');
		
		$this->db->limit($_GET['iDisplayLength'],$_GET['iDisplayStart']);
		$this->db->order_by($sort_column,$sort_order);
		
		$this->db->select('s.id,subject,subject_short_name,s.course_id,c.course_name', FALSE);
		$this->db->from('subject s');
               $this->db->join('course c', 'c.id = s.course_id');
                 $this->db->where('s.subject_group', '1');
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
                        $hrefval=site_url("subject/edit/".$row->id); 
                   }
                   
                       if($this->session->userdata('roles_delete')!=1) 
                     {
                     $hrefdelval="";
                     $hrefdeljavaval="";
                   }
                   else
                   {
                        $hrefdelval=site_url("subject/delete/".$row->id); 
                       $hrefdeljavaval ='onclick="return confirm_status();"';
                   }	
	
                    array_push($x->aaData, array(
					$row->subject ,
                            $row->subject_short_name ,
					$row->course_name ,
                            '<a href="'.$hrefval.'" class="btn btn-mini btn-info"><i class="icon-edit bigger-120"></i></a>&nbsp;<a href="'.$hrefdelval.'" class="btn btn-mini btn-danger" '.$hrefdeljavaval.'><i class="icon-trash bigger-120"></i></a>',
			));
		}
	
	
		header('Content-Type: application/json');
		echo json_encode($x); 
	}
	
	function _check_name($name,$id)
	{
		$type = $this->m_common->_get('Department',array('id <>'=>$id,'subject_name'=>$name));
		
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
