
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
    <link rel="shortcut icon" href="{{asset('assets/images/favicon.png')}}" />
    </head>
    <body>
        <div class="main-wrapper">

            <div class="horizontal-menu">
                <nav class="navbar top-navbar">
                    <div class="container">
                        <div class="navbar-content">
                            <a href="#" class="navbar-brand">
                                Recommender<span> System</span>
                            </a>
                            <ul class="navbar-nav">                    
                                <li class="nav-item dropdown nav-notifications">
                                    <a class="nav-link dropdown-toggle" href="#" id="notificationDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i data-feather="bell"></i>
                                        <div class="indicator">
                                            <div class="circle"></div>
                                        </div>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="notificationDropdown">
                                        <div class="dropdown-header d-flex align-items-center justify-content-between">
                                            <p class="mb-0 font-weight-medium">6 New Notifications</p>
                                            <a href="javascript:;" class="text-muted">Clear all</a>
                                        </div>
                                        <div class="dropdown-body">
                                            <a href="javascript:;" class="dropdown-item">
                                                <div class="icon">
                                                    <i data-feather="user-plus"></i>
                                                </div>
                                                <div class="content">
                                                    <p>New customer registered</p>
                                                    <p class="sub-text text-muted">2 sec ago</p>
                                                </div>
                                            </a>
                                            <a href="javascript:;" class="dropdown-item">
                                                <div class="icon">
                                                    <i data-feather="gift"></i>
                                                </div>
                                                <div class="content">
                                                    <p>New Order Recieved</p>
                                                    <p class="sub-text text-muted">30 min ago</p>
                                                </div>
                                            </a>
                                            <a href="javascript:;" class="dropdown-item">
                                                <div class="icon">
                                                    <i data-feather="alert-circle"></i>
                                                </div>
                                                <div class="content">
                                                    <p>Server Limit Reached!</p>
                                                    <p class="sub-text text-muted">1 hrs ago</p>
                                                </div>
                                            </a>
                                            <a href="javascript:;" class="dropdown-item">
                                                <div class="icon">
                                                    <i data-feather="layers"></i>
                                                </div>
                                                <div class="content">
                                                    <p>Apps are ready for update</p>
                                                    <p class="sub-text text-muted">5 hrs ago</p>
                                                </div>
                                            </a>
                                            <a href="javascript:;" class="dropdown-item">
                                                <div class="icon">
                                                    <i data-feather="download"></i>
                                                </div>
                                                <div class="content">
                                                    <p>Download completed</p>
                                                    <p class="sub-text text-muted">6 hrs ago</p>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="dropdown-footer d-flex align-items-center justify-content-center">
                                            <a href="javascript:;">View all</a>
                                        </div>
                                    </div>
                                </li>
                                <li class="nav-item dropdown nav-profile">
                                    <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        @if (Auth::user()->avatar == null)
                                            <img src="{{ 'https://ui-avatars.com/api/?name='.Auth::user()->name.'&color=727cf5&background=EBF4FF' }}" alt="">
                                        @else
                                            <img src="{{Auth::user()->avatar}}" alt="">
                                        @endif
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="profileDropdown">
                                        <div class="dropdown-header d-flex flex-column align-items-center">
                                            <div class="figure mb-3">
                                                @if (Auth::user()->avatar == null)
                                                    <img src="{{ 'https://ui-avatars.com/api/?name='.Auth::user()->name.'&color=727cf5&background=EBF4FF' }}" alt="">
                                                @else
                                                    <img src="{{Auth::user()->avatar}}" alt="">
                                                @endif
                                            </div>
                                            <div class="info text-center">
                                                <p class="name font-weight-bold mb-0">{{Auth::user()->name}}</p>
                                                <p class="name mb-0" style="font-size:14px">Sebagai {{Auth::user()->role == 'user' ? 'Pengguna' : 'Administrator'}}</p>
                                                <p class="email text-muted mb-3">{{Auth::user()->email}}</p>
                                            </div>
                                        </div>
                                        <div class="dropdown-body">
                                            <ul class="profile-nav p-0 pt-3">
                                                <li class="nav-item">
                                                    <a href="pages/general/profile.html" class="nav-link">
                                                        <i data-feather="user"></i>
                                                        <span>Profile</span>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="{{url('logout')}}" class="nav-link">
                                                        <i data-feather="log-out"></i>
                                                        <span>Log Out</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="horizontal-menu-toggle">
                                <i data-feather="menu"></i>					
                            </button>
                        </div>
                    </div>
                </nav>
                <nav class="bottom-navbar">
                    <div class="container">
                        <ul class="nav page-navigation">
                            <li class="nav-item active">
                                <a class="nav-link" href="#">
                                    <i class="link-icon" data-feather="home"></i>
                                    <span class="menu-title">Dashboard</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    <i class="link-icon" data-feather="box"></i>
                                    <span class="menu-title">Barang</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    <i class="link-icon" data-feather="star"></i>
                                    <span class="menu-title">Rating Barang</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    <i class="link-icon" data-feather="users"></i>
                                    <span class="menu-title">Pengguna</span>
                                </a>
                            </li>
                            
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="link-icon" data-feather="mail"></i>
                                    <span class="menu-title">Apps</span>
                                    <i class="link-arrow"></i>
                                </a>
                                <div class="submenu">
                                    <ul class="submenu-item">
                                        <li class="category-heading">Email</li>
                                        <li class="nav-item"><a class="nav-link" href="pages/email/inbox.html">Inbox</a></li>
                                        <li class="nav-item"><a class="nav-link" href="pages/email/read.html">Read</a></li>
                                        <li class="nav-item"><a class="nav-link" href="pages/email/compose.html">Compose</a></li>
                                        <li class="category-heading">Other<li>
                                        <li class="nav-item"><a class="nav-link" href="pages/apps/chat.html">Chat</a></li>
                                        <li class="nav-item"><a class="nav-link" href="pages/apps/calendar.html">Calendar</a></li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>  
        
            <div class="page-wrapper">
                <div class="page-content">
                    @yield('breadcrumb')


                    @yield('content')

                </div>

                <!-- partial:partials/_footer.html -->
                <footer class="footer d-flex flex-column flex-md-row align-items-center justify-content-between">
                    <p class="text-muted text-center text-md-left">Copyright © 2020 <a href="https://www.nobleui.com" target="_blank">NobleUI</a>. All rights reserved</p>
                    <p class="text-muted text-center text-md-left mb-0 d-none d-md-block">Handcrafted With <i class="mb-1 text-primary ml-1 icon-small" data-feather="heart"></i></p>
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
    </body>
</html>    