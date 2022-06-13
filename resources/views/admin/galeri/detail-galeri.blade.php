@extends('admin.layout')
@section('content')
    @php
    $data = new App\Models\Galeri();
    $dta = $data->where('id', $id)->first();
    @endphp
    <div class="content-body">
        <div class="container-fluid">
            <div class="row page-titles mx-0">
                <div class="col-sm-6 p-md-0">
                    <div class="welcome-text">
                        <h4>Galeri</h4>
                        {{-- <p class="mb-0">Your business dashboard template</p> --}}
                    </div>
                </div>
                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Admin Page</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('admin-access/galeri/arsip-galeri') }}">Galeri</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Detail Galeri</a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->
            <div class="row">
                <div class="col-xl-12 col-xxl-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Detail Galeri Kegiatan Desa</h4>
                            <a href="{{ url('admin-access/galeri/arsip-galeri') }}" class="btn btn-dark"><i
                                    class="fa fa-arrow-left"></i> Kembali Ke Galeri</a>
                        </div>
                        <hr class="mb-0">
                        <div class="card-body mt-0">
                            <div class="row justify-content-center">
                                <div class="col-sm-12">
                                    <h5>{{ $dta->judul }}</h5>
                                    <i class="fa fa-user"></i>
                                    <span>{{ $dta->admin->nama }}</span>
                                    &nbsp;&nbsp;|&nbsp;&nbsp;
                                    <i class="fa fa-clock-o"></i>
                                    <span>{{ date('d F Y H:i', strtotime($dta->created_at)) }}</span>
                                    &nbsp;&nbsp;|&nbsp;&nbsp;
                                    <i class="fa fa-eye"></i>
                                    <span>{{ $dta->view }} View</span>
                                    <hr>
                                    <p class="text-dark">{{ $dta->keterangan }}</p>

                                    <!-- Gallery -->
                                    <div class="row">
                                        @foreach ($dta->konten_galeri as $item)
                                            <div class="col-lg-4 col-md-12 mb-4 mb-lg-0">
                                                <img src="{{ asset('/images/galeri/' . $item->foto) }}"
                                                    class="w-100 shadow-1-strong rounded mb-4" alt="Boat on Calm Water" />
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="pull-right">
                                        <a href="{{ url('admin-access/galeri/arsip-galeri') }}" class="btn btn-dark"><i
                                                class="fa fa-arrow-left"></i> Kembali Ke Galeri</a>
                                    </div>
                                    <!-- Gallery -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    <script>
        $(document).ready(function() {
            $(document).find('#galeri').addClass('mm-active');
        });
    </script>
@endsection
