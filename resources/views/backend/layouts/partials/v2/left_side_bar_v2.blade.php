<div class="sidebar-inner">
    <!--- Sidemenu -->
    <div id="sidebar-menu">
        <ul>
            @can('dashboard.view')
            <li class="has_sub">
                <a href="{{ route('admin.dashboard') }}" class="waves-effect">
                    <img src="{{ asset('backend/assets_v2/images/icon/dashboard-01.svg') }}" class="img-fluid">
                    <span>Dashboard</span>
                </a>
            </li>
            @endcan
            <!-- role all menu here -->
            @canany(['roles.list', 'group.list', 'permission.list'])
            <li <?php if(Route::currentRouteName() == 'roles.index' || Route::currentRouteName() == 'roles.edit' || Route::currentRouteName() == 'roles.create'): ?> class="has_sub active" <?php else: ?> class="has_sub" <?php endif; ?>>
                <a href="javascript:void(0);" class="waves-effect">
                    <img src="{{ asset('backend/assets_v2/images/icon/Role-management-03.svg') }}" class="img-fluid">
                    <span>Role Management</span>
                    <span class="menu-arrow"></span>
                </a>
                <ul>
                    @can('group.list')
                    <li <?php if(Route::currentRouteName() == 'group.index' || Route::currentRouteName() == 'group.edit' || Route::currentRouteName() == 'group.create'): ?> class="active has_sub" <?php else: ?> class="has_sub" <?php endif; ?>>
                        <a href="javascript:void(0);" class="waves-effect">
                            <span>Group</span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul>
                            <li <?php if(Route::currentRouteName() == 'group.index'): ?> class="active" <?php endif; ?>>
                                <a href="{{ route('group.index') }}" class="waves-effect">
                                    <span>Group List</span>
                                </a>
                            </li>
                            @can('group.create.form.view')
                            <li <?php if(Route::currentRouteName() == 'group.create'): ?> class="active" <?php endif; ?>>
                                <a href="{{ route('group.create') }}" class="waves-effect">
                                    <span>Group Create</span>
                                </a>
                            </li>
                            @endcan
                        </ul>
                    </li>
                    @endcan
                    @can('permission.list')
                    <li <?php if(Route::currentRouteName() == 'permission.index' || Route::currentRouteName() == 'permission.edit' || Route::currentRouteName() == 'permission.create'): ?> class="active has_sub" <?php else: ?> class="has_sub" <?php endif; ?>>
                        <a href="javascript:void(0);" class="waves-effect">
                            <span>Permission</span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul>
                            <li <?php if(Route::currentRouteName() == 'permission.index'): ?> class="active" <?php endif; ?>>
                                <a href="{{ route('permission.index') }}" class="waves-effect">
                                    <span>Permission List</span>
                                </a>
                            </li>
                            @can('permission.create.form.view')
                            <li <?php if(Route::currentRouteName() == 'permission.create'): ?> class="active" <?php endif; ?>>
                                <a href="{{ route('permission.create') }}" class="waves-effect">
                                    <span>Permission Create</span>
                                </a>
                            </li>
                            @endcan
                        </ul>
                    </li>
                    @endcan
                    @canany(['roles.list', 'roles.create.form.view'])
                    <li <?php if(Route::currentRouteName() == 'roles.list' || Route::currentRouteName() == 'roles.create.form.view'): ?> class="active has_sub" <?php else: ?> class="has_sub" <?php endif; ?>>
                        <a href="javascript:void(0);" class="waves-effect">
                            <span>Role</span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul>
                            @can('roles.list')
                            <li <?php if(Route::currentRouteName() == 'roles.index'): ?> class="active" <?php endif; ?>>
                                <a href="{{ route('roles.index') }}" class="waves-effect">
                                    <span>Role List</span>
                                </a>
                            </li>
                            @endcan
                            @can('roles.create.form.view')
                            <li <?php if(Route::currentRouteName() == 'roles.create'): ?> class="active" <?php endif; ?>>
                                <a href="{{ route('roles.create') }}" class="waves-effect">
                                    <span>Role Create</span>
                                </a>
                            </li>
                            @endcan
                        </ul>
                    </li>
                    @endcan
                </ul>
            </li>
            @endcan
            <!-- end of role menu -->
            <!-- user menu -->
            @can('users.list')
            <li <?php if(Route::currentRouteName() == 'users.index' || Route::currentRouteName() == 'users.create'): ?> class="active has_sub" <?php else: ?> class="has_sub" <?php endif; ?>>
                <a href="javascript:void(0);" class="waves-effect">
                    <img src="{{ asset('backend/assets_v2/images/icon/users-04.svg') }}" class="img-fluid">
                    <span>Users</span>
                    <span class="menu-arrow"></span>
                </a>
                <ul class="collapse">
                    <li <?php if(Route::currentRouteName() == 'users.index'): ?> class="active" <?php endif; ?>><a href="{{ route('users.index') }}">User List</a></li>
                    @can('users.create.form')
                    <li <?php if(Route::currentRouteName() == 'users.create'): ?> class="active" <?php endif; ?>><a href="{{ route('users.create') }}">Create User</a></li>
                    <li <?php if(Route::currentRouteName() == 'users.restore'): ?> class="active" <?php endif; ?>><a href="{{ route('users.restore') }}">Restore Deleted User</a></li>
                    @endcan
                </ul>
            </li>
            @endcan

            {{-- Service __Sourav --}}
                @can('service.list')
            <li <?php if(Route::currentRouteName() == 'service.index' || Route::currentRouteName() == 'service.create'): ?> class="active has_sub" <?php else: ?> class="has_sub" <?php endif; ?>>
                <a href="javascript:void(0);" class="waves-effect">
                    <img src="{{ asset('backend/assets_v2/images/icon/users-04.svg') }}" class="img-fluid">
                    <span>Service</span>
                    <span class="menu-arrow"></span>
                </a>
                <ul class="collapse">
                    @can('service.create.form')
                        <li <?php if(Route::currentRouteName() == 'service.create'): ?> class="active" <?php endif; ?>>
                            <a href="{{ route('service.create') }}">Create Service</a>
                        </li>
                    @endcan
                    <li <?php if(Route::currentRouteName() == 'service.index'): ?> class="active" <?php endif; ?>><a href="{{ route('service.index') }}">Manage Service</a></li>
                </ul>
            </li>
            @endcan

                {{-- Portfolio __Sourav --}}
                @can('portfolio.list')
            <li <?php if(Route::currentRouteName() == 'portfolio.index' || Route::currentRouteName() == 'portfolio.create'): ?> class="active has_sub" <?php else: ?> class="has_sub" <?php endif; ?>>
                <a href="javascript:void(0);" class="waves-effect">
                    <img src="{{ asset('backend/assets_v2/images/icon/users-04.svg') }}" class="img-fluid">
                    <span>Portfolio</span>
                    <span class="menu-arrow"></span>
                </a>
                <ul class="collapse">
                    @can('portfolio.create.form')
                        <li <?php if(Route::currentRouteName() == 'portfolio.create'): ?> class="active" <?php endif; ?>>
                            <a href="{{ route('portfolio.create') }}">Create Portfolio</a>
                        </li>
                    @endcan
                    <li <?php if(Route::currentRouteName() == 'portfolio.index'): ?> class="active" <?php endif; ?>><a href="{{ route('portfolio.index') }}">Manage Portfolio</a></li>
                </ul>
            </li>
            @endcan
            <!-- end of user menu -->
                @can('blog.list')
                    <li <?php if(Route::currentRouteName() == 'blog.index' || Route::currentRouteName() == 'blog.create'): ?> class="active has_sub" <?php else: ?> class="has_sub" <?php endif; ?>>
                        <a href="javascript:void(0);" class="waves-effect">
                            <img src="{{ asset('backend/assets_v2/images/icon/users-04.svg') }}" class="img-fluid">
                            <span>Blog</span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul class="collapse">
                            @can('blog.create.form')
                                <li <?php if(Route::currentRouteName() == 'blog.create'): ?> class="active" <?php endif; ?>>
                                    <a href="{{ route('blog.create') }}">Create Blog</a>
                                </li>
                            @endcan
                            <li <?php if(Route::currentRouteName() == 'blog.index'): ?> class="active" <?php endif; ?>><a href="{{ route('blog.index') }}">Manage Blog</a></li>
                        </ul>
                    </li>
                @endcan




        </ul>
        <div class="clearfix"></div>
    </div>
    <!-- Sidebar -->
    <div class="clearfix"></div>
</div>
