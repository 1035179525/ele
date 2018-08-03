<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Contracts\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    //角色添加
    public function add(Request $request)
    {
        //判断是否POST提交
        if ($request->isMethod("post")){
            $this->validate($request,[
                "name"=>"required|unique:roles,name"
            ]);


            $data["name"]=$request->post("name");
            $data["guard_name"]="admin";
            $role = \Spatie\Permission\Models\Role::create($data);
            $role->syncPermissions($request->post("per"));

            return redirect()->route("role.index")->with("success","添加成功");
        }

        $pers=Permission::all();
        return view("admin.role.add",compact("pers"));
    }


    //角色列表
    public function index()
    {
        $roles=\Spatie\Permission\Models\Role::all();
        return view("admin.role.index",compact("roles"));
    }

    //角色编辑
    public function edit(Request $request,$id)
    {
        $role=\Spatie\Permission\Models\Role::find($id);
        //判断是否POST提交
        if ($request->isMethod("post")){
            $this->validate($request,[
               "name"=>"required|unique:roles,name,$id"
            ]);

            $data["name"]=$request->post("name");
            $data["guard_name"]="admin";
            $roles = $role->update($data);
            $role->syncPermissions($request->post("per"));

            return redirect()->route("role.index")->with("success","添加成功");
        }



        $role=\Spatie\Permission\Models\Role::find($id);
        $pers=Permission::all();
        return view("admin.role.edit",compact("pers","role"));
    }
}
