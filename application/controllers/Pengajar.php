<?php
defined('BASEPATH') OR exit('No direct script access allowed');
session_start();

class Pengajar extends CI_Controller {

	public function loginpengajar(){			
		$this->load->view('pengajar/login');
	}

	
	public function login_pengajar(){
		//------------------------------------------------------------------------------------------------ formula hapus data waktu
		date_default_timezone_set('Asia/Jakarta');
		$waktu_sekarang = date('Y', time())*1000000+date('m', time())*10000+date('d', time())*100+date('H', time());

		$ambil = $this->fungsi->Ambil_Data('data_jadwal');
		for ($i=0; $i < count($ambil); $i++) { 
			if( $ambil[$i]["Kode_Waktu"] < $waktu_sekarang){
				$tambah = array( 
						"Pencarian" 				=> $ambil[$i]['Pencarian'],
						"Kode_Reservasi"			=> $ambil[$i]['Kode_Reservasi'],
						"Hari_Tanggal" 				=> $ambil[$i]['Hari_Tanggal'],
						"Materi"					=> $ambil[$i]['Materi'],
						"Kelompok"					=> $ambil[$i]['Kelompok'],
						"Jam"						=> $ambil[$i]['Jam'],
						"Kelas"						=> $ambil[$i]['Kelas'],
						"Kriteria_Pengajar"			=> $ambil[$i]['Kriteria_Pengajar'],
						"No_Pengajar"				=> $ambil[$i]['No_Pengajar'],
						"Nama_Pengajar"				=> $ambil[$i]['Nama_Pengajar'],
						"Hp_Pengajar"				=> $ambil[$i]['Hp_Pengajar'],
						"Kode_Waktu"				=> $ambil[$i]['Kode_Waktu']
						);

				$tambah_data = $this->fungsi->Tambah_Data('data_riwayat', $tambah);
				$where = array( 
						"Pencarian" 				=> $ambil[$i]['Pencarian']
								);
				$Hapus = $this->fungsi->Hapus_Data('data_jadwal', $where);
			}
		}

		$hasil = $this->fungsi->Ambil_Data('data_reservasi_reguler');
		for ($i=0; $i < count($hasil); $i++) { 
			if( $hasil[$i]["Kode_Waktu"] < $waktu_sekarang){
				$where = array( 
								"Kode_Waktu" => 	$hasil[$i]["Kode_Waktu"]
								);
				$hasil2 = $this->fungsi->Hapus_Data('data_reservasi_reguler', $where);
			}
		}

		$hasil = $this->fungsi->Ambil_Data('data_reservasi_sbmptn');
		for ($i=0; $i < count($hasil); $i++) { 
			if( $hasil[$i]["Kode_Waktu"] < $waktu_sekarang){
				$where = array( 
								"Kode_Waktu" => 	$hasil[$i]["Kode_Waktu"]
								);
				$hasil2 = $this->fungsi->Hapus_Data('data_reservasi_sbmptn', $where);
			}
		}

		$hasil = $this->fungsi->Ambil_Data('data_reservasi');
		for ($i=0; $i < count($hasil); $i++) { 
			if( $hasil[$i]["Kode_Waktu"] < $waktu_sekarang){
				$where = array( 
								"Kode_Waktu" => 	$hasil[$i]["Kode_Waktu"]
								);
				$hasil2 = $this->fungsi->Hapus_Data('data_reservasi', $where);
			}
		}

		
//-------------------------------------------------------------------batas



		
		if ($_SESSION != null){
			$No_Pengajar = $_SESSION['No_ID'];
			$Password = $_SESSION['Password'];
			$hasil = $this->fungsi->Ambil_Data('acount_pengajar ', "where No_Pengajar = '$No_Pengajar'");
			if (count($hasil) == 1){
			if ( $Password == $hasil[0]['Password'] ){
				redirect('pengajar/cek_pengajar');
			}else{
				redirect('pengajar/logout');
			}
			}else{
				redirect('pengajar/logout');

			}

		}else{
			redirect('pengajar/logout');

		}

	}

