@extends('admin.master')
@section('title','Edit Category')
@section('controller','Category')
@section('type','Edit')
@section('content')
<!-- /.col-lg-12 -->
<div class="col-lg-7" style="padding-bottom:120px">

    @include('admin.blocks.error')

    <form action="" method="POST">
    <input type="hidden" name="_token" value="{{csrf_token()}}">
        <div class="form-group" name="sltParent">
            <label>Category Parent</label>
            <select class="form-control">
                <option value="0">Please Choose Category</option>
                <?php menuMulti($cate,0, $str = "--|",$data->parent_id); ?>
            </select>
        </div>
        <div class="form-group">
            <label>Category Name</label>
            <input class="form-control" name="txtCateName" placeholder="Please Enter Category Name" value="{{$data->name}}" />
        </div>
        <div class="form-group">
            <label>Category Order</label>
            <input class="form-control" name="txtOrder" placeholder="Please Enter Category Order" value="{{$data->order}}" />
        </div>
        <div class="form-group">
            <label>Category Keywords</label>
            <input class="form-control" name="txtKeywords" placeholder="Please Enter Category Keywords" value="{{$data->keywords}}" />
        </div>
        <div class="form-group">
            <label>Category Description</label>
            <textarea class="form-control" rows="3" name="txtDescription">{{$data->description}}</textarea>
        </div>
        <button type="submit" class="btn btn-default">Category Edit</button>
        <button type="reset" class="btn btn-default">Reset</button>
    <form>
</div>
@endsection
                
