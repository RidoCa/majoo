<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Bootstrap Dashboard by Bootstrapious.com</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="robots" content="all,follow">
  <!-- Bootstrap CSS-->
  <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome CSS-->
  <link rel="stylesheet" href="vendor/font-awesome/css/font-awesome.min.css">
  <!-- Fontastic Custom icon font-->
  <link rel="stylesheet" href="css/fontastic.css">
  <!-- Google fonts - Roboto -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700">
  <!-- jQuery Circle-->
  <link rel="stylesheet" href="css/grasp_mobile_progress_circle-1.0.0.min.css">
  <!-- Custom Scrollbar-->
  <link rel="stylesheet" href="vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css">
  <!-- theme stylesheet-->
  <link rel="stylesheet" href="css/style.default.css" id="theme-stylesheet">
  <!-- Custom stylesheet - for your changes-->
  <link rel="stylesheet" href="css/custom.css">
  <!-- Favicon-->
  <link rel="shortcut icon" href="img/favicon.ico">
  <!-- Tweaks for older IEs-->
  <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>

<body>
  <!-- Side Navbar -->
  <nav class="side-navbar">
    <div class="side-navbar-wrapper">
      <!-- Sidebar Header    -->
      <div class="sidenav-header d-flex align-items-center justify-content-center">
        <!-- User Info-->
        <div class="sidenav-header-inner text-center"><img src="img/avatar-7.jpg" alt="person"
            class="img-fluid rounded-circle">
          <h2 class="h5">{{auth()->user()->name}}</h2><span>{{auth()->user()->role}}</span>
        </div>
        <!-- Small Brand information, appears on minimized sidebar-->
        <div class="sidenav-header-logo"><a href="index.html" class="brand-small text-center"> <strong>D</strong><strong
              class="text-primary">M</strong></a></div>
      </div>
      <!-- Sidebar Navigation Menus-->
      <div class="main-menu">
        <h5 class="sidenav-heading">Main</h5>
        <ul id="side-main-menu" class="side-menu list-unstyled">
        @if(auth()->user()->role=='admin')
          <li><a href="/produk"> <i class="fa fa-bar-chart"></i>Data Produk</a></li>
          <li><a href="/pesanan"> <i class="icon-interface-windows"></i>Data Pesanan Belum Diproses</a></li>
          <li><a href="/pesananacc"> <i class="icon-interface-windows"></i>Data Pesanan Sudah Diproses</a></li>
        @endif
        @if(auth()->user()->role=='member')
          <li><a href="/katalog"> <i class="icon-interface-windows"></i>Katalog</a></li>
          <li><a href="/pesananhis"> <i class="icon-interface-windows"></i>Data Riwayar Pesanan</a></li>
        @endif
        </ul>
      </div>
    </div>
  </nav>
  <div class="page">
    <!-- navbar-->
    <header class="header">
      <nav class="navbar">
        <div class="container-fluid">
          <div class="navbar-holder d-flex align-items-center justify-content-between">
            <div class="navbar-header"><a id="toggle-btn" href="#" class="menu-btn"><i class="icon-bars"> </i></a><a
                href="/dashboard" class="navbar-brand">
                <div class="brand-text d-none d-md-inline-block"><span>Dashboard </span><strong
                    class="text-primary">  Majoo</strong></div>
              </a></div>
            <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">
              <!-- Notifications dropdown-->
              <!-- Log out-->
              <li class="nav-item"><a href="/logout" class="nav-link logout"> <span
                    class="d-none d-sm-inline-block">Logout</span><i class="fa fa-sign-out"></i></a></li>
            </ul>
          </div>
        </div>
      </nav>
    </header>
    @if(session('sukses'))
    <div class="alert alert-success" role="alert">
      {{session('sukses')}}
    </div>
    @elseif(session('update'))
    <div class="alert alert-warning" role="alert">
      {{session('update')}}
    </div>
    @elseif(session('delete'))
    <div class="alert alert-danger" role="alert">
      {{session('delete')}}
    </div>
    @endif
    @yield('konten')
    <footer class="main-footer">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-6">
            <p>Majoo company &copy; 2020</p>
          </div>
          <div class="col-sm-6 text-right">
            <p>Design by <a href="https://majoo.id" class="external">Majoo.id</a>
            </p>
            <!-- Please do not remove the backlink to us unless you support further theme's development at https://bootstrapious.com/donate. It is part of the license conditions and it helps me to run Bootstrapious. Thank you for understanding :)-->
          </div>
        </div>
      </div>
    </footer>
  </div>
  <!-- JavaScript files-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
  <script src="vendor/popper.js/umd/popper.min.js"> </script>
  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
  
  <script type="text/javascript">

    $("#nameid").select2({
          placeholder: "Select a Name",
          allowClear: true
      });
  </script>
  
  <script>
    $('#pesan').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget)
                var id = button.data('id')
                var name = button.data('nama')
                var harga = button.data('harga')
                var singkat = button.data('sing')
                var tgl = button.data('tgl')
                var foto = button.data('foto')
                var desk = button.data('desk')
							  $('.modal-body img').attr('src','data_file/'+foto);
                var modal = $(this)
                modal.find('.modal-body #id_produk').val(id);
                modal.find('.modal-body #name').val(name);
                modal.find('.modal-body #harga').val(harga);
                modal.find('.modal-body #tanggal').val(tgl);
                modal.find('.modal-body #deskripsi_singkat').val(singkat);
                modal.find('.modal-body #deskripsi').val(desk);
                
            })
  </script>
 

  <script>
    $('#editprod').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget)
                var id = button.data('id')
                var name = button.data('nama')
                var harga = button.data('harga')
                var singkat = button.data('sing')
                var foto = button.data('foto')
                var desk = button.data('desk')
               
                var modal = $(this)
                modal.find('.modal-body #id_produk').val(id);
                modal.find('.modal-body #name2').val(name);
                modal.find('.modal-body #harga2').val(harga);
                modal.find('.modal-body #deskripsi_singkat2').val(singkat);
                modal.find('.modal-body #deskripsi2').val(desk);
                
            })
  </script>
  
  
  <script src="js/grasp_mobile_progress_circle-1.0.0.min.js"></script>
  <script src="vendor/jquery.cookie/jquery.cookie.js"> </script>
  <script src="vendor/jquery-validation/jquery.validate.min.js"></script>
  <script src="vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
  <!-- Main File-->
  <script src="js/front.js"></script>
</body>

</html>