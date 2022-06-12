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
                                    <form method="post" action="{{ url('admin-access/store/dataaparatur') }}"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label class="text-dark">Judul Galeri</label>
                                            <input type="text" class="form-control" name="judul"
                                                placeholder="Judul Galeri..." required="" autocomplete="off" id="judul">
                                        </div>
                                    </form>
                                    <h4 class="text-center">Upload Foto</h4>
                                    <form action="{{ url('admin-access/config') }}" class="dropzone mb-4"
                                        id="my-dropzone"
                                        style="border-style: dashed; border-radius: 10px; min-height: 300px;">
                                        @csrf
                                    </form>
                                    <button class="btn btn-primary" id="simpan-data">Simpan Data</button>
                                    <a href="{{ url('admin-access/galeri/arsip-galeri') }}"
                                        class="btn btn-light">Kembali</a>
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

        Dropzone.options.myDropzone = {
            timeout: 60000 * 120,
            acceptedFiles: 'image/*',
            dictDefaultMessage: '<div class="pt-5"><h5><i class="text-muted">Klik untuk memilih foto</i></h5></div>',
            init: function() {
                this.on("addedfile", function(file) {
                    formData.append('file[]', file);
                });
            },
            error: function(file, error) {
                toastr.error(error, "Terjadi Kesalahan");
                this.removeFile(file);
            }
        };
        $(document).ready(function() {
            $(document).find('#galeri').addClass('mm-active');

            $('#simpan-data').click(function(e) {
                e.preventDefault();

                $('#preloader').fadeOut(500);
                $('#main-wrapper').removeClass('show');
                $(document.body).css({'cursor' : 'wait'});

                var judul = $('#judul').val()
                formData.append('judul', judul);

                // $.ajax({
                //     url: "{{ url('/createlaporan') }}",
                //     enctype: "multipart/form-data",
                //     method: "POST",
                //     headers: headers,
                //     data: formData,
                //     xhr: function() {
                //         var xhr = new window.XMLHttpRequest();
                //         xhr.upload.addEventListener('progress', function(evt) {
                //             if (evt.lengthComputable) {
                //                 $("#loading, .loader").removeAttr('hidden');
                //             }
                //         }, false);
                //         return xhr;
                //     },
                //     success: function(data) {
                //         $("#loading, .loader").attr('hidden', '');
                //         Swal.fire({
                //             title: 'Berhasil Diproses',
                //             text: 'Laporan berhasil dibuat',
                //             type: 'success',
                //             onClose: () => {
                //                 location.href = "{{ url('/laporan') }}";
                //             }
                //         });
                //     },
                //     contentType: false,
                //     processData: false,
                // });
            });
        });
    </script>
@endsection
