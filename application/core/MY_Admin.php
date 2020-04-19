<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Admin extends MY_Controller{

	function __construct()
	{
		parent::__construct();
		$this->site->is_logged_in();

		$this->cek_sess = $this->session->userdata;

		if (!empty($this->cek_sess['logged_in_pos'])) 
		{
			$this->sess = $this->session->userdata;
		}
	}
}