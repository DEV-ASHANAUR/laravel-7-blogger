<header class="default-header">
    <nav class="navbar navbar-expand-lg navbar-light">
      <div class="container px-3">
        <a class="navbar-brand" href="{{ route('home.index') }}">
          <img src="{{ asset('fontend') }}/img/logo.png" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="lnr lnr-menu"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end align-items-center" id="navbarSupportedContent">
          <ul class="navbar-nav scrollable-menu">
            <li><a href="{{ route('home.index') }}">Home</a></li>
            <li><a href="{{ route('posts') }}">Posts</a></li>
            <li><a href="{{ route('categories') }}">Categories</a></li>
            <li><a href="#about">About</a></li>
            <!-- ll
              <li class="dropdown">
                  <a class="dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                      <i class="fa fa-user-circle" aria-hidden="true"></i>&nbsp;

                  </a>
                  <div class="dropdown-menu menu1">
                      <a href="/admin/dashboard/profile" class="dropdown-item" target="_blank">Admin Subhadip</a>
                    <a class="dropdown-item" href="/admin/dashboard"><i class="fa fa-tv" aria-hidden="true"></i>&nbsp; Dashboard</a>
                    <a class="dropdown-item" href="/admin/dashboard"><i class="fa fa-heart" aria-hidden="true"></i>&nbsp; Favorite List</a>

                    <a class="dropdown-item" href="/logout" onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();">
                      <i class="fa fa-sign-out" aria-hidden="true"></i>&nbsp; Logout
                  </a>

                  <form id="logout-form" action="/logout" method="POST" style="display: none;">
                      <input type="hidden" name="_token" value="ePJORhim7paUxLLNT4uhKMeJSbwU4kZwpnHVl7Ph">                                       </form>

                  </div>
              </li> -->
            <!-- Dropdown -->
            <li class="dropdown">
              <a href="#" onclick="dropMenu()">
                <i class="fa fa-user-circle" aria-hidden="true"></i>&nbsp;
                <!-- <i class="fas fa-user"></i> -->
              </a>
              <div id="dropMenu" class="dropdown-menu menu1" style="display: none;">
                <a href="{{route('admin.login')}}" class="dropdown-item" target="_blank"><i class="fa fa-user" aria-hidden="true"></i> Admin</a>
                <a href="{{route('login')}}" class="dropdown-item" target="_blank"><i class="fa fa-user" aria-hidden="true"></i> User</a>

                <!-- <a class="dropdown-item" href="/admin/dashboard"><i class="fa fa-tv" aria-hidden="true"></i>&nbsp;
                  Dashboard</a>
                <a class="dropdown-item" href="/admin/dashboard"><i class="fa fa-heart" aria-hidden="true"></i>&nbsp;
                  Favorite List</a>

                <a class="dropdown-item" href="/logout" onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                  <i class="fa fa-sign-out" aria-hidden="true"></i>&nbsp; Logout
                </a>

                <form id="logout-form" action="/logout" method="POST" style="display: none;">
                  <input type="hidden" name="_token" value="ePJORhim7paUxLLNT4uhKMeJSbwU4kZwpnHVl7Ph"> </form> -->

              </div>
            </li>
            <script>
              function dropMenu() {
                var dropmenu = document.getElementById('dropMenu');
                if (dropmenu.style.display === "none") {
                  dropmenu.style.display = "block";
                } else {
                  dropmenu.style.display = "none";
                }
              }
            </script>
          </ul>
        </div>
      </div>
    </nav>
  </header>