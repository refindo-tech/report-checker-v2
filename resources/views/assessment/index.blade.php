@extends('inc.main')
@section('title', 'Penilaian MBKM')
@section('pages-css')
    <link rel="stylesheet" media="screen, print" href="/admin/css/fa-solid.css">
    <link rel="stylesheet" media="screen, print" href="/admin/css/theme-demo.css">
    <link rel="stylesheet" media="screen, print" href="/admin/css/notifications/toastr/toastr.css">
    <link rel="stylesheet" media="screen, print" href="/admin/css/datagrid/datatables/datatables.bundle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropify/0.2.2/css/dropify.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css">
@endsection

@section('pages-content')
    <main id="js-page-content" role="main" class="page-content">
        @include('inc._page_breadcrumb', [
            'category_1' => 'Master',
        ])

        <div class="subheader">
            @component('inc._page_heading', [
                'icon' => 'fa-solid fa-check-to-slot',
                'heading1' => 'Penilaian',
                'heading2' => 'MBKM',
            ])
            @endcomponent
        </div>

        {{-- NOTED : TAMBAHKAN FILTERING BY KAMPUS atau nama cpl atau sks --}}
        {{-- TINGGAL ngasih nilai ke student dengan cpl ini abis itu testing --}}

        <x-panel.show title="Data Penilaian" subtitle="Silakan lakukan penilaian">
            @can('tambah-mikroskill')
                <x-slot name="paneltoolbar">
                    @if ($reportFirst->status != 4)
                        <div class="d-flex justify-content-between align-items-center flex-wrap gap-2">
                            <!-- Button Upload -->
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#uploaddata">
                                <i class="fa fa-plus"></i> Pilih Mata Kuliah
                            </button>
                        </div>
                    @endif
                    <!-- Modal Large -->
                    <div class="modal fade @if ($errors->any()) show @endif" id="uploaddata" tabindex="-1"
                        role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Tambah Mata Kuliah Konversi</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('assessment.store') }}" method="POST" enctype="multipart/form-data"
                                        id="form-input">
                                        @csrf
                                        <!-- Table -->
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Nama Mata Kuliah</th>
                                                    <th>SKS</th>
                                                    <th>Nilai</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody id="input-container">
                                                <tr>
                                                    <td>
                                                        <select name="matakuliah[]" class="form-control select-mata-kuliah2">
                                                            <option value="" data-sks="0">Pilih Mata Kuliah</option>
                                                            @foreach ($matkul as $component)
                                                                <option value="{{ $component->id }}"
                                                                    data-sks="{{ $component->sks }}">
                                                                    {{ $component->name }} ({{ $component->sks }} SKS)
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </td>
                                                    <input type="hidden" name="id_laprak" value="{{ $reportFirst->id }}">
                                                    <td>
                                                        <input type="number" name="sks[]" class="form-control total-sks"
                                                            readonly>
                                                    </td>
                                                    <td>
                                                        <input type="number" class="form-control" name="nilai[]" min="0"
                                                            max="100" required>
                                                    </td>
                                                    <td class="text-center">
                                                        <button type="button" class="btn btn-danger remove-field"><i
                                                                class="fa fa-trash"></i></button>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>

                                        <!-- Tombol Tambah Data & Reset -->
                                        @if ($reportFirst->status != 4)
                                            <button type="button" class="btn btn-success" id="add-field">Tambah Data</button>
                                            <button type="button" class="btn btn-danger" id="reset-field">Reset</button>
                                        @endif

                                        <div class="modal-footer mt-3">
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </x-slot>
            @endcan
            @can('lihat-assessment')
                <label for="nama">Nama Mahasiswa: <strong>{{ $reportFirst->user->name }}</strong></label><br>
                <label for="nim">NIM: <strong>{{ $reportFirst->user->mahasiswa->nim }}</strong></label><br>
                <label for="nilairekomendasi">Nilai Rekomendasi Program:
                    <strong>{{ $reportFirst->nilai_sertifikat }}</strong></label><br>
                <label for="nilaitest">Nilai Test Mikroskill: <strong>{{ $reportFirst->nilai_mikroskill }}</strong></label><br>
                <label for="makssks">Maksimal SKS: <strong>{{ $reportFirst->maks_sks }}</strong></label><br>
                <span class="text-danger">Nilai akhir tidak boleh melebihi batas nilai sertifikat dan mikroskill.</span>
                <div class="table-responsive">
                    <table id="dt-mahasiswa" class="table table-bordered">
                        <thead class="bg-primary text-white">
                            <tr>
                                <th>Nama Mata Kuliah</th>
                                <th>SKS</th>
                                <th>Nilai</th>
                                @if ($reportFirst->status != 4)
                                    <th>Aksi</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody id="data-table-body">
                            @if ($reports && $reports->assesment->isNotEmpty())
                                @foreach ($reports->assesment as $assesment)
                                    <tr>
                                        <td style="display:none;">
                                            <input type="hidden" class="assessment-id"
                                                value="{{ $assesment->pivot->id ?? '' }}">
                                        </td>

                                        <!-- Mata Kuliah -->
                                        <td>
                                            <select @if($reportFirst->status == 4) disabled @endif name="matakuliah[{{ $reports->id }}][]"
                                                class="form-control select-mata-kuliah editable"
                                                data-id="{{ $reports->id }}" data-column="matakuliah">
                                                <option value="" data-sks="0" @if($reportFirst->status == 4) readonly @endif>Pilih Mata Kuliah</option>
                                                @foreach ($matkul as $component)
                                                    <option @if($reportFirst->status == 4) disabled @endif value="{{ $component->id }}" data-sks="{{ $component->sks }}"
                                                        data-id="{{ $component->id }}" data-column="matakuliah"
                                                        @if ($component->id == $assesment->id) selected @endif>
                                                        {{ $component->name }} ({{ $component->sks }} SKS)
                                                    </option>
                                                @endforeach
                                            </select>
                                        </td>

                                        <!-- SKS -->
                                        <td>
                                            <input type="number" class="form-control total-sks" min="1"
                                                max="10" data-id="{{ $reports->id }}"
                                                data-maks-sks="{{ $reports->maks_sks }}" value="{{ $assesment->sks ?? 0 }}"
                                                readonly>
                                        </td>

                                        <!-- Nilai -->
                                        <td>
                                            <input @if($reportFirst->status == 4) readonly @endif type="number" class="form-control editable-nilai"
                                                data-id="{{ $reports->id }}" data-column="nilai"
                                                value="{{ $assesment->pivot->nilai ?? '' }}" min="0" max="100">
                                        </td>
                                        @if ($reports->status != 4)
                                            <td>
                                                <button class="btn btn-danger btn-sm delete">Hapus</button>
                                            </td>
                                        @endif
                                    </tr>
                                @endforeach
                            @endif

                        </tbody>
                    </table>
                </div>
                <div class="d-flex justify-content-end mt-3 ">

                    @if ($reportFirst->status == 4)
                        <a href="{{ route('assessment.unpublish', $reportFirst->id) }}" class="btn btn-warning mr-1">
                            <i class="fa-solid fa-download"></i> Tidak Terbitkan

                    
                        </a>
                    @else
                        <a href="{{ route('assessment.publish', $reportFirst->id) }}" class="btn btn-warning mr-1">
                            <i class="fa-solid fa-upload"></i> Terbitkan
                        </a>
                    @endif
                    <a href="{{ route('assessment.printscore', $reportFirst->id) }}" class="btn btn-success mr-1">
                        <i class="fa fa-download"></i> Hasil Penilaian
                    </a>
                </div>
            @endcan
        </x-panel.show>
    </main>
    {{-- @dd($reportFirst); --}}
