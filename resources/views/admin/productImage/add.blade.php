@extends('admin.master')
@section('title','Add ProductImage')
@section('controller','ProductImage')
@section('type','Add')                    
@section('content')               
<div class="col-lg-7" style="padding-bottom:120px">

    @include('admin.blocks.error')

    <form action="admin/productImage/add" method="POST">
    <input type="hidden" name="_token" value="{{csrf_token()}}">
        <div class="form-group">
            <label>Product Name</label>
            <select class="form-control" name="sltParent">
                <option value="">Please Choose Product Name</option>
                    @foreach($product as $p)
                    <option value="{{$p->id}}">{{$p->name}}</option>
                    @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-default">Add Image</button>
        <button type="reset" class="btn btn-default">Reset</button>
        <br>
        <br>
        <div class="col-md-1"></div>
        <div class="col-md-4">
            @for($i = 1; $i <= 10; $i++)
            <div class="form-group">
                <label>Image {{ $i }}</label>
                <input type="file" name="fProductImage">
            </div>
            @endfor
        </div>
    <form>
</div>
@endsection
