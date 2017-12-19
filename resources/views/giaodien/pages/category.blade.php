@extends('giaodien.master')
@section('title','Thể Loại')
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
        <li class="active">Thể Loại</li>
      </ul>
      <div class="row">        
        <!-- Sidebar Start-->
        <aside class="span3">
         <!-- Category-->  
          <div class="sidewidt">
            <h2 class="heading2"><span>thể loại</span></h2>
            <ul class="nav nav-list categories">
            @foreach($data as $c)
              <li>
                <a href="the-loai/{{$c->id}}/{{$c->alias}}">{{$c->name}}</a>
              </li>
            @endforeach
            </ul>
          </div>
         <!--  Best Seller -->  
          {{-- <div class="sidewidt">
            <h2 class="heading2"><span>Best Seller</span></h2>
            <ul class="bestseller">
              <li>
                <img width="50" height="50" src="img/prodcut-40x40.jpg" alt="product" title="product">
                <a class="productname" href="product.html"> Product Name</a>
                <span class="procategory">Women Accessories</span>
                <span class="price">$250</span>
              </li>
              <li>
                <img width="50" height="50" src="img/prodcut-40x40.jpg" alt="product" title="product">
                <a class="productname" href="product.html"> Product Name</a>
                <span class="procategory">Electronics</span>
                <span class="price">$250</span>
              </li>
              <li>
                <img width="50" height="50" src="img/prodcut-40x40.jpg" alt="product" title="product">
                <a class="productname" href="product.html"> Product Name</a>
                <span class="procategory">Electronics</span>
                <span class="price">$250</span>
              </li>
            </ul>
          </div> --}}
          <!-- Latest Product -->  
          <div class="sidewidt">
            <h2 class="heading2"><span>Bán chạy nhất</span></h2>
            <ul class="bestseller">
              @foreach($product_lasted as $p)
              <li>
                <img width="50" height="50" src="public/uploads/products/{{$p->image}}" alt="product" title="product">
                <a class="productname" href="loai-san-pham/{{$p->id}}/{{$p->alias}}"> {{$p->name}}</a>
                <span class="price">{{number_format($p->price,0,",",".")}} vnđ</span>
              </li>
              @endforeach
            </ul>
          </div>
          
        </aside>
        <!-- Sidebar End-->
        <!-- Category-->
        <div class="span9">          
          <!-- Category Products-->
          <section id="category">
            <div class="row">
              <div class="span9">
               <!-- Category-->
                <section id="categorygrid">
                  <ul class="thumbnails grid">
                  @foreach($product as $p)
                    <li class="span3">
                      <a class="prdocutname" href="loai-san-pham/{{$p->id}}/{{$p->alias}}">{{$p->name}}</a>
                      <div class="thumbnail">
                        <span class="sale tooltip-test">Sale</span>
                        <a href="loai-san-pham/{{$p->id}}/{{$p->alias}}"><img with="100px" height="300px" alt="" src="public/uploads/products/{{$p->image}}"></a>
                        <div class="pricetag">
                          <span class="spiral"></span><a href="mua-hang/{{$p->id}}/{{$p->alias}}" class="productcart">ADD TO CART</a>
                          <div class="price">
                            <div class="pricenew">{{number_format($p->price,0,",",".")}}đ</div>
                          </div>
                        </div>
                      </div>
                    </li>
                  @endforeach
                  </ul>
                  {{-- <div class="pagination pull-right" style="text-align: center;">
                    {{$product->links()}}
                  </div> --}}
                  <div class="pagination pull-right">
                    <ul>
                      @if($product->currentPage() != 1)
                      <li><a href="{{$product->url($product->currentPage() - 1)}}">Prev</a></li>
                      @endif
                      @for($i = 1; $i <= $product->lastPage(); $i += 1)
                      <li class="{{$product->currentPage() ==  $i ? 'active' : ''}}">
                        <a href="{{$product->url($i)}}">{{ $i }}</a>
                      </li>
                      @endfor
                      @if($product->currentPage() != $product->lastPage())
                      <li><a href="{{$product->url($product->currentPage() + 1)}}">Next</a></li>
                      @endif
                    </ul>
                  </div>
                </section>
              </div>
            </div>
          </section>
        </div>
      </div>
    </div>
  </section>
</div>
@endsection

