<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Company_model extends CI_Model
{
	public function get_company_schedule($company_id)
	{
		$this->db->select("users.first_name as 'First_Name', users.last_name as 'Last_Name', companies.id as 'Company_ID', companies.company_name as 'Company_Name', companies.description as 'Company_Description', companies.website as 'Company_Website', companies.attachment as 'Job_Description', interviews.date as 'Interview_Date'");
		$this->db->from('users');
		$this->db->join('interviews', 'users.id = interviews.user');
		$this->db->join('companies', 'companies.id = interviews.company');
		$this->db->where('companies.id', $company_id);
		$this->db->order_by('interviews.date', 'DESC');

		return $this->db->get();
	}

	public function get_company_name($company_id)
	{
		$this->db->select('*');
		$this->db->from('companies');
		$this->db->where('companies.id', $company_id);
		return $this->db->get();
	}

	public function get_all_companies()
	{
		$this->db->select('*');
		$this->db->from('companies');
		return $this->db->get();
	}


	public function get_company($company_name)
	{
		$this->db->select('*');
		$this->db->from('companies');
		$this->db->like('companies.company_name', $company_name);
		$this->db->or_like('companies.description', $company_name);
		return $this->db->get();
	}
}