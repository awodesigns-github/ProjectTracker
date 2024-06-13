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

{{-- Section 2 --}}
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
                    <td class="scope"><a href="{{ route('instructor-show-project', ['id' => $details->id]) }}">{{ $details->name }}</a></td>
                    <td>{{ $details->status == 'C' ? 'Completed' : 'Opened' }}</td>
                </tr>
                @endforeach
            </tbody>

        </table>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="card" style="border: none;">
            <div class="header">    
                <h2 class="text-muted"><b>Progress</b></h2>
            </div>
            <div class="body">
                <div id="progress-chart" style="height: 16rem"></div>
            </div>
        </div> 
    </div>
</div> 

<div class="row">
    <div class="col-lg-12">
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

    document.querySelectorAll('tbody tr').forEach(row => {
        row.addEventListener('click', function () {
            console.log("Clicked");
        });
    });
</script>    
@endsection