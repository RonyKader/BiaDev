<?php
class Login extends CI_Controller {
	
	function index()
	{
		$this->load->model('m_auth');
		$data["alert_message"]='';

		if ($this->session->userdata('logged_in')) {
				redirect('dashboard');
		} else {
			$this->load->helper('cookie');
			if ($_POST) {
				if ($this->m_auth->login()) {
					if ($this->input->post('rememberme')=='Y') {
						$cookie = array(
                                                    'user_id'=>'id_user',
							'name'=>'username',
							'value'=>$this->input->post('username'),
							'expire' => '2592000'
						);
						set_cookie($cookie); 
					} else {
						$cookie = array(
							'name'=>'username',
							'value'=>'',
							'expire' => '1'
						);
						set_cookie($cookie);
					}
                                        if ($this->session->userdata('urllink')=="")
					redirect('dashboard');
                                        else
                                        redirect($this->session->userdata('urllink'));    
					
				} else {
					$data["alert_message"]='Please enter valid login details';
				}
			}
			$this->load->view('login/index', $data);
		}
	}
}
