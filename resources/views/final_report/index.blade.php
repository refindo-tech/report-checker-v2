@extends('inc.main')
@section('title', 'Report')
@section('pages-css')
    <link rel="stylesheet" media="screen, print" href="/admin/css/fa-solid.css">
    <link rel="stylesheet" media="screen, print" href="/admin/css/theme-demo.css">
    <link rel="stylesheet" media="screen, print" href="/admin/css/notifications/toastr/toastr.css">
    <link rel="stylesheet" media="screen, print" href="/admin/css/datagrid/datatables/datatables.bundle.css">
@endsection
@section('pages-content')
    <main id="js-page-content" role="main" class="page-content">
        @include('inc._page_breadcrumb', [
            'category_1' => 'Master',
        ])
        <div class="subheader">
            @component('inc._page_heading', [
                'icon' => 'graduation-cap',
                'heading1' => 'Pengajuan Berkas',
                'heading2' => 'MBKM',
            ])
            @endcomponent
        </div>
        <x-panel.show title="Daftar" subtitle="Pengajuan Berkas">
            <x-slot name="paneltoolbar">
                @can('tambah-laporan-akhir')
                    <x-panel.tool-bar>
                        @if ($reports?->berkas == null || $reports?->status == 3 || $reports?->status == 0)
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#uploadberkas">
                                Upload Berkas
                            </button>
                        @else
                            <button type="button" class="btn btn-secondary" disabled>
                                Berkas sudah diunggah
                            </button>
                        @endif
                    </x-panel.tool-bar>
                    <!-- Modal -->
                    <div class="modal fade @if ($errors->any()) show @endif" id="uploadberkas" tabindex="-1"
                        role="dialog" aria-labelledby="importdatalabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Upload Berkas</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('report.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="mitra">Laporan Akhir</label>
                                            <input class="form-control" name="laprak" type="file" id="laprak"
                                                accept=".pdf, .doc, .docx" data-show-errors="true" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="mitra">Sertifikat</label>
                                            <input class="form-control" name="sertifikat" type="file" id="sertifikat"
                                                accept=".pdf, .doc, .docx" data-show-errors="true" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="mitra">Dokumentasi</label>
                                            <input class="form-control" name="dokumentasi" type="file" id="dokumentasi"
                                                accept=".pdf, .doc, .docx" data-show-errors="true" required>
                                        </div>
                                        @error('file')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        <div class="form-group">
                                            <label for="mitra">Mitra</label>
                                            <input type="text" name="mitra" id="mitra" class="form-control"
                                                value="{{ old('mitra') }}" required>
                                            @error('mitra')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="addressMitra">Alamat Mitra</label>
                                            <input type="text" name="addressMitra" id="addressMitra" class="form-control"
                                                value="{{ old('addressMitra') }}" required>
                                            @error('addressMitra')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="start_date">Tanggal Mulai</label>
                                            <input type="date" name="start_date" id="start_date" class="form-control"
                                                value="{{ old('start_date') }}" required>
                                            @error('start_date')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="end_date">Tanggal Akhir</label>
                                            <input type="date" name="end_date" id="end_date" class="form-control"
                                                value="{{ old('end_date') }}" required>
                                            @error('end_date')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="jenisKegiatan">Jenis Kegiatan</label>
                                            <select class="select2 form-control w-100" id="single-default"
                                                name="jenisKegiatan" id="jenisKegiatan" required>
                                                <option value="Kampus Mengajar">Kampus Mengajar</option>
                                            </select>
                                            @error('jenisKegiatan')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary">Upload</button>
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endcan
            </x-slot>
            <table id="dt-basic-example" class="table table-bordered table-hover table-striped w-100">
                <thead>
                    <tr>
                        <th>Pengajuan Ke</th>
                        <th>Nama</th>
                        <th>Status</th>
                        <th>Nilai Tes</th>
                        <th>Berkas Laporan Akhir</th>
                        <th>Berkas Sertifikat</th>
                        <th>Berkas Dokumentasi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($reportUser as $report)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $report->user->name }}</td>
                            <td>
                                @if ($report->nilai_mikroskill != null)
                                    @if ($report->status == 1)
                                        <span class="badge badge-primary">Menunggu Validasi</span>
                                    @elseif ($report->status == 2)
                                        <span class="badge badge-warning">Menunggu Penilaian</span>
                                    @elseif ($report->status == 3)
                                        <span class="badge badge-danger">Tidak Valid</span>
                                    @elseif ($report->status == 4)
                                        <span class="badge badge-success">Berhasil Dinilai</span>
                                    @endif
                                @else
                                    <span class="text-danger">Silahkan tes terlebih dahulu</span>
                                @endif
                            </td>
                            <td>{{ $report->nilai_mikroskill ?? 'Belum Tes' }}</td>
                            <td>
                                @if ($report->laprak)
                                    <a href="{{ asset('storage/report/' . $report->laprak) }}" target="_blank">
                                        <i class="fas fa-file-pdf" style="font-size: 24px;"></i>
                                    </a>
                                @else
                                    <span class="text-danger">Belum diisi</span>
                                @endif
                            </td>
                            <td>
                                @if ($report->sertifikat)
                                    <a href="{{ asset('storage/sertifikat/' . $report->sertifikat) }}" target="_blank">
                                        <i class="fas fa-file-pdf" style="font-size: 24px;"></i>
                                    </a>
                                @else
                                    <span class="text-danger">Belum diisi</span>
                                @endif
                            </td>
                            <td>
                                @if ($report->dokumentasi)
                                    <a href="{{ asset('storage/dokumentasi/' . $report->dokumentasi) }}" target="_blank">
                                        <i class="fas fa-file-pdf" style="font-size: 24px;"></i>
                                    </a>
                                @else
                                    <span class="text-danger">Belum diisi</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('report.show', $report->id) }}" class="btn btn-info">
                                    <i class="fa fa-eye"></i>
                                </a>

                                @if ($report->status == 4)
                                    <a href="{{ route('report.printscore') }}" class="btn btn-info">
                                        <i class="fa fa-download"></i> Nilai Akhir
                                    </a>
                                @endif

                                @if ($report->status == 1 || $report->nilai_mikroskill == null)
                                    <a href="{{ route('report.testMikroskill', $report->id) }}" class="btn btn-success">
                                        <i class="fa fa-clipboard"></i>
                                    </a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>


        </x-panel.show>
    </main>
@endsection
@section('pages-script')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function confirmDelete(id) {
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Data yang dihapus tidak dapat dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-form-' + id).submit();
                }
            });
        }
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            @if ($errors->any())
                // Open the modal if there are validation errors
                $('#importdata').modal('show');
            @endif
        });
    </script>
    <script src="/admin/js/datagrid/datatables/datatables.bundle.js"></script>
    <script>
        /* demo scripts for change table color */
        /* change background */
        $(document).ready(function() {
            $('#dt-basic-example').dataTable({
                responsive: true,
            });

            $('.js-thead-colors a').on('click', function() {
                var theadColor = $(this).attr("data-bg");
                console.log(theadColor);
                $('#dt-basic-example thead').removeClassPrefix('bg-').addClass(theadColor);
            });

            $('.js-tbody-colors a').on('click', function() {
                var theadColor = $(this).attr("data-bg");
                console.log(theadColor);
                $('#dt-basic-example').removeClassPrefix('bg-').addClass(theadColor);
            });

        });
    </script>
@endsection
