<!DOCTYPE HTML>
<html lang="en-US">
    <head>
        <title>Posyandu Kelurahan Slipi</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="description" content="Template by Colorlib" />
        <meta name="keywords" content="HTML, CSS, JavaScript, PHP" />
        <meta name="author" content="Colorlib" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

        <link rel="shortcut icon" href="images/favicon.png" />
        <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700%7CLibre+Baskerville:400,400italic,700' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css" />
        <link rel="stylesheet" type="text/css"  href='<?= base_url().'assets/users/css/clear.css' ?>  ' />
        <link rel="stylesheet" type="text/css"  href='<?= base_url().'assets/users/css/common.css' ?>  ' />
        <link rel="stylesheet" type="text/css"  href='<?= base_url().'assets/users/css/font-awesome.min.css' ?>  ' />
        <link rel="stylesheet" type="text/css"  href='<?= base_url().'assets/users/css/carouFredSel.css' ?>  ' />
        <link rel="stylesheet" type="text/css"  href='<?= base_url().'assets/users/css/sm-clean.css' ?>  ' />
        <link rel="stylesheet" type="text/css"  href='<?= base_url().'assets/users/style.css' ?> ' />
        <script>
            var BASE_URL = '<?= base_url() ?>';
        </script>
    </head>
    <body class="home blog">

        <!-- Preloader Gif -->
        <table class="doc-loader">
            <tbody>
                <tr>
                    <td>
                        <img src="<?= base_url().'assets/users/images/ajax-document-loader.gif' ?>  " alt="Loading...">
                    </td>
                </tr>
            </tbody>
        </table>

        <!-- Left Sidebar -->
        <div id="sidebar" class="sidebar">
            <div class="menu-left-part">
                <div class="site-info-holder">
                    <h1 class="site-title">Posyandu</h1>
                    <p class="site-description">
                        Kelurahan Slipi
                    </p>

                    <div style="margin-top: 50px;">
                        <?php if($this->session->userdata('login') === 1): ?>
                            <p class="site-description" style="color: white" >Hallo, <?= $this->session->userdata('email') ?>  </p>
                            <a href="<?= base_url('master/warga/Akun/logout') ?>" class="btn btn-danger btn-block btn-sm">Logout</a>
                        <?php endif; ?>    
                   </div>  

                </div>
                <nav id="header-main-menu">
                    <ul class="main-menu sm sm-clean">
                        <li><a href="#/dashboard" class="current">Beranda</a></li>
                        <!-- <li><a href="#/jadwal">Jadwal Kegiatan</a></li> -->
                        <li><a href="#/antrian">Lihat Antrian</a></li>                        
                    </ul>

                    


                </nav>
                <footer>
                    <div class="footer-info">
                        © 2019 POSYANDU. <br> KELURAHAN SLIPI <i class="fa fa-heart"></i> BY POSYANDU
                    </div>
                </footer>
            </div>
            <div class="menu-right-part">
                <div class="logo-holder">
                    <a href="index.html">
                        <img src="<?= base_url().'assets/users/images/logo.png' ?>  " alt="Suppablog WP">
                    </a>
                </div>
                <div class="toggle-holder">
                    <div id="toggle">
                        <div class="menu-line"></div>
                    </div>
                </div>
                <!-- <div class="social-holder">
                    <div class="social-list">
                        <a href="#"><i class="fa fa-plus"></i></a>
                    </div>
                </div> -->
                <div class="fixed scroll-top"><i class="fa fa-caret-square-o-up" aria-hidden="true"></i></div>
            </div>
            <div class="clear"></div>
        </div>

        <!-- Home Content -->
        <div id="content" class="site-content"></div>
    </div>
    </div>
    </div>
  
        <!--Load JavaScript-->

        <script src="<?= base_url().'assets/js/vendor/jquery-1.11.3.min.js' ?>  "></script>
        <script src="<?= base_url().'assets/js/bootstrap.min.js' ?>  "></script>
        <script src="<?= base_url().'assets/js/jquery.validate.min.js' ?> "></script>
        <script type='text/javascript' src='<?= base_url().'assets/users/js/imagesloaded.pkgd.js' ?>  '></script>
        <script type='text/javascript' src='<?= base_url().'assets/users/js/jquery.nicescroll.min.js' ?>  '></script>
        <script type='text/javascript' src='<?= base_url().'assets/users/js/jquery.smartmenus.min.js' ?>  '></script>
        <script type='text/javascript' src='<?= base_url().'assets/users/js/jquery.carouFredSel-6.0.0-packed.js' ?>  '></script>
        <script type='text/javascript' src='<?= base_url().'assets/users/js/jquery.mousewheel.min.js' ?>  '></script>
        <script type='text/javascript' src='<?= base_url().'assets/users/js/jquery.touchSwipe.min.js' ?>   '></script>
        <script type='text/javascript' src='<?= base_url().'assets/users/js/jquery.easing.1.3.js' ?>  '></script>
        <script type='text/javascript' src='<?= base_url().'assets/users/js/main.js' ?>  '></script>
        <script type='text/javascript' src="<?= base_url().'assets/notify.min.js' ?>" ></script>
        <script type="text/javascript">
        $(document).ready(function() {
          var loadContent = function(href) {
            if(href){
                $.get(`<?= base_url().'Home/' ?>${href}`, (content) => {
                    $('#content').html(content);
                })
            }else{
                location.hash = '#/dashboard';
            }
          }

          $(window).on('hashchange', function() {
            var href = location.hash.substr(2);
            loadContent(href);
          });

          if(location.href){
            var href = location.hash.substr(2);
            loadContent(href);
          }else{
            location.hash = '#/dashboard';
          }

        });
        </script>
    </body>
</html>
