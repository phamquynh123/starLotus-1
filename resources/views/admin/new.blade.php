 @extends('layouts.admin')
 
<style>
table{
    text-align: center;
}
</style>
<!--  -->
@section('page')
<p>Tin Tức</p>
@endsection

<!-- content -->
@section('content_admin')
<div class="product-status mg-b-15">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="product-status-wrap">
                    <h4>Danh sách Tin tức</h4>


                    <div class="add-product">
                        <a href="#" class="btn btn-info btn-lg" data-toggle="modal" data-target="#ADD">Thêm mới</a>
                    </div>
                    <div class="asset-inner">
                        <table id="category">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Tóm tắt</th>
                                    <th>Thời gian tạo mới</th>
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

<div id="ADD" class="modal fade" role="dialog">
  <div class="modal-dialog  modal-lg" >

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Thêm Mới Tin tức</h4>
    </div>
    <div class="modal-body" >
        <form action="#" method="POST" role="form" enctype="multipart/form-data">
            <input type="hidden" id="_token" value="{{ csrf_token() }}">
            <input type="file" name="file" id="profile-img">
            <img src="" id="profile-img-tag" width="200px" />
            <div class="form-group">
                <label for="">Tiêu đề </label>
                <input type="text" class="form-control" id="title_vi" placeholder="Danh Mục">
            </div>
            <div class="form-group">
                <label for="">Nội Dung </label>
                <textarea name="content_vi"></textarea>
            </div>
            <div class="form-group">
                <label for="">Tiêu đề: Tiếng Anh </label>
                <input type="text" class="form-control" id="title_en" placeholder="Danh Mục">
            </div>
            <div class="form-group">
                <label for="">Nội Dung Tiếng Anh </label>
                <textarea name="content_en"></textarea>
            </div>
            <div class="form-group">
                <label for="">Tiêu đề Tiếng Nhật </label>
                <input type="text" class="form-control" id="title_jp" placeholder="Danh Mục">
            </div>
            <div class="form-group">
                <label for="">Nội Dung Tiếng Nhật</label>
                <textarea name="content_jp"></textarea>
            </div>

            
            <div style="float:right">

                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary add_news">Submit</button> 
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
<div id="editNew" class="modal fade" role="dialog">
  <div class="modal-dialog  modal-lg" style="overflow-y: initial !important;">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Sửa Tin tức</h4>
    </div>
    <div class="modal-body" style="overflow-y: auto;height: 500px;">

        <input type="hidden" id="_token" value="{{ csrf_token() }}">
        <div style="margin: 0 auto">
           <input type="file" name="file" id="profile-img1">
           <img src="" id="profile-img-tag1" width="200px"  />
       </div>
       <div class="form-group">
        <label for="">Tiêu đề </label>
        <input type="text" class="form-control" id="title_vi_1" placeholder="Danh Mục" >
    </div>
    <div class="form-group">
        <label for="">Nội Dung </label>
        <textarea name="content_vi_1"></textarea>
    </div>
    <div class="form-group">
        <label for="">Tiêu đề: Tiếng Anh </label>
        <input type="text" class="form-control" id="title_en_1" placeholder="Danh Mục">
    </div>
    <div class="form-group">
        <label for="">Nội Dung Tiếng Anh </label>
        <textarea name="content_en_1"></textarea>
    </div>
    <div class="form-group">
        <label for="">Tiêu đề Tiếng Nhật </label>
        <input type="text" class="form-control" id="title_jp_1" placeholder="Danh Mục">
    </div>
    <div class="form-group">
        <label for="">Nội Dung Tiếng Nhật</label>
        <textarea name="content_jp_1"></textarea>
    </div>


    <div style="float:right">

        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary update_news">Update</button> 
    </div>


</div>

</div>

</div>
</div>
@endsection

<!-- Add New -->

