<?php 

class Student_model extends CI_Model
{
	public function get_all_students()
	{
		$this->db->select('first_name, last_name, email, roll_no');
		$this->db->from('users');
		$this->db->join('users_groups', 'users.id = users_groups.user_id');
		$this->db->where('users_groups.group_id', '2');
		return $this->db->get();
	}
}