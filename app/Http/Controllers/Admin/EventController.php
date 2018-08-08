<?php

namespace App\Http\Controllers\Admin;

use App\Mail\EventShipped;
use App\Models\Event;
use App\Models\EventPrize;
use App\Models\EventUser;
use App\models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class EventController extends Controller
{
    //添加抽奖
    public function add(Request $request){

        if ($request->isMethod("post")){
            $this->validate($request,[
                "title"=>"required",
                "content"=>"required",
                "start_time"=>"required",
                "end_time"=>"required",
                "num"=>"required|integer",
            ]);

            $data=$request->post();
            $data["start_time"]=strtotime($data["start_time"]);
            $data["end_time"]=strtotime($data["end_time"]);
            $data["prize_time"]=strtotime($data["prize_time"]);
            Event::create($data);
            return redirect()->route("event.index")->with("success","添加成功");


        }

        return view("admin.event.add");
    }

    //抽奖列表
    public function index(Request $request)
    {
        $num=$request->num;
        $query=Event::orderBy("id");
        $arr=$request->query();
        //进行中
        if ($num=="1"){
            $time=time();

            $query->where("start_time","<=",$time);
            $query->where("end_time",">=",$time);
        }
        //未进行
        if ($num=="2"){
            $time=time();
            $query->where("start_time",">=",$time);
        }
        //已经结束
        if ($num=="3"){
            $time=time();
            $query->where("end_time","<=",$time);
        }

        $events=$query->paginate(3);
        return view("admin.event.index",compact("events","arr"));
    }

    //查看详情
    public function detail($id){
        $event=Event::find($id);
        return view("admin.event.detail",compact("event"));
    }

    //编辑
    public function edit(Request $request,$id){
        $event=Event::find($id);

        if ($request->isMethod("post")) {
            $this->validate($request, [
                "title" => "required",
                "content" => "required",
                "start_time" => "required",
                "end_time" => "required",
                "prize_time" => "required",
                "num" => "required|integer",
            ]);

            $data = $request->post();
            $data["start_time"] = strtotime($data["start_time"]);
            $data["end_time"] = strtotime($data["end_time"]);
            $data["prize_time"] = strtotime($data["prize_time"]);
            $event->update($data);
            return redirect()->route("event.index")->with("success", "添加成功");
        }


        return view("admin.event.edit",compact("event"));


    }

    //删除
    public function del(Request $request,$id)
    {
        Event::destroy($id);
        return redirect()->route("event.index")->with("success","删除成功");

    }


    //开奖
    public function open($id){

        //获取抽奖的用户的ID
        $userID=EventUser::where("event_id",$id)->pluck("user_id")->toArray();
        shuffle($userID);
        //得到奖品的ID
        $prizes=EventPrize::where("event_id",$id)->get()->shuffle();

        $arr[]="";
        foreach ($prizes as $k=>$prize){
            //判断用户小于奖品
            if ($k+1>count($userID)){
                break;
            }

            $prize->user_id=$userID[$k];

            $prize->save();
           //找到用户 发送邮件

            $user=User::find($userID[$k]);

            Mail::to($user)->send(new EventShipped($prize));
        }
        $event=Event::find($id);
        $event->is_prize=1;
        $event->save();
        $prizes = EventPrize::where("event_id",$id)->where("user_id",">",0)->get();
        return view("admin.event.open",compact("prizes"));

    }


}
