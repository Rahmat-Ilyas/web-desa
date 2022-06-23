@extends('landing.layout')
@section('content')
    @php
    $aparat = new App\Models\Aparatur();
    $data = $aparat->orderByRaw("FIELD(jabatan, 'Kepala Desa', 'Sekretaris Desa', 'Kaur Umum', 'Kaur Keuangan', 'Kaur Perencanaan', 'Kasi Kesejahteraan') ASC")->get();
    $foto_info = new App\Models\FotoInformasi();
    $foto_struktur = $foto_info->where('jenis', 'struktur_pemdes')->first();
    @endphp
    <!-- Breadcrumb -->
    <div class="container">
        <div class="headline bg0 flex-wr-sb-c p-tb-8">
            <div class="f2-s-1 p-r-30 m-tb-6">
                <a href="{{ url('/') }}" class="breadcrumb-item f1-s-3 cl9">
                    Home
                </a>
                <span class="breadcrumb-item f1-s-3 cl9">
                    Aparatur Desa
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
            <div class="col-lg-12 p-b-30">
                <div class="p-r-10 p-r-0-sr991">
                    <!-- Blog Detail -->
                    <div class="p-b-20">
                        <a href="#" class="f1-s-10 cl2 hov-cl10 trans-03 text-uppercase">
                            Aparatur Desa
                        </a>
                        <h3 class="f1-l-3 cl2 p-t-20 respon2">
                            Daftar Aparatur Desa Rante Angin
                        </h3>

                        <hr>

                        <div class="row">
                            @foreach ($data as $i => $dta)
                                <div class="col-sm-3 mb-4">
                                    <div class="card shadow shadow-lg">
                                        <div class="card-body p-0">
                                            <a href="{{ url('aparatur/'.strtolower(str_replace(' ', '-', $dta->nama).'-uid0'.$dta->id)) }}" class="hov1 trans-03" style="width: 100%">
                                                <div class="bg-img1 size-a-5 how1 pos-relative"
                                                    style="background-image: url({{ asset('images/aparatur/' . $dta->foto) }}); height: 300px;">
                                                    <div class="flex-col-e-s s-full p-rl-25 p-tb-20">
                                                        <h2 class="how1-child2 m-t-10 text-white">
                                                            <b
                                                                style="text-shadow: black 0.1em 0.1em 0.2em;">{{ strtoupper($dta->nama) }}</b>
                                                        </h2>
                                                        <small
                                                            class="dis-block how1-child2 cl0 bo-all-1 bocl1 bg1 p-rl-5 p-tb-2">
                                                            <b>{{ strtoupper($dta->jabatan) }}</b>
                                                        </small>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        @if ($foto_struktur->foto)
                            <div class="row">
                                <div class="col-sm-12 m-b-20 m-t-40">
                                    <div class="tab01 p-b-20">
                                        <div class="tab01-head how2 how2-cl4 bocl12 flex-s-c m-r-10 m-r-0-sr991">
                                            <!-- Brand tab -->
                                            <h3 class="f1-m-2 cl3 tab01-title">
                                                Struktur Pemerintah Desa Rante Angin
                                            </h3>
                                        </div>
                                        <!-- Tab panes -->
                                        <div class="tab-content p-t-10">
                                            <div class="row">
                                                <a href="{{ asset('images/foto_informasi/' . $foto_struktur->foto) }}" class="col-sm-12 p-r-25 p-r-15-sr991" target="_blank">
                                                    <div class="m-b-30">
                                                        <div class="wrap-pic-w hov1 trans-03">
                                                            <img src="{{ asset('images/foto_informasi/' . $foto_struktur->foto) }}"
                                                                alt="IMG">
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                        <hr>

                        <!-- Tag -->
                        {{-- <div class="flex-s-s p-t-12 p-b-15">
                            <span class="f1-s-12 cl5 m-r-8">
                                Tags:
                            </span>

                            <div class="flex-wr-s-s size-w-0">
                                <a href="#" class="f1-s-12 cl8 hov-link1 m-r-15">
                                    Streetstyle
                                </a>

                                <a href="#" class="f1-s-12 cl8 hov-link1 m-r-15">
                                    Crafts
                                </a>
                            </div>
                        </div> --}}

                        <!-- Share -->
                        <div class="flex-s-s">
                            <span class="f1-s-12 cl5 p-t-1 m-r-15">
                                Share:
                            </span>

                            <div class="flex-wr-s-s size-w-0">
                                <a href="https://api.whatsapp.com/send?text={{ 'Aparatur Desa - Desa Rante Angin ' . url()->current() }}"
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

                                <a href="https://twitter.com/intent/tweet?text={{ 'Aparatur Desa - Desa Rante Angin ' . url()->current() }}"
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
        $('#nav-aparatur').addClass('main-menu-active');
        $(document).find('title').text('Aparatur Desa - Desa Rante Angin')
    </script>
@endsection
