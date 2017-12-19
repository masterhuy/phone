<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CateRequest;
use App\Cate;
use DateTime;

class CateController extends Controller
{
	public function getList(){
        $cate = Cate::all();
    	return view('admin.cate.list',['cate'=>$cate]);
    }

    public function getAdd(){
        $cate = Cate::all();
    	return view('admin.cate.add',['cate'=>$cate]);
    }

    public function postAdd(CateRequest $request){
		$cate              = new Cate;
		$cate->name        = $request->txtCateName;
		$cate->alias       = str_slug($request->txtCateName,"-");
		$cate->order       = $request->txtOrder;
		$cate->parent_id   = $request->sltParent;
		$cate->keywords    = $request->txtKeywords;
		$cate->description = $request->txtDescription;
    	$cate->save();

    	return redirect('admin/cate/list')->with(['flash_level'=>'success','flash_message'=>'Success !! Thêm thành công']);
    }

    public function getEdit($id){
        $data = Cate::find($id);
        $cate = Cate::all();
        return view('admin.cate.edit',['cate'=>$cate,'data'=>$data]);
    }

    public function postEdit(Request $request,$id){
        $this->validate($request,
            [
                'txtCateName'=>'required'
            ],
            [
                'txtCateName.required'=>'Không được để trống tên thể loại'
            ]);

        $cate = Cate::find($id);
        $cate->name        = $request->txtCateName;
        $cate->alias       = str_slug($request->txtCateName,"-");
        $cate->order       = $request->txtOrder;
        $cate->parent_id   = $request->sltParent;
        $cate->keywords    = $request->txtKeywords;
        $cate->description = $request->txtDescription;
        $cate->save();

        return redirect('admin/cate/list')->with(['flash_level'=>'success','flash_message'=>'Success !! Sửa thành công']);
    }

    public function getDelete($id){
        $parent = Cate::where('parent_id',$id)->count();
        if($parent == 0){
            $cate = Cate::find($id);
            $cate->delete();

            return redirect('admin/cate/list')->with(['flash_level'=>'success','flash_message'=>'Success !! Xóa thành công']);
        } else {
            echo '<script type="text/javascript">
                alert("Bạn không được phép xóa danh mục này");
                window.location = "';
                echo route('admin.cate.list');
            echo '"
            </script>';
        }
        
    }
}
