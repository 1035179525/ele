@extends("layouts.shop.default")
@section("title","添加")
@section("content")
    <br/>
    <form class="form-inline" method="get" action="">
        <div class="form-group">
            <label for="exampleInputName2">开始日期</label>
            <input type="date" class="form-control" id="exampleInputName2" name="start"  value="{{request()->input("start")}}">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail2">结束日期</label>
            <input type=date class="form-control" id="exampleInputEmail2" name="end" value="{{request()->input("end")}}">
        </div>
        <button type="submit" class="btn btn-default">搜索</button>
    </form>
    <table class="table table-bordered table-hover">
        <tr>
            <th>日期</th>
            <th>菜单名字</th>
            <th>订单量</th>
            <th>金钱</th>
        </tr>
        @foreach($orders as $order)
            <tr>
                <td>{{$order->year}}</td>
                <td>{{$order->getName->goods_name}}</td>
                <td>{{$order->num}}</td>
                <td>{{$order->money}}</td>
            </tr>
            @endforeach
    </table>
    @endsection