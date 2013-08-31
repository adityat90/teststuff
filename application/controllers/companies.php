<?php

class Companies extends CI_Controller
{
	public function search()
	{
		if(!$this->ion_auth->logged_in())
		{
			redirect('login');
		}

		$this->load->model('Company_model');

		$data['company_details'] = $this->Company_model->get_company($this->input->post('company_name'));

		$data['page_title'] = 'Companies | '.$this->input->post('company_name');
		
		$this->load->view('header', $data);
		$this->load->view('navbar');
		$this->load->view('company_content', $data);
		$this->load->view('footer');
	}

	public function index()
	{
		if(!$this->ion_auth->logged_in())
		{
			redirect('login');
		}

		$this->load->model('Company_model');

		$data['company_details'] = $this->Company_model->get_all_companies();

		$data['page_title'] = 'Companies';
		
		$this->load->view('header', $data);
		$this->load->view('navbar');
		$this->load->view('company_content', $data);
		$this->load->view('footer');
	}

	public function company($company_id = 1)
	{
		if(!$this->ion_auth->logged_in())
		{
			redirect('login');
		}

		$this->load->model('Company_model');

		$data['company_name'] = $this->Company_model->get_company_name($company_id);
		
		$data['company_schedule'] = $this->Company_model->get_company_schedule($company_id);

		$cName = "";
		if($data['company_name']->num_rows == 1)
		{
			foreach($data['company_name']->result_array() as $row)
			{
				$cName = $row['company_name'];
			}
		}

		$data['page_title'] = 'Company | '.$cName;
		
		$this->load->view('header', $data);
		$this->load->view('navbar');
		$this->load->view('company_content', $data);
		$this->load->view('footer');
	}
}