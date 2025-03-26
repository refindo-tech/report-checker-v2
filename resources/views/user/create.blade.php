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
        <form action="{{ route('user.store') }}" method="POST">
            @csrf
            <x-panel.show title="Tambah" subtitle="Pengguna">
                <div class="form-group">
                    <label for="role">Role</label>
                    <select name="role" id="role" class="form-control" required onchange="toggleRoleFields()">
                        <option value="">-- Pilih Role --</option>
                        @if (auth()->user()->getRoleNames()->first() == 'SuperAdmin')
                            <option value="SuperAdmin" {{ old('role') == 'SuperAdmin' ? 'selected' : '' }}>Super Admin
                            </option>
                        @endif
                        <option value="AdminPT" {{ old('role') == 'AdminPT' ? 'selected' : '' }}>Admin PT</option>
                        <option value="Prodi" {{ old('role') == 'Prodi' ? 'selected' : '' }}>Prodi</option>
                        <option value="Mahasiswa" {{ old('role') == 'Mahasiswa' ? 'selected' : '' }}>Mahasiswa</option>
                    </select>
                    @error('role')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <!-- Pilih Kampus -->
                <div class="form-group" id="kampusFields" style="display: none;">
                    <label for="kampus">Kampus</label>
                    <select class="form-control select2" name="id_kampus" id="id_kampus" required>
                        <option value="" selected disabled>Pilih Kampus</option>
                        @if (auth()->user()->getRoleNames()->first() == 'SuperAdmin')
                            @foreach ($kampus as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        @else
                            @foreach ($kampusRole as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>

                <!-- Pilih Fakultas -->
                <div class="form-group" id="fakultasFields" style="display: none;">
                    <label for="fakultas">Fakultas</label>
                    <select class="form-control select2" name="id_fakultas" id="id_fakultas" required>
                        <option value="" selected disabled>Pilih Fakultas</option>
                        @if (auth()->user()->getRoleNames()->first() == 'SuperAdmin')
                            @foreach ($fakultas as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        @else
                            @foreach ($fakultasRole as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>

                <!-- Pilih Program Studi -->
                <div class="form-group" id="programstudiFields" style="display: none;">
                    <label for="prodi">Program Studi</label>
                    <select class="form-control select2" name="id_prodi" id="id_prodi" required>
                        <option value="" selected disabled>Pilih Program Studi</option>
                        @if (auth()->user()->getRoleNames()->first() == 'SuperAdmin')
                            @foreach ($prodi as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        @else
                            @foreach ($prodiRole as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>

                <div class="form-group">
                    <label for="name">Nama</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" class="form-control" value="{{ old('email') }}">
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="form-control" required>
                    @error('password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Form tambahan untuk Dosen -->
                <div id="prodiFields" style="display: none;">
                    <div class="form-group">
                        <label for="nip">NIP</label>
                        <input type="text" name="nip" id="nip" class="form-control">
                        @error('nip')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="gender">Gender</label>
                        <select name="gender" id="gender" class="form-control">
                            <option value="L">Laki-laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                        @error('gender')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="text" name="phone" id="phone" class="form-control">
                        @error('phone')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat Tinggal</label>
                        <input type="text" name="alamat" id="alamat" class="form-control">
                        @error('alamat')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <!-- Form tambahan untuk Mahasiswa -->
                <div id="mahasiswaFields" style="display: none;">
                    <div class="form-group">
                        <label for="nim">NIM</label>
                        <input type="text" name="nim" id="nim" class="form-control">
                        @error('nim')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="gender">Gender</label>
                        <select name="gender" id="gender" class="form-control">
                            <option value="L">Laki-laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                        @error('gender')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="text" name="phone" id="phone" class="form-control">
                        @error('phone')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat Tinggal</label>
                        <input type="text" name="alamat" id="alamat" class="form-control">
                        @error('alamat')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="semester">Semester</label>
                        <input type="text" name="semester" id="semester" class="form-control">
                        @error('semester')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
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
        $('.select2').select2({
            placeholder: "Pilih Kampus",
        });
        $('.select3').select2({
            placeholder: "Pilih Program Studi",
        });
        $('.select4').select2({
            placeholder: "Pilih Fakultas",
        });
    </script>
    <script>
        $(document).ready(function() {
            function toggleRoleFields() {
                var role = $('#role').val();

                // Jika role adalah AdminPT, hanya tampilkan kampus
                if (role === "AdminPT") {
                    $('#kampusFields, #prodiFields').show();
                    $('#fakultasFields, #mahasiswaFields, #programstudiFields').hide();
                }
                // Jika role adalah Prodi, tampilkan kampus dan fakultas
                else if (role === "Prodi") {
                    $('#kampusFields, #fakultasFields, #prodiFields, #programstudiFields').show();
                    $('#mahasiswaFields').hide();
                }
                // Jika role adalah Mahasiswa, tampilkan semua
                else if (role === "Mahasiswa") {
                    $('#kampusFields, #fakultasFields, #mahasiswaFields, #programstudiFields').show();
                    $('#prodiFields').hide();
                }
                // Jika role SuperAdmin, sembunyikan semua kecuali role selector
                else {
                    $('#kampusFields, #fakultasFields, #prodiFields, #mahasiswaFields, #programstudiFields').hide();
                }
            }

            // Panggil function setiap kali role berubah
            $('#role').change(toggleRoleFields);

            // Jalankan function saat halaman dimuat
            toggleRoleFields();
        });
    </script>

    {{-- <script>
        $(document).ready(function() {
            var role = "{{ auth()->user()->getRoleNames()->first() }}";
            var kampus_id = "{{ auth()->user()->id_kampus }}";

            // Jika role bukan SuperAdmin, otomatis ambil fakultas berdasarkan kampus
            if (role !== "SuperAdmin") {
                loadFakultas(kampus_id);
            }

            // Event untuk SuperAdmin yang memilih kampus
            $('#id_kampus').change(function() {
                var kampus_id = $(this).val();
                if (kampus_id) {
                    loadFakultas(kampus_id);
                } else {
                    $('#fakultasFields, #programStudiFields').hide();
                }
            });

            // Event untuk memilih fakultas dan mengambil prodi
            $('#id_fakultas').change(function() {
                var fakultas_id = $(this).val();
                if (fakultas_id) {
                    loadProdi(fakultas_id);
                } else {
                    $('#programStudiFields').hide();
                }
            });

            // Function untuk mengambil daftar fakultas berdasarkan kampus
            function loadFakultas(kampus_id) {
                $.ajax({
                    url: '{{ route('user.getFakultasByKampus', ['kampus_id' => '__KAMPUS_ID__']) }}'
                        .replace('__KAMPUS_ID__', kampus_id),
                    type: 'GET',
                    success: function(data) {
                        $('#id_fakultas').empty().append(
                            '<option value="" selected disabled>Pilih Fakultas</option>');
                        $.each(data, function(key, value) {
                            $('#id_fakultas').append('<option value="' + value.id + '">' + value
                                .name + '</option>');
                        });
                        $('#fakultasFields').show();
                    }
                });
            }

            // Function untuk mengambil daftar program studi berdasarkan fakultas
            function loadProdi(fakultas_id) {
                $.ajax({
                    url: '{{ route('user.getProdiByFakultas', ['fakultas_id' => '__FAKULTAS_ID__']) }}'
                        .replace('__FAKULTAS_ID__', fakultas_id),
                    type: 'GET',
                    success: function(data) {
                        $('#id_prodi').empty().append(
                            '<option value="" selected disabled>Pilih Prodi</option>');
                        $.each(data, function(key, value) {
                            $('#id_prodi').append('<option value="' + value.id + '">' + value
                                .name + '</option>');
                        });
                        $('#programStudiFields').show();
                    }
                });
            }
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#id_kampus').change(function() {
                var kampus_id = $(this).val();
                var role = $('#role').val();

                if (kampus_id) {
                    // Jika bukan SuperAdmin, ambil fakultas yang sesuai
                    if (role !== "SuperAdmin") {
                        $.ajax({
                            url: '{{ route('user.getFakultasByKampus', ['kampus_id' => '__KAMPUS_ID__']) }}'
                                .replace('__KAMPUS_ID__', kampus_id),
                            type: 'GET',
                            success: function(data) {
                                $('#id_fakultas').empty().append(
                                    '<option value="" selected disabled>Pilih Fakultas</option>'
                                );
                                $.each(data, function(key, value) {
                                    $('#id_fakultas').append('<option value="' + value
                                        .id + '">' + value.name + '</option>');
                                });
                                $('#fakultasFields').show();
                            }
                        });
                    }
                } else {
                    $('#fakultasFields, #prodiFields').hide();
                }
            });

            $('#id_fakultas').change(function() {
                var fakultas_id = $(this).val();
                if (fakultas_id) {
                    $.ajax({
                        url: '{{ route('user.getProdiByFakultas', ['fakultas_id' => '__FAKULTAS_ID__']) }}'
                            .replace('__FAKULTAS_ID__', fakultas_id),
                        type: 'GET',
                        success: function(data) {
                            $('#id_prodi').empty().append(
                                '<option value="" selected disabled>Pilih Prodi</option>');
                            $.each(data, function(key, value) {
                                $('#id_prodi').append('<option value="' + value.id +
                                    '">' + value.name + '</option>');
                            });
                            $('#prodiFields').show();
                        }
                    });
                } else {
                    $('#prodiFields').hide();
                }
            });
        });
    </script> --}}

@endsection
