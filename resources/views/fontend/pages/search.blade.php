@extends('fontend.layouts.master')
@section('title')
    Posts Page
@endsection
@section('content')
    <!-- Start top-section Area -->
    <!-- Start top-section Area -->
    <section class="top-section-area section-gap">
        <div class="container">
            <div class="row justify-content-center align-items-center d-flex">
                <div class="col-lg-8">
                    <div id="imaginary_container">
                        <form action="{{ route('search') }}" method="GET">
                        <div class="input-group stylish-input-group">
                            <input type="text" name="search" value="{{ $search }}" class="form-control"  placeholder="Addictionwhen gambling" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Addictionwhen gambling '" required="">
                            <span class="input-group-addon">
                                <button type="submit">
                                    <span class="lnr lnr-magnifier"></span>
                                </button>
                            </span>
                        </div>
                        </form>
                    </div>
                    <p class="mt-20 text-center text-white">{{ $posts->count()?? "0" }} results found for “{{ $search ?? "" }}”</p>
                </div>
            </div>
        </div>
    </section>
    <!-- End top-section Area -->
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
                    </div>
                    <div class="justify-content-center d-flex mt-5">
                      {{ $posts->appends(Request::all())->links('fontend.layouts.partials.paginator')}}
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 sidebar-area">
                @include('fontend.layouts.partials.search-bar')
                @include('fontend.layouts.partials.sidebar')  
              </div>
            </div>
          </div>
        </section>
        <!-- End post Area -->
      </div>
      <!-- End post Area -->
@endsection