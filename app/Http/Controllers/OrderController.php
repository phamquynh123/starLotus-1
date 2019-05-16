<?php

namespace App\Http\Controllers;

use App\Order;
use App\Product;
use App\Product_translate;
use App\Image;
use App\Customer;
use App\Order_detail;
use App\Category;
use App\Category_translate;
use App\News;
use App\New_translate;
use App\Laguage;
use Illuminate\Http\Request;


class OrderController extends Controller
{
  
public function list(){
  return view('admin.order');
}
public function anyway(){
  $orders= Order::all();
  foreach ($orders as $key => $value) {
   $orders[$key]['cus_name']=Customer::find($value['customer_id'])['name'];
 }
 return datatables()->of($orders)
 ->editColumn('status',function($order){
  $sta=$order->status;
  if ($sta==0) {
    return 'Confirm';
  }else if($sta==1){
    return 'Order Complete';
  }else if($sta==2){
    return 'Deleted';
  }else{
    return 'unknown';
  }
})
 ->addColumn('action', function($order) {
  return '<button type="" class="btn btn-info change" data-toggle="modal" data-target="#ChangingStatus" order_id="'.$order->id.'"><i class="fa fa-cogs" aria-hidden="true"></i></button> <button type="" class="btn btn-success detailOrder" data-toggle="modal" data-target="#orderDetail" order_id="'.$order->id.'"><i class="fa fa-info-circle" aria-hidden="true"></i></button> <button type="" class="btn btn-warning userModal" data-toggle="modal" data-target="#UserModal" order_id="'.$order->id.'"><i class="fa fa-user-circle-o" aria-hidden="true"></i></button>';
})
 ->rawColumns([ 'action','status'])
 ->toJson();
}
public function status($id){
  $order =Order::find($id);
  return $order['status'];
}
public function statusUpdate(Request $request){ 
  $month= \Carbon\Carbon::now()->format('m/Y');
 
  $order=Order::where('id',$request->order_id)->update(['status'=>$request->status,'month'=>$month]);
  $orders= Order::find($request->order_id);

  if(isset($orders)){
    if($orders['status']==1){
      $order_detail= Order_detail::where('order_id',$request->order_id)->get();
      foreach ($order_detail as $key => $value) {
        $quantity_buy=$value['quantity_buy'];
        $quantity= Product::where('id',$value['product_id'])->first()['quantity'];
        $qty= $quantity-$quantity_buy;
        Product::where('id',$value['product_id'])->update(['quantity'=>$qty]);
      }
    }
  }
  
  return $orders;
}
public function detailOr($id){
  $orders =Order_detail::where('order_id',$id)->get();
  foreach ($orders as $key => $value) {
    $product= Product::find($value['product_id']);
    $product_translate= Product_translate::where('product_id',$value['product_id'])->first();
    $orders[$key]['name']= $product['name'];
    $orders[$key]['image']= Image::where('product_id',$product['id'])->first()['link'];
    if(  $product_translate['price']== null){
      $orders[$key]['total']== 'null';
    }else{
     $orders[$key]['price']=  $product_translate['price'];
     $orders[$key]['total']=$product_translate['price']*$value['quantity_buy'];
   }
 }
 return $orders;
}
public function customer($id){
  $order= Order::find($id);
  $customer= Customer::find($order['customer_id']);
  return $customer;
}


}
