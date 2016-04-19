@extends('layouts.app')

@section('content')
    <form method="post" action="{{url('/group/'.$group['id'].'/edit')}}">
        {{csrf_field()}}
        <input type="text" name="name" placeholder="Tên nhóm" value="{{$group['name']}}">
        <input type="text" name="description" placeholder="Mô tả" value="{{$group['description']}}">
        <button>Thay đổi thông tin</button>
    </form>
@endsection