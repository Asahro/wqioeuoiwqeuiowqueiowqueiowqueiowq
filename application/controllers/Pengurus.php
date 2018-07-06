<?php
defined('BASEPATH') OR exit('No direct script access allowed');
session_start();

class Pengurus extends CI_Controller {

//------------------------------------------------------------Login

	public function index(){
		redirect('pengurus/loginPengurus');
	}

	public function nyobaperintah(){

		$this->load->view('perintah');
	}

	public function loginPengurus()
	{
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

		$this->load->view('pengurus/login');
	}

	public function login_Pengurus(){		
		if ($_SESSION != null){
			$No_Pengurus = $_SESSION['No_ID'];
			$Password = $_SESSION['Password'];
			$hasil = $this->fungsi->Ambil_Data('acount_pengurus ', "where No_Pengurus = '$No_Pengurus'");
				if (count($hasil) == 1){
					
					if ( $Password == $hasil[0]['Password'] ){
						redirect('pengurus/cek_pengurus');
					}else{
						redirect('pengurus/logout');
					}

				}else{
					redirect('pengurus/logout');
				}

		}else{
			redirect('pengurus/loginPengurus');
		}
	}

	public function cek_pengurus(){
		if ($_POST != null){
			if ($_POST['Nama_Pengurus'] == "" && $_POST['Password'] == ""){
				redirect('pengurus/logout');
			}else{
				$_SESSION['Nama_Pengurus'] 	= $_POST['Nama_Pengurus'];
				$_SESSION['Password'] 		= $_POST['Password'];
				$Nama_Pengurus = $_SESSION['Nama_Pengurus'];
				$hasil = $this->fungsi->Ambil_Data('acount_pengurus ', "where Nama_Pengurus = '$Nama_Pengurus'");
				if (count($hasil) == 1){
					$_SESSION['No_ID'] = $hasil[0]['No_Pengurus'];
					$_SESSION['Code_Tahun'] 	= date('Y', time())-2000;				
					if (date('m', time()) < 7)$_SESSION['Code_Semester'] = 2; 
					else $_SESSION['Code_Semester'] 	= 1;			
				}else{
						redirect('pengurus/logout');
				}
			}
		}
		
		if ($_POST == null && $_SESSION == null){
			redirect('pengurus/logout');
		}
		$_SESSION['Kode_Share'] = "PG";
		$No_Pengurus = $_SESSION['No_ID'];
		$Password = $_SESSION['Password'];
		$hasil = $this->fungsi->Ambil_Data('acount_pengurus ', "where No_Pengurus = '$No_Pengurus'");				
		if (count($hasil) == 1){
			$_SESSION['No_Pengurus'] = $hasil[0]['No_Pengurus'];
			$_SESSION['Nama_Photo']		= $hasil[0]['Photo'];
			if ( $Password == $hasil[0]['Password'] ){
				redirect('pengurus/profil');				
			}
			else {
				// pesan salah
				redirect('pengurus/logout');
			}
		}else{
			redirect('pengurus/logout');
		}
	}
//--------------------------------------------------------------------laman profil
	

	public function profil() {
		if ($_SESSION != null){
			$No_Pengurus = $_SESSION['No_ID'];
			$Password = $_SESSION['Password'];
			$hasil = $this->fungsi->Ambil_Data('acount_pengurus ', "where No_Pengurus = '$No_Pengurus'");
			if (count($hasil) == 1){

				if ( $Password == $hasil[0]['Password'] ){
					$hasil = $this->fungsi->Ambil_Data('acount_pengurus ', "where No_Pengurus = '$No_Pengurus'");
					if ($hasil[0]['No_Pengurus']== "" || $hasil[0]['Nama_Pengurus']== "" || $hasil[0]['Jurusan']== "" ||$hasil[0]['Institute']== "" ||$hasil[0]['No_Hp']== "" || $hasil[0]['Password']== "" ){
						$kirim = array( 
								"No_Pengurus"	=> $hasil[0]['No_Pengurus'],
								"Nama_Pengurus" => $hasil[0]['Nama_Pengurus'],
								"Jurusan"		=> $hasil[0]['Jurusan'],
								"Link_Line"			=> $hasil[0]['Link_Line'],
								"Acount_Fb"			=> $hasil[0]['Acount_Fb'],
								"Acount_Twitter"	=> $hasil[0]['Acount_Twitter'],
								"Bagian"	=> $hasil[0]['Bagian'],
								"Acount_Line"		=> $hasil[0]['Acount_Line'],
								"Institute" 	=> $hasil[0]['Institute'],
								"No_Hp" 		=> $hasil[0]['No_Hp'],
								"Password" 		=> $hasil[0]['Password']
								);
						$this->load->view('pengurus/halaman_profil_kosong', $kirim);	
					}else{
						$kirim = array( 
								"No_Pengurus"	=> $hasil[0]['No_Pengurus'],
								"Nama_Pengurus" => $hasil[0]['Nama_Pengurus'],
								"Bagian"	=> $hasil[0]['Bagian'],
								"Jurusan"		=> $hasil[0]['Jurusan'],
								"Link_Line"			=> $hasil[0]['Link_Line'],
								"Acount_Fb"			=> $hasil[0]['Acount_Fb'],
								"Acount_Twitter"	=> $hasil[0]['Acount_Twitter'],
								"Acount_Line"		=> $hasil[0]['Acount_Line'],
								"Institute" 	=> $hasil[0]['Institute'],
								"No_Hp" 		=> $hasil[0]['No_Hp'],
								"Password" 		=> $hasil[0]['Password']
								);
						$this->load->view('pengurus/halaman_profil', $kirim);						
					}

					}else{
						redirect('pengurus/logout');
					}
			}else{
					redirect('pengurus/logout');
			}

		}else{
				redirect('pengurus/logout');
		}

	}


	public function ubah_profil(){
		if ($_SESSION != null){
			$No_Pengurus = $_SESSION['No_ID'];
			$Password = $_SESSION['Password'];
			$hasil = $this->fungsi->Ambil_Data('acount_pengurus ', "where No_Pengurus = '$No_Pengurus'");
			if (count($hasil) == 1){


				if ( $Password == $hasil[0]['Password'] ){
					if ($hasil[0]['No_Pengurus']== "" || $hasil[0]['Nama_Pengurus']== "" || $hasil[0]['Jurusan']== "" ||$hasil[0]['Institute']== "" ||$hasil[0]['No_Hp']== "" || $hasil[0]['Password']== "" ){
						$kirim = array( 
								"No_Pengurus"	=> $hasil[0]['No_Pengurus'],
								"Nama_Pengurus" => $hasil[0]['Nama_Pengurus'],
								"Jurusan"		=> $hasil[0]['Jurusan'],
								"Institute" 	=> $hasil[0]['Institute'],
								"Link_Line"			=> $hasil[0]['Link_Line'],
								"Acount_Fb"			=> $hasil[0]['Acount_Fb'],
								"Bagian"	=> $hasil[0]['Bagian'],
								"Acount_Twitter"	=> $hasil[0]['Acount_Twitter'],
								"Acount_Line"		=> $hasil[0]['Acount_Line'],
								"No_Hp" 		=> $hasil[0]['No_Hp'],
								"Password" 		=> $hasil[0]['Password']
								);
							$this->load->view('pengurus/form_ubah_profil_kosong', $kirim);	
					}else{
						$kirim = array( 
								"No_Pengurus"	=> $hasil[0]['No_Pengurus'],
								"Nama_Pengurus" => $hasil[0]['Nama_Pengurus'],
								"Jurusan"		=> $hasil[0]['Jurusan'],
								"Link_Line"			=> $hasil[0]['Link_Line'],
								"Acount_Fb"			=> $hasil[0]['Acount_Fb'],
								"Acount_Twitter"	=> $hasil[0]['Acount_Twitter'],
								"Bagian"	=> $hasil[0]['Bagian'],
								"Acount_Line"		=> $hasil[0]['Acount_Line'],
								"Institute" 	=> $hasil[0]['Institute'],
								"No_Hp" 		=> $hasil[0]['No_Hp'],
								"Password" 		=> $hasil[0]['Password']
								);
						$this->load->view('pengurus/form_ubah_profil', $kirim);	
					}
				}else{
						redirect('pengurus/logout');
				}

			}else{
			redirect('pengurus/logout');
			}


		}else{
				redirect('pengurus/logout');
		}
	}



	public function Updatephoto(){
		if ($_SESSION != null){
			$No_Pengurus = $_SESSION['No_ID'];
			$Password = $_SESSION['Password'];
			$hasil = $this->fungsi->Ambil_Data('acount_pengurus ', "where No_Pengurus = '$No_Pengurus'");
			if (count($hasil) == 1){


				if ( $Password == $hasil[0]['Password'] ){
					$photo = $_FILES['Image']['tmp_name'];
					$target = 'asset/Photo Pengurus/';
					$namaphoto = $No_Pengurus.".jpg";
					$_SESSION['Nama_Photo']		= $namaphoto;

					$hasil = move_uploaded_file($photo, $target.$No_Pengurus.".jpg");
					$ubah = array( 
						"Photo"			=> $namaphoto
						);
					$where = array('No_Pengurus' => $_SESSION['No_ID']);
		    		$hasil = $this->fungsi->Ubah_Data('acount_pengurus', $ubah, $where);
					redirect('pengurus/ubah_profil');
				}else{
					redirect('pengurus/logout');
				}
			}else{
				redirect('pengurus/logout');
			}


		}else{
			redirect('pengurus/logout');
		}
	}

	public function UpdatePengurus(){
		if ($_SESSION != null){
			$No_Pengurus = $_SESSION['No_ID'];
			$Password = $_SESSION['Password'];
			$hasil = $this->fungsi->Ambil_Data('acount_pengurus ', "where No_Pengurus = '$No_Pengurus'");
			if (count($hasil) == 1){

			if ( $Password == $hasil[0]['Password'] ){
				$_SESSION['Password'] 		= $_POST['Password'];
				$ubah = array( 
						"No_Pengurus"	=> $_POST['No_Pengurus'],
						"Nama_Pengurus" => $_POST['Nama_Pengurus'],
						"Jurusan"	=> $_POST['Jurusan'],
						"Link_Line"			=> $_POST['Link_Line'],
						"Acount_Fb"			=> $_POST['Acount_Fb'],
						"Acount_Twitter"	=> $_POST['Acount_Twitter'],
						"Bagian"	=> $_POST['Bagian'],
						"Acount_Line"		=> $_POST['Acount_Line'],
						"Institute" 	=> $_POST['Institute'],
						"No_Hp" 	=> $_POST['No_Hp'],
						"Password"	=> $_POST['Password']
					);
		    	$where = array('No_Pengurus' => $_POST['No_Pengurus']);
	    		$hasil = $this->fungsi->Ubah_Data('acount_pengurus', $ubah, $where);
				redirect('pengurus/profil');
			}else{
				redirect('pengurus/logout');
			}

			}else{
				redirect('pengurus/logout');
			}

		}else{
			redirect('pengurus/logout');
		}
	}
//--------------------------------------------------------- Jadwal KBM
	public function jadwalkbm(){
		if ($_SESSION != null){
			$No_Pengurus = $_SESSION['No_ID'];
			$Password = $_SESSION['Password'];
			$hasil = $this->fungsi->Ambil_Data('acount_pengurus ', "where No_Pengurus = '$No_Pengurus'");
			if (count($hasil) == 1){
				if ( $Password == $hasil[0]['Password'] ){
					$hasil = $this->fungsi->Ambil_Data('data_jadwal');
					$this->load->view('pengurus/jadwal_kbm', array( 'data' => $hasil ));

				}else{
					redirect('pengurus/logout');
				}
			}else{
				redirect('pengurus/logout');
			}


		}else{
			redirect('pengurus/logout');
		}
	}

	public function batal_jadwal($yangmana){
		if ($_SESSION != null){
			$No_Pengurus = $_SESSION['No_ID'];
			$Password = $_SESSION['Password'];
			$hasil = $this->fungsi->Ambil_Data('acount_pengurus ', "where No_Pengurus = '$No_Pengurus'");
			if (count($hasil) == 1){
				if ( $Password == $hasil[0]['Password'] ){
					
				$Pencarian				=	$yangmana;
				$ambil = $this->fungsi->Ambil_Data('data_jadwal ', "where Pencarian = '$Pencarian'");
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
						redirect('pengurus/jadwalkbm');
					}

					else if ( $ambil[0]['Kelas'] == "Privat" ){
						$tambah_data = $this->fungsi->Tambah_Data('data_reservasi', $tambah);
						$where = array( 
							"Pencarian" 				=> $Pencarian
						);
						$hasil = $this->fungsi->Hapus_Data('data_jadwal', $where);
						redirect('pengurus/jadwalkbm');
						}

					else if ( $ambil[0]['Kelas'] == "SBMPTN" ){
						$tambah_data = $this->fungsi->Tambah_Data('data_reservasi_sbmptn', $tambah);
						$where = array( 
							"Pencarian" 				=> $Pencarian
						);
						$hasil = $this->fungsi->Hapus_Data('data_jadwal', $where);
						redirect('pengurus/jadwalkbm');
					}

				}else{
					redirect('pengurus/logout');
				}
			}else{
				redirect('pengurus/logout');
			}


		}else{
			redirect('pengurus/logout');
		}
	}


