<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Kader Page</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i,800" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url().'assets/css/bootstrap.min.css' ?>  ">
    <link rel="stylesheet" href="<?= base_url().'assets/css/font-awesome.min.css' ?>  ">
    <link rel="stylesheet" href="<?= base_url().'assets/css/adminpro-custon-icon.css' ?> ">
    <link rel="stylesheet" href="<?= base_url().'assets/css/meanmenu.min.css' ?>  ">
    <link rel="stylesheet" href="<?= base_url().'assets/css/jquery.mCustomScrollbar.min.css' ?>  ">
    <link rel="stylesheet" href="<?= base_url().'assets/css/animate.css' ?>  ">
    <link rel="stylesheet" href="<?= base_url().'assets/css/data-table/bootstrap-table.css' ?>  ">
    <link rel="stylesheet" href="<?= base_url().'assets/css/data-table/bootstrap-editable.css' ?>  ">
    <link rel="stylesheet" href="<?= base_url().'assets/css/normalize.css' ?>  ">
    <link rel="stylesheet" href="<?= base_url().'assets/css/c3.min.css' ?>  ">
    <link rel="stylesheet" href="<?= base_url().'assets/css/form/all-type-forms.css' ?>  ">
    <link rel="stylesheet" href="<?= base_url().'assets/css/Lobibox.min.css' ?>  ">
    <link rel="stylesheet" href="<?= base_url().'assets/style.css' ?>  ">
    <link rel="stylesheet" href="<?= base_url().'assets/css/responsive.css' ?>  ">
    <link rel="stylesheet" href="<?= base_url().'assets/css/modals.css' ?>  ">
    <link rel="stylesheet" href="<?= base_url().'assets/spinner.css' ?> ">
    <script src="<?= base_url().'assets/js/vendor/modernizr-2.8.3.min.js' ?>  "></script>
    <script>
        var BASE_URL = '<?= base_url() ?>';
    </script>
</head>

