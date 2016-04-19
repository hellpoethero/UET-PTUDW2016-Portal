@extends('layouts.app')

@section('content')
    <form method="get">
        <input type="text" placeholder="Kỹ năng">
        <select>
            <option value="">Chọn loại tìm kiếm</option>
        </select>
        <button>Tìm kiếm</button>
    </form>
@endsection