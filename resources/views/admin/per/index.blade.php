
@extends("layouts.admin.default")
@section("content")
    <br/>
    <table class="table table-bordered table-hover">
        <tr>
            <th>ID</th>
            <th>名字</th>
            <th>操作</th>
        </tr>
        @foreach($pers as $per)
        <tr>
            <td>{{$per->id}}</td>
            <td>{{$per->name}}</td>
            <td>
                <a href="{{route("per.del",$per)}}">删除</a>
            </td>
        </tr>
        @endforeach
    </table>
@endsection



