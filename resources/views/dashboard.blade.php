@extends('inc.main')
@section('title', 'Dashboard')
@section('pages-css')
    <link rel="stylesheet" media="screen, print" href="/admin/css/fa-solid.css">
    <link rel="stylesheet" media="screen, print" href="/admin/css/theme-demo.css">
    <link rel="stylesheet" media="screen, print" href="/admin/css/notifications/toastr/toastr.css">
    <link rel="stylesheet" media="screen, print" href="/admin/css/datagrid/datatables/datatables.bundle.css">

@endsection
@section('pages-content')
    <main id="js-page-content" role="main" class="page-content">
        @include('inc._page_breadcrumb')
        <div class="subheader">
            @component('inc._page_heading', [
                'icon' => 'home',
                'heading1' => 'Dashboard',
            ])
            @endcomponent
        </div>
        @if (Auth::user()->getRoleNames()->first() == 'Mahasiswa')
            @if (Auth::user()?->id_prodi == null || Auth::user()?->id_kampus == null)
                <p class="panel-tag fw-500 bg-danger text-white p-2">
                    Silahkan ubah data diri pada menu berikut ini
                    <a href="{{ route('profil_admin') }}" class="fw-500 text-white font-italic"> Setting Ubah Profil</a>
                    page.
                </p>
            @endif
            <div class="row">
                <div class="col-lg-6 col-md-8 mx-auto">
                    <div
                        class="p-3 
                    @if ($mahasiswaViewFirst->status == 1) bg-danger 
                    @elseif($mahasiswaViewFirst->status == 2) bg-warning 
                    @elseif($mahasiswaViewFirst->status == 3) bg-primary 
                    @elseif($mahasiswaViewFirst->status == 4) bg-info 
                    @else bg-secondary @endif 
                    rounded overflow-hidden position-relative text-white mb-g stat-card">
                        <div class="">
                            <h3 class="display-4 d-block l-h-n m-0 fw-500">
                                <span id="progress-status">
                                    @if ($mahasiswaViewFirst->nilai_mikroskill != null)
                                        @if ($mahasiswaViewFirst->status == 1)
                                            Menunggu Validasi
                                        @elseif ($mahasiswaViewFirst->status == 2)
                                            Menunggu Penilaian
                                        @elseif ($mahasiswaViewFirst->status == 3)
                                            Dokumen Dikembalikan
                                        @elseif ($mahasiswaViewFirst->status == 4)
                                            Sudah Dinilai
                                        @else
                                            Tidak Ada Progres
                                        @endif
                                    @else
                                        Belum Mengisi Mikroskill
                                    @endif
                                </span>
                                <small class="m-0 l-h-n">Status Progres Anda</small>
                            </h3>
                        </div>
                        <i class="fal fa-tasks position-absolute pos-right pos-bottom opacity-50 mb-n1 mr-n1"
                            style="font-size:6rem"></i>
                    </div>
                </div>
            </div>
            <div class="card mb-g p-2">
                <div class="card-body">
                    <h3 class="fw-500">Riwayat Revisi Unggahan</h3>
                    <div class="mt-2 mb-3">
                        <p class="m-0 fw-bold fs-3">Nama: {{ $mahasiswaViewFirst->user->name ?? '-' }}</p>
                        <p class="m-0 fw-bold fs-3">NIM: {{ $mahasiswaViewFirst->mahasiswa->nim ?? '-' }}</p>
                        <p class="m-0 fw-bold fs-3">Fakultas:
                            {{ $mahasiswaViewFirst->user->programStudi->fakultas->name ?? '-' }}
                        </p>
                        <p class="m-0 fw-bold fs-3">Program Studi:
                            {{ $mahasiswaViewFirst->user->programStudi->name ?? '-' }}</p>
                    </div>
                    <table id="dt-basic-example" class="table table-bordered table-hover table-striped w-100">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal Unggah</th>
                                <th>Status</th>
                                <th>Update Terbaru</th>
                                <th>Lihat Penilaian</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($mahasiswaViewGet->isNotEmpty())
                                @foreach ($mahasiswaViewGet as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ \Carbon\Carbon::parse($item->created_at)->translatedFormat('j F Y H:i') }}
                                        </td>
                                        <td>
                                            @if ($item->status == 1)
                                                <span class="badge badge-primary">Menunggu Validasi</span>
                                            @elseif ($item->status == 2)
                                                <span class="badge badge-warning">Menunggu Penilaian</span>
                                            @elseif ($item->status == 3)
                                                <span class="badge badge-danger">Tidak Valid</span>
                                            @elseif ($item->status == 4)
                                                <span class="badge badge-success">Berhasil Dinilai</span>
                                            @endif
                                        </td>
                                        <td>
                                            {{ \Carbon\Carbon::parse($item->updated_at)->translatedFormat('j F Y H:i') }}
                                        </td>
                                        <td>
                                            @if ($item->status != 3)
                                                <a href="{{ route('assessment.printscore', $item->id) }}"
                                                    class="btn-sm btn-success mr-1">
                                                    Hasil Penilaian
                                                </a>
                                            @else
                                                <span class="text-danger">Dokumen Belum Diterbitkan</span>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="4" class="text-center text-danger">Tidak ada data</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        @elseif(Auth::user()->getRoleNames()->first() == 'Prodi')
            @if (Auth::user()?->id_prodi == null || Auth::user()?->id_kampus == null)
                <p class="panel-tag fw-500 bg-danger text-white p-2">
                    Silahkan ubah data diri pada menu berikut ini
                    <a href="{{ route('profil_admin') }}" class="fw-500 text-white font-italic"> Setting Ubah Profil</a>
                    page.
                </p>
            @endif

            <div class="row">
                <div class="col-lg-4 col-md-6 mb-3">
                    <div class="p-3 bg-success-300 rounded overflow-hidden position-relative text-white mb-g stat-card">
                        <div class="">
                            <h3 class="display-4 d-block l-h-n m-0 fw-500">
                                <span id="valid-count">{{ $prodiDinilai ?? 0 }}</span>
                                <small class="m-0 l-h-n">Sudah Dinilai</small>
                            </h3>
                        </div>
                        <i class="fal fa-check-circle position-absolute pos-right pos-bottom opacity-50 mb-n1 mr-n1"
                            style="font-size:6rem"></i>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-3">
                    <div class="p-3 bg-warning-400 rounded overflow-hidden position-relative text-white mb-g stat-card">
                        <div class="">
                            <h3 class="display-4 d-block l-h-n m-0 fw-500">
                                <span id="pending-count">{{ $waitingAssesment ?? 0 }}</span>
                                <small class="m-0 l-h-n">Menunggu Penilaian</small>
                            </h3>
                        </div>
                        <i class="fal fa-hourglass-half position-absolute pos-right pos-bottom opacity-50 mb-n1 mr-n1"
                            style="font-size:6rem"></i>
                    </div>
                </div>
            </div>

            <x-panel.show title="Data Status Validasi Mahasiswa">
                <table id="dt-basic-example-admin" class="table table-bordered table-hover table-striped w-100">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>Fakultas</th>
                            <th>Prodi</th>
                            <th>Nama Mahasiswa</th>
                            <th>NIM</th>
                            <th>Status</th>
                            <th>Lihat Hasil</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($prodiGet as $item)
                            <tr onclick="window.location='{{ route('report.indexMahasiswa', $item->user->id) }}';"
                                style="cursor: pointer;">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->user->programStudi->fakultas->name ?? '-' }}</td>
                                <td>{{ $item->user->programStudi->name ?? '-' }}</td>
                                <td>{{ $item->user->name ?? '-' }}</td>
                                <td>{{ $item->mahasiswa->nim ?? '-' }}</td>
                                <td>
                                    @if ($item->nilai_mikroskill != null)
                                        @if ($item->status == 1)
                                            <span class="badge badge-danger">MENUNGGU VALIDASI</span>
                                        @elseif ($item->status == 2)
                                            <span class="badge badge-warning">MENUNGGU PENILAIAN</span>
                                        @elseif ($item->status == 3)
                                            <span class="badge badge-primary">DOKUMEN DIKEMBALIKAN</span>
                                        @elseif ($item->status == 4)
                                            <span class="badge badge-info">SUDAH DINILAI</span>
                                        @endif
                                    @else
                                        <span class="text-danger">Belum Isi Tes Mikroskill</span>
                                    @endif
                                </td>
                                <td>
                                    @if ($item->status == 4)
                                        <a href="{{ route('assessment.printscore', $item->id) }}"
                                            class="btn btn-sm btn-success mr-1">
                                            Hasil Penilaian
                                        </a>
                                        <a href="{{ route('rekomendasi.print', $item->id) }}"
                                            class="btn btn-sm btn-success mr-1">
                                            Nilai Rekomendasi
                                        </a>
                                    @elseif ($item->status == 2)
                                        <a href="{{ route('rekomendasi.print', $item->id) }}"
                                            class="btn btn-sm btn-success mr-1">
                                            Nilai Rekomendasi
                                        </a>
                                    @else
                                        <span class="text-danger">Belum tersedia</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </x-panel.show>
        @elseif(Auth::user()->getRoleNames()->first() == 'AdminPT')
            <div class="row">
                {{-- dashboard adminPT --}}
                <div class="col-lg-4 col-md-6 mb-3">
                    <div class="p-3 bg-success-300 rounded overflow-hidden position-relative text-white mb-g stat-card">
                        <div class="">
                            <h3 class="display-4 d-block l-h-n m-0 fw-500">
                                <span id="valid-count">{{ $validAdmin ?? 0 }}</span>
                                <small class="m-0 l-h-n">Tervalidasi</small>
                            </h3>
                        </div>
                        <i class="fal fa-check-circle position-absolute pos-right pos-bottom opacity-50 mb-n1 mr-n1"
                            style="font-size:6rem"></i>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-3">
                    <div class="p-3 bg-warning-400 rounded overflow-hidden position-relative text-white mb-g stat-card">
                        <div class="">
                            <h3 class="display-4 d-block l-h-n m-0 fw-500">
                                <span id="pending-count">{{ $waitingValidasiAdmin ?? 0 }}</span>
                                <small class="m-0 l-h-n">Menunggu Validasi</small>
                            </h3>
                        </div>
                        <i class="fal fa-hourglass-half position-absolute pos-right pos-bottom opacity-50 mb-n1 mr-n1"
                            style="font-size:6rem"></i>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-3">
                    <div class="p-3 bg-primary-400 rounded overflow-hidden position-relative text-white mb-g stat-card">
                        <div class="">
                            <h3 class="display-4 d-block l-h-n m-0 fw-500">
                                <span id="invalid-count">{{ $notValidAdmin ?? 0 }}</span>
                                <small class="m-0 l-h-n">Dokumen Dikembalikan</small>
                            </h3>
                        </div>
                        <i class="fal fa-times-circle position-absolute pos-right pos-bottom opacity-50 mb-n1 mr-n1"
                            style="font-size:6rem"></i>
                    </div>
                </div>
            </div>

            <x-panel.show title="Data Status Validasi Mahasiswa">
                <table id="dt-basic-example-admin" class="table table-bordered table-hover table-striped w-100">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Fakultas</th>
                            <th>Program Studi</th>
                            <th>Nama</th>
                            <th>NIM</th>
                            <th>Status</th>
                            <th>Lihat Hasil</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($adminGet as $item)
                            <tr tr onclick="window.location='{{ route('report.indexMahasiswa', $item->user->id) }}';"
                                style="cursor: pointer;">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->user->programStudi->fakultas->name ?? '-' }}</td>
                                <td>{{ $item->user->programStudi->name ?? '-' }}</td>
                                <td>{{ $item->user->name ?? '-' }}</td>
                                <td>{{ $item->user->mahasiswa->nim ?? '-' }}</td>
                                <td>
                                    @if ($item->nilai_mikroskill != null)
                                        @if ($item->status == 1)
                                            <span class="badge badge-danger">MENUNGGU VALIDASI</span>
                                        @elseif ($item->status == 2)
                                            <span class="badge badge-warning">MENUNGGU PENILAIAN</span>
                                        @elseif ($item->status == 3)
                                            <span class="badge badge-primary">DOKUMEN DIKEMBALIKAN</span>
                                        @elseif ($item->status == 4)
                                            <span class="badge badge-info">SUDAH DINILAI</span>
                                        @endif
                                    @else
                                        <span class="text-danger">Belum Isi Tes Mikroskill</span>
                                    @endif
                                </td>
                                <td>
                                    @if ($item->status == 4)
                                        <a href="{{ route('assessment.printscore', $item->id) }}"
                                            class="btn btn-sm btn-success mr-1">
                                            Hasil Penilaian
                                        </a>
                                        <a href="{{ route('rekomendasi.print', $item->id) }}"
                                            class="btn btn-sm btn-success mr-1">
                                            Nilai Rekomendasi
                                        </a>
                                    @elseif ($item->status == 2)
                                        <a href="{{ route('rekomendasi.print', $item->id) }}"
                                            class="btn btn-sm btn-success mr-1">
                                            Nilai Rekomendasi
                                        </a>
                                    @else
                                        <span class="text-danger">Belum tersedia</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </x-panel.show>
        @else
            <div class="row">
                {{-- dashboard adminPT --}}
                <div class="col-lg-4 col-md-6 mb-3">
                    <div class="p-3 bg-success-300 rounded overflow-hidden position-relative text-white mb-g stat-card">
                        <div class="">
                            <h3 class="display-4 d-block l-h-n m-0 fw-500">
                                <span id="valid-count">{{ $valid ?? 0 }}</span>
                                <small class="m-0 l-h-n">Tervalidasi</small>
                            </h3>
                        </div>
                        <i class="fal fa-check-circle position-absolute pos-right pos-bottom opacity-50 mb-n1 mr-n1"
                            style="font-size:6rem"></i>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-3">
                    <div class="p-3 bg-warning-400 rounded overflow-hidden position-relative text-white mb-g stat-card">
                        <div class="">
                            <h3 class="display-4 d-block l-h-n m-0 fw-500">
                                <span id="pending-count">{{ $waitingValidasi ?? 0 }}</span>
                                <small class="m-0 l-h-n">Menunggu Validasi</small>
                            </h3>
                        </div>
                        <i class="fal fa-hourglass-half position-absolute pos-right pos-bottom opacity-50 mb-n1 mr-n1"
                            style="font-size:6rem"></i>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-3">
                    <div class="p-3 bg-primary-400 rounded overflow-hidden position-relative text-white mb-g stat-card">
                        <div class="">
                            <h3 class="display-4 d-block l-h-n m-0 fw-500">
                                <span id="invalid-count">{{ $notValid ?? 0 }}</span>
                                <small class="m-0 l-h-n">Dokumen Dikembalikan</small>
                            </h3>
                        </div>
                        <i class="fal fa-times-circle position-absolute pos-right pos-bottom opacity-50 mb-n1 mr-n1"
                            style="font-size:6rem"></i>
                    </div>
                </div>
            </div>

            <x-panel.show title="Data Status Validasi Mahasiswa">
                <table id="dt-basic-example-admin" class="table table-bordered table-hover table-striped w-100">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Fakultas</th>
                            <th>Program Studi</th>
                            <th>Nama</th>
                            <th>NIM</th>
                            <th>Status</th>
                            <th>Lihat Hasil</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($adminGet as $item)
                            <tr tr onclick="window.location='{{ route('report.indexMahasiswa', $item->user->id) }}';"
                                style="cursor: pointer;">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->user->programStudi->fakultas->name ?? '-' }}</td>
                                <td>{{ $item->user->programStudi->name ?? '-' }}</td>
                                <td>{{ $item->user->name ?? '-' }}</td>
                                <td>{{ $item->user->mahasiswa->nim ?? '-' }}</td>
                                <td>
                                    @if ($item->nilai_mikroskill != null)
                                        @if ($item->status == 1)
                                            <span class="badge badge-danger">MENUNGGU VALIDASI</span>
                                        @elseif ($item->status == 2)
                                            <span class="badge badge-warning">MENUNGGU PENILAIAN</span>
                                        @elseif ($item->status == 3)
                                            <span class="badge badge-primary">DOKUMEN DIKEMBALIKAN</span>
                                        @elseif ($item->status == 4)
                                            <span class="badge badge-info">SUDAH DINILAI</span>
                                        @endif
                                    @else
                                        <span class="text-danger">Belum Isi Tes Mikroskill</span>
                                    @endif
                                </td>
                                <td>
                                    @if ($item->status == 4)
                                        <a href="{{ route('assessment.printscore', $item->id) }}"
                                            class="btn btn-sm btn-success mr-1">
                                            Hasil Penilaian
                                        </a>
                                        <a href="{{ route('rekomendasi.print', $item->id) }}"
                                            class="btn btn-sm btn-success mr-1">
                                            Nilai Rekomendasi
                                        </a>
                                    @elseif ($item->status == 2)
                                        <a href="{{ route('rekomendasi.print', $item->id) }}"
                                            class="btn btn-sm btn-success mr-1">
                                            Nilai Rekomendasi
                                        </a>
                                    @else
                                        <span class="text-danger">Belum tersedia</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </x-panel.show>

        @endif

    </main>
