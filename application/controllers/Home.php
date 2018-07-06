<?php
defined('BASEPATH') OR exit('No direct script access allowed');
session_start();

class Home extends CI_Controller {
	public function index(){
		$this->load->view('index.php');
	}
}
