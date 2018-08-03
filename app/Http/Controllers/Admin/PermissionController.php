<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    //添加权限
    public function add(Request $request)
    {
        //判断是否POST提交
        if ($request->isMethod("post")){
            $data=$request->post();
            $data["guard_name"]="admin";
            $per= Permission::create($data);

            return redirect()->route("per.add")->with("success","添加成功");
        }

        return view("admin.per.add");
    }

    //权限列表
    public function index(Request $request){
        $pers=Permission::all();
        return view("admin.per.index",compact("pers"));
    }

    //删除
    public function del(Request $request,$id)
    {
        Permission::destroy($id);
        return redirect()->route("per.index")->with("success","删除成功");
    }

}
