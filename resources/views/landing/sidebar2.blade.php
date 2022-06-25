@php
// Postingan
$postingan = new App\Models\Postingan();
// Post Populer
$post_populer = $postingan
    ->orderBy('view', 'desc')
    ->orderBy('id', 'desc')
    ->limit(4)
    ->get();

// Tags
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
shuffle($get_tags);
@endphp
<div class="p-l-10 p-rl-0-sr991 p-t-70">
    <!-- Category -->
    <div class="p-b-60">
        <div class="how2 how2-cl4 flex-s-c">
            <h3 class="f1-m-2 cl3 tab01-title">
                Kategori
            </h3>
        </div>

        <ul class="p-t-30">
            <li class="how-bor3 p-rl-4">
                <a href="{{ url('postingan/berita-desa') }}"
                    class="flex-wr-sb-c f1-s-10 text-uppercase cl2 hov-cl10 trans-03 p-tb-13">
                    <span>
                        Berita Desa
                    </span>

                    <span>
                        ({{ count($postingan->where('kategori', 'Berita')->get()) }})
                    </span>
                </a>
            </li>

            <li class="how-bor3 p-rl-4">
                <a href="{{ url('postingan/artikel') }}"
                    class="flex-wr-sb-c f1-s-10 text-uppercase cl2 hov-cl10 trans-03 p-tb-13">
                    <span>
                        Artikel
                    </span>

                    <span>
                        ({{ count($postingan->where('kategori', 'Artikel')->get()) }})
                    </span>
                </a>
            </li>

            <li class="how-bor3 p-rl-4">
                <a href="{{ url('postingan/potensi-desa') }}"
                    class="flex-wr-sb-c f1-s-10 text-uppercase cl2 hov-cl10 trans-03 p-tb-13">
                    <span>
                        Potensi Desa
                    </span>

                    <span>
                        ({{ count($postingan->where('kategori', 'Potensi Desa')->get()) }})
                    </span>
                </a>
            </li>

            <li class="how-bor3 p-rl-4">
                <a href="{{ url('postingan/program-desa') }}"
                    class="flex-wr-sb-c f1-s-10 text-uppercase cl2 hov-cl10 trans-03 p-tb-13">
                    <span>
                        Program Desa
                    </span>

                    <span>
                        ({{ count($postingan->where('kategori', 'Program Desa')->get()) }})
                    </span>
                </a>
            </li>

            <li class="how-bor3 p-rl-4">
                <a href="{{ url('postingan/bumdes') }}"
                    class="flex-wr-sb-c f1-s-10 text-uppercase cl2 hov-cl10 trans-03 p-tb-13">
                    <span>
                        Bumdes
                    </span>

                    <span>
                        ({{ count($postingan->where('kategori', 'Bumdes')->get()) }})
                    </span>
                </a>
            </li>

            <li class="how-bor3 p-rl-4">
                <a href="{{ url('postingan/produk-hukum') }}"
                    class="flex-wr-sb-c f1-s-10 text-uppercase cl2 hov-cl10 trans-03 p-tb-13">
                    <span>
                        Produk Hukum
                    </span>

                    <span>
                        ({{ count($postingan->where('kategori', 'Produk Hukum')->get()) }})
                    </span>
                </a>
            </li>

            <li class="how-bor3 p-rl-4">
                <a href="{{ url('postingan/lembaga-desa') }}"
                    class="flex-wr-sb-c f1-s-10 text-uppercase cl2 hov-cl10 trans-03 p-tb-13">
                    <span>
                        Lembaga Desa
                    </span>

                    <span>
                        ({{ count($postingan->where('kategori', 'Lembaga Desa')->get()) }})
                    </span>
                </a>
            </li>
        </ul>
    </div>

    <!-- Popular Posts -->
    <div class="p-b-30">
        <div class="how2 how2-cl4 flex-s-c">
            <h3 class="f1-m-2 cl3 tab01-title">
                Post Populer
            </h3>
        </div>

        <ul class="p-t-35">
            @foreach ($post_populer as $dta)
                @php
                    $this_kat = strtolower(str_replace(' ', '-', $dta->kategori));
                    $this_kat = $this_kat == 'berita' ? 'berita-desa' : $this_kat;
                @endphp
                <li class="flex-wr-sb-s p-b-30">
                    <a href="{{ url('post/' . $dta->slug) }}" class="size-w-10 wrap-pic-w hov1 trans-03">
                        <img src="{{ asset('/images/postingan/sampul/' . $dta->foto_sampul) }}"
                            alt="{{ $dta->judul }}">
                    </a>

                    <div class="size-w-11">
                        <h6 class="p-b-4">
                            <a href="{{ url('post/' . $dta->slug) }}" class="f1-s-5 cl3 hov-cl10 trans-03 how-txt1">
                                {{ $dta->judul }}
                            </a>
                        </h6>

                        <span class="cl8 txt-center p-b-24">
                            <a href="{{ url('postingan/' . $this_kat) }}" class="f1-s-6 cl8 hov-cl10 trans-03">
                                {{ $dta->kategori }}
                            </a>

                            <span class="f1-s-3 m-rl-3">
                                -
                            </span>

                            <span class="f1-s-3">
                                {{ date('d M', strtotime($dta->created_at)) }}
                            </span>

                            <span class="m-rl-3">|</span>

                            <span class="f1-s-3 cl8 m-r-15">
                                {{ $dta->view }} Views
                            </span>
                        </span>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
    <!-- Sosial Media -->
    <div class="p-b-40">
        <div class="how2 how2-cl4 flex-s-c m-b-20">
            <h3 class="f1-m-2 cl3 tab01-title">
                Sosial Media
            </h3>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <ul class="p-t-0">
                    <li class="flex-wr-sb-c p-b-20">
                        <a href="#" class="size-a-8 flex-c-c borad-3 size-a-8 bg-facebook fs-16 cl0 hov-cl0">
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
                        <a href="#" class="size-a-8 flex-c-c borad-3 size-a-8 bg-twitter fs-16 cl0 hov-cl0">
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
                        <a href="#" class="size-a-8 flex-c-c borad-3 size-a-8 bg-youtube fs-16 cl0 hov-cl0">
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

    <!-- Tag -->
    <div>
        <div class="how2 how2-cl4 flex-s-c m-b-20">
            <h3 class="f1-m-2 cl3 tab01-title">
                Tags
            </h3>
        </div>

        <div class="flex-wr-s-s m-rl--5">
            @foreach (array_slice($get_tags, 0, 10) as $tag)
                <a href="{{ url('postingan/tag/' . str_replace(' ', '-', $tag)) }}"
                    class="flex-c-c size-h-2 bo-1-rad-20 bocl12 f1-s-1 cl8 hov-btn2 trans-03 p-rl-20 p-tb-5 m-all-5">
                    {{ $tag }}
                </a>
            @endforeach
        </div>
        <div class="text-right mt-3">
            <a href="{{ url('postingan/tags') }}" class="f1-s-1 cl9 hov-cl10 trans-03">
                Lihat Semua Tag
                <i class="m-l-2 fa fa-long-arrow-alt-right"></i>
            </a>
        </div>
    </div>
</div>
