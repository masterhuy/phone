@extends('admin.master')
@section('title','Add Product')
@section('controller','Product')
@section('type','Add')
@section('content')
<form action="admin/product/add" method="POST" enctype="multipart/form-data">
<div class="col-lg-7" style="padding-bottom:120px">

    @include('admin.blocks.error')

    <input type="hidden" name="_token" value="{{csrf_token()}}">
        <div class="form-group">
            <label>Category Parent</label>
            <select class="form-control" name="sltParent">
                <option value="">Please Choose Category</option>
               
                <?php menuMulti($cate,0, $str = "--|",old('sltParent')); ?>

            </select>
        </div>
        <div class="form-group">
            <label>Name</label>
            <input class="form-control" name="txtName" placeholder="Please Enter Username" />
        </div>
        <div class="form-group">
            <label>Price</label>
            <input class="form-control" name="txtPrice" placeholder="Please Enter Rice" />
        </div>
        <div class="form-group">
            <label>Intro</label>
            <textarea class="form-control" rows="3" name="txtIntro"></textarea>
            {{-- <script type="text/javascript">ckeditor("txtIntro")</script> --}}
            <script type="text/javascript">
                var editor = CKEDITOR.replace('txtIntro',{
                    language:'vi',
                    filebrowserImageBrowseUrl : '/public/admin/templates/js/plugin/ckfinder/ckfinder.html?Type=Images',
                    filebrowserFlashBrowseUrl : '/public/admin/templates/js/plugin/ckfinder/ckfinder.html?Type=Flash',
                    filebrowserImageUploadUrl : '/public/admin/templates/js/plugin/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
                    filebrowserFlashUploadUrl : '/public/admin/templates/js/plugin/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
                });
            </script>
        </div>
        <div class="form-group">
            <label>Content</label>
            <textarea class="form-control" rows="3" name="txtContent"></textarea>
            {{-- <script type="text/javascript">ckeditor("txtContent")</script> --}}
            <script type="text/javascript">
                var editor = CKEDITOR.replace('txtContent',{
                    language:'vi',
                    filebrowserImageBrowseUrl : '/public/admin/templates/js/plugin/ckfinder/ckfinder.html?Type=Images',
                    filebrowserFlashBrowseUrl : '/public/admin/templates/js/plugin/ckfinder/ckfinder.html?Type=Flash',
                    filebrowserImageUploadUrl : '/public/admin/templates/js/plugin/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
                    filebrowserFlashUploadUrl : '/public/admin/templates/js/plugin/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
                });
            </script>
        </div>
        <div class="form-group">
            <label>Images</label>
            <input type="file" name="fImages">
        </div>
        <div class="form-group">
            <label>Product Keywords</label>
            <input class="form-control" name="txtKeywords" placeholder="Please Enter Category Keywords" />
        </div>
        <div class="form-group">
            <label>Product Description</label>
            <textarea class="form-control" rows="3" name="txtDescription"></textarea>
        </div>
        <button type="submit" class="btn btn-default">Product Add</button>
        <button type="reset" class="btn btn-default">Reset</button>
    </div>
</form>
@endsection               
