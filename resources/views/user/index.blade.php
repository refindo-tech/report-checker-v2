@extends('inc.main')
@section('title', 'Pengguna')
@section('pages-css')
    <link rel="stylesheet" media="screen, print" href="/admin/css/fa-solid.css">
    <link rel="stylesheet" media="screen, print" href="/admin/css/theme-demo.css">
    <link rel="stylesheet" media="screen, print" href="/admin/css/notifications/toastr/toastr.css">
    <link rel="stylesheet" media="screen, print" href="/admin/css/datagrid/datatables/datatables.bundle.css">
@endsection
@section('pages-content')
    <main id="js-page-content" role="main" class="page-content">
        @include('inc._page_breadcrumb', [
            'category_1' => 'Settings',
        ])
        <div class="subheader">
            @component('inc._page_heading', [
                'icon' => 'users',
                'heading1' => 'Pengguna',
                'heading2' => 'WebApps',
            ])
            @endcomponent
        </div>
        @if (Auth::user()->getRoleNames()->first() == 'SuperAdmin')
            <x-panel.show title="Daftar" subtitle="Pengguna WebApps">
                <x-slot name="paneltoolbar">
                    @can('tambah-user')
                        <x-panel.tool-bar>
                            <a href="{{ route('user.create') }}" class="btn btn-primary btn-sm">Tambah Data</a>
                        </x-panel.tool-bar>
                    @endcan
                </x-slot>
                <table id="dt-basic-example" class="table table-bordered table-hover table-striped w-100">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Role</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>image</th>
                            @canany(['edit-user', 'hapus-user'])
                                <th>Aksi</th>
                            @endcanany
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    <span
                                        class="badge 
                                        @switch($user->getRoleNames()->first())
                                            @case('SuperAdmin') bg-danger @break
                                            @case('AdminPT') bg-primary @break
                                            @case('Prodi') bg-success @break
                                            @case('Mahasiswa') bg-secondary @break
                                            @default bg-secondary
                                        @endswitch">
                                        {{ $user->getRoleNames()->first() ?? 'Tidak Tersedia' }}
                                    </span>

                                </td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    @if ($user->image == null)
                                        <span class="badge bg-primary">No Image</span>
                                    @else
                                        <img src="{{ asset('storage/profile/' . $user->image) }}" alt="{{ $user->name }}"
                                            style="max-width: 50px">
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('user.show', $user->id) }}" class="btn btn-info">Rincian</a>

                                    {{-- Tombol Edit --}}
                                    @can('edit-user')
                                        <a href="{{ route('user.edit', $user->id) }}" class="btn btn-warning">Edit</a>
                                    @endcan

                                    {{-- Tombol Hapus --}}
                                    @can('hapus-user')
                                        <button type="button" class="btn btn-danger"
                                            onclick="confirmDelete({{ $user->id }})">Hapus</button>
                                    @endcan

                                    {{-- Form Hapus --}}
                                    @can('hapus-user')
                                        <form id="delete-form-{{ $user->id }}"
                                            action="{{ route('user.destroy', $user->id) }}" method="POST"
                                            style="display:none;">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </x-panel.show>
        @else
            <x-panel.show title="Daftar" subtitle="Pengguna WebApps">
                <x-slot name="paneltoolbar">
                    @can('tambah-user')
                        <x-panel.tool-bar>
                            <a href="{{ route('user.create') }}" class="btn btn-primary btn-sm">Tambah Data</a>
                        </x-panel.tool-bar>
                    @endcan
                </x-slot>
                <table id="dt-basic-example" class="table table-bordered table-hover table-striped w-100">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Role</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>image</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($usersAdmin as $user)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    <span
                                        class="badge 
                                        @switch($user->getRoleNames()->first())
                                            @case('SuperAdmin') bg-danger @break
                                            @case('AdminPT') bg-primary @break
                                            @case('Prodi') bg-success @break
                                            @case('Mahasiswa') bg-secondary @break
                                            @default bg-secondary
                                        @endswitch">
                                        {{ $user->getRoleNames()->first() ?? 'Tidak Tersedia' }}
                                    </span>

                                </td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    @if ($user->image == null)
                                        <span class="badge bg-primary">No Image</span>
                                    @else
                                        <img src="{{ asset('storage/profile/' . $user->image) }}"
                                            alt="{{ $user->name }}" style="max-width: 50px">
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('user.show', $user->id) }}" class="btn btn-info">Rincian</a>

                                    {{-- Tombol Edit --}}
                                    @can('edit-user')
                                        <a href="{{ route('user.edit', $user->id) }}" class="btn btn-warning">Edit</a>
                                    @endcan

                                    {{-- Tombol Hapus --}}
                                    @can('hapus-user')
                                        <button type="button" class="btn btn-danger"
                                            onclick="confirmDelete({{ $user->id }})">Hapus</button>
                                    @endcan

                                    {{-- Form Hapus --}}
                                    @can('hapus-user')
                                        <form id="delete-form-{{ $user->id }}"
                                            action="{{ route('user.destroy', $user->id) }}" method="POST"
                                            style="display:none;">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
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
