@extends('user.layouts.master')
@section('title')
    Dashboard Page - User Panel
@endsection
@section('dashboard')
    in
@endsection
@section('dash-page')
    active
@endsection
@section('main-content')
    <!-- page title area start -->
    <div class="page-title-area">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="breadcrumbs-area clearfix">
                    <h4 class="page-title pull-left">Dashboard</h4>
                    <ul class="breadcrumbs pull-left">
                        <li><a href="index.html">Home</a></li>
                        <li><span>Dashboard</span></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-6 clearfix">
                @include('user.layouts.partials.logout')
            </div>
        </div>
    </div>
    <!-- page title area end -->
    <div class="main-content-inner">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-md-4 mt-5 mb-3">
                        <div class="card">
                            <div class="seo-fact sbg1">
                                <a href="{{ route('user.post.index') }}">
                                    <div class="p-4 d-flex justify-content-between align-items-center">
                                        <div class="seofct-icon"><i class="fa fa-tasks"></i> POST</div>
                                        <h2>{{ $total_post }}</h2>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mt-md-5 mb-3">
                        <div class="card">
                            <div class="seo-fact sbg2">
                                <a href="{{ route('user.post.pending') }}">
                                    <div class="p-4 d-flex justify-content-between align-items-center">
                                        <div class="seofct-icon"><i class="fa fa-wheelchair"></i> PENDING</div>
                                        <h2>{{ $total_pending }}</h2>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mt-md-5 mb-3">
                        <div class="card">
                            <div class="seo-fact sbg3">
                                <a href="{{ route('user.fav.list') }}">
                                    <div class="p-4 d-flex justify-content-between align-items-center">
                                        <div class="seofct-icon"><i class="fa fa-heart"></i> FAVOURITE </div>
                                        <h2>{{ $likePosts }}</h2>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 mt-5">
                        <div class="card">
                            <div class="card-body">
                                @include('backend.layouts.partials.message')
                                <h4 class="header-title float-left">Recent Comment To Your Post</h4>
                                <div class="data-tables">
                                    <table id="dataTable" class="text-center">
                                        <thead class="bg-light text-capitalize">
                                            <tr>
                                                <th width="10%">SL No</th>
                                                <th width="20%">Comment</th>
                                                <th width="10%">User</th>
                                                <th width="30%">Post</th>
                                                <th width="20%">Created At</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($comments as $key => $comment)
                                            <tr>
                                                <td>{{ $key+1 }}</td>
                                                <td class="text-capitalize">{{ $comment['comment'] }}</td>
                                                <td>
                                                    @if (!empty($comment['user_id']))
                                                        @php
                                                            $user = App\User::where('id',$comment['user_id'])->first();
                                                        @endphp
                                                        {{ $user->name }}
                                                    @else
                                                        @php
                                                            $admin = App\Models\Admin::where('id',$comment['admin_id'])->first();
                                                        @endphp
                                                        {{ $admin->name }}
                                                    @endif
                                                </td>
                                                <td>
                                                    @php
                                                       $post = App\Post::where('id',$comment['post_id'])->first();
                                                    @endphp
                                                    <a href="{{ route('post',$post->slug) }}" target="_blank">{{ $post->title }}</a>
                                                </td>
                                                <td>
                                                   
                                                    {{ \Carbon\Carbon::parse($comment['created_at'])->diffForHumans() }}
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection