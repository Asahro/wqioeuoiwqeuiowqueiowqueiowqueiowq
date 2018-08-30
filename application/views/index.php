<!DOCTYPE html>
<html  class="no-js" lang="en">
   <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>EradiSchool</title>
        <meta name="keywords" content="" />
        <meta charset="ISO-8859-1"> 

        <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">
        <link href="<?php echo base_url(); ?>assets/css/style.css" rel='stylesheet' type='text/css' media="all">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/lightbox.css">
        <link href="<?php echo base_url(); ?>assets/css/style.css" rel='stylesheet' type='text/css' media="all">
        <link href="//fonts.googleapis.com/css?family=Roboto:300,400,500,700,900" rel="stylesheet">
        <link href="//fonts.googleapis.com/css?family=Lato:100,300,400,700,900" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css" />
        <script type="application/x-javascript">

            addEventListener("load", function () {
                setTimeout(hideURLbar, 0);
            }, false);

            function hideURLbar() {
                window.scrollTo(0, 1);
            }
        </script>
   </head>
   <body>
        <header>
            <section class="main_section_agile">
                <div class="agileits_w3layouts_banner_nav">
                    <div class="header-bar py-sm-2">
                        <div class="container py-2">
                            <nav class="navbar navbar-expand-lg navbar-light  wow fadeInDown"  data-wow-duration="2s">
                                <div class="hedder-up">
                                    <h1><a class="navbar-brand" href="<?php echo base_url();?>">EradiSchool</a></h1>
                                </div>
                                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon"></span>
                                </button>
                               <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                                   <ul class="navbar-nav">
                                        <li class="nav-item active">
                                            <a class="nav-link" href="#home">Home <span class="sr-only">(current)</span></a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#layanan" class="nav-link">Layanan</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#galeri" class="nav-link ">Galeri</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#mitra" class="nav-link">Mitra</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#testimoni" class="nav-link">Testimoni</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#kontak" class="nav-link">Kontak</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="<?php echo base_url();?>login" class="nav-link">Login</a>
                                        </li>
                                    </ul>
                                </div>
                            </nav>              
                        </div>
                    </div>
                </div>
                <div class="w3-banner">
                    <div id="typer">Ads</div>
                    <p class="mx-auto py-3">EradiSchool merupakan sebuah tempat dimana kamu dapat menemukan sebuah cara belajar baru yang lebih mudah, murah, dan effisien.
                    </p>
                </div>
            </section>
        </header>


    <!-- 
    <section class="banner_bottom py-md-5">
        <div class="container py-4 mt-2">
            <h3 class="tittle text-center mb-3">About Us</h3>
            <p class="tit text-center mx-auto">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius eum inventore consectetur dolorum, voluptatum possimus temporibus vel ab, nesciunt quod!</p>
            <div class="inner_sec_info_wthree_agile pt-4 mt-md-4">
                <div class="row help_full">
                    <div class="col-md-6 banner_bottom_grid help">
                        <img src="<?php echo base_url(); ?>assets/images/g13.jpg" alt=" " class="img-fluid">
                    </div>
                    <div class="col-md-6 banner_bottom_left">
                        <h4>Lorem Ipsum convallis diam</h4>
                        <p>Pellentesque convallis diam consequat magna vulputate malesuada. Cras a ornare elit. Nulla viverra pharetra sem, eget
                            pulvinar neque pharetra ac.</p>
                        <p>Lorem Ipsum convallis diam consequat magna vulputate malesuada. Cras a ornare elit. Nulla viverra pharetra sem, eget
                            pulvinar neque pharetra ac.</p>
                        <a href="#" class="blog-btn" data-toggle="modal" data-target="#myModal">Read More</a>
                    </div>
                </div>
            </div>
        </div>
    </section> -->
    
        <section class="wthree-row w3-about py-md-5" id="layanan">
            <div class="container py-4 mt-2">
                <h3 class="tittle text-center mb-3 wow bounceInDown"  data-wow-duration="2s" >Layanan Kami</h3>
                <p class="tit text-center mx-auto" ></p>
                    <div class="card-deck pt-4 mt-md-4">
                        <div class="card wow fadeInLeft"  data-wow-duration="2s">
                            <img src="<?php echo base_url(); ?>assets/images/bimbel-privat.jpg" class="img-fluid"  alt="Card image cap">
                                <div class="card-body w3ls-card">
                                <h5 class="card-title">Bimbel Privat Per 1 Pertemuan</h5>
                                <p class="card-text mb-3 ">Sudah tidak perlu lagi membeli bimbel dengan harga mahal untuk jumlah pertemuan yang banyak. Cukup banyar persatu pertemuan</p>
                                <a href="#" class="blog-btn" data-toggle="modal" data-target="#myModal">Harga</a>
                            </div>
                        </div>
                        <div class="card wow flipInX"  data-wow-duration="1s" >
                            <img src="<?php echo base_url(); ?>assets/images/sekolah.jpg" class="img-fluid"  alt="Card image cap">
                            <div class="card-body w3ls-card">
                                <h5 class="card-title">Managemen Sekolah Digital</h5>
                                <p class="card-text mb-3 ">Tidak perlu repot melakukan administrasi sekolah. Pendaftaran, Pembelajaran, dan Penilaian semua terangkum disini !</p>
                                <a href="#" class="blog-btn" data-toggle="modal" data-target="#myModal">Harga</a>
                            </div>
                        </div>
                        <div class="card wow fadeInRight"  data-wow-duration="2s" >
                            <img src="<?php echo base_url(); ?>assets/images/belajar-online.jpg" class="img-fluid"  alt="Card image cap">
                            <div class="card-body w3ls-card">
                                <h5 class="card-title">Online Studi</h5>
                                <p class="card-text mb-3 ">Nikmati mudahnya belajar online dengan berbagai macam metode. Mulai dari video, test online, ebook, dan soal soal ujian.</p>
                                <a href="#" class="blog-btn" data-toggle="modal" data-target="#myModal">Harga</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- //about -->
            <!-- services -->
    <div class="agileits-services py-md-5">
        <div class="container py-4 mt-2">
            <h3 class="tittle text-center mb-3 text-white mb-3 wow bounceInDown"  data-wow-duration="2s" >Kelebihan Kami</h3>
                <p class="tit text-center mx-auto text-white"></p>
                <div class="row agileits-services-row pt-4 mt-md-4">
                    <div class="col-md-4 agileits-services-grids wow fadeInRight"  data-wow-duration="2s" >
                        <div class="row ser-tp">
                            <div class="col-xs-3 wthree-ser">
                                <i class="fas fa-money-bill"></i>
                            </div>
                            <div class="col-xs-9 wthree-heading">
                                <h4 class="pl-3">Harga Terjangkau</h4>
                            </div>
                        <p class="mt-3">Dibandingkan dengan Quipers dan Ruang Guru harga kami lebih baik dan lebih terjangkau</p>
                        </div>
                    </div>
                    <div class="col-md-4 agileits-services-grids wow fadeInRight"  data-wow-duration="2s" >
                        <div class="row ser-tp">    
                            <div class="col-xs-3 wthree-ser">
                                <i class="fab fa-connectdevelop"></i>
                            </div>
                            <div class="col-xs-9 wthree-heading">
                                <h4 class="pl-3">Akses Mudah</h4>
                            </div>
                        <p class="mt-3">Belajar Kapanpun dan Dimanapun dengan layani kami dapat meningkatkan semangat belajar</p>
                        </div>
                    </div>
                    <div class="col-md-4 agileits-services-grids wow fadeInRight"  data-wow-duration="2s" >
                        <div class="row ser-tp">
                            <div class="col-xs-3 wthree-ser">
                                <i class="far fa-save"></i>
                            </div>
                            <div class="col-xs-9 wthree-heading">
                                <h4 class="pl-3">Data Aman</h4>
                            </div>
                        <p class="mt-3">Akses data anda kapanpun dimanapun. Dengan hosting luas, anda dapat menyimpan semua data</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- //services -->

    <!--gallery-->
    <section class="gallery py-md-5" id="galeri">
        <div class="container py-4 mt-2">
            <h2 class="tittle text-center mb-3 wow bounceInUp"  data-wow-duration="2s" >Galeri Kegiatan</h2>
            <p class="tit text-center mx-auto"></p>
            <div class="row gallery-info pt-4 mt-md-4">
                <div class="col-md-3 gallery-grids wow bounceInUp"  data-wow-duration="2s" >
                    <a href="<?php echo base_url(); ?>assets/images/g3.jpg" class="gallery-box" data-lightbox="example-set" data-title="">
                        <img src="<?php echo base_url(); ?>assets/images/g3.jpg" alt="" class="img-responsive zoom-img">
                    </a>
                </div>
                <div class="col-md-3 gallery-grids wow bounceInUp"  data-wow-duration="2s" >
                    <a href="<?php echo base_url(); ?>assets/images/g4.jpg" class="gallery-box" data-lightbox="example-set" data-title="">
                        <img src="<?php echo base_url(); ?>assets/images/g4.jpg" alt="" class="img-responsive zoom-img">
                    </a>
                </div>
                <div class="col-md-3 gallery-grids wow bounceInUp"  data-wow-duration="2s" >
                    <a href="<?php echo base_url(); ?>assets/images/g5.jpg" class="gallery-box" data-lightbox="example-set" data-title="">
                        <img src="<?php echo base_url(); ?>assets/images/g5.jpg" alt="" class="img-responsive zoom-img">
                    </a>
                </div>
                <div class="col-md-3 gallery-grids wow bounceInUp"  data-wow-duration="2s" >
                    <a href="<?php echo base_url(); ?>assets/images/g6.jpg" class="gallery-box" data-lightbox="example-set" data-title="">
                        <img src="<?php echo base_url(); ?>assets/images/g6.jpg" alt="" class="img-responsive zoom-img">
                    </a>
                </div>
                <div class="col-md-3 gallery-grids wow bounceInUp"  data-wow-duration="2s" >
                    <a href="<?php echo base_url(); ?>assets/images/g7.jpg" class="gallery-box" data-lightbox="example-set" data-title="">
                        <img src="<?php echo base_url(); ?>assets/images/g7.jpg" alt="" class="img-responsive zoom-img">
                    </a>
                </div>
                <div class="col-md-3 gallery-grids wow bounceInUp"  data-wow-duration="2s" >
                    <a href="<?php echo base_url(); ?>assets/images/g8.jpg" class="gallery-box" data-lightbox="example-set" data-title="">
                        <img src="<?php echo base_url(); ?>assets/images/g8.jpg" alt="" class="img-responsive zoom-img">
                    </a>
                </div>
                <div class="col-md-3 gallery-grids wow bounceInUp"  data-wow-duration="2s" >
                    <a href="<?php echo base_url(); ?>assets/images/g9.jpg" class="gallery-box" data-lightbox="example-set" data-title="">
                        <img src="<?php echo base_url(); ?>assets/images/g9.jpg" alt="" class="img-responsive zoom-img">
                    </a>
                </div>
                <div class="col-md-3 gallery-grids wow bounceInUp"  data-wow-duration="2s" >
                    <a href="<?php echo base_url(); ?>assets/images/g10.jpg" class="gallery-box" data-lightbox="example-set" data-title="">
                        <img src="<?php echo base_url(); ?>assets/images/g10.jpg" alt="" class="img-responsive zoom-img">
                    </a>
                </div>
                <div class="col-md-3 gallery-grids wow bounceInUp"  data-wow-duration="2s" >
                    <a href="<?php echo base_url(); ?>assets/images/g11.jpg" class="gallery-box" data-lightbox="example-set" data-title="">
                        <img src="<?php echo base_url(); ?>assets/images/g11.jpg" alt="" class="img-responsive zoom-img">
                    </a>
                </div>
                <div class="col-md-3 gallery-grids wow bounceInUp"  data-wow-duration="2s" >
                    <a href="<?php echo base_url(); ?>assets/images/g12.jpg" class="gallery-box" data-lightbox="example-set" data-title="">
                        <img src="<?php echo base_url(); ?>assets/images/g12.jpg" alt="" class="img-responsive zoom-img">
                    </a>
                </div>
                <div class="col-md-3 gallery-grids wow bounceInUp"  data-wow-duration="2s" ">
                    <a href="<?php echo base_url(); ?>assets/images/g13.jpg" class="gallery-box" data-lightbox="example-set" data-title="">
                        <img src="<?php echo base_url(); ?>assets/images/g13.jpg" alt="" class="img-responsive zoom-img">
                    </a>
                </div>
                <div class="col-md-3 gallery-grids wow bounceInUp"  data-wow-duration="2s" >
                    <a href="<?php echo base_url(); ?>assets/images/g14.jpg" class="gallery-box" data-lightbox="example-set" data-title="">
                        <img src="<?php echo base_url(); ?>assets/images/g14.jpg" alt="" class="img-responsive zoom-img">
                    </a>
                </div>
            </div>
            <script src="<?php echo base_url(); ?>assets/js/lightbox-plus-jquery.min.js"></script>
        </div>
    </section>
    <!--//gallery-->

    <!-- team -->
    <section class="agileits-mitra py-md-5" id="mitra">
        <div class="container py-4 mt-2 wow bounceInUp"  data-wow-duration="2s" >
            <h3 class="tittle text-center mb-3 text-white">Mitra</h3>
            <p class="tit text-center mx-auto text-white"></p>


            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <div class="d-block w-100">

                        <div class="row inner-sec-w3layouts-agileinfo pt-4 mt-md-4">
                            <div class="col-md-3 col-sm-6 team-grids aos-init" data-aos="flip-left">
                                <img src="<?php echo base_url(); ?>assets/images/te1.jpg" class="img-responsive" alt="">
                                <div class="team-info">
                                    <div class="caption">
                                        <h4>John Doe</h4>
                                        <h6>Lorem
                                            </h6><h6>
                                    </h6></div>
                                    <div class="social-icons-section">
                                        <a class="fac" href="#">
                                            <i class="fab fa-facebook-f"></i>
                                        </a>
                                        <a class="twitter" href="#">
                                            <i class="fab fa-twitter"></i>
                                        </a>
                                        <a class="pinterest" href="#">
                                            <i class="fab fa-pinterest-p"></i>
                                        </a>

                                    </div>

                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6 team-grids aos-init" data-aos="flip-right">
                                <img src="<?php echo base_url(); ?>assets/images/te2.jpg" class="img-responsive" alt="">
                                <div class="team-info">
                                    <div class="caption">
                                        <h4>Alina Smith</h4>
                                        <h6>Lorem</h6>
                                    </div>
                                    <div class="social-icons-section">
                                        <a class="fac" href="#">
                                            <i class="fab fa-facebook-f"></i>
                                        </a>
                                        <a class="twitter" href="#">
                                            <i class="fab fa-twitter"></i>
                                        </a>
                                        <a class="pinterest" href="#">
                                            <i class="fab fa-pinterest-p"></i>
                                        </a>

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6 team-grids aos-init" data-aos="flip-left">
                                <img src="<?php echo base_url(); ?>assets/images/te3.jpg" class="img-responsive" alt="">
                                <div class="team-info">
                                    <div class="caption">
                                        <h4>Adam Lobster</h4>
                                        <h6>Lorem</h6>
                                    </div>
                                    <div class="social-icons-section">
                                        <a class="fac" href="#">
                                            <i class="fab fa-facebook-f"></i>
                                        </a>
                                        <a class="twitter" href="#">
                                            <i class="fab fa-twitter"></i>
                                        </a>
                                        <a class="pinterest" href="#">
                                            <i class="fab fa-pinterest-p"></i>
                                        </a>

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6 team-grids aos-init" data-aos="flip-right">
                                <img src="<?php echo base_url(); ?>assets/images/te4.jpg" class="img-responsive" alt="">
                                <div class="team-info">
                                    <div class="caption">
                                        <h4>Christina </h4>
                                        <h6>Lorem</h6>
                                    </div>
                                    <div class="social-icons-section">
                                        <a class="fac" href="#">
                                            <i class="fab fa-facebook-f"></i>
                                        </a>
                                        <a class="twitter" href="#">
                                            <i class="fab fa-twitter"></i>
                                        </a>
                                        <a class="pinterest" href="#">
                                            <i class="fab fa-pinterest-p"></i>
                                        </a>
                                    </div>

                                </div>
                            </div>
                        </div>

                  </div>
                </div>
                <div class="carousel-item">
                  <div class="d-block w-100">
                        <div class="row inner-sec-w3layouts-agileinfo pt-4 mt-md-4">


                            <div class="col-md-3 col-sm-6 team-grids aos-init" data-aos="flip-left">
                                <img src="<?php echo base_url(); ?>assets/images/te1.jpg" class="img-responsive" alt="">
                                <div class="team-info">
                                    <div class="caption">
                                        <h4>John Doe</h4>
                                        <h6>Lorem
                                            </h6><h6>
                                    </h6></div>
                                    <div class="social-icons-section">
                                        <a class="fac" href="#">
                                            <i class="fab fa-facebook-f"></i>
                                        </a>
                                        <a class="twitter" href="#">
                                            <i class="fab fa-twitter"></i>
                                        </a>
                                        <a class="pinterest" href="#">
                                            <i class="fab fa-pinterest-p"></i>
                                        </a>

                                    </div>

                                </div>
                            </div>
                            


                            <div class="col-md-3 col-sm-6 team-grids aos-init" data-aos="flip-right">
                                <img src="<?php echo base_url(); ?>assets/images/te2.jpg" class="img-responsive" alt="">
                                <div class="team-info">
                                    <div class="caption">
                                        <h4>Alina Smith</h4>
                                        <h6>Lorem</h6>
                                    </div>
                                    <div class="social-icons-section">
                                        <a class="fac" href="#">
                                            <i class="fab fa-facebook-f"></i>
                                        </a>
                                        <a class="twitter" href="#">
                                            <i class="fab fa-twitter"></i>
                                        </a>
                                        <a class="pinterest" href="#">
                                            <i class="fab fa-pinterest-p"></i>
                                        </a>

                                    </div>
                                </div>
                            </div>
                            


                            <div class="col-md-3 col-sm-6 team-grids aos-init" data-aos="flip-left">
                                <img src="<?php echo base_url(); ?>assets/images/te3.jpg" class="img-responsive" alt="">
                                <div class="team-info">
                                    <div class="caption">
                                        <h4>Adam Lobster</h4>
                                        <h6>Lorem</h6>
                                    </div>
                                    <div class="social-icons-section">
                                        <a class="fac" href="#">
                                            <i class="fab fa-facebook-f"></i>
                                        </a>
                                        <a class="twitter" href="#">
                                            <i class="fab fa-twitter"></i>
                                        </a>
                                        <a class="pinterest" href="#">
                                            <i class="fab fa-pinterest-p"></i>
                                        </a>

                                    </div>
                                </div>
                            </div>
                            


                            <div class="col-md-3 col-sm-6 team-grids aos-init" data-aos="flip-right">
                                <img src="<?php echo base_url(); ?>assets/images/te4.jpg" class="img-responsive" alt="">
                                <div class="team-info">
                                    <div class="caption">
                                        <h4>Christina </h4>
                                        <h6>Lorem</h6>
                                    </div>
                                    <div class="social-icons-section">
                                        <a class="fac" href="#">
                                            <i class="fab fa-facebook-f"></i>
                                        </a>
                                        <a class="twitter" href="#">
                                            <i class="fab fa-twitter"></i>
                                        </a>
                                        <a class="pinterest" href="#">
                                            <i class="fab fa-pinterest-p"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                  </div>
                </div>
                <div class="carousel-item">
                  <div class="d-block w-100">

                        <div class="row inner-sec-w3layouts-agileinfo pt-4 mt-md-4">
                            <div class="col-md-3 col-sm-6 team-grids aos-init" data-aos="flip-left">
                                <img src="<?php echo base_url(); ?>assets/images/te1.jpg" class="img-responsive" alt="">
                                <div class="team-info">
                                    <div class="caption">
                                        <h4>John Doe</h4>
                                        <h6>Lorem
                                            </h6><h6>
                                    </h6></div>
                                    <div class="social-icons-section">
                                        <a class="fac" href="#">
                                            <i class="fab fa-facebook-f"></i>
                                        </a>
                                        <a class="twitter" href="#">
                                            <i class="fab fa-twitter"></i>
                                        </a>
                                        <a class="pinterest" href="#">
                                            <i class="fab fa-pinterest-p"></i>
                                        </a>

                                    </div>

                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6 team-grids aos-init" data-aos="flip-right">
                                <img src="<?php echo base_url(); ?>assets/images/te2.jpg" class="img-responsive" alt="">
                                <div class="team-info">
                                    <div class="caption">
                                        <h4>Alina Smith</h4>
                                        <h6>Lorem</h6>
                                    </div>
                                    <div class="social-icons-section">
                                        <a class="fac" href="#">
                                            <i class="fab fa-facebook-f"></i>
                                        </a>
                                        <a class="twitter" href="#">
                                            <i class="fab fa-twitter"></i>
                                        </a>
                                        <a class="pinterest" href="#">
                                            <i class="fab fa-pinterest-p"></i>
                                        </a>

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6 team-grids aos-init" data-aos="flip-left">
                                <img src="<?php echo base_url(); ?>assets/images/te3.jpg" class="img-responsive" alt="">
                                <div class="team-info">
                                    <div class="caption">
                                        <h4>Adam Lobster</h4>
                                        <h6>Lorem</h6>
                                    </div>
                                    <div class="social-icons-section">
                                        <a class="fac" href="#">
                                            <i class="fab fa-facebook-f"></i>
                                        </a>
                                        <a class="twitter" href="#">
                                            <i class="fab fa-twitter"></i>
                                        </a>
                                        <a class="pinterest" href="#">
                                            <i class="fab fa-pinterest-p"></i>
                                        </a>

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6 team-grids aos-init" data-aos="flip-right">
                                <img src="<?php echo base_url(); ?>assets/images/te4.jpg" class="img-responsive" alt="">
                                <div class="team-info">
                                    <div class="caption">
                                        <h4>Christina </h4>
                                        <h6>Lorem</h6>
                                    </div>
                                    <div class="social-icons-section">
                                        <a class="fac" href="#">
                                            <i class="fab fa-facebook-f"></i>
                                        </a>
                                        <a class="twitter" href="#">
                                            <i class="fab fa-twitter"></i>
                                        </a>
                                        <a class="pinterest" href="#">
                                            <i class="fab fa-pinterest-p"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                  </div>
                </div>
              </div>

              <a class="carousel-control-prev d-none" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next d-none" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>
            
        </div>
    </section>
    <!-- //team -->


            <!-- features -->
    <section class="kontak py-md-5" style="background: #d3d3d3" id="testimoni">
        <div class="container py-4 mt-2">
                <h3 class="tittle text-center mb-3">Testimoni</h3>
                <p class="tit text-center mx-auto text-white"></p>
            
            <div class="row about-main pt-4 mt-md-4 text-white">
                <div class="col-lg-5 about-right">
                <h4 >Dengan Kepuasan Pesaing Mu, Kamu Masih Ragu ?</h4>
                <p class="Lor my-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor</p>
                <a href="<?=base_url()?>register" class="blog-btn">Join Us Now</a>
                <!-- stats -->
                    <div class="stats mt-3">
                        <div class="row stats_inner">
                            <div class="col-md-6 col-sm-6 col-xs-6 stat-grids mb-3">
                                <p class="counter-agileits-w3layouts">132</p>
                                <div class="stats-text-wthree">
                                    <h3 class="">Sekolah</h3>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-6 stat-grids mb-3">
                                <p class="counter-agileits-w3layouts">145</p>
                                <div class="stats-text-wthree">
                                    <h3 class="">Bimbel</h3>
                                </div>
                            </div>
                        </div>
                        <div class="row stats_inner">
                            <div class="col-md-6 col-sm-6 col-xs-6 stat-grids">
                                <p class="counter-agileits-w3layouts">120</p>
                                <div class="stats-text-wthree">
                                    <h3 class="">Pengajar</h3>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-6 stat-grids">
                                <p class="counter-agileits-w3layouts">2264</p>
                                <div class="stats-text-wthree">
                                    <h3 class="">Siswa</h3>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <!-- //stats -->
                </div>

                <div class="col-lg-7 about-left">
                        <!-- testimonials -->
                        <div class="w3_agile-section testimonials text-center wow bounceInDown" id="testimonials">
                            <div class=" w3ls-team-info test-bg">
                                <div class="testi-left">
                                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                            <ol class="carousel-indicators">
                                                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                                              </ol>
                                            <div class="carousel-inner">
                                                <div class="carousel-item active">
                                                    <div class="row thumbnail adjust1">
                                                        <div class="col-md-3 col-sm-3">
                                                            <img class="media-object img-fluid" src="<?php echo base_url(); ?>assets/images/ts1.jpg" alt="" />
                                                       </div>
                                                       <div class="col-md-9 col-sm-9">
                                                            <div class="caption testi-text">
                                                                <p>
                                                                    <span class="fa fa-quote-left" aria-hidden="true"></span>
                                                                    Donec euismod consequat mi, pretium consequat mi, pretium
                                                                    volutpat nibh tempor volutpat nibh tempor nec. 
                                                                </p>
                                                                <h4>
                                                                    <span></span>
                                                                    Justin
                                                                </h4>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row thumbnail adjust1 fone">
                                                        <div class="col-md-3 col-sm-3">
                                                            <img class="media-object img-fluid" src="<?php echo base_url(); ?>assets/images/ts2.jpg" alt="" />
                                                        </div>
                                                        <div class="col-md-9 col-sm-9">
                                                            <div class="caption testi-text">
                                                                <p>
                                                                    <span class="fa fa-quote-left" aria-hidden="true"></span>
                                                                    Donec euismod consequat mi, pretium consequat mi, pretium
                                                                    volutpat nibh tempor volutpat nibh tempor nec. 
                                                                </p>
                                                                <h4>
                                                                    <span></span>
                                                                    Justin
                                                                </h4>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="carousel-item">
                                                    <div class="row thumbnail adjust1">
                                                        <div class="col-md-3 col-sm-3">
                                                            <img class="media-object img-fluid" src="<?php echo base_url(); ?>assets/images/ts3.jpg" alt="" />
                                                       </div>
                                                       <div class="col-md-9 col-sm-9">
                                                            <div class="caption testi-text">
                                                            <p>
                                                                <span class="fa fa-quote-left" aria-hidden="true"></span>
                                                                Donec euismod consequat mi, pretium consequat mi, pretium
                                                                volutpat nibh tempor volutpat nibh tempor nec. 
                                                            </p>
                                                            <h4>
                                                                <span></span>
                                                                Justin
                                                            </h4>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row thumbnail adjust1 fone">
                                                    <div class="col-md-3 col-sm-3">
                                                        <img class="media-object img-fluid" src="<?php echo base_url(); ?>assets/images/ts4.jpg" alt="" />
                                                   </div>
                                                   <div class="col-md-9 col-sm-9">
                                                        <div class="caption testi-text">
                                                            <p>
                                                                <span class="fa fa-quote-left" aria-hidden="true"></span>
                                                                Donec euismod consequat mi, pretium     consequat mi, pretium
                                                                 volutpat nibh tempor volutpat nibh tempor nec. 
                                                            </p>
                                                            <h4>
                                                                <span></span>
                                                                Justin
                                                            </h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="carousel-item">
                                                <div class="row thumbnail adjust1">
                                                    <div class="col-md-3 col-sm-3">
                                                        <img class="media-object img-fluid" src="<?php echo base_url(); ?>assets/images/ts2.jpg" alt="" />
                                                    </div>
                                                    <div class="col-md-9 col-sm-9">
                                                        <div class="caption testi-text">
                                                            <p>
                                                                <span class="fa fa-quote-left" aria-hidden="true"></span>
                                                                Donec euismod consequat mi, pretium consequat mi, pretium
                                                                volutpat nibh tempor volutpat nibh tempor nec. 
                                                            </p>
                                                            <h4>
                                                                <span></span>
                                                                Justin
                                                            </h4>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row thumbnail adjust1 fone">
                                                    <div class="col-md-3 col-sm-3">
                                                      <img class="media-object img-fluid" src="<?php echo base_url(); ?>assets/images/ts3.jpg" alt="" />
                                                   </div>
                                                   <div class="col-md-9 col-sm-9">
                                                        <div class="caption testi-text">
                                                            <p>
                                                                <span class="fa fa-quote-left" aria-hidden="true"></span>Donec euismod consequat mi, pretium consequat mi, pretium
                                                                 volutpat nibh tempor volutpat nibh tempor nec. </p>
                                                              <h4><span></span>Justin</h4>
                                                          </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
    <!-- //testimonials-->
            </div>
        </div>
    </div>