//--------------------------------------------------------------------laman data siswa
	public function DataSiswa(){
		if ($_SESSION != null){
			$No_Pengurus = $_SESSION['No_ID'];
			$Password = $_SESSION['Password'];
			$hasil = $this->fungsi->Ambil_Data('acount_pengurus ', "where No_Pengurus = '$No_Pengurus'");
			if (count($hasil) == 1){

			if ( $Password == $hasil[0]['Password'] ){
				$hasil = $this->fungsi->Ambil_Data('acount_siswa');
				if (date('M', time()) == "Jan" || date('M', time()) == "Jul"){
					$this->load->view('pengurus/jumlah_siswa_databesing', array('data' => $hasil ));
				}
				else {
					$this->load->view('pengurus/jumlah_siswa', array('data' => $hasil ));
				}
			}else{
				redirect('pengurus/logout');
			}

			}else{
				redirect('pengurus/logout');
			}

		}else{
			redirect('pengurus/logout');
		}
	}

	
	public function DataKelompokSiswa($namakelompok){
		if ($_SESSION != null){
			$No_Pengurus = $_SESSION['No_ID'];
			$Password = $_SESSION['Password'];
			$hasil = $this->fungsi->Ambil_Data('acount_pengurus ', "where No_Pengurus = '$No_Pengurus'");
			if (count($hasil) == 1){

			if ( $Password == $hasil[0]['Password'] ){
				$data = explode (" ",$namakelompok);
				$datahasil = "";
				for ($i=0; $i < count($data)-1; $i++) { 
					$datahasil =  $datahasil.$data[$i]." ";
				}
                                $Kelompok = $datahasil.$data[count($data)-1];
				$hasil = $this->fungsi->Ambil_Data('acount_siswa ', "where Kelompok = '$Kelompok'");
				$this->load->view('pengurus/kelompok_siswa', array('data' => $hasil ));
			}else{
				redirect('pengurus/logout');
			}

			}else{
				redirect('pengurus/logout');
			}

		}else{
			redirect('pengurus/logout');
		}
	}

	public function UbahKelompok ($Kelompok){
		if ($_SESSION != null){
			$No_Pengurus = $_SESSION['No_ID'];
			$Password = $_SESSION['Password'];
			$hasil = $this->fungsi->Ambil_Data('acount_pengurus ', "where No_Pengurus = '$No_Pengurus'");
			if (count($hasil) == 1){

			if ( $Password == $hasil[0]['Password'] ){
				$hasil = $this->fungsi->Ambil_Data('acount_siswa ', "where Kelompok = '$Kelompok'");
				$_SESSION['Nama_Siswa'] = $hasil[0]['Nama_Siswa'];
				$_SESSION['No_Siswa'] = $hasil[0]['No_Siswa'];				
				$kirim = array( 
						"No_Siswa"			=> $hasil[0]['No_Siswa'],
						"Nama_Siswa" 		=> $hasil[0]['Nama_Siswa'],
						"Kelompok"			=> $hasil[0]['Kelompok'],
						"Photo"				=> $hasil[0]['Photo']
						);
				$this->load->view('pengurus/form_ubah_kelompok', $kirim);	
			}else{
				redirect('pengurus/logout');
			}

			}else{
				redirect('pengurus/logout');
			}

		}else{
			redirect('pengurus/logout');
		}
	}

	public function UpdateKelompok(){
		if ($_SESSION != null){
			$No_Pengurus = $_SESSION['No_ID'];
			$Password = $_SESSION['Password'];
			$hasil = $this->fungsi->Ambil_Data('acount_pengurus ', "where No_Pengurus = '$No_Pengurus'");
			if (count($hasil) == 1){

			if ( $Password == $hasil[0]['Password'] ){
				$ubah = array( 
						"Kelompok"			=> $_POST['Kelompok']
						);
    			$where = array('No_Siswa' => $_POST['No_Siswa']);
    			$hasil = $this->fungsi->Ubah_Data('acount_siswa', $ubah, $where);
    			redirect('pengurus/DataSiswa');
			}else{
				redirect('pengurus/logout');
			}

			}else{
				redirect('pengurus/logout');
			}

		}else{
				redirect('pengurus/logout');
		}	
	}


	public function TambahSiswa($Nomor){
		if ($_SESSION != null){
			$No_Pengurus = $_SESSION['No_ID'];
			$Password = $_SESSION['Password'];
			$hasil = $this->fungsi->Ambil_Data('acount_pengurus ', "where No_Pengurus = '$No_Pengurus'");
			if (count($hasil) == 1){

			if ( $Password == $hasil[0]['Password'] ){
				$No_Siswa = (40*1000000) + ($_SESSION['Code_Semester']*100000) + ($_SESSION['Code_Tahun']*1000) + $Nomor + 1;
				$No_Kirim = $Nomor + 1;
				$kirim = array( 
						"Nama_Pengurus" => $_SESSION['Nama_Pengurus'],
						"No_Pengurus" 	=> $_SESSION['No_ID'],
						"No" 			=> $No_Kirim,
						"No_Siswa"		=> $No_Siswa
						);
				$this->load->view('pengurus/form_tambah_siswa', $kirim);
			}else{
				redirect('pengurus/logout');
			}

			}else{
				redirect('pengurus/logout');
			}

		}else{
			redirect('pengurus/logout');
		}
	}

	public function DataSiswaBaru(){
		if ($_SESSION != null){
			$No_Pengurus = $_SESSION['No_ID'];
			$Password = $_SESSION['Password'];
			$hasil = $this->fungsi->Ambil_Data('acount_pengurus ', "where No_Pengurus = '$No_Pengurus'");
			if (count($hasil) == 1){

			if ( $Password == $hasil[0]['Password'] ){
			   	if ($_POST['No_Siswa'] == null || $_POST['Kelompok'] == null ){
					echo "<script type=\"text/javascript\">
					alert(\"Tidak ada yang boleh kosong\");
					</script>";
					$No_Siswa = (40*1000000) + ($_SESSION['Code_Semester']*100000) + ($_SESSION['Code_Tahun']*1000) + $_POST['No'];
					$No_Kirim = $_POST['No'];
					$kirim = array( 
							"Nama_Pengurus" => $_SESSION['Nama_Pengurus'],
							"No_Pengurus" 	=> $_SESSION['No_ID'],
							"No" 			=> $No_Kirim,
							"No_Siswa"		=> $No_Siswa
							);
					$this->load->view('pengurus/form_tambah_siswa', $kirim);
				}
				else{
					$hasil = $this->fungsi->Ambil_Data('acount_siswa');
					
					$tambah 	= array(
				   		'No' 			=> count($hasil) + 1,
		   				'No_Siswa' 		=> (40*1000000) + ($_SESSION['Code_Semester']*100000) + ($_SESSION['Code_Tahun']*1000) + count($hasil) + 1,
						'Nama_Siswa' 	=> $_POST['Nama_Siswa'],
						'Password' 		=> $_POST['Password'],
						'Kelompok'		=> $_POST['Kelompok'],
						'Total_Biaya'	=> $_POST['Total_Biaya'],
						'Paket'			=> $_POST['Paket'],
						'Tahun'			=> date('Y', time()),
						'Semester'		=> $_SESSION['Code_Semester']
					); 
				    $hasil = $this->fungsi->Tambah_Data('acount_siswa', $tambah);
					redirect('/pengurus/DataSiswa');
				}
			}else{
				redirect('pengurus/logout');
			}

			}else{
				redirect('pengurus/logout');
			}

		}else{
				redirect('pengurus/logout');
		}

	}

	public function DataReservasi(){
		if ($_SESSION != null){
			$No_Pengurus = $_SESSION['No_ID'];
			$Password = $_SESSION['Password'];
			$hasil = $this->fungsi->Ambil_Data('acount_pengurus ', "where No_Pengurus = '$No_Pengurus'");
			if (count($hasil) == 1){

			if ( $Password == $hasil[0]['Password'] ){
				$hasil = $this->fungsi->Ambil_Data('data_reservasi');
				$this->load->view('pengurus/reservasi', array( 'data' => $hasil ));
			}else{
				redirect('pengurus/logout');
			}

			}else{
				redirect('pengurus/logout');
			}

		}else{
				redirect('pengurus/logout');
		}		
	}

	public function ajaxlesprivat (){
		$Status = "Lelang";
		$hasil = $this->fungsi->Ambil_Data('data_reservasi ', "where Status = '$Status'");
		echo json_encode($hasil);
	}

	public function cekDataSiswa ($No_Induk){
		if ($_SESSION != null){
			$No_Pengurus = $_SESSION['No_ID'];
			$Password = $_SESSION['Password'];
			$hasil = $this->fungsi->Ambil_Data('acount_pengurus ', "where No_Pengurus = '$No_Pengurus'");
			if (count($hasil) == 1){

			if ( $Password == $hasil[0]['Password'] ){
				$hasil = $this->fungsi->Ambil_Data('acount_siswa ', "where No_Siswa = '$No_Induk'");
				$_SESSION['Nama_Siswa'] = $hasil[0]['Nama_Siswa'];
				$_SESSION['No_Siswa'] = $hasil[0]['No_Siswa'];				
				$kirim = array( 
						"No_Siswa"			=> $hasil[0]['No_Siswa'],
						"Nama_Siswa" 		=> $hasil[0]['Nama_Siswa'],
						"Nama_Panggilan"	=> $hasil[0]['Nama_Panggilan'],
						"Jenis_Kelamin"		=> $hasil[0]['Jenis_Kelamin'],
						"TTL"				=> $hasil[0]['TTL'],
						"No_Hp"				=> $hasil[0]['No_Hp'],
						"Kelas"				=> $hasil[0]['Kelas'],
						"Sekolah"			=> $hasil[0]['Sekolah'],
						"Tahun"				=> $hasil[0]['Tahun'],
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
						"Password"			=> $hasil[0]['Password'],
						"Kelompok"			=> $hasil[0]['Kelompok'],
						"Photo"				=> $hasil[0]['Photo'] 
						);
				$this->load->view('pengurus/cek_data_siswa', $kirim);	
			}else{
				redirect('pengurus/logout');
			}

			}else{
				redirect('pengurus/logout');
			}

		}else{
				redirect('pengurus/logout');
		}

	}

	public function DataKeuangan ($Nomor_Induk){
		if ($_SESSION != null){
			$No_Pengurus = $_SESSION['No_ID'];
			$Password = $_SESSION['Password'];
			$hasil = $this->fungsi->Ambil_Data('acount_pengurus ', "where No_Pengurus = '$No_Pengurus'");
			if (count($hasil) == 1){

			if ( $Password == $hasil[0]['Password'] ){
				$hasil = $this->fungsi->Ambil_Data('acount_siswa ', "where No_Siswa = '$Nomor_Induk'");
				$_SESSION['Nama_Siswa'] = $hasil[0]['Nama_Siswa'];
				$_SESSION['No_Siswa'] = $hasil[0]['No_Siswa'];				
				$kirim = array( 
						"No_Siswa"			=> $hasil[0]['No_Siswa'],
						"Nama_Siswa" 		=> $hasil[0]['Nama_Siswa'],
						"No_Hp"				=> $hasil[0]['No_Hp'],
						"Jaket"				=> "Rp ".$hasil[0]['Jaket'],	
						"Paket"				=> $hasil[0]['Paket'],	
						"Total_Biaya"		=> "Rp ".$hasil[0]['Total_Biaya'],	
						"Modul"				=> "Rp ".$hasil[0]['Modul'],
						"Cicilan1"			=> "Rp ".$hasil[0]['Cicilan1'],
						"Cicilan2"			=> "Rp ".$hasil[0]['Cicilan2'],
						"Cicilan3"			=> "Rp ".$hasil[0]['Cicilan3'],
						"Photo"				=> $hasil[0]['Photo'] 
					);
				$this->load->view('pengurus/data_keuangan', $kirim);	
			}else{
				redirect('pengurus/logout');
			}

			}else{
				redirect('pengurus/logout');
			}

		}else{
			redirect('pengurus/logout');
		}
	}

	public function ubahDataKeuagan ($Nomor_Induk){
		if ($_SESSION != null){
			$No_Pengurus = $_SESSION['No_ID'];
			$Password = $_SESSION['Password'];
			$hasil = $this->fungsi->Ambil_Data('acount_pengurus ', "where No_Pengurus = '$No_Pengurus'");
			if (count($hasil) == 1){

			if ( $Password == $hasil[0]['Password'] ){
				$hasil = $this->fungsi->Ambil_Data('acount_siswa ', "where No_Siswa = '$Nomor_Induk'");
				$_SESSION['Nama_Siswa'] = $hasil[0]['Nama_Siswa'];
				$_SESSION['No_Siswa'] = $hasil[0]['No_Siswa'];				
				$kirim = array( 
						"Nama_Pengurus"		=> $_SESSION['Nama_Pengurus'],
						"No_Pengurus"		=> $_SESSION['No_ID'],
						"No_Siswa"			=> $hasil[0]['No_Siswa'],
						"Total_Biaya" 		=> $hasil[0]['Total_Biaya'],
						"Nama_Siswa" 		=> $hasil[0]['Nama_Siswa'],
						"No_Hp"				=> $hasil[0]['No_Hp'],
						"Jaket"				=> $hasil[0]['Jaket'],	
						"Modul"				=> $hasil[0]['Modul'],
						"Cicilan1"			=> $hasil[0]['Cicilan1'],
						"Cicilan2"			=> $hasil[0]['Cicilan2'],
						"Cicilan3"			=> $hasil[0]['Cicilan3'],
						"Photo"				=> $hasil[0]['Photo']
						);
				$this->load->view('pengurus/form_ubah_data_keuangan', $kirim);	
			}else{
				redirect('pengurus/logout');
			}

			}else{
				redirect('pengurus/logout');
			}

		}else{
				redirect('pengurus/logout');
		}
	}

	public function UpdateDataKeuagan(){
		if ($_SESSION != null){
			$No_Pengurus = $_SESSION['No_ID'];
			$Password = $_SESSION['Password'];
			$hasil = $this->fungsi->Ambil_Data('acount_pengurus ', "where No_Pengurus = '$No_Pengurus'");
			if (count($hasil) == 1){

			if ( $Password == $hasil[0]['Password'] ){
				$ubah = array( 
						"Jaket"				=> $_POST['Jaket'],	
						"Modul"				=> $_POST['Modul'],
						"Paket"				=> $_POST['Paket'],
						"Total_Biaya"		=> $_POST['Total_Biaya'],
						"Cicilan1"			=> $_POST['Cicilan1'],
						"Cicilan2"			=> $_POST['Cicilan2'],
						"Cicilan3"			=> $_POST['Cicilan3']
						);
    			$where = array('No_Siswa' => $_POST['No_Siswa']);
    			$hasil = $this->fungsi->Ubah_Data('acount_siswa', $ubah, $where);
    			redirect('pengurus/DataKeuangan/'.$_POST['No_Siswa']);
			}else{
				redirect('pengurus/logout');
			}

			}else{
				redirect('pengurus/logout');
			}

		}else{
				redirect('pengurus/logout');
		}
	}

	public function daftartunggu(){
		if ($_SESSION != null){
			$No_Pengurus = $_SESSION['No_ID'];
			$Password = $_SESSION['Password'];
			$hasil = $this->fungsi->Ambil_Data('acount_pengurus ', "where No_Pengurus = '$No_Pengurus'");
			if (count($hasil) == 1){
				if ( $Password == $hasil[0]['Password'] ){
					$hasil = $this->fungsi->Ambil_Data('data_reservasi ', "where Status = '$No_Pengurus'");
					$this->load->view('pengurus/daftar_tunggu', array( 'data' => $hasil ));
				}else{
					redirect('pengurus/logout');
				}
			}else{
				redirect('pengurus/logout');
			}


		}else{
			redirect('pengurus/logout');
		}
	}


	public function lelangreservasi($yangmana){
		if ($_SESSION != null){
			$No_Pengurus = $_SESSION['No_ID'];
			$Password = $_SESSION['Password'];
			$hasil = $this->fungsi->Ambil_Data('acount_pengurus ', "where No_Pengurus = '$No_Pengurus'");
			if (count($hasil) == 1){
				if ( $Password == $hasil[0]['Password'] ){
					
				$ubah = array( 
						"Status"			=> "Lelang"
						);
    			$where = array('No_Siswa' => $yangmana);
    			$hasil = $this->fungsi->Ubah_Data('data_reservasi', $ubah, $where);
    		        redirect('pengurus/daftartunggu');
				}else{
					redirect('pengurus/logout');
				}
			}else{
				redirect('pengurus/logout');
			}


		}else{
			redirect('pengurus/logout');
		}
	}


	public function DataLes ($data, $data2){

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
			$No_Pengurus = $_SESSION['No_ID'];
			$Password = $_SESSION['Password'];
			$hasil = $this->fungsi->Ambil_Data('acount_pengurus ', "where No_Pengurus = '$No_Pengurus'");
			if (count($hasil) == 1){

			if ( $Password == $hasil[0]['Password'] ){
				$No_Siswa = $data;
				$hasil = $this->fungsi->Ambil_Data('acount_siswa ', "where No_Siswa = '$No_Siswa'");
				$_SESSION['Nama_Siswa'] = $hasil[0]['Nama_Siswa'];
				$_SESSION['No_Siswa'] = $hasil[0]['No_Siswa'];
				$Kelompok = $hasil[0]['Kelompok'];				
				$hasil = $this->fungsi->Ambil_Data('data_riwayat ', "where Kelompok = '$Kelompok'");
				$this->load->view('pengurus/riwayat_les', array( 'data' => $hasil ));
			}else{
				redirect('pengurus/logout');
			}

			}else{
				redirect('pengurus/logout');
			}

		}else{
			redirect('pengurus/logout');
		}
	}

