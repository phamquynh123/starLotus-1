 @extends('layouts.admin')

<style>
table{
    text-align: center;
}
</style>
<!--  -->
@section('page')
<p>Sản phẩm</p>
@endsection

<!-- content -->
@section('content_admin')
<div class="product-status mg-b-15">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="product-status-wrap">
                    <h4>Danh sách Sản phẩm</h4>
                    <div class="add-product">
                        <a href="#" class="btn btn-info btn-lg" data-toggle="modal" data-target="#AddProduct">Thêm mới</a>
                    </div>
                    <div class="asset-inner">
                        <table id="category">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Ảnh</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Tên danh mục</th>
                                    <th class="status">Trạng thái</th>
                                    <th>Hành động</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('ahihi')

<div id="AddProduct" class="modal fade" role="dialog">
  <div class="modal-dialog  modal-lg" >

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Thêm Mới Product</h4>
    </div>
    <div class="modal-body" >
        <form action="#" method="POST" role="form">
            <input type="hidden" id="_token" value="{{ csrf_token() }}">

            <div class="form-group">
                <label for="">Tên sản phẩm</label>
                <input type="text" class="form-control" id="name" placeholder="Tên sản phẩm">
            </div>
            <div class="form-group">
                <label for="">Số lượng</label>
                <input type="text" class="form-control" id="quantity" placeholder="Số lượng">
            </div>
            <div class="form-group">
                <label for="">Danh mục(tiếng anh)</label>
                <select name="category" class="form-control" required="required" id="category_id">
                    @if(count($categories)>0) @foreach ($categories as $category)
                    <option value="{{$category->category_id}}" >{{$category->name}}</option>
                    @endforeach @endif 

                </select>
            </div>
            <div class="form-group">
                <div class="col-md-4" style="padding: 0">
                    <label for="">Giá</label>
                    <input type="text" class="form-control" id="price_vi" placeholder="Giá">
                </div> 
                <div class="col-md-4">
                    <label for="">Giá($)</label>
                    <input type="text" class="form-control" id="price_en" placeholder="Giá">
                </div> 
                <div class="col-md-4">
                    <label for="">Giá(¥)</label>
                    <input type="text" class="form-control" id="price_jp" placeholder="Giá">
                </div> 
            </div>
            <div class="form-group">
                <label for="">Miêu tả  </label>
                <textarea name="content_vi"></textarea>
            </div>

            <div class="form-group">
                <label for="">Miêu tả Tiếng Anh </label>
                <textarea name="content_en"></textarea>
            </div>
            <div class="form-group">
                <label for="">Miêu tả Tiếng Nhật</label>
                <textarea name="content_jp"></textarea>
            </div>

            <div style="float:right">

                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary add_product">Submit</button> 
            </div>

        </form>
    </div>
    <div class="modal-footer">

    </div>
</div>

</div>
</div>
<!-- Show category -->


{{-- edit --}}
<input type="hidden" name="" id="hiddenedit">
<div id="editProduct" class="modal fade" role="dialog">
  <div class="modal-dialog  modal-lg" style="overflow-y: initial !important;">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Sửa sản phẩm</h4>
    </div>
    <div class="modal-body" style="overflow-y: auto;height: 500px;">

        <input type="hidden" id="_token" value="{{ csrf_token() }}">

        <div class="form-group">
            <label for="">Tên sản phẩm</label>
            <input type="text" class="form-control" id="ename" placeholder="Tên sản phẩm">
        </div>
        <div class="form-group">
            <label for="">Số lượng</label>
            <input type="text" class="form-control" id="equantity" placeholder="Số lượng">
        </div>
        <div class="form-group">
            <label for="">Danh mục(tiếng anh)</label>
            <select name="category" class="form-control"  id="ecategory_id">
                @if(count($categories)>0) @foreach ($categories as $category)
                <option value="{{$category->category_id}}" >{{$category->name}}</option>
                @endforeach @endif 

            </select>
        </div>
        <div class="form-group">
            <div class="col-md-4" style="padding: 0">
                <label for="">Giá</label>
                <input type="text" class="form-control" id="eprice_vi" placeholder="Giá">
            </div> 
            <div class="col-md-4">
                <label for="">Giá($)</label>
                <input type="text" class="form-control" id="eprice_en" placeholder="Giá">
            </div> 
            <div class="col-md-4">
                <label for="">Giá(¥)</label>
                <input type="text" class="form-control" id="eprice_jp" placeholder="Giá">
            </div> 
        </div>
        <div class="form-group">
            <label for="">Miêu tả  </label>
            <textarea name="content_vi_1"></textarea>
        </div>

        <div class="form-group">
            <label for="">Miêu tả Tiếng Anh </label>
            <textarea name="content_en_1"></textarea>
        </div>
        <div class="form-group">
            <label for="">Miêu tả Tiếng Nhật</label>
            <textarea name="content_jp_1"></textarea>
        </div>
        <div style="float:right">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary update_products">Update</button> 
        </div>


    </div>
    
