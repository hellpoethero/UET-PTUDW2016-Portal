<?php

namespace App\Http\Controllers;

use App\Group;
use App\Student;
use App\User;
use App\UserGroup;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class StudentsController extends Controller
{
    static function show($id) {
        $data['user'] = User::join('students','users.id','=','students.id')
            ->select('*')->get()[0];
        return view('student.show')->with($data);
    }

    static function update(Request $request) {
        $validator = Validator::make($request->all(), [
            'birthday' => 'date',
            'gender' => 'integer|max:255',
            'school' => 'max:255',
            'faculty' => 'max:255',
            'department' => 'max:255',
            'year' => 'max:16',
            'class' => 'max:64',
            'gpa' => 'numeric|max:4',
        ]);
        if ($validator->fails()) {
            $sc = new StudentsController();
            $sc->throwValidationException($request, $validator);
        }
        $student = Student::find(Auth::user()['id']);
        $student['birthday'] = $request['birthday'];
        $student['gender'] = $request['gender'];
        $student['school'] = $request['school'];
        $student['faculty'] = $request['faculty'];
        $student['department'] = $request['department'];
        $student['year'] = $request['year'];
        $student['class'] = $request['class'];
        $student['gpa'] = $request['gpa'];
        $student->save();
        return redirect('/user/edit');
    }

    static function makeGender($id) {
        $genders = DB::table('gender')->select('*')->get();
        foreach ($genders as $gender) {
            echo '<option value="'.$gender->id.'"';
            if ($gender->id==$id)
                echo ' selected';
            echo '>'.$gender->name.'</option>';
        }
    }
}
