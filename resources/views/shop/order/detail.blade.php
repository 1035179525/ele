@extends("layouts.shop.default")
@section("title","添加")
@section("content")
    <table class="table table-bordered table-hover">
        <tr>
            <th>id</th>
            <th>收货人</th>
            <th>收货人电话</th>
            <th>订单编号</th>
            <th>详细地址</th>
            <th>总价</th>
            <th>状态</th>
            <th>操作</th>
        </tr>
            <tr>
                <td>{{$order->id}}</td>
                <td>{{$order->name}}</td>
                <td>{{$order->tel}}</td>
                <td>{{$order->sn}}</td>
                <td>{{$order->provence.$order->city.$order->area}}</td>
                <td>{{$order->total}}</td>
                <td>{{$order->OrderStatus}}</td>
                <td>
                    @if($order->status=="1")
                        <a href="{{route("order.send",$order)}}" class="btn btn-info">发货</a>
                    @endif
                    @if($order->status=="1" || $order->status=="0")
                        <a href="{{route("order.cancel",$order)}}" class="btn btn-danger">取消订单</a>
                    @endif
                        <a href="{{route("order.index")}}" class="btn btn-info">返回列表</a>
                </td>
            </tr>
    </table>
    @endsection