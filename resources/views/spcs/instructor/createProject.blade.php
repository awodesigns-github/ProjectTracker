@extends('layouts.app')
@section('content')
<div class="block-header">
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12">
            <h2>Add Project / Single Entry</h2>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="d-flex flex-row-reverse">
                
                {{--  --}}
                <div class="p-2 d-flex">
                    
                </div>
                {{--  --}}

            </div>
        </div>
    </div>
</div>

{{-- Section 2 --}}

{{-- 

Details to capture
Project name
Description
Status
Module



--}}

<div class="body">
    <form action="#" id="wizard_with_validation" method="POST">
        @csrf
        @method("POST")
        <h2><i class="icon-plus"></i> Add Instructor details</h2>
        <section style="min-height: 60vh; max-height: 80vh;">
            
            <h6><b>Project Details</b></h6>
            <hr>

            <div class="input-group pb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-user"></i></span>
                </div>
                <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Project's full name..." value="{{ old('name')}}" style="border: 1px solid rgb(216, 213, 213);">
            </div>
            @error('name')
                <small class="text-danger">{{ $message }}</small>
            @enderror

            <div class="input-group pb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                </div>
                <input type="text" name="description" class="form-control @error('description') is-invalid @enderror" value="{{ old('description') }}" placeholder=" Project's description ... " style="border: 1px solid rgb(216, 213, 213);">
            </div>

            <div class="pb-3 c_multiselect">
                <select name="campus_id" class="form-control unique-dropdown multiselect multiselect-custom @error('status') is-invalid @enderror" style="border: 1px solid rgb(216, 213, 213);">
                    <option disabled selected>Assign Status</option>
                </select>
            </div>
            @error('status')
            <small class="text-danger">{{ $message }}</small>
            @enderror

            <div class="pb-3 c_multiselect">
                <select name="module_id" class="form-control unique-dropdown multiselect multiselect-custom @error('module_id') is-invalid @enderror" style="border: 1px solid rgb(216, 213, 213);">
                    <option disabled selected>Assign to a Module</option>
                </select>
            </div>
            @error('module_id')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </section>
    </form>

</div>
@endsection