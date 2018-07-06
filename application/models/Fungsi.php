<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Fungsi extends CI_Model {

	// login siswa
	public function proses_login_siswa($value='')
	{
		$id = $_POST['id'];
		if(preg_match('/^([A-Za-z][A-Za-z0-9\-\.\_]*)\@([A-Za-z][A-Za-z0-9\-\_]*)(\.[A-Za-z][A-Za-z0-9\-\_]*)+$/',$_POST['id'])){
			$ambil = $this->db->query("SELECT * FROM `siswa` WHERE email = '$id'");  // sintak request data
			$data = $ambil->result_array();
			if(count($data)){
				if($_POST['password'] ==	$data[0]['password']){
					return true;
				}else{
					return false;
				}
			}else{
				return false;
			}
		}elseif (preg_match('/^([0-9]*)$/',$_POST['id'])) {
			$ambil = $this->db->query("SELECT * FROM `siswa` WHERE hp = '$id'");  // sintak request data
			$data = $ambil->result_array();
			if(count($data)){
				if($_POST['password'] ==	$data[0]['password']){
					return true;
				}else{
					return false;
				}
			}else{
				return false;
			}
		}
	}

	public function Ambil_Data($namatabel, $yangmana = ""){  // fungsi mengambil data
		$data = $this->db->query('select * from '.$namatabel.$yangmana);  // sintak request data
		return $data ->result_array();	// kirim ke peminta
	}

	public function Tambah_Data($namatabel, $data){	
		$hasil = $this->db->insert( $namatabel, $data);
		return $hasil;
	}

	public function Ubah_Data($namatabel, $data, $yangmana){
		$hasil = $this->db->update($namatabel, $data, $yangmana);
		return $hasil;
	}

	public function Hapus_Data($namatabel, $yangmana){
		$hasil = $this->db->delete($namatabel, $yangmana);
		return $hasil;
	}
}
