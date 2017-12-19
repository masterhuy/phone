<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Cate;
use DB,Mail,Input,Cart;

class PagesController extends Controller
{
    public function getIndex(){
    	$product1 = DB::table('products')->select('id','name','image','price','alias')->orderBy('id','DESC')->skip(0)->take(8)->get();
    	$product2 = DB::table('products')->select('id','name','image','price','alias')->orderBy('id','ASC')->skip(0)->take(8)->get();
    	return view('giaodien.pages.home',['product1'=>$product1,'product2'=>$product2]);
    }

    public function loaisanpham($id){
    	$product = Product::find($id);
    	return view('giaodien.pages.product',['product'=>$product]);
    }

    public function theloai($id){
		$cate           = Cate::find($id);
		$data           = Cate::all();
		$product        = Product::select('id','name','image','price','alias')->where('cate_id',$cate->id)->paginate(6);
		$product_lasted = Product::select('id','name','image','price','alias')->where('cate_id',$cate->id)->take(3)->get();
    	return view('giaodien.pages.category',['cate'=>$cate,'product'=>$product,'data'=>$data,'product_lasted'=>$product_lasted]);
    }

    public function getlienhe(){
    	return view('giaodien.pages.contact');
    }

    public function postlienhe(Request $request){
    	$data = [
					'hoten'   =>$request->name,
					'email'   =>$request->email,
					'diachi'  =>$request->address,
					'tinnhan' =>$request->message
    			];

    	Mail::send('mail.trangguimail',$data,function($msg){
    		$msg->from('nodanhtoi123@gmail.com','Quang Huy');
    		$msg->to('nodanhtoi123@gmail.com','zz')->subject('đây là mail');
    	});
    	echo "<script>
    			alert('Cảm ơn bạn đã góp ý.');
    			window.location = '".url('/')."'
    		</script>";
    }

    public function muahang($id){
    	$product_buy = DB::table('products')->where('id',$id)->first();
    	Cart::add(['id'=>$id,'name'=>$product_buy->name,'qty'=>1,'price'=>$product_buy->price,'options' => ['image'=>$product_buy->image]]);
    	return redirect('gio-hang');
    }

    public function giohang(){
        $content  = Cart::content();
        $total    = Cart::total();
        $subtotal = Cart::subtotal(0,',','.');
    	return view('giaodien.pages.shopping-cart',['content'=>$content,'total'=>$total,'subtotal'=>$subtotal]);
    }

    public function xoasanpham($id){
    	Cart::remove($id);
    	return redirect('gio-hang');
    }

    public function capnhat(){
    	if(Request::ajax()){
			$id  = Request::get('id');
			$qty = Request::get('qty');
    		Cart::update($id,$qty);
    		echo "oke";
    	}
    }

    public function updatecart($id,$qty){
        Cart::update($id,$qty);
        echo Cart::count();
    }

    public function getupdatecart($id,$qty,$dk)
    {
      if ($dk=='up') {
         $qt = $qty+1;
         Cart::update($id, $qt);
         return redirect()->route('getcart');
      } elseif ($dk=='down') {
         $qt = $qty-1;
         Cart::update($id, $qt);
         return redirect()->route('getcart');
      } else {
         return redirect()->route('getcart');
      }
    }

    public function thanhtoan(){
        $content  = Cart::content();
        $total    = Cart::total();
        $subtotal = Cart::subtotal(0,',','.');
    	return view('giaodien.pages.checkout',['content'=>$content,'total'=>$total,'subtotal'=>$subtotal]);
    }

}
