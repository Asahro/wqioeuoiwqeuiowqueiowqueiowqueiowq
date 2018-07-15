<?php
defined('BASEPATH') OR exit('No direct script access allowed');
session_start();

class Login extends CI_Controller {
	
	public function halamanlogin(){
		$this->load->view('login/login');
	}
	public function ceklogin (){
		redirect(base_url()."profil-siswa");
	}
	public function register(){
		$this->load->view('login/register');
	}
	public function cekregister (){

	}
	public function verifikasiregister(){
		$this->load->view('login/lupapassword');
	}
	public function lupapassword(){
		$this->load->view('login/lupapassword');
	}	
	public function verifikasilupapassword(){

	}
	public function verifikasilupa(){
		$this->load->view('login/lupapassword');
	}







	
}