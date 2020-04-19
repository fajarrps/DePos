<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Admin {

	protected $post_detail;
	protected $user_detail;

	public $rules = array
					(
						'username' => array
									(
										'field' => 'username_login',
										'label' => 'Username',
										'rules' => 'trim|required'
									),
						'password' => array
									(
										'field' => 'password_login',
										'label' => 'Password',
										'rules' => 'trim|required|callback_password_check'
									)
					);

	public function index()
	{
		$post = $this->input->post(NULL, TRUE);

		if (!empty($post['username_login']) && !empty($post['password_login'])) 
		{
			$this->post_detail = $post;

			$this->user_detail = $this->Custom_model->getdetail('tbl_admin', array('username_admin' => $post['username_login']));

			$this->form_validation->set_message('required', '%s kosong, tolong diisi');

			$rules = $this->rules;
			$this->form_validation->set_rules($rules);

			if ($this->form_validation->run() == TRUE) 
			{
				$logindata = array
						(
							'id_admin' => $this->user_detail->id_admin,
							'id_restoran' => $this->user_detail->id_restoran,
							'nama_admin' => $this->user_detail->nama_admin,
							'username_admin' => $post['username_login'],
							'level_admin' => $this->user_detail->level_admin,
							'logged_in_pos' => TRUE,
							'foto_admin' => $this->user_detail->foto_admin,
						);
				$this->session->set_userdata($logindata);
				redirect(base_url('admin'));
			}
			else
			{
				$this->load->view('admin/login');
			}
		}
		else
		{
			$this->load->view('admin/login');
		}
	}

	//cek password benar atau tidak
	public function password_check($str)
	{
		$user_detail = $this->user_detail;
		$post_detail = $this->post_detail;
		if (password_verify($post_detail['password_login'], @$user_detail->password_admin)) 
		{
			if (@$user_detail->status_admin == "aktif") 
			{
				return TRUE;
			}
			else
			{
				$this->form_validation->set_message('password_check', 'Maaf, Anda tidak berhak login');
				return FALSE;
			}
		}
		else if (!password_verify($post_detail['password_login'], @$user_detail->password_admin)) 
		{
			$this->form_validation->set_message('password_check', 'Password Salah');
			return FALSE;
		}
		else
		{
			$this->form_validation->set_message('password_check', 'Tidak memiliki hak akses');
			return FALSE;
		}
	}
}