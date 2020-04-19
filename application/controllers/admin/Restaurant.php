<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Restaurant extends MY_Admin {

	public function index()
	{
		$post = $this->input->post(NULL, TRUE);

		if (!empty($post['nama_restoran'])) 
		{
			$insert = array
					(
						'nama_restoran' => $post['nama_restoran'],
						'alamat_restoran' => $post['alamat_restoran'],
						'telepon_restoran' => $post['telepon_restoran'],
						'deskripsi_restoran' => $post['deskripsi'],
						'id_kategori_restoran' => $post['id_kategori'],
						'id_provinsi_restoran' => $post['id_provinsi'],
						'id_kab_kota_restoran' => $post['id_kab_kota'],
						'tgl_terdaftar_restoran' => date('Y-m-d H:i:s'),
						'status_restoran' => 'aktif'
					);
			$dbsuccess = $this->Custom_model->insertplusfoto('restaurant', $insert, $post['meja_restoran']);

			if ($dbsuccess == FALSE) 
			{
				echo "Error";
			}
			else
			{
				mkdir('./uploads/data/restaurant/'.$dbsuccess);

				$this->session->set_flashdata('flash', 'Restoran');
				echo "<script>
				window.location.href='".base_url("admin/restaurant/")."';
				</script>";
			}
		}
		else
		{
			$data = array
				(
					'listrestoran' => $this->Custom_model->getrestoran(),

					'listkategorirestoran' => $this->Custom_model->getdata('tbl_kategori_restoran'),
					'listprovinsi' => $this->Custom_model->getdata('provinsi'),
					'listkabkota' => $this->Custom_model->getdata('kab_kota', array('id_provinsi' => 1))
				);
			$this->load->view('admin/restaurant/restaurant-list', $data);
		}
	}

	public function detail($id_restoran)
	{
		$post = $this->input->post(NULL, TRUE);

		if (!empty($post['nama_admin'])) 
		{
			global $SConfig;
			$insert = array
					(
						'id_restoran' => $id_restoran,
						'username_admin' => strtolower($post['username']),
						'password_admin' => password_hash($post['password'], PASSWORD_BCRYPT),
						'nama_admin' => $post['nama_admin'],
						'tgl_mulai' => date('Y-m-d H:i:s'),
						'foto_admin' => '',
						'level_admin' => $post['level_admin'],
						'status_admin' => 'aktif'
					);
			if (empty($_FILES['foto']["name"])) 
			{
				$dbsuccess = $this->Custom_model->insertdata('tbl_admin', $insert);
			}
			else
			{
				$dbsuccess = $this->Custom_model->insertplusfoto('admin', $insert);
			}

			if ($dbsuccess == true) 
			{
				echo $dbsuccess;
			}
			else
			{
				echo "fail";
			}
		}
		else
		{
			$detail = $this->Custom_model->getdetail('tbl_restoran', array('id_restoran' => $id_restoran));
			$detail->meja_restoran = $this->Custom_model->count('tbl_restoran_meja', array('id_restoran' => $id_restoran));
			$detail->kategori_restoran = ucwords($this->Custom_model->getdetail('tbl_kategori_restoran', array('id_kategori_restoran' => $detail->id_kategori_restoran))->nama_kategori_restoran);
			$detail->nama_kategori_restoran = $this->Custom_model->getdetail('tbl_kategori_restoran', array('id_kategori_restoran' => $detail->id_kategori_restoran))->nama_kategori_restoran;
			$detail->nama_provinsi = $this->Custom_model->getdetail('provinsi', array('id_provinsi' => $detail->id_provinsi_restoran))->nama_provinsi;
			$detail->nama_kab_kota = $this->Custom_model->getdetail('kab_kota', array('id_kab_kota' => $detail->id_kab_kota_restoran))->nama_kab_kota;
			$detail->foto_profil = $this->Custom_model->getdetail('tbl_restoran_foto', array('profil_foto' => 1))->data_foto;

			$listuser = $this->Custom_model->getdata('tbl_admin', array('id_restoran' => $id_restoran));
			$listmenu = $this->Custom_model->getdata('tbl_menu', array('id_restoran' => $id_restoran));

			$data = array
					(
						'detail' => $detail,
						'listuser' => $listuser,
						'listmenu' => $listmenu,
						
						'listkategori' => $this->Custom_model->getdata('tbl_kategori_menu'),
						'listsubkategori' => $this->Custom_model->getdata('tbl_sub_kategori_menu', array('id_kategori_menu' => 1)),
						'listprovinsi' => $this->Custom_model->getdata('provinsi')
					);
			// var_dump($this->Custom_model->getdata('tbl_kategori_menu'));
			$this->load->view('admin/restaurant/restaurant-detail', $data);
		}
	}
}