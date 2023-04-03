@extends('layouts.app')

@section('content')
<style>
  .doctor-card:hover {
    box-shadow: 0px 0px 50px rgba(0, 0, 0, 0.5);
  }
</style>
<div class="container">
  <div class="row m-b-40" style="      background: black;
  color: #fff; margin-bottom: 18px;">
    <div class="col-12 text-center">
      <h1 class="page-resources__title">Doctors</h1>
      <div class="page-resources__desc">
         Choose a doctor you like!            </div>
    </div>
    
  </div>
  
<div class="row row-cols-3 g-3" style="background: aliceblue">
  @foreach($doctors as $doctor)
  <div class="col">
    <div class="card doctor-card">
      <img src="https://mdbcdn.b-cdn.net/img/new/standard/city/041.webp" class="card-img-top" alt="Hollywood Sign on The Hill" />
      <div class="card-body">
        <h5 class="card-title">{{$doctor['name']}}</h5>
        <p class="card-text">{{$doctor['description']}}</p>
      </div>
      <form method="POST" action="/patient/appointment">
        @csrf
        <input type="hidden" name="chosen_doctor_id" value="{{strval($doctor['id'])}}">
        <button type="submit" class="btn btn-primary w-100" style="background: black;">View available time</button>
      </form>
    </div>
  </div>
  @endforeach
</div>
</div>
@endsection