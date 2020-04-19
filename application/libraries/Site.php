<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Site{
	public $template;
	public $template_setting;
	public $website_setting;
	public $_isHome = FALSE;
	public $_isCategory = FALSE;
	public $_isSearch = FALSE;
	public $_isDetail = FALSE;

	function is_logged_in(){
		$_this =& get_instance();

		$user_session = $_this->session->userdata;

			if($_this->uri->segment(1) == 'login'){
				if(isset($user_session['logged_in_pos']) && $user_session['logged_in_pos'] == TRUE)
				{
					redirect(base_url('admin/dashboard'));
				}
			}
			else{
				if(!isset($user_session['logged_in_pos'])){
					redirect(base_url('login'));
				}
			}
	}

	function super_admin_only()
	{
		$_this =& get_instance();
		$user_session = $_this->session->userdata;

		if ($user_session['level_admin'] != 'super_admin') 
		{
			redirect(base_url('dashboard'));
		}
	}

	function admin_trans_only($id)
	{
		$_this =& get_instance();
		$user_session = $_this->session->userdata;

		$getdata = $_this->Transaksi_model->get($id, TRUE);
		if ($user_session['id_admin'] != $getdata->id_admin) 
		{
			redirect(set_url('dashboard'));
		}
	}
}