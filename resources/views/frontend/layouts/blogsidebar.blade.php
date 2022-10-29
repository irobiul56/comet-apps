
<div class="col-md-3">
    <div class="sidebar hidden-sm hidden-xs">
      <div class="widget">
        <h6 class="upper">Search blog</h6>
        <form>
          <input name ="search" type="text" placeholder="Search.." class="form-control">
        </form>
      </div>
      <!-- end of widget        -->

      @php
          $categories = App\Models\Categorypost::All();
          $tags = App\Models\Tagpost::All();
          $blogpost = App\Models\blogpost::latest()->take(6) -> get();
      @endphp
      <div class="widget">
        <h6 class="upper">Categories</h6>
        <ul class="nav">

        @foreach ($categories as $cat)
        <li><a href="{{route('show.blog.post.category', $cat -> slug)}}">{{$cat -> name}}</a>
        </li>
        @endforeach

    
        </ul>
      </div>
      <!-- end of widget        -->
      <div class="widget">
        <h6 class="upper">Popular Tags</h6>
        <div class="tags clearfix">

            @foreach ($tags as $tag)
            <a href="{{route('show.blog.post.tag', $tag -> slug )}}">{{$tag -> name}}</a>     
            @endforeach

        </div>
      </div>
      <!-- end of widget      -->
      <div class="widget">
        <h6 class="upper">Latest Posts</h6>
        <ul class="nav">

            @foreach ($blogpost as $post)
            <li><a href="{{route('show.blog.single.page', $post -> slug )}}">{{$post -> title}}<i class="ti-arrow-right"></i><span>{{date('d F Y', strtotime($post -> created_at))}}</span></a>
            @endforeach

          </li>
        </ul>
      </div>
      <!-- end of widget          -->
    </div>
    <!-- end of sidebar-->
  </div>