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
use Gloudemans\Shoppingcart\Facades\Cart;
session_start();
// session_destroy();
 
class ShopController extends Controller
{
  public function index($lag)
  {
    $_SESSION['url']='list';
     $_SESSION['lang']=$lag;
    $language= Laguage::all();
    $lag_id= Laguage::where('summary',$lag)->first()['id'];   
    $products= Product::where('status',1)->orderBy('id','desc')->paginate(env('PAGES', ['*'], 'products'));
    foreach ($products as $key => $value) {
     $products[$key]['image'] = Image::where('product_id',$value['id'])->first()['link'];
     $products[$key]['price'] = Product_translate::where('product_id',$value['id'])->where('laguage_id',$lag_id)->first()['price'];

   }
   $category = Category::all();
   foreach ($category as $key => $value) {
    $category_trans=Category_translate::where('category_id',$value['id'])->where('language_id',$lag_id)->first();
    $category[$key]['name']= $category_trans['name'];
    $product_id= Product::where('category_id',$value['id'])->first()['id'];
    $category[$key]['image']= Image::where('product_id',$product_id)->first()['link'];
  }
  $news =News::orderBy('id','desc')->paginate(5, ['*'], 'news');
  foreach ($news as $key => $value) {
    $new_trans=New_translate::where('news_id',$value['id'])->where('language_id',$lag_id)->first();
    $news[$key]['name']= $new_trans['title'];
    $news[$key]['updated_at']=$new_trans['updated_at'] ;

  }

  return view('shop.shop',['products'=>$products,'category'=>$category,'news'=>$news,'language'=>$language]);
}


public function detail($id,$lag)
{
   $_SESSION['url']='detail/'.$id;
 $_SESSION['lang']=$lag;
 $language= Laguage::all();
 $lag_id= Laguage::where('summary',$lag)->first()['id'];
 $product= Product::find($id);
 $product_translate= Product_translate::where('product_id',$id)->where('laguage_id',$lag_id)->first();
 $images= Image::where('product_id',$id)->get();
 $category = Category::all();
 foreach ($category as $key => $value) {
  $category_trans=Category_translate::where('category_id',$value['id'])->where('language_id',$lag_id)->first();
  $category[$key]['name']= $category_trans['name'];
  $product_id= Product::where('category_id',$value['id'])->first()['id'];
  $category[$key]['image']= Image::where('product_id',$product_id)->first()['link'];
}
$news =News::orderBy('id','desc')->paginate(env('PAGES_NEW'));
foreach ($news as $key => $value) {
  $new_trans=New_translate::where('news_id',$value['id'])->where('language_id',$lag_id)->first();
  $news[$key]['name']= $new_trans['title'];
  $news[$key]['updated_at']=$new_trans['updated_at'];

}

return view('shop.shopDetail',['product'=>$product,'images'=>$images,'product_translate'=>$product_translate,'category'=>$category,'news'=>$news,'language'=>$language]);
}

public function cart(Request $request)
{

  $image= Image::where('product_id',$request->product_id)->first()->link;
  if($request->price==''){
    $request->price=0;
  }
  $cart =Cart::add($request->product_id,$request->name,$request->number,$request->price,0,['image'=>$image]);

}


public function viewCart()
{
  $carts= Cart::content();
  return $carts;
}


public function delete($id)
{
  Cart::remove($id);
}


public function order(Request $request)
{
  $customer= Customer::create(['name'=>$request->name,'address'=>$request->address,'phone'=>$request->phone,'gender'=>$request->gender,'note'=>$request->note,'time_reciept'=>$request->time_receipt]);
  $cart= Cart::content();
  $sum=0;
  $data= array();
  $data1= array();
  foreach ($cart as $key => $value) {
    $sum += $value->price*$value->qty;
  }
  $data['total']= $sum;
  $data['customer_id']= $customer['id'];
  $data['status']=0;
  $month= \Carbon\Carbon::now()->format('m/Y');
  $data['month']= $month;
  $order= Order::create($data);
  foreach ($cart as $key => $value) {
    $order_detail= Order_detail::create(['product_id'=>$value->id,'quantity_buy'=>$value->qty,'order_id'=>$order['id']]);
  }
  Cart::destroy();
}

public function category($slug,$lag)
{
  $_SESSION['url']='category/'.$slug;
  $_SESSION['lang']=$lag;
  $language= Laguage::all();
  $lag_id= Laguage::where('summary',$lag)->first()['id'];
  $category_id= Category::where('slug',$slug)->first()['id'];
  $products = Product::where('category_id',$category_id)->where('status',1)->orderBy('id','desc')->paginate(env('PAGES', ['*'], 'products'));
  foreach ($products as $key => $value) {
   $products[$key]['image'] = Image::where('product_id',$value['id'])->first()['link'];
   $products[$key]['price'] = Product_translate::where('product_id',$value['id'])->where('laguage_id',$lag_id)->first()['price'];
 }
 $category = Category::all();
 foreach ($category as $key => $value) {
  $category_trans=Category_translate::where('category_id',$value['id'])->where('language_id',$lag_id)->first();
  $category[$key]['name']= $category_trans['name'];
  $product_id= Product::where('category_id',$value['id'])->first()['id'];
  $category[$key]['image']= Image::where('product_id',$product_id)->first()['link'];
}
$news =News::orderBy('id','desc')->paginate(env('PAGES_NEW', ['*'], 'news'));
foreach ($news as $key => $value) {
  $new_trans=New_translate::where('news_id',$value['id'])->where('language_id',$lag_id)->first();
  $news[$key]['name']= $new_trans['title'];
  $news[$key]['updated_at']=$new_trans['updated_at'] ;
}

return view('shop.category', ['products'=>$products,'category'=>$category,'news'=>$news]);
}
public function new($slug,$lag){
  $_SESSION['url']='new/'.$slug;
  $_SESSION['lang']=$lag;
  $language= Laguage::all();
  $lag_id= Laguage::where('summary',$lag)->first()['id'];
  $news =News::orderBy('id','desc')->paginate(5, ['*'], 'news');
  foreach ($news as $key => $value) {
    $new_trans=New_translate::where('news_id',$value['id'])->where('language_id',$lag_id)->first();
    $news[$key]['name']= $new_trans['title'];
    $news[$key]['updated_at']=$new_trans['updated_at'] ;

  }
  $new= News::where('slug',$slug)->first();
  $new_tran =New_translate::where('news_id',$new['id'])->where('language_id',$lag_id)->first();
  return view('shop.new', ['new_tran'=>$new_tran,'news'=>$news,'language'=>$language]);
}


}
