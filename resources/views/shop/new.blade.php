@extends('layouts.shopLayout') 
<!-- category -->
@section('content')
<section class="ftco-section ftco-degree-bg">
      <div class="container">
        <!-- <div class="row"> -->
          <div class="ftco-animate">
            <h2 class="mb-3">{{$new_tran->title}}</h2>
            <p>{!!$new_tran->content!!}</p>
            <div class="tag-widget post-tag-container mb-5 mt-5">
              <div class="tagcloud">
                <a href="#" class="tag-cloud-link">Life</a>
                <a href="#" class="tag-cloud-link">Sport</a>
                <a href="#" class="tag-cloud-link">Tech</a>
                <a href="#" class="tag-cloud-link">Travel</a>
              </div>
            </div>
            
           

          </div> 

        <!-- </div> -->
      </div>
    </section>
    <section class="home-news js_floatWrap-2-fh clearfix ">
  <div class="container">


    <h4 class="ttl-col abc">NEWS</h4>
    <div class="fh" style="height: auto;">
      <ul>
      @foreach($news as $new)
        <li>
          <a href="{{asset('')}}shop/new/{{$new->slug}}/{{$_SESSION['lang']}}">
            <p class="date"><span>» </span>{{$new->updated_at}}</p>
            <p class="txt"><span>{{$new->name}}</span></p>
          </a>
        </li>
        @endforeach
      </ul>
      <div class="col-md-12 col-lg-12 col-sm">
          {{ $news->links() }}
        </div>
    </div>
  </div>
</section>
@endsection
