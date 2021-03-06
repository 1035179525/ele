<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
//商家分类
Route::domain('admin.ele.com')->namespace('Admin')->group(function () {
    Route::get('/shopcategory/index',"ShopCategoryController@index")->name("shopcategory.index");
    Route::any('/shopcategory/add',"ShopCategoryController@add")->name("shopcategory.add");
    Route::any('/shopcategory/edit/{id}',"ShopCategoryController@edit")->name("shopcategory.edit");
    Route::get('/shopcategory/del/{id}',"ShopCategoryController@del")->name("shopcategory.del");

    //管理员的账号管理
    Route::get('/admin/index',"AdminController@index")->name("admin.index");
    Route::any('/admin/add',"AdminController@add")->name("admin.add");
    Route::any('/admin/login',"AdminController@login")->name("admin.login");
    Route::any('/admin/update/{id}',"AdminController@update")->name("admin.update");
    Route::any('/admin/loginout',"AdminController@loginout")->name("admin.loginout");
    Route::any('/admin/edit/{id}',"AdminController@edit")->name("admin.edit");
    Route::get('/admin/del/{id}',"AdminController@del")->name("admin.del");

    //订单统计
    Route::get('/order/day',"OrderController@day")->name("order.day1");
    Route::get('/order/menu',"OrderController@menu")->name("order.menu");
});

//店铺
Route::domain('admin.ele.com')->namespace('Admin')->group(function () {
    Route::get('/shop/index',"ShopController@index")->name("shop.index");
    Route::any('/shop/add',"ShopController@add")->name("shop.add");
    Route::any('/shop/edit/{id}',"ShopController@edit")->name("shop.edit");
    Route::any('/shop/reset/{id}',"ShopController@reset")->name("shop.reset");
    Route::get('/shop/del/{id}',"ShopController@del")->name("shop.del");
    Route::get('/shop/update/{id}',"ShopController@update")->name("shop.update");
    Route::get('/shop/status/{id}',"ShopController@status")->name("shop.status");

    //活动管理
    Route::get('/activity/index',"ActivityController@index")->name("activity.index");
    Route::any('/activity/add',"ActivityController@add")->name("activity.add");
    Route::any('/activity/edit/{id}',"ActivityController@edit")->name("activity.edit");
    Route::any('/activity/del/{id}',"ActivityController@del")->name("activity.del");

    //抽奖管理
    //活动管理
    Route::get('/event/index',"EventController@index")->name("event.index");
    Route::any('/event/add',"EventController@add")->name("event.add");
    Route::any('/event/edit/{id}',"EventController@edit")->name("event.edit");
    Route::any('/event/del/{id}',"EventController@del")->name("event.del");
    Route::any('/event/detail/{id}',"EventController@detail")->name("event.detail");
    Route::any('/event/open/{id}',"EventController@open")->name("event.open");

    //奖品管理
    Route::get('/prize/index',"EventPrizeController@index")->name("prize.index");
    Route::any('/prize/add',"EventPrizeController@add")->name("prize.add");
    Route::any('/prize/edit/{id}',"EventPrizeController@edit")->name("prize.edit");
    Route::any('/prize/del/{id}',"EventPrizeController@del")->name("prize.del");



    //权限的添加
    Route::any('/per/add',"PermissionController@add")->name("per.add");
    Route::any('/per/index',"PermissionController@index")->name("per.index");
    Route::any('/per/del/{id}',"PermissionController@del")->name("per.del");

    //角色
    Route::any('/role/add',"RoleController@add")->name("role.add");
    Route::any('/role/index',"RoleController@index")->name("role.index");
    Route::any('/role/del/{id}',"RoleController@del")->name("role.del");
    Route::any('/role/edit/{id}',"RoleController@edit")->name("role.edit");

    //导航
    Route::any('/nav/add',"NavController@add")->name("nav.add");
    Route::any('/nav/index',"NavController@index")->name("nav.index");
    Route::any('/nav/edit/{id}',"NavController@edit")->name("nav.edit");
    Route::any('/nav/del/{id}',"NavController@del")->name("nav.del");

    //会员
    Route::any('/member/index',"MemberController@index")->name("member.index");
    Route::any('/member/update/{id}',"MemberController@update")->name("member.update");

});
//用户
Route::domain('shop.ele.com')->namespace('shop')->group(function () {
    Route::get('/user/index',"UserController@index")->name("user.index");
    Route::any('/user/login',"UserController@login")->name("user.login");
    Route::any('/user/loginout',"UserController@loginout")->name("user.loginout");
    Route::any('/user/reg',"UserController@reg")->name("user.reg");
    Route::any('/user/add',"UserController@add")->name("user.add");
    Route::any('/user/edit/{id}',"UserController@edit")->name("user.edit");
    Route::get('/user/del/{id}',"UserController@del")->name("user.del");
    Route::any('/user/pass/{id}',"UserController@pass")->name("user.pass");


    //菜品分类
    Route::get('/menucategory/index',"MenuCategoryController@index")->name("menucategory.index");
    Route::any('/menucategory/add',"MenuCategoryController@add")->name("menucategory.add");
    Route::any('/menucategory/edit/{id}',"MenuCategoryController@edit")->name("menucategory.edit");
    Route::get('/menucategory/del/{id}',"MenuCategoryController@del")->name("menucategory.del");

    //菜品
    Route::get('/menu/index',"MenuController@index")->name("menu.index");
    Route::any('/menu/add',"MenuController@add")->name("menu.add");
    Route::any('/menu/edit/{id}',"MenuController@edit")->name("menu.edit");
    Route::any('/menu/upload',"MenuController@upload")->name("menu.upload");
    Route::get('/menu/del/{id}',"MenuController@del")->name("menu.del");
    Route::any('/menu/day',"MenuController@day")->name("menu.day");
    Route::any('/menu/month',"MenuController@month")->name("menu.month");
    Route::any('/menu/year',"MenuController@year")->name("menu.year");


    //活动列表
    Route::get('/activity/index',"ActivityController@index")->name("activity.index1");

    //订单管理
    Route::get('/order/index',"OrderController@index")->name("order.index");
    Route::get('/order/detail/{id}',"OrderController@detail")->name("order.detail");
    Route::get('/order/send/{id}',"OrderController@send")->name("order.send");
    Route::get('/order/cancel/{id}',"OrderController@cancel")->name("order.cancel");
    Route::get('/order/day',"OrderController@day")->name("order.day");
    Route::get('/order/month',"OrderController@month")->name("order.month");
    Route::get('/order/year',"OrderController@year")->name("order.year");
    Route::get('/order/total',"OrderController@total")->name("order.total");



    //抽奖列表
    Route::get('/event/index',"EventController@index")->name("event.index1");
    Route::get('/event/detail/{id}',"EventController@detail")->name("event.detail1");
    Route::any('/event/update/{id}',"EventController@detail")->name("event.detail1");

    //抽奖报名
    Route::any('/eventuser/add/{id}',"EventUserController@add")->name("eventuser.add");
});


