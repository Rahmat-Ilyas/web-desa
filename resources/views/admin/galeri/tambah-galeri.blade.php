@extends('admin.layout')
@section('content')
    @php
    $data = new App\Models\Galeri();
    $get = $data->get();
    @endphp
    <div class="content-body">
        <div class="container-fluid">
            <div class="row page-titles mx-0">
                <div class="col-sm-6 p-md-0">
                    <div class="welcome-text">
                        <h4>Galeri</h4>
                        {{-- <p class="mb-0">Your business dashboard template</p> --}}
                    </div>
                </div>
                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Admin Page</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('admin-access/galeri/arsip-galeri') }}">Galeri</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Tambah Galeri</a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->
            <div class="row">
                <div class="col-xl-12 col-xxl-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Tambah Galeri Baru</h4>
                        </div>
                        <hr class="mb-0">
                        <div class="card-body mt-0">
                            <div class="row justify-content-center">
                                <div class="col-sm-8">
                                    <div class="form-group">
                                        <label class="text-dark">Judul Galeri</label>
                                        <input type="text" class="form-control" name="judul" placeholder="Judul Galeri..." autocomplete="off" id="judul">
                                    </div>
                                    <div class="form-group">
                                        <label class="text-dark">Keterangan Galeri</label>
                                        <textarea type="text" class="form-control" name="keterangan" placeholder="Keterangan Galeri..." rows="6" id="keterangan"></textarea>
                                    </div>
                                    <h4 class="text-center">Upload Foto</h4>
                                    <form action="{{ url('admin-access/config') }}" class="dropzone mb-4"
                                        id="my-dropzone"
                                        style="border-style: dashed; border-radius: 10px; min-height: 300px;">
                                        @csrf
                                    </form>
                                    <button class="btn btn-primary btn-act" id="simpan-data">Simpan Data</button>
                                    <a href="{{ url('admin-access/galeri/arsip-galeri') }}"
                                        class="btn btn-dark btn-act">Kembali</a>
                                </div>
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
        var formData = new FormData();
        var glob_dropzone;

        Dropzone.options.myDropzone = {
            timeout: 60000 * 120,
            acceptedFiles: 'image/*',
            maxFilesize: 2,
            dictDefaultMessage: '<div class="pt-5"><h5><i class="text-muted">Klik untuk memilih foto</i></h5></div>',
            init: function() {
                this.on("addedfile", function(file) {
                    formData.append('foto[]', file);
                });
                glob_dropzone = this;
            },
            error: function(file, error) {
                toastr.error(error, "Terjadi Kesalahan");
                this.removeFile(file);
            }
        };

        $(document).ready(function() {
            $(document).find('#galeri').addClass('mm-active');

            var headers = {
                "Accept": "application/json",
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
            }

            $('#simpan-data').click(function(e) {
                e.preventDefault();

                var judul = $('#judul').val()
                var keterangan = $('#keterangan').val()
                formData.append('judul', judul);
                formData.append('keterangan', keterangan);

                $.ajax({
                    url: "{{ url('admin-access/store/galeri') }}",
                    enctype: "multipart/form-data",
                    method: "POST",
                    headers: headers,
                    data: formData,
                    xhr: function() {
                        var xhr = new window.XMLHttpRequest();
                        xhr.upload.addEventListener('progress', function(evt) {
                            if (evt.lengthComputable) {
                                $(document.body).css({
                                    'pointer-events': 'none'
                                });
                                $('#preloader').fadeIn(500);
                                $('#main-wrapper').removeClass('show');
                            }
                        }, false);
                        return xhr;
                    },
                    success: function(data) {
                        formData = new FormData();
                        Dropzone.forElement("form#my-dropzone").removeAllFiles(true);
                        toastr.success("Data Galeri berhasil ditambah", "Berhasil Diproses", {
                            timeOut: 800,
                            onHidden: function() {
                                window.location.href =
                                    "{{ url('admin-access/galeri/arsip-galeri') }}";
                            }
                        });
                    },
                    error: function(data) {
                        $(document.body).css({
                            'pointer-events': 'auto'
                        });
                        $('#preloader').fadeIn(500);
                        $('#main-wrapper').addClass('show');
                        var errors = data.responseJSON;

                        $.each(errors.errors, function(key, value) {
                            toastr.error(value, "Gagal");
                        });
                    },

                    contentType: false,
                    processData: false,
                });
            });
        });
    </script>
@endsection
