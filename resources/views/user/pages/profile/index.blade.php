@extends('user.layouts.master')
@section('title')
    Profile - User Panel
@endsection
{{-- @section('admin')
    in
@endsection
@section('create-admin')
    active
@endsection --}}
@section('style')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <style>
        .chat_container{
            width: 100%;
            max-width: 150px;
            background-size: cover;
            min-height: 150px;
            background-position: center;
            position: relative;
            border-radius: 50%;
            margin-left: auto;
            margin-right: auto;
        }
    </style>
@endsection
@section('main-content')
    <!-- page title area start -->
    <div class="page-title-area">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="breadcrumbs-area clearfix">
                    <h4 class="page-title pull-left">Create User</h4>
                    <ul class="breadcrumbs pull-left">
                        <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li><span>Profile</span></li>
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
        <div class="row row-sm">
            <div class="col-md-4">
                @include('user.pages.profile.partials.profile')
            </div>
            <div class="col-md-8">
              <div class="card">
                {{-- <h3 class="text-center"><span class="text-danger">Hi..! </span><strong class="text-warning">{{ Auth::user()->name }}</strong> Update Your Profile</h3> --}}
                <div class="card-body">
                    <form class="register-form outer-top-xs" method="POST" action="{{ route('user.profile.update') }}" id="Myform_profile" enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-8">
                                <label class="info-title" for="exampleInputEmail1">Profile Picture <span></span></label>
                                <input type="file" id="file-img" name="image" class="form-control form-control-file unicase-form-control text-input" id="exampleInputEmail1" />
                                <font class="text-danger">{{ ($errors->has('image'))?$errors->first('image'):'' }}</font>
                            </div>
                            <div class="col-md-4" id="test">
                    
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label class="info-title" for="name"> Full Name <span>*</span></label>
                                <input type="text" name="name" value="{{ Auth::user()->name }}" class="form-control unicase-form-control text-input" id="name" placeholder="Enter Fullname" required />
                                <font class="text-danger">{{ ($errors->has('name'))?$errors->first('name'):'' }}</font>
                            </div>
                        </div>
                        {{-- <div class="form-row">
                            <div class="form-group col-md-12">
                                <label class="info-title" for="name"> User Name <span>*</span></label>
                                <input type="text" name="username" value="{{ Auth::guard('admin')->user()->username }}" class="form-control unicase-form-control text-input" id="name" placeholder="Enter Fullname" required />
                                <font class="text-danger">{{ ($errors->has('username'))?$errors->first('username'):'' }}</font>
                            </div>
                        </div> --}}
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label class="info-title" for="exampleInputEmail2">Email Address <span>*</span></label>
                                <input type="email" name="email" value="{{ Auth::user()->email }}" class="form-control unicase-form-control text-input" id="exampleInputEmail2" placeholder="Enter Email" />
    
                                <font class="text-danger">{{ ($errors->has('email'))?$errors->first('email'):'' }}</font>
                            </div>
                        </div> 
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label class="info-title" for="exampleInputEmail1">Phone Number <span></span></label>
                                <input type="number" name="phone" value="{{ Auth::user()->phone }}" class="form-control unicase-form-control text-input" id="exampleInputEmail1" placeholder="Enter Phone" />
                                <font class="text-danger">{{ ($errors->has('phone'))?$errors->first('phone'):'' }}</font>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label class="info-title" for="summernote1">About <span></span></label>
                                <textarea name="about" id="summernote1" class="form-control" cols="30" rows="10" placeholder="Write something...">
                                    {{ Auth::user()->about }}
                                </textarea>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Submit</button>
                            </div>
                        </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>  
          </div><!-- row -->
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
                $('#Myform_profile + img').remove();
                $('#test').html('<img class="img-fluid img-thumbnail" src="'+e.target.result+'" width="100px" height="100px" />');
            }
            reader.readAsDataURL(input.files[0]);
            }
            }
            $("#file-img").change(function () {
                filePreview(this);
            });
    </script>
@endsection