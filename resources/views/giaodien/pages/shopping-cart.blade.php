@extends('giaodien.master')
@section('title','Giỏ Hàng')
@section('content')
<div id="maincontainer">
  <section id="product">
    <div class="container">
     <!--  breadcrumb --> 
      <ul class="breadcrumb">
        <li>
          <a href="#">Trang Chủ</a>
          <span class="divider">/</span>
        </li>
        <li class="active"> Giỏ Hàng</li>
      </ul>       
      <h1 class="heading1"><span class="maintext"> Giỏ Hàng</span><span class="subtext"> Tất cả sản phẩm trong giỏ hàng của bạn</span></h1>
      <!-- Cart-->
      <div class="cart-info">
      @if(Cart::count() > 0)
        <table class="table table-striped table-bordered">
          <tr>
            <th class="image">Hình</th>
            <th class="name">Tên sản phẩm</th>
            <th class="quantity">Số lượng</th>
            <th class="total">Action</th>
            <th class="price">Giá sản phẩm</th>
            <th class="total">Thành tiền</th>
           
          </tr>
          <form method="GET" action="">
          <input type="hidden" name="_token" value="{{csrf_token()}}">
          
          @foreach($content as $ct)
          <tr>
            <td class="image"><a href="#"><img title="product" alt="product" src="{{asset('public/uploads/products/'.$ct->options->image)}}" height="50" width="50"></a></td>
            <td  class="name"><a href="#">{{$ct->name}}</a></td>
            <td class="quantity">
              {{-- @if (($ct->qty) >1)
                <a href="{!!url('gio-hang/update/'.$ct->rowId.'/'.$ct->qty.'-down')!!}"><span class="glyphicon glyphicon-minus">-</span></a> 
              @else
                <a href="#"><span class="glyphicon glyphicon-minus"></span></a> 
              @endif --}}
              <input type="text" class="item_cart_{!! $ct->rowId !!}" value="{!!$ct->qty!!}" style="width:30px; font-weight:bold; font-size:15px; color:blue;" {{-- readonly="readonly" --}}> 
              {{-- <a href="{!!url('gio-hang/update/'.$ct->rowId.'/'.$ct->qty.'-up')!!}"><span class="glyphicon glyphicon-plus"></span>+</a> --}}
              
            </td>
            <td class="total">
              <a href="javascript:void(0)" class="updatecart" data-id="{{$ct->rowId}}" data-qty="{{$ct->qty}}"><img class="tooltip-test" data-original-title="Cập nhật" src="public/giaodien/img/update.png"></a>
              <a href="xoa-san-pham/{{$ct->rowId}}"><img class="tooltip-test" data-original-title="Xóa"  src="public/giaodien/img/remove.png" alt=""></a>
            </td>
            <td class="price">{{number_format($ct->price)}} vnđ</td>
            <td class="total">{{number_format($ct->price*$ct->qty)}} vnđ</td>  
          </tr>
          @endforeach
          @else
          <div style="text-align: center;font-size: 18px"><b>Hiện không có sản phẩm nào trong giỏ hàng!</b></div>
          @endif
        </table>
        </form>
      </div>
      <div class="container">
      <div class="pull-right">
          <div class="span4 pull-right">
            <table class="table table-striped table-bordered ">
                <td><span class="extra bold totalamout">Tổng Tiền :</span></td>
                <td><span class="bold totalamout">{{$subtotal}} vnd</span></td>
              </tr>
            </table>
            <a href="thanh-toan"><input type="submit" value="Thanh toán" class="btn btn-orange pull-right"></a>
            <a href=""><input type="submit" value="Tiếp tục mua" class="btn btn-orange pull-right mr10"></a>
          </div>
        </div>
        </div>
    </div>
  </section>
</div>
@endsection