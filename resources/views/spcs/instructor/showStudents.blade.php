@extends('layouts.app')
@section('content')
<div class="row clearfix row-deck my-5"> 
    <div class="col-lg-12">
        <div class="card" style="border: 1px solid rgb(203, 202, 202);">
            <div class="header">
                <h2 class="text-muted"><b>Filter</b></h2>
            </div>
            <div class="body">
                <form action="" method="POST">
                    @csrf
                    @method("POST")
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="pb-2">
                                <div class="c_multiselect">
                                    <label for="cohort_filter"><b>By Cohort</b></label>
                                    <select name="cohort_id" id="cohort_filter" class="form-control unique-dropdown multiselect multiselect-custom" style="border: 1px solid rgb(216, 213, 213);">
                                        <option disabled selected>Available Cohorts</option>
                                        @foreach ($studentDetails as $cohorts)
                                            <option value="{{ $cohorts->cohort->id }}">{{ $cohorts->cohort->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="pb-2">
                                <div class="c_multiselect">
                                    <label for="team_filter"><b>By Teams</b></label>
                                    <select name="team_id" id="team_filter" class="form-control unique-dropdown multiselect multiselect-custom" style="border: 1px solid rgb(216, 213, 213);">
                                        <option disabled selected>Available Teams</option>
                                        @foreach ($studentDetails as $teams)
                                            <option value="{{ $teams->team->id }}">{{ $teams->team->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="card" style="border: 1px solid rgb(203, 202, 202);">
            <div class="header">
                <h2 class="text-muted"><b>Student list</b></h2>
            </div>
            <div class="body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover dataTable table table-hover mb-0 c_list">
                        <thead>
                            <th>Name</th>
                            <th>Registration</th>
                            <th>Github username</th>
                            <th>Cohort</th>
                            <th>Course</th>
                            <th>Team</th>
                        </thead>
                        <tbody id="tbody">
                            @foreach ($studentDetails as $details)
                                <tr>
                                    <td>{{ $details->user->name }}</td>
                                    <td>{{ $details->cohort->name }}-{{ $details->registration_number }}</td>
                                    <td>{{ $details->github_username }}</td>
                                    <td>{{ $details->cohort->name }}</td>
                                    <td>{{ $details->course->name }}</td>
                                    <td>{{ $details->team->name }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('contentScripts')
<script>
    $(document).ready(function () {
        $('.unique-dropdown').multiselect({
            enableFiltering: true,
            enableCaseInsensitiveFiltering: true,
            maxHeight: 200
        });

        $('.form-control').on('change', function () {
            var cohortData = $('#cohort_filter').val();
            var teamData = $('#team_filter').val();
            
            $.ajax({
                type: "GET",
                url: "{{ route('instructor-sorted-students') }}",
                data: {
                    _token: "{{ csrf_token() }}",
                    cohort: cohortData,
                    team: teamData,
                },
                success: function (response) {
                    var studentData = response.data;
                    var html = '';
                    
                    studentData = Object.values(studentData);

                    console.log(studentData);

                    if (studentData.length > 0) {
                        for (let i = 0; i < studentData.length; i++) {
                            html += '<tr>\
                                    <td>' + studentData[i].user.name  + '</td>\
                                    <td>' + studentData[i].cohort.name + '-' + studentData[i]['registration_number'] + '</td>\
                                    <td>' + studentData[i]['github_username'] + '</td>\
                                    <td>' + studentData[i].cohort.name + '</td>\
                                    <td>' + studentData[i].course.name + '</td>\
                                    <td>' + studentData[i].team.name + '</td>\
                                    </tr>';
                        }
                    } else {
                        html += '<tr><td colspan="6" class="text-center">No data found</td></tr>';
                    }
                    $('#tbody').html(html);
                }
            });
        });
        
    });
</script>    
@endsection


