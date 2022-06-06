@extends('admin.layout')
@section('content')
@php

@endphp
    <div class="content-body">
        <div class="container-fluid">
            <div class="row page-titles mx-0">
                <div class="col-sm-6 p-md-0">
                    <div class="welcome-text">
                        <h4>Sambutan Kepala Desa</h4>
                        {{-- <p class="mb-0">Your business dashboard template</p> --}}
                    </div>
                </div>
                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Profil & Iinformasi Desa</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Sambutan Kepala Desa</a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->
            <div class="row">
                <div class="col-xl-12 col-xxl-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Form Sambutan Kepala Desa</h4>
                        </div>
                        <hr class="mb-0">
                        <div class="card-body mt-0">
                            <form action="{{ url('admin-access/update/sambutan') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Foto Sampul Artikel</label>
                                            <input class="form-control" required="" type="file" name="file" placeholder="Default input">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <textarea name="konten" required="" class="summernote"></textarea>
                                </div>
                                <div class="row justify-content-end">
                                    <div class="col-sm-2">
                                        <input type="hidden" name="kategori" value="sambutan">
                                        <button type="submit" class="btn btn-primary btn-xl btn-block">Simpan</button>
                                    </div>
                                </div>
                            </form>
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
