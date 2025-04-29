@extends('inc.main')
@section('title', 'Kampus')
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
                'icon' => 'building',
                'heading1' => 'Kampus',
                'heading2' => 'MBKM',
            ])
            @endcomponent
        </div>

        @if (Auth::user()->getRoleNames()->first() == 'SuperAdmin')
            <x-panel.show title="Daftar" subtitle="Kampus">
                <x-slot name="paneltoolbar">
                    @can('tambah-kampus')
                        <x-panel.tool-bar>
                            <a href="{{ route('kampus.create') }}" class="btn btn-primary btn-sm">Tambah Data</a>
                        </x-panel.tool-bar>
                    @endcan
                </x-slot>
                <table id="dt-basic-example" class="table table-bordered table-hover table-striped w-100">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kampus as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td class="text-capitalize">{{ $item->name }}</td>
                                <td>
                                    <a href="{{ route('kampus.show', $item->id) }}" class="btn btn-info btn-sm">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    @can('edit-kampus')
                                        <a href="{{ route('kampus.edit', $item->id) }}" class="btn btn-primary btn-sm"><i
                                                class="fa fa-edit"></i></a>
                                    @endcan
                                    {{-- Tombol Hapus --}}
                                    {{-- @can('hapus-kampus')
                                    <button type="button" class="btn btn-danger btn-sm"
                                        onclick="confirmDelete({{ $item->id }})">
                                        <i class="fa fa-trash"></i></button>
                                @endcan --}}

                                    {{-- Form Hapus --}}
                                    {{-- @can('hapus-kampus')
                                    <form id="delete-form-{{ $item->id }}" action="{{ route('kampus.destroy', $item->id) }}"
                                        method="POST" style="display:none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                @endcan --}}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </x-panel.show>
        @else
            <x-panel.show title="Profil Kampus" subtitle="Rincian Informasi Kampus">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card shadow-lg border-0 rounded-lg">
                            <div class="card-body text-center">
                                {{-- Logo Kampus --}}
                                <img src="{{ $kampusAdmin->image ? asset('kampus/' . $kampusAdmin->image) : asset('admin/img/users/user.jpg') }}"
                                    class="rounded-circle shadow img-thumbnail" style="width: 120px; height: 120px;"
                                    alt="Logo Kampus">

                                {{-- Nama Kampus --}}
                                <h4 class="mt-3 mb-1">{{ $kampusAdmin->name }}</h4>

                                <hr>

                                {{-- Informasi Kampus --}}
                                <ul class="list-group list-group-flush text-left">
                                    <li class="list-group-item">
                                        <strong>Alamat:</strong> {{ $kampusAdmin->address ?? '-' }}
                                    </li>
                                    <li class="list-group-item">
                                        <strong>Telepon:</strong> {{ $kampusAdmin->phone ?? '-' }}
                                    </li>
                                    <li class="list-group-item">
                                        <strong>Fax:</strong> {{ $kampusAdmin->fax ?? '-' }}
                                    </li>
                                    <li class="list-group-item">
                                        <strong>Website:</strong> {{ $kampusAdmin->website ?? '-' }}
                                    </li>
                                </ul>

                                {{-- Tombol Edit --}}
                                @can('edit-kampus')
                                <a href="{{ route('kampus.edit', $kampusAdmin->id) }}" class="btn btn-primary mt-3">
                                    <i class="fas fa-edit"></i> Edit Kampus
                                </a>
                                @endcan
                            </div>
                        </div>
                    </div>
                </div>

            </x-panel.show>

        @endif

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
    <script src="/admin/js/datagrid/datatables/datatables.bundle.js"></script>
    <script>
        /* demo scripts for change table color */
        /* change background */
        $(document).ready(function() {
            $('#dt-basic-example').dataTable({
                responsive: true
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
