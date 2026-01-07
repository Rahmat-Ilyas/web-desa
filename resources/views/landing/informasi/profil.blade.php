@extends('landing.layout')
@section('content')
    @php
    $db_data = new App\Models\Informasi();
    $dta = $db_data->where('kategori', $data->kategori)->first();
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

                <a href="#" class="breadcrumb-item f1-s-3 cl9">
                    {{ $lembaga ? 'Lembaga' : 'Profil' }}
                </a>

                <span class="breadcrumb-item f1-s-3 cl9">
                    {{ $title }}
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
                            {{ $lembaga ? 'Lembaga' : 'Profil' }} Kel. Ujung Sabbang
                        </a>

                        <h3 class="f1-l-3 cl2 p-b-16 p-t-20 respon2">
                            {{ $title }}
                        </h3>

                        <div class="flex-wr-s-s p-b-30">
                            <span class="f1-s-3 cl8 m-r-15">
                                <a href="#" class="f1-s-4 cl8 hov-cl10 trans-03">
                                    by {{ $data->admin->nama }}
                                </a>

                                <span class="m-rl-3">|</span>

                                <span>
                                    {{ date('d F Y', strtotime($data->created_at)) }}
                                </span>
                            </span>

                            <span class="f1-s-3 cl8 m-r-15">
                                {{ $data->view }} Views
                            </span>
                        </div>

                        <div>
                            @if ($data->konten)
                                <div class="content-post">
                                    {!! $data->konten !!}
                                </div>
                            @else
                                <div class="row">
                                    <div class="col-sm-1 pr-0 pt-2 pl-4">
                                        <h2 class="f1-l-2 text-center"><i class="fa fa-info-circle fa-lg text-info"></i>
                                        </h2>
                                    </div>
                                    <div class="col-sm-11">
                                        <h2 class="f1-l-2"><b>Maaf, Belum ada artikel yang ditulis di halaman ini.</b></h2>
                                        <span>Silahkan kunjungi halaman ini lain waktu</span>
                                    </div>
                                </div>
                            @endif
                        </div>
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
                                <a href="https://api.whatsapp.com/send?text={{ $title . ' - Kel. Ujung Sabbang ' . url()->current() }}"
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

                                <a href="https://twitter.com/intent/tweet?text={{ $title . ' - Kel. Ujung Sabbang ' . url()->current() }}"
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
            <div class="col-md-10 col-lg-4 p-b-30">
                @include('landing.sidebar1')
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    <script>
        $(document).find('.note-float-left').addClass('mr-2');
        $('.content-post').find('p, span').addClass('f1-s-11 cl6 p-b-25').removeAttr('style');
        $('.content-post').find('h1, h2, h3, h4, h5, h6').removeAttr('style');
        @if ($lembaga)
            $('#nav-lembaga').addClass('main-menu-active');
        @else
            $('#nav-profil').addClass('main-menu-active');
        @endif
        $(document).find('title').text('{{ $title }} - Kel. Ujung Sabbang')
    </script>
@endsection
