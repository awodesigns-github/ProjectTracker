@extends('layouts.app')
@section('content')
<div class="block-header">
    <div class="row align-items-center">
        <div class="col-lg-6 col-md-6 col-sm-12">
            <h2>Edit Project</h2>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i></a></li> 
                <li class="breadcrumb-item">Projects</li>
                <li class="breadcrumb-item">{{ $projectDetails->name }}<li>
                <li class="breadcrumb-item">Tasks</li>   
                <li class="breadcrumb-item">{{ $task->task_name }}</li>                        
                <li class="breadcrumb-item">Edit</li>
            </ul>
        </div>
    </div>
</div>

{{-- Section 2 --}}

<div class="body">
    <form action="{{ route('instructor-store-edit-task', ['id' => $task->id]) }}" id="wizard_with_validation" method="POST" enctype="multipart/form-data">
        @csrf
        @method("PATCH")
        <h2><i class="icon-plus"></i> Edit Task details</h2>
        <section style="min-height: 60vh; max-height: 60vh;">
            <h6><b>File upload</b></h6>
            <hr>
            <div class="input-group pb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-cube"></i></span>
                </div>
                <input name="task_name" type="text" class="form-control @error('task_name') is-invalid @enderror" placeholder="Task's full name..." value="{{ $task->task_name }}" style="border: 1px solid rgb(216, 213, 213);">
            </div>
            <div class="input-group pb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-pencil-square-o"></i></span>
                </div>
                <textarea name="task_description" class="form-control @error('task_description') is-invalid @enderror" value="{{ old('task_description') }}" placeholder=" Task's description ... " style="border: 1px solid rgb(216, 213, 213);" aria-label="With textarea">{{ $task->task_description }}</textarea>
            </div>
            <div class="row-clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2>Upload a task file <small>only pdf is allowed</small><small><b>(Leave blank for no changes)</b></small></h2>
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
                                <input type="file" class="dropify" name="task_file" value="{{ $task->task_url }}">
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