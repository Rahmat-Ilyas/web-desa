@extends('admin.layout')
@section('content')
    @php
    $data = new App\Models\Apbdes();
    $pendapatan = $data->where('jenis', 'pendapatan')->get();
    $belanja = $data->where('jenis', 'belanja')->get();
    @endphp
    <div class="content-body">
        <div class="container-fluid">
            <div class="row page-titles mx-0">
                <div class="col-sm-6 p-md-0">
                    <div class="welcome-text">
                        <h4>Anggaran Desa</h4>
                        {{-- <p class="mb-0">Your business dashboard template</p> --}}
                    </div>
                </div>
                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Admin Page</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Profil & Iinformasi Desa</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Anggaran Desa</a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->
            <div class="row">
                <div class="col-xl-12 col-xxl-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Data Transparansi Anggaran Desa Tahun {{ date('Y') }}</h4>
                        </div>
                        <hr class="mb-0">
                        <div class="card-body mt-0">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="mb-4">
                                        <h4>Anggara Pendapatan Desa</h4>
                                    </div>
                                    <div class="form-group row mb-0">
                                        <div class="col-lg-12" style="margin-bottom: -20px;">
                                            <div data-repeater-item="" class="form-group row align-items-center">
                                                <div class="col-md-7">
                                                    <label class="text-dark"><b>Pendapatan:</b></label>
                                                </div>
                                                <div class="col-md-3">
                                                    <label class="text-dark"><b>Nilai (Rp):</b></label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="kt_repeater_1" class="mt-0">
                                        @foreach ($pendapatan as $pdp)
                                            <form action="{{ url('admin-access/update/anggaran') }}" method="post">
                                                @csrf
                                                <div class="form-group row mb-0">
                                                    <div data-repeater-list="" class="col-lg-12">
                                                        <div data-repeater-item=""
                                                            class="form-group row align-items-center">
                                                            <div class="col-md-7">
                                                                <input type="hidden" name="id" value="{{ $pdp->id }}">
                                                                <input type="text" class="form-control"
                                                                    placeholder="Input Keterangan..." name="keterangan"
                                                                    value="{{ $pdp->keterangan }}" required
                                                                    autocomplete="off" />
                                                                <div class="d-md-none mb-2"></div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <input type="text" class="form-control"
                                                                    placeholder="Input Nilai (Rp)..." name="nilai"
                                                                    value="{{ $pdp->nilai }}" required
                                                                    autocomplete="off" />
                                                                <div class="d-md-none mb-2"></div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <button type="submit" class="btn btn-sm btn-info text-white"
                                                                    data-toggle1="tooltip" title="Update">
                                                                    <i class="fa fa-edit"></i></button>
                                                                <a href="javascript:;"
                                                                    class="btn btn-sm btn-danger text-white"
                                                                    data-toggle="modal" data-toggle1="tooltip" title="Hapus"
                                                                    data-target="#modal-del{{ $pdp->id }}">
                                                                    <i class="fa fa-trash"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                            <div class="modal fade" id="modal-del{{ $pdp->id }}" role="dialog"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-sm" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Hapus Data
                                                            </h5>
                                                            <button type="button" class="close"
                                                                data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>Yakin ingin menghapus data ini?</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <a href="{{ url('admin-access/delete/anggaran/' . $pdp->id) }}"
                                                                role="button" class="btn btn-danger">Hapus</a>
                                                            <button type="button" class="btn btn-light"
                                                                data-dismiss="modal">Batal</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                        <form action="{{ url('admin-access/store/anggaran') }}" method="post">
                                            @csrf
                                            <div class="form-group row mb-0">
                                                <div data-repeater-list="" class="col-lg-12">
                                                    <div data-repeater-item="" class="form-group row align-items-center">
                                                        <div class="col-md-7">
                                                            <input type="hidden" name="jenis" value="pendapatan">
                                                            <input type="hidden" name="tahun" value="{{ date('Y') }}">
                                                            <input type="text" class="form-control" name="keterangan"
                                                                placeholder="Input Keterangan..." required
                                                                autocomplete="off" />
                                                            <div class="d-md-none mb-2"></div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <input type="text" class="form-control" name="nilai"
                                                                placeholder="Input Nilai (Rp)..." required
                                                                autocomplete="off" />
                                                            <div class="d-md-none mb-2"></div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <button type="submit" class="btn btn-sm btn-primary text-white">
                                                                <i class="fa fa-save"></i> Tambah</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        {{-- <div class="form-group row">
                                            <div class="col-lg-12">
                                                <a href="javascript:;" class="btn btn-sm font-weight-bolder btn-primary">
                                                    <i class="la la-plus"></i>Tambah Item</a>
                                            </div>
                                        </div> --}}
                                    </div>
                                </div>
                                <div class="col-sm-12 mb-2">
                                    <hr>
                                </div>
                                <div class="col-sm-12">
                                    <div class="mb-4">
                                        <h4>Anggara Belanja Desa</h4>
                                    </div>
                                    <div class="form-group row mb-0">
                                        <div class="col-lg-12" style="margin-bottom: -20px;">
                                            <div data-repeater-item="" class="form-group row align-items-center">
                                                <div class="col-md-7">
                                                    <label class="text-dark"><b>Belanja:</b></label>
                                                </div>
                                                <div class="col-md-3">
                                                    <label class="text-dark"><b>Nilai (Rp):</b></label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="kt_repeater_1" class="mt-0">
                                        @foreach ($belanja as $pdp)
                                            <form action="{{ url('admin-access/update/anggaran') }}" method="post">
                                                @csrf
                                                <div class="form-group row mb-0">
                                                    <div data-repeater-list="" class="col-lg-12">
                                                        <div data-repeater-item=""
                                                            class="form-group row align-items-center">
                                                            <div class="col-md-7">
                                                                <input type="hidden" name="id" value="{{ $pdp->id }}">
                                                                <input type="text" class="form-control"
                                                                    placeholder="Input Keterangan..." name="keterangan"
                                                                    value="{{ $pdp->keterangan }}" required
                                                                    autocomplete="off" />
                                                                <div class="d-md-none mb-2"></div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <input type="text" class="form-control"
                                                                    placeholder="Input Nilai (Rp)..." name="nilai"
                                                                    value="{{ $pdp->nilai }}" required
                                                                    autocomplete="off" />
                                                                <div class="d-md-none mb-2"></div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <button type="submit"
                                                                    class="btn btn-sm btn-info text-white">
                                                                    <i class="fa fa-edit"></i></button>
                                                                <a href="javascript:;"
                                                                    class="btn btn-sm btn-danger text-white"
                                                                    data-toggle="modal"
                                                                    data-target="#modal-del{{ $pdp->id }}">
                                                                    <i class="fa fa-trash"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                            <div class="modal fade" id="modal-del{{ $pdp->id }}" role="dialog"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-sm" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Hapus Data
                                                            </h5>
                                                            <button type="button" class="close"
                                                                data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>Yakin ingin menghapus data ini?</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <a href="{{ url('admin-access/delete/anggaran/' . $pdp->id) }}"
                                                                role="button" class="btn btn-danger">Hapus</a>
                                                            <button type="button" class="btn btn-light"
                                                                data-dismiss="modal">Batal</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                        <form action="{{ url('admin-access/store/anggaran') }}" method="post">
                                            @csrf
                                            <div class="form-group row mb-0">
                                                <div data-repeater-list="" class="col-lg-12">
                                                    <div data-repeater-item="" class="form-group row align-items-center">
                                                        <div class="col-md-7">
                                                            <input type="hidden" name="jenis" value="belanja">
                                                            <input type="hidden" name="tahun" value="{{ date('Y') }}">
                                                            <input type="text" class="form-control" name="keterangan"
                                                                placeholder="Input Keterangan..." required
                                                                autocomplete="off" />
                                                            <div class="d-md-none mb-2"></div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <input type="text" class="form-control" name="nilai"
                                                                placeholder="Input Nilai (Rp)..." required
                                                                autocomplete="off" />
                                                            <div class="d-md-none mb-2"></div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <button type="submit"
                                                                class="btn btn-sm btn-primary text-white">
                                                                <i class="fa fa-save"></i> Tambah</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        {{-- <div class="form-group row">
                                            <div class="col-lg-12">
                                                <a href="javascript:;" class="btn btn-sm font-weight-bolder btn-primary">
                                                    <i class="la la-plus"></i>Tambah Item</a>
                                            </div>
                                        </div> --}}
                                    </div>
                                </div>


                                {{-- <div class="col-sm-6">
                                    <h4>Anggara Pendapatan Desa</h4>
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped">
                                            <thead>
                                                <tr class="text-dark">
                                                    <th width="10">No</th>
                                                    <th>Pendapatan</th>
                                                    <th>Nilai (Rp)</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($data->where('jenis', 'pendapatan')->get() as $i => $dta)
                                                    <tr>
                                                        <td>{{ $i + 1 }}</td>
                                                        <td>{{ $dta->nama }}</td>
                                                        <td>{{ $dta->jabatan }}</td>
                                                        <td width="180" class="text-center">
                                                            <button class="btn btn-sm btn-success text-white"
                                                                data-toggle="modal"
                                                                data-target="#modal-edit{{ $dta->id }}"><i
                                                                    class="fa fa-edit"></i> Edit Data</button>
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
                                <div class="col-sm-6">
                                    <h4>Anggara Belanja Desa</h4>
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped">
                                            <thead>
                                                <tr class="text-dark">
                                                    <th width="10">No</th>
                                                    <th>Belanja</th>
                                                    <th>Nilai (Rp)</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($data->where('jenis', 'belanja')->get() as $i => $dta)
                                                    <tr>
                                                        <td>{{ $i + 1 }}</td>
                                                        <td>{{ $dta->nama }}</td>
                                                        <td>{{ $dta->jabatan }}</td>
                                                        <td width="180" class="text-center">
                                                            <button class="btn btn-sm btn-success text-white"
                                                                data-toggle="modal"
                                                                data-target="#modal-edit{{ $dta->id }}"><i
                                                                    class="fa fa-edit"></i> Edit Data</button>
                                                            <button class="btn btn-sm btn-danger" data-toggle="modal"
                                                                data-target="#modal-del{{ $dta->id }}"><i
                                                                    class="fa fa-trash"></i> Hapus</button>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div> --}}
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
                    <div class="modal-body px-5">
                        <div class="form-group row">
                            <label class="col-form-label col-sm-3">Nama</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="nama" placeholder="Nama..." required=""
                                    autocomplete="off">
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

    @foreach ($data->get() as $dta)
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
                        <div class="modal-body px-5">
                            <div class="form-group row">
                                <label class="col-form-label col-sm-3">Nama</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="nama" placeholder="Nama..." required=""
                                        autocomplete="off" value="{{ $dta->nama }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-sm-3">Jabatan</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="Jabatan" placeholder="Jabatan..."
                                        required="" autocomplete="off" value="{{ $dta->jabatan }}">
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
