@extends("layouts.admin.default")
@section("content")
    <form class="form-inline" method="get" action="">
        <div class="form-group">
            <label for="exampleInputName2"></label>
            <select name="num" id="" class="form-control">
                <option value="0">全部</option>
                <option value="1" @if(request()->input("num")==1) selected @endif>进行中</option>
                <option value="2" @if(request()->input("num")==2) selected @endif>未进行</option>
                <option value="3" @if(request()->input("num")==3) selected @endif>已结束</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">搜索活动</button>
    </form>


    <a href="{{route("event.add")}}" class="btn bg-success">添加</a>
    <table class="table table-hover table-bordered">
        <tr>
            <th>id</th>
            <th>标题</th>
            <th>开始时间</th>
            <th>结束时间</th>
            <th>开奖时间</th>
            <th>是否开奖</th>
            <th>活动人数</th>
            <th>参与人数</th>
            <th>操作</th>
        </tr>
        @foreach($events as $event)
        <tr>
            <td>{{$event->id}}</td>
            <td>{{$event->title}}</td>
            <td>{{date("Y-m-d",$event->start_time)}}</td>
            <td>{{date("Y-m-d",$event->end_time)}}</td>
            <td>{{date("Y-m-d",$event->prize_time)}}</td>
            <td>{{$event->is_prize?"开奖过了":"未开奖"}}</td>
            <td>{{$event->num}}</td>
            <td>{{$event->max}}</td>
            <td>
                <a href="{{route("event.edit",$event)}}" class="btn btn-success">编辑</a>
                <a href="{{route("event.del",$event)}}" class="btn btn-danger">删除</a>
                <a href="{{route("event.detail",$event)}}" class="btn btn-danger">查看详情</a>          @if($event->is_prize==0 && date("Y-m-d",$event->prize_time)==date("Y-m-d",time()))
                <a href="{{route("event.open",$event)}}" class="btn btn-success">抽奖</a>
                                                                                                        @endif
            </td>
        </tr>
        @endforeach

    </table>
    {{$events->appends($arr)->links()}}
    @endsection