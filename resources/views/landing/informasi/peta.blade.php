@extends('landing.layout')
@section('content')
    <!-- Breadcrumb -->
    <div class="container">
        <div class="headline bg0 flex-wr-sb-c p-tb-8">
            <div class="f2-s-1 p-r-30 m-tb-6">
                <a href="{{ url('/') }}" class="breadcrumb-item f1-s-3 cl9">
                    Home
                </a>

                <a href="#" class="breadcrumb-item f1-s-3 cl9">
                    Profil
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
                            Profil Kel. Ujung Sabbang
                        </a>

                        <h3 class="f1-l-3 cl2 p-t-20 respon2">
                            {{ $title }}
                        </h3>

                        <hr>

                        <div>
                            @if($target == 'peta-lokasi-desa')
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d11195.980936276908!2d119.6244016292835!3d-4.003865364347877!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2d95bb208f7b8ec9%3A0x1cb3b51f736846e9!2sUjung%20Sabbang%2C%20Kec.%20Ujung%2C%20Kota%20Parepare%2C%20Sulawesi%20Selatan!5e1!3m2!1sid!2sid!4v1767790653008!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                            @else
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3404.824770420205!2d119.62025817420594!3d-4.006209344646841!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2d95bb20dd444f57%3A0xb7935a727e1e2e6c!2sKantor%20Kelurahan%20Ujung%20Sabbang!5e1!3m2!1sid!2sid!4v1767791029908!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
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
        $('#nav-profil').addClass('main-menu-active');
        $(document).find('title').text('{{ $title }} - Kel. Ujung Sabbang')
    </script>
@endsection
