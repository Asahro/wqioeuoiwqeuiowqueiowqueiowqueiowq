<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>KLC SISWA</title>
    <!-- BOOTSTRAP STYLES-->
    <link href="<?php echo base_url(); ?>asset/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="<?php echo base_url(); ?>asset/css/font-awesome.css" rel="stylesheet" />
    <!--CUSTOM BASIC STYLES-->
    <link href="<?php echo base_url(); ?>asset/css/basic.css" rel="stylesheet" />
    <!--CUSTOM MAIN STYLES-->
    <link href="<?php echo base_url(); ?>asset/css/custom.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>asset/disain.css">
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
                <div class="container">
                    <div class="row">
                        <div class="grid_12">
                            <div class="brand put-left">
                                <h1>
                                    <a href="<?php echo base_url(); ?>">
                                        <img src="<?php echo base_url(); ?>asset/images/logoKLC.png" alt="Logo"/>
                                    </a>
                                </h1>
                            </div>
                            <nav class="nav put-right">
                                <ul class="sf-menu">
		                            <li><a href="<?php echo base_url(); ?>">Home</a></li>
		                            <li class="current"><a href="<?php echo base_url()."siswa/login_siswa"; ?>">Siswa</a>
<!-- 
                                        <ul>
                                            <li ><a href="<?php echo base_url()."siswa/login_siswa"; ?>">Privat</a></li>
                                            <li><a href="<?php echo base_url()."siswareguler/login_siswa"; ?>">Reguler</a></li>
                                            <li class="current"><a href="<?php echo base_url()."siswasbm/login_siswa"; ?>">SBMPTN</a></li>
                                        </ul> 
-->
                                    </li>
		                            <li><a href="#">Pengajar</a>	
										<ul>
                                            <li><a href="<?php echo base_url()."Pengajar/login_pengajar"; ?>">Privat</a></li>
                                            <li><a href="<?php echo base_url()."Pengajareguler/login_pengajar"; ?>">Reguler</a></li>
                                            <li><a href="<?php echo base_url()."Pengajasbm/login_pengajar"; ?>">SBMPTN</a></li>
                                        </ul></li>
		                            <li><a href="<?php echo base_url()."pengurus/login_pengurus"; ?>">Pengurus</a></li>
		                            <li><a href="#">Contacts</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </nav>
        <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li>
                        <div class="user-img-div">
                                <div class="inner-text">
                	            <a href="<?php echo base_url()."siswasbm/ubah_profil"; ?>"><img src="<?php echo base_url(); ?>asset/Photo Siswa/<?php echo $_SESSION['Nama_Photo']; ?>" class="img-thumbnail" /></a>
                    	        <br />
                        	    <br />
                                <?php echo $_SESSION['Nama_Siswa']; ?>
                            	<br />
                                <small><?php echo $_SESSION['No_Siswa']; ?></small>
                            </div>
                        </div>
                    </li>
                    <li>
                        <a href="<?php echo base_url()."siswasbm/profil"; ?>"><i class="fa fa-desktop "></i>Profil</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url()."siswasbm/biaya"; ?>"><i class="fa fa-money "></i>Data Biaya</a>
                    </li>
                    <li>
                        <a class="active-menu" href="<?php echo base_url()."siswasbm/Reservasi"; ?>"><i class="fa fa-plus-square-o "></i>Buat Reservasi</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url()."siswasbm/kelompok"; ?>"><i class="fa fa-group "></i>Kelompok Saya</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url()."siswasbm/Jadwal_saya"; ?>"><i class="fa fa-calendar "></i>Jadwal Belajar</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url()."siswasbm/Riwayat_saya"; ?>"><i class="fa fa-calendar "></i>Riwayat Belajar</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url()."siswasbm/reservasi_saya"; ?>"><i class="fa fa-bookmark "></i>Reservasi Saya</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url()."siswasbm/logout"; ?>"><i class="fa fa-sign-out "></i>Sigout</a>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
             			<h1 class="page-head-line">
                        Tambah Reservasi
                        </h1>
                    </div><div class="row">
                        <div class="table-responsive">
                            <form method="POST" action="<?php echo base_url()."siswasbm/Tambah_Reservasi"; ?>">
                                <table class="table table-striped table-bordered table-hover" >
                                    <thead>
                                        <tr>
                                            <th>Hari/ Tanggal [Hari / DD / MM]</th>
                                            <td><input type="text"  style="width: 100px"  name="Hari"/>
                                            <input type="number" style="width: 60px"  name="Tanggal"  max="31" min = "1"/>
                                            <input type="number" name="Bulan" max="12" style="width: 60px" min = "1"/></td>
                                        </tr>
                                        <tr>
                                            <th>Waktu [Jam : Menit]</th>
                                            <td><input type="number" name="Jam" max="24" min = "0" name="Tanggal" style="width: 60px" /> :
                                            <input type="number" name="Menit" max="60" min = "0" name="Tanggal" style="width: 60px" /></td>
                                        </tr>
                                        <tr>
                                            <th>Materi</th>
                                            <td><input type="text" name="Materi" /></td>
                                        </tr>
                                        <tr>
                                            <th>Pembina</th>
                                            <td>
                                                <?php $Nomor = 0; ?>
                                <?php foreach ($data as $reservasi) { ?>
                                <input type="radio" name="Bidang" value="<?php echo $reservasi['No_Pengurus']; ?>" checked><?php echo $reservasi['Nama_Pengurus']; ?>
                                                <br>
                                <?php } ?>
                                                

                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Kriteria Pengajar</th>
                                            <td><textarea  name="Kriteria_Pengajar" value=""></textarea></td>
                                        </tr>
                                        <tr>
                                            <td><input type="Submit" name="Kirim" value="POST" /></td>
                                        </tr>
                                    </thead>
                                </table>
                            </form>
                    </div>
                </div>
                
                </div>
                <hr />
                <!--/.Row-->
                <!--/.ROW-->
            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->
    <div id="footer-sec">
        &copy; 2014 YourCompany | Editted By : <a href="http://www.facebook.com/ahmadsahro">Ahmad Sahro</a>
    </div>
    <!-- /. FOOTER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="<?php echo base_url(); ?>asset/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="<?php echo base_url(); ?>asset/js/bootstrap.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="<?php echo base_url(); ?>asset/js/jquery.metisMenu.js"></script>
       <!-- CUSTOM SCRIPTS -->
    <script src="<?php echo base_url(); ?>asset/js/custom.js"></script>
    <script src="<?php echo base_url(); ?>asset/js/script.js"></script>

</body>
</html>