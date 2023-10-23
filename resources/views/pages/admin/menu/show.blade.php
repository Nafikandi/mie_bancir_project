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
                                <li class="breadcrumb-item active" aria-current="page">Detail Menu</li>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center" style="margin-top: -30px">
                <div class="col-md-8 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div class="titletext">
                                    <h4 class="card-title">Edit Menu</h4>
                                </div>
                                <div class="btnback">
                                    <a href="{{ route('menu.index') }}">
                                        <i class="mdi mdi-arrow-left-bold-circle" style="font-size: 30px"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table-borderless">
                                    <tr>
                                    <tr>
                                        <td>
                                            <small>Ketersediaan :</small>
                                            @if ($menu->status_menu == 'tersedia')
                                                <small class="badge badge-outline-warning badge-sm">
                                                    {{ $menu->status_menu }}</small>
                                            @elseif($menu->status_menu == 'habis')
                                                <small class="badge badge-outline-danger badge-sm">
                                                    {{ $menu->status_menu }}</small>
                                            @endif
                                        </td>
                                        <td style="font-size: 12px">
                                            @if ($menu->category_menu == 1)
                                                <span>Makanan Besar</span>
                                            @elseif($menu->category_menu == 2)
                                                <span>Minuman</span>
                                            @elseif($menu->category_menu == 3)
                                                <span>Makanan Ringan</span>
                                            @endif
                                        <td>
                                            <span style="font-size: 13px">Kode Menu : {{ $menu->kd_menu }}</span>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p style="font-size: 18px">{{ $menu->name_menu }}</p>
                                            <small>Harga : Rp {{ number_format($menu->price_menu, 0) }}</small>
                                        </td>
                                        <td colspan="2">
                                            <img src="{{ url($menu->photo) }}" alt="" style="width:150px">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <small>Deskripsi Menu :</small><br>
                                            <p class="font-size:18px">
                                                {{ strip_tags(html_entity_decode($menu->description_menu)) }}</p>
                                        </td>
                                    </tr>
                                    </tr>
                                </table>
                            </div>
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
