<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Post;

class PostsController extends Controller
{
    //
    public function index()
    {
        // $posts = DB::table('posts')->get();
        $posts = DB::table('posts')->simplePaginate(25);
        return view('index', compact('posts'));
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'author' => ['required'],
            'email' => ['required', 'email'],
            'body' => ['required']
        ]);

        DB::table('posts')->insert([
            'author' => $request->input('author'),
            'email' => $request->input('email'),
            'body' => $request->input('body'),
        ]);
        // $post = new Post();
        // $post->author = $request->author;
        // $post->email = $request->email;
        // $post->body = $request->body;
        // $post->save();
        return redirect('/');
    }
}
