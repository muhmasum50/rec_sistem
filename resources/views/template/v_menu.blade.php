<div class="container">
    <ul class="nav page-navigation">
        <li class="nav-item">
            <a class="nav-link" href="{{url('home')}}">
                <i class="link-icon" data-feather="home"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>

        @if (Auth::user()->role == 'admin')
            <li class="nav-item">
                <a class="nav-link" href="{{url('produk')}}">
                    <i class="link-icon" data-feather="box"></i>
                    <span class="menu-title">Produk</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{url('user')}}">
                    <i class="link-icon" data-feather="users"></i>
                    <span class="menu-title">Pengguna</span>
                </a>
            </li>
        @elseif(Auth::user()->role == 'admin' || Auth::user()->role == 'user')
        <li class="nav-item">
            <a class="nav-link" href="{{url('rate')}}">
                <i class="link-icon" data-feather="star"></i>
                <span class="menu-title">Rate Produk</span>
            </a>
        </li>
        @endif
        {{-- <li class="nav-item">
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
        </li> --}}
    </ul>
</div>