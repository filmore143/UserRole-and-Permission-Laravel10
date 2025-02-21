<aside class="navbar-aside" id="offcanvas_aside">
    <div class="aside-top">
        <a href="index.html" class="brand-wrap">
            <img src="{{asset('backend/assets/imgs/theme/logo.png')}}" class="logo" alt="Nest Dashboard" />
        </a>
        <div>
            <button class="btn btn-icon btn-aside-minimize"><i class="text-muted material-icons md-menu_open"></i></button>
        </div>
    </div>
    <nav>
        <ul class="menu-aside">
            <li class="menu-item active">
                <a class="menu-link" href="index.html">
                    <i class="icon material-icons md-home"></i>
                    <span class="text">Dashboard</span>
                </a>
            </li>

            <li class="menu-item">
                <a class="menu-link" href="{{route('user.index')}}">
                    <i class="icon material-icons md-verified_user"></i>
                    <span class="text">Users</span>
                </a>
            </li>

            <li class="menu-item">
                <a class="menu-link" href="{{route('role.index')}}">
                    <i class="icon material-icons md-groups"></i>
                    <span class="text">Roles</span>
                </a>
            </li>
            <li class="menu-item">
                <a class="menu-link" href="{{route('permission.index')}}">
                    <i class="icon material-icons md-add_box"></i>
                    <span class="text">Permissions</span>
                </a>
            </li>
            <li class="menu-item has-submenu">
                <a class="menu-link" href="#">
                    <i class="icon material-icons md-person"></i>
                    <span class="text">Account</span>
                </a>
                <div class="submenu">
                    <a href="page-account-login.html">User login</a>
                    <a href="page-account-register.html">User registration</a>
                    <a href="page-error-404.html">Error 404</a>
                </div>
            </li>
        </ul>
        <hr />
        <ul class="menu-aside">
            <li class="menu-item">
                <a class="menu-link" href="page-settings-1.html">
                    <i class="icon material-icons md-settings"></i>
                    <span class="text">Settings</span>
                </a>
            </li>
        </ul>
        <br />
        <br />
    </nav>
</aside>
