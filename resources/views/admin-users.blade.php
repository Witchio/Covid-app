<!-- extend from tempate -->

@extends('layouts.app')
<!-- section('content') -->
@section('content')


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <table class="table">

        <thead>

            <th>Name</th>

            <th>Email</th>

            <th>Role</th>

        </thead>

        <tbody>
            @foreach($users as $user)

            <tr>

                <td>{{$user->name}} </td>

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


            </tr>
            @endforeach



        </tbody>

    </table>
</body>

</html>

<!-- endsection -->

@endsection