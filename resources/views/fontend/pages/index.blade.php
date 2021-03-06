@extends('fontend.layouts.master')
@section('title')
  DEV-TECH | HOME
@endsection
@section('style')
  <style>
    .single-travel .dates {
      background: #361e4a;
      color: #fff;
      padding: 5px 9px;
      position: absolute;
    }

    .single-cat .date {
        background-color: #361e4a;
        color: #fff;
        font-weight: 100;
        padding: 2px 15px;
        width: 115px;
        text-align: center;
        margin-top: 20px;
    }
    .section-gap {
        padding: 55px 0 !important;
    }
    .clock {
    /* position: absolute; */
    /* top: 50%;
    left: 50%; */
    /* transform: translateX(-50%) translateY(-50%); */
    color: #17D4FE;
    font-size: 20px;
    font-family: Orbitron;
    letter-spacing: 3px;
   


}
  </style>
@endsection
@section('content')
    <!-- start banner Area -->
  <section class="banner-area relative" id="home" data-parallax="scroll" data-image-src="{{ asset('fontend') }}/img/header-bg1.jpg">
    <div class="overlay-bg overlay"></div>
    <div class="container">
      <div class="row fullscreen">
        <div class="banner-content d-flex align-items-center col-lg-12 col-md-12">
          <h1>
            Welcome to Dev Tech<br />
            <p>
              L<span style="font-size: 0.7em">earn</span> &nbspC<span style="font-size: 0.7em">reate</span>
              &nbspS<span style="font-size: 0.7em">hare</span>
            </p>
          </h1>
        </div>

        <div class="head-bottom-meta d-flex justify-content-between align-items-end col-lg-12">
          <div class="col-lg-6 flex-row d-flex meta-left no-padding">
            <a href="/login" class="genric-btn info circle arrow mr-md-auto">Join <span
                class="lnr lnr-arrow-right"></span></a>
          </div>
          <div class="col-lg-6 flex-row d-flex meta-right no-padding justify-content-end">
            <div class="user-meta">
              <h4 class="text-white">Md Ashanaur Rahman</h4>
                <p id="MyClockDisplay" class="clock" onload="showTime()"></p>
            </div>
            <img class="img-fluid user-img" src="{{ asset('fontend') }}/./img/ashanur.jpg" width="40px" height="40px" alt="" />
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End banner Area -->

  <!-- Start category Area -->
  <section class="category-area section-gap" id="news">
    <div class="container">
      <div class="row d-flex justify-content-center">
        <div class="menu-content pb-70 col-lg-8">
          <div class="title text-center">
            <h1 class="mb-10">Latest Posts from all categories</h1>
            <p>Find the Latest Post from all category. </p>
            {{-- <p>
              @auth
                 @if (Auth::guard('admin')->check())
                     admin : {{ Auth::guard('admin')->user()->id }}
                 @else
                    User :  {{ Auth::user()->id }}
                 @endif 
              @endauth
            </p> --}}
          </div>
        </div>
      </div>
      <div class="active-cat-carusel">
        @foreach ($posts as $post)
        <div class="item single-cat">
          <a href="{{ route('post',$post->slug) }}">
            <img src="{{ asset('storage/post/'.$post->image) }}" alt="" />
          </a>
          <p class="date">{{ $post->created_at->diffForHumans() }}</p>
          <h4><a href="{{ route('post',$post->slug) }}">{{ $post->title }}</a></h4>
        </div>
        @endforeach
      </div>
    </div>
  </section>
  <!-- End category Area -->

  <section class="travel-area section-gap" id="travel">
    <div class="container">
      <div class="row d-flex justify-content-center">
        <div class="menu-content pb-70 col-lg-8">
          <div class="title text-center">
            <h1 class="mb-10">Hot topics of this Week</h1>
            <p>The posts which are most views in this week.</p>
          </div>
        </div>
      </div>
      <div class="container">
        <div class="row justify-content-center">
          @foreach ($posts as $post)

          <div class="col-lg-6 col-md-6 mb-3 travel-left">
              <div class="single-travel media pb-70">
                <a href="{{ route('post',$post->slug) }}">
                  <img class="img-fluid d-flex  mr-3" width="195px" height="180px" src="{{ asset('storage/post/'.$post->image) }}" alt="">
                </a>
                <div class="dates">
                  {{ $post->created_at->diffForHumans() }}
                </div>
                <div class="media-body align-self-center">
                <h4 class="mt-0"><a href="{{ route('post',$post->slug) }}">{{ $post->title }}</a></h4>
                <p>{!! Str::limit($post->body, 200, '...') !!}</p>
                <div class="meta-bottom d-flex justify-content-between">
                <p><span class="lnr lnr-heart"></span> {{ $post->likedUsers->count() }} Likes</p>
                <p><span class="lnr lnr-eye"></span> {{ $post->view_count }} Views</p>
                <p><span class="lnr lnr-bubble"></span> {{ $post->comments->count() }}</p>
                </div>
                </div>
              </div>
          </div>
          @endforeach
        </div>
          <div class="justify-content-center d-flex">
            <a href="{{ route('posts') }}" class="primary-btn load-more pbtn-2 text-uppercase mx-auto mt-60">Load More </a>
          </div>
      </div>
    </div>
  </section>

  <!-- Start team Area -->
  <section class="team-area section-gap gap" id="about">
    <div class="container">
      <div class="row d-flex justify-content-center">
        <div class="menu-content pb-70 col-lg-8">
          <div class="title text-center">
            <h1 class="mb-10">About This Site</h1>
            <p>This is blogging site related to Internet of Things.</p>
          </div>
        </div>
      </div>
      <div class="row justify-content-center d-flex align-items-center">
        <div class="col-lg-6 team-left">
          {{--<p>
            Find a blogs and tutorials related to Internet of things, Web Designe, Web Development, GIS Web applications
            and more.
          </p>
          <p>
            This site is made with laravel framework. The theme is <a href="">Blogger Theme</a> and the Admin Panel
            theme is <a href="https://github.com/puikinsh/sufee-admin-dashboard">Sufee Admin</a>.
          </p>
          <p>Checkout the full tutorial how this site is made on <span class="c1">Youtube</span>.</p>--}}
          <h4>About the Creator</h4>
          <br>
          <p>I am <span class="c1">Web Developer</span> specialized <span class="c1">LARAVEL</span> - PHP.
            Currently Complete diploma in Computer Technology. <span class="c1">Now I Am Learning About Web Development</span>.
          </p>
          <br>
          <h4>Email: <span style="font-size: medium; font-weight: lighter;">ashanour009@gmail.com</span></h4>
          <br>
          <div class="col-md-12 d-flex justify-content-center py-3 mt-2">
            <a href="https://github.com/DEV-ASHANAUR" class="genric-btn info circle arrow mr-md-auto"
              target="_blank">Know More<span class="lnr lnr-arrow-right"></span></a>
          </div>
        </div>
        <div class="col-lg-6 team-right d-flex justify-content-center">
          <div class="row">
            <div class="single-team">
              <div class="thumb">
                <img class="img-fluid w-75 mx-auto" src="{{ asset('fontend') }}/./img/ashanur.jpg" alt="admin">
                <div class="align-items-center justify-content-center d-flex">
                  <a href="https://www.facebook.com/ashanaur.rahman.16" target="_blank"><i class="fa fa-facebook"></i></a>
                  <a href="https://github.com/DEV-ASHANAUR" target="_blank"><i class="fa fa-github"></i></a>
                </div>
              </div>
              <div class="meta-text mt-30 text-center">
                <h4>Md.Ashanaur Rahman</h4>
                <p>Creator</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End team Area -->
@endsection
@section('script')
    <script>
      function showTime(){
        var date = new Date();
        var h = date.getHours(); // 0 - 23
        var m = date.getMinutes(); // 0 - 59
        var s = date.getSeconds(); // 0 - 59
        var session = "AM";
        
        if(h == 0){
            h = 12;
        }
        
        if(h > 12){
            h = h - 12;
            session = "PM";
        }
        
        h = (h < 10) ? "0" + h : h;
        m = (m < 10) ? "0" + m : m;
        s = (s < 10) ? "0" + s : s;
        
        var time = h + ":" + m + ":" + s + " " + session;
        document.getElementById("MyClockDisplay").innerText = time;
        document.getElementById("MyClockDisplay").textContent = time;
        
        setTimeout(showTime, 1000);
        
    }

    showTime();
    </script>
@endsection