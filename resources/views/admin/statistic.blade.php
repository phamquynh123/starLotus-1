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
                    <h4>Thống kê theo đơn hàng</h4>

                    <div class="asset-inner">
                        <table id="statistic-table">
                            <thead>
                                <tr>
                                    <th>Tháng / Năm</th>
                                    <th>Số đơn hàng</th>
                                    <th>Tổng số tiền</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($orders as $order)
                                <tr>
                                    <td>{{$order['month']}}</td>
                                    <td>{{$order['count']}}</td>
                                    <td>{{$order['sum']}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="product-status mg-b-15">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="product-status-wrap">
                    <h4>Thống kê theo sản phẩm</h4>
                    <div class="asset-inner">
                        <table id="pro-table">
                            <thead>
                                <tr>
                                    <th>Tháng / Năm</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Ảnh</th>
                                    <th>Số lượng bán được</th>
                                    <th>Tổng số tiền</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $value)
                                @foreach($value as $php)

                                <tr>
                                    <td>{{$php['month']}}</td>
                                    <td>{{$php['name']}}</td>
                                    <td><img src="{{asset('')}}storage/{{$php['image']}}"></td>
                                    <td>{{$php['count']}}</td>
                                    <td>{{$php['total']}}</td>
                                </tr>
                                @endforeach
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script src="http://cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
$('#pro-table').DataTable();
$('#statistic-table').DataTable();
</script>
@endsection