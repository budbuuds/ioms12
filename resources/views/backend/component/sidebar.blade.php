<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="#" class="brand-link" style="text-align: center; height: 48px;">
        <!-- <img src="{{asset('lte/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> -->
            <span class="brand-text font-weight-light">
                <h3>IOMS OR 12</h3>
            </span>
    </a>
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('lte/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
            <a href="#" class="d-block">Muhammad Topan</a>
            <a href="#" class="d-block">A10-013</a>
            </div>
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <li class="nav-item">
                    <a href="#" class="nav-link {{ $active == '' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('news')}}" class="nav-link {{ $active == 'news' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-mug-hot"></i>
                        <p>
                            News
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
