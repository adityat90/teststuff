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

		$this->load->view('admin_header', $data);
		$this->load->view('admin_navbar');
		$this->load->view('admin_main_content');
		$this->load->view('admin_footer');
	}
}