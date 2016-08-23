<?php
/**
 * Description of Commonmodel
 *
 * @author Akhil
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Report_model extends CI_Model{
    //put your code here
    public function __construct() {
        parent::__construct();
    }
  public function select_data()
{
$query = $this->db->get('item');
return $query->result();
}

 public function select_company()
{
$query = $this->db->get('company');
return $query->result();
}
     public function select_buyer()
{
$query = $this->db->get('buyer');
return $query->result();
}
     public function select_store()
{
$query = $this->db->get('store');
return $query->result();
}

   public function select_supplier()
{
$query = $this->db->get('supplier');
return $query->result();
}

public function select_unit_line()
{
$query = $this->db->get('unit_line');
return $query->result();
}

public function select_item_unit()
{
$query = $this->db->get('item_unit');
return $query->result();
}
    public function select_designation()
{
$query = $this->db->get('designation');
return $query->result();
}

 public function select_employee()
{
$query = $this->db->get('employee');
return $query->result();
}
    
    

	
}
