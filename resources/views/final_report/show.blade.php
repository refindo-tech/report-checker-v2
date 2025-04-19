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
                'heading1' => 'Laporan Akhir',
                'heading2' => 'MBKM',
            ])
            @endcomponent
        </div>
        <x-panel.show title="Rincian" subtitle="Laporan Akhir">
            <x-slot name="paneltoolbar">
                <x-panel.tool-bar>
                    <button class="btn btn-toolbar-master" type="button" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                        <i class="fal fa-ellipsis-v"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-animated dropdown-menu-right">
                        <a class="dropdown-item" href="{{ route('report.indexMahasiswa', $finalReport->user_id) }}">Kembali</a>
                    </div>
                </x-panel.tool-bar>
            </x-slot>
            <x-slot name="tagpanel">
                <div class="flex justify-between items-center p-4 border-b border-gray-200">
                    <!-- Bagian Kiri: Dibuat oleh -->
                    <div class="flex items-center">
                        <p class="text-sm text-gray-600 mr-4">
                            <strong>Ditinjau oleh:</strong> {{ $finalReport->reviewer->name ?? 'Belum Di Tinjau' }}
                        </p>
                        <p class="text-xs text-gray-500">
                            {{-- <em>{{ $Laporan->created_at ? $Laporan->created_at->format('d M Y, H:i') : '-' }}</em> --}}
                        </p>
                    </div>
                    <div class="flex items-center">
                        <p class="text-sm text-gray-600 mr-4">
                            <strong>KOMENTAR: <br /></strong>
                            @if ($finalReport->feedback != null)
                                {!! nl2br(e($finalReport->feedback)) !!}
                            @else
                                <span class="text-danger">Tidak ada komentar</span>
                            @endif
                        </p>
                        <p class="text-xs text-gray-500">
                            {{-- <em>{{ $Laporan->created_at ? $Laporan->created_at->format('d M Y, H:i') : '-' }}</em> --}}
                        </p>
                    </div>

                    <!-- Bagian Kanan: Diperbarui oleh -->
                    @if ($finalReport->nilai != null)
                        <div class="flex items-center text-right">
                            <p class="text-sm text-gray-600 mr-4">
                                <strong>Cetak Surat Konversi:</strong>
                            </p>
                            <a href="{{ route('report.print', $finalReport->id) }}" class="btn btn-info">
                                <i class="fa fa-download"></i>
                            </a>
                        </div>
                    @endif
                </div>
            </x-slot>
            <div class="card">
                <div class="card-body">
                    <p><strong>Nama Mahasiswa:</strong> {{ $finalReport->user->name }}</p>
                    <p><strong>Berkas Laporan: </strong>
                        @if ($finalReport->laprak)
                            <a href="{{ asset('storage/report/' . $finalReport->laprak) }}" target="_blank">
                                <i class="fas fa-file-pdf" style="font-size: 24px;"></i>
                            </a>
                            @if ($finalReport->laprak_status == true)
                                <i class="fa-solid fa-square-check text-success"></i>
                            @else
                                <i class="fa-solid fa-square-xmark text-danger"></i>
                            @endif
                        @else
                            <span class="text-danger">Belum diisi</span>
                        @endif
                    </p>
                    <p><strong>Berkas Sertifikat: </strong>
                        @if ($finalReport->sertifikat)
                            <a href="{{ asset('storage/sertifikat/' . $finalReport->sertifikat) }}" target="_blank">
                                <i class="fas fa-file-pdf" style="font-size: 24px;"></i>
                            </a>
                            @if ($finalReport->sertifikat_status == true)
                                <i class="fa-solid fa-square-check text-success"></i>
                            @else
                                <i class="fa-solid fa-square-xmark text-danger"></i>
                            @endif
                        @else
                            <span class="text-danger">Belum diisi</span>
                        @endif
                    </p>
                    <p><strong>Berkas Dokumentasi: </strong>
                        @if ($finalReport->dokumentasi)
                            <a href="{{ asset('storage/dokumentasi/' . $finalReport->dokumentasi) }}" target="_blank">
                                <i class="fas fa-file-pdf" style="font-size: 24px;"></i>
                            </a>
                            @if ($finalReport->dokumentasi_status == true)
                                <i class="fa-solid fa-square-check text-success"></i>
                            @else
                                <i class="fa-solid fa-square-xmark text-danger"></i>
                            @endif
                        @else
                            <span class="text-danger">Belum diisi</span>
                        @endif
                    </p>
                    <p><strong>Nilai Tes Mikroskill: </strong>
                        @if ($finalReport->nilai_mikroskill)
                            {{ $finalReport->nilai_mikroskill }}
                            @if ($finalReport->mikroskill_status == true)
                                <i class="fa-solid fa-square-check text-success"></i>
                            @else
                                <i class="fa-solid fa-square-xmark text-danger"></i>
                            @endif
                        @else
                            <span class="text-danger">Belum diisi</span>
                        @endif
                    </p>

                    {{-- <p><strong>Total Konversi:</strong>
                        @if ($finalReport->nilai != null)
                            {{ $finalReport->nilai }}
                        @else
                            @if ($finalReport->status == 1 || $finalReport->status == 2)
                                <span class="text-danger">Sedang Proses</span>
                            @elseif($finalReport->status == 3)
                                <span class="text-danger">Belum memenuhi syarat</span>
                            @else
                                <span class="text-danger">Belum diisi</span>
                            @endif
                        @endif
                    </p> --}}
                    <p><strong>Mitra:</strong>
                        {{ $finalReport->mitra }}
                    </p>
                    <p><strong>Alamat Mitra:</strong>
                        {{ $finalReport->addressMitra }}
                    </p>
                    <p><strong>Waktu Kegiatan:</strong>
                        {{ \Carbon\Carbon::parse($finalReport->start_date)->translatedFormat('j F Y') }} -
                        {{ \Carbon\Carbon::parse($finalReport->end_date)->translatedFormat('j F Y') }}
                    </p>
                    <p><strong>Jenis Kegiatan:</strong>
                        {{ $finalReport->JenisKegiatan }}
                    </p>
                    <p><strong>Status Pengajuan:</strong>
                        @if ($finalReport->status == 1)
                            <span class="badge badge-danger">MENUNGGU VALIDASI</span>
                        @elseif ($finalReport->status == 2)
                            <span class="badge badge-warning">MENUNGGU PENILAIAN</span>
                        @elseif ($finalReport->status == 3)
                            <span class="badge badge-primary">DOKUMEN DIKEMBALIKAN</span>
                        @elseif ($finalReport->status == 4)
                            <span class="badge badge-info">SUDAH DINILAI</span>
                        @endif
                    </p>
                    <p><strong>Lihat Hasil:</strong>
                        @if ($finalReport->status == 1)
                            <span class="text-danger">Belum Ada Hasil</span>
                        @elseif ($finalReport->status == 2)
                            <span class="text-danger">Belum Ada Hasil</span>
                        @elseif ($finalReport->status == 3)
                            <span class="text-danger">Lihat Komentar</span>
                        @elseif ($finalReport->status == 4)
                            {{-- <a href="{{ route('report.printscore', $finalReport->id) }}"  class="btn btn-info">
                                <i class="fa fa-download"></i> 
                            </a> --}}
                            <a href="{{ route('report.printscore', $finalReport->id) }}" target="_blank" class="btn btn-info">
                                <i class="fa fa-download"></i> Hasil Penilaian
                            </a>
                        @endif
                    </p>
                    @canany(['edit-laporan-akhir', 'hapus-laporan-akhir'])
                        @can('edit-laporan-akhir')
                            <a href="{{ route('report.edit', $finalReport->id) }}" class="btn btn-primary">Edit</a>
                        @endcan
                        @can('hapus-laporan-akhir')
                            <form action="{{ route('report.destroy', $finalReport->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        @endcan
                    @endcanany
                    @if (Auth::user()->getRoleNames()->first() == 'AdminPT' ||
                            Auth::user()->getRoleNames()->first() == 'SuperAdmin' ||
                            Auth::user()->getRoleNames()->first() == 'Prodi')
                        <a href="{{ route('report.indexMahasiswa', $finalReport->user_id) }}"
                            class="btn btn-secondary">Back</a>
                    @else
                        <a href="{{ route('report.index') }}" class="btn btn-secondary">Back</a>
                    @endif
                </div>
            </div>
            {{-- @dd($finalReport) --}}
        </x-panel.show>
    </main>
@endsection
