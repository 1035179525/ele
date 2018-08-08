@extends("layouts.shop.default")
@section("content")
    <h1>活动标题:{{$event->title}}</h1><br/>
    <h2> 活动内容</h2>:{!! $event->content !!}
    <b>开始日期</b>:{{date("Y-m-d",$event->start_time)}}
    <b>结束日期</b>:{{date("Y-m-d",$event->end_time)}}<br/>
    <b>报名人数</b>:{{$event->num}}
    <b>开奖</b>:{{$event->is_prize?"已开奖":"未开奖"}}
    <br/>
    <a href="{{route("eventuser.add",$event)}}" class="btn btn-success">报名</a>

    @endsection