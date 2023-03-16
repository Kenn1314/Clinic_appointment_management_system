@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card-body">
        Welcome to YLLoo’s Web Application.
        @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
        @endif

        @can('isAdmin')
        <div class="btn btn-success btn-lg">
            You have Admin Access
        </div>
        @elsecan('isDoctor')
        <div class="btn btn-primary btn-lg">
            You have Doctor Access
        </div>
        @else
        
        <!-- PATIENT HOME -->
        <div>
            <div class="container-fluid">

                <h1>Welcome back</h1>

                <div class="card"></div>
                <div class="d-flex justify-content-between">
                    <div class="border h-5">{{count($upcoming)}}</div>
                    <div class="border h-5">{{count($pending)}}</div>
                    <div class="border h-5">{{count($completed)}}</div>
                </div>
                <div class="card">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="Upcoming-tab" data-bs-toggle="tab"
                                data-bs-target="#Upcoming" type="button" role="tab" aria-controls="Upcoming"
                                aria-selected="true">Upcoming</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="Pending-tab" data-bs-toggle="tab" data-bs-target="#Pending"
                                type="button" role="tab" aria-controls="Pending" aria-selected="false">Pending</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="History-tab" data-bs-toggle="tab" data-bs-target="#History"
                                type="button" role="tab" aria-controls="History" aria-selected="false">History</button>
                        </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content container-fluid">

                        <!-- UPCOMING TAB -->
                        <div class="tab-pane fade show active" id="Upcoming" role="tabpanel"
                            aria-labelledby="Upcoming-tab" tabindex="0">
                            <ul class="list-group">
                                <div class="justify-content-center">
                                    @foreach($upcoming as $upcoming)
                                    <div class="border border-primary rounded m-4 bg-info">
                                        <div class="d-flex justify-content-between">

                                            <!-- SHOW THE DATE AND TIME OF APPOINTMENT -->
                                            <div class="p-2">
                                                <h4>{{$upcoming['date']}} ({{$upcoming['time']}})</h4>
                                            </div>

                                            <!-- SHOW EDIT AND DELETE ICON -->
                                            <div class="p-2">

                                                <!-- EDIT ICON -->
                                                <span>
                                                    <!-- EDIT BUTTON -->
                                                    <a data-bs-toggle="modal" data-bs-target="#editModal">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="20"
                                                            fill="black" class="bi bi-pencil-square"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                            <path fill-rule="evenodd"
                                                                d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                                        </svg>
                                                    </a>

                                                    <!-- EDIT MODAL -->
                                                    <div class="modal fade" id="editModal" tabindex="-1"
                                                        aria-labelledby="cancelModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">

                                                                <!-- MODAL HEADER -->
                                                                <div class="modal-header">
                                                                    <h1 class="modal-title fs-5" id="cancelModalLabel">
                                                                        CHANGE
                                                                        APPOINTMENT DATE</h1>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal"
                                                                        aria-label="Close"></button>
                                                                </div>

                                                                <!-- MODAL BODY -->
                                                                <div class="modal-body">
                                                                    {{-- <form action="/patient/make-appointment"
                                                                        method="POST">
                                                                        @csrf

                                                                        <div class="form-group row">
                                                                            <label for="appointment_date"
                                                                                class="col-md-4 col-form-label text-md-right">{{__('Appointment
                                                                                Date') }}</label>
                                                                            <div class="col-md-6">
                                                                                <div class='input-group date'
                                                                                    id='datetimepicker'>

                                                                                    <input type='date'
                                                                                        class="form-control"
                                                                                        name="appointment_date"
                                                                                        min="{{ date('Y-m-d', strtotime('tomorrow')) }}"
                                                                                        value="{{ date('Y-m-d', strtotime('tomorrow')) }}" />

                                                                                    <span class="input-group-addon">
                                                                                        <span
                                                                                            class="glyphicon glyphicon-calendar"></span>
                                                                                    </span>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group row">
                                                                            <label for="time_test"
                                                                                class="col-md-4 col-form-label text-md-right">{{
                                                                                __('Appointment Time') }}</label>
                                                                            <div class="col-md-6">

                                                                                <select class="form-control" name="time"
                                                                                    id="time_test" required>
                                                                                    <option value="">Select a time slot
                                                                                    </option>
                                                                                </select>

                                                                            </div>
                                                                        </div>
                                                                        <br />
                                                                        <div class="form-group row text-center">
                                                                            <div class="col-md-12">
                                                                                <button type="submit"
                                                                                    class="btn btn-primary"
                                                                                    onclick="return confirm('Are you sure you want to create this appointment?')">{{
                                                                                    __('Create appointment') }}</button>
                                                                            </div>
                                                                        </div>
                                                                    </form> --}}
                                                                </div>

                                                                <!-- MODAL FOOTER -->
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-bs-dismiss="modal">Close</button>
                                                                    <button type="button" class="btn btn-danger">
                                                                        <a href="/cancel/{{$upcoming['id']}}"
                                                                            style="color: white; text-decoration:none">Confirm</a>
                                                                    </button>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </span>

                                                <!-- DELETE ICON -->
                                                <span>

                                                    <!-- CANCEL BUTTON -->
                                                    <a data-bs-toggle="modal" data-bs-target="#cancelModal">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                            fill="red" class="bi bi-x-circle-fill" viewBox="0 0 16 16">
                                                            <path
                                                                d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z" />
                                                        </svg>
                                                    </a>

                                                    <!-- CANCEL MODAL -->
                                                    <div class="modal fade" id="cancelModal" tabindex="-1"
                                                        aria-labelledby="cancelModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">

                                                                <!-- MODAL HEADER -->
                                                                <div class="modal-header">
                                                                    <h1 class="modal-title fs-5" id="cancelModalLabel">
                                                                        Cancel
                                                                        Request
                                                                    </h1>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal"
                                                                        aria-label="Close"></button>
                                                                </div>

                                                                <!-- MODAL BODY -->
                                                                <div class="modal-body">
                                                                    DO YOU WANT TO CANCEL THIS APPOINTMENT ?
                                                                </div>

                                                                <!-- MODAL FOOTER -->
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-bs-dismiss="modal">Close</button>
                                                                    <button type="button" class="btn btn-danger">
                                                                        <a href="/cancel/{{$upcoming['id']}}"
                                                                            style="color: white; text-decoration:none">Confirm</a>
                                                                    </button>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </span>
                                            </div>

                                        </div>

                                        <!-- SHOW THE DOCTOR OF APPOINTMENT -->
                                        <h5 style="padding-left: 8px">{{$upcoming->doctor->name}}</h5>
                                    </div>
                                    @endforeach
                                </div>
                            </ul>
                        </div>

                        <!-- PENDING TAB -->
                        <div class="tab-pane fade show" id="Pending" role="tabpanel" aria-labelledby="Pending-tab"
                            tabindex="0">
                            <ul class="list-group">
                                <div class="justify-content-center">
                                    @foreach($pending as $pending)
                                    <div class="border border-primary rounded m-4 bg-info">
                                        <div class="d-flex justify-content-between">

                                            <!-- SHOW THE DATE AND TIME OF APPOINTMENT -->
                                            <div class="p-2">
                                                <h4>{{$pending['date']}} ({{$pending['time']}})</h4>
                                            </div>

                                            <!-- SHOW EDIT AND DELETE ICON -->
                                            <div class="p-2">

                                                <!-- EDIT ICON -->
                                                <span>
                                                    <!-- EDIT BUTTON -->
                                                    <a data-bs-toggle="modal" data-bs-target="#editModal">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="20"
                                                            fill="black" class="bi bi-pencil-square"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                            <path fill-rule="evenodd"
                                                                d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                                        </svg>
                                                    </a>

                                                    <!-- EDIT MODAL -->
                                                    <div class="modal fade" id="editModal" tabindex="-1"
                                                        aria-labelledby="cancelModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">

                                                                <!-- MODAL HEADER -->
                                                                <div class="modal-header">
                                                                    <h1 class="modal-title fs-5" id="cancelModalLabel">
                                                                        CHANGE
                                                                        APPOINTMENT DATE</h1>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal"
                                                                        aria-label="Close"></button>
                                                                </div>

                                                                <!-- MODAL BODY -->
                                                                <div class="modal-body">
                                                                    {{-- <form action="/patient/make-appointment"
                                                                        method="POST">
                                                                        @csrf

                                                                        <div class="form-group row">
                                                                            <label for="appointment_date"
                                                                                class="col-md-4 col-form-label text-md-right">{{__('Appointment
                                                                                Date') }}</label>
                                                                            <div class="col-md-6">
                                                                                <div class='input-group date'
                                                                                    id='datetimepicker'>

                                                                                    <input type='date'
                                                                                        class="form-control"
                                                                                        name="appointment_date"
                                                                                        min="{{ date('Y-m-d', strtotime('tomorrow')) }}"
                                                                                        value="{{ date('Y-m-d', strtotime('tomorrow')) }}" />

                                                                                    <span class="input-group-addon">
                                                                                        <span
                                                                                            class="glyphicon glyphicon-calendar"></span>
                                                                                    </span>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group row">
                                                                            <label for="time_test"
                                                                                class="col-md-4 col-form-label text-md-right">{{
                                                                                __('Appointment Time') }}</label>
                                                                            <div class="col-md-6">

                                                                                <select class="form-control" name="time"
                                                                                    id="time_test" required>
                                                                                    <option value="">Select a time slot
                                                                                    </option>
                                                                                </select>

                                                                            </div>
                                                                        </div>
                                                                        <br />
                                                                        <div class="form-group row text-center">
                                                                            <div class="col-md-12">
                                                                                <button type="submit"
                                                                                    class="btn btn-primary"
                                                                                    onclick="return confirm('Are you sure you want to create this appointment?')">{{
                                                                                    __('Create appointment') }}</button>
                                                                            </div>
                                                                        </div>
                                                                    </form> --}}
                                                                </div>

                                                                <!-- MODAL FOOTER -->
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-bs-dismiss="modal">Close</button>
                                                                    <button type="button" class="btn btn-danger">
                                                                        <a href="/cancel/{{$pending['id']}}"
                                                                            style="color: white; text-decoration:none">Confirm</a>
                                                                    </button>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </span>

                                                <!-- DELETE ICON -->
                                                <span>

                                                    <!-- CANCEL BUTTON -->
                                                    <a data-bs-toggle="modal" data-bs-target="#cancelModal">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                            fill="red" class="bi bi-x-circle-fill" viewBox="0 0 16 16">
                                                            <path
                                                                d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z" />
                                                        </svg>
                                                    </a>

                                                    <!-- CANCEL MODAL -->
                                                    <div class="modal fade" id="cancelModal" tabindex="-1"
                                                        aria-labelledby="cancelModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">

                                                                <!-- MODAL HEADER -->
                                                                <div class="modal-header">
                                                                    <h1 class="modal-title fs-5" id="cancelModalLabel">
                                                                        Cancel
                                                                        Request
                                                                    </h1>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal"
                                                                        aria-label="Close"></button>
                                                                </div>

                                                                <!-- MODAL BODY -->
                                                                <div class="modal-body">
                                                                    DO YOU WANT TO CANCEL THIS APPOINTMENT ?
                                                                </div>

                                                                <!-- MODAL FOOTER -->
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-bs-dismiss="modal">Close</button>
                                                                    <button type="button" class="btn btn-danger">
                                                                        <a href="/cancel/{{$pending['id']}}"
                                                                            style="color: white; text-decoration:none">Confirm</a>
                                                                    </button>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </span>
                                            </div>

                                        </div>

                                        <!-- SHOW THE DOCTOR OF APPOINTMENT -->
                                        <h5 style="padding-left: 8px">{{$pending->doctor->name}}</h5>
                                    </div>
                                    @endforeach
                                </div>
                            </ul>
                        </div>

                        <!-- COMPLETED TAB -->
                        <div class="tab-pane fade show" id="History" role="tabpanel" aria-labelledby="History-tab"
                            tabindex="0">
                            <ul class="list-group">
                                <div class="justify-content-center">
                                    @foreach($completed as $completed)
                                    <div class="border border-primary rounded m-4 bg-info">
                                        <div class="d-flex justify-content-between">

                                            <!-- SHOW THE DATE AND TIME OF APPOINTMENT -->
                                            <div class="p-2">
                                                <h4>{{$pending['date']}} ({{$pending['time']}})</h4>
                                            </div>

                                            <!-- SHOW EDIT AND DELETE ICON -->
                                            <div class="p-2">

                                                <!-- EDIT ICON -->
                                                <span>
                                                    <!-- EDIT BUTTON -->
                                                    <a data-bs-toggle="modal" data-bs-target="#editModal">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="20"
                                                            fill="black" class="bi bi-pencil-square"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                            <path fill-rule="evenodd"
                                                                d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                                        </svg>
                                                    </a>

                                                    <!-- EDIT MODAL -->
                                                    <div class="modal fade" id="editModal" tabindex="-1"
                                                        aria-labelledby="cancelModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">

                                                                <!-- MODAL HEADER -->
                                                                <div class="modal-header">
                                                                    <h1 class="modal-title fs-5" id="cancelModalLabel">
                                                                        CHANGE
                                                                        APPOINTMENT DATE</h1>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal"
                                                                        aria-label="Close"></button>
                                                                </div>

                                                                <!-- MODAL BODY -->
                                                                <div class="modal-body">
                                                                    {{-- <form action="/patient/make-appointment"
                                                                        method="POST">
                                                                        @csrf

                                                                        <div class="form-group row">
                                                                            <label for="appointment_date"
                                                                                class="col-md-4 col-form-label text-md-right">{{__('Appointment
                                                                                Date') }}</label>
                                                                            <div class="col-md-6">
                                                                                <div class='input-group date'
                                                                                    id='datetimepicker'>

                                                                                    <input type='date'
                                                                                        class="form-control"
                                                                                        name="appointment_date"
                                                                                        min="{{ date('Y-m-d', strtotime('tomorrow')) }}"
                                                                                        value="{{ date('Y-m-d', strtotime('tomorrow')) }}" />

                                                                                    <span class="input-group-addon">
                                                                                        <span
                                                                                            class="glyphicon glyphicon-calendar"></span>
                                                                                    </span>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group row">
                                                                            <label for="time_test"
                                                                                class="col-md-4 col-form-label text-md-right">{{
                                                                                __('Appointment Time') }}</label>
                                                                            <div class="col-md-6">

                                                                                <select class="form-control" name="time"
                                                                                    id="time_test" required>
                                                                                    <option value="">Select a time slot
                                                                                    </option>
                                                                                </select>

                                                                            </div>
                                                                        </div>
                                                                        <br />
                                                                        <div class="form-group row text-center">
                                                                            <div class="col-md-12">
                                                                                <button type="submit"
                                                                                    class="btn btn-primary"
                                                                                    onclick="return confirm('Are you sure you want to create this appointment?')">{{
                                                                                    __('Create appointment') }}</button>
                                                                            </div>
                                                                        </div>
                                                                    </form> --}}
                                                                </div>

                                                                <!-- MODAL FOOTER -->
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-bs-dismiss="modal">Close</button>
                                                                    <button type="button" class="btn btn-danger">
                                                                        <a href="/cancel/{{$completed['id']}}"
                                                                            style="color: white; text-decoration:none">Confirm</a>
                                                                    </button>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </span>

                                                <!-- DELETE ICON -->
                                                <span>

                                                    <!-- CANCEL BUTTON -->
                                                    <a data-bs-toggle="modal" data-bs-target="#cancelModal">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                            fill="red" class="bi bi-x-circle-fill" viewBox="0 0 16 16">
                                                            <path
                                                                d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z" />
                                                        </svg>
                                                    </a>

                                                    <!-- CANCEL MODAL -->
                                                    <div class="modal fade" id="cancelModal" tabindex="-1"
                                                        aria-labelledby="cancelModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">

                                                                <!-- MODAL HEADER -->
                                                                <div class="modal-header">
                                                                    <h1 class="modal-title fs-5" id="cancelModalLabel">
                                                                        Cancel
                                                                        Request
                                                                    </h1>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal"
                                                                        aria-label="Close"></button>
                                                                </div>

                                                                <!-- MODAL BODY -->
                                                                <div class="modal-body">
                                                                    DO YOU WANT TO CANCEL THIS APPOINTMENT ?
                                                                </div>

                                                                <!-- MODAL FOOTER -->
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-bs-dismiss="modal">Close</button>
                                                                    <button type="button" class="btn btn-danger">
                                                                        <a href="/cancel/{{$completed['id']}}"
                                                                            style="color: white; text-decoration:none">Confirm</a>
                                                                    </button>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </span>
                                            </div>

                                        </div>

                                        <!-- SHOW THE DOCTOR OF APPOINTMENT -->
                                        <h5 style="padding-left: 8px">{{$completed->doctor->name}}</h5>
                                    </div>
                                    @endforeach
                                </div>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        @endcan
    </div>
</div>

<style>
    .doctor-custom {
        padding-left: 50px,
    }
</style>
@endsection