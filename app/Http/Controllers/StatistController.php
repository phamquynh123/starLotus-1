<?php

namespace App\Http\Controllers;

use App\Order;
use App\Order_detail;
use App\Product;
use App\Image;
use App\Product_translate;
use Illuminate\Http\Request;

class StatistController extends Controller
{

    public function index()
    {
        $month= array();
        $sum=0;
        $orders= Order::all();
        foreach ($orders as $key => $value) {
            $month[$key]=$value['month'];
        }

        $month=array_unique($month);
        $product= Product::all();
        $data= array();
        $data1=array();
        foreach (array_values($month) as $key1 => $value1) {
            foreach ($product as $key => $value) {
                $count=0;
                $order= Order::where('month',$value1)->get();
                foreach ($order as $key2 => $value2) {
                 $order_detail= Order_detail::where('product_id',$value['id'])->where('order_id',$value2['id'])->first();
                 $count += $order_detail['quantity_buy'];

             }
             $data[$key]['month']=$value1;
             $data[$key]['name']=$value['name'];
             $data[$key]['count']= $count;
             $price=Product_translate::where('product_id',$value['id'])->where('laguage_id',1)->first()['price'];
             $data[$key]['total']=$count*$price ;
             $data[$key]['image']= Image::where('product_id',$value['id'])->first()['link'];

         }
         $data1[$key1]= $data;
     }
     foreach (array_values($month) as $key => $value) {
        $order=Order::where('month',$value)->get();
        $count= count($order);
        foreach ($order as $key1 => $value1) {
         $sum+=$value1['total'];
     }
     $order_mo[$key]= Order::where('month',$value)->first();
     $order_mo[$key]['month']=$value;
     $order_mo[$key]['count']=$count;
     $order_mo[$key]['sum']=number_format($sum);
 }
 return view('admin.statistic',['data'=>$data1,'orders'=>$order_mo]);
}


// public function anyway()
// { $sum=0;
//     $month= array();

//     $orders= Order::all();
//     foreach ($orders as $key => $value) {
//         $month[$key]=$value['month'];
//     }

//     $month=array_unique($month);
//     foreach (array_values($month) as $key => $value) {
//         $order=Order::where('month',$value)->get();
//         $count= count($order);
//         foreach ($order as $key1 => $value1) {
//          $sum+=$value1['total'];
//      }
//      $order_mo[$key]= Order::where('month',$value)->first();
//      $order_mo[$key]['month']=$value;
//      $order_mo[$key]['count']=$count;
//      $order_mo[$key]['sum']=$sum;
//  }
//  return datatables()->of($order_mo)
//  ->toJson();
// }





}