</section>





    <!--/contact-->
    <section class="contact  py-md-5" style="background: #b1b1b1" id="kontak">
        <div class="container py-4 mt-2">
        <h2 class="tittle text-center mb-3">Kontak Kami</h2>
            <p class="tit text-center mx-auto"></p>
            <div class="row inner-sec-w3layouts-agileinfo pt-4 mt-md-4">
                <div class="contact-map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d273690.1704056744!2d-74.59673804968976!3d40.72070782081099!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew+York%2C+NY%2C+USA!5e0!3m2!1sen!2sin!4v1521532554788" class="map" style="border:0" allowfullscreen=""></iframe>
                </div>
                
                <div class="contact_grid_right mt-5">
                    <h6>Please fill this form to contact with us.</h6>
                    <form action="#" method="post">
                        <div class="contact_left_grid">
                            <input type="text" name="Name" placeholder="Name" required="">
                            <input type="email" name="Email" placeholder="Email" required="">
                            <input type="text" name="Subject" placeholder="Subject" required="">
                            <textarea name="Message" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Message...';}" required="">Message...</textarea>
                            <input type="submit" value="Submit">
                            <input type="reset" value="Clear">
                            <div class="clearfix"> </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!--//contact-->
<!--footer-->
    <footer>
        <div class="container py-md-5">
            <div class="row footer-top-w3layouts-agile py-5">
                <div class="col-lg-3 footer-grid">
                    <div class="footer-title">
                        <h3>Tentang Kami</h3>
                    </div>
                    <div class="footer-text">
                        <p>Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. lacinia eget consectetur sed, convallis at tellus..</p>

                    </div>
                </div>
                <div class="col-lg-3 footer-grid">
                    <div class="footer-title">
                        <h3>Kontak kami</h3>
                    </div>
                    <div class="footer-office-hour">
                        <ul>
                            <li class="hd">Address :</li>
                            <li>No.27 - 5549436 street lorem, Newyork City, USA</li>

                        </ul>
                        <ul>
                            <li class="hd">Phone:+ 1 (234) 567 8901</li>
                            <li class="hd">Email:
                                <a href="mailto:info@example.com">info@example.com</a>
                            </li>
                            <li class="hd">Fax: 1(234) 567 8901</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 footer-grid">
                    <div class="footer-title">
                        <h3>Materi Terbaru</h3>
                    </div>
                    <div class="footer-list">
                        <div class="flickr-grid">
                            <a href="#" data-toggle="modal" data-target="#myModal">
                                <img src="<?php echo base_url(); ?>assets/images/g3.jpg" class="img-fluid" alt=" ">
                            </a>
                        </div>
                        <div class="flickr-grid">
                            <a href="#" data-toggle="modal" data-target="#myModal">
                                <img src="<?php echo base_url(); ?>assets/images/g4.jpg" class="img-fluid" alt=" ">
                            </a>
                        </div>
                        <div class="flickr-grid">
                            <a href="#" data-toggle="modal" data-target="#myModal">
                                <img src="<?php echo base_url(); ?>assets/images/g5.jpg" class="img-fluid" alt=" ">
                            </a>
                        </div>
                        <div class="flickr-grid">
                            <a href="#" data-toggle="modal" data-target="#myModal">
                                <img src="<?php echo base_url(); ?>assets/images/g4.jpg" class="img-fluid" alt=" ">
                            </a>
                        </div>
                        <div class="flickr-grid">
                            <a href="#" data-toggle="modal" data-target="#myModal">
                                <img src="<?php echo base_url(); ?>assets/images/g6.jpg" class="img-fluid" alt=" ">
                            </a>
                        </div>
                        <div class="flickr-grid">
                            <a href="#" data-toggle="modal" data-target="#myModal">
                                <img src="<?php echo base_url(); ?>assets/images/g5.jpg" class="img-fluid" alt=" ">
                            </a>
                        </div>
                        <div class="flickr-grid">
                            <a href="#" data-toggle="modal" data-target="#myModal">
                                <img src="<?php echo base_url(); ?>assets/images/g7.jpg" class="img-fluid" alt=" ">
                            </a>
                        </div>
                        <div class="flickr-grid">
                            <a href="#" data-toggle="modal" data-target="#myModal">
                                <img src="<?php echo base_url(); ?>assets/images/g9.jpg" class="img-fluid" alt=" ">
                            </a>
                        </div>
                        <div class="flickr-grid">
                            <a href="#" data-toggle="modal" data-target="#myModal">
                                <img src="<?php echo base_url(); ?>assets/images/g8.jpg" class="img-fluid" alt=" ">
                            </a>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <div class="col-lg-3 footer-grid">
                    <div class="footer-title">
                        <h3>Subscribe</h3>
                    </div>
                    <p>Vivamus magna justo, lacinia eget consectetur sed.</p>
                    <form action="#" method="post" class="newsletter">
                        <input class="email" type="email" placeholder="Your email..." required="">
                        <button class="btn1">
                            <i class="far fa-envelope"></i>
                        </button>
                    </form>
                    <div class="clearfix"></div>
                </div>

            </div>

        </div>
    </footer>
    <!---->
    <div class="copyright py-3">
        <div class="container">
            <div class="copyrighttop">
                <ul>
                    <li>
                        <h4>Follow us on:</h4>
                    </li>
                    <li>
                        <a class="facebook" href="#">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                    </li>
                    <li>
                        <a class="facebook" href="#">
                            <i class="fab fa-twitter"></i>
                        </a>
                    </li>
                    <li>
                        <a class="facebook" href="#">
                            <i class="fab fa-google-plus-g"></i>
                        </a>
                    </li>
                    <li>
                        <a class="facebook" href="#">
                            <i class="fab fa-pinterest-p"></i>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="copyrightbottom">
                <p>© 2018 EradiSchool. All Rights Reserved | Design by
                    <a href="http://w3layouts.com/">W3layouts</a>
                </p>

            </div>
            <div class="clearfix"></div>
        </div>
    </div>


