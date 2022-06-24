@extends('landing.layout')
@section('content')
    @php
    $postingan = new App\Models\Postingan();
    // Berita Terkini
    $berita_terkini = $postingan
        ->where('kategori', 'Berita')
        ->orderBy('id', 'desc')
        ->limit(3)
        ->get();

    // Post Utama
    $post_utama = $postingan
        ->orderBy('utama', 'desc')
        ->orderBy('id', 'desc')
        ->limit(4)
        ->get();

    // Post Terkini
    $post_terkini = $postingan
        ->orderBy('id', 'desc')
        ->limit(4)
        ->get();

    // Post Populer
    $post_populer = $postingan
        ->orderBy('view', 'desc')
        ->orderBy('id', 'desc')
        ->limit(6)
        ->get();

    // Galeri
    $get_galeri = new App\Models\Galeri();
    $galeri = $get_galeri
        ->orderBy('id', 'desc')
        ->limit(5)
        ->get();
    $galeri_first = $get_galeri->orderBy('id', 'desc')->first();
    $foto_info = new App\Models\FotoInformasi();
    $foto_anggaran = $foto_info->where('jenis', 'anggaran')->first();
    $foto_struktur = $foto_info->where('jenis', 'struktur_pemdes')->first();
    @endphp
    <!-- Headline -->
    <div class="container">
        <div class="bg0 flex-wr-sb-c p-rl-20 p-tb-8">
            <div class="f2-s-1 p-r-30 size-w-0 m-tb-6 flex-wr-s-c">
                <span class="bage badge-success text-white px-2">
                    <b>BERITA TERKINI</b>
                </span>
                &nbsp;&nbsp;
                <span class="dis-inline-block cl6 slide100-txt pos-relative size-w-0" data-in="fadeInDown"
                    data-out="fadeOutDown">
                    @foreach ($berita_terkini as $brt)
                        <span class="dis-inline-block slide100-txt-item animated visible-false">
                            <a href="{{ url('post/' . $brt->slug) }}"
                                class="f1-s-5 cl3 hov-cl10 trans-03">{{ $brt->judul }}</a>
                        </span>
                    @endforeach
                </span>
            </div>

            @include('landing.search')

        </div>
    </div>

    <!-- Feature post -->
    <section class="bg0">
        <div class="container">
            <div class="row m-rl--1">
                <div class="col-md-6 p-rl-1 p-b-2">
                    @if ($post_utama)
                        @php
                            $kat_first = strtolower(str_replace(' ', '-', $post_utama[0]->kategori));
                            $kat_first = $kat_first == 'berita' ? 'berita-desa' : $kat_first;
                        @endphp
                        <div class="bg-img1 size-a-3 how1 pos-relative"
                            style="background-image: url({{ asset('/images/postingan/sampul/' . $post_utama[0]->foto_sampul) }});">
                            <a href="{{ url('post/' . $post_utama[0]->slug) }}"
                                class="dis-block how1-child1 trans-03"></a>

                            <div class="flex-col-e-s s-full p-rl-25 p-tb-20">
                                <a href="{{ url('postingan/' . $kat_first) }}"
                                    class="dis-block how1-child2 f1-s-2 cl0 bo-all-1 bocl0 hov-btn1 trans-03 p-rl-5 p-t-2">
                                    {{ $post_utama[0]->kategori }}
                                </a>

                                <h3 class="how1-child2 m-t-14 m-b-10">
                                    <a href="{{ url('post/' . $post_utama[0]->slug) }}"
                                        class="how-txt1 size-a-6 f1-l-1 cl0 hov-cl10 trans-03">
                                        {{ $post_utama[0]->judul }}
                                    </a>
                                </h3>

                                <span class="how1-child2">
                                    <span class="f1-s-4 cl11">
                                        {{ $post_utama[0]->admin->nama }}
                                    </span>

                                    <span class="f1-s-3 cl11 m-rl-3">
                                        -
                                    </span>

                                    <span class="f1-s-3 cl11">
                                        {{ date('d M', strtotime($post_utama[0]->created_at)) }}
                                    </span>
                                </span>
                            </div>
                        </div>
                    @endif
                </div>

                <div class="col-md-6 p-rl-1">
                    <div class="row m-rl--1">
                        @foreach ($post_utama as $i => $dta)
                            @php
                                $this_kat = strtolower(str_replace(' ', '-', $post_utama[0]->kategori));
                                $this_kat = $this_kat == 'berita' ? 'berita-desa' : $this_kat;
                            @endphp
                            @if ($i != 0)
                                <div class="{{ $i == 1 ? 'col-12' : 'col-6' }} p-rl-1 p-b-2">
                                    <div class="bg-img1 {{ $i == 1 ? 'size-a-4' : 'size-a-5' }} how1 pos-relative"
                                        style="background-image: url({{ asset('/images/postingan/sampul/' . $dta->foto_sampul) }});">
                                        <a href="{{ url('post/' . $dta->slug) }}"
                                            class="dis-block how1-child1 trans-03"></a>

                                        <div class="flex-col-e-s s-full p-rl-25 p-tb-24">
                                            <a href="{{ url('postingan/' . $this_kat) }}"
                                                class="dis-block how1-child2 f1-s-2 cl0 bo-all-1 bocl0 hov-btn1 trans-03 p-rl-5 p-t-2">
                                                {{ $dta->kategori }}
                                            </a>

                                            <h3 class="how1-child2 m-t-14">
                                                <a href="{{ url('post/' . $dta->slug) }}"
                                                    class="how-txt1 size-a-7 f1-l-2 cl0 hov-cl10 trans-03">
                                                    {{ $dta->judul }}
                                                </a>
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Post -->
    <section class="bg0 p-t-70">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10 col-lg-8">
                    <div class="p-b-20">
                        <!-- Post Terkini -->
                        <div class="tab01 p-b-20">
                            <div class="tab01-head how2 how2-cl1 bocl12 flex-s-c m-r-10 m-r-0-sr991">
                                <!-- Brand tab -->
                                <h3 class="f1-m-2 cl12 tab01-title">
                                    Post Terkini
                                </h3>
                            </div>


                            <!-- Tab panes -->
                            <div class="tab-content p-t-35">
                                <div class="row">
                                    <div class="col-sm-6 p-r-25 p-r-15-sr991">
                                        @if ($post_terkini)
                                            @php
                                                $kat_first = strtolower(str_replace(' ', '-', $post_terkini[0]->kategori));
                                                $kat_first = $kat_first == 'berita' ? 'berita-desa' : $kat_first;
                                            @endphp
                                            <!-- Item post -->
                                            <div class="m-b-30">
                                                <a href="{{ url('post/' . $post_terkini[0]->slug) }}"
                                                    class="wrap-pic-w hov1 trans-03">
                                                    <img src="{{ asset('/images/postingan/sampul/' . $post_terkini[0]->foto_sampul) }}"
                                                        alt="IMG">
                                                </a>

                                                <div class="p-t-20">
                                                    <h5 class="p-b-5">
                                                        <a href="{{ url('post/' . $post_terkini[0]->slug) }}"
                                                            class="f1-m-3 cl2 hov-cl10 trans-03">
                                                            {{ $post_terkini[0]->judul }}
                                                        </a>
                                                    </h5>

                                                    <span class="cl8">
                                                        <a href="{{ url('postingan/' . $kat_first) }}"
                                                            class="f1-s-4 cl8 hov-cl10 trans-03">
                                                            {{ $post_terkini[0]->kategori }}
                                                        </a>

                                                        <span class="f1-s-3 m-rl-3">
                                                            -
                                                        </span>

                                                        <span class="f1-s-3">
                                                            {{ date('d M', strtotime($post_terkini[0]->created_at)) }}
                                                        </span>
                                                    </span>
                                                </div>
                                            </div>
                                        @endif
                                    </div>

                                    <div class="col-sm-6 p-r-25 p-r-15-sr991">
                                        @foreach ($post_terkini as $i => $dta)
                                            @php
                                                $this_kat = strtolower(str_replace(' ', '-', $post_terkini[0]->kategori));
                                                $this_kat = $this_kat == 'berita' ? 'berita-desa' : $this_kat;
                                            @endphp
                                            @if ($i != 0)
                                                <!-- Item post -->
                                                <div class="flex-wr-sb-s m-b-30">
                                                    <a href="{{ url('post/' . $dta->slug) }}"
                                                        class="size-w-1 wrap-pic-w hov1 trans-03">
                                                        <img src="{{ asset('/images/postingan/sampul/' . $dta->foto_sampul) }}"
                                                            alt="{{ $dta->judul }}">
                                                    </a>

                                                    <div class="size-w-2">
                                                        <h5 class="p-b-5">
                                                            <a href="{{ url('post/' . $dta->slug) }}"
                                                                class="f1-s-5 cl3 hov-cl10 trans-03">
                                                                {{ $dta->judul }}
                                                            </a>
                                                        </h5>

                                                        <span class="cl8">
                                                            <a href="{{ url('postingan/' . $this_kat) }}"
                                                                class="f1-s-6 cl8 hov-cl10 trans-03">
                                                                {{ $dta->kategori }}
                                                            </a>

                                                            <span class="f1-s-3 m-rl-3">
                                                                -
                                                            </span>

                                                            <span class="f1-s-3">
                                                                {{ date('d M', strtotime($dta->created_at)) }}
                                                            </span>
                                                        </span>
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Post Utama -->
                        <div class="tab01 p-b-20">
                            <div class="tab01-head how2 how2-cl2 bocl12 flex-s-c m-r-10 m-r-0-sr991">
                                <!-- Brand tab -->
                                <h3 class="f1-m-2 cl13 tab01-title">
                                    Post Utama
                                </h3>
                            </div>


                            <!-- Tab panes -->
                            <div class="tab-content p-t-35">
                                <div class="row">
                                    <div class="col-sm-6 p-r-25 p-r-15-sr991">
                                        @if ($post_utama)
                                            @php
                                                $kat_first = strtolower(str_replace(' ', '-', $post_utama[0]->kategori));
                                                $kat_first = $kat_first == 'berita' ? 'berita-desa' : $kat_first;
                                            @endphp
                                            <!-- Item post -->
                                            <div class="m-b-30">
                                                <a href="{{ url('post/' . $post_utama[0]->slug) }}"
                                                    class="wrap-pic-w hov1 trans-03">
                                                    <img src="{{ asset('/images/postingan/sampul/' . $post_utama[0]->foto_sampul) }}"
                                                        alt="IMG">
                                                </a>

                                                <div class="p-t-20">
                                                    <h5 class="p-b-5">
                                                        <a href="{{ url('post/' . $post_utama[0]->slug) }}"
                                                            class="f1-m-3 cl2 hov-cl10 trans-03">
                                                            {{ $post_utama[0]->judul }}
                                                        </a>
                                                    </h5>

                                                    <span class="cl8">
                                                        <a href="{{ url('postingan/' . $kat_first) }}"
                                                            class="f1-s-4 cl8 hov-cl10 trans-03">
                                                            {{ $post_utama[0]->kategori }}
                                                        </a>

                                                        <span class="f1-s-3 m-rl-3">
                                                            -
                                                        </span>

                                                        <span class="f1-s-3">
                                                            {{ date('d M', strtotime($post_utama[0]->created_at)) }}
                                                        </span>
                                                    </span>
                                                </div>
                                            </div>
                                        @endif
                                    </div>

                                    <div class="col-sm-6 p-r-25 p-r-15-sr991">
                                        @foreach ($post_utama as $i => $dta)
                                            @php
                                                $this_kat = strtolower(str_replace(' ', '-', $post_utama[0]->kategori));
                                                $this_kat = $this_kat == 'berita' ? 'berita-desa' : $this_kat;
                                            @endphp
                                            @if ($i != 0)
                                                <!-- Item post -->
                                                <div class="flex-wr-sb-s m-b-30">
                                                    <a href="{{ url('post/' . $dta->slug) }}"
                                                        class="size-w-1 wrap-pic-w hov1 trans-03">
                                                        <img src="{{ asset('/images/postingan/sampul/' . $dta->foto_sampul) }}"
                                                            alt="{{ $dta->judul }}">
                                                    </a>

                                                    <div class="size-w-2">
                                                        <h5 class="p-b-5">
                                                            <a href="{{ url('post/' . $dta->slug) }}"
                                                                class="f1-s-5 cl3 hov-cl10 trans-03">
                                                                {{ $dta->judul }}
                                                            </a>
                                                        </h5>

                                                        <span class="cl8">
                                                            <a href="{{ url('postingan/' . $this_kat) }}"
                                                                class="f1-s-6 cl8 hov-cl10 trans-03">
                                                                {{ $dta->kategori }}
                                                            </a>

                                                            <span class="f1-s-3 m-rl-3">
                                                                -
                                                            </span>

                                                            <span class="f1-s-3">
                                                                {{ date('d M', strtotime($dta->created_at)) }}
                                                            </span>
                                                        </span>
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Post Populer -->
                        <div class="tab01 p-b-20">
                            <div class="tab01-head how2 how2-cl3 bocl12 flex-s-c m-r-10 m-r-0-sr991">
                                <!-- Brand tab -->
                                <h3 class="f1-m-2 cl14 tab01-title">
                                    Post Populer
                                </h3>
                            </div>


                            <!-- Tab panes -->
                            <div class="tab-content p-t-35">
                                <div class="row">
                                    <div class="col-sm-6 p-r-25 p-r-15-sr991">
                                        @if ($post_populer)
                                            @php
                                                $kat_first = strtolower(str_replace(' ', '-', $post_populer[0]->kategori));
                                                $kat_first = $kat_first == 'berita' ? 'berita-desa' : $kat_first;
                                            @endphp
                                            <!-- Item post -->
                                            <div class="m-b-30">
                                                <a href="{{ url('post/' . $post_populer[0]->slug) }}"
                                                    class="wrap-pic-w hov1 trans-03">
                                                    <img src="{{ asset('/images/postingan/sampul/' . $post_populer[0]->foto_sampul) }}"
                                                        alt="IMG">
                                                </a>

                                                <div class="p-t-20">
                                                    <h5 class="p-b-5">
                                                        <a href="{{ url('post/' . $post_populer[0]->slug) }}"
                                                            class="f1-m-3 cl2 hov-cl10 trans-03">
                                                            {{ $post_populer[0]->judul }}
                                                        </a>
                                                    </h5>

                                                    <span class="cl8">
                                                        <a href="{{ url('postingan/' . $kat_first) }}"
                                                            class="f1-s-4 cl8 hov-cl10 trans-03">
                                                            {{ $post_populer[0]->kategori }}
                                                        </a>

                                                        <span class="f1-s-3 m-rl-3">
                                                            -
                                                        </span>

                                                        <span class="f1-s-3">
                                                            {{ date('d M', strtotime($post_populer[0]->created_at)) }}
                                                        </span>

                                                        <span class="m-rl-3">|</span>

                                                        <span class="f1-s-3 cl8 m-r-15">
                                                            {{ $post_populer[0]->view }} Views
                                                        </span>
                                                    </span>
                                                </div>
                                            </div>
                                        @endif
                                    </div>

                                    <div class="col-sm-6 p-r-25 p-r-15-sr991">
                                        @foreach ($post_populer as $i => $dta)
                                            @php
                                                $this_kat = strtolower(str_replace(' ', '-', $post_populer[0]->kategori));
                                                $this_kat = $this_kat == 'berita' ? 'berita-desa' : $this_kat;
                                            @endphp
                                            @if ($i != 0)
                                                <!-- Item post -->
                                                <div class="flex-wr-sb-s m-b-30">
                                                    <a href="{{ url('post/' . $dta->slug) }}"
                                                        class="size-w-1 wrap-pic-w hov1 trans-03">
                                                        <img src="{{ asset('/images/postingan/sampul/' . $dta->foto_sampul) }}"
                                                            alt="{{ $dta->judul }}">
                                                    </a>

                                                    <div class="size-w-2">
                                                        <h5 class="p-b-5">
                                                            <a href="{{ url('post/' . $dta->slug) }}"
                                                                class="f1-s-5 cl3 hov-cl10 trans-03">
                                                                {{ $dta->judul }}
                                                            </a>
                                                        </h5>

                                                        <span class="cl8">
                                                            <a href="{{ url('postingan/' . $this_kat) }}"
                                                                class="f1-s-6 cl8 hov-cl10 trans-03">
                                                                {{ $dta->kategori }}
                                                            </a>

                                                            <span class="f1-s-3 m-rl-3">
                                                                -
                                                            </span>

                                                            <span class="f1-s-3">
                                                                {{ date('d M', strtotime($dta->created_at)) }}
                                                            </span>

                                                            <span class="m-rl-3">|</span>

                                                            <span class="f1-s-3">
                                                                {{ $dta->view }} Views
                                                            </span>
                                                        </span>
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>

                        @if ($foto_anggaran->foto || $foto_struktur->foto)
                            <div class="tab01 p-b-20">
                                <div class="tab01-head how2 how2-cl5 bocl12 flex-s-c m-r-10 m-r-0-sr991">
                                    <!-- Brand tab -->
                                    <h3 class="f1-m-2 cl17 tab01-title">
                                        APBDES & Struktur PEMDES
                                    </h3>

                                    <!-- Nav tabs -->
                                    <ul class="nav nav-tabs" role="tablist">
                                        @if ($foto_anggaran->foto)
                                            <li class="nav-item">
                                                <a class="nav-link active" data-toggle="tab" href="#tab1-1"
                                                    role="tab">Realisai APBDES</a>
                                            </li>
                                        @endif

                                        @if ($foto_struktur->foto)
                                            <li class="nav-item">
                                                <a class="nav-link {{ !$foto_anggaran->foto ? 'active' : '' }}"
                                                    data-toggle="tab" href="#tab1-2" role="tab">Struktur Pemerintah
                                                    Desa</a>
                                            </li>
                                        @endif
                                    </ul>
                                </div>


                                <!-- Tab panes -->
                                <div class="tab-content p-t-15">
                                    <!-- - -->
                                    @if ($foto_anggaran->foto)
                                        <div class="tab-pane fade show active" id="tab1-1" role="tabpanel">
                                            <div class="row">
                                                <a href="{{ asset('images/foto_informasi/' . $foto_anggaran->foto) }}"
                                                    target="_blank" class="col-sm-12 p-r-25 p-r-15-sr991">
                                                    <div class="m-b-30">
                                                        <div class="wrap-pic-w hov1 trans-03">
                                                            <img src="{{ asset('images/foto_informasi/' . $foto_anggaran->foto) }}"
                                                                alt="IMG">
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    @endif

                                    <!-- - -->
                                    @if ($foto_struktur->foto)
                                        <div class="tab-pane fade {{ !$foto_anggaran->foto ? 'show active' : '' }}"
                                            id="tab1-2" role="tabpanel">
                                            <div class="row">
                                                <a href="{{ asset('images/foto_informasi/' . $foto_struktur->foto) }}"
                                                    class="col-sm-12 p-r-25 p-r-15-sr991" target="_blank">
                                                    <div class="m-b-30">
                                                        <div class="wrap-pic-w hov1 trans-03">
                                                            <img src="{{ asset('images/foto_informasi/' . $foto_struktur->foto) }}"
                                                                alt="IMG">
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="col-md-10 col-lg-4">
                    @include('landing.sidebar1')
                </div>
            </div>
        </div>
    </section>

    <!-- Galeri heading -->
    <section class="pt-5" style="background-color: #EFF2F6">
        <div class="container p-t-4 p-b-40">
            <h2 class="f1-l-1 cl2">
                GALLERY FOTO
            </h2>
        </div>
    </section>

    <!-- Galeri -->
    <section class="pb-5" style="background-color: #EFF2F6">
        <div class="container">
            <div class="row m-rl--1">
                <div class="col-md-6 p-rl-1 p-b-2">
                    @if ($galeri_first)
                        <div class="bg-img1 size-a-3 how1 pos-relative"
                            style="background-image: url({{ asset('images/galeri/' . $galeri_first->konten_galeri[0]->foto) }});">
                            <a href="{{ url('galeri/' . strtolower(str_replace(' ', '-', $galeri_first->judul) . '-uid0' . $galeri_first->id)) }}"
                                class="dis-block how1-child1 trans-03"></a>

                            <div class="flex-col-e-s s-full p-rl-25 p-tb-20">
                                <span
                                    class="dis-block how1-child2 f1-s-2 cl0 bo-all-1 bocl0 hov-btn1 trans-03 p-rl-5 p-t-2">
                                    {{ count($galeri_first->konten_galeri) }} Gambar
                                </span>

                                <h3 class="how1-child2 m-t-14 m-b-10">
                                    <a href="{{ url('galeri/' . strtolower(str_replace(' ', '-', $galeri_first->judul) . '-uid0' . $galeri_first->id)) }}"
                                        class="how-txt1 size-a-6 f1-l-1 cl0 hov-cl10 trans-03">
                                        {{ $galeri_first->judul }}
                                    </a>
                                </h3>

                                {{-- <span class="how1-child2">
                                <span class="f1-s-4 cl11">
                                    {{ $galeri_first->view }} Dilihat
                                </span>

                                <span class="f1-s-3 cl11 m-rl-3">
                                    -
                                </span>

                                <span class="f1-s-3 cl11">
                                    {{ date('d M', strtotime($galeri_first->created_at)) }}
                                </span>
                            </span> --}}
                            </div>
                        </div>
                    @endif
                </div>

                <div class="col-md-6 p-rl-1">
                    <div class="row m-rl--1">
                        @foreach ($galeri as $i => $dta)
                            @if ($i != 0)
                                <div class="col-sm-6 p-rl-1 p-b-2">
                                    <div class="bg-img1 size-a-14 how1 pos-relative"
                                        style="background-image: url({{ asset('images/galeri/' . $dta->konten_galeri[0]->foto) }});">
                                        <a href="{{ url('galeri/' . strtolower(str_replace(' ', '-', $dta->judul) . '-uid0' . $dta->id)) }}"
                                            class="dis-block how1-child1 trans-03"></a>

                                        <div class="flex-col-e-s s-full p-rl-25 p-tb-20">
                                            <span
                                                class="dis-block how1-child2 f1-s-2 cl0 bo-all-1 bocl0 hov-btn1 trans-03 p-rl-5 p-t-2">
                                                {{ count($dta->konten_galeri) }} Gambar
                                            </span>

                                            <h3 class="how1-child2 m-t-14">
                                                <a href="{{ url('galeri/' . strtolower(str_replace(' ', '-', $dta->judul) . '-uid0' . $dta->id)) }}"
                                                    class="how-txt2 size-h-1 f1-m-1 cl0 hov-cl10 trans-03">
                                                    {{ $dta->judul }}
                                                </a>
                                            </h3>

                                            {{-- <span class="how1-child2">
                                                <span class="f1-s-4 cl11">
                                                    {{ $galeri_first->view }} Dilihat
                                                </span>

                                                <span class="f1-s-3 cl11 m-rl-3">
                                                    -
                                                </span>

                                                <span class="f1-s-3 cl11">
                                                    {{ date('d M', strtotime($dta->created_at)) }}
                                                </span>
                                            </span> --}}
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="text-right mt-3">
                <a href="{{ url('galeri') }}" class="f1-s-1 cl9 hov-cl10 trans-03">
                    Lihat Semua
                    <i class="m-l-2 fa fa-long-arrow-alt-right"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- Latest -->
    <section class="bg0 p-t-60 p-b-35">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10 col-lg-8 p-b-20">
                    <div class="how2 how2-cl4 flex-s-c m-r-10 m-r-0-sr991">
                        <h3 class="f1-m-2 cl3 tab01-title">
                            Hubungi Kami
                        </h3>
                    </div>

                    <div class="row p-t-35">
                        <div class="col-sm-6 p-r-25 p-r-15-sr991">
                            <!-- Item latest -->
                            <div class="m-b-45">
                                <a href="blog-detail-01.html" class="wrap-pic-w hov1 trans-03">
                                    <img src="{{ asset('assets/images/latest-01.jpg') }}" alt="IMG">
                                </a>

                                <div class="p-t-16">
                                    <h5 class="p-b-5">
                                        <a href="blog-detail-01.html" class="f1-m-3 cl2 hov-cl10 trans-03">
                                            You wish lorem ipsum dolor sit amet consectetur
                                        </a>
                                    </h5>

                                    <span class="cl8">
                                        <a href="#" class="f1-s-4 cl8 hov-cl10 trans-03">
                                            by John Alvarado
                                        </a>

                                        <span class="f1-s-3 m-rl-3">
                                            -
                                        </span>

                                        <span class="f1-s-3">
                                            Feb 18
                                        </span>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 p-r-25 p-r-15-sr991">
                            <!-- Item latest -->
                            <div class="m-b-45">
                                <a href="blog-detail-01.html" class="wrap-pic-w hov1 trans-03">
                                    <img src="{{ asset('assets/images/latest-02.jpg') }}" alt="IMG">
                                </a>

                                <div class="p-t-16">
                                    <h5 class="p-b-5">
                                        <a href="blog-detail-01.html" class="f1-m-3 cl2 hov-cl10 trans-03">
                                            You wish lorem ipsum dolor sit amet consectetur
                                        </a>
                                    </h5>

                                    <span class="cl8">
                                        <a href="#" class="f1-s-4 cl8 hov-cl10 trans-03">
                                            by John Alvarado
                                        </a>

                                        <span class="f1-s-3 m-rl-3">
                                            -
                                        </span>

                                        <span class="f1-s-3">
                                            Feb 16
                                        </span>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 p-r-25 p-r-15-sr991">
                            <!-- Item latest -->
                            <div class="m-b-45">
                                <a href="blog-detail-01.html" class="wrap-pic-w hov1 trans-03">
                                    <img src="{{ asset('assets/images/latest-03.jpg') }}" alt="IMG">
                                </a>

                                <div class="p-t-16">
                                    <h5 class="p-b-5">
                                        <a href="blog-detail-01.html" class="f1-m-3 cl2 hov-cl10 trans-03">
                                            You wish lorem ipsum dolor sit amet consectetur
                                        </a>
                                    </h5>

                                    <span class="cl8">
                                        <a href="#" class="f1-s-4 cl8 hov-cl10 trans-03">
                                            by John Alvarado
                                        </a>

                                        <span class="f1-s-3 m-rl-3">
                                            -
                                        </span>

                                        <span class="f1-s-3">
                                            Feb 15
                                        </span>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 p-r-25 p-r-15-sr991">
                            <!-- Item latest -->
                            <div class="m-b-45">
                                <a href="blog-detail-01.html" class="wrap-pic-w hov1 trans-03">
                                    <img src="{{ asset('assets/images/latest-04.jpg') }}" alt="IMG">
                                </a>

                                <div class="p-t-16">
                                    <h5 class="p-b-5">
                                        <a href="blog-detail-01.html" class="f1-m-3 cl2 hov-cl10 trans-03">
                                            You wish lorem ipsum dolor sit amet consectetur
                                        </a>
                                    </h5>

                                    <span class="cl8">
                                        <a href="#" class="f1-s-4 cl8 hov-cl10 trans-03">
                                            by John Alvarado
                                        </a>

                                        <span class="f1-s-3 m-rl-3">
                                            -
                                        </span>

                                        <span class="f1-s-3">
                                            Feb 13
                                        </span>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 p-r-25 p-r-15-sr991">
                            <!-- Item latest -->
                            <div class="m-b-45">
                                <a href="blog-detail-01.html" class="wrap-pic-w hov1 trans-03">
                                    <img src="{{ asset('assets/images/latest-05.jpg') }}" alt="IMG">
                                </a>

                                <div class="p-t-16">
                                    <h5 class="p-b-5">
                                        <a href="blog-detail-01.html" class="f1-m-3 cl2 hov-cl10 trans-03">
                                            You wish lorem ipsum dolor sit amet consectetur
                                        </a>
                                    </h5>

                                    <span class="cl8">
                                        <a href="#" class="f1-s-4 cl8 hov-cl10 trans-03">
                                            by John Alvarado
                                        </a>

                                        <span class="f1-s-3 m-rl-3">
                                            -
                                        </span>

                                        <span class="f1-s-3">
                                            Feb 10
                                        </span>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 p-r-25 p-r-15-sr991">
                            <!-- Item latest -->
                            <div class="m-b-45">
                                <a href="blog-detail-01.html" class="wrap-pic-w hov1 trans-03">
                                    <img src="{{ asset('assets/images/latest-06.jpg') }}" alt="IMG">
                                </a>

                                <div class="p-t-16">
                                    <h5 class="p-b-5">
                                        <a href="blog-detail-01.html" class="f1-m-3 cl2 hov-cl10 trans-03">
                                            You wish lorem ipsum dolor sit amet consectetur
                                        </a>
                                    </h5>

                                    <span class="cl8">
                                        <a href="#" class="f1-s-4 cl8 hov-cl10 trans-03">
                                            by John Alvarado
                                        </a>

                                        <span class="f1-s-3 m-rl-3">
                                            -
                                        </span>

                                        <span class="f1-s-3">
                                            Feb 09
                                        </span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-10 col-lg-4">
                    <div class="p-l-10 p-rl-0-sr991 p-b-20">
                        <!-- Video -->
                        <div class="p-b-55">
                            <div class="how2 how2-cl4 flex-s-c m-b-35">
                                <h3 class="f1-m-2 cl3 tab01-title">
                                    Sosial Media
                                </h3>
                            </div>
                            <ul class="p-t-0">
                                <li class="flex-wr-sb-c p-b-20">
                                    <a href="#"
                                        class="size-a-8 flex-c-c borad-3 size-a-8 bg-facebook fs-16 cl0 hov-cl0">
                                        <span class="fab fa-facebook-f"></span>
                                    </a>

                                    <div class="size-w-3 flex-wr-sb-c">
                                        <span class="f1-s-8 cl3 p-r-20">
                                            6879 Fans
                                        </span>

                                        <a href="#" class="f1-s-9 text-uppercase cl3 hov-cl10 trans-03">
                                            Like
                                        </a>
                                    </div>
                                </li>

                                <li class="flex-wr-sb-c p-b-20">
                                    <a href="#"
                                        class="size-a-8 flex-c-c borad-3 size-a-8 bg-twitter fs-16 cl0 hov-cl0">
                                        <span class="fab fa-twitter"></span>
                                    </a>

                                    <div class="size-w-3 flex-wr-sb-c">
                                        <span class="f1-s-8 cl3 p-r-20">
                                            568 Followers
                                        </span>

                                        <a href="#" class="f1-s-9 text-uppercase cl3 hov-cl10 trans-03">
                                            Follow
                                        </a>
                                    </div>
                                </li>

                                <li class="flex-wr-sb-c p-b-20">
                                    <a href="#"
                                        class="size-a-8 flex-c-c borad-3 size-a-8 bg-youtube fs-16 cl0 hov-cl0">
                                        <span class="fab fa-youtube"></span>
                                    </a>

                                    <div class="size-w-3 flex-wr-sb-c">
                                        <span class="f1-s-8 cl3 p-r-20">
                                            5039 Subscribers
                                        </span>

                                        <a href="#" class="f1-s-9 text-uppercase cl3 hov-cl10 trans-03">
                                            Subscribe
                                        </a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('javascript')
    <script>
        $('#nav-home').addClass('main-menu-active');
    </script>
@endsection
