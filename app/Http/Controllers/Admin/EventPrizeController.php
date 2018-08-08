<?php

namespace App\Http\Controllers\Admin;

use App\Models\Event;
use App\Models\EventPrize;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EventPrizeController extends Controller
{
    //奖品添加
    public function add(Request $request){
        if ($request->isMethod("post")){
            $this->validate($request,[
                "name"=>"required",
                "description"=>"required",

            ]);

            EventPrize::create($request->post());
            return redirect()->route("prize.index")->with("success","添加成功");

        }



        $events=Event::all();
        return view("admin.prize.add",compact("events"));
    }

    //奖品列表
    public function index()
    {
        $prizes=EventPrize::paginate(3);
        return view("admin.prize.index",compact("prizes"));
    }

    //编辑
    public function edit(Request $request,$id)
    {
        $prize=EventPrize::find($id);
        if ($request->isMethod("post")){
            $this->validate($request,[
                "name"=>"required",
                "description"=>"required",
            ]);

            $prize->update($request->post());
            return redirect()->route("prize.index")->with("success","编辑成功");

        }

        $events=Event::all();
        return view("admin.prize.edit",compact("events","prize"));

    }

    //删除
    public function del(Request $request,$id)
    {
        EventPrize::destroy($id);
        return redirect()->route("prize.index")->with("success","删除成功");

    }
}
