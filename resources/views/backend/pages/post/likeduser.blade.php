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

@section('main-content')
    <!-- page title area start -->
    <div class="page-title-area">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="breadcrumbs-area clearfix">
                    <h4 class="page-title pull-left">Liked User</h4>
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
                        <h4 class="header-title float-left">{{ $posts->title }}</h4>
                        <div class="clearfix"></div>
                        <div class="data-tables">
                            <table id="dataTable" class="text-center">
                                <thead class="bg-light text-capitalize">
                                    <tr>
                                        <th width="5%">SL No</th>
                                        <th width="20%">Name</th>
                                        <th width="30%">Email</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($posts->likedUsers as $key => $liker)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td class="text-capitalize">{{ $liker->name }}</td>
                                        <td>{{ $liker->email }}</td>
                                        
                                        
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