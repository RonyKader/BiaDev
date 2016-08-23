<?php
class eport_model extends CI_Model {
function __construct()
{
parent:: __construct();
}
function select_data()
{
$itemquery = $this->db->get('item');
return $query->result();
}
}