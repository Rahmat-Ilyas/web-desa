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
                                                $kat_first1 = strtolower(str_replace(' ', '-', $post_terkini[0]->kategori));
                                                $kat_first1 = $kat_first1 == 'berita' ? 'berita-desa' : $kat_first1;
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
                                                        <a href="{{ url('postingan/' . $kat_first1) }}"
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
                                                $this_kat1 = strtolower(str_replace(' ', '-', $dta->kategori));
                                                $this_kat1 = $this_kat1 == 'berita' ? 'berita-desa' : $this_kat1;
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
                                                            <a href="{{ url('postingan/' . $this_kat1) }}"
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
                                                $kat_first2 = strtolower(str_replace(' ', '-', $post_utama[0]->kategori));
                                                $kat_first2 = $kat_first2 == 'berita' ? 'berita-desa' : $kat_first2;
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
                                                        <a href="{{ url('postingan/' . $kat_first2) }}"
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
                                                $this_kat2 = strtolower(str_replace(' ', '-', $dta->kategori));
                                                $this_kat2 = $this_kat2 == 'berita' ? 'berita-desa' : $this_kat2;
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
                                                            <a href="{{ url('postingan/' . $this_kat2) }}"
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
                                                $this_kat = strtolower(str_replace(' ', '-', $dta->kategori));
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

                    <div class="row p-t-20">
                        <div class="col-md-12">
                            <p>Silahkan menghubungi kami melalui private message pada form dibawah ini. Sampaikan informasi,
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
                                                type="text" name="nama" placeholder="Nama" required="">

                                            <input class="bo-1-rad-3 bocl13 size-a-19 f1-s-13 cl5 plh6 p-rl-18 m-b-15"
                                                type="email" name="email" placeholder="Email" required="">

                                            <input class="bo-1-rad-3 bocl13 size-a-19 f1-s-13 cl5 plh6 p-rl-18 m-b-15"
                                                type="text" name="subjek" placeholder="Subjek" required="">

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
                </div>

                <div class="col-md-10 col-lg-4">
                    <div class="p-l-10 p-rl-0-sr991">
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
    </section>
@endsection

@section('javascript')
    <script>
        $(document).ready(function () {
            $('#nav-home').addClass('main-menu-active');
        });
    </script>
@endsection