</div>

</div> 
</div> 

<input type="hidden" name="" id="hiddenUpload">
<div id="uploadProduct" class="modal fade" role="dialog">
  <div class="modal-dialog  modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Thêm ảnh</h4>
    </div>
    <div class="modal-body" >
        <div style="clear: both;"></div>
        <div class="image" style="float: left; width: 50%">

        </div>
        <div style="float: left; width: 50%">
         <input type="hidden" id="_token" value="{{ csrf_token() }}">
         <input id="file-1" type="file" name="fileUpload"  class="file" data-overwrite-initial="false" data-min-file-count="2" >
     </div>
     <div style="clear: both;"></div>
 </div>

</div> 
</div> 
</div>
{{-- show --}}
<div id="ShowProduct" class="modal fade" role="dialog">
  <div class="modal-dialog  modal-lg" >

    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Chi tiết sản phẩm</h4>
    </div>
    <div class="modal-body" >

        <div style="width:50%; float:left">
           <div class="form-group">
            <label for="">Tên sản phẩm :</label>
            <p class="namepro"></p>

        </div>
        <div class="form-group">
            <label for="">Số lượng :</label>
            <p class="quantitypro" ></p>

        </div>
        <div class="form-group">
            <label for="">Danh mục(tiếng anh) :</label>               
            <p class="categorypro"></p>

        </div> 

        <div class="form-group" style="padding: 0">
            <label for="">Giá :</label>
            <span class="price_vi_pro"></span>
        </div> 
        <div class="form-group">
            <label for="">Giá($) :</label>
            <span class="price_en_pro"></span>
        </div> 
        <div class="form-group">
            <label for="">Giá(¥) :</label>
            <span class="price_jp_pro"></span>
        </div> 

    </div>
    <div style="width:50%; float:left">

        <div id="carousel-id" class="carousel slide" data-ride="carousel" style=" height: 280px">
            <ol class="carousel-indicators">

            </ol>
            <div class="carousel-inner">

            </div>

        </div>
    </div>
    <div style="clear:both"></div>

    <div class="form-group">
        <label for="">Miêu tả :</label>
        <p class="content_vi_pro" disabled=""></p>
    </div>

    <div class="form-group">
        <label for="">Miêu tả Tiếng Anh :</label>
        <p class="content_en_pro" disabled=""></p>
    </div>
    <div class="form-group">
        <label for="">Miêu tả Tiếng Nhật :</label>
        <p class="content_jp_pro" disabled=""></p>
    </div>
</form>
</div>
<div class="modal-footer">

</div>
</div>

</div>
</div>
@endsection

<!-- Add New -->

@section('script')


<script src="http://cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>

