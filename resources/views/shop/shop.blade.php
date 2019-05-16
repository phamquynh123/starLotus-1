@extends('layouts.shopLayout') 
<!-- category -->
@section('content')
<!-- slide -->
<div class="slide">
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" style="height:500px">
      <div class="item active " >
        <img src="{{asset('')}}shopasset/images/bg_2.jpg" height="1000" width="1000" alt="Los Angeles">
      </div>

      <div class="item"  >
        <img src="{{asset('')}}shopasset/images/bg_5.jpg" height="1333" width="2000" alt="Chicago">
      </div>

      <div class="item"  >
        <img src="{{asset('')}}shopasset/images/bg_6.jpg" height="965" width="2000" alt="New York">
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <!-- <span class="glyphicon glyphicon-chevron-left"></span> -->
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <!-- <span class="glyphicon glyphicon-chevron-right"></span> -->
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>
<!-- end slide -->
<!-- category -->
<div class="category">
  <div class="content">
    <div class="container">
      <div class="row carousel-way">
        <div class="owl-carousel owl-theme">
          @foreach($category as $value)
          <div class="item">
            <a href="{{asset('')}}shop/category/{{$value->slug}}/{{$_SESSION['lang']}}" class="banner zoom-in url_cate" url="category/{{$value->slug}}">
              <span class="figure">
                <img src="{{asset('')}}storage/{{$value->image}}" alt=""/>
                <span class="figcaption">
                  <span class="block-table">
                    <span class="block-table-cell">
                      <span class="banner__title size5">{{$value->name}}</span>
                      <span class="btn btn--ys btn--xl">Shop now !</span>
                    </span>
                  </span>
                </span>
              </span>
            </a>
          </div>
          @endforeach

        </div>
      </div>
    </div>
  </div>
</div>
<!-- end category -->
<div class="product-cha">
  <section class="ftco-section bg-light">
    <div class="container-fluid">
      <div class="row">

        @foreach($products as $value)

        <div class="col-sm col-md-6 col-lg-3 ftco-animate">
          <div class="product">
            <a href="{{asset('')}}shop/detail/{{$value->id}}/{{$_SESSION['lang']}}" class="img-prod url_detail"  url="detail/{{$value->id}}"><img class="img-fluid" src="{{asset('')}}storage/{{$value->image}}" alt="QT Template">
              <span class="status">New Arrival</span>
            </a>
            <div class="text py-3 px-3">
              <div class="distance">
                <h3><a href="{{asset('')}}shop/detail/{{$value->id}}/{{$_SESSION['lang']}}" url="shop/detail/{{$value->id}}" class="url_detail">{{$value->name}}</a></h3>
                <div class="d-flex">
                  <div class="pricing">
                    <p class="price"><span>{{$value->price}}</span></p>
                  </div>
                </div>

                <div class="rating">
                  <p class="text-right">
                    <span class="ion-ios-star-outline"></span>
                    <span class="ion-ios-star-outline"></span>
                    <span class="ion-ios-star-outline"></span>
                    <span class="ion-ios-star-outline"></span>
                    <span class="ion-ios-star-outline"></span>
                  </p>
                </div>
              </div>
              <hr>
              <p class="bottom-area d-flex">
                <a href="#" class="add-to-cart"><span>Add to cart <i class="ion-ios-add ml-1"></i></span></a>
                <a href="#" class="ml-auto"><span><i class="ion-ios-heart-empty"></i></span></a>
              </p>
            </div>
          </div>
        </div>
        @endforeach
        <div class="col-md-12 col-lg-12 col-sm">
          {{ $products->links() }}
        </div>

      </div>
    </div>
  </div>

</div>
</section>
</div>
<!-- News -->
<section class="home-news js_floatWrap-2-fh clearfix ">
  <div class="container">


    <h4 class="ttl-col abc">NEWS</h4>
    <div class="fh" style="height: auto;">
      <ul>
        @foreach($news as $new)
        <li>
          <a href="{{asset('')}}shop/new/{{$new->slug}}/{{$_SESSION['lang']}}" url="new/{{$new->slug}}" class="url_new">
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
<!-- ENd News -->
<!-- maps -->
<div class="container mapss">
  <div class="row">
    <div class="col-md-6 col-md-6 col-sm-12 col-xs-12 col-12">
     <h2>Show The Way</h2>
     <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.703383227983!2d105.83940911399074!3d21.004523893983276!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ac776f8228e7%3A0x5ad722aa442072ab!2zMTcgR2nhuqNpIFBow7NuZw!5e0!3m2!1svi!2s!4v1557262810055!5m2!1svi!2s" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
   </div>

   <div class="col-md-6 col-md-6 col-sm-12 col-xs-12 col-12 contact">
     <h2>Contact Us</h2>


     <div class="sim-button button6"><a href="#"><i class="fab fa-facebook"></i></a></div>

     <div class="sim-button button6"><a href="#"><i class="fab fa-facebook"></i></a></div>
     
     <div class="sim-button button6"><a href="#"><i class="fab fa-facebook"></i></a></div>

   </div>

 </div>

</div>

<!-- end maps -->

<!-- footer -->

<div class="footer">
  @endsection

  