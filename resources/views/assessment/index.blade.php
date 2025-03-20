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
            <x-slot name="paneltoolbar">
                <x-panel.tool-bar>
                    <button id="add-row" class="btn btn-primary mt-2">Tambah Baris</button>

                    {{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#uploaddata">
                        <i class="fa fa-plus"></i> Tambah Data Penilaian
                    </button> --}}
                </x-panel.tool-bar>
            </x-slot>
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
                        <tbody>
                            @foreach ($reports as $report)
                                @php
                                    $assesments = $report->assesment->isNotEmpty() ? $report->assesment : [null]; // Jika kosong, buat array dengan satu elemen null
                                @endphp

                                @foreach ($assesments as $assesment)
                                    <tr>
                                        <!-- Pilihan Mata Kuliah -->
                                        <td>
                                            <select name="matakuliah[{{ $report->id }}][]"
                                                class="form-control select-mata-kuliah editable" data-id="{{ $report->id }}">
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
                                            <input type="number" class="form-control total-sks" min="1" max="10"
                                                data-id="{{ $report->id }}" data-maks-sks="{{ $report->maks_sks }}"
                                                value="{{ $assesment->sks ?? 0 }}" readonly>
                                        </td>

                                        <!-- Input Nilai -->
                                        <td>
                                            <input type="number" class="form-control editable" data-id="{{ $report->id }}"
                                                data-column="nilai" value="{{ $assesment->pivot->nilai ?? "" }}" min="0"
                                                max="100">
                                        </td>

                                        <td>
                                            <button class="btn btn-danger btn-sm delete-row">Hapus</button>
                                        </td>
                                    </tr>
                                @endforeach
                            @endforeach



                            {{-- @foreach ($reports as $item)
                                <tr>
                                    <!-- Pilihan Mata Kuliah -->
                                    <td>
                                        <select name="matakuliah[{{ $report->id }}]" class="form-control select-mata-kuliah"
                                            data-id="{{ $report->id }}">
                                            <option value="" data-sks="0">Pilih Mata Kuliah</option>
                                            @foreach ($matkul as $component)
                                                <option value="{{ $component->id }}" data-sks="{{ $component->sks }}"
                                                    data-id="{{ $component->id }}" data-column="matakuliah"
                                                    @if (in_array($component->name, $reportAssesment[$report->id] ?? [])) selected @endif>
                                                    {{ $component->name }} ({{ $component->sks }} SKS)
                                                </option>
                                            @endforeach
                                        </select>
                                    </td>

                                    <!-- Jumlah SKS (Readonly) -->
                                    <td>
                                        <input type="number" class="form-control total-sks" min="1" max="10"
                                            data-id="{{ $report->id }}" data-maks-sks="{{ $report->maks_sks }}"
                                            value="{{ collect($matkul)->firstWhere('id', $report['selected_mk'])['sks'] ?? 0 }}"
                                            readonly>
                                    </td>

                                    <!-- Input Nilai -->
                                    <td>
                                        <input type="number" class="form-control editable" data-id="{{ $report['id'] }}"
                                            data-column="nilai" value="0" min="0" max="100">
                                    </td>
                                    <td>
                                        <button class="btn btn-danger btn-sm delete-row">Hapus</button>
                                    </td>
                                </tr>
                            @endforeach --}}
                        </tbody>
                    </table>
                </div>
                <div class="d-flex justify-content-end mt-3 ">
                    <a href="{{ route('rekomendasi.print', $report->id) }}" class="btn btn-success mr-1">
                        <i class="fa fa-download"></i> Nilai Rekomendasi
                    </a>
                    <a href="{{ route('assessment.printscore') }}" class="btn btn-success mr-1">
                        <i class="fa fa-download"></i> Nilai Akhir
                    </a>
                    <a>
                        <button data-id="{{ $report->id }}" class="btn btn-primary submit-assessment">Simpan Data</button>
                    </a>
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
        $(document).ready(function() {
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

            // Mendapatkan nilai maksimal SKS
            let maxSKS = {{ $report->maks_sks ?? 24 }}; // Batas maksimal SKS
            let totalSKS = 0; // Total SKS yang diambil

            // Fungsi untuk update SKS berdasarkan mata kuliah yang dipilih
            function updateTotalSKS() {
                totalSKS = 0;
                $('.total-sks').each(function() {
                    totalSKS += parseInt($(this).val()) || 0;
                });

                if (totalSKS > maxSKS) {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Batas SKS Terlampaui!',
                        text: 'Total SKS tidak boleh lebih dari ' + maxSKS + '!' +
                            ' Total SKS yang diambil: ' + totalSKS,
                        confirmButtonText: 'OK'
                    }).then(() => {
                        // Hapus baris terakhir jika total SKS melebihi batas
                        $("tbody tr:last").remove();
                        updateTotalSKS(); // Panggil ulang untuk memperbarui total SKS setelah penghapusan
                        disableSelectedOptions();
                    });
                }
            }


            // Event saat memilih mata kuliah
            // Fungsi untuk menonaktifkan opsi yang sudah dipilih di select lain
            function disableSelectedOptions() {
                let selectedValues = $(".select-mata-kuliah").map(function() {
                    return $(this).val();
                }).get();

                $(".select-mata-kuliah").each(function() {
                    let $select = $(this);

                    $select.find("option").each(function() {
                        let value = $(this).val();
                        $(this).prop("disabled", value !== "" && selectedValues.includes(value) &&
                            $select.val() !== value);
                    });
                });
            }

            // Event listener saat memilih mata kuliah
            $(document).on("change", ".select-mata-kuliah", function() {
                let row = $(this).closest("tr");
                let selectedOption = $(this).find("option:selected");
                let sks = selectedOption.data("sks") || 0;

                row.find(".total-sks").val(sks);
                updateTotalSKS();
                disableSelectedOptions(); // Panggil fungsi ini agar perubahan langsung terlihat
            });

            // Event listener untuk menambahkan baris baru
            $(document).on("click", "#add-row", function() {
                let newRow = `
        <tr>
            <td>
                <select name="matakuliah[]" class="form-control select-mata-kuliah">
                    <option value="" data-sks="0">Pilih Mata Kuliah</option>
                    ${generateMatkulOptions()}
                </select>
            </td>
            <td><input type="number" class="form-control total-sks" readonly value="0"></td>
            <td><input type="number" class="form-control editable" min="0" max="100"></td>
            <td><button class="btn btn-danger btn-sm delete-row">Hapus</button></td>
        </tr>
    `;

                $("tbody").append(newRow);
                disableSelectedOptions
                    (); // Panggil ini agar baris baru langsung mendapatkan aturan validasi
                initSelect2(); // Inisialisasi Select2 untuk elemen baru
            });

            // Fungsi untuk generate ulang options yang sudah difilter
            function generateMatkulOptions() {
                let selectedValues = $(".select-mata-kuliah").map(function() {
                    return $(this).val();
                }).get();

                let options = '';
                $(".select-mata-kuliah:first option").each(function() {
                    let value = $(this).val();
                    let sks = $(this).data("sks");
                    let text = $(this).text();
                    let isDisabled = selectedValues.includes(value) && value !== "" ? 'disabled' : '';

                    options += `<option value="${value}" data-sks="${sks}" ${isDisabled}>${text}</option>`;

                    // if (value === "" || !selectedValues.includes(value)) {
                    //     options += `<option value="${value}" data-sks="${sks}">${text}</option>`;
                    // }
                });

                return options;
            }

            // Event listener untuk menghapus baris
            $(document).on("click", ".delete-row", function() {
                $(this).closest("tr").remove();
                disableSelectedOptions(); // Panggil ulang agar pilihan kembali tersedia di dropdown lain
                updateTotalSKS();
            });

            // Event untuk menyimpan data ke database
            // $('#simpan-data').on('click', function() {
            //     let data = [];

            //     $('#dt-mahasiswa tbody tr').each(function() {
            //         let row = $(this);
            //         let id = row.find('.select-mata-kuliah').val();
            //         let sks = row.find('.total-sks').val();
            //         let nilai = row.find('.editable').val();

            //         if (id && sks && nilai) {
            //             data.push({
            //                 mata_kuliah_id: id,
            //                 sks: sks,
            //                 nilai: nilai
            //             });
            //         }
            //     });

            //     if (data.length === 0) {
            //         Swal.fire("Oops!", "Tidak ada data yang bisa disimpan!", "error");
            //         return;
            //     }

            //     $.ajax({
            //         url: '/simpan-nilai',
            //         method: 'POST',
            //         data: {
            //             _token: '{{ csrf_token() }}',
            //             data: data
            //         },
            //         success: function(response) {
            //             Swal.fire("Sukses!", "Data berhasil disimpan!", "success");
            //         },
            //         error: function(error) {
            //             Swal.fire("Gagal!", "Terjadi kesalahan saat menyimpan data!", "error");
            //         }
            //     });
            // });

        });
    </script>
    <script>
        $(document).on("change", ".editable", function() {
            let row = $(this).closest("tr"); // Cari baris tempat tombol diklik
            let idLaprak = $(this).data("id"); // Ambil ID dari atribut data-id pada tombol

            // Ambil nilai dari ketiga input
            let selectedMatakuliah = row.find(".select-mata-kuliah").val();
            // Jika tidak ada nilai (null atau kosong), pastikan menjadi array kosong
            selectedMatakuliah = selectedMatakuliah ? [selectedMatakuliah] : [];

            let totalSKS = row.find(".total-sks").val();
            let nilai = row.find(".editable").val();

            // Kirim data ke controller menggunakan AJAX
            $.ajax({
                url: "{{ route('assessment.updateInline') }}", // Ganti dengan route yang sesuai
                type: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    id_laprak: idLaprak,
                    matakuliah: selectedMatakuliah,
                    total_sks: totalSKS,
                    nilai: nilai
                },
                success: function(response) {
                    Swal.fire({
                        icon: "success",
                        title: "Berhasil!",
                        text: response.message
                    });
                    // Jika diperlukan, refresh halaman atau update data tabel
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
    </script>
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
