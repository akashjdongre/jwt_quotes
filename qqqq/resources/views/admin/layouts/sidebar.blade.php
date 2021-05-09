<aside class="main-sidebar sidebar-dark-primary elevation-4" style="min-height: 917px;">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        
                <img src="{{asset('image/white.png')}}" style="margin-left:60px; width:50%">
         </a>


    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                        <a class="nav-link {{ request()->is('admin') ? 'active' : '' }}" href="{{ route("admin.dashboard") }}">
                            <i class="fas fa-fw fa-tachometer-alt nav-icon"></i>
                            <p>Dashboard</p>
                        </a>
                </li>
                
                @if(Auth::guard('admin')->user()->can('role_management_access'))
                    <li class="nav-item has-treeview {{ request()->is('admin/permissions*') ? 'menu-open' : '' }} {{ request()->is('admin/roles*') ? 'menu-open' : '' }}">
                        <a class="nav-link nav-dropdown-toggle {{ request()->is('admin/permissions') || request()->is('admin/permissions/*') ? 'active' : '' }} {{ request()->is('admin/roles') || request()->is('admin/roles/*') ? 'active' : '' }}" href="#">
                            <i class="fa-fw nav-icon fas fa-users"></i>
                            <p>Role Management<i class="right fa fa-fw fa-angle-left nav-icon"></i></p>
                        </a>
                        <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{route('admin.permissions.index')}}" class="nav-link {{ request()->is('admin/permissions') || request()->is('admin/permissions/*') ? 'active' : '' }}" >
                                        <i class="fa-fw nav-icon fas fa-unlock-alt"> </i>
                                        <p>Permission</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('admin.roles.index')}}" class="nav-link {{ request()->is('admin/roles') || request()->is('admin/roles/*') ? 'active' : '' }}">
                                        <i class="fa-fw nav-icon fas fa-briefcase"> </i>
                                        <p> Roles</p>
                                    </a>
                                </li>

                        </ul>
                    </li>
                @endif
                @if(Auth::guard('admin')->user()->can('client_access'))
                    <li class="nav-item">
                        <a href="{{route('admin.clients.index')}}" class="nav-link {{ request()->is('admin/clients') || request()->is('admin/clients/*') ? 'active' : '' }}">
                            <i class="fa-fw nav-icon fas fa-user"> </i>
                            <p>Clients</p>
                        </a>
                    </li>
                @endif
                @if(Auth::guard('admin')->user()->can('sub_admin_access'))
                    <li class="nav-item">
                        <a href="{{route('admin.sub_admins.index')}}" class="nav-link {{ request()->is('admin/sub_admins') || request()->is('admin/sub_admins/*') ? 'active' : '' }}">
                            <i class="fa-fw nav-icon fas fa-user"> </i>
                            <p>Sub Admins</p>
                        </a>
                    </li>
                @endif

                @if(Auth::guard('admin')->user()->can('author_management_access'))
                    <li class="nav-item has-treeview {{ request()->is('admin/popular-authors*') ? 'menu-open' : '' }} {{ request()->is('admin/authors*') ? 'menu-open' : '' }}">
                        <a class="nav-link nav-dropdown-toggle {{ request()->is('admin/authors') || request()->is('admin/authors/*') ? 'active' : '' }}
                         {{ request()->is('admin/popular-authors') || request()->is('admin/popular-authors/*') ? 'active' : '' }}" href="#">
                            <i class="fa-fw nav-icon fas fa-user-graduate"></i>
                            <p>Authors Management<i class="right fa fa-fw fa-angle-left nav-icon"></i></p>
                        </a>
                        <ul class="nav nav-treeview">
                            @if(Auth::guard('admin')->user()->can('author_access'))
                                <li class="nav-item">
                                    <a href="{{route('admin.authors.index')}}" class="nav-link {{ request()->is('admin/authors') || request()->is('admin/authors/*') ? 'active' : '' }}">
                                        <i class="fa-fw nav-icon fas fa-circle"></i>
                                        <p>All Authors</p>
                                    </a>
                                </li>
                            @endif
                            @if(Auth::guard('admin')->user()->can('popular_author_access'))
                                <li class="nav-item">
                                    <a href="{{route('admin.authors.popular')}}" class="nav-link {{ request()->is('admin/popular-authors') || request()->is('admin/popular-authors/*') ? 'active' : '' }}">
                                        <i class="fa-fw nav-icon fas fa-circle"> </i>
                                        <p>Popular Authors</p>
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </li>
                @endif
                @if(Auth::guard('admin')->user()->can('tag_management_access'))
                    <li class="nav-item has-treeview {{ request()->is('admin/popular-tags*') ? 'menu-open' : '' }} {{ request()->is('admin/trend-tags*') ? 'menu-open' : '' }} {{ request()->is('admin/tags*') ? 'menu-open' : '' }}">
                        <a class="nav-link nav-dropdown-toggle {{ request()->is('admin/tags') || request()->is('admin/tags/*') ? 'active' : '' }}
                        {{ request()->is('admin/trend-tags') || request()->is('admin/trend-tags/*') ? 'active' : '' }} {{ request()->is('admin/popular-tags') || request()->is('admin/popular-tags/*') ? 'active' : '' }}" href="#">
                            <i class="fa-fw nav-icon fas fa-hashtag"></i>
                            <p>Tags Management<i class="right fa fa-fw fa-angle-left nav-icon"></i></p>
                        </a>
                        <ul class="nav nav-treeview">
                            @if(Auth::guard('admin')->user()->can('tag_access'))
                                <li class="nav-item">
                                    <a href="{{route('admin.tags.index')}}" class="nav-link {{ request()->is('admin/tags') || request()->is('admin/tags/*') ? 'active' : '' }}" >
                                        <i class="fa-fw nav-icon fas fa-circle"> </i>
                                        <p>All Tags</p>
                                    </a>
                                </li>
                            @endif
                            @if(Auth::guard('admin')->user()->can('trending_tag_access'))
                                <li class="nav-item">
                                    <a href="{{route('admin.tags.trend')}}" class="nav-link {{ request()->is('admin/trend-tags') || request()->is('admin/trend-tags/*') ? 'active' : '' }}">
                                        <i class="fa-fw nav-icon fas fa-circle"> </i>
                                        <p>Trending Tags</p>
                                    </a>
                                </li>
                            @endif
                            @if(Auth::guard('admin')->user()->can('popular_tag_access'))
                                <li class="nav-item">
                                    <a href="{{route('admin.tags.popular')}}" class="nav-link {{ request()->is('admin/popular-tags') || request()->is('admin/popular-tags/*') ? 'active' : '' }}">
                                        <i class="fa-fw nav-icon fas fa-circle"> </i>
                                        <p>Popular Tags</p>
                                    </a>
                                </li>
                            @endif

                        </ul>
                    </li>
                @endif
                @if(Auth::guard('admin')->user()->can('category_management_access'))
                    <li class="nav-item has-treeview {{ request()->is('admin/top-categories*') ? 'menu-open' : '' }} {{ request()->is('admin/categories*') ? 'menu-open' : '' }}">
                        <a class="nav-link nav-dropdown-toggle {{ request()->is('admin/categories') || request()->is('admin/categories/*') ? 'active' : '' }}
                        {{ request()->is('admin/top-categories') || request()->is('admin/top-categories/*') ? 'active' : '' }}" href="#">
                            <i class="fa-fw nav-icon fas fa-sitemap"></i>
                            <p>Category Management<i class="right fa fa-fw fa-angle-left nav-icon"></i></p>
                        </a>
                        <ul class="nav nav-treeview">
                            @if(Auth::guard('admin')->user()->can('category_access'))
                                <li class="nav-item">
                                    <a href="{{route('admin.categories.index')}}" class="nav-link {{ request()->is('admin/categories') || request()->is('admin/categories/*') ? 'active' : '' }}">
                                        <i class="fa-fw nav-icon fas fa-circle"> </i>
                                        <p>All Categories</p>
                                    </a>
                                </li>
                            @endif
                            @if(Auth::guard('admin')->user()->can('top_category_access'))
                                <li class="nav-item">
                                    <a href="{{route('admin.categories.top')}}" class="nav-link {{ request()->is('admin/top-categories') || request()->is('admin/top-categories/*') ? 'active' : '' }}">
                                        <i class="fa-fw nav-icon fas fa-circle"> </i>
                                        <p>Top Cateogires</p>
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </li>
                @endif
                @if(Auth::guard('admin')->user()->can('quote_access'))
                    <li class="nav-item">
                        <a href="{{route('admin.quotes.index')}}" class="nav-link {{ request()->is('admin/quotes') || request()->is('admin/quotes/*') ? 'active' : '' }}">
                            <i class="fa-fw nav-icon fas fa-quote-left"> </i>
                            <p>Quotes</p>
                        </a>
                    </li>
                @endif
                @if(Auth::guard('admin')->user()->can('blog_access'))
                    <li class="nav-item">
                        <a href="{{route('admin.blogs.index')}}" class="nav-link {{ request()->is('admin/blogs') || request()->is('admin/blogs/*') ? 'active' : '' }}">
                            <i class="fa-fw nav-icon fas fa-blog"> </i>
                            <p>Blogs</p>
                        </a>
                    </li>
                @endif
                @if(Auth::guard('admin')->user()->can('setting_access'))
                    <li class="nav-item">
                        <a href="{{route('admin.settings.editSetting')}}" class="nav-link {{ request()->is('admin/settings/edit-settings') || request()->is('admin/settings/edit-settings/*') ? 'active' : '' }}">
                            <i class="fa-fw nav-icon fas fa-cog"> </i>
                            <p>Settings</p>
                        </a>
                    </li>
                @endif
                @if(Auth::guard('admin')->user()->can('keyword_access'))
                    <li class="nav-item">
                        <a href="{{route('admin.keywords.index')}}" class="nav-link {{ request()->is('admin/keywords') || request()->is('admin/keywords/*') ? 'active' : '' }}">
                            <i class="fa-fw nav-icon fas fa-keyboard"> </i>
                            <p>Keywords</p>
                        </a>
                    </li>
                @endif
                @if(Auth::guard('admin')->user()->can('profile_password_edit'))
                    <li class="nav-item">
                        <a href="{{route('admin.password.edit')}}" class="nav-link {{ request()->is('admin/password') || request()->is('admin/password/*') ? 'active' : '' }}">
                            <i class="fa-fw fas fa-key nav-icon">
                            </i>
                            <p>
                                {{ trans('global.change_password') }}
                            </p>
                        </a>
                    </li>
                @endif

                    <li class="nav-item">
                        <a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                            <p>
                                <i class="fas fa-fw fa-sign-out-alt nav-icon">

                                </i>
                            <p>{{ trans('global.logout') }}</p>
                            </p>
                        </a>
                    </li>


            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
