@extends('landing.layout')
@section('content')
    @php
    $db_data = new App\Models\Galeri();
    $dta = $db_data->where('id', $gal->id)->first();
    $dta->view = $dta->view + 1;
    $dta->save();
    @endphp
    <!-- Breadcrumb -->
    <div class="container">
        <div class="headline bg0 flex-wr-sb-c p-tb-8">
            <div class="f2-s-1 p-r-30 m-tb-6">
                <a href="{{ url('/') }}" class="breadcrumb-item f1-s-3 cl9">
                    Home
                </a>

                <a href="{{ url('galeri') }}" class="breadcrumb-item f1-s-3 cl9">
                    Galeri Desa
                </a>
                <span class="breadcrumb-item f1-s-3 cl9">
                    {{ $gal->judul }}
                </span>
            </div>

            <div class="pos-relative size-a-2 bo-1-rad-22 of-hidden bocl11 m-tb-6">
                <input class="f1-s-1 cl6 plh9 s-full p-l-25 p-r-45" type="text" name="search" placeholder="Search">
                <button class="flex-c-c size-a-1 ab-t-r fs-20 cl2 hov-cl10 trans-03">
                    <i class="zmdi zmdi-search"></i>
                </button>
            </div>
        </div>
    </div>

    <!-- Content -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 p-b-30">
                <div class="p-r-10 p-r-0-sr991">
                    <!-- Blog Detail -->
                    <div class="p-b-20">
                        <a href="#" class="f1-s-10 cl2 hov-cl10 trans-03 text-uppercase">
                            Galeri Desa
                        </a>

                        <h3 class="f1-l-3 cl2 p-b-16 p-t-20 respon2">
                            {{ $gal->judul }}
                        </h3>

                        <div class="flex-wr-s-s">
                            <span class="f1-s-3 cl8 m-r-15">
                                <a href="#" class="f1-s-4 cl8 hov-cl10 trans-03">
                                    by {{ $gal->admin->nama }}
                                </a>

                                <span class="m-rl-3">|</span>

                                <span>
                                    {{ date('d F Y', strtotime($gal->created_at)) }}
                                </span>
                            </span>

                            <span class="f1-s-3 cl8 m-r-15">
                                {{ $gal->view }} Views
                            </span>
                        </div>

                        <hr>
                        <div>
                            {!! $gal->keterangan !!}
                            <div class="row mt-3">
                                @foreach ($gal->konten_galeri as $i => $dta)
                                    <div class="col-lg-3 col-md-12 mb-4">
                                        <div class="card shadow shadow-lg mb-2">
                                            <div class="card-body p-0">
                                                <a href="{{ asset('images/galeri/' . $dta->foto) }}" class="hov1 trans-03 image-popup"
                                                    style="width: 100%" title="{{ $gal->judul . ' - Foto ' . $i + 1 }}">
                                                    <div class="bg-img1 size-a-5 how1 pos-relative"
                                                        style="background-image: url({{ asset('images/galeri/' . $dta->foto) }}); height: 200px;">
                                                        <div class="flex-col-e-s s-full p-rl-25 p-tb-20">
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                        {{-- <a href="{{ asset('images/galeri/' . $dta->foto) }}" class="image-popup"
                                            title="{{ $gal->judul . ' - Foto ' . $i + 1 }}">
                                            <img src="{{ asset('images/galeri/' . $dta->foto) }}" class="thumb-img"
                                                alt="{{ $gal->judul }}">
                                        </a> --}}
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <hr>

                        <!-- Share -->
                        <div class="flex-s-s">
                            <span class="f1-s-12 cl5 p-t-1 m-r-15">
                                Share:
                            </span>

                            <div class="flex-wr-s-s size-w-0">
                                <a href="https://api.whatsapp.com/send?text={{ 'Galeri Desa - Desa Rante Angin ' . url()->current() }}"
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

                                <a href="https://twitter.com/intent/tweet?text={{ 'Galeri Desa - Desa Rante Angin ' . url()->current() }}"
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
        </div>
    </div>
@endsection

@section('javascript')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/magnific-popup/css/magnific-popup.css') }}">
    <script src="{{ asset('assets/vendor/magnific-popup/js/jquery.magnific-popup.min.js') }}"></script>
    <script>
        $('#nav-galeri').addClass('main-menu-active');
        $(document).find('title').text('Galeri Desa - Desa Rante Angin');

        $(document).ready(function() {
            $('.image-popup').magnificPopup({
                type: 'image',
                closeOnContentClick: true,
                mainClass: 'mfp-fade',
                gallery: {
                    enabled: true,
                    navigateByImgClick: true,
                    preload: [0, 1] // Will preload 0 - before current, and 1 after the current image
                }
            });
        });
    </script>
@endsection
