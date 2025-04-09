@extends('inc.main')
@section('title', 'About')
@section('pages-css')
<link rel="stylesheet" media="screen, print" href="/admin/css/fa-solid.css">
<link rel="stylesheet" media="screen, print" href="/admin/css/theme-demo.css">
<link rel="stylesheet" media="screen, print" href="/admin/css/notifications/toastr/toastr.css">
@endsection
<style>
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
</style>
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
    
    <div class="fs-lg fw-300 p-5 bg-white border-faded rounded mb-g shadow-5">
        <div class="hero-container">
            <div class="logo-container">
                <img src="/admin/img/simikro2.png" alt="Logo MBKM">
            </div>
            <div class="hero-text">
                <h1>
                    SIMIKRO
                    <h4 class="mb-0">Sistem Informasi Evaluasi Mikroskill Kegiatan MBKM</h4>
                </h1>
                <div class="d-flex flex-wrap demo demo-h-spacing mt-3 mb-3">
                </div>
                <p>
                    SIMIKRO adalah sebuah sistem digital yang dirancang untuk mempermudah evaluasi capaian microskill dalam program Merdeka Belajar Kampus Merdeka (MBKM). Aplikasi ini menyediakan mekanisme yang transparan dan efisien bagi mahasiswa dan dosen dalam menilai, melacak, serta mengonversi capaian microskill ke dalam Sistem Kredit Semester (SKS).
                </p>
                <p>
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
    