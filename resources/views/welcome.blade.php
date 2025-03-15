@extends('inc.main_auth')
@section('title', 'Welcome')
@section('pages-css')
    <style>
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
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
        .hero-text h2 {
            font-size: 4rem;
            font-weight: 700;
            text-shadow: 2px 2px 10px rgba(0, 0, 0, 0.3);
        }
        .hero-text p {
            font-size: 1.2rem;
            line-height: 1.6;
            opacity: 0.9;
            margin-bottom: 15px;
            text-align: justify;
        }
        .logo-container {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .logo-container img {
            max-width: 50%;
            height: auto;
        }
        .btn-primary {
            background: #ff6f61;
            border: none;
            padding: 8px 16px;
            font-size: 0.9rem;
            transition: all 0.3s ease;
        }
        .btn-primary:hover {
            background: #e63946;
            transform: scale(1.05);
        }
        .navbar {
            position: absolute;
            top: 10px;
            left: 20px;
        }
        .footer {
            text-align: center;
            padding: 10px;
            color: white;
            position: relative;
            margin-top: auto;
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
            .navbar {
                top: 5px;
                left: 10px;
            }
        }
    </style>
@endsection
@section('pages-content')
    @component('inc._auth_header')
        <a href="{{ route('login') }}" class="btn btn-primary text-white ml-auto">
            Login
        </a>
    @endcomponent
    <div class="hero-container">
        <div class="hero-text">
            <h2>Simikro</h2>
            <p>Simikro adalah sistem digital inovatif yang dirancang untuk mempermudah evaluasi capaian microskill dalam program Merdeka Belajar Kampus Merdeka (MBKM). Dengan platform ini, mahasiswa dan dosen dapat mengakses, menilai, serta mengonversi capaian microskill ke dalam Sistem Kredit Semester (SKS) dengan lebih transparan dan efisien.</p>
            <p>Mahasiswa dapat memantau hasil evaluasi secara real-time, memahami standar penilaian, serta mendapatkan umpan balik langsung dari dosen. Sementara itu, dosen dapat melakukan penilaian dengan lebih sistematis melalui format standar yang disediakan. Rekapitulasi hasil evaluasi juga dapat dikelola secara otomatis, meningkatkan transparansi, akurasi, dan efisiensi dalam proses evaluasi capaian pembelajaran mahasiswa.</p>
        </div>
        <div class="logo-container">
            <img src="/admin/img/AA/twh.png" alt="Logo MBKM">
        </div>
    </div>
    <div class="footer">
        {{ $profileApp->app_tahun ?? '' }} - @php echo date('Y'); @endphp © {{ $profileApp->app_pengembang ?? '' }}
    </div>
@endsection