<script>
    CKEDITOR.replace( 'content_vi' );
    CKEDITOR.replace( 'content_en' );
    CKEDITOR.replace( 'content_jp' );
    CKEDITOR.replace( 'content_vi_1' );
    CKEDITOR.replace( 'content_en_1' );
    CKEDITOR.replace( 'content_jp_1' );

    $(document).ready(function(){

      $.ajaxSetup({
        headers:{
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });     
  });

    $(function() {
        $('#category').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! route('datatableProduct') !!}',
            columns: [
            { data: 'id', name: 'id' },
            {data: 'image',name: 'image'},
            { data: 'name', name: 'name' },
            { data: 'category', name: 'category' },
            { data: 'statusPro', name: 'statusPro' },
            { data: 'action', name: 'action' },
            ]
        });
    });
    $(document).on('click','.showProduct',function(){
     $('.carousel-indicators').text('');
     $('.carousel-inner').text('');

     var id= $(this).attr('Product_id');  
     var url1="{{ asset('') }}product/edit/"+id;
     $.ajax({
        url:url1,
        type:'get',
        success:function(response){
            console.log(response);
            $(".price_vi_pro").text(response.price_vi); 
            $(".price_en_pro").text(response.price_en); 
            $(".price_jp_pro").text(response.price_jp); 
            $('.content_vi_pro').html(response.content_vi);
            $('.content_en_pro').html(response.content_en);
            $('.content_jp_pro').html(response.content_jp);
            $(".namepro").text(response.name);
            $(".quantitypro").text(response.quantity);
            $(".categorypro").text(response.category);
            
            $.each(response.image, function(key,value){
                var html1='<li data-target="#carousel-id" class="olli" data-slide-to="'+key+'" ></li>';
                var html2= ' <div class="item"><img src="{{asset('')}}storage/'+value+'" style="height:280px;width:100%;object-fit:cover"></div>';
                $('.carousel-indicators').append(html1);
                $('.carousel-inner').append(html2);
            });
            document.getElementsByClassName('olli')[0].className= 'olli active';
            document.getElementsByClassName('item')[0].className= 'item active';
            
        },
    });
 })
    $(".add_product").on('click', function(e){

        e.preventDefault();
        var vi= CKEDITOR.instances.content_vi.getData();
        var en= CKEDITOR.instances.content_en.getData();
        var jp= CKEDITOR.instances.content_jp.getData();
        var formData1 = new FormData();
        formData1.append('name',$('#name').val());
        formData1.append('quantity', $('#quantity').val());
        formData1.append('category_id', $('#category_id').val());
        formData1.append('content_vi',vi);
        formData1.append('content_en',en);
        formData1.append('content_jp',jp);
        formData1.append('price_vi',$("#price_vi").val());
        formData1.append('price_en',$("#price_en").val());
        formData1.append('price_jp',$("#price_jp").val());
        formData1.append('_token',$('input[name="_token"]').val());
        $.ajax({
            type: 'post', 
            url: '{{asset("/product/add")}}',
            processData: false,
            contentType: false,
            data:formData1,
            success: function (response) {
                toastr.success(response.success);
                $('#category').DataTable().ajax.reload(null, false);
                $('#AddProduct').modal('hide');

            },  
            error:function(jqXHR,textStatus,errorThrown){
                if (jqXHR.responseJSON.errors.name!==undefined){
                    toastr.error(jqXHR.responseJSON.errors.name[0]);
                }
                if (jqXHR.responseJSON.errors.quantity!==undefined){
                    toastr.error(jqXHR.responseJSON.errors.quantity[0]);
                }
                if (jqXHR.responseJSON.errors.category_id!==undefined){
                    toastr.error(jqXHR.responseJSON.errors.category_id[0]);
                }
                if (jqXHR.responseJSON.errors.content_vi!==undefined){
                    toastr.error(jqXHR.responseJSON.errors.content_vi[0]);
                }
                if (jqXHR.responseJSON.errors.content_en!==undefined){
                    toastr.error(jqXHR.responseJSON.errors.content_en[0]);
                }
                if (jqXHR.responseJSON.errors.content_jp!==undefined){
                    toastr.error(jqXHR.responseJSON.errors.content_jp[0]);
                }
                if (jqXHR.responseJSON.errors.price_vi!==undefined){
                    toastr.error(jqXHR.responseJSON.errors.price_vi[0]);
                }
                if (jqXHR.responseJSON.errors.price_en!==undefined){
                    toastr.error(jqXHR.responseJSON.errors.price_en[0]);
                }
                if (jqXHR.responseJSON.errors.price_jp!==undefined){
                    toastr.error(jqXHR.responseJSON.errors.price_jp[0]);
                }
            }
        })
    });


    $(document).on('click','.delete',function(){
        var id=$(this).attr('img_id');
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
                    url: "{{ asset('') }}product/delImg/"+id,
                    success: function(response){
                      window.location.href= '{{asset('')}}product/list';
                    }
                }); 
                swal("Tệp của bạn đã được xóa!", {
                    icon: "success",
                });
            } else {
                swal("Hủy xóa thành công!!");
            }
        });
    });
    $(document).on('click','#EditProduct', function(){

       var id= $(this).attr('Product_id');  
       var url1="{{ asset('') }}product/edit/"+id;
       $("#hiddenedit").attr('product_id',id);
       $.ajax({
        url:url1,
        type:'get',
        success:function(response){
            $("#eprice_vi").val(response.price_vi); 
            $("#eprice_en").val(response.price_en); 
            $("#eprice_jp").val(response.price_jp); 
            CKEDITOR.instances['content_vi_1'].setData(response.content_vi);
            CKEDITOR.instances['content_en_1'].setData(response.content_en);
            CKEDITOR.instances['content_jp_1'].setData(response.content_jp);
            $("#ename").val(response.name);
            $("#equantity").val(response.quantity);
            $("select option[value= "+response.category_id+"]").attr('selected','selected');
        },
    });
   });
    $(document).on('click','.update_products',function(e){
        var vi= CKEDITOR.instances.content_vi_1.getData();
        var en= CKEDITOR.instances.content_en_1.getData();
        var jp= CKEDITOR.instances.content_jp_1.getData();
        var url1 = '{{asset('')}}product/update';
        var formData1 = new FormData();
        formData1.append('name',$('#ename').val());
        formData1.append('quantity', $('#equantity').val());
        formData1.append('category_id', $('#ecategory_id').val());
        formData1.append('content_vi',vi);
        formData1.append('content_en',en);
        formData1.append('content_jp',jp);
        formData1.append('price_vi',$("#eprice_vi").val());
        formData1.append('price_en',$("#eprice_en").val());
        formData1.append('price_jp',$("#eprice_jp").val());
        formData1.append('product_id',$("#hiddenedit").attr('product_id'));
        formData1.append('_token',$('input[name="_token"]').val());
        $.ajax({
            url:url1,
            type:'POST',
            processData: false,
            contentType: false,
            data:formData1,
            success:function(response){
              toastr.success('Sửa thành công');
              $('#category').DataTable().ajax.reload(null, false);
              $('#editProduct').modal('hide');

          },
          error:function(jqXHR,textStatus,errorThrown){
            if (jqXHR.responseJSON.errors.name!==undefined){
                toastr.error(jqXHR.responseJSON.errors.name[0]);
            }
            if (jqXHR.responseJSON.errors.quantity!==undefined){
                toastr.error(jqXHR.responseJSON.errors.quantity[0]);
            }
            if (jqXHR.responseJSON.errors.category_id!==undefined){
                toastr.error(jqXHR.responseJSON.errors.category_id[0]);
            }
            if (jqXHR.responseJSON.errors.content_vi!==undefined){
                toastr.error(jqXHR.responseJSON.errors.content_vi[0]);
            }
            if (jqXHR.responseJSON.errors.content_en!==undefined){
                toastr.error(jqXHR.responseJSON.errors.content_en[0]);
            }
            if (jqXHR.responseJSON.errors.content_jp!==undefined){
                toastr.error(jqXHR.responseJSON.errors.content_jp[0]);
            }
            if (jqXHR.responseJSON.errors.price_vi!==undefined){
                toastr.error(jqXHR.responseJSON.errors.price_vi[0]);
            }
            if (jqXHR.responseJSON.errors.price_en!==undefined){
                toastr.error(jqXHR.responseJSON.errors.price_en[0]);
            }
            if (jqXHR.responseJSON.errors.price_jp!==undefined){
                toastr.error(jqXHR.responseJSON.errors.price_jp[0]);
            }
        }
    });
    });
    $(document).on('click','.uploadProduct',function(){
        $('.image').text('');
        $("#hiddenUpload").attr('product_id',$(this).attr('Product_id'));
        $.ajax ({
            type : 'get',
            url :"{{asset('')}}product/getImage/"+$(this).attr('Product_id'),
            success: function(response){
                $.each(response.image,function(key,value){
                    var html ='<div class="delimg"><img src="{{asset('')}}storage/'+value.link+'" alt="" style="height:100px" class="proimg"/><div class="middle"> <div class="text"><button  class="btn btn-sm btn-danger delete" img_id="'+value.id+'">Delete</button></div></div></div>';
                    $('.image').append(html);
                })
            }
        })
        
    })
  
    $("#file-1").fileinput({
        theme: 'fa',
        uploadUrl: "{{asset("")}}product/upload",
        uploadExtraData: function() {
          return {
            product_id: $("#hiddenUpload").attr('product_id'),
            _token: $("input[name='_token']").val()
        };
    },
    allowedFileExtensions: ['jpg', 'png', 'gif'],
    overwriteInitial: false,
    maxFileSize:2000,
    maxFilesNum: 10,
    slugCallback: function (filename) {
      return filename.replace('(', '_').replace(']', '_');
  },

});
    $('#file-1').on('fileuploaded', function() {
        window.location.href ="{{asset('')}}product/list";

    });
    $(document).on('click','.statusPro',function(){
        var formData =new FormData();
        if($(this).html()=='active'){
            formData.append('status','deactive')  ;
        }else{
           formData.append('status','active')  ;
       }
       formData.append('product_id',$(this).attr('product_id'));
       $.ajax({
        type: 'post',
        url: '{{asset("")}}product/status',
        processData: false,
        contentType: false,
        data:formData,
        success: function(response){
          $('#category').DataTable().ajax.reload(null, false);   
      }
  })
   })
</script>
@endsection