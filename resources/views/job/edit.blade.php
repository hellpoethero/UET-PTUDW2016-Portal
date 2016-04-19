@extends('layouts.app')

@section('content')
    <form method="post" action="{{url('/job/'.$job['id'].'/edit')}}">
        {{csrf_field()}}
        <input type="text" name="title" placeholder="Tiêu đề" value="{{$job['title']}}">
        <button>Thay đổi thông tin</button>
    </form>
@endsection