<?php
class Reporttemplate extends CI_Controller
{
public function __construct()
	{
		parent::__construct();
		$this->load->model('m_auth');
		$this->m_auth->check_access();
	}
	
	function index()
	{
		$this->data['page_title'] = 'Company'; 
		$this->data['page'] = 'collector_types';
		$this->data['menu'] = 'list';
		
		$this->load->view('includes/header', $this->data);
		$this->load->view('includes/sidebar', $this->data);
		$this->load->view('reporttemplate/reporttemplate', $this->data);
		$this->load->view('includes/footer', $this->data);
	}
}
?>