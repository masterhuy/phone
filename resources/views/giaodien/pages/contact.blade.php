@extends('giaodien.master')
@section('title','Liên Hệ')
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
        <li class="active">Liên Hệ</li>
      </ul>  
      <!-- Contact Us-->
      <h1 class="heading1"><span class="maintext">Liên Hệ</span><span class="subtext"> Liên hệ với chúng tôi</span></h1>
      <div class="row">
        <div class="span9">
          <form class="form-horizontal" method="post" action="lien-he">
          <input type="hidden" name="_token" value="{{csrf_token()}}">
            <fieldset>
              <div class="control-group">
                <label for="name" class="control-label">Tên <span class="required">*</span></label>
                <div class="controls">
                  <input type="text"  class="required" id="name" value="" name="name">
                </div>
              </div>
              <div class="control-group">
                <label for="email" class="control-label">Email <span class="required">*</span></label>
                <div class="controls">
                  <input type="email"  class="required email" id="email" value="" name="email">
                </div>
              </div>
              <div class="control-group">
                <label for="url" class="control-label">Địa chỉ</label>
                <div class="controls">
                  <input type="text" id="url" value="" name="address">
                </div>
              </div>
              <div class="control-group">
                <label for="message" class="control-label">Tin nhắn</label>
                <div class="controls">
                  <textarea  class="required" rows="6" cols="40" id="message" name="message"></textarea>
                </div>
              </div>
              <div class="form-actions">
                <input class="btn btn-orange" type="submit" value="Gửi" id="submit_id">
                <input class="btn" type="reset" value="Làm lại">
              </div>
            </fieldset>
          </form>
        </div>
        
        <!-- Sidebar Start-->
        <div class="span3">
          <aside>
            <div class="sidewidt">
              <h2 class="heading2"><span>Thông tin liên hệ</span></h2>
              <p> Công ty cổ phần SimpleOne.<br>
                Văn phòng: Lầu 5 Etown 2, 364 Nguyễn Khang, Q.Cầu Giấy, TP.Hà Nội.<br>
               Chịu trách nhiệm nội dung: Master Huy.<br>
                <br>
                Phone: (04)730.88888<br>
                Email: Simpleone@gmail.com<br>
                Web: <a>simpleone.com</a><br>
              </p>
            </div>
          </aside>
        </div>
        <!-- Sidebar End-->
        
      </div>
    </div>
  </section>
</div>
@endsection