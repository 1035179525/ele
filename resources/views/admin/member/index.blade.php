@extends("layouts.admin.default")
@section("content")
    <form class="form-inline" method="get" action="">
        <div class="form-group">
            <input type="text" class="form-control" id="exampleInputEmail2" placeholder="搜索什么？？？" name="keyword" value="{{request()->input("keyword")}}">
        </div>
        <button type="submit" class="btn btn-default">搜索</button>
    </form>



    <a href="{{route("admin.add")}}" class="btn bg-success">添加</a>
    <table class="table table-bordered table-hover">
        <tr>
            <th>id</th>
            <th>会员名字</th>
            <th>电话</th>
            <th>余额</th>
            <th>积分</th>
            <th>状态</th>
            <th>操作</th>
        </tr>
        @foreach($members as $member)
        <tr>
            <td>{{$member->id}}</td>
            <td>{{$member->username}}</td>
            <td>{{$member->tel}}</td>
            <td>{{$member->jifen}}</td>
            <td>{{$member->money}}</td>
            <td>{{$member->status==1?"禁用":"启用"}}</td>
            <td>

                <a href="{{route("member.update",$member)}}" class="btn btn-danger">
                    {{$member->status==1?"禁用":"启用"}}
                </a>
            </td>
        </tr>
            @endforeach
    </table>
    {{$members->appends($arr)->links()}}
    @endsection