<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <div class="">
        <a href="" class="brand-link" style="background: #fff;height: 90px;">
        {{-- <img src="" alt="Logo" class="brand-image" style="opacity: 1;min-height: 75px;">     --}}
        <h2 style="color: black">Apex Realty</h2>
        </a>
    </div>
    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ url('/admin') }}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/admin/users') }}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Users
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>