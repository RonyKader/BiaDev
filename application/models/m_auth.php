<?php

class M_Auth extends CI_Model {

	function __construct() {

        parent::__construct();

    }

	function check_access()
	{
//		if ($this->session->userdata('logged_in')) {
//			return true;
//		} else {
//			redirect('login');
//		}
	}
	
	function login()
	{
                
		$this->db->where('username',$this->input->post('username'));
		$this->db->where('password',md5($this->input->post('password')));
		$query = $this->db->get('employee');
		$row = $query->row();
		
		if(!empty($row))
		{
			//TODO pull the data from database
                    
                   
		$this->db->where('user_id',$row->id);
		$query1 = $this->db->get('usersrole');
		$row1 = $query1->row();
                    
			$data = array('user_id'=>$row->id, 
						  'username'=>$row->username, 
                             'user_type'=>$row->designation_id, 
						  'logged_in'=>'1',
                          'roles_insert'=>$row1->role_insert, 
                            'roles_update'=>$row1->role_update,
                            'roles_delete'=>$row1->role_delete, 
                              'roles_approved'=>$row1->role_approved, 
                             'k'=>$row1->role_update,
                            'k1'=>$row1->role_delete, 
						  );
			// Save the user data to a session
			$this->session->set_userdata($data);
			return true;
		}
		else
			return false;
	}
	
}
