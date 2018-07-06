<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tampilan_umum extends CI_Controller {

	//tampilan
	public function index()  // tampilan pembuka
	{
		$this->load->view('welcome_message');
	}
}
