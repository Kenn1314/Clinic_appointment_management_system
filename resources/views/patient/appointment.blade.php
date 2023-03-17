@extends('layouts.app')

@section('content')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Make an Appointment') }}</div>

                    <div class="card-body">
                        <form action="/patient/make-appointment" method="POST">
                            @csrf
                            <div class="form-group row">
                                <label for="doctor_id"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Doctor Name') }}</label>
                                <div class="col-md-6">
                                    <input id="doctor_id" type="hidden" class="form-control" name="doctor_id"
                                        value="{{ $doctors['id'] }}" >
                                        <input id="doctor_name" type="text" class="form-control" name="doctor_name"
                                        value="{{ $doctors['name'] }}" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="appointment_date"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Appointment Date') }}</label>
                                <div class="col-md-6">
                                    <div class='input-group date' id='datetimepicker'>
                                        <input type='date' class="form-control" name="appointment_date" min="{{ date('Y-m-d', strtotime('tomorrow')) }}" value="{{ date('Y-m-d', strtotime('tomorrow')) }}"/>
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="time_test"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Appointment Time') }}</label>
                                <div class="col-md-6">

                                    <select class="form-control" name="time" id="time_test" required>
                                        <option value="">Select a time slot</option>
                                    </select>

                                </div>
                            </div>
                            {{-- <button type="submit">Create appointment</button> --}}
<br/>
                            <div class="form-group row text-center">
                              <div class="col-md-12">
                                  <button type="submit" class="btn btn-primary" onclick="return confirm('Are you sure you want to create this appointment?')">{{ __('Create appointment') }}</button>
                              </div>
                          </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(function() {
            function updateAppointmentTimes() {
                var appo = @json($appointments);
                var time_fixed = ['08:00am', '09:00am', '10:00am', '11:00am', '12:00pm', '13:00pm', '14:00pm',
                    '15:00pm','16:00pm','17:00pm'
                ];
                var selectedDate = $('input[name="appointment_date"]').val();
                console.log(selectedDate);
                console.log(appo.length);
                for (var i = 0; i < appo.length; i++) {
                    console.log(appo[i].date);
                    if (appo[i].date.toString() == selectedDate.toString()) {
                        console.log(appo[i].date)
                        var timeSlot = appo[i].time;
                        var index = time_fixed.indexOf(timeSlot);
                        if (index !== -1) {
                            time_fixed.splice(index, 1);
                        }
                    }
                }
                var select = document.getElementById("time_test");
                select.innerHTML = "";
                for (var i = 0; i < time_fixed.length; i++) {
                    var option = document.createElement("option");
                    option.text = time_fixed[i];
                    select.appendChild(option);
                }
            }

            $(document).ready(function() {
                updateAppointmentTimes();
            });
            $('#datetimepicker').on('dp.show', function(e) {
                updateAppointmentTimes();
            });

            $('#datetimepicker').on('dp.change', function(e) {
                updateAppointmentTimes();
            });

            $('input[name="appointment_date"]').on('input', function() {
                updateAppointmentTimes();
            });

            $('select[name="doctor_id"]').change(function() {
                $('input[name="appointment_date"]').val('');
                $('#time_test').empty();
            });
        });
    </script>
@endsection
