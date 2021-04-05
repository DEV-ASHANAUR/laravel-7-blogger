<div class="user-profile pull-right">
    <img class="avatar user-thumb" src="{{ (!empty(Auth::user()->image))?(asset('storage/profile/'.Auth::user()->image)):(asset('backend/assets/images/author/avatar.png')) }}"alt="avatar">
    <h4 class="user-name dropdown-toggle" data-toggle="dropdown"> {{ Auth::user()->name }} <i class="fa fa-angle-down"></i></h4>
    <div class="dropdown-menu">
        {{-- <a class="dropdown-item" href="#">Message</a>--}}
        <a class="dropdown-item" href="{{ route('user.profile') }}">Edit Profile</a> 
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            @method('POST')
    
            <button type="submit" class="dropdown-item" onclick="return confirm('Leave This Site?')">Log out</button>
        </form>
    </div>
</div>