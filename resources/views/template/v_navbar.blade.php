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
                            <a href="#" class="nav-link">
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