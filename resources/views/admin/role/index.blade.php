
@extends("layouts.admin.default")
@section("content")
    <br/>
    <table class="table table-bordered table-hover">
        <tr>
            <th>ID</th>
            <th>名字</th>
            <th>权限</th>
            <th>操作</th>
        </tr>
        @foreach($roles as $role)
        <tr>
            <td>{{$role->id}}</td>
            <td>{{$role->name}}</td>
            <td>{{str_replace(['[',']',",",'"']," ",$role->permissions()->pluck('name'))}}</td>
            <td>
                <a href="{{route("role.del",$role)}}">删除</a>
                <a href="{{route("role.edit",$role)}}">编辑</a>
            </td>
        </tr>
        @endforeach
    </table>
@endsection



