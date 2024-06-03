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
                                    <label for="status"><b>By Module</b></label>
                                    <select name="status" id="status_field" class="form-control unique-dropdown multiselect multiselect-custom" style="border: 1px solid rgb(216, 213, 213);">
                                        <option disabled selected>Choose a module</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="pb-2">
                                <div class="c_multiselect">
                                    <label for="status"><b>By Cohort</b></label>
                                    <select name="status" id="status_field" class="form-control unique-dropdown multiselect multiselect-custom" style="border: 1px solid rgb(216, 213, 213);">
                                        <option disabled selected>Choose a Cohort</option>
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
                        <tbody>
                            @foreach ($studentDetails as $details)
                                <tr>
                                    <td>N/A</td>
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

        
    });
</script>    
@endsection