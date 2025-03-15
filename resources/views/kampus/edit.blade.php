@extends('inc.main')
@section('title', 'Kampus')
@section('pages-css')
    <link rel="stylesheet" media="screen, print" href="/admin/css/formplugins/bootstrap-datepicker/bootstrap-datepicker.css">
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
            'category_1' => 'Master',
        ])
        <div class="subheader">
            @component('inc._page_heading', [
                'icon' => 'building',
                'heading1' => 'Kampus',
                'heading2' => 'MBKM',
            ])
            @endcomponent
        </div>
        <form action="{{ route('kampus.update', $kampus->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <x-panel.show title="Edit" subtitle="Kampus">
                <x-slot name="paneltoolbar">
                    <x-panel.tool-bar class="ml-2">
                        <button class="btn btn-toolbar-master" type="button" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            <i class="fal fa-ellipsis-v"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-animated dropdown-menu-right">
                            <a class="dropdown-item" href="{{ route('kampus.index') }}">Kembali</a>

                        </div>
                    </x-panel.tool-bar>
                </x-slot>
                <div class="form-group">
                    <label for="name">Nama</label>
                    <input type="text" name="name" id="name" class="form-control"
                        value="{{ old('name', $kampus->name) }}">
                    @error('name')
                        <span class="text-danger help-block">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="address">Alamat Kampus</label>
                    <input type="text" name="address" id="address" class="form-control"
                        value="{{ old('address', $kampus->address) }}"
                        placeholder="Jl. Jendral Sudirman KM 03, Cilegon 42435">
                    @error('address')
                        <span class="text-danger help-block">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="phone">Telepon</label>
                    <input type="text" name="phone" id="phone" class="form-control"
                        value="{{ old('phone', $kampus->phone) }}" placeholder="(0254) 395502, 376712">
                    @error('phone')
                        <span class="text-danger help-block">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="fax">Fax</label>
                    <input type="text" name="fax" id="fax" class="form-control"
                        value="{{ old('fax', $kampus->fax) }}" placeholder="(0254) 395440, 376712">
                    @error('fax')
                        <span class="text-danger help-block">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="website">Website</label>
                    <input type="text" name="website" id="website" class="form-control"
                        value="{{ old('website', $kampus->website) }}">
                    @error('website')
                        <span class="text-danger help-block">{{ $message }}</span>
                    @enderror
                </div>
                <label for="kampuslogo">Logo Kampus</label>
                <div class="form-group">
                    <label for="image" class="position-relative d-inline-block">
                        <img id="profileImage"
                            src="{{ $kampus->image ? asset('storage/kampus/' . $kampus->image) : asset('admin/img/users/user.jpg') }}"
                            class="rounded-circle shadow img-thumbnail" style="width: 120px; height: 120px;">
                        <span class="position-absolute" style="bottom: 5px; right: 5px;">
                            <i class="fas fa-camera text-primary" style="font-size: 20px;"></i>
                        </span>
                    </label>
                    <input type="file" id="image" name="image" class="d-none" accept="image/*"
                        onchange="previewImage(event)">
                    @error('image')
                        <span class="text-danger help-block">{{ $message }}</span>
                    @enderror
                </div>
                <x-slot name="panelcontentfoot">
                    <x-button type="submit" color="primary" :label="__('Save')" class="ml-auto" />
                </x-slot>
            </x-panel.show>
        </form>
    </main>
@endsection
@section('pages-script')
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
@endsection
