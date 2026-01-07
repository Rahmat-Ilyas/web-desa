@extends('landing.layout')
@section('content')
    @php
    $files = new App\Models\Files();
    @endphp
    <!-- Breadcrumb -->
    <div class="container">
        <div class="headline bg0 flex-wr-sb-c p-tb-8">
            <div class="f2-s-1 p-r-30 m-tb-6">
                <a href="{{ url('/') }}" class="breadcrumb-item f1-s-3 cl9">
                    Home
                </a>

                <span class="breadcrumb-item f1-s-3 cl9">
                    Download
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
                            Download
                        </a>

                        <h3 class="f1-l-3 cl2 p-b-16 p-t-20 respon2">
                            File Download
                        </h3>

                        <div class="flex-wr-s-s">
                            @foreach ($files->orderBy('id', 'desc')->get() as $dta)
                            <div class="card shadow shadow-lg mb-3" style="width: 100%;">
                                <div class="card-body">
                                    <div class="pull-right mt-5">
                                        <a href="{{ url('file-download/'.$dta->nama_file) }}" target="_blank" class="btn btn-sm btn-success px-2"><i class="fa fa-download"></i> Download File</a>
                                    </div>
                                    <h3 class="f1-l-2 cl2 mb-2">{{ $dta->keterangan }}</h3>
                                    <p class="f1-s-5 cl3 mb-4">{{ date('d F Y', strtotime($dta->created_at)) }}</p>
                                    <p class="f1-s-2 cl3">Nama File : {{ $dta->nama_file }}</p>
                                    <div class="mt-2">
                                        <span class="badge badge-info">Ukuran: {{ $dta->ukuran }}</span>
                                        <span class="badge badge-success">Download: {{ $dta->download }} Kali</span>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <hr>

                        <!-- Share -->
                        <div class="flex-s-s">
                            <span class="f1-s-12 cl5 p-t-1 m-r-15">
                                Share:
                            </span>

                            <div class="flex-wr-s-s size-w-0">
                                <a href="https://api.whatsapp.com/send?text={{ 'File Download - Kel. Ujung Sabbang ' . url()->current() }}"
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

                                <a href="https://twitter.com/intent/tweet?text={{ 'File Download - Kel. Ujung Sabbang ' . url()->current() }}"
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
        $('#nav-file').addClass('main-menu-active');
        $(document).find('title').text('File Download - Kel. Ujung Sabbang')
    </script>
@endsection
