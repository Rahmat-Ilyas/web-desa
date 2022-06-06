<!DOCTYPE html>
<html lang="en">

<head>
    <title>Desa Rante Angin, Luwu Timur</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="{{ asset('assets/images/icons/logo.png') }}" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}">
    <!--===============================================================================================-->
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

                        <a href="#" class="left-topbar-item">
                            Forum Aspirasi Rakyat
                        </a>

                        <a href="#" class="left-topbar-item">
                            Hubungi Kami
                        </a>

                        <a href="#" class="left-topbar-item">
                            Sing up
                        </a>

                        <a href="#" class="left-topbar-item">
                            Log in
                        </a>
                    </div>

                    <div class="right-topbar">
                        <a href="#">
                            <span class="fab fa-facebook-f"></span>
                        </a>

                        <a href="#">
                            <span class="fab fa-twitter"></span>
                        </a>

                        <a href="#">
                            <span class="fab fa-pinterest-p"></span>
                        </a>

                        <a href="#">
                            <span class="fab fa-vimeo-v"></span>
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
                    <a href="index.html"><img src="{{ asset('assets/images/icons/logo-01.png') }}"
                            alt="IMG-LOGO"></a>
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
                        <a href="#" class="left-topbar-item">
                            Forum Aspirasi Rakyat
                        </a>

                        <a href="#" class="left-topbar-item">
                            Hubungi Kami
                        </a>

                        <a href="#" class="left-topbar-item">
                            Sing up
                        </a>

                        <a href="#" class="left-topbar-item">
                            Log in
                        </a>
                    </li>

                    <li class="right-topbar">
                        <a href="#">
                            <span class="fab fa-facebook-f"></span>
                        </a>

                        <a href="#">
                            <span class="fab fa-twitter"></span>
                        </a>

                        <a href="#">
                            <span class="fab fa-pinterest-p"></span>
                        </a>

                        <a href="#">
                            <span class="fab fa-vimeo-v"></span>
                        </a>

                        <a href="#">
                            <span class="fab fa-youtube"></span>
                        </a>
                    </li>
                </ul>

                <ul class="main-menu-m">
                    <li>
                        <a href="#">HOME</a>
                    </li>

                    <li>
                        <a href="javascript:;">PROFIL</a>
                        <ul class="sub-menu-m">
                            <li><a href="#">Sambutan Kepala Desa</a></li>
                            <li><a href="#">Visi & Misi</a></li>
                            <li><a href="#">Sejarah Desa</a></li>
                            <li><a href="#">Peta Kantor</a></li>
                            <li><a href="#">Peta Lokasi Desa</a></li>
                            <li><a href="#">Kondisi Desa</a></li>
                            <li><a href="#">Potensi Desa</a></li>
                        </ul>

                        <span class="arrow-main-menu-m">
                            <i class="fa fa-angle-right" aria-hidden="true"></i>
                        </span>
                    </li>

                    <li>
                        <a href="javascript:;">LEMBAGA</a>
                        <ul class="sub-menu-m">
                            <li><a href="#">BPD</a></li>
                            <li><a href="#">Karang Taaruna</a></li>
                            <li><a href="#">BUMDES</a></li>
                        </ul>

                        <span class="arrow-main-menu-m">
                            <i class="fa fa-angle-right" aria-hidden="true"></i>
                        </span>
                    </li>

                    <li>
                        <a href="{{ url('/') }}">APARATUR</a>
                    </li>

                    <li>
                        <a href="{{ url('/') }}">ANGGARAN DESA</a>
                    </li>

                    <li>
                        <a href="javascript:;">DATA PENDUDUK</a>
                        <ul class="sub-menu-m">
                            <li><a href="#">BPD</a></li>
                            <li><a href="#">Karang Taaruna</a></li>
                            <li><a href="#">BUMDES</a></li>
                        </ul>

                        <span class="arrow-main-menu-m">
                            <i class="fa fa-angle-right" aria-hidden="true"></i>
                        </span>
                    </li>

                    <li>
                        <a href="{{ url('/') }}">GALERI</a>
                    </li>

                    <li>
                        <a href="{{ url('/') }}">AGENDA</a>
                    </li>

                    <li>
                        <a href="{{ url('/') }}">DOWNLOAD</a>
                    </li>

                    <li>
                        <a href="javascript:;">INFORMASI</a>
                        <ul class="sub-menu-m">
                            <li><a href="#">Potensi Desa</a></li>
                            <li><a href="#">Program Desa</a></li>
                            <li><a href="#">Bumdes</a></li>
                            <li><a href="#">Berita Desa</a></li>
                            <li><a href="#">Lembaga Desa</a></li>
                            <li><a href="#">Semua Post</a></li>
                        </ul>

                        <span class="arrow-main-menu-m">
                            <i class="fa fa-angle-right" aria-hidden="true"></i>
                        </span>
                    </li>
                </ul>
            </div>

            <!--  -->
            <div class="wrap-logo container pb-3">
                <!-- Logo desktop -->
                <div class="logo">
                    <a href="#"><img src="{{ asset('assets/images/icons/logo.png') }}" alt="LOGO" height="100" width="95"></a>
                    {{-- <h2 class="text-dark ml-2 mt-0"><b>SELAMAT DATANG</b></h2> --}}
                    <div class="ml-2">
                        <h5 class="text-dark" style="font-size: 18px"><b>DESA RANTE ANGIN</b></h5>
                        <div class="mt-2">
                            <span class="text-dark"><a href="#">https://www.desa-ranteangin.com</a></span><br>
                            <span class="text-muted" style="font-size: 13px">Kecamatan Towuti, Kabupaten Luwu Timur, Sulawesi Selatan Pos 92983</span>
                        </div>
                    </div>
                </div>

                <!-- Banner -->
                <div class="banner-header">
                    {{-- <a href="#"><img src="{{ asset('assets/images/banner-01.jpg') }}" alt="IMG"></a> --}}
                </div>
            </div>

            <!--  -->
            <div class="wrap-main-nav">
                <div class="main-nav">
                    <!-- Menu desktop -->
                    <nav class="menu-desktop">
                        <ul class="main-menu">
                            <li class="main-menu-active">
                                <a href="{{ url('/') }}">HOME</a>
                            </li>

                            <li class="drop-menu">
                                <a href="#">PROFIL</a>
                                <ul class="sub-menu">
                                    <li><a href="#">Sambutan Kepala Desa</a></li>
                                    <li><a href="#">Visi & Misi</a></li>
                                    <li><a href="#">Sejarah Desa</a></li>
                                    <li><a href="#">Peta Kantor</a></li>
                                    <li><a href="#">Peta Lokasi Desa</a></li>
                                    <li><a href="#">Kondisi Desa</a></li>
                                </ul>
                            </li>

                            <li class="drop-menu">
                                <a href="#">LEMBAGA</a>
                                <ul class="sub-menu">
                                    <li><a href="#">BPD</a></li>
                                    <li><a href="#">Karang Taaruna</a></li>
                                    <li><a href="#">BUMDES</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="{{ url('/') }}">APARATUR</a>
                            </li>

                            <li>
                                <a href="{{ url('/') }}">ANGGARAN DESA</a>
                            </li>

                            <li class="drop-menu">
                                <a href="#">DATA PENDUDUK</a>
                                <ul class="sub-menu">
                                    <li><a href="#">Statistik Penduduk</a></li>
                                    <li><a href="#">Penduduk Berdasarkan Umur</a></li>
                                    <li><a href="#">Pemilih Tetap</a></li>
                                    <li><a href="#">Statistik Agama</a></li>
                                    <li><a href="#">Statistik Jenis Kelamin</a></li>
                                    <li><a href="#">Statistik Pendidikan</a></li>
                                    <li><a href="#">Depeandency Rasio Menurut Usia</a></li>
                                    <li><a href="#">Statistik Penduduk Duda atau Janda</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="{{ url('/') }}">GALERI</a>
                            </li>

                            <li>
                                <a href="{{ url('/') }}">AGENDA</a>
                            </li>

                            <li>
                                <a href="{{ url('/') }}">DOWNLOAD</a>
                            </li>

                            <li class="drop-menu">
                                <a href="#">INFORMASI</a>
                                <ul class="sub-menu">
                                    <li><a href="#">Potensi Desa</a></li>
                                    <li><a href="#">Program Desa</a></li>
                                    <li><a href="#">Bumdes</a></li>
                                    <li><a href="#">Berita Desa</a></li>
                                    <li><a href="#">Lembaga Desa</a></li>
                                    <li><a href="#">Semua Post</a></li>
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
                            <a href="index.html">
                                <img class="max-s-full" src="{{ asset('assets/images/icons/logo-02.png') }}"
                                    alt="LOGO">
                            </a>
                        </div>

                        <div>
                            <p class="f1-s-1 cl11 p-b-16">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur tempor magna eget
                                elit efficitur, at accumsan sem placerat. Nulla tellus libero, mattis nec molestie at,
                                facilisis ut turpis. Vestibulum dolor metus, tincidunt eget odio
                            </p>

                            <p class="f1-s-1 cl11 p-b-16">
                                Any questions? Call us on (+1) 96 716 6879
                            </p>

                            <div class="p-t-15">
                                <a href="#" class="fs-18 cl11 hov-cl10 trans-03 m-r-8">
                                    <span class="fab fa-facebook-f"></span>
                                </a>

                                <a href="#" class="fs-18 cl11 hov-cl10 trans-03 m-r-8">
                                    <span class="fab fa-twitter"></span>
                                </a>

                                <a href="#" class="fs-18 cl11 hov-cl10 trans-03 m-r-8">
                                    <span class="fab fa-pinterest-p"></span>
                                </a>

                                <a href="#" class="fs-18 cl11 hov-cl10 trans-03 m-r-8">
                                    <span class="fab fa-vimeo-v"></span>
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
                                Popular Posts
                            </h5>
                        </div>

                        <ul>
                            <li class="flex-wr-sb-s p-b-20">
                                <a href="#" class="size-w-4 wrap-pic-w hov1 trans-03">
                                    <img src="{{ asset('assets/images/popular-post-01.jpg') }}" alt="IMG">
                                </a>

                                <div class="size-w-5">
                                    <h6 class="p-b-5">
                                        <a href="#" class="f1-s-5 cl11 hov-cl10 trans-03">
                                            Donec metus orci, malesuada et lectus vitae
                                        </a>
                                    </h6>

                                    <span class="f1-s-3 cl6">
                                        Feb 17
                                    </span>
                                </div>
                            </li>

                            <li class="flex-wr-sb-s p-b-20">
                                <a href="#" class="size-w-4 wrap-pic-w hov1 trans-03">
                                    <img src="{{ asset('assets/images/popular-post-02.jpg') }}" alt="IMG">
                                </a>

                                <div class="size-w-5">
                                    <h6 class="p-b-5">
                                        <a href="#" class="f1-s-5 cl11 hov-cl10 trans-03">
                                            Lorem ipsum dolor sit amet, consectetur
                                        </a>
                                    </h6>

                                    <span class="f1-s-3 cl6">
                                        Feb 16
                                    </span>
                                </div>
                            </li>

                            <li class="flex-wr-sb-s p-b-20">
                                <a href="#" class="size-w-4 wrap-pic-w hov1 trans-03">
                                    <img src="{{ asset('assets/images/popular-post-03.jpg') }}" alt="IMG">
                                </a>

                                <div class="size-w-5">
                                    <h6 class="p-b-5">
                                        <a href="#" class="f1-s-5 cl11 hov-cl10 trans-03">
                                            Suspendisse dictum enim quis imperdiet auctor
                                        </a>
                                    </h6>

                                    <span class="f1-s-3 cl6">
                                        Feb 15
                                    </span>
                                </div>
                            </li>
                        </ul>
                    </div>

                    <div class="col-sm-6 col-lg-4 p-b-20">
                        <div class="size-h-3 flex-s-c">
                            <h5 class="f1-m-7 cl0">
                                Category
                            </h5>
                        </div>

                        <ul class="m-t--12">
                            <li class="how-bor1 p-rl-5 p-tb-10">
                                <a href="#" class="f1-s-5 cl11 hov-cl10 trans-03 p-tb-8">
                                    Fashion (22)
                                </a>
                            </li>

                            <li class="how-bor1 p-rl-5 p-tb-10">
                                <a href="#" class="f1-s-5 cl11 hov-cl10 trans-03 p-tb-8">
                                    Technology (29)
                                </a>
                            </li>

                            <li class="how-bor1 p-rl-5 p-tb-10">
                                <a href="#" class="f1-s-5 cl11 hov-cl10 trans-03 p-tb-8">
                                    Street Style (15)
                                </a>
                            </li>

                            <li class="how-bor1 p-rl-5 p-tb-10">
                                <a href="#" class="f1-s-5 cl11 hov-cl10 trans-03 p-tb-8">
                                    Life Style (28)
                                </a>
                            </li>

                            <li class="how-bor1 p-rl-5 p-tb-10">
                                <a href="#" class="f1-s-5 cl11 hov-cl10 trans-03 p-tb-8">
                                    DIY & Crafts (16)
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
                    Copyright © 2018

                    <a href="#" class="f1-s-1 cl10 hov-link1">
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Copyright &copy;
                        <script>
                            document.write(new Date().getFullYear());
                        </script> All rights reserved | This template is made with <i
                            class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com"
                            target="_blank">Colorlib</a>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
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

    <!-- Modal Video 01-->
    <div class="modal fade" id="modal-video-01" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document" data-dismiss="modal">
            <div class="close-mo-video-01 trans-0-4" data-dismiss="modal" aria-label="Close">&times;</div>

            <div class="wrap-video-mo-01">
                <div class="video-mo-01">
                    <iframe src="https://www.youtube.com/embed/wJnBTPUQS5A?rel=0" allowfullscreen></iframe>
                </div>
            </div>
        </div>
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

</body>

</html>
