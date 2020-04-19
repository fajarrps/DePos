<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */
require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';


class Kategori extends REST_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('template_helper'));
		$this->load->library(array('form_validation', 'session'));
		$this->load->model('Custom_model');
	}

	public function index_get()
	{ 
		$getkategori = $this->Custom_model->getdata('tbl_kategori_menu');
		if (!empty($getkategori)) 
		{
			$this->response([
	        	'data' => $getkategori
			], \Restserver\Libraries\REST_Controller::HTTP_OK);
		}
		else
		{
			$this->response([
	        	'message' => 'error'
			], \Restserver\Libraries\REST_Controller::HTTP_OK);
		}
	}

	public function sub_kat_post()
	{
		$post = $this->input->post(NULL, TRUE);
		if (!empty($post['id_kategori_menu'])) 
		{
			$getsubkategori = $this->Custom_model->getdata('tbl_sub_kategori_menu', array('id_kategori_menu' => $post['id_kategori_menu']));
			if (!empty($getsubkategori)) 
			{
				$this->response([
		        	'data' => $getsubkategori
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