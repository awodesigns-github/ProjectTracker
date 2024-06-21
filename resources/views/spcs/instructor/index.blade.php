@extends('layouts.app')
@section('content')
<div class="block-header">
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12">
            <h2>Analytics</h2>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i></a></li>                            
                <li class="breadcrumb-item">POLS</li>
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



{{-- Instructor View --}}
@if ($userRole == 'instructor')

{{-- section one cards --}}
<div class="row clearfix row-deck">
    <div class="col-lg-6 col-md-6 col-sm-6">
        <div class="card top_widget" style="border: none; cursor:pointer;" id="card_projects">
            <div class="body" style="background: #3b0273;">
                <div class="icon"><i class="fa fa-cube"></i> </div>
                <div class="content text-white">
                    <div class="text-white mb-2 text-uppercase">Projects</div>
                    <h4 class="number mb-0">{{ $projectCount }}</h4>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6">
        <div class="card top_widget" style="border: none; cursor:pointer;" id="card_tasks">
            <div class="body text-white" style="background: #962FC5;">
                <div class="icon"><i class="fa fa-tasks"></i> </div>
                <div class="content">
                    <div class="text mb-2 text-uppercase">Tasks</div>
                    <h4 class="number mb-0">{{ $taskCount }}</h4>
                </div>
            </div>
        </div>
    </div>
</div>


{{-- Section Three --}}
<div class="card" style="border: none;">
    <div class="header">
        <h2 class="text-muted"><b>Project Information</b></h2>                            
    </div>
    <div class="body table-responsive">
        <table class="table table-bordered table-striped table-hover dataTable js-exportable table table-hover mb-0 c_list">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Progress</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($projectDetails as $details)
                <tr>
                    <td class="scope"><a href="{{ route('instructor-show-project', ['id' => $details->id]) }}">{{ $details->name }} <i class="fa fa-level-up"></i></a></td>
                    <td>{{ $details->status == 'C' ? 'Closed' : 'Opened' }}</td>
                </tr>
                @endforeach
            </tbody>

        </table>
    </div>
</div>


{{-- Section Two --}}
<div class="row">
    <div class="col-lg-6">
        <div class="card" style="border: none;">
            <div class="header">    
                <h2 class="text-muted"><b>Overall Project Statistics</b></h2>
            </div>
            <div class="body">
                <div id="progress-chart" style="height: 16rem"></div>
            </div>
        </div> 
    </div>
    <div class="col-lg-6">
        <div class="card" style="border: none;">
            <div class="header">    
                <h2 class="text-muted"><b>Task Count</b><small>(for open projects)</small></h2>
            </div>
            <div class="body">
                <table class="table mb-0">
                    <thead>
                        <tr>
                          <th>Project</th>
                          <th>Task Count</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($projectStatistics as $stats)
                            <tr>
                                <td class="scope">{{ $stats->name }}</td>
                                <td>{{ $stats->task_count }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div> 
    </div>
</div>



{{-- Section Four --}}
<div class="row">
    <div class="col-lg-12">
        <div class="card" style="border: none;">
            <div class="header">
                <h2 class="text-muted"><b>Task Progress</b><small>(for the first 5 projects)</small></h2>
            </div>
            <div class="body">
                <div id="task_progress" style="height: 16rem" class="c3"></div>
            </div>
        </div>
    </div>
</div> 

@endif

@endsection
@section('contentScripts')
<script>
    $(document).ready(function(){
        var closedProjects = {!! $closedProjects !!};
        var openProjects = {!! $openProjects !!};
        
        var chart = c3.generate({
            bindto: '#progress-chart', // id of chart wrapper
            data: {
                columns: [
                    // each columns data
                    ['data1', closedProjects],
                    ['data2', openProjects],
                ],
                type: 'donut', // default type of chart
                colors: {
                    'data1': '#962FC5',
                    'data2': '#3b0273',
                },
                names: {
                    // name of each series
                    'data1': 'Closed Projects',
                    'data2': 'Open Projects',
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

        var projectStatistics = {!! $projectStatistics !!};
        console.log(projectStatistics);

        var categories = [];
        var completedTasks = ['data1'];
        var inprogressTasks = ['data2'];
        var pendingTasks = ['data3'];

        projectStatistics.forEach(element => {
            categories.push(element.name);
            completedTasks.push(element.completed_tasks);
            inprogressTasks.push(element.inprogress_tasks);
            pendingTasks.push(element.pending_tasks);
        });

        // Task statistics
        var taskChart = c3.generate({
            bindto: '#task_progress', // id of chart wrapper
            data: {
                columns: [
                    // each columns data
                    completedTasks,
                    inprogressTasks,
                    pendingTasks,
                ],
                type: 'bar', // default type of chart
                colors: {
                    'data1': '#962FC5',
                    'data2': '#3b0273',
                    'data3': '#3d4e5f'
                },
                names: {
                    // name of each serie
                    'data1': 'Closed tasks',
                    'data2': 'In progress tasks',
                    'data3': 'Pending tasks',
                }
            },
            axis: {
                x: {
                    type: 'category',
                    // name of each category
                    categories: categories
                },
            },
            bar: {
                width: 11
            },
            legend: {
                show: true, //hide legend
            },
            padding: {
                left: 0,
                right: 0,
                bottom: 0,
                top: 0
            },
        });
    });

</script>    
@endsection