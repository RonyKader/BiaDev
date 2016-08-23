<?php
class Report extends CI_Controller
{
function __construct()
{
parent:: __construct();
$this->load->helper(array('form', 'url', 'html'));
}
        public function report_item($page = 'report')
{

$company['companyquery'] = $this->report_model->select_company();
$data['query'] = $this->report_model->select_data();

$this->data['page_title'] = 'Report'; 
		$this->data['page'] = 'Report';
		
		
		$this->load->view('includes/header', $this->data);
		$this->load->view('includes/sidebar', $this->data);
		$this->load->view('report/iteminformation',array_merge($data, $company));
		$this->load->view('includes/footer', $this->data);


}


 public function report_buyer($page = 'report')
{

$company['companyquery'] = $this->report_model->select_company();
$data['query'] = $this->report_model->select_buyer();

$this->data['page_title'] = 'Report'; 
		$this->data['page'] = 'Report';
		
		
		$this->load->view('includes/header', $this->data);
		$this->load->view('includes/sidebar', $this->data);
		$this->load->view('report/buyerinformation',array_merge($data, $company));
		$this->load->view('includes/footer', $this->data);


}

 public function report_store($page = 'report')
{

$company['companyquery'] = $this->report_model->select_company();
$data['query'] = $this->report_model->select_store();

$this->data['page_title'] = 'Report'; 
		$this->data['page'] = 'Report';
		
		
		$this->load->view('includes/header', $this->data);
		$this->load->view('includes/sidebar', $this->data);
		$this->load->view('report/storeinformation',array_merge($data, $company));
		$this->load->view('includes/footer', $this->data);


}

public function report_employee($page = 'report')
{

$company['companyquery'] = $this->report_model->select_company();
$data['query'] = $this->report_model->select_employee();

$this->data['page_title'] = 'Report'; 
		$this->data['page'] = 'Report';
		
		
		$this->load->view('includes/header', $this->data);
		$this->load->view('includes/sidebar', $this->data);
		$this->load->view('report/employeeinformation',array_merge($data, $company));
		$this->load->view('includes/footer', $this->data);


}



public function report_designation($page = 'report')
{

$company['companyquery'] = $this->report_model->select_company();
$data['query'] = $this->report_model->select_designation();

$this->data['page_title'] = 'Report'; 
		$this->data['page'] = 'Report';
		
		
		$this->load->view('includes/header', $this->data);
		$this->load->view('includes/sidebar', $this->data);
		$this->load->view('report/designationinformation',array_merge($data, $company));
		$this->load->view('includes/footer', $this->data);
}


public function report_item_unit($page = 'report')
{

$company['companyquery'] = $this->report_model->select_company();
$data['query'] = $this->report_model->select_item_unit();

$this->data['page_title'] = 'Report'; 
		$this->data['page'] = 'Report';
		
		
		$this->load->view('includes/header', $this->data);
		$this->load->view('includes/sidebar', $this->data);
		$this->load->view('report/item_unitinformation',array_merge($data, $company));
		$this->load->view('includes/footer', $this->data);
}


public function report_unit_line($page = 'report')
{

$company['companyquery'] = $this->report_model->select_company();
$data['query'] = $this->report_model->select_unit_line();

$this->data['page_title'] = 'Report'; 
		$this->data['page'] = 'Report';
		
		
		$this->load->view('includes/header', $this->data);
		$this->load->view('includes/sidebar', $this->data);
		$this->load->view('report/unit_lineinformation',array_merge($data, $company));
		$this->load->view('includes/footer', $this->data);
}


public function report_supplier($page = 'report')
{

$company['companyquery'] = $this->report_model->select_company();
$data['query'] = $this->report_model->select_supplier();

$this->data['page_title'] = 'Report'; 
		$this->data['page'] = 'Report';
		
		
		$this->load->view('includes/header', $this->data);
		$this->load->view('includes/sidebar', $this->data);
		$this->load->view('report/supplierinformation',array_merge($data, $company));
		$this->load->view('includes/footer', $this->data);
}






}
?>