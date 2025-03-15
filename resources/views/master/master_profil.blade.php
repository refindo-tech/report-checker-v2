@extends('inc.main')
@section('title', 'Profil Master')
@section('pages-css')
    <link rel="stylesheet" media="screen, print" href="/admin/css/fa-solid.css">
    <link rel="stylesheet" media="screen, print" href="/admin/css/theme-demo.css">
    <link rel="stylesheet" media="screen, print" href="/admin/css/notifications/toastr/toastr.css">
@endsection
@section('pages-content')
    <main id="js-page-content" role="main" class="page-content">
        @include('inc._page_breadcrumb', ['category_1' => 'Master'])
        <div class="subheader">
            @component('inc._page_heading', [
                'icon' => 'user-circle',
                'heading1' => 'Profil',
                'heading2' => 'Pengguna',
            ])
            @endcomponent
        </div>
        <x-row-column :column="1">
            <x-slot name='column1'>
                <x-panel.show title="Profil" subtitle="{{ auth()->user()->role }}">
                    <x-slot name="paneltoolbar">
                        <x-panel.tool-bar class="ml-2">
                            <button class="btn btn-toolbar-master" type="button" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <i class="fal fa-ellipsis-v"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-animated dropdown-menu-right">
                                <a class="dropdown-item" href="/dashboard">Kembali</a>
                                <a class="dropdown-item" href="{{ route('profil_admin.edit') }}">Sunting</a>
                                <div class="dropdown-divider m-0"></div>
                            </div>
                        </x-panel.tool-bar>
                    </x-slot>
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="card shadow-lg border-0 rounded-lg">
                                <div class="card-body text-center">
                                    {{-- Foto Profil --}}
                                    <img src="{{ auth()->user()->image ? asset('storage/profile/' . auth()->user()->image) : asset('admin/img/users/user.jpg') }}"
                                        class="rounded-circle shadow img-thumbnail" style="width: 120px; height: 120px;"
                                        alt="User Profile Picture">

                                    {{-- Nama dan Email --}}
                                    <h4 class="mt-3 mb-1">{{ auth()->user()->name }}</h4>
                                    <p class="text-muted">{{ auth()->user()->email }}</p>

                                    <hr>

                                    {{-- Informasi Tambahan --}}
                                    <ul class="list-group list-group-flush text-left">
                                        @if (Auth::user()->getRoleNames()->first() == 'Dosen' || Auth::user()->getRoleNames()->first() == 'Admin')
                                            <li class="list-group-item">
                                                <strong>NIP:</strong> {{ $user->dosen->nip ?? '-' }}
                                            </li>
                                            <li class="list-group-item">
                                                <strong>Gender:</strong>
                                                {{ isset($user->dosen->gender) ? ($user->dosen->gender === 'L' ? 'Laki-Laki' : 'Perempuan') : '-' }}
                                            </li>
                                            <li class="list-group-item">
                                                <strong>Kampus:</strong> {{ $user->kampus->name ?? '-' }}
                                            </li>
                                            <li class="list-group-item">
                                                <strong>Alamat:</strong> {{ $user->dosen->address ?? '-' }}
                                            </li>
                                            <li class="list-group-item">
                                                <strong>No HP:</strong> {{ $user->dosen->phone ?? '-' }}
                                            </li>
                                        @elseif(Auth::user()->getRoleNames()->first() == 'Mahasiswa')
                                            <li class="list-group-item">
                                                <strong>NIM:</strong> {{ $user->Mahasiswa->nim ?? '-' }}
                                            </li>
                                            <li class="list-group-item">
                                                <strong>Gender:</strong>
                                                {{ isset($user->Mahasiswa->gender) ? ($user->Mahasiswa->gender === 'L' ? 'Laki-Laki' : 'Perempuan') : '-' }}
                                            </li>
                                            <li class="list-group-item">
                                                <strong>Kampus:</strong> {{ $user->kampus->name ?? '-' }}
                                            </li>
                                            <li class="list-group-item">
                                                <strong>Alamat:</strong> {{ $user->Mahasiswa->address ?? '-' }}
                                            </li>
                                            <li class="list-group-item">
                                                <strong>No HP:</strong> {{ $user->Mahasiswa->phone ?? '-' }}
                                            </li>
                                            <li class="list-group-item">
                                                <strong>Prodi:</strong> {{ $user->Mahasiswa->prodi ?? '-' }}
                                            </li>
                                            <li class="list-group-item">
                                                <strong>Fakultas:</strong> {{ $user->Mahasiswa->fakultas ?? '-' }}
                                            </li>
                                            <li class="list-group-item">
                                                <strong>Semester:</strong> {{ $user->Mahasiswa->semester ?? '-' }}
                                            </li>
                                        @endif
                                    </ul>

                                    {{-- Tombol Edit Profil --}}
                                    <a href="{{ route('profil_admin.edit') }}" class="btn btn-primary mt-3">
                                        <i class="fas fa-edit"></i> Edit Profil
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </x-panel.show>
            </x-slot>
        </x-row-column>
    </main>
@endsection
