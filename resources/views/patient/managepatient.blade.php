<h3> This is the list of Patients </h3>

<table border="1">
    <thead>
        <td>Patient Name</td>
        <td>Email</td>
        <td>IC</td>
        <td>Gender</td>
        <td>Phone</td>
        <td>Action</td>
    </thead>
    <tbody>
    @foreach ($patients as $patient)
                        <tr>
                            <td>{{ $patient['name'] }}</td>
                            <td>{{ $patient['email'] }}</td>
                            <td>{{ $patient['ic'] }}</td>
                            <td>{{ $patient['gender'] }}</td>
                            <td>{{ $patient['phone'] }}</td>
                            <td>
                                <a href="viewPatient/{{$patient['id']}}">View</a>
                                <a href="deletePatient/{{$patient['id']}}">Delete</a>
                            </td> 
                        </tr>
    @endforeach
    </tbody>
</table>  