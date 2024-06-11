@extends('layouts.app')
@section('content')
<div class="block-header">
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12">
            <h2>Add Instructor / Single Entry</h2>
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

IDEA: Only create the project forms, the instructor and student registration form will be created last

Details to capture

Instructor name -- Done
email address -- Done
DoB
Employee Id -- Auto generated
Cohort -- Auto generated
Nationality -- Done
Martial status
Home address
Primary phone number
Aux phone number
Emergency contact name
Emergency contact phone number
Emergency contact relationship
Social Security Number
Passport number
Driver's license ... DOCUMENT
github username

--}}

<div class="body">
    <form action="#" id="wizard_with_validation" method="POST">
        @csrf
        @method("POST")
        <h2><i class="icon-plus"></i> Add Instructor details</h2>
        <section style="min-height: 60vh; max-height: 80vh;">
            
            <h6><b>Personal Details</b></h6>
            <hr>

            <div class="input-group pb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-user"></i></span>
                </div>
                <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Your full name..." value="{{ old('name')}}" style="border: 1px solid rgb(216, 213, 213);">
            </div>
            @error('name')
                <small class="text-danger">{{ $message }}</small>
            @enderror

            <div class="input-group pb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                </div>
                <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder=" email e.g: example@email.com " style="border: 1px solid rgb(216, 213, 213);">
            </div>

            <div class="input-group pb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-map-marker-alt"></i></span>
                </div>
                <input type="text" name="home_address" class="form-control @error('home_address') is-invalid @enderror" value="{{ old('home_address') }}" placeholder="home address e.g: Arusha, Tanzania" style="border: 1px solid rgb(216, 213, 213);">
            </div>

            <div class="input-group pb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-map"></i></span>
                </div>
                <input type="text" name="nationality" class="form-control @error('nationality') is-invalid @enderror" value="{{ old('nationality') }}" placeholder="e.g: Tanzanian" style="border: 1px solid rgb(216, 213, 213);">
            </div>

            <div class="pb-3 c_multiselect">
                <select name="campus_id" class="form-control unique-dropdown multiselect multiselect-custom @error('campus_id') is-invalid @enderror" style="border: 1px solid rgb(216, 213, 213);">
                    <option disabled selected>Assign Campus</option>
                </select>
            </div>
            @error('campus_id')
            <small class="text-danger">{{ $message }}</small>
            @enderror

            <div class="pb-3 c_multiselect">
                <select name="marital_status" class="form-control unique-dropdown multiselect multiselect-custom @error('marital_status') is-invalid @enderror" style="border: 1px solid rgb(216, 213, 213);">
                    <option disabled selected>Marital status</option>
                </select>
            </div>
            @error('campus_id')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </section>

        {{-- Upload a Verified letter from the HR + the letter number + HR details --}}

        {{-- Upload the instructor's picture (passport size), social security details e.g NIDA, Birth certificate --}}
    </form>

</div>
@endsection