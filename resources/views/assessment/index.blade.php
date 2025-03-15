@extends('inc.main')
@section('title', 'Penliaian MBKM')
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
                {{-- <x-panel.tool-bar>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#uploaddata">
                        <i class="fa fa-plus"></i> Tambah Data Penilaian
                    </button>
                </x-panel.tool-bar> --}}

                {{-- <!-- Modal Tambah Data -->
            <div class="modal fade" id="uploaddata" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Tambah Hasil Penilaian</h5>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('mikroskil.store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="id_mahasiswa">Mahasiswa</label>
                                    <select class="form-control select2" name="id_mahasiswa" required>
                                        <option value="" disabled selected>Pilih Mahasiswa</option>
                                        @foreach ($mahasiswa as $mhs)
                                            <option value="{{ $mhs->id }}">{{ $mhs->nim }} - {{ $mhs->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="id_cpl">Penilaian (CPL)</label>
                                    <select class="form-control select2" name="id_cpl" required>
                                        <option value="" disabled selected>Pilih CPL</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Jumlah SKS</label>
                                    <input type="number" name="sks" class="form-control" min="1" max="10" required>
                                </div>

                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div> --}}
            </x-slot>

            <!-- Tabel Data -->
            @can('lihat-assessment')
                <div class="table-responsive">
                    <table id="dt-mahasiswa" class="table table-bordered">
                        <thead class="bg-primary text-white">
                            <tr>
                                <th>NIM</th>
                                <th>Nama</th>
                                <th>Hasil Capaian</th>
                                <th>Jumlah SKS</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($reports as $report)
                                <tr>
                                    <td>{{ $report->mahasiswa->nim ?? 'Data tidak tersedia' }}</td>
                                    <td>{{ $report->user->name }}</td>
                                    <td>
                                        <select name="mikroskills[{{ $report->id }}][]"
                                            class="select2-placeholder-multiple form-control select-product editable"
                                            multiple="multiple">
                                            @foreach ($mikroskill as $component)
                                                <option value="{{ $component->id }}" data-sks="{{ $component->sks }}"
                                                    data-id="{{ $component->id }}" data-column="mikroskills"
                                                    @if (in_array($component->name, $reportMikroskill[$report->id] ?? [])) selected @endif>
                                                    {{ $component->name }} ({{ $component->sks }} SKS)
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('mikroskills')
                                            <small class="text-danger help-block">{{ $message }}</small>
                                        @enderror

                                    </td>
                                    <td><input type="number" class="form-control editable total-sks" min="1"
                                            max="10" data-id="{{ $report->id }}" value="{{ $report->nilai }}"
                                            data-column="sks" readonly>
                                    </td>
                                    <td>
                                        <button class="btn btn-primary submit-assessment" data-id="{{ $report->id }}">Simpan
                                            Penilaian</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
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
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
    <!-- Tambahkan SweetAlert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(document).ready(function() {
            $('.select-multiple').select2({
                placeholder: "Pilih Capaian",
                allowClear: true
            });
            // Inisialisasi Select2
            // $(".select2-placeholder-multiple").select2({
            //     placeholder: "Pilih Capaian",
            //     allowClear: true
            // });

            function initSelect2() {
                $(".select2-placeholder-multiple").select2({
                    placeholder: "Pilih Capaian",
                    allowClear: true
                });
            }

            initSelect2(); // Jalankan saat halaman pertama dimuat

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
