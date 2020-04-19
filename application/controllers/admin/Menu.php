<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends MY_Admin {

	public function index()
	{
		$post = $this->input->post(NULL, TRUE);

		if (!empty($post['nama_menu'])) 
		{
			$insert = array
					(
						'id_restoran' => $this->sess['id_restoran'],
						'nama_menu' => $post['nama_menu'],
						'id_kategori' => $post['id_kategori'],
						'id_sub_kategori' => $post['id_sub_kategori'],
						'id_provinsi' => $post['id_provinsi'],
						'id_kab_kota' => $post['id_kab_kota'],
						'harga_menu' => rupiah_to_sql($post['harga']),
						'diskon_menu' => $post['diskon'],
						'foto_menu' => 0,
						'tgl_upload_menu' => date('Y-m-d H:i:s'),
						'status_menu' => 'aktif'
					);
			$dbsuccess = $this->Custom_model->insertplusfoto('menu', $insert);

			if ($dbsuccess == TRUE) 
			{
				echo "sukses";
			}
			else
			{
				echo $dbsuccess;
			}
		}
		else
		{
			$listmenu = $this->Custom_model->getdata('tbl_menu', array('id_restoran' => $this->sess['id_restoran']));

			foreach ($listmenu as $key => $value) 
			{
				$listmenu[$key]->namakategori = ucwords($this->Custom_model->getdetail('tbl_kategori_menu', array('id_kategori_menu' => $value->id_kategori))->nama_kategori_menu);
				$listmenu[$key]->namasubkategori = ucwords($this->Custom_model->getdetail('tbl_sub_kategori_menu', array('id_sub_kategori_menu' => $value->id_sub_kategori))->nama_sub_kategori_menu);

				if (empty($listmenu->id_kab_kota)) 
				{
					$listmenu[$key]->namakabkota = '';
				}
				else
				{
					$listmenu[$key]->namakabkota = $this->Custom_model->getdetail('kab_kota', array('id_kab_kota' => $value->id_kab_kota))->nama_kab_kota;
				}
			}

			$data = array
				(
					'listmenu' => $listmenu,

					'listkategori' => $this->Custom_model->getdata('tbl_kategori_menu'),
					'listsubkategori' => $this->Custom_model->getdata('tbl_sub_kategori_menu', array('id_kategori_menu' => 1)),
					'listprovinsi' => $this->Custom_model->getdata('provinsi')
				);

			$this->load->view('admin/menu/menu-list', $data);
		}
	}
}