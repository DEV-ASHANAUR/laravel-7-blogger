@extends('fontend.layouts.master')
@section('title')
    Post Page
@endsection
@section('style')
    <style>
      .red{
        color:red!important;
      }
    </style>
@endsection
@section('content')
    <!-- Start top-section Area -->
    <section class="top-section-area section-gap">
        <div class="container">
          <div class="row justify-content-between align-items-center d-flex">
            <div class="col-lg-8 top-left">
              <h1 class="text-white mb-20">Post Details</h1>
              <ul>
                <li>
                  <a href="index.html">Home</a
                  ><span class="lnr lnr-arrow-right"></span>
                </li>
                <li>
                  <a href="category.html">Post</a
                  ><span class="lnr lnr-arrow-right"></span>
                </li>
                <li><a href="single.html">Details</a></li>
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
            <div class="row justify-content-center">
              <div class="col-lg-8">
                <div class="single-page-post">
                  <img class="img-fluid" src="{{ asset('storage/post/'.$post->image) }}" alt="" />
                  <div class="top-wrapper">
                    <div class="row d-flex justify-content-between">
                      <h2 class="col-lg-8 col-md-12 text-uppercase">
                        {{ $post->title }}
                      </h2>
                      <div
                        class="col-lg-4 col-md-12 right-side d-flex justify-content-end"
                      >
                        <div class="desc">
                          @if (!empty($post->user_id))
                              <h2 class="mb-2">{{ $post->user->name }}</h2>
                          @else
                              <h2 class="mb-2">{{ $post->admin->name }}</h2>
                          @endif
                          <h3>{{ $post->created_at->diffForHumans() }}</h3>
                        </div>
                        <div class="user-img">
                          @if (!empty($post->user_id))
                            <img src="{{ (!empty($post->user->image))?(asset('storage/profile/'.$post->user->image)):(asset('media/profile.jpg')) }}" width="50px" height="auto" alt="" />
                          @else
                            <img src="{{ (!empty($post->admin->image))?(asset('storage/profile/'.$post->admin->image)):(asset('backend/assets/images/author/avatar.png')) }}" width="50px" height="50px" alt="" />
                          @endif
                          
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="tags">
                    <ul>
                      @foreach ($post->tags as $tag)
                      <li><a href="{{ route('tag.post',$tag->name) }}">{{ $tag->name }}</a></li>
                      @endforeach
                    </ul>
                  </div>
                  <div class="tags">
                    <ul>
                      <li><a href="{{ route('category.post',$post->category->slug) }}">Category : {{ $post->category->name }}</a></li>
                    </ul>
                  </div>
                  <div class="single-post-content">
                    <p>
                        {!! $post->body !!}
                    </p>
                  </div>
                  <div class="bottom-wrapper">
                    <div class="row">
                      <div class="col-lg-3 single-b-wrap col-md-12">
                        <input type="hidden" id="post_id" value="{{ $post->id }}">
                        @guest
                          <a href="#" class="likeoff"><i class="fa fa-heart-o" aria-hidden="true"></i></a>
                          {{-- {{ $post->likedUsers->count() }} people like this --}}
                          <span id="total_like"></span> people like this
                        @else
                          <a href="#" class="likebtn">
                            <i class="fa fa-heart" aria-hidden="true" ></i>
                          </a>
                          <span id="total_like"></span> people like this
                          {{-- <a href="#" onclick="document.getElementById('like-from-{{ $post->id }}').submit();"><i class="fa fa-heart" aria-hidden="true" style="color: {{ Auth::user()->likedPost()->where('post_id',$post->id)->count() > 0?'red':'' }}"></i>
                          </a>
                          {{ $post->likedUsers->count() }} people like this
                          <form action="{{ route('post.like',$post->id) }}" id="like-from-{{ $post->id }}" method="POST" style="display:none">
                          @csrf
                          </form> --}}
                        @endguest
                      </div>
                      <div class="col-lg-3 single-b-wrap col-md-12">
                        <i class="fa fa-eye" aria-hidden="true"></i> {{ $post->view_count }}
                        views
                      </div>
                      <div class="col-lg-3 single-b-wrap col-md-12">
                        <i class="fa fa-comment-o" aria-hidden="true"></i> {{ $post->comments->count() }}
                        comments
                      </div>
                      <div class="col-lg-3 single-b-wrap col-md-12">
                        <ul class="social-icons">
                          <li>
                            <a href="#"
                              ><i class="fa fa-facebook" aria-hidden="true"></i
                            ></a>
                          </li>
                          <li>
                            <a href="#"
                              ><i class="fa fa-twitter" aria-hidden="true"></i
                            ></a>
                          </li>
                          <li>
                            <a href="#"
                              ><i class="fa fa-dribbble" aria-hidden="true"></i
                            ></a>
                          </li>
                          <li>
                            <a href="#"
                              ><i class="fa fa-behance" aria-hidden="true"></i
                            ></a>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
  
                  {{-- <!-- Start nav Area -->
                  <section class="nav-area pt-50 pb-100">
                    <div class="container">
                      <div class="row justify-content-between">
                        <div
                          class="col-sm-6 nav-left justify-content-start d-flex"
                        >
                          <div class="thumb">
                            <img src="img/prev.jpg" alt="" />
                          </div>
                          <div class="details">
                            <p>Prev Post</p>
                            <h4 class="text-uppercase">
                              <a href="#">A Discount Toner</a>
                            </h4>
                          </div>
                        </div>
                        <div
                          class="col-sm-6 nav-right justify-content-end d-flex"
                        >
                          <div class="details">
                            <p>Prev Post</p>
                            <h4 class="text-uppercase">
                              <a href="#">A Discount Toner</a>
                            </h4>
                          </div>
                          <div class="thumb">
                            <img src="img/next.jpg" alt="" />
                          </div>
                        </div>
                      </div>
                    </div>
                  </section>
                  <!-- End nav Area --> --}}
  
                  <!-- Start comment-sec Area -->
                  <section class="comment-sec-area pt-80 pb-80">
                    <div class="container">
                      <div class="row flex-column">
                        <h5 class="text-uppercase pb-80">{{ $post->comments->count() }} Comments</h5>
                        <br />
                        <!-- Frist Comment -->
                        <div class="comment">
                          @foreach ($post->comments as $comment)
                          <div class="comment-list">
                            <div
                              class="single-comment justify-content-between d-flex"
                            >
                              <div class="user justify-content-between d-flex">
                                <div class="thumb">
                                  {{-- <img src="{{ asset('fontend') }}/img/default.jpg" width="40px" height="40px" alt="" /> --}}

                                  @if (!empty($comment->user_id))
                                    <img src="{{ (!empty($comment->user->image))?(asset('storage/profile/'.$comment->user->image)):(asset('fontend/img/default.jpg')) }}" width="40px" height="40px" alt="" />
                                  @else
                                    <img src="{{ (!empty($comment->admin->image))?(asset('storage/profile/'.$comment->admin->image)):(asset('fontend/img/default.jpg')) }}" width="40px" height="40px" alt="" />
                                  @endif
                                </div>
                                <div class="desc">
                                  @if (!empty($comment->user_id))
                                      <h5 class="text-capitalize">{{ $comment->user->name }}</h5>
                                  @else
                                      <h5 class="text-capitalize">{{ $comment->admin->name }}</h5>
                                  @endif
                                  <p class="date">{{ $comment->created_at->format('D, d M Y H:i') }}</p>
                                  <p class="comment text-capitalize">
                                    {{ $comment->comment }}
                                  </p>
                                </div>
                              </div>
                              <div class="">
                                @if (Auth::guard('admin')->check() || Auth::guard('web')->check())
                                <button class="btn-reply text-uppercase" id="reply-btn" 
                                  onclick="showReplyForm('{{ $comment->id }}','{{ (!empty($comment->user_id))?$comment->user->name:$comment->admin->name }}')">reply</button
                                >
                                @endif
                              </div>
                            </div>
                          </div>
                      
                          @forelse ($comment->replies as $reply)
                          
                          <div class="comment-list left-padding">
                            <div
                              class="single-comment justify-content-between d-flex"
                            >

                              <div class="user justify-content-between d-flex">
                                <div class="thumb">
                                  @if (!empty($reply->user_id))
                                    <img src="{{ (!empty($reply->user->image))?(asset('storage/profile/'.$reply->user->image)):(asset('fontend/img/default.jpg')) }}" width="40px" height="40px" alt="" />
                                  @else
                                    <img src="{{ (!empty($reply->admin->image))?(asset('storage/profile/'.$reply->admin->image)):(asset('fontend/img/default.jpg')) }}" width="40px" height="40px" alt="" />
                                  @endif
                                </div>
                                <div class="desc">
                                  @if (!empty($reply->user_id))
                                      <h5 class="text-capitalize">{{ $reply->user->name }}</h5>
                                  @else
                                      <h5 class="text-capitalize">{{ $reply->admin->name }}</h5>
                                  @endif
                                  <p class="date">{{ $reply->created_at->format('D, d M Y H:i') }}</p>
                                  <p class="comment">
                                    {{ $reply->reply }}
                                  </p>
                                </div>
                              </div>

                              <div class="">
                                @if (Auth::guard('admin')->check() || Auth::guard('web')->check())
                                <button class="btn-reply text-uppercase" id="reply-btn" 
                                  onclick="showReplyForm('{{ $comment->id }}','{{ (!empty($reply->user_id))?$reply->user->name:$reply->admin->name }}')">reply</button
                                >
                                @endif
                              </div>

                            </div>
                          </div> 
                              
                          @empty
                              
                          @endforelse
                          <div class="comment-list left-padding" id="reply-form-{{ $comment->id }}" style="display: none">
                            <div
                              class="single-comment justify-content-between d-flex"
                            >
                              <div class="user justify-content-between d-flex">
                                <div class="thumb">
                                  <img src="img/asset/c2.jpg" alt="" />
                                </div>
                                <div class="desc">
                                  <h5>
                                    
                                    
                                    @if (Auth::guard('admin')->check() || Auth::guard('web')->check())
                                      @if (Auth::guard('admin')->check())
                                          {{ Auth::guard('admin')->user()->name }}
                                      @else
                                        {{ Auth::guard('web')->user()->name }}
                                      @endif
                                    @endif
                                    
                                  </h5>
                                  <p class="date">December 4, 2017 at 3:12 pm</p>
                                  <div class="row flex-row d-flex">
                                  <form action="{{ route('reply.store',$comment->id) }}" method="POST">
                                    @csrf
                                    <div class="col-lg-12">
                                      <textarea
                                        id="reply-form-{{ $comment->id }}-text"
                                        cols="60"
                                        rows="2"
                                        class="form-control mb-10"
                                        name="reply"
                                        placeholder="Messege"
                                        onfocus="this.placeholder = ''"
                                        onblur="this.placeholder = 'reply'"
                                        required=""
                                      ></textarea>
                                    </div>
                                    <button type="submit" class="btn-reply text-uppercase ml-3">Reply</button>
                                  </form>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          @endforeach
                        </div>
                        {{-- <!-- 2nd Comment -->
                        <div class="comment">
                          <div class="comment-list">
                            <div
                              class="single-comment justify-content-between d-flex"
                            >
                              <div class="user justify-content-between d-flex">
                                <div class="thumb">
                                  <img src="img/asset/c1.jpg" alt="" />
                                </div>
                                <div class="desc">
                                  <h5><a href="#">Emilly Blunt</a></h5>
                                  <p class="date">December 4, 2017 at 3:12 pm</p>
                                  <p class="comment">
                                    Never say goodbye till the end comes!
                                  </p>
                                </div>
                              </div>
                              <div class="">
                                <button class="btn-reply text-uppercase" id="reply-btn" 
                                  onclick="showReplyForm('2','Emilly Blunt')">reply 2</button
                                >
                              </div>
                            </div>
                          </div>
                          <div class="comment-list left-padding">
                            <div
                              class="single-comment justify-content-between d-flex"
                            >
                              <div class="user justify-content-between d-flex">
                                <div class="thumb">
                                  <img src="img/asset/c3.jpg" alt="" />
                                </div>
                                <div class="desc">
                                  <h5><a href="#">Sally Sally</a></h5>
                                  <p class="date">December 4, 2017 at 3:12 pm</p>
                                  <p class="comment">
                                    @Emilly Blunt Never say goodbye till the end comes!
                                  </p>
                                </div>
                              </div>
                              <div class="">
                                <button class="btn-reply text-uppercase" id="reply-btn" 
                                  onclick="showReplyForm('2','Sally Sally')">reply 2</button
                                >
                              </div>
                            </div>
                          </div>
                          <div class="comment-list left-padding" id="reply-form-2" style="display: none">
                            <div
                              class="single-comment justify-content-between d-flex"
                            >
                              <div class="user justify-content-between d-flex">
                                <div class="thumb">
                                  <img src="img/asset/c2.jpg" alt="" />
                                </div>
                                <div class="desc">
                                  <h5><a href="#">Goerge Stepphen</a></h5>
                                  <p class="date">December 4, 2017 at 3:12 pm</p>
                                  <div class="row flex-row d-flex">
                                    <form action="#" method="POST">
                                    <div class="col-lg-12">
                                      <textarea
                                        id="reply-form-2-text"
                                        cols="60"
                                        rows="2"
                                        class="form-control mb-10"
                                        name="message"
                                        placeholder="Messege"
                                        onfocus="this.placeholder = ''"
                                        onblur="this.placeholder = 'Messege'"
                                        required=""
                                      ></textarea>
                                    </div>
                                    <button type="submit" class="btn-reply text-uppercase ml-3">Reply</button>
                                    </form>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div> --}}
                      </div>
                    </div>
                  </section>
                  <!-- End comment-sec Area -->
  
                  <!-- Start commentform Area -->
                  @if (Auth::guard('admin')->check() || Auth::guard('web')->check())
                  <section class="commentform-area pb-120 pt-80 mb-100">
                    <div class="container">
                      <h5 class="text-uppercas pb-50">Leave a Comment</h5>
                      <div class="row flex-row d-flex">
                        <div class="col-lg-12">
                          <form action="{{ route('comment.store',$post->id) }}" method="POST">
                            @csrf
                            <textarea
                            class="form-control mb-10 example1"
                            name="comment"
                            id="example1"
                            placeholder="Enter Comment.."
                            onfocus="this.placeholder = ''"
                            onblur="this.placeholder = 'Enter Comment..'"
                            required=""
                          ></textarea>
                            <button type="submit" class="primary-btn mt-20">Comment</button>
                          </form>
                        </div>
                      </div>
                    </div>
                  </section>
                  @else
                  <div class="container mb-4 mt-4">
                    <h4>Please Sign in to post comments - <a href="{{route('login')}}">Sing in</a> or <a href="{{route('register')}}">Register</a></h4>
                  </div>
                  @endif

                  
                  <!-- End commentform Area -->
                </div>
              </div>
              <div class="col-lg-4 sidebar-area">
                @include('fontend.layouts.partials.search-bar')

                <div class="single_widget about_widget">
                  @if (!empty($post->user_id))
                    <img src="{{ (!empty($post->user->image))?(asset('storage/profile/'.$post->user->image)):(asset('media/profile.jpg')) }}" class="img-thumbnail" width="123" height="122" alt="" />
                  @else
                    <img src="{{ (!empty($post->admin->image))?(asset('storage/profile/'.$post->admin->image)):(asset('backend/assets/images/author/avatar.png')) }}" class="img-thumbnail" width="123" height="122" alt="" />
                  @endif
                  
                  @if (!empty($post->user_id))
                      <h2 class="text-uppercase">{{ $post->user->name }}</h2>
                  @else
                      <h2 class="text-uppercase">{{ $post->admin->name }}</h2>
                  @endif

                  @if (!empty($post->user_id))
                      @if (!empty($post->user->about))
                        <p class="text-uppercase">{!! $post->user->about !!}</p>
                      @else
                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Eligendi, impedit architecto minima vel fugiat ex fuga culpa, voluptates suscipit magnam, expedita eveniet! Quos nam ut hic esse in, odit non!</p> 
                      @endif
                  @else
                      @if (!empty($post->admin->about))
                        <p class="text-uppercase">{!! $post->admin->about !!}</p>
                      @else
                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Eligendi, impedit architecto minima vel fugiat ex fuga culpa, voluptates suscipit magnam, expedita eveniet! Quos nam ut hic esse in, odit non!</p> 
                      @endif
                      
                  @endif
                  {{--<div class="social-link">
                    <a href="#"
                      ><button class="btn">
                        <i class="fa fa-facebook" aria-hidden="true"></i> Like
                      </button></a
                    >
                    <a href="#"
                      ><button class="btn">
                        <i class="fa fa-twitter" aria-hidden="true"></i> follow
                      </button></a
                    >
                  </div>--}}
                </div>
                  @include('fontend.layouts.partials.sidebar')                
              </div>
            </div>
          </div>
        </section>
        <!-- End post Area -->
      </div>
      <!-- End post Area -->
