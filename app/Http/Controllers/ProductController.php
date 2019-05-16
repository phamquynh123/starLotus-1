<?php
namespace App\Http\Controllers;
use App\Product;
use App\Category_translate;
use App\Product_translate;
use App\Image;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProduct;
use Yajra\Datatables\Datatables;
class ProductController extends Controller
{

    public function index()
    {
     return view('admin.product');
 }
 public function datatableProduct(){
    $products= Product::all();
    foreach ($products as $key => $value) {
      $products[$key]['category']= Category_translate::where('category_id',$value['category_id'])->where('language_id',2)->first()['name'];
      $products[$key]['image']= Image::where('product_id',$value['id'])->first()['link'];
      if($value['status']==1){
       $products[$key]['statusPro'] = 'active';
      }else{
         $products[$key]['statusPro'] = 'deactive';
      }
  }

  return Datatables::of($products)
  ->addColumn('action', function ($product) {
      return '<button class="btn btn-info btn-sm uploadProduct"  Product_id="'.$product->id.'" data-toggle="modal" data-target="#uploadProduct" title="Upload Image"><i class="fa fa-upload" aria-hidden="true"></i></button>
      <button class="btn btn-primary btn-sm showProduct" Product_id="'.$product->id.'" data-toggle="modal" data-target="#ShowProduct" title="Show Product"><i class="fa fa-eye" aria-hidden="true"></i></button>  <button class="btn btn-sm btn-warning" Product_id="'.$product->id.'" data-toggle="modal" data-target="#editProduct" title="Edit Product" id="EditProduct"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button> ';
  })
  ->editColumn('image',function($product){
    return '<img src="http://starlotus.com:8888/storage/'.$product->image.'" >';
  })
   ->editColumn('statusPro',function($product){
    if($product->status=='1'){
      $statusPro= 'active';
    }else{
      $statusPro= 'deactive';
    }
    return ' <button class="btn btn-sm btn-success statusPro" product_id="'.$product->id.'" title="Status Product">'.$statusPro.'</button>';
  })
  ->rawColumns([ 'action','image','statusPro'])
  ->toJson();
}

public function create(StoreProduct $request)
{
 $data= $request->all();
 $data['slug']= str_slug($data['name']);
 $data['status']=1;
 $pro= Product::create($data);

 $viet['price']=$data['price_vi'];
 $viet['laguage_id']=1;
 $viet['description']= $data['content_vi'];
 $viet['product_id']=$pro['id'];

 $nhat['price']=$data['price_jp'];
 $nhat['laguage_id']=3;
 $nhat['description']= $data['content_jp'];
 $nhat['product_id']=$pro['id'];

 $anh['price']=$data['price_en'];
 $anh['laguage_id']=2;
 $anh['description']= $data['content_en'];
 $anh['product_id']=$pro['id'];
 Product_translate::create($viet);
 Product_translate::create($nhat);
 Product_translate::create($anh);
 return response()->json([ 'error'=>false,'success'=>'Thêm mới thành công !',
]);
}

public function show(Product $product)
{

}


public function edit($id)
{
 $product= Product::find($id);
 $images= Image::where('product_id',$id)->get();
 $data= array();
 $data['name']=$product['name'];
 $data['quantity']=$product['quantity'];
 foreach ($images as $key => $value) {
   $image= $value['link'];
   $data['image'][$key]=$image;
}
// var_dump($data);
// die;
$data['category']= Category_translate::where('category_id',$product['category_id'])->where('language_id',2)->first()['name'];
$data['category_id']=$product['category_id'];
$product_translate= Product_translate::where('product_id',$id)->get();

$data['content_vi']= $product_translate[0]['description'];
$data['content_en']=$product_translate[2]['description'];
$data['content_jp']=$product_translate[1]['description'];

$data['price_vi']= $product_translate[0]['price'];
$data['price_en']=$product_translate[2]['price'];
$data['price_jp']=$product_translate[1]['price'];

return $data;
}

public function update(StoreProduct $request)
{
  $data= $request->all();
  $data['slug']= str_slug($data['name']);
  $data['status']=1;
  $product= Product::find($request->product_id);
  $pro= $product->update($data);

  $viet['price']=$data['price_vi'];
  $viet['laguage_id']=1;
  $viet['description']= $data['content_vi'];
  $viet['product_id']=$product['id'];

  $nhat['price']=$data['price_jp'];
  $nhat['laguage_id']=3;
  $nhat['description']= $data['content_jp'];
  $nhat['product_id']=$product['id'];

  $anh['price']=$data['price_en'];
  $anh['laguage_id']=2;
  $anh['description']= $data['content_en'];
  $anh['product_id']=$product['id'];

  Product_translate::where('product_id',$request->product_id)->where('laguage_id',1)->update($viet);
  Product_translate::where('product_id',$request->product_id)->where('laguage_id',3)->update($nhat);
  Product_translate::where('product_id',$request->product_id)->where('laguage_id',2)->update($anh);
  return response()->json([ 'error'=>false,'success'=>'Sửa thành công !',
]);
}

public function destroy($id){
    Product::find($id)->delete();
    Product_translate::where('product_id',$id)->delete();
    Image::where('product_id',$id)->delete();
    return response()->json(['message' => 'Xoa thanh cong']);
}
public function upload(Request $request){
  $path=$request->fileUpload->storeAs('images','image_'.time().'.png');
  $proImg = Image::create([
    'product_id'=>$request->product_id,
    'link'=>$path,
]);
  return response()->json([
    'data' => $proImg
]);
}

public function getImage($id){
  $image = Image::where('product_id',$id)->get();
  return response()->json([
'image'=> $image,
  ]);
}
public function delImg($id){
  // dd($id);
  Image::find($id)->delete();
  return response()->json(['message' => 'Xoa thanh cong']);
}
public function status(Request $request){
 if($request->status=='deactive'){
  Product::find($request->product_id)->update(['status'=>0]);
 }else if($request->status=='active'){
Product::find($request->product_id)->update(['status'=>1]);
 }
}
}
