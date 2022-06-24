@extends('admin.layout')
@section('content')
    @php
    $data = new App\Models\Postingan();

    $show = 6;
    if (request()->get('kategori')) {
        $kategori = request()->get('kategori');
        $get = $data
            ->orderBy('id', 'desc')
            ->where('kategori', $kategori)
            ->paginate($show);
    } else {
        $get = $data->orderBy('id', 'desc')->paginate($show);
    }
    @endphp
    <div class="content-body">
        <div class="container-fluid">
            <div class="row page-titles mx-0">
                <div class="col-sm-6 p-md-0">
                    <div class="welcome-text">
                        <h4>Lihat Postingan</h4>
                        {{-- <p class="mb-0">Your business dashboard template</p> --}}
                    </div>
                </div>
                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Admin Page</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Postingan</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Semua Postingan</a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->
            <div class="row">
                <div class="col-xl-12 col-xxl-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Arsip Postingan</h4>
                        </div>
                        <hr class="mb-0">
                        <div class="card-body mt-0">
                            <div class="row mb-0">
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label class="text-dark font-weight-bold">Lihat Berdasarkan Kategori</label>
                                        <select id="set-kategori" class="form-control">
                                            <option value="Semua Postingan">Semua Postingan</option>
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
                            </div>
                            <hr class="mt-0">
                            <div class="row">
                                <div class="col-sm-12 mb-3">
                                    <h3>{{ request()->get('kategori') ? request()->get('kategori') : 'Semua Postingan' }}
                                    </h3>
                                </div>
                                @foreach ($get as $dta)
                                    <div class="col-sm-4">
                                        <div class="card mb-3">
                                            <a href="{{ url('admin-access/postingan/detail-postingan/' . $dta->slug) }}">
                                                <img class="card-img-top img-fluid"
                                                    src="{{ asset('/images/postingan/sampul/' . $dta->foto_sampul) }}"
                                                    style="height: 250px">
                                            </a>
                                            <div class="card-header p-2" style="min-height: 60px;">
                                                <a
                                                    href="{{ url('admin-access/postingan/detail-postingan/' . $dta->slug) }}">
                                                    <h4
                                                        style="white-space: normal; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis;">
                                                        {{ $dta->judul }}
                                                    </h4>
                                                </a>
                                            </div>
                                            <div class="card-body pt-0 px-2">
                                                <h5>{{ $dta->topik }}</h5>
                                                <i class="fa fa-user"></i>
                                                <span>{{ $dta->admin->nama }}</span>
                                                &nbsp;&nbsp;|&nbsp;&nbsp;
                                                <i class="fa fa-clock-o"></i>
                                                <span>{{ date('d/m/Y H:i', strtotime($dta->created_at)) }}</span>
                                                &nbsp;&nbsp;|&nbsp;&nbsp;
                                                <i class="fa fa-eye"></i>
                                                <span>{{ $dta->view }} View</span>
                                                <div class="row pt-0">
                                                    <div class="col-sm-4">
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-footer">
                                                <span class="card-text d-inline text-dark">
                                                    Kategori Postingan: <span
                                                        style="text-transform: capitalize;"><b>{{ $dta->kategori }}</b></span>
                                                </span>
                                                <div class="pull-right">
                                                    <a href="{{ url('admin-access/postingan/detail-postingan/' . $dta->slug) }}"
                                                        class="btn btn-primary">Lihat artikel</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            @if (count($get) <= 0)
                                <div class="text-center mb-5 mt-5">
                                    <h2 class="text-muted font-italic">Tidak ada postingan ditemukan</h2>
                                </div>
                            @endif

                            <!--begin::Pagination-->
                            <div class="mb-10">
                                @if ($get->hasPages())
                                    <hr>
                                    <nav>
                                        <ul class="pagination pagination-sm pagination-circle">
                                            @if ($get->onFirstPage())
                                                <li class="page-item page-indicator disabled">
                                                    <a class="page-link" href="javascript:void()">
                                                        <i class="icon-arrow-left"></i></a>
                                                </li>
                                            @else
                                                <li class="page-item page-indicator">
                                                    <a class="page-link" href="{{ $get->previousPageUrl() }}{{ request()->get('kategori') ? '&kategori='.request()->get('kategori') : '' }}">
                                                        <i class="icon-arrow-left"></i></a>
                                                </li>
                                            @endif
                                            @for ($i = 1; $i <= ceil($get->total() / $show); $i++)
                                                <li class="page-item {{ $i == $get->currentPage() ? 'active' : '' }}">
                                                    <a class="page-link"
                                                        href="{{ $get->url($i) }}{{ request()->get('kategori') ? '&kategori='.request()->get('kategori') : '' }}">{{ $i }}</a>
                                                </li>
                                            @endfor

                                            @if ($get->hasMorePages())
                                                <li class="page-item page-indicator">
                                                    <a class="page-link" href="{{ $get->nextPageUrl() }}{{ request()->get('kategori') ? '&kategori='.request()->get('kategori') : '' }}">
                                                        <i class="icon-arrow-right"></i></a>
                                                </li>
                                            @else
                                                <li class="page-item page-indicator disabled">
                                                    <a class="page-link" href="javascript:void()">
                                                        <i class="icon-arrow-right"></i></a>
                                                </li>
                                            @endif

                                        </ul>
                                    </nav>
                                @endif
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
        $('.summernote').summernote({
            tabsize: 6,
            height: 800
        });

        $('#set-kategori').change(function(e) {
            e.preventDefault();

            var val = $(this).val();
            if (val == 'Semua Postingan') location.href = "{{ url()->current() }}";
            else location.href = "{{ url()->current() }}?kategori=" + val;
        });

        @if (request()->get('kategori'))
            $('#set-kategori').val("{{ request()->get('kategori') }}");
        @endif

        $(document).find('#postingan').addClass('mm-active').find('.mm-collapse').addClass('mm-show').find(
                '#view-post').addClass('mm-active').find('a').addClass('mm-active');
    </script>
@endsection
