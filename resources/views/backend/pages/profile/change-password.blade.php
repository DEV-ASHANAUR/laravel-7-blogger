@extends('backend.layouts.master')
@section('title')
    Profile - Admin Panel
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
                        <li><span>Change Password</span></li>
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
        <div class="row row-sm">
            <div class="col-md-4">
                @include('backend.pages.profile.partials.profile')
            </div>
            <div class="col-md-8">
              <div class="card">
                {{-- <h3 class="text-center"><span class="text-danger">Hi..! </span><strong class="text-warning">{{ Auth::user()->name }}</strong> Update Your Profile</h3> --}}
                <div class="card-body">
                    <form class="register-form outer-top-xs" role="form" action="{{ route('admin.profile.password.update') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label class="info-title" for="old-password">Old Password <span>*</span></label>
                            <input type="password" name="old" class="form-control unicase-form-control text-input" id="old-password" required placeholder="Enter current password" />
                            <font class="text-danger">{{ ($errors->has('old'))?$errors->first('old'):'' }}</font>
                        </div>
                        <div class="form-group">
                            <label class="info-title" for="password">New Password <span>*</span></label>
                            <input type="password" data-parsley-minlength="2" name="password" class="form-control unicase-form-control text-input" id="password" required placeholder="Enter New Password" />
                            <font class="text-danger">{{ ($errors->has('password'))?$errors->first('password'):'' }}</font>
                        </div>
                         <div class="form-group">
                            <label class="info-title" for="password_confirmation">Confirm Password <span>*</span></label>
                            <input type="password" data-parsley-equalto="#password" data-parsley-equalto-message="Confirm Password Does not Match" name="password_confirmation" class="form-control unicase-form-control text-input" data-equalto="#password" id="password_confirmation" required placeholder="Enter confirmed password" />
                        </div>
                          <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Submit</button>
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