@endsection

@section('pages-script')
    <script src="/admin/js/datagrid/datatables/datatables.bundle.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
    <!-- Tambahkan SweetAlert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        let maksSKS = {{ $reportFirst->maks_sks ?? 24 }}; // Data dari database
        let sksTerpakai = {{ $sks_terpakai ?? 0 }}; // Jika belum ada, default 0
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const container = document.getElementById("input-container");
            const addButton = document.getElementById("add-field");
            const resetButton = document.getElementById("reset-field");

            // Fungsi untuk memperbarui opsi yang dinonaktifkan agar mata kuliah yang sudah dipilih tidak muncul
            function disableSelectedOptions() {
                let selectedValues = new Set();
                document.querySelectorAll(".select-mata-kuliah2").forEach(select => {
                    if (select.value) {
                        selectedValues.add(select.value);
                    }
                });
                document.querySelectorAll(".select-mata-kuliah2").forEach(select => {
                    Array.from(select.options).forEach(option => {
                        if (option.value && selectedValues.has(option.value) && option.value !==
                            select.value) {
                            option.disabled = true;
                        } else {
                            option.disabled = false;
                        }
                    });
                });
            }

            // Fungsi untuk menghitung total SKS dan cek batas maks
            function updateTotalSKS(triggerRow = null) {
                let totalSKS = sksTerpakai;
                document.querySelectorAll(".total-sks").forEach(input => {
                    totalSKS += parseInt(input.value, 10) || 0;
                });

                if (totalSKS >= maksSKS) {
                    // Sembunyikan modal terlebih dahulu
                    $('#uploaddata').modal('hide').one('hidden.bs.modal', function() {
                        // Setelah modal tertutup, tampilkan SweetAlert
                        Swal.fire({
                            icon: 'warning',
                            title: 'Batas SKS Terlampaui!',
                            text: 'Total SKS tidak boleh lebih dari ' + maksSKS + '! ',
                            confirmButtonText: 'OK'
                        }).then(() => {
                            // Jika triggerRow tersedia, hapus baris tersebut; jika tidak, hapus baris terakhir
                            if (triggerRow) {
                                triggerRow.remove();
                            } else {
                                container.querySelector("tr:last-child").remove();
                            }
                            updateTotalSKS();
                            disableSelectedOptions();
                        });
                    });
                    return false;
                }
                return true;
            }

            // Fungsi untuk menghasilkan opsi mata kuliah (menggunakan Blade)
            function matkulOptions() {
                return @json($matkul).map(matkul =>
                    `<option value="${matkul.id}" data-sks="${matkul.sks}">${matkul.name} (${matkul.sks} SKS)</option>`
                ).join('');
            }

            // Menambah baris baru
            addButton.addEventListener("click", function() {
                const newRow = document.createElement("tr");
                newRow.innerHTML = `
            <td>
                <select name="matakuliah[]" class="form-control select-mata-kuliah2">
                    <option value="" data-sks="0">Pilih Mata Kuliah</option>
                    ${matkulOptions()}
                </select>
            </td>
            <td>
                <input type="number" name="sks[]" class="form-control total-sks" min="1" max="10" readonly>
            </td>
            <td>
                <input type="number" class="form-control" name="nilai[]" min="0" max="100" required>
            </td>
            <td class="text-center">
                <button type="button" class="btn btn-danger remove-field"><i class="fa fa-trash"></i></button>
            </td>
        `;
                container.appendChild(newRow);
                disableSelectedOptions();
            });

            // Reset semua baris
            resetButton.addEventListener("click", function() {
                container.innerHTML = `
            <tr>
                <td>
                    <select name="matakuliah[]" class="form-control select-mata-kuliah2">
                        <option value="" data-sks="0">Pilih Mata Kuliah</option>
                        ${matkulOptions()}
                    </select>
                </td>
                <td>
                    <input type="number" name="sks[]" class="form-control total-sks" readonly>
                </td>
                <td>
                    <input type="number" class="form-control" name="nilai[]" min="0" max="100" required>
                </td>
                <td class="text-center">
                    <button type="button" class="btn btn-danger remove-field"><i class="fa fa-trash"></i></button>
                </td>
            </tr>
        `;
                disableSelectedOptions();
                updateTotalSKS();
            });

            // Event listener untuk pemilihan mata kuliah
            container.addEventListener("change", function(event) {
                if (event.target.classList.contains("select-mata-kuliah2")) {
                    const selectedOption = event.target.selectedOptions[0];
                    const sksInput = event.target.closest("tr").querySelector(".total-sks");
                    const sksValue = parseInt(selectedOption.getAttribute("data-sks"), 10);
                    sksInput.value = sksValue || 0;

                    // Cek total SKS, jika melebihi maka hapus baris tersebut
                    updateTotalSKS(event.target.closest("tr"));
                    disableSelectedOptions();
                }
            });

            // Event listener untuk menghapus baris dengan tombol hapus
            container.addEventListener("click", function(event) {
                if (event.target.classList.contains("remove-field") || event.target.closest(
                        ".remove-field")) {
                    event.target.closest("tr").remove();
                    updateTotalSKS();
                    disableSelectedOptions();
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {

            // Event update inline untuk perubahan pada select atau input nilai
            $(document).on("change", ".select-mata-kuliah, .editable-nilai", function() {
                let row = $(this).closest("tr");

                // Dapatkan ID record assessment dari field tersembunyi (jika ada)
                let assessmentId = row.find(".assessment-id").val();

                // Ambil id_laprak dari salah satu elemen (di sini menggunakan data-id dari select)
                let idLaprak = row.find(".select-mata-kuliah").data("id");
                console.log("Assessment ID:", assessmentId);

                // Tentukan kolom dan value berdasarkan elemen yang diubah
                let column = "";
                let value = "";

                if ($(this).hasClass("select-mata-kuliah")) {
                    column = "id_matkul";
                    value = $(this).val(); // Nilai select adalah id_matkul baru
                } else if ($(this).hasClass("editable-nilai")) {
                    column = "nilai";
                    value = $(this).val();
                }

                // Kirim data ke controller menggunakan AJAX
                $.ajax({
                    url: "{{ route('assessment.updateInline') }}", // Pastikan route ini sudah didefinisikan
                    type: "POST",
                    data: {
                        _token: "{{ csrf_token() }}",
                        assessment_id: assessmentId,
                        id_laprak: idLaprak,
                        column: column,
                        value: value
                    },
                    success: function(response) {
                        toastr.options.timeOut = 2000;
                        toastr.success(response.message);
                        // Jika diperlukan, update UI atau lakukan reload
                    },
                    error: function(xhr) {
                        toastr.error('Terjadi kesalahan: ' + xhr.responseText);
                    }
                });
            });

            // Event untuk delete data (jika diperlukan)
            $('.delete').on('click', function() {
                let row = $(this).closest('tr'); // Ambil baris terdekat jika tombol ada di dalam tabel
                let assessmentId = row.find(".assessment-id").val(); // Ambil ID dari input dalam row
                // console.log("Assessment ID:", assessmentId);

                Swal.fire({
                    title: "Apakah Anda yakin?",
                    text: "Data ini akan dihapus secara permanen!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#d33",
                    cancelButtonColor: "#3085d6",
                    confirmButtonText: "Ya, Hapus!",
                    cancelButtonText: "Batal"
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: '/assessment/delete/' + assessmentId,
                            type: 'DELETE',
                            data: {
                                _token: '{{ csrf_token() }}'
                            },
                            success: function(response) {
                                Swal.fire({
                                    title: "Terhapus!",
                                    text: response.message,
                                    icon: "success",
                                    timer: 2000,
                                    showConfirmButton: false
                                }).then(() => {
                                    location.reload();
                                });
                            },
                            error: function(xhr) {
                                Swal.fire({
                                    title: "Gagal!",
                                    text: "Data gagal dihapus.",
                                    icon: "error",
                                    timer: 2000,
                                    showConfirmButton: false
                                });
                            }
                        });
                    }
                });
            });


        });
    </script>

@endsection
