@extends('layouts.adminapp')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-12 grid-margin">
                    <div class="row">
                        <div class="col-12 col-xl-8 mb-xl-0">
                            <div class="breadcrumb" style="border:none">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Beranda</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Menu</li>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" style="margin-top: -30px">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="wrap-flex d-flex justify-content-between mb-2">
                                <div class="text">
                                    <h4 class="card-title">Semua Menu</h4>
                                </div>
                                <div class="btn-create">
                                    <a href="{{ route('menu.create') }}" class="btn btn-primary btn-sm">
                                        <div class="d-flex">
                                            <div class="icon">
                                                <i class="mdi mdi-plus-circle-outline"></i>
                                            </div>
                                            <div class="textbtn" style="margin-top: 3px;margin-left:5px">
                                                Tambah Menu
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-hover" id="menus">
                                    <thead>
                                        <tr>
                                            <th>#No</th>
                                            <th>Kode Menu</th>
                                            <th>Foto</th>
                                            <th>Nama Menu</th>
                                            <th>Status</th>
                                            <th>Harga</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($menu as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->kd_menu }}</td>
                                                <td><img src="{{ url($item->photo) }}" alt="foto_menu">
                                                </td>
                                                <td>{{ $item->name_menu }}</td>
                                                <td>
                                                    @if ($item->status_menu == 'tersedia')
                                                        <div class="badge badge-outline-warning badge-sm">
                                                            {{ $item->status_menu }}
                                                        </div>
                                                    @elseif ($item->status_menu == 'habis')
                                                        <div class="badge badge-outline-danger badge-sm">
                                                            {{ $item->status_menu }}
                                                        </div>
                                                    @endif
                                                </td>
                                                <td>{{ $item->price_menu }}</td>
                                                <td>
                                                    <a href="{{ route('menu.edit', $item->kd_menu) }}"
                                                        class="btn btn-success btn-sm text-white">
                                                        Edit
                                                    </a>
                                                    <a href="{{ route('menu.show', $item->kd_menu) }}"
                                                        class="btn btn-secondary btn-sm text-white">
                                                        Lihat
                                                    </a>

                                                    <a class="btn btn-danger btn-sm text-white"
                                                        href="{{ route('menu.destroy', $item->kd_menu) }}"
                                                        data-confirm-delete="true">Delete</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
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
        $(document).ready(function() {
            $('#menus').DataTable({
                "searching": true,
                "paging": true,
                "info": true,
                "lengthChange": true

            });
        });
    </script>
@endpush
