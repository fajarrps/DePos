<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {

	public function index()
	{
		$this->load->view('index');
	}

	public function detail()
	{
		$this->load->view('home/detail');
	}
}