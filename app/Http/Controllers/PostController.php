<?php
// php artisan make:controller --resource PostController
// https://laravel.com/docs/7.x/controllers

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\Auth;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //todo maybe order posts by newest post, so new content would display first -luchi
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
        //* redirects to a form  where user can create post
        return view('add-post');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //* stores what the user did in add-post in the db
        //dd($request->image);
        $post = new Post;
        $post->title = $request->title;
        $post->content = $request->content;
        $post->user_id = Auth::user()->id; //only a logged in user can post

        //* Validating and storing image
        $request->validate([
            'image' => 'required|mimes:pdf,xlx,csv,jpeg,jpg|max:2048',
        ]);
        $imageName = time() . '.' . $request->image->extension();
        $post->image = $imageName;
        $request->image->move(public_path() . '/images', $imageName);

        $post->save();
        return redirect('/posts');
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

        // check if the user is uploading a new image
        if ($request->image) {
            // store the directory file path of the existing(old) image to delete later if needed
            $image_path = public_path() . '\images\\' . $post->image;

            // Validate and save new image in DB
            $request->validate([
                'image' => 'required|mimes:pdf,xlx,csv,jpeg,jpg|max:2048',
            ]);

            // save the new imageName with unique timestmp and image file name 
            //previous alternative: $imageName = time() . '.' . $request->image->extension();
            $imageName = time() . '.' . $request->image->getClientOriginalName();
            $post->image = $imageName;
            // store the image to the PUBLIC folder
            $request->image->move(public_path() . '/images', $imageName);

            // if the old image is in the PUBLIC folder, delete it
            if (Post::exists($image_path)) {
                @unlink($image_path);
            }
        }

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
        $result = Post::where('id', $id)->delete();
    }
}
