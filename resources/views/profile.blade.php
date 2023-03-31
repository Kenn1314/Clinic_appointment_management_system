<h1>Profile page</h1>


@if($errors->any())
    <h3>Errors</h3>
    @foreach ($errors->all() as $error)
        <li>{{$error}}</li>
    @endforeach
@endif

Currrent User: {{$user}}

<table>
    <tr>
        <td>Name:</td>
        <td>{{ $user->name }}</td>
    </tr>
    <tr>
        <td>Email:</td>
        <td>{{ $user->email }}</td>
    </tr>
    <tr>
        <td>Password:</td>
        <td>{{ $user->password }}</td>
    </tr>

    <tr>
        <td><a href='/updateProfile/{{$user->id}}'>Update profile</a></td>
    </tr>

</table>

