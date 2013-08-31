<?php

class Login extends CI_Controller
{
	private function show_login_view()
	{
		$data['page_title'] = 'Login';
		$this->load->view('header', $data);
		$this->load->view('navbar');
		$this->load->view('login_content', $data);
		$this->load->view('footer');
	}

	public function index()
	{
		if (!$this->ion_auth->logged_in())
		{
			$this->show_login_view();
		}
		else
		{
			redirect('home');
		}
	}

	public function do_login()
	{
		if (!$this->ion_auth->logged_in())
		{
			$this->form_validation->set_rules('username', '<strong>username</strong>', 'required');
			$this->form_validation->set_rules('password', '<strong>password</strong>', 'required');

			if ($this->form_validation->run() == FALSE)
			{
				$this->show_login_view();
			}
			else
			{
				$username = $this->input->post('username');
				$password = $this->input->post('password');
				$rememberme = FALSE;
				if(strcmp($this->input->post('rememberme'), "rememberme") == 0)
				{
					$rememberme = TRUE;
				}
				if($this->ion_auth->login($username, $password, $rememberme))
				{
					redirect('home');
				}
				else
				{
					$this->show_login_view();
					$data['login_errors'] = $this->ion_auth->errors();
				}
			}
		}
		else
		{
			redirect('home');
		}
	}

	public function logout()
	{
		$this->ion_auth->logout();
		redirect('login');		
	}

	public function do_registration()
	{
		if (!$this->ion_auth->logged_in())
		{
			$this->form_validation->set_rules('username', '<strong>username</strong>', 'required|is_unique[users.username]');
			$this->form_validation->set_rules('password', '<strong>password</strong>', 'required');
			$this->form_validation->set_rules('repeat-password', '<strong>repeated password</strong>', 'required|matches[password]');
			$this->form_validation->set_rules('first-name', '<strong>first name</strong>', 'required');
			$this->form_validation->set_rules('last-name', '<strong>last name</strong>', 'required');
			$this->form_validation->set_rules('email', '<strong>email</strong>', 'required|valid_email|is_unique[users.email]');
			$this->form_validation->set_rules('roll-no', '<strong>roll number</strong>', 'required|is_natural_no_zero');
			
			if($this->form_validation->run()==FALSE)
			{
				$data['page_title'] = 'Sign Up';
				$this->load->view('header', $data);
				$this->load->view('navbar');
				$this->load->view('registration_content', $data);
				$this->load->view('footer');
			}
			else
			{			
				if(!$this->ion_auth->logged_in())
				{
					$username = $this->input->post('username');
					$password = $this->input->post('password');
					$email = $this->input->post('email');
					$additional_data = array(
						'first_name' => $this->input->post('first-name'),
						'last_name' => $this->input->post('last-name'),
						'roll_no' => $this->input->post('roll-no'),
						);
					$group = array('2');

					if($this->ion_auth->register($username, $password, $email, $additional_data, $group))
					{
						redirect('login');
					}
					else
					{
						$data['page_title'] = 'Sign Up';
						$this->load->view('header', $data);
						$this->load->view('navbar');
						$this->load->view('registration_content', $data);
						$this->load->view('footer');
					}
				}
				else
				{
					redirect('home');
				}
			}
		}
		else
		{
			redirect('home');
		}	
	}

	public function registration()
	{
		if (!$this->ion_auth->logged_in())
		{
			$data['page_title'] = 'Sign Up';
			$this->load->view('header', $data);
			$this->load->view('navbar');
			$this->load->view('registration_content', $data);
			$this->load->view('footer');
		}
		else
		{
			redirect('home');
		}
	}

	public function register()
	{
		if (!$this->ion_auth->logged_in())
		{
			
			$username = 'aditya';
			$password = 'newpass';
			$email = 'adityat90@gmail.com';
			$additional_data = array(
									'first_name' => 'Aditya',
									'last_name' => 'Talpade',
									);								
			$group = array('1'); // Sets user to admin. No need for array('1', '2') as user is always set to member by default

			$this->ion_auth->register($username, $password, $email, $additional_data, $group);
		}
	}
}