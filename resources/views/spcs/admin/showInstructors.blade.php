@extends('layouts.app')
@section('content')

<div class="block-header">
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12">
            <h2>Instructors</h2>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i></a></li>                            
                <li class="breadcrumb-item">Entry List</li>
                <li class="breadcrumb-item active">Cohort Name</li>
            </ul>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="d-flex flex-row-reverse">
                @if ($userRole == 'admin')
                <div class="page_action">
                    <a href="#"><button class="btn btn-dark"><i class="icon-plus"></i> Add an Instructor to this cohort</button></a>
                </div>
                @endif

                {{--  --}}
                <div class="p-2 d-flex">
                    
                </div>
                {{--  --}}
            </div>
        </div>
    </div>
</div>


{{-- Data tables --}}
<div class="row clearfix row-deck my-5"> 
    <div class="col-lg-12">
        <div class="card" style="border: 1px solid rgb(203, 202, 202);">
            <div class="header">
                <h2 class="text-muted">Instructors List</h2>
            </div>
            <div class="body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover dataTable js-exportable table table-hover mb-0 c_list">
                        <thead>
                            <tr>
                                <th>
                                    <label class="fancy-checkbox">
                                        <input class="select-all" type="checkbox" name="checkbox">
                                        <span></span>
                                    </label>
                                </th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Employee ID</th>
                                <th>Github</th>
                                <th>Phone Number</th>
                                <th>Campus</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody id="tbody">
                            @foreach ($instructors as $instructor)
                                <tr>
                                    <td style="width: 50px;">
                                        <label class="fancy-checkbox">
                                            <input class="checkbox-tick" type="checkbox" name="checkbox">
                                            <span></span>
                                        </label>
                                    </td>
                                    <td>{{ $instructor->user->name }}</td>
                                    <td>{{ $instructor->user->email }}</td>
                                    <td>{{ $instructor->employee_Id }}</td>
                                    <td>{{ $instructor->github_username }}</td>
                                    <td>{{ $instructor->phone_number }}</td>
                                    <td>{{ $instructor->campus->name }}</td>
                                    <td>    
                                        <a href="{{ route('admin-show-instructor-details', ['id' => $instructor->id]) }}" style="color: white;"><button type="button" class="btn btn-primary" data-toggle="tooltip" title="View Details"><span class="sr-only">View</span><i class="icon-eye"></i></button></a>
                                        <a href="#" style="color: white;"><button type="button" class="btn btn-danger" data-toggle="tooltip" title="Delete details"><span class="sr-only">Delete</span><i class="icon-trash"></i></button></a>
                                    </td>
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