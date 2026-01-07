@extends('admin.layout')
@section('content')
    @php
    $data = new App\Models\Pesan();
    $get = $data->orderBy('id', 'desc')->get();
    @endphp
    <div class="content-body">
        <div class="container-fluid">
            <div class="row page-titles mx-0">
                <div class="col-sm-6 p-md-0">
                    <div class="welcome-text">
                        <h4>Pesan Masuk</h4>
                        {{-- <p class="mb-0">Your business dashboard template</p> --}}
                    </div>
                </div>
                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Admin Page</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Pesan Masuk</a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->
            <div class="row">
                <div class="col-xl-12 col-xxl-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Arsip Pesan Masuk</h4>
                        </div>
                        <hr class="mb-0">
                        <div class="card-body mt-0">
                            <div class="table-responsive">
                                <table class="table table-striped datatable" style="font-size: 13px;">
                                    <thead>
                                        <tr>
                                            <th width="10">No</th>
                                            <th>Waktu</th>
                                            <th>Nama Pengirim</th>
                                            <th>Email</th>
                                            <th>Subjek</th>
                                            <th>Isi Pesan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($get as $i => $dta)
                                            <tr class="{{ ($dta->status == 'new') ? 'text-dark font-weight-bold' : '' }}">
                                                <td>{{ $i + 1 }}</td>
                                                <td>{{ date('d M H:i', strtotime($dta->created_at)) }}</td>
                                                <td width="150">{{ $dta->nama }}</td>
                                                <td>{{ $dta->email }}</td>
                                                <td>{{ $dta->subjek }}</td>
                                                <td>{{ $dta->pesan }}</td>
                                                <td width="80" class="text-center">
                                                    <button class="btn btn-sm btn-info text-white" data-toggle="modal"
                                                        data-target="#modal-balas{{ $dta->id }}" data-toggle1="tooltip" title="Balas Pesan"><i
                                                            class="fa fa-send"></i></button>
                                                    <button class="btn btn-sm btn-danger" data-toggle="modal"
                                                        data-target="#modal-del{{ $dta->id }}" data-toggle1="tooltip" title="Hapus Pesan"><i
                                                            class="fa fa-trash"></i></button>
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
        <div class="modal fade" id="modal-balas{{ $dta->id }}" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Balas Pesan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="post" action="{{ url('admin-access/store/pesan') }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body px-5">
                            <div class="form-group row">
                                <label class="col-form-label col-sm-3">Balas Ke</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" readonly="" disabled="" autocomplete="off"
                                        value="{{ $dta->nama.' ('.$dta->email.')' }}">
                                        <input type="hidden" name="email" value="{{ $dta->email }}">
                                </div>
                            </div>
                            <hr>
                            <div class="form-group row">
                                <label class="col-form-label col-sm-3">Subjek</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="subjek" placeholder="Subjek..."
                                        required="" autocomplete="off" value="{{ $dta->username }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-sm-3">Isi Pesan Balasan</label>
                                <div class="col-sm-9">
                                    <textarea name="pesan" cols="30" rows="10" class="form-control" required="" placeholder="Isi Pesan Balasan..."></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer px-5">
                            <input type="hidden" name="id" value="{{ $dta->id }}">
                            <button type="button" class="btn btn-light" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-info text-white">Kirim Pesan</button>
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
                        <a href="{{ url('admin-access/delete/pesan/' . $dta->id) }}" role="button"
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

@php
    $pesan = $data->where('status', 'new')->get();
    foreach ($pesan as $psn) {
        $psn->status = 'read';
        $psn->save();
    }
@endphp
