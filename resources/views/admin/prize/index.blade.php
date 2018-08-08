@extends("layouts.admin.default")
@section("content")


    <a href="{{route("prize.add")}}" class="btn bg-success">添加</a>
    <table class="table table-hover table-bordered">
        <tr>
            <th>id</th>
            <th>奖品名字</th>
            <th>所属抽奖活动</th>
            <th>中奖用户</th>
            <th>奖品描述</th>
            <th>操作</th>
        </tr>
        @foreach($prizes as $prize)
        <tr>
            <td>{{$prize->id}}</td>
            <td>{{$prize->name}}</td>
            <td>{{$prize->getEvent->title}}</td>
            <td>{{$prize->user_id?$prize->getUser->name:"还没有中奖用户"}}</td>
            <td>{!! $prize->description !!}</td>
            <td>
                <a href="{{route("prize.edit",$prize)}}" class="btn btn-success">编辑</a>
                <a href="{{route("prize.del",$prize)}}" class="btn btn-danger">删除</a>
            </td>
        </tr>
        @endforeach

    </table>
    {{$prizes->links()}}
    @endsection