@extends('admin.master')
@section('title','List ProductImage')
@section('controller','ProductImage')
@section('type','List')
@section('content')
<!-- /.col-lg-12 -->
<table class="table table-striped table-bordered table-hover" id="dataTables-example">
    <thead>
        <tr align="center">
            <th>ID</th>
            <th>Image</th>
            <th>Product Name</th>
            <th>Delete</th>
            <th>Edit</th>
        </tr>
    </thead>
    <tbody>
        <?php $stt = 0 ?>
        @foreach($productImage as $pI)
        <?php $stt = $stt+1 ?>
        <tr class="odd gradeX" align="center">
            <td>{{$stt}}</td>
            <td>{{$pI->name}}</td>
            <td>
                <?php 
                    $product = DB::table('products')->where('id',$pI->product_id)->first();
                ?>
                    {{$product->name}}
            </td>
            <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/cate/delete/{{$pI->id}}" onclick="return xacnhanxoa('Bạn có chắc muốn xóa?')"> Delete</a></td>
            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/cate/edit/{{$pI->id}}">Edit</a></td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection

   
