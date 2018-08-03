<?php

namespace App\Http\Controllers\Shop;

use App\Models\Member;
use App\Models\Order;
use Doctrine\DBAL\Query\QueryException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    //订单列表
    public function index()
    {
        //商铺ID
        $id=Auth::user()->shop_id;
        $orders=Order::where("shop_id",$id)->paginate(3);
        return view("shop.order.index",compact("orders"));
    }

    //查看详情
    public function detail($id){
        $order=Order::find($id);
        return view("shop.order.detail",compact("order"));

    }

    //发货cancel
    public function send($id)
    {
       $order=Order::find($id);
            $order->status=2;
            $order->save();
            return redirect()->back();
    }
    
    //取消订单
    public function cancel($id)
    {
        $order=Order::find($id);
        $money=$order->total;
        $member=Member::find($order->user_id);
        //开启事务
        DB::beginTransaction();
        try{
            //返回金钱
            $member->money=$member->money+$money;
            //修改状态
            $order->status=-1;

            $member->save();
            $order->save();
            DB::commit();
        }catch (\Illuminate\Database\QueryException $exception){
            DB::rollBack();

            return redirect()->route("order.index")->with("danger","取消失败");
        }
        return redirect()->route("order.index")->with("success","取消订单成功");

    }

    //订单按日统计
    public function day(){
        $id=Auth::user()->shop_id;
        $start=\request()->start;
        $end=\request()->end;
        $num=\request()->num;

        $date='%Y-%m-%d';
        //日期格式
        //如果等于2按月统计
        if ($num=="2"){
            $date="%Y-%m";
        }
        //如果等于3按年统计
        if ($num=="3"){
            $date="%Y";
        }
        $query=Order::where("shop_id", $id)
            ->where("status",">","0")
            ->Select(DB::raw("DATE_FORMAT(created_at, '{$date}') as day,SUM(total) AS money,count(*) AS num"))
            ->groupBy("day")
            ->orderBy("day", 'desc')
            ->limit(30);
        //开始时间
        $stime=strtotime($start);
        $etime=strtotime($end);

        if ($start!=null){
            $query->whereDate("created_at",">=",$start);
        };
        if ($end!=null){
            if ($stime>$etime){
                return redirect()->route("order.day")->with("danger","开始时间大于结束时间");
            }
            $query->whereDate("created_at","<=",$end);
        };
        $orders=$query->get();


        return view("shop.order.day",compact("orders"));
  }



    //订单量总计
    public function total()
    {
        $id=Auth::user()->shop_id;

        $order=DB::table('orders')
            ->selectRaw("count(*) as num,sum(total) as money")
            ->where("shop_id",$id)
            ->where("status",">",0)
            ->get();
        dd($order[0]);
    }

}
