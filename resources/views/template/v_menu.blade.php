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
        @endif
        <li class="nav-item">
            <a class="nav-link" href="{{url('rate')}}">
                <i class="link-icon" data-feather="star"></i>
                <span class="menu-title">Rate Produk</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{url('rekomendasiproduk')}}">
                <i class="link-icon" data-feather="star"></i>
                <span class="menu-title">Rekomendasi Produk</span>
            </a>
        </li>
    </ul>
</div>