@extends('inc.main')
@section('title', 'Report')
@section('pages-css')
    <link rel="stylesheet" media="screen, print" href="/admin/css/fa-solid.css">
    <link rel="stylesheet" media="screen, print" href="/admin/css/theme-demo.css">
    <link rel="stylesheet" media="screen, print" href="/admin/css/notifications/toastr/toastr.css">
    <link rel="stylesheet" media="screen, print" href="/admin/css/datagrid/datatables/datatables.bundle.css">
    <!-- Dropify & Animasi Upload -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropify/0.2.2/css/dropify.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropify/0.2.2/js/dropify.min.js"></script>
@endsection
@section('pages-content')
    <main id="js-page-content" role="main" class="page-content">
        @include('inc._page_breadcrumb', [
            'category_1' => 'Master',
        ])
        <div class="subheader">
            @component('inc._page_heading', [
                'icon' => 'graduation-cap',
                'heading1' => 'Laporan Akhir',
                'heading2' => 'MBKM',
            ])
            @endcomponent
        </div>
        <x-panel.show title="Daftar" subtitle="Laporan Akhir">
            <table id="dt-basic-example" class="table table-bordered table-hover table-striped w-100">
                <thead class="bg-warning text-white">
                    <tr>
                        <th>NIM</th>
                        <th>Nama Mahasiswa</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($report as $item)
                        <tr onclick="window.location='{{ route('report.indexMahasiswa', $item->user_id) }}';" style="cursor: pointer;">
                            <td>{{ $item->user->mahasiswa->nim ?? '-' }}</td> <!-- NIM -->
                            <td>{{ $item->user->name ?? '-' }}</td> <!-- Nama Mahasiswa -->
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </x-panel.show>
    </main>
@endsection

@section('pages-script')
    <script src="/admin/js/datagrid/datatables/datatables.bundle.js"></script>
    <script>
        /* demo scripts for change table color */
        /* change background */
        $(document).ready(function() {
            $('#dt-basic-example').dataTable({
                responsive: true,
                searching: true,
            });

            // $('.js-thead-colors a').on('click', function() {
            //     var theadColor = $(this).attr("data-bg");
            //     console.log(theadColor);
            //     $('#dt-basic-example thead').removeClassPrefix('bg-').addClass(theadColor);
            // });

            $('.js-tbody-colors a').on('click', function() {
                var theadColor = $(this).attr("data-bg");
                console.log(theadColor);
                $('#dt-basic-example').removeClassPrefix('bg-').addClass(theadColor);
            });
        });
    </script>
@endsection
