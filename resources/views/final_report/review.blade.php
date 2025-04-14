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
                            <a class="dropdown-item"
                                href="{{ route('report.indexMahasiswa', $report->user_id) }}">Kembali</a>
                        </div>
                    </x-panel.tool-bar>
                </x-slot>

                <div class="row">
                    <!-- Pilih Status -->

                    <!-- Validasi Berkas -->
                    <table class="table table-bordered table-hover table-striped w-100">
                        <tr>
                            <td><strong>NAMA</strong></td>
                            <td><strong>{{ $report->user->name ?? '-' }}</strong></td>
                        </tr>
                        <tr>
                            <td><strong>NIM</strong></td>
                            <td><strong>{{ $report->user->mahasiswa->nim ?? '-' }}</strong></td>
                        </tr>
                        <tr>
                            <td><strong>PRODI / FAK</strong></td>
                            <td><strong>{{ $report->user->programStudi->name ?? '-' }} /
                                    {{ $report->user->programStudi->fakultas->name ?? '-' }}</strong></td>
                        </tr>
                        <tr>
                            <td><strong>LAPORAN AKHIR</strong></td>
                            <td>
                                <label class="text-success"><input type="radio" name="laprak" value="1" required>
                                    VALID</label>
                                <label class="text-danger"><input type="radio" name="laprak" value="0" required>
                                    TIDAK VALID</label>
                            </td>
                        </tr>
                        <tr>
                            <td><strong>SERTIFIKAT</strong></td>
                            <td>
                                <label class="text-success"><input type="radio" name="sertifikat" value="1" required>
                                    VALID</label>
                                <label class="text-danger"><input type="radio" name="sertifikat" value="0" required>
                                    TIDAK
                                    VALID</label><br>
                            </td>
                        </tr>
                        <tr>
                            <td><strong>DOKUMENTASI</strong></td>
                            <td>
                                <label class="text-success"><input type="radio" name="dokumentasi" value="1" required> VALID</label>
                                <label class="text-danger"><input type="radio" name="dokumentasi" value="0" required> TIDAK VALID</label>
                            </td>
                        </tr>
                        <tr>
                            <td><strong>NILAI REKOMENDASI PROGRAM</strong></td>
                            <td><input type="number" name="nilai_sertifikat" placeholder="MASUKKAN NILAI SERTIFIKAT"
                                    class="form-control"></td>
                        </tr>
                        <tr>
                            <td><strong>NILAI TEST MIKROSKILL</strong></td>
                            <td>
                                <label class="text-success"><input type="radio" name="tes_mikroskill" value="1" required> VALID</label>
                                <label class="text-danger"><input type="radio" name="tes_mikroskill" value="0" required> TIDAK
                                    VALID</label><br>
                                <input type="number" name="nilai_mikroskill"
                                    value="{{ old('nilai_mikroskill') . $report->nilai_mikroskill }}"
                                    placeholder="TAMPILKAN NILAI TEST MIKROSKILL" min="0" max="100"
                                    class="form-control mt-2">
                            </td>
                        </tr>
                        <tr>
                            <td><strong>MAKSIMAL SKS</strong></td>
                            <td><input type="number" name="maks_sks"
                                    placeholder="MASUKKAN MAKSIMAL SKS YANG DAPAT DIKONVERSI" min="0" max="24"
                                    class="form-control"></td>
                        </tr>
                        <tr>
                            <td><strong>KOMENTAR</strong></td>
                            <td>
                                <textarea name="feedback" rows="3" class="form-control" placeholder="MASUKKAN KOMENTAR DISINI"></textarea>
                            </td>
                        </tr>
                    </table>

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
