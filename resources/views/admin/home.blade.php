@extends('admin.layout')
@section('content')
    @php
    // Post
    $post = new App\Models\Postingan();
    $post = $post->all();

    // Galeri
    $galeri = new App\Models\KontenGaleri();
    $galeri = $galeri->all();

    // Aparatur
    $aparat = new App\Models\Aparatur();
    $aparat = $aparat->all();

    // Agenda
    $agenda = new App\Models\Agenda();
    $waiting = 0;
    foreach ($agenda->orderBy('tanggal', 'desc')->get() as $i => $dta) {
        if (strtotime($dta->tanggal) >= strtotime(date('Y-m-d H:i:s'))) {
            $waiting = $waiting + 1;
        }
    }

    // Pesan
    $pesan = new App\Models\Pesan();
    $pesan = $pesan->orderBy('id', 'desc')->limit(6)->get();
    @endphp
    <div class="content-body">
        <!-- row -->
        <div class="container-fluid">
            <div class="row page-titles mx-0">
                <div class="col-sm-6 p-md-0">
                    <div class="welcome-text">
                        <h4>Hi, Selamat Datang</h4>
                        <p class="mb-0">Assalamualaikum wr. wb</p>
                    </div>
                </div>
                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Admin Page</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Dashboard</a></li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-3 col-sm-6">
                    <div class="card">
                        <div class="stat-widget-one card-body">
                            <div class="stat-icon d-inline-block">
                                <i class="ti-layout-media-overlay text-success border-success"></i>
                            </div>
                            <div class="stat-content d-inline-block">
                                <div class="stat-text">Postingan</div>
                                <div class="stat-digit">{{ count($post) }} Post</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card">
                        <div class="stat-widget-one card-body">
                            <div class="stat-icon d-inline-block">
                                <i class="ti-gallery text-warning border-warning"></i>
                            </div>
                            <div class="stat-content d-inline-block">
                                <div class="stat-text">Galeri</div>
                                <div class="stat-digit">{{ count($galeri) }} Foto</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card">
                        <div class="stat-widget-one card-body">
                            <div class="stat-icon d-inline-block">
                                <i class="ti-user text-danger border-danger"></i>
                            </div>
                            <div class="stat-content d-inline-block">
                                <div class="stat-text">Aparatur</div>
                                <div class="stat-digit">{{ count($aparat) }} Orang</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card">
                        <div class="stat-widget-one card-body">
                            <div class="stat-icon d-inline-block">
                                <i class="ti-agenda text-info border-info"></i>
                            </div>
                            <div class="stat-content d-inline-block">
                                <div class="stat-text">Agenda</div>
                                <div class="stat-digit">{{ $waiting }} Waiting</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-8 col-lg-8 col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="text-center">Selamat Datang di Dashboard Admin</h3>
                            <h4 class="text-center">Sistem Informasi Desa Rante Angin</h4>
                            <div>
                                <img src="{{ asset('assets_/images/welcome.png') }}" style="width: 100%;" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Pesn Terbaru</h4>
                        </div>
                        <div class="card-body">
                            <div class="recent-comment m-t-15">
                                @foreach ($pesan as $dta)
                                <div class="media">
                                    <div class="media-left">
                                        {{-- <a href="#"><img class="media-object mr-2" src="{{ asset('assets_/images/avatar/3.png') }}" alt="..."></a> --}}
                                        <div class="stat-widget-one">
                                            <div class="stat-icon d-inline-block">
                                                <i class="ti-email text-primary border-primary"
                                                style="padding: 10px; font-size: 20px;"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="media-body">
                                        <h4 class="media-heading text-primary">{{ $dta->nama }}</h4>
                                        <p style="white-space: normal; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis;">{{ $dta->pesan }}</p>
                                        <p class="comment-date">{{ date('d M H:i', strtotime($dta->created_at)) }}</p>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
