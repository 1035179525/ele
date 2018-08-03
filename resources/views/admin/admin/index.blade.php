@extends("layouts.admin.default")
@section("content")
    <a href="{{route("admin.add")}}" class="btn bg-success">添加</a>
    <table class="table table-bordered table-hover">
        <tr>
            <th>id</th>
            <th>管理员名字</th>
            <th>管理员邮箱</th>
            <th>角色</th>
            <th>权限</th>
            <th>操作</th>
        </tr>
        @foreach($admins as $admin)
        <tr>
            <td>{{$admin->id}}</td>
            <td>{{$admin->name}}</td>
            <td>{{$admin->email}}</td>
            <td>{{str_replace(["[","]"],"",json_encode($admin->getRoleNames(),JSON_UNESCAPED_UNICODE))}}
            </td>
            <td>
                {{str_replace(["[","]"],"",json_encode($admin->getAllPermissions()->pluck("name"),JSON_UNESCAPED_UNICODE))}}
            </td>
            <td>
                <a href="{{route("admin.edit",$admin)}}" class="btn btn-info">编辑</a>
                <a href="{{route("admin.del",$admin)}}" class="btn btn-danger">删除</a>
            </td>
        </tr>
            @endforeach
    </table>

    @endsection