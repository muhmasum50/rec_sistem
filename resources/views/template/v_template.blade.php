
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Recommender System</title>
        
        <link rel="stylesheet" href="{{asset('assets/vendors/core/core.css')}}">
        <link rel="stylesheet" href="{{asset('assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/fonts/feather-font/css/iconfont.css')}}">
        <link rel="stylesheet" href="{{asset('assets/vendors/flag-icon-css/css/flag-icon.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/app/style.css')}}">

        {{-- data tables --}}
        <link rel="stylesheet" href="{{asset('assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css')}}">
        <link rel="shortcut icon" href="{{asset('assets/images/favicon.png')}}" />
    </head>
    <body>
        <div class="main-wrapper">

            <div class="horizontal-menu">
                <nav class="navbar top-navbar">
                    <div class="container">
                        @include('template.v_navbar')
                    </div>
                </nav>
                <nav class="bottom-navbar">
                    @include('template.v_menu')
                </nav>
            </div>  
        
            <div class="page-wrapper">
                <div class="page-content">
                    @yield('breadcrumb')


                    @yield('content')

                </div>

                <!-- partial:partials/_footer.html -->
                <footer class="footer d-flex flex-column flex-md-row align-items-center justify-content-between">
                    <p class="text-muted text-center text-md-left">Copyright © 2020, Created by <a href="http://instagram.com/auldeyy61" target="_blank"> Trio Kadal</a>. All rights reserved</p>
                    <p class="text-muted text-center text-md-left mb-0 d-none d-md-block">Made with <i class="mb-1 text-primary ml-1 icon-small" data-feather="heart"></i></p>
                </footer>
                <!-- partial -->
            
            </div>
        </div>

        <script src="{{asset('assets/vendors/core/core.js')}}"></script>

        <script src="{{asset('assets/vendors/chartjs/Chart.min.js')}}"></script>
        <script src="{{asset('assets/vendors/jquery.flot/jquery.flot.js')}}"></script>
        <script src="{{asset('assets/vendors/jquery.flot/jquery.flot.resize.js')}}"></script>
        <script src="{{asset('assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
        <script src="{{asset('assets/vendors/apexcharts/apexcharts.min.js')}}"></script>
        <script src="{{asset('assets/vendors/progressbar.js/progressbar.min.js')}}"></script>
        
        <script src="{{asset('assets/vendors/feather-icons/feather.min.js')}}"></script>
        <script src="{{asset('assets/js/template.js')}}"></script>
        <script src="{{asset('assets/js/dashboard.js')}}"></script>
        <script src="{{asset('assets/js/datepicker.js')}}"></script>

        {{-- script --}}
        <script src="{{asset('assets/vendors/datatables.net/jquery.dataTables.js')}}"></script>
        <script src="{{asset('assets/vendors/datatables.net-bs4/dataTables.bootstrap4.js')}}"></script>
        <script src="{{asset('assets/js/data-table.js')}}"></script>
        @stack('script')
    
    </body>
</html>    