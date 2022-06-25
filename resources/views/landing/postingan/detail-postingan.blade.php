@extends('landing.layout')
@section('content')
    @php
    $db_data = new App\Models\Postingan();
    $dta = $db_data->where('id', $post->id)->first();
    $dta->view = $dta->view + 1;
    $dta->save();

    $title = $post->judul;
    $kategori = strtolower(str_replace(' ', '-', $post->kategori));
    $kategori = $kategori == 'berita' ? 'berita-desa' : $kategori;
    $tags = explode(',', $post->tags);
    @endphp
    <!-- Breadcrumb -->
    <div class="container">
        <div class="headline bg0 flex-wr-sb-c p-tb-8">
            <div class="f2-s-1 p-r-30 m-tb-6">
                <a href="{{ url('/') }}" class="breadcrumb-item f1-s-3 cl9">
                    Home
                </a>

                <a href="#" class="breadcrumb-item f1-s-3 cl9">
                    Informasi
                </a>

                <a href="{{ url('postingan/' . $kategori) }}" class="breadcrumb-item f1-s-3 cl9">
                    {{ $post->kategori }}
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
                            {{ $post->kategori }}
                        </a>

                        <h3 class="f1-l-3 cl2 p-t-20 respon2">
                            {{ $title }}
                        </h3>

                        <h4 class="f1-l-2 p-t-10 cl2 p-b-16 respon2">
                            {{ $post->topik }}
                        </h4>

                        <div class="flex-wr-s-s p-b-30">
                            <span class="f1-s-3 cl8 m-r-15">
                                <a href="#" class="f1-s-4 cl8 hov-cl10 trans-03">
                                    by {{ $post->admin->nama }}
                                </a>

                                <span class="m-rl-3">|</span>

                                <span>
                                    {{ date('d F Y', strtotime($post->created_at)) }}
                                </span>
                            </span>

                            <span class="f1-s-3 cl8 m-r-15">
                                {{ $post->view }} Views
                            </span>
                        </div>

                        <div class="wrap-pic-max-w p-b-20">
                            <img src="{{ asset('/images/postingan/sampul/' . $dta->foto_sampul) }}"
                                alt="{{ $dta->judul }}" style="width: 100%;">
                        </div>

                        <div class="content-post">
                            {!! $post->konten !!}
                        </div>
                        <hr>

                        <!-- Tag -->
                        <div class="flex-s-s p-t-12 p-b-15">
                            <div class="f1-s-12 cl5 m-r-8">
                                Tags:
                            </div>

                            <div class="flex-wr-s-s m-rl--5">
                                @foreach ($tags as $tag)
                                    <a href="{{ url('postingan/tag/' . str_replace(' ', '-', $tag)) }}"
                                        class="flex-c-c size-s-2 bo-1-rad-20 bocl12 f1-s-1 cl8 hov-btn2 trans-03 p-rl-20 p-tb-5 m-all-5">
                                        {{ $tag }}
                                    </a>
                                @endforeach
                            </div>
                        </div>

                        <!-- Share -->
                        <div class="flex-s-s">
                            <span class="f1-s-12 cl5 p-t-1 m-r-15">
                                Share:
                            </span>

                            <div class="flex-wr-s-s size-w-0">
                                <a href="https://api.whatsapp.com/send?text={{ $title . ' - ' . url()->current() }}"
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

                                <a href="https://twitter.com/intent/tweet?text={{ $title . ' - ' . url()->current() }}"
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
                @include('landing.sidebar2')
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    <script>
        $(document).find('.note-float-left').addClass('mr-2');
        $('.content-post').find('p, span').addClass('f1-s-11 cl6 p-b-25').removeAttr('style');
        $('.content-post').find('h1, h2, h3, h4, h5, h6').removeAttr('style');
        $('#nav-postingan').addClass('main-menu-active');
        $(document).find('title').text('{{ $title }} - Desa Rante Angin')
    </script>
@endsection
