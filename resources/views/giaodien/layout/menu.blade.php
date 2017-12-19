<div id="categorymenu">
  <nav class="subnav">
    <ul class="nav-pills categorymenu">
    <li><a class="active" href="">Trang Chủ</a></li>
    <?php
      $menu_level_1 = DB::table('cates')->where('parent_id',0)->get();
    ?>
    @foreach($menu_level_1 as $item_level_1)
      <li><a href="the-loai/{{$item_level_1->id}}/{{$item_level_1->alias}}">{{$item_level_1->name}}</a>
        <div>
          <ul>
          <?php
            $menu_level_2 = DB::table('products')->where('cate_id',$item_level_1->id)->get();
          ?>
          @foreach($menu_level_2 as $item_level_2)
            <li><a href="loai-san-pham/{{$item_level_2->id}}/{{$item_level_2->alias}}">{{$item_level_2->name}}</a></li>
          @endforeach
          </ul>
        </div>
      </li>
      @endforeach
      <li><a href="lien-he">Liên hệ</a></li>         
    </ul>
  </nav>
</div>