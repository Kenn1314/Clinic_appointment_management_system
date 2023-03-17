@extends('layouts.app')

@section('content')
<div class ="container-sm" >
<table class="table table-dark table-bordered border-2 border-secondary" >
    <thead>
        <td>Patient Name</td>
        <td>Email</td>
        <td>IC</td>
        <td>Gender</td>
        <td>Phone</td>
        <td>Action</td>
    </thead>
    <tbody class="table-light table-striped ">
    @foreach ($patients as $patient)
                        <tr>
                            <td>{{ $patient['name'] }}</td>
                            <td>{{ $patient['email'] }}</td>
                            <td>{{ $patient['ic'] }}</td>
                            <td>{{ $patient['gender'] }}</td>
                            <td>{{ $patient['phone'] }}</td>
                            <td>
                                <a href="viewpatient/{{$patient['id']}}">View</a>
                                <a href="deletepatient/{{$patient['id']}}">Delete</a>
                            </td> 
                        </tr>
    @endforeach
    </tbody>
</table>
</div> 
@endsection 