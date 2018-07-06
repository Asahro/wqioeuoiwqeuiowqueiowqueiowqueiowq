<!DOCTYPE html>
<html lang="zxx">
   <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="utf-8">
        <title>EradiSchool</title>
        <meta name="keywords" content="" />

        <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all">
        <link href="<?php echo base_url(); ?>assets/css/fontawesome-all.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/css/style.css" rel='stylesheet' type='text/css' media="all">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/lightbox.css">
        <link href="<?php echo base_url(); ?>assets/css/style.css" rel='stylesheet' type='text/css' media="all">
        <link href="//fonts.googleapis.com/css?family=Roboto:300,400,500,700,900" rel="stylesheet">
        <link href="//fonts.googleapis.com/css?family=Lato:100,300,400,700,900" rel="stylesheet">
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
                      <div class="welcome d-flex justify-content-center flex-column">
                            <div style="height: -webkit-fill-available; margin-top: 150px;">
                              <!-- Welcome Section -->
                              <div class="welcome-login d-flex justify-content-center flex-column">
                                <div class="inner-wrapper mt-auto mb-auto">
                                  <div class="action-links container container-card text-left" style="max-width: 540px">
                                    <div class="card mt-auto pb-4" style="background: #ffffffe0;">
                                      <div class="row">
                                        <div class="col-12">

                                            <article class="card-body">
                                                <a href="<?php echo base_url(); ?>register" class="float-right btn btn-outline-primary">Belum Punya Akun ?</a>
                                                <h4 class="card-title mb-4 mt-1">Halaman Login</h4>
                                                <p>
                                                    <a href="" class="btn btn-block btn-outline-info"> <i class="fab fa-twitter"></i> Login dengan Twitter</a>
                                                    <a href="" class="btn btn-block btn-outline-primary"> <i class="fab fa-facebook-f"></i> Login dengan facebook</a>
                                                </p>
                                            <hr>
                                            <form  action="<?php echo base_url(); ?>ceklogin"  target="_top" method="post">
                                              <div class="form-group">
                                                  <input name="id" class="form-control" placeholder="Email" type="email">
                                              </div> <!-- form-group// -->
                                              <div class="form-group">
                                                  <input class="form-control" placeholder="******" type="password" name="password">
                                              </div> <!-- form-group// -->   

                                              <p class="float-left">
                                                <a class="btn btn-outline-danger" href="<?php echo base_url(); ?>lupapassword" >Lupa Password ?</a>
                                           </p> 


                                            <button type="submit" class="btn btn-primary btn-block float-right col-6"> Masuk</button>


                                            </form>     
                                          </article>
                                        </div>
                                      </div>
                                    </div> <!-- card.// -->
                                  </div>
                                </div>
                              </div>  
                            </div>


            </section>
        </header>


    <script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/move-top.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/easing.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery.waypoints.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery.countup.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/main.js"></script>
    <script src='<?php echo base_url(); ?>assets/js/jquery.typer.js'></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/move-top.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/easing.js"></script>
   </body>
</html>

    <script type="text/javascript">
        $('a[href*="#"]').on('click', function (e) {
            e.preventDefault();

            $('html, body').animate({
                scrollTop: $($(this).attr('href')).offset().top
            }, 1000, 'linear');
        });

        $(document).ready(function() {
            /*
                var defaults = {
                containerID: 'toTop', // fading element id
                containerHoverID: 'toTopHover', // fading element hover id
                scrollSpeed: 1200,
                easingType: 'linear' 
                };
            */
                                
            $().UItoTop({ easingType: 'easeOutQuart' });
                                
            });
    </script>
    <script>
        $('.counter-agileits-w3layouts').countUp();
    </script>
    <script>
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
</script>

<script type="text/javascript">
    jQuery(document).ready(function($) {
        $(".scroll").click(function(event){     
            event.preventDefault();
            $('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
        });
    });
</script> 
<script type="text/javascript">
    jQuery(document).ready(function($) {
        $(".scroll").click(function(event){     
            event.preventDefault();
            $('html,body').animate({scrollTop:$(this.hash).offset().top},2000);
        });
    });
</script> 

