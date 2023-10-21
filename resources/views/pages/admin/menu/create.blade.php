@extends('layouts.adminapp')

@push('after-css')
    <style>
        .ck-editor__editable_inline {
            min-height: 100px;
        }
    </style>
@endpush

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-12 grid-margin">
                    <div class="row">
                        <div class="col-12 col-xl-8 mb-xl-0">
                            <div class="breadcrumb" style="border:none">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Beranda</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('menu.index') }}">Menu</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Tambah Menu</li>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center" style="margin-top: -30px">
                <div class="col-md-8 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Tambah Menu</h4>
                            <form class="forms-create" method="POST" action="{{ route('menu.store') }}"
                                enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="status_menu" value="tersedia">
                                <div class="form-group">
                                    <label for="name_menu">Nama Menu</label>
                                    <input type="text"
                                        class="form-control @error('name_menu') is-invalid
                                    @enderror"
                                        id="name_menu" name="name_menu" value="{{ old('name_menu') }}"
                                        placeholder="Nama Menu">

                                    @error('name_menu')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="category_menu">Kategori Menu</label>
                                            <select name="category_menu" id="category_menu"
                                                class="form-control @error('category_menu')
                                            is-invalid
                                            @enderror">
                                                <option selected disabled>-- Pilih Menu --</option>
                                                @foreach ($category as $item)
                                                    <option value="{{ $item->id }}">
                                                        @if ($item->name_category == 'MB')
                                                            Makanan Besar
                                                        @elseif ($item->name_category == 'M')
                                                            Minuman
                                                        @elseif ($item->name_category == 'MR')
                                                            Makanan Ringan
                                                        @endif
                                                    </option>
                                                @endforeach

                                                @error('category_menu')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="price_menu">Harga Menu</label>
                                            <input type="number" value="{{ old('price_menu') }}"
                                                class="form-control @error('price_menu') is-invalid
                                    @enderror"
                                                id="price_menu" name="price_menu" placeholder="Harga Menu">
                                        </div>
                                        @error('price_menu')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Upload Foto Menu</label>
                                    <input type="file" name="photo" accept="image/jpeg"
                                        class="file-upload-default @error('photo')
                                    is-invalid
                                    @enderror">
                                    <div class="input-group col-xs-12">
                                        <input type="text" class="form-control file-upload-info" disabled=""
                                            placeholder="Upload Image">
                                        <span class="input-group-append">
                                            <button class="file-upload-browse btn btn-primary"
                                                type="button">Upload</button>
                                        </span>
                                    </div>
                                    @error('photo')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="descripted_menu">Deskripsi Menu</label>
                                    <textarea class="form-control @error('descripted_menu') is-invalid
                                    @enderror"
                                        id="descripted_menu" name="descripted_menu" rows="4"></textarea>

                                    @error('descripted_menu')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div>
                                <button type="submit" class="btn btn-primary mr-2">Buat</button>
                                {{-- <button class="btn btn-light">Cancel</button> --}}
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

@push('after-main')
    <script>
        ClassicEditor
            .create(document.querySelector('#descripted_menu'))
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });
    </script>
@endpush
