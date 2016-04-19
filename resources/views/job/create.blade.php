@extends('layouts.app')

@section('content')
    <form method="post" action="{{url('/job/create')}}">
        {{csrf_field()}}
        <input type="text" name="title" placeholder="Tiêu đề">
        <button>Tạo tin tuyển dụng</button>
    </form>
@endsection