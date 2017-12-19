@extends('admin.master')
@section('title','Edit Product')
@section('controller','Product')
@section('type','Edit')
@section('content')
<div class="col-lg-7" style="padding-bottom:120px">

    @include('admin.blocks.error')

    <form action="admin/product/edit/{{$product->id}}" method="POST">
    <input type="hidden" name="_token" value="{{csrf_token()}}">
        <div class="form-group" name="sltParent">
            <label>Category Parent</label>
            <select class="form-control">
                <option value="0">Please Choose Category</option>
                <?php menuMulti($cate,0, $str = "--|",$product->cate_id); ?>
            </select>
        </div>
        <div class="form-group">
            <label>Name</label>
            <input class="form-control" name="txtName" placeholder="Please Enter Username" value="{{$product->name}}" />
        </div>
        <div class="form-group">
            <label>Price</label>
            <input class="form-control" name="txtPrice" placeholder="Please Enter Password" value="{{$product->price}}" />
        </div>
        <div class="form-group">
            <label>Intro</label>
            <textarea class="form-control" rows="3" name="txtIntro">{{$product->intro}}</textarea>
        </div>
        <div class="form-group">
            <label>Content</label>
            <textarea class="form-control" rows="3" name="txtContent">{{$product->content}}</textarea>
        </div>
        <div class="form-group">
            <label>Image Current</label>
            <p>
                <img src="public/uploads/products/{{$product->image}}" width="200px">
            </p>
        </div>
        <div class="form-group">
            <label>Image Edit</label>
            <input type="file" name="fImages" >
        </div>
        <div class="form-group">
            <label>Product Keywords</label>
            <input class="form-control" name="txtOrder" placeholder="Please Enter Category Keywords" value="{{$product->keywords}}" />
        </div>
        <div class="form-group">
            <label>Product Description</label>
            <textarea class="form-control" rows="3">{{$product->description}}</textarea>
        </div>
        <button type="submit" class="btn btn-default">Product Edit</button>
        <button type="reset" class="btn btn-default">Reset</button>
    <form>
</div>
@endsection