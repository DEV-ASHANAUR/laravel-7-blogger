<div class="card" style="width: 18rem;">
    <div class="chat_container" style="background-image: url({{ (!empty(Auth::guard('admin')->user()->image))?url('storage/profile/'.Auth::guard('admin')->user()->image):url('media/profile.jpg') }});" >
        <div class="overlay">
            
        </div>
    </div>
    <div class="card-body">
        <ul class="list-group list-group-flush mt-2">
            <a href="{{ route('admin.profile') }}" class="btn btn-sm btn-primary btn-block">Home</a>
            <a href="{{ route('admin.profile.password') }}" class="btn btn-sm btn-primary btn-block">Change Password</a>
        </ul>
    </div>
</div>