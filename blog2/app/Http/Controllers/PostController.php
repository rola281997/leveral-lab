<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use App\Rules\CustomPost;

class PostController extends Controller
{

    public function index()
    {
        /* $posts = Post::all();

         return view('posts.index', [
             'posts' => $posts,

         ]);*/


        $data['posts'] = Post::orderBy('id', 'asc')->paginate(3);

        return view('posts.index', $data);
    }


    public function show()
    {
        //take the id from url param
        $request = request();
        $postId = $request->post;

        //query to retrieve the post by id
        $post = Post::find($postId);
        // $post = Post::where('id', $postId)->get();
        // $postSecond = Post::where('id', $postId)->first();

        //send the value to the view
        return view('posts.show', [
            'post' => $post,
        ]);
    }

    public function create()
    {
        $users = User::all();

        return view('posts.create', [
            'users' => $users
        ]);
    }


    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:3|unique:posts',
            'description' => 'required|min:10',
            'user_id' => ['required','exists:users,id',]
        ]);
        $post=$request->only(['title','description','user_id']);
        Post::create($post);

        //Post::create($request->all());

        return redirect()->route('posts.index');
    }


    public function edit($id)
    {
        $where = array('id' => $id);

            $usersList = User::all();
            $data['post'] = Post::where($where)->first();
            if( $data['post']){
            $data['usersList'] = $usersList;
            return view('posts.edit', $data);
        }
        else{
            return view('posts.edit', ['error'=>'this post not exist']);}
    }

    public function update(Request $request, $id)
    {
        $where = array('id' => $id);
        $data = Post::where($where)->first();

        if($data){
            $request->validate([
                'title' => 'required|min:3',
                'description' => 'required|min:10',
                //'user_id' => ['required','exists:users_id',new CustomPost]
                'user_id' => 'required',
            ]);

            $update = ['title' => $request->title, 'description' => $request->description, 'user_id' => $request->user_id];
            Post::where('id',$id)->update($update);

            return redirect()->route('posts.index');
        }

     else{
         return view('posts.edit', ['error'=>'this post not exist']);}
    }


    public function destroy($id)
    {
        Post::where('id',$id)->delete();

        return redirect()->route('posts.index');
    }




}
