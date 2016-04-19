@extends('layouts.app')
@section('content')
    <form method="post" action="{{url('/user/edit')}}">
        {{csrf_field()}}
        <input type="date" name="birthday" placeholder="Ngày thành lập" value="{{$user['birthday']}}">
        <input type="text" name="phone" placeholder="Điện thoại" value="{{$user['phone']}}">
        <input type="text" name="address" placeholder="Địa chỉ" value="{{$user['address']}}">
        <input type="text" name="description" placeholder="Mô tả" value="{{$user['description']}}">
        <button>Lưu</button>
    </form>
@endsection