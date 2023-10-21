<!DOCTYPE html>
<html lang="en">

<head>
    @stack('before-css')
    @include('include.adminstyle')
    @stack('after-css')

</head>

<body>
    @include('sweetalert::alert')
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        <x-navbar></x-navbar>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_settings-panel.html -->
            <x-settings></x-settings>

            <!-- partial -->
            <!-- partial:partials/_sidebar.html -->
            <x-sidebar></x-sidebar>
            <!-- partial -->
            @yield('content')
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->

    {{-- script --}}
    @stack('before-main')
    @include('include.adminmain')
    @stack('after-main')
    {{-- endscript --}}
</body>

</html>
