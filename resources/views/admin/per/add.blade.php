
@extends("layouts.admin.default")
@section("content")
    <br/>
    <form class="form-horizontal" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">权限</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="name">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">添加</button>
            </div>
        </div>
    </form>
@endsection



