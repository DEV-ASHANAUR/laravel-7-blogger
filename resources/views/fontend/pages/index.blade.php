@extends('fontend.layouts.master')
@section('title')
    Home Page
@endsection
@section('content')
    <!-- start banner Area -->
  <section class="banner-area relative" id="home" data-parallax="scroll" data-image-src="{{ asset('fontend') }}/img/header-bg.jpg">
    <div class="overlay-bg overlay"></div>
    <div class="container">
      <div class="row fullscreen">
        <div class="banner-content d-flex align-items-center col-lg-12 col-md-12">
          <h1>
            Welcome to myiotlab<br />
            <p>
              L<span style="font-size: 0.7em">earn</span> &nbspC<span style="font-size: 0.7em">reate</span>
              &nbspS<span style="font-size: 0.7em">hare</span>
            </p>
          </h1>
        </div>

        <div class="head-bottom-meta d-flex justify-content-between align-items-end col-lg-12">
          <div class="col-lg-6 flex-row d-flex meta-left no-padding">
            <a href="/login" class="genric-btn info circle arrow mr-md-auto">Visit Yotube <span
                class="lnr lnr-arrow-right"></span></a>
          </div>
          <div class="col-lg-6 flex-row d-flex meta-right no-padding justify-content-end">
            <div class="user-meta">
              <h4 class="text-white">Mark wiens</h4>
              <p>12 Dec, 2017 11:21 am</p>
            </div>
            <img class="img-fluid user-img" src="{{ asset('fontend') }}/img/user.jpg" alt="" />
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
            <p>Find the Latest Post from all category.</p>
          </div>
        </div>
      </div>
      <div class="active-cat-carusel">
        @foreach ($posts as $post)
        <div class="item single-cat">
          <img src="{{ asset('storage/post/'.$post->image) }}" alt="" />
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
          <div class="single-posts col-lg-4 col-sm-4 mb-3">
            <img class="img-fluid" src="{{ asset('storage/post/'.$post->image) }}" alt="">
            <div class="date mt-20 mb-20">{{ $post->created_at->diffForHumans() }}</div>
            <div class="detail">
              <a href="{{ route('post',$post->slug) }}">
                <h4 class="pb-20">{{ $post->title }}</h4>
              </a>
              <p>
                {!! Str::limit($post->body, 400, '...') !!}
              </p>
			  <p class=" footer"="">
              <br>
              </p>
              <ul class="d-flex space-around">
                <li><a href="javascript:void(0);"
                    onclick=" toastr.info('To add to your favorite list you have to login first.', 'Info', { closeButton: true, progressBar: true, })"><i
                      class="fa fa-heart-o" aria-hidden="true"></i><span> 0</span></a></li>


                <li><i class="fa fa-comment-o" aria-hidden="true"></i><span> 0</span></li>
                <li><i class="fa fa-eye" aria-hidden="true"></i> <span>5</span></li>
              </ul>

              <p></p>
            </div>
          </div>
          @endforeach
          {{-- <div class="single-posts col-lg-4 col-sm-4 mb-3">
            <img class="img-fluid" src="{{ asset('fontend') }}/img/c2.jpg" alt="">
            <div class="date mt-20 mb-20">2 months ago</div>
            <div class="detail">
              <a href="http://localhost:8000/post/ssssssssssss">
                <h4 class="pb-20">ssssssssssss</h4>
              </a>
              <p>
              </p>
              <p>qqqqqq</p>
              <p></p>
              <p class="footer">
                <br>
              </p>
              <ul class="d-flex space-around">
                <li><a href="javascript:void(0);"
                    onclick=" toastr.info('To add to your favorite list you have to login first.', 'Info', { closeButton: true, progressBar: true, })"><i
                      class="fa fa-heart-o" aria-hidden="true"></i><span> 0</span></a></li>


                <li><i class="fa fa-comment-o" aria-hidden="true"></i><span> 0</span></li>
                <li><i class="fa fa-eye" aria-hidden="true"></i> <span>3</span></li>
              </ul>

              <p></p>
            </div>
          </div>
          <div class="single-posts col-lg-4 col-sm-4 mb-3">
            <img class="img-fluid" src="{{ asset('fontend') }}/img/c3.jpg" alt="">
            <div class="date mt-20 mb-20">7 months ago</div>
            <div class="detail">
              <a href="http://localhost:8000/post/kkkkkkkkkkkkkk">
                <h4 class="pb-20">kkkkkkkkkkkkkk</h4>
              </a>
              <p>
              </p>
              <p>jjjjjjjjjjjjjjjjj</p>
              <p></p>
              <p class="footer">
                <br>
              </p>
              <ul class="d-flex space-around">
                <li><a href="javascript:void(0);"
                    onclick=" toastr.info('To add to your favorite list you have to login first.', 'Info', { closeButton: true, progressBar: true, })"><i
                      class="fa fa-heart-o" aria-hidden="true"></i><span> 0</span></a></li>


                <li><i class="fa fa-comment-o" aria-hidden="true"></i><span> 1</span></li>
                <li><i class="fa fa-eye" aria-hidden="true"></i> <span>1</span></li>
              </ul>

              <p></p>
            </div>
          </div>
          <div class="single-posts col-lg-4 col-sm-4 mb-3">
            <img class="img-fluid" src="{{ asset('fontend') }}/img/c1.jpg" alt="">
            <div class="date mt-20 mb-20">7 months ago</div>
            <div class="detail">
              <a href="http://localhost:8000/post/new-possstss">
                <h4 class="pb-20">New Possstss</h4>
              </a>
              <p>
              </p>
              <p>helo&nbsp;&nbsp;<span style="font-size: 1rem;">helo&nbsp;&nbsp;</span><span
                  style="font-size: 1rem;">helo&nbsp;&nbsp;</span><span
                  style="font-size: 1rem;">helo&nbsp;&nbsp;</span><span
                  style="font-size: 1rem;">helo&nbsp;&nbsp;</span><span
                  style="font-size: 1rem;">helo&nbsp;&nbsp;</span><span
                  style="font-size: 1rem;">helo&nbsp;&nbsp;</span><span style="font-size: 1rem;">helo&nbsp;&nbsp;</span>
                <sp... <="" p="">
                </sp...>
              </p>
              <p class="footer">
                <br>
              </p>
              <ul class="d-flex space-around">
                <li><a href="javascript:void(0);"
                    onclick=" toastr.info('To add to your favorite list you have to login first.', 'Info', { closeButton: true, progressBar: true, })"><i
                      class="fa fa-heart-o" aria-hidden="true"></i><span> 0</span></a></li>


                <li><i class="fa fa-comment-o" aria-hidden="true"></i><span> 1</span></li>
                <li><i class="fa fa-eye" aria-hidden="true"></i> <span>1</span></li>
              </ul>

              <p></p>
            </div>
          </div>
          <div class="single-posts col-lg-4 col-sm-4 mb-3">
            <img class="img-fluid" src="{{ asset('fontend') }}/img/c1.jpg" alt="">
            <div class="date mt-20 mb-20">7 months ago</div>
            <div class="detail">
              <a href="http://localhost:8000/post/hello-world">
                <h4 class="pb-20">hello world</h4>
              </a>
              <p>
              </p>
              <p>&nbsp;<span style="font-size: 1rem;">Hleo world&nbsp;</span><span
                  style="font-size: 1rem;">&nbsp;</span><span style="font-size: 1rem;">Hleo world&nbsp;</span><span
                  style="font-size: 1rem;">&nbsp;</span><span style="font-size: 1rem;">Hleo world&nbsp;</span><span
                  style="font-size: 1rem;">&nbsp;</span><span style="font-size: 1rem;">Hleo world&nbsp;</span><span
                  style="font-size: 1rem;">&nbsp;
                </span></p>
              <p class="footer">
                <br>
              </p>
              <ul class="d-flex space-around">
                <li><a href="javascript:void(0);"
                    onclick=" toastr.info('To add to your favorite list you have to login first.', 'Info', { closeButton: true, progressBar: true, })"><i
                      class="fa fa-heart-o" aria-hidden="true"></i><span> 1</span></a></li>


                <li><i class="fa fa-comment-o" aria-hidden="true"></i><span> 0</span></li>
                <li><i class="fa fa-eye" aria-hidden="true"></i> <span>2</span></li>
              </ul>
              <p></p>
            </div>
          </div>
          <div class="single-posts col-lg-4 col-sm-4 mb-3">
            <img class="img-fluid" src="{{ asset('fontend') }}/img/c1.jpg" alt="">
            <div class="date mt-20 mb-20">7 months ago</div>
            <div class="detail">
              <a href="http://localhost:8000/post/something">
                <h4 class="pb-20">Something</h4>
              </a>
              <p>
              </p>
              <p>cv xcvxc</p>
              <p></p>
              <p class="footer">
                <br>
              </p>
              <ul class="d-flex space-around">
                <li><a href="javascript:void(0);"
                    onclick=" toastr.info('To add to your favorite list you have to login first.', 'Info', { closeButton: true, progressBar: true, })"><i
                      class="fa fa-heart-o" aria-hidden="true"></i><span> 0</span></a></li>


                <li><i class="fa fa-comment-o" aria-hidden="true"></i><span> 0</span></li>
                <li><i class="fa fa-eye" aria-hidden="true"></i> <span>0</span></li>
              </ul>

              <p></p>
            </div>
          </div> --}}
          <a href="{{ route('posts') }}" class="primary-btn load-more pbtn-2 text-uppercase mx-auto mt-60">Load More </a>
        </div>
      </div>
    </div>
  </section>

  <!-- Start team Area -->
  <section class="team-area section-gap" id="about">
    <div class="container">
      <div class="row d-flex justify-content-center">
        <div class="menu-content pb-70 col-lg-8">
          <div class="title text-center">
            <h1 class="mb-10">About This Site</h1>
            <p>This is personal blogging site related to Internet of Things &amp; Web Development Tutorials</p>
          </div>
        </div>
      </div>
      <div class="row justify-content-center d-flex align-items-center">
        <div class="col-lg-6 team-left">
          <p>
            Find a blogs and tutorials related to Internet of things, Web Designe, Web Development, GIS Web applications
            and more.
          </p>
          <p>
            This site is made with laravel framework. The theme is <a href="">Blogger Theme</a> and the Admin Panel
            theme is <a href="https://github.com/puikinsh/sufee-admin-dashboard">Sufee Admin</a>.
          </p>
          <p>Checkout the full tutorial how this site is made on <span class="c1">Youtube</span>.</p>
          <h4>About the Creator</h4>
          <br>
          <p>I am <span class="c1">Full stack Web Developer</span> specialized <span class="c1">LARAVEL</span> - PHP.
            Currently Studing GEOSPATIAL SCIENCE and learning <span class="c1">GIS Web Applications Development</span>.
          </p>
          <br>
          <h4>Email: <span style="font-size: medium; font-weight: lighter;">subhadipghorui105@gmail.com</span></h4>
          <br>
          <div class="col-md-12 d-flex justify-content-center py-3 mt-2">
            <a href="https://subhadipghorui.github.io" class="genric-btn info circle arrow mr-md-auto"
              target="_blank">Know More<span class="lnr lnr-arrow-right"></span></a>
          </div>
        </div>
        <div class="col-lg-6 team-right d-flex justify-content-center">
          <div class="row">
            <div class="single-team">
              <div class="thumb">
                <img class="img-fluid w-75 mx-auto" src="{{ asset('fontend') }}/./img/admin.png" alt="admin">
                <div class="align-items-center justify-content-center d-flex">
                  <a href="#"><i class="fab fa-facebook-f" aria-hidden="true"></i></a>
                  <a href="#"><i class="fab fa-youtube" aria-hidden="true"></i></a>
                </div>
              </div>
              <div class="meta-text mt-30 text-center">
                <h4>Subhadip Ghorui</h4>
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