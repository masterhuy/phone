@extends('admin.master')
@section('title','List Product')
@section('controller','Product')
@section('type','List')
@section('content')
<!-- /.col-lg-12 -->
<table class="table table-striped table-bordered table-hover" id="dataTables-example">
    <thead>
        <tr align="center">
            <th>ID</th>
            <th>Name</th>
            <th>Price</th>
            <th>Category</th>
            <th>Date</th>
            <th>Delete</th>
            <th>Edit</th>
        </tr>
    </thead>
    <tbody>
        <?php $stt = 0 ?>
        @foreach($product as $p)
        <?php $stt += 1 ?>
        <tr class="odd gradeX" align="center">
            <td>{{ $stt }}</td>
            <td>{{$p->name}}</td>
            <td>{{number_format($p->price,0,",",".")}} VNĐ</td>
            <td>
                <?php 
                    $cate = DB::table('cates')->where('id',$p->cate_id)->first();
                ?>
                @if(!empty($cate->name))
                    {{$cate->name}}
                @endif
            </td>
            <td>{{ \Carbon\Carbon::createFromTimeStamp(strtotime($p["created_at"]))->diffForHumans()}}              
            </td>
            <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/product/delete/{{$p->id}}" onclick="return xacnhanxoa('Bạn có chắc muốn xóa?')"> Delete</a></td>
            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/product/edit/{{$p->id}}">Edit</a></td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
                
