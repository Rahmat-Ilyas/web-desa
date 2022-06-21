@extends('admin.layout')
@section('content')
    @php
    $data = new App\Models\Aparatur();
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
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Aparatur</a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->
            <div class="row">
                <div class="col-xl-12 col-xxl-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Data Aparat Desa</h4>
                            <button class="btn btn-primary" data-toggle="modal" data-target="#modal-add"><i
                                    class="fa fa-plus"></i> Tambah Data Aparatur Desa</button>
                        </div>
                        <hr class="mb-0">
                        <div class="card-body mt-0">
                            <div class="table-responsive">
                                <table class="table table-striped datatable">
                                    <thead>
                                        <tr>
                                            <th width="10">No</th>
                                            <th>Foto</th>
                                            <th>Nama</th>
                                            <th>Jabatan</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Tempat Lahir</th>
                                            <th>Tanggal Lahir</th>
                                            <th>Pendidikan Terakhir</th>
                                            <th>Alamat</th>
                                            <th>Telepon</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($get as $i => $dta)
                                            <tr class="text-dark">
                                                <td>{{ $i + 1 }}</td>
                                                <td width="100">
                                                    <img src="{{ asset('images/aparatur/' . $dta->foto) }}" width="100"
                                                        height="120">
                                                </td>
                                                <td>{{ $dta->nama }}</td>
                                                <td>{{ $dta->jabatan }}</td>
                                                <td>{{ $dta->jenis_kelamin }}</td>
                                                <td>{{ $dta->tempat_lahir }}</td>
                                                <td>{{ date('d/m/Y', strtotime($dta->tanggal_lahir)) }}</td>
                                                <td>{{ $dta->pendidikan }}</td>
                                                <td>{{ $dta->alamat }}</td>
                                                <td>{{ $dta->telepon }}</td>
                                                <td width="80" class="text-center">
                                                    <button class="btn btn-sm btn-success text-white" data-toggle="modal"
                                                        data-toggle1="tooltip" title="Edit Data"
                                                        data-target="#modal-edit{{ $dta->id }}"><i
                                                            class="fa fa-edit"></i></button>
                                                    <button class="btn btn-sm btn-danger" data-toggle="modal"
                                                        data-toggle1="tooltip" title="Hapus"
                                                        data-target="#modal-del{{ $dta->id }}"><i
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

    <div class="modal fade" id="modal-add" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Aparatur</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="{{ url('admin-access/store/dataaparatur') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body px-3">
                        <div class="form-group row">
                            <label class="col-form-label col-sm-3">Nama</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="nama" placeholder="Nama..."
                                    required="" autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-sm-3">Jabatan</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="jabatan" placeholder="Jabatan..."
                                    required="" autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-sm-3">Jenis Kelamin</label>
                            <div class="col-sm-9">
                                <select name="jenis_kelamin" class="form-control" required="">
                                    <option value="Laki-laki">Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-sm-3">Tempat Lahir</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="tempat_lahir" placeholder="Tempat Lahir..."
                                    required="" autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-sm-3">Tanggal Lahir</label>
                            <div class="col-sm-9">
                                <input type="date" class="form-control" name="tanggal_lahir"
                                    placeholder="Tanggal Lahir..." required="" autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-sm-3">Pendidikan Terakhir</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="pendidikan"
                                    placeholder="Pendidikan Terakhir..." required="" autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-sm-3">Alamat</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" name="alamat" placeholder="Alamat..." required=""></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-sm-3">Telepon</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" name="telepon" placeholder="Telepon..."
                                    required="" autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-sm-3">Foto</label>
                            <div class="col-sm-9">
                                <input type="file" class="form-control" name="foto_upload" required=""
                                    autocomplete="off">
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
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Data Aparatur</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="post" action="{{ url('admin-access/update/dataaparatur') }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body px-4">
                            <div class="form-group row">
                                <label class="col-form-label col-sm-3">Nama</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="nama" placeholder="Nama..."
                                        required="" autocomplete="off" value="{{ $dta->nama }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-sm-3">Jabatan</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="jabatan" placeholder="Jabatan..."
                                        required="" autocomplete="off" value="{{ $dta->jabatan }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-sm-3">Jenis Kelamin</label>
                                <div class="col-sm-9">
                                    <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                                        <option value="Laki-laki">Laki-laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                </div>
                                <script>
                                    document.getElementById('jenis_kelamin').value = "{{ $dta->jenis_kelamin }}";
                                </script>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-sm-3">Tempat Lahir</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="tempat_lahir"
                                        placeholder="Tempat Lahir..." required="" autocomplete="off" value="{{ $dta->tempat_lahir }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-sm-3">Tanggal Lahir</label>
                                <div class="col-sm-9">
                                    <input type="date" class="form-control" name="tanggal_lahir"
                                        placeholder="Tanggal Lahir..." required="" autocomplete="off" value="{{ $dta->tanggal_lahir }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-sm-3">Pendidikan Terakhir</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="pendidikan"
                                        placeholder="Pendidikan Terakhir..." required="" autocomplete="off" value="{{ $dta->pendidikan }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-sm-3">Alamat</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" name="alamat" placeholder="Alamat..." required="">{{ $dta->alamat }}</textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-sm-3">Telepon</label>
                                <div class="col-sm-9">
                                    <input type="number" class="form-control" name="telepon" placeholder="Telepon..."
                                        required="" autocomplete="off" value="{{ $dta->telepon }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-sm-3">Foto</label>
                                <div class="col-sm-9">
                                    <input type="file" class="form-control" name="foto_upload" autocomplete="off">
                                    <span class="text-info">Note: Kosongkan jika tidak diganti</span>
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
                        <a href="{{ url('admin-access/delete/dataaparatur/' . $dta->id) }}" role="button"
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
