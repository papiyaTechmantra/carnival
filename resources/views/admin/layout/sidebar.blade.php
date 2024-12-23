<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
            <a href="{{ route('admin.dashboard') }}"
                class="nav-link {{ (request()->is('admin/dashboard')) ? 'active' : '' }}">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>Dashboard</p> 
            </a>
        </li>
       
        
        @if(in_array('WEBSITE SETTINGS', $RolePass))
        <li class="nav-item {{ (request()->is('admin/settings*')) ? 'menu-open' : '' }}">
            <a href="{{route('admin.settings')}}"
                class="nav-link {{ (request()->is('admin/settings*')) ? 'active' : '' }}">
                <i class="nav-icon fas fa-file-alt"></i>
                <p>Website Settings <i class="right fas fa-angle-left"></i></p>
            </a>
        </li>
        @endif
        @if(Auth::user()->type==1)
        <li class="nav-item {{ (request()->is('admin/article*')) ? 'menu-open' : '' }}">
            <a href="{{route('admin.article.list.all')}}"
                class="nav-link {{ (request()->is('admin/article*')) ? 'active' : '' }}">
                <i class="nav-icon fas fa-file-alt"></i>
                <p>Article Management <i class="right fas fa-angle-left"></i></p>
            </a>
        </li>

        <li class="nav-item {{ (request()->is('admin/admin-management*')) ? 'menu-open' : '' }}">
            <a href="{{route('admin.user_management.list.all')}}"
                class="nav-link {{ (request()->is('admin/admin-management*')) ? 'active' : '' }}">
                <i class="nav-icon fas fa-file-alt"></i>
                <p>Admin Management <i class="right fas fa-angle-left"></i></p>
            </a>
        </li>
        @endif
















        @if(in_array('MASTER MODULES', $RolePass))
        <li class="nav-item {{ (request()->is('admin/master-module*')) ? 'menu-open' : '' }}">
            <a href="#"
                class="nav-link {{ (request()->is('admin/master-module*')) ? 'active' : '' }}">
                <i class="nav-icon fas fa-file-alt"></i>
                <p>Master Modules <i class="right fas fa-angle-left"></i></p>
            </a>
            <ul class="nav nav-treeview">
                @if(in_array('social_Media', $RolePass))
                <li class="nav-item">
                    <a href="{{ route('admin.social_media.list.all') }}"
                        class="nav-link {{ (request()->is('admin/master-module/social-media*')) ? 'active active_nav_link' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Social Media</p>
                    </a>
                </li>
                @endif
            </ul>
        </li>
        @endif








        @if(in_array('CONTENT MANAGEMENT', $RolePass))
        <li class="nav-item {{ (request()->is('admin/content*')) ? 'menu-open' : '' }}">
            <a href="#"
                class="nav-link {{ (request()->is('admin/content*')) ? 'active' : '' }}">
                <i class="nav-icon fas fa-file-alt"></i>
                <p>Content Management <i class="right fas fa-angle-left"></i></p>
            </a>
            <ul class="nav nav-treeview">
                @if(in_array('Page content', $RolePass))
                <li class="nav-item">
                    <a href="{{route('admin.page_content.list.all')}}"
                        class="nav-link {{ (request()->is('admin/content/page-content*')) ? 'active active_nav_link' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Page Content</p>
                    </a>
                </li>
                @endif
               
                
            </ul>
        </li>
        @endif
        <li class="nav-item">
            <a class="nav-link" href="javascript:void(0)"
                onclick="event.preventDefault();document.getElementById('logout-form').submit()">
                <i class="nav-icon fas fa-sign-out-alt"></i>
                Logout
            </a>
        </li>
    </ul>
</nav>
