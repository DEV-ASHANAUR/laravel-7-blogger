@extends('backend.layouts.master')
@section('title')
    Manage Category - Admin Panel
@endsection
@section('style')
    <style>
        td.action {
            display: inline-flex;
        }
    </style>
@endsection
@section('category')
    in
@endsection
@section('main-content')
    <!-- page title area start -->
    <div class="page-title-area">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="breadcrumbs-area clearfix">
                    <h4 class="page-title pull-left">Category List</h4>
                    <ul class="breadcrumbs pull-left">
                        <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li><span>Category List</span></li>
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
                        @include('backend.layouts.partials.message')
                        <h4 class="header-title float-left">Category List</h4>
                        @if (Auth::guard('admin')->user()->can('category.create'))
                        <p class="float-right mb-3">
                            <button type="button" class="btn btn-primary mb-1" data-toggle="modal"
                                data-target="#create">
                                <i class="fa fa-plus"></i>
                            </button>
                        </p>
                        @endif
                        <div class="clearfix"></div>
                        <div class="data-tables">
                            <table id="dataTable" class="text-center">
                                <thead class="bg-light text-capitalize">
                                    <tr>
                                        <th width="10%">SL No</th>
                                        <th width="20%">Name</th>
                                        <th width="10%">Slug</th>
                                        <th width="40%">Created At</th>
                                        @if (Auth::guard('admin')->user()->can('category.edit') || Auth::guard('admin')->user()->can('category.delete') || Auth::guard('admin')->user()->can('category.view'))
                                        <th width="20%">Action</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categories as $key => $category)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td class="text-uppercase">{{ $category->name }}</td>
                                        <td>{{ $category->slug }}</td>
                                        <td>{{ $category->created_at }}</td>
                                        @if (Auth::guard('admin')->user()->can('category.edit') || Auth::guard('admin')->user()->can('category.delete') || Auth::guard('admin')->user()->can('category.view'))
                                        <td>
                                            @if (Auth::guard('admin')->user()->can('category.view'))

                                            <button type="button" class="btn btn-sm btn-primary mr-2" data-toggle="modal" data-target="#view-{{ $category->id }}"><i class="fa fa-eye"></i>
                                            </button>

                                            @endif 

                                            @if (Auth::guard('admin')->user()->can('category.edit'))
                                            <button type="button" class="btn btn-sm btn-success mr-2" data-toggle="modal" data-target="#edit-{{ $category->id }}"><i class="fa fa-edit"></i>
                                            </button>
                                            @endif

                                            @if (Auth::guard('admin')->user()->can('category.delete'))

                                            <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete-{{ $category->id }}"><i class="fa fa-trash"></i>
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
                    {{-- create category modal start --}}
                    <div class="modal fade bd-example-modal-lg modal-xl" id="create">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Create Category</h5>
                                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('admin.category.store') }}" method="POST" enctype="multipart/form-data" id="createCategory" id="Myform_category" class="form-horizontal">
                                        @csrf
                                        <div class="row form-group">
                                            <div class="col-12 col-md-3">
                                                <label for="name" class="form-control-label">Category Name</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <input type="text" name="name" class="form-control" placeholder="Enter Category Name" id="name" required />
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col-12 col-md-3">
                                                <label for="description" class="form-control-label">Category description</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <textarea name="description" id="description" class="form-control" placeholder="Enter Description"></textarea>
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col-12 col-md-3">
                                                <label for="description" class="form-control-label">Category Image</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <input type="file" class="form-control" id="file-img" name="image">
                                                    </div>
                                                    <div class="col-md-6" id="test-img">
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="reset" class="btn btn-danger btn-flat" id="picture" onclick="document.getElementById('createCategory').reset();">Reset</button>
                                    <button type="button" class="btn btn-primary btn-md btn-flat" onclick="document.getElementById('createCategory').submit();"><i class="fa fa-dot-circle-o"></i> Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- create category modal end --}}
                    @foreach ($categories as $key => $category)
                    {{-- category category modal start --}}
                    <div class="modal fade bd-example-modal-lg modal-xl" id="view-{{ $category->id }}">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Create Category</h5>
                                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                                </div>
                                <div class="modal-body">
                                    <div class="row form-group">
                                        <div class="col-12 col-md-3">
                                            <label for="name" class="form-control-label">Category Name</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <p class="form-control-static">{{ $category->name }}</p>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-12 col-md-3">
                                            <label for="description" class="form-control-label">Category description</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <p class="form-control-static">{{ ($category->description)?$category->description: 'This Category has no Description!' }}</p>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-12 col-md-3">
                                            <label for="description" class="form-control-label">Category Image</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <img src="{{ asset('storage/category/'.$category->image) }}" alt="{{ $category->image }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary btn-flat" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- category view modal end --}}
                    {{-- create category modal start --}}
                    <div class="modal fade bd-example-modal-lg modal-xl" id="edit-{{ $category->id }}">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Edit Category -{{ $category->name }}</h5>
                                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('admin.category.update',$category->id) }}" method="POST" enctype="multipart/form-data" id="updateCategory-{{ $category->id }}" id="Myform_category" class="form-horizontal">
                                        @csrf
                                        @method('PUT')
                                        <div class="row form-group">
                                            <div class="col-12 col-md-3">
                                                <label for="name" class="form-control-label">Category Name</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <input type="text" name="name" class="form-control" placeholder="Enter Category Name" value="{{ $category->name }}" id="name" required />
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col-12 col-md-3">
                                                <label for="description" class="form-control-label">Category description</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <textarea name="description" id="description" class="form-control" placeholder="Enter Description">{{ $category->description }}</textarea>
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col-12 col-md-3">
                                                <label for="description" class="form-control-label">Category Image</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <input type="file" class="form-control" id="file-img" name="image">
                                                    </div>
                                                    <div class="col-md-6" id="test-img">
                                                        <img src="{{ asset('storage/category/'.$category->image) }}" width="80px" height="80px" alt="{{ $category->image }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary btn-flat" data-dismiss="modal">Cancle</button>
                                    <button type="button" class="btn btn-primary btn-md btn-flat" onclick="document.getElementById('updateCategory-{{ $category->id }}').submit();"><i class="fa fa-dot-circle-o"></i> Update</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- create category modal end --}}

                    <div class="modal fade bd-example-modal-sm" id="delete-{{ $category->id }}">
                        <div class="modal-dialog modal-sm">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Delete {{ $category->name }}</h5>
                                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                                </div>
                                <div class="modal-body">
                                    <p>
                                        Are You Sure ! Delete This Category?
                                    </p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary btn-flat" data-dismiss="modal">Cancle</button>

                                    <button type="button" class="btn btn-danger btn-flat" onclick="event.preventDefault();
                                    document.getElementById('deleteCat-{{$category->id}}').submit();">Delete</button>
                                    <form action="{{ route('admin.category.destroy',$category->id) }}" style="display: none" id="deleteCat-{{$category->id}}" method="POST">
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
<script>
    function filePreview(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
            $('#Myform_category + img').remove();
            $('#test-img').html('<img class="img-fluid img-thumbnail" src="'+e.target.result+'" width="80px" height="80px" />');
        }
        reader.readAsDataURL(input.files[0]);
        }
        }
        $("#file-img").change(function () {
            filePreview(this);
        });
</script>
<script>
    $(document).ready(function(){
        $('#picture').click(function(){
            $('#test-img').html('');
        });
    });
</script>
@endsection