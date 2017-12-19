<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UserRequest;
use App\User;

class UserController extends Controller
{
    public function getList(){
        $user = User::all();
        return view('admin.user.list',['user'=>$user]);
    }

    public function getAdd(){
        return view('admin.user.add');
    }

    public function postAdd(UserRequest $request){
        $user                 = new User;
        $user->username       = $request->txtUser;
        $user->password       = bcrypt($request->txtPass);
        $user->email          = $request->txtEmail;
        $user->level          = $request->rdoLevel;
        $user->remember_token = $request->_token;
        $user->save();

        return redirect('admin/user/list')->with(['flash_level'=>'success','flash_message'=>'Success !! Thêm thành công']);
    }

    public function getEdit($id){
        $user = User::find($id);
        return view('admin.user.edit',['user'=>$user]);
    }

    public function postEdit(Request $request,$id){
        $this->validate($request,
            [
                'txtPass'   =>'required',
                'txtRePass' =>'required|same:txtPass',
                'txtEmail'  =>'required|email',
            ],
            [
                'txtPass.required'   =>'Vui lòng nhập password',
                'txtRePass.required' =>'Vui lòng nhập lại password',
                'txtRePass.same'     =>'Password nhập lại không đúng',
                'txtEmail.required'  =>'Vui lòng nhập email',
                'txtEmail.email'     =>'Email không đúng'
            ]);

        $user                 = User::find($id);
        $user->password       = bcrypt($request->txtUser);
        $user->email          = $request->txtEmail;
        $user->level          = $request->rdoLevel;
        $user->remember_token = $request->input('_token');
        $user->save();

        return redirect('admin/user/list')->with(['flash_level'=>'success','flash_message'=>'Success !! Sửa thành công']);
    }

    public function getDelete($id){
    	$user = User::find($id);
        if($user['level'] == 1){
            return redirect('admin/user/list')->with(['flash_level'=>'danger','flash_message'=>'Không thể xóa Admin!']);
        } else {
            $user->delete();
            return redirect('admin/user/list')->with(['flash_level'=>'success','flash_message'=>'Xóa thành công']);
        }
    }
}
