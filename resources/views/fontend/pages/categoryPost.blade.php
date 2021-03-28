@extends('fontend.layouts.master')
@section('title')
    Posts Page
@endsection
@section('content')
    <!-- Start top-section Area -->
    <section class="top-section-area section-gap">
        <div class="container">
          <div class="row justify-content-between align-items-center d-flex">
            <div class="col-lg-8 top-left">
              <h1 class="text-white mb-20">All Post :) {{ $category->name }}</h1>
              <ul>
                <li>
                  <a href="index.html">Home</a
                  ><span class="lnr lnr-arrow-right"></span>
                </li>
                <li>
                  <a href="category.html">Category</a
                  ><span class="lnr lnr-arrow-right"></span>
                </li>
                <li><a href="single.html">Posts</a></li>
              </ul>
            </div>
          </div>
        </div>
      </section>
      <!-- End top-section Area -->
  
      <!-- Start post Area -->
      <div class="post-wrapper pt-100">
        <!-- Start post Area -->
        <section class="post-area">
          <div class="container">
            <div class="row justify-content-center d-flex">
              <div class="col-lg-8">
                <div class="top-posts pt-50">
                  <div class="container">
                    <div class="row justify-content-center">
                     @forelse ($posts as $post)
                      <div class="single-posts col-lg-6 col-sm-6">
                        <img class="img-fluid" src="{{ asset('storage/post/'.$post->image) }}" alt="" />
                        <div class="date mt-20 mb-20">{{ $post->created_at->diffForHumans() }}</div>
                        <div class="detail">
                          <a href="{{ route('post',$post->slug) }}"
                            ><h4 class="pb-20">{{ $post->title }}</h4></a>
                          <p>
                            {!! Str::limit($post->body, 400, '...') !!}
                          </p>
                          <p class="footer pt-20">
                            <i class="fa fa-heart-o" aria-hidden="true"></i>
                            <a href="#">06 Likes</a>
                            <i
                              class="ml-20 fa fa-comment-o"
                              aria-hidden="true"
                            ></i>
                            <a href="#">02 Comments</a>
                          </p>
                        </div>
                      </div>
                      @empty
                      <h3>No post availabe</h3>
                      @endforelse
                      <div class="justify-content-center d-flex mt-5">
                        {{ $posts->links()}}
                      </div>
                      {{-- <div class="single-posts col-lg-6 col-sm-6">
                        <img class="img-fluid" src="img/asset/p2.jpg" alt="" />
                        <div class="date mt-20 mb-20">10 Jan 2018</div>
                        <div class="detail">
                          <a href="#"
                            ><h4 class="pb-20">
                              Addiction When Gambling <br />
                              Becomes A Problem
                            </h4></a
                          >
                          <p>
                            inappropriate behavior Lorem ipsum dolor sit amet,
                            consecteturinapprop riate behavior Lorem ipsum dolor
                            sit amet, consectetur.
                          </p>
                          <p class="footer pt-20">
                            <i class="fa fa-heart-o" aria-hidden="true"></i>
                            <a href="#">06 Likes</a>
                            <i
                              class="ml-20 fa fa-comment-o"
                              aria-hidden="true"
                            ></i>
                            <a href="#">02 Comments</a>
                          </p>
                        </div>
                      </div>
                      <div class="single-posts col-lg-6 col-sm-6">
                        <img class="img-fluid" src="img/asset/p1.jpg" alt="" />
                        <div class="date mt-20 mb-20">10 Jan 2018</div>
                        <div class="detail">
                          <a href="#"
                            ><h4 class="pb-20">
                              Addiction When Gambling <br />
                              Becomes A Problem
                            </h4></a
                          >
                          <p>
                            inappropriate behavior Lorem ipsum dolor sit amet,
                            consecteturinapprop riate behavior Lorem ipsum dolor
                            sit amet, consectetur.
                          </p>
                          <p class="footer pt-20">
                            <i class="fa fa-heart-o" aria-hidden="true"></i>
                            <a href="#">06 Likes</a>
                            <i
                              class="ml-20 fa fa-comment-o"
                              aria-hidden="true"
                            ></i>
                            <a href="#">02 Comments</a>
                          </p>
                        </div>
                      </div>
                      <div class="single-posts col-lg-6 col-sm-6">
                        <img class="img-fluid" src="img/asset/p2.jpg" alt="" />
                        <div class="date mt-20 mb-20">10 Jan 2018</div>
                        <div class="detail">
                          <a href="#"
                            ><h4 class="pb-20">
                              Addiction When Gambling <br />
                              Becomes A Problem
                            </h4></a
                          >
                          <p>
                            inappropriate behavior Lorem ipsum dolor sit amet,
                            consecteturinapprop riate behavior Lorem ipsum dolor
                            sit amet, consectetur.
                          </p>
                          <p class="footer pt-20">
                            <i class="fa fa-heart-o" aria-hidden="true"></i>
                            <a href="#">06 Likes</a>
                            <i
                              class="ml-20 fa fa-comment-o"
                              aria-hidden="true"
                            ></i>
                            <a href="#">02 Comments</a>
                          </p>
                        </div>
                      </div>
                      <div class="single-posts col-lg-6 col-sm-6">
                        <img class="img-fluid" src="img/asset/p1.jpg" alt="" />
                        <div class="date mt-20 mb-20">10 Jan 2018</div>
                        <div class="detail">
                          <a href="#"
                            ><h4 class="pb-20">
                              Addiction When Gambling <br />
                              Becomes A Problem
                            </h4></a
                          >
                          <p>
                            inappropriate behavior Lorem ipsum dolor sit amet,
                            consecteturinapprop riate behavior Lorem ipsum dolor
                            sit amet, consectetur.
                          </p>
                          <p class="footer pt-20">
                            <i class="fa fa-heart-o" aria-hidden="true"></i>
                            <a href="#">06 Likes</a>
                            <i
                              class="ml-20 fa fa-comment-o"
                              aria-hidden="true"
                            ></i>
                            <a href="#">02 Comments</a>
                          </p>
                        </div>
                      </div>
                      <div class="single-posts col-lg-6 col-sm-6">
                        <img class="img-fluid" src="img/asset/p2.jpg" alt="" />
                        <div class="date mt-20 mb-20">10 Jan 2018</div>
                        <div class="detail">
                          <a href="#"
                            ><h4 class="pb-20">
                              Addiction When Gambling <br />
                              Becomes A Problem
                            </h4></a
                          >
                          <p>
                            inappropriate behavior Lorem ipsum dolor sit amet,
                            consecteturinapprop riate behavior Lorem ipsum dolor
                            sit amet, consectetur.
                          </p>
                          <p class="footer pt-20">
                            <i class="fa fa-heart-o" aria-hidden="true"></i>
                            <a href="#">06 Likes</a>
                            <i
                              class="ml-20 fa fa-comment-o"
                              aria-hidden="true"
                            ></i>
                            <a href="#">02 Comments</a>
                          </p>
                        </div>
                      </div>
                      <div class="single-posts col-lg-6 col-sm-6">
                        <img class="img-fluid" src="img/asset/p1.jpg" alt="" />
                        <div class="date mt-20 mb-20">10 Jan 2018</div>
                        <div class="detail">
                          <a href="#"
                            ><h4 class="pb-20">
                              Addiction When Gambling <br />
                              Becomes A Problem
                            </h4></a
                          >
                          <p>
                            inappropriate behavior Lorem ipsum dolor sit amet,
                            consecteturinapprop riate behavior Lorem ipsum dolor
                            sit amet, consectetur.
                          </p>
                          <p class="footer pt-20">
                            <i class="fa fa-heart-o" aria-hidden="true"></i>
                            <a href="#">06 Likes</a>
                            <i
                              class="ml-20 fa fa-comment-o"
                              aria-hidden="true"
                            ></i>
                            <a href="#">02 Comments</a>
                          </p>
                        </div>
                      </div>
                      <div class="single-posts col-lg-6 col-sm-6">
                        <img class="img-fluid" src="img/asset/p2.jpg" alt="" />
                        <div class="date mt-20 mb-20">10 Jan 2018</div>
                        <div class="detail">
                          <a href="#"
                            ><h4 class="pb-20">
                              Addiction When Gambling <br />
                              Becomes A Problem
                            </h4></a
                          >
                          <p>
                            inappropriate behavior Lorem ipsum dolor sit amet,
                            consecteturinapprop riate behavior Lorem ipsum dolor
                            sit amet, consectetur.
                          </p>
                          <p class="footer pt-20">
                            <i class="fa fa-heart-o" aria-hidden="true"></i>
                            <a href="#">06 Likes</a>
                            <i
                              class="ml-20 fa fa-comment-o"
                              aria-hidden="true"
                            ></i>
                            <a href="#">02 Comments</a>
                          </p>
                        </div>
                      </div>
                      <div class="single-posts col-lg-6 col-sm-6">
                        <img class="img-fluid" src="img/asset/p1.jpg" alt="" />
                        <div class="date mt-20 mb-20">10 Jan 2018</div>
                        <div class="detail">
                          <a href="#"
                            ><h4 class="pb-20">
                              Addiction When Gambling <br />
                              Becomes A Problem
                            </h4></a
                          >
                          <p>
                            inappropriate behavior Lorem ipsum dolor sit amet,
                            consecteturinapprop riate behavior Lorem ipsum dolor
                            sit amet, consectetur.
                          </p>
                          <p class="footer pt-20">
                            <i class="fa fa-heart-o" aria-hidden="true"></i>
                            <a href="#">06 Likes</a>
                            <i
                              class="ml-20 fa fa-comment-o"
                              aria-hidden="true"
                            ></i>
                            <a href="#">02 Comments</a>
                          </p>
                        </div>
                      </div>
                      <div class="single-posts col-lg-6 col-sm-6">
                        <img class="img-fluid" src="img/asset/p2.jpg" alt="" />
                        <div class="date mt-20 mb-20">10 Jan 2018</div>
                        <div class="detail">
                          <a href="#"
                            ><h4 class="pb-20">
                              Addiction When Gambling <br />
                              Becomes A Problem
                            </h4></a
                          >
                          <p>
                            inappropriate behavior Lorem ipsum dolor sit amet,
                            consecteturinapprop riate behavior Lorem ipsum dolor
                            sit amet, consectetur.
                          </p>
                          <p class="footer pt-20">
                            <i class="fa fa-heart-o" aria-hidden="true"></i>
                            <a href="#">06 Likes</a>
                            <i
                              class="ml-20 fa fa-comment-o"
                              aria-hidden="true"
                            ></i>
                            <a href="#">02 Comments</a>
                          </p>
                        </div>
                      </div>
                      <div class="justify-content-center d-flex">
                        <a
                          class="text-uppercase primary-btn loadmore-btn mt-70 mb-60"
                          href="#"
                        >
                          Load More Post</a
                        >
                      </div> --}}
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 sidebar-area">
                @include('fontend.layouts.partials.sidebar')  
              </div>
            </div>
          </div>
        </section>
        <!-- End post Area -->
      </div>
      <!-- End post Area -->
@endsection