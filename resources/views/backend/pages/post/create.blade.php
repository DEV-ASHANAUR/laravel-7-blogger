@extends('backend.layouts.master')
@section('title')
    Create Post - Admin Panel
@endsection
@section('post')
    in
@endsection
@section('create-post')
    active
@endsection
@section('style')

<script src="{{ asset('backend') }}/assets/js/vendor/jquery-3.3.1.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />

    <style>
        /* ############### 4.20 TagsInput ############### */
        /* ---------------------------------------------- */
        .bootstrap-tagsinput {
        border-color: rgba(0, 0, 0, 0.15);
        -webkit-box-shadow: none;
        box-shadow: none;
        padding: 0 6px 5px;
        min-height: 40px;
        display: block;
        border-radius: 3px;
        }
        .bootstrap-tagsinput .label {
        background-color: #5B93D3;
        color: #fff;
        font-size: 0.875rem;
        padding: 2px 8px;
        margin-top: 6px;
        display: inline-block;
        border-radius: 2px;
        }
        .bootstrap-tagsinput input {
        padding-top: 8px;
        }
        .bootstrap-tagsinput .tag [data-role="remove"] {
        opacity: .75;
        }
        .bootstrap-tagsinput .tag [data-role="remove"]::after {
        content: '\f2d7';
        font-family: 'Ionicons';
        font-size: 11px;
        }
        .bootstrap-tagsinput .tag [data-role="remove"]:hover, .bootstrap-tagsinput .tag [data-role="remove"]:focus, .bootstrap-tagsinput .tag [data-role="remove"]:active {
        opacity: 1;
        box-shadow: none;
        }
        /* -------------------------------------------- */
        /* ############### 4.15 Select2 ############### */
        /* -------------------------------------------- */
        .select2-results__option {
        border-radius: 0;
        margin-bottom: 1px;
        font-size: 0.875rem;
        padding-left: 8px;
        }

        .select2-container--default .select2-selection--single {
        background-color: #fff;
        border-color: rgba(0, 0, 0, 0.15);
        border-radius: 0;
        height: calc(2.39375rem + 2px);
        outline: none;
        }
        .select2-container--default .select2-selection--single .select2-selection__rendered {
        color: #495057;
        line-height: calc(2.39375rem + 2px)-0.1rem;
        padding-left: 0.75rem;
        height: 100%;
        display: flex;
        align-items: center;
        }
        .select2-container--default .select2-selection--single .select2-selection__placeholder {
        color: #868e96;
        }
        .select2-container--default .select2-selection--single .select2-selection__arrow {
        width: 30px;
        height: calc(2.39375rem + 2px);
        line-height: calc(2.39375rem + 2px);
        }
        .select2-container--default .select2-selection--single .select2-selection__arrow b {
        margin-top: -3px;
        }
        .select2-container--default .select2-selection--multiple {
        background-color: #fff;
        border-color: rgba(0, 0, 0, 0.15);
        border-radius: 0;
        min-height: calc(2.39375rem + 2px);
        outline: none;
        }
        .select2-container--default .select2-selection--multiple .select2-selection__rendered {
        padding: 0 4px;
        }
        .select2-container--default .select2-selection--multiple .select2-selection__choice {
        position: relative;
        margin-top: 5px;
        margin-right: 4px;
        padding: 3px 10px 3px 20px;
        border-color: transparent;
        border-radius: 0;
        background-color: #0866C6;
        color: #fff;
        line-height: 1.45;
        }
        .select2-container--default .select2-selection--multiple .select2-selection__choice__remove {
        color: #fff;
        opacity: .5;
        font-size: 12px;
        display: inline-block;
        position: absolute;
        top: 4px;
        left: 7px;
        }
        .select2-container--default.select2-container--focus .select2-selection--multiple {
        border-color: rgba(0, 0, 0, 0.15);
        }
        .select2-container--default .select2-search--dropdown .select2-search__field {
        border-color: rgba(0, 0, 0, 0.15);
        border-radius: 0;
        }
        .select2-container--default .select2-results__option[aria-selected="true"] {
        background-color: #e7e9ee;
        }
        .select2-container--default .select2-results__option--highlighted[aria-selected] {
        background-color: #0866C6;
        }
        .select2-container--default .select2-results > .select2-results__options {
        margin: 4px;
        }
        .select2-container--default .select2-search--inline .select2-search__field {
        margin-top: 5px;
        line-height: 26px;
        padding-left: 7px;
        }
        .select2-container--default.select2-container--disabled .select2-selection__choice {
        padding-left: 10px;
        background-color: #adb5bd;
        }
        .select2-container--default.select2-container--disabled .select2-selection__choice .select2-selection__choice__remove {
        display: none;
        }

        .select2-container--open .select2-selection--single,
        .select2-container--open .select2-selection--multiple {
        background-color: #fff;
        border-color: rgba(0, 0, 0, 0.15);
        }
        .select2-container--open .select2-dropdown--above {
        border-top-left-radius: 0;
        border-top-right-radius: 0;
        }
        .select2-container--open .select2-dropdown--below {
        border-bottom-right-radius: 0;
        border-bottom-left-radius: 0;
        top: 0;
        }

        .select2-dropdown {
        border-color: rgba(0, 0, 0, 0.15);
        z-index: 200;
        }

        .select2-search--dropdown {
        padding-bottom: 0;
        }

        .has-success .select2-container--default .select2-selection--single, .parsley-select.parsley-success .select2-container--default .select2-selection--single {
        border-color: #23bf08;
        }

        .has-warning .select2-container--default .select2-selection--single {
        border-color: #f49917;
        }

        .has-danger .select2-container--default .select2-selection--single, .parsley-select.parsley-error .select2-container--default .select2-selection--single {
        border-color: #DC3545;
        }

        .select2-xs + .select2-container {
        font-size: 12px;
        }

        .select2-dropdown-xs .select2-results__option {
        font-size: 12px;
        }

        .select2-sm + .select2-container {
        font-size: 14px;
        }

        .select2-dropdown-sm .select2-results__option {
        font-size: 14px;
        }

        .select2-bd-0 + .select2-container--default .select2-selection--single {
        border-width: 0;
        }

        .bg-gray + .select2-container--default .select2-selection--single {
        background-color: #3f474e;
        }
        .bg-gray + .select2-container--default .select2-selection--single .select2-selection__rendered {
        color: #dee2e6;
        }
    </style>

