<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title> MIE BANCIR SASIRINGAN KHAS BANJARMASIN </title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('vendors/feather/feather.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/ti-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/css/vendor.bundle.base.css') }}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('css/vertical-layout-light/style.css') }}">
    <!-- endinject -->
</head>

<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth px-0">
                <div class="row w-100 mx-0">
                    <div class="col-lg-4 mx-auto">
                        <div class="auth-form-light py-5 px-4 px-sm-5 text-center">
                            <div class="brand-logo" style="margin-bottom: -5px">
                                <img src="{{ asset('images/logo-mie-bancir.svg') }}" alt="logo">
                            </div>
                            <h4>Anda Pegawai?</h4>
                            <h6 class="font-weight-light">Silahkan daftar untuk bisa menerima pesanan</h6>
                            <form class="pt-3 text-left" action="{{ route('admin.registore') }}" method="POST">
                                @csrf
                                <input type="hidden" name="role_id" value="1">
                                <div class="form-group">
                                    <input type="text"
                                        class="form-control form-control-lg @error('name') is-invalid
                                    @enderror"
                                        id="exampleInputUsername1" name="name" placeholder="Nama Pegawai"
                                        value="{{ old('name') }}">
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="email"
                                        class="form-control form-control-lg @error('email') is-invalid
                                    @enderror"
                                        id="exampleInputEmail1" placeholder="Masukan Email" value="{{ old('email') }}"
                                        name="email">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="number"
                                        class="form-control form-control-lg @error('number_phone') is-invalid
                                    @enderror"
                                        id="exampleInputnumber_phone1" placeholder="Masukan Nomor Handphone"
                                        value="{{ old('number_phone') }}" name="number_phone">
                                    @error('number_phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="password"
                                        class="form-control form-control-lg @error('password') is-invalid
                                    @enderror"
                                        id="exampleInputPassword1" name="password" value="{{ old('password') }}"
                                        placeholder="Password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="password"
                                        class="form-control form-control-lg @error('password_confirmation') is-invalid
                                    @enderror"
                                        id="password" name="password_confirmation"
                                        value="{{ old('password_confirmation') }}" placeholder="Konfirmasi Password">
                                    @error('password_confirmation')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mt-3">
                                    <button type="submit" name="daftar"
                                        class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">Daftar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="{{ asset('vendors/js/vendor.bundle.base.js') }}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{ asset('vendors/js/template.js') }}"></script>
    <!-- endinject -->
</body>

</html>
