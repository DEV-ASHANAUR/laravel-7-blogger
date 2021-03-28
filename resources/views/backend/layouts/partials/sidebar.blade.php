@php
    $usr = Auth::guard('admin')->user();
@endphp

<div class="sidebar-menu">
    <div class="sidebar-header">
        <div class="logo">
            <a href="index.html"><img src="{{ asset('backend') }}/assets/images/icon/logo.png" alt="logo"></a>
        </div>
    </div>
    <div class="main-menu">
        <div class="menu-inner">
            <nav>
                <ul class="metismenu" id="menu">
                    {{-- dashboard --}}
                    <li>
                        <a href="javascript:void(0)" aria-expanded="true"><i class="ti-layout-sidebar-left"></i><span>
                            Dashboard
                        </span></a>
                        <ul class="collapse @yield('dashboard')">
                            <li class="@yield('dash-page')"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        </ul>
                    </li>
                    {{-- Roles & Permission start --}}
                    @if ($usr->can('role.view') || $usr->can('role.edit') || $usr->can('role.delete') || $usr->can('role.create'))
                    <li>

                        <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-tasks"></i><span>
                                Roles & Permission
                            </span></a>
                        <ul class="collapse @yield('role')">
                            @if ($usr->can('role.view'))
                            <li class="@yield('all-role')"><a href="{{ route('admin.roles.index') }}">All Role</a></li> 
                            @endif
                            @if ($usr->can('role.create'))
                            <li class="@yield('create-role')"><a href="{{ route('admin.roles.create') }}">Create Role</a></li>
                            @endif
                        </ul>
                    </li>
                    @endif
                    {{-- admin start --}}
                    @if ($usr->can('admin.view') || $usr->can('admin.edit') || $usr->can('admin.delete') || $usr->can('admin.create'))
                    <li>
                        <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-user"></i><span>
                                Admins
                            </span></a>
                        <ul class="collapse @yield('admin')">
                            @if ($usr->can('admin.view'))
                            <li class="@yield('all-admin')"><a href="{{ route('admin.admins.index') }}">All Admin</a></li>
                            @endif
                            @if ($usr->can('admin.create'))
                            <li class="@yield('create-admin')"><a href="{{ route('admin.admins.create') }}">Create Admin</a></li>
                            @endif
                        </ul>
                    </li>
                    @endif
                    {{-- admin end --}}
                    {{-- category --}}
                    <li>
                        <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-user"></i><span>
                                Category
                            </span></a>
                        <ul class="collapse @yield('category')">
                            <li class="@yield('all-category')"><a href="{{ route('admin.category.index') }}">All Category</a></li>   
                        </ul>
                    </li>
                    {{-- category end --}}
                    {{-- admin start --}}
                    @if ($usr->can('post.view') || $usr->can('post.edit') || $usr->can('post.delete') || $usr->can('post.create'))
                    <li>
                        <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-user"></i><span>
                                Posts
                            </span></a>
                        <ul class="collapse @yield('post')">
                            @if ($usr->can('post.view'))
                            <li class="@yield('all-post')"><a href="{{ route('admin.post.index') }}">All Post</a></li>
                            @endif
                            @if ($usr->can('post.create'))
                            <li class="@yield('create-post')"><a href="{{ route('admin.post.create') }}">Create Post</a></li>
                            @endif
                        </ul>
                    </li>
                    @endif
                    {{-- admin end --}}
                    {{-- category --}}
                    <li>
                        <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-user"></i><span>
                                Comment
                            </span></a>
                        <ul class="collapse @yield('comment')">
                            <li class="@yield('all-comment')"><a href="{{ route('comment.index') }}">All Comment</a></li>  

                            <li class="@yield('reply-comment')"><a href="{{ route('comment.reply') }}">Reply Comment</a></li>  
                        </ul>
                    </li>
                    {{-- category end --}}
                </ul>
            </nav>
        </div>
    </div>
</div>