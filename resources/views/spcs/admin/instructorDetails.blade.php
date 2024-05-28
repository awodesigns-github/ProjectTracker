@extends('layouts.app')
@section('content')
<div class="block-header">
    <div class="row align-items-center">
        <div class="col-lg-6 col-md-6 col-sm-12">
            <h2>Instructor</h2>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i></a></li> 
                <li class="breadcrumb-item">Instructor</li>                           
                <li class="breadcrumb-item">Instructor details</li>
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
                            <img src="{{ asset('assets/logo/avt.jpeg') }}" class="user-photo" style="width:100%; height:100%;" alt="User">
                        </div>
                    </div>
                    <hr class="my-2">
                </div>
                <div class="mail-side" id="preCheck">
                    <ul  class="nav nav-tabs-new list-unstyled">
                        <li class="nav-item"><a class="nav-link show active" data-toggle="tab" href="#details"><b>General Information</b></a></li>
                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#projects"><b>Projects</b></a></li>
                    </ul>
                </div>
            </div>
            
            <div class="mail-right">
                @include('components.subLeftHandBar.subHeader')
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
                                            <p class="pl-2">{{ $instructor->user->name }}</p>
                                        </div>
                                        <div class="pb-2 d-flex">
                                            <label for="Name"><b>Email : </b></label>
                                            <p class="pl-2">{{ $instructor->user->email }}</p>
                                        </div>
                                        <div class="pb-2 d-flex">
                                            <label for="Name"><b>Github : </b></label>
                                            <p class="pl-2">github.com/{{ $instructor->github_username }}</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="pb-2 d-flex">
                                            <label for="Name"><b>Phone Number : </b></label>
                                            <p class="pl-2">{{ $instructor->phone_number }}</p>
                                        </div>
                                        <div class="pb-2 d-flex">
                                            <label for="Name"><b>Campus : </b></label>
                                            <p class="pl-2">{{ $instructor->campus->name }}</p>
                                        </div>
                                        <div class="pb-2 d-flex">
                                            <label for="Name"><b>Registered On : </b></label>
                                            <p class="pl-2">{{ $instructor->user->created_at }}</p>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                            </div>
                            
                            <div class="tab-pane" id="projects">
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
                                                @foreach ($instructorProjects as $insProjects)
                                                <tr>
                                                    <td class="scope">{{ $insProjects->name }}</td>
                                                    <td>N/A</td>
                                                    <td>N/A</td>
                                                    <td>N/A</td>
                                                    <td>N/A</td>
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