<?php

namespace App\Http\Controllers;

use App\Category;
use App\Category_translate;
use App\Product;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables; 
use App\Http\Requests\StoreCategory;

class CategoryController extends Controller
{

    public function datatableCategory(){
        return Datatables::of(Category::query())
        ->addColumn('action', function ($cate) {
            return '<button data-toggle="modal" data-target="#Show_cate" title="Xem thông tin" data-idd="'.$cate->id.'" class="btn btn-sm btn-info detail1"><i class="fa fa-eye" aria-hidden="true"></i></button> <button class="btn btn-sm btn-warning" Cate_id="'.$cate->id.'" data-toggle="modal" data-target="#editCate" title="Edit Cate" id="EditCate"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>';
        })
        ->make(true);
    }
    

    public function index()
    {
        return view("admin/category");
    }

  
    public function create(StoreCategory $request)
    {   
        $data = $request->all(); 
        $data['slug']= str_slug($data['name_en']);

        $cate= Category::create($data); 

        $viet['category_id']=$cate['id'];
        $viet['language_id']=1;
        $viet['name']= $data['name_vi'];

        $nhat['category_id']=$cate['id'];
        $nhat['language_id']=3;
        $nhat['name']= $data['name_jp'];

        $anh['category_id']=$cate['id'];
        $anh['language_id']=2;
        $anh['name']= $data['name_en'];
        
        Category_translate::create($viet);
        Category_translate::create($nhat);
        Category_translate::create($anh);
               
        return response()->json(['success'=>'Data is successfully added',
            'error'=>false,]);
    }
  
    public function show($id)
    { 
       
       
        $cate = Category::find($id);
        $cate['pro'] = Product::where('category_id', $id )->get();
        foreach ($cate['pro'] as $key => $value) {
           if($value['status'] == 1){$value['status']="Active";} 
            else $value['status']="Deactive";
        }
       
        $cate['lang'] = Category_translate::where('category_id', $id )->get();
      
        return $cate;
    }

   
    public function edit($id)
    {
        $data= array();
       $cates= Category_translate::where('category_id',$id)->get();
          $data['name_vi']=  $cates[0]['name'];
 $data['name_jp']=  $cates[1]['name'];
  $data['name_en']=  $cates[2]['name'];
  return $data;
    }

    
    public function update(StoreCategory $request)
    {
        $data=$request->all();
         $data['slug']= str_slug($data['name_en']);
         $cates=Category::find($data['category_id']);
         $cates->update($data);

        $viet['name']= $data['name_vi'];
        $nhat['language_id']=3;
        $nhat['name']= $data['name_jp'];
        $anh['name']= $data['name_en'];
        
        Category_translate::where('category_id',$cates['id'])->where('language_id',1)->update($viet);
        Category_translate::where('category_id',$cates['id'])->where('language_id',3)->update($nhat);
        Category_translate::where('category_id',$cates['id'])->where('language_id',2)->update($anh);
        return response()->json(['success'=>'Sửa thành công!']);
    }

    
    public function destroy(Category $category)
    {
       
    }
}
