<?php
// php artisan make:controller --resource PostController
// https://laravel.com/docs/7.x/controllers

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use App\Comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class PostController extends Controller
{
    public function test()
    {
        $post = Post::find(1);
        dd($post->users);
        /* $user = User::find(1);
        dd($user->posts->count()); */
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // *Using Eloquent ORM
        $posts = Post::withCount('users', 'comments', 'usersReports')->get();
        // dd($posts);

        return view('posts', ['posts' => $posts]);
    }

    public function main()
    {
        // ORDERBY WITH INNER JOIN
        // SELECT p.*, COUNT(l.post_id) FROM posts p INNER JOIN likes l ON p.id = l.post_id GROUP BY p.id
        //withCount counts the number of User OBJECTS associated to the Post (aka LIKES or Comments)
        $posts = Post::withCount('users', 'comments')
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
        $post = new Post;
        // Validating inputs
        $post->user_id = Auth::user()->id; //only a logged in user can post

        //* Validating and storing image
        if ($request->image) {
            $request->validate([
                'image' => 'mimes:jpeg,jpg|max:2048',
            ]);
            $imageName = time() . '.' . $request->image->extension();
            $post->image = $imageName;
            $request->image->move(public_path() . '/images', $imageName);
        }
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);
        $post->title = $request->title;
        $post->content = $request->content;

        $post->save();
        return redirect("/posts/$post->id");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Using Eloquent ORM
        $post = Post::where('id', $id)
            ->withCount('users', 'comments', 'usersReports')->get();

        // Sending the post and the reportedStatus boolean to the view
        return view('post', ['post' => $post[0], 'reported' => $this->reportStatus($id)]);
    }

    //* checking if the user has already reported the post they are viewing
    public function reportStatus($id)
    {
        if (Auth::user() !== null) {
            $reported = false;
            $user = Auth::user();
            foreach ($user->postsReports as $value) {
                if ($value['pivot']['post_id']  == $id) {
                    return $reported = true;
                }
            }
            return $reported;
        }
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
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);
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

        return redirect("/posts/$post->id");
    }

    //* Reporting a post
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function report($id)
    {
        //dd($post[0]->usersReports); //this gives array with each report
        //dd($post[0]->usersReports()); //this gives an array with info about the reports table

        //$user = Auth::user(); //works but method is underlined as an error

        //* save record in reports table
        $post = Post::find($id);
        if (Auth::user() !== null) {
            $user = User::find(Auth::user()->id);
            $user->postsReports()->save($post);
        }

        //* if post has 3 reports then soft delete for admin to check out
        if (count($post->usersReports) == 3) {
            $this->softDestroy($id);
        }
        return redirect('/posts');
    }

    //* After 3 reports, a post is soft deleted for an admin to review it
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function softDestroy($id)
    {
        $post = Post::find($id)->delete();
    }


    //* if the admin of the user want to permanent delete a post
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = Post::where('id', $id)->forceDelete();
    }

    //* if the admin after reviewing the post deemed it safe
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        // Restoring post (deleted_at = null)
        $post = Post::where('id', $id)->restore();
        //deleting the reports for that post
        $post = Post::find($id)->usersReports()->detach();
    }

    //* Show the soft-deleted posts on the admin dashboard

    public function showSoftDeleted()
    {
        $posts = Post::onlyTrashed()->get();

        return view('admin-posts', ['posts' => $posts]);
    }

    // LIKE a post (toggle)
    // https://stackoverflow.com/questions/35285902/laravel-find-if-a-pivot-table-record-exists
    public function likePost($id)
    {
        // initialise variables
        $user = User::find(Auth::user()->id);
        $post = Post::find($id);

        // query if the USER already LIKED this post: assign TRUEorFALSE (if record exists or not)
        $hasLike = $user->posts()->where('post_id', $id)->exists();

        // LIKE a post (toggle)
        if ($hasLike) {
            // REMOVE a record fr the LIKES table
            // DB::delete('DELETE from books WHERE id = ?', [$id]);
            $user->posts()->detach($post);
        } else {
            // ADD a record to the LIKES table
            $user->posts()->save($post);
        }
    }
}
