@extends('admin.layout')
@section('content')
    @php
    $data = new App\Models\Galeri();
    $get = $data->get();
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
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Galeri</a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->
            <div class="row">
                <div class="col-xl-12 col-xxl-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Arsip Galeri Kegiatan Desa</h4>
                            <a href="{{ url('admin-access/galeri/tambah-galeri') }}" class="btn btn-primary"><i
                                    class="fa fa-plus"></i> Tambah Galeri Baru</a>
                        </div>
                        <hr class="mb-0">
                        <div class="card-body mt-0">
                            <div class="row">
                                @foreach ($get as $dta)
                                    <div class="col-sm-4">
                                        <div class="card mb-3">
                                            <img class="card-img-top img-fluid" src="{{ asset('/images/galeri/'.$dta->konten_galeri[0]->foto) }}" style="height: 250px">
                                            <div class="card-header p-2" style="min-height: 60px;">
                                                <h5 class="card-title">{{ $dta->judul }}</h5>
                                            </div>
                                            <div class="card-body pt-0 px-2">
                                                <i class="fa fa-user"></i>
                                                <span>{{ $dta->admin->nama }}</span>
                                                &nbsp;&nbsp;|&nbsp;&nbsp;
                                                <i class="fa fa-photo"></i>
                                                <span>{{ count($dta->konten_galeri) }} Gambar</span>
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
                                            <div class="card-footer p-2 text-center">
                                                <a href="#" class="btn btn-danger" data-toggle="modal"
                                                        data-target="#modal-del{{ $dta->id }}"><i class="fa fa-trash"></i> Hapus
                                                    Galeri</a>
                                                <a href="{{ url('admin-access/galeri/detail-galeri/' . $dta->id) }}" class="btn btn-primary"><i class="fa fa-eye"></i> Lihat
                                                    Galeri</a>
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

    @foreach ($get as $dta)
        <div class="modal fade" id="modal-del{{ $dta->id }}" role="dialog" aria-labelledby="exampleModalLabel"
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
                        <a href="{{ url('admin-access/delete/galeri/' . $dta->id) }}" role="button"
                            class="btn btn-danger">Hapus</a>
                        <button type="button" class="btn btn-light" data-dismiss="modal">Batal</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection

@section('javascript')
    <script>
        $(document).ready(function() {

        });
    </script>
@endsection
