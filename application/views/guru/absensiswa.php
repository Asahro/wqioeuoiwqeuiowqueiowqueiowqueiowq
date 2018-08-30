
<?php
  $this->load->view('themplatedasboard/header');
?>

<?php
  $this->load->view('themplatedasboard/navbarguru');
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
