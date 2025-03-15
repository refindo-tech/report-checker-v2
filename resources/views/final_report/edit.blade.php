@extends('inc.main')
@section('title', 'Report')
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
        <form action="{{ route('report.update', $report->id) }}" method="POST">
            @csrf
            @method('PUT')
            <x-panel.show title="Edit" subtitle="Barang Masuk">
                <x-slot name="paneltoolbar">
                    <x-panel.tool-bar class="ml-2">
                        <button class="btn btn-toolbar-master" type="button" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            <i class="fal fa-ellipsis-v"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-animated dropdown-menu-right">
                            <a class="dropdown-item" href="{{ route('report.index') }}">Kembali</a>

                        </div>
                    </x-panel.tool-bar>
                </x-slot>
                <div class="form-group">
                    <label for="name">status</label>
                    <input type="text" name="name" id="name" class="form-control"
                        value="{{ old('name', $report->status) }}">
                    @error('name')
                        <span class="text-danger help-block">{{ $message }}</span>
                    @enderror
                </div>
                <x-slot name="panelcontentfoot">
                    <x-button type="submit" color="primary" :label="__('Save')" class="ml-auto" />
                </x-slot>
            </x-panel.show>
        </form>
    </main>
@endsection
{{-- @section('pages-script')
    <script src="/admin/js/formplugins/bootstrap-datepicker/bootstrap-datepicker.js"></script>
    <script src="/admin/js/formplugins/select2/select2.bundle.js"></script>
    <script>
        // Generate the incoming code when the page loads
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

@endsection --}}
