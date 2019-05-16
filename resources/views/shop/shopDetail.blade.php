@extends('layouts.shopLayout') 
<!-- category -->
@section('content')
<div class="category">
  <div class="content">
    <div class="container">
      <div class="row">
        <div class="category-carousel">
          @foreach($category as $value)
          <div class="col-sm-4 col-md-4 col-lg-4">
            <a href="{{asset('')}}shop/category/{{$value->slug}}/{{$_SESSION['lang']}}" class="banner zoom-in">
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
<!-- content -->
<section class="ftco-section bg-light product_single">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 mb-5 ftco-animate">
        {{--   <a href="images/menu-2.jpg" class="image-popup"><img src="images/product-1.jpg" class="img-fluid" alt="Colorlib Template"></a> --}}
        <div class="product-entry">
          <div class="product-img">
            @foreach ($images as $image)     

            <div class="mySlides" style="height: 375px">
              <img src="{{ asset('') }}storage/{{$image->link}}" style="width:100%;height: 375px;object-fit: cover" class="zoom" data-zoom-image="{{ asset('') }}storage/{{$image->link}}">

            </div>
            {{--  <p class="tag"><span class="sale">Sale</span></p> --}}
            @endforeach
          </div>
          <div class="thumb-nail">
            @foreach ($images as $key => $image)
            <div class="column">
              <img class="demo cursor" src="{{ asset('') }}storage/{{$image->link}}" style="width:100%;height: 75px" onclick="currentSlide({{$key}})"  >
            </div>

            @endforeach
          </div>

        </div>
      </div>
      <div class="col-lg-6 product-details pl-md-5 ftco-animate">
        <h3 class="pro_name">{{$product->name}}</h3>
        {{-- <p class="price"><span>{{$product_translate->price}}</span></p> --}}
        <p>
          {!!$product_translate->description!!}
        </p>
        {{-- <form action="#" method="POST" role="form">  --}}
          @csrf
          <div class="form-group">
            <label for="">Quantity</label>
            <p class="form-control quan" style="opacity: 0.5; width:50%"> {{$product->quantity}} </p>
          </div>
          <div class="form-group">
            <label for="">Price</label>
            <p class="form-control proprice" style="opacity: 0.5; width:50%">{{$product_translate->price}} </p>
            @if($product_translate->price=='')
            <p>Liên hệ người bán  </p>
            @endif
          </div>
          <div class="row row-pb-sm">
            <div class="col-md-4">
              <label for="">Purchased quantity</label>
              <div class="input-group">
                <span class="input-group-btn minus">
                  <button type="button" class=" btn quantity-left-minus">
                    <i class="fa fa-minus" aria-hidden="true"></i>
                  </button>
                </span>
                <input type="number" id="quantity" name="quantity" class="form-control" value="1" min="1">
                <span class="input-group-btn plus">
                  <button type="button" class=" btn quantity-right-plus">
                    <i class="fa fa-plus" aria-hidden="true"></i>
                  </button>
                </span>
              </div>
            </div>
          </div>
        {{-- </form> --}}
        <p>
          <a href="#" class="btn btn-info py-3 px-5 btn-addtocart" product_id={{$product->id}}>Add to Cart</a>
          <a href="#" class="btn btn-success py-3 px-5 viewCart"  data-toggle="modal" data-target="#myModal">View Cart</a>
        </p>
      </div>
    </div>
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

<!-- cart -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog  modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">
        <table class="table table-hover">
          <thead>
            <tr>
              <th>Product</th>
              <th>Image</th>  
              <th>Price</th>
              <th>Quantity</th>
              <th>Total</th>
              <th>Delete</th>
            </tr>
          </thead>
          <tbody class="tbdy">

          </tbody>
        </table>
        <div class="row justify-content-end">
          <div class="col col-lg-5 col-md-6 mt-5 cart-wrap ftco-animate" style="float:right">
            <div class="cart-total mb-3">
              <h3>Cart Totals</h3>
              {{-- <p class="d-flex">
                <span>Subtotal</span>
                <span class="subtotal"></span>
              </p>
              <p class="d-flex">
                <span>Delivery</span>
                <span>0</span>
              </p>
              <p class="d-flex">
                <span>Discount</span>
                <span>0</span>
              </p> --}}
              <hr>
              <p class="d-flex total-price">
                <span>Total :</span>
                <span class="total"></span>
              </p>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer proceed">

      </div>
    </div>

  </div>
</div>
<!-- end content -->

