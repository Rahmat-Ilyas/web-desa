@extends('landing.layout')
@section('content')
    @php
    $files = new App\Models\Files();
    @endphp
    <!-- Breadcrumb -->
    <div class="container">
        <div class="headline bg0 flex-wr-sb-c p-tb-8">
            <div class="f2-s-1 p-r-30 m-tb-6">
                <a href="{{ url('/') }}" class="breadcrumb-item f1-s-3 cl9">
                    Home
                </a>

                <span class="breadcrumb-item f1-s-3 cl9">
                    Kontak
                </span>
            </div>

            @include('landing.search')

        </div>
    </div>

    <!-- Content -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-8 p-b-30">
                <div class="p-r-10 p-r-0-sr991">
                    <!-- Blog Detail -->
                    <div class="p-b-20">
                        <a href="#" class="f1-s-10 cl2 hov-cl10 trans-03 text-uppercase">
                            Kontak
                        </a>

                        <h3 class="f1-l-3 cl2 p-b-16 p-t-20 respon2">
                            Hubungi Kami
                        </h3>
                        <hr>
                        <div class="row p-t-20">
                            <div class="col-md-12">
                                <p>Silahkan menghubungi kami melalui private message pada form dibawah ini. Sampaikan
                                    informasi,
                                    konsultasi, laporan anda kepada kami untuk menigkatkan layanan.</p>
                                <div class="row mt-4">
                                    <div class="col-sm-5">
                                        <div class="d-flex align-items-center mb-3">
                                            <div class="d-flex align-items-center justify-content-center flex-shrink-0 bg-dark"
                                                style="width: 50px; height: 50px;">
                                                <i class="fa fa-map-marker-alt text-white"></i>
                                            </div>
                                            <div class="ml-3">
                                                <h5 class="text-dark f1-l-2">Kantor</h5>
                                                <p class="">Jl. Trans Rante Angin</p>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center mb-3">
                                            <div class="d-flex align-items-center justify-content-center flex-shrink-0 bg-dark"
                                                style="width: 50px; height: 50px;">
                                                <i class="fa fa-phone text-white"></i>
                                            </div>
                                            <div class="ml-3">
                                                <h5 class="text-dark f1-l-2">Telepon</h5>
                                                <p class="mb-0">+6285-3333-41194</p>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <div class="d-flex align-items-center justify-content-center flex-shrink-0 bg-dark"
                                                style="width: 50px; height: 50px;">
                                                <i class="fa fa-envelope-open text-white"></i>
                                            </div>
                                            <div class="ml-3">
                                                <h5 class="text-dark f1-l-2">Email</h5>
                                                <p class="mb-0">kontak@desa-ranteangin.com</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-7">
                                        <h2 class="f1-l-2 cl2">
                                            Kirim Pesan
                                        </h2>
                                        <div class="p-r-10 p-r-0-sr991">
                                            <form method="post" action="{{ url('kontak') }}">
                                                @csrf
                                                <input class="bo-1-rad-3 bocl13 size-a-19 f1-s-13 cl5 plh6 p-rl-18 m-b-15"
                                                    type="text" name="nama" placeholder="Nama*" required="">

                                                <input class="bo-1-rad-3 bocl13 size-a-19 f1-s-13 cl5 plh6 p-rl-18 m-b-15"
                                                    type="email" name="email" placeholder="Email*" required="">

                                                <input class="bo-1-rad-3 bocl13 size-a-19 f1-s-13 cl5 plh6 p-rl-18 m-b-15"
                                                    type="text" name="subjek" placeholder="Subjek">

                                                <textarea class="bo-1-rad-3 bocl13 size-a-15 f1-s-13 cl5 plh6 p-rl-18 p-tb-14 m-b-10" name="pesan"
                                                    placeholder="Masukkan pesan anda" required=""></textarea>

                                                <button type="submit"
                                                    class="size-a-20 bg2 borad-3 f1-s-12 cl0 hov-btn1 trans-03 p-rl-15 m-t-10">
                                                    Kirim
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>

                        <!-- Share -->
                        <div class="flex-s-s">
                            <span class="f1-s-12 cl5 p-t-1 m-r-15">
                                Share:
                            </span>

                            <div class="flex-wr-s-s size-w-0">
                                <a href="https://api.whatsapp.com/send?text={{ 'Kontak - Desa Rante Angin ' . url()->current() }}"
                                    target="_blank"
                                    class="dis-block f1-s-13 cl0 bg-success borad-3 p-tb-4 p-rl-18 hov-btn1 m-r-3 m-b-3 trans-03">
                                    <i class="fab fa-whatsapp m-r-7"></i>
                                    WhatsApp
                                </a>

                                <a href="https://www.facebook.com/sharer.php?u={{ url()->current() }}" target="_blank"
                                    class="dis-block f1-s-13 cl0 bg-facebook borad-3 p-tb-4 p-rl-18 hov-btn1 m-r-3 m-b-3 trans-03">
                                    <i class="fab fa-facebook-f m-r-7"></i>
                                    Facebook
                                </a>

                                <a href="https://twitter.com/intent/tweet?text={{ 'Kontak - Desa Rante Angin ' . url()->current() }}"
                                    target="_blank"
                                    class="dis-block f1-s-13 cl0 bg-twitter borad-3 p-tb-4 p-rl-18 hov-btn1 m-r-3 m-b-3 trans-03">
                                    <i class="fab fa-twitter m-r-7"></i>
                                    Twitter
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            {{-- <div class="col-md-10 col-lg-4 p-b-30">
                @include('landing.sidebar2')
            </div> --}}

            <div class="col-md-10 col-lg-4 p-b-30">
                <div class="p-l-10 p-rl-0-sr991 p-t-70">
                    <!-- Video -->
                    <div class="p-b-20">
                        <div class="how2 how2-cl4 flex-s-c m-b-10">
                            <h3 class="f1-m-2 cl3 tab01-title">
                                Lokasi Kantor Desa
                            </h3>
                        </div>
                        <div>
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3984.983521141167!2d121.58201976642638!3d-2.8209419985552135!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x6eb395308b8b73b3!2zMsKwNDknMTUuNCJTIDEyMcKwMzUnMDEuOSJF!5e0!3m2!1sid!2sid!4v1655729496223!5m2!1sid!2sid"
                                height="500" style="border:0; width: 100%; height: 300px;" allowfullscreen=""
                                loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </div>

                <div class="p-l-10 p-rl-0-sr991 p-b-20">
                    <!-- Video -->
                    <div class="p-b-55">
                        <div class="how2 how2-cl4 flex-s-c m-b-20">
                            <h3 class="f1-m-2 cl3 tab01-title">
                                Sosial Media
                            </h3>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <ul class="p-t-0">
                                    <li class="flex-wr-sb-c p-b-20">
                                        <a href="#"
                                            class="size-a-8 flex-c-c borad-3 size-a-8 bg-facebook fs-16 cl0 hov-cl0">
                                            <span class="fab fa-facebook-f"></span>
                                        </a>

                                        <div class="size-w-3 flex-wr-sb-c">
                                            <span class="f1-s-8 cl3 p-r-20">
                                                <a href="#" class="f1-s-8 cl3 hov-cl10 trans-03">
                                                    Facebook
                                                </a>
                                        </div>
                                    </li>

                                    <li class="flex-wr-sb-c p-b-20">
                                        <a href="#"
                                            class="size-a-8 flex-c-c borad-3 size-a-8 bg-twitter fs-16 cl0 hov-cl0">
                                            <span class="fab fa-twitter"></span>
                                        </a>

                                        <div class="size-w-3 flex-wr-sb-c">
                                            <a href="#" class="f1-s-8 cl3 hov-cl10 trans-03">
                                                Twitter
                                            </a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-sm-6">
                                <ul class="p-t-0">
                                    <li class="flex-wr-sb-c p-b-20">
                                        <a href="#" class="size-a-8 flex-c-c borad-3 size-a-8 fs-16 cl0 hov-cl0"
                                            style="background: #DD2A7B">
                                            <span class="fab fa-instagram"></span>
                                        </a>

                                        <div class="size-w-3 flex-wr-sb-c">
                                            <a href="#" class="f1-s-8 cl3 hov-cl10 trans-03">
                                                Instagram
                                            </a>
                                        </div>
                                    </li>

                                    <li class="flex-wr-sb-c p-b-20">
                                        <a href="#"
                                            class="size-a-8 flex-c-c borad-3 size-a-8 bg-youtube fs-16 cl0 hov-cl0">
                                            <span class="fab fa-youtube"></span>
                                        </a>

                                        <div class="size-w-3 flex-wr-sb-c">
                                            <a href="#" class="f1-s-8 cl3 hov-cl10 trans-03">
                                                Youtube
                                            </a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    <script>
        $('#nav-home').addClass('main-menu-active');
        $(document).find('title').text('Kontak - Desa Rante Angin')
    </script>
@endsection
