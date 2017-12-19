@extends('admin.master')
@section('title','List Category')
@section('controller','Category')
@section('type','List')
@section('content')
<!-- /.col-lg-12 -->
<table class="table table-striped table-bordered table-hover" id="dataTables-example">
    <thead>
        <tr align="center">
            <th>ID</th>
            <th>Name</th>
            <th>Category Parent</th>
            <th>Delete</th>
            <th>Edit</th>
        </tr>
    </thead>
    <tbody>
        <?php $stt = 0 ?>
        @foreach($cate as $c)
        <?php $stt = $stt+1 ?>
        <tr class="odd gradeX" align="center">
            <td>{{$stt}}</td>
            <td>{{$c->name}}</td>
            <td>
                @if($c["parent_id"] == 0)
                    {{"None"}}
                @else
                    <?php
                        $cate = DB::table('cates')->where('id',$c["parent_id"])->first();
                        echo $cate->name;
                    ?>
                @endif
            </td>
            <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/cate/delete/{{$c->id}}" onclick="return xacnhanxoa('Bạn có chắc muốn xóa?')"> Delete</a></td>
            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/cate/edit/{{$c->id}}">Edit</a></td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection

   