<body class="materialdesign">
    <div class="wrapper-pro">
        <div class="left-sidebar-pro">
            <nav id="sidebar">
                <div class="sidebar-header">
                    </a>
                    <h3>Kader</h3>
                    <p>Posyandu</p>
                    <strong>P</strong>
                </div>
                <div class="left-custom-menu-adp-wrap">
                    <ul class="nav navbar-nav left-sidebar-menu-pro">
                        <li class="nav-item">
                            <a href="#/dashboard" class="nav-link dropdown-toggle"><i class="fa big-icon fa-home"></i> <span class="mini-dn">Beranda</span> <span class="indicator-right-menu mini-dn"><i class="fa indicator-mn fa-angle-left"></i></span></a>
                        </li>
                        <li class="nav-item">
                           <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><i class="fa big-icon fa-users"></i> <span class="mini-dn">Warga</span> <span class="indicator-right-menu mini-dn"><i class="fa indicator-mn fa-angle-left"></i></span></a>
                           <div role="menu" class="dropdown-menu left-menu-dropdown animated flipInX">
                               <a href="#/addwarga" class="dropdown-item">Tambah Warga</a>
                               <a href="#/listwarga" class="dropdown-item">List Warga</a>
                               <a href="#/kms" class="dropdown-item">Kelola KMS</a>
                           </div>
                       </li>
                       <li class="nav-item"><a href="#/jadwalkegiatan" class="nav-link dropdown-toggle"><i class="fa big-icon fa-clock-o"></i> <span class="mini-dn">Jadwal Kegiatan</span> <span class="indicator-right-menu mini-dn"><i class="fa indicator-mn fa-angle-left"></i></span></a>
                       <li class="nav-item">
                          <a href="#/kunjungan" class="nav-link dropdown-toggle"><i class="fa big-icon fa-envelope"></i> <span class="mini-dn">Kunjungan</span> <span class="indicator-right-menu mini-dn"><i class="fa indicator-mn fa-angle-left"></i></span></a>
                        </li>
                        <li class="nav-item">
                           <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><i class="fa big-icon fa-users"></i> <span class="mini-dn">Catatan</span> <span class="indicator-right-menu mini-dn"><i class="fa indicator-mn fa-angle-left"></i></span></a>
                           <div role="menu" class="dropdown-menu left-menu-dropdown animated flipInX">
                               <a href="#/tumbuhanak" class="dropdown-item">Pertumbuhan Anak</a>
                               <a href="#/imunisasi" class="dropdown-item">Imunisasi</a>
                           </div>
                       </li>
                        
                       
                        
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <div class="content-inner-all">
            <div class="header-top-area">
                <div class="fixed-header-top">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-1 col-md-6 col-sm-6 col-xs-12">
                                <button type="button" id="sidebarCollapse" class="btn bar-button-pro header-drl-controller-btn btn-info navbar-btn">
                                    <i class="fa fa-bars"></i>
                                </button>
                                <div class="admin-logo logo-wrap-pro">
                                    <!-- <a href="#"><img src="img/logo/log.png" alt="" /> -->
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-1 col-sm-1 col-xs-12">
                                <div class="header-top-menu tabl-d-n">
                                  <ul class="nav navbar-nav mai-top-nav">
                                        <li class="nav-item dropdown">
                                            <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle">Profile <span class="angle-down-topmenu"><i class="fa fa-angle-down"></i></span></a>
                                            <div role="menu" class="dropdown-menu animated flipInX">
                                                <a href="<?= base_url('Login/logout') ?> " class="dropdown-item">Logout</a>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-5 col-md-5 col-sm-6 col-xs-12">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Header top area end-->

            <div class="mobile-menu-area" style="margin-top:30px;">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="mobile-menu">
                                <nav id="dropdown">
                                    <ul class="mobile-menu-nav">
                                        <li><a data-toggle="collapse" data-target="#Charts" href="#/dashboard">Home <span class="admin-project-icon adminpro-icon adminpro-down-arrow"></span></a>
                                        </li>
                                        <li><a data-toggle="collapse" data-target="#demo" href="#/user">Mailbox <span class="admin-project-icon adminpro-icon adminpro-down-arrow"></span></a>
                                        </li>
                                        <li><a data-toggle="collapse" data-target="#others" href="#">Miscellaneous <span class="admin-project-icon adminpro-icon adminpro-down-arrow"></span></a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Mobile Menu end -->
            <!-- Breadcome start-->
            <div class="breadcome-area des-none">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="breadcome-list map-mg-t-40-gl shadow-reset">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                        <div class="breadcome-heading">
                                            <form role="search" class="">
                      												<input type="text" placeholder="Search...ss" class="form-control">
                      												<a href=""><i class="fa fa-search"></i></a>
                      											</form>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                        <ul class="breadcome-menu">
                                            <li><a href="#">Home</a> <span class="bread-slash">/</span>
                                            </li>
                                            <li><span class="bread-blod">Dashboard</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- welcome Project, sale area start-->
            <div class="welcome-adminpro-area">
                <div class="container-fluid" id="root">

                </div>
            </div>
    <!-- Footer Start-->
    <!-- <div class="footer-copyright-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer-copy-right">
                        <p>Copyright &#169; 2018 Colorlib All rights reserved. Template by <a href="https://colorlib.com">Colorlib</a>.</p>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- Footer End-->
    <!-- jquery
		============================================ -->
    <script src="<?= base_url().'assets/js/vendor/jquery-1.11.3.min.js' ?>  "></script>
    <!-- bootstrap JS
		============================================ -->
    <script src="<?= base_url().'assets/js/bootstrap.min.js' ?>  "></script>
    <!-- meanmenu JS
		============================================ -->
    <script src="<?= base_url().'assets/js/jquery.meanmenu.js' ?>  "></script>
    <!-- mCustomScrollbar JS
		============================================ -->
    <script src="<?= base_url().'assets/js/jquery.mCustomScrollbar.concat.min.js' ?>  "></script>
    <!-- sticky JS
		============================================ -->
    <script src="<?= base_url().'assets/js/jquery.sticky.js' ?>  "></script>
    <!-- scrollUp JS
		============================================ -->
    <script src="<?= base_url().'assets/js/jquery.scrollUp.min.js' ?>  "></script>
    <!-- counterup JS
		============================================ -->
    <script src="<?= base_url().'assets/js/counterup/jquery.counterup.min.js' ?>  "></script>
    <script src="<?= base_url().'assets/js/counterup/waypoints.min.js' ?>  "></script>
    <script src="<?= base_url().'assets/js/counterup/counterup-active.js' ?>  "></script>
    <!-- peity JS
		============================================ -->
    <script src="<?= base_url().'assets/js/peity/jquery.peity.min.js' ?>  "></script>
    <script src="<?= base_url().'assets/js/peity/peity-active.js' ?>  "></script>
    <!-- sparkline JS
		============================================ -->
    <script src="<?= base_url().'assets/js/sparkline/jquery.sparkline.min.js' ?>  "></script>
    <script src="<?= base_url().'assets/js/sparkline/sparkline-active.js' ?>  "></script>
    <!-- flot JS
		============================================ -->
    <script src="<?= base_url().'assets/js/flot/Chart.min.js' ?>  "></script>
    <!-- map JS
		============================================ -->
    <script src="<?= base_url().'assets/js/map/raphael.min.js' ?>  "></script>
    <script src="<?= base_url().'assets/js/map/jquery.mapael.js'  ?>  "></script>
    <script src="<?= base_url().'assets/js/map/france_departments.js' ?>  "></script>
    <script src="<?= base_url().'assets/js/map/world_countries.js' ?>  "></script>
    <script src="<?= base_url().'assets/js/map/usa_states.js' ?>  "></script>
    <script src="<?= base_url().'assets/js/map/map-active.js' ?>  "></script>

    <script src="<?= base_url().'assets/js/Lobibox.js' ?>  "></script>
    <script src="<?= base_url().'assets/js/jquery.validate.min.js' ?> "></script>
    <!-- data table JS
		============================================ -->
    <script src="<?= base_url().'assets/js/data-table/bootstrap-table.js' ?>  "></script>
    <script src="<?= base_url().'assets/js/data-table/tableExport.js' ?>  "></script>
    <script src="<?= base_url().'assets/js/data-table/data-table-active.js' ?>  "></script>
    <script src="<?= base_url().'assets/js/data-table/bootstrap-table-editable.js' ?>  "></script>
    <script src="<?= base_url().'assets/js/data-table/bootstrap-editable.js' ?>  "></script>
    <script src="<?= base_url().'assets/js/data-table/bootstrap-table-resizable.js' ?>  "></script>
    <script src="<?= base_url().'assets/js/data-table/colResizable-1.5.source.js' ?>  "></script>
    <script src="<?= base_url().'assets/js/data-table/bootstrap-table-export.js' ?>  "></script>
    <!-- main JS
		============================================ -->
    <script src="<?= base_url().'assets/js/main.js' ?>  "></script>
    <script type="text/javascript">
    $(document).ready(function() {
      var loadContent = function(href) {
        if(href){
            $.get(`<?= base_url().'kader/' ?>${href}`, (content) => {
                $('#root').html(content);
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