@endsection

@section('script')
    <script type="text/javascript">
      $.ajaxSetup({
          headers:{
            'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
          }
        });
        // count all like
        function getLike(){
          post_id = $('#post_id').val();
          $.ajax({
            url:"{{route('get.like')}}",
            type:"GET",
            data:{post_id:post_id},
            success:function(data){
              // alert(data);
              $('#total_like').html(data);
            }
          });
          
        }
        // check user like or not
        function checkUser(){
          post_id = $('#post_id').val();
          $.ajax({
            url:"{{route('check.like')}}",
            type:"GET",
            data:{post_id:post_id},
            success:function(data){
              if(data == 1){
                $('.likebtn i').addClass('red');
              }else{
                $('.likebtn i').removeClass('red');
              }
            }
          });
        }
        //script for like and unlike
        $( ".likebtn" ).click(function( event ) {
          event.preventDefault();
          post_id = $('#post_id').val();
          // alert(post_id);
          $.ajax({
            url:"{{route('post.like')}}",
            type:"POST",
            data:{post:post_id},
            success:function(data){
              checkUser();
              getLike();
            }
          });
        });
        //when not authenticate
        $(".likeoff").click(function(e){
          e.preventDefault();
          alert("please Login First!");
        });
        
        checkUser();
        getLike();

    </script>
    <script>
      function showReplyForm(commentId,user) {
      var x = document.getElementById(`reply-form-${commentId}`);
      var input = document.getElementById(`reply-form-${commentId}-text`);

      if (x.style.display === "none") {
        x.style.display = "block";
        input.innerText=`@${user} `;

      } else {
        x.style.display = "none";
      }
    }
    </script>
    //emojioneArea
    <script>
      $(document).ready(function() {
        $(".example1").emojioneArea();
      });
    </script>
@endsection