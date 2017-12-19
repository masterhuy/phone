<div class="headerstrip">
  <div class="container">
    <div class="row">
      <div class="span12">
        <a href="" class="logo pull-left"><img src="public/giaodien/img/logo.png" alt="SimpleOne" title="SimpleOne"></a>
        <!-- Top Nav Start -->
        <div class="pull-left">
          <div class="navbar" id="topnav">
            <div class="navbar-inner">
              <ul class="nav" >
                <li><a class="home active" href="">Trang Chủ</a>
                </li>
                <li><a class="myaccount" href="#">Tài Khoản</a>
                </li>
                <li><a class="shoppingcart" href="gio-hang">Giỏ Hàng @if(Cart::count() > 0)({!!Cart::count()!!})@else @endif</a>
                </li>
                <li><a class="checkout" href="thanh-toan">Thanh Toán</a>
                </li>

              </ul>

            </div>
          </div>
        </div>
        <!-- Top Nav End -->
      </div>
    </div>
  </div>
</div>