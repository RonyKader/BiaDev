<?php
class Logs extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_auth');
		$this->m_auth->check_access();
	}

	
	function index()
	{
		$this->data['page_title'] = 'General Logs - Collector'; 
		$this->data['page'] = 'logs';
		$this->data['menu'] = 'general';
		
		if($_POST)
		{
			$ids = $this->input->post('ids');
			if(!empty($ids))
			{
				foreach($ids as $id)
				{
					$this->m_common->_delete('logs_general',array('id'=>$id));
				}
				$this->session->set_flashdata('success', "Selected logs deleted Successfully!");
				redirect('/logs');
			}
		}
		
		$this->load->view('includes/header', $this->data);
		$this->load->view('includes/sidebar', $this->data);
		$this->load->view('logs/index', $this->data);
		$this->load->view('includes/footer', $this->data);
	}
	
	function get()
	{
		$x = new stdClass();
	
		$x->aaData  = array();
		
		$aColumns = array('id','id_collector','log','created_at');
		
		$sort_column = 'id';
		
		$sort_order = 'asc';
		
		if ( isset( $_GET['iSortCol_0'] ) && isset( $_GET['sSortDir_0'] ))
		{
			$sort_column = $aColumns[ intval( $_GET['iSortCol_0'] ) ];
			$sort_order = $_GET['sSortDir_0'];
		}
		
		if($_GET['sSearch'] != '')
			$this->db->like('log',$_GET['sSearch'],'both');
		
		$this->db->limit($_GET['iDisplayLength'],$_GET['iDisplayStart']);
		$this->db->order_by($sort_column,$sort_order);
		
		$this->db->select('SQL_CALC_FOUND_ROWS logs_general.*,collectors.name collector_name', FALSE);
		$this->db->join('collectors','collectors.id = logs_general.id_collector','left');
		$query = $this->db->get('logs_general');
		$result = $query->result();
		
		$cnt = $this->m_common->get_search_count();
		
		$x->iTotalRecords = $cnt;
		$x->iTotalDisplayRecords = $cnt;
		$x->sEcho = intval($_GET['sEcho']);
		
		foreach ($result as $row) {
			array_push($x->aaData, array(
					$row->id, 
					$row->collector_name, 
					$row->log,
					($row->created_at?date('Y-m-d h:i A',strtotime($row->created_at)):''),
					'<input type="checkbox" name="ids[]" value="'.$row->id.'" /><span class="lbl"></span> &nbsp;&nbsp;<a href="'.site_url("logs/delete/".$row->id).'" class="btn btn-mini btn-danger" onclick="return confirm_status();"><i class="icon-trash bigger-120"></i></a>'
			));
		}
	
	
		header('Content-Type: application/json');
		echo json_encode($x); 
	}
	
	function delete($id = 0)
	{
		$this->m_common->_delete('logs_general',array('id'=>$id));
		$this->session->set_flashdata('success', "Log with ID ".$id." Deleted Successfully!");
		redirect('/logs');
	}
}
