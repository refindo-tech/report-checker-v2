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
                
                {{-- basic form --}}
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

                {{-- merubah role --}}
                @if (auth()->user()->getRoleNames()->first() == 'SuperAdmin')
                    <div class="form-group">
                        <label for="role">Role</label>
                        <select name="role" id="role" class="form-control" required onchange="toggleRoleFields()">
                            <option value="SuperAdmin"
                                {{ old('role', $users->roles->first()->name ?? '') == 'SuperAdmin' ? 'selected' : '' }}>
                                Super Admin</option>
                            <option value="AdminPT"
                                {{ old('role', $users->roles->first()->name ?? '') == 'AdminPT' ? 'selected' : '' }}>Admin
                                PT</option>
                            <option value="Prodi"
                                {{ old('role', $users->roles->first()->name ?? '') == 'Prodi' ? 'selected' : '' }}>Prodi
                            </option>
                            <option value="Mahasiswa" 
                                {{ old('role', $users->roles->first()->name ?? '') == 'Mahasiswa' ? 'selected' : '' }}>Mahasiswa
                            </option>
                        </select>
                        @error('role')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                @endif


                {{-- merubah kampus --}}
                @if (auth()->user()->getRoleNames()->first() == 'SuperAdmin')
                    <div class="form-group">
                        <label for="id_kampus">Kampus</label>
                        <select class="form-control select2" id="id_kampus" name="id_kampus" required>
                            <option value="" disabled selected>Pilih Kampus</option>
                            @foreach ($kampus as $item)
                                <option value="{{ $item->id }}"
                                    {{ old('id_kampus', $user->id_kampus ?? '') == $item->id ? 'selected' : '' }}>
                                    {{ $item->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                @else
                    <div class="form-group">
                        <label for="id_kampus">Kampus</label>
                        <select class="form-control select2" id="id_kampus" name="id_kampus" required>
                            <option value="" disabled selected>Pilih Kampus</option>
                            @foreach ($kampusRole as $item)
                                <option value="{{ $item->id }}"
                                    {{ old('id_kampus', $user->id_kampus ?? '') == $item->id ? 'selected' : '' }}>
                                    {{ $item->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                @endif

                {{-- dropdown fakultas dan prodi --}}
                <div class="form-group" id="fakultasFields" style="display: none;">
                    <label for="id_fakultas">Fakultas</label>
                    <select class="form-control select2" id="id_fakultas" name="id_fakultas">
                        <option value="" disabled selected>Pilih Fakultas</option>
                        @foreach ($fakultas as $item)
                            <option value="{{ $item->id }}" {{ old('id_fakultas', $users->id_fakultas ?? '') == $item->id ? 'selected' : '' }}>
                                {{ $item->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group" id="prodiFields" style="display: none;">
                    <label for="id_prodi">Prodi</label>
                        <select class="form-control select2" id="id_prodi" name="id_prodi">
                            <option value="" disabled selected>Pilih Prodi</option>
                            @foreach ($prodi as $item)
                                <option value="{{ $item->id }}" {{ old('id_prodi', $users->id_prodi ?? '') == $item->id ? 'selected' : '' }}>
                                    {{ $item->name }}
                                </option>
                            @endforeach
                    </select>
                </div>

                {{-- merubah data prodi dan mahasiswa --}}
                {{-- @if ($users->prodi != null) --}}
                <div id="dosenFields" style="display: none;">
                    <div class="form-group">
                        <label for="nip">NIP</label>
                        <input type="text" name="nip" value="{{ old('nip', $users->prodi->nip ?? '') }}" id="nip"
                            class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="gender">Gender</label>
                        <select name="gender" id="gender" class="form-control">
                            <option value="L" {{ isset($users->prodi->gender) && $users->prodi->gender == 'L' ? 'selected' : '' }}>Laki-laki
                            </option>
                            <option value="P" {{ isset($users->prodi->gender) && $users->prodi->gender == 'P' ? 'selected' : '' }}>Perempuan
                            </option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <<input type="text" name="phone" 
                            value="{{ isset($users->mahasiswa) ? $users->mahasiswa->phone : (isset($users->prodi) ? $users->prodi->phone : '') }}" 
                            class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" name="address" 
                            value="{{ isset($users->mahasiswa) ? $users->mahasiswa->address : (isset($users->prodi) ? $users->prodi->address : '') }}" 
                            class="form-control">
                    </div>
                </div>
                {{-- @elseif($users->mahasiswa != null) --}}
                <div id="mahasiswaFields" style="display: none;">
                    <div class="form-group">
                        <label for="nim">NIM</label>
                        <input type="text" name="nim" 
                        value="{{ isset($users->mahasiswa) ? $users->mahasiswa->nim : '' }}" 
                        class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="gender">Gender</label>
                        <select name="gender" id="gender" class="form-control">
                            <option value="L" {{ isset($users->mahasiswa->gender) && $users->mahasiswa->gender == 'L' ? 'selected' : '' }}>Laki-laki</option>
                            <option value="P" {{ isset($users->mahasiswa->gender) && $users->mahasiswa->gender == 'P' ? 'selected' : '' }}>Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="text" name="phone" 
                            value="{{ optional($users->mahasiswa)->phone }}" 
                            class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" name="address" 
                            value="{{ optional($users->mahasiswa)->address }}" 
                            class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="semester">Semester</label>
                        <<input type="text" name="semester" 
                        value="{{ optional($users->mahasiswa)->semester }}" 
                        class="form-control">                 
                    </div>
                </div>
                {{-- @endif --}}
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
        document.addEventListener("DOMContentLoaded", function () {
            // Pastikan fungsi dijalankan saat halaman dimuat
            toggleRoleFields();
    
            // Tambahkan event listener ke dropdown role
            document.getElementById("role").addEventListener("change", toggleRoleFields);
        });
    
        function toggleRoleFields() {
            var role = document.getElementById("role").value;
            var fakultasFields = document.getElementById("fakultasFields");
            var prodiFields = document.getElementById("prodiFields");
            var dosenFields = document.getElementById("dosenFields");
            var mahasiswaFields = document.getElementById("mahasiswaFields");
    
            // Tampilkan fakultas & prodi jika memilih Prodi atau Mahasiswa
            if (role === "Prodi" || role === "Mahasiswa") {
                fakultasFields.style.display = "block";
                prodiFields.style.display = "block";
            } else {
                fakultasFields.style.display = "none";
                prodiFields.style.display = "none";
            }
    
            // Menampilkan dan menyembunyikan dosenFields dan mahasiswaFields
            if (role === "Prodi") {
                dosenFields.style.display = "block";
                mahasiswaFields.style.display = "none";
            } else if (role === "Mahasiswa") {
                dosenFields.style.display = "none";
                mahasiswaFields.style.display = "block";
            } else {
                dosenFields.style.display = "none";
                mahasiswaFields.style.display = "none";
            }
        }
    </script>
    
    <script>
        $('.select2').select2({
            placeholder: "Pilih Data",
        });
    </script>
    <script>
        $(document).ready(function() {
            function loadFakultas(kampus_id, selectedFakultas = null) {
                if (kampus_id) {
                    $.ajax({
                        url: '{{ route('user.getFakultasByKampus', ['kampus_id' => '__KAMPUS_ID__']) }}'
                            .replace('__KAMPUS_ID__', kampus_id),
                        type: 'GET',
                        success: function(data) {
                            $('#id_fakultas').empty().append(
                                '<option value="" disabled selected>Pilih Fakultas</option>');
                            $.each(data, function(key, value) {
                                $('#id_fakultas').append(
                                    `<option value="${value.id}" ${selectedFakultas == value.id ? 'selected' : ''}>${value.name}</option>`
                                );
                            });
                            $('#fakultasFields').show();
                        }
                    });
                } else {
                    $('#fakultasFields, #prodiFields').hide();
                }
            }

            function loadProdi(fakultas_id, selectedProdi = null) {
                if (fakultas_id) {
                    $.ajax({
                        url: '{{ route('user.getProdiByFakultas', ['fakultas_id' => '__FAKULTAS_ID__']) }}'
                            .replace('__FAKULTAS_ID__', fakultas_id),
                        type: 'GET',
                        success: function(data) {
                            $('#id_prodi').empty().append(
                                '<option value="" disabled selected>Pilih Prodi</option>');
                            $.each(data, function(key, value) {
                                $('#id_prodi').append(
                                    `<option value="${value.id}" ${selectedProdi == value.id ? 'selected' : ''}>${value.name}</option>`
                                );
                            });
                            $('#prodiFields').show();
                        }
                    });
                } else {
                    $('#prodiFields').hide();
                }
            }

            $('#id_kampus').change(function() {
                let kampus_id = $(this).val();
                loadFakultas(kampus_id);
                $('#id_prodi').empty().append('<option value="" disabled selected>Pilih Prodi</option>');
                $('#prodiFields').hide();
            });

            $('#id_fakultas').change(function() {
                let fakultas_id = $(this).val();
                loadProdi(fakultas_id);
            });

            // Load data saat edit
            let selectedKampus = $('#id_kampus').val();
            let selectedFakultas = '{{ old('id_fakultas', $user->id_fakultas ?? '') }}';
            let selectedProdi = '{{ old('id_prodi', $user->id_prodi ?? '') }}';

            if (selectedKampus) {
                loadFakultas(selectedKampus, selectedFakultas);
                if (selectedFakultas) {
                    loadProdi(selectedFakultas, selectedProdi);
                }
            }
        });
    </script>

@endsection
