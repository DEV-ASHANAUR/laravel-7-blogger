<div class="single_widget search_widget">
    <div id="imaginary_container">
    <form action="{{ route('search') }}" method="GET">
      <div class="input-group stylish-input-group">
        <input
          type="text"
          class="form-control"
          placeholder="Search"
          name="search"
          required
        />
        <span class="input-group-addon">
          <button type="submit">
            <span class="lnr lnr-magnifier"></span>
          </button>
        </span>
      </div>
    </form>
    </div>
  </div>

  {{-- <div class="single_widget about_widget">
    <img src="img/asset/s-img.jpg" alt="" />
    <h2 class="text-uppercase">Adele Gonzalez</h2>
    <p>
      MCSE boot camps have its supporters and its detractors. Some
      people do not understand why you should have to spend money
    </p>
    <div class="social-link">
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
    </div>
  </div> --}}

  <div class="single_widget cat_widget">
    <h4 class="text-uppercase pb-20">post categories</h4>
    <ul>
        @foreach ($categories as $category)
            <li>
              <a href="{{ route('category.post',$category->slug) }}">{{ $category->name }} <span>{{ $category->posts->count() }}</span></a>
          </li>
        @endforeach
      

      {{-- <li>
        <a href="#">Lifestyle <span>37</span></a>
      </li>
      <li>
        <a href="#">Fashion <span>37</span></a>
      </li>
      <li>
        <a href="#">Art <span>37</span></a>
      </li>
      <li>
        <a href="#">Food <span>37</span></a>
      </li>
      <li>
        <a href="#">Architecture <span>37</span></a>
      </li>
      <li>
        <a href="#">Adventure <span>37</span></a>
      </li> --}}
    </ul>
  </div>

  <div class="single_widget recent_widget">
    <h4 class="text-uppercase pb-20">Recent Posts</h4>
    <div class="active-recent-carusel">
        @foreach ($recentPost as $recentPost)
      <div class="item">
        <img src="{{ asset('storage/post/'.$recentPost->image) }}" alt="{{ $recentPost->image }}" />
        <a href="{{route('post', $recentPost->slug)}}">
            <p class="mt-20 title text-uppercase">
                {{$recentPost->title}}
            </p>
        </a>
        <p>
          {{ $recentPost->created_at->diffForHumans() }}
          <span>
            <i class="fa fa-heart-o" aria-hidden="true"></i> 06
            <i class="fa fa-comment-o" aria-hidden="true"></i
            >02</span
          >
        </p>
      </div>
      @endforeach
      
    </div>
  </div>

  {{-- <div class="single_widget cat_widget">
    <h4 class="text-uppercase pb-20">post archive</h4>
    <ul>
      <li>
        <a href="#">Dec'17 <span>37</span></a>
      </li>
      <li>
        <a href="#">Nov'17 <span>37</span></a>
      </li>
      <li>
        <a href="#">Oct'17 <span>37</span></a>
      </li>
      <li>
        <a href="#">Sept'17 <span>37</span></a>
      </li>
      <li>
        <a href="#">Aug'17 <span>37</span></a>
      </li>
      <li>
        <a href="#">Jul'17 <span>37</span></a>
      </li>
      <li>
        <a href="#">Jun'17 <span>37</span></a>
      </li>
    </ul>
  </div> --}}

  <div class="single_widget tag_widget">
    <h4 class="text-uppercase pb-20">Tag Clouds</h4>
    <ul>
        @foreach ($recentTags->unique('name')->take(10) as $recentTags)
           <li><a href="{{ route('tag.post',$recentTags->name) }}">{{ $recentTags->name }}</a></li>
        @endforeach
    </ul>
  </div>