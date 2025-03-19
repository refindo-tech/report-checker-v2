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
                    <button id="addRow" class="btn btn-primary mt-2">Tambah Baris</button>
                    
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
                            @php
                                $dummyReports = [
                                    ['id' => 1, 'nilai' => 3, 'selected_mk' => 1],
                                    ['id' => 2, 'nilai' => 4, 'selected_mk' => 2],
                                    ['id' => 3, 'nilai' => 2, 'selected_mk' => 3],
                                ];
                    
                                $dummyMikroskill = [
                                    ['id' => 1, 'name' => 'Pemrograman Web', 'sks' => 2],
                                    ['id' => 2, 'name' => 'Basis Data', 'sks' => 3],
                                    ['id' => 3, 'name' => 'Sistem Digital', 'sks' => 3],
                                ];
                            @endphp
                    
                            @foreach ($dummyReports as $report)
                                <tr>
                                    <!-- Pilihan Mata Kuliah -->
                                    <td>
                                        <select name="mikroskills[{{ $report['id'] }}]" 
                                                class="form-control select-mata-kuliah"
                                                data-id="{{ $report['id'] }}">
                                            <option value="" data-sks="0">Pilih Mata Kuliah</option>
                                            @foreach ($dummyMikroskill as $component)
                                                <option value="{{ $component['id'] }}" 
                                                        data-sks="{{ $component['sks'] }}"
                                                        @if($component['id'] == $report['selected_mk']) selected @endif>
                                                    {{ $component['name'] }} ({{ $component['sks'] }} SKS)
                                                </option>
                                            @endforeach
                                        </select>
                                    </td>
                    
                                    <!-- Jumlah SKS (Readonly) -->
                                    <td>
                                        <input type="number" class="form-control total-sks" 
                                               min="1" max="10" 
                                               data-id="{{ $report['id'] }}" 
                                               value="{{ collect($dummyMikroskill)->firstWhere('id', $report['selected_mk'])['sks'] ?? 0 }}" 
                                               readonly>
                                    </td>
                    
                                    <!-- Input Nilai -->
                                    <td>
                                        <input type="number" class="form-control editable" 
                                               data-id="{{ $report['id'] }}" 
                                               data-column="nilai" 
                                               value="0" 
                                               min="0" max="100">
                                    </td>
                                    <td>
                                        <button class="btn btn-danger btn-sm delete-row">Hapus</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>  
                </div>
                <div class="d-flex justify-content-end mt-3 ">
                    <a href="{{ route('report.print') }}" class="btn btn-success mr-1">
                        <i class="fa fa-download"></i> Nilai Rekomendasi
                    </a>
                    <a href="{{ route('assessment.printscore') }}" class="btn btn-success mr-1">
                        <i class="fa fa-download"></i> Nilai Akhir
                    </a>
                    <a>
                        <button id="simpan-data" class="btn btn-primary">Simpan Data</button>
                    </a>
                </div>
            @endcan
        </x-panel.show>
    </main>
@endsection

