<?php
/**
 * Description of Commonmodel
 *
 * @author Students_model	
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Students_model extends CI_Model
{

	public function get_course()
	{	
		$this->db->select('*');
		$this->db->from('course');
		$this->db->order_by( 'course_name ASC' );
		$this->db->group_by( 'course_name' );
		$query = $this->db->get();
		return $query->result();
	}

	public function get_designation()
	{
		$this->db->select('*');
		$this->db->from('designation');
		$this->db->order_by( 'designation ASC' );
		$this->db->group_by( 'designation' );
		$query = $this->db->get();
		return $query->result();
	}

	public function get_district()
	{
		$this->db->select('*');
		$this->db->from('district' );
		$this->db->order_by( 'district_name ASC' );
		$this->db->group_by( 'district_name' );
		$query = $this->db->get();
		return $query->result();
	}

	public function get_upzilla( $district = 'Pabna' )
	{
		$this->db->select('*');
		$this->db->from( 'district' );
		$this->db->where( array( 'district_name' => $district ) );
		$this->db->order_by( 'upzilla_name ASC' );
		$query = $this->db->get();
		return $query->result();

	}
}