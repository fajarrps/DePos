<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaction extends MY_Admin {

	public function index()
	{
		$list = (array) $this->Custom_model->getdata('tbl_transaksi', array('id_restaurant' => $this->sess['id_restaurant']));
		foreach ($list as $key => $value) 
		{
			$list[$key] = (array) $value;
		}
		$sortedlist = array_orderby($list, 'tgl_transaksi', SORT_DESC);
		$data = array
				(
					'listtransaksi' => $sortedlist
				);
		$this->load->view('admin/transaction/transaction-list', $data);
	}
}