@extends('admin.layout')
@section('content')
    @php
        $data = new App\Models\Penduduk();
        $get = $data->get();
    @endphp
    <div class="content-body">
        <div class="container-fluid">
            <div class="row page-titles mx-0">
                <div class="col-sm-6 p-md-0">
                    <div class="welcome-text">
                        <h4>Data Penduduk</h4>
                        {{-- <p class="mb-0">Your business dashboard template</p> --}}
                    </div>
                </div>
                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Admin Page</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Data Penduduk</a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->
            <div class="row">
                <div class="col-xl-12 col-xxl-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Kelola Data Penduduk</h4>
                            <div>
                                <div class="btn-group" role="group">
                                    <button type="button" class="btn btn-dark dropdown-toggle" data-toggle="dropdown"
                                        aria-expanded="false"><i class="fa fa-file-excel-o"></i> Import Data
                                        Penduduk</button>
                                    <div class="dropdown-menu" x-placement="bottom-start"
                                        style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 35px, 0px);">
                                        <a class="dropdown-item" href="#" data-toggle="modal"
                                            data-target="#modal-import">Import File Excel</a>
                                        <a class="dropdown-item"
                                            href="{{ url('format-import-data-penduduk.xlsx') }}">Download Format
                                            Excel</a>
                                    </div>
                                </div>
                                <button class="btn btn-primary" data-toggle="modal" data-target="#modal-add"><i
                                        class="fa fa-plus"></i> Tambah Data Penduduk</button>
                            </div>
                        </div>
                        <hr class="mb-0">
                        <div class="card-body mt-0">
                            <div class="table-responsive">
                                <table class="table table-striped datatable">
                                    <thead>
                                        <tr>
                                            <th width="10">No</th>
                                            <th>Nik</th>
                                            <th>Nama</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Tempat & Tggl Lahir </th>
                                            <th>Alamat </th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($get as $i => $dta)
                                            <tr class="text-dark">
                                                <td>{{ $i + 1 }}</td>
                                                <td>{{ $dta->nik }}</td>
                                                <td>{{ $dta->nama }}</td>
                                                <td>{{ $dta->jenis_kelamin }}</td>
                                                <td>{{ $dta->tempat_lahir . ', ' . date('d/m/Y', strtotime($dta->tanggal_lahir)) }}
                                                </td>
                                                <td>{{ $dta->alamat }}</td>
                                                <td width="120" class="text-center">
                                                    <button class="btn btn-sm btn-dark text-white" data-toggle="modal"
                                                        data-target="#modal-detail{{ $dta->id }}"
                                                        data-toggle1="tooltip" title="Detail Data Penduduk"><i
                                                            class="fa fa-list"></i></button>
                                                    <button class="btn btn-sm btn-info text-white" data-toggle="modal"
                                                        data-target="#modal-edit{{ $dta->id }}" data-toggle1="tooltip"
                                                        title="Edit Data Penduduk"><i class="fa fa-edit"></i></button>
                                                    <button class="btn btn-sm btn-danger" data-toggle="modal"
                                                        data-target="#modal-del{{ $dta->id }}" data-toggle1="tooltip"
                                                        title="Hapus Data Penduduk"><i class="fa fa-trash"></i></button>
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
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Penduduk</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="{{ url('admin-access/store/penduduk') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body px-5">
                        <div class="form-group row">
                            <label class="col-form-label col-sm-3">NIK</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" name="nik" required="" autocomplete="off"
                                    placeholder="NIK..">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-sm-3">Nama</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="nama" placeholder="Nama..."
                                    required="" autocomplete="off" value="{{ old('nama') }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-sm-3">Jenis Kelamin</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="jenis_kelamin" id="opt-jenis_kelamin" required="">
                                    <option>Laki-laki</option>
                                    <option>Perempuan</option>
                                </select>
                                <script>
                                    document.getElementById('opt-jenis_kelamin').value = "{{ old() ? old('jenis_kelamin') : 'Laki-laki' }}"
                                </script>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-sm-3">Tempat Lahir</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="tempat_lahir"
                                    placeholder="Tempat Lahir..." required="" autocomplete="off"
                                    value="{{ old('tempat_lahir') }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-sm-3">Tanggal Lahir</label>
                            <div class="col-sm-9">
                                <input type="date" class="form-control" name="tanggal_lahir"
                                    placeholder="Tanggal Lahir..." required="" autocomplete="off"
                                    value="{{ old('tanggal_lahir') }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-sm-3">Alamat</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="alamat" placeholder="Alamat..."
                                    required="" autocomplete="off" value="{{ old('alamat') }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-sm-3">Agama</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="agama" id="opt-agama" required="">
                                    <option>Islam</option>
                                    <option>Kristen</option>
                                    <option>Khatolik</option>
                                    <option>Hindu</option>
                                    <option>Budha</option>
                                    <option>Konghucu</option>
                                </select>
                                <script>
                                    document.getElementById('opt-agama').value = "{{ old() ? old('agama') : 'Islam' }}"
                                </script>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-sm-3">Pemilih Tetap</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="pemilih_tetap" id="opt-pemilih_tetap" required="">
                                    <option value="1">Ya</option>
                                    <option value="0">Tidak</option>
                                </select>
                                <script>
                                    document.getElementById('opt-pemilih_tetap').value = "{{ old() ? old('pemilih_tetap') : '1' }}"
                                </script>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-sm-3">Pendidikan</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="pendidikan" id="opt-pendidikan" required="">
                                    <option>Tidak/Belum Sekolah</option>
                                    <option>Tidak Tamat SD/Sederajat</option>
                                    <option>Tamat SD/Sederajat</option>
                                    <option>SMP/Sederajat</option>
                                    <option>SMA/Sederajat</option>
                                    <option>Diploma I/II</option>
                                    <option>Akademi/Diploma III/S.Muda</option>
                                    <option>Diploma IV/Strata I</option>
                                    <option>Strata II</option>
                                    <option>Strata III</option>
                                </select>
                                <script>
                                    document.getElementById('opt-pendidikan').value = "{{ old() ? old('pendidikan') : 'Tidak/Belum Sekolah' }}"
                                </script>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-sm-3">Status Perkawinan</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="status" id="opt-status" required="">
                                    <option>Belum Menikah</option>
                                    <option>Menikah</option>
                                    <option>Duda/Janda</option>
                                </select>
                                <script>
                                    document.getElementById('opt-status').value = "{{ old() ? old('status') : 'Belum Menikah' }}"
                                </script>
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

    <div class="modal fade" id="modal-import" role="dialog" style="z-index: 9999" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus Data Penduduk</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="{{ url('admin-access/import/penduduk') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <label class="text-dark">Upload File</label>
                        <input type="file" class="form-control" name="data_penduduk" placeholder="Tanggal Lahir..."
                            required="">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Import</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @foreach ($get as $dta)
        <div class="modal fade" id="modal-detail{{ $dta->id }}" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Detail Data Penduduk</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="basic-list-group">
                            <ul class="list-group-flush">
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <b class="text-dark">NIK</b>
                                    <span class="text-dark">{{ $dta->nik }}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <b class="text-dark">NAMA LENGKAP</b>
                                    <span class="text-dark">{{ $dta->nama }}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <b class="text-dark">JENIS KELAMIN</b>
                                    <span class="text-dark">{{ $dta->jenis_kelamin }}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <b class="text-dark">TEMPAT LAHIR</b>
                                    <span class="text-dark">{{ $dta->tempat_lahir }}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <b class="text-dark">TANGGAL LAHIR</b>
                                    <span class="text-dark">{{ date('d/m/Y', strtotime($dta->tanggal_lahir)) }}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <b class="text-dark">ALAMAT</b>
                                    <span class="text-dark">{{ $dta->alamat }}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <b class="text-dark">AGAMA</b>
                                    <span class="text-dark">{{ $dta->agama }}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <b class="text-dark">PEMILIH TETAP</b>
                                    <span class="text-dark">{{ $dta->pemilih_tetap == 1 ? 'Ya' : 'Tidak' }}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <b class="text-dark">PENDIDIKAN</b>
                                    <span class="text-dark">{{ $dta->pendidikan }}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <b class="text-dark">STATUS</b>
                                    <span class="text-dark">{{ $dta->status }}</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="modal-edit{{ $dta->id }}" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Data Penduduk</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="post" action="{{ url('admin-access/update/penduduk') }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body px-5">
                            <div class="form-group row">
                                <label class="col-form-label col-sm-3">NIK</label>
                                <div class="col-sm-9">
                                    <input type="number" class="form-control" name="nik" required=""
                                        autocomplete="off" placeholder="NIK.." value="{{ $dta->nik }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-sm-3">Nama</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="nama" placeholder="Nama..."
                                        required="" autocomplete="off"
                                        value="{{ old('id') == $dta->id ? old('nama') : $dta->nama }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-sm-3">Jenis Kelamin</label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="jenis_kelamin"
                                        id="eopt-jenis_kelamin{{ $dta->id }}" required="">
                                        <option>Laki-laki</option>
                                        <option>Perempuan</option>
                                    </select>
                                    <script>
                                        document.getElementById('eopt-jenis_kelamin{{ $dta->id }}').value =
                                            "{{ old('id') == $dta->id ? old('jenis_kelamin') : $dta->jenis_kelamin }}"
                                    </script>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-sm-3">Tempat Lahir</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="tempat_lahir"
                                        placeholder="Tempat Lahir..." required="" autocomplete="off"
                                        value="{{ old('id') == $dta->id ? old('tempat_lahir') : $dta->tempat_lahir }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-sm-3">Tanggal Lahir</label>
                                <div class="col-sm-9">
                                    <input type="date" class="form-control" name="tanggal_lahir"
                                        placeholder="Tanggal Lahir..." required="" autocomplete="off"
                                        value="{{ old('id') == $dta->id ? old('tanggal_lahir') : $dta->tanggal_lahir }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-sm-3">Alamat</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="alamat" placeholder="Alamat..."
                                        required="" autocomplete="off"
                                        value="{{ old('id') == $dta->id ? old('alamat') : $dta->alamat }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-sm-3">Agama</label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="agama" id="eopt-agama{{ $dta->id }}"
                                        required="">
                                        <option>Islam</option>
                                        <option>Kristen</option>
                                        <option>Khatolik</option>
                                        <option>Hindu</option>
                                        <option>Budha</option>
                                        <option>Konghucu</option>
                                    </select>
                                    <script>
                                        document.getElementById('eopt-agama{{ $dta->id }}').value =
                                            "{{ old('id') == $dta->id ? old('agama') : $dta->agama }}"
                                    </script>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-sm-3">Pemilih Tetap</label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="pemilih_tetap"
                                        id="eopt-pemilih_tetap{{ $dta->id }}" required="">
                                        <option value="1">Ya</option>
                                        <option value="0">Tidak</option>
                                    </select>
                                    <script>
                                        document.getElementById('eopt-pemilih_tetap{{ $dta->id }}').value =
                                            "{{ old('id') == $dta->id ? old('pemilih_tetap') : $dta->pemilih_tetap }}"
                                    </script>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-sm-3">Pendidikan</label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="pendidikan"
                                        id="eopt-pendidikan{{ $dta->id }}" required="">
                                        <option>Tidak/Belum Sekolah</option>
                                        <option>Tidak Tamat SD/Sederajat</option>
                                        <option>Tamat SD/Sederajat</option>
                                        <option>SMP/Sederajat</option>
                                        <option>SMA/Sederajat</option>
                                        <option>Diploma I/II</option>
                                        <option>Akademi/Diploma III/S.Muda</option>
                                        <option>Diploma IV/Strata I</option>
                                        <option>Strata II</option>
                                        <option>Strata III</option>
                                    </select>
                                    <script>
                                        document.getElementById('eopt-pendidikan{{ $dta->id }}').value =
                                            "{{ old('id') == $dta->id ? old('pendidikan') : $dta->pendidikan }}"
                                    </script>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-sm-3">Status Perkawinan</label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="status" id="eopt-status{{ $dta->id }}"
                                        required="">
                                        <option>Belum Menikah</option>
                                        <option>Menikah</option>
                                        <option>Duda/Janda</option>
                                    </select>
                                    <script>
                                        document.getElementById('eopt-status{{ $dta->id }}').value =
                                            "{{ old('id') == $dta->id ? old('status') : $dta->status }}"
                                    </script>
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
                        <h5 class="modal-title" id="exampleModalLabel">Hapus Data Penduduk</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Yakin ingin menghapus data ini?</p>
                    </div>
                    <div class="modal-footer">
                        <a href="{{ url('admin-access/delete/penduduk/' . $dta->id) }}" role="button"
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
