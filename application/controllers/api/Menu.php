<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */
require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';


class Menu extends REST_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('template_helper'));
		$this->load->library(array('form_validation', 'session'));
		$this->load->model('Custom_model');
	}

	public function index_post()
	{ 
		$post = $this->input->post(NULL, TRUE);

		if (!empty($post['id_toko'])) 
		{
			$kat = null;
			$subkat = null;
			$search = null;

			if (!empty($post['kategori'])) 
			{
				$kat = $post['kategori'];
			}
			if (!empty($post['sub_kat'])) 
			{
				$subkat = $post['sub_kat'];
			}
			if (!empty($post['search'])) 
			{
				$search = $post['search'];
			}

			$menu = $this->Custom_model->getproduk($post['id_toko'], $search, $kat, $subkat);

			$this->response([
	        	'data' => $menu
			], \Restserver\Libraries\REST_Controller::HTTP_OK);
		}
		else
		{
			$this->response([
	        	'message' => 'error'
			], \Restserver\Libraries\REST_Controller::HTTP_OK);
		}
	}

	public function detail_post()
	{
		$post = $this->input->post(NULL, TRUE);

		if (!empty($post['id_menu'])) 
		{
			$getdetail = $this->Custom_model->getdetail('tbl_menu', array('id_menu' => $post['id_menu']));
			if (!empty($getdetail)) 
			{
				$getdetail->nama_kategori = $this->Custom_model->getdetail('tbl_kategori_menu', array('id_kategori_menu' => $getdetail->id_kategori))->nama_kategori_menu;
				$getdetail->nama_sub_kategori = $this->Custom_model->getdetail('tbl_sub_kategori_menu', array('id_sub_kategori_menu' => $getdetail->id_sub_kategori))->nama_sub_kategori_menu;

				$this->response([
		        	'data' => $getdetail
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