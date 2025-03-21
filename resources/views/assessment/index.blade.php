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
                <div class="d-flex justify-content-between align-items-center flex-wrap gap-2">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#uploaddata">
                        <i class="fa fa-plus"></i> Tambah Penilaian
                    </button>
                </div>

                <div class="modal fade" id="uploaddata" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Tambah Penilaian</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                @csrf
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
                                                <select name="matakuliah[]" class="form-control select-mata-kuliah" required>
                                                    <option value="1" data-sks="3">Matematika (3 SKS)</option>
                                                    <option value="2" data-sks="2">Fisika (2 SKS)</option>
                                                    <option value="3" data-sks="4">Pemrograman (4 SKS)</option>
                                                </select>
                                            </td>
                                            <td>
                                                <input type="number" name="sks[]" class="form-control sks-input" value="3" required readonly>
                                            </td>
                                            <td>
                                                <input type="number" name="nilai[]" class="form-control" required min="0" max="100">
                                            </td>
                                            <td class="text-center">
                                                <button type="button" class="btn btn-danger remove-field">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>

                                <button type="button" class="btn btn-success" id="add-field">Tambah Data</button>
                                <button type="button" class="btn btn-danger" id="reset-field">Reset</button>

                                <div class="modal-footer mt-3">
                                    <button type="button" class="btn btn-primary" id="save-data">Simpan</button>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </x-slot>

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
                        <tr>
                            <td>
                                <input type="text" class="form-control" value="Matematika" readonly>
                            </td>
                            <td>
                                <input type="number" class="form-control" value="3" readonly>
                            </td>
                            <td>
                                <input type="number" class="form-control" value="85" min="0" max="100">
                            </td>
                            <td>
                                <button class="btn btn-danger btn-sm delete-row">Hapus</button>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" class="form-control" value="Fisika" readonly>
                            </td>
                            <td>
                                <input type="number" class="form-control" value="2" readonly>
                            </td>
                            <td>
                                <input type="number" class="form-control" value="78" min="0" max="100">
                            </td>
                            <td>
                                <button class="btn btn-danger btn-sm delete-row">Hapus</button>
                            </td>
                        </tr>
                    </tbody>                        
                </table>
            </div>

            <div class="d-flex justify-content-end mt-3">
                <a href="{{ route('rekomendasi.print', $report->id ?? '') }}" class="btn btn-success mr-1">
                    <i class="fa fa-download"></i> Nilai Rekomendasi
                </a>
                <a href="{{ route('report.printscore') }}" class="btn btn-success mr-1">
                    <i class="fa fa-download"></i> Nilai Akhir
                </a>
            </div>
        </x-panel.show>
    </main>
@endsection

