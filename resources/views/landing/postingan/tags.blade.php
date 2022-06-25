@extends('landing.layout')
@section('content')
    @php
    $postingan = new App\Models\Postingan();
    $page = request()->get('page') ? request()->get('page') : 1;
    $show = 10;
    $tags = '';
    foreach ($postingan->orderBy('id', 'desc')->get() as $dta) {
        $tags .= $dta->tags . ',';
    }

    $get_tags = [];
    foreach (array_unique(explode(',', $tags)) as $tag) {
        if ($tag != '') {
            $get_tags[] = $tag;
        }
    }
    
    $set_tags_chunk = array_chunk($get_tags, $show);
    $index = $page-1 >= count($set_tags_chunk) ? count($set_tags_chunk)-1 : $page-1;
    $set_tags = $set_tags_chunk[$index];
    @endphp
    <!-- Breadcrumb -->
    <div class="container">
        <div class="headline bg0 flex-wr-sb-c p-tb-8">
            <div class="f2-s-1 p-r-30 m-tb-6">
                <a href="{{ url('/') }}" class="breadcrumb-item f1-s-3 cl9">
                    Home
                </a>

                <a href="#" class="breadcrumb-item f1-s-3 cl9">
                    Postingan
                </a>

                <span class="breadcrumb-item f1-s-3 cl9">
                    Tags
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
                            Tags
                        </a>

                        <h3 class="f1-l-3 cl2 p-b-16 p-t-20 respon2">
                            Tags Postingan
                        </h3>

                        <div class="flex-wr-s-s">
                            @foreach ($set_tags as $tag)
                                <a href="{{ url('postingan/tag/' . str_replace(' ', '-', $tag)) }}" class="f1-s-5 cl3 hov-cl10 trans-03 hov-btn2" style="width: 100%;">
                                    <div class="card shadow shadow-lg mb-3">
                                        <div class="card-body">
                                            <h1>{{ $tag }}</h1>
                                        </div>
                                    </div>
                                </a>
                            @endforeach

                            @if (count($get_tags) > $show)
                                <div class="flex-wr-s-c m-rl--7 p-b-15">
                                    @for ($i = 1; $i <= ceil(count($get_tags) / $show); $i++)
                                        <a href="{{ url('postingan/tags?page='.$i) }}"
                                            class="flex-c-c pagi-item hov-btn1 trans-03 m-all-7 {{ $i == $page ? 'pagi-active' : '' }}">{{ $i }}</a>
                                    @endfor
                                </div>
                            @endif
                        </div>
                        <hr>

                        <!-- Share -->
                        <div class="flex-s-s">
                            <span class="f1-s-12 cl5 p-t-1 m-r-15">
                                Share:
                            </span>

                            <div class="flex-wr-s-s size-w-0">
                                <a href="https://api.whatsapp.com/send?text={{ 'Tags Postingan - Desa Rante Angin ' . url()->current() }}"
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

                                <a href="https://twitter.com/intent/tweet?text={{ 'Tags Postingan - Desa Rante Angin ' . url()->current() }}"
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
        $('#nav-postingan').addClass('main-menu-active');
        $(document).find('title').text('Tags Postingan - Desa Rante Angin')
    </script>
@endsection