<!-- Modal -->
<div id="checkOut" class="modal fade" role="dialog">
  <div class="modal-dialog">

   <!-- Modal content-->
   <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title"> Customer's Information.</h4>
    </div>
    <form action="" method="POST" role="form">
      @csrf
      <div class="modal-body">
        <p>Name</p>
        <input type="text" name="name" class="form-control name" >
      </div>
      <div class="modal-body">
        <p>Gender</p>
        <input type="radio" name="gender" class="gender" value="men" >Men
        <input type="radio" name="gender" class="gender" value="women" >Women
      </div>

      <div class="modal-body">
        <p>Address</p>
        <input type="text" name="address" class="form-control address" required id="user-address" value="">
      </div>
      <div class="modal-body">
        <p>Phone</p>
        <input type="number" name="phone" class="form-control phone" required id="user-phone" value="">
      </div>
      <div class="modal-body">
        <p>Receiving time</p>
        <input type="datetime-local" name="date" class="form-control time_recipt">
      </div>
      <div class="modal-body">
        <p>Note</p>
        <textarea class="note form-control" type="text" rows='4'></textarea>
      </div>
      <div class="modal-body" style="text-align: right; margin-right:5%">
        <button type="submit" class="btn btn-primary confirm-buy">Purchase</button>
      </div>
    </form>

    <div class="modal-footer">

    </div>
  </div>


</div>
</div>
@endsection
@section('script')
<script type="text/javascript" src="https://cdn.rawgit.com/igorlino/elevatezoom-plus/1.1.6/src/jquery.ez-plus.js"></script>
<script type="text/javascript">
  var slideIndex = 0;
  showSlides(slideIndex);


  function currentSlide(n) {
    showSlides(slideIndex = n);
  }

  function showSlides(n) {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    var dots = document.getElementsByClassName("demo");

    for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
    }
    for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex].style.display = "block";
    dots[slideIndex].className += " active";

  }
  $(document).on('click','.plus ',function(){ 
    if ($(this).prev().val() <parseInt($('.quan').text())) {
      $(this).prev().val(+$(this).prev().val() + 1);
    }
  })
  $(document).on('click','.minus',function(){
    if ($(this).next().val() > 1) {
      $(this).next().val(+$(this).next().val() - 1);
    }
  })

  // $(".zoom").ezPlus({
  //   cursor: "crosshair",
  //   zoomWindowFadeIn: 500,
  //   zoomWindowFadeOut: 500
  // });

  $(document).on('click','.btn-addtocart',function(e){
    e.preventDefault();
    var url="{{ asset('') }}shop/cart";
    var formData1=new FormData();
    formData1.append('number',$('#quantity').val());
    formData1.append('product_id',$(this).attr('product_id'));
    formData1.append('name',$('.pro_name').text());
    formData1.append('price',$('.proprice').text());
    $.ajax({
      url:url,
      type:'POST',
      processData: false,
      contentType: false,
      data:formData1,
      success:function(response){
        swal("Successfully!", "You clicked the button!", "success");

      }

    });
  })
  
  $(document).on('click','.viewCart',function(e){
    e.preventDefault();
    $('.tbdy').text('');
    $.ajax({
      type: 'get',
      url : '{{asset("")}}shop/viewCart',
      success:function(response){
        var count=0;
        var sum=0;
        $('.proceed').html('');
        $.each(response, function(key,value){
          var html=' <tr id="pro_'+value.rowId+'"><td>'+value.name+'</td><td style="width:150px; height:150px;object-fit: cover"><img src="{{asset('')}}storage/'+value.options.image+'" style="max-width: 100%"></td><td>'+value.price+'</td><td>'+value.qty+'</td><td>'+value.qty*value.price+'</td><td><button class="btn btn-sm btn-danger delete" rowId="'+value.rowId+'">X</button></td></tr>';
          $('.tbdy').append(html);
          sum += value.qty*value.price;
          count++;
        })

        if(count>0){
          $('.proceed').html(' <p class="text-center btn btn-primary " data-toggle="modal" data-target="#checkOut">Proceed to Checkout</p>')
        }else{
         $('.proceed').html('');
       }
       $('.total').text(sum);
     }
   })
  })
  $(document).on('click','.delete',function(){
    var id=$(this).attr('rowId');
    var url ='{{ asset("") }}shop/delete/'+id;
    alert
    swal({
      title: "Bạn có muốn xóa không?",
      text: "Sau khi xóa bạn sẽ không thể khôi phục được tệp!",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        $.ajax({
          type: 'delete',
          url:url ,
          success: function(response){
            $("#myModal").modal('hide');
            $('#pro_'+id).remove();

          }
        }); 
        swal("Tệp của bạn đã được xóa!", {
          icon: "success",
        });
      } else {
        swal("Hủy xóa thành công!!");
      }
    });
  })
  $(document).on('click','.confirm-buy',function(e){
    e.preventDefault();
    var formData= new FormData();
    formData.append('name',$('.name').val());
    formData.append('address',$('.address').val());
    formData.append('gender',$("input[name=gender]:checked").val());
    formData.append('phone',$('.phone').val());
    formData.append('time_receipt',$('.time_recipt').val());
    formData.append('note',$('.note').val());
    var url= '{{asset("")}}shop/order';
    $.ajax({
      type: 'POST',
      url : url,
      processData: false,
      contentType: false,
      data: formData,
      success: function(response){
        swal("Successfully!", "You clicked the button!", "success");
      }
    })
  })

</script>
@endsection