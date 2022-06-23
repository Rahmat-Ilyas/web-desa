@php
$aparat = new App\Models\Aparatur();
$data = $aparat
    ->orderByRaw("FIELD(jabatan, 'Kepala Desa', 'Sekretaris Desa', 'Kaur Umum', 'Kaur Keuangan', 'Kaur Perencanaan', 'Kasi Kesejahteraan') ASC")
    ->limit(5)
    ->get();
$agenda = new App\Models\Agenda();
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
                        <a href="{{ url('aparatur/' . strtolower(str_replace(' ', '-', $dta->nama) . '-uid0' . $dta->id)) }}"
                            class="hov1 trans-03" style="width: 100%">
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
                        <a href="{{ url('aparatur/' . strtolower(str_replace(' ', '-', $dta->nama) . '-uid0' . $dta->id)) }}"
                            class="size-w-10 wrap-pic-w hov1 trans-03">
                            <div class="bg-img1 size-a-5 how1 pos-relative"
                                style="background-image: url({{ asset('images/aparatur/' . $dta->foto) }}); height: 110px;">
                            </div>
                        </a>

                        <div class="size-w-11">
                            <h6 class="p-b-4">
                                <a href="{{ url('aparatur/' . strtolower(str_replace(' ', '-', $dta->nama) . '-uid0' . $dta->id)) }}"
                                    class="f1-s-5 cl3 hov-cl10 trans-03">
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
        <div class="text-right">
            <a href="{{ url('aparatur') }}" class="f1-s-1 cl9 hov-cl10 trans-03">
                Lihat Semua
                <i class="m-l-2 fa fa-long-arrow-alt-right"></i>
            </a>
        </div>
    </div>

    <!--  -->
    <div class="m-t-40">
        <div class="how2 how2-cl4 flex-s-c">
            <h3 class="f1-m-2 cl3 tab01-title">
                Berita Terkini
            </h3>
        </div>

        <ul class="p-t-35">
            <li class="flex-wr-sb-s p-b-30">
                <a href="#" class="size-w-10 wrap-pic-w hov1 trans-03">
                    <img src="{{ asset('assets/images/popular-post-04.jpg') }}" alt="IMG">
                </a>

                <div class="size-w-11">
                    <h6 class="p-b-4">
                        <a href="blog-detail-02.html" class="f1-s-5 cl3 hov-cl10 trans-03">
                            Donec metus orci, malesuada et lectus vitae
                        </a>
                    </h6>

                    <span class="cl8 txt-center p-b-24">
                        <a href="#" class="f1-s-6 cl8 hov-cl10 trans-03">
                            Music
                        </a>

                        <span class="f1-s-3 m-rl-3">
                            -
                        </span>

                        <span class="f1-s-3">
                            Feb 18
                        </span>
                    </span>
                </div>
            </li>

            <li class="flex-wr-sb-s p-b-30">
                <a href="#" class="size-w-10 wrap-pic-w hov1 trans-03">
                    <img src="{{ asset('assets/images/popular-post-05.jpg') }}" alt="IMG">
                </a>

                <div class="size-w-11">
                    <h6 class="p-b-4">
                        <a href="blog-detail-02.html" class="f1-s-5 cl3 hov-cl10 trans-03">
                            Donec metus orci, malesuada et lectus vitae
                        </a>
                    </h6>

                    <span class="cl8 txt-center p-b-24">
                        <a href="#" class="f1-s-6 cl8 hov-cl10 trans-03">
                            Game
                        </a>

                        <span class="f1-s-3 m-rl-3">
                            -
                        </span>

                        <span class="f1-s-3">
                            Feb 16
                        </span>
                    </span>
                </div>
            </li>

            <li class="flex-wr-sb-s p-b-30">
                <a href="#" class="size-w-10 wrap-pic-w hov1 trans-03">
                    <img src="{{ asset('assets/images/popular-post-06.jpg') }}" alt="IMG">
                </a>

                <div class="size-w-11">
                    <h6 class="p-b-4">
                        <a href="blog-detail-02.html" class="f1-s-5 cl3 hov-cl10 trans-03">
                            Donec metus orci, malesuada et lectus vitae
                        </a>
                    </h6>

                    <span class="cl8 txt-center p-b-24">
                        <a href="#" class="f1-s-6 cl8 hov-cl10 trans-03">
                            Celebrity
                        </a>

                        <span class="f1-s-3 m-rl-3">
                            -
                        </span>

                        <span class="f1-s-3">
                            Feb 12
                        </span>
                    </span>
                </div>
            </li>

            <li class="flex-wr-sb-s p-b-30">
                <a href="#" class="size-w-10 wrap-pic-w hov1 trans-03">
                    <img src="{{ asset('assets/images/popular-post-05.jpg') }}" alt="IMG">
                </a>

                <div class="size-w-11">
                    <h6 class="p-b-4">
                        <a href="blog-detail-02.html" class="f1-s-5 cl3 hov-cl10 trans-03">
                            Donec metus orci, malesuada et lectus vitae
                        </a>
                    </h6>

                    <span class="cl8 txt-center p-b-24">
                        <a href="#" class="f1-s-6 cl8 hov-cl10 trans-03">
                            Game
                        </a>

                        <span class="f1-s-3 m-rl-3">
                            -
                        </span>

                        <span class="f1-s-3">
                            Feb 16
                        </span>
                    </span>
                </div>
            </li>
        </ul>
    </div>

    <!--  -->
    <div class="p-t-50">
        <div class="how2 how2-cl4 flex-s-c">
            <h3 class="f1-m-2 cl3 tab01-title">
                Agenda Desa
            </h3>
        </div>

        <div class="p-t-20">
            <div id="container-cal" class="calendar-container"></div>
        </div>
    </div>
</div>

@section('javascript-side')
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/vendor/animated-event-calendar/dist/simple-calendar.css') }}">
    <script src="{{ asset('assets/vendor/animated-event-calendar/dist/jquery.simple-calendar.js') }}"></script>
    <script>
        var $calendar;
        $(document).ready(function() {
            let container = $("#container-cal").simpleCalendar({
                months: ['januari', 'februari', 'maret', 'april', 'mei', 'juni', 'juli', 'augustus',
                    'september', 'oktober', 'november', 'desember'
                ],
                days: ['minggu', 'senin', 'selasa', 'rabu', 'kamis', 'jumat', 'sabtu'],
                fixedStartDay: true,
                disableEmptyDetails: true,
                events: [
                    // generate new event after tomorrow for one hour
                    @foreach ($agenda->get() as $dta)
                        {
                            startDate: "{{ $dta->tanggal }}",
                            endDate: "{{ $dta->tanggal }}",
                            summary: "{{ $dta->nama_agenda }}. Tempat: {{ $dta->tempat }}"
                        },
                    @endforeach
                ],
            });
            $calendar = container.data('plugin_simpleCalendar');
        });
    </script>
@endsection
