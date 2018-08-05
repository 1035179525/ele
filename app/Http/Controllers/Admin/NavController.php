<?php

namespace App\Http\Controllers\Admin;

use App\Models\Nav;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;

class NavController extends Controller
{
    //添加导航
    public function add(Request $request)
    {
        //找到所有的路由
        $routes = Route::getRoutes();
        $data[]="";
        foreach ($routes as $route){
            if ($route->action["namespace"]==="App\Http\Controllers\Admin"){
                //取出所有的路由 判断是否存在路由名字
                if (isset($route->action["as"])){
                    $data[]=$route->action["as"];
                }
            }
        }


        if ($request->isMethod("post")){
            $this->validate($request,[
               "name"=>"required",
            ]);

            Nav::create($request->post());

            return redirect()->route("nav.index")->with("success","添加成功");

        }


        return view("admin.nav.add",compact("data"));
    }

    //导航管理
    public function index()
    {
        $navs=Nav::paginate(10);

        return view("admin.nav.index",compact("navs"));

    }



    public function edit(Request $request,$id)
    {
        $nav=Nav::find($id);


        //找到所有的路由
        $routes = Route::getRoutes();
        $data[]="";
        foreach ($routes as $route){
            if ($route->action["namespace"]==="App\Http\Controllers\Admin"){
                //取出所有的路由 判断是否存在路由名字
                if (isset($route->action["as"])){
                    $data[]=$route->action["as"];
                }
            }
        }


        if ($request->isMethod("post")){
            $this->validate($request,[
                "name"=>"required",
            ]);

            $nav->update($request->post());

            return redirect()->route("nav.index")->with("success","添加成功");

        }


        return view("admin.nav.edit",compact("nav","data"));
    }


    public function del($id){
        Nav::destroy($id);
        return redirect()->route("nav.index")->with("success","删除成功");
    }
}
