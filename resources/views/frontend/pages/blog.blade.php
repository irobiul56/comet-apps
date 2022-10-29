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
if (isset($_GET['search'])) {
  $key = $_GET['search'];
  $blogpost = App\Models\blogpost::where('title', 'LIKE', '%'. $key .'%') -> get();
}    
@endphp
<section>
    <div class="container">
      <div class="row">
        <div class="col-md-9">
          <div class="blog-masonry two-col" style="position: relative; height: 1516.25px;">


            @foreach ($blogpost as $post)
            <div class="masonry-post" style="position: absolute; left: 0px; top: 0px;">
              <article class="post-single">
                <div class="post-info">
                  <h2><a href="{{route('show.blog.single.page', $post -> slug)}}">{{$post -> title}}</a></h2>
                  <h6 class="upper"><span>By</span><a href="#"> {{$post -> author -> name}}</a><span class="dot"></span><span>{{date('d F Y', strtotime($post -> created_at))}}</span><span class="dot"></span>
                    
                    @foreach ($post -> tag as $tags)
                    <a href="#" class="post-tag">{{$tags -> name}}</a>  
                    @endforeach
                  
                  </h6>
                </div>
                <div class="post-media">
                  <a href="{{route('show.blog.single.page', $post -> slug)}}">
                    <img src="{{url('storage/featured/'. $post -> featured )}}" alt="">
                  </a>
                </div>
                <div class="post-body">
                  {!! Str::of(htmlspecialchars_decode($post -> content)) -> words(30) !!}
                </div>
              </article>
            </div>
            @endforeach
            
            <!-- end of article      -->
          </div>



          <ul class="pagination">
            <li><a href="#" aria-label="Previous"><span aria-hidden="true"><i class="ti-arrow-left"></i></span></a>
            </li>
            <li class="active"><a href="#">1</a>
            </li>
            <li><a href="#">2</a>
            </li>
            <li><a href="#">3</a>
            </li>
            <li><a href="#">4</a>
            </li>
            <li><a href="#">5</a>
            </li>
            <li><a href="#" aria-label="Next"><span aria-hidden="true"><i class="ti-arrow-right"></i></span></a>
            </li>
          </ul>
          
          <!-- end of pagination-->
        </div>

       @include('frontend.layouts.blogsidebar');


      </div>
      <!-- end of row-->
    </div>
    <!-- end of container-->

  </section>

@endsection