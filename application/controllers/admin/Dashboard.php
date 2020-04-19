<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Admin {

	public function index()
	{
		$this->load->view('admin/index');
	}

	public function insert_admin()
	{
		$data_user_baru = array
						(
							'id_restoran' => 0,
							'username_admin' => 'admin_pos',
							'password_admin' => password_hash("password_pos", PASSWORD_BCRYPT),
							'nama_admin' => 'Noire',
							'tgl_mulai' => '0000-00-00',
							'foto_admin' => '-',
							'level_admin' => 'super_admin',
							'status_admin' => 'AKTIF'
						);
		$this->Custom_model->insert('tbl_admin', $data_user_baru);
	}
}