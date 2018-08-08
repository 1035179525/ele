@extends("layouts.admin.default")
@section("content")
    @foreach($prizes as $prize)
        恭喜{{$prize->getUser->name}}获得{{$prize->name}},奖品详情{!! $prize->description!!}
    @endforeach
    @endsection