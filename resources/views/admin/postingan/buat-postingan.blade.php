@extends('admin.layout')
@section('content')
    @php
    $data = new App\Models\Informasi();
    $get = $data->where('kategori', 'sambutan')->first();
    @endphp
    <div class="content-body">
        <div class="container-fluid">
            <div class="row page-titles mx-0">
                <div class="col-sm-6 p-md-0">
                    <div class="welcome-text">
                        <h4>Buat Postingan</h4>
                        {{-- <p class="mb-0">Your business dashboard template</p> --}}
                    </div>
                </div>
                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Admin Page</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Postingan</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Buat Postingan</a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->
            <div class="row">
                <div class="col-xl-12 col-xxl-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Buat Postingan Baru</h4>
                        </div>
                        <hr class="mb-0">
                        <div class="card-body mt-0">
                            <form action="{{ url('admin-access/store/postingan') }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label class="text-dark font-weight-bold">Judul Postingan</label>
                                    <input type="text" class="form-control" name="judul" placeholder="Judul Postingan..."
                                        autocomplete="off" id="judul" required="">
                                </div>
                                <div class="row">
                                    <div class="col-sm-5">
                                        <div class="form-group">
                                            <label class="text-dark font-weight-bold">Kategori Postingan</label>
                                            <select name="kategori" class="form-control" required="" id="">
                                                <option value="Berita">Berita</option>
                                                <option value="Artikel">Artikel</option>
                                                <option value="Bumdes">Bumdes</option>
                                                <option value="Produk Hukum">Produk Hukum</option>
                                                <option value="Potensi Desa">Potensi Desa</option>
                                                <option value="Lembaga Desa">Lembaga Desa</option>
                                                <option value="Program Desa">Program Desa</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-7">
                                        <div class="form-group">
                                            <label class="text-dark font-weight-bold">Topik</label>
                                            <input type="text" class="form-control" name="topik" placeholder="Topik..."
                                                autocomplete="off" id="" required="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-5">
                                        <div class="form-group">
                                            <label class="text-dark font-weight-bold">Foto Sampul Postingan</label>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" name="foto_sampul" required="">
                                                <label class="custom-file-label">Upload foto sampul</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-7">
                                        <div class="form-group">
                                            <label class="text-dark font-weight-bold">Tags</label>
                                            <div class="tags-default">
                                                <input type="text" class="form-control" name="tags" style="width: 100%"
                                                    placeholder="Tambah Tags" autocomplete="off" data-role="tagsinput" required="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="css-control css-control-primary css-checkbox text-dark" for="val-terms">
                                        <input type="checkbox" class="css-control-input mr-2" id="val-terms"
                                            name="utama" value="1">
                                        <span class="css-control-indicator"></span>Atur sebagai post utama?
                                    </label>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <h4 class="text-center">Tulis Konten Postingan</h4>
                                    <textarea name="konten" required="" class="summernote"></textarea>
                                </div>
                                <div class="row justify-content-end">
                                    <div class="col-sm-2">
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
