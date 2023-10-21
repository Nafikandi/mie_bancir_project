@extends('layouts.adminapp')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-6 grid-margin stretch-card">
                    <div class="card tale-bg">
                        <div class="card-people mt-auto">
                            <img src="{{ asset('images/logo-mie-bancir.svg') }}" alt="people">
                            <div class="weather-info">
                                <div class="d-flex">
                                    <div>
                                        <h2 class="mb-0 font-weight-normal"><i class="icon-sun mr-2"></i>31<sup>C</sup></h2>
                                    </div>
                                    <div class="ml-2">
                                        <h4 class="location font-weight-normal">Banjarmasin</h4>
                                        <h6 class="font-weight-normal">Kalimantan Selatan</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 grid-margin transparent">
                    <div class="row">
                        <div class="col-md-6 mb-4 stretch-card transparent">
                            <div class="card card-tale">
                                <div class="card-body">
                                    <p class="mb-4">Jumlah Menu</p>
                                    <p class="fs-30 mb-2">50</p>
                                    {{-- <p>10.00% (30 days)</p> --}}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4 stretch-card transparent">
                            <div class="card card-dark-blue">
                                <div class="card-body">
                                    <p class="mb-4">Total Transaksi</p>
                                    <p class="fs-30 mb-2">240</p>
                                    {{-- <p>22.00% (30 days)</p> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-4 mb-lg-0 stretch-card transparent">
                            <div class="card card-light-blue">
                                <div class="card-body">
                                    <p class="mb-4">Total Pembelian</p>
                                    <p class="fs-30 mb-2">220</p>
                                    {{-- <p>2.00% (30 days)</p> --}}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 stretch-card transparent">
                            <div class="card card-light-danger">
                                <div class="card-body">
                                    <p class="mb-4">Jumlah User</p>
                                    <p class="fs-30 mb-2">40</p>
                                    {{-- <p>0.22% (30 days)</p> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <p class="card-title">Order Detail</p>
                            <div class="row">
                                <div class="col-12">
                                    <div class="table-responsive">
                                        <table id="example" class="display expandable-table" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>#No</th>
                                                    <th>Order Id</th>
                                                    <th>Menu</th>
                                                    <th>Waktu Pesanan</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td>Mior-099022</td>
                                                    <td>Mie Bancir Sosis</td>
                                                    <td>10-09-2023 10:15 Wita</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
            <div class="row">
                <div class="col-md-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <p class="card-title mb-0">Menu Terlaris</p>
                            <div class="table-responsive">
                                <table class="table table-striped table-borderless">
                                    <thead>
                                        <tr>
                                            <th>Menu</th>
                                            <th>Pembelian</th>
                                            <th>Terjual</th>
                                        </tr>
                                    </thead>
                                    <tr>
                                        <td>Mie Bancir Ayam Sosis</td>
                                        <td>50 Porsi</td>
                                        <td class="font-weight-bold">Rp. 350000</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer text-center">
            <span class="text-muted text-sm-left d-block d-sm-inline-block">Created by <a href="#">Nafik
                    andi</a></span>
        </footer>
        <!-- partial -->
    </div>
@endsection
