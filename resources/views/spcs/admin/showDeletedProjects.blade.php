@extends('layouts.app')
@section('content')

<div class="block-header">
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12">
            <h2>Projects</h2>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i></a></li> 
                <li class="breadcrumb-item">Deleted Projects</li>
            </ul>
        </div>
    </div>
</div>

<div class="row clearfix row-deck my-5"> 
    
    <div class="col-lg-12">
        <div class="card" style="border: 1px solid rgb(203, 202, 202);">
            <div class="header">
                <h2 class="text-muted"><b>Deleted Projects</b></h2>
            </div>
            <div class="body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover dataTable table table-hover mb-0 c_list">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody id="tbody">
                            @foreach ($projectDetails as $details)
                                <tr>
                                    <td><a href="{{ route('admin-show-deleted-project', ['id' => $details->id]) }}">{{ $details->name }} <i class="fa fa-level-up"></i></a></td>
                                    <td>{{ $details->description }}</td>
                                    <td>{{ $details->status == 'C' ? 'Closed' : 'Open' }}</td>
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