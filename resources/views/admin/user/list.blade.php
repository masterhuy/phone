@extends('admin.master')
@section('title','List User')
@section('controller','User')
@section('type','List')
@section('content')
<table class="table table-striped table-bordered table-hover" id="dataTables-example">
    <thead>
        <tr align="center">
            <th>ID</th>
            <th>Username</th>
            <th>Level</th>
            <th>Email</th>
            <th>Delete</th>
            <th>Edit</th>
        </tr>
    </thead>
    <tbody>
        <?php $stt = 0 ?>
        @foreach($user as $u)
        <?php $stt += 1 ?>
        <tr class="odd gradeX" align="center">
            <td>{{$stt}}</td>
            <td>{{$u->username}}</td>
            <td>
                @if($u->level == 1)
                    {{'Admin'}}
                @else
                    {{'Member'}}
                @endif
            </td>
            <td>{{$u->email}}</td>
            <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/user/delete/{{$u->id}}" onclick="return xacnhanxoa('Bạn có chắc muốn xóa?')"> Delete</a></td>
            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/user/edit/{{$u->id}}">Edit</a></td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection