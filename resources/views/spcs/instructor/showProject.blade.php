@extends('layouts.app')
@section('content')
<div class="block-header">
    <div class="row align-items-center">
        <div class="col-lg-6 col-md-6 col-sm-12">
            <h2>Project Details</h2>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i></a></li> 
                <li class="breadcrumb-item">Project</li>                           
                <li class="breadcrumb-item">{{ $projectDetails->name }}</li>
            </ul>
        </div>
    </div>
</div>

<div class="card" style="border: 1px solid rgb(203, 202, 202)">
        <div class="mail-inbox">
            <div class="mail-left collapse" id="email-nav">
                <div class="mail-side" id="preCheck">
                    <ul  class="nav nav-tabs-new list-unstyled">
                        <li class="nav-item"><a class="nav-link show active" data-toggle="tab" href="#details"><b>Project Information</b></a></li>
                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#tasks"><b>Tasks</b></a></li>
                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#students"><b>Assigned to</b></a></li>
                    </ul>
                </div>
            </div>
            
            <div class="mail-right">
                <div class="card" style="border: 0px">
                    <div class="header">
                        <h2 class="text-bold d-flex justify-content-between"></h2>
                    </div>
                    <div class="body">
                        <div class="tab-content">
                            <div class="tab-pane active" id="details">
                                <h4>Details</h4>
                                <hr>
                                <div class="pb-4"></div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="pb-2 d-flex">
                                            <label for="Name"><b>Name : </b></label>
                                            <p class="pl-2">{{ $projectDetails->name }}</p>
                                        </div>
                                        <div class="pb-2 d-flex">
                                            <label for="Name"><b>Description : </b></label>
                                            <p class="pl-2">{{ $projectDetails->description }}</p>
                                        </div>
                                        <div class="pb-2 d-flex">
                                            <label for="Name"><b>Created On : </b></label>
                                            <p class="pl-2">{{ $projectDetails->created_at }}</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="pb-2 d-flex">
                                            <label for="Name"><b>Status : </b></label>
                                            <p class="pl-2">{{ $projectDetails->status == 'O' ? 'Open' : 'Closed' }}</p>
                                        </div>
                                        <div class="pb-2 d-flex">
                                            <label for="Name"><b>Module : </b></label>
                                            <p class="pl-2">{{ $projectDetails->module->name }}</p>
                                        </div>
                                        <div class="pb-2 d-flex">
                                            <label for="Name"><b>Updated On : </b></label>
                                            <p class="pl-2">{{ $projectDetails->updated_at }}</p>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                            </div>
                            
                            <div class="tab-pane" id="students">
                                <h4>Project Assigned To</h4>
                                <hr>
                                <div class="row">
                                    <div class="body table-responsive">
                                        <table class="table table-bordered table-striped table-hover dataTable js-exportable table table-hover mb-0 c_list">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Registration #</th>
                                                    <th>Email</th>
                                                    <th>Contact Info.</th>
                                                    <th>Emergency contact Info.</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($projectStudents as $student)
                                                <tr>
                                                    <td class="scope">{{ $student->user->name }}</td>
                                                    <td>{{ $student->registration_number }}</td>
                                                    <td>{{ $student->user->email }}</td>
                                                    <td>{{ $student->user->primary_phone_number }}</td>
                                                    <td>{{ $student->user->secondary_phone_number }}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <hr>
                            </div>

                            <div class="tab-pane" id="tasks">
                                <h4>Tasks</h4>
                                <hr>
                                <div class="row">
                                    <div class="body table-responsive">
                                        <table class="table table-bordered table-striped table-hover dataTable js-exportable table table-hover mb-0 c_list">
                                            <thead>
                                                <tr>
                                                    <th>Tasks</th>
                                                    <th>Description</th>
                                                    <th>Status</th>
                                                    <th>Has attachment</th>
                                                    <th>Created At</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($projectTasks as $task)
                                                <tr>
                                                    <td class="scope">{{ $task->task_name }}</td>
                                                    <td>{{ $task->task_description }}</td>
                                                    <td>
                                                        @if ($task->status == 'C')
                                                            Completed    
                                                        @elseif ($task->status == 'P')
                                                            Pending
                                                        @else
                                                            In Progress
                                                        @endif
                                                    </td>
                                                    <td>{{ ($task->task_url == NULL || $task->task_url) == 'null' ? 'No' : 'Yes'}}</td>
                                                    <td>{{ $task->created_at }}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <hr>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection