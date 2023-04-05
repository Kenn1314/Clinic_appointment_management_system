@extends('layouts.app')

@section('content')
<h1>Profile page</h1>


@if($errors->any())
    <h3>Errors</h3>
    @foreach ($errors->all() as $error)
        <li>{{$error}}</li>
    @endforeach
@endif

Currrent User: {{$user}}

<div class="container">
    <div class="col-12">
    <div class="card mb-4">
        <div class="card-body">
            <table>
                <tr>
                    <td><a href="/updateProfilePicture/{{$user->id}}">
                        <img src="{{$user['profilePic']}}" alt="pic" width="100" height="100"/>
                        </a>
                    </td>
                </tr>
                <tr>
                    <td >Name:</td>
                    <td>{{ $user->name }}</td>
                </tr>
                <tr>
                    <td>Email:</td>
                    <td>{{ $user->email }}</td>
                </tr>
                <tr>
                    <td>Expertise:</td>
                    <td>{{ $user->expertise }}</td>
                </tr>
                <!-- <tr>
                    <td>Password:</td>
                    <td>{{ $user->password }}</td>
                </tr> -->


                <tr>
                    <td><a href='/updateProfile/{{$user->id}}' class="btn btn-primary">Update profile</a></td>
                </tr>

            </table>
            </div>
        </div>
    </div>
</div>


@endsection