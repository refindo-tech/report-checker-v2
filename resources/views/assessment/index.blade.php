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
                    <div class="d-flex justify-content-between align-items-center flex-wrap gap-2">
                        <!-- Button Upload -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#uploaddata">
                            <i class="fa fa-plus"></i> Tambah Mata Kuliah
                        </button>
                    </div>
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
                                                        <select name="matakuliah[]" class="form-control select-mata-kuliah">
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
                                        <button type="button" class="btn btn-success" id="add-field">Tambah Data</button>
                                        <button type="button" class="btn btn-danger" id="reset-field">Reset</button>

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
                <div class="table-responsive">
                    <table id="dt-mahasiswa" class="table table-bordered">
                        <thead class="bg-primary text-white">
                            <tr>
                                <th>Nama Mata Kuliah</th>
                                <th>SKS</th>
                                <th>Nilai</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="data-table-body">
                            @foreach ($reports as $report)
                                @php
                                    // $firstAssessment = $report->assesment->first();
                                    // $pivotData = $firstAssessment ? $firstAssessment->pivot : null;

                                    $assesments = $report->assesment->isNotEmpty() ? $report->assesment : [null]; // Jika kosong, buat array dengan satu elemen null
                                @endphp

                                @foreach ($assesments as $assesment)
                                    <tr>
                                        <td style="display:none;">
                                            <input type="hidden" class="assessment-id"
                                                value="{{ $assesment->pivot->id ?? '' }}">
                                        </td>
                                        <!-- Pilihan Mata Kuliah -->
                                        {{-- @dd($assesment->pivot, $report, $firstAssessment, $pivotData); --}}
                                        <td>
                                            <select name="matakuliah[{{ $report->id }}][]"
                                                class="form-control select-mata-kuliah editable" data-id="{{ $report->id }}"
                                                data-column="matakuliah">
                                                <option value="" data-sks="0">Pilih Mata Kuliah</option>
                                                @foreach ($matkul as $component)
                                                    <option value="{{ $component->id }}" data-sks="{{ $component->sks }}"
                                                        data-id="{{ $component->id }}" data-column="matakuliah"
                                                        @if ($assesment && $component->id == $assesment->id) selected @endif>
                                                        {{ $component->name }} ({{ $component->sks }} SKS)
                                                    </option>
                                                @endforeach
                                            </select>
                                        </td>

                                        <!-- Jumlah SKS (Readonly) -->
                                        <td>
                                            <input type="number" class="form-control total-sks" min="1"
                                                max="10" data-id="{{ $report->id }}"
                                                data-maks-sks="{{ $report->maks_sks }}" value="{{ $assesment->sks ?? 0 }}"
                                                readonly>
                                        </td>

                                        <!-- Input Nilai -->
                                        <td>
                                            <input type="number" class="form-control editable-nilai"
                                                data-id="{{ $report->id }}" data-column="nilai"
                                                value="{{ $assesment->pivot->nilai ?? '' }}" min="0" max="100">
                                        </td>

                                        <td>
                                            <button class="btn btn-danger btn-sm delete">Hapus</button>
                                        </td>
                                    </tr>
                                @endforeach
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="d-flex justify-content-end mt-3 ">
                    <a href="{{ route('rekomendasi.print', $report->id) }}" class="btn btn-success mr-1">
                        <i class="fa fa-download"></i> Nilai Rekomendasi
                    </a>
                    <a href="{{ route('assessment.printscore', $report->id) }}" class="btn btn-success mr-1">
                        <i class="fa fa-download"></i> Nilai Akhir
                    </a>
                    @if ($report->status == 4)
                        <a href="{{ route('assessment.unpublish', $report->id) }}" class="btn btn-warning mr-1">
                            <i class="fa-solid fa-upload"></i> Tidak Terbitkan
                        </a>
                    @else
                        <a href="{{ route('assessment.publish', $report->id) }}" class="btn btn-warning mr-1">
                            <i class="fa-solid fa-upload"></i> Terbitkan
                        </a>
                    @endif
                </div>
            @endcan
        </x-panel.show>
    </main>
@endsection