@endsection
@section('pages-script')
    <script src="/admin/js/dependency/moment/moment.js"></script>
    <script src="/admin/js/miscellaneous/fullcalendar/fullcalendar.bundle.js"></script>
    <script src="/admin/js/statistics/sparkline/sparkline.bundle.js"></script>
    <script src="/admin/js/statistics/easypiechart/easypiechart.bundle.js"></script>
    <script src="/admin/js/statistics/flot/flot.bundle.js"></script>
    <script src="/admin/js/miscellaneous/jqvmap/jqvmap.bundle.js"></script>
    <script src="/admin/js/datagrid/datatables/datatables.bundle.js"></script>
    <script>
        $(document).ready(function() {
            //$('#js-page-content').smartPanel();

            //
            //
            var dataSetPie = [{
                    label: "Asia",
                    data: 4119630000,
                    color: color.primary._500
                },
                {
                    label: "Latin America",
                    data: 590950000,
                    color: color.info._500
                },
                {
                    label: "Africa",
                    data: 1012960000,
                    color: color.warning._500
                },
                {
                    label: "Oceania",
                    data: 95100000,
                    color: color.danger._500
                },
                {
                    label: "Europe",
                    data: 727080000,
                    color: color.success._500
                },
                {
                    label: "North America",
                    data: 344120000,
                    color: color.fusion._400
                }
            ];


            $.plot($("#flotPie"), dataSetPie, {
                series: {
                    pie: {
                        innerRadius: 0.5,
                        show: true,
                        radius: 1,
                        label: {
                            show: true,
                            radius: 2 / 3,
                            threshold: 0.1
                        }
                    }
                },
                legend: {
                    show: false
                }
            });


            $.plot('#flotBar1', [{
                    data: [
                        [1, 0],
                        [2, 0],
                        [3, 0],
                        [4, 1],
                        [5, 3],
                        [6, 3],
                        [7, 10],
                        [8, 11],
                        [9, 10],
                        [10, 9],
                        [11, 12],
                        [12, 8],
                        [13, 10],
                        [14, 6],
                        [15, 3]
                    ],
                    bars: {
                        show: true,
                        lineWidth: 0,
                        fillColor: color.fusion._50,
                        barWidth: .3,
                        order: 'left'
                    }
                },
                {
                    data: [
                        [1, 0],
                        [2, 0],
                        [3, 1],
                        [4, 2],
                        [5, 2],
                        [6, 5],
                        [7, 8],
                        [8, 12],
                        [9, 10],
                        [10, 11],
                        [11, 3]
                    ],
                    bars: {
                        show: true,
                        lineWidth: 0,
                        fillColor: color.success._500,
                        barWidth: .3,
                        align: 'right'
                    }
                }
            ], {
                grid: {
                    borderWidth: 0,
                },
                yaxis: {
                    min: 0,
                    max: 15,
                    tickColor: 'rgba(0,0,0,0.05)',
                    ticks: [
                        [0, ''],
                        [5, '$5000'],
                        [10, '$25000'],
                        [15, '$45000']
                    ],
                    font: {
                        color: '#444',
                        size: 10
                    }
                },
                xaxis: {
                    mode: 'categories',
                    tickColor: 'rgba(0,0,0,0.05)',
                    ticks: [
                        [0, '3am'],
                        [1, '4am'],
                        [2, '5am'],
                        [3, '6am'],
                        [4, '7am'],
                        [5, '8am'],
                        [6, '9am'],
                        [7, '10am'],
                        [8, '11am'],
                        [9, '12nn'],
                        [10, '1pm'],
                        [11, '2pm'],
                        [12, '3pm'],
                        [13, '4pm'],
                        [14, '5pm']
                    ],
                    font: {
                        color: '#999',
                        size: 9
                    }
                }
            });


            /*
             * VECTOR MAP
             */

            var data_array = {
                "af": "16.63",
                "al": "0",
                "dz": "158.97",
                "ao": "85.81",
                "ag": "1.1",
                "ar": "351.02",
                "am": "8.83",
                "au": "1219.72",
                "at": "366.26",
                "az": "52.17",
                "bs": "7.54",
                "bh": "21.73",
                "bd": "105.4",
                "bb": "3.96",
                "by": "52.89",
                "be": "461.33",
                "bz": "1.43",
                "bj": "6.49",
                "bt": "1.4",
                "bo": "19.18",
                "ba": "16.2",
                "bw": "12.5",
                "br": "2023.53",
                "bn": "11.96",
                "bg": "44.84",
                "bf": "8.67",
                "bi": "1.47",
                "kh": "11.36",
                "cm": "21.88",
                "ca": "1563.66",
                "cv": "1.57",
                "cf": "2.11",
                "td": "7.59",
                "cl": "199.18",
                "cn": "5745.13",
                "co": "283.11",
                "km": "0.56",
                "cd": "12.6",
                "cg": "11.88",
                "cr": "35.02",
                "ci": "22.38",
                "hr": "59.92",
                "cy": "22.75",
                "cz": "195.23",
                "dk": "304.56",
                "dj": "1.14",
                "dm": "0.38",
                "do": "50.87",
                "ec": "61.49",
                "eg": "216.83",
                "sv": "21.8",
                "gq": "14.55",
                "er": "2.25",
                "ee": "19.22",
                "et": "30.94",
                "fj": "3.15",
                "fi": "231.98",
                "fr": "2555.44",
                "ga": "12.56",
                "gm": "1.04",
                "ge": "11.23",
                "de": "3305.9",
                "gh": "18.06",
                "gr": "305.01",
                "gd": "0.65",
                "gt": "40.77",
                "gn": "4.34",
                "gw": "0.83",
                "gy": "2.2",
                "ht": "6.5",
                "hn": "15.34",
                "hk": "226.49",
                "hu": "132.28",
                "is": "0",
                "in": "1430.02",
                "id": "695.06",
                "ir": "337.9",
                "iq": "84.14",
                "ie": "204.14",
                "il": "201.25",
                "it": "2036.69",
                "jm": "13.74",
                "jp": "5390.9",
                "jo": "27.13",
                "kz": "129.76",
                "ke": "32.42",
                "ki": "0.15",
                "kw": "117.32",
                "kg": "4.44",
                "la": "6.34",
                "lv": "23.39",
                "lb": "39.15",
                "ls": "1.8",
                "lr": "0.98",
                "lt": "35.73",
                "lu": "52.43",
                "mk": "9.58",
                "mg": "8.33",
                "mw": "5.04",
                "my": "218.95",
                "mv": "1.43",
                "ml": "9.08",
                "mt": "7.8",
                "mr": "3.49",
                "mu": "9.43",
                "mx": "1004.04",
                "md": "5.36",
                "rw": "5.69",
                "ws": "0.55",
                "st": "0.19",
                "sa": "434.44",
                "sn": "12.66",
                "rs": "38.92",
                "sc": "0.92",
                "sl": "1.9",
                "sg": "217.38",
                "sk": "86.26",
                "si": "46.44",
                "sb": "0.67",
                "za": "354.41",
                "es": "1374.78",
                "lk": "48.24",
                "kn": "0.56",
                "lc": "1",
                "vc": "0.58",
                "sd": "65.93",
                "sr": "3.3",
                "sz": "3.17",
                "se": "444.59",
                "ch": "522.44",
                "sy": "59.63",
                "tw": "426.98",
                "tj": "5.58",
                "tz": "22.43",
                "th": "312.61",
                "tl": "0.62",
                "tg": "3.07",
                "to": "0.3",
                "tt": "21.2",
                "tn": "43.86",
                "tr": "729.05",
                "tm": "0",
                "ug": "17.12",
                "ua": "136.56",
                "ae": "239.65",
                "gb": "2258.57",
                "us": "14624.18",
                "uy": "40.71",
                "uz": "37.72",
                "vu": "0.72",
                "ve": "285.21",
                "vn": "101.99",
                "ye": "30.02",
                "zm": "15.69",
                "zw": "0"
            };

            $('#vector-map').vectorMap({
                map: 'world_en',
                backgroundColor: 'transparent',
                color: color.warning._50,
                borderOpacity: 0.5,
                borderWidth: 1,
                hoverColor: color.success._300,
                hoverOpacity: null,
                selectedColor: color.success._500,
                selectedRegions: ['US'],
                enableZoom: true,
                showTooltip: true,
                scaleColors: [color.primary._400, color.primary._50],
                values: data_array,
                normalizeFunction: 'polynomial',
                onRegionClick: function(element, code, region) {
                    /*var message = 'You clicked "'
                    						+ region
                    						+ '" which has the code: '
                    						+ code.toLowerCase();

                    					console.log(message);*/

                    var randomNumber = Math.floor(Math.random() * 10000000);
                    var arrow;

                    if (Math.random() >= 0.5 == true) {
                        arrow =
                            '<div class="ml-2 d-inline-flex"><i class="fal fa-caret-up text-success fs-xs"></i></div>'
                    } else {
                        arrow =
                            '<div class="ml-2 d-inline-flex"><i class="fal fa-caret-down text-danger fs-xs"></i></div>'
                    }

                    $('.js-jqvmap-flag').attr('src',
                        '/admin/img/flags/4x3/' + code.toLowerCase() +
                        '.svg');
                    $('.js-jqvmap-country').html(region + ' - ' + '$' + randomNumber.toFixed(2).replace(
                        /(\d)(?=(\d\d\d)+(?!\d))/g, "$1,") + arrow);
                }
            });


            /* TAB 1: UPDATING CHART */
            var data = [],
                totalPoints = 200;
            var getRandomData = function() {
                if (data.length > 0)
                    data = data.slice(1);

                // do a random walk
                while (data.length < totalPoints) {
                    var prev = data.length > 0 ? data[data.length - 1] : 50;
                    var y = prev + Math.random() * 10 - 5;
                    if (y < 0)
                        y = 0;
                    if (y > 100)
                        y = 100;
                    data.push(y);
                }

                // zip the generated y values with the x values
                var res = [];
                for (var i = 0; i < data.length; ++i)
                    res.push([i, data[i]])
                return res;
            }
            // setup control widget
            var updateInterval = 1500;
            $("#updating-chart").val(updateInterval).change(function() {

                var v = $(this).val();
                if (v && !isNaN(+v)) {
                    updateInterval = +v;
                    $(this).val("" + updateInterval);
                }

            });
            // setup plot
            var options = {
                colors: [color.primary._700],
                series: {
                    lines: {
                        show: true,
                        lineWidth: 0.5,
                        fill: 0.9,
                        fillColor: {
                            colors: [{
                                    opacity: 0.6
                                },
                                {
                                    opacity: 0
                                }
                            ]
                        },
                    },

                    shadowSize: 0 // Drawing is faster without shadows
                },
                grid: {
                    borderColor: 'rgba(0,0,0,0.05)',
                    borderWidth: 1,
                    labelMargin: 5
                },
                xaxis: {
                    color: '#F0F0F0',
                    tickColor: 'rgba(0,0,0,0.05)',
                    font: {
                        size: 10,
                        color: '#999'
                    }
                },
                yaxis: {
                    min: 0,
                    max: 100,
                    color: '#F0F0F0',
                    tickColor: 'rgba(0,0,0,0.05)',
                    font: {
                        size: 10,
                        color: '#999'
                    }
                }
            };
            var plot = $.plot($("#updating-chart"), [getRandomData()], options);
            /* live switch */
            $('input[type="checkbox"]#start_interval').click(function() {
                if ($(this).prop('checked')) {
                    $on = true;
                    updateInterval = 1500;
                    update();
                } else {
                    clearInterval(updateInterval);
                    $on = false;
                }
            });
            var update = function() {
                if ($on == true) {
                    plot.setData([getRandomData()]);
                    plot.draw();
                    setTimeout(update, updateInterval);

                } else {
                    clearInterval(updateInterval)
                }

            }



            /*calendar */
            var todayDate = moment().startOf('day');
            var YM = todayDate.format('YYYY-MM');
            var YESTERDAY = todayDate.clone().subtract(1, 'day').format('YYYY-MM-DD');
            var TODAY = todayDate.format('YYYY-MM-DD');
            var TOMORROW = todayDate.clone().add(1, 'day').format('YYYY-MM-DD');


            var calendarEl = document.getElementById('calendar');

            var calendar = new FullCalendar.Calendar(calendarEl, {
                plugins: ['dayGrid', 'list', 'timeGrid', 'interaction', 'bootstrap'],
                themeSystem: 'bootstrap',
                timeZone: 'UTC',
                //dateAlignment: "month", //week, month
                buttonText: {
                    today: 'today',
                    month: 'month',
                    week: 'week',
                    day: 'day',
                    list: 'list'
                },
                eventTimeFormat: {
                    hour: 'numeric',
                    minute: '2-digit',
                    meridiem: 'short'
                },
                navLinks: true,
                header: {
                    left: 'title',
                    center: '',
                    right: 'today prev,next'
                },
                footer: {
                    left: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek',
                    center: '',
                    right: ''
                },
                editable: true,
                eventLimit: true, // allow "more" link when too many events
                events: [{
                        title: 'All Day Event',
                        start: YM + '-01',
                        description: 'This is a test description', //this is currently bugged: https://github.com/fullcalendar/fullcalendar/issues/1795
                        className: "border-warning bg-warning text-dark"
                    },
                    {
                        title: 'Reporting',
                        start: YM + '-14T13:30:00',
                        end: YM + '-14',
                        className: "bg-white border-primary text-primary"
                    },
                    {
                        title: 'Surgery oncall',
                        start: YM + '-02',
                        end: YM + '-03',
                        className: "bg-primary border-primary text-white"
                    },
                    {
                        title: 'NextGen Expo 2019 - Product Release',
                        start: YM + '-03',
                        end: YM + '-05',
                        className: "bg-info border-info text-white"
                    },
                    {
                        title: 'Dinner',
                        start: YM + '-12',
                        end: YM + '-10'
                    },
                    {
                        id: 999,
                        title: 'Repeating Event',
                        start: YM + '-09T16:00:00',
                        className: "bg-danger border-danger text-white"
                    },
                    {
                        id: 1000,
                        title: 'Repeating Event',
                        start: YM + '-16T16:00:00'
                    },
                    {
                        title: 'Conference',
                        start: YESTERDAY,
                        end: TOMORROW,
                        className: "bg-success border-success text-white"
                    },
                    {
                        title: 'Meeting',
                        start: TODAY + 'T10:30:00',
                        end: TODAY + 'T12:30:00',
                        className: "bg-primary text-white border-primary"
                    },
                    {
                        title: 'Lunch',
                        start: TODAY + 'T12:00:00',
                        className: "bg-info border-info"
                    },
                    {
                        title: 'Meeting',
                        start: TODAY + 'T14:30:00',
                        className: "bg-warning text-dark border-warning"
                    },
                    {
                        title: 'Happy Hour',
                        start: TODAY + 'T17:30:00',
                        className: "bg-success border-success text-white"
                    },
                    {
                        title: 'Dinner',
                        start: TODAY + 'T20:00:00',
                        className: "bg-danger border-danger text-white"
                    },
                    {
                        title: 'Birthday Party',
                        start: TOMORROW + 'T07:00:00',
                        className: "bg-primary text-white border-primary text-white"
                    },
                    {
                        title: 'Gotbootstrap Meeting',
                        url: 'http://gotbootstrap.com/',
                        start: YM + '-28',
                        className: "bg-info border-info text-white"
                    }
                ],
                viewSkeletonRender: function() {
                    $('.fc-toolbar .btn-default').addClass('btn-sm');
                    $('.fc-header-toolbar h2').addClass('fs-md');
                    $('#calendar').addClass('fc-reset-order')
                },

            });

            calendar.render();
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#dt-basic-example-admin').dataTable({
                responsive: true
            });

            $('.js-thead-colors a').on('click', function() {
                var theadColor = $(this).attr("data-bg");
                console.log(theadColor);
                $('#dt-basic-example-admin thead').removeClassPrefix('bg-').addClass(theadColor);
            });

            $('.js-tbody-colors a').on('click', function() {
                var theadColor = $(this).attr("data-bg");
                console.log(theadColor);
                $('#dt-basic-example-admin').removeClassPrefix('bg-').addClass(theadColor);
            });

        });
    </script>