@section('script')
{{-- <script src="//code.jquery.com/jquery-1.10.2.min.js"></script> --}}

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
            ajax: '{!! route('datatableNew') !!}',
            columns: [
            { data: 'id', name: 'id' },
            { data: 'slug', name: 'slug' },
            { data: 'created_at', name: 'created_at' },
            { data: 'action', name: 'action' },
            ]
        });
    });
    $('#profile-img-tag').attr('src',"");
    $('#profile-img-tag1').attr('src',"");
    $(".add_news").on('click', function(e){

        e.preventDefault();
        var vi= CKEDITOR.instances.content_vi.getData();
        var en= CKEDITOR.instances.content_en.getData();
        var jp= CKEDITOR.instances.content_jp.getData();
        var formData1 = new FormData();
        formData1.append('file',$('#profile-img')[0].files[0]);
        formData1.append('title_vi', $('#title_vi').val());
        formData1.append('content_vi',vi);
        formData1.append('title_en', $('#title_en').val());
        formData1.append('content_en',en);
        formData1.append('title_jp', $('#title_jp').val());
        formData1.append('content_jp',jp);
        formData1.append('_token',$('input[name="_token"]').val());
        $.ajax({
            type: 'post', 
            url: '{{asset("/news/add")}}',
            processData: false,
            contentType: false,
            data:formData1,
            success: function (response) {
                console.log(response);

                if(response.message=='error'){
                    if (response.errors.content_en!==undefined) {
                     toastr.error(response.errors.content_en);
                 }
                 
             }else{
                toastr.success(response.success);
                $('#category').DataTable().ajax.reload(null, false);
                $('#AddNew').modal('hide');
            }

        },  
        error:function(jqXHR,textStatus,errorThrown){
            if (jqXHR.responseJSON.errors.title_vi!==undefined){
                toastr.error(jqXHR.responseJSON.errors.title_vi[0]);
            }
            if (jqXHR.responseJSON.errors.content_vi!==undefined){
                toastr.error(jqXHR.responseJSON.errors.content_vi[0]);
            }
            if (jqXHR.responseJSON.errors.title_en!==undefined){
                toastr.error(jqXHR.responseJSON.errors.title_en[0]);
            }
            if (jqXHR.responseJSON.errors.content_en!==undefined){
                toastr.error(jqXHR.responseJSON.errors.content_en[0]);
            }
            if (jqXHR.responseJSON.errors.title_jp!==undefined){
                toastr.error(jqXHR.responseJSON.errors.title_jp[0]);
            }
            if (jqXHR.responseJSON.errors.content_jp!==undefined){
                toastr.error(jqXHR.responseJSON.errors.content_jp[0]);
            }
            if (jqXHR.responseJSON.errors.file!==undefined){
                toastr.error(jqXHR.responseJSON.errors.file[0]);
            }
        }
    })
    });
    $(document).on('click', '.detail1', function(){
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
    
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#profile-img-tag').attr('src', e.target.result);
                $('#profile-img-tag1').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#profile-img").change(function(){
        readURL(this);
    });
    $("#profile-img1").change(function(){
        readURL(this);
    });
    $(document).on('click','.deleteNew',function(){
        var id=$(this).data('id');
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
                    url: "{{ asset('') }}news/delete/"+id,
                    success: function(response){
                        $('#category').DataTable().ajax.reload(null, false);
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
    $(document).on('click','#EditNew', function(){

       var id= $(this).attr('new_id');
       var url1="{{ asset('') }}news/edit/"+id;
       $("#hiddenedit").attr('news_id',id);
       $.ajax({
        url:url1,
        type:'get',
        success:function(response){

            $("#title_en_1").val(response[2].title); 
            $("#title_vi_1").val(response[0].title); 
            $("#title_jp_1").val(response[1].title); 
            CKEDITOR.instances['content_vi_1'].setData(response[0].content);
            CKEDITOR.instances['content_en_1'].setData(response[2].content);
            CKEDITOR.instances['content_jp_1'].setData(response[1].content);
            $('#profile-img-tag1').attr('src',"{{asset('')}}storage/"+response.image);
        },
    });
   });
    $(document).on('click','.update_news',function(e){
        var vi= CKEDITOR.instances.content_vi_1.getData();
        var en= CKEDITOR.instances.content_en_1.getData();
        var jp= CKEDITOR.instances.content_jp_1.getData();
        var url1 = '{{asset('')}}news/update';
        var formData1 = new FormData();
        formData1.append('news_id',$("#hiddenedit").attr('news_id'));
        formData1.append('file',$('#profile-img1')[0].files[0]);
        formData1.append('title_vi', $('#title_vi_1').val());
        formData1.append('content_vi',vi);
        formData1.append('title_en', $('#title_en_1').val());
        formData1.append('content_en',en);
        formData1.append('title_jp', $('#title_jp_1').val());
        formData1.append('content_jp',jp);
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
              $('#editNew').modal('hide');

          },
          error:function(jqXHR,textStatus,errorThrown){
              if (jqXHR.responseJSON.errors.title_vi!==undefined){
                toastr.error(jqXHR.responseJSON.errors.title_vi[0]);
            }
            if (jqXHR.responseJSON.errors.content_vi!==undefined){
                toastr.error(jqXHR.responseJSON.errors.content_vi[0]);
            }
            if (jqXHR.responseJSON.errors.title_en!==undefined){
                toastr.error(jqXHR.responseJSON.errors.title_en[0]);
            }
            if (jqXHR.responseJSON.errors.content_en!==undefined){
                toastr.error(jqXHR.responseJSON.errors.content_en[0]);
            }
            if (jqXHR.responseJSON.errors.title_jp!==undefined){
                toastr.error(jqXHR.responseJSON.errors.title_jp[0]);
            }
            if (jqXHR.responseJSON.errors.content_jp!==undefined){
                toastr.error(jqXHR.responseJSON.errors.content_jp[0]);
            }
        }
    });
    });

</script>
@endsection