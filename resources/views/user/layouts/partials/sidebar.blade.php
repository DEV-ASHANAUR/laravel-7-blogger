@php
    $usr = Auth::guard('admin')->user();
@endphp

<div class="sidebar-menu">
    <div class="sidebar-header">
        <div class="logo">
            {{-- <a href="index.html"><img src="{{ asset('backend') }}/assets/images/icon/logo.png" alt="logo"></a>
             --}}
             <a href="{{ url('/') }}">
                {{-- <img src="{{ asset('backend') }}/assets/images/icon/logo.png" alt="logo"> --}}
                <h5 class="text-white">Dev-Tech</h5>
            </a>
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
                            <li class="@yield('dash-page')"><a href="{{ route('home') }}">Dashboard</a></li>
                        </ul>
                    </li>
                    
                    {{-- post start --}}
                   
                    <li>
                        <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-tasks"></i><span>
                                Posts
                            </span></a>
                        <ul class="collapse @yield('post')">
                            
                            <li class="@yield('all-post')"><a href="{{ route('user.post.index') }}">Approved Post</a></li>

                            <li class="@yield('pending-post')"><a href="{{ route('user.post.pending') }}">Pending Post</a></li>

                            <li class="@yield('create-post')"><a href="{{ route('user.post.create') }}">Create Post</a></li>
                            
                        </ul>
                    </li>
                    
                    {{-- post end --}}
                    {{-- Fav post start --}}
                   
                    <li>
                        <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-heart"></i><span>
                                Favourite
                            </span></a>
                        <ul class="collapse @yield('fav')">
                            <li class="@yield('all-fav')"><a href="{{ route('user.fav.list') }}">View List</a></li>
                        </ul>
                    </li>
                    
                    {{-- Fav post end --}}
                    {{-- comment --}}
                    <li>
                        <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-comment"></i><span>
                                Comment
                            </span></a>
                        <ul class="collapse @yield('comment')">
                            <li class="@yield('all-comment')"><a href="{{ route('user.comment.index') }}">All Comment</a></li>  

                            <li class="@yield('reply-comment')"><a href="{{ route('user.comment.reply') }}">Reply Comment</a></li>  
                        </ul>
                    </li>
                    {{-- comment end --}}
                </ul>
            </nav>
        </div>
    </div>
</div>