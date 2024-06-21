@extends('layouts.app')
@section('content')
<div class="block-header">
    <div class="row align-items-center">
        <div class="col-lg-6 col-md-6 col-sm-12">
            <h2>Student Profile</h2>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i></a></li> 
                <li class="breadcrumb-item">Student</li>                           
                <li class="breadcrumb-item">Student details</li>
            </ul>
        </div>
    </div>
</div>

<div class="card" style="border: 1px solid rgb(203, 202, 202)">
        <div class="mail-inbox">
            <div class="mail-left collapse" id="email-nav">
                <div class="mail-compose m-b-20">
                    <div class="page_action">
                        <div class="d-flex flex-row-reverse">
                            @if ($student->user->sex == 'M')
                            <img src="{{ asset('assets/logo/avt.jpeg') }}" class="user-photo" style="width:100%; height:100%;" alt="User">
                            @else
                            <img src="{{ asset('assets/logo/avt2.jpg') }}" class="user-photo" style="width:100%; height:100%;" alt="User">
                            @endif
                        </div>
                    </div>
                    <hr class="my-2">
                </div>
                <div class="mail-side" id="preCheck">
                    <ul  class="nav nav-tabs-new list-unstyled">
                        <li class="nav-item"><a class="nav-link show active" data-toggle="tab" href="#details"><b>General Information</b></a></li>
                    </ul>
                </div>
            </div>
            
            <div class="mail-right">
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
                                            <p class="pl-2">{{ $student->user->name }}</p>
                                        </div>
                                        <div class="pb-2 d-flex">
                                            <label for="Name"><b>Email : </b></label>
                                            <p class="pl-2">{{ $student->user->email }}</p>
                                        </div>
                                        <div class="pb-2 d-flex">
                                            <label for="Name"><b>Github : </b></label>
                                            <p class="pl-2"><a href="https://www.github.com/{{ $student->github_username }}" target="_blank">github.com/{{ $student->github_username }}</a></p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="pb-2 d-flex">
                                            <label for="Name"><b>Phone Number : </b></label>
                                            <p class="pl-2">{{ $student->user->primary_phone_number }}</p>
                                        </div>
                                        <div class="pb-2 d-flex">
                                            <label for="Name"><b>Campus : </b></label>
                                            <p class="pl-2">{{ $student->campus->name }}</p>
                                        </div>
                                        <div class="pb-2 d-flex">
                                            <label for="Name"><b>Registered On : </b></label>
                                            <p class="pl-2">{{ $student->user->created_at }}</p>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="pb-2 d-flex">
                                            <label for="Name"><b>Nationality : </b></label>
                                            <p class="pl-2">{{ $student->user->nationality }}</p>
                                        </div>
                                        <div class="pb-2 d-flex">
                                            <label for="Name"><b>Marital status : </b></label>
                                            <p class="pl-2">{{ $student->user->marital_status }}</p>
                                        </div>
                                        <div class="pb-2 d-flex">
                                            <label for="Name"><b>Emergency Contact : </b></label>
                                            <p class="pl-2">{{ $student->user->emergency_contact_name }}</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="pb-2 d-flex">
                                            <label for="Name"><b>Phone Number : </b></label>
                                            <p class="pl-2">{{ $student->user->primary_phone_number }}</p>
                                        </div>
                                        <div class="pb-2 d-flex">
                                            <label for="Name"><b>Auxiliary phone number : </b></label>
                                            <p class="pl-2">{{ $student->user->secondary_phone_number }}</p>
                                        </div>
                                        <div class="pb-2 d-flex">
                                            <label for="Name"><b>Emergency Contact Phone Number: </b></label>
                                            <p class="pl-2">{{ $student->user->emergency_contact_phone_number }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection