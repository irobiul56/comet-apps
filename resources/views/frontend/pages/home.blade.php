@extends('frontend.layouts.app')

@section('frontend-main')
    

<section id="home">
    <!-- Home Slider-->
    <div id="home-slider" class="flexslider">
      <ul class="slides">
        <li>
          <img src="frontend/images/bg/1.jpg" alt="">
          <div class="slide-wrap">
            <div class="slide-content">
              <div class="container">
                <h1>Digital Power<span class="red-dot"></span></h1>
                <h6>We are a small design studio from San Francisco.</h6>
                <p><a href="#" class="btn btn-light-out">Read More</a><a href="#" class="btn btn-color btn-full">Services</a>
                </p>
              </div>
            </div>
          </div>
        </li>
        <li>
          <img src="frontend/images/bg/2.jpg" alt="">
          <div class="slide-wrap">
            <div class="slide-content">
              <div class="container">
                <h1>We Are Comet<span class="red-dot"></span></h1>
                <h6>Experts in web design and development.</h6>
                <p><a href="#" class="btn btn-color">Explore</a><a href="#" class="btn btn-light-out">Join us</a>
                </p>
              </div>
            </div>
          </div>
        </li>
      </ul>
    </div>
    <!-- End Home Slider-->
</section>
  <!-- End Home Section-->

    @include('frontend.pages.section.about')
    @include('frontend.pages.section.expertise')
    @include('frontend.pages.section.vision')
    @include('frontend.pages.section.portfolio')
    @include('frontend.pages.section.clients')
    @include('frontend.pages.section.testimonials')
    @include('frontend.pages.section.blog')



@endsection