@section('pages-script')
    <script src="/admin/js/datagrid/datatables/datatables.bundle.js"></script>
    <script>
        $(document).ready(function() {
            // Inisialisasi DataTable
            $('#dt-mahasiswa').DataTable({
                responsive: true,
            });
    
            // Inisialisasi Select2
            $('.select-mata-kuliah').select2({
                placeholder: "Pilih Matakuliah",
                allowClear: true
            });
    
            // Update SKS saat mata kuliah dipilih
            $(document).on('change', '.select-mata-kuliah', function() {
                let selectedOption = $(this).find(':selected');
                let sksValue = selectedOption.data('sks');
                let row = $(this).closest('tr');
                row.find('.total-sks').val(sksValue);
            });
    
                // #MASIH STATIS
            // Fungsi untuk menambahkan baris baru, 
            $('#addRow').on('click', function () {
                let tableBody = $('#dt-mahasiswa tbody');
                let rowCount = tableBody.find('tr').length + 1;
    
                let newRow = `
                    <tr>
                        <td>
                            <select name="mikroskills[${rowCount}]" class="form-control select-mata-kuliah" data-id="${rowCount}">
                                <option value="" data-sks="0">Pilih Mata Kuliah</option>
                                @foreach ($dummyMikroskill as $component)
                                    <option value="{{ $component['id'] }}" data-sks="{{ $component['sks'] }}">
                                        {{ $component['name'] }} ({{ $component['sks'] }} SKS)
                                    </option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <input type="number" class="form-control total-sks" min="1" max="10" data-id="${rowCount}" value="0" readonly>
                        </td>
                        <td>
                            <input type="number" class="form-control editable" data-id="${rowCount}" data-column="nilai" value="0" min="0" max="100">
                        </td>
                        <td>
                            <button class="btn btn-danger btn-sm deleteRow">Hapus</button>
                        </td>

                    </tr>
                `;
    
                tableBody.append(newRow);
    
                // Reinitialize Select2 untuk elemen baru
                $('.select-mata-kuliah').select2({
                    placeholder: "Pilih Matakuliah",
                    allowClear: true
                });
            });
    
            // Fungsi untuk menghapus baris tertentu
            $(document).on('click', '.deleteRow', function () {
                let row = $(this).closest('tr');
                row.remove();
            });


            //  #MAU NYOBA TAKUT MERUBAH BAKCEND
             // Event untuk MENYIMPAN DATA KE DATABASE saat tombol ditekan
                $('#simpan-data').on('click', function() {
                    let data = [];

                    // Loop setiap baris tabel untuk mengambil data
                    $('#dt-mahasiswa tbody tr').each(function() {
                        let row = $(this);
                        let id = row.find('.select-mata-kuliah').val();
                        let sks = row.find('.total-sks').val();
                        let nilai = row.find('.editable').val();

                        // Pastikan data tidak kosong sebelum dikirim
                        if (id && sks && nilai) {
                            data.push({
                                mata_kuliah_id: id,
                                sks: sks,
                                nilai: nilai
                            });
                        }
                    });

                    // Jika tidak ada data yang valid, tampilkan alert
                    if (data.length === 0) {
                        alert('Tidak ada data yang bisa disimpan!');
                        return;
                    }

                    // Kirim data ke server dengan AJAX
                    $.ajax({
                        url: '/simpan-nilai', // Sesuaikan dengan route Laravel
                        method: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}',
                            data: data
                        },
                        success: function(response) {
                            alert('Data berhasil disimpan!');
                        },
                        error: function(error) {
                            console.error('Gagal menyimpan data', error);
                            alert('Terjadi kesalahan saat menyimpan data!');
                        }
                    });
                });
            });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
    <!-- Tambahkan SweetAlert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    

    <script>
        $(document).ready(function() {
            // $('.select-multiple').select2({
            //     placeholder: "Pilih Matakuliah",
            //     allowClear: true
            // });
            

            // function initSelect2() {
            //     $(".select2-placeholder-multiple").select2({
            //         placeholder: "Pilih Capaian",
            //         allowClear: true
            //     });
            // }

            // initSelect2(); // Jalankan saat halaman pertama dimuat

            // Jika tabel di-refresh secara AJAX, re-inisialisasi Select2 setelah perubahan
            $(document).on('DOMNodeInserted', function(e) {
                if ($(e.target).hasClass('select2-placeholder-multiple')) {
                    initSelect2();
                }
            });

            // Hitung total SKS saat mikroskill dipilih
            $('.select2-placeholder-multiple').on('change', function() {
                let row = $(this).closest('tr'); // Dapatkan baris terkait
                let totalSKS = 0;
                let selectedOptions = $(this).find('option:selected');
                let lastSelected = selectedOptions.last(); // Opsi terakhir yang dipilih

                selectedOptions.each(function() {
                    totalSKS += parseInt($(this).data('sks')) || 0;
                });

                // Cek jika total SKS melebihi batas
                if (totalSKS > 24) {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Batas SKS Terlampaui!',
                        text: 'Total SKS tidak boleh lebih dari 24!',
                        confirmButtonText: 'OK'
                    });

                    // Hapus opsi terakhir
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
                    // Perbarui input SKS hanya untuk baris ini jika masih di bawah batas
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
    </script>
@endsection