//------------------------------------------------------------------laman data siswa reguler

	public function DataSiswaReguler(){
		if ($_SESSION != null){
			$No_Pengurus = $_SESSION['No_ID'];
			$Password = $_SESSION['Password'];
			$hasil = $this->fungsi->Ambil_Data('acount_pengurus ', "where No_Pengurus = '$No_Pengurus'");
			if (count($hasil) == 1){

			if ( $Password == $hasil[0]['Password'] ){
				$hasil = $this->fungsi->Ambil_Data('acount_siswa_reguler');
				if (date('M', time()) == "Jan" || date('M', time()) == "Jul"){
					$this->load->view('pengurus/jumlah_siswa_reguler_databesing', array('data' => $hasil ));
				}
				else {
					$this->load->view('pengurus/jumlah_siswa_reguler', array('data' => $hasil ));
				}
			}else{
				redirect('pengurus/logout');
			}

			}else{
				redirect('pengurus/logout');
			}
		}else{
			redirect('pengurus/logout');
		}

	}


	public function DataKelompokSiswaReguler($namakelompok){
		if ($_SESSION != null){
			$No_Pengurus = $_SESSION['No_ID'];
			$Password = $_SESSION['Password'];
			$hasil = $this->fungsi->Ambil_Data('acount_pengurus ', "where No_Pengurus = '$No_Pengurus'");
			if (count($hasil) == 1){

			if ( $Password == $hasil[0]['Password'] ){
				$Kelompok = $namakelompok;
				$hasil = $this->fungsi->Ambil_Data('acount_siswa_reguler ', "where Kelompok = '$Kelompok'");
				$this->load->view('pengurus/kelompok_siswa_reguler', array('data' => $hasil ));
			}else{
				redirect('pengurus/logout');
			}

			}else{
				redirect('pengurus/logout');
			}

		}else{
				redirect('pengurus/logout');
		}
	}

	public function UbahKelompokReguler ($Kelompok){
		if ($_SESSION != null){
			$No_Pengurus = $_SESSION['No_ID'];
			$Password = $_SESSION['Password'];
			$hasil = $this->fungsi->Ambil_Data('acount_pengurus ', "where No_Pengurus = '$No_Pengurus'");
			if (count($hasil) == 1){

			if ( $Password == $hasil[0]['Password'] ){
				$hasil = $this->fungsi->Ambil_Data('acount_siswa_reguler ', "where Kelompok = '$Kelompok'");
				$_SESSION['Nama_Siswa'] = $hasil[0]['Nama_Siswa'];
				$_SESSION['No_Siswa'] = $hasil[0]['No_Siswa'];				
				$kirim = array( 
						"No_Siswa"			=> $hasil[0]['No_Siswa'],
						"Nama_Siswa" 		=> $hasil[0]['Nama_Siswa'],
						"Kelompok"			=> $hasil[0]['Kelompok'],
						"Photo"				=> $hasil[0]['Photo']
						);
				$this->load->view('pengurus/form_ubah_kelompok_reguler', $kirim);	
			}else{
				redirect('pengurus/logout');
			}

			}else{
				redirect('pengurus/logout');
			}

		}else{
				redirect('pengurus/logout');
		}
	}

	public function UpdateKelompokReguler(){
		if ($_SESSION != null){
			$No_Pengurus = $_SESSION['No_ID'];
			$Password = $_SESSION['Password'];
			$hasil = $this->fungsi->Ambil_Data('acount_pengurus ', "where No_Pengurus = '$No_Pengurus'");
			if (count($hasil) == 1){

			if ( $Password == $hasil[0]['Password'] ){
				$ubah = array( 
						"Kelompok"			=> $_POST['Kelompok']
						);
    			$where = array('No_Siswa' => $_POST['No_Siswa']);
    			$hasil = $this->fungsi->Ubah_Data('acount_siswa_reguler', $ubah, $where);
    			redirect('pengurus/DataSiswaReguler');
			}else{
				redirect('pengurus/logout');
			}

			}else{
				redirect('pengurus/logout');
			}

		}else{
				redirect('pengurus/logout');
		}

	}



	public function TambahSiswaReguler($Nomor){
		if ($_SESSION != null){
			$No_Pengurus = $_SESSION['No_ID'];
			$Password = $_SESSION['Password'];
			$hasil = $this->fungsi->Ambil_Data('acount_pengurus ', "where No_Pengurus = '$No_Pengurus'");
			if (count($hasil) == 1){

			if ( $Password == $hasil[0]['Password'] ){
				$No_Siswa = (50*1000000) + ($_SESSION['Code_Semester']*100000) + ($_SESSION['Code_Tahun']*1000) + $Nomor + 1;
				$No_Kirim = $Nomor + 1;
				$kirim = array( 
						"Nama_Pengurus" => $_SESSION['Nama_Pengurus'],
						"No_Pengurus" 	=> $_SESSION['No_ID'],
						"No" 			=> $No_Kirim,
						"No_Siswa"		=> $No_Siswa
						);
				$this->load->view('pengurus/form_tambah_siswa_reguler', $kirim);
			}else{
				redirect('pengurus/logout');
			}

			}else{
				redirect('pengurus/logout');
			}

		}else{
				redirect('pengurus/logout');
		}

	}

	public function DataSiswaRegulerBaru(){
		if ($_SESSION != null){
			$No_Pengurus = $_SESSION['No_ID'];
			$Password = $_SESSION['Password'];
			$hasil = $this->fungsi->Ambil_Data('acount_pengurus ', "where No_Pengurus = '$No_Pengurus'");
			if (count($hasil) == 1){

			if ( $Password == $hasil[0]['Password'] ){
			   	if ($_POST['No_Siswa'] == null || $_POST['Kelompok'] == null ){
					echo "<script type=\"text/javascript\">
					alert(\"Tidak ada yang boleh kosong\");
					</script>";

					$No_Siswa = (50*1000000) + ($_SESSION['Code_Semester']*100000) + ($_SESSION['Code_Tahun']*1000) + $_POST['No'];
					$No_Kirim = $_POST['No'];
					$kirim = array( 
							"Nama_Pengurus" => $_SESSION['Nama_Pengurus'],
							"No_Pengurus" 	=> $_SESSION['No_ID'],
							"No" 			=> $No_Kirim,
							"No_Siswa"		=> $No_Siswa
							);
					$this->load->view('pengurus/form_tambah_siswa_reguler', $kirim);
				}
				else{
					$hasil = $this->fungsi->Ambil_Data('acount_siswa_reguler');
					$tambah 	= array(
				   		'No' 			=> count($hasil) + 1,
		   				'No_Siswa' 		=> (50*1000000) + ($_SESSION['Code_Semester']*100000) + ($_SESSION['Code_Tahun']*1000) + count($hasil) + 1,
						'Nama_Siswa' 	=> $_POST['Nama_Siswa'],
						'Password' 		=> $_POST['Password'],
						'Kelompok' 		=> $_POST['Kelompok'],
						'Total_Biaya'	=> $_POST['Total_Biaya'],
						'Paket' 		=> $_POST['Paket'],
						'Tahun'			=> date('Y', time()),
						'Semester'		=> $_SESSION['Code_Semester']
					); 
				    $hasil = $this->fungsi->Tambah_Data('acount_siswa_reguler', $tambah);
					redirect('/pengurus/DataSiswaReguler');				
				}
			}else{
				redirect('pengurus/logout');
			}

			}else{
				redirect('pengurus/logout');
			}

		}else{
				redirect('pengurus/logout');
		}

	}


	public function cekDataSiswaReguler ($No_Induk){
		if ($_SESSION != null){
			$No_Pengurus = $_SESSION['No_ID'];
			$Password = $_SESSION['Password'];
			$hasil = $this->fungsi->Ambil_Data('acount_pengurus ', "where No_Pengurus = '$No_Pengurus'");
			if (count($hasil) == 1){

			if ( $Password == $hasil[0]['Password'] ){
				$No_Siswa = $No_Induk;
				$hasil = $this->fungsi->Ambil_Data('acount_siswa_reguler ', "where No_Siswa = '$No_Siswa'");
				$_SESSION['Nama_Siswa'] = $hasil[0]['Nama_Siswa'];
				$_SESSION['No_Siswa'] = $hasil[0]['No_Siswa'];				
				$kirim = array( 
						"No_Siswa"			=> $hasil[0]['No_Siswa'],
						"Nama_Siswa" 		=> $hasil[0]['Nama_Siswa'],
						"Nama_Panggilan"	=> $hasil[0]['Nama_Panggilan'],
						"Jenis_Kelamin"		=> $hasil[0]['Jenis_Kelamin'],
						"TTL"				=> $hasil[0]['TTL'],
						"No_Hp"				=> $hasil[0]['No_Hp'],
						"Kelas"				=> $hasil[0]['Kelas'],
						"Kelompok"			=> $hasil[0]['Kelompok'],
						"Sekolah"			=> $hasil[0]['Sekolah'],
						"Tahun"				=> $hasil[0]['Tahun'],
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
						"Password"			=> $hasil[0]['Password'],
						"Photo"				=> $hasil[0]['Photo'] 
						);
				$this->load->view('pengurus/cek_data_siswa_reguler', $kirim);	
			}else{
				redirect('pengurus/logout');
			}

			}else{
				redirect('pengurus/logout');
			}

		}else{
				redirect('pengurus/logout');
		}

	}

	public function DataKeuanganReguler ($Nomor_Induk){
		if ($_SESSION != null){
			$No_Pengurus = $_SESSION['No_ID'];
			$Password = $_SESSION['Password'];
			$hasil = $this->fungsi->Ambil_Data('acount_pengurus ', "where No_Pengurus = '$No_Pengurus'");
			if (count($hasil) == 1){

			if ( $Password == $hasil[0]['Password'] ){
				$hasil = $this->fungsi->Ambil_Data('acount_siswa_reguler ', "where No_Siswa = '$Nomor_Induk'");
				$_SESSION['Nama_Siswa'] = $hasil[0]['Nama_Siswa'];
				$_SESSION['No_Siswa'] = $hasil[0]['No_Siswa'];				
				$kirim = array( 
						"No_Siswa"			=> $hasil[0]['No_Siswa'],
						"Nama_Siswa" 		=> $hasil[0]['Nama_Siswa'],
						"No_Hp"				=> $hasil[0]['No_Hp'],
						"Jaket"				=> "Rp ".$hasil[0]['Jaket'],	
						"Paket"				=> $hasil[0]['Paket'],	
						"Total_Biaya"		=> "Rp ".$hasil[0]['Total_Biaya'],	
						"Modul"				=> "Rp ".$hasil[0]['Modul'],
						"Cicilan1"			=> "Rp ".$hasil[0]['Cicilan1'],
						"Cicilan2"			=> "Rp ".$hasil[0]['Cicilan2'],
						"Cicilan3"			=> "Rp ".$hasil[0]['Cicilan3'],
						"Photo"				=> $hasil[0]['Photo'] 
					);
				$this->load->view('pengurus/data_keuangan_reguler', $kirim);	
			}else{
				redirect('pengurus/logout');
			}

			}else{
				redirect('pengurus/logout');
			}

		}else{
			redirect('pengurus/logout');
		}
	}

	public function ubahDataKeuaganReguler ($Nomor_Induk){
		if ($_SESSION != null){
			$No_Pengurus = $_SESSION['No_ID'];
			$Password = $_SESSION['Password'];
			$hasil = $this->fungsi->Ambil_Data('acount_pengurus ', "where No_Pengurus = '$No_Pengurus'");
			if (count($hasil) == 1){

			if ( $Password == $hasil[0]['Password'] ){
				$hasil = $this->fungsi->Ambil_Data('acount_siswa_reguler ', "where No_Siswa = '$Nomor_Induk'");
				$_SESSION['Nama_Siswa'] = $hasil[0]['Nama_Siswa'];
				$_SESSION['No_Siswa'] = $hasil[0]['No_Siswa'];				
				$kirim = array( 
						"Nama_Pengurus"		=> $_SESSION['Nama_Pengurus'],
						"No_Pengurus"		=> $_SESSION['No_ID'],
						"No_Siswa"			=> $hasil[0]['No_Siswa'],
						"Nama_Siswa" 		=> $hasil[0]['Nama_Siswa'],
						"No_Hp"				=> $hasil[0]['No_Hp'],
						"Photo"				=> $hasil[0]['Photo'],
						"Jaket"				=> $hasil[0]['Jaket'],	
						"Total_Biaya"		=> $hasil[0]['Total_Biaya'],	
						"Modul"				=> $hasil[0]['Modul'],
						"Cicilan1"			=> $hasil[0]['Cicilan1'],
						"Cicilan2"			=> $hasil[0]['Cicilan2'],
						"Cicilan3"			=> $hasil[0]['Cicilan3']
						);
				$this->load->view('pengurus/form_ubah_data_keuangan_reguler', $kirim);	
			}else{
				redirect('pengurus/logout');
			}

			}else{
				redirect('pengurus/logout');
			}

		}else{
				redirect('pengurus/logout');
		}
	}

	public function UpdateDataKeuaganReguler(){
		if ($_SESSION != null){
			$No_Pengurus = $_SESSION['No_ID'];
			$Password = $_SESSION['Password'];
			$hasil = $this->fungsi->Ambil_Data('acount_pengurus ', "where No_Pengurus = '$No_Pengurus'");
			if (count($hasil) == 1){

			if ( $Password == $hasil[0]['Password'] ){
				$ubah = array( 
						"Jaket"				=> $_POST['Jaket'],	
						"Modul"				=> $_POST['Modul'],
						"Paket"				=> $_POST['Paket'],
						"Total_Biaya"		=> $_POST['Total_Biaya'],
						"Cicilan1"			=> $_POST['Cicilan1'],
						"Cicilan2"			=> $_POST['Cicilan2'],
						"Cicilan3"			=> $_POST['Cicilan3']
						);
    			$where = array('No_Siswa' => $_POST['No_Siswa']);
    			$hasil = $this->fungsi->Ubah_Data('acount_siswa_reguler', $ubah, $where);
    			redirect('pengurus/DataKeuanganReguler/'.$_POST['No_Siswa']);
			}else{
				redirect('pengurus/logout');
			}

			}else{
				redirect('pengurus/logout');
			}

		}else{
				redirect('pengurus/logout');
		}
	}

	public function daftartunggureguler(){
		if ($_SESSION != null){
			$No_Pengurus = $_SESSION['No_ID'];
			$Password = $_SESSION['Password'];
			$hasil = $this->fungsi->Ambil_Data('acount_pengurus ', "where No_Pengurus = '$No_Pengurus'");
			if (count($hasil) == 1){
				if ( $Password == $hasil[0]['Password'] ){
					$hasil = $this->fungsi->Ambil_Data('data_reservasi_reguler ', "where Status = '$No_Pengurus'");
					$this->load->view('pengurus/daftar_tunggu_reguler', array( 'data' => $hasil ));
				}else{
					redirect('pengurus/logout');
				}
			}else{
				redirect('pengurus/logout');
			}


		}else{
			redirect('pengurus/logout');
		}
	}


	public function lelangreservasireguler($yangmana){
		if ($_SESSION != null){
			$No_Pengurus = $_SESSION['No_ID'];
			$Password = $_SESSION['Password'];
			$hasil = $this->fungsi->Ambil_Data('acount_pengurus ', "where No_Pengurus = '$No_Pengurus'");
			if (count($hasil) == 1){
				if ( $Password == $hasil[0]['Password'] ){
					
				$ubah = array( 
						"Status"			=> "Lelang"
						);
    			$where = array('Pencarian' => $yangmana);
    			$hasil = $this->fungsi->Ubah_Data('data_reservasi_reguler', $ubah, $where);
    		
				}else{
					redirect('pengurus/logout');
				}
			}else{
				redirect('pengurus/logout');
			}


		}else{
			redirect('pengurus/logout');
		}
	}

	public function DataLesReguler ($data, $data2){

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
			$No_Pengurus = $_SESSION['No_ID'];
			$Password = $_SESSION['Password'];
			$hasil = $this->fungsi->Ambil_Data('acount_pengurus ', "where No_Pengurus = '$No_Pengurus'");
			if (count($hasil) == 1){

			if ( $Password == $hasil[0]['Password'] ){
				$No_Siswa = $data;
				$hasil = $this->fungsi->Ambil_Data('acount_siswa_reguler ', "where No_Siswa = '$No_Siswa'");
				$_SESSION['Nama_Siswa'] = $hasil[0]['Nama_Siswa'];
				$_SESSION['No_Siswa'] = $hasil[0]['No_Siswa'];
				$Kelompok = $data2;				
				$hasil = $this->fungsi->Ambil_Data('data_riwayat ', "where Kelompok = '$Kelompok'");
				$this->load->view('pengurus/riwayat_les_reguler', array( 'data' => $hasil ));
			}else{
				 redirect('pengurus/logout');
			}

			}else{
				redirect('pengurus/logout');
			}

		}else{
			redirect('pengurus/logout');
		}

	}

	public function ajaxlesleguler (){
		$Status = "Lelang";
		$hasil = $this->fungsi->Ambil_Data('data_reservasi_reguler ', "where Status = '$Status'");
		echo json_encode($hasil);
	}

	public function TambahLesReguler(){
		if ($_SESSION != null){
			$No_Pengurus = $_SESSION['No_ID'];
			$Password = $_SESSION['Password'];
			$hasil = $this->fungsi->Ambil_Data('acount_pengurus ', "where No_Pengurus = '$No_Pengurus'");
			if (count($hasil) == 1){

			if ( $Password == $hasil[0]['Password'] ){
				$hasil = $this->fungsi->Ambil_Data('data_reservasi_reguler');
				$this->load->view('pengurus/les_reguler', array( 'data' => $hasil ));
			}else{
				redirect('pengurus/logout');
			}

			}else{
				redirect('pengurus/logout');
			}

		}else{
			redirect('pengurus/logout');
		}
	}

	public function Lelang(){
		if ($_SESSION != null){
			$No_Pengurus = $_SESSION['No_ID'];
			$Password = $_SESSION['Password'];
			$hasil = $this->fungsi->Ambil_Data('acount_pengurus ', "where No_Pengurus = '$No_Pengurus'");
			if (count($hasil) == 1){

			if ( $Password == $hasil[0]['Password'] ){
				$this->load->view('pengurus/lelang');
			}else{
				redirect('pengurus/logout');
			}

			}else{
				redirect('pengurus/logout');
			}

		}else{
			redirect('pengurus/logout');
		}
	}

	public function Tambah_Lelang(){
		if ($_POST['Bulan'] == 1){
			$Bulan		=	"Januari";
			$Kode_Bulan =	"JA";
		}
		else if ($_POST['Bulan'] == 2){
			$Bulan		=	"Februari";
			$Kode_Bulan =	"FB";
		}
		else if ($_POST['Bulan'] == 3){
			$Bulan		=	"Maret";
			$Kode_Bulan =	"MR";
		}
		else if ($_POST['Bulan'] == 4){
			$Bulan		=	"April";
			$Kode_Bulan =	"AP";
		}
		else if ($_POST['Bulan'] == 5){
			$Bulan		=	"Mei";
			$Kode_Bulan =	"MI";
		}
		else if ($_POST['Bulan'] == 6){
			$Bulan		=	"Juni";
			$Kode_Bulan =	"JN";
		}
		else if ($_POST['Bulan'] == 7){
			$Bulan		=	"Juli";
			$Kode_Bulan =	"JL";
		}
		else if ($_POST['Bulan'] == 8){
			$Bulan		=	"Agustus";
			$Kode_Bulan =	"AG";
		}
		else if ($_POST['Bulan'] == 9){
			$Bulan		=	"September";
			$Kode_Bulan =	"SP";
		}
		else if ($_POST['Bulan'] == 10){
			$Bulan		=	"Oktober";
			$Kode_Bulan =	"OK";
		}
		else if ($_POST['Bulan'] == 11){
			$Bulan		=	"November";
			$Kode_Bulan =	"NV";
		}
		else if ($_POST['Bulan'] == 12){
			$Bulan		=	"Desember";
			$Kode_Bulan =	"DS";
		}

		if ($_POST['Tanggal'] <= 9) $Tanggal = "0".$_POST['Tanggal'];
		else $Tanggal = $_POST['Tanggal'];

		$Kode_Reservasi = $_SESSION['Kode_Share'].$_POST['Kelompok'].$Tanggal.$Kode_Bulan."16";
		$kirim = array( 
						"Kode_Reservasi"		=> $Kode_Reservasi,
						"Kelompok"				=> $_POST['Kelompok'],
						"Jam"					=> " jam "."16".":"."00",
						"Kode_Waktu"			=> (date('Y', time())*1000000)+($_POST['Bulan']*10000)+($_POST['Tanggal']*100)+16,
						"Hari_Tanggal"			=> $_POST['Hari']." ".$Tanggal." ".$Bulan,
						"Materi"				=> $_POST['Materi'],
						"Kriteria_Pengajar"		=> $_POST['Kriteria_Pengajar'],
						"Pencarian"				=> $_POST['Kelompok'].$Kode_Reservasi,
						"Semester"				=> $_SESSION['Code_Semester']
						);
		$hasil = $this->fungsi->Tambah_Data('data_reservasi_reguler', $kirim);
		redirect('pengurus/TambahLesReguler');
	}

