@extends('layouts.app')
@section('content')
<div class="block-header">
    <div class="row align-items-center">
        <div class="col-lg-6 col-md-6 col-sm-12">
            <h2>Add a Task</h2>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i></a></li> 
                <li class="breadcrumb-item">Projects</li>
                <li class="breadcrumb-item">{{ $projectName }}</li>                           
                <li class="breadcrumb-item">create a task</li>
            </ul>
        </div>
    </div>
</div>

{{-- Section 2 --}}

{{-- 

Details to capture
task name
task Description
Status
Project Id 
Upload a task

--}}

<div class="body">
    <form action="{{ route('instructor-store-task') }}" id="wizard_with_validation" method="POST" enctype="multipart/form-data">
        @csrf
        @method("POST")
        <h2><i class="icon-plus"></i> Add Task details</h2>
        <section style="min-height: 60vh; max-height: 60vh;">
            
            <h6><b>Task Details</b></h6>
            <hr>
            <div class="input-group pb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-cube"></i></span>
                </div>
                <input name="task_name" type="text" class="form-control @error('task_name') is-invalid @enderror" placeholder="Task's full name..." value="{{ old('name')}}" style="border: 1px solid rgb(216, 213, 213);">
            </div>
            @error('task_name')
                <small class="text-danger">{{ $message }}</small>
            @enderror

            <div class="input-group pb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-pencil-square-o"></i></span>
                </div>
                <textarea name="task_description" class="form-control @error('task_description') is-invalid @enderror" value="{{ old('task_description') }}" placeholder=" Task's description ... " style="border: 1px solid rgb(216, 213, 213);" aria-label="With textarea"></textarea>
            </div>
            <div class="pb-3 c_multiselect">
                <select name="task_status" class="form-control unique-dropdown multiselect multiselect-custom @error('task_status') is-invalid @enderror" style="border: 1px solid rgb(216, 213, 213);">
                    <option disabled selected>Assign a status</option>
                    <option value="C">Closed</option>
                    <option value="I">In progress</option>
                    <option value="O">Open</option>
                </select>
            </div>

            {{-- <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                </div>
                <input type="text" class="form-control datetime" placeholder="Assign due date format: 2024/06/20 23:59" data-date-format="Y-m-d H:i:s" name="due_date">
            </div> --}}

            {{-- Autofill Project --}}
            <input name="project_id" type="text" class="form-control" value="{{ $projectId }}" hidden>

            <div class="row-clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2>Upload a task file <small>only pdf is allowed</small></h2>
                        </div>
                        <div class="body">
                            <div class="dropify-wrapper">
                                <div class="dropify-message">
                                    <span class="file-icon"> <p>Drag and drop a file here or click</p></span>
                                    <p class="dropify-error">Ooops, something wrong appended.</p>
                                </div>
                                <div class="dropify-loader"></div>
                                <div class="dropify-errors-container">
                                    <ul></ul>
                                </div>
                                <input type="file" class="dropify" name="task_file">
                                <button type="button" class="dropify-clear">Remove</button>
                                <div class="dropify-preview">
                                    <span class="dropify-render"></span>
                                    <div class="dropify-infos">
                                        <div class="dropify-infos-inner">
                                            <p class="dropify-filename">
                                                <span class="file-icon"></span> 
                                                <span class="dropify-filename-inner"></span>
                                            </p>
                                            <p class="dropify-infos-message">
                                                Drag and drop or click to replace
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </form>

</div>
@endsection