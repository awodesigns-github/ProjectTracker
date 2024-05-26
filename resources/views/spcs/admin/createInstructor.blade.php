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
<div class="body">
    <form action="#" id="wizard_with_validation" method="POST">
        @csrf
        @method("POST")
        <h2><i class="icon-plus"></i> Add Instructor details</h2>
        <section style="min-height: 60vh; max-height: 80vh;">
            
            <h6><b>Personal Details</b></h6>
            <hr>
            <div class="pb-2">
                <div>
                    <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Instructor full name" value="{{ old('name')}}" style="border: 1px solid rgb(216, 213, 213);">
                </div>
            </div>

            {{-- DoB, Gender, Nationality, Marital status, Home address, Phone number (Home and Mobile), 
                Emergency Contacts(name, relationship, phone number), 
                
                Identification Information (SSN, Passport Number, Driver's Licence), 
                
                
                --}}

            @error('name')
                <small class="text-danger">{{ $message }}</small>
            @enderror
            <div class="pb-2 d-flex justify-content-between">
                @if ($variable == "Server")
                <div>
                    <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="email" style="border: 1px solid rgb(216, 213, 213);">
                </div>
                @endif
                <div>
                    <input type="text" name="employee_Id" class="form-control @error('employee_Id') is-invalid @enderror" value="{{ old('employee_Id') }}" style="border: 1px solid rgb(216, 213, 213);">
                </div>
                <div>
                    <input type="text" name="github_username" class="form-control @error('serial_number') is-invalid @enderror" value="{{ old('github_username') }}" placeholder="github username e.g: mygithub" style="border: 1px solid rgb(216, 213, 213);">
                </div>
            </div>
            <div class="pb-2 c_multiselect">
                <select name="campus_id" class="form-control unique-dropdown multiselect multiselect-custom @error('campus_id') is-invalid @enderror" style="border: 1px solid rgb(216, 213, 213);">
                    <option disabled selected>Assign Campus</option>
                </select>
            </div>
            @error('campus_id')
            <small class="text-danger">{{ $message }}</small>
            @enderror

            <div class="pb-2 c_multiselect">
                <select name="cohort_id" class="form-control unique-dropdown multiselect multiselect-custom @error('cohort_id') is-invalid @enderror" style="border: 1px solid rgb(216, 213, 213);">
                    <option disabled selected>Assign Cohort</option>
                </select>
            </div>
            @error('cohort_id')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </section>

        {{-- Upload a Verified letter from the HR + the letter number + HR details --}}

        {{-- Upload the instructor's picture (passport size), social security details e.g NIDA, Birth certificate --}}
    </form>

</div>
@endsection