@section('pages-script')
    <script src="/admin/js/datagrid/datatables/datatables.bundle.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
    <!-- Tambahkan SweetAlert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {

        // Tambah baris baru di modal
        document.getElementById('add-field').addEventListener('click', function() {
            let newRow = `
                <tr>
                    <td>
                        <select name="matakuliah[]" class="form-control select-mata-kuliah" required>
                            <option value="1" data-sks="3">Matematika (3 SKS)</option>
                            <option value="2" data-sks="2">Fisika (2 SKS)</option>
                            <option value="3" data-sks="4">Pemrograman (4 SKS)</option>
                        </select>
                    </td>
                    <td>
                        <input type="number" name="sks[]" class="form-control sks-input" required readonly>
                    </td>
                    <td>
                        <input type="number" name="nilai[]" class="form-control" required min="0" max="100">
                    </td>
                    <td class="text-center">
                        <button type="button" class="btn btn-danger remove-field">
                            <i class="fa fa-trash"></i>
                        </button>
                    </td>
                </tr>
            `;
            document.getElementById('input-container').insertAdjacentHTML('beforeend', newRow);
        });

        // Hapus baris di modal dan tabel utama
        document.addEventListener('click', function(event) {
            if (event.target.closest('.remove-field')) {
                event.target.closest('tr').remove();
            }
            if (event.target.closest('.delete-row')) {
                event.target.closest('tr').remove();
            }
        });

        // Reset data di modal
        document.getElementById('reset-field').addEventListener('click', function() {
            document.getElementById('input-container').innerHTML = '';
        });

        // Simpan data dari modal ke tabel utama
        document.querySelector('.modal-footer .btn-primary').addEventListener('click', function() {
            let rows = document.querySelectorAll('#input-container tr');
            let targetTable = document.getElementById('data-table-body');

            rows.forEach(function(row) {
                let matkul = row.querySelector('select option:checked').textContent;
                let sks = row.querySelector('.sks-input').value;
                let nilai = row.querySelector('input[name="nilai[]"]').value;

                let newRow = `
                    <tr>
                        <td><input type="text" class="form-control" value="${matkul}" readonly></td>
                        <td><input type="number" class="form-control" value="${sks}" readonly></td>
                        <td><input type="number" class="form-control" value="${nilai}" min="0" max="100"></td>
                        <td><button class="btn btn-danger btn-sm delete-row">Hapus</button></td>
                    </tr>
                `;

                targetTable.insertAdjacentHTML('beforeend', newRow);
            });

            // Bersihkan input di modal setelah disimpan
            document.getElementById('input-container').innerHTML = '';

            // Tutup modal
            $('#uploaddata').modal('hide');
        });
    });
    </script>



    {{-- <script>
       $(document).ready(function() {
        
            // Inisialisasi Select2
            function initSelect2() {
                $('.select-mata-kuliah').select2({
                    placeholder: "Pilih Mata Kuliah",
                    allowClear: true
                });
            }
            initSelect2();

            // Fungsi untuk mengupdate SKS saat mata kuliah dipilih
            $(document).on('change', '.select-mata-kuliah', function() {
                let selectedOption = $(this).find(':selected'); // Ambil opsi yang dipilih
                let sksValue = selectedOption.data('sks'); // Ambil nilai SKS dari atribut data-sks
                
                // Jika SKS tidak terbaca, gunakan parseInt untuk memastikan
                sksValue = sksValue ? parseInt(sksValue) : 0;

                // Masukkan nilai SKS ke input sks pada baris yang sama
                $(this).closest('tr').find('.sks-input').val(sksValue);

                // Update total SKS
                updateTotalSKS();
            });

            

            // Fungsi untuk memperbarui total SKS
            function updateTotalSKS() {
                let totalSKS = 0;
                $('.sks-input').each(function() {
                    totalSKS += parseInt($(this).val()) || 0;
                });

                let maxSKS = {{ $report->maks_sks ?? 24 }}; // Ambil batas SKS dari backend
                if (totalSKS > maxSKS) {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Batas SKS Terlampaui!',
                        text: 'Total SKS tidak boleh lebih dari ' + maxSKS,
                        confirmButtonText: 'OK'
                    });
                }
            }

            // Fungsi untuk menghasilkan opsi mata kuliah
            function generateMatkulOptions() {
                let options = '';
                @foreach ($matkul as $m)
                    options += `<option value="{{ $m->id }}" data-sks="{{ $m->sks }}">{{ $m->name }} ({{ $m->sks }} SKS)</option>`;
                @endforeach
                return options;
            }

            // Tambah baris baru dengan delegasi event
        $('#add-field').click(function() {
            let newRow = `
                <tr>
                    <td>
                        <select name="matakuliah[]" class="form-control select-mata-kuliah" required>
                            <option value="">Pilih Mata Kuliah</option>
                            ${generateMatkulOptions()}
                        </select>
                    </td>
                    <td>
                        <input type="number" name="sks[]" class="form-control sks-input" required readonly>
                    </td>
                    <td>
                        <input type="number" name="nilai[]" class="form-control nilai-input" required min="0" max="100">
                    </td>
                    <td class="text-center">
                        <button type="button" class="btn btn-danger remove-field">
                            <i class="fa fa-trash"></i>
                        </button>
                    </td>
                </tr>
            `;
            $('#input-container').append(newRow);
            initSelect2(); // Reinit Select2 untuk elemen baru
        });

        // Hapus baris secara dinamis
        $(document).on('click', '.remove-field', function() {
            $(this).closest('tr').remove();
            updateTotalSKS();
        });

            // Reset form dalam modal
            $('#reset-field').click(function() {
                $('#input-container').html(`
                    <tr>
                        <td>
                            <select name="matakuliah[]" class="form-control select-mata-kuliah" required>
                                <option value="">Pilih Mata Kuliah</option>
                                ${generateMatkulOptions()}
                            </select>
                        </td>
                        <td>
                            <input type="number" name="sks[]" class="form-control sks-input" required readonly>
                        </td>
                        <td>
                            <input type="number" name="nilai[]" class="form-control nilai-input" required min="0" max="100">
                        </td>
                        <td class="text-center">
                            <button type="button" class="btn btn-danger remove-field">
                                <i class="fa fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                `);
                initSelect2();
            });
        });


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

            Event saat memilih mata kuliah VERSI OLD
            Fungsi untuk menonaktifkan opsi yang sudah dipilih di select lain
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

            Event listener saat memilih mata kuliah
            $(document).on("change", ".select-mata-kuliah", function() {
                let row = $(this).closest("tr");
                let selectedOption = $(this).find("option:selected");
                let sks = selectedOption.data("sks") || 0;

                row.find(".total-sks").val(sks);
                updateTotalSKS();
                disableSelectedOptions(); // Panggil fungsi ini agar perubahan langsung terlihat
            });

            Event listener untuk menambahkan baris baru
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

            Event untuk menyimpan data ke database
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
