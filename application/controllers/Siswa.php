<?php
defined('BASEPATH') OR exit('No direct script access allowed');
session_start();

class Siswa extends CI_Controller {
	public function profil(){
		$this->load->view('siswa/profil');
	}
	public function pesanbimbel(){
		$this->load->view('siswa/pesanbimbel');
	}
	public function tambahpesanbimbel(){
		$this->load->view('siswa/tambahpesanbimbel');
	}
	public function ubahpesanan(){
		$this->load->view('siswa/ubahpesanan');
	}
	public function updatepesananbimbel(){
		$this->load->view('siswa/updatepesananbimbel');
	}
	public function batalpesan(){
		$this->load->view('siswa/batalpesan');
	}
	public function jadwalbimbel(){
		$this->load->view('siswa/jadwalbimbel');
	}
	public function hapusjadwalbimbel(){
		$this->load->view('siswa/hapusjadwalbimbel');
	}
	public function riwayatbimbel(){
		$this->load->view('siswa/riwayatbimbel');
	}
	public function biodatapengajar(){
		$this->load->view('siswa/biodatapengajar');
	}
}