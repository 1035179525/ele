@extends("layouts.admin.default")
@section("title","列表")
@section("content")
    <a href="{{route("nav.add")}}" class="btn btn-success">添加</a>
    <table class="table table-hover table-bordered">
        <tr>
            <th>id</th>
            <th>名字</th>
            <th>地址</th>
            <th>上一级ID</th>
            <th>排序</th>
            <th>操作</th>
        </tr>
        @foreach($navs as $nav)
        <tr>
            <td>{{$nav->id}}</td>
            <td>{{$nav->name}}</td>
            <td>{{$nav->url}}</td>
            <td>{{$nav->pid}}</td>
            <td>{{$nav->sort}}</td>
            <td>
                <a href="{{route("nav.edit",$nav)}}" class="btn btn-info">编辑</a>
                <a href="{{route("nav.del",$nav)}}" class="btn btn-danger">删除</a>
            </td>
        </tr>
        @endforeach

    </table>
    {{$navs->links()}}
    @endsection