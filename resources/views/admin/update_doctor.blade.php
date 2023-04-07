@extends('layouts.app')

@section('content')
{{--
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
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
                <input type="text" class="form-control border border-primary-subtle" name="name"
                    value="{{$doctor_info['name']}}">
            </div>
            <div>
                <label for="exampleFormControlInput1" class="form-label">Email:</label>
                <input type="text" class="form-control border border-primary-subtle" name="email"
                    value="{{$doctor_info['email']}}">
            </div>
            <div>
                <label for="exampleFormControlInput1" class="form-label">Expertise:</label>
                <input type="text" class="form-control border border-primary-subtle" name="expertise"
                    value="{{$doctor_info['expertise']}}">
            </div>
            <br>
            <button type="submit"> Update Doctor Details </button>
        </form>
    </div>
</div> --}}

<div class="container">
    <!-- TITLE -->
    <div class=" text-center mt-5 ">
        <h1>Update Doctor Detail Form</h1>
    </div>

    <!-- FORM BODY -->
    <div class="row ">
        <div class="col-lg-7 mx-auto">
            <div class="card mt-2 mx-auto p-4 bg-light">
                <div class="card-body bg-light">

                    <div class="container">

                        <!-- FORM -->
                        <form id="contact-form" method="POST" action="/updateDoctor">
                            @csrf

                            <div class="controls">

                                <!-- ID -->
                                <input name="id" type="hidden" value="{{$doctor_info['id']}}" >

                                <!-- ROW 1 -->
                                <div class="row">

                                    <!-- NAME -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="form_name">Name *</label>
                                            <input id="form_name" type="text" name="name"
                                                class="form-control @error('name') is-invalid @enderror"
                                                placeholder="Please enter the name *"
                                                value="{{ old('name') }}">
                                        </div>
                                    </div>

                                    <!-- EMAIL -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="form_email">Email *</label>
                                            <input id="form_email" type="text" name="email" class="form-control @error('email') is-invalid @enderror"
                                                placeholder="Ex: name@email.com *"
                                                value="{{ old('email') }}">
                                        </div>
                                    </div>

                                </div>

                                <!-- ROW 2 -->
                                <div class="row">

                                    <!-- IC -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="form_ic">IC *</label>
                                            <input id="form_ic" type="text" name="ic" class="form-control @error('ic') is-invalid @enderror"
                                                placeholder="Ex: 123456-78-9999 *"
                                                value="{{ old('ic') }}">
                                        </div>
                                    </div>

                                    <!-- Phone number -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="form_phoneNumber">Phone number *</label>
                                            <input id="form_phoneNumber" type="text" name="phone" class="form-control @error('phone') is-invalid @enderror"
                                                placeholder="Ex: 012-34567890 *">
                                        </div>
                                    </div>

                                </div>

                                <!-- ROW 3 -->
                                <div class="row">

                                    <!-- Expertise -->
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="form_Expertise">Expertise *</label>
                                            <textarea id="form_Expertise" name="expertise" class="form-control @error('expertise') is-invalid @enderror"
                                                placeholder="Please enter the expertise description of the doctor" rows="4"></textarea>
                                        </div>
                                    </div>

                                </div>

                                <!-- ROW 4 -->
                                <div class="row">

                                    <!-- Password -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="form_passsword">Password *</label>
                                            <input id="form_password" type="text" name="password" class="form-control @error('password') is-invalid @enderror"
                                                placeholder="Please enter the password *">
                                        </div>
                                    </div>


                                    <!-- Password confirmation -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="form_passCon">Confirm password *</label>
                                            <input id="form_passwCon" type="text" name="password_confirmation"
                                                class="form-control" placeholder="Please enter the password again *">
                                        </div>
                                    </div>

                                </div>

                            </div>

                            @if ($errors->any())
                            <div class="alert alert-danger mt-2">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                            
                            <!-- Submit button -->
                            <div class="mt-3">
                                <input type="submit" class="btn btn-success btn-send  pt-2 btn-block" value="Update">
                            </div>
                        </form>

                    </div>
                </div>


            </div>

        </div>
    </div>
</div>

<style>
    .invalid-feedback {
        color: #ff606e;
    }

    .valid-feedback {
        color: #2acc80;
    }
</style>

@endsection