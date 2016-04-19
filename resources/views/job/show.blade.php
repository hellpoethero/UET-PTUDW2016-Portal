@extends('layouts.app')

@section('content')
    {{json_encode($job)}}
    <form method="post" action="{{url('job/'.$job['id'])}}">
        {{csrf_field()}}
        {!! method_field('DELETE') !!}
        <button>Xóa</button>
    </form>
@endsection