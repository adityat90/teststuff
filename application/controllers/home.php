<?php 

class Home extends CI_Controller
{
	public function index()
	{
		if(!$this->ion_auth->logged_in())
		{
			redirect('login');
		}

		$this->load->model('Home_model');

		$data['my_schedule'] = $this->Home_model->get_all_interviews($this->ion_auth->user()->row()->id);

		$data['page_title'] = 'Home | '.$this->ion_auth->user()->row()->first_name." ".$this->ion_auth->user()->row()->last_name;
		
		$this->load->view('header', $data);
		$this->load->view('navbar');
		$this->load->view('home_content', $data);
		$this->load->view('footer');
	}
}