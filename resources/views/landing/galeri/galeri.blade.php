@extends('landing.layout')
@section('content')
    @php
    $galeri = new App\Models\galeri();
    $data = $galeri->orderBy('id', 'desc')->get();
    @endphp
    <!-- Breadcrumb -->
    <div class="container">
        <div class="headline bg0 flex-wr-sb-c p-tb-8">
            <div class="f2-s-1 p-r-30 m-tb-6">
                <a href="{{ url('/') }}" class="breadcrumb-item f1-s-3 cl9">
                    Home
                </a>
                <span class="breadcrumb-item f1-s-3 cl9">
                    Galeri
                </span>
            </div>

            @include('landing.search')
            
        </div>
    </div>

    <!-- Content -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12 p-b-30">
                <div class="p-r-10 p-r-0-sr991">
                    <!-- Blog Detail -->
                    <div class="p-b-20">
                        <a href="#" class="f1-s-10 cl2 hov-cl10 trans-03 text-uppercase">
                            Galeri Desa
                        </a>
                        <h3 class="f1-l-3 cl2 p-t-20 respon2">
                            Galeri Kegiatan Desa Rante Angin
                        </h3>

                        <hr>

                        <div class="row">
                            @foreach ($data as $i => $dta)
                                <div class="col-sm-4 mb-4">
                                    <div class="card shadow shadow-lg">
                                        <div class="card-body p-0">
                                            <a href="{{ url('galeri/' . strtolower(str_replace(' ', '-', $dta->judul) . '-uid0' . $dta->id)) }}"
                                                class="hov1 trans-03" style="width: 100%">
                                                <div class="bg-img1 size-a-5 how1 pos-relative"
                                                    style="background-image: url({{ asset('images/galeri/' . $dta->konten_galeri[0]->foto) }}); height: 300px;">
                                                </div>
                                            </a>
                                        </div>
                                        <div class="card-footer px-3">
                                            <h4 class="how1-child2 m-t-14 m-b-10">
                                                <a href="{{ url('galeri/' . strtolower(str_replace(' ', '-', $dta->judul) . '-uid0' . $dta->id)) }}"
                                                    class="how-txt2 size-a-6 f1-s-5 cl1 hov-cl10 trans-03">
                                                    {{ $dta->judul }}
                                                </a>
                                            </h4>
                                            <hr>
                                            <div class="flex-wr-s-s">
                                                <span class="f1-s-3 cl8 m-r-15">
                                                    <a href="#" class="f1-s-4 cl8 hov-cl10 trans-03">
                                                        by {{ $dta->admin->nama }}
                                                    </a>

                                                    <span class="m-rl-3">|</span>

                                                    <span>
                                                        {{ date('d M Y', strtotime($dta->created_at)) }}
                                                    </span>
                                                </span>

                                                <span class="f1-s-3 cl8 m-r-15">
                                                    {{ count($dta->konten_galeri) }} Photos
                                                    <span class="m-rl-3">|</span>
                                                    {{ $dta->view }} Views
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
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
    <script>
        $('#nav-galeri').addClass('main-menu-active');
        $(document).find('title').text('Galeri Desa - Desa Rante Angin')
    </script>
@endsection