	public function cek_pengajar(){
		if ($_POST != null){
			if ($_POST['No_Pengajar'] == "" || $_POST['Password'] == ""){
				session_unset();
				redirect('pengajar/logout');

			}
			else {
				$_SESSION['No_ID'] = $_POST['No_Pengajar'];
				$_SESSION['Password'] = $_POST['Password'];	
			}
		}

		if ($_POST == null && $_SESSION == null){
			redirect('pengajar/logout');
		}

		$No_Pengajar = $_SESSION['No_ID'];
		$Password = $_SESSION['Password'];

		$hasil = $this->fungsi->Ambil_Data('acount_pengajar ', "where No_Pengajar = '$No_Pengajar'");
		if (count($hasil) == 1){
		$_SESSION['Nama_Pengajar'] 	= $hasil[0]['Nama_Pengajar'];
		$_SESSION['No_Pengajar'] 	= $hasil[0]['No_Pengajar'];
		$_SESSION['No_Hp'] 			= $hasil[0]['No_Hp'];
		$_SESSION['Nama_Photo']		= $hasil[0]['Photo'];
		
		if ( $Password == $hasil[0]['Password'] ){
				redirect('pengajar/profil');

		}else {
			// pesan salah
			redirect('pengajar/logout');

		}
		}else {
			// pesan salah
			redirect('pengajar/logout');

		}
	}

//------------------------------------------------------------------------------profil
	public function profil() {
		if ($_SESSION != null){
			$No_Pengajar = $_SESSION['No_ID'];
			$Password = $_SESSION['Password'];
			$hasil = $this->fungsi->Ambil_Data('acount_pengajar ', "where No_Pengajar = '$No_Pengajar'");
			
if (count($hasil) == 1){

if ( $Password == $hasil[0]['Password'] ){

				$hasil = $this->fungsi->Ambil_Data('acount_pengajar ', "where No_Pengajar = '$No_Pengajar'");
				$kirim = array( 
							"No_Pengajar"	=> $hasil[0]['No_Pengajar'],
							"Nama_Pengajar" => $hasil[0]['Nama_Pengajar'],
							"Bidang"		=> $hasil[0]['Bidang'],
							"Jurusan"		=> $hasil[0]['Jurusan'],
							"Institute" 	=> $hasil[0]['Institute'],
							"No_Hp" 		=> $hasil[0]['No_Hp'],
							"Acount_Line"	=> $hasil[0]['Acount_Line'],
							"Acount_Fb" 	=> $hasil[0]['Acount_Fb'],
							"Acount_Twitter"=> $hasil[0]['Acount_Twitter'],
							"Password" 		=> $hasil[0]['Password']
							);

				if ($hasil[0]['No_Pengajar']== "" ||$hasil[0]['Nama_Pengajar']== "" ||$hasil[0]['Bidang']== "" ||$hasil[0]['Jurusan']== "" ||$hasil[0]['Institute']== "" ||$hasil[0]['No_Hp']== "" ||$hasil[0]['Password']== "" )
				{
					$this->load->view('pengajar/halaman_profil_kosong', $kirim);	
				}else{
					$this->load->view('pengajar/halaman_profil', $kirim);	
				}
			}else {
				
				redirect('pengajar/logout');

			}
			}else {
				
				redirect('pengajar/logout');

			}
		}else{
			redirect('pengajar/logout');

		}
	}


	public function ubah_profil(){
		if ($_SESSION != null){
			$No_Pengajar = $_SESSION['No_ID'];
			$Password = $_SESSION['Password'];
			$hasil = $this->fungsi->Ambil_Data('acount_pengajar ', "where No_Pengajar = '$No_Pengajar'");
			
if (count($hasil) == 1){

if ( $Password == $hasil[0]['Password'] ){

				$No_Pengajar = $_SESSION['No_ID'];
				$hasil = $this->fungsi->Ambil_Data('acount_pengajar ', "where No_Pengajar = '$No_Pengajar'");
				$kirim = array( 
						"No_Pengajar"	=> $hasil[0]['No_Pengajar'],
						"Nama_Pengajar" => $hasil[0]['Nama_Pengajar'],
						"Bidang"		=> $hasil[0]['Bidang'],
						"Jurusan"		=> $hasil[0]['Jurusan'],
						"Acount_Line"	=> $hasil[0]['Acount_Line'],
						"Acount_Fb" 	=> $hasil[0]['Acount_Fb'],
						"Acount_Twitter"=> $hasil[0]['Acount_Twitter'],
						"Institute" 	=> $hasil[0]['Institute'],
						"Link_Line" 	=> $hasil[0]['Link_Line'],
						"No_Hp" 		=> $hasil[0]['No_Hp'],
						"Password"		=> $hasil[0]['Password']);
			if ($hasil[0]['No_Pengajar']== "" ||$hasil[0]['Nama_Pengajar']== "" ||$hasil[0]['Bidang']== "" ||$hasil[0]['Jurusan']== "" ||$hasil[0]['Institute']== "" ||$hasil[0]['No_Hp']== "" ||$hasil[0]['Password']== "" )
				{
					$this->load->view('pengajar/form_ubah_profil_kosong', $kirim);		
				}else{
					$this->load->view('pengajar/form_ubah_profil', $kirim);	
				}
			}else {
				
				redirect('pengajar/logout');

			}
			}else {
				
				redirect('pengajar/logout');

			}
		}else{
			redirect('pengajar/logout');

		}
	}



