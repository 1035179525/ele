<?php

namespace App\Http\Controllers\Admin;

use App\Models\Member;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MemberController extends Controller
{
    //首页
    public function index()
    {

        $keyword=\request()->keyword;

        $arr=\request()->query();

        $members=Member::where("username","like","%{$keyword}%")->orWhere("tel","like","%{$keyword}%")->paginate(3);
        return view("admin.member.index",compact("members","arr"));
    }


    public function update(Request $request,$id){
        $member=Member::find($id);
        $member->status=-$member->status;
        $member->save();
        return redirect()->route("member.index")->with("success","修改成功");
    }
}
