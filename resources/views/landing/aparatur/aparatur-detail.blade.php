@extends('landing.layout')
@section('content')
    @php
    $aparat = new App\Models\Aparatur();
    $data = $aparat->orderByRaw("FIELD(jabatan, 'Kepala Desa', 'Sekretaris Desa', 'Kaur Umum', 'Kaur Keuangan', 'Kaur Perencanaan', 'Kasi Kesejahteraan') ASC")->get();
    @endphp
    <!-- Breadcrumb -->
    <div class="container">
        <div class="headline bg0 flex-wr-sb-c p-tb-8">
            <div class="f2-s-1 p-r-30 m-tb-6">
                <a href="{{ url('/') }}" class="breadcrumb-item f1-s-3 cl9">
                    Home
                </a>
                <a href="{{ url('aparatur') }}" class="breadcrumb-item f1-s-3 cl9">
                    Aparatur Desa
                </a>
                <span class="breadcrumb-item f1-s-3 cl9">
                    {{ $aprt->nama }}
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
            <div class="col-md-10 col-lg-8 p-b-30">
                <div class="p-r-10 p-r-0-sr991">
                    <!-- Blog Detail -->
                    <div class="p-b-20">
                        <a href="#" class="f1-s-10 cl2 hov-cl10 trans-03 text-uppercase">
                            Aparatur Desa
                        </a>
                        <h3 class="f1-l-3 cl2 p-t-20 respon2">
                            {{ $aprt->nama }}
                        </h3>

                        <hr>

                        <div class="row">
                            <div class="col-sm-4">
                                <div class="card shadow shadow-lg mb-2">
                                    <div class="card-body p-0">
                                        <a href="#" data-toggle="modal" data-target="#modal-foto-01"
                                            class="hov1 trans-03" style="width: 100%">
                                            <div class="bg-img1 size-a-5 how1 pos-relative"
                                                style="background-image: url({{ asset('images/aparatur/' . $aprt->foto) }}); height: 300px;">
                                                <div class="flex-col-e-s s-full p-rl-25 p-tb-20">
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="text-center">
                                    @php
                                        $tel = $aprt->telepon;
                                        if (substr($aprt->telepon, 0, 1) == '0') {
                                            $tel = '+62' . substr($aprt->telepon, 1, strlen($aprt->telepon));
                                        }
                                    @endphp
                                    <a href="https://wa.me/{{ $tel }}" class="btn btn-lg btn-success"
                                        target="_blank"><i class="fab fa-whatsapp"></i></a>
                                    <a href="tel:{{ $aprt->telepon }}" class="btn btn-lg btn-danger" target="_blank"><i
                                            class="fas fa-phone"></i></a>
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <div class="table-responsive-lg">
                                    <table class="table table-striped">
                                        <tbody>
                                            <tr>
                                                <td width="170">NAMA</td>
                                                <td width="1">:</td>
                                                <td>{{ $aprt->nama }}</td>
                                            </tr>
                                            <tr>
                                                <td>JABATAN</td>
                                                <td>:</td>
                                                <td>{{ $aprt->jabatan }}</td>
                                            </tr>
                                            <tr>
                                                <td>JENIS KELAMIN</td>
                                                <td>:</td>
                                                <td>{{ $aprt->jenis_kelamin }}</td>
                                            </tr>
                                            <tr>
                                                <td>TEMPAT LAHIR</td>
                                                <td>:</td>
                                                <td>{{ $aprt->tempat_lahir }}</td>
                                            </tr>
                                            <tr>
                                                <td>TANGGAL LAHIR</td>
                                                <td>:</td>
                                                <td>{{ date('d F Y', strtotime($aprt->tanggal_lahir)) }}</td>
                                            </tr>
                                            <tr>
                                                <td>PENDIDIKAN AKHIR</td>
                                                <td>:</td>
                                                <td>{{ $aprt->pendidikan }}</td>
                                            </tr>
                                            <tr>
                                                <td>ALAMAT</td>
                                                <td>:</td>
                                                <td>{{ $aprt->alamat }}</td>
                                            </tr>
                                            <tr>
                                                <td>TELEPON</td>
                                                <td>:</td>
                                                <td>{{ $aprt->telepon }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <!-- Modal Video 01-->
                            <div class="modal fade" id="modal-foto-01" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog" role="document" data-dismiss="modal">
                                    <div class="close-mo-foto-01 trans-0-4" data-dismiss="modal" aria-label="Close">&times;
                                    </div>

                                    <div class="wrap-foto-mo-01">
                                        <div class="foto-mo-01">
                                            <img src="{{ asset('images/aparatur/' . $aprt->foto) }}" alt="">
                                        </div>
                                    </div>
                                </div>
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
            <div class="col-md-10 col-lg-4 p-b-30">
                <div>
                    <div class="how2 how2-cl4 flex-s-c">
                        <h3 class="f1-m-2 cl3 tab01-title">
                            Aparat Desa Lainnya
                        </h3>
                    </div>

                    <ul class="p-t-20">
                        @foreach ($aparatur as $i => $dta)
                            <li class="flex-wr-sb-s p-b-10">
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
                        @endforeach
                    </ul>
                    <div class="text-right">
                        <a href="{{ url('aparatur') }}" class="f1-s-1 cl9 hov-cl10 trans-03">
                            Lihat Semua
                            <i class="m-l-2 fa fa-long-arrow-alt-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    <script>
        $('#nav-aparatur').addClass('main-menu-active');
        $(document).find('title').text('Aparatur Desa ({{ $aprt->nama }}) - Desa Rante Angin')
    </script>
@endsection
