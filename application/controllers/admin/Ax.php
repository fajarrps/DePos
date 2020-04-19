<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ax extends MY_Admin {

	// ADD SHOP AJAX
	public function getsubkat($id_kategori)
	{
		$data = $this->Custom_model->getdata('tbl_sub_kategori_menu', array('id_kategori_menu' => $id_kategori));
		echo json_encode($data);
	}

	public function getkabkota($id_provinsi)
	{
		$data = $this->Custom_model->getdata('kab_kota', array('id_provinsi' => $id_provinsi));
		echo json_encode($data);
	}
}