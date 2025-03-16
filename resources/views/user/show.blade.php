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
                'icon' => 'user',
                'heading1' => 'Pengguna',
                'heading2' => 'WebApps',
            ])
            @endcomponent
        </div>

        <x-panel.show title="Default" subtitle="Example">
            <x-slot name="paneltoolbar">
                <x-panel.tool-bar>
                    <button class="btn btn-toolbar-master" type="button" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                        <i class="fal fa-ellipsis-v"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-animated dropdown-menu-right">
                        <a class="dropdown-item" href="{{ route('user.index') }}">Kembali</a>
                    </div>
                </x-panel.tool-bar>
            </x-slot>
            {{-- <x-slot name="tagpanel">
                isi-tag-panel
            </x-slot> --}}
            <div class="card">
                <div class="card-body">
                    <p><strong>Role:</strong>
                        @if ($user->roles->isNotEmpty())
                            @foreach ($user->roles as $role)
                                @if ($role->name == 'AdminPT')
                                    <span class="badge bg-danger text-white">{{ $role->name }}</span>
                                @elseif($role->name == 'SuperAdmin')
                                    <span class="badge bg-danger text-white">{{ $role->name }}</span>
                                @elseif($role->name == 'Prodi')
                                    <span class="badge bg-primary text-white">{{ $role->name }}</span>
                                @else
                                    <span class="badge bg-success text-white">{{ $role->name }}</span>
                                @endif
                            @endforeach
                        @else
                            <p>User ini belum memiliki role.</p>
                        @endif
                    </p>
                    <p><strong>Kampus:</strong> {{ $user->kampus->name }}</p>
                    <p><strong>Nama:</strong> {{ $user->name }}</p>
                    <p><strong>Email:</strong> {{ $user->email }}</p>
                    <p><strong>Photo:</strong>
                        @if ($user->image == null)
                            <span class="badge bg-primary text-white">No Image</span>
                        @else
                            <img class="rounded" src="{{ asset('storage/profile/' . $user->image) }}"
                                alt="{{ $user->name }}" style="max-width: 50px">
                        @endif
                    </p>
                    @if ($user->prodi != null)
                        <p><strong>NIP:</strong> {{ $user->prodi->nip ?? '-' }}</p>
                        <p><strong>Gender:</strong>{{ $user->prodi ? ($user->prodi->gender === 'L' ? 'Laki-Laki' : 'Perempuan') : '-' }}
                        </p>
                        <p><strong>Alamat:</strong> {{ $user->prodi->address ?? '-' }}</p>
                        <p><strong>No HP:</strong> {{ $user->prodi->phone ?? '-' }}</p>
                    @elseif($user->Mahasiswa != null)
                        <p><strong>NIM:</strong> {{ $user->Mahasiswa->nim ?? '-' }}</p>
                        <p><strong>Gender:</strong>
                            {{ $user->Mahasiswa->gender === 'L' ? 'Laki-Laki' : 'Perempuan' ?? '-' }}</p>
                        <p><strong>Alamat:</strong> {{ $user->Mahasiswa->address ?? '-' }}</p>
                        <p><strong>No HP:</strong> {{ $user->Mahasiswa->phone ?? '-' }}</p>
                        <p><strong>Semester:</strong> {{ $user->Mahasiswa->semester ?? '-' }}</p>
                    @endif

                    <a href="{{ route('user.edit', $user) }}" class="btn btn-primary">Edit</a>
                    <form action="{{ route('user.destroy', $user) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                    <a href="{{ route('user.index') }}" class="btn btn-secondary">Back</a>
                </div>
            </div>
        </x-panel.show>
    </main>
@endsection
