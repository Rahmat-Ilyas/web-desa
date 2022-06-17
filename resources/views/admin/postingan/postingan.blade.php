@extends('admin.layout')
@section('content')
    @php
    $data = new App\Models\Postingan();
    $get = $data->orderBy('id', 'desc')->get();
    @endphp
    <div class="content-body">
        <div class="container-fluid">
            <div class="row page-titles mx-0">
                <div class="col-sm-6 p-md-0">
                    <div class="welcome-text">
                        <h4>Lihat Postingan</h4>
                        {{-- <p class="mb-0">Your business dashboard template</p> --}}
                    </div>
                </div>
                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Admin Page</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Postingan</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Semua Postingan</a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->
            <div class="row">
                <div class="col-xl-12 col-xxl-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Arsip Postingan</h4>
                        </div>
                        <hr class="mb-0">
                        <div class="card-body mt-0">
                            <div class="row">
                                @foreach ($get as $dta)
                                    <div class="col-sm-4">
                                        <div class="card mb-3">
                                            <img class="card-img-top img-fluid"
                                                src="{{ asset('/images/postingan/sampul/' . $dta->foto_sampul) }}"
                                                style="height: 250px">
                                            <div class="card-header p-2" style="min-height: 60px;">
                                                <h4>{{ $dta->judul }}</h4>
                                            </div>
                                            <div class="card-body pt-0 px-2">
                                                <h5>{{ $dta->topik }}</h5>
                                                <i class="fa fa-user"></i>
                                                <span>{{ $dta->admin->nama }}</span>
                                                &nbsp;&nbsp;|&nbsp;&nbsp;
                                                <i class="fa fa-clock-o"></i>
                                                <span >{{ date('d/m/Y H:i', strtotime($dta->created_at)) }}</span>
                                                &nbsp;&nbsp;|&nbsp;&nbsp;
                                                <i class="fa fa-eye"></i>
                                                <span>{{ $dta->view }} View</span>
                                                <div class="row pt-0">
                                                    <div class="col-sm-4">
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-footer">
                                                <span class="card-text d-inline">
                                                    Kategori Postingan: <span style="text-transform: capitalize;">{{ $dta->kategori }}</span>
                                                </span>
                                                <div class="pull-right">
                                                    <a href="{{ url('admin-access/postingan/detail-postingan/' . $dta->slug) }}" class="btn btn-primary">Lihat artikel</a>
                                                </div>
                                            </div>
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

@section('javascript')
    <script>
        $('.summernote').summernote({
            tabsize: 6,
            height: 800
        });
    </script>
@endsection
