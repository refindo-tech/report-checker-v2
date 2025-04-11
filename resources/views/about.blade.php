@extends('inc.main')
@section('title', 'About')
@section('pages-css')
<link rel="stylesheet" media="screen, print" href="/admin/css/fa-solid.css">
<link rel="stylesheet" media="screen, print" href="/admin/css/theme-demo.css">
<link rel="stylesheet" media="screen, print" href="/admin/css/notifications/toastr/toastr.css">
@endsection
{{-- <style>
    .hero-container {
        display: flex;
        align-items: center;
        justify-content: flex-end;
        padding: 20px 10px 0px;
        flex-wrap: wrap;
        text-align: left;
        flex: 1;
        margin-bottom: 0;
    }
    .hero-text {
        flex: 1;
        max-width: 50%;
        margin-left: 10%;
        margin-bottom: 0;
    }
    .hero-text p {
    text-align: justify;
    }
    .logo-container {
        flex: 1;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .logo-container img {
        max-width: 70%;
        height: auto;
    }
    @media (max-width: 768px) {
        .hero-container {
            flex-direction: column;
            text-align: center;
            align-items: center;
        }
        .logo-container {
            order: -1;
            margin-bottom: 20px;
        }
        .hero-text {
            max-width: 100%;
            margin-left: 0;
        }
        .logo-container img {
            max-width: 60%;
        }
    }
</style> --}}
@section('pages-content')
<main id="js-page-content" role="main" class="page-content">
    @include('inc._page_breadcrumb')
    <div class="subheader">
        @component('inc._page_heading', [
        'icon' => 'info-circle',
        'heading1' => 'About',
        ])
        @endcomponent
    </div>
    
    <div class="bg-white rounded shadow p-4">
        <div class="row align-items-center">
            <div class="col-md-6 text-center mb-4 mb-md-0">
                <img src="/admin/img/simikro2.png" class="img-fluid" alt="Logo MBKM" style="max-width: 70%;">
            </div>
            <div class="col-md-6 py-5 px-3">
                <h1 class="display-3 fw-bold mb-1">SIMIKRO</h1>
                <h4 class="fs-3 text-secondary mt-0 mb-4">Sistem Informasi Evaluasi Mikroskill Kegiatan MBKM</h4>
                <p class="text-justify fs-5 lh-lg">
                    SIMIKRO adalah sebuah sistem digital yang dirancang untuk mempermudah evaluasi capaian microskill dalam program Merdeka Belajar Kampus Merdeka (MBKM). Aplikasi ini menyediakan mekanisme yang transparan dan efisien bagi mahasiswa dan dosen dalam menilai, melacak, serta mengonversi capaian microskill ke dalam Sistem Kredit Semester (SKS).
                </p>
                <p class="text-justify fs-5 lh-lg">
                    Dengan Simikro, mahasiswa dapat mengakses hasil evaluasi secara real-time, memahami standar penilaian, serta mendapatkan umpan balik dari dosen secara langsung. Di sisi lain, dosen dapat melakukan penilaian dengan lebih sistematis, memanfaatkan format standar, serta mengelola rekapitulasi evaluasi secara otomatis. Simikro bertujuan untuk meningkatkan transparansi, akurasi, dan efisiensi dalam proses evaluasi capaian pembelajaran mahasiswa.
                </p>
            </div>
        </div>
    </div>
    
    {{-- <p class="fs-lg">
        <a href="#" class="fw-500 fs-xl">> Ready to join our dedicated team?</a><br>
        We are always on the lookout to expand and add unique app flavors to SmartAdmin. If you think you can contribute
        and create your very own flavors, get in touch with us or <a href="#" target="_blank">click here to
            learn
            more</a> about our partnership program.
        </p> --}}
    </main>
    @endsection
    