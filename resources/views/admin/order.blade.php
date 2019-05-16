 @extends('layouts.admin')
 
 <style>
 table{
    text-align: center;
}
</style>
<!--  -->
@section('page')
<p>Đơn hàng</p>
@endsection
@section('content_admin')
<div class="product-status mg-b-15">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="product-status-wrap">
                    <h4>Danh sách đơn hàng</h4>

                    <div class="asset-inner">
                        <table id="orders-table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Tên khách hàng</th>
                                    <th>Trạng thái đơn hàng</th>
                                    <th>Tổng số tiền</th>
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
<input type="hidden" id="hiddenOrder">
<input type="hidden" id="hiddenvalue">
<div class="modal fade" id="ChangingStatus">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">ChangingStatus</h4>
            </div>
            <div class="modal-body">
                <div class="row row-pb-md">
                    <div class="col-md-10 col-md-offset-1">
                        @csrf
                        <div class="process-wrap">
                            <div class="process text-center active" >
                                <p class="confirm aaaa" status="0"><span>01</span></p>
                                <h3>Confirm</h3>
                            </div>
                            <div class="process text-center">
                                <p class="complete aaaa"  status="1"><span>02</span></p>
                                <h3>Order Complete</h3>
                            </div>
                            <div class="process text-center">
                                <p class="delete aaaa"  status="2"><span>03</span></p>
                                <h3>Deleted</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-success saveStatus">Save</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="orderDetail">
    <div class="modal-dialog" style="width: 75%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Oder Detail</h4>
            </div>
            <div class="modal-body">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Order_id</th>
                            <th>Name</th>
                            <th>Image</th>
                            <th>Number</th>
                            <th>Price</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody class="orderTbody">

                    </tbody>
                </table>
            </div>
            
        </div>
    </div>
</div>
<div class="modal fade" id="UserModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">User</h4>
            </div>
            <div class="modal-body">
                <div class="userShow">
                    <p> Tên: <span class="name"></span></p>
                    <p> Số điện thoại: <span class="phone"></span></p>
                    <p>Giới tính: <span class="gender"></span></p>
                    <p>Address: <span class="address"></span></p>
                    <p>Ghi chú : <span class="note"></span></p>
                    <p>Thời gian nhận hàng: <span class="time_reciept"></span></p>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script src="http://cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
 $(document).ready(function(){

  $.ajaxSetup({
    headers:{
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});     
});
 $('#orders-table').DataTable({
    processing: true,
    serverSide: true,
    ajax: '{{ asset('') }}sale/anyway',
    columns: [
    { data: 'id', name: 'id' },
    { data: 'cus_name', name: 'cus_name' },
    { data: 'status', name: 'status' },
    { data: 'action', name: 'action' }
    ]
});
 //    $('.aaaa').eq(2).click(function(){
 //     return true;
 // } );
 $(document).on('click','.change',function(){
    $('#hiddenOrder').attr('order_id',$(this).attr('order_id'));
    var url="{{ asset('') }}sale/status/"+$(this).attr('order_id');
    $.ajax({
        type: 'get',
        url: url,
        success: function(response){
            $('.process').removeClass('active');
            $('.aaaa').eq(response).parent().addClass('active');
            // alert(response);
           

            for (var i = 0; i < response; i++) {
                // alert(i);
                // alert(response);
                if($('.aaaa').eq(i).attr('status')==i){
                    $('.aaaa').eq(i).click(function(){
                          alert(response);
                        // toastr.error('Disabled!');
                        return false;
                    });
                } 
            }
            // if(response==1){
            //     $('.aaaa').click(function(){
            //      toastr.error('Disabled!');
            //      return false;
            //  } );
            // } 
        }
    });
})

 $(document).on('click','.aaaa',function(){
    $('.process').removeClass('active');
    $(this).parent().addClass('active');
    $('#hiddenvalue').attr('value',$(this).attr('status'));
})
 $(document).on('click','.saveStatus',function(){
    var formData= new FormData();
    formData.append('status',$('#hiddenvalue').attr('value'));
    formData.append('order_id',$('#hiddenOrder').attr('order_id'));
    var url= "{{ asset('') }}sale/update";
    $.ajax({
        url:url,
        type:'POST',
        processData: false,
        contentType: false,
        data:formData,
        success:function(response){

            $('#orders-table').DataTable().ajax.reload(null, false);
            setTimeout(function(){
                $('#ChangingStatus').modal('hide');
            },800);
        }
    });
})
 $(document).on('click','.detailOrder',function(e){
    e.preventDefault();
    $('.orderTbody').text('');
    var url="{{ asset('') }}sale/detailOr/"+$(this).attr('order_id');
    $.ajax({
        type: 'get',
        url: url,
        success: function(response){
            for (var i = 0; i < response.length; i++) {
                var html='<tr><td>'+response[i].order_id+'</td><td>'+response[i].name+'</td><td style="width:20%"><img src="{{ asset('') }}storage/'+response[i].image+'" alt="" style="max-width:80%"></td><td style="width:15%">'+response[i].quantity_buy+'</td><td>'+response[i].price+'</td><td style="width:15%">'+response[i].total+'</td><td></tr>';
                $('.orderTbody').append(html);
            }

        }
    });
})
 $(document).on('click','.userModal',function(){
    $('.address').text('');
    var url="{{ asset('') }}sale/customer/"+$(this).attr('order_id');
    $.ajax({
        type: 'get',
        url: url,
        success: function(response){
            $('.name').text(response.name);
            $('.gender').text(response.gender);
            $('.phone').text(response.phone);
            $('.address').text(response.address);
            $('.note').text(response.note);
            $('.time_reciept').text(response.time_reciept);
        }
    });
})
</script>
@endsection