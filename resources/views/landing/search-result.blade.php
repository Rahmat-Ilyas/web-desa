@extends('landing.layout')
@section('content')
    @php
    $keyword = request()->get('keyword');
    $data = new App\Models\Postingan();
    $get = $data->where('tags', 'like', "%{$keyword}%")->orderBy('id', 'desc')->get();
    @endphp
    <!-- Breadcrumb -->
    <div class="container">
        <div class="headline bg0 flex-wr-sb-c p-tb-8">
            <div class="f2-s-1 p-r-30 m-tb-6">
                <a href="{{ url('/') }}" class="breadcrumb-item f1-s-3 cl9">
                    Home
                </a>

                <a href="#" class="breadcrumb-item f1-s-3 cl9">
                    Hasil Pencarian
                </a>
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
                            Hasil Pencarian
                        </a>

                        <h3 class="f1-l-3 cl2 p-b-16 p-t-20 respon2">
                            Hasil Pencarian: <b>{{ $keyword }}</b>
                        </h3>

                        <hr>

                        <div class="p-r-10 p-r-0-sr991">
                            <div class="m-t--20">
                                @foreach ($get as $dta)
                                    <!-- Item post -->
                                    <div class="flex-wr-sb-s p-t-40 p-b-15 how-bor2">
                                        {{-- <a href="blog-detail-02.html"
                                            class="size-w-8 wrap-pic-w hov1 trans-03 w-full-sr575 m-b-25">
                                            <img src="{{ asset('/images/postingan/sampul/' . $dta->foto_sampul) }}"
                                                alt="IMG">
                                        </a> --}}
                                        <a href="{{ url('post/' . $dta->slug) }}"
                                            class="size-w-8 wrap-pic-w hov1 trans-03 w-full-sr575 m-b-25">
                                            <div class="bg-img1 size-a-5 how1 pos-relative"
                                                style="background-image: url({{ asset('/images/postingan/sampul/' . $dta->foto_sampul) }}); height: 200px;">
                                                <div class="flex-col-e-s s-full p-rl-25 p-tb-20">
                                                </div>
                                            </div>
                                        </a>

                                        <div class="size-w-9 w-full-sr575 m-b-25">
                                            <h5 class="p-b-12">
                                                <a href="{{ url('post/' . $dta->slug) }}"
                                                    class="f1-l-1 cl2 hov-cl10 trans-03 respon2">
                                                    {{ $dta->judul }}
                                                </a>
                                            </h5>

                                            <div class="cl8 p-b-18">
                                                <a href="#" class="f1-s-4 cl8 hov-cl10 trans-03">
                                                    by {{ $dta->admin->nama }}
                                                </a>

                                                <span class="f1-s-3 m-rl-3">
                                                    -
                                                </span>

                                                <span class="f1-s-3">
                                                    {{ date('d M', strtotime($dta->created_at)) }}
                                                </span>
                                            </div>

                                            @php
                                                $html = strip_tags(preg_replace('/<img[^>]+\>/i', ' ', $dta->konten));
                                                $konten = str_replace('&nbsp;', ' ', $html);
                                                $konten = substr($konten, 0, 200);
                                            @endphp
                                            <div class="how1-child2 mb-5">
                                                <span class="f1-s-1 p-b-20 how-txt3">
                                                    {{ $konten }}...
                                                </span>
                                            </div>

                                            <a href="{{ url('post/' . $dta->slug) }}"
                                                class="f1-s-1 cl9 hov-cl10 trans-03">
                                                Read More
                                                <i class="m-l-2 fa fa-long-arrow-alt-right"></i>
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            @if (count($get) <= 0)
                                <div class="text-center mb-5 mt-5 pt-4">
                                    <h2 class="text-muted font-italic f1-l-2">Tidak ada hasil ditemukan</h2>
                                </div>
                            @endif
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
        $(document).find('title').text('Hasil Pencarian - Desa Rante Angin')
    </script>
@endsection
