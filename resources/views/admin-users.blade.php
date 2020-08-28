<!-- extend from tempate -->
@extends('layouts.app')
<!--Link to sass-->
@section('style')
<link href="{{ asset('css/admin-users.css') }}" rel="stylesheet">
@endsection
<!--Font for button-->
@section('style')
<link href="https://fonts.googleapis.com/css2?family=Russo+One&display=swap" rel="stylesheet">
@endsection

<!-- section('content') -->
@section('content')

<!-- Only show if user is logged in-->
@if (Auth::user())

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<!-- for the USERS -->
@if (Auth::user()->role=="user")
@auth
<p>Access Permissions Insufficient</p>
@endauth
@endif

<!-- only for the ADMINS -->
@if (Auth::user()->role=="admin")
@auth

<body>
    <h1>User Management</h1>
    <table class="table table-dark">

        <thead>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Role</th>
        </thead>

        <tbody>
            @foreach($users as $user)

            <tr>
                 @if(Auth::user()->id != $user->id)
                <td class="name" scope="row">{{$user->name}} </td>

                <td>{{$user->email}} </td>

                <td>
                    <form method="post" action="userRole/{{$user->id}}" id="roleform">
                        @csrf
                        <select class="form-control" name="role" value="role">
                            <option selected value="{{ucfirst($user->role)}}">{{ucfirst($user->role)}}</option>

                            @if($user->role=="admin")
                            <option value="user">User</option>
                            @else
                            <option value="admin">Admin</option>
                            @endif
                        </select>
                        <input class="btn btn-info" type="submit" value="Change role">
                    </form>
                </td>
                <td>
                    <form action="delete/{{$user->id}}" method="post">
                        @csrf
                        <input class="btn btn-danger" type="submit" value="DELETE User">
                    </form>
                </td>
                @endif

            </tr>
            @endforeach



        </tbody>

    </table>
</body>

</html>

@endauth
@endif
@endif
<!-- endsection -->
@endsection