<nav class="site-navbar">
    <div class="navbar-header">
        <div class="navbar-brand navbar-brand-center site-gridmenu-toggle" style="width: 100%; background: #0a73bb;">
            <a class="logo" href="{{ route('admin.home')  }}">
                <img class="navbar-brand-logo" src="{{ asset('assets/remark/assets/images/logo.png') }}" alt="" title="AzCloud Admin">
                <span class="navbar-brand-text"> AzCloud Admin</span>
            </a>
        </div>
    </div>
    <div id="nav-icon4" class="fold-show nav-icon4" data-toggle="menubar" role="button">
        <span></span>
        <span></span>
        <span></span>
    </div>
</nav>

<div class="site-menubar">
    <div class="site-menubar-body">
        <div>
            <div>
                <ul class="site-menu" data-plugin="menu">
                    <li class="site-menu-category site-menu-item">Menu</li>
                    <li class="site-menu-item">
                        <a href="{{ route('admin.home')  }}"><i class="site-menu-icon  md-view-dashboard"></i>
                            <span class="site-menu-title">Dashboard</span>
                        </a>
                    </li>
                    {{-- Users --}}
                    <li class="site-menu-item has-sub @if(str_contains(request()->url(), 'users')) open active @endif">
                        <a href="javascript:void(0)">
                            <i class="site-menu-icon md-accounts"></i>
                            <span class="site-menu-title">Users <i class="site-menu-arrow"></i></span>
                        </a>
                        <ul class='site-menu-sub site-menu-sub-up' data-plugin='menu'>
                            <li class="site-menu-item">
                                <a href="{{ route('admin.users.index') }}">
                                    <i class="site-menu-icon md-view-list-alt"></i>
                                    <span class="site-menu-title">User list</span>
                                </a>
                            </li>
                            <li class="site-menu-item">
                                <a href="{{ route('admin.users.create') }}">
                                    <i class="site-menu-icon md-plus"></i>
                                    <span class="site-menu-title">Create user</span>
                                </a>
                            </li>
                        </ul>
                    </li>

                    {{-- Posts  --}}
                    <li class="site-menu-item has-sub @if(str_contains(request()->url(), 'posts')) open active @endif">
                        <a href="javascript:void(0)">
                            <i class="site-menu-icon md-receipt"></i>
                            <span class="site-menu-title">Posts <i class="site-menu-arrow"></i></span>
                        </a>
                        <ul class='site-menu-sub site-menu-sub-up' data-plugin='menu'>
                            <li class="site-menu-item">
                                <a href="{{ route('admin.posts.index') }}">
                                    <i class="site-menu-icon md-view-list-alt"></i>
                                    <span class="site-menu-title">Post list</span>
                                </a>
                            </li>
                            <li class="site-menu-item">
                                <a href="{{ route('admin.posts.create') }}">
                                    <i class="site-menu-icon md-plus"></i>
                                    <span class="site-menu-title">Create post</span>
                                </a>
                            </li>
                        </ul>
                    </li>

                </ul>
            </div>
        </div>
    </div>

    <div class="site-menubar-footer">
        <a href="javascript: void(0);" class="fold-show" data-toggle="menubar" role="button">
            <i class="icon hamburger hamburger-arrow-left">
                <span class="sr-only">Toggle menubar</span>
                <span class="hamburger-bar"></span>
            </i>
        </a>
        <a class="nav-link navbar-avatar" data-toggle="dropdown" href="#" aria-expanded="false"
           role="button">
            <span class="avatar avatar-online">
              <img src="{{ asset('assets/remark/images/user.png')  }}" alt="root">
              <i></i>
            </span>
        </a>
        <div class="dropdown-menu" role="menu">
            <a class="dropdown-item" href="#" role="menuitem"><i class="icon md-account" aria-hidden="true"></i>Profile</a>
            <div class="dropdown-divider" role="presentation"></div>
        </div>

        <a href="{{ route('admin.logout') }}" onclick="return confirm('Are you sure you want to logout?');">
            <i class="icon md-power" aria-hidden="true"></i>
        </a>
    </div>
</div>
