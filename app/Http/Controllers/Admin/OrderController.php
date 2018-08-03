<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use App\Models\OrderGoods;
use App\Models\Shop;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    //订单统计
    public function day(){

        $start=\request()->start;
        $end=\request()->end;
        $num=\request()->num;
        $shopId=\request()->shop_id;
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

        $shops=Shop::all();
        $query=Order::where("status",">","0")
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
                return redirect()->route("order.day1")->with("danger","开始时间大于结束时间");
            }
            $query->whereDate("created_at","<=",$end);
        };

        if ($shopId!=null){
            $query->where("shop_id",">=",$shopId);
        };


        $orders=$query->get();


        return view("admin.order.day",compact("shops","orders"));
    }

    //菜单统计
    public function menu()
    {
        $start=\request()->start;
        $end=\request()->end;
        $num=\request()->num;
        $date='%Y-%m-%d';

        $shopId=\request()->shop_id;
        //日期格式
        //如果等于2按月统计
        if ($num=="2"){
            $date="%Y-%m";
        }
        //如果等于3按年统计
        if ($num=="3"){
            $date="%Y";
        }


        //找到店铺的订单的ID
        $ordersID=Order::where("status",">",0);

        if ($shopId!=null){
            $ordersID->where("shop_id",$shopId);
        }
      $ordersID= $ordersID->get()->pluck("id")->toArray();
        $query=OrderGoods::whereIn("order_id",$ordersID)
        ->Select(DB::raw("DATE_FORMAT(created_at,'{$date}') as day,goods_id,SUM(amount) as num,SUM(amount)*goods_price as money"))
            ->groupBy("day","goods_id")
            ->orderBy("day","desc")
            ->limit(30);

        $stime=strtotime($start);
        $etime=strtotime($end);

        if ($start!=null){
            $query->whereDate("created_at",">=",$start);
        };
        if ($end!=null){
            if ($stime>$etime){
                return redirect()->route("order.menu")->with("danger","开始时间大于结束时间");
            }
            $query->whereDate("created_at","<=",$end);
        };

        $shops=Shop::all();
        $orders=$query->get();
        return view("admin.order.menu",compact("orders","shops"));

    }
}
