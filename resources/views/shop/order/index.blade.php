@extends("layouts.shop.default")
@section("title","添加")
@section("content")
    <br/>
    <table class="table table-bordered table-hover">
        <tr>
            <th>id</th>
            <th>收货人</th>
            <th>收货人电话</th>
            <th>订单编号</th>
            <th>总价</th>
            <th>生成时间</th>
            <th>状态</th>
            <th>操作</th>
        </tr>
        @foreach($orders as $order)
            <tr>
                <td>{{$order->id}}</td>
                <td>{{$order->name}}</td>
                <td>{{$order->tel}}</td>
                <td>{{$order->sn}}</td>
                <td>{{$order->total}}</td>
                <td>{{$order->created_at}}</td>
                <td>{{$order->OrderStatus}}</td>
                <td>
                    <a href="{{route("order.detail",$order)}}" class="btn btn-success">查看订单</a>
                    @if($order->status=="1")
                    <a href="{{route("order.send",$order)}}" class="btn btn-info">发货</a>
                        @endif
                    @if($order->status=="1" || $order->status=="0")
                        <a href="{{route("order.cancel",$order)}}" class="btn btn-danger">取消订单</a>
                    @endif
                </td>
            </tr>
            @endforeach
    </table>
    {{$orders->links()}}
    @endsection