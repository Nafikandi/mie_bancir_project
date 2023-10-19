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
    <link rel="shortcut icon" href="{{ asset('images/logo-mie-bancir.svg') }}" />
</head>

<body>
    @include('sweetalert::alert')
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth px-0">
                <div class="row w-100 mx-0">
                    <div class="col-lg-4 mx-auto">
                        <div class="auth-form-light py-5 px-4 px-sm-5 text-center">
                            <div class="brand-logo" style="margin-bottom: -5px">
                                <img src="{{ asset('images/logo-mie-bancir.svg') }}" alt="logo">
                            </div>
                            <h4>Selamat Datang!!</h4>
                            <h6 class="font-weight-light">Login terlebih dahulu.</h6>
                            <x-auth-session-status class="mb-4" :status="session('status')" />
                            <form class="pt-3 text-left" action="{{ route('login') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <input type="email" name="email"
                                        class="form-control form-control-lg @error('email')
                                    is-invalid
                                    @enderror"
                                        id="exampleInputEmail1" value="{{ old('email') }}" placeholder="Email">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password"
                                        class="form-control form-control-lg @error('email')
                                    is-invalid
                                    @enderror"
                                        id="exampleInputPassword1" placeholder="Password" value="{{ old('password') }}">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mt-3">
                                    <button type="submit" name="daftar"
                                        class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">Masuk</button>
                                </div>
                                <div class="my-2 d-flex justify-content-between align-items-center">
                                    <div class="form-check">
                                        <label class="form-check-label text-muted">
                                            <input type="checkbox" class="form-check-input">
                                            Tetap Masuk
                                        </label>
                                    </div>
                                    <a href="#" class="auth-link text-black">Lupa Password?</a>
                                </div>
                                <div class="mb-2 border">
                                    {{-- <button type="button" class="btn btn-block btn-facebook auth-form-btn">
                                        <i class="ti-facebook mr-2"></i>Connect using facebook
                                    </button> --}}
                                </div>
                                <div class="text-center mt-4 font-weight-light">
                                    Belum punya akun? <a href="{{ route('register') }}" class="text-primary">Daftar</a>
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
    <script src="{{ asset('vendors/js/off-canvas.js') }}"></script>
    <script src="{{ asset('vendors/js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('vendors/js/template.js') }}"></script>
    <script src="{{ asset('vendors/js/settings.js') }}"></script>
    <script src="{{ asset('vendors/js/todolist.js') }}"></script>
    <!-- endinject -->
</body>

</html>
