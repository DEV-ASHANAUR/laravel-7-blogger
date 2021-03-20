@extends('backend.layouts.master')
@section('title')
    Manage Post - Admin Panel
@endsection
@section('style')
    <style>
        td.action {
            display: inline-flex;
        }
    </style>
@endsection
@section('post')
    in
@endsection
@section('all-post')
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
                        <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li><span>Post List</span></li>
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
                        <h4 class="header-title float-left">Post List</h4>
                        @if (Auth::guard('admin')->user()->can('post.create'))
                        <p class="float-right mb-3">
                            <a class="btn btn-primary" href="{{ route('admin.post.create') }}"><i class="fa fa-plus"></i></a>
                        </p>
                        @endif
                        <div class="clearfix"></div>
                        <div class="data-tables">
                            <table id="dataTable" class="text-center">
                                <thead class="bg-light text-capitalize">
                                    <tr>
                                        <th width="10%">SL No</th>
                                        <th width="20%">Title</th>
                                        <th width="10%">Slug</th>
                                        <th width="40%">Views & Likes</th>
                                        @if (Auth::guard('admin')->user()->can('post.edit') || Auth::guard('post')->user()->can('post.delete'))
                                        <th width="20%">Action</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($posts as $key => $post)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td class="text-capitalize">{{ $post->title }}</td>
                                        <td>{{ $post->slug }}</td>
                                        <td>58</td>
                                        @if (Auth::guard('admin')->user()->can('post.edit') || Auth::guard('post')->user()->can('post.delete'))
                                        <td>
                                            @if (Auth::guard('admin')->user()->can('post.edit'))
                                            <a href="{{ route('admin.post.edit',$post->id) }}" class="btn btn-sm btn-success mr-2" title="Edit"><i class="fa fa-edit"></i></a>
                                            @endif

                                            @if (Auth::guard('admin')->user()->can('post.delete'))

                                            <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete-{{ $post->id }}"><i class="fa fa-trash"></i>
                                            </button>

                                            @endif 
                                        </td>
                                        @endif
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    {{-- --------modal start------------ --}}
                    @foreach ($posts as $key => $post)
                    <div class="modal fade bd-example-modal-sm" id="delete-{{ $post->id }}">
                        <div class="modal-dialog modal-sm">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Delete Post</h5>
                                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                                </div>
                                <div class="modal-body">
                                    <p>
                                        Are You Sure ! Delete This Admin?
                                    </p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary btn-flat" data-dismiss="modal">Cancle</button>
                                    <button type="button" class="btn btn-danger btn-flat" onclick="event.preventDefault();
                                    document.getElementById('deletePost-{{$post->id}}').submit();">Delete</button>
                                    <form action="{{ route('admin.post.destroy',$post->id) }}" style="display: none" id="deletePost-{{$post->id}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    {{-- --------modal end------------ --}}
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')

@endsection