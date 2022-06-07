<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Admin - Desa Rante Angin, Luwu Timur </title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/images/icons/logo.png') }}">
    <link rel="stylesheet" href="{{ asset('assets_/vendor/owl-carousel/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets_/vendor/owl-carousel/css/owl.theme.default.min.css') }}">
    <link href="{{ asset('assets_/vendor/jqvmap/css/jqvmap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets_/css/style.css') }}" rel="stylesheet">

    {{-- Plugins --}}
    <!-- Toastr -->
    <link rel="stylesheet" href="{{ asset('assets_/vendor/toastr/css/toastr.min.css') }}">
    <!-- Summernote -->
    <link href="{{ asset('assets_/vendor/summernote/summernote.css') }}" rel="stylesheet">
    <!-- Datatable -->
    <link href="{{ asset('assets_/vendor/datatables/css/jquery.dataTables.min.css') }}" rel="stylesheet">

</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->


    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <a href="index.html') }}" class="brand-logo">
                <img class="logo-abbr" src="{{ asset('assets_/images/logo.png') }}" alt="">
                <img class="logo-compact" src="{{ asset('assets_/images/logo-text.png') }}" alt="">
                <img class="brand-title" src="{{ asset('assets_/images/logo-text.png') }}" alt="">
            </a>

            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span
                        class="line"></span>
                </div>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
        <div class="header">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="header-left">
                        </div>

                        <ul class="navbar-nav header-right">
                            <li class="nav-item dropdown header-profile">
                                <a class="nav-link" href="#" role="button" data-toggle="dropdown">
                                    <small class="pb-2">{{ Auth::user()->nama }}</small>
                                    <i class="mdi mdi-account-circle" style="font-size: 20px"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="{{ asset('assets_/app-profile.html') }}" class="dropdown-item">
                                        <i class="icon-user"></i>
                                        <span class="ml-2">Profile </span>
                                    </a>
                                    <a href="{{ url('admin-access/logout') }}" class="dropdown-item">
                                        <i class="icon-key"></i>
                                        <span class="ml-2">Logout </span>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="quixnav">
            <div class="quixnav-scroll">
                <ul class="metismenu" id="menu">
                    <li class="nav-label first">Main Menu</li>
                    <li>
                        <a class="" href="{{ url('admin-access') }}" aria-expanded="false">
                            <i class="icon icon-home"></i>
                            <span class="nav-text">Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="fa fa-info-circle"></i>
                            <span class="nav-text">Profil & Informasi Desa</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="{{ url('admin-access/profil/sambutan') }}">Sambutan Kepala Desa</a></li>
                            <li><a href="{{ url('admin-access/profil/visi-misi') }}">Visi & Misi</a></li>
                            <li><a href="{{ url('admin-access/profil/sejarah') }}">Sejarah Desa</a></li>
                            <li><a href="{{ url('admin-access/profil/kondisi') }}">Kondisi Desa</a></li>
                            <li><a href="{{ url('admin-access/profil/aparatur') }}">Aparatur</a></li>
                            <li><a href="{{ url('xxxxxx') }}">Anggaran Desa</a></li>
                            <li><a href="{{ url('xxxxxx') }}">Agenda</a></li>
                        </ul>
                    </li>
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon icon-single-copy-06"></i>
                            <span class="nav-text">Lembaga Desa</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="{{ url('admin-access/lembaga/bpd') }}">BPD</a></li>
                            <li><a href="{{ url('admin-access/lembaga/karangtaruna') }}">Karang Taruna</a></li>
                            <li><a href="{{ url('admin-access/lembaga/bumdes') }}">BUMDES</a></li>
                        </ul>
                    </li>
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="fa fa-wpforms"></i>
                            <span class="nav-text">Kelola Postingan</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="{{ url('xxxxxx') }}">Buat Postingan Baru</a></li>
                            <li><a href="{{ url('xxxxxx') }}">Lihat Postingan</a></li>
                            <li><a href="{{ url('xxxxxx') }}">Kategori Postingan</a></li>
                        </ul>
                    </li>
                    <li>
                        <a class="" href="javascript:void()" aria-expanded="false">
                            <i class="fa fa-photo"></i>
                            <span class="nav-text">Galeri</span>
                        </a>
                    </li>
                    <li>
                        <a class="" href="javascript:void()" aria-expanded="false">
                            <i class="icon icon-single-04"></i>
                            <span class="nav-text">Data Penduduk</span>
                        </a>
                    </li>
                    <li>
                        <a class="" href="javascript:void()" aria-expanded="false">
                            <i class="fa fa-file-text-o"></i>
                            <span class="nav-text">File Download</span>
                        </a>
                    </li>
                </ul>
            </div>


        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->

        @yield('content')


        <!--**********************************
            Footer start
        ***********************************-->
        <div class="footer">
            <div class="copyright">
                <p>Copyright © Designed &amp; Developed by <a href="#" target="_blank">Quixkit</a> 2019</p>
                <p>Distributed by <a href="https://themewagon.com/" target="_blank">Themewagon</a></p>
            </div>
        </div>
        <!--**********************************
            Footer end
        ***********************************-->

        <!--**********************************
           Support ticket button start
        ***********************************-->

        <!--**********************************
           Support ticket button end
        ***********************************-->


    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="{{ asset('assets_/vendor/global/global.min.js') }}"></script>
    <script src="{{ asset('assets_/js/quixnav-init.js') }}"></script>
    <script src="{{ asset('assets_/js/custom.min.js') }}"></script>


    <!-- Vectormap -->
    <script src="{{ asset('assets_/vendor/raphael/raphael.min.js') }}"></script>
    {{-- <script src="{{ asset('assets_/vendor/morris/morris.min.js') }}"></script> --}}

    <script src="{{ asset('assets_/vendor/circle-progress/circle-progress.min.js') }}"></script>
    {{-- <script src="{{ asset('assets_/vendor/chart.js') }}/Chart.bundle.min.js') }}"></script> --}}

    <script src="{{ asset('assets_/vendor/gaugeJS/dist/gauge.min.js') }}"></script>

    <!--  flot-chart js -->
    <script src="{{ asset('assets_/vendor/flot/jquery.flot.js') }}"></script>
    <script src="{{ asset('assets_/vendor/flot/jquery.flot.resize.js') }}"></script>

    <!-- Owl Carousel -->
    <script src="{{ asset('assets_/vendor/owl-carousel/js/owl.carousel.min.js') }}"></script>

    <!-- Counter Up -->
    <script src="{{ asset('assets_/vendor/jqvmap/js/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('assets_/vendor/jqvmap/js/jquery.vmap.usa.js') }}"></script>
    <script src="{{ asset('assets_/vendor/jquery.counterup/jquery.counterup.min.js') }}"></script>

    {{-- Plugins --}}
    <!-- Summernote -->
    <script src="{{ asset('assets_/vendor/summernote/js/summernote.min.js') }}"></script>
    <!-- Toastr -->
    <script src="{{ asset('assets_/vendor/toastr/js/toastr.min.js') }}"></script>
    <!-- Datatable -->
    <script src="{{ asset('assets_/vendor/datatables/js/jquery.dataTables.min.js') }}"></script>

    {{-- <script src="{{ asset('assets_/js/dashboard/dashboard-1.js') }}"></script> --}}

    @yield('javascript')


    <script>
        @if (session('success'))
            toastr.success('{{ session('success') }}.', "Berhasil");
        @endif
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                toastr.error('{{ $error }}.', "Gagal");
            @endforeach
        @endif
    </script>

</body>

</html>
