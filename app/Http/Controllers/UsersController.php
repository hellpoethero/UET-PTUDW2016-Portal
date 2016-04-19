<?php

namespace App\Http\Controllers;

use App\Group;
use App\User;
use App\UserGroup;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UsersController extends Controller
{
    function index() {
        $data['user'] = User::
            join('user_roles','users.role_id','=','user_roles.id')
            ->select('users.id','users.name','users.email','user_roles.name as role_name')
            ->get();
        return view('user.index')->with($data);
    }

    function create() {
        return view('user.create');
    }

    function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
            'role_id' => 'required',
        ]);

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }

        User::create([
            'name' => $request->all()['name'],
            'email' => $request->all()['email'],
            'password' => bcrypt($request->all()['password']),
            'role_id' => $request->all()['role_id'],
        ]);

        return redirect('user/create');
    }

    function save($type, $value) {
        $user = User::find(Auth::user()['id']);
        $user[$type] = $value;
        $user->save();
        return redirect('setting');
    }

    function change_name(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
        ]);

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }
        return $this->save('name', $request['name']);
    }

    function change_password(Request $request) {
        $validator = Validator::make($request->all(), [
            'password' => 'required|min:6|confirmed',
        ]);

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }
        return $this->save('password',bcrypt($request['password']));
    }

    function change_avatar(Request $request) {
        $validator = Validator::make($request->all(), [
            'avatar' => 'required|image',
        ]);

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }

        $file_name = time().'_'.Auth::user()['id'].'_'.$request->file('avatar')->getClientOriginalName();
        $request->file('avatar')->move('upload/avatar', $file_name);
        return $this->save('avatar',$file_name);
    }

    function delete_avatar(Request $request) {
        return $this->save('avatar','');
    }

    function setting() {
        $data['user'] = Auth::user();
        return view('user.setting')->with($data);
    }

    function show($id) {
        $user = User::find($id);
        if ($user==null)
            return view('notfound');
        if ($user['role_id']==2) {
            return StudentsController::show($id);
        } else if ($user['role_id']==3) {
            return EnterprisesController::show($id);
        } else if ($user['role_id']==1 && Auth::user()['role_id']==1) {
            $data['user'] = Auth::user();
            return view('user.show')->with($data);
        }
        return view('unauthorized');
    }

    function joinGroup($id) {
        $user = Auth::user();
        $group = Group::find($id);
        if ($group!=null) {
            if (UserGroup::where('group_id',$group['id'])->where('user_id',$user['id'])->first()==null) {
                $user_group = new UserGroup();
                $user_group['user_id'] = $user['id'];
                $user_group['group_id'] = $id;
                $user_group->save();
            }
        }
        return redirect('group/'.$id);
    }

    function leftGroup($id) {
        UserGroup::where('group_id',$id)
            ->where('user_id', Auth::user()['id'])
            ->delete();
        return redirect('group/'.$id);
    }

    function edit() {
        if (Auth::user()['role_id']==2) {
            $data['user'] = User::join('students','users.id','=','students.id')
                ->select('*')->get()[0];
            return view('student.edit')->with($data);
        } else if (Auth::user()['role_id']==3) {
            $data['user'] = User::join('enterprises','users.id','=','enterprises.id')
                ->select('*')->get()[0];
            return view('enterprise.edit')->with($data);
        } else {
            return redirect('/');
        }
    }

    function update(Request $request) {
        if (Auth::user()['role_id']==2) {
            return StudentsController::update($request);
        } else if (Auth::user()['role_id']==3) {
            return EnterprisesController::update($request);
        }
    }
}
