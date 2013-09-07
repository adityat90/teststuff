<?php

class Admin extends CI_Controller
{
	function index()
	{
		if(!$this->ion_auth->logged_in() || !$this->ion_auth->in_group('admin'))
		{
			redirect('home');
		}

		$data['page_title'] = 'Admin Panel | Home';

		$this->load->view('admin/admin_header', $data);
		$this->load->view('admin/admin_navbar');
		$this->load->view('admin/admin_main_content');
		$this->load->view('admin/admin_footer');
	}

	function students()
	{
		if(!$this->ion_auth->logged_in() || !$this->ion_auth->in_group('admin'))
		{
			redirect('home');
		}

		$this->load->model('Student_model');

		$data['student_details'] = $this->Student_model->get_all_students();
		$data['page_title'] = 'Admin Panel | Home';

		$this->load->view('admin/admin_header', $data);
		$this->load->view('admin/admin_navbar');
		$this->load->view('admin/admin_students_content');
		$this->load->view('admin/admin_footer');
	}
}