@endsection





{{-- <div class="card mb-g p-2">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6 col-xl-3">
                        <div class="p-3 bg-primary-300 rounded overflow-hidden position-relative text-white mb-g">
                            <div class="">
                                <h3 class="display-4 d-block l-h-n m-0 fw-500">
                                    {{ $jumlahAdmin }}
                                    <small class="m-0 l-h-n">Admin</small>
                                </h3>
                            </div>
                            <i class="fal fa-user-shield position-absolute pos-right pos-bottom opacity-50 mb-n1 mr-n1"
                                style="font-size:6rem"></i>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="p-3 bg-warning-400 rounded overflow-hidden position-relative text-white mb-g">
                            <div class="">
                                <h3 class="display-4 d-block l-h-n m-0 fw-500">
                                    {{ $jumlahDosen }}
                                    <small class="m-0 l-h-n">Dosen</small>
                                </h3>
                            </div>
                            <i class="fa-solid fa-chalkboard-teacher position-absolute pos-right pos-bottom opacity-50  mb-n1 mr-n4"
                                style="font-size: 6rem;"></i>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="p-3 bg-success-200 rounded overflow-hidden position-relative text-white mb-g">
                            <div class="">
                                <h3 class="display-4 d-block l-h-n m-0 fw-500">
                                    {{ $jumlahMahasiswa }}
                                    <small class="m-0 l-h-n">Mahasiswa</small>
                                </h3>
                            </div>
                            <i class="fa fa-user-graduate position-absolute pos-right pos-bottom opacity-50 mb-n5 mr-n6"
                                style="font-size: 8rem;"></i>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="p-3 bg-info-200 rounded overflow-hidden position-relative text-white mb-g">
                            <div class="">
                                <h3 class="display-4 d-block l-h-n m-0 fw-500">
                                    {{ $jumlahReport }}
                                    <small class="m-0 l-h-n">Laporan Akhir</small>
                                </h3>
                            </div>
                            <i class="fal fa-file-alt position-absolute pos-right pos-bottom opacity-50 mb-n1 mr-n4"
                                style="font-size: 6rem;"></i>
                        </div>
                    </div>
                </div>
                <br>
                <p class="panel-tag fw-500">
                    Sedang Dalam Perkembangan
                </p>

                <div id="js-display" class="d-none">
                    <h5 class="fw-700">
                        <span class="js-plugin-name"></span>
                    </h5>
                    <p>
                        <span class="js-plugin-description"></span>
                    </p>
                    <p>
                        <strong>Documentation:</strong>
                        <br>
                        <a href="" class="js-plugin-url" target="_blank"></a>
                    </p>
                    <p>
                        <strong>License:</strong>
                        <br>
                        <span class="js-plugin-license"></span>
                    </p>
                </div>
            </div>
        </div> --}}
{{-- <div class="fs-lg fw-300 p-5 bg-white border-faded rounded mb-g shadow-5">

            <x-col :size1="6" :size2="8">
                <x-slot name='content1'>
                    <div id="panel-6" class="panel">
                        <div class="panel-hdr">
                            <h2>Secession Scale </h2>
                        </div>
                        <div class="panel-container show">
                            <div class="panel-content p-0 mb-g">
                                <div class="alert alert-success alert-dismissible fade show border-faded border-left-0 border-right-0 border-top-0 rounded-0 m-0"
                                    role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true"><i class="fal fa-times"></i></span>
                                    </button>
                                    <strong>Last update was on <span class="js-get-date"></span></strong> - Your logs are
                                    all
                                    up to date.
                                </div>
                            </div>
                            <div class="panel-content">
                                <div class="row  mb-g">
                                    <div class="col-md-6 d-flex align-items-center">
                                        <div id="flotPie" class="w-100" style="height:250px"></div>
                                    </div>
                                    <div class="col-md-6 col-lg-5 mr-lg-auto">
                                        <div class="d-flex mt-2 mb-1 fs-xs text-primary">
                                            Current Usage
                                        </div>
                                        <div class="progress progress-xs mb-3">
                                            <div class="progress-bar" role="progressbar" style="width: 70%;"
                                                aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <div class="d-flex mt-2 mb-1 fs-xs text-info">
                                            Net Usage
                                        </div>
                                        <div class="progress progress-xs mb-3">
                                            <div class="progress-bar bg-info-500" role="progressbar" style="width: 30%;"
                                                aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <div class="d-flex mt-2 mb-1 fs-xs text-warning">
                                            Users blocked
                                        </div>
                                        <div class="progress progress-xs mb-3">
                                            <div class="progress-bar bg-warning-500" role="progressbar" style="width: 40%;"
                                                aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <div class="d-flex mt-2 mb-1 fs-xs text-danger">
                                            Custom cases
                                        </div>
                                        <div class="progress progress-xs mb-3">
                                            <div class="progress-bar bg-danger-500" role="progressbar"
                                                style="width: 15%;" aria-valuenow="15" aria-valuemin="0"
                                                aria-valuemax="100"></div>
                                        </div>
                                        <div class="d-flex mt-2 mb-1 fs-xs text-success">
                                            Test logs
                                        </div>
                                        <div class="progress progress-xs mb-3">
                                            <div class="progress-bar bg-success-500" role="progressbar"
                                                style="width: 25%;" aria-valuenow="25" aria-valuemin="0"
                                                aria-valuemax="100"></div>
                                        </div>
                                        <div class="d-flex mt-2 mb-1 fs-xs text-dark">
                                            Uptime records
                                        </div>
                                        <div class="progress progress-xs mb-3">
                                            <div class="progress-bar bg-fusion-500" role="progressbar"
                                                style="width: 10%;" aria-valuenow="10" aria-valuemin="0"
                                                aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </x-slot>
            </x-col>
        </div> --}}
