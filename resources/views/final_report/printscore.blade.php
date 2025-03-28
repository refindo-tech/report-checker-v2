<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Penilaian Mikroskill</title>
    <style>
        body {
            font-family: Times New Roman, Times, serif;
            font-size: 10px;
            margin: 0;
            padding: 20px;
        }

        .header-table {
            width: 100%;
            border-bottom: 1px solid black;
        }

        .header-table td {
            vertical-align: middle;
        }

        .header-table .left {
            width: 20%;
            text-align: center;
        }

        .header-table .left img {
            max-width: 100px;
            height: auto;
        }

        .header-table .center {
            width: 80%;
            text-align: center;
        }

        .header-table .center h1,
        .header-table .center h2 {
            margin: 5px 0;
        }

        .content {
            width: 100%;
            font-size: 12px;
            margin: 20px 0;
            text-align: center;
        }

        .content h2 {
            text-decoration: underline;
        }

        .biodata-table,
        .penilaian-table {
            font-size: 12px;
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }

        .biodata-table td {
            padding: 2px 5px;
            /* Mengurangi padding agar teks lebih dekat */
        }

        .biodata-table td:first-child {
            width: 25%;
            text-align: left;
            white-space: nowrap;
        }

        .biodata-table td:last-child {
            width: 75%;
            text-align: left;
        }

        .penilaian-table th,
        .penilaian-table td {
            border: 1px solid black;
            padding: 5px;
            text-align: center;
        }

        .penilaian-table th {
            background-color: #d3d3d3;
        }

        .penilaian-table tr:last-child {
            font-weight: bold;
            background-color: #f0f0f0;
            /* Warna abu-abu muda agar tampak lebih jelas */
        }
    </style>
</head>

<body>
    <table class="header-table">
        <tr>
            <td class="left">
                @if (empty($kampus->image))
                    <p class="text-danger">Perbarui data kampus</p>
                @else
                    <img src="{{ $img_kampus }}" alt="Gambar Kampus">
                @endif
            </td>
            <td class="center">
                <h1>KEMENTERIAN PENDIDIKAN DAN KEBUDAYAAN</h1>
                <h1>{{ strtoupper($kampus->name ?? '-') }}</h1>
                <h2>{{ $kampus->address ?? '-' }}</h2>
                <h2>Telp. {{ $kampus->phone ?? '-' }}, Fax. {{ $kampus->fax ?? '-' }}</h2>
                <h2>Website: {{ $kampus->website ?? '-' }}</h2>
            </td>
        </tr>
    </table>
    <table class="penilaian-table">

    </table>
    </div>
    <div class="content">
        <h2>NILAI AKHIR KEGIATAN MBKM</h2>

        <table class="biodata-table">
            {{-- <tr>
                <td>Nama Reviewer</td>
                <td>: {{ $report->reviewer->name ?? '-' }}</td>
            </tr>
            <tr>
                <td>NIP</td>
                <td>: {{ $report->dosen->nip ?? '-' }}</td>
            </tr> --}}
            <tr>
                <td>Nama Mahasiswa</td>
                <td>: {{ $report->user->name ?? '-' }}</td>
            </tr>
            <tr>
                <td>NIM</td>
                <td>: {{ $report->Mahasiswa->nim ?? '-' }}</td>
            </tr>
            <tr>
                <td>Fakultas</td>
                <td>: {{ $report->user->programStudi->fakultas->name ?? '-' }}</td>
            </tr>
            <tr>
                <td>Program Studi</td>
                <td>: {{ $report->user->programStudi->name ?? ('-' ?? '-') }}</td>
            </tr>
            <tr>
                <td>Nama Mitra MBKM</td>
                <td>: {{ $report->mitra ?? '-' }}</td>
            </tr>
            <tr>
                <td>Alamat Mitra MBKM</td>
                <td>: {{ $report->addressMitra ?? '-' }}</td>
            </tr>
            <tr>
                <td>Waktu Kegiatan</td>
                <td>:
                    @if ($report->start_date && $report->end_date)
                        {{ \Carbon\Carbon::parse($report->start_date)->translatedFormat('j F Y') }} -
                        {{ \Carbon\Carbon::parse($report->end_date)->translatedFormat('j F Y') }}
                    @else
                        -
                    @endif
                </td>
            </tr>
            <tr>
                <td>Jenis Kegiatan</td>
                <td>: {{ $report->JenisKegiatan ?? '-' }}</td>
            </tr>
        </table>

        <table class="penilaian-table">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>Nama Mata Kuliah</th>
                    <th>Nilai</th>
                    <th>SKS</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pivotData as $data)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $data->matkul->name ?? '-' }}</td>
                        <td>{{ $data->nilai ?? '-' }}</td>
                        <td>{{ $data->matkul->sks ?? '-' }}</td>
                    </tr>
                @endforeach
                <tr>
                    <td colspan="3" style="font-weight: bold; text-align: center;">Jumlah SKS Terkonversi</td>
                    <td style="text-align: center; font-weight: bold;">{{ $totalSks ?? '-' }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</body>

</html>
