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
        <x-panel.show title="Detail" subtitle="Fakultas">
            <x-slot name="paneltoolbar">
                <x-panel.tool-bar>
                    <button class="btn btn-toolbar-master" type="button" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                        <i class="fal fa-ellipsis-v"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-animated dropdown-menu-right">
                        <a class="dropdown-item" href="{{ route('fakultas.index') }}">Kembali</a>
                    </div>
                </x-panel.tool-bar>
            </x-slot>
            <div class="card">
                <div class="card-body">
                    <p><strong>Kampus:</strong> {{ $fakultas->Kampus->name }}</p>
                    <p><strong>Fakultas</strong>
                        {{ $fakultas->name }}
                    </p>
                    <hr>
                    @can('edit-fakultas')
                        <a href="{{ route('fakultas.edit', $fakultas->id) }}" class="btn btn-primary">Edit</a>
                    @endcan
                    @can('hapus-fakultas')
                        <form action="{{ route('fakultas.destroy', $fakultas->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    @endcan
                    <a href="{{ route('fakultas.index') }}" class="btn btn-secondary">Back</a>
                </div>
            </div>
        </x-panel.show>
    </main>
@endsection
