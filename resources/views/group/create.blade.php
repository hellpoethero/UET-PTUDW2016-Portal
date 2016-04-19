@extends('layouts.app')

@section('content')
    <form method="post" action="{{url('/group/create')}}">
        {{csrf_field()}}
        <input type="text" name="name" placeholder="Tên nhóm">
        <input type="text" name="description" placeholder="Mô tả">
        <button>Tạo nhóm</button>
    </form>
@endsection