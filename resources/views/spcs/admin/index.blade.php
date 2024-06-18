@extends('layouts.app')
@section('content')
<div class="block-header">
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12">
            <h2>Analytics</h2>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i></a></li>                            
                <li class="breadcrumb-item">PTS</li>
                <li class="breadcrumb-item active">Analytics</li>
            </ul>
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
<hr>

{{-- Admin View --}}
@if ($userRole == 'admin')
{{-- section one cards --}}
<div class="row clearfix row-deck">
    <div class="col-lg-4 col-md-6 col-sm-6">
        <div class="card top_widget" style="border: none; cursor:pointer;" id="card_projects">
            <div class="body" style="background: #3b0273;">
                <div class="icon"><i class="fa fa-user"></i> </div>
                <div class="content text-white">
                    <div class="text-white mb-2 text-uppercase">Instructors</div>
                    <h4 class="number mb-0">{{ ($instructorsCount != 0) ? $instructorsCount : 'N/A' }}</h4>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-6">
        <div class="card top_widget" style="border: none; cursor:pointer;" id="card_tasks">
            <div class="body text-white" style="background: #962FC5;">
                <div class="icon"><i class="fa fa-user"></i> </div>
                <div class="content">
                    <div class="text mb-2 text-uppercase">Students</div>
                    <h4 class="number mb-0">{{ ($studentsCount != 0) ? $studentsCount : 'N/A' }}</h4>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-6">
        <div class="card top_widget" style="border: none; cursor:pointer;" id="card_team_members">
            <div class="body" style="background: #3b0273;">
                <div class="icon"><i class="fa fa-users"></i> </div>
                <div class="content text-white">
                    <div class="text mb-2 text-uppercase">Total Users <small><strong>(including admins)</strong></small></div>
                    <h4 class="number mb-0">{{ $usersCount }}</h4>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row clearfix row-deck">
    <div class="col-lg-6 col-md-6 col-sm-6">
        <div class="card top_widget" style="border: none; cursor:pointer;" id="card_tasks">
            <div class="body text-white" style="background: #962FC5;">
                <div class="icon"><i class="fa fa-trash"></i> </div>
                <div class="content">
                    <div class="text mb-2 text-uppercase">Deleted Projects</div>
                    <h4 class="number mb-0">{{ $deletedProjectsCount }}</h4>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6">
        <div class="card top_widget" style="border: none; cursor:pointer;" id="card_team_members">
            <div class="body" style="background: #962FC5;">
                <div class="icon"><i class="fa fa-university"></i> </div>
                <div class="content text-white">
                    <div class="text mb-2 text-uppercase">Courses</div>
                    <h4 class="number mb-0">{{ $courseCount }}</h4>
                </div>
            </div>
        </div>
    </div>
</div>
<hr>
    

{{-- section two table --}}
<div class="card" style="border: none;">
    <div class="header">
        <h2 class="text-muted"><b>Project Health Summary</b></h2>                            
    </div>
    <div class="body table-responsive">
        <table class="table table-bordered table-striped table-hover dataTable js-exportable table table-hover mb-0 c_list">
            <thead>
                <tr>
                    <th>Projects</th>
                    <th>Associated Tasks</th>
                    <th>Instructor</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($projects as $project)
                <tr>
                    <td class="scope">{{ $project->name }}</td>
                    <td>{{ $project->task_count }}</td>
                    <td>{{ $project->instructors->first()->user->name }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

{{-- section three graphs --}}
<div class="row">
    <div class="col-lg-6">
        <div class="card" style="border: none;">
            <div class="header">    
                <h2 class="text-muted"><b>Progress</b></h2>
            </div>
            <div class="body">
                <div id="progress-chart" style="height: 16rem"></div>
            </div>
        </div> 
    </div>
    <div class="col-lg-6">
        <div class="card" style="border: none;">
            <div class="header">
                <h2 class="text-muted"><b>Contributions</b></h2>
            </div>
            <div class="body">
                <div id="team-contributions" style="height: 16rem"></div>
            </div>
        </div>
    </div>
</div>  

{{-- section four table --}}
<div class="card" style="border: none;">
    <div class="header">
        <h2 class="text-muted"><b>Deleted Projects</b></h2>                            
    </div>
    <div class="body table-responsive">
        <table class="table table-bordered table-striped table-hover dataTable js-exportable table table-hover mb-0 c_list">
            <thead>
                <tr>
                    <th>Projects</th>
                    <th>Deleted At</th>
                    <th>Deleted By</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($deletedProjects as $item)
                <tr>
                    <td class="scope">{{ $item->name }}</td>
                    <td>{{ $item->deleted_at }}</td>
                    <td>N/A</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
    
@endif


@endsection
@section('contentScripts')
<script>
    $(document).ready(function(){
        var chart = c3.generate({
            bindto: '#progress-chart', // id of chart wrapper
            data: {
                columns: [
                    // each columns data
                    ['data1', 10],
                    ['data2', 20],
                    ['data3', 70]
                ],
                type: 'donut', // default type of chart
                colors: {
                    'data1': '#962FC5',
                    'data2': '#E11E1E',
                    'data3': '#1d2124'
                },
                names: {
                    // name of each series
                    'data1': 'In-progress',
                    'data2': 'Completed',
                    'data3': 'Closed'
                }
            },
            axis: {
            },
            legend: {
                show: true, //hide legend
            },
            padding: {
                bottom: 0,
                top: 0
            },
        });
    });
</script>    
@endsection