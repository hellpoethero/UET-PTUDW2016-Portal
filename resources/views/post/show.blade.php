@extends('layouts.app')

@section('content')
    {{json_encode($post)}}
    <form method="post" action="{{url('post/'.$post['id'])}}">
        {{csrf_field()}}
        {!! method_field('DELETE') !!}
        <button>Xóa</button>
    </form>
@endsection