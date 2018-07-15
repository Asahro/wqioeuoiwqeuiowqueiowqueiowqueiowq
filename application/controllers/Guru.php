<?php
defined('BASEPATH') OR exit('No direct script access allowed');
session_start();

class Guru extends CI_Controller {
	public function profil(){
		$this->load->view('guru/profil');
	}

	public function absensiswa($id=""){
		$this->load->view('guru/absensiswa');
	}

}