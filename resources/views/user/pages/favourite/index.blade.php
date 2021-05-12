@extends('user.layouts.master')
@section('title')
    Favourite List | User Panel
@endsection
@section('style')
    <style>
        td.action {
            display: inline-flex;
        }
    </style>
@endsection
@section('fav')
    in
@endsection
@section('all-fav')
    active
@endsection
@section('main-content')
    <!-- page title area start -->
    <div class="page-title-area">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="breadcrumbs-area clearfix">
                    <h4 class="page-title pull-left">Post List</h4>
                    <ul class="breadcrumbs pull-left">
                        <li><a href="{{ route('home') }}">Dashboard</a></li>
                        <li><span>Post List</span></li>
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
            <div class="col-12 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title float-left">Favourite List</h4>
                       
                        {{-- <p class="float-right mb-3">
                            <a class="btn btn-primary" href="{{ route('user.post.create') }}"><i class="fa fa-plus"></i></a>
                        </p> --}}
                        
                        <div class="clearfix"></div>
                        <div class="data-tables">
                            <table id="dataTable" class="text-center">
                                <thead class="bg-light text-capitalize">
                                    <tr>
                                        <th width="5%">SL No</th>
                                        <th width="20%">Title</th>
                                        <th width="30%">Slug</th>
                                        <th width="20%">Views & Likes</th>
                                        <th width="5%">Created At</th>
                                        <th width="20%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($likePosts as $key => $post)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td class="text-capitalize">{{ $post->title }}</td>
                                        <td>{{ $post->slug }}</td>
                                        <td>
                                            <button type="button" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i> {{ $post->view_count }}</button>

                                            <a href="{{ route('like.users',$post->id) }}" class="btn btn-success btn-sm"><i class="fa fa-heart"></i> {{ $post->likedUsers->count() }}</a>
                                        </td>
                                        <td>
                                            {{ $post->created_at->diffForHumans() }}
                                        </td>
                                        <td>
                                            
                                            <a href="{{ route('user.post.show',$post->id) }}" class="btn btn-sm btn-primary mr-1" title="View"><i class="fa fa-eye"></i></a>
                                            
                                            {{-- <a href="{{ route('user.post.edit',$post->id) }}" class="btn btn-sm btn-success mr-1" title="Edit"><i class="fa fa-edit"></i></a>
                                            

                                            <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete-{{ $post->id }}"><i class="fa fa-trash"></i>
                                            </button> --}}
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
@endsection
@section('script')
    
@endsection