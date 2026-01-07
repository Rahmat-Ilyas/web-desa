@php
// Postingan
$postingan = new App\Models\Postingan();

// Galeri
$get_galeri = new App\Models\Galeri();
$galeri = $get_galeri
    ->orderBy('id', 'desc')
    ->limit(4)
    ->get();
@endphp
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Kel. Ujung Sabbang, Parepare</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="{{ asset('assets/images/icons/logo.png') }}" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/fonts/fontawesome-5.0.8/css/fontawesome-all.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/fonts/iconic/css/material-design-iconic-font.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/animate/animate.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/css-hamburgers/hamburgers.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/animsition/css/animsition.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/util.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/main.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/costume.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" href="{{ asset('assets_/vendor/toastr/css/toastr.min.css') }}">
    <!--===============================================================================================-->
</head>

<body class="animsition">

    <!-- Header -->
    <header>
        <!-- Header desktop -->
        <div class="container-menu-desktop">
            <div class="topbar">
                <div class="content-topbar container h-100">
                    <div class="left-topbar">
                        <span class="left-topbar-item flex-wr-s-c">
                            <span>
                                <i class="fas fa-calendar"></i>&nbsp; {{ date('d F Y') }}
                            </span>
                        </span>

                        {{-- <a href="#" class="left-topbar-item">
                            Forum Aspirasi Rakyat
                        </a> --}}

                        <a href="{{ url('kontak') }}" class="left-topbar-item">
                            Hubungi Kami
                        </a>

                        <a href="{{ url('profil/peta-lokasi-desa') }}" class="left-topbar-item">
                            Peta Lokasi Desa
                        </a>

                        {{-- <a href="#" class="left-topbar-item">
                            Sing up
                        </a>

                        <a href="#" class="left-topbar-item">
                            Log in
                        </a> --}}
                    </div>

                    <div class="right-topbar">
                        <a href="#">
                            <span class="fab fa-facebook-f"></span>
                        </a>

                        <a href="#">
                            <span class="fab fa-twitter"></span>
                        </a>

                        <a href="#">
                            <span class="fab fa-instagram"></span>
                        </a>

                        <a href="#">
                            <span class="fab fa-youtube"></span>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Header Mobile -->
            <div class="wrap-header-mobile">
                <!-- Logo moblie -->
                <div class="logo-mobile">
                    <a href="{{ url('/') }}"><img src="{{ asset('assets/images/icons/logo.png') }}"
                            style="min-height: 50px;" alt="IMG-LOGO"></a>
                    <h5 class="text-dark ml-5 mt-1 cl2 how-txt2" style="font-size: 18px; margin-bottom: -5px;">
                        &nbsp;KEL. UJUNG SABBANG
                    </h5>
                    <div>
                        <small class="ml-5 f1-s-3 cl2 how-txt2">&nbsp;&nbsp;Kecamatan Ujung, Kota Parepare</small>
                    </div>
                </div>

                <!-- Button show menu -->
                <div class="btn-show-menu-mobile hamburger hamburger--squeeze m-r--8">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </div>
            </div>

            <!-- Menu Mobile -->
            <div class="menu-mobile">
                <ul class="topbar-mobile">
                    <li class="left-topbar">
                        <span class="left-topbar-item flex-wr-s-c">
                            <span>
                                <i class="fas fa-calendar"></i>&nbsp; {{ date('d F Y') }}
                            </span>
                        </span>
                    </li>

                    <li class="left-topbar">
                        {{-- <a href="#" class="left-topbar-item">
                            Forum Aspirasi Rakyat
                        </a> --}}

                        <a href="{{ url('kontak') }}" class="left-topbar-item">
                            Hubungi Kami
                        </a>

                        <a href="{{ url('profil/peta-lokasi-desa') }}" class="left-topbar-item">
                            Peta Lokasi Desa
                        </a>

                        {{-- <a href="#" class="left-topbar-item">
                            Sing up
                        </a>

                        <a href="#" class="left-topbar-item">
                            Log in
                        </a> --}}
                    </li>

                    <li class="right-topbar">
                        <a href="#">
                            <span class="fab fa-facebook-f"></span>
                        </a>

                        <a href="#">
                            <span class="fab fa-twitter"></span>
                        </a>

                        <a href="#">
                            <span class="fab fa-instagram"></span>
                        </a>

                        <a href="#">
                            <span class="fab fa-youtube"></span>
                        </a>
                    </li>
                </ul>

                <ul class="main-menu-m">
                    <li>
                        <a href="{{ url('/') }}">HOME</a>
                    </li>

                    <li>
                        <a href="#">PROFIL</a>
                        <ul class="sub-menu-m">
                            <li><a href="{{ url('profil/sambutan-kepala-desa') }}">Sambutan Kepala Desa</a>
                            </li>
                            <li><a href="{{ url('profil/visi-misi') }}">Visi & Misi</a></li>
                            <li><a href="{{ url('profil/sejarah-desa') }}">Sejarah Desa</a></li>
                            <li><a href="{{ url('profil/kondisi-desa') }}">Kondisi Desa</a></li>
                            <li><a href="{{ url('profil/lokasi-kantor-desa') }}">Lokasi Kantor Desa</a></li>
                            <li><a href="{{ url('profil/peta-lokasi-desa') }}">Peta Lokasi Desa</a></li>
                        </ul>

                        <span class="arrow-main-menu-m">
                            <i class="fa fa-angle-right" aria-hidden="true"></i>
                        </span>
                    </li>

                    <li>
                        <a href="javascript:;">LEMBAGA</a>
                        <ul class="sub-menu-m">
                            <li><a href="{{ url('profil/bpd') }}">BPD</a></li>
                            <li><a href="{{ url('profil/karang-taruna') }}">Karang Taaruna</a></li>
                            <li><a href="{{ url('profil/bumdes') }}">BUMDES</a></li>
                        </ul>

                        <span class="arrow-main-menu-m">
                            <i class="fa fa-angle-right" aria-hidden="true"></i>
                        </span>
                    </li>

                    <li>
                        <a href="{{ url('aparatur') }}">APARATUR</a>
                    </li>

                    <li>
                        <a href="{{ url('anggaran') }}">ANGGARAN DESA</a>
                    </li>

                    <li>
                        <a href="javascript:;">DATA PENDUDUK</a>
                        <ul class="sub-menu-m">
                            <li><a href="{{ url('data-penduduk/statistik-penduduk') }}">Statistik Semua Penduduk</a>
                            </li>
                            <li><a href="{{ url('data-penduduk/berdasarkan-umur') }}">Penduduk Berdasarkan Umur</a>
                            </li>
                            <li><a href="{{ url('data-penduduk/pemilih-tetap') }}">Pemilih Tetap</a></li>
                            <li><a href="{{ url('data-penduduk/agama') }}">Statistik Agama</a></li>
                            {{-- <li><a href="{{ url('data-penduduk/jenis-kelamin') }}">Statistik Jenis Kelamin</a></li> --}}
                            <li><a href="{{ url('data-penduduk/pendidikan') }}">Statistik Pendidikan</a></li>
                            <li><a href="{{ url('data-penduduk/rasio-umur') }}">Depeandency Rasio Menurut Usia</a>
                            </li>
                            <li><a href="{{ url('data-penduduk/status') }}">Statistik Penduduk Duda atau Janda</a>
                            </li>
                        </ul>

                        <span class="arrow-main-menu-m">
                            <i class="fa fa-angle-right" aria-hidden="true"></i>
                        </span>
                    </li>

                    <li>
                        <a href="{{ url('galeri') }}">GALERI</a>
                    </li>

                    <li>
                        <a href="{{ url('agenda') }}">AGENDA</a>
                    </li>

                    <li>
                        <a href="{{ url('file-download') }}">DOWNLOAD</a>
                    </li>

                    <li>
                        <a href="javascript:;">INFORMASI</a>
                        <ul class="sub-menu-m">
                            <li><a href="{{ url('postingan/berita-desa') }}">Berita Desa</a></li>
                            <li><a href="{{ url('postingan/artikel') }}">Artikel</a></li>
                            <li><a href="{{ url('postingan/potensi-desa') }}">Potensi Desa</a></li>
                            <li><a href="{{ url('postingan/program-desa') }}">Program Desa</a></li>
                            <li><a href="{{ url('postingan/bumdes') }}">Bumdes</a></li>
                            <li><a href="{{ url('postingan/produk-hukum') }}">Produk Hukum</a></li>
                            <li><a href="{{ url('postingan/lembaga-desa') }}">Lembaga Desa</a></li>
                            <li><a href="{{ url('postingan/semua-post') }}">Semua Post</a></li>
                        </ul>

                        <span class="arrow-main-menu-m">
                            <i class="fa fa-angle-right" aria-hidden="true"></i>
                        </span>
                    </li>
                </ul>
            </div>

            <!--  -->
            <div class="wrap-logo container p-0">
                <!-- Logo desktop -->
                <div class="logo">
                    <a href="#"><img src="{{ asset('assets/images/icons/logo.png') }}"
                            alt="LOGO KEL. UJUNG SABBANG" height="100"></a>
                    {{-- <h2 class="text-dark ml-2 mt-0"><b>SELAMAT DATANG</b></h2> --}}
                    <div class="ml-4">
                        <h5 class="text-dark" style="font-size: 18px"><b>KEL. UJUNG SABBANG</b></h5>
                        <div class="mt-2">
                            <span class="text-dark"><a href="#">https://www.ujung-sabbang.com</a></span><br>
                            <span class="text-muted" style="font-size: 13px">Kecamatan Ujung, Kota Parepare,
                                Sulawesi Selatan</span>
                        </div>
                    </div>
                </div>

                <!-- Banner -->
                <div class="banner-header">
                    {{-- <a href="#"><img src="{{ asset('assets/images/banner-01.jpg') }}" alt="Logo Kel. Ujung Sabbang"></a> --}}
                </div>
            </div>

            <!--  -->
            <div class="wrap-main-nav">
                <div class="main-nav">
                    <!-- Menu desktop -->
                    <nav class="menu-desktop">
                        <ul class="main-menu">
                            <li id="nav-home">
                                <a href="{{ url('/') }}">HOME</a>
                            </li>

                            <li class="drop-menu" id="nav-profil">
                                <a href="#">PROFIL</a>
                                <ul class="sub-menu">
                                    <li><a href="{{ url('profil/sambutan-kepala-desa') }}">Sambutan Kepala Desa</a>
                                    </li>
                                    <li><a href="{{ url('profil/visi-misi') }}">Visi & Misi</a></li>
                                    <li><a href="{{ url('profil/sejarah-desa') }}">Sejarah Desa</a></li>
                                    <li><a href="{{ url('profil/kondisi-desa') }}">Kondisi Desa</a></li>
                                    <li><a href="{{ url('profil/lokasi-kantor-desa') }}">Lokasi Kantor Desa</a></li>
                                    <li><a href="{{ url('profil/peta-lokasi-desa') }}">Peta Lokasi Desa</a></li>
                                </ul>
                            </li>

                            <li class="drop-menu" id="nav-lembaga">
                                <a href="#">LEMBAGA</a>
                                <ul class="sub-menu">
                                    <li><a href="{{ url('profil/bpd') }}">BPD</a></li>
                                    <li><a href="{{ url('profil/karang-taruna') }}">Karang Taaruna</a></li>
                                    <li><a href="{{ url('profil/bumdes') }}">BUMDES</a></li>
                                </ul>
                            </li>

                            <li id="nav-aparatur">
                                <a href="{{ url('aparatur') }}">APARATUR</a>
                            </li>

                            <li id="nav-anggaran">
                                <a href="{{ url('anggaran') }}">ANGGARAN DESA</a>
                            </li>

                            <li class="drop-menu" id="nav-penduduk">
                                <a href="#">DATA PENDUDUK</a>
                                <ul class="sub-menu">
                                    <li><a href="{{ url('data-penduduk/statistik-penduduk') }}">Statistik Semua
                                            Penduduk</a>
                                    </li>
                                    <li><a href="{{ url('data-penduduk/berdasarkan-umur') }}">Penduduk Berdasarkan
                                            Umur</a></li>
                                    <li><a href="{{ url('data-penduduk/pemilih-tetap') }}">Pemilih Tetap</a></li>
                                    <li><a href="{{ url('data-penduduk/agama') }}">Statistik Agama</a></li>
                                    {{-- <li><a href="{{ url('data-penduduk/jenis-kelamin') }}">Statistik Jenis Kelamin</a></li> --}}
                                    <li><a href="{{ url('data-penduduk/pendidikan') }}">Statistik Pendidikan</a></li>
                                    <li><a href="{{ url('data-penduduk/rasio-umur') }}">Depeandency Rasio Menurut
                                            Usia</a>
                                    </li>
                                    <li><a href="{{ url('data-penduduk/status') }}">Statistik Penduduk Duda atau
                                            Janda</a></li>
                                </ul>
                            </li>

                            <li id="nav-galeri">
                                <a href="{{ url('galeri') }}">GALERI</a>
                            </li>

                            <li id="nav-agenda">
                                <a href="{{ url('agenda') }}">AGENDA</a>
                            </li>

                            <li id="nav-file">
                                <a href="{{ url('file-download') }}">DOWNLOAD</a>
                            </li>

                            <li class="drop-menu" id="nav-postingan">
                                <a href="#">INFORMASI</a>
                                <ul class="sub-menu">
                                    <li><a href="{{ url('postingan/berita-desa') }}">Berita Desa</a></li>
                                    <li><a href="{{ url('postingan/artikel') }}">Artikel</a></li>
                                    <li><a href="{{ url('postingan/potensi-desa') }}">Potensi Desa</a></li>
                                    <li><a href="{{ url('postingan/program-desa') }}">Program Desa</a></li>
                                    <li><a href="{{ url('postingan/bumdes') }}">Bumdes</a></li>
                                    <li><a href="{{ url('postingan/produk-hukum') }}">Produk Hukum</a></li>
                                    <li><a href="{{ url('postingan/lembaga-desa') }}">Lembaga Desa</a></li>
                                    <li><a href="{{ url('postingan/semua-post') }}">Semua Post</a></li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </header>


    @yield('content')

    <!-- Footer -->
    <footer>
        <div class="bg2 p-t-40 p-b-25">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 p-b-20">
                        <div class="size-h-3 flex-s-c">
                            <a href="{{ url('/') }}">
                                <img src="{{ asset('assets/images/icons/logo.png') }}" style="width: 70px;"
                                    alt="LOGO KEL. UJUNG SABBANG">
                            </a>
                            <span class="f1-l-2 text-white ml-3">
                                <b>
                                    <span class="text-danger">KEL. UJUNG SABBANG</span> <br>
                                </b>
                                <span>PAREPARE</span>
                            </span>
                        </div>

                        <div>
                            <p class="mt-2 f1-s-1 cl11 p-b-16">
                                Kel. Ujung Sabbang adalah desa yang terletak di Kecamatan Ujung, Kota Parepare,
                                Sulawesi Selatan, Indonesia, Pos 92983.
                            </p>

                            <p class="f1-s-1 cl11 p-b-16">
                                Silahkan hubungi kami di:<br>
                                <i class="fa fa-phone"></i>&nbsp; +6285-3333-41194<br>
                                <i class="fa fa-envelope-open"></i>&nbsp; kontak@ujung-sabbang.com<br>
                            </p>

                            <div class="p-t-15">
                                <a href="#" class="fs-18 cl11 hov-cl10 trans-03 m-r-8">
                                    <span class="fab fa-facebook-f"></span>
                                </a>

                                <a href="#" class="fs-18 cl11 hov-cl10 trans-03 m-r-8">
                                    <span class="fab fa-twitter"></span>
                                </a>

                                <a href="#" class="fs-18 cl11 hov-cl10 trans-03 m-r-8">
                                    <span class="fab fa-instagram"></span>
                                </a>

                                <a href="#" class="fs-18 cl11 hov-cl10 trans-03 m-r-8">
                                    <span class="fab fa-youtube"></span>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-lg-4 p-b-20">
                        <div class="size-h-3 flex-s-c">
                            <h5 class="f1-m-7 cl0">
                                Galeri Desa
                            </h5>
                        </div>

                        <ul>
                            @foreach ($galeri as $i => $dta)
                                <li class="flex-wr-sb-s p-tb-10 how-bor1">
                                    <a href="{{ url('galeri/' . strtolower(str_replace(' ', '-', $dta->judul) . '-uid0' . $dta->id)) }}"
                                        class="size-w-4 wrap-pic-w hov1 trans-03 w-full-sr575 m-b-25">
                                        <div class="bg-img1 how1 pos-relative"
                                            style="background-image: url({{ asset('images/galeri/' . $dta->konten_galeri[0]->foto) }}); height: 50px;">
                                        </div>
                                    </a>

                                    <div class="size-w-5">
                                        <h6 class="p-b-5">
                                            <a href="{{ url('galeri/' . strtolower(str_replace(' ', '-', $dta->judul) . '-uid0' . $dta->id)) }}"
                                                class="f1-s-5 cl11 hov-cl10 trans-03">
                                                {{ $dta->judul }}
                                            </a>
                                        </h6>

                                        <span class="f1-s-3 cl6">
                                            {{ count($dta->konten_galeri) }} Gambar
                                        </span>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="col-sm-6 col-lg-4 p-b-20">
                        <div class="size-h-3 flex-s-c">
                            <h5 class="f1-m-7 cl0">
                                Kategori
                            </h5>
                        </div>

                        <ul class="m-t--12">
                            <li class="how-bor1 p-rl-5 p-tb-10">
                                <a href="{{ url('postingan/berita-desa') }}"
                                    class="flex-wr-sb-c f1-s-5 cl11 hov-cl10 trans-03 p-tb-8">
                                    <span>
                                        Berita Desa
                                    </span>

                                    <span>
                                        ({{ count($postingan->where('kategori', 'Berita')->get()) }})
                                    </span>
                                </a>
                            </li>

                            <li class="how-bor1 p-rl-5 p-tb-10">
                                <a href="{{ url('postingan/artikel') }}"
                                    class="flex-wr-sb-c f1-s-5 cl11 hov-cl10 trans-03 p-tb-8">
                                    <span>
                                        Artikel
                                    </span>

                                    <span>
                                        ({{ count($postingan->where('kategori', 'Artikel')->get()) }})
                                    </span>
                                </a>
                            </li>

                            <li class="how-bor1 p-rl-5 p-tb-10">
                                <a href="{{ url('postingan/potensi-desa') }}"
                                    class="flex-wr-sb-c f1-s-5 cl11 hov-cl10 trans-03 p-tb-8">
                                    <span>
                                        Potensi Desa
                                    </span>

                                    <span>
                                        ({{ count($postingan->where('kategori', 'Potensi Desa')->get()) }})
                                    </span>
                                </a>
                            </li>

                            <li class="how-bor1 p-rl-5 p-tb-10">
                                <a href="{{ url('postingan/program-desa') }}"
                                    class="flex-wr-sb-c f1-s-5 cl11 hov-cl10 trans-03 p-tb-8">
                                    <span>
                                        Program Desa
                                    </span>

                                    <span>
                                        ({{ count($postingan->where('kategori', 'Program Desa')->get()) }})
                                    </span>
                                </a>
                            </li>

                            <li class="how-bor1 p-rl-5 p-tb-10">
                                <a href="{{ url('postingan/bumdes') }}"
                                    class="flex-wr-sb-c f1-s-5 cl11 hov-cl10 trans-03 p-tb-8">
                                    <span>
                                        Bumdes
                                    </span>

                                    <span>
                                        ({{ count($postingan->where('kategori', 'Bumdes')->get()) }})
                                    </span>
                                </a>
                            </li>

                            <li class="how-bor1 p-rl-5 p-tb-10">
                                <a href="{{ url('postingan/produk-hukum') }}"
                                    class="flex-wr-sb-c f1-s-5 cl11 hov-cl10 trans-03 p-tb-8">
                                    <span>
                                        Produk Hukum
                                    </span>

                                    <span>
                                        ({{ count($postingan->where('kategori', 'Produk Hukum')->get()) }})
                                    </span>
                                </a>
                            </li>

                            <li class="how-bor1 p-rl-5 p-tb-10">
                                <a href="{{ url('postingan/lembaga-desa') }}"
                                    class="flex-wr-sb-c f1-s-5 cl11 hov-cl10 trans-03 p-tb-8">
                                    <span>
                                        Lembaga Desa
                                    </span>

                                    <span>
                                        ({{ count($postingan->where('kategori', 'Lembaga Desa')->get()) }})
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg11">
            <div class="container size-h-4 flex-c-c p-tb-15">
                <span class="f1-s-1 cl0 txt-center">
                    Copyright © {{ date('Y') }} Kel. Ujung Sabbang, All Right Reserved. Develop by <a
                        href="#">Doreka Studio</a>
                </span>
            </div>
        </div>
    </footer>

    <!-- Back to top -->
    <div class="btn-back-to-top" id="myBtn">
        <span class="symbol-btn-back-to-top">
            <span class="fas fa-angle-up"></span>
        </span>
    </div>

    <!--===============================================================================================-->
    <script src="{{ asset('assets/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('assets/vendor/animsition/js/animsition.min.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('assets/vendor/bootstrap/js/popper.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('assets_/vendor/toastr/js/toastr.min.js') }}"></script>

    @yield('javascript')
    @yield('javascript-side')

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
