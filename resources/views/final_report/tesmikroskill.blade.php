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
                'heading1' => 'Tes Mikroskil',
                'heading2' => 'Pengujian Keterampilan Mikro',
            ])
            @endcomponent
        </div>

        <div class="container mt-3">
            <form action="{{ route('report.tesMikroskillStore', $report->id) }}" method="POST">
                @csrf
                <div class="card">
                    <div class="card-header">
                        <h4>Tes Mikroskil</h4>
                        <p>Pilih angka dari 1 hingga 5 sesuai dengan tingkat kesetujuan Anda:</p>
                    </div>
                    <div class="card-body">
                        @php
                            // Data soal dikelompokkan berdasarkan kategori
                            $groups = [
                                'Kelompok 1: Problem Solving & Analytical Thinking' => [
                                    'Saya dapat mengidentifikasi masalah dengan cepat ketika terjadi kesalahan dalam sistem.',
                                    'Saya mampu menguraikan masalah kompleks menjadi bagian-bagian yang lebih sederhana.',
                                    'Saya sering menemukan solusi inovatif untuk masalah yang saya hadapi.',
                                    'Saya percaya diri dalam mengambil keputusan berdasarkan analisis data.',
                                ],
                                'Kelompok 2: Communication & Interpersonal Skills' => [
                                    'Saya merasa nyaman menyampaikan pendapat saya di depan kelompok.',
                                    'Saya aktif mendengarkan ketika rekan kerja atau teman berbicara.',
                                    'Saya mampu menyampaikan ide secara jelas melalui tulisan maupun lisan.',
                                    'Saya menghargai pendapat orang lain meskipun berbeda dengan pandangan saya.',
                                ],
                                'Kelompok 3: Time Management & Organizational Skills' => [
                                    'Saya selalu membuat jadwal harian untuk menyelesaikan tugas.',
                                    'Saya mampu mengatur prioritas pekerjaan dengan baik.',
                                    'Saya jarang terlambat dalam menyelesaikan tugas yang diberikan.',
                                    'Saya dapat menyelesaikan pekerjaan dengan efisien meskipun berada di bawah tekanan waktu.',
                                ],
                                'Kelompok 4: Adaptability & Continuous Learning' => [
                                    'Saya mudah beradaptasi dengan perubahan situasi atau lingkungan kerja.',
                                    'Saya terbuka untuk mempelajari hal-hal baru secara mandiri.',
                                    'Saya tidak merasa terbebani saat harus mempelajari teknologi atau prosedur baru.',
                                    'Saya mampu menyesuaikan diri dengan cepat ketika terjadi perubahan mendadak.',
                                ],
                                'Kelompok 5: Initiative & Creativity' => [
                                    'Saya sering mengambil inisiatif untuk memulai proyek atau tugas baru.',
                                    'Saya percaya bahwa kreativitas adalah kunci untuk menyelesaikan masalah.',
                                    'Saya suka mencari cara-cara baru untuk meningkatkan efisiensi kerja.',
                                    'Saya merasa termotivasi untuk terus mengembangkan ide-ide kreatif di tempat kerja.',
                                ],
                            ];
                            $questionIndex = 1;
                        @endphp

                        @foreach ($groups as $groupTitle => $questions)
                            <h5 class="mt-4">{{ $groupTitle }}</h5>
                            @foreach ($questions as $question)
                                <div class="form-group">
                                    <label>{{ $question }}</label>
                                    @for ($i = 1; $i <= 5; $i++)
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="question{{ $questionIndex }}" id="question{{ $questionIndex }}-{{ $i }}" value="{{ $i }}" required>
                                            <label class="form-check-label" for="question{{ $questionIndex }}-{{ $i }}">
                                                @if ($i == 1)
                                                    1 - Tidak Setuju
                                                @elseif ($i == 3)
                                                    3 - Netral
                                                @elseif ($i == 5)
                                                    5 - Sangat Setuju
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
