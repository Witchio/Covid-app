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
        // $post = Post::find(2);
        // dd($post->users);
        // $comment = Comment::where('post_id', 2)->userC;
        // $postcomments = Post::find(2)->comments('userC')->get();
        // $postcomments = Post::where('id', 2)->get();
        $post2 = Post::where('id', 2)
            ->withCount('users', 'comments', 'usersReports')
            ->get();
        // $comment = Comment::find(10)->userC('userComments')->get(); //works
        // $comment = Comment::find($postcomments[6]->id)->userC('userComments')->get(); //works
        $userr = User::find(9)->userComments;

        dd($post2);
        // dd($postcomments[6]->id); // works
        // dd($comment[0]->name); // works
        /* $comments = Comment::find($id);
        dd($post[0]->comments->user->name); */
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

        return view('posts', ['posts' => $posts]);
    }

    public function main()
    {
        // ORDERBY WITH INNER JOIN

        $posts = Post::withCount('users', 'comments')
            ->orderBy('users_count', 'desc')
            ->limit(3)
            ->get();
        $banner = asset('images/banner.png');

        return view('main', ['posts' => $posts, 'banner' => $banner]);
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

        $userPost = Post::where('posts.id', $id)
            ->join('users', 'posts.user_id', '=', 'users.id')
            ->select('users.name', 'posts.created_at')
            ->get();

        $post = Post::where('posts.id', $id)
            //Need left join else it won't display the posts without comments
            ->leftJoin('comments', 'posts.id', '=', 'comments.post_id')
            ->leftJoin('users', 'comments.user_id', '=', 'users.id')
            //->select('posts.*', 'comments.*', 'users.*')
            //! Need to select proper values or bugs
            ->select('posts.image', 'posts.title', 'posts.content', 'posts.user_id', 'comments.comment',  'users.name', 'posts.id')
            ->withCount('users', 'comments', 'usersReports')
            ->get();
        // https://laravel.com/docs/7.x/eloquent-relationships

        // Sending the post and the reportedStatus boolean to the view
        return view('post', [
            //Sending out the image indepedentely to avoid bugs
            'img' => $post[0]->image,
            'posts' => $post,
            'reported' => $this->reportStatus($id),
            'liked' => $this->getlike($id),
            'user' => $userPost[0],
        ]);
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
                'image' => 'required|mimes:jpeg,jpg|max:2048',
            ]);

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
        //$user = Auth::user(); //works but method is underlined as an error

        //* save record in reports table
        $post = Post::find($id);
        if (Auth::user() !== null) {
            $user = User::find(Auth::user()->id);
            $user->postsReports()->save($post);
        }

        //* if post has 3 reports then soft delete for admin to check out
        if (count($post->usersReports) >= 3) {
            $this->softDestroy($id);
            return redirect("/post/reported");
        } else {
            return redirect("/posts/$post->id");
        }
    }

    // After 3rd report, post is hidden and user gets redirected to notification
    public function thirdReport()
    {
        return view('reported-post');
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
        $post = Post::withTrashed()->find($id);

        if ($post->user_id == Auth::user()->id || Auth::user()->role == "admin") {
            $post->forceDelete();
        }
        return redirect('/posts');
    }


    public function destroyAdmin($id)
    {
        $post = Post::withTrashed()->find($id);
        if ($post->user_id == Auth::user()->id || Auth::user()->role == "admin") {
            $post->forceDelete();
        }
        return redirect('/admin/posts');
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

        $likestatus = false;
        // LIKE a post (toggle)
        if ($hasLike) {
            // REMOVE a record fr the LIKES table
            // DB::delete('DELETE from books WHERE id = ?', [$id]);
            $user->posts()->detach($post);
            $likestatus = false;
        } else {
            // ADD a record to the LIKES table
            $user->posts()->save($post);
            $likestatus = true;
        }
        return $likestatus;
    }
    // LIKE a post (toggle)
    // https://stackoverflow.com/questions/35285902/laravel-find-if-a-pivot-table-record-exists
    public function getlike($id)
    {
        // check if user connected
        if (Auth::user()) {
            // initialise variables
            $user = User::find(Auth::user()->id);
            $post = Post::find($id);
            // query if the USER already LIKED this post: assign TRUEorFALSE (if record exists or not)
            $hasLike = $user->posts()->where('post_id', $id)->exists();
        } else {
            $hasLike = false;
        }
        return $hasLike;
    }
}