//--------------------------------------------------------------------laman data siswa
	public function DataSiswaSBM(){
		if ($_SESSION != null){
			$No_Pengurus = $_SESSION['No_ID'];
			$Password = $_SESSION['Password'];
			$hasil = $this->fungsi->Ambil_Data('acount_pengurus ', "where No_Pengurus = '$No_Pengurus'");
			if (count($hasil) == 1){

			if ( $Password == $hasil[0]['Password'] ){
				$hasil = $this->fungsi->Ambil_Data('acount_siswa_sbmptn');
				if (date('M', time()) == "Jan" || date('M', time()) == "Jul"){
					$this->load->view('pengurus/jumlah_siswa_sbm_databesing', array('data' => $hasil ));
				}
				else {
					$this->load->view('pengurus/jumlah_siswa_sbm', array('data' => $hasil ));
				}
			}else{
				redirect('pengurus/logout');
			}

			}else{
				redirect('pengurus/logout');
			}

		}else{
			redirect('pengurus/logout');
		}
	}

	
	public function DataKelompokSiswaSBM($namakelompok){
		if ($_SESSION != null){
			$No_Pengurus = $_SESSION['No_ID'];
			$Password = $_SESSION['Password'];
			$hasil = $this->fungsi->Ambil_Data('acount_pengurus ', "where No_Pengurus = '$No_Pengurus'");
			if (count($hasil) == 1){

			if ( $Password == $hasil[0]['Password'] ){
				$data = explode ("%20",$namakelompok);
				$datahasil = "";
				for ($i=0; $i < count($data)-1; $i++) { 
					$datahasil =  $datahasil.$data[$i]." ";
				}

				$Kelompok = $datahasil.$data[count($data)-1];
				$hasil = $this->fungsi->Ambil_Data('acount_siswa_sbmptn ', "where Kelompok = '$Kelompok'");
				$this->load->view('pengurus/kelompok_siswa_sbm', array('data' => $hasil ));
			}else{
				redirect('pengurus/logout');
			}

			}else{
				redirect('pengurus/logout');
			}

		}else{
			redirect('pengurus/logout');
		}
	}

	public function UbahKelompokSBM ($No_Siswa){
		if ($_SESSION != null){
			$No_Pengurus = $_SESSION['No_ID'];
			$Password = $_SESSION['Password'];
			$hasil = $this->fungsi->Ambil_Data('acount_pengurus ', "where No_Pengurus = '$No_Pengurus'");
			if (count($hasil) == 1){

			if ( $Password == $hasil[0]['Password'] ){


				$hasil = $this->fungsi->Ambil_Data('acount_siswa_sbmptn ', "where No_Siswa= '$No_Siswa'");
				$_SESSION['Nama_Siswa'] = $hasil[0]['Nama_Siswa'];
				$_SESSION['No_Siswa'] = $hasil[0]['No_Siswa'];				
				$kirim = array( 
						"No_Siswa"			=> $hasil[0]['No_Siswa'],
						"Nama_Siswa" 		=> $hasil[0]['Nama_Siswa'],
						"Kelompok"			=> $hasil[0]['Kelompok'],
						"Photo"				=> $hasil[0]['Photo']
						);
				$this->load->view('pengurus/form_ubah_kelompok_sbm', $kirim);	
			}else{
				redirect('pengurus/logout');
			}

			}else{
				redirect('pengurus/logout');
			}

		}else{
			redirect('pengurus/logout');
		}
	}

	public function UpdateKelompokSBM(){
		if ($_SESSION != null){
			$No_Pengurus = $_SESSION['No_ID'];
			$Password = $_SESSION['Password'];
			$hasil = $this->fungsi->Ambil_Data('acount_pengurus ', "where No_Pengurus = '$No_Pengurus'");
			if (count($hasil) == 1){

			if ( $Password == $hasil[0]['Password'] ){
				$ubah = array( 
						"Kelompok"			=> $_POST['Kelompok']
						);
    			$where = array('No_Siswa' => $_POST['No_Siswa']);
    			$hasil = $this->fungsi->Ubah_Data('acount_siswa_sbmptn', $ubah, $where);
    			redirect('pengurus/DataSiswaSBM');
			}else{
				redirect('pengurus/logout');
			}

			}else{
				redirect('pengurus/logout');
			}

		}else{
				redirect('pengurus/logout');
		}	
	}


	public function TambahSiswaSBM($Nomor){
		if ($_SESSION != null){
			$No_Pengurus = $_SESSION['No_ID'];
			$Password = $_SESSION['Password'];
			$hasil = $this->fungsi->Ambil_Data('acount_pengurus ', "where No_Pengurus = '$No_Pengurus'");
			if (count($hasil) == 1){

			if ( $Password == $hasil[0]['Password'] ){
				$No_Siswa = (60*1000000) + ($_SESSION['Code_Semester']*100000) + ($_SESSION['Code_Tahun']*1000) + $Nomor + 1;
				$No_Kirim = $Nomor + 1;
				$kirim = array( 
						"Nama_Pengurus" => $_SESSION['Nama_Pengurus'],
						"No_Pengurus" 	=> $_SESSION['No_ID'],
						"No" 			=> $No_Kirim,
						"No_Siswa"		=> $No_Siswa
						);
				$this->load->view('pengurus/form_tambah_siswa_sbm', $kirim);
			}else{
				redirect('pengurus/logout');
			}

			}else{
				redirect('pengurus/logout');
			}

		}else{
			redirect('pengurus/logout');
		}
	}

	public function DataSiswaBaruSBM(){
		if ($_SESSION != null){
			$No_Pengurus = $_SESSION['No_ID'];
			$Password = $_SESSION['Password'];
			$hasil = $this->fungsi->Ambil_Data('acount_pengurus ', "where No_Pengurus = '$No_Pengurus'");
			if (count($hasil) == 1){

			if ( $Password == $hasil[0]['Password'] ){
			   	if ($_POST['No_Siswa'] == null || $_POST['Kelompok'] == null ){
					echo "<script type=\"text/javascript\">
					alert(\"Tidak ada yang boleh kosong\");
					</script>";
					$No_Siswa = (60*1000000) + ($_SESSION['Code_Semester']*100000) + ($_SESSION['Code_Tahun']*1000) + $_POST['No'];
					$No_Kirim = $_POST['No'];
					$kirim = array( 
							"Nama_Pengurus" => $_SESSION['Nama_Pengurus'],
							"No_Pengurus" 	=> $_SESSION['No_ID'],
							"No" 			=> $No_Kirim,
							"No_Siswa"		=> $No_Siswa
							);
					$this->load->view('pengurus/form_tambah_siswa_sbm', $kirim);
				}
				else{
					$hasil = $this->fungsi->Ambil_Data('acount_siswa_sbmptn');	
					$tambah 	= array(
				   		'No' 			=> count($hasil) + 1,
		   				'No_Siswa' 		=> (60*1000000) + ($_SESSION['Code_Semester']*100000) + ($_SESSION['Code_Tahun']*1000) + count($hasil) + 1,
						'Nama_Siswa' 		=> $_POST['Nama_Siswa'],
						'Paket' 		=> $_POST['Paket'],
						'Password' 		=> $_POST['Password'],
						'Kelompok'		=> $_POST['Kelompok'],
						'Total_Biaya'	=> $_POST['Total_Biaya'],
						'Tahun'			=> date('Y', time()),
						'Semester'		=> $_SESSION['Code_Semester']
					); 
				    $hasil = $this->fungsi->Tambah_Data('acount_siswa_sbmptn', $tambah);
					redirect('/pengurus/DataSiswaSBM');
				}
			}else{
				redirect('pengurus/logout');
			}

			}else{
				redirect('pengurus/logout');
			}

		}else{
				redirect('pengurus/logout');
		}
	}
	public function daftartunggusbmptn(){
		if ($_SESSION != null){
			$No_Pengurus = $_SESSION['No_ID'];
			$Password = $_SESSION['Password'];
			$hasil = $this->fungsi->Ambil_Data('acount_pengurus ', "where No_Pengurus = '$No_Pengurus'");
			if (count($hasil) == 1){
				if ( $Password == $hasil[0]['Password'] ){
					$hasil = $this->fungsi->Ambil_Data('data_reservasi_sbmptn ', "where Status = '$No_Pengurus'");
					$this->load->view('pengurus/daftar_tunggu_sbm', array( 'data' => $hasil ));
				}else{
					redirect('pengurus/logout');
				}
			}else{
				redirect('pengurus/logout');
			}


		}else{
			redirect('pengurus/logout');
		}
	}


	public function lelangreservasisbm($yangmana){
		if ($_SESSION != null){
			$No_Pengurus = $_SESSION['No_ID'];
			$Password = $_SESSION['Password'];
			$hasil = $this->fungsi->Ambil_Data('acount_pengurus ', "where No_Pengurus = '$No_Pengurus'");
			if (count($hasil) == 1){
				if ( $Password == $hasil[0]['Password'] ){
					
				$ubah = array( 
						"Status"			=> "Lelang"
						);
				
    			$where = array('Pencarian' => $yangmana);
    			$hasil = $this->fungsi->Ubah_Data('data_reservasi_sbmptn', $ubah, $where);
    		        redirect('pengurus/daftartunggusbmptn');

				}else{
					redirect('pengurus/logout');
				}
			}else{
				redirect('pengurus/logout');
			}


		}else{
			redirect('pengurus/logout');
		}
	}

	public function ReservasiSbmptn(){
		if ($_SESSION != null){
			$No_Pengurus = $_SESSION['No_ID'];
			$Password = $_SESSION['Password'];
			$hasil = $this->fungsi->Ambil_Data('acount_pengurus ', "where No_Pengurus = '$No_Pengurus'");
			if (count($hasil) == 1){

			if ( $Password == $hasil[0]['Password'] ){
				$hasil = $this->fungsi->Ambil_Data('data_reservasi_sbmptn');
				$this->load->view('pengurus/reservasi_sbm', array( 'data' => $hasil ));
			}else{
				redirect('pengurus/logout');
			}

			}else{
				redirect('pengurus/logout');
			}

		}else{
				redirect('pengurus/logout');
		}		
	}

	public function ajaxlesSBM(){
		$Status = "Lelang";
		$hasil = $this->fungsi->Ambil_Data('data_reservasi_sbmptn ', "where Status = '$Status'");
		echo json_encode($hasil);
	}

	public function cekDataSiswaSBM($No_Induk){
		if ($_SESSION != null){
			$No_Pengurus = $_SESSION['No_ID'];
			$Password = $_SESSION['Password'];
			$hasil = $this->fungsi->Ambil_Data('acount_pengurus ', "where No_Pengurus = '$No_Pengurus'");
			if (count($hasil) == 1){

			if ( $Password == $hasil[0]['Password'] ){
				$hasil = $this->fungsi->Ambil_Data('acount_siswa_sbmptn ', "where No_Siswa = '$No_Induk'");
				$_SESSION['Nama_Siswa'] = $hasil[0]['Nama_Siswa'];
				$_SESSION['No_Siswa'] = $hasil[0]['No_Siswa'];				
				$kirim = array( 
						"No_Siswa"			=> $hasil[0]['No_Siswa'],
						"Nama_Siswa" 			=> $hasil[0]['Nama_Siswa'],
						"Nama_Panggilan"		=> $hasil[0]['Nama_Panggilan'],
						"Jenis_Kelamin"			=> $hasil[0]['Jenis_Kelamin'],
						"TTL"				=> $hasil[0]['TTL'],
						"No_Hp"				=> $hasil[0]['No_Hp'],
						"Kelas"				=> $hasil[0]['Kelas'],
						"Sekolah"			=> $hasil[0]['Sekolah'],
						"Tahun"				=> $hasil[0]['Tahun'],
						"Acount_Fb"			=> $hasil[0]['Acount_Fb'],
						"Acount_Twitter"		=> $hasil[0]['Acount_Twitter'],
						"Acount_Line"			=> $hasil[0]['Acount_Line'],
						"Nama_Ayah"			=> $hasil[0]['Nama_Ayah'],
						"Pekerjaan_Ayah"		=> $hasil[0]['Pekerjaan_Ayah'],
						"No_Hp_Ayah"			=> $hasil[0]['No_Hp_Ayah'],
						"Nama_Ibu"			=> $hasil[0]['Nama_Ibu'],
						"Pekerjaan_Ibu"			=> $hasil[0]['Pekerjaan_Ibu'],
						"No_Hp_Ibu"			=> $hasil[0]['No_Hp_Ibu'],
						"Alamat"			=> $hasil[0]['Alamat'],
						"Password"			=> $hasil[0]['Password'],
						"Kelompok"			=> $hasil[0]['Kelompok'],
						"Photo"				=> $hasil[0]['Photo'] 
						);
				$this->load->view('pengurus/cek_data_siswa_sbm', $kirim);	
			}else{
				redirect('pengurus/logout');
			}

			}else{
				redirect('pengurus/logout');
			}

		}else{
				redirect('pengurus/logout');
		}

	}

	public function DataKeuanganSBM($Nomor_Induk){
		if ($_SESSION != null){
			$No_Pengurus = $_SESSION['No_ID'];
			$Password = $_SESSION['Password'];
			$hasil = $this->fungsi->Ambil_Data('acount_pengurus ', "where No_Pengurus = '$No_Pengurus'");
			if (count($hasil) == 1){

			if ( $Password == $hasil[0]['Password'] ){
				$hasil = $this->fungsi->Ambil_Data('acount_siswa_sbmptn ', "where No_Siswa = '$Nomor_Induk'");
				$_SESSION['Nama_Siswa'] = $hasil[0]['Nama_Siswa'];
				$_SESSION['No_Siswa'] = $hasil[0]['No_Siswa'];				
				$kirim = array( 
						"No_Siswa"			=> $hasil[0]['No_Siswa'],
						"Nama_Siswa" 		=> $hasil[0]['Nama_Siswa'],
						"No_Hp"				=> $hasil[0]['No_Hp'],
						"Jaket"				=> "Rp ".$hasil[0]['Jaket'],	
						"Paket"				=> $hasil[0]['Paket'],	
						"Total_Biaya"		=> "Rp ".$hasil[0]['Total_Biaya'],	
						"Modul"				=> "Rp ".$hasil[0]['Modul'],
						"Cicilan1"			=> "Rp ".$hasil[0]['Cicilan1'],
						"Cicilan2"			=> "Rp ".$hasil[0]['Cicilan2'],
						"Cicilan3"			=> "Rp ".$hasil[0]['Cicilan3'],
						"Cicilan4"			=> "Rp ".$hasil[0]['Cicilan4'],
						"Photo"				=> $hasil[0]['Photo'] 
					);
				$this->load->view('pengurus/data_keuangan_sbm', $kirim);	
			}else{
				redirect('pengurus/logout');
			}

			}else{
				redirect('pengurus/logout');
			}

		}else{
			redirect('pengurus/logout');
		}
	}

	public function ubahDataKeuaganSBM ($Nomor_Induk){
		if ($_SESSION != null){
			$No_Pengurus = $_SESSION['No_ID'];
			$Password = $_SESSION['Password'];
			$hasil = $this->fungsi->Ambil_Data('acount_pengurus ', "where No_Pengurus = '$No_Pengurus'");
			if (count($hasil) == 1){

			if ( $Password == $hasil[0]['Password'] ){
				$hasil = $this->fungsi->Ambil_Data('acount_siswa_sbmptn ', "where No_Siswa = '$Nomor_Induk'");
				$_SESSION['Nama_Siswa'] = $hasil[0]['Nama_Siswa'];
				$_SESSION['No_Siswa'] = $hasil[0]['No_Siswa'];				
				$kirim = array( 
						"Nama_Pengurus"			=> $_SESSION['Nama_Pengurus'],
						"No_Pengurus"			=> $_SESSION['No_ID'],
						"No_Siswa"			=> $hasil[0]['No_Siswa'],
						"Nama_Siswa" 			=> $hasil[0]['Nama_Siswa'],
						"No_Hp"				=> $hasil[0]['No_Hp'],
						"Jaket"				=> $hasil[0]['Jaket'],	
						"Paket"				=> $hasil[0]['Paket'],	
						"Total_Biaya"			=> $hasil[0]['Total_Biaya'],
						"Modul"				=> $hasil[0]['Modul'],
						"Cicilan1"			=> $hasil[0]['Cicilan1'],
						"Cicilan2"			=> $hasil[0]['Cicilan2'],
						"Cicilan3"			=> $hasil[0]['Cicilan3'],
						"Cicilan4"			=> $hasil[0]['Cicilan4'],
						"Photo"				=> $hasil[0]['Photo'] 
						);
				$this->load->view('pengurus/form_ubah_data_keuangan_sbm', $kirim);	
			}else{
				redirect('pengurus/logout');
			}

			}else{
				redirect('pengurus/logout');
			}

		}else{
				redirect('pengurus/logout');
		}
	}

	public function UpdateDataKeuaganSBM(){
		if ($_SESSION != null){
			$No_Pengurus = $_SESSION['No_ID'];
			$Password = $_SESSION['Password'];
			$hasil = $this->fungsi->Ambil_Data('acount_pengurus ', "where No_Pengurus = '$No_Pengurus'");
			if (count($hasil) == 1){

			if ( $Password == $hasil[0]['Password'] ){
				$ubah = array( 
						"Jaket"				=> $_POST['Jaket'],	
						"Modul"				=> $_POST['Modul'],
						"Paket"				=> $_POST['Paket'],
						"Cicilan1"			=> $_POST['Cicilan1'],
						"Cicilan2"			=> $_POST['Cicilan2'],
						"Cicilan3"			=> $_POST['Cicilan3'],
						"Cicilan4"			=> $_POST['Cicilan4'],
						"Total_Biaya"			=> $_POST['Total_Biaya']
						);
    			$where = array('No_Siswa' => $_POST['No_Siswa']);
    			$hasil = $this->fungsi->Ubah_Data('acount_siswa_sbmptn', $ubah, $where);
    			redirect('pengurus/DataKeuanganSBM/'.$_POST['No_Siswa']);
			}else{
				redirect('pengurus/logout');
			}

			}else{
				redirect('pengurus/logout');
			}

		}else{
				redirect('pengurus/logout');
		}
	}

	public function DataLesSbm ($data, $data2){


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
			$No_Pengurus = $_SESSION['No_ID'];
			$Password = $_SESSION['Password'];
			$hasil = $this->fungsi->Ambil_Data('acount_pengurus ', "where No_Pengurus = '$No_Pengurus'");
			if (count($hasil) == 1){

			if ( $Password == $hasil[0]['Password'] ){
				$No_Siswa = $data;
				$hasil = $this->fungsi->Ambil_Data('acount_siswa_sbmptn ', "where No_Siswa = '$No_Siswa'");
				$_SESSION['Nama_Siswa'] = $hasil[0]['Nama_Siswa'];
				$_SESSION['No_Siswa'] = $hasil[0]['No_Siswa'];
				$Kelompok = $hasil[0]['Kelompok'];				
				$hasil = $this->fungsi->Ambil_Data('data_riwayat ', "where Kelompok = '$Kelompok'");
				$this->load->view('pengurus/riwayat_les_sbm', array( 'data' => $hasil ));
			}else{
				redirect('pengurus/logout');
			}

			}else{
				redirect('pengurus/logout');
			}

		}else{
			redirect('pengurus/logout');
		}
	}
