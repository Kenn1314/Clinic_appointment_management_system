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
        @can('isAdmin')
        <label>Symptoms </label><input type="text" readonly class="form-control-plaintext" name="symptoms" value="{{$data['symptoms']}}"> <br>
        <label>Diagnosis </label><input type="text" readonly class="form-control-plaintext" name="diagnosis" value="{{$data['diagnosis']}}">
        <label>Prescription </label><input type="text" readonly class="form-control-plaintext" name="prescription" value="{{$data['prescription']}}"> <br>
        <label>Test Result </label><input type="text" class="form-control" name="test_result" value="{{$data['test_result']}}">
        @else
        <label>Symptoms </label><input type="text" readonly class="form-control-plaintext" name="symptoms" value="{{$data['symptoms']}}"> <br>
        <label>Diagnosis </label><input type="text" readonly class="form-control" name="diagnosis" value="{{$data['diagnosis']}}">
        <label>Prescription </label><input type="text" readonly class="form-control" name="prescription" value="{{$data['prescription']}}"> <br>
        <label>Test Result </label><input type="text" class="form-control" name="test_result" value="{{$data['test_result']}}">
        @endcan
        <br>
        <br>
        <button type="submit"> Update user </button>
    </div>
</form>
@endsection