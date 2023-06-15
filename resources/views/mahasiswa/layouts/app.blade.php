<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>@yield('title') - Pendaftaran Magang Indsutri Politani</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('logo_politani.png') }}" />

    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Quicksand:400,500,600,700&display=swap'}}" rel="stylesheet">
    <link href="{{ asset('mahasiswa/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('mahasiswa/assets/css/plugins.css')}}" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->

    {{--
    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM STYLES -->
    <link href="{{ asset('mahasiswa/plugins/apex/apexcharts.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ asset('mahasiswa/assets/css/dashboard/dash_2.css')}}" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES --> --}}
    @stack('styles')
</head>

<body class="alt-menu sidebar-noneoverflow">

    <!--  BEGIN NAVBAR  -->
    @include('mahasiswa.layouts.inc.navbar')
    <!--  END NAVBAR  -->

    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container" id="container">

        <div class="overlay"></div>
        <div class="search-overlay"></div>

        <!--  BEGIN TOPBAR  -->
        @include('mahasiswa.layouts.inc.topbar')
        <!--  END TOPBAR  -->

        <!--  BEGIN CONTENT PART  -->
        <div id="content" class="main-content">
            <div class="layout-px-spacing">

                <!-- Content -->
                @yield('content')
                @include('mahasiswa.layouts.inc.footer')

            </div>
        </div>
        <!--  END CONTENT PART  -->

    </div>
    <!-- END MAIN CONTAINER -->

    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="{{ asset('mahasiswa/assets/js/libs/jquery-3.1.1.min.js')}}"></script>
    <script src="{{ asset('mahasiswa/bootstrap/js/popper.min.js')}}"></script>
    <script src="{{ asset('mahasiswa/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('mahasiswa/plugins/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
    <script src="{{ asset('mahasiswa/assets/js/app.js')}}"></script>
    <script>
        $(document).ready(function() {
            App.init();
        });
    </script>
    <script src="{{ asset('mahasiswa/assets/js/custom.js')}}"></script>
    @stack('scripts')
</body>

</html>