//----------------------------------------------------------------laman pengajar
	public function DataPengajar(){
		if ($_SESSION != null){
			$No_Pengurus = $_SESSION['No_ID'];
			$Password = $_SESSION['Password'];
			$hasil = $this->fungsi->Ambil_Data('acount_pengurus ', "where No_Pengurus = '$No_Pengurus'");
			if (count($hasil) == 1){

			if ( $Password == $hasil[0]['Password'] ){
				$hasil = $this->fungsi->Ambil_Data('acount_pengajar');
				if (date('M', time()) == "Jan" || date('M', time()) == "Jul"){
					$this->load->view('pengurus/jumlah_pengajar_databesing', array('data' => $hasil ));
				}
				else {
					$this->load->view('pengurus/jumlah_pengajar', array('data' => $hasil ));	
				}

			}else{
				redirect('pengurus/logout');
			}

			}else{
				redirect('pengurus/logout');
			}

		}else{
			redirect('pengurus/logout');
		}
	}

	public function TambahPengajar($Nomor){
		if ($_SESSION != null){
			$No_Pengurus = $_SESSION['No_ID'];
			$Password = $_SESSION['Password'];
			$hasil = $this->fungsi->Ambil_Data('acount_pengurus ', "where No_Pengurus = '$No_Pengurus'");
			if (count($hasil) == 1){

			if ( $Password == $hasil[0]['Password'] ){
				$No_Pengajar = (30*1000000)   + ($_SESSION['Code_Semester']*100000) + ($_SESSION['Code_Tahun']*1000) + $Nomor + 1;
				$No_Kirim = $Nomor + 1;
				$kirim = array( 
						'Nama_Pengurus' => $_SESSION['Nama_Pengurus'],
						'No_Pengurus' 	=> $_SESSION['No_ID'],
						'No'			=> $No_Kirim,
						'No_Pengajar'	=> $No_Pengajar
						);
				$this->load->view('pengurus/form_tambah_pengajar', $kirim);
			}else{
				redirect('pengurus/logout');
			}

			}else{
				redirect('pengurus/logout');
			}

		}else{
				redirect('pengurus/logout');
		}
	}

	public function DataPengajarBaru(){
		if ($_SESSION != null){
			$No_Pengurus = $_SESSION['No_ID'];
			$Password = $_SESSION['Password'];
			$hasil = $this->fungsi->Ambil_Data('acount_pengurus ', "where No_Pengurus = '$No_Pengurus'");
			if (count($hasil) == 1){

			if ( $Password == $hasil[0]['Password'] ){
			   	if ($_POST['Nama_Pengajar'] == null){
					echo "<script type=\"text/javascript\">
					alert(\"Tidak ada yang boleh kosong\");
					</script>";
					$No_Pengajar = (30*1000000)   + ($_SESSION['Code_Semester']*100000) + ($_SESSION['Code_Tahun']*1000) + $_POST['No'];
					$No_Kirim = $_POST['No'];
					$kirim = array( 
							'Nama_Pengurus' => $_SESSION['Nama_Pengurus'],
							'No_Pengurus' 	=> $_SESSION['No_ID'],
							'No'			=> $No_Kirim,
							'No_Pengajar'	=> $No_Pengajar
							);
					$this->load->view('pengurus/form_tambah_pengajar', $kirim);
				}
				else{
					$hasil = $this->fungsi->Ambil_Data('acount_pengajar');
				   	$tambah = array(
					   		'No'			=> count($hasil) + 1,
					   		'No_Pengajar' 	=> (30*1000000) + ($_SESSION['Code_Semester']*100000) + ($_SESSION['Code_Tahun']*1000) + count($hasil) + 1,
							'Nama_Pengajar' => $_POST['Nama_Pengajar'],
							'Password' 		=> $_POST['Password'],
							'Tahun'			=> date('Y', time()),
							'Semester'		=> $_SESSION['Code_Semester']
							); 
				    $hasil = $this->fungsi->Tambah_Data('acount_pengajar', $tambah);
					redirect('/pengurus/DataPengajar');
				}
			}else{
				redirect('pengurus/logout');
			}

			}else{
				redirect('pengurus/logout');
			}

		}else{
			redirect('pengurus/logout');
		}
	}


	public function DataLengkapPengajar($Nomor){
		if ($_SESSION != null){
			$No_Pengurus = $_SESSION['No_ID'];
			$Password = $_SESSION['Password'];
			$hasil = $this->fungsi->Ambil_Data('acount_pengurus ', "where No_Pengurus = '$No_Pengurus'");
			if (count($hasil) == 1){

			if ( $Password == $hasil[0]['Password'] ){
				$hasil = $this->fungsi->Ambil_Data('acount_pengajar ', "where No_Pengajar = '$Nomor'");
				$_SESSION['Nama_Pengajar'] = $hasil[0]['Nama_Pengajar'];
				$_SESSION['No_Pengajar'] = $hasil[0]['No_Pengajar'];				
				$kirim = array( 
						"No_Pengajar"		=> $hasil[0]['No_Pengajar'],
						"Nama_Pengajar" 	=> $hasil[0]['Nama_Pengajar'],
						"Bidang"			=> $hasil[0]['Bidang'],
						"Acount_Fb"			=> $hasil[0]['Acount_Fb'],
						"Acount_Twitter"	=> $hasil[0]['Acount_Twitter'],
						"Acount_Line" 		=> $hasil[0]['Acount_Line'],
						"Tahun"				=> $hasil[0]['Tahun'],
						"Jurusan"			=> $hasil[0]['Jurusan'],
						"Institute" 		=> $hasil[0]['Institute'],
						"No_Hp" 			=> $hasil[0]['No_Hp'],
						"Password"			=> $hasil[0]['Password'],
						"Photo"				=> $hasil[0]['Photo'] 
						);

				$this->load->view('pengurus/data_lengkap_pengajar', $kirim);
			}else{
				redirect('pengurus/logout');
			}

			}else{
				redirect('pengurus/logout');
			}

		}else{
			redirect('pengurus/logout');
		}
	}										
	
	public function DataMengajar($Nomor){


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
			$No_Pengurus = $_SESSION['No_ID'];
			$Password = $_SESSION['Password'];
			$hasil = $this->fungsi->Ambil_Data('acount_pengurus ', "where No_Pengurus = '$No_Pengurus'");
			if (count($hasil) == 1){

			if ( $Password == $hasil[0]['Password'] ){
				$No_Pengajar = $Nomor;
				$hasil = $this->fungsi->Ambil_Data('acount_pengajar ', "where No_Pengajar = '$No_Pengajar'");
				$_SESSION['Nama_Pengajar'] = $hasil[0]['Nama_Pengajar'];
				$_SESSION['No_Pengajar'] = $hasil[0]['No_Pengajar'];				
				$hasil = $this->fungsi->Ambil_Data('data_riwayat ', "where No_Pengajar = '$No_Pengajar'");
				$this->load->view('pengurus/riwayat_mengajar', array( 'data' => $hasil ));
			}else{
				redirect('pengurus/logout');
			}

			}else{
				redirect('pengurus/logout');
			}

		}else{
			redirect('pengurus/logout');
		}
		
	}

	public function fee($Nomor){
		if ($_SESSION != null){
			$No_Pengurus = $_SESSION['No_ID'];
			$Password = $_SESSION['Password'];
			$hasil = $this->fungsi->Ambil_Data('acount_pengurus ', "where No_Pengurus = '$No_Pengurus'");
			if (count($hasil) == 1){

			if ( $Password == $hasil[0]['Password'] ){
				$ubah = array( "Status"	=> "Lunas");
		    	$_SESSION['N'] = $Nomor;
    			$where = array('No_Pengajar' => $Nomor);
    			$hasil = $this->fungsi->Ubah_Data('data_riwayat', $ubah, $where);
    			redirect('pengurus/DataMengajar/'.$_SESSION['N']);
			}else{
				redirect('pengurus/logout');
			}

			}else{
				redirect('pengurus/logout');
			}

		}else{
			redirect('pengurus/logout');
		}
	}
