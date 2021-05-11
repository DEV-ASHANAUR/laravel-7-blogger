@extends('fontend.layouts.master')
@section('title')
    DEV-TECH | CATEGORY 
@endsection
@section('content')
<section class="generic-banner relative">
    <div class="container">
        <div class="row height align-items-center justify-content-center">
            <div class="col-lg-10">
                <div class="generic-banner-content">
                    <h2 class="text-white text-center text-capitalize">THE CATEGORY PAGE</h2>
                    <p class="text-white">
                        This page shows all the categories that available by the site
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="main-wrapper">
    <section class="fashion-area section-gap" id="fashion">
        <div class="container">
          <div class="row">
            @foreach ($categories as $category)
            <div class="col-lg-3 col-md-6 single-fashion">
              <a href="{{ route('category.post',$category->slug) }}">
                <img class="img-fluid" src="{{ asset('storage/category/'.$category->image) }}" alt="{{ $category->image }}" />
              </a>
              <p class="date">{{ $category->created_at->format('D, d M Y') }}</p>
              <h4><a href="{{ route('category.post',$category->slug) }}">{{ $category->name }}</a></h4>
            </div>
            @endforeach
            
          </div>
        </div>
    </section>
</div>
@endsection