	public function Updatephoto(){
		if ($_SESSION != null){
			$No_Pengajar = $_SESSION['No_ID'];
			$Password = $_SESSION['Password'];
			$hasil = $this->fungsi->Ambil_Data('acount_pengajar ', "where No_Pengajar = '$No_Pengajar'");
			
if (count($hasil) == 1){

if ( $Password == $hasil[0]['Password'] ){

				$photo = $_FILES['Image']['tmp_name'];
				$target = 'asset/Photo Pengajar/';
				$namaphoto = $No_Pengajar.".jpg";
				$hasil = move_uploaded_file($photo, $target.$No_Pengajar.".jpg");
				$ubah = array( 
					"Photo"			=> $namaphoto
					);
				$where = array('No_Pengajar' => $_SESSION['No_ID']);
	    		$hasil = $this->fungsi->Ubah_Data('acount_pengajar', $ubah, $where);
				redirect('pengajar/ubah_profil');
			}else{
				redirect('pengajar/logout');

			}
		}else{
			redirect('pengajar/logout');

		}
	}
}

	public function UpdatePengajar(){
		$_SESSION['Password'] 		= $_POST['Password'];
		$ubah = array( 
				"No_Pengajar"	=> $_POST['No_Pengajar'],
				"Nama_Pengajar" => $_POST['Nama_Pengajar'],
				"Bidang"	=> $_POST['Bidang'],
				"Jurusan"	=> $_POST['Jurusan'],
				"Institute" 	=> $_POST['Institute'],
				"No_Hp" 	=> $_POST['No_Hp'],
				"Acount_Line"	=> $_POST['Acount_Line'],
				"Acount_Fb" 	=> $_POST['Acount_Fb'],
				"Acount_Twitter"=> $_POST['Acount_Twitter'],
				"Link_Line" 	=> $_POST['Link_Line'],
				"Password"	=> $_POST['Password']
				);
    	$where = array('No_Pengajar' => $_POST['No_Pengajar']);
    	$hasil = $this->fungsi->Ubah_Data('acount_pengajar', $ubah, $where);
    	if ($hasil >= 1){ 
			redirect('pengajar/profil');
		}
	}


//---------------------------------------------------------------------------------------reservasi privat
	public function ajaxlesprivat (){
		$Status = "Lelang";
		$hasil = $this->fungsi->Ambil_Data('data_reservasi ', "where Status = '$Status'");
		echo json_encode($hasil);
	}

	public function reservasi_siswa(){
		if ($_SESSION != null){
			$No_Pengajar = $_SESSION['No_ID'];
			$Password = $_SESSION['Password'];
			$hasil = $this->fungsi->Ambil_Data('acount_pengajar ', "where No_Pengajar = '$No_Pengajar'");
			
if (count($hasil) == 1){

if ( $Password == $hasil[0]['Password'] ){

				$hasil = $this->fungsi->Ambil_Data('data_reservasi');
				$this->load->view('pengajar/reservasi_siswa', array( 'data' => $hasil ));
			}else {
				
				redirect('pengajar/logout');

			}
			}else {
				
				redirect('pengajar/logout');

			}
		}else{
			redirect('pengajar/logout');

		}
	}

