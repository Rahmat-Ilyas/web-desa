@php
$aparat = new App\Models\Aparatur();
$data = $aparat
    ->orderByRaw("FIELD(jabatan, 'Kepala Desa', 'Sekretaris Desa', 'Kaur Umum', 'Kaur Keuangan', 'Kaur Perencanaan', 'Kasi Kesejahteraan') ASC")
    ->limit(5)
    ->get();
@endphp
<div class="p-l-10 p-rl-0-sr991 p-b-20">
    <!-- Subscribe -->
    <div class="bg-secondary p-rl-35 p-t-28 p-b-35 m-b-35">
        <h5 class="f1-m-5 cl0 p-b-20">
            Selamat Datang
        </h5>

        <p class="f1-s-1 cl0">
            Selamat datang di website Desa Rante Angin, Kami atas nama Pemerintah Desa Rante Angin mengucapkan
            banyak-banyak terima kasih telah mengunjungi website Desa kami. Dan kami selalu berusaha untuk mengelola
            website ini dengan baik demi terciptanya pelayanan yang maksimal dan Informasi yang akurat tentang Desa
            kami.
        </p>
    </div>

    <!--  -->
    <div>
        <div class="how2 how2-cl4 flex-s-c">
            <h3 class="f1-m-2 cl3 tab01-title">
                Aparat Desa
            </h3>
        </div>

        <ul class="p-t-20">
            @foreach ($data as $i => $dta)
                @if ($i == 0)
                    <li class="flex-wr-sb-s p-b-10">
                        <a href="" class="hov1 trans-03" style="width: 100%">
                            <div class="bg-img1 size-a-5 how1 pos-relative"
                                style="background-image: url({{ asset('images/aparatur/' . $dta->foto) }}); height: 400px;">
                                <div class="flex-col-e-s s-full p-rl-25 p-tb-20">
                                    <small class="dis-block how1-child2 cl0 bo-all-1 bocl1 bg1 p-rl-5 p-tb-2">
                                        <b>{{ strtoupper($dta->jabatan) }}</b>
                                    </small>

                                    <h2 class="how1-child2 m-t-10 text-white">
                                        <b>{{ strtoupper($dta->nama) }}</b>
                                    </h2>
                                </div>
                            </div>
                        </a>
                    </li>
                @else
                    <li class="flex-wr-sb-s p-b-10">
                        {{-- <a href="#" class="size-w-10 wrap-pic-w hov1 trans-03">
                            <img src="{{ asset('images/aparatur/' . $dta->foto) }}" alt="IMG" height="110">
                        </a> --}}
                        <a href="" class="size-w-10 wrap-pic-w hov1 trans-03">
                            <div class="bg-img1 size-a-5 how1 pos-relative"
                                style="background-image: url({{ asset('images/aparatur/' . $dta->foto) }}); height: 110px;">
                            </div>
                        </a>

                        <div class="size-w-11">
                            <h6 class="p-b-4">
                                <a href="#" class="f1-s-5 cl3 hov-cl10 trans-03">
                                    <b>{{ strtoupper($dta->nama) }}</b>
                                </a>
                            </h6>

                            <span class="cl8 txt-center p-b-24">
                                <span class="f1-s-6">
                                    <b>{{ $dta->jabatan }}</b>
                                </span>
                            </span>
                        </div>
                    </li>
                @endif
            @endforeach
        </ul>
    </div>

    <!--  -->
    <div class="m-t-30">
        <div class="how2 how2-cl4 flex-s-c">
            <h3 class="f1-m-2 cl3 tab01-title">
                Berita Terkini
            </h3>
        </div>

        <ul class="p-t-35">
            <li class="flex-wr-sb-s p-b-22">
                <div class="size-a-8 flex-c-c borad-3 size-a-8 bg9 f1-m-4 cl0 m-b-6">
                    1
                </div>

                <a href="#" class="size-w-3 f1-s-7 cl3 hov-cl10 trans-03">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit
                </a>
            </li>

            <li class="flex-wr-sb-s p-b-22">
                <div class="size-a-8 flex-c-c borad-3 size-a-8 bg9 f1-m-4 cl0 m-b-6">
                    2
                </div>

                <a href="#" class="size-w-3 f1-s-7 cl3 hov-cl10 trans-03">
                    Proin velit consectetur non neque
                </a>
            </li>

            <li class="flex-wr-sb-s p-b-22">
                <div class="size-a-8 flex-c-c borad-3 size-a-8 bg9 f1-m-4 cl0 m-b-6">
                    3
                </div>

                <a href="#" class="size-w-3 f1-s-7 cl3 hov-cl10 trans-03">
                    Nunc vestibulum, enim vitae condimentum volutpat lobortis ante
                </a>
            </li>

            <li class="flex-wr-sb-s p-b-22">
                <div class="size-a-8 flex-c-c borad-3 size-a-8 bg9 f1-m-4 cl0 m-b-6">
                    4
                </div>

                <a href="#" class="size-w-3 f1-s-7 cl3 hov-cl10 trans-03">
                    Proin velit justo consectetur non neque elementum
                </a>
            </li>

            <li class="flex-wr-sb-s p-b-22">
                <div class="size-a-8 flex-c-c borad-3 size-a-8 bg9 f1-m-4 cl0">
                    5
                </div>

                <a href="#" class="size-w-3 f1-s-7 cl3 hov-cl10 trans-03">
                    Proin velit consectetur non neque
                </a>
            </li>
        </ul>
    </div>

    <!--  -->
    <div class="p-t-50">
        <div class="how2 how2-cl4 flex-s-c">
            <h3 class="f1-m-2 cl3 tab01-title">
                Sosial Media
            </h3>
        </div>

        <ul class="p-t-35">
            <li class="flex-wr-sb-c p-b-20">
                <a href="#" class="size-a-8 flex-c-c borad-3 size-a-8 bg-facebook fs-16 cl0 hov-cl0">
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
                <a href="#" class="size-a-8 flex-c-c borad-3 size-a-8 bg-twitter fs-16 cl0 hov-cl0">
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
                <a href="#" class="size-a-8 flex-c-c borad-3 size-a-8 bg-youtube fs-16 cl0 hov-cl0">
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
