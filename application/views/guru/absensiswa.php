
<?php
  $this->load->view('themplatedasboard/header');
?>

<style>

  body {
    margin: 40px 10px;
    padding: 0;
    font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
    font-size: 14px;
  }

  #calendar {
    max-width: 900px;
    margin: 0 auto;
  }
  h2{
    color: black !important;
  }
</style>



<body class="theme-red">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Search Bar -->
    <div class="search-bar">
        <div class="search-icon">
            <i class="material-icons">search</i>
        </div>
        <input type="text" placeholder="START TYPING...">
        <div class="close-search">
            <i class="material-icons">close</i>
        </div>
    </div>
    <!-- #END# Search Bar -->
    <!-- Top Bar -->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="Dasboar.html">DIGAS | Panel Guru</a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <!-- Call Search -->
                    <!-- <li><a href="javascript:void(0);" class="js-search" data-close="true"><i class="material-icons">search</i></a></li>
                     --><!-- #END# Call Search -->
                    <!-- Notifications -->
                    <li class="dropdown">

<!--                         <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
                            <i class="material-icons">notifications</i>
                            <span class="label-count">7</span>
                        </a>

                        <ul class="dropdown-menu">
                            <li class="header">NOTIFICATIONS</li>
                            <li class="body">
                                <ul class="menu">
                                    <li>
                                        <a href="javascript:void(0);">
                                            <div class="icon-circle bg-light-green">
                                                <i class="material-icons">date_range</i>
                                            </div>
                                            <div class="menu-info">
                                                <h4>12 new members joined</h4>
                                                <p>
                                                    <i class="material-icons">access_time</i> 14 mins ago
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <div class="icon-circle bg-cyan">
                                                <i class="material-icons">add_shopping_cart</i>
                                            </div>
                                            <div class="menu-info">
                                                <h4>4 sales made</h4>
                                                <p>
                                                    <i class="material-icons">access_time</i> 22 mins ago
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <div class="icon-circle bg-red">
                                                <i class="material-icons">delete_forever</i>
                                            </div>
                                            <div class="menu-info">
                                                <h4><b>Nancy Doe</b> deleted account</h4>
                                                <p>
                                                    <i class="material-icons">access_time</i> 3 hours ago
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <div class="icon-circle bg-orange">
                                                <i class="material-icons">mode_edit</i>
                                            </div>
                                            <div class="menu-info">
                                                <h4><b>Nancy</b> changed name</h4>
                                                <p>
                                                    <i class="material-icons">access_time</i> 2 hours ago
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <div class="icon-circle bg-blue-grey">
                                                <i class="material-icons">comment</i>
                                            </div>
                                            <div class="menu-info">
                                                <h4><b>John</b> commented your post</h4>
                                                <p>
                                                    <i class="material-icons">access_time</i> 4 hours ago
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <div class="icon-circle bg-light-green">
                                                <i class="material-icons">cached</i>
                                            </div>
                                            <div class="menu-info">
                                                <h4><b>John</b> updated status</h4>
                                                <p>
                                                    <i class="material-icons">access_time</i> 3 hours ago
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <div class="icon-circle bg-purple">
                                                <i class="material-icons">settings</i>
                                            </div>
                                            <div class="menu-info">
                                                <h4>Settings updated</h4>
                                                <p>
                                                    <i class="material-icons">access_time</i> Yesterday
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="footer">
                                <a href="#">View All Notifications</a>
                            </li>
                        </ul>
                    </li>
 -->                    <!-- #END# Notifications -->
                    <!-- Tasks -->
                    <!-- 
                        <li class="dropdown">
                            <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
                                <i class="material-icons">flag</i>
                                <span class="label-count">9</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="header">TASKS</li>
                                <li class="body">
                                    <ul class="menu tasks">
                                        <li>
                                            <a href="javascript:void(0);">
                                                <h4>
                                                    Footer display issue
                                                    <small>32%</small>
                                                </h4>
                                                <div class="progress">
                                                    <div class="progress-bar bg-pink" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 32%">
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);">
                                                <h4>
                                                    Make new buttons
                                                    <small>45%</small>
                                                </h4>
                                                <div class="progress">
                                                    <div class="progress-bar bg-cyan" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 45%">
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);">
                                                <h4>
                                                    Create new dashboard
                                                    <small>54%</small>
                                                </h4>
                                                <div class="progress">
                                                    <div class="progress-bar bg-teal" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 54%">
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);">
                                                <h4>
                                                    Solve transition issue
                                                    <small>65%</small>
                                                </h4>
                                                <div class="progress">
                                                    <div class="progress-bar bg-orange" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 65%">
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);">
                                                <h4>
                                                    Answer GitHub questions
                                                    <small>92%</small>
                                                </h4>
                                                <div class="progress">
                                                    <div class="progress-bar bg-purple" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 92%">
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="footer">
                                    <a href="javascript:void(0);">View All Tasks</a>
                                </li>
                            </ul>
                        </li>
                     -->
                     <!-- #END# Tasks -->







                    <li class="pull-right"><a href="javascript:void(0);" class="js-right-sidebar" data-close="true"><i class="material-icons">more_vert</i></a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <div class="image">
                    <img src="<?= base_url()?>assetsdasboard/images/user.png" width="48" height="48" alt="User" />
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">John Doe</div>
                    <div class="email">john.doe@example.com</div>
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
                            <li data-toggle="modal" data-target="#profil"><a href="javascript:void(0);"><i class="material-icons" >person</i>Profile</a></li>
                            <li data-toggle="modal" data-target="#ubah"><a href="javascript:void(0);"><i class="material-icons">person</i>Uubah Profile</a></li>
                            <li><a href="javascript:void(0);"><i class="material-icons">input</i>Sign Out</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">



                <ul class="list">
                    <li class="header">MAIN NAVIGATION</li>
                    <li>
                        <a href="<?= base_url() ?>profil-guru">
                            <i class="material-icons">home</i>
                            <span>Daftar Siswa</span>
                        </a>
                    </li>

                    <li   class="active"  style="display: none">
                        <a href="admindanuser.html">
                            <i class="material-icons">account_box</i>
                            <span>Absensi Hari Ini</span>
                        </a>
                    </li>

