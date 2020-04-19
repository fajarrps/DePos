<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Custom_model extends MY_Model {

	public $rules_admin = array
					(
						'username_admin' => array
									(
										'field' => 'username_admin',
										'label' => 'Username',
										'rules' => 'trim|required'
									),
						'password_admin' => array
									(
										'field' => 'password_admin',
										'label' => 'Password',
										'rules' => 'trim|required|callback_password_check'
									)
					);

	public function __construct()
	{
		parent::__construct();
	}

	public function getdata($table, $where = NULL, $limit = NULL, $offset = NULL, $single = FALSE, $select = NULL)
	{
		if ($where != NULL) 
		{
			return $this->get_by($table, $where, $limit, $offset, $single, $select);
		}
		else
		{
			return $this->get($table);
		}
	}

	public function getdetail($table, $where)
	{
		return $this->get($table, $where, TRUE);
	}

	public function insertdata($table, $data, $affected=FALSE,$batch=FALSE)
	{
		return $this->insert($table, $data, $affected, $batch);
	}

	public function updatedata($table, $data, $where, $batch=false)
	{
		return $this->update($table, $data, $where, $batch);
	}

	public function deletedata($table, $where)
	{
		return $this->delete_by($table, $where);
	}

	public function countdata($table, $where)
	{
		return $this->count($table, $where);
	}

	//////////////////////// HOSPITAL GET /////////////////////////////////////

	public function getrestoran()
	{
		$this->db->select('
							tbl_restoran.id_restoran,
							tbl_restoran.nama_restoran,
							tbl_restoran.alamat_restoran,
							tbl_restoran.tgl_terdaftar_restoran,
							tbl_restoran.status_restoran,
							tbl_kategori_restoran.nama_kategori_restoran,
							provinsi.nama_provinsi,
							kab_kota.nama_kab_kota
						');
		$this->db->from('tbl_restoran');
		$this->db->join('tbl_kategori_restoran', 'tbl_restoran.id_kategori_restoran = tbl_kategori_restoran.id_kategori_restoran');
		$this->db->join('provinsi', 'tbl_restoran.id_provinsi_restoran = provinsi.id_provinsi');
		$this->db->join('kab_kota', 'tbl_restoran.id_kab_kota_restoran = kab_kota.id_kab_kota');
		$query = $this->db->get();
		return $query->result();
	}

	public function getproduk($id_restoran, $search, $kategori, $sub_kategori)
	{
		$this->db->select('id_menu, nama_menu, harga_menu, diskon_menu, foto_menu');
		$this->db->from('tbl_menu');

		$this->db->where('id_restoran', $id_restoran);
		$this->db->where('status_menu', 'aktif');
		if ($search != null) 
		{
			$this->db->like('nama_menu', $search);
		}
		if ($kategori != null) 
		{
			$this->db->where('id_kategori', $kategori);
		}
		if ($sub_kategori != null) 
		{
			$this->db->where('id_sub_kategori', $sub_kategori);
		}

		$query = $this->db->get();
		return $query->result();
	}

	public function insertplusfoto($data, $input, $totalmeja = null)
	{
		$this->db->trans_start();
			global $SConfig;
			$this->load->library('upload');
			if ($data == 'admin') 
			{
				$id = $this->insertdata('tbl_admin', $input);
				$config['file_name'] = $id."-".$input['username_admin'];
				$config['upload_path'] = './uploads/admin/';
			}
			elseif($data == 'menu')
			{
				$id = $this->insertdata('tbl_menu', $input);
				mkdir('./uploads/menu/'.$id);
				$config['file_name'] = $this->sess['id_restoran']."-".$id;
				$config['upload_path'] = './uploads/menu/'.$this->sess['id_restoran'];
			}
			elseif($data == 'restaurant')
			{
				$id = $this->insertdata('tbl_restoran', $input);
				mkdir('./uploads/data/restaurant/'.$id);
				$config['file_name'] = $id;
				$config['upload_path'] = './uploads/data/restaurant/'.$id;
			}
			$config['allowed_types'] = 'jpg|jpeg|png';

			//MENGUPLOAD FOTO
			$this->upload->initialize($config);
			if ($this->upload->do_upload('foto')) 
			{
				$error = 0;
				$gbr = $this->upload->data();
                //Compress Image
                $config['image_library']='gd2';
                if ($data == 'admin') 
                {
                	$config['source_image']='./uploads/admin/'.$gbr['file_name'];
                	$config['new_image']= './uploads/admin/'.$gbr['file_name'];
                	$link_file = $SConfig->_site_url.'/uploads/admin/'.$config['file_name'].'.'.get_ext($_FILES['foto']["name"]);
					$this->updatedata('tbl_admin', array('foto_admin' => $link_file), array('id_admin' => $id));
                }
                if ($data == 'menu') 
                {
                	$config['source_image']='./uploads/menu/'.$this->sess['id_restoran'].'/'.$gbr['file_name'];
                	$config['new_image']= './uploads/menu/'.$this->sess['id_restoran'].'/'.$gbr['file_name'];
                	$link_file = $SConfig->_site_url.'/uploads/menu/'.$this->sess['id_restoran'].'/'.$config['file_name'].'.'.get_ext($_FILES['foto']["name"]);
					$this->updatedata('tbl_menu', array('foto_menu' => $link_file), array('id_menu' => $id));
                }
                if ($data == 'restaurant') 
                {
                	$config['source_image']='./uploads/data/restaurant/'.$id.'/'.$gbr['file_name'];
                	$config['new_image']= './uploads/data/restaurant/'.$id.'/'.$gbr['file_name'];
                	$link_file = $SConfig->_site_url.'/uploads/data/restaurant/'.$id.'/'.$config['file_name'].'.'.get_ext($_FILES['foto']["name"]);
					$this->insertdata('tbl_restoran_foto', array('id_restoran' => $id, 'data_foto' => $link_file, 'profil_foto' => 1, 'tgl_edit' => date('Y-m-d H:i:S')));

					$meja = array();
	                $arr = 0;
	                for ($i=1; $i <= $totalmeja; $i++) 
	                { 
	                	$meja[$arr] = array
	                				(
	                					'id_restoran' => $id,
	                					'meja_ke' => $i,
	                					'status_meja' => 'empty'
	                				);
	                	$arr += 1;
	                }
	                $this->insertdata('tbl_restoran_meja', $meja, false, true);
                }

                $config['create_thumb']= FALSE;
                $config['maintain_ratio']= TRUE;
                $config['quality']= '90%';
                $config['width']= 600;
                $config['height']= 600;
                
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();
			}
			else
			{
				$error = 1;
				$upl = $this->upload->display_errors();
			}
			

		$this->db->trans_complete();
		if ($this->db->trans_status() === FALSE)
		{
			$this->db->trans_rollback();
			return $upl;
		}
		elseif ($error == 1) 
		{
			$this->db->trans_rollback();
			return $upl;
		}
		else
		{
			$this->db->trans_commit();
			return TRUE;
		}
	}

	public function inserttransaction($inserttrans, $inserttransisi, $totalharga)
	{
		$this->db->trans_start();

			$idtrans = $this->insertdata('tbl_transaksi', $inserttrans);

			foreach ($inserttransisi as $key => $value) 
			{
				$inserttransisi[$key]['id_transaksi'] = $idtrans;
			}

			$this->insertdata('tbl_transaksi_isi', $inserttransisi, FALSE, TRUE);

			$this->updatedata('tbl_transaksi', array('total_harga_transaksi' => $totalharga), array('id_transaksi' => $idtrans));
			$this->updatedata('tbl_restoran_meja', array('status_meja' => 'diisi'), array('id_restoran' => $inserttrans['id_restoran'], 'meja_ke' => $inserttrans['meja_ke']));

		if ($this->db->trans_status() === FALSE)
		{
			$this->db->trans_rollback();
			return FALSE;
		}
		else
		{
			$this->db->trans_commit();
			return TRUE;
		}
	}
}