@extends('inc.main')
@section('title', 'report')
@section('pages-css')
    <link rel="stylesheet" media="screen, print" href="/admin/css/formplugins/bootstrap-datepicker/bootstrap-datepicker.css">
    <link rel="stylesheet" media="screen, print" href="/admin/css/fa-solid.css">
    <link rel="stylesheet" media="screen, print" href="/admin/css/theme-demo.css">
    <link rel="stylesheet" media="screen, print" href="/admin/css/notifications/toastr/toastr.css">
    <link rel="stylesheet" media="screen, print" href="/admin/css/datagrid/datatables/datatables.bundle.css">
    <!-- DEMO related CSS below -->
    <link rel="stylesheet" media="screen, print" href="/admin/css/fa-brands.css">
    <!-- page related CSS below -->
    <link rel="stylesheet" media="screen, print" href="/admin/css/formplugins/select2/select2.bundle.css">
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
        <form action="{{ route('report.reviewstore', $report->id) }}" method="POST">
            @csrf
            <x-panel.show title="Review Laporan" subtitle="Pilih Status dan Beri Feedback">
                <x-slot name="paneltoolbar">
                    <x-panel.tool-bar class="ml-2">
                        <button class="btn btn-toolbar-master" type="button" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            <i class="fal fa-ellipsis-v"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-animated dropdown-menu-right">
                            <a class="dropdown-item" href="{{ route('report.indexMahasiswa', $report->user_id) }}">Kembali</a>
                        </div>
                    </x-panel.tool-bar>
                </x-slot>

                <div class="row">
                    <!-- Pilih Status -->

                    <!-- Validasi Berkas -->
                    <div class="col-md-12">
                        {{-- <label>Validasi Berkas</label> --}}
                        <div class="form-group">
                            <div class="mb-2">
                                <strong>Laporan Akhir</strong>
                                <div class="d-flex gap-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="laprak" id="laprak_valid"
                                            value="1" required>
                                        <label class="form-check-label text-success" for="laprak_valid">Valid</label>
                                    </div> &NonBreakingSpace;&NonBreakingSpace;
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="laprak" id="laprak_invalid"
                                            value="0" required>
                                        <label class="form-check-label text-danger" for="laprak_invalid">Tidak Valid</label>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-2">
                                <strong>Sertifikat</strong>
                                <div class="d-flex gap-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="sertifikat"
                                            id="sertifikat_valid" value="1" required>
                                        <label class="form-check-label text-success" for="sertifikat_valid">Valid</label>
                                    </div> &NonBreakingSpace;&NonBreakingSpace;
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="sertifikat"
                                            id="sertifikat_invalid" value="0" required>
                                        <label class="form-check-label text-danger" for="sertifikat_invalid">Tidak
                                            Valid</label>
                                    </div>
                                </div>
                                <input type="number" class="form-control mt-2" name="nilai_sertifikat"
                                    id="nilai_sertifikat" placeholder="Masukkan nilai sertifikat" min="0"
                                    max="100">
                            </div>

                            <div class="mb-2">
                                <strong>Dokumentasi</strong>
                                <div class="d-flex gap-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="dokumentasi"
                                            id="dokumentasi_valid" value="1" required>
                                        <label class="form-check-label text-success" for="dokumentasi_valid">Valid</label>
                                    </div> &NonBreakingSpace;&NonBreakingSpace;
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="dokumentasi"
                                            id="dokumentasi_invalid" value="0" required>
                                        <label class="form-check-label text-danger" for="dokumentasi_invalid">Tidak
                                            Valid</label>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-2">
                                <strong>Tes Mikroskill</strong>
                                <div class="d-flex gap-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="tes_mikroskill"
                                            id="tes_mikroskill_valid" value="1" required>
                                        <label class="form-check-label text-success"
                                            for="tes_mikroskill_valid">Valid</label>
                                    </div> &NonBreakingSpace;&NonBreakingSpace;
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="tes_mikroskill"
                                            id="tes_mikroskill_invalid" value="0" required>
                                        <label class="form-check-label text-danger" for="tes_mikroskill_invalid">Tidak
                                            Valid</label>
                                    </div>
                                </div>
                                <input type="number" class="form-control mt-2" name="nilai_mikroskill" value="{{ old('nilai_mikroskill') . $report->nilai_mikroskill }}"
                                    id="nilai_mikroskill" placeholder="Masukkan nilai tes mikroskill" min="0"
                                    max="100">
                            </div>

                            <div class="mb-2">
                                <strong>Maksimal SKS</strong>
                                <input type="number" class="form-control mt-2" name="maks_sks" id="maks_sks"
                                    placeholder="Maksimal SKS yang dapat diambil" min="0" max="24">
                            </div>
                        </div>
                    </div>

                    <!-- Feedback / Komentar -->
                    <div class="col-md-12">
                        <label for="feedback">Feedback / Komentar</label>
                        <textarea name="feedback" id="feedback" class="form-control" rows="3"
                            placeholder="Berikan alasan atau komentar"></textarea>
                    </div>
                </div>



                <x-slot name="panelcontentfoot">
                    <x-button type="submit" color="primary" :label="__('Save')" class="ml-auto" />
                </x-slot>
            </x-panel.show>
        </form>
    </main>
@endsection
@section('pages-script')
    <script src="/admin/js/formplugins/bootstrap-datepicker/bootstrap-datepicker.js"></script>
    <script src="/admin/js/formplugins/select2/select2.bundle.js"></script>
    <script>
        // Generate the product code when the page loads
        document.addEventListener("DOMContentLoaded", function() {
            var kodeProdukField = document.getElementById('kode_masuk');

            // Ambil bulan dengan penyesuaian +1
            var month = new Date().getMonth() + 1;
            var day = new Date().getDate();
            var hours = new Date().getHours();
            var minutes = new Date().getMinutes();
            var seconds = new Date().getSeconds();

            // Gabungkan nilai untuk kode produk
            var kodeProduk = 'IN-' + month + day + hours + minutes + seconds;
            kodeProdukField.value = kodeProduk;
        });
        $(document).ready(function() {
            $(function() {
                $('.select2').select2();
            });
        });
        // Class definition

        var controls = {
            leftArrow: '<i class="fal fa-angle-left" style="font-size: 1.25rem"></i>',
            rightArrow: '<i class="fal fa-angle-right" style="font-size: 1.25rem"></i>'
        }

        var runDatePicker = function() {
            // input group layout
            $('#datepicker-2').datepicker({
                todayHighlight: true,
                orientation: "bottom left",
                templates: controls
            });
        }

        $(document).ready(function() {
            runDatePicker();
        });
    </script>

@endsection
