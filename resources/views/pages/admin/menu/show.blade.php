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
                            <h4 class="card-title">Edit Menu</h4>
                            <div class="table-responsive">
                                <table class="table-borderless">
                                    <tr>
                                    <tr>
                                        <th>
                                            {{-- <img src="{{ url($menu->photo) }}" alt="" style="width:100px"> --}}
                                        </th>
                                        <td>

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
