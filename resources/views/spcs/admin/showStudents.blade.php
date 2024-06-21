@extends('layouts.app')
@section('content')

<div class="block-header">
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12">
            <h2>Students List</h2>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i></a></li> 
                <li class="breadcrumb-item">Students</li>                           
            </ul>
        </div>
    </div>
</div>

<div class="row clearfix row-deck my-5"> 
    <div class="col-lg-12">
        <div class="card" style="border: 1px solid rgb(203, 202, 202);">
            <div class="header">
                <h2 class="text-muted"><b>Student list</b></h2>
            </div>
            <div class="body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover dataTable js-exportable table table-hover mb-0 c_list">
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
                                    <td> <a href="{{ route('admin-show-student-details', ['id' => $details->id]) }}">{{ $details->user->name }} <i class="fa fa-level-up"></i></a></td>
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



