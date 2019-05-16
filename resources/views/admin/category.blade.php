 @extends('layouts.admin')
 @if ($errors->any())
 <div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<style>
table{
    text-align: center;
}
</style>
<!--  -->
@section('page')
<p>Category</p>
@endsection

<!-- content -->
@section('content_admin')
<div class="product-status mg-b-15">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="product-status-wrap">
                    <h4>Danh sách Danh mục Sản phẩm</h4>


                    <div class="add-product">
                        <a href="#" class="btn btn-info btn-lg" data-toggle="modal" data-target="#ADD">Thêm mới</a>
                    </div>
                    <div class="asset-inner">
                        <table id="category">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Slug</th>
                                    <th>Created_at</th>
                                    <th>action</th>
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
<!-- Add New -->
<div id="ADD" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Thêm Mới Danh Mục</h4>
    </div>
    <div class="modal-body">
        <form action="#" method="POST" role="form">
            <input type="hidden" id="_token" value="{{ csrf_token() }}">
            <div class="form-group">
                <label for="">Tên Danh Mục </label>
                <input type="text" class="form-control" id="name_vi" placeholder="Danh Mục">
            </div>
            <div class="form-group">
                <label for="">Tên Danh Mục : Tiếng Anh </label>
                <input type="text" class="form-control" id="name_en" placeholder="Danh Mục">
            </div>
            <div class="form-group">
                <label for="">Tên Danh Mục : Tiếng Nhật </label>
                <input type="text" class="form-control" id="name_jp" placeholder="Danh Mục">
            </div>

            

            <button type="submit" class="btn btn-primary add_cate">Submit</button>
        </form>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    </div>
</div>

</div>
</div>
<!-- Show category -->
<div id="Show_cate" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Chi tiết Danh Mục</h4>
    </div>
    <div class="modal-body">
        <p> <span>Danh Mục Tiếng Việt: </span><span id="viet"></span> </p>
        <p> <span>Danh Mục Tiếng Anh: </span><span id="anh"></span> </p>
        <p> <span>Danh Mục Tiếng Nhật: </span><span id="nhat"></span> </p>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th  style="text-align: center">Tên San Pham</th>
                    <th  style="text-align: center">Số Lượng</th>
                    <th  style="text-align: center">Trạng Thái</th>
                </tr>
            </thead>
            <tbody id="show-detail">

            </tbody>
        </table>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    </div>
</div>

</div>
</div>
<input type="hidden" name="" id="hiddenedit" >
<div id="editCate" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Sửa Danh Mục</h4>
    </div>
    <div class="modal-body">
        {{-- <form action="#" method="POST" role="form"> --}}
            <input type="hidden" id="_token" value="{{ csrf_token() }}">
            <div class="form-group">
                <label for="">Tên Danh Mục </label>
                <input type="text" class="form-control" id="name_vi_1" placeholder="Danh Mục">
            </div>
            <div class="form-group">
                <label for="">Tên Danh Mục : Tiếng Anh </label>
                <input type="text" class="form-control" id="name_en_1" placeholder="Danh Mục">
            </div>
            <div class="form-group">
                <label for="">Tên Danh Mục : Tiếng Nhật </label>
                <input type="text" class="form-control" id="name_jp_1" placeholder="Danh Mục">
            </div>

            
            <button type="submit" class="btn btn-primary update_cate">Submit</button>
        {{-- </form> --}}
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    </div>
</div>

</div>
</div>
@section('script')

<script src="http://cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(function() {
        $('#category').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! route('datatableCategory') !!}',
            columns: [
            { data: 'id', name: 'id' },
            { data: 'slug', name: 'slug' },
            { data: 'created_at', name: 'created_at' },
            { data: 'action', name: 'action' },
            ]
        });
    });
    $(".add_cate").on('click', function(e){
        e.preventDefault();
        
        $.ajax({
            method: 'post', 
            url: '{{asset("/category/add")}}',
            data:{
                name_vi: $('#name_vi').val(),
                name_en: $('#name_en').val(),
                name_jp: $('#name_jp').val(),
            },
            success: function (response) {
                toastr.success(response.success);
            },  
            error:function(jqXHR,textStatus,errorThrown){
                if (jqXHR.responseJSON.errors.name_vi!==undefined){
                    toastr.error(jqXHR.responseJSON.errors.name_vi[0]);
                }
                if (jqXHR.responseJSON.errors.name_en!==undefined){
                    toastr.error(jqXHR.responseJSON.errors.name_en[0]);
                }
                if (jqXHR.responseJSON.errors.name_jp!==undefined){
                    toastr.error(jqXHR.responseJSON.errors.name_jp[0]);
                }
                
            }
        })
    });
    $(document).on('click', '.detail1', function(){
        $('#show-detail').text('');
        var id= $(this).attr('data-idd');
        $.ajax({
            method: 'get', 
            url: '{{asset("")}}/category/show/' + id,
            data:{
            },
            success: function (response) {
                $('#viet').text(response.lang[0].name);
                $('#anh').text(response.lang[2].name);
                $('#nhat').text(response.lang[1].name);
                $.each(response.pro, function(key, value) {
                    var html= `<tr><td>`+value['name']+`</td> <td>`+value['quantity']+`</td> <td>`+value['status']+`</td>
                    </tr>`;
                    $('#show-detail').append(html);
                });
            },  
            error:function(jqXHR,textStatus,errorThrown){

            }
        })
    })
    $(document).on('click','#EditCate',function(){
        var id= $(this).attr('Cate_id');
        $('#hiddenedit').attr('category_id',id);
        $.ajax({
            type: 'get',
            url : '{{asset("")}}category/edit/'+id,
            success: function(response){
                $('#name_vi_1').val(response.name_vi);
                $('#name_en_1').val(response.name_en);
                $('#name_jp_1').val(response.name_jp);
            }
        })
    })
    $(document).on('click','.update_cate',function(){
        var formData= new FormData();
        formData.append('category_id',$('#hiddenedit').attr('category_id'));
        formData.append('name_vi',$('#name_vi_1').val());
        formData.append('name_en',$('#name_en_1').val());
        formData.append('name_jp',$('#name_jp_1').val());
        $.ajax({
            type: 'post',
            url: '{{asset("")}}category/update',
            processData: false,
            contentType: false,
            data: formData,
            success: function(response){
                toastr.success(response.success);
              $('#category').DataTable().ajax.reload(null, false);
              $('#editCate').modal('hide');
            }
        })
    })
</script>
@endsection