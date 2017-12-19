<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\ProductImage;

class ProductImageController extends Controller
{
    public function getList(){
        $productImage = ProductImage::all();
        $product      = Product::all();
    	return view('admin.productImage.list',['productImage'=>$productImage,'$product'=>$product]);
    }

    public function getAdd(){
    	$product = Product::all();
    	return view('admin.productImage.add',['product'=>$product]);
    }

    public function postAdd(Request $request){
    	$this->validate($request,
    		[
				'sltParent'     =>'required',
				'fProductImage' =>'image'
    		],
    		[
				'sltParent.required'     =>'Vui lòng chọn tên sản phẩm',
				'fProductImage.image'    =>'File đã chọn không phải định dạng hình ảnh'
    		]);
    	$productImage = new ProductImage;
    	
    	if($request->hasFile('fProductImage')){
			$file = $request->file('fProductImage');
			$name = $file->getClientOriginalName();
			$Hinh = str_random(4)."_".$name;
			$file->move("public/uploads/productImages",$Hinh);
			$productImage->image = $Hinh;
		} else{
			$productImage->image = "";
		}

		$productImage->product_id = $request->sltParent;
		$productImage->save();

		return redirect('admin/productImage/add')->with(['flash_level'=>'success','flash_message'=>'Success !! Thêm thành công']);
    }

    public function getEdit(){

    }

    public function postEdit(){

    }

    public function getDelete($id){
        
    }
}
