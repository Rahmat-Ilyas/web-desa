@extends('landing.layout')
@section('content')
    @php
        $data = new App\Models\Penduduk();
    @endphp
    <!-- Breadcrumb -->
    <div class="container">
        <div class="headline bg0 flex-wr-sb-c p-tb-8">
            <div class="f2-s-1 p-r-30 m-tb-6">
                <a href="{{ url('/') }}" class="breadcrumb-item f1-s-3 cl9">
                    Home
                </a>
                <span class="breadcrumb-item f1-s-3 cl9">
                    Data Penduduk
                </span>
                <span class="breadcrumb-item f1-s-3 cl9">
                    {{ $judul }}
                </span>
            </div>

            @include('landing.search')

        </div>
    </div>

    <!-- Content -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12 p-b-30">
                <div class="p-r-10 p-r-0-sr991">
                    <!-- Blog Detail -->
                    <div class="p-b-20">
                        <a href="#" class="f1-s-10 cl2 hov-cl10 trans-03 text-uppercase">
                            Statistik Data Penduduk
                        </a>
                        <h3 class="f1-l-3 cl2 p-t-20 respon2">
                            {{ $judul }}
                        </h3>

                        <hr>

                        <div class="row">
                            <div class="col-sm-12">
                                <canvas id="myChart" height="120"></canvas>
                            </div>
                        </div>

                        <hr>

                        <!-- Share -->
                        <div class="flex-s-s">
                            <span class="f1-s-12 cl5 p-t-1 m-r-15">
                                Share:
                            </span>

                            <div class="flex-wr-s-s size-w-0">
                                <a href="https://api.whatsapp.com/send?text={{ 'Statistik Data Penduduk - ' . $judul . ' Kel. Ujung Sabbang ' . url()->current() }}"
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

                                <a href="https://twitter.com/intent/tweet?text={{ 'Statistik Data Penduduk - ' . $judul . ' Kel. Ujung Sabbang ' . url()->current() }}"
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js"></script>
    <script>
        $('#nav-penduduk').addClass('main-menu-active');
        $(document).find('title').text('Statistik Data Penduduk - Kel. Ujung Sabbang');
        const ctx = document.getElementById('myChart');
    </script>

    @if ($kategori == 'statistik-penduduk')
        @php
            $all = $data->count();
            $lk = $data->where('jenis_kelamin', 'Laki-laki')->count();
            $pr = $data->where('jenis_kelamin', 'Perempuan')->count();
            $content = $lk . ', ' . $pr . ', ' . $all;
        @endphp
        <script>
            const myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['Laki-laki', 'Perempuan', 'Total Penduduk'],
                    datasets: [{
                        data: [{{ $content }}],
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true,
                            title: {
                                display: true,
                                text: 'Jiwa'
                            }
                        }
                    },
                    plugins: {
                        title: {
                            display: true,
                            text: 'Statistik Semua Penduduk - Kel. Ujung Sabbang',
                            font: {
                                size: 16
                            }
                        },
                        legend: false,
                    },
                    elements: {
                        bar: {
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 159, 64, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                            ],
                            borderColor: [
                                'rgba(255, 99, 132, 1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 159, 64, 1)',
                                'rgba(153, 102, 255, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(255, 206, 86, 1)',
                            ],
                            borderWidth: 1
                        }
                    }
                }
            });
        </script>
    @elseif ($kategori == 'berdasarkan-umur')
        @php
            $get_data = $data->all();
            $data1 = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
            $data2 = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
            foreach ($get_data as $i => $dta) {
                $tggl_lahir = $dta->tanggal_lahir;
                $thn_lahir = date('Y', strtotime($tggl_lahir));
                $thn_sekarang = date('Y');
            
                $thn = $thn_sekarang - $thn_lahir;
                if (date('md', strtotime($tggl_lahir)) < date('md')) {
                    $thn -= 1;
                }
                $umur = $thn < 0 ? 0 : $thn;
                if ($dta->jenis_kelamin == 'Laki-laki') {
                    if ($umur < 4) {
                        $data1[0] += 1;
                    } elseif ($umur < 9) {
                        $data1[1] += 1;
                    } elseif ($umur < 14) {
                        $data1[2] += 1;
                    } elseif ($umur < 19) {
                        $data1[3] += 1;
                    } elseif ($umur < 24) {
                        $data1[4] += 1;
                    } elseif ($umur < 29) {
                        $data1[5] += 1;
                    } elseif ($umur < 34) {
                        $data1[6] += 1;
                    } elseif ($umur < 39) {
                        $data1[7] += 1;
                    } elseif ($umur < 44) {
                        $data1[8] += 1;
                    } elseif ($umur < 49) {
                        $data1[9] += 1;
                    } elseif ($umur < 54) {
                        $data1[10] += 1;
                    } elseif ($umur < 59) {
                        $data1[11] += 1;
                    } elseif ($umur < 64) {
                        $data1[12] += 1;
                    } elseif ($umur < 69) {
                        $data1[13] += 1;
                    } elseif ($umur < 74) {
                        $data1[14] += 1;
                    } elseif ($umur > 75) {
                        $data1[15] += 1;
                    }
                } elseif ($dta->jenis_kelamin == 'Perempuan') {
                    if ($umur < 4) {
                        $data2[0] += 1;
                    } elseif ($umur < 9) {
                        $data2[1] += 1;
                    } elseif ($umur < 14) {
                        $data2[2] += 1;
                    } elseif ($umur < 19) {
                        $data2[3] += 1;
                    } elseif ($umur < 24) {
                        $data2[4] += 1;
                    } elseif ($umur < 29) {
                        $data2[5] += 1;
                    } elseif ($umur < 34) {
                        $data2[6] += 1;
                    } elseif ($umur < 39) {
                        $data2[7] += 1;
                    } elseif ($umur < 44) {
                        $data2[8] += 1;
                    } elseif ($umur < 49) {
                        $data2[9] += 1;
                    } elseif ($umur < 54) {
                        $data2[10] += 1;
                    } elseif ($umur < 59) {
                        $data2[11] += 1;
                    } elseif ($umur < 64) {
                        $data2[12] += 1;
                    } elseif ($umur < 69) {
                        $data2[13] += 1;
                    } elseif ($umur < 74) {
                        $data2[14] += 1;
                    } elseif ($umur > 75) {
                        $data2[15] += 1;
                    }
                }
            }
            
            $data3 = array_map(
                function () {
                    return array_sum(func_get_args());
                },
                $data1,
                $data2,
            );
        @endphp
        <script>
            const myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['Penduduk 0 - 4 Tahun', 'Penduduk 5 - 9 Tahun', 'Penduduk 10 - 14 Tahun',
                        'Penduduk 15 - 19 Tahun', 'Penduduk 20 - 24 Tahun', 'Penduduk 25 - 29 Tahun',
                        'Penduduk 30 - 34 Tahun', 'Penduduk 35 - 39 Tahun', 'Penduduk 40 - 44 Tahun',
                        'Penduduk 45 - 49 Tahun', 'Penduduk 50 - 54 Tahun', 'Penduduk 55 - 59 Tahun',
                        'Penduduk 60 - 64 Tahun', 'Penduduk 65 - 69 Tahun', 'Penduduk 70 - 74 Tahun',
                        'Penduduk > 75 Tahun'
                    ],
                    datasets: [{
                        label: 'Laki-laki',
                        data: [{!! implode(', ', $data1) !!}],
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)'
                        ],
                    }, {
                        label: 'Perempuan',
                        data: [{!! implode(', ', $data2) !!}],
                        backgroundColor: [
                            'rgba(54, 162, 235, 0.2)'
                        ],
                        borderColor: [
                            'rgba(54, 162, 235, 1)'
                        ],
                    }, {
                        label: 'Total',
                        data: [{!! implode(', ', $data3) !!}],
                        backgroundColor: [
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255, 159, 64, 1)'
                        ],
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true,
                            title: {
                                display: true,
                                text: 'Jiwa'
                            }
                        }
                    },
                    plugins: {
                        title: {
                            display: true,
                            text: 'Statistik Penduduk Berdasarkan Batasan Umur - Kel. Ujung Sabbang',
                            font: {
                                size: 16
                            }
                        },
                    }
                }
            });
        </script>
    @elseif ($kategori == 'pemilih-tetap')
        @php
            $all = $data->where('pemilih_tetap', 1)->count();
            $lk = $data
                ->where('pemilih_tetap', 1)
                ->where('jenis_kelamin', 'Laki-laki')
                ->count();
            $pr = $data
                ->where('pemilih_tetap', 1)
                ->where('jenis_kelamin', 'Perempuan')
                ->count();
            $content = $lk . ', ' . $pr . ', ' . $all;
        @endphp
        <script>
            const myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['Laki-laki', 'Perempuan', 'Total Pemilih'],
                    datasets: [{
                        data: [{{ $content }}],
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true,
                            title: {
                                display: true,
                                text: 'Jiwa'
                            }
                        }
                    },
                    plugins: {
                        title: {
                            display: true,
                            text: 'Statistik Penduduk Yang Memiliki Hak Pilih - Kel. Ujung Sabbang',
                            font: {
                                size: 16
                            }
                        },
                        legend: false,
                    },
                    elements: {
                        bar: {
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 159, 64, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                            ],
                            borderColor: [
                                'rgba(255, 99, 132, 1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 159, 64, 1)',
                                'rgba(153, 102, 255, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(255, 206, 86, 1)',
                            ],
                            borderWidth: 1
                        }
                    }
                }
            });
        </script>
    @elseif ($kategori == 'agama')
        @php
            $get_data = $data->all();
            $data1 = [0, 0, 0, 0, 0, 0];
            $data2 = [0, 0, 0, 0, 0, 0];
            foreach ($get_data as $i => $dta) {
                $agama = $dta->agama;
                if ($dta->jenis_kelamin == 'Laki-laki') {
                    if ($agama == 'Islam') {
                        $data1[0] += 1;
                    } elseif ($agama == 'Kristen') {
                        $data1[1] += 1;
                    } elseif ($agama == 'Khatolik') {
                        $data1[2] += 1;
                    } elseif ($agama == 'Hindu') {
                        $data1[3] += 1;
                    } elseif ($agama == 'Budha') {
                        $data1[4] += 1;
                    } elseif ($agama == 'Konghucu') {
                        $data1[5] += 1;
                    }
                } elseif ($dta->jenis_kelamin == 'Perempuan') {
                    if ($agama == 'Islam') {
                        $data2[0] += 1;
                    } elseif ($agama == 'Kristen') {
                        $data2[1] += 1;
                    } elseif ($agama == 'Khatolik') {
                        $data2[2] += 1;
                    } elseif ($agama == 'Hindu') {
                        $data2[3] += 1;
                    } elseif ($agama == 'Budha') {
                        $data2[4] += 1;
                    } elseif ($agama == 'Konghucu') {
                        $data2[5] += 1;
                    }
                }
            }
            
            $data3 = array_map(
                function () {
                    return array_sum(func_get_args());
                },
                $data1,
                $data2,
            );
        @endphp
        <script>
            const myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['Islam', 'Kristen', 'Khatolik', 'Hindu', 'Budha', 'Konghucu'],
                    datasets: [{
                        label: 'Laki-laki',
                        data: [{!! implode(', ', $data1) !!}],
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)'
                        ],
                    }, {
                        label: 'Perempuan',
                        data: [{!! implode(', ', $data2) !!}],
                        backgroundColor: [
                            'rgba(54, 162, 235, 0.2)'
                        ],
                        borderColor: [
                            'rgba(54, 162, 235, 1)'
                        ],
                    }, {
                        label: 'Total',
                        data: [{!! implode(', ', $data3) !!}],
                        backgroundColor: [
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255, 159, 64, 1)'
                        ],
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true,
                            title: {
                                display: true,
                                text: 'Jiwa'
                            }
                        }
                    },
                    plugins: {
                        title: {
                            display: true,
                            text: 'Statistik Penduduk Berdasarkan Agama - Kel. Ujung Sabbang',
                            font: {
                                size: 16
                            }
                        },
                    }
                }
            });
        </script>
    @elseif ($kategori == 'pendidikan')
        @php
            $get_data = $data->all();
            $data1 = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
            $data2 = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
            foreach ($get_data as $i => $dta) {
                $pendidikan = $dta->pendidikan;
                if ($dta->jenis_kelamin == 'Laki-laki') {
                    if ($pendidikan == 'Tidak/Belum Sekolah') {
                        $data1[0] += 1;
                    } elseif ($pendidikan == 'Tidak Tamat SD/Sederajat') {
                        $data1[1] += 1;
                    } elseif ($pendidikan == 'Tamat SD/Sederajat') {
                        $data1[2] += 1;
                    } elseif ($pendidikan == 'SMP/Sederajat') {
                        $data1[3] += 1;
                    } elseif ($pendidikan == 'SMA/Sederajat') {
                        $data1[4] += 1;
                    } elseif ($pendidikan == 'Diploma I/II') {
                        $data1[5] += 1;
                    } elseif ($pendidikan == 'Akademi/Diploma III/S.Muda') {
                        $data1[6] += 1;
                    } elseif ($pendidikan == 'Diploma IV/Strata I') {
                        $data1[7] += 1;
                    } elseif ($pendidikan == 'Strata II') {
                        $data1[8] += 1;
                    } elseif ($pendidikan == 'Strata III') {
                        $data1[9] += 1;
                    }
                } elseif ($dta->jenis_kelamin == 'Perempuan') {
                    if ($pendidikan == 'Tidak/Belum Sekolah') {
                        $data2[0] += 1;
                    } elseif ($pendidikan == 'Tidak Tamat SD/Sederajat') {
                        $data2[1] += 1;
                    } elseif ($pendidikan == 'Tamat SD/Sederajat') {
                        $data2[2] += 1;
                    } elseif ($pendidikan == 'SMP/Sederajat') {
                        $data2[3] += 1;
                    } elseif ($pendidikan == 'SMA/Sederajat') {
                        $data2[4] += 1;
                    } elseif ($pendidikan == 'Diploma I/II') {
                        $data2[5] += 1;
                    } elseif ($pendidikan == 'Akademi/Diploma III/S.Muda') {
                        $data2[6] += 1;
                    } elseif ($pendidikan == 'Diploma IV/Strata I') {
                        $data2[7] += 1;
                    } elseif ($pendidikan == 'Strata II') {
                        $data2[8] += 1;
                    } elseif ($pendidikan == 'Strata III') {
                        $data2[9] += 1;
                    }
                }
            }
            
            $data3 = array_map(
                function () {
                    return array_sum(func_get_args());
                },
                $data1,
                $data2,
            );
        @endphp
        <script>
            const myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: [
                        ['Tidak/Belum', 'Sekolah'],
                        ['Tidak Tamat', 'SD/Sederajat'],
                        ['Tamat SD/', 'Sederajat'],
                        ['SMP/ Sederajat'],
                        ['SMA/ Sederajat'],
                        'Diploma I/II', ['Akademi/', 'Diploma III/', 'S.Muda'],
                        ['Diploma IV/', 'Strata I'],
                        'Strata II', 'Strata III'
                    ],
                    datasets: [{
                        label: 'Laki-laki',
                        data: [{!! implode(', ', $data1) !!}],
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)'
                        ],
                    }, {
                        label: 'Perempuan',
                        data: [{!! implode(', ', $data2) !!}],
                        backgroundColor: [
                            'rgba(54, 162, 235, 0.2)'
                        ],
                        borderColor: [
                            'rgba(54, 162, 235, 1)'
                        ],
                    }, {
                        label: 'Total',
                        data: [{!! implode(', ', $data3) !!}],
                        backgroundColor: [
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255, 159, 64, 1)'
                        ],
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true,
                            title: {
                                display: true,
                                text: 'Jiwa'
                            }
                        },
                        x: {
                            stacked: false,
                            beginAtZero: true,
                        }
                    },
                    plugins: {
                        title: {
                            display: true,
                            text: 'Statistik Penduduk Berdasarkan Pendidikan - Kel. Ujung Sabbang',
                            font: {
                                size: 16
                            }
                        },
                    }
                }
            });
        </script>
    @elseif ($kategori == 'rasio-umur')
        @php
            $get_data = $data->all();
            $data1 = [0, 0, 0];
            $data2 = [0, 0, 0];
            foreach ($get_data as $i => $dta) {
                $tggl_lahir = $dta->tanggal_lahir;
                $thn_lahir = date('Y', strtotime($tggl_lahir));
                $thn_sekarang = date('Y');
            
                $thn = $thn_sekarang - $thn_lahir;
                if (date('md', strtotime($tggl_lahir)) < date('md')) {
                    $thn -= 1;
                }
                $umur = $thn < 0 ? 0 : $thn;
                if ($dta->jenis_kelamin == 'Laki-laki') {
                    if ($umur < 14) {
                        $data1[0] += 1;
                    } elseif ($umur < 64) {
                        $data1[1] += 1;
                    } elseif ($umur >= 65) {
                        $data1[2] += 1;
                    }
                } elseif ($dta->jenis_kelamin == 'Perempuan') {
                    if ($umur < 14) {
                        $data2[0] += 1;
                    } elseif ($umur < 64) {
                        $data2[1] += 1;
                    } elseif ($umur >= 65) {
                        $data2[2] += 1;
                    }
                }
            }
            
            $data3 = array_map(
                function () {
                    return array_sum(func_get_args());
                },
                $data1,
                $data2,
            );
        @endphp
        <script>
            const myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['Penduduk 0 - 4 Tahun (Usia Muda / Non Produktif)',
                        'Penduduk 15 - 64 Tahun (Usia Produktif)',
                        'Penduduk >= 65 Tahun (Usia Tua / Non Produktif)'
                    ],
                    datasets: [{
                        label: 'Laki-laki',
                        data: [{!! implode(', ', $data1) !!}],
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)'
                        ],
                    }, {
                        label: 'Perempuan',
                        data: [{!! implode(', ', $data2) !!}],
                        backgroundColor: [
                            'rgba(54, 162, 235, 0.2)'
                        ],
                        borderColor: [
                            'rgba(54, 162, 235, 1)'
                        ],
                    }, {
                        label: 'Total',
                        data: [{!! implode(', ', $data3) !!}],
                        backgroundColor: [
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255, 159, 64, 1)'
                        ],
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true,
                            title: {
                                display: true,
                                text: 'Jiwa'
                            }
                        }
                    },
                    plugins: {
                        title: {
                            display: true,
                            text: 'Statistik Penduduk Berdasarkan Rasio Usia Produktif - Kel. Ujung Sabbang',
                            font: {
                                size: 16
                            }
                        },
                    }
                }
            });
        </script>
    @elseif ($kategori == 'status')
        @php
            $all = $data->where('status', 'Duda/Janda')->count();
            $lk = $data
                ->where('status', 'Duda/Janda')
                ->where('jenis_kelamin', 'Laki-laki')
                ->count();
            $pr = $data
                ->where('status', 'Duda/Janda')
                ->where('jenis_kelamin', 'Perempuan')
                ->count();
            $content = $lk . ', ' . $pr . ', ' . $all;
        @endphp
        <script>
            const myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['Duda', 'Janda', 'Total'],
                    datasets: [{
                        data: [{{ $content }}],
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true,
                            title: {
                                display: true,
                                text: 'Jiwa'
                            }
                        }
                    },
                    plugins: {
                        title: {
                            display: true,
                            text: 'Statistik Penduduk Bersatus Duda atau Janda - Kel. Ujung Sabbang',
                            font: {
                                size: 16
                            }
                        },
                        legend: false,
                    },
                    elements: {
                        bar: {
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 159, 64, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                            ],
                            borderColor: [
                                'rgba(255, 99, 132, 1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 159, 64, 1)',
                                'rgba(153, 102, 255, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(255, 206, 86, 1)',
                            ],
                            borderWidth: 1
                        }
                    }
                }
            });
        </script>
    @endif
@endsection
