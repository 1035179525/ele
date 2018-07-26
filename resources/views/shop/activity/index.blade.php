@extends("layouts.shop.default")
@section("content")

    <table class="table table-hover table-bordered">
        <tr>
            <th>id</th>
            <th>标题</th>
            <th>开始时间</th>
            <th>结束时间</th>
            <th>活动内容</th>
            <th>操作</th>
        </tr>
        @foreach($activitys as $activity)
        <tr>
            <td>{{$activity->id}}</td>
            <td>{{$activity->title}}</td>
            <td>{{date("Y-m-d",$activity->start_time)}}</td>
            <td>{{date("Y-m-d",$activity->end_time)}}</td>
            <td>{!! $activity->content !!}</td>
            <td>
                <a href="{{route("activity.edit",$activity)}}" class="btn btn-success">编辑</a>
                <a href="{{route("activity.del",$activity)}}" class="btn btn-danger">删除</a>
            </td>
        </tr>
        @endforeach

    </table>
    {{$activitys->links()}}
    @endsection