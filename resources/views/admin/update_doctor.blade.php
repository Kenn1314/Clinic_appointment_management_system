@extends('layouts.app')

@section('content')
{{-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> --}}
{{-- <h2 class="text-center"> Update Doctor's Details </h2>
<div class="row">
    <div class="mx-auto col-10 col-md-8 col-lg-6">
        <form action="updateDoctor" method="POST">
        @csrf
        <input type="hidden" name="id" value="{{$doctor_info['id']}}">
        <div>
            <label for="exampleFormControlInput1" class="form-label">Name:</label>
            <input type="text" class="form-control border border-primary-subtle" name="name" value="{{$doctor_info['name']}}">
        </div>
        <div>
            <label for="exampleFormControlInput1" class="form-label">Email:</label>
            <input type="text" class="form-control border border-primary-subtle" name="email" value="{{$doctor_info['email']}}">
        </div>
        <div>
            <label for="exampleFormControlInput1" class="form-label">Expertise:</label>
            <input type="text" class="form-control border border-primary-subtle" name="expertise" value="{{$doctor_info['expertise']}}">
        </div>
        <br>
        <button type ="submit"> Update Doctor Details </button>
        </form>
    </div>
</div> --}}


@endsection