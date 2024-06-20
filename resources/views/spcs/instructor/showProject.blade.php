@extends('layouts.app')
@section('content')
<div class="block-header">
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12">
            <h2>Project Details</h2>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i></a></li> 
                <li class="breadcrumb-item">Project</li>                           
                <li class="breadcrumb-item">{{ $projectDetails->name }}</li>
            </ul>
        </div>
        
        @if ($userRole == 'instructor')
        <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="d-flex flex-row-reverse">
                <div class="page_action">
                    <a href="{{ route('instructor-add-task', ['id' => $projectDetails->id]) }}" class="btn btn-primary"><i class="fa fa-plus"></i> Add a task</a>
                    <a href="{{ route('instructor-edit-project', ['id' => $projectDetails->id]) }}" class="btn btn-warning"><i class="fa fa-edit"></i> Edit Project</a>
                </div>
                <div class="p-2 d-flex">
                    
                </div>
            </div>
        </div>
        @endif
    </div>
</div>

<div class="card" style="border: 1px solid rgb(203, 202, 202)">
        <div class="mail-inbox">
            <div class="mail-left collapse" id="email-nav">
                <div class="mail-compose m-b-20">
                    {{-- <form action="{{ route('instructor-delete-project', ['id' => $projectDetails->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <btn class="btn btn-danger btn-block js-sweetalert" id="project_delete" data-type="cancel" data-id="{{ $projectDetails->id }}"><i class="fa fa-warning"></i> Delete Project</btn>
                    </form> --}}

                    <btn class="btn btn-danger btn-block" id="project_delete" data-type="cancel" data-id="{{ $projectDetails->id }}"><i class="fa fa-warning"></i> Delete Project</btn>
                </div>
                <hr>
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
                                        <div class="pb-2 d-flex">
                                            <label for="Name"><b>Days Remaining : </b></label>
                                            <p class="pl-2">{{ $projectDetails->days_remaining }}</p>
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
                                        <div class="pb-2 d-flex">
                                            <label for="Name"><b>Due Date : </b></label>
                                            <p class="pl-2">{{ $projectDetails->due_date }}</p>
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
                                                    <td class="scope"> <a href="{{ route('instructor-show-student', ['id' => $student->id]) }}">{{ $student->user->name }} <i class="fa fa-level-up"></i></a></td>
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
                                <form action="" method="post">
                                    @csrf
                                    @method('POST')
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
                                                        <th>Due date</th>
                                                        <th>Time remaining</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($projectTasks as $task)
                                                    <tr>
                                                        <td class="scope"><a href="{{ route('instructor-edit-task', ['id' => $task->id, 'projectId' => $task->project_id]) }}">{{ $task->task_name }} <i class="fa fa-level-up"></i></a></td>
                                                        <td>{{ $task->task_description }}</td>
                                                        <td>{{ $task->task_status == 'C' ? 'Closed' : ($task->task_status == 'P' ? 'Pending' : 'In progress') }}</td>
                                                        <td>{{ $task->task_url == NULL ? 'No' : 'Yes | '}}
                                                            @if ($task->task_url != NULL)
                                                            <a href="{{ $task->task_url }}" target="_blank"> <i class="fa fa-download"></i> Download</a> 
                                                            @endif
                                                        </td>
                                                        <td>{{ $task->created_at }}</td>
                                                        <td>{{ $task->task_due_date }}</td>
                                                        <td>{{ $task->days_remaining }} days</td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </form>
                                <hr>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('contentScripts')
    <script>
        $("#project_delete").on('click', function () {
            var id = $(this).data("id");
            console.log(id);
            swal({
                title: "Are you sure?",
                text: "You are about to delete this project",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#dc3545",
                confirmButtonText: "Yes, Continue with deletion!",
                cancelButtonText: "No, Cancel!",
                closeOnConfirm: false,
                closeOnCancel: false
            }, function (isConfirm) {
                if (isConfirm) {
                    console.log(id);
                    $.ajax({
                        type: "POST",
                        url: "{{ route('instructor-delete-project', ['id' => ""]) }}" + '/' + id,
                        data: {
                            _token: "{{ csrf_token() }}",
                        },
                        success: function (response) {
                            swal("Deleted!", "The project was deleted", "success");
                            setTimeout(() => {
                                window.location.href = "{{ route('instructor-dashboard') }}";   
                            }, 2000);
                        }
                    });
                } else {
                    swal("Cancelled", "Deletion failed", "error");
                }
            });
        });
    </script>
@endsection