@extends('inc.main')
@section('title', 'Profil Master')
@section('pages-css')
    <link rel="stylesheet" media="screen, print" href="/admin/css/fa-solid.css">
    <link rel="stylesheet" media="screen, print" href="/admin/css/theme-demo.css">
    <link rel="stylesheet" media="screen, print" href="/admin/css/notifications/toastr/toastr.css">
    <!-- DEMO related CSS below -->
    <link rel="stylesheet" media="screen, print" href="/admin/css/fa-brands.css">
    <!-- page related CSS below -->
    <link rel="stylesheet" media="screen, print" href="/admin/css/formplugins/select2/select2.bundle.css">
@endsection
@section('pages-content')
    <main id="js-page-content" role="main" class="page-content">
        @include('inc._page_breadcrumb', ['category_1' => 'Master'])
        <div class="subheader">
            @component('inc._page_heading', [
                'icon' => 'user-circle',
                'heading1' => 'Edit Profil',
                'heading2' => 'Pengguna',
            ])
            @endcomponent
        </div>
        <x-row-column :column="1">
            <x-slot name='column1'>
                <x-panel.show title="Profil" subtitle="{{ Auth::user()->getRoleNames()->first() }}">
                    <form action="{{ route('profil_admin.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-12 text-center mb-4">
                                <label for="image" class="position-relative d-inline-block">
                                    <img id="profileImage"
                                        src="{{ auth()->user()->image ? asset('profile/' . auth()->user()->image) : asset('admin/img/users/user.jpg') }}"
                                        class="rounded-circle shadow img-thumbnail" style="width: 120px; height: 120px;">
                                    <span class="position-absolute" style="bottom: 5px; right: 5px;">
                                        <i class="fas fa-camera text-primary" style="font-size: 20px;"></i>
                                    </span>
                                </label>
                                <input type="file" id="image" name="image" class="d-none" accept="image/*"
                                    onchange="previewImage(event)">
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Username</label>
                                    <input type="text" name="name" value="{{ auth()->user()->name }}"
                                        class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" value="{{ auth()->user()->email }}"
                                        class="form-control">
                                </div>
                            </div>
                            @if (Auth::user()->getRoleNames()->first() == 'Prodi' || Auth::user()->getRoleNames()->first() == 'AdminPT')
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nip">NIDN</label>
                                        <input type="number" name="nip"
                                            value="{{ old('nip', $users->prodi->nip ?? '') }}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="gender">Gender</label>
                                        <select name="gender" class="form-control">
                                            <option value="L"
                                                {{ ($users->prodi->gender ?? '') == 'L' ? 'selected' : '' }}>Laki-laki
                                            </option>
                                            <option value="P"
                                                {{ ($users->prodi->gender ?? '') == 'P' ? 'selected' : '' }}>Perempuan
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="fakultas">Fakultas</label>
                                        <select name="fakultas" id="fakultas" class="form-control">
                                            <option value="">-- Pilih Fakultas --</option>
                                            @foreach ($fakultas as $fak)
                                                <option value="{{ $fak->id }}"
                                                    {{ old('fakultas', $users->programStudi->id_fakultas ?? '') == $fak->id ? 'selected' : '' }}>
                                                    {{ $fak->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="id_prodi">Program Studi</label>
                                        <select name="id_prodi" id="id_prodi" class="form-control">
                                            <option value="">-- Pilih Program Studi --</option>
                                            @foreach ($programstudi as $prodi)
                                                <option value="{{ $prodi->id }}"
                                                    {{ old('id_prodi', optional($users->programStudi)->id) == $prodi->id ? 'selected' : '' }}>
                                                    {{ $prodi->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="phone">Phone</label>
                                        <input type="text" name="phone"
                                            value="{{ old('phone', $users->prodi->phone ?? '') }}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="alamat">Alamat</label>
                                        <input type="text" name="alamat"
                                            value="{{ old('alamat', $users->prodi->address ?? '') }}"
                                            class="form-control">
                                    </div>
                                </div>
                            @elseif(Auth::user()->getRoleNames()->first() == 'Mahasiswa')
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nim">NIM</label>
                                        <input type="number" name="nim"
                                            value="{{ old('nim', $users->mahasiswa->nim ?? '') }}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="gender">Gender</label>
                                        <select name="gender" class="form-control">
                                            <option value="L"
                                                {{ ($users->mahasiswa->gender ?? '') == 'L' ? 'selected' : '' }}>Laki-laki
                                            </option>
                                            <option value="P"
                                                {{ ($users->mahasiswa->gender ?? '') == 'P' ? 'selected' : '' }}>Perempuan
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="fakultas">Fakultas</label>
                                        <select name="fakultas" id="fakultas" class="form-control">
                                            <option value="">-- Pilih Fakultas --</option>
                                            @foreach ($fakultas as $fak)
                                                <option value="{{ $fak->id }}"
                                                    {{ old('fakultas', $users->programStudi->id_fakultas ?? '') == $fak->id ? 'selected' : '' }}>
                                                    {{ $fak->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="id_prodi">Program Studi</label>
                                        <select name="id_prodi" id="id_prodi" class="form-control">
                                            <option value="">-- Pilih Program Studi --</option>
                                            @foreach ($programstudi as $prodi)
                                                <option value="{{ $prodi->id }}"
                                                    {{ old('id_prodi', optional($users->programStudi)->id) == $prodi->id ? 'selected' : '' }}>
                                                    {{ $prodi->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="semester">Semester</label>
                                        <input type="text" name="semester"
                                            value="{{ old('semester', $users->mahasiswa->semester ?? '') }}"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="phone">Telepon</label>
                                        <input type="text" name="phone"
                                            value="{{ old('phone', $users->mahasiswa->phone ?? '') }}"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="address">Alamat</label>
                                        <input type="text" name="address"
                                            value="{{ old('address', $users->mahasiswa->address ?? '') }}"
                                            class="form-control">
                                    </div>
                                </div>
                            @endif
                            <div class="col-12 text-center mt-4">
                                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                            </div>
                        </div>
                    </form>
                </x-panel.show>
            </x-slot>
        </x-row-column>

        {{-- Sunting Password --}}
        <x-row-column :column="1">
            <x-slot name='column1'>
                <x-panel.show title="Ubah Password" subtitle="{{ auth()->user()->role }}">
                    <form id="changePasswordForm" action="{{ route('profil_admin.password') }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="current_password">Password Lama</label>
                                    <input type="password" name="current_password" id="current_password"
                                        class="form-control" required>
                                    @error('current_password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="new_password">Password Baru</label>
                                    <input type="password" name="new_password" id="new_password" class="form-control"
                                        required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="new_password_confirmation">Konfirmasi Password Baru</label>
                                    <input type="password" name="new_password_confirmation"
                                        id="new_password_confirmation" class="form-control" required>
                                    <small id="passwordError" class="text-danger d-none">Password baru tidak
                                        cocok!</small>
                                </div>
                            </div>
                            <div class="col-12 text-center mt-4">
                                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                            </div>
                        </div>
                    </form>
                </x-panel.show>
            </x-slot>
        </x-row-column>

        {{-- JavaScript Validation password --}}
        <script>
            document.getElementById('changePasswordForm').addEventListener('submit', function(event) {
                let newPassword = document.getElementById('new_password').value;
                let confirmPassword = document.getElementById('new_password_confirmation').value;
                let errorText = document.getElementById('passwordError');

                if (newPassword !== confirmPassword) {
                    errorText.classList.remove('d-none'); // Menampilkan pesan error
                    event.preventDefault(); // Mencegah pengiriman formulir
                } else {
                    errorText.classList.add('d-none'); // Sembunyikan pesan error jika valid
                }
            });
        </script>


        <script>
            function previewImage(event) {
                const reader = new FileReader();
                reader.onload = function() {
                    document.getElementById('profileImage').src = reader.result;
                };
                reader.readAsDataURL(event.target.files[0]);
            }
        </script>
    </main>
@endsection

@section('pages-script')
    <script src="/admin/js/formplugins/select2/select2.bundle.js"></script>
    <script>
        function previewImage(event) {
            const reader = new FileReader();
            reader.onload = function() {
                const output = document.getElementById('profileImage');
                output.src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>

    <script>
        $('.select2').select2({
            placeholder: "Pilih Kampus",
        });
        $('.select3').select2({
            placeholder: "Pilih Fakultas",
        });
        $('.select4').select2({
            placeholder: "Pilih Program Studi",
        });
    </script>


@endsection
