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
              <h3 class="text-white mb-20 text-capitalize">TAG POST -> {{ $query }}</h3>
              <ul>
                <li>
                  <a href="{{ route('home.index') }}">Home</a
                  ><span class="lnr lnr-arrow-right"></span>
                </li>
                <li>
                  <a href="#">Tag</a
                  ><span class="lnr lnr-arrow-right"></span>
                </li>
                <li><a href="#">Posts</a></li>
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
                    <div class="row">
                     @forelse ($tags as $tag)
                      <div class="single-posts col-lg-6 col-sm-6">
                        <img class="img-fluid" src="{{ asset('storage/post/'.$tag->post->image) }}" alt="" />
                        <div class="date mt-20 mb-20">{{ $tag->post->created_at->diffForHumans() }}</div>
                        <div class="detail">
                          <a href="{{ route('post',$tag->post->slug) }}"
                            ><h4 class="pb-20">{{ $tag->post->title }}</h4></a>
                          <p>
                            {!! Str::limit($tag->post->body, 400, '...') !!}
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
                    </div>
                    <div class="justify-content-center d-flex mt-5">
                      {{ $tags->appends(Request::all())->links('fontend.layouts.partials.paginator')}}
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