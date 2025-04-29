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
        <x-panel.show title="Detail" subtitle="Laporan Akhir">
            <x-slot name="paneltoolbar">
                <x-panel.tool-bar>
                    <button class="btn btn-toolbar-master" type="button" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                        <i class="fal fa-ellipsis-v"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-animated dropdown-menu-right">
                        <a class="dropdown-item" href="{{ route('kampus.index') }}">Kembali</a>
                    </div>
                </x-panel.tool-bar>
            </x-slot>
            <div class="card">
                <div class="card-body">
                    <p><strong>Nama:</strong> {{ $kampus->name }}</p>
                    <p><strong>Alamat: </strong>
                        {{ $kampus->address }}
                    </p>
                    <p><strong>Telepon:</strong>
                        {{ $kampus->phone }}
                    </p>
                    <p><strong>Fax:</strong>
                        {{ $kampus->fax }}
                    </p>
                    <p><strong>Website:</strong>
                        <a href="{{ 'https://' . $kampus->website }}" target="_blank">{{ $kampus->website }}</a>
                    </p>
                    <img src="{{ asset('kampus/' . $kampus->image) }}" alt="{{ $kampus->name }}">
                    <br><hr>
                    @canany(['edit-laporan-akhir', 'hapus-laporan-akhir'])
                        @can('edit-laporan-akhir')
                            <a href="{{ route('kampus.edit', $kampus->id) }}" class="btn btn-primary">Edit</a>
                        @endcan
                        {{-- @can('hapus-laporan-akhir')
                            <form action="{{ route('kampus.destroy', $kampus->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        @endcan --}}
                    @endcanany
                    <a href="{{ route('kampus.index') }}" class="btn btn-secondary">Back</a>
                </div>
            </div>
        </x-panel.show>
    </main>
@endsection
