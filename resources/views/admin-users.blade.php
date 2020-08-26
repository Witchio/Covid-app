<!-- extend from tempate -->
@extends('layouts.app')

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
                <th scope="row">{{$user->name}} </th>

                <td>{{$user->email}} </td>

                <td>
                    <form method="post" action="userRole/{{$user->id}}">
                        @csrf
                        <select name="role" value="role">
                            <option selected value="{{ucfirst($user->role)}}">{{ucfirst($user->role)}}</option>

                            @if($user->role=="admin")
                            <option value="user">User</option>
                            @else
                            <option value="admin">Admin</option>
                            @endif
                        </select>
                        <input type="submit" value="Change role">

                    </form>
                    <form action="delete/{{$user->id}}" method="post">
                        @csrf
                        <input type="submit" value="Delete user">
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