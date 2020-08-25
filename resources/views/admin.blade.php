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
                    <form method="post" action="admin/userRole/{{$user->id}}">
                        @csrf
                        <select name="role" value="role">
                            <option selected disabled>{{ucfirst($user->role)}}</option>
                            <option value="user">User</option>
                            <option value="admin">Admin</option>
                        </select>
                        <input type="submit" value="Change role">
                    </form>
                </td>


            </tr>
            @endforeach

        </tbody>

    </table>
</body>

</html>