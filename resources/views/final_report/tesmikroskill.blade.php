@extends('inc.main')
@section('title', 'Report')
@section('pages-css')
    <link rel="stylesheet" media="screen, print" href="/admin/css/fa-solid.css">
    <link rel="stylesheet" media="screen, print" href="/admin/css/theme-demo.css">
    <link rel="stylesheet" media="screen, print" href="/admin/css/notifications/toastr/toastr.css">
    <link rel="stylesheet" media="screen, print" href="/admin/css/datagrid/datatables/datatables.bundle.css">
    <!-- Dropify & Animasi Upload -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropify/0.2.2/css/dropify.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropify/0.2.2/js/dropify.min.js"></script>
@endsection
@section('pages-content')
    <main id="js-page-content" role="main" class="page-content">
        @include('inc._page_breadcrumb', [
            'category_1' => 'Master',
        ])
        <div class="subheader">
            @component('inc._page_heading', [
                'icon' => 'graduation-cap',
                'heading1' => 'INSTRUMEN MIKROSKILL',
                'heading2' => 'PROGRAM KAMPUS MENGAJAR',
            ])
            @endcomponent
        </div>

        <div class="container mt-3">
            <form action="{{ route('report.tesMikroskillStore', $report->id) }}" method="POST">
                @csrf
                <div class="card">
                    <div class="card-header">
                        <h4>Petunjuk Pengisian:</h4>
                        <p>Silakan pilih pada salah satu pilihan jawaban sesuai dengan pendapat Anda terhadap pernyataan
                            berikut.</p>
                        <h4>Skala Pengukuran:</h4>
                        <p>
                            1 = Sangat Rendah </br>
                            2 = Rendah </br>
                            3 = Tinggi </br>
                            4 = Sangat Tinggi
                        </p>
                    </div>
                    <div class="card-body">
                        @php
                            // Data soal dikelompokkan berdasarkan kategori
                            $groups = [
                                'KETERAMPILAN KOMUNIKASI' => [
                                    'Kemampuan menyampaikan materi dengan jelas dan menarik.',
                                    'Keterampilan mendengarkan aktif saat berinteraksi dengan orang lain.',
                                    'Kemampuan menggunakan bahasa yang efektif dalam mengajar.',
                                    'Kemampuan menyesuaikan gaya komunikasi dengan tingkat pemahaman siswa.',
                                    'Keterampilan menulis laporan atau catatan pembelajaran dengan baik.',
                                ],
                                'KEPEMIMPINAN' => [
                                    'Kemampuan mengambil inisiatif dalam kegiatan pembelajaran.',
                                    'Kemampuan membimbing dan menginspirasi.',
                                    'Keterampilan bekerja sama dan mengoordinasikan tugas dengan guru dan rekan mahasiswa.',
                                    'Kemampuan memberi motivasi dan membangun semangat belajar siswa.',
                                    'Keberanian mengambil keputusan dalam situasi pendidikan yang menantang.',
                                ],
                                'MANAJEMEN WAKTU' => [
                                    'Kemampuan mengatur jadwal antara mengajar dan kegiatan akademik.',
                                    'Efisiensi dalam menyusun rencana pembelajaran.',
                                    'Prioritas dalam menyelesaikan tugas dengan tepat waktu.',
                                    'Fleksibilitas dalam menyesuaikan jadwal sesuai dengan kebutuhan di sekolah.',
                                    'Kemampuan menyelesaikan pekerjaan tanpa menunda-nunda.',
                                ],
                                'PROBLEM SOLVING' => [
                                    'Kemampuan menganalisis permasalahan pembelajaran di kelas.',
                                    'Kreativitas dalam mencari solusi alternatif untuk meningkatkan pemahaman siswa.',
                                    'Kemampuan menyelesaikan konflik antar siswa atau antara siswa dan guru.',
                                    'Daya tahan dalam menghadapi kendala pembelajaran di lingkungan sekolah.',
                                    'Kemampuan mengevaluasi efektivitas solusi yang ditetapkan.',
                                ],
                                'ADAPTASI' => [
                                    'Kemampuan menyesuaikan diri dengan lingkungan sekolah yang beragam.',
                                    'Kemampuan menghadapi perubahan metode pembelajaran dengan cepat.',
                                    'Kesiapan bekerja dalam kondisi keterbatasan fasilitas.',
                                    'Fleksibilitas dalam menyesuaikan strategi mengajar berdasarkan kondisi siswa.',
                                    'Kemampuan memahami dan menghormati budaya serta kebiasaan di sekolah.',
                                ],
                            ];
                            $questionIndex = 1;
                        @endphp

                        @foreach ($groups as $groupTitle => $questions)
                            <h5 class="mt-4">{{ $groupTitle }}</h5>
                            @foreach ($questions as $question)
                                <div class="form-group">
                                    <label>{{ $question }}</label>
                                    @for ($i = 1; $i <= 4; $i++)
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio"
                                                name="question{{ $questionIndex }}"
                                                id="question{{ $questionIndex }}-{{ $i }}"
                                                value="{{ $i }}" required>
                                            <label class="form-check-label"
                                                for="question{{ $questionIndex }}-{{ $i }}">
                                                @if ($i == 1)
                                                    1 - Sangat Rendah
                                                @elseif ($i == 2)
                                                    2 - Rendah
                                                @elseif ($i == 3)
                                                    3 - Tinggi
                                                @elseif ($i == 4)
                                                    4 - Sangat Tinggi
                                                @else
                                                    {{ $i }}
                                                @endif
                                            </label>
                                        </div>
                                    @endfor
                                </div>
                                @php $questionIndex++; @endphp
                            @endforeach
                        @endforeach
                    </div>
                    <div class="card-footer text-right">
                        <button type="submit" class="btn btn-primary">Submit Tes</button>
                    </div>
                </div>
            </form>
        </div>
    </main>
@endsection
