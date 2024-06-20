@extends('layouts.app')
@section('content')

<div class="block-header">
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12">
            <h2>{{ $module->name }}</h2>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i></a></li> 
                <li class="breadcrumb-item">{{ $module->name }} projects</li>                           
            </ul>
        </div>
        {{-- <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="d-flex flex-row-reverse">
                <div class="page_action">
                    <a href="{{ route('instructor-create-project') }}" class="btn btn-primary"><i class="fa fa-cube"></i> Create a new Project</a>
                </div>
                <div class="p-2 d-flex">
                    
                </div>
            </div>
        </div> --}}
    </div>
</div>

<div class="row clearfix row-deck my-5"> 
    <div class="col-lg-12">
        <div class="card" style="border: 1px solid rgb(203, 202, 202);">
            <div class="header">
                <h2 class="text-muted"><b>Projects list</b></h2>
            </div>
            <div class="body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover dataTable js-exportable table table-hover mb-0 c_list">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Created At</th>
                                <th>Due date</th>
                                <th>Time Remaining</th>
                            </tr>
                        </thead>
                        <tbody id="tbody">
                            @foreach ($projects as $project)
                            <tr>
                                <td><a href="{{ route('student-projects', ['id' => $project->id]) }}">{{ $project->name }}<i class="fa fa-level-up"></i></a></td>
                                <td>{{ $project->description }}</td>
                                <td>{{ $project->created_at }}</td>
                                <td>{{ $project->due_date }}</td>
                                <td>{{ $project->days_remaining }}</td>
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