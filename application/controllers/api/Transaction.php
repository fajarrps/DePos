<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */
require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';


class Transaction extends REST_Controller
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
			$totalharga = 0;
			$data = array
					(
						'id_toko' => $post['id_toko'],
						'meja_ke' => $post['meja_ke'],
						'total_harga_transaksi' => $totalharga,
						'tgl_transaksi' => date('Y-m-d H:i:s'),
						'status_transaksi' => 'proses'
					);

			$dataisi = array();
			foreach ($post['id_menu'] as $key => $value) 
			{
				$datapermenu = $this->Custom_model->getdetail('tbl_menu', array('id_menu' => $value));
				$hargadiskon = $datapermenu->harga_menu * ($datapermenu->diskon_menu / 100);
				$hargafix = ($datapermenu->harga_menu - $hargadiskon) * $post['quantity'][$key];

				$totalharga += $hargafix;

				$dataisi[$key] = array
						(
							'id_transaksi' => 0,
							'id_menu' => $value,
							'quantity' => $post['quantity'][$key],
							'harga_menu' => $datapermenu->harga_menu,
							'diskon_menu' => $datapermenu->diskon_menu,
							'total_harga_isi' => $hargafix
						);
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