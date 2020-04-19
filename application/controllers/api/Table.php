<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */
require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';


class Table extends REST_Controller
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
		$get = $this->input->get(NULL, TRUE);

		if (!empty($get['id_toko'])) 
		{
			$gettable = (array) $this->Custom_model->getdata('tbl_toko_meja', array('id_toko' => $get['id_toko']));
			foreach ($gettable as $key => $value) 
			{
				$gettable[$key] = (array) $value;
			}
			$sortedlisttable = array_orderby($gettable, 'meja_ke', SORT_ASC);
			if (!empty($gettable)) 
			{
				$this->response([
                	'data' => $sortedlisttable
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