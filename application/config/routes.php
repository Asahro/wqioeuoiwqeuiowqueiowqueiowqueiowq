<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/


$route['default_controller'] = 'home';
$route['login'] = 'login/halamanlogin';
$route['ceklogin'] = 'login/ceklogin';
$route['register'] = 'login/register';
$route['verifikasi-register'] = 'login/verifikasiregister';
$route['cek-register'] = 'login/cekregister';
$route['lupa-password'] = 'login/lupapassword';
$route['verifikasi-lupa-password'] = 'login/verifikasilupapassword';




$route['profil-siswa'] = 'siswa/profil';

$route['pesan-bimbel'] = 'siswa/pesanbimbel';
$route['tambah-pesanan-bimbel'] = 'siswa/tambahpesanbimbel';
$route['ubah-pesanan-bimbel'] = 'siswa/ubahpesanan';
$route['update-pesanan-bimbel'] = 'siswa/updatepesananbimbel';
$route['batal-bimbel'] = 'siswa/batalpesan';
$route['jadwal-bimbel'] = 'siswa/jadwalbimbel';
$route['hapus-jadwal-bimbel'] = 'siswa/hapusjadwalbimbel';
$route['riwayat-bimbel'] = 'siswa/riwayatbimbel';
$route['biodata-pengajar'] = 'siswa/biodatapengajar';



$route['profil-guru'] = 'guru/profil';
$route['tambah-siswa'] = 'guru/tambahsiswa';
$route['absen-hari-ini'] = 'guru/formabsen';
$route['simpan-absen-hari-ini'] = 'guru/simpanabsen';
$route['absen-siswa/(:any)'] = 'guru/absensiswa/$1';


// $route['registrasi-siswa-bimbelan'] = 'siswa/registrasisiswa';
// $route['reset-password-siswa-bimbelan'] = 'siswa/lupasiswa';

// $route['login-siswa'] = 'siswa/proses_login_siswa';
// $route['beranda-siswa'] = 'siswa/beranda';
// $route['siswa-pesan-bimbel'] = 'siswa/pesan';
// $route['download-materi/(:any)'] = 'siswa/buku/$1';
// $route['download-soal/(:any)'] = 'siswa/soal/$1';
// $route['tonton-video/(:any)'] = 'siswa/video/$1';


// $route['(:any)'] = 'home/page/$1';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
