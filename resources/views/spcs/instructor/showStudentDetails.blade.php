@extends('layouts.app')
@section('content')
<div class="block-header">
    <div class="row align-items-center">
        <div class="col-lg-6 col-md-6 col-sm-12">
            <h2>Student Profile</h2>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i></a></li> 
                <li class="breadcrumb-item">Students</li>                           
                <li class="breadcrumb-item">{{ $studentDetails->user->name }}</li>
                <li class="breadcrumb-item">Profile</li>
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
                            @if ($studentDetails->user->sex == 'M')
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
                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#recent_activity"><b>Recent Activity</b></a></li>
                    </ul>
                </div>
            </div>
            
            <div class="mail-right">
                {{-- @include('components.subLeftHandBar.subHeader') --}}
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
                                            <p class="pl-2">{{ $studentDetails->user->name }}</p>
                                        </div>
                                        <div class="pb-2 d-flex">
                                            <label for="Name"><b>Email : </b></label>
                                            <p class="pl-2">{{ $studentDetails->user->email }}</p>
                                        </div>
                                        <div class="pb-2 d-flex">
                                            <label for="Name"><b>Github : </b></label>
                                            <p class="pl-2"><a href="https://www.github.com/{{ $studentDetails->github_username }}" target="_blank">github.com/{{ $studentDetails->github_username }}</a></p>
                                        </div>
                                        <div class="pb-2 d-flex">
                                            <label for="Name"><b>Contacts Info. : </b></label>
                                            <p class="pl-2">{{ $studentDetails->user->primary_phone_number }}</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="pb-2 d-flex">
                                            <label for="Name"><b>Cohort : </b></label>
                                            <p class="pl-2">{{ $studentDetails->cohort->name }}</p>
                                        </div>
                                        <div class="pb-2 d-flex">
                                            <label for="Name"><b>Team : </b></label>
                                            <p class="pl-2">{{ $studentDetails->team->name }}</p>
                                        </div>
                                        <div class="pb-2 d-flex">
                                            <label for="Name"><b>Registration Number : </b></label>
                                            <p class="pl-2">{{ $studentDetails->registration_number }}</p>
                                        </div>
                                        <div class="pb-2 d-flex">
                                            <label for="Name"><b>Emergency Contact Info. : </b></label>
                                            <p class="pl-2">{{ $studentDetails->user->secondary_phone_number }}</p>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                            </div>
                            
                            <div class="tab-pane" id="recent_activity">
                                <h4>Projects</h4>
                                <hr>
                                <div class="row">
                                    <div class="body table-responsive">
                                        <table class="table table-bordered table-striped table-hover dataTable js-exportable table table-hover mb-0 c_list">
                                            <thead>
                                                <tr>
                                                    <th>Projects</th>
                                                    <th>Pull Requests</th>
                                                    <th>Pushes</th>
                                                    <th>Pulls</th>
                                                    <th>Issues</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="scope">#</td>
                                                    <td>N/A</td>
                                                    <td>N/A</td>
                                                    <td>N/A</td>
                                                    <td>N/A</td>
                                                </tr>
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