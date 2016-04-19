<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PostsController extends Controller
{
    public function show($id) {
        $post = Post::find($id);
        if ($post!=null) {
            $data['post'] = $post;
            return view('post.show')->with($data);
        }
        return view('notfound');
    }

    public function create() {
        return view('post.create');
    }

    public function store(Request $request) {
        $user = Auth::user();
        $validator = Validator::make($request->all(), [
            'content' => 'required|max:65536',
            'group_id' => 'required|integer',
        ]);
        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }
        $post = new post();
        $post['content'] = $request['content'];
        $post['user_id'] = $user['id'];
        $post['group_id'] = $request['group_id'];
        $post->save();

        return redirect('post/'.$post['id']);
    }

    public function edit($id) {
        $post = Post::find($id);
        if ($post!=null) {
            $data['post'] = $post;
            return view('post.edit')->with($data);
        }
        return view('notfound');
    }

    public function update(Request $request, $id) {
        $user = Auth::user();
        $post = Post::find($id);
        if ($post!=null) {
            if ($post['user_id']==$user['id']) {
                $validator = Validator::make($request->all(), [
                    'content' => 'required|max:255',
                ]);
                if ($validator->fails()) {
                    $this->throwValidationException(
                        $request, $validator
                    );
                }
                $post['content'] = $request['content'];
                $post->save();

                return redirect('post/'.$id);
            }
            return view('unauthorized');
        }
        return view('notfound');
    }

    public function destroy($id) {
        $user = Auth::user();
        $post = Post::find($id);
        if ($post!=null) {
            echo $user['id'];
            if ($post['user_id']==$user['id']) {
                $post->delete();

                return redirect('');
            }
            return view('unauthorized');
        }
        return view('notfound');
    }
}
