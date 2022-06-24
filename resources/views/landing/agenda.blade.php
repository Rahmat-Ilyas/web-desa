@extends('landing.layout')
@section('content')
    @php
    $agenda = new App\Models\Agenda();
    @endphp
    <!-- Breadcrumb -->
    <div class="container">
        <div class="headline bg0 flex-wr-sb-c p-tb-8">
            <div class="f2-s-1 p-r-30 m-tb-6">
                <a href="{{ url('/') }}" class="breadcrumb-item f1-s-3 cl9">
                    Home
                </a>
                <span class="breadcrumb-item f1-s-3 cl9">
                    Agenda Desa
                </span>
            </div>

            @include('landing.search')
            
        </div>
    </div>

    <!-- Content -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 p-b-30">
                <div class="p-r-10 p-r-0-sr991">
                    <!-- Blog Detail -->
                    <div class="p-b-20">
                        <a href="#" class="f1-s-10 cl2 hov-cl10 trans-03 text-uppercase">
                            Agenda Desa
                        </a>
                        <h3 class="f1-l-3 cl2 p-t-20 respon2">
                            Agenda Kegiatan Desa Rante Angin
                        </h3>

                        <div class="row m-t-20">
                            <div class="col-md-8">
                                <div class="row">
                                    <div class="col-sm-12 m-b-20 m-t-10">
                                        <div class="tab01-head how2 how2-cl5 bocl12 flex-s-c m-r-10 m-r-0-sr991">
                                            <!-- Brand tab -->
                                            <h3 class="f1-m-2 cl17 tab01-title">
                                                Tabel Agenda Kegiatan
                                            </h3>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="table-responsive-lg">
                                            <table class="table">
                                                <thead>
                                                    <tr class="thead-dark bg-info text-white">
                                                        <th>Tanggal</th>
                                                        <th>Pukul</th>
                                                        <th>Acara</th>
                                                        <th>Tempat</th>
                                                        <th>Ket</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($agenda->orderBy('tanggal', 'desc')->get() as $i => $dta)
                                                        <tr>
                                                            <td>{{ date('d M y', strtotime($dta->tanggal)) }}</td>
                                                            <td>{{ date('H:i', strtotime($dta->tanggal)) }}</td>
                                                            <td>{{ $dta->nama_agenda }}</td>
                                                            <td>{{ $dta->tempat }}</td>
                                                            @php
                                                                if (strtotime($dta->tanggal) <= strtotime(date('Y-m-d H:i:s'))) {
                                                                    $status = '<span class="badge badge-success badge-pill text-white">Done</span>';
                                                                } else {
                                                                    $status = '<span class="badge badge-warning badge-pill text-white">Waitng</span>';
                                                                }
                                                            @endphp
                                                            <td>{!! $status !!}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 m-t-10">
                                <div>
                                    <div class="how2 how2-cl4 flex-s-c">
                                        <h3 class="f1-m-2 cl3 tab01-title">
                                            Kalender Agenda
                                        </h3>
                                    </div>

                                    <div class="p-t-20">
                                        <div id="container-cal" class="calendar-container"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>

                        <!-- Share -->
                        <div class="flex-s-s">
                            <span class="f1-s-12 cl5 p-t-1 m-r-15">
                                Share:
                            </span>

                            <div class="flex-wr-s-s size-w-0">
                                <a href="https://api.whatsapp.com/send?text={{ 'Agenda Desa - Desa Rante Angin ' . url()->current() }}"
                                    target="_blank"
                                    class="dis-block f1-s-13 cl0 bg-success borad-3 p-tb-4 p-rl-18 hov-btn1 m-r-3 m-b-3 trans-03">
                                    <i class="fab fa-whatsapp m-r-7"></i>
                                    WhatsApp
                                </a>

                                <a href="https://www.facebook.com/sharer.php?u={{ url()->current() }}" target="_blank"
                                    class="dis-block f1-s-13 cl0 bg-facebook borad-3 p-tb-4 p-rl-18 hov-btn1 m-r-3 m-b-3 trans-03">
                                    <i class="fab fa-facebook-f m-r-7"></i>
                                    Facebook
                                </a>

                                <a href="https://twitter.com/intent/tweet?text={{ 'Agenda Desa - Desa Rante Angin ' . url()->current() }}"
                                    target="_blank"
                                    class="dis-block f1-s-13 cl0 bg-twitter borad-3 p-tb-4 p-rl-18 hov-btn1 m-r-3 m-b-3 trans-03">
                                    <i class="fab fa-twitter m-r-7"></i>
                                    Twitter
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/vendor/animated-event-calendar/dist/simple-calendar.css') }}">
    <script src="{{ asset('assets/vendor/animated-event-calendar/dist/jquery.simple-calendar.js') }}"></script>
    <script>
        var $calendar;
        $(document).ready(function() {
            $('#nav-agenda').addClass('main-menu-active');
            $(document).find('title').text('Agenda Desa - Desa Rante Angin');
            let container = $("#container-cal").simpleCalendar({
                months: ['januari', 'februari', 'maret', 'april', 'mei', 'juni', 'juli', 'augustus',
                    'september', 'oktober', 'november', 'desember'
                ],
                days: ['minggu', 'senin', 'selasa', 'rabu', 'kamis', 'jumat', 'sabtu'],
                fixedStartDay: true,
                disableEmptyDetails: true,
                events: [
                    // generate new event after tomorrow for one hour
                    @foreach ($agenda->get() as $dta)
                        {
                            startDate: "{{ $dta->tanggal }}",
                            endDate: "{{ $dta->tanggal }}",
                            summary: "{{ $dta->nama_agenda }}. Tempat: {{ $dta->tempat }}"
                        },
                    @endforeach
                ],
            });
            $calendar = container.data('plugin_simpleCalendar');
        });
    </script>
@endsection
