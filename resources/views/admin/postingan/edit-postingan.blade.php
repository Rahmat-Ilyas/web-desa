@extends('admin.layout')
@section('content')
    @php
    $data = new App\Models\Postingan();
    $dta = $data->where('slug', $id)->first();
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
                            <form action="{{ url('admin-access/update/postingan') }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label class="text-dark font-weight-bold">Judul Postingan</label>
                                    <input type="text" class="form-control" name="judul" placeholder="Judul Postingan..."
                                        autocomplete="off" id="judul" required="" value="{{ $dta->judul }}">
                                </div>
                                <div class="row">
                                    <div class="col-sm-5">
                                        <div class="form-group">
                                            <label class="text-dark font-weight-bold">Kategori Postingan</label>
                                            <select name="kategori" id="kategori_edt" class="form-control" required="" id="">
                                                <option value="Berita">Berita</option>
                                                <option value="Artikel">Artikel</option>
                                                <option value="Bumdes">Bumdes</option>
                                                <option value="Produk Hukum">Produk Hukum</option>
                                                <option value="Potensi Desa">Potensi Desa</option>
                                                <option value="Lembaga Desa">Lembaga Desa</option>
                                                <option value="Program Desa">Program Desa</option>
                                            </select>
                                        </div>
                                        <script>
                                            document.getElementById('kategori_edt').value = "{{ $dta->kategori }}";
                                        </script>
                                    </div>
                                    <div class="col-sm-7">
                                        <div class="form-group">
                                            <label class="text-dark font-weight-bold">Topik</label>
                                            <input type="text" class="form-control" name="topik" placeholder="Topik..."
                                                autocomplete="off" id="" required="" value="{{ $dta->topik }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-5">
                                        <div class="form-group">
                                            <label class="text-dark font-weight-bold">Foto Sampul Postingan</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" name="foto_sampul">
                                                    <label class="custom-file-label">Upload foto sampul</label>
                                                </div>
                                                <div class="input-group-append">
                                                    <a href="#"  class="btn btn-info text-white" data-toggle="modal"
                                                data-target="#modal-sampul"><i class="fa fa-photo"></i> Lihat Sampul</a>
                                                </div>
                                            </div>
                                            <span class="text-info">Note: Biarkan kosong jika tidak diganti</span>
                                        </div>
                                    </div>
                                    <div class="col-sm-7">
                                        <div class="form-group">
                                            <label class="text-dark font-weight-bold">Tags</label>
                                            <div class="tags-default">
                                                <input type="text" class="form-control" name="tags" style="width: 100%"
                                                    placeholder="Tambah Tags" autocomplete="off" data-role="tagsinput" required="" value="{{ $dta->tags }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="css-control css-control-primary css-checkbox text-dark" for="val-terms">
                                        <input type="checkbox" class="css-control-input mr-2" id="val-terms"
                                            name="utama" value="1" {{ ($dta->utama == true) ? 'checked' : '' }}>
                                        <span class="css-control-indicator"></span>Atur sebagai post utama?
                                    </label>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <h4 class="text-center">Tulis Konten Postingan</h4>
                                    <textarea name="konten" required="" class="summernote">{{ $dta->konten }}</textarea>
                                </div>
                                <div class="row justify-content-end">
                                    <div class="col-sm-2 p-1">
                                        <a href="{{ url('admin-access/postingan/detail-postingan/'.$id) }}" class="btn btn-dark btn-xl btn-block">Batal</a>
                                    </div> 
                                    <div class="col-sm-2 p-1">
                                        <input type="hidden" name="id" value="{{ $dta->id }}">
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

    <div class="modal fade" id="modal-sampul" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <img src="{{ asset('/images/postingan/sampul/' . $dta->foto_sampul) }}" style="width: 100%" alt="">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-dismiss="modal">Tutup</button>
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

        $(document).find('#postingan').addClass('mm-active').find('.mm-collapse').addClass('mm-show').find(
                '#view-post').addClass('mm-active').find('a').addClass('mm-active');
    </script>
@endsection
