@extends('inc.main')
@section('title', 'Prodi')
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
                'heading1' => 'Program',
                'heading2' => 'Studi',
            ])
            @endcomponent
        </div>
        <form action="{{ route('programstudi.store') }}" method="POST">
            @csrf
            <x-panel.show title="Tambah" subtitle="Program Studi">
                <x-slot name="paneltoolbar">
                    <x-panel.tool-bar class="ml-2">
                        <a class="btn btn-secondary btn-sm" href="{{ route('programstudi.index') }}">Kembali</a>
                    </x-panel.tool-bar>
                </x-slot>
                @if (auth()->user()->getRoleNames()->first() == 'SuperAdmin')
                    <div class="form-group">
                        <label for="fakultas">Fakultas</label>
                        <select name="fakultas" id="fakultas" class="form-control select2" required>
                            <option value="">Pilih Fakultas</option>
                            @foreach ($fakultas as $fakultas)
                                <option value="{{ $fakultas->id }}">
                                    {{ 'Fakultas ' . $fakultas->name . ' (' . $fakultas->kampus->name . ')' }}</option>
                            @endforeach
                        </select>
                        @error('fakultas')
                            <span class="text-danger help-block">{{ $message }}</span>
                        @enderror
                    </div>
                @else
                    <div class="form-group">
                        <label for="fakultas">Fakultas</label>
                        <select name="fakultas" id="fakultas" class="form-control select2" required>
                            <option value="">Pilih Fakultas</option>
                            @foreach ($fakultasRole as $fakultas)
                                <option value="{{ $fakultas->id }}">
                                    {{ 'Fakultas ' . $fakultas->name . ' (' . $fakultas->kampus->name . ')' }}</option>
                            @endforeach
                        </select>
                        @error('fakultas')
                            <span class="text-danger help-block">{{ $message }}</span>
                        @enderror
                    </div>
                @endif
                <div class="form-group">
                    <label for="Name">Nama Program Studi</label>
                    <input type="text" name="name" id="name" class="form-control text-capitalize"
                        value="{{ old('name') }}" placeholder="Masukkan Nama Program Studi" required>
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
    <script src="/admin/js/formplugins/select2/select2.bundle.js"></script>
    <script>
        $(document).ready(function() {
            $('.select2').select2({
                placeholder: "Pilih Fakultas",
                allowClear: true
            });
        });
    </script>

@endsection
