<?php


if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class Upload extends CI_Controller {

	 public function __construct()
   {
        parent::__construct();
   }
  
  //if index is loaded
	public function index()
                {
		//load the helper library
		$this->load->helper('form');
                $this->load->helper('url');
		//Set the message for the first time
		$data = array('msg' => "Upload File");
                $data['upload_data'] = '';    
		//load the view/upload.php with $data
		$this->load->view('upload', $data);
        	}

                function upload_it() {
		
		$this->load->helper('form');

		$config['upload_path'] = 'application/views/uploads/';
		$config['allowed_types'] = 'gif|jpg|png';
		$this->load->library('upload', $config);
                $this->upload->initialize($config);
                $this->upload->set_allowed_types('*');

                $data['upload_data'] = '';
               
                $this->upload->do_upload('userfile');
	       }

}