<!-- 
                    <li>
                        <a href="recrutan.html">
                            <i class="material-icons">assignment_ind</i>
                            <span>Recrutan</span>
                        </a>
                    </li>
                    <li>
                        <a  href="lowongan.html">
                            <i class="material-icons">flip_to_back</i>
                            <span>Lowongan</span>
                        </a>
                    </li>



                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">library_books</i>
                            <span>Arsip</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="<?= base_url()?>assetsdasboard/pages/forms/basic-form-elements.html">HRD dan User</a>
                            </li>
                            <li>
                                <a href="<?= base_url()?>assetsdasboard/pages/forms/advanced-form-elements.html">Recrutan</a>
                            </li>
                            <li>
                                <a href="<?= base_url()?>assetsdasboard/pages/forms/form-examples.html">Lowongan</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a  href="login.html">
                            <i class="material-icons">keyboard_backspace</i>
                            <span>Logout</span>
                        </a>
                    </li> -->
                </ul>
            </div>
            <!-- #Menu -->
        </aside>
        <!-- #END# Left Sidebar -->
        <!-- Right Sidebar -->
        <aside id="rightsidebar" class="right-sidebar">
            <ul class="nav nav-tabs tab-nav-right" role="tablist">
                <li role="presentation" class="active" style="width: inherit;"><a href="#skins" data-toggle="tab">Tema</a></li>
                <!-- <li role="presentation"><a href="#settings" data-toggle="tab">SETTINGS</a></li> -->
            </ul>
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade in active in active" id="skins">
                    <ul class="demo-choose-skin">
                        <li data-theme="red" class="active">
                            <div class="red"></div>
                            <span>Red</span>
                        </li>
                        <li data-theme="pink">
                            <div class="pink"></div>
                            <span>Pink</span>
                        </li>
                        <li data-theme="purple">
                            <div class="purple"></div>
                            <span>Purple</span>
                        </li>
                        <li data-theme="deep-purple">
                            <div class="deep-purple"></div>
                            <span>Deep Purple</span>
                        </li>
                        <li data-theme="indigo">
                            <div class="indigo"></div>
                            <span>Indigo</span>
                        </li>
                        <li data-theme="blue">
                            <div class="blue"></div>
                            <span>Blue</span>
                        </li>
                        <li data-theme="light-blue">
                            <div class="light-blue"></div>
                            <span>Light Blue</span>
                        </li>
                        <li data-theme="cyan">
                            <div class="cyan"></div>
                            <span>Cyan</span>
                        </li>
                        <li data-theme="teal">
                            <div class="teal"></div>
                            <span>Teal</span>
                        </li>
                        <li data-theme="green">
                            <div class="green"></div>
                            <span>Green</span>
                        </li>
                        <li data-theme="light-green">
                            <div class="light-green"></div>
                            <span>Light Green</span>
                        </li>
                        <li data-theme="lime">
                            <div class="lime"></div>
                            <span>Lime</span>
                        </li>
                        <li data-theme="yellow">
                            <div class="yellow"></div>
                            <span>Yellow</span>
                        </li>
                        <li data-theme="amber">
                            <div class="amber"></div>
                            <span>Amber</span>
                        </li>
                        <li data-theme="orange">
                            <div class="orange"></div>
                            <span>Orange</span>
                        </li>
                        <li data-theme="deep-orange">
                            <div class="deep-orange"></div>
                            <span>Deep Orange</span>
                        </li>
                        <li data-theme="brown">
                            <div class="brown"></div>
                            <span>Brown</span>
                        </li>
                        <li data-theme="grey">
                            <div class="grey"></div>
                            <span>Grey</span>
                        </li>
                        <li data-theme="blue-grey">
                            <div class="blue-grey"></div>
                            <span>Blue Grey</span>
                        </li>
                        <li data-theme="black">
                            <div class="black"></div>
                            <span>Black</span>
                        </li>
                    </ul>
                </div>
                <div role="tabpanel" class="tab-pane fade" id="settings">
                    <div class="demo-settings">
                        <p>GENERAL SETTINGS</p>
                        <ul class="setting-list">
                            <li>
                                <span>Report Panel Usage</span>
                                <div class="switch">
                                    <label><input type="checkbox" checked><span class="lever"></span></label>
                                </div>
                            </li>
                            <li>
                                <span>Email Redirect</span>
                                <div class="switch">
                                    <label><input type="checkbox"><span class="lever"></span></label>
                                </div>
                            </li>
                        </ul>
                        <p>SYSTEM SETTINGS</p>
                        <ul class="setting-list">
                            <li>
                                <span>Notifications</span>
                                <div class="switch">
                                    <label><input type="checkbox" checked><span class="lever"></span></label>
                                </div>
                            </li>
                            <li>
                                <span>Auto Updates</span>
                                <div class="switch">
                                    <label><input type="checkbox" checked><span class="lever"></span></label>
                                </div>
                            </li>
                        </ul>
                        <p>ACCOUNT SETTINGS</p>
                        <ul class="setting-list">
                            <li>
                                <span>Offline</span>
                                <div class="switch">
                                    <label><input type="checkbox"><span class="lever"></span></label>
                                </div>
                            </li>
                            <li>
                                <span>Location Permission</span>
                                <div class="switch">
                                    <label><input type="checkbox" checked><span class="lever"></span></label>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </aside>
        <!-- #END# Right Sidebar -->
    </section>



    <section class="content">
        <div class="container-fluid">


            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="body row pb-0">
                            <div class="col-lg-4 col-md-4  col-sm-12 col-xs-12 text-center  mb-0">
                                <img src="<?= base_url() ?>assetsdasboard/images/photosiswa/namasiswa.jpg" style="width: 200px;">
                            </div>
                            <div class="col-lg-4 col-md-4  col-sm-12 col-xs-12 mb-0">
                                <table>
                                    <tr>
                                        <td style="padding-top: 15px;padding-bottom: 15px;">
                                            Nama    
                                        </td>

                                        <td style="padding-left: 5px; padding-right: 5px">
                                            :    
                                        </td>

                                        <td>
                                            Ahmad Sahro    
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="padding-top: 15px;padding-bottom: 15px;">
                                            NISN    
                                        </td>

                                        <td style="padding-left: 5px; padding-right: 5px">
                                            :    
                                        </td>

                                        <td>
                                            0324212    
                                        </td>
                                        <td>
                                    </tr>
                                        <td style="padding-top: 15px;padding-bottom: 15px;">
                                            Kelas    
                                        </td>

                                        <td style="padding-left: 5px; padding-right: 5px">
                                            :    
                                        </td>

                                        <td>
                                            12 IPA
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="padding-top: 15px;padding-bottom: 15px;">
                                            Sekolah    
                                        </td>

                                        <td style="padding-left: 5px; padding-right: 5px">
                                            :    
                                        </td>

                                        <td>
                                           SMAN 1 Ciruas
                                        </td>
                                    </tr>
                                </table>
                            </div>

                            <div class="col-lg-4 col-md-4  col-sm-12 col-xs-12">
                                <table>
                                    
                                    <tr>
                                        <td style="padding-top: 15px;padding-bottom: 15px;">
                                            Kehadiran    
                                        </td>

                                        <td style="padding-left: 5px; padding-right: 5px">
                                            :    
                                        </td>

                                        <td>
                                            9 Sakit    
                                        </td>
                                        <td>
                                    </tr>
                                        <td style="padding-top: 15px;padding-bottom: 15px;">
                                             <a style="color: white">a</a>
                                        </td>

                                        <td style="padding-left: 5px; padding-right: 5px">
                                              
                                        </td>

                                        <td>
                                            12 ALPA
                                        </td>
                                    </tr>
                                    </tr>
                                        <td style="padding-top: 15px;padding-bottom: 15px;">
                                            <a style="color: white">a</a>
                                        </td>

                                        <td style="padding-left: 5px; padding-right: 5px">
                                              
                                        </td>

                                        <td>
                                            40 Masuk
                                        </td>
                                    </tr>
                                    </tr>
                                        <td style="padding-top: 15px;padding-bottom: 15px;">
                                            
                                        </td>

                                        <td style="padding-left: 5px; padding-right: 5px">
                                              
                                        </td>

                                        <td>
                                            10 IZIN
                                        </td>
                                    </tr>
                                </table>
                            </div>


                        </div>
                    </div>
                </div>

                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="body row">




  <div id='calendar'></div>






                        </div>
                    </div>
                </div>



            </div>
            <!-- #END# Tabs With Icon Title -->





            
            <div class="modal fade" id="profil" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-sm mt-12" role="document">
                    <div class="modal-content">
                        <div class="body">
                            <div class="thumbnail mt-1">
                                <img src="<?= base_url() ?>assetsdasboard/images/photosiswa/namasiswa.jpg" class="mt-2">
                                <div class="caption tengah">
                                    <div class="caption">
                                        <table>
                                          <tr>
                                            <td style="padding-top: 20px;padding-bottom: 20px;">Nama</td>
                                            <td style="padding-left: 10px; padding-right: 10px">:</td>
                                            <td>Suyatman</td>
                                          </tr>
                                          <tr>
                                            <td style="padding-top: 20px;padding-bottom: 20px;">Email</td>
                                            <td style="padding-left: 10px; padding-right: 10px">:</td>
                                            <td>suyatman@mail.com</td>
                                          </tr>
                                          <tr>
                                            <td style="padding-top: 20px;padding-bottom: 20px;">Jabatan</td>
                                            <td style="padding-left: 10px; padding-right: 10px">:</td>
                                            <td>Dekan</td>
                                          </tr>
                                          <tr>
                                            <td style="padding-top: 20px;padding-bottom: 20px;">Handphone</td>
                                            <td style="padding-left: 10px; padding-right: 10px">:</td>
                                            <td>0879766745822</td>
                                          </tr>
                                          <tr>
                                            <td style="padding-top: 20px;padding-bottom: 20px;">Notifikasi</td>
                                            <td style="padding-left: 10px; padding-right: 10px">:</td>
                                            <td>Ya</td>
                                          </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                    </div>
                </div>
            </div>

            <div class="modal fade" id="ubah" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-sm" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            

                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                <div class="fileupload-preview thumbnail col-sm-12" style="min-height: 200px"></div>
                                <div class="row">
                                    <span class="btn btn-file btn-success col-sm-6">
                                        <span class="fileupload-new">Select image</span><span class="fileupload-exists">Change</span><input type="file" /></span>
                                    <a href="#" class="btn btn-danger fileupload-exists col-sm-6" data-dismiss="fileupload">Remove</a>
                                </div>
                            </div>

                        </div>
                        <div class="modal-body">
                                    <div class="row clearfix">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input class="form-control" placeholder="Username" type="text">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input class="form-control" placeholder="Email" type="text">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input class="form-control" placeholder="Guru Bidang" type="text">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input class="form-control" placeholder="Sekolah" type="text">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input class="form-control" placeholder="Password" type="password">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input class="form-control" placeholder="Repassword" type="password">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <button type="button" class="btn btn-danger waves-effect col-sm-6" data-dismiss="modal">Batal</button>
                                                <button type="button" class="btn btn-primary waves-effect col-sm-6">Simpan</button>
                                            </div>
                                        </div>
                                    </div>
                        </div>
                    </div>
                </div>
            </div>

            </div>
        </div>
    </section>



<?php
  $this->load->view('themplatedasboard/footer');
?>

<script>

  $(document).ready(function() {

    $('#calendar').fullCalendar({
      header: {
        left: 'prev,next',
        center: 'title',
        right: 'month,listMonth'
      },
      defaultDate: '2018-03-12',
      navLinks: true, // can click day/week names to navigate views
      businessHours: true, // display business hours
      editable: true,
      events: [
        {
          id: 'availableForMeeting',
          title: 'Masuk',
          start: '2018-03-03',
          end: '2018-03-10',
          constraint: 'businessHours',
          color: '#257e4a',
          // rendering: 'background',
          // overlap: false
        }      ]
    });

  });

</script>
