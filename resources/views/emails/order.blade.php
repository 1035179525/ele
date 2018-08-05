<h1>你有新的订单产生</h1>

@foreach($all as $goods)
商品名字:<b>{{$goods["goods_name"]}}</b>
商品数量:<b>{{$goods["amount"]}}</b>
商品价格：<b>{{$goods["goods_price"]}}</b>
    <br/>
    @endforeach
