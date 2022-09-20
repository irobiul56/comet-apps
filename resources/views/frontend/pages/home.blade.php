@extends('frontend.layouts.app')

@section('frontend-main')
    

<section id="home">
    <!-- Home Slider-->
    <div id="home-slider" class="flexslider">
      <ul class="slides">

        @foreach ($sliders as $slide)
        <li>
          <img src="{{url('storage/sliders/'.  $slide -> photo )}}" alt="">
          <div class="slide-wrap">
            <div class="slide-content">
              <div class="container">
                <h1>{{$slide -> title}}<span class="red-dot"></span></h1>
                <h6>{{ $slide -> subtitle}}</h6>
                <p>

                  @foreach (json_decode($slide -> btns) as $btn)
                    <a href="{{$btn -> btn_link}}" class="btn {{$btn -> btn_type}}">{{$btn -> btn_title}}</a>
                  @endforeach

                </p>
              </div>
            </div>
          </div>
        </li>
        @endforeach
        

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