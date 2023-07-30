<body id="loading-asset" data-asset_url="{{ asset('img/svg_animated/loading.svg') }}" class="sidebar-mini ">

    <div id="app">
        <div class="main-wrapper">
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar">
                <form class="form-inline mr-auto" method="POST" action="{{ URL::to('ubah_role') }}">
                    @csrf
                    <ul class="navbar-nav mr-3">
                        <li><a href="#" data-toggle="sidebar"
                                class="nav-link nav-link-lg collapse-trigger-button text-main"><i
                                    class="fas fa-bars"></i></a>
                        </li>
                        <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i
                                    class="fas fa-search"></i></a></li>
                    </ul>
                    <div class="search-element">

                    </div>
                </form>
                <ul class="navbar-nav navbar-right">

                    <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown"
                            class="nav-link notification-toggle nav-link-lg beep text-main"><i
                                class="far fa-bell"></i></a>
                        <div class="dropdown-menu dropdown-list dropdown-menu-right">
                            <div class="dropdown-header">Berita terbaru
                                <div class="float-right">
                                    <a href="#">Mark All As Read</a>
                                </div>
                            </div>
                            <div class="dropdown-list-content dropdown-list-icons">
                                <a href="#" class="dropdown-item dropdown-item-unread">
                                    <div class="dropdown-item-icon bg-primary text-white">
                                        1
                                    </div>
                                    <div class="dropdown-item-desc">
                                        There is nothing to see here
                                        <div class="time text-primary">Asap</div>
                                    </div>
                                </a>

                            </div>
                            <div class="dropdown-footer text-center">
                                <a href="#">View All <i class="fas fa-chevron-right"></i></a>
                            </div>
                        </div>
                    </li>
                    <li class="dropdown"><a href="#" data-toggle="dropdown"
                            class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                            <img src="{{ auth()->user()->foto == '' ? asset('stisla/assets/img/avatar/avatar-1.png') : asset('data/foto_profile/' . auth()->user()->foto . '/' . auth()->user()->foto) }}"
                                alt="" class="rounded-circle-profile mb-2" width="100">
                            <div class="d-sm-none d-lg-inline-block text-secondary">{{ auth()->user()->name }}</div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <div class="dropdown-title">{{ auth()->user()->role }}</div>
                            <a href="{{ URL::to('/profile') }}" class="dropdown-item has-icon">
                                <i class="far fa-user"></i> Profile
                            </a>

                            <div class="dropdown-divider"></div>
                            <a href="{{ URL::to('/logout') }}" class="dropdown-item has-icon text-danger">
                                <i class="fas fa-sign-out-alt"></i> Logout
                            </a>
                        </div>
                    </li>
                </ul>
            </nav>
