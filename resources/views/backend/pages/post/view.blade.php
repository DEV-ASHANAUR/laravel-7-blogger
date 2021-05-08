@extends('backend.layouts.master')
@section('title')
    view Post - Admin Panel
@endsection
@section('post')
    in
@endsection
@section('style')
    <style>
        
    </style>

@endsection
@section('main-content')
    <!-- page title area start -->
    <div class="page-title-area">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="breadcrumbs-area clearfix">
                    <h4 class="page-title pull-left">View Post</h4>
                    <ul class="breadcrumbs pull-left">
                        <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li><a href="{{ route('admin.post.index') }}">All Post</a></li>
                        <li><span>Post View</span></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-6 clearfix">
                @include('backend.layouts.partials.logout')
            </div>
        </div>
    </div>
    <!-- page title area end -->
    <div class="main-content-inner">
        <div class="row">
            <div class="col-12 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">View Post 
                            @if ($post->status == 0)
                            -> <a href="{{ route('admin.post.approve',$post->id) }}" class="btn btn-sm btn-info mr-1" title="approve"><i class="fa fa-check-circle"></i> Approve</a> 
                            @endif
                        </h4>
                        @if ($post->status == 1)
                        <p class="float-right mb-3">
                            <a class="btn btn-primary" href="{{ route('post',$post->slug) }}"><i class="fa fa-eye"></i> preview</a>
                        </p>
                        @endif
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-9 col-sm-12">
                                    <div>
                                        <h4 class="text-capitalize">Post Thumbnail</h4><br>
                                        <img class="ml-3" src="{{ asset('storage/post/'.$post->image) }}" width="300px" alt="">
                                    </div><br>
                                    <div class="mt-2 mb-2">
                                        <h4 class="text-capitalize">Post Description</h4><br>
                                        {!! $post->body !!}
                                        
                                    </div>
                                    
                                </div>
                                <div class="col-md-3 col-sm-12">
                                    
                                    <div class="mt-2 mb-2">
                                        <h5 class="text-capitalize">Post Title</h5>
                                        <p class="ml-3">{{ $post->title }}</p>
                                    </div>
                                    <div class="mt-2 mb-2">
                                        <h5 class="text-capitalize">Post Slug</h5>
                                        <p class="ml-3">{{ $post->slug }}</p>
                                    </div>
                                    <div class="mt-2 mb-2">
                                        <h5 class="text-capitalize">Post Category</h5>
                                        <span class="ml-3 text-capitalize">{{ $post->category->name }}</span>
                                    </div>
                                    <div class="mt-2 mb-2">
                                        <h5 class="text-capitalize">Total View</h5>
                                        <span class="ml-3 text-capitalize badge badge-pill badge-success">{{ $post->view_count }}</span>
                                    </div>
                                    <div class="mt-2 mb-2">
                                        <h5 class="text-capitalize">Post Tag</h5>
                                        <span class="ml-3 text-capitalize">
                                            @foreach ($post->tags as $tag)
                                                <span class="badge badge-pill badge-primary">{{ $tag->name }}</span>
                                            @endforeach
                                        </span>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    
    
@endsection