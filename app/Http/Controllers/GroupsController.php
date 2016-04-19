<?php

namespace App\Http\Controllers;

use App\Group;
use App\UserGroup;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class GroupsController extends Controller
{
    function index() {
        return view('group.index');
    }

    function show($id) {
        $group = Group::find($id);
        if ($group!=null) {
            $data['group'] = $group;
            return view('group.show')->with($data);
        }
        return view('notfound');
    }

    function create() {
        return view('group.create');
    }

    function store(Request $request) {
        $user = Auth::user();
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'description' => 'required|max:255',
        ]);
        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }
        $group = new Group();
        $group['name'] = $request['name'];
        $group['description'] = $request['description'];
        $group->save();

        $user_group = new UserGroup();
        $user_group['user_id'] = $user['id'];
        $user_group['group_id'] = $group['id'];
        $user_group['isAdmin'] = true;
        $user_group->save();

        return redirect('group/'.$group['id']);
    }

    function edit($id) {
        $group = Group::find($id);
        if ($group!=null) {
            $data['group'] = $group;
            return view('group.edit')->with($data);
        }
        return view('notfound');
    }

    function update(Request $request, $id) {
        $user = Auth::user();
        $group = Group::find($id);
        if ($group!=null) {
            $user_group = UserGroup::where('user_id',$user['id'])
                ->where('group_id',$group['id'])
                ->first();
            if ($user_group['isAdmin']) {
                $validator = Validator::make($request->all(), [
                    'name' => 'required|max:255',
                    'description' => 'required|max:255',
                ]);
                if ($validator->fails()) {
                    $this->throwValidationException(
                        $request, $validator
                    );
                }
                $group['name'] = $request['name'];
                $group['description'] = $request['description'];
                $group->save();

                return redirect('group/'.$id);
            }
            return view('unauthorized');
        }
        return view('notfound');
    }

    function destroy($id) {
        $user = Auth::user();
        $group = Group::find($id);
        if ($group!=null) {
            $user_group = UserGroup::where('user_id',$user['id'])
                ->where('group_id',$group['id'])
                ->first();
            if ($user_group['isAdmin']) {
                $group->delete();

                return redirect('');
            }
            return view('unauthorized');
        }
        return view('notfound');
    }
}
