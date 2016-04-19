@extends('layouts.app')
@section('content')
    <form method="post" action="{{url('/user/edit')}}">
        {{csrf_field()}}
        <input type="date" name="birthday" placeholder="Ngày sinh" value="{{$user['birthday']}}">
        <select name="gender">
            <option value="">Chọn giới tính</option>
            <?php \App\Http\Controllers\StudentsController::makeGender($user['gender'])?>
        </select>
        <input type="text" name="school" placeholder="Trường" value="{{$user['school']}}">
        <input type="text" name="faculty" placeholder="Khoa" value="{{$user['faculty']}}">
        <input type="text" name="department" placeholder="Ngành" value="{{$user['department']}}">
        <input type="text" name="year" placeholder="Khóa" value="{{$user['year']}}">
        <input type="text" name="class" placeholder="Lớp" value="{{$user['class']}}">
        <input type="text" name="gpa" placeholder="Điểm trung bình" value="{{$user['gpa']}}">
        <button>Lưu</button>
    </form>
@endsection