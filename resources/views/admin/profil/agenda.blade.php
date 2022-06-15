@extends('admin.layout')
@section('content')
    @php
    $data = new App\Models\Agenda();
    $get = $data->get();
    @endphp
    <div class="content-body">
        <div class="container-fluid">
            <div class="row page-titles mx-0">
                <div class="col-sm-6 p-md-0">
                    <div class="welcome-text">
                        <h4>Aparatur</h4>
                        {{-- <p class="mb-0">Your business dashboard template</p> --}}
                    </div>
                </div>
                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Admin Page</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Profil & Iinformasi Desa</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Agenda</a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->
            <div class="row">
                <div class="col-xl-12 col-xxl-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">List Agenda Desa</h4>
                            <button class="btn btn-primary" data-toggle="modal" data-target="#modal-add"><i
                                    class="fa fa-plus"></i> Tambah Data Aparatur Desa</button>
                        </div>
                        <hr class="mb-0">
                        <div class="card-body mt-0">
                            <h5 class="text-dark text-center">Tambah Agenda Baru</h5>
                            <hr>
                            <form method="post" action="{{ url('admin-access/store/agenda') }}"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row mt-2">
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <label class="text-dark">Tanggal Kegiatan</label>
                                            <input type="datetime-local" class="form-control" name="tanggal" required="" autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="text-dark">Nama Agenda</label>
                                            <input type="text" class="form-control" name="nama_agenda"
                                                placeholder="Nama Agenda..." required="" autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="text-dark">Keterangan</label>
                                            <input type="text" class="form-control" name="keterangan"
                                                placeholder="Keterangan..." required="" autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <label class="text-white">Simpan</label>
                                            <div class="">
                                                <button class="btn btn-primary btn-block" type="submit"><i class="fa fa-save"></i>
                                                    Simpan</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <hr>
                            <h5 class="text-dark text-center">List Data Agenda</h5>
                            <div class="table-responsive">
                                <table class="table table-striped datatable">
                                    <thead>
                                        <tr>
                                            <th width="10">No</th>
                                            <th>Nama Agenda</th>
                                            <th>Keterangan</th>
                                            <th>Tanggal & Waktu</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($get as $i => $dta)
                                            <tr class="text-dark">
                                                <td>{{ $i + 1 }}</td>
                                                <td>{{ $dta->nama_agenda }}</td>
                                                <td>{{ $dta->keterangan }}</td>
                                                <td>{{ date('d F Y  H:i', strtotime($dta->tanggal)) }}</td>
                                                @php
                                                    if (strtotime($dta->tanggal) <= strtotime(date('Y-m-d H:i:s'))) {
                                                        $status = '<span class="badge badge-success badge-pill text-white">Selesai</span>';
                                                    } else {
                                                        $status = '<span class="badge badge-warning badge-pill text-white">Belum Selesai</span>';
                                                    }
                                                @endphp
                                                <td>{!! $status !!}</td>
                                                <td width="180" class="text-center">
                                                    <button class="btn btn-sm btn-success text-white" data-toggle="modal"
                                                        data-target="#modal-edit{{ $dta->id }}"><i
                                                            class="fa fa-edit"></i> Edit</button>
                                                    <button class="btn btn-sm btn-danger" data-toggle="modal"
                                                        data-target="#modal-del{{ $dta->id }}"><i
                                                            class="fa fa-trash"></i> Hapus</button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @foreach ($get as $dta)
        <div class="modal fade" id="modal-edit{{ $dta->id }}" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Data Aparatur</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="post" action="{{ url('admin-access/update/agenda') }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body px-5">
                            <div class="form-group row">
                                <label class="col-form-label col-sm-3">Tanggal Kegiatan</label>
                                <div class="col-sm-9">
                                    <input type="datetime-local" class="form-control" name="tanggal" placeholder="Tanggal Kegiatan..." required=""
                                        autocomplete="off" value="{{ date('Y-m-d', strtotime($dta->tanggal)).'T'.date('H:i:s', strtotime($dta->tanggal)) }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-sm-3">Nama Agenda</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="nama_agenda" placeholder="Nama Agenda..."
                                        required="" autocomplete="off" value="{{ $dta->nama_agenda }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-sm-3">Keterangan</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="keterangan" placeholder="Keterangan..."
                                        required="" autocomplete="off" value="{{ $dta->keterangan }}">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" name="id" value="{{ $dta->id }}">
                            <button type="button" class="btn btn-light" data-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

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
                        <a href="{{ url('admin-access/delete/agenda/' . $dta->id) }}" role="button"
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
            $('.datatable').DataTable();
        });
    </script>
@endsection
