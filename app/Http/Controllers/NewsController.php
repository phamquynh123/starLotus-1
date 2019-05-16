<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\News;
use App\New_translate;
use App\Laguage;
use Yajra\Datatables\Datatables;
use App\Http\Requests\StoreNewss;
use App\Http\Requests\UpdateNews;

class NewsController extends Controller
{
    public function index()
    {   
        return view('admin/new');
    }
    public function datatableNew(){
        return Datatables::of(News::query())
        ->addColumn('action', function ($New) {
            return ' <button class="btn btn-sm btn-warning" new_id="'.$New->id.'" data-toggle="modal" data-target="#editNew" title="Edit New" id="EditNew"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button> <button class="btn btn-sm btn-danger deleteNew" data-id="'.$New->id.'" title="Delete New"><i class="fa fa-trash" aria-hidden="true"></i></button>';
        })
        ->rawColumns([ 'action'])
        ->toJson();
    }
    public function create(StoreNewss $request){
    	$data = $request->all(); 
        if ($request->hasFile('file')) {
           $path=$request->file->storeAs('images','image_'.time().'.png');
           $data['image']=$path;
       }
       $data['slug']= str_slug($data['title_en']);
       $new= News::create($data); 
       $viet['news_id']=$new['id'];
       $viet['language_id']=1;
       $viet['title']= $data['title_vi'];
       $viet['content']= $data['content_vi'];

       $nhat['news_id']=$new['id'];
       $nhat['language_id']=3;
       $nhat['title']= $data['title_jp'];
       $nhat['content']= $data['content_jp'];

       $anh['news_id']=$new['id'];
       $anh['language_id']=2;
       $anh['title']= $data['title_en'];
       $anh['content']= $data['content_en'];

       New_translate::create($viet);
       New_translate::create($nhat);
       New_translate::create($anh);


       return response()->json(['success'=>'Thêm mới thành công','error'=>false]);
   }
   public function destroy($id){
    News::find($id)->delete();
    New_translate::where('news_id',$id)->delete();
    return response()->json(['message' => 'Xoa thanh cong']);
}
public function edit($id){
    $data= array();
    $news= News::where('id',$id)->get();
    foreach ($news as $key => $value) {
       $data['image']= $value['image'];
       $contents= New_translate::where('news_id',$id)->get();
       foreach ($contents as $key1 => $value1) {
        $language= Laguage::where('id',$value1['language_id'])->first();
        $data[$key1]['content']= $value1['content'];
        $data[$key1]['title']= $value1['title'];

    }
}
return $data;
}
public function update(UpdateNews $request){

    $data = $request->all();
     if ($request->hasFile('file')) {
      $path=$request->file->storeAs('images','image_'.time().'.png');
      $data['image']=$path;
}

$data['slug']= str_slug($data['title_en']);
$news= News::find($request->news_id);
$new= $news->update($data); 
$viet['title']= $data['title_vi'];
$viet['content']= $data['content_vi'];

$anh['title']= $data['title_en'];
$anh['content']= $data['content_en'];

$nhat['title']= $data['title_jp'];
$nhat['content']= $data['content_jp'];

New_translate::where('news_id',$request->news_id)->where('language_id',1)->update($viet);
New_translate::where('news_id',$request->news_id)->where('language_id',2)->update($anh);
New_translate::where('news_id',$request->news_id)->where('language_id',3)->update($nhat);

return response()->json(['success'=>'Thêm mới thành công',
    'error'=>false,]);
}
}
?>
