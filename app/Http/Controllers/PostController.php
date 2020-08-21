<?php
// php artisan make:controller --resource PostController
// https://laravel.com/docs/7.x/controllers

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;

class PostController extends Controller
{
    public function test()
    {
        /* $post = Post::find(1);
        dd($post->users); */
        $user = User::find(1);
        dd($user->posts->count());
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //* Using the Eloquent model
        $posts = Post::all();
        return view('posts', ['posts' => $posts]);
    }

    public function main()
    {
        // ORDERBY WITH INNER JOIN
        // SELECT p.*, COUNT(l.post_id) FROM posts p INNER JOIN likes l ON p.id = l.post_id GROUP BY p.id 
        $posts = Post::withCount('users') //withCount counts the number of User OBJECTS associated to the Post (aka LIKES)
            ->orderBy('users_count', 'desc')
            ->limit(3)
            ->get();

        return view('main', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::where('id', $id)->get();
        return view('post', ['post' => $post[0]]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // pull existing data fr DB
        $post = Post::where('id', $id)->get();
        return view('edit-post', ['post' => $post[0]]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Update the post in the DB
        $post = Post::find($id);

        $post->title = $request->title;
        $post->content = $request->content;

        $post->save();

        $newPost = Post::find($id);
        return view('post', ['post' => $newPost]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