<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Peregrinate</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
                    <div class="agileits-w3layouts-info">
                        <img src="<?php echo base_url(); ?>assets/images/g12.jpg" class="img-responsive" alt="" />
                        <p>Duis venenatis, turpis eu bibendum porttitor, sapien quam ultricies tellus, ac rhoncus risus odio eget nunc. Pellentesque ac fermentum diam. Integer eu facilisis nunc, a iaculis felis. Pellentesque pellentesque tempor enim, in dapibus turpis porttitor quis. </p>
                    </div>
                </div>
            <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
<!-- //Modal -->
    <script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>

    <script src='<?php echo base_url(); ?>assets/js/jquery.typer.js'></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/move-top.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/easing.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery.waypoints.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery.countup.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/main.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/move-top.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/easing.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
   </body>
</html>

    <script type="text/javascript">
        new WOW().init();

        $('a[href*="#"]').on('click', function (e) {
            e.preventDefault();

            $('html, body').animate({
                scrollTop: $($(this).attr('href')).offset().top
            }, 1000, 'linear');
        });

        $(document).ready(function() {
            $().UItoTop({ easingType: 'easeOutQuart' });                        
        });

        $('.counter-agileits-w3layouts').countUp();

    var win = $(window),
        foo = $('#typer');

    foo.typer(['Rasakan Mudahnya Belajar', 'Berkualitas dan Profesional', 'Mudahnya Menjadi Pintar']);

    // unneeded...
    win.resize(function(){
        var fontSize = Math.max(Math.min(win.width() / (1 * 10), parseFloat(Number.POSITIVE_INFINITY)), parseFloat(Number.NEGATIVE_INFINITY));

        foo.css({
            fontSize: fontSize * .8 + 'px'
        });
    }).resize();

    jQuery(document).ready(function($) {
        $(".scroll").click(function(event){     
            event.preventDefault();
            $('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
        });
    });

    $(document).ready(function() {
        $().UItoTop({ easingType: 'easeOutQuart' });
                            
        });

    jQuery(document).ready(function($) {
        $(".scroll").click(function(event){     
            event.preventDefault();
            $('html,body').animate({scrollTop:$(this.hash).offset().top},2000);
        });
    });
</script>
<style type="text/css">
.carousel-inner > .item {
    position: relative;
    display: none;
    -webkit-transition: 0.6s ease-in-out left;
    -moz-transition: 0.6s ease-in-out left;
    -o-transition: 0.6s ease-in-out left;
    transition: 0.6s ease-in-out left;
}

</style>