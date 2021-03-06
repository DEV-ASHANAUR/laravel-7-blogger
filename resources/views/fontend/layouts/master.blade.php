<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
  <!-- Mobile Specific Meta -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Favicon-->
  <link rel="shortcut icon" href="{{ asset('fontend') }}/img/apple-touch-icon.png" />
  <!-- token Meta -->
  <meta name="csrf-token" content="{{ csrf_token() }}" >
  <!-- Author Meta -->
  <meta name="author" content="colorlib" />
  <!-- Meta Description -->
  <meta name="description" content="" />
  <!-- Meta Keyword -->
  <meta name="keywords" content="" />
  <!-- meta character set -->
  <meta charset="UTF-8" />
  <!-- Site Title -->
  <title>@yield('title','Fontend Page')</title>

  <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet" />
  <!--
			CSS
			============================================= -->
  <link rel="stylesheet" href="{{ asset('fontend') }}/css/linearicons.css" />
  <link rel="stylesheet" href="{{ asset('fontend') }}/css/font-awesome.min.css" />
  <link rel="stylesheet" href="{{ asset('fontend') }}/css/bootstrap.css" />
  <link rel="stylesheet" href="{{ asset('fontend') }}/css/owl.carousel.css" />
  <link rel="stylesheet" href="{{ asset('fontend') }}/css/main.css" />
  <link rel="stylesheet" href="{{ asset('fontend') }}/emoji/emojionearea.css" />
  <style>
    .menu1 {
      /* border: 1px solid #333; */
      margin-left: -5rem;

    }

    .c1 {
      color: #007bff;
    }
    /* pagination style */
    a.previous-link, a.next-link{
        text-decoration: none;
        display: inline-block;
        padding: 8px 16px;
    }
    span.next-link-disabled, span.previous-link-disabled{
        text-decoration: none;
        display: inline-block;
        padding: 8px 16px;
        background: #f1f1f1;
        color: lightgray;
    }
    a.previous-link, a.next-link{
        background: #dbdc33;
        color: white;
    }
    a.previous-link:hover, a.next-link:hover{
        background: #c3c418;
        color: white;
    }
    /* pagination style */
  </style>
  @yield('style')
</head>

<body>
  <!-- Start Header Area -->
  @include('fontend.layouts.partials.navbar')
  <!-- End Header Area -->

  @yield('content')

  <!-- start footer Area -->
  <footer class="footer-area section-gap">
    <div class="container">
      {{-- <div class="row">
        <div class="col-lg-3 col-md-12">
          <div class="single-footer-widget">
            <h6>Top Products</h6>
            <ul class="footer-nav">
              <li><a href="#">Managed Website</a></li>
              <li><a href="#">Manage Reputation</a></li>
              <li><a href="#">Power Tools</a></li>
              <li><a href="#">Marketing Service</a></li>
            </ul>
          </div>
        </div>
        <div class="col-lg-6 col-md-12">
          <div class="single-footer-widget newsletter">
            <h6>Newsletter</h6>
            <p>
              You can trust us. we only send promo offers, not a single spam.
            </p>
            <div id="mc_embed_signup">
              <form target="_blank" novalidate="true"
                action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01"
                method="get" class="form-inline">
                <div class="form-group row" style="width: 100%">
                  <div class="col-lg-8 col-md-12">
                    <input name="EMAIL" placeholder="Enter Email" onfocus="this.placeholder = ''"
                      onblur="this.placeholder = 'Enter Email '" required="" type="email" />
                    <div style="position: absolute; left: -5000px">
                      <input name="b_36c4fd991d266f23781ded980_aefe40901a" tabindex="-1" value="" type="text" />
                    </div>
                  </div>

                  <div class="col-lg-4 col-md-12">
                    <button class="nw-btn primary-btn">
                      Subscribe<span class="lnr lnr-arrow-right"></span>
                    </button>
                  </div>
                </div>
                <div class="info"></div>
              </form>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-12">
          <div class="single-footer-widget mail-chimp">
            <h6 class="mb-20">Instragram Feed</h6>
            <ul class="instafeed d-flex flex-wrap">
              <li><img src="{{ asset('fontend') }}/img/i1.jpg" alt="" /></li>
              <li><img src="{{ asset('fontend') }}/img/i2.jpg" alt="" /></li>
              <li><img src="{{ asset('fontend') }}/img/i3.jpg" alt="" /></li>
              <li><img src="{{ asset('fontend') }}/img/i4.jpg" alt="" /></li>
              <li><img src="{{ asset('fontend') }}/img/i5.jpg" alt="" /></li>
              <li><img src="{{ asset('fontend') }}/img/i6.jpg" alt="" /></li>
              <li><img src="{{ asset('fontend') }}/img/i7.jpg" alt="" /></li>
              <li><img src="{{ asset('fontend') }}/img/i8.jpg" alt="" /></li>
            </ul>
          </div>
        </div>
      </div> --}}

      <div class="row footer-bottom d-flex justify-content-between">
        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
        <p class="col-lg-8 col-sm-12 footer-text">
          Copyright &copy;
          <script>
            document.write(new Date().getFullYear());
          </script>
         | developed with
          <i class="fa fa-heart-o" aria-hidden="true"></i> by
          <a href="https://dev-ashanur.com" target="_blank">Ashanaur</a>
          | made with
          <i class="fa fa-heart-o" aria-hidden="true"></i> by
          <a href="https://colorlib.com" target="_blank">Colorlib</a>
        </p>
        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
        <div class="col-lg-4 col-sm-12 footer-social">
          <a href="https://www.facebook.com/ashanaur.rahman.16" target="_blank"><i class="fa fa-facebook"></i></a>
          <a href="https://github.com/DEV-ASHANAUR" target="_blank"><i class="fa fa-github"></i></a>
          <a href="mailto:ashanour009@gmail.com"><i class="fa fa-envelope"></i></a>
          <a href="#"><i class="fa fa-google"></i></a>
        </div>
      </div>
    </div>
  </footer>
  <!-- End footer Area -->

  <script src="{{ asset('fontend') }}/js/vendor/jquery-2.2.4.min.js"></script>
  <script src="{{ asset('fontend') }}/https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"
    integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous">
  </script>
  <script src="{{ asset('fontend') }}/js/vendor/bootstrap.min.js"></script>
  <script src="{{ asset('fontend') }}/js/jquery.ajaxchimp.min.js"></script>
  <script src="{{ asset('fontend') }}/js/parallax.min.js"></script>
  <script src="{{ asset('fontend') }}/js/owl.carousel.min.js"></script>
  <script src="{{ asset('fontend') }}/js/jquery.magnific-popup.min.js"></script>
  <script src="{{ asset('fontend') }}/js/jquery.sticky.js"></script>
  <script src="{{ asset('fontend') }}/js/main.js"></script>
  <script src="{{ asset('fontend') }}/emoji/emojionearea.min.js"></script>
  @yield('script')
</body>

</html>
