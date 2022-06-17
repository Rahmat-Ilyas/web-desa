@extends('admin.layout')
@section('content')
    @php
    $data = new App\Models\Postingan();
    $dta = $data->where('slug', $id)->first();
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
                        <li class="breadcrumb-item"><a href="{{ url('admin-access/postingan/postingan') }}">Kelola
                                Postingan</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Detail Postingan</a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->
            <div class="row">
                <div class="col-xl-12 col-xxl-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Detail Postingan</h4>
                            <a href="{{ url('admin-access/postingan/postingan') }}" class="btn btn-dark"><i
                                    class="fa fa-arrow-left"></i> Kembali Ke Postingan</a>
                        </div>
                        <hr class="mb-0">
                        <div class="card-body mt-0">
                            <div class="row justify-content-center">
                                <div class="col-sm-12">
                                    <h3>{{ $dta->judul }}</h2>
                                        <h5>{{ $dta->topik }}</h5>
                                        <i class="fa fa-user"></i>
                                        <span>{{ $dta->admin->nama }}</span>
                                        &nbsp;&nbsp;|&nbsp;&nbsp;
                                        <i class="fa fa-clock-o"></i>
                                        <span>{{ date('d F Y H:i', strtotime($dta->created_at)) }}</span>
                                        &nbsp;&nbsp;|&nbsp;&nbsp;
                                        <i class="fa fa-eye"></i>
                                        <span>{{ $dta->view }} View</span>
                                        <div class="mt-2 mb-3">
                                            <img src="{{ asset('/images/postingan/sampul/' . $dta->foto_sampul) }}"
                                                style="width: 100%" alt="">
                                        </div>
                                        <hr>
                                        <div class="text-dark">{!! $dta->konten !!}</div>
                                        <hr>
                                        <div class="pull-right">
                                            <a href="{{ url('admin-access/postingan/postingan') }}"
                                                class="btn btn-dark"><i class="fa fa-arrow-left"></i> Kembali Ke
                                                Postingan</a>
                                            <a href="#" data-toggle="modal"
                                                data-target="#modal-del" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus Postingan</a>
                                            <a href="{{ url('admin-access/postingan/edit-postingan/'. $dta->slug) }}"
                                                class="btn btn-primary"><i class="fa fa-edit"></i> Edit Postingan</a>
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

    <div class="modal fade" id="modal-del" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Yakin ingin menghapus data ini?</p>
                </div>
                <div class="modal-footer">
                    <a href="{{ url('admin-access/delete/postingan/' . $dta->id) }}" role="button"
                        class="btn btn-danger">Hapus</a>
                    <button type="button" class="btn btn-light" data-dismiss="modal">Batal</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    <script>
        $(document).ready(function() {
            $(document).find('#postingan').addClass('mm-active').find('.mm-collapse').addClass('mm-show').find(
                '#view-post').addClass('mm-active').find('a').addClass('mm-active');
        });
    </script>
@endsection