	public function AmbilReservasi($yangmana){
		if ($_SESSION != null){
			$No_Pengajar = $_SESSION['No_ID'];
			$Password = $_SESSION['Password'];
			$hasil = $this->fungsi->Ambil_Data('acount_pengajar ', "where No_Pengajar = '$No_Pengajar'");
			
if (count($hasil) == 1){

if ( $Password == $hasil[0]['Password'] ){

				$Pencarian				=	$yangmana;
				$No_Pengajar			=	$_SESSION['No_Pengajar'];
				$ambil = $this->fungsi->Ambil_Data('data_reservasi ', "where Pencarian = '$Pencarian'");
				if ($ambil[0]['Kelompok'] == NULL){
					echo "<script type=\"text/javascript\">
					alert(\"Telah Diambil\");
					</script>";
					redirect('pengajar/reservasi_siswa');
				}
				
				$tambah = array( 
						"Pencarian" 				=> $Pencarian,
						"Kode_Waktu"				=> $ambil[0]['Kode_Waktu'],
						"Kode_Reservasi"			=> $ambil[0]['Kode_Reservasi'],
						"Hari_Tanggal" 				=> $ambil[0]['Hari_Tanggal'],
						"Materi"					=> $ambil[0]['Materi'],
						"Kelompok"					=> $ambil[0]['Kelompok'],
						"Jam"						=> $ambil[0]['Jam'],
						"Kelas"						=> "Privat",
						"Kriteria_Pengajar"			=> $ambil[0]['Kriteria_Pengajar'],
						"No_Pengajar"				=> $_SESSION['No_ID'],
						"Nama_Pengajar"				=> $_SESSION['Nama_Pengajar'],
						"Hp_Pengajar"				=> $_SESSION['No_Hp']
						);

				$tambah_data = $this->fungsi->Tambah_Data('data_jadwal', $tambah);
				$where = array( 
						"Pencarian" 				=> $Pencarian
								);
				$Hapus = $this->fungsi->Hapus_Data('data_reservasi', $where);
				redirect('pengajar/reservasi_siswa');
			}else {
				
				redirect('pengajar/logout');

			}
			}else {
				
				redirect('pengajar/logout');

			}
		}else{
			redirect('pengajar/logout');

		}
	}

// ------------------------------------------------------------------------------------- resrvasi leguler

	public function ajaxlesleguler (){
		$Status = "Lelang";
		$hasil = $this->fungsi->Ambil_Data('data_reservasi_reguler ', "where Status = '$Status'");
		echo json_encode($hasil);
	}

	public function reservasi_leguler(){
		if ($_SESSION != null){
			$No_Pengajar = $_SESSION['No_ID'];
			$Password = $_SESSION['Password'];
			$hasil = $this->fungsi->Ambil_Data('acount_pengajar ', "where No_Pengajar = '$No_Pengajar'");
			
if (count($hasil) == 1){

if ( $Password == $hasil[0]['Password'] ){

				$hasil = $this->fungsi->Ambil_Data('data_reservasi');
				$this->load->view('pengajar/reservasi_siswa_reguler', array( 'data' => $hasil ));
			}else {
				
				redirect('pengajar/logout');

			}
			}else {
				
				redirect('pengajar/logout');

			}
		}else{
			redirect('pengajar/logout');

		}
	}

	public function AmbilReservasiLeguler($yangmana){
		if ($_SESSION != null){
			$No_Pengajar = $_SESSION['No_ID'];
			$Password = $_SESSION['Password'];
			$hasil = $this->fungsi->Ambil_Data('acount_pengajar ', "where No_Pengajar = '$No_Pengajar'");
			
if (count($hasil) == 1){

if ( $Password == $hasil[0]['Password'] ){

				$Pencarian				=	$yangmana;
				$ambil = $this->fungsi->Ambil_Data('data_reservasi_reguler ', "where Pencarian = '$Pencarian'");
				if ($ambil[0]['Kelompok'] == NULL){
					echo "<script type=\"text/javascript\">
					alert(\"Tidak ada yang boleh kosong\");
					</script>";
					redirect('pengajar/reservasi_leguler');
				}
				
				$tambah = array( 
						"Pencarian" 				=> $Pencarian,
						"Kode_Reservasi"			=> $ambil[0]['Kode_Reservasi'],
						"Hari_Tanggal" 				=> $ambil[0]['Hari_Tanggal'],
						"Materi"					=> $ambil[0]['Materi'],
						"Kelompok"					=> $ambil[0]['Kelompok'],
						"Jam"						=> $ambil[0]['Jam'],
						"Kelas"						=> "Reguler",
						"Kriteria_Pengajar"			=> $ambil[0]['Kriteria_Pengajar'],
						"No_Pengajar"				=> $_SESSION['No_ID'],
						"Nama_Pengajar"				=> $_SESSION['Nama_Pengajar'],
						"Hp_Pengajar"				=> $_SESSION['No_Hp'],
						"Kode_Waktu"				=> $ambil[0]['Kode_Waktu']
						);

				$tambah_data = $this->fungsi->Tambah_Data('data_jadwal', $tambah);
				$where = array( 
						"Pencarian" 				=> $Pencarian
								);
				$Hapus = $this->fungsi->Hapus_Data('data_reservasi_reguler', $where);
				redirect('pengajar/reservasi_leguler');
			}else {
				
				redirect('pengajar/logout');

			}
			}else {
				
				redirect('pengajar/logout');

			}
		}else{
			redirect('pengajar/logout');

		}
	}	

//----------------------------------------------------------------------------------------Reservasi Sbmptn

	public function ajaxlessbm (){
		$Status = "Lelang";
		$hasil = $this->fungsi->Ambil_Data('data_reservasi_sbmptn ', "where Status = '$Status'");
		echo json_encode($hasil);
	}

	public function reservasi_sbmptn(){
		if ($_SESSION != null){
			$No_Pengajar = $_SESSION['No_ID'];
			$Password = $_SESSION['Password'];
			$hasil = $this->fungsi->Ambil_Data('acount_pengajar ', "where No_Pengajar = '$No_Pengajar'");
			
if (count($hasil) == 1){

if ( $Password == $hasil[0]['Password'] ){

				$hasil = $this->fungsi->Ambil_Data('data_reservasi_sbmptn');
				$this->load->view('pengajar/reservasi_siswa_sbmptn', array( 'data' => $hasil ));
			}else {
				
				redirect('pengajar/logout');

			}
			}else {
				
				redirect('pengajar/logout');

			}
		}else{
			redirect('pengajar/logout');

		}
	}

	public function AmbilReservasiSbm($yangmana){
		if ($_SESSION != null){
			$No_Pengajar = $_SESSION['No_ID'];
			$Password = $_SESSION['Password'];
			$hasil = $this->fungsi->Ambil_Data('acount_pengajar ', "where No_Pengajar = '$No_Pengajar'");
			
if (count($hasil) == 1){

if ( $Password == $hasil[0]['Password'] ){

				$Pencarian				=	$yangmana;
				$ambil = $this->fungsi->Ambil_Data('data_reservasi_sbmptn ', "where Pencarian = '$Pencarian'");
				if ($ambil[0]['Kelompok'] == NULL){
					echo "<script type=\"text/javascript\">
					alert(\"Tidak ada yang boleh kosong\");
					</script>";
					redirect('pengajar/reservasi_sbmptn');
				}
				
				$tambah = array( 
						"Pencarian" 				=> $Pencarian,
						"Kode_Reservasi"			=> $ambil[0]['Kode_Reservasi'],
						"Hari_Tanggal" 				=> $ambil[0]['Hari_Tanggal'],
						"Materi"					=> $ambil[0]['Materi'],
						"Kelompok"					=> $ambil[0]['Kelompok'],
						"Jam"						=> $ambil[0]['Jam'],
						"Kelas"						=> "SBMPTN",
						"Kriteria_Pengajar"			=> $ambil[0]['Kriteria_Pengajar'],
						"No_Pengajar"				=> $_SESSION['No_ID'],
						"Nama_Pengajar"				=> $_SESSION['Nama_Pengajar'],
						"Hp_Pengajar"				=> $_SESSION['No_Hp'],
						"Kode_Waktu"				=> $ambil[0]['Kode_Waktu']
						);

				$tambah_data = $this->fungsi->Tambah_Data('data_jadwal', $tambah);
				$where = array( 
						"Pencarian" 				=> $Pencarian
								);
				$Hapus = $this->fungsi->Hapus_Data('data_reservasi_sbmptn', $where);
				redirect('pengajar/reservasi_sbmptn');
			}else {
				
				redirect('pengajar/logout');

			}
			}else {
				
				redirect('pengajar/logout');

			}
		}else{
			redirect('pengajar/logout');

		}
	}	
//----------------------------------------------------------------------------------------Jadwal Saya

	public function Jadwal_saya(){
		//------------------------------------------------------------------------------------------------ formula hapus data waktu
		date_default_timezone_set('Asia/Jakarta');
		$waktu_sekarang = date('Y', time())*1000000+date('m', time())*10000+date('d', time())*100+date('H', time());

		$ambil = $this->fungsi->Ambil_Data('data_jadwal');
		for ($i=0; $i < count($ambil); $i++) { 
			if( $ambil[$i]["Kode_Waktu"] < $waktu_sekarang){
				$tambah = array( 
						"Pencarian" 				=> $ambil[$i]['Pencarian'],
						"Kode_Reservasi"			=> $ambil[$i]['Kode_Reservasi'],
						"Hari_Tanggal" 				=> $ambil[$i]['Hari_Tanggal'],
						"Materi"					=> $ambil[$i]['Materi'],
						"Kelompok"					=> $ambil[$i]['Kelompok'],
						"Jam"						=> $ambil[$i]['Jam'],
						"Kelas"						=> $ambil[$i]['Kelas'],
						"Kriteria_Pengajar"			=> $ambil[$i]['Kriteria_Pengajar'],
						"No_Pengajar"				=> $ambil[$i]['No_Pengajar'],
						"Nama_Pengajar"				=> $ambil[$i]['Nama_Pengajar'],
						"Hp_Pengajar"				=> $ambil[$i]['Hp_Pengajar'],
						"Kode_Waktu"				=> $ambil[$i]['Kode_Waktu']
						);

				$tambah_data = $this->fungsi->Tambah_Data('data_riwayat', $tambah);
				$where = array( 
						"Pencarian" 				=> $ambil[$i]['Pencarian']
								);
				$Hapus = $this->fungsi->Hapus_Data('data_jadwal', $where);
			}
		}

		$hasil = $this->fungsi->Ambil_Data('data_reservasi_reguler');
		for ($i=0; $i < count($hasil); $i++) { 
			if( $hasil[$i]["Kode_Waktu"] < $waktu_sekarang){
				$where = array( 
								"Kode_Waktu" => 	$hasil[$i]["Kode_Waktu"]
								);
				$hasil2 = $this->fungsi->Hapus_Data('data_reservasi_reguler', $where);
			}
		}

		$hasil = $this->fungsi->Ambil_Data('data_reservasi_sbmptn');
		for ($i=0; $i < count($hasil); $i++) { 
			if( $hasil[$i]["Kode_Waktu"] < $waktu_sekarang){
				$where = array( 
								"Kode_Waktu" => 	$hasil[$i]["Kode_Waktu"]
								);
				$hasil2 = $this->fungsi->Hapus_Data('data_reservasi_sbmptn', $where);
			}
		}

		$hasil = $this->fungsi->Ambil_Data('data_reservasi');
		for ($i=0; $i < count($hasil); $i++) { 
			if( $hasil[$i]["Kode_Waktu"] < $waktu_sekarang){
				$where = array( 
								"Kode_Waktu" => 	$hasil[$i]["Kode_Waktu"]
								);
				$hasil2 = $this->fungsi->Hapus_Data('data_reservasi', $where);
			}
		}

		
//-------------------------------------------------------------------batas
		if ($_SESSION != null){
			$No_Pengajar = $_SESSION['No_ID'];
			$Password = $_SESSION['Password'];
			$hasil = $this->fungsi->Ambil_Data('acount_pengajar ', "where No_Pengajar = '$No_Pengajar'");
			
if (count($hasil) == 1){

if ( $Password == $hasil[0]['Password'] ){

				$No_Pengajar = $_SESSION['No_ID'];
				$hasil = $this->fungsi->Ambil_Data('data_jadwal ', "where No_Pengajar = '$No_Pengajar'");
				$this->load->view('pengajar/jadwal_saya', array( 'data' => $hasil ));
			}else {
				redirect('pengajar/logout');
	
			}	
		}else{
			redirect('pengajar/logout');

		}
	}
}
	public function anggotakelompok($Kelompok){
		if ($_SESSION != null){
			$No_Pengajar = $_SESSION['No_ID'];
			$Password = $_SESSION['Password'];
			$hasil = $this->fungsi->Ambil_Data('acount_pengajar ', "where No_Pengajar = '$No_Pengajar'");
			
if (count($hasil) == 1){

if ( $Password == $hasil[0]['Password'] ){

				$data = explode ("%20",$Kelompok);
				$datahasil = "";
				for ($i=0; $i < count($data)-1; $i++) { 
					$datahasil =  $datahasil.$data[$i]." ";
				}

				$Kelompok2 = $datahasil.$data[count($data)-1];


				$hasil = $this->fungsi->Ambil_Data('acount_siswa_sbmptn ',"where Kelompok = '$Kelompok2'");
				$this->load->view('pengajar/kelompok_siswa', array('data' => $hasil ));
				
			}else {
				redirect('pengajar/logout');
	
			}	
		}else{
			redirect('pengajar/logout');

		}
	}
}
	public function Kelompoklengkap($No_ID){
		if ($_SESSION != null){
			$No_Pengajar = $_SESSION['No_ID'];
			$Password = $_SESSION['Password'];
			$hasil = $this->fungsi->Ambil_Data('acount_pengajar ', "where No_Pengajar = '$No_Pengajar'");
			
if (count($hasil) == 1){

if ( $Password == $hasil[0]['Password'] ){

				$Kelompok = $No_ID;
				$hasil = $this->fungsi->Ambil_Data('acount_siswa_sbmptn ',"where No_Siswa = '$Kelompok'");
				
				$kirim = array( 
						"No_Siswa1"			=> $hasil[0]['No_Siswa'],
						"Nama_Siswa1" 		=> $hasil[0]['Nama_Siswa'],
						"No_Siswa"			=> $hasil[0]['No_Siswa'],
						"Nama_Siswa" 		=> $hasil[0]['Nama_Siswa'],
						"Nama_Panggilan"	=> $hasil[0]['Nama_Panggilan'],
						"Jenis_Kelamin"		=> $hasil[0]['Jenis_Kelamin'],
						"TTL"				=> $hasil[0]['TTL'],
						"No_Hp"				=> $hasil[0]['No_Hp'],
						"Kelas"				=> $hasil[0]['Kelas'],
						"Sekolah"			=> $hasil[0]['Sekolah'],
						"Link_Line"			=> $hasil[0]['Link_Line'],
						"Acount_Fb"			=> $hasil[0]['Acount_Fb'],
						"Acount_Twitter"	=> $hasil[0]['Acount_Twitter'],
						"Acount_Line"		=> $hasil[0]['Acount_Line'],
						"Nama_Ayah"			=> $hasil[0]['Nama_Ayah'],
						"Pekerjaan_Ayah"	=> $hasil[0]['Pekerjaan_Ayah'],
						"No_Hp_Ayah"		=> $hasil[0]['No_Hp_Ayah'],
						"Nama_Ibu"			=> $hasil[0]['Nama_Ibu'],
						"Pekerjaan_Ibu"		=> $hasil[0]['Pekerjaan_Ibu'],
						"No_Hp_Ibu"			=> $hasil[0]['No_Hp_Ibu'],
						"Alamat"			=> $hasil[0]['Alamat'],
						"Photo"				=> $hasil[0]['Photo'],
						"Password"			=> $hasil[0]['Password']
						);
				$this->load->view('pengajar/kelompok_lengkap', $kirim);
				
			}else {
				redirect('pengajar/logout');
	
			}	
		}else{
			redirect('pengajar/logout');

		}
	}

}
	public function datapengurus(){
		// siapa yang harus dihubungi ???
		
	}

	public function batal_jadwal($yangmana){
		$waktu_sekarang = date('Y', time())*1000000+date('m', time())*10000+date('d', time())*100+date('H', time());
		if ($_SESSION != null){
			$No_Pengajar = $_SESSION['No_ID'];
			$Password = $_SESSION['Password'];
			$hasil = $this->fungsi->Ambil_Data('acount_pengajar ', "where No_Pengajar = '$No_Pengajar'");
			
if (count($hasil) == 1){

if ( $Password == $hasil[0]['Password'] ){

				$Pencarian				=	$yangmana;
				$ambil = $this->fungsi->Ambil_Data('data_jadwal ', "where Pencarian = '$Pencarian'");
				if ($ambil[0]['Kode_Waktu']-5 <= $waktu_sekarang){
					echo "<script type=\"text/javascript\">
					alert(\"Anda Dalam Batas Waktu untuk Batal. \n Untuk Melanjutkan Silahkan Hubungu Pengurus\");
					</script>";
				$No_Pengajar = $_SESSION['No_ID'];
				$hasil = $this->fungsi->Ambil_Data('data_jadwal ', "where No_Pengajar = '$No_Pengajar'");
				$this->load->view('pengajar/jadwal_saya', array( 'data' => $hasil ));

				}else{		
					$tambah = array( 
								"Pencarian" 				=> $Pencarian,
								"Kode_Reservasi"			=> $ambil[0]['Kode_Reservasi'],
								"Hari_Tanggal" 				=> $ambil[0]['Hari_Tanggal'],
								"Materi"					=> $ambil[0]['Materi'],
								"Kelompok"					=> $ambil[0]['Kelompok'],
								"Jam"						=> $ambil[0]['Jam'],
								"Kriteria_Pengajar"			=> $ambil[0]['Kriteria_Pengajar'],
								"Kode_Waktu"				=> $ambil[0]['Kode_Waktu']
								);
					
					if ($ambil[0]['Kelas'] == "Reguler" ){
						$tambah_data = $this->fungsi->Tambah_Data('data_reservasi_reguler', $tambah);
						$where = array( 
							"Pencarian" 				=> $Pencarian
						);
						$hasil = $this->fungsi->Hapus_Data('data_jadwal', $where);
						redirect('pengajar/jadwal_saya');
					}

					else if ( $ambil[0]['Kelas'] == "Privat" ){
						$tambah_data = $this->fungsi->Tambah_Data('data_reservasi', $tambah);
						$where = array( 
							"Pencarian" 				=> $Pencarian
						);
						$hasil = $this->fungsi->Hapus_Data('data_jadwal', $where);
						redirect('pengajar/jadwal_saya');
					}

					else if ( $ambil[0]['Kelas'] == "SBMPTN" ){
						$tambah_data = $this->fungsi->Tambah_Data('data_reservasi_sbmptn', $tambah);
						$where = array( 
							"Pencarian" 				=> $Pencarian
						);
						$hasil = $this->fungsi->Hapus_Data('data_jadwal', $where);
						redirect('pengajar/jadwal_saya');
					}

				}

	    	}else {
				redirect('pengajar/logout');
	
			}
		}else{
			redirect('pengajar/logout');

		}

	}
}
	//---------------------------------------------------------------------------riwayat
	public function riwayat_mengajar(){
		//------------------------------------------------------------------------------------------------ formula hapus data waktu
		date_default_timezone_set('Asia/Jakarta');
		$waktu_sekarang = date('Y', time())*1000000+date('m', time())*10000+date('d', time())*100+date('H', time());

		$ambil = $this->fungsi->Ambil_Data('data_jadwal');
		for ($i=0; $i < count($ambil); $i++) { 
			if( $ambil[$i]["Kode_Waktu"] < $waktu_sekarang){
				$tambah = array( 
						"Pencarian" 				=> $ambil[$i]['Pencarian'],
						"Kode_Reservasi"			=> $ambil[$i]['Kode_Reservasi'],
						"Hari_Tanggal" 				=> $ambil[$i]['Hari_Tanggal'],
						"Materi"					=> $ambil[$i]['Materi'],
						"Kelompok"					=> $ambil[$i]['Kelompok'],
						"Jam"						=> $ambil[$i]['Jam'],
						"Kelas"						=> $ambil[$i]['Kelas'],
						"Kriteria_Pengajar"			=> $ambil[$i]['Kriteria_Pengajar'],
						"No_Pengajar"				=> $ambil[$i]['No_Pengajar'],
						"Nama_Pengajar"				=> $ambil[$i]['Nama_Pengajar'],
						"Hp_Pengajar"				=> $ambil[$i]['Hp_Pengajar'],
						"Kode_Waktu"				=> $ambil[$i]['Kode_Waktu']
						);

				$tambah_data = $this->fungsi->Tambah_Data('data_riwayat', $tambah);
				$where = array( 
						"Pencarian" 				=> $ambil[$i]['Pencarian']
								);
				$Hapus = $this->fungsi->Hapus_Data('data_jadwal', $where);
			}
		}

		$hasil = $this->fungsi->Ambil_Data('data_reservasi_reguler');
		for ($i=0; $i < count($hasil); $i++) { 
			if( $hasil[$i]["Kode_Waktu"] < $waktu_sekarang){
				$where = array( 
								"Kode_Waktu" => 	$hasil[$i]["Kode_Waktu"]
								);
				$hasil2 = $this->fungsi->Hapus_Data('data_reservasi_reguler', $where);
			}
		}

		$hasil = $this->fungsi->Ambil_Data('data_reservasi_sbmptn');
		for ($i=0; $i < count($hasil); $i++) { 
			if( $hasil[$i]["Kode_Waktu"] < $waktu_sekarang){
				$where = array( 
								"Kode_Waktu" => 	$hasil[$i]["Kode_Waktu"]
								);
				$hasil2 = $this->fungsi->Hapus_Data('data_reservasi_sbmptn', $where);
			}
		}

		$hasil = $this->fungsi->Ambil_Data('data_reservasi');
		for ($i=0; $i < count($hasil); $i++) { 
			if( $hasil[$i]["Kode_Waktu"] < $waktu_sekarang){
				$where = array( 
								"Kode_Waktu" => 	$hasil[$i]["Kode_Waktu"]
								);
				$hasil2 = $this->fungsi->Hapus_Data('data_reservasi', $where);
			}
		}

		
//-------------------------------------------------------------------batas
		if ($_SESSION != null){
			$No_Pengajar = $_SESSION['No_ID'];
			$Password = $_SESSION['Password'];
			$hasil = $this->fungsi->Ambil_Data('acount_pengajar ', "where No_Pengajar = '$No_Pengajar'");
			
if (count($hasil) == 1){

if ( $Password == $hasil[0]['Password'] ){

				$No_Pengajar = $_SESSION['No_ID'];
				$hasil = $this->fungsi->Ambil_Data('data_riwayat ', "where No_Pengajar = '$No_Pengajar'");
				$this->load->view('pengajar/riwayatsaya', array( 'data' => $hasil ));
			}else {
				redirect('pengajar/logout');
	
			}	
		}else{
			redirect('pengajar/logout');

		}
	}
}
	public function logout(){
		session_unset();
		redirect('pengajar/loginpengajar');

	}
}
