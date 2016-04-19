<?php

namespace App\Http\Controllers;

use App\Enterprise;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class EnterprisesController extends Controller
{
    function index() {
        return view('enterprise.index');
    }

    static function show($id) {
        $data['user'] = User::join('enterprises','users.id','=','enterprises.id')
            ->select('*')->get()[0];
        return view('enterprise.show')->with($data);
    }

    static function update(Request $request) {
        $validator = Validator::make($request->all(), [
            'birthday' => 'date',
            'phone' => 'max:32',
            'address' => 'max:1024',
            'description' => 'max:65536',
        ]);
        if ($validator->fails()) {
            $ec = new EnterprisesController();
            $ec->throwValidationException($request, $validator);
        }
        $enterprise = Enterprise::find(Auth::user()['id']);
        $enterprise['birthday'] = $request['birthday'];
        $enterprise['phone'] = $request['phone'];
        $enterprise['address'] = $request['address'];
        $enterprise['description'] = $request['description'];
        $enterprise->save();
        return redirect('/user/edit');
    }
}
