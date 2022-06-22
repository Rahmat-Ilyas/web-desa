@extends('landing.layout')
@section('content')
    @php
    $apbdes = new App\Models\Apbdes();
    @endphp
    <!-- Breadcrumb -->
    <div class="container">
        <div class="headline bg0 flex-wr-sb-c p-tb-8">
            <div class="f2-s-1 p-r-30 m-tb-6">
                <a href="{{ url('/') }}" class="breadcrumb-item f1-s-3 cl9">
                    Home
                </a>
                <span class="breadcrumb-item f1-s-3 cl9">
                    Transparansi Anggaran
                </span>
            </div>

            <div class="pos-relative size-a-2 bo-1-rad-22 of-hidden bocl11 m-tb-6">
                <input class="f1-s-1 cl6 plh9 s-full p-l-25 p-r-45" type="text" name="search" placeholder="Search">
                <button class="flex-c-c size-a-1 ab-t-r fs-20 cl2 hov-cl10 trans-03">
                    <i class="zmdi zmdi-search"></i>
                </button>
            </div>
        </div>
    </div>

    <!-- Content -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12 p-b-30">
                <div class="p-r-10 p-r-0-sr991">
                    <!-- Blog Detail -->
                    <div class="p-b-20">
                        <a href="#" class="f1-s-10 cl2 hov-cl10 trans-03 text-uppercase">
                            Transparansi Anggaran
                        </a>
                        <h3 class="f1-l-3 cl2 p-t-20 respon2">
                            Transparansi Anggaran Desa Rante Angin Tahun {{ date('Y') }}
                        </h3>

                        <hr>

                        <div class="row">
                            <div class="col-sm-12 m-b-20 m-t-10">
                                <div class="tab01-head how2 how2-cl2 bocl12 flex-s-c">
                                    <!-- Brand tab -->
                                    <h3 class="f1-m-2 cl13 tab01-title">
                                        Anggaran Pendapatan Desa
                                    </h3>
                                </div>
                            </div>
                            <div class="col-sm-8">
                                {{-- <h4 class="f1-l-2 cl2 p-tb-20 respon2">Anggaran Pendapatan Desa</h4> --}}
                                <table class="table">
                                    <thead class="thead-dark bg-success text-white">
                                        {{-- <tr>
                                            <th colspan="2" class="text-center">Anggaran Pendapatan Tahun
                                                {{ date('Y') }}</th>
                                        </tr> --}}
                                        <tr>
                                            <th>Pendapatan</th>
                                            <th class="text-center">Nilai (Rp)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $total = 0;
                                        @endphp
                                        @foreach ($apbdes->where('jenis', 'pendapatan')->get() as $dta)
                                            <tr>
                                                <td>{{ $dta->keterangan }}</td>
                                                <td class="text-right">Rp.{{ number_format($dta->nilai) }}</td>
                                            </tr>
                                            @php
                                                $total = $total + $dta->nilai;
                                            @endphp
                                        @endforeach
                                        <tr>
                                            <td><b>Total</b></td>
                                            <td class="text-right"><b>Rp.{{ number_format($total) }}</b></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-sm-4">
                                <div id="chartContainer" style="height: 370px; width: 100%;"></div>
                            </div>
                        </div>
                        {{-- <hr class="m-tb-20"> --}}
                        <div class="row m-tb-50">
                            <div class="col-sm-12 m-b-20">
                                <div class="tab01-head how2 how2-cl1 bocl12 flex-s-c">
                                    <!-- Brand tab -->
                                    <h3 class="f1-m-2 cl12 tab01-title">
                                        Anggaran Belanja Desa
                                    </h3>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div id="chartContainer2" style="height: 370px; width: 100%;"></div>
                            </div>
                            <div class="col-sm-8">
                                {{-- <h4 class="f1-l-2 cl2 p-tb-20 respon2 text-right">Anggaran Belanja Desa</h4> --}}
                                <table class="table">
                                    <thead class="thead-dark bg-danger text-white">
                                        {{-- <tr>
                                            <th colspan="2" class="text-center">Anggaran Belanja Tahun
                                                {{ date('Y') }}</th>
                                        </tr> --}}
                                        <tr>
                                            <th>Belanja</th>
                                            <th class="text-center">Nilai (Rp)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $total = 0;
                                        @endphp
                                        @foreach ($apbdes->where('jenis', 'belanja')->get() as $dta)
                                            <tr>
                                                <td>{{ $dta->keterangan }}</td>
                                                <td class="text-right">Rp.{{ number_format($dta->nilai) }}</td>
                                            </tr>
                                            @php
                                                $total = $total + $dta->nilai;
                                            @endphp
                                        @endforeach
                                        <tr>
                                            <td><b>Total</b></td>
                                            <td class="text-right"><b>Rp.{{ number_format($total) }}</b></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <hr>

                        <!-- Share -->
                        <div class="flex-s-s">
                            <span class="f1-s-12 cl5 p-t-1 m-r-15">
                                Share:
                            </span>

                            <div class="flex-wr-s-s size-w-0">
                                <a href="https://api.whatsapp.com/send?text={{ 'Aparatur Desa - Desa Rante Angin ' . url()->current() }}"
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

                                <a href="https://twitter.com/intent/tweet?text={{ 'Aparatur Desa - Desa Rante Angin ' . url()->current() }}"
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
        </div>
    </div>
@endsection

@section('javascript')
    @php
    $pendapatan = $apbdes->where('jenis', 'pendapatan')->get();
    $belanja = $apbdes->where('jenis', 'belanja')->get();
    $color = '';
    $color2 = '';
    for ($i = 0; $i < count($pendapatan); $i++) {
        $rand = str_pad(dechex(rand(0x000000, 0xffffff)), 6, 0, STR_PAD_LEFT);
        $color .= '"#' . $rand . '", ';
    }

    for ($i = 0; $i < count($belanja); $i++) {
        $rand = str_pad(dechex(rand(0x000000, 0xffffff)), 6, 0, STR_PAD_LEFT);
        $color2 .= '"#' . $rand . '", ';
    }

    @endphp

    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
    <script>
        $('#nav-anggaran').addClass('main-menu-active');
        $(document).find('title').text('Aparatur Desa - Desa Rante Angin');


        new Morris.Donut({
            element: 'chartContainer',
            data: [
                @foreach ($pendapatan as $dta)
                    {
                        label: '{{ $dta->keterangan }}',
                        value: {{ $dta->nilai }}
                    },
                @endforeach
            ],
            resize: true,
            colors: [{!! $color !!}]
        });

        new Morris.Donut({
            element: 'chartContainer2',
            data: [
                @foreach ($belanja as $dta)
                    {
                        label: '{{ $dta->keterangan }}',
                        value: {{ $dta->nilai }}
                    },
                @endforeach
            ],
            resize: true,
            colors: [{!! $color2 !!}]
        });
    </script>
@endsection
