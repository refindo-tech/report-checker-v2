@extends('inc.main')
@section('title', 'Fakultas')
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
                'heading1' => 'Fakultas',
                'heading2' => 'Kampus',
            ])
            @endcomponent
        </div>
        <form action="{{ route('fakultas.store') }}" method="POST">
            @csrf
            <x-panel.show title="Tambah" subtitle="Fakultas">
                <x-slot name="paneltoolbar">
                    <x-panel.tool-bar class="ml-2">
                        <a class="btn btn-secondary btn-sm" href="{{ route('fakultas.index') }}">Kembali</a>
                    </x-panel.tool-bar>
                </x-slot>
                @if (auth()->user()->getRoleNames()->first() == 'SuperAdmin')
                    <div class="form-group">
                        <label for="Kampus">Kampus</label>
                        <select name="kampus" id="kampus" class="form-control select2">
                            <option value="">Pilih Kampus</option>
                            @foreach ($kampus as $kampus)
                                <option value="{{ $kampus->id }}">{{ $kampus->name }}</option>
                            @endforeach
                        </select>
                    </div>
                @else
                    <div class="form-group">
                        <label for="kampus">Kampus</label>
                        <input type="text" id="kampus" readonly class="form-control"
                            value="{{ auth()->user()->kampus->name }}">

                        <!-- Input hidden untuk mengirimkan ID -->
                        <input type="hidden" name="kampus" value="{{ auth()->user()->kampus->id }}">
                    </div>

                @endif
                <div class="form-group">
                    <label for="Name">Nama Fakultas</label>
                    <input type="text" name="name" id="name" class="form-control text-capitalize"
                        value="{{ old('name') }}" placeholder="Masukkan Nama Fakultas" required>
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
                placeholder: "Pilih Kampus",
                allowClear: true
            });
        });
    </script>

@endsection
