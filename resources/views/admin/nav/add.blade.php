@extends("layouts.admin.default")
@section("title","添加")
@section("content")
    <form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">导航名字</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" id="inputEmail3" placeholder="" name="name" value="{{old("name")}}">
            </div>
        </div>

        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">路由地址</label>
            <div class="col-sm-2">
                <select name="url" id="" class="form-control">
                    @foreach($data as $da)
                    <option value="{{$da}}">{{$da}}</option>
                        @endforeach
                </select>
            </div>
        </div>

        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">导航分类</label>
            <div class="col-sm-2">
                <select name="pid"  class="form-control">
                    <option value="0">顶级分类</option>
                    @foreach(\App\Models\Nav::where("pid",0)->get() as $cat)
                        <option value="{{$cat->id}}">{{$cat->name}}</option>
                        @endforeach
                </select>
            </div>
        </div>

        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">排序</label>
            <div class="col-sm-2">
                <input type="text" class="form-control" id="inputEmail3" placeholder="" name="sort" value="{{old("sort")}}">
            </div>
        </div>


        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">添加</button>
            </div>
        </div>
    </form>
    @endsection