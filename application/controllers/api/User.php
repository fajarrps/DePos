<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */
require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';


class User extends REST_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('template_helper'));
		$this->load->library(array('form_validation', 'session'));
		$this->load->model('Custom_model');
	}

	public function login_post()
	{ 
		$post = $this->input->post(NULL, TRUE);

		if (!empty($post['username']) || !empty($post['password'])) 
		{
			$getdetail = $this->Custom_model->getdetail('tbl_admin', array('username_admin' => $post['username']));
			if (!empty($getdetail) && $getdetail->status_admin == 'aktif' && $getdetail->level_admin == 'admin') 
			{
				if (password_verify($post['password'], $getdetail->password_admin)) 
				{
					$this->response([
                		'id_admin' => $getdetail->id_admin,
                		'id_toko' => $getdetail->id_toko,
                		'nama_admin' => $getdetail->nama_admin,
                		'foto_admin' => $getdetail->foto_admin,
                		'level_admin' => $getdetail->level_admin
    				], \Restserver\Libraries\REST_Controller::HTTP_OK);
				}
				else
				{
					$this->response([
                		'message' => 'Password Salah'
    				], \Restserver\Libraries\REST_Controller::HTTP_OK);
				}
			}
			else
			{
				$this->response([
                	'message' => 'Username not Found'
    			], \Restserver\Libraries\REST_Controller::HTTP_OK);
			}

			$dbsuccess = $this->Custom_model->inserttransaction($data, $dataisi, $totalharga);
			if ($dbsuccess == TRUE) 
			{
				$this->response([
                	'message' => 'sukses'
    			], \Restserver\Libraries\REST_Controller::HTTP_OK);
			}
			else
			{
				$this->response([
                	'message' => 'error'
    			], \Restserver\Libraries\REST_Controller::HTTP_OK);
			}
		}
		else
		{
			$this->response([
                'message' => 'error'
    		], \Restserver\Libraries\REST_Controller::HTTP_OK);
		}
	}
}