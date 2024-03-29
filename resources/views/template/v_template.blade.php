
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="keywords" content="Sistem Rekomender">
        <meta name="author" content="muhammad masum">
        <meta name="referrer" content="origin" />
        <meta name="url" content="{{url('')}}" />
        <meta name="_token" content="{{csrf_token()}}" />
        <title>Recommender System</title>
        
        <link rel="stylesheet" href="{{asset('assets/vendors/core/core.css')}}">
        <link rel="stylesheet" href="{{asset('assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/fonts/feather-font/css/iconfont.css')}}">
        <link rel="stylesheet" href="{{asset('assets/vendors/flag-icon-css/css/flag-icon.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/app/style.css')}}">

        <link rel="stylesheet" href="https://gibei.stiesia.ac.id/assets/template/bower_components/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://gibei.stiesia.ac.id/assets/template/bower_components/Ionicons/css/ionicons.min.css">
        <link rel="stylesheet" href="{{asset('assets/vendors/sweetalert2/sweetalert2.min.css')}}">

        {{-- data tables --}}
        <link rel="stylesheet" href="{{asset('assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css')}}">
        <link rel="shortcut icon" href="{{asset('assets/images/favicon.png')}}" />
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        
        <link href="{{asset('assets/css/style.css')}}" rel="stylesheet" type="text/css" />
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

        {{-- mde --}}
        <link rel="stylesheet" href="{{asset('assets/vendors/simplemde/simplemde.min.css')}}">

        <script type="text/javascript">
             var url = $('meta[name="url"]').attr('content');
        </script>
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
        <script src="{{asset('assets/vendors/sweetalert2/sweetalert2.min.js')}}"></script>

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
        
        {{-- tiny mce --}}
        <script src="{{asset('assets/vendors/tinymce/tinymce.min.js')}}"></script>
        <script src="{{asset('assets/js/tinymce.js')}}"></script>

        @stack('script')

        {{-- mde --}}
        <script src="{{asset('assets/vendors/simplemde/simplemde.min.js')}}"></script>
    
    </body>
</html>    