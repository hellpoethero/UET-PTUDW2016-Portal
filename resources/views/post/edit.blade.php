@extends('layouts.app')

@section('content')
    <form method="post" action="{{url('/post/'.$post['id'].'/edit')}}">
        {{csrf_field()}}
        <input type="text" name="content" placeholder="Nội dung" value="{{$post['content']}}">
        <button>Thay đổi Nội dung</button>
    </form>
@endsection