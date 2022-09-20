@extends('frontend.layouts.app')

@section('frontend-main')
    

<section class="page-title parallax">
    <div data-parallax="scroll" data-image-src="{{asset('frontend/images/bg/18.jpg')}}" class="parallax-bg"></div>
    <div class="parallax-overlay">
      <div class="centrize">
        <div class="v-center">
          <div class="container">
            <div class="title center">
              <h1 class="upper">Drop a Line<span class="red-dot"></span></h1>
              <h4>Let’s get in touch.</h4>
              <hr>
            </div>
          </div>
          <!-- end of container-->
        </div>
      </div>
    </div>
</section>
@php
   $counter = App\Models\Counter::latest() -> where('status', true) -> where('trash', false) -> get();
@endphp
<section>
    <div class="container">
      <div class="row">
        @foreach ($counter as $count)
        <div class="col-md-3 col-sm-6">
            <div class="counter">
              <div class="counter-icon"><i class="{{$count -> icon}}"></i>
              </div>
              <div class="counter-content">
                <h5><span data-count="{{$count -> number}}" class="number-count">{{$count -> number}}</span><span class="red-dot"></span></h5><span>{{$count -> title}}</span>
              </div>
            </div>
          <!-- end of counter              -->
        </div>
        @endforeach
      </div>
    </div>
</section>

@endsection