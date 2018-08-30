
<?php
  $this->load->view('themplatedasboard/header');
?>

<?php
  $this->load->view('themplatedasboard/navbarguru');
?>


    <section class="content">
        <div class="container-fluid">


            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="body">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="active">
                                    <a href="#home_with_icon_title" data-toggle="tab">
                                        <i class="material-icons">home</i>Daftar Siswa
                                    </a>
                                </li>
                                <li role="presentation">
                                    <a href="#profile_with_icon_title" data-toggle="tab">
                                        <i class="material-icons">face</i>Absen Hari Ini (DD MM YYYY)
                                    </a>
                                </li>

                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane fade in active" id="home_with_icon_title">
                                    <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>NISN</th>
                                                <th>Kelas</th>
                                                <th>Sekolah</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Kelas</th>
                                                <th>Sekolah</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </tfoot>


                                        <tbody>
                                            <tr>
                                                <td>Michael Bruce</td>
                                                <td>2103292018</td>
                                                <td>12 Ipa</td>
                                                <td>SMAN 1 Ciruas</td>
                                                <td>
                                                    <a href="<?= base_url()?>absen-siswa/NISN" class="btn btn-warning waves-effect">
                                                        Lihat Kehadiran
                                                    </a>
                                                </td>
                                            </tr>
                                             <tr>
                                                <td>Michael Bruce</td>
                                                <td>2103292018</td>
                                                <td>12 Ipa</td>
                                                <td>SMAN 1 Ciruas</td>
                                                <td>
                                                    <a href="<?= base_url()?>absen-siswa/NISN" class="btn btn-warning waves-effect">
                                                        Lihat Kehadiran
                                                    </a>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>Michael Bruce</td>
                                                <td>2103292018</td>
                                                <td>12 Ipa</td>
                                                <td>SMAN 1 Ciruas</td>
                                                <td>
                                                    <a href="<?= base_url()?>absen-siswa/NISN" class="btn btn-warning waves-effect">
                                                        Lihat Kehadiran
                                                    </a>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>Michael Bruce</td>
                                                <td>2103292018</td>
                                                <td>12 Ipa</td>
                                                <td>SMAN 1 Ciruas</td>
                                                <td>
                                                    <a href="<?= base_url()?>absen-siswa/NISN" class="btn btn-warning waves-effect">
                                                        Lihat Kehadiran
                                                    </a>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>Michael Bruce</td>
                                                <td>2103292018</td>
                                                <td>12 Ipa</td>
                                                <td>SMAN 1 Ciruas</td>
                                                <td>
                                                    <a href="<?= base_url()?>absen-siswa/NISN" class="btn btn-warning waves-effect">
                                                        Lihat Kehadiran
                                                    </a>
                                                </td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="profile_with_icon_title">
                                    

                                    <div class="body">
                                        <div class="row">
                                    

                                            <div class="col-sm-6 col-md-3">
                                                <div class="thumbnail">
                                                    <img src="<?= base_url() ?>assetsdasboard/images/photosiswa/namasiswa.jpg" style="width: 200px">
                                                    <div class="caption">
                                                        <div class="caption" style="text-align: center;">
                                                        <h3>Ahmad Sudibyo <br>
                                                            <a href="<?= base_url()?>absen-siswa/NISN" class="btn btn-success waves-effect">
                                                                Hadir
                                                            </a>
                                                            <a href="<?= base_url()?>absen-siswa/NISN" class="btn btn-warning waves-effect">
                                                                Izin
                                                            </a>
                                                            <a href="<?= base_url()?>absen-siswa/NISN" class="btn brown waves-effect">
                                                                Sakit
                                                            </a>
                                                            <a href="<?= base_url()?>absen-siswa/NISN" class="btn btn-danger waves-effect">
                                                                Alfa
                                                            </a>
                                                        </h3>
                                                    </div>
                                                    </div>
                                                </div>
                                            </div>
                                            



                                            <div class="col-sm-6 col-md-3">
                                                <div class="thumbnail">
                                                    <img src="<?= base_url() ?>assetsdasboard/images/photosiswa/namasiswa.jpg" style="width: 200px">
                                                    <div class="caption">
                                                        <div class="caption" style="text-align: center;">
                                                        <h3>Ahmad Sudibyo <br>
                                                            <a href="<?= base_url()?>absen-siswa/NISN" class="btn btn-success waves-effect">
                                                                Hadir
                                                            </a>
                                                            <a href="<?= base_url()?>absen-siswa/NISN" class="btn btn-warning waves-effect">
                                                                Izin
                                                            </a>
                                                            <a href="<?= base_url()?>absen-siswa/NISN" class="btn brown waves-effect">
                                                                Sakit
                                                            </a>
                                                            <a href="<?= base_url()?>absen-siswa/NISN" class="btn btn-danger waves-effect">
                                                                Alfa
                                                            </a>
                                                        </h3>
                                                    </div>
                                                    </div>
                                                </div>
                                            </div>



                                            <div class="col-sm-6 col-md-3">
                                                <div class="thumbnail">
                                                    <img src="<?= base_url() ?>assetsdasboard/images/photosiswa/namasiswa.jpg" style="width: 200px">
                                                    <div class="caption">
                                                        <div class="caption" style="text-align: center;">
                                                        <h3>Ahmad Sudibyo <br>
                                                            <a href="<?= base_url()?>absen-siswa/NISN" class="btn btn-success waves-effect">
                                                                Hadir
                                                            </a>
                                                            <a href="<?= base_url()?>absen-siswa/NISN" class="btn btn-warning waves-effect">
                                                                Izin
                                                            </a>
                                                            <a href="<?= base_url()?>absen-siswa/NISN" class="btn brown waves-effect">
                                                                Sakit
                                                            </a>
                                                            <a href="<?= base_url()?>absen-siswa/NISN" class="btn btn-danger waves-effect">
                                                                Alfa
                                                            </a>
                                                        </h3>
                                                    </div>
                                                    </div>
                                                </div>
                                            </div>



                                            <div class="col-sm-6 col-md-3">
                                                <div class="thumbnail">
                                                    <img src="<?= base_url() ?>assetsdasboard/images/photosiswa/namasiswa.jpg" style="width: 200px">
                                                    <div class="caption">
                                                        <div class="caption" style="text-align: center;">
                                                        <h3>Ahmad Sudibyo <br>
                                                            <a href="<?= base_url()?>absen-siswa/NISN" class="btn btn-success waves-effect">
                                                                Hadir
                                                            </a>
                                                            <a href="<?= base_url()?>absen-siswa/NISN" class="btn btn-warning waves-effect">
                                                                Izin
                                                            </a>
                                                            <a href="<?= base_url()?>absen-siswa/NISN" class="btn brown waves-effect">
                                                                Sakit
                                                            </a>
                                                            <a href="<?= base_url()?>absen-siswa/NISN" class="btn btn-danger waves-effect">
                                                                Alfa
                                                            </a>
                                                        </h3>
                                                    </div>
                                                    </div>
                                                </div>
                                            </div>



                                </div>
            



                            </div>
                        </div>
                        <div class="btn btn-primary" data-toggle="modal" data-target="#tambahsiswa">Tambah Siswa</div>
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
                                            <td style="padding-left: 5px; padding-right: 5px">:</td>
                                            <td>Suyatman</td>
                                          </tr>
                                          <tr>
                                            <td style="padding-top: 20px;padding-bottom: 20px;">Email</td>
                                            <td style="padding-left: 5px; padding-right: 5px">:</td>
                                            <td>suyatman@mail.com</td>
                                          </tr>
                                          <tr>
                                            <td style="padding-top: 20px;padding-bottom: 20px;">Jabatan</td>
                                            <td style="padding-left: 5px; padding-right: 5px">:</td>
                                            <td>Dekan</td>
                                          </tr>
                                          <tr>
                                            <td style="padding-top: 20px;padding-bottom: 20px;">Handphone</td>
                                            <td style="padding-left: 5px; padding-right: 5px">:</td>
                                            <td>0879766745822</td>
                                          </tr>
                                          <tr>
                                            <td style="padding-top: 20px;padding-bottom: 20px;">Notifikasi</td>
                                            <td style="padding-left: 5px; padding-right: 5px">:</td>
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



            <div class="modal fade" id="tambahsiswa" tabindex="-1" role="dialog">
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