@section('pages-script')
    <script src="/admin/js/datagrid/datatables/datatables.bundle.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
    <!-- Tambahkan SweetAlert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        let maksSKS = {{ $reportFirst->maks_sks ?? 24 }}; // Data dari database
        let sksTerpakai = {{ $sks_terpakai ?? 0 }}; // Jika belum ada, default 0
        $(document).ready(function() {
            // Inisialisasi Select2
            // $('.select-mata-kuliah').select2({
            //     placeholder: "Pilih Mata Kuliah",
            //     allowClear: true
            // });
            // $("#form-input").off("submit").on("submit", function(e) {
            //     // Tangani pengiriman form dengan AJAX
            //     $.ajax({
            //         url: $("#form-input").attr('action'),
            //         type: $("#form-input").attr('method'),
            //         data: new FormData($("#form-input")[0]),
            //         contentType: false,
            //         processData: false,
            //         success: function(response) {
            //             Swal.fire({
            //                 icon: 'success',
            //                 title: 'Berhasil!',
            //                 text: 'Data penilaian berhasil dikirim.'
            //             });
            //             $("#form-input")[0].reset();
            //             $('.select-mata-kuliah').val(null).trigger('change');
            //         },
            //         error: function(xhr, status, error) {
            //             console.error("Error: ", error, xhr.responseText);
            //             Swal.fire({
            //                 icon: 'error',
            //                 title: 'Error',
            //                 text: 'Gagal mengirim data. Silahkan coba lagi.'
            //             });
            //         }
            //     });
            // });


        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const container = document.getElementById("input-container");
            const addButton = document.getElementById("add-field");
            const resetButton = document.getElementById("reset-field");

            // Fungsi untuk memperbarui opsi yang dinonaktifkan agar mata kuliah yang sudah dipilih tidak muncul
            function disableSelectedOptions() {
                let selectedValues = new Set();
                document.querySelectorAll(".select-mata-kuliah").forEach(select => {
                    if (select.value) {
                        selectedValues.add(select.value);
                    }
                });
                document.querySelectorAll(".select-mata-kuliah").forEach(select => {
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
                <select name="matakuliah[]" class="form-control select-mata-kuliah">
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
                    <select name="matakuliah[]" class="form-control select-mata-kuliah">
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
                if (event.target.classList.contains("select-mata-kuliah")) {
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
                console.log("Assessment ID:", assessmentId);

                if (confirm('Apakah Anda yakin ingin menghapus data ini?')) {
                    $.ajax({
                        url: '/assessment/delete/' + assessmentId,
                        type: 'DELETE',
                        data: {
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            alert(response.message);
                            location.reload();
                        },
                        error: function(xhr) {
                            alert("Gagal menghapus data!");
                        }
                    });
                }
            });

        });
    </script> --}}
    {{-- <script>
        $(document).ready(function() {
            // Inisialisasi DataTable
            $('#dt-mahasiswa').DataTable({
                responsive: true,
            });

            // Inisialisasi Select2
            function initSelect2() {
                $('.select-mata-kuliah').select2({
                    placeholder: "Pilih Mata Kuliah",
                    allowClear: true
                });
            }
            initSelect2();

            // Update SKS saat mata kuliah dipilih
            $(document).on('change', '.select-mata-kuliah', function() {
                let selectedOption = $(this).find(':selected');
                let sksValue = selectedOption.data('sks');
                let row = $(this).closest('tr');
                row.find('.total-sks').val(sksValue);
            });

            // Fungsi untuk menambahkan baris baru
            $('#addRow').on('click', function() {
                let tableBody = $('#dt-mahasiswa tbody');
                let rowCount = tableBody.find('tr').length + 1;

                let newRow = `
            <tr>
                <td>
                    <select name="mikroskills[${rowCount}]" class="form-control select-mata-kuliah" data-id="${rowCount}">
                        <option value="" data-sks="0">Pilih Mata Kuliah</option>
                        @foreach ($matkul as $component)
                            <option value="{{ $component['id'] }}" data-sks="{{ $component['sks'] }}">
                                {{ $component['name'] }} ({{ $component['sks'] }} SKS)
                            </option>
                        @endforeach
                    </select>
                </td>
                <td>
                    <input type="number" class="form-control total-sks" min="1" max="10" value="0" readonly>
                </td>
                <td>
                    <input type="number" class="form-control editable" data-column="nilai" value="0" min="0" max="100">
                </td>
                <td>
                    <button class="btn btn-danger btn-sm deleteRow">Hapus</button>
                </td>
            </tr>
        `;

                tableBody.append(newRow);
                initSelect2(); // Inisialisasi Select2 untuk elemen baru
            });

            // Fungsi untuk menghapus baris tertentu
            $(document).on('click', '.deleteRow', function() {
                let row = $(this).closest('tr');
                Swal.fire({
                    title: "Apakah Anda yakin?",
                    text: "Data ini akan dihapus!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#d33",
                    cancelButtonColor: "#3085d6",
                    confirmButtonText: "Ya, hapus!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        row.remove();
                        Swal.fire("Terhapus!", "Data telah dihapus.", "success");
                    }
                });
            });

            // Event untuk menyimpan data ke database
            $('#simpan-data').on('click', function() {
                let data = [];

                $('#dt-mahasiswa tbody tr').each(function() {
                    let row = $(this);
                    let id = row.find('.select-mata-kuliah').val();
                    let sks = row.find('.total-sks').val();
                    let nilai = row.find('.editable').val();

                    if (id && sks && nilai) {
                        data.push({
                            mata_kuliah_id: id,
                            sks: sks,
                            nilai: nilai
                        });
                    }
                });

                if (data.length === 0) {
                    Swal.fire("Oops!", "Tidak ada data yang bisa disimpan!", "error");
                    return;
                }

                $.ajax({
                    url: '/simpan-nilai',
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        data: data
                    },
                    success: function(response) {
                        Swal.fire("Sukses!", "Data berhasil disimpan!", "success");
                    },
                    error: function(error) {
                        Swal.fire("Gagal!", "Terjadi kesalahan saat menyimpan data!", "error");
                    }
                });
            });
        });
    </script> --}}


    {{-- <script>
        $(document).ready(function() {
            // Ambil nilai maksimum SKS dari atribut data di elemen input
            let maksSKS = parseInt($('.total-sks').data('maks-sks')) || 24; // Default ke 24 jika tidak ditemukan

            $(document).on('DOMNodeInserted', function(e) {
                if ($(e.target).hasClass('select2-placeholder-multiple')) {
                    initSelect2();
                }
            });

            // Hitung total SKS saat mata kuliah dipilih
            $(document).on('change', '.select2-placeholder-multiple', function() {
                let row = $(this).closest('tr'); // Ambil baris terkait
                let totalSKS = 0;
                let selectedOptions = $(this).find('option:selected');
                let lastSelected = selectedOptions.last(); // Opsi terakhir yang dipilih

                selectedOptions.each(function() {
                    totalSKS += parseInt($(this).data('sks')) || 0;
                });

                // Cek apakah total SKS melebihi batas dari maksSKS
                if (totalSKS > maksSKS) {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Batas SKS Terlampaui!',
                        text: `Total SKS tidak boleh lebih dari ${maksSKS}!`,
                        confirmButtonText: 'OK'
                    });

                    // Hapus opsi terakhir yang menyebabkan SKS melebihi batas
                    lastSelected.prop('selected', false);

                    // Gunakan setTimeout agar Select2 memperbarui tampilan dengan benar
                    setTimeout(() => {
                        $(this).trigger('change'); // Perbarui tampilan Select2

                        // Hitung ulang total SKS setelah opsi terakhir dihapus
                        let newTotalSKS = 0;
                        $(this).find('option:selected').each(function() {
                            newTotalSKS += parseInt($(this).data('sks')) || 0;
                        });

                        // Perbarui input SKS hanya untuk baris ini
                        row.find('.total-sks').val(newTotalSKS);
                    }, 100);
                } else {
                    // Perbarui input SKS hanya jika masih dalam batas
                    row.find('.total-sks').val(totalSKS);
                }
            });
        });
    </script>
    <script>
        $(document).on("click", ".submit-assessment", function() {
            let row = $(this).closest("tr"); // Cari baris tabel tempat tombol ditekan
            let idLaprak = $(this).data("id"); // Ambil ID dari atribut data-id
            let selectedMikroskills = row.find(".select2-placeholder-multiple")
                .val(); // Ambil mikroskill yang dipilih
            let totalSKS = row.find(".total-sks").val(); // Ambil total SKS

            // Kirim data ke controller menggunakan AJAX
            $.ajax({
                url: "{{ route('assessment.updateInline') }}", // Sesuaikan dengan route Anda
                type: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    id_laprak: idLaprak,
                    mikroskills: selectedMikroskills,
                    total_sks: totalSKS
                },
                success: function(response) {
                    Swal.fire({
                        icon: "success",
                        title: "Berhasil!",
                        text: response.message
                    });
                    // Refresh halaman atau update tabel jika diperlukan
                    location.reload();
                },
                error: function(xhr) {
                    Swal.fire({
                        icon: "error",
                        title: "Oops...",
                        text: "Terjadi kesalahan: " + xhr.responseText
                    });
                }
            });
        });
    </script> --}}
@endsection
