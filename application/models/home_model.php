<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home_model extends CI_Model
{
	public function get_all_interviews($user_id)
	{
		$this->db->select("companies.id as 'Company_ID', companies.company_name as 'Company_Name', companies.description as 'Company_Description', companies.website as 'Company_Website', companies.attachment as 'Job_Description', interviews.date as 'Interview_Date'");
		$this->db->from('users');
		$this->db->join('interviews', 'users.id = interviews.user');
		$this->db->join('companies', 'companies.id = interviews.company');
		$this->db->where('users.id', $user_id);
		$this->db->order_by('interviews.date', 'ASC');

		return $this->db->get();
	}
}