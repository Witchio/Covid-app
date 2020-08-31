<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

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


    public function update(Request $request)
    {
        $user = Auth::user();
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->nationality = $request->nationality;
        $user->birthdate = $request->birthdate;
        $user->country = $request->country;

        $user->save();

        return redirect('profile');
    }
}