@endsection
@section('main-content')
    <!-- page title area start -->
    <div class="page-title-area">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="breadcrumbs-area clearfix">
                    <h4 class="page-title pull-left">Create Post</h4>
                    <ul class="breadcrumbs pull-left">
                        <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li><a href="{{ route('admin.post.index') }}">All Post</a></li>
                        <li><span>Post Create</span></li>
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
                        <h4 class="header-title">Create New Post</h4>
                        @include('backend.layouts.partials.message')
                        <form action="{{ route('admin.post.store') }}" method="POST" autocomplete="off" id="Myform_post" enctype="multipart/form-data">
                            @csrf 
                            <div class="form-row">
                                <div class="form-group col-md-12 col-sm-12">
                                    <label for="name">Title</label>
                                    <input type="text" class="form-control" id="name" name="title" placeholder="Enter Post title">
                                </div>
                            </div>
                            
                            <div class="form-row">
                                <div class="form-group col-md-6 col-sm-12">
                                    <label for="roles">Category</label>
                                    <select name="category" class="form-control select2" id="roles">
                                        <option label="Choose one">chose one</option>
                                        @foreach ($category as $cat)
                                            <option value="{{ $cat->id }}" >{{ $cat->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <label for="tag">Tags</label>
                                    <input type="text" class="form-control" id="tag" name="tags" data-role="tagsinput" placeholder="Tag (separated by ,)"  required />
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12 col-sm-12">
                                    <label for="name">Post Image</label>
                                    <input type="file" class="form-control" id="file-img" name="image" required />
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12 col-sm-12 mt-2" id="test-img">
                                    
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12 col-sm-12">
                                    <div class="form-check mt-2">
                                        <div class="checkbox">
                                            <label for="checkbox1" class="form-check-label ">
                                                <input type="checkbox" id="checkbox1" name="status" value="1" class="form-check-input">Published
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12 col-sm-12">
                                    <label for="summernote">Post description</label>
                                    <textarea name="body" id="summernote1" cols="30" rows="10">
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos dolorem ad est sit impedit optio omnis, repellendus voluptatibus repudiandae adipisci tempore tenetur, fuga corrupti? Suscipit consequatur amet consectetur mollitia ea.
                                    </textarea>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.select2').select2();
            $('#summernote1').summernote({
                height: 200,
                tooltip: false
            });
        });
    </script>
    <script>
        function filePreview(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                $('#Myform_post + img').remove();
                $('#test-img').html('<img class="img-fluid img-thumbnail" src="'+e.target.result+'" width="80px" height="80px" />');
            }
            reader.readAsDataURL(input.files[0]);
            }
            }
            $("#file-img").change(function () {
                filePreview(this);
            });
    </script>
    
@endsection