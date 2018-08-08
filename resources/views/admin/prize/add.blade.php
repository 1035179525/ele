
@extends("layouts.admin.default")
@include('vendor.ueditor.assets')
@section("content")
    <br/>
    <form class="form-horizontal" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">奖品名称</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" id="inputEmail3"  name="name" value="{{old("name")}}">
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">所属抽奖活动</label>
            <div class="col-sm-2">
                <select name="event_id" class="form-control">
                    @foreach($events as $event)
                    <option value="{{$event->id}}">{{$event->title}}</option>
                        @endforeach
                </select>
            </div>
        </div>

        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">奖品详情</label>
            <div class="col-sm-5">
                <!-- 实例化编辑器 -->
                <script type="text/javascript">
                    var ue = UE.getEditor('container');
                    ue.ready(function() {
                        ue.execCommand('serverparam', '_token', '{{ csrf_token() }}'); // 设置 CSRF token.
                    });
                </script>

                <!-- 编辑器容器 -->
                <script id="container" name="description" type="text/plain">
                    {{old("description")}}
                </script>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">添加</button>
            </div>
        </div>
    </form>
@endsection



