<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends MY_Admin {

	public function index()
	{
		$this->session->sess_destroy();
		redirect(base_url('login'));
	}
}	