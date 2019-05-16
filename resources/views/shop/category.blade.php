@extends('layouts.shopLayout') 
<!-- category -->
@section('content')
<!-- slide -->

<!-- end slide -->
<!-- category -->
<div class="category">
  <div class="content">
    <div class="container">
      <div class="row">
        <div class="category-carousel">
          @foreach($category as $value)
          <div class="col-sm-4 col-md-4 col-lg-4">
            <a href="{{asset('')}}shop/category/{{$value->slug}}" class="banner zoom-in">
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
            <a href="{{asset('')}}shop/detail/{{$value->id}}" class="img-prod"><img class="img-fluid" src="{{asset('')}}storage/{{$value->image}}" alt="QT Template">
              <span class="status">New Arrival</span>
            </a>
            <div class="text py-3 px-3">
              <div class="distance">
                <h3><a href="{{asset('')}}shop/detail/{{$value->id}}">{{$value->name}}</a></h3>
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
      </div>
      <div class="col-md-12 col-lg-12 col-sm">
        {{ $products->links() }}
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
          <a href="{{asset('')}}shop/new/{{$new->slug}}">
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
