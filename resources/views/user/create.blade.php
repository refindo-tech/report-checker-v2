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
                @if (auth()->user()->getRoleNames()->first() == 'SuperAdmin')
                    <!-- Pilih Kampus -->
                    <div class="form-group" id="kampusFields">
                        <label for="kampus">Kampus</label>
                        <select class="form-control select2" name="id_kampus" id="id_kampus" required>
                            <option value="" selected disabled>Pilih Kampus</option>
                            @foreach ($kampus as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Pilih Fakultas -->
                    <div class="form-group" id="fakultasFields" style="display: none;">
                        <label for="fakultas">Fakultas</label>
                        <select class="form-control select4" name="id_fakultas" id="id_fakultas" required>
                            <option value="" selected disabled>Pilih Fakultas</option>
                        </select>
                    </div>

                    <!-- Pilih Program Studi -->
                    <div class="form-group" id="programStudiFields" style="display: none;">
                        <label for="prodi">Program Studi</label>
                        <select class="form-control select3" name="id_prodi" id="id_prodi" required>
                            <option value="" selected disabled>Pilih Prodi</option>
                        </select>
                    </div>
                @else
                    @php
                        $kampus_id = auth()->user()->id_kampus;
                    @endphp

                    <!-- Hidden Kampus -->
                    <input type="hidden" name="id_kampus" id="id_kampus" value="{{ $kampus_id }}">

                    <!-- Pilih Fakultas -->
                    <div class="form-group" id="fakultasFields">
                        <label for="fakultas">Fakultas</label>
                        <select class="form-control select4" name="id_fakultas" id="id_fakultas" required>
                            <option value="" selected disabled>Pilih Fakultas</option>
                        </select>
                    </div>

                    <!-- Pilih Program Studi -->
                    <div class="form-group" id="programStudiFields" style="display: none;">
                        <label for="prodi">Program Studi</label>
                        <select class="form-control select3" name="id_prodi" id="id_prodi" required>
                            <option value="" selected disabled>Pilih Prodi</option>
                        </select>
                    </div>
                @endif

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
                {{-- <div class="form-group">
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
                </div> --}}

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
    {{-- <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.getElementById("role").addEventListener("change", function() {
                var role = document.getElementById("role").value;

                // Sembunyikan semua terlebih dahulu
                document.getElementById("kampusFields").style.display = "none";
                document.getElementById("fakultasFields").style.display = "none";
                document.getElementById("prodiFields").style.display = "none";
                document.getElementById("programStudiFields").style.display = "none";
                document.getElementById("mahasiswaFields").style.display = "none";

                // Jika role adalah Mahasiswa, Admin PT, atau Prodi, tampilkan semua
                if (role === "Prodi" || role === "AdminPT" || role === "Mahasiswa") {
                    document.getElementById("kampusFields").style.display = "block";
                    document.getElementById("fakultasFields").style.display = "block";
                    document.getElementById("prodiFields").style.display = "block";
                    document.getElementById("programStudiFields").style.display = "block";
                    // Pastikan required atribut ada
                    document.getElementById("id_fakultas").setAttribute("required", "required");
                    document.getElementById("id_prodi").setAttribute("required", "required");
                }

                // Jika role adalah Mahasiswa, tampilkan mahasiswaFields
                if (role === "Mahasiswa") {
                    document.getElementById("mahasiswaFields").style.display = "block";
                }

                // Jika role adalah SuperAdmin, hanya tampilkan kampus
                if (role === "SuperAdmin") {
                    // document.getElementById("kampusFields").style.display = "block";
                    document.getElementById("id_fakultas").removeAttribute("required");
                    document.getElementById("id_prodi").removeAttribute("required");
                }
            })
            // Panggil sekali saat halaman dimuat agar tampilan sesuai jika ada nilai old
            var roleEl = document.getElementById("role");
            if (roleEl) {
                var event = new Event("change");
                roleEl.dispatchEvent(event);
            }
        });
    </script> --}}
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Panggil fungsi saat halaman selesai dimuat
            toggleRoleFields();

            document.getElementById("role").addEventListener("change", toggleRoleFields);
        });

        function toggleRoleFields() {
            var role = document.getElementById("role");
            if (!role) {
                console.error("Elemen dengan id 'role' tidak ditemukan!");
                return;
            }

            var roleValue = role.value;
            var prodiFields = document.getElementById("prodiFields");
            var mahasiswaFields = document.getElementById("mahasiswaFields");

            if (prodiFields && mahasiswaFields) {
                prodiFields.style.display = "none";
                mahasiswaFields.style.display = "none";

                if (roleValue === "Prodi" || roleValue === "AdminPT") {
                    prodiFields.style.display = "block";
                } else if (roleValue === "Mahasiswa") {
                    mahasiswaFields.style.display = "block";
                }
            } else {
                console.error("ID prodiFields atau mahasiswaFields tidak ditemukan!");
            }
        }
    </script>

    <script>
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
    </script> --}}

@endsection
