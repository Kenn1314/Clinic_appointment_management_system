{{-- <head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no">
	<title>DataTables example - Bootstrap 5</title>
	<link rel="shortcut icon" type="image/png" href="/media/images/favicon.png">
	<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="http://www.datatables.net/rss.xml">
	<link rel="stylesheet" type="text/css" href="/media/css/site-examples.css?_=ee251b2e366fd8325168a7c17e83be281">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
	<style type="text/css" class="init">
	
	</style>
	<script type="text/javascript" src="/media/js/site.js?_=354829d85c66f61a3a9a975f0688f684" data-domain="datatables.net" data-api="https://plausible.sprymedia.co.uk/api/event"></script>
	<script src="/media/js/dynamic.php?comments-page=examples%2Fstyling%2Fbootstrap5.html"></script>
	<script defer async src="https://media.ethicalads.io/media/client/ethicalads.min.js" onload="window.dtAds()" onerror="window.dtAds()"></script>

    
	<script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
	<script type="text/javascript" language="javascript" src="../resources/demo.js"></script>
	<script type="text/javascript" class="init">


	</script>
</head> --}}

<h1 style="text-align:center;">Welcome to Admin page, {{session('user_name')}}</h1>

<table class="table table-striped table-hover dt-responsive nowrap" id="admin_table" style="width:100%">
    <thead class="table-dark">
      <tr>
        <th scope="col"></th>
        <th scope="col">Patient_id</th>
        <th scope="col">Patient_name</th>
        <th scope="col">Date</th>
        <th scope="col">Time</th>
        <th scope="col">Status</th>
        <th scope="col">Doctor</th> 
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody class="table-info">
        @foreach($all_pending_appointments as $key => $appointment)
        @if($appointment->patient_name)
            <tr>
                <th scope="row">{{$key+1}}.</th>
                <td>{{$appointment->user_id}}</td>
                <td>{{$appointment->patient_name->name}}</td>
                <td>{{$appointment->date}}</td>
                <td>{{$appointment->time}}</td>
                <td>{{$appointment->status}}</td>
                <td>{{$appointment->doctor->name}}</td>
                <td>
                    {{-- <form action="/update_Status" method="POST">
                        @csrf
                        <input type="hidden" value="{{$appointment->id}}" name="id" />
                        <input type="submit" class="btn btn-success" value="Approved"/>
                    </form> --}}

                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target='#approvedModal_{{$appointment->id}}'>
                        APPROVED
                    </button>

                    <!-- APPROVED MODAL DISPLAY -->
                    @include('partials.prompt_window', [
                    'modal_id' => 'approvedModal_'.$appointment->id,
                    'aria_label' => 'approvedModalLabel',
                    'modal_title' => 'Appointment Approval',
                    'modal_body' => 'DO YOU WANT TO APPROVE THIS APPOINTMENT ?',
                    'id' => $appointment->id,
                    'route_name' => "/update_Status/".$appointment->id
                    ])

                </td>
            </tr>
        @endif

        @endforeach
    </tbody>
</table>



<script>
     $('#admin_table').DataTable();
</script>