//-----------------------------------------------------------------laman data pembina 

	public function DataPembina(){
		if ($_SESSION != null){
			$No_Pengurus = $_SESSION['No_ID'];
			$Password = $_SESSION['Password'];
			$hasil = $this->fungsi->Ambil_Data('acount_pengurus ', "where No_Pengurus = '$No_Pengurus'");
			if (count($hasil) == 1){

			if ( $Password == $hasil[0]['Password'] ){
				$hasil = $this->fungsi->Ambil_Data('acount_pembina');
				if (date('M', time()) == "Jan" || date('M', time()) == "Jul"){
					$this->load->view('pengurus/jumlah_pembina_databesing', array('data' => $hasil ));
				}
				else {
					$this->load->view('pengurus/jumlah_pembina', array('data' => $hasil ));	
				}
			}else{
				redirect('pengurus/logout');
			}

			}else{
				redirect('pengurus/logout');
			}

		}else{
			redirect('pengurus/logout');
		}

	}

	public function TambahPembina($Nomor){
		if ($_SESSION != null){
			$No_Pengurus = $_SESSION['No_ID'];
			$Password = $_SESSION['Password'];
			$hasil = $this->fungsi->Ambil_Data('acount_pengurus ', "where No_Pengurus = '$No_Pengurus'");
			if (count($hasil) == 1){

			if ( $Password == $hasil[0]['Password'] ){
				$No_Pembina = (20*1000000) + ($_SESSION['Code_Semester']*100000) + ($_SESSION['Code_Tahun']*1000) + $Nomor + 1;
				$No_Kirim = $Nomor + 1;
				$kirim = array( 
						'No'			=> $No_Kirim,
	   					'No_Pembina' 	=> $No_Pembina,
						'Nama_Pengurus' => $_SESSION['Nama_Pengurus'],
						'No_Pengurus'	=> $_SESSION['No_ID']);
				$this->load->view('pengurus/form_tambah_pembina', $kirim);
			}else{
				redirect('pengurus/logout');
			}

			}else{
				redirect('pengurus/logout');
			}

		}else{
			redirect('pengurus/logout');
		}
	}

	public function DataPembinaBaru(){
		if ($_SESSION != null){
			$No_Pengurus = $_SESSION['No_ID'];
			$Password = $_SESSION['Password'];
			$hasil = $this->fungsi->Ambil_Data('acount_pengurus ', "where No_Pengurus = '$No_Pengurus'");
			if (count($hasil) == 1){

			if ( $Password == $hasil[0]['Password'] ){
			   	if ($_POST['Nama_Pembina'] == null){
					echo "<script type=\"text/javascript\">
					alert(\"Tidak ada yang boleh kosong\");
					</script>";
					$No_Pembina = (20*1000000) + ($_SESSION['Code_Semester']*100000) + ($_SESSION['Code_Tahun']*1000) + $_POST['No'];
					$No_Kirim = $_POST['No'];
					$kirim = array( 
							'No'			=> $No_Kirim,
		   					'No_Pembina' 	=> $No_Pembina
		   					);
					$this->load->view('pengurus/form_tambah_pembina', $kirim);
				}
				else {
					$hasil = $this->fungsi->Ambil_Data('acount_pembina');
					$tambah = array(
					   		'No'			=> count($hasil) + 1,
					   		'No_Pembina' 	=> (20*1000000) + ($_SESSION['Code_Semester']*100000) + ($_SESSION['Code_Tahun']*1000) + count($hasil) + 1,
							'Nama_Pembina' 	=> $_POST['Nama_Pembina'],
							'Password' 		=> $_POST['Password'],
							'Tahun'			=> date('Y', time()),
							'Semester'		=> $_SESSION['Code_Semester']
							); 
				    $hasil = $this->fungsi->Tambah_Data('acount_pembina', $tambah);
					redirect('/pengurus/DataPembina');
				}
			}else{
				redirect('pengurus/logout');
			}

			}else{
				redirect('pengurus/logout');
			}

		}else{
			redirect('pengurus/logout');
		}
	}

	public function DataLengkapPembina($No_Pembina){
		if ($_SESSION != null){
			$No_Pengurus = $_SESSION['No_ID'];
			$Password = $_SESSION['Password'];
			$hasil = $this->fungsi->Ambil_Data('acount_pengurus ', "where No_Pengurus = '$No_Pengurus'");
			if (count($hasil) == 1){

			if ( $Password == $hasil[0]['Password'] ){
				$hasil = $this->fungsi->Ambil_Data('acount_pembina ', "where No_Pembina = '$No_Pembina'");
				$_SESSION['No_Pembina'] = $hasil[0]['No_Pembina'];
				$_SESSION['Nama_Pembina'] = $hasil[0]['Nama_Pembina'];				
				$kirim = array( 
						"No_Pembina"	=> $hasil[0]['No_Pembina'],
						"Nama_Pembina"  => $hasil[0]['Nama_Pembina'],
						"Jurusan"		=> $hasil[0]['Jurusan'],
						"Institute" 	=> $hasil[0]['Institute'],
						"No_Hp" 		=> $hasil[0]['No_Hp'],
						"Password" 		=> $hasil[0]['Password'],
						"Photo"			=> $hasil[0]['Photo'] 
						);
				$this->load->view('pengurus/data_lengkap_pembina', $kirim);	
			}else{
				redirect('pengurus/logout');
			}

			}else{
				redirect('pengurus/logout');
			}

		}else{
			redirect('pengurus/logout');
		}
	}
//-----------------------------------------------------------------laman data pengurus
	public function DataPengurus(){
		if ($_SESSION != null){
			$No_Pengurus = $_SESSION['No_ID'];
			$Password = $_SESSION['Password'];
			$hasil = $this->fungsi->Ambil_Data('acount_pengurus ', "where No_Pengurus = '$No_Pengurus'");
			if (count($hasil) == 1){

			if ( $Password == $hasil[0]['Password'] ){
				$hasil = $this->fungsi->Ambil_Data('acount_pengurus');
				if (date('M', time()) == "Jan" || date('M', time()) == "Jul"){
					$this->load->view('pengurus/jumlah_pengurus_databesing', array('data' => $hasil ));
				}
				else {
					$this->load->view('pengurus/jumlah_pengurus', array('data' => $hasil ));	
				}
			}else{
				redirect('pengurus/logout');
			}

			}else{
				redirect('pengurus/logout');
			}

		}else{
			redirect('pengurus/logout');
		}
	}

	public function TambahPengurus($Nomor){
		if ($_SESSION != null){
			$No_Pengurus = $_SESSION['No_ID'];
			$Password = $_SESSION['Password'];
			$hasil = $this->fungsi->Ambil_Data('acount_pengurus ', "where No_Pengurus = '$No_Pengurus'");
			if (count($hasil) == 1){

			if ( $Password == $hasil[0]['Password'] ){
				$No_Pengurus = (10*1000000) + ($_SESSION['Code_Semester']*100000) + ($_SESSION['Code_Tahun']*1000) + $Nomor + 1;
				$No_Kirim = $Nomor + 1;
				$kirim = array( 
						'No'			=> $No_Kirim,
	   					'No_Pengurus' 	=> $No_Pengurus,
						'Nama_Pengurus' => $_SESSION['Nama_Pengurus'],
						'No_Pengurus2' 	=> $_SESSION['No_ID'],
						"Photo"			=> $hasil[0]['Photo'] 
						);
				$this->load->view('pengurus/form_tambah_pengurus', $kirim);
			}else{
				redirect('pengurus/logout');
			}

			}else{
				redirect('pengurus/logout');
			}

		}else{
			redirect('pengurus/logout');
		}
	}

	public function DataPengurusBaru(){
		if ($_SESSION != null){
			$No_Pengurus = $_SESSION['No_ID'];
			$Password = $_SESSION['Password'];
			$hasil = $this->fungsi->Ambil_Data('acount_pengurus ', "where No_Pengurus = '$No_Pengurus'");
			if (count($hasil) == 1){

			if ( $Password == $hasil[0]['Password'] ){
				if ($_POST['Nama_Pengurus'] == null){
					echo "<script type=\"text/javascript\">
					alert(\"Tidak ada yang boleh kosong\");
					</script>";
					$No_Pengurus = (10*1000000) + ($_SESSION['Code_Semester']*100000) + ($_SESSION['Code_Tahun']*1000) + $_POST['No'];
					$No_Kirim = $_POST['No'];
					$kirim = array( 
							'No'			=> $No_Kirim,
		   					'No_Pengurus' 	=> $No_Pengurus
		   					);
					$this->load->view('pengurus/form_tambah_pengurus', $kirim);
				}
				else {
					$hasil = $this->fungsi->Ambil_Data('acount_pengurus');
					$tambah = array(
					   		'No'			=> count($hasil),
					   		'No_Pengurus' 	=> (10*1000000) + ($_SESSION['Code_Semester']*100000) + ($_SESSION['Code_Tahun']*1000) + count($hasil),
							'Nama_Pengurus' => $_POST['Nama_Pengurus'],
							'Password' 		=> $_POST['Password'],
							'Tahun'			=> date('Y', time()),
							'Semester'		=> $_SESSION['Code_Semester']
							); 
				    $hasil = $this->fungsi->Tambah_Data('acount_pengurus', $tambah);
					redirect('/pengurus/DataPengurus');
				}
			}else{
				redirect('pengurus/logout');
			}

			}else{
				redirect('pengurus/logout');
			}

		}else{
			redirect('pengurus/logout');
		}
	}

	public function DataLengkapPengurus($No_Pengurus2){
		if ($_SESSION != null){
			$No_Pengurus = $_SESSION['No_ID'];
			$Password = $_SESSION['Password'];
			$hasil = $this->fungsi->Ambil_Data('acount_pengurus ', "where No_Pengurus = '$No_Pengurus'");
			if (count($hasil) == 1){

			if ( $Password == $hasil[0]['Password'] ){
				if ( $No_Pengurus2 == 10115001){
					echo "<!DOCTYPE html>
							<html>
							<head>
								<title>Forbidden</title>
							</head>
							<body>

							<p>Directory access is Danied.</p>

							</body>
							</html>";
				}else{
					$hasil = $this->fungsi->Ambil_Data('acount_pengurus ', "where No_Pengurus = '$No_Pengurus2'");
					$_SESSION['No_Pengurus2'] = $hasil[0]['No_Pengurus'];
					$_SESSION['Nama_Pengurus2'] = $hasil[0]['Nama_Pengurus'];				
					$kirim = array( 
									"No_Pengurus"	=> $hasil[0]['No_Pengurus'],
									"Nama_Pengurus" => $hasil[0]['Nama_Pengurus'],
									"Jurusan"		=> $hasil[0]['Jurusan'],
									"Photo" 		=> $hasil[0]['Photo'],
									"Institute" 	=> $hasil[0]['Institute'],
									"No_Hp" 		=> $hasil[0]['No_Hp'],
									"Password" 		=> $hasil[0]['Password']);
					$this->load->view('pengurus/data_lengkap_pengurus', $kirim);
				}	
			}else{
				redirect('pengurus/logout');
			}

			}else{
				redirect('pengurus/logout');
			}

		}else{
			redirect('pengurus/logout');
		}
	}
//-----------------------------------------------------------------laman database 1


	public function DataBaseSiswa(){
		if ($_SESSION != null){
			$No_Pengurus = $_SESSION['No_ID'];
			$Password = $_SESSION['Password'];
			$hasil = $this->fungsi->Ambil_Data('acount_pengurus ', "where No_Pengurus = '$No_Pengurus'");
			if (count($hasil) == 1){

			if ( $Password == $hasil[0]['Password'] ){
				$hasil = $this->fungsi->Ambil_Data('data_siswa');
				$this->load->view('pengurus/base_siswa', array('data' => $hasil ));
			}else{
				redirect('pengurus/logout');
			}

			}else{
				redirect('pengurus/logout');
			}

		}else{
			redirect('pengurus/logout');
		}
	}

	public function DataBaseSiswaSBM(){
		if ($_SESSION != null){
			$No_Pengurus = $_SESSION['No_ID'];
			$Password = $_SESSION['Password'];
			$hasil = $this->fungsi->Ambil_Data('acount_pengurus ', "where No_Pengurus = '$No_Pengurus'");
			if (count($hasil) == 1){

			if ( $Password == $hasil[0]['Password'] ){
				$hasil = $this->fungsi->Ambil_Data('data_siswa_sbmptn');
				$this->load->view('pengurus/base_siswa_sbm', array('data' => $hasil ));
			}else{
				redirect('pengurus/logout');
			}

			}else{
				redirect('pengurus/logout');
			}

		}else{
			redirect('pengurus/logout');
		}
	}

		public function DataBaseSiswaReguler(){
		if ($_SESSION != null){
			$No_Pengurus = $_SESSION['No_ID'];
			$Password = $_SESSION['Password'];
			$hasil = $this->fungsi->Ambil_Data('acount_pengurus ', "where No_Pengurus = '$No_Pengurus'");
			if (count($hasil) == 1){

			if ( $Password == $hasil[0]['Password'] ){
				$hasil = $this->fungsi->Ambil_Data('data_siswa_reguler');
				$this->load->view('pengurus/base_siswa_reguler', array('data' => $hasil ));
			}else{
				redirect('pengurus/logout');
			}

			}else{
				redirect('pengurus/logout');
			}

		}else{
			redirect('pengurus/logout');
		}
	}

		public function DataBasePengajar(){
		if ($_SESSION != null){
			$No_Pengurus = $_SESSION['No_ID'];
			$Password = $_SESSION['Password'];
			$hasil = $this->fungsi->Ambil_Data('acount_pengurus ', "where No_Pengurus = '$No_Pengurus'");
			if (count($hasil) == 1){

			if ( $Password == $hasil[0]['Password'] ){
				$hasil = $this->fungsi->Ambil_Data('data_pengajar');
				$this->load->view('pengurus/base_pengajar', array('data' => $hasil ));
			}else{
				redirect('pengurus/logout');
			}

			}else{
				redirect('pengurus/logout');
			}

		}else{
			redirect('pengurus/logout');
		}
	}

		public function DataBasePembina(){
		if ($_SESSION != null){
			$No_Pengurus = $_SESSION['No_ID'];
			$Password = $_SESSION['Password'];
			$hasil = $this->fungsi->Ambil_Data('acount_pengurus ', "where No_Pengurus = '$No_Pengurus'");
			if (count($hasil) == 1){

			if ( $Password == $hasil[0]['Password'] ){
				$hasil = $this->fungsi->Ambil_Data('data_pembina');
				$this->load->view('pengurus/base_pembina', array('data' => $hasil ));
			}else{
				redirect('pengurus/logout');
			}

			}else{
				redirect('pengurus/logout');
			}

		}else{
			redirect('pengurus/logout');
		}
	}

	public function DataBasePengurus(){
		if ($_SESSION != null){
			$No_Pengurus = $_SESSION['No_ID'];
			$Password = $_SESSION['Password'];
			$hasil = $this->fungsi->Ambil_Data('acount_pengurus ', "where No_Pengurus = '$No_Pengurus'");
			if (count($hasil) == 1){

			if ( $Password == $hasil[0]['Password'] ){
				$hasil = $this->fungsi->Ambil_Data('data_pengurus');
				$this->load->view('pengurus/base_pengurus', array('data' => $hasil ));
			}else{
				redirect('pengurus/logout');
			}

			}else{
				redirect('pengurus/logout');
			}

		}else{
			redirect('pengurus/logout');
		}
	}



	public function BaseTahunSiswaSBM(){
		if ($_SESSION != null){
			$No_Pengurus = $_SESSION['No_ID'];
			$Password = $_SESSION['Password'];
			$hasil = $this->fungsi->Ambil_Data('acount_pengurus ', "where No_Pengurus = '$No_Pengurus'");
			if (count($hasil) == 1){

			if ( $Password == $hasil[0]['Password'] ){
				if ($_POST == null){
					$Cari = 2000;
				}
				else {
					$Cari = $_POST['Tahun'];
				}
				$hasil = $this->fungsi->Ambil_Data('data_siswa_sbmptn ', "where Tahun = '$Cari'");
				$this->load->view('pengurus/base_siswa_sbm', array('data' => $hasil ));
			}else{
				redirect('pengurus/logout');
			}

			}else{
				redirect('pengurus/logout');
			}

		}else{
			redirect('pengurus/logout');
		}

	}

	public function BaseTahunSiswa(){
		if ($_SESSION != null){
			$No_Pengurus = $_SESSION['No_ID'];
			$Password = $_SESSION['Password'];
			$hasil = $this->fungsi->Ambil_Data('acount_pengurus ', "where No_Pengurus = '$No_Pengurus'");
			if (count($hasil) == 1){

			if ( $Password == $hasil[0]['Password'] ){
				if ($_POST == null){
					$Cari = 2000;
				}
				else {
					$Cari = $_POST['Tahun'];
				}
				$hasil = $this->fungsi->Ambil_Data('data_siswa ', "where Tahun = '$Cari'");
				$this->load->view('pengurus/base_siswa', array('data' => $hasil ));
			}else{
				redirect('pengurus/logout');
			}

			}else{
				redirect('pengurus/logout');
			}

		}else{
			redirect('pengurus/logout');
		}

	}

		public function BaseTahunSiswaReguler(){
		if ($_SESSION != null){
			$No_Pengurus = $_SESSION['No_ID'];
			$Password = $_SESSION['Password'];
			$hasil = $this->fungsi->Ambil_Data('acount_pengurus ', "where No_Pengurus = '$No_Pengurus'");
			if (count($hasil) == 1){

			if ( $Password == $hasil[0]['Password'] ){
				if ($_POST == null){
					$Cari = 2000;
				}
				else {
					$Cari = $_POST['Tahun'];
				}
				$hasil = $this->fungsi->Ambil_Data('data_siswa_reguler ', "where Tahun = '$Cari'");
				$this->load->view('pengurus/base_siswa_reguler', array('data' => $hasil ));
			}else{
				redirect('pengurus/logout');
			}

			}else{
				redirect('pengurus/logout');
			}

		}else{
			redirect('pengurus/logout');
		}

	}

		public function BaseTahunPengajar(){
		if ($_SESSION != null){
			$No_Pengurus = $_SESSION['No_ID'];
			$Password = $_SESSION['Password'];
			$hasil = $this->fungsi->Ambil_Data('acount_pengurus ', "where No_Pengurus = '$No_Pengurus'");
			if (count($hasil) == 1){

			if ( $Password == $hasil[0]['Password'] ){
				if ($_POST == null){
					$Cari = 2000;
				}
				else {
					$Cari = $_POST['Tahun'];
				}
				$hasil = $this->fungsi->Ambil_Data('data_pengajar ', "where Tahun = '$Cari'");
				$this->load->view('pengurus/base_pengajar', array('data' => $hasil ));
			}else{
				redirect('pengurus/logout');
			}

			}else{
				redirect('pengurus/logout');
			}

		}else{
			redirect('pengurus/logout');
		}
	}

		public function BaseTahunPembina(){
		if ($_SESSION != null){
			$No_Pengurus = $_SESSION['No_ID'];
			$Password = $_SESSION['Password'];
			$hasil = $this->fungsi->Ambil_Data('acount_pengurus ', "where No_Pengurus = '$No_Pengurus'");
			if (count($hasil) == 1){

			if ( $Password == $hasil[0]['Password'] ){
				if ($_POST == null){
					$Cari = 2000;
				}
				else {
					$Cari = $_POST['Tahun'];
				}
				$hasil = $this->fungsi->Ambil_Data('data_pembina ', "where Tahun = '$Cari'");
				$this->load->view('pengurus/base_pembina', array('data' => $hasil ));
			}else{
				redirect('pengurus/logout');
			}

			}else{
				redirect('pengurus/logout');
			}

		}else{
			redirect('pengurus/logout');
		}
	}

	public function BaseTahunPengurus(){
		if ($_SESSION != null){
			$No_Pengurus = $_SESSION['No_ID'];
			$Password = $_SESSION['Password'];
			$hasil = $this->fungsi->Ambil_Data('acount_pengurus ', "where No_Pengurus = '$No_Pengurus'");
			if (count($hasil) == 1){

			if ( $Password == $hasil[0]['Password'] ){
				if ($_POST == null){
					$Cari = 2000;
				}
				else {
					$Cari = $_POST['Tahun'];
				}
				$hasil = $this->fungsi->Ambil_Data('data_pengurus ', "where Tahun = '$Cari'");
				$this->load->view('pengurus/base_pengurus', array('data' => $hasil ));
			}else{
				redirect('pengurus/logout');
			}

			}else{
				redirect('pengurus/logout');
			}

		}else{
			redirect('pengurus/logout');
		}
	}

//-------------------------------------------------------------------laman database 2

	public function BaseDataSiswa ($No_Induk){
		if ($_SESSION != null){
			$No_Pengurus = $_SESSION['No_ID'];
			$Password = $_SESSION['Password'];
			$hasil = $this->fungsi->Ambil_Data('acount_pengurus ', "where No_Pengurus = '$No_Pengurus'");
			if (count($hasil) == 1){

			if ( $Password == $hasil[0]['Password'] ){
				$hasil = $this->fungsi->Ambil_Data('data_siswa ', "where No_Siswa = '$No_Induk'");
				$_SESSION['Nama_Siswa'] = $hasil[0]['Nama_Siswa'];
				$_SESSION['No_Siswa'] = $hasil[0]['No_Siswa'];				
				$kirim = array( 
						"No_Siswa"			=> $hasil[0]['No_Siswa'],
						"Nama_Siswa" 		=> $hasil[0]['Nama_Siswa'],
						"Nama_Panggilan"	=> $hasil[0]['Nama_Panggilan'],
						"Jenis_Kelamin"		=> $hasil[0]['Jenis_Kelamin'],
						"TTL"				=> $hasil[0]['TTL'],
						"No_Hp"				=> $hasil[0]['No_Hp'],
						"Kelas"				=> $hasil[0]['Kelas'],
						"Sekolah"			=> $hasil[0]['Sekolah'],
						"Tahun"				=> $hasil[0]['Tahun'],
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
						"Password"			=> $hasil[0]['Password'],
						"Photo"				=> $hasil[0]['Photo'] 
						);
				$this->load->view('pengurus/base_data_lengkap_siswa', $kirim);	
			}else{
				redirect('pengurus/logout');
			}

			}else{
				redirect('pengurus/logout');
			}

		}else{
				redirect('pengurus/logout');
		}
	}
	public function BaseDataSiswaSBM ($No_Induk){
		if ($_SESSION != null){
			$No_Pengurus = $_SESSION['No_ID'];
			$Password = $_SESSION['Password'];
			$hasil = $this->fungsi->Ambil_Data('acount_pengurus ', "where No_Pengurus = '$No_Pengurus'");
			if (count($hasil) == 1){

			if ( $Password == $hasil[0]['Password'] ){
				$hasil = $this->fungsi->Ambil_Data('data_siswa_sbmptn ', "where No_Siswa = '$No_Induk'");
				$_SESSION['Nama_Siswa'] = $hasil[0]['Nama_Siswa'];
				$_SESSION['No_Siswa'] = $hasil[0]['No_Siswa'];				
				$kirim = array( 
						"No_Siswa"			=> $hasil[0]['No_Siswa'],
						"Nama_Siswa" 		=> $hasil[0]['Nama_Siswa'],
						"Nama_Panggilan"	=> $hasil[0]['Nama_Panggilan'],
						"Jenis_Kelamin"		=> $hasil[0]['Jenis_Kelamin'],
						"TTL"				=> $hasil[0]['TTL'],
						"No_Hp"				=> $hasil[0]['No_Hp'],
						"Kelas"				=> $hasil[0]['Kelas'],
						"Sekolah"			=> $hasil[0]['Sekolah'],
						"Tahun"				=> $hasil[0]['Tahun'],
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
						"Password"			=> $hasil[0]['Password'],
						"Photo"				=> $hasil[0]['Photo'] 
						);
				$this->load->view('pengurus/base_data_lengkap_siswa_sbm', $kirim);	
			}else{
				redirect('pengurus/logout');
			}

			}else{
				redirect('pengurus/logout');
			}

		}else{
				redirect('pengurus/logout');
		}
	}

	public function BaseDataSiswaReguler ($No_Induk){
		if ($_SESSION != null){
			$No_Pengurus = $_SESSION['No_ID'];
			$Password = $_SESSION['Password'];
			$hasil = $this->fungsi->Ambil_Data('acount_pengurus ', "where No_Pengurus = '$No_Pengurus'");
			if (count($hasil) == 1){

			if ( $Password == $hasil[0]['Password'] ){
				$hasil = $this->fungsi->Ambil_Data('data_siswa_reguler ', "where No_Siswa = '$No_Induk'");
				$_SESSION['Nama_Siswa'] = $hasil[0]['Nama_Siswa'];
				$_SESSION['No_Siswa'] = $hasil[0]['No_Siswa'];				
				$kirim = array( 
						"No_Siswa"			=> $hasil[0]['No_Siswa'],
						"Nama_Siswa" 		=> $hasil[0]['Nama_Siswa'],
						"Nama_Panggilan"	=> $hasil[0]['Nama_Panggilan'],
						"Jenis_Kelamin"		=> $hasil[0]['Jenis_Kelamin'],
						"TTL"				=> $hasil[0]['TTL'],
						"No_Hp"				=> $hasil[0]['No_Hp'],
						"Kelas"				=> $hasil[0]['Kelas'],
						"Sekolah"			=> $hasil[0]['Sekolah'],
						"Tahun"				=> $hasil[0]['Tahun'],
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
						"Password"			=> $hasil[0]['Password'],
						"Photo"				=> $hasil[0]['Photo'] 
						);
				$this->load->view('pengurus/base_data_lengkap_siswa_reguler', $kirim);	
			}else{
				redirect('pengurus/logout');
			}

			}else{
				redirect('pengurus/logout');
			}

		}else{
				redirect('pengurus/logout');
		}
	}
	
	public function BaseDataPengajar($Nomor){
		if ($_SESSION != null){
			$No_Pengurus = $_SESSION['No_ID'];
			$Password = $_SESSION['Password'];
			$hasil = $this->fungsi->Ambil_Data('acount_pengurus ', "where No_Pengurus = '$No_Pengurus'");
			if (count($hasil) == 1){

			if ( $Password == $hasil[0]['Password'] ){
				$hasil = $this->fungsi->Ambil_Data('data_pengajar ', "where No_Pengajar = '$Nomor'");
				$_SESSION['Nama_Pengajar'] = $hasil[0]['Nama_Pengajar'];
				$_SESSION['No_Pengajar'] = $hasil[0]['No_Pengajar'];				
				$kirim = array( 
						"No_Pengajar"		=> $hasil[0]['No_Pengajar'],
						"Nama_Pengajar" 	=> $hasil[0]['Nama_Pengajar'],
						"Bidang"			=> $hasil[0]['Bidang'],
						"Tahun"				=> $hasil[0]['Tahun'],
						"Jurusan"			=> $hasil[0]['Jurusan'],
						"Institute" 		=> $hasil[0]['Institute'],
						"No_Hp" 			=> $hasil[0]['No_Hp'],
						"Password"			=> $hasil[0]['Password'],
						"Photo"				=> $hasil[0]['Photo'] 
						);

				$this->load->view('pengurus/base_data_lengkap_pengajar', $kirim);
			}else{
				redirect('pengurus/logout');
			}

			}else{
				redirect('pengurus/logout');
			}

		}else{
			redirect('pengurus/logout');
		}
	}
	
	public function BaseDataPembina($No_Pembina){
		if ($_SESSION != null){
			$No_Pengurus = $_SESSION['No_ID'];
			$Password = $_SESSION['Password'];
			$hasil = $this->fungsi->Ambil_Data('acount_pengurus ', "where No_Pengurus = '$No_Pengurus'");
			if (count($hasil) == 1){

			if ( $Password == $hasil[0]['Password'] ){
				$hasil = $this->fungsi->Ambil_Data('data_pembina ', "where No_Pembina = '$No_Pembina'");
				$_SESSION['No_Pembina'] = $hasil[0]['No_Pembina'];
				$_SESSION['Nama_Pembina'] = $hasil[0]['Nama_Pembina'];				
				$kirim = array( 
						"No_Pembina"	=> $hasil[0]['No_Pembina'],
						"Nama_Pembina"  => $hasil[0]['Nama_Pembina'],
						"Jurusan"		=> $hasil[0]['Jurusan'],
						"Institute" 	=> $hasil[0]['Institute'],
						"No_Hp" 		=> $hasil[0]['No_Hp'],
						"Password" 		=> $hasil[0]['Password'],
						"Photo"			=> $hasil[0]['Photo'] 
						);
				$this->load->view('pengurus/base_data_lengkap_pembina', $kirim);	
			}else{
				redirect('pengurus/logout');
			}

			}else{
				redirect('pengurus/logout');
			}

		}else{
			redirect('pengurus/logout');
		}
	}

	
	public function BaseDataPengurus($No_Pengurusi){
		if ($_SESSION != null){
			$No_Pengurus = $_SESSION['No_ID'];
			$Password = $_SESSION['Password'];
			$hasil = $this->fungsi->Ambil_Data('acount_pengurus ', "where No_Pengurus = '$No_Pengurus'");
			if (count($hasil) == 1){

			if ( $Password == $hasil[0]['Password'] ){
				$hasil = $this->fungsi->Ambil_Data('data_pengurus ', "where No_Pengurus = '$No_Pengurusi'");
				$_SESSION['No_Pengurus2'] = $hasil[0]['No_Pengurus'];
				$_SESSION['Nama_Pengurus2'] = $hasil[0]['Nama_Pengurus'];				
				$kirim = array( 
								"No_Pengurus"	=> $hasil[0]['No_Pengurus'],
								"Nama_Pengurus" => $hasil[0]['Nama_Pengurus'],
								"Jurusan"		=> $hasil[0]['Jurusan'],
								"Institute" 	=> $hasil[0]['Institute'],
								"No_Hp" 		=> $hasil[0]['No_Hp'],
								"Password" 		=> $hasil[0]['Password'],
								"Photo"			=> $hasil[0]['Photo'] 
						);
				$this->load->view('pengurus/base_data_lengkap_pengurus', $kirim);	
			}else{
				redirect('pengurus/logout');
			}

			}else{
				redirect('pengurus/logout');
			}

		}else{
			redirect('pengurus/logout');
		}
	}
//---------------------------------------------------------------------laman databesasi
	public function ArsipkanSemuaPembina($batas){
		if ($_SESSION != null){
			$No_Pengurus = $_SESSION['No_ID'];
			$Password = $_SESSION['Password'];
			$hasil = $this->fungsi->Ambil_Data('acount_pengurus ', "where No_Pengurus = '$No_Pengurus'");
			if (count($hasil) == 1){

			if ( $Password == $hasil[0]['Password'] ){
				for ($Nilai = 1; $Nilai <= $batas; $Nilai++){
					$hasil = $this->fungsi->Ambil_Data('acount_pembina ', "where No = '$Nilai'");
					if ($hasil[0]['No_Pembina'] == NULL)$No_Pembina = " ";
					else {
						$No_Pembina = $hasil[0]['No_Pembina'];
					}
					if ($hasil[0]['Nama_Pembina'] == NULL)$Nama_Pembina = " ";
					else {
						$Nama_Pembina = $hasil[0]['Nama_Pembina'];
					}
					if ($hasil[0]['Jurusan'] == NULL)$Jurusan = " ";
					else {
						$Jurusan = $hasil[0]['Jurusan'];
					}
					if ($hasil[0]['Photo'] == NULL)$Photo = " ";
					else {
						$Photo = $hasil[0]['Photo'];
					}
					if ($hasil[0]['Institute'] == NULL)$Institute = " ";
					else {
						$Institute = $hasil[0]['Institute'];
					}
					if ($hasil[0]['No_Hp'] == NULL)$No_Hp = " ";
					else {
						$No_Hp = $hasil[0]['No_Hp'];
					}
					if ($hasil[0]['Tahun'] == NULL)$Tahun = " ";
					else {
						$Tahun = $hasil[0]['Tahun'];
					}
					if ($hasil[0]['Semester'] == NULL)$Semester = " ";
					else {
						$Semester = $hasil[0]['Semester'];
					}
					if ($hasil[0]['Password'] == NULL)$Password = " ";
					else {
						$Password = $hasil[0]['Password'];
					}

					$tambah = array( 
						"No_Pembina"	=> $No_Pembina,
						"Nama_Pembina" 	=> $Nama_Pembina,
						"Jurusan"		=> $Jurusan,
						"Photo" 		=> $Photo,
						"Institute" 	=> $Institute,
						"No_Hp" 		=> $No_Hp,
						"Tahun"			=> $Tahun,
						"Semester"		=> $Semester,
						"Password" 		=> $Password
					);

					$tambah_data = $this->fungsi->Tambah_Data('data_pembina', $tambah);
					$where = array( 
						"No" 				=> $Nilai
								);
					$Hapus = $this->fungsi->Hapus_Data('acount_pembina', $where);
				}

				redirect('pengurus/DataPembina');
			}else{
				redirect('pengurus/logout');
			}

			}else{
				redirect('pengurus/logout');
			}

		}else{
			redirect('pengurus/logout');
		}


	}

	public function ArsipkanSemuaPengurus($batas){
		if ($_SESSION != null){
			$No_Pengurus = $_SESSION['No_ID'];
			$Password = $_SESSION['Password'];
			$hasil = $this->fungsi->Ambil_Data('acount_pengurus ', "where No_Pengurus = '$No_Pengurus'");
			if (count($hasil) == 1){

			if ( $Password == $hasil[0]['Password'] ){
				for ($Nilai = 1; $Nilai <= $batas; $Nilai++){
					$hasil = $this->fungsi->Ambil_Data('acount_pengurus ', "where No = '$Nilai'");
					if ($hasil[0]['No_Pengurus'] == NULL)$No_Pengurus = " ";
					else {
						$No_Pengurus = $hasil[0]['No_Pengurus'];
					}
					if ($hasil[0]['Nama_Pengurus'] == NULL)$Nama_Pengurus = " ";
					else {
						$Nama_Pengurus = $hasil[0]['Nama_Pengurus'];
					}
					if ($hasil[0]['Jurusan'] == NULL)$Jurusan = " ";
					else {
						$Jurusan = $hasil[0]['Jurusan'];
					}
					if ($hasil[0]['Photo'] == NULL)$Photo = " ";
					else {
						$Photo = $hasil[0]['Photo'];
					}
					if ($hasil[0]['Institute'] == NULL)$Institute = " ";
					else {
						$Institute = $hasil[0]['Institute'];
					}
					if ($hasil[0]['No_Hp'] == NULL)$No_Hp = " ";
					else {
						$No_Hp = $hasil[0]['No_Hp'];
					}
					if ($hasil[0]['Tahun'] == NULL)$Tahun = " ";
					else {
						$Tahun = $hasil[0]['Tahun'];
					}
					if ($hasil[0]['Semester'] == NULL)$Semester = " ";
					else {
						$Semester = $hasil[0]['Semester'];
					}
					if ($hasil[0]['Password'] == NULL)$Password = " ";
					else {
						$Password = $hasil[0]['Password'];
					}

					$tambah = array( 
						"No_Pengurus"	=> $No_Pengurus,
						"Nama_Pengurus" => $Nama_Pengurus,
						"Jurusan"		=> $Jurusan,
						"Photo" 		=> $Photo,
						"Institute" 	=> $Institute,
						"No_Hp" 		=> $No_Hp,
						"Tahun"			=> $Tahun,
						"Semester"		=> $Semester,
						"Password" 		=> $Password
					);

					$tambah_data = $this->fungsi->Tambah_Data('data_pengurus', $tambah);
					$where = array( 
						"No" 				=> $Nilai
								);
					$Hapus = $this->fungsi->Hapus_Data('acount_pengurus', $where);
				}
				redirect('pengurus/DataPengurus');
			}else{
				redirect('pengurus/logout');
			}

			}else{
				redirect('pengurus/logout');
			}

		}else{
			redirect('pengurus/logout');
		}
	}


	public function ArsipkanSemuaPengajar($batas){
		if ($_SESSION != null){
			$No_Pengurus = $_SESSION['No_ID'];
			$Password = $_SESSION['Password'];
			$hasil = $this->fungsi->Ambil_Data('acount_pengurus ', "where No_Pengurus = '$No_Pengurus'");
			if (count($hasil) == 1){

			if ( $Password == $hasil[0]['Password'] ){
				for ($Nilai = 1; $Nilai <= $batas; $Nilai++){
					$hasil = $this->fungsi->Ambil_Data('acount_pengajar ', "where No = '$Nilai'");
					if ($hasil[0]['No_Pengajar'] == NULL)$No_Pengajar = " ";
					else {
						$No_Pengajar = $hasil[0]['No_Pengajar'];
					}
					if ($hasil[0]['Nama_Pengajar'] == NULL)$Nama_Pengajar = " ";
					else {
						$Nama_Pengajar = $hasil[0]['Nama_Pengajar'];
					}
					if ($hasil[0]['Jurusan'] == NULL)$Jurusan = " ";
					else {
						$Jurusan = $hasil[0]['Jurusan'];
					}
					if ($hasil[0]['Photo'] == NULL)$Photo = " ";
					else {
						$Photo = $hasil[0]['Photo'];
					}
					if ($hasil[0]['Institute'] == NULL)$Institute = " ";
					else {
						$Institute = $hasil[0]['Institute'];
					}
					if ($hasil[0]['No_Hp'] == NULL)$No_Hp = " ";
					else {
						$No_Hp = $hasil[0]['No_Hp'];
					}
					if ($hasil[0]['Tahun'] == NULL)$Tahun = " ";
					else {
						$Tahun = $hasil[0]['Tahun'];
					}
					if ($hasil[0]['Semester'] == NULL)$Semester = " ";
					else {
						$Semester = $hasil[0]['Semester'];
					}
					if ($hasil[0]['Password'] == NULL)$Password = " ";
					else {
						$Password = $hasil[0]['Password'];
					}

					if ($hasil[0]['Bidang'] == NULL)$Bidang = " ";
					else {
						$Bidang = $hasil[0]['Bidang'];
					}

					if ($hasil[0]['Link_Line'] == NULL)$Link_Line = " ";
					else {
						$Link_Line = $hasil[0]['Link_Line'];
					}

					if ($hasil[0]['Acount_Fb'] == NULL)$Acount_Fb = " ";
					else {
						$Acount_Fb = $hasil[0]['Acount_Fb'];
					}
					if ($hasil[0]['Acount_Twitter'] == NULL)$Acount_Twitter = " ";
					else {
						$Acount_Twitter = $hasil[0]['Acount_Twitter'];
					}
					if ($hasil[0]['Acount_Line'] == NULL)$Acount_Line = " ";
					else {
						$Acount_Line = $hasil[0]['Acount_Line'];
					}
					


					$tambah = array( 
						"No_Pengajar"	=> $No_Pengajar,
						"Nama_Pengajar" => $Nama_Pengajar,
						"Jurusan"		=> $Jurusan,
						"Photo" 		=> $Photo,
						"Institute" 	=> $Institute,
						"Bidang"		=> $Bidang,
						"No_Hp" 		=> $No_Hp,
						"Acount_Fb"		=> $Acount_Fb,
						"Acount_Twitter"=> $Acount_Twitter,
						"Link_Line"		=> $Link_Line,
						"Acount_Line"	=> $Acount_Line,
						"Tahun"			=> $Tahun,
						"Semester"		=> $Semester,
						"Password" 		=> $Password
					);

					$tambah_data = $this->fungsi->Tambah_Data('data_pengajar', $tambah);
					$where = array( 
						"No" 				=> $Nilai
								);
					$Hapus = $this->fungsi->Hapus_Data('acount_pengajar', $where);
				}
				redirect('pengurus/DataPengajar');
			}else{
				redirect('pengurus/logout');
			}

			}else{
				redirect('pengurus/logout');
			}

		}else{
			redirect('pengurus/logout');
		}
	}

	public function ArsipkanSemuaSiswa($batas){
		if ($_SESSION != null){
			$No_Pengurus = $_SESSION['No_ID'];
			$Password = $_SESSION['Password'];
			$hasil = $this->fungsi->Ambil_Data('acount_pengurus ', "where No_Pengurus = '$No_Pengurus'");
			if (count($hasil) == 1){

			if ( $Password == $hasil[0]['Password'] ){
				for ($Nilai = 1; $Nilai <= $batas; $Nilai++){
					$hasil = $this->fungsi->Ambil_Data('acount_siswa ', "where No = '$Nilai'");
					if ($hasil[0]['No_Siswa'] == NULL)$No_Siswa = " ";
					else {
						$No_Siswa = $hasil[0]['No_Siswa'];
					}
					if ($hasil[0]['Nama_Siswa'] == NULL)$Nama_Siswa = " ";
					else {
						$Nama_Siswa = $hasil[0]['Nama_Siswa'];
					}
					if ($hasil[0]['Nama_Panggilan'] == NULL)$Nama_Panggilan = " ";
					else {
						$Nama_Panggilan = $hasil[0]['Nama_Panggilan'];
					}
					if ($hasil[0]['Jenis_Kelamin'] == NULL)$Jenis_Kelamin = " ";
					else {
						$Jenis_Kelamin = $hasil[0]['Jenis_Kelamin'];
					}
					if ($hasil[0]['TTL'] == NULL)$TTL = " ";
					else {
						$TTL = $hasil[0]['TTL'];
					}
					if ($hasil[0]['No_Hp'] == NULL)$No_Hp = " ";
					else {
						$No_Hp = $hasil[0]['No_Hp'];
					}
					if ($hasil[0]['Kelas'] == NULL)$Kelas = " ";
					else {
						$Kelas = $hasil[0]['Kelas'];
					}
					if ($hasil[0]['Sekolah'] == NULL)$Sekolah = " ";
					else {
						$Sekolah = $hasil[0]['Sekolah'];
					}
					if ($hasil[0]['Tahun'] == NULL)$Tahun = " ";
					else {
						$Tahun = $hasil[0]['Tahun'];
					}
					if ($hasil[0]['Acount_Fb'] == NULL)$Acount_Fb = " ";
					else {
						$Acount_Fb = $hasil[0]['Acount_Fb'];
					}
					if ($hasil[0]['Acount_Twitter'] == NULL)$Acount_Twitter = " ";
					else {
						$Acount_Twitter = $hasil[0]['Acount_Twitter'];
					}
					if ($hasil[0]['Acount_Line'] == NULL)$Acount_Line = " ";
					else {
						$Acount_Line = $hasil[0]['Acount_Line'];
					}
					if ($hasil[0]['Nama_Ayah'] == NULL)$Nama_Ayah = " ";
					else {
						$Nama_Ayah = $hasil[0]['Nama_Ayah'];
					}
					if ($hasil[0]['Pekerjaan_Ayah'] == NULL)$Pekerjaan_Ayah = " ";
					else {
						$Pekerjaan_Ayah = $hasil[0]['Pekerjaan_Ayah'];
					}
					if ($hasil[0]['No_Hp_Ayah'] == NULL)$No_Hp_Ayah = " ";
					else {
						$No_Hp_Ayah = $hasil[0]['No_Hp_Ayah'];
					}
					if ($hasil[0]['Nama_Ibu'] == NULL)$Nama_Ibu = " ";
					else {
						$Nama_Ibu = $hasil[0]['Nama_Ibu'];
					}
					if ($hasil[0]['Pekerjaan_Ibu'] == NULL)$Pekerjaan_Ibu = " ";
					else {
						$Pekerjaan_Ibu = $hasil[0]['Pekerjaan_Ibu'];
					}
					if ($hasil[0]['No_Hp_Ibu'] == NULL)$No_Hp_Ibu = " ";
					else {
						$No_Hp_Ibu = $hasil[0]['No_Hp_Ibu'];
					}
					if ($hasil[0]['Alamat'] == NULL)$Alamat = " ";
					else {
						$Alamat = $hasil[0]['Alamat'];
					}
					if ($hasil[0]['Password'] == NULL)$Password = " ";
					else {
						$Password = $hasil[0]['Password'];
					}
					if ($hasil[0]['Link_Line'] == NULL)$Link_Line = " ";
					else {
						$Link_Line = $hasil[0]['Link_Line'];
					}

					$tambah = array( 
						"No_Siswa"			=> $No_Siswa,
						"Nama_Siswa" 		=> $Nama_Siswa,
						"Nama_Panggilan"	=> $Nama_Panggilan,
						"Jenis_Kelamin"		=> $Jenis_Kelamin,
						"TTL"				=> $TTL,
						"No_Hp"				=> $No_Hp,
						"Kelas"				=> $Kelas,
						"Sekolah"			=> $Sekolah,
						"Tahun"				=> $Tahun,
						"Acount_Fb"			=> $Acount_Fb,
						"Acount_Twitter"	=> $Acount_Twitter,
						"Link_Line"			=> $Link_Line,
						"Acount_Line"		=> $Acount_Line,
						"Nama_Ayah"			=> $Nama_Ayah,
						"Pekerjaan_Ayah"	=> $Pekerjaan_Ayah,
						"No_Hp_Ayah"		=> $No_Hp_Ayah,
						"Nama_Ibu"			=> $Nama_Ibu,
						"Pekerjaan_Ibu"		=> $Pekerjaan_Ibu,
						"No_Hp_Ibu"			=> $No_Hp_Ibu,
						"Alamat"			=> $Alamat,
						"Password"			=> $Password
						);

					$tambah_data = $this->fungsi->Tambah_Data('data_siswa', $tambah);
					$where = array( 
						"No" 				=> $Nilai
								);
					$Hapus = $this->fungsi->Hapus_Data('acount_siswa', $where);
				}
				redirect('pengurus/DataSiswa');
			}else{
				redirect('pengurus/logout');
			}

			}else{
				redirect('pengurus/logout');
			}

		}else{
			redirect('pengurus/logout');
		}
	}


	public function ArsipkanSemuaSiswaReguler($batas){
		if ($_SESSION != null){
			$No_Pengurus = $_SESSION['No_ID'];
			$Password = $_SESSION['Password'];
			$hasil = $this->fungsi->Ambil_Data('acount_pengurus ', "where No_Pengurus = '$No_Pengurus'");
			if (count($hasil) == 1){

			if ( $Password == $hasil[0]['Password'] ){
				for ($Nilai = 1; $Nilai <= $batas; $Nilai++){
					$hasil = $this->fungsi->Ambil_Data('acount_Siswa_reguler ', "where No = '$Nilai'");
					if ($hasil[0]['No_Siswa'] == NULL)$No_Siswa = " ";
					else {
						$No_Siswa = $hasil[0]['No_Siswa'];
					}
					if ($hasil[0]['Nama_Siswa'] == NULL)$Nama_Siswa = " ";
					else {
						$Nama_Siswa = $hasil[0]['Nama_Siswa'];
					}
					if ($hasil[0]['Nama_Panggilan'] == NULL)$Nama_Panggilan = " ";
					else {
						$Nama_Panggilan = $hasil[0]['Nama_Panggilan'];
					}
					if ($hasil[0]['Jenis_Kelamin'] == NULL)$Jenis_Kelamin = " ";
					else {
						$Jenis_Kelamin = $hasil[0]['Jenis_Kelamin'];
					}
					if ($hasil[0]['TTL'] == NULL)$TTL = " ";
					else {
						$TTL = $hasil[0]['TTL'];
					}
					if ($hasil[0]['No_Hp'] == NULL)$No_Hp = " ";
					else {
						$No_Hp = $hasil[0]['No_Hp'];
					}
					if ($hasil[0]['Kelas'] == NULL)$Kelas = " ";
					else {
						$Kelas = $hasil[0]['Kelas'];
					}
					if ($hasil[0]['Sekolah'] == NULL)$Sekolah = " ";
					else {
						$Sekolah = $hasil[0]['Sekolah'];
					}
					if ($hasil[0]['Tahun'] == NULL)$Tahun = " ";
					else {
						$Tahun = $hasil[0]['Tahun'];
					}
					if ($hasil[0]['Acount_Fb'] == NULL)$Acount_Fb = " ";
					else {
						$Acount_Fb = $hasil[0]['Acount_Fb'];
					}
					if ($hasil[0]['Acount_Twitter'] == NULL)$Acount_Twitter = " ";
					else {
						$Acount_Twitter = $hasil[0]['Acount_Twitter'];
					}
					if ($hasil[0]['Acount_Line'] == NULL)$Acount_Line = " ";
					else {
						$Acount_Line = $hasil[0]['Acount_Line'];
					}
					if ($hasil[0]['Nama_Ayah'] == NULL)$Nama_Ayah = " ";
					else {
						$Nama_Ayah = $hasil[0]['Nama_Ayah'];
					}
					if ($hasil[0]['Pekerjaan_Ayah'] == NULL)$Pekerjaan_Ayah = " ";
					else {
						$Pekerjaan_Ayah = $hasil[0]['Pekerjaan_Ayah'];
					}
					if ($hasil[0]['No_Hp_Ayah'] == NULL)$No_Hp_Ayah = " ";
					else {
						$No_Hp_Ayah = $hasil[0]['No_Hp_Ayah'];
					}
					if ($hasil[0]['Nama_Ibu'] == NULL)$Nama_Ibu = " ";
					else {
						$Nama_Ibu = $hasil[0]['Nama_Ibu'];
					}
					if ($hasil[0]['Pekerjaan_Ibu'] == NULL)$Pekerjaan_Ibu = " ";
					else {
						$Pekerjaan_Ibu = $hasil[0]['Pekerjaan_Ibu'];
					}
					if ($hasil[0]['No_Hp_Ibu'] == NULL)$No_Hp_Ibu = " ";
					else {
						$No_Hp_Ibu = $hasil[0]['No_Hp_Ibu'];
					}
					if ($hasil[0]['Alamat'] == NULL)$Alamat = " ";
					else {
						$Alamat = $hasil[0]['Alamat'];
					}
					if ($hasil[0]['Password'] == NULL)$Password = " ";
					else {
						$Password = $hasil[0]['Password'];
					}
					if ($hasil[0]['Link_Line'] == NULL)$Link_Line = " ";
					else {
						$Link_Line = $hasil[0]['Link_Line'];
					}



					$tambah = array( 
						"No_Siswa"			=> $No_Siswa,
						"Nama_Siswa" 		=> $Nama_Siswa,
						"Nama_Panggilan"	=> $Nama_Panggilan,
						"Jenis_Kelamin"		=> $Jenis_Kelamin,
						"TTL"				=> $TTL,
						"No_Hp"				=> $No_Hp,
						"Kelas"				=> $Kelas,
						"Sekolah"			=> $Sekolah,
						"Tahun"				=> $Tahun,
						"Acount_Fb"			=> $Acount_Fb,
						"Acount_Twitter"	=> $Acount_Twitter,
						"Link_Line"			=> $Link_Line,
						"Acount_Line"		=> $Acount_Line,
						"Nama_Ayah"			=> $Nama_Ayah,
						"Pekerjaan_Ayah"	=> $Pekerjaan_Ayah,
						"No_Hp_Ayah"		=> $No_Hp_Ayah,
						"Nama_Ibu"			=> $Nama_Ibu,
						"Pekerjaan_Ibu"		=> $Pekerjaan_Ibu,
						"No_Hp_Ibu"			=> $No_Hp_Ibu,
						"Alamat"			=> $Alamat,
						"Password"			=> $Password
						);

					$tambah_data = $this->fungsi->Tambah_Data('data_siswa_reguler', $tambah);
					$where = array( 
						"No" 				=> $Nilai
								);
					$Hapus = $this->fungsi->Hapus_Data('acount_siswa_reguler', $where);
				}
				redirect('pengurus/DataSiswaReguler');
			}else{
				redirect('pengurus/logout');
			}

			}else{
				redirect('pengurus/logout');
			}

		}else{
			redirect('pengurus/logout');
		}
	}


	public function ArsipkanSemuaSiswaSBM($batas){
		if ($_SESSION != null){
			$No_Pengurus = $_SESSION['No_ID'];
			$Password = $_SESSION['Password'];
			$hasil = $this->fungsi->Ambil_Data('acount_pengurus ', "where No_Pengurus = '$No_Pengurus'");
			if (count($hasil) == 1){

			if ( $Password == $hasil[0]['Password'] ){
				for ($Nilai = 1; $Nilai <= $batas; $Nilai++){
					$hasil = $this->fungsi->Ambil_Data('acount_siswa_sbmptn ', "where No = '$Nilai'");
					if ($hasil[0]['No_Siswa'] == NULL)$No_Siswa = " ";
					else {
						$No_Siswa = $hasil[0]['No_Siswa'];
					}
					if ($hasil[0]['Nama_Siswa'] == NULL)$Nama_Siswa = " ";
					else {
						$Nama_Siswa = $hasil[0]['Nama_Siswa'];
					}
					if ($hasil[0]['Nama_Panggilan'] == NULL)$Nama_Panggilan = " ";
					else {
						$Nama_Panggilan = $hasil[0]['Nama_Panggilan'];
					}
					if ($hasil[0]['Jenis_Kelamin'] == NULL)$Jenis_Kelamin = " ";
					else {
						$Jenis_Kelamin = $hasil[0]['Jenis_Kelamin'];
					}
					if ($hasil[0]['TTL'] == NULL)$TTL = " ";
					else {
						$TTL = $hasil[0]['TTL'];
					}
					if ($hasil[0]['No_Hp'] == NULL)$No_Hp = " ";
					else {
						$No_Hp = $hasil[0]['No_Hp'];
					}
					if ($hasil[0]['Kelas'] == NULL)$Kelas = " ";
					else {
						$Kelas = $hasil[0]['Kelas'];
					}
					if ($hasil[0]['Sekolah'] == NULL)$Sekolah = " ";
					else {
						$Sekolah = $hasil[0]['Sekolah'];
					}
					if ($hasil[0]['Tahun'] == NULL)$Tahun = " ";
					else {
						$Tahun = $hasil[0]['Tahun'];
					}
					if ($hasil[0]['Acount_Fb'] == NULL)$Acount_Fb = " ";
					else {
						$Acount_Fb = $hasil[0]['Acount_Fb'];
					}
					if ($hasil[0]['Acount_Twitter'] == NULL)$Acount_Twitter = " ";
					else {
						$Acount_Twitter = $hasil[0]['Acount_Twitter'];
					}
					if ($hasil[0]['Acount_Line'] == NULL)$Acount_Line = " ";
					else {
						$Acount_Line = $hasil[0]['Acount_Line'];
					}
					if ($hasil[0]['Nama_Ayah'] == NULL)$Nama_Ayah = " ";
					else {
						$Nama_Ayah = $hasil[0]['Nama_Ayah'];
					}
					if ($hasil[0]['Pekerjaan_Ayah'] == NULL)$Pekerjaan_Ayah = " ";
					else {
						$Pekerjaan_Ayah = $hasil[0]['Pekerjaan_Ayah'];
					}
					if ($hasil[0]['No_Hp_Ayah'] == NULL)$No_Hp_Ayah = " ";
					else {
						$No_Hp_Ayah = $hasil[0]['No_Hp_Ayah'];
					}
					if ($hasil[0]['Nama_Ibu'] == NULL)$Nama_Ibu = " ";
					else {
						$Nama_Ibu = $hasil[0]['Nama_Ibu'];
					}
					if ($hasil[0]['Pekerjaan_Ibu'] == NULL)$Pekerjaan_Ibu = " ";
					else {
						$Pekerjaan_Ibu = $hasil[0]['Pekerjaan_Ibu'];
					}
					if ($hasil[0]['No_Hp_Ibu'] == NULL)$No_Hp_Ibu = " ";
					else {
						$No_Hp_Ibu = $hasil[0]['No_Hp_Ibu'];
					}
					if ($hasil[0]['Alamat'] == NULL)$Alamat = " ";
					else {
						$Alamat = $hasil[0]['Alamat'];
					}
					if ($hasil[0]['Password'] == NULL)$Password = " ";
					else {
						$Password = $hasil[0]['Password'];
					}
					if ($hasil[0]['Link_Line'] == NULL)$Link_Line = " ";
					else {
						$Link_Line = $hasil[0]['Link_Line'];
					}

					$tambah = array( 
						"No_Siswa"			=> $No_Siswa,
						"Nama_Siswa" 		=> $Nama_Siswa,
						"Nama_Panggilan"	=> $Nama_Panggilan,
						"Jenis_Kelamin"		=> $Jenis_Kelamin,
						"TTL"				=> $TTL,
						"No_Hp"				=> $No_Hp,
						"Kelas"				=> $Kelas,
						"Sekolah"			=> $Sekolah,
						"Tahun"				=> $Tahun,
						"Acount_Fb"			=> $Acount_Fb,
						"Acount_Twitter"	=> $Acount_Twitter,
						"Link_Line"			=> $Link_Line,
						"Acount_Line"		=> $Acount_Line,
						"Nama_Ayah"			=> $Nama_Ayah,
						"Pekerjaan_Ayah"	=> $Pekerjaan_Ayah,
						"No_Hp_Ayah"		=> $No_Hp_Ayah,
						"Nama_Ibu"			=> $Nama_Ibu,
						"Pekerjaan_Ibu"		=> $Pekerjaan_Ibu,
						"No_Hp_Ibu"			=> $No_Hp_Ibu,
						"Alamat"			=> $Alamat,
						"Password"			=> $Password
						);

					$tambah_data = $this->fungsi->Tambah_Data('data_siswa_sbmptn', $tambah);
					$where = array( 
						"No" 				=> $Nilai
								);
					$Hapus = $this->fungsi->Hapus_Data('acount_siswa_sbmptn', $where);
				}
				redirect('pengurus/DataSiswaSBM');
			}else{
				redirect('pengurus/logout');
			}

			}else{
				redirect('pengurus/logout');
			}

		}else{
			redirect('pengurus/logout');
		}
	}
//----------------------------------------------------------------------Beres
 
	public function logout(){
		session_unset();
		redirect('pengurus/loginPengurus');
	}
}