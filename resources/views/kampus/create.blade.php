@extends('inc.main')
@section('title', 'Kampus')
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
                'icon' => 'building',
                'heading1' => 'Kampus',
                'heading2' => 'MBKM',
            ])
            @endcomponent
        </div>
        <form action="{{ route('kampus.store') }}" method="POST">
            @csrf
            <x-panel.show title="Tambah" subtitle="Kampus">
                <x-slot name="paneltoolbar">
                    <x-panel.tool-bar class="ml-2">
                        <a class="btn btn-secondary btn-sm" href="{{ route('kampus.index') }}">Kembali</a>
                    </x-panel.tool-bar>
                </x-slot>
                <div class="form-group">
                    <label for="Name">Nama</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" placeholder="Masukkan Nama Kampus.." required>
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
@section('pages-script')
    <script src="/admin/js/formplugins/bootstrap-datepicker/bootstrap-datepicker.js"></script>
    <script src="/admin/js/formplugins/select2/select2.bundle.js"></script>
    <script>
        // Generate the product code when the page loads
        document.addEventListener("DOMContentLoaded", function() {
            var kodeProdukField = document.getElementById('kode_keluar');

            // Ambil bulan dengan penyesuaian +1
            var month = new Date().getMonth() + 1;
            var day = new Date().getDate();
            var hours = new Date().getHours();
            var minutes = new Date().getMinutes();
            var seconds = new Date().getSeconds();

            // Gabungkan nilai untuk kode produk
            var kodeProduk = 'OUT-' + month + day + hours + minutes + seconds;
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
