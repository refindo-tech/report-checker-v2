@extends('inc.main')
@section('title', 'Pengguna')
@section('pages-css')
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
        <form action="{{ route('user.update', $users->id) }}" method="POST">
            @csrf
            @method('PUT')
            <x-panel.show title="Edit" subtitle="Pengguna">
                <x-slot name="paneltoolbar">
                    <x-panel.tool-bar class="ml-2">
                        <button class="btn btn-toolbar-master" type="button" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            <i class="fal fa-ellipsis-v"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-animated dropdown-menu-right">
                            <a class="dropdown-item" href="{{ route('user.index') }}">Kembali</a>

                        </div>
                    </x-panel.tool-bar>
                </x-slot>
                <div class="form-group">
                    <label for="kampus">Kampus</label>
                    <select class="select2 form-control w-100" id="single-default" name="id_kampus" required>
                        <option value="" disabled>Pilih Kampus</option>
                        @foreach ($kampus as $item)
                            <option value="{{ $item->id }}"
                                {{ old('id_kampus', $users->id_kampus ?? '') == $item->id ? 'selected' : '' }}>
                                {{ $item->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('id_kampus')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                    {{-- <optgroup label="Alaskan/Hawaiian Time Zone">
                                <option value="AK">Alaska</option>
                                <option value="HI">Hawaii</option>
                            </optgroup> --}}
                </div>
                <div class="form-group">
                    <label for="name">Nama</label>
                    <input type="text" name="name" id="name" class="form-control"
                        value="{{ old('name', $users->name) }}">
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" class="form-control"
                        value="{{ old('email', $users->email) }}">
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                {{-- <div class="form-group">
                    <label for="role">Role</label>
                    <select name="role" id="role" class="form-control" required>
                        <option value="Admin" {{ old('role', $users->role) == 'Admin' ? 'selected' : '' }}>Admin
                        </option>
                        <option value="Dosen" {{ old('role') == 'Dosen' ? 'selected' : '' }}>Dosen
                        </option>
                        <option value="Mahasiswa" {{ old('role', $users->role) == 'Mahasiswa' ? 'selected' : '' }}>Mahasiswa
                        </option>
                        @error('role')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </select>
                </div> --}}
                @if ($users->dosen != null)
                    {{-- <div id="dosenFields" style="display: none;"> --}}
                    <div class="form-group">
                        <label for="nip">NIP</label>
                        <input type="text" name="nip" value="{{ old('nip', $users->dosen->nip) }}" id="nip"
                            class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="gender">Gender</label>
                        <select name="gender" id="gender" class="form-control">
                            <option value="L" {{ $users->dosen->gender == 'L' ? 'selected' : '' }}>Laki-laki
                            </option>
                            <option value="P" {{ $users->dosen->gender == 'P' ? 'selected' : '' }}>Perempuan
                            </option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="text" name="phone" id="phone"
                            value="{{ old('phone', $users->dosen->phone) }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" name="alamat" id="alamat"
                            value="{{ old('alamat', $users->dosen->address) }}" class="form-control">
                    </div>
                    {{-- </div> --}}
                @elseif($users->mahasiswa != null)
                    {{-- <div id="mahasiswaFields" style="display: none;"> --}}
                    <div class="form-group">
                        <label for="nim">NIM</label>
                        <input type="text" name="nim" id="nim"
                            value="{{ old('nim', $users->mahasiswa->nim) }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="gender">Gender</label>
                        <select name="gender" id="gender" class="form-control">
                            <option value="L" {{ $users->mahasiswa->gender == 'L' ? 'selected' : '' }}>Laki-laki
                            </option>
                            <option value="P" {{ $users->mahasiswa->gender == 'P' ? 'selected' : '' }}>Perempuan
                            </option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="text" name="phone" id="phone"
                            value="{{ old('phone', $users->mahasiswa->phone) }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" name="alamat" id="alamat"
                            value="{{ old('alamat', $users->mahasiswa->address) }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="prodi">Prodi</label>
                        <input type="text" name="prodi" id="prodi"
                            value="{{ old('prodi', $users->mahasiswa->prodi) }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="semester">Semester</label>
                        <input type="text" name="semester" id="semester"
                            value="{{ old('semester', $users->mahasiswa->semester) }}" class="form-control">
                    </div>
                    {{-- </div> --}}
                @endif
                <x-slot name="panelcontentfoot">
                    <x-button type="submit" color="primary" :label="__('Save')" class="ml-auto" />
                </x-slot>
            </x-panel.show>
        </form>
    </main>
@endsection
@section('pages-script')
    {{-- <script>
        function toggleRoleFields() {
            var role = document.getElementById("role").value;
            document.getElementById("dosenFields").style.display = (role === "Dosen") ? "block" : "none";
            document.getElementById("mahasiswaFields").style.display = (role === "Mahasiswa") ? "block" : "none";
        }

        // Panggil fungsi saat halaman dimuat agar form yang sesuai tetap muncul saat validasi gagal
        document.addEventListener("DOMContentLoaded", function() {
            toggleRoleFields();
        });
    </script> --}}
    <script src="/admin/js/formplugins/select2/select2.bundle.js"></script>
    <script>
        $('.select2').select2({
            placeholder: "Pilih Kampus",
        });
    </script>
@endsection
