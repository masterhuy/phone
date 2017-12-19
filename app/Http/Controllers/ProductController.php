<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ProductRequest;
use App\Cate;
use App\Product;
use App\ProductImage;
use File;

class ProductController extends Controller
{
    public function getList(){
        $cate    = Cate::all();
        $product = Product::all();
    	return view('admin.product.list',['product'=>$product,'cate'=>$cate]);
    }

    public function getAdd(){
        $cate = Cate::all();
    	return view('admin.product.add',['cate'=>$cate]);
    }

    public function postAdd(ProductRequest $request){
        $product              = new Product;
        $product->name        = $request->txtName;
        $product->alias       = str_slug($request->txtName,"-");
        $product->price       = $request->txtPrice;
        $product->intro       = $request->txtIntro;
        $product->content     = $request->txtContent;

        $file = $request->file('fImages');
        if (strlen($file) > 0) {
            $filename = time().'.'.$file->getClientOriginalName();
            $destinationPath = 'public/uploads/products/';
            $file->move($destinationPath,$filename);
            $product->image = $filename;
        }

        $product->keywords    = $request->txtKeywords;
        $product->description = $request->txtDescription;
        $product->user_id     = Auth::user()->id;
        $product->cate_id     = $request->sltParent;
        $product->save();

        return redirect('admin/product/list')->with(['flash_level'=>'success','flash_message'=>'Success !! Thêm thành công']);
    }

    public function getEdit($id){
        $cate    = Cate::all();
        $product = Product::find($id);
        return view('admin.product.edit',['product'=>$product],['cate'=>$cate]);
    }

    public function postEdit(Request $request,$id){
        $this->validate($request,
            [
                // 'sltParent' =>'required',
                'txtName'   =>'required',
                'fImages'   =>'required'
            ],
            [
                // 'sltParent.required' =>'Vui lòng chọn thể loại',
                'txtName.required'   =>'Vui lòng nhập tên sản phẩm',
                'fImages.required'   =>'Vui lòng chọn ảnh sản phẩm',
                // 'fImages.image'      =>'File đã chọn không phải là định dạng hình'
            ]);

        $product = Product::find($id);
        $product->name        = $request->txtName;
        $product->price       = $request->txtPrice;
        $product->intro       = $request->txtIntro;
        $product->content     = $request->txtContent;

        if($request->hasFile('fImages')){
            $file = $request->file('fImages');
            $name = $file->getClientOriginalName();
            $Hinh = str_random(4)."_".$name;
            while(file_exists("public/uploads/products/".$Hinh)){
                $Hinh = str_random(4)."_".$Hinh;
            }
            $file->move("public/uploads/products",$Hinh);
            unlink("public/uploads/products/".$tintuc->Hinh);
            $tintuc->Hinh = $Hinh;
        }

        $product->keywords    = $request->txtKeywords;
        $product->description = $request->txtDescription;
        $product->user_id     = Auth::user()->id;
        $product->cate_id     = $request->sltParent;
        $product->save();

        return redirect('admin/product/list')->with(['flash_level'=>'success','flash_message'=>'Success !! Sửa thành công']);
    }

    public function getDelete($id){
        $product = Product::find($id);
        if (file_exists(public_path().'public/uploads/products/'.$product->image)) {
            File::delete(public_path().'public/uploads/products/'.$product->image);
        }
        $product->delete();

        return redirect('admin/product/list')->with(['flash_level'=>'success','flash_message'=>'Success !! Xoá thành công']);
    }
}
