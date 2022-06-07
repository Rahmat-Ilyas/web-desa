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
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($get as $i => $dta)
                                        <tr>
                                            <td>{{ $i + 1 }}</td>
                                            <td>System Architect</td>
                                            <td>{{ $dta->nama }}</td>
                                            <td>{{ $dta->jabatan }}</td>
                                            <td>2011/04/25</td>
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
@endsection

@section('javascript')
    <script>
        $(document).ready(function() {
            $('.datatable').DataTable();
        });
    </script>
@endsection
