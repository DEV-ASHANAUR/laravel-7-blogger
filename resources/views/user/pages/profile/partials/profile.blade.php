<div class="card" style="width: 18rem;">
    <div class="chat_container" style="background-image: url({{ (!empty(Auth::user()->image))?url('storage/profile/'.Auth::user()->image):url('media/profile.jpg') }});" >
        <div class="overlay">
            
        </div>
    </div>
    <div class="card-body">
        <ul class="list-group list-group-flush mt-2">
            <a href="{{ route('user.profile') }}" class="btn btn-sm btn-primary btn-block">Home</a>
            <a href="{{ route('user.profile.password') }}" class="btn btn-sm btn-primary btn-block">Change Password</a>
        </ul>
    </div>
</div>