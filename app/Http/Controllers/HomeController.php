<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function showProfile()
    {
        return view('profile');
    }

    //* Shows all users on Admin page
    public function showUser()
    {
        $users = User::all();
        return view('admin-users', ['users' => $users]);
    }

    //*Change user role
    public function edit(Request $request, $id)
    {

        //$user = User::where('id', $id)->get();

        $user = User::find($id);
        $user->role = $request->role;

        $user->save();
        return redirect('admin/users');
    }

    //* Soft-delete user with user button
    public function destroy($id)
    {
        $result = User::where('id', $id)->delete();
        return redirect('admin/users');
    }
}
