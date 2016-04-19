@extends('layouts.app')

@section('content')
    <form method="post" action="{{url('group/'.$group['id'])}}">
        {{csrf_field()}}
        {!! method_field('DELETE') !!}
        <button>Xóa</button>
    </form>
    <form method="post" action="{{url('join/group/'.$group['id'])}}">
        {{csrf_field()}}
        <button>Tham gia</button>
    </form>
    <form method="post" action="{{url('left/group/'.$group['id'])}}">
        {{csrf_field()}}
        {!! method_field('DELETE') !!}
        <button>Rời nhóm</button>
    </form>
    <form method="post" action="{{url('/post/create')}}">
        {{csrf_field()}}
        <input type="text" name="content" placeholder="Nội dung">
        <input hidden name="group_id" value="{{$group['id']}}">
        <button>Tạo nhóm</button>
    </form>
@endsection