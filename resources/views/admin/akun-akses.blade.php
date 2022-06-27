@extends('admin.layout')
@section('content')
    @php
    $data = new App\Models\Admin();
    $get = $data->where('role', '!=', 'super_admin')->get();
    @endphp
    <div class="content-body">
        <div class="container-fluid">
            <div class="row page-titles mx-0">
                <div class="col-sm-6 p-md-0">
                    <div class="welcome-text">
                        <h4>Kelola Akun Akses</h4>
                        {{-- <p class="mb-0">Your business dashboard template</p> --}}
                    </div>
                </div>
                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Admin Page</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Kelola Akun Akses</a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->
            <div class="row">
                <div class="col-xl-12 col-xxl-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Kelola Akun Akses</h4>
                            <button class="btn btn-primary" data-toggle="modal" data-target="#modal-add"><i
                                    class="fa fa-plus"></i> Tambah Akun Akses</button>
                        </div>
                        <hr class="mb-0">
                        <div class="card-body mt-0">
                            <div class="table-responsive">
                                <table class="table table-striped datatable">
                                    <thead>
                                        <tr>
                                            <th width="10">No</th>
                                            <th>Nama Lengkap</th>
                                            <th>Username</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($get as $i => $dta)
                                            <tr class="text-dark">
                                                <td>{{ $i + 1 }}</td>
                                                <td>{{ $dta->nama }}</td>
                                                <td>{{ $dta->username }}</td>
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

    <div class="modal fade" id="modal-add" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Akun Akses</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="{{ url('admin-access/store/akun') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body px-5">
                        <div class="form-group row">
                            <label class="col-form-label col-sm-3">Nama Lengkap</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="nama" placeholder="Nama Lengkap..."
                                    required="" autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-sm-3">Username</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="username" placeholder="Username..."
                                    required="" autocomplete="off">
                                <span class="text-info">Note: Password default sama dengan username</span>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @foreach ($get as $dta)
        <div class="modal fade" id="modal-edit{{ $dta->id }}" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Data Akun</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="post" action="{{ url('admin-access/update/akun') }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body px-5">
                            <div class="form-group row">
                                <label class="col-form-label col-sm-3">Nama Lengkap</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="nama"
                                        placeholder="Nama Lengkap..." required="" autocomplete="off"
                                        value="{{ $dta->nama }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-sm-3">Username</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="username" placeholder="Username..."
                                        required="" autocomplete="off" value="{{ $dta->username }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-sm-3">Password</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="password" placeholder="Password..." autocomplete="off">
                                    <span class="text-info">Note: Biarkan losong jika tidak diganti</span>
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
                        <a href="{{ url('admin-access/delete/akun/' . $dta->id) }}" role="button"
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
