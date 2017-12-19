<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginRequest;
use App\Cate;
use App\User;

class LoginController extends Controller
{
    public function getLogin(){
    	if(!Auth::check()){
    		return view('admin.login');
    	} else {
    		return redirect('admin/cate/list');
    	}
    }

    public function postLogin(LoginRequest $request){
    	if(Auth::attempt(['username'=>$request->txtUser,'password'=>$request->txtPass])){
    		return redirect('admin/cate/list');
    	} else {
    		return redirect('admin/login')->with(['flash_level'=>'danger','flash_message'=>'Tài khoản hoặc mật khẩu không đúng']);
    	}
    }

    public function getLogout(){
    	Auth::logout();
    	return redirect('admin/login');
    }
}
