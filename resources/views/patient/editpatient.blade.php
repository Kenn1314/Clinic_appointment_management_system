@extends('layouts.app')

@section('content')
<div class="mx-auto col-md-8 ">
    <h1>Update {{$patient['name']}} Details </h1>
</div>
<form action="/updateUser" method="POST">
    @csrf
    <div class="mx-auto col-md-8 ">
        <input type="hidden" name="id" value="{{$data['id']}}">
        <input type="hidden" name="patient_id" value="{{$patient['id']}}">
        {{-- <label>Name </label><input type="text" class="form-control" name="name" value="{{$data['name']}}"> <br>
        <label>Email </label><input type="text" class="form-control" name="email" value="{{$data['email']}}">
        <br>
        @can('isAdmin')
        <label>IC </label><input type="text" class="form-control" name="ic" value="{{$data['ic']}}"> <br>
        @else
        <label>IC </label><input type="text" readonly class="form-control-plaintext" name="ic" value="{{$data['ic']}}">
        <br>
        @endcan
        <label>Phone </label><input type="text" class="form-control" name="phone" value="{{$data['phone']}}">
        <br> --}}
        <label>Symptoms </label><input type="text" class="form-control" name="symptoms" value="{{$data['symptoms']}}"> <br>
        <label>Diagnosis </label><input type="text" class="form-control" name="diagnosis" value="{{$data['diagnosis']}}">
        <label>Prescription </label><input type="text" class="form-control" name="prescription" value="{{$data['prescription']}}"> <br>
        <label>Test Result </label><input type="text" class="form-control" name="test_result" value="{{$data['test_result']}}">
        <br>
        <br>
        <button type="submit"> Update user </button>
    </div>
</form>
@endsection