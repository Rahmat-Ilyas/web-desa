@php
$data = new App\Models\Pesan();
$pesan = $data->where('status', 'new')->get();
@endphp
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
    <!-- Dropzone -->
    <link href="{{ asset('assets_/vendor/dropzone/dropzone.min.css') }}" rel="stylesheet">
    <!-- Tag Input -->
    <link href="{{ asset('assets_/vendor/bootstrap-tagsinput/css/bootstrap-tagsinput.css') }}" rel="stylesheet">

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
            <a href="{{ url('/admin-access') }}" class="brand-logo">
                <img class="logo-abbr" height="60" style="min-width: 50px;"
                    src="{{ asset('assets/images/icons/logo.png') }}" alt="">
                <span class="brand-title" style="min-width: 100%;">DESA<br>RANTE ANGIN</span>
                {{-- <img class="logo-compact" src="{{ asset('assets_/images/logo-text.png') }}" alt="">
                <img class="brand-title" src="{{ asset('assets_/images/logo-text.png') }}" alt=""> --}}
            </a>

            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
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
                                    <a href="#" class="dropdown-item" data-toggle="modal"
                                        data-target=".modal-akun">
                                        <i class="icon-user"></i>
                                        <span class="ml-2">Akun Saya </span>
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
                            <i class="ti-info-alt"></i>
                            <span class="nav-text">Profil & Informasi Desa</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="{{ url('admin-access/profil/sambutan') }}">Sambutan Kepala Desa</a></li>
                            <li><a href="{{ url('admin-access/profil/visi-misi') }}">Visi & Misi</a></li>
                            <li><a href="{{ url('admin-access/profil/sejarah') }}">Sejarah Desa</a></li>
                            <li><a href="{{ url('admin-access/profil/kondisi') }}">Kondisi Desa</a></li>
                            <li><a href="{{ url('admin-access/profil/aparatur') }}">Aparatur</a></li>
                            <li><a href="{{ url('admin-access/profil/anggaran') }}">Anggaran Desa</a></li>
                            <li><a href="{{ url('admin-access/profil/agenda') }}">Agenda</a></li>
                        </ul>
                    </li>
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="ti-flag-alt"></i>
                            <span class="nav-text">Lembaga Desa</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="{{ url('admin-access/lembaga/bpd') }}">BPD</a></li>
                            <li><a href="{{ url('admin-access/lembaga/karangtaruna') }}">Karang Taruna</a></li>
                            <li><a href="{{ url('admin-access/lembaga/bumdes') }}">BUMDES</a></li>
                        </ul>
                    </li>
                    <li id="postingan">
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="fa fa-wpforms"></i>
                            <span class="nav-text">Kelola Postingan</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="{{ url('admin-access/postingan/buat-postingan') }}">Buat Postingan Baru</a>
                            </li>
                            <li id="view-post"><a href="{{ url('admin-access/postingan/postingan') }}">Semua
                                    Postingan</a></li>
                        </ul>
                    </li>
                    <li id="galeri">
                        <a class="" href="{{ url('admin-access/galeri/arsip-galeri') }}"
                            aria-expanded="false">
                            <i class="ti-image"></i>
                            <span class="nav-text">Galeri</span>
                        </a>
                    </li>
                    <li>
                        <a class="" href="{{ url('admin-access/data-penduduk') }}" aria-expanded="false">
                            <i class="ti-user"></i>
                            <span class="nav-text">Data Penduduk</span>
                        </a>
                    </li>
                    <li>
                        <a class="" href="{{ url('admin-access/file-download') }}" aria-expanded="false">
                            <i class="fa fa-file-text-o"></i>
                            <span class="nav-text">File Download</span>
                        </a>
                    </li>
                    <li>
                        <a class="" href="{{ url('admin-access/pesan') }}" aria-expanded="false">
                            <i class="ti-email"></i>
                            <span class="nav-text">Pesan Masuk </span>
                            @if (count($pesan) > 0)
                                <span class="badge badge-danger badge-circle"
                                    style="font-size: 9px; height: 18px; width: 18px; padding: 3px;">{{ count($pesan) }}</span>
                            @endif
                        </a>
                    </li>
                    @if (Auth::user()->role == 'super_admin')
                        <li>
                            <a class="" href="{{ url('admin-access/akun-akses') }}" aria-expanded="false">
                                <i class="fa fa-lock"></i>
                                <span class="nav-text">Kelola Akun Akses</span>
                            </a>
                        </li>
                    @endif
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
                <p>Copyright © {{ date('Y') }} Desa Rante Angin, All Right Reserved</p>
                <p>Develop by <a href="#">Doreka Studio</a></p>
            </div>
        </div>
        <!--**********************************
            Footer end
        ***********************************-->

        <!--**********************************
           Support ticket button start
        ***********************************-->
        <div class="modal modal-akun" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true"
            style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Pengaturan Akun</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body px-5">
                        <table class="table table-bordered text-dark border-dark" id="detail-akun">
                            <tbody>
                                <tr>
                                    <td>Nama Admin</td>
                                    <td>:</td>
                                    <td>{{ Auth::user()->nama }}</td>
                                </tr>
                                <tr>
                                    <td>Username</td>
                                    <td>:</td>
                                    <td>{{ Auth::user()->username }}</td>
                                </tr>
                            </tbody>
                        </table>
                        <form method="POST" action="{{ url('admin-access/update/akun') }}" id="edit-akun"
                            hidden="">
                            @csrf
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Nama</label>
                                <div class="col-sm-9">
                                    <input type="hidden" name="id" value="{{ Auth::user()->id }}">
                                    <input type="text" name="nama" class="form-control" required=""
                                        autocomplete="off" placeholder="Nama.." value="{{ Auth::user()->nama }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Username</label>
                                <div class="col-sm-9">
                                    <input type="text" name="username" class="form-control" required=""
                                        autocomplete="off" placeholder="Username.."
                                        value="{{ Auth::user()->username }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Password</label>
                                <div class="col-sm-9">
                                    <input type="text" name="password" class="form-control"
                                        placeholder="Password.." autocomplete="off">
                                    <span class="text-info">Note: Biarkan losong jika tidak diganti</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-3"></div>
                                <div class="col-sm-9">
                                    <button type="button" class="btn btn-dark" id="btn-batal-edit">Batal</button>
                                    <button type="submit" class="btn btn-success text-white">Simpan</button>
                                </div>
                            </div>
                        </form>
                        <div class="text-right" id="akun-kontrol">
                            <button type="" class="btn btn-dark" data-dismiss="modal"
                                aria-hidden="true">Tutup</button>
                            <button type="button" class="btn btn-primary" id="btn-edit-akun">Edit Akun</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

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
    <!-- Dropzone -->
    <script src="{{ asset('assets_/vendor/dropzone/dropzone.min.js') }}"></script>
    <!-- Tag Input -->
    <script src="{{ asset('assets_/vendor/bootstrap-tagsinput/js/bootstrap-tagsinput.min.js') }}"></script>

    {{-- <script src="{{ asset('assets_/js/dashboard/dashboard-1.js') }}"></script> --}}

    @yield('javascript')


    <script>
        $(document).tooltip({
            selector: '[data-toggle1="tooltip"]'
        });

        $('#btn-edit-akun').click(function(event) {
            $('#edit-akun').removeAttr('hidden');
            $('#detail-akun').attr('hidden', '');
            $('#akun-kontrol').attr('hidden', '');
        });

        $('#btn-batal-edit').click(function(event) {
            $('#edit-akun').attr('hidden', '');
            $('#detail-akun').removeAttr('hidden');
            $('#akun-kontrol').removeAttr('hidden');
        });


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
