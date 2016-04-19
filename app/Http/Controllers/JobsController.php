<?php

namespace App\Http\Controllers;

use App\Job;
use App\UserJob;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class JobsController extends Controller
{
    public function show($id) {
        $job = Job::find($id);
        if ($job!=null) {
            $data['job'] = $job;
            return view('job.show')->with($data);
        }
        return view('notfound');
    }

    public function create() {
        return view('job.create');
    }

    public function store(Request $request) {
        $user = Auth::user();
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
        ]);
        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }
        $job = new Job();
        $job['title'] = $request['title'];
        $job['user_id'] = $user['id'];
        $job->save();

        return redirect('job/'.$job['id']);
    }

    public function edit($id) {
        $job = Job::find($id);
        if ($job!=null) {
            $data['job'] = $job;
            return view('job.edit')->with($data);
        }
        return view('notfound');
    }

    public function update(Request $request, $id) {
        $user = Auth::user();
        $job = Job::find($id);
        if ($job!=null) {
            if ($job['user_id']==$user['id']) {
                $validator = Validator::make($request->all(), [
                    'title' => 'required|max:255',
                ]);
                if ($validator->fails()) {
                    $this->throwValidationException(
                        $request, $validator
                    );
                }
                $job['title'] = $request['title'];
                $job->save();

                return redirect('job/'.$id);
            }
            return view('unauthorized');
        }
        return view('notfound');
    }

    public function destroy($id) {
        $user = Auth::user();
        $job = Job::find($id);
        if ($job!=null) {
            echo $user['id'];
            if ($job['user_id']==$user['id']) {
                $job->delete();

                return redirect('');
            }
            return view('unauthorized');
        }
        return view('notfound');
    }
}
