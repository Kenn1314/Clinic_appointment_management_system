@extends('layouts.app')

@section('content')
<form action="updateUser" method="POST">
    @csrf
        <input type="hidden" name="id" value="{{$data['id']}}">
        <input type="text" name="name" value="{{$data['name']}}"> <br>
        <input type="text" name="email" value="{{$data['email']}}"> <br>
        <button type="submit"> Update user </button>
    </form>
@endsection