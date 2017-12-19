@extends('giaodien.master')
@section('title','Welcome to SimpleOne ')

@section('content')
<!-- Featured Product-->
<!-- Slider Start-->
@include('giaodien.layout.slide')
<!-- Slider End-->

<!-- Section Start-->
@include('giaodien.layout.otherddetail')
<!-- Section End-->
<section id="featured" class="row mt40">
  <div class="container">
    <h1 class="heading1"><span class="maintext">sản phẩm nổi bật</span><span class="subtext"> Featured Products</span></h1>
    <ul class="thumbnails">
    @foreach($product1 as $p1)
      <li class="span3">
        <a class="prdocutname" href="product.html">{{$p1->name}}</a>
        <div class="thumbnail">
          <span class="sale tooltip-test">Sale</span>
            <a href="loai-san-pham/{{$p1->id}}/{{$p1->alias}}"><img with="100px" height="300px" alt="" src="public/uploads/products/{{$p1->image}}"></a>
          <div class="pricetag">
            <span class="spiral"></span><a href="mua-hang/{{$p1->id}}/{{$p1->alias}}" class="productcart">ADD TO CART</a>
            <div class="price">
              <div class="pricenew">{{number_format($p1->price,0,",",".")}}đ</div>
            </div>
          </div>
        </div>
      </li>
    @endforeach
    </ul>
  </div>
</section>

<!-- Latest Product-->
<section id="latest" class="row">
  <div class="container">
    <h1 class="heading1"><span class="maintext">sản phẩm bán chạy nhất</span><span class="subtext"> BestSeller Products</span></h1>
    <ul class="thumbnails">
    @foreach($product2 as $p2)
      <li class="span3">
        <a class="prdocutname" href="product.html">{{$p2->name}}</a>
        <div class="thumbnail">
          <a href="loai-san-pham/{{$p2->id}}/{{$p2->alias}}"><img with="100px" height="300px" alt="" src="public/uploads/products/{{$p2->image}}"></a>
          <div class="pricetag">
            <span class="spiral"></span><a href="mua-hang/{{$p2->id}}/{{$p2->alias}}" class="productcart">ADD TO CART</a>
            <div class="price">
              <div class="pricenew">{{number_format($p2->price,0,",",".")}}đ</div>
            </div>
          </div>
        </div>
      </li>
    @endforeach
    </ul>
  </div>
</section>
@endsection