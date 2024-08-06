<nav class="sidebar-wrapper">
    <div class="sidebar-brand">
        <a href="{{ url('/') }}" class="logo">
            <img src="/assets/images/logo.svg" alt="Admin Dashboards" />
        </a>
    </div>
    <div class="sidebar-menu">
        <div class="sidebarMenuScroll">
            <ul>
                <li class="sidebar-dropdown active">
                    <a href="{{ route('admin.index') }}">
                        <i class="bi bi-house"></i>
                        <span class="menu-text">Dashboards</span>
                    </a>
                </li>
                <li class="sidebar-dropdown">
                    <a href="#">
                        <i class="bi bi-handbag"></i>
                        <span class="menu-text">Quản lý Loại Tin</span>
                    </a>
                    <div class="sidebar-submenu">
                        <ul>
                            <li><a href="{{ route('category.index') }}">Danh Sách Loại Tin</a></li>
                            <li><a href="{{ route('category.create') }}">Thêm Mới Loại Tin</a></li>
                        </ul>
                    </div>
                </li>
                <li class="sidebar-dropdown">
                    <a href="#">
                        <i class="bi bi-folder"></i>
                        <span class="menu-text">Quản Lý Bài Viết</span>
                    </a>
                    <div class="sidebar-submenu">
                        <ul>
                            <li><a href="{{ route('product.index') }}">Danh Sách Tin</a></li>
                            <li><a href="{{ route('product.create') }}">Thêm Mới Tin</a></li>
                        </ul>
                    </div>
                </li>
                <li class="sidebar-dropdown">
                    <a href="#">
                        <i class="bi bi-globe"></i>
                        <span class="menu-text">Vai Trò</span>
                    </a>
                    <div class="sidebar-submenu">
                        <ul>
                            <li><a href="{{ route('roleUs.index') }}">Danh sách Vai Trò</a></li>
                            <li><a href="{{ route('roleUs.create') }}">Thêm mới Vai Trò</a></li>
                        </ul>
                    </div>
                </li>
                <li class="sidebar-dropdown">
                    <a href="#">
                        <i class="bi bi-globe"></i>
                        <span class="menu-text">Quản Lý Người Dùng</span>
                    </a>
                    <div class="sidebar-submenu">
                        <ul>
                            <li><a href="{{ route('user.index') }}">Danh Sách Người Dùng</a></li>
                            <li><a href="{{ route('user.create') }}">Thêm mới Người Dùng</a></li>
                        </ul>
                    </div>
                </li>
                <li class="sidebar-dropdown">
                    <a href="#">
                        <i class="bi bi-book"></i>
                        <span class="menu-text">Quản Lý Liên Hệ</span>
                    </a>
                    <div class="sidebar-submenu">
                        <ul>
                            <li><a href="{{ route('contact.index') }}">Danh Sách Liên Hệ</a></li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
