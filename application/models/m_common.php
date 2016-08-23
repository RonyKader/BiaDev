<?php
/**
 * Description of Commonmodel
 *
 * @author Akhil
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_common extends CI_Model{
    //put your code here
    public function __construct() {
        parent::__construct();
    }
    /**
     *
     * @param type $table
     * @param type $data
     * @return type 
     */
    public function _insert($table, $data){
        $this->db->insert($table, $data);
        return $this->db->insert_id();
    }
    /**
     *
     * @param type $table
     * @param type $data
     * @param type $condition
     * @return type 
     */
    public function _update($table, $data, $condition){
        $this->db->update($table, $data, $condition);
        return $this->db->affected_rows() ? $this->db->affected_rows(): true;
    }
    /**
     *
     * @param type $table
     * @param type $condition
     * @return type 
     */
    public function _delete($table, $condition){
        $this->db->delete($table, $condition);
        return $this->db->affected_rows();
    }
	
	public function _truncate($table){
        $this->db->truncate($table);
        return $this->db->affected_rows();
    }
	
	function _get($table, $condition)
	{
		$query = $this->db->get_where($table,$condition);
		return $query->row_array();
	}
        function getregistrationno()
	{
             $query = $this->db->query("select lpad(max(substring(registration_no,7,5)+1),5,0) as registration_no from student");
		
//	                $this->db->select_max('registration_no');
//    $this->db->from('student');
//      $query = $this->db->get('division_dist_upzilla');
             return $query->row_array();
    //return $this->db->get()->row()->registration_no;
	}
        function getsessionyear($id)
	{
             $query = $this->db->query("SELECT  `session_month`, `session_year`
                     FROM `student` where id='".$id."'");

             return $query->row_array();
   
	}
        
        
	function _get_all($table,$condition = array())
	{
		if(!empty($condition))
			$this->db->where($condition);
			
		$query = $this->db->get($table);
		return $query->result();
	}
	
	// Get the total records count after the search
	public function get_search_count()
	{
		$search_query = 'SELECT FOUND_ROWS() cnt';
		$query = $this->db->query($search_query);
		$row = $query->row();
		return $row->cnt;
	}
	
	
	
        function get_tabledata($table, $columnname)
        {
           
            $this->db->order_by($columnname,'asc');
		$query = $this->db->get($table);
		return $query->result();
        }
        
         function get_districtdata()
        {
             $this->db->distinct();

      $this->db->select('district_code,district_name ');  
   $this->db->order_by('district_name','asc');
   $query = $this->db->get('division_dist_upzilla');
		return $query->result();
        }
        
         function get_upzilladata($district_code)
        {
             $this->db->distinct();

      $this->db->select('district_code,upzilla_code,upzilla_name');  
   $this->db->order_by('upzilla_name','asc');
   // $this->db->where('district_code',$district_code);
    
   $query = $this->db->get('division_dist_upzilla');
		return $query->result();
        }
       
               function get_resultsheetgeneral($session_id)
        {
             
               
 $query = $this->db->query("
             select registration_no,student_name,sum(BIAmarks1) as BIAmarks1,sum(BIAmarks2) as BIAmarks2,sum(BIAmarks3) as BIAmarks3,sum(BIAmarks4) as BIAmarks4,sum(BIAmarks5) as BIAmarks5,sum(BIAmarks6) as BIAmarks6  from (select *from (select distinct r.id,s.registration_no,student_name,r.marks as BIAmarks1,0 as BIAmarks2,0 as BIAmarks3,0 as BIAmarks4,0 as BIAmarks5,0 as BIAmarks6,r.course_id,r.session_month_year
 from result r RIGHT JOIN student s on s.registration_no = r.student_registration_no
  RIGHT JOIN course c on c.id = r.course_id
   RIGHT JOIN subject sb on sb.id = r.subject_id
  and c.type='general'
  and sb.subject_short_name='BIA-10'
  union
  select distinct r.id,s.registration_no,student_name,0 as BIAmarks1,r.marks as BIAmarks2,0 as BIAmarks3,0 as BIAmarks4,0 as BIAmarks5,0 as BIAmarks6,r.course_id,r.session_month_year
 from result r RIGHT JOIN student s on s.registration_no = r.student_registration_no
  RIGHT JOIN course c on c.id = r.course_id
   RIGHT JOIN subject sb on sb.id = r.subject_id
  and c.type='general'
  and sb.subject_short_name='BIA-11'

  union
  select distinct r.id,s.registration_no,student_name,0 as BIAmarks1,0 as BIAmarks2,r.marks as BIAmarks3,0 as BIAmarks4,0 as BIAmarks5,0 as BIAmarks6,r.course_id,r.session_month_year
 from result r RIGHT JOIN student s on s.registration_no = r.student_registration_no
  RIGHT JOIN course c on c.id = r.course_id
   RIGHT JOIN subject sb on sb.id = r.subject_id
  and c.type='general'
  and sb.subject_short_name='BIA-12'
   union
  select distinct r.id,s.registration_no,student_name,0 as BIAmarks1,0 as BIAmarks2,0 as BIAmarks3,r.marks as BIAmarks4,0 as BIAmarks5,0 as BIAmarks6,r.course_id,r.session_month_year
 from result r RIGHT JOIN student s on s.registration_no = r.student_registration_no
  RIGHT JOIN course c on c.id = r.course_id
   RIGHT JOIN subject sb on sb.id = r.subject_id
  and c.type='general'
  and sb.subject_short_name='BIA-13'
    union
  select distinct r.id,s.registration_no,student_name,0 as BIAmarks1,0 as BIAmarks2,0 as BIAmarks3,0 as BIAmarks4,r.marks as BIAmarks5,0 as BIAmarks6,r.course_id,r.session_month_year
 from result r RIGHT JOIN student s on s.registration_no = r.student_registration_no
  RIGHT JOIN course c on c.id = r.course_id
   RIGHT JOIN subject sb on sb.id = r.subject_id
  and c.type='general'
  and sb.subject_short_name='BIA-14(general)'
  union
  select distinct r.id,s.registration_no,student_name,0 as BIAmarks1,0 as BIAmarks2,0 as BIAmarks3,0 as BIAmarks4,0 as BIAmarks5,r.marks as BIAmarks6,r.course_id,r.session_month_year
 from result r RIGHT JOIN student s on s.registration_no = r.student_registration_no
  RIGHT JOIN course c on c.id = r.course_id
   RIGHT JOIN subject sb on sb.id = r.subject_id
  and c.type='general'
  and sb.subject_short_name='BIA-15(general)'
) tamp
  where id is not null) tamp1
   where   concat(session_month_year,course_id)='".$session_id."'
  group by registration_no,student_name
    

");

	
	
		return $query->result();
        }
        
        
               function get_resultsheetlife($session_id)
        {
             
               
     
               
 $query = $this->db->query("
             select registration_no,student_name,sum(BIAmarks1) as BIAmarks1,sum(BIAmarks2) as BIAmarks2,sum(BIAmarks3) as BIAmarks3,sum(BIAmarks4) as BIAmarks4,sum(BIAmarks5) as BIAmarks5,sum(BIAmarks6) as BIAmarks6  from (select *from (select distinct r.id,s.registration_no,student_name,r.marks as BIAmarks1,0 as BIAmarks2,0 as BIAmarks3,0 as BIAmarks4,0 as BIAmarks5,0 as BIAmarks6,r.course_id,r.session_month_year
 from result r RIGHT JOIN student s on s.registration_no = r.student_registration_no
  RIGHT JOIN course c on c.id = r.course_id
   RIGHT JOIN subject sb on sb.id = r.subject_id
  and c.type='life'
  and sb.subject_short_name='BIA-6'
  union
  select distinct r.id,s.registration_no,student_name,0 as BIAmarks1,r.marks as BIAmarks2,0 as BIAmarks3,0 as BIAmarks4,0 as BIAmarks5,0 as BIAmarks6,r.course_id,r.session_month_year
 from result r RIGHT JOIN student s on s.registration_no = r.student_registration_no
  RIGHT JOIN course c on c.id = r.course_id
   RIGHT JOIN subject sb on sb.id = r.subject_id
  and c.type='life'
  and sb.subject_short_name='BIA-7'

  union
  select distinct r.id,s.registration_no,student_name,0 as BIAmarks1,0 as BIAmarks2,r.marks as BIAmarks3,0 as BIAmarks4,0 as BIAmarks5,0 as BIAmarks6,r.course_id,r.session_month_year
 from result r RIGHT JOIN student s on s.registration_no = r.student_registration_no
  RIGHT JOIN course c on c.id = r.course_id
   RIGHT JOIN subject sb on sb.id = r.subject_id
  and c.type='life'
  and sb.subject_short_name='BIA-8'
   union
  select distinct r.id,s.registration_no,student_name,0 as BIAmarks1,0 as BIAmarks2,0 as BIAmarks3,r.marks as BIAmarks4,0 as BIAmarks5,0 as BIAmarks6,r.course_id,r.session_month_year
 from result r RIGHT JOIN student s on s.registration_no = r.student_registration_no
  RIGHT JOIN course c on c.id = r.course_id
   RIGHT JOIN subject sb on sb.id = r.subject_id
  and c.type='life'
  and sb.subject_short_name='BIA-9'
    union
  select distinct r.id,s.registration_no,student_name,0 as BIAmarks1,0 as BIAmarks2,0 as BIAmarks3,0 as BIAmarks4,r.marks as BIAmarks5,0 as BIAmarks6,r.course_id,r.session_month_year
 from result r RIGHT JOIN student s on s.registration_no = r.student_registration_no
  RIGHT JOIN course c on c.id = r.course_id
   RIGHT JOIN subject sb on sb.id = r.subject_id
  and c.type='life'
  and sb.subject_short_name='BIA-14(life)'
  union
  select distinct r.id,s.registration_no,student_name,0 as BIAmarks1,0 as BIAmarks2,0 as BIAmarks3,0 as BIAmarks4,0 as BIAmarks5,r.marks as BIAmarks6,r.course_id,r.session_month_year
 from result r RIGHT JOIN student s on s.registration_no = r.student_registration_no
  RIGHT JOIN course c on c.id = r.course_id
   RIGHT JOIN subject sb on sb.id = r.subject_id
  and c.type='life'
  and sb.subject_short_name='BIA-15(life)'
  ) tamp
  where id is not null) tamp1
    where   concat(session_month_year,course_id)='".$session_id."'
  group by registration_no,student_name
     

");

	
		return $query->result();
        }
        
        
          function get_resultsheet($session_id)
        {
             
               

              $query = $this->db->query("
             select registration_no,student_name,sum(BIAmarks1) as BIAmarks1,sum(BIAmarks2)as BIAmarks2,sum(BIAmarks3)as BIAmarks3,sum(BIAmarks4) as BIAmarks4,sum(BIAmarks5) as BIAmarks5 
             ,sum(session_year1) as session_year1 ,sum(session_year2) as session_year2 ,sum(session_year3) as session_year3 ,sum(session_year4) as session_year4 ,sum(session_year5) as session_year5
            from (select *from (
             select distinct r.id,s.registration_no,student_name,r.marks as BIAmarks1,0 as BIAmarks2,0 as BIAmarks3,0 as BIAmarks4,0 as BIAmarks5,r.course_id,r.session_month_year,r.session_year as session_year1,0 as session_year2,0 as session_year3,0 as session_year4,0 as session_year5
 from result r RIGHT JOIN student s on s.registration_no = r.student_registration_no
  RIGHT JOIN course c on c.id = r.course_id
   RIGHT JOIN subject sb on sb.id = r.subject_id
  and c.type='basic'
  and sb.subject_short_name='BIA-1'
  union
  select distinct r.id,s.registration_no,student_name,0 as BIAmarks1,r.marks as BIAmarks2,0 as BIAmarks3,0 as BIAmarks4,0 as BIAmarks5,r.course_id,r.session_month_year,0 as session_year1,r.session_year as session_year2,0 as session_year3,0 as session_year4,0 as session_year5
 from result r RIGHT JOIN student s on s.registration_no = r.student_registration_no
  RIGHT JOIN course c on c.id = r.course_id
   RIGHT JOIN subject sb on sb.id = r.subject_id
  and c.type='basic'
  and sb.subject_short_name='BIA-2'

  union
  select distinct r.id,s.registration_no,student_name,0 as BIAmarks1,0 as BIAmarks2,r.marks as BIAmarks3,0 as BIAmarks4,0 as BIAmarks5,r.course_id,r.session_month_year,0 as session_year1,0 as session_year2,r.session_year as session_year3,0 as session_year4,0 as session_year5
 from result r RIGHT JOIN student s on s.registration_no = r.student_registration_no
  RIGHT JOIN course c on c.id = r.course_id
   RIGHT JOIN subject sb on sb.id = r.subject_id
  and c.type='basic'
  and sb.subject_short_name='BIA-3'
   union
  select distinct r.id,s.registration_no,student_name,0 as BIAmarks1,0 as BIAmarks2,0 as BIAmarks3,r.marks as BIAmarks4,0 as BIAmarks5,r.course_id,r.session_month_year,0 as session_year1,0 as session_year2,0 as session_year3,r.session_year as session_year4,0 as session_year5
 from result r RIGHT JOIN student s on s.registration_no = r.student_registration_no
  RIGHT JOIN course c on c.id = r.course_id
   RIGHT JOIN subject sb on sb.id = r.subject_id
  and c.type='basic'
  and sb.subject_short_name='BIA-4'
    union
  select distinct r.id,s.registration_no,student_name,0 as BIAmarks1,0 as BIAmarks2,0 as BIAmarks3,0 as BIAmarks4,r.marks as BIAmarks5,r.course_id,r.session_month_year,0 as session_year1,0 as session_year2,0 as session_year3,0 as session_year4,r.session_year as session_year5
 from result r RIGHT JOIN student s on s.registration_no = r.student_registration_no
  RIGHT JOIN course c on c.id = r.course_id
   RIGHT JOIN subject sb on sb.id = r.subject_id
  and c.type='basic'
  and sb.subject_short_name='BIA-5') tamp
  where id is not null) tamp1

     
  group by registration_no,student_name
     

");
 // where   concat(session_month_year,course_id)='".$session_id."'
	
		return $query->result();
        }
        
        
        
	function get_company()
        {
            $this->db->order_by('company_name','asc');
		$query = $this->db->get('company');
		return $query->result();
        }
	
	
	
	
	
        
	
	
	
	
}
