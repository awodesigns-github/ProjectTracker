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
@if ($userRole == 'student')

{{-- section one cards --}}
<div class="row clearfix row-deck">
    <div class="col-lg-4 col-md-6 col-sm-6">
        <div class="card top_widget" style="border: none; cursor:pointer;" id="card_projects">
            <div class="body" style="background: #3b0273;">
                <div class="icon"><i class="fa fa-cube"></i> </div>
                <div class="content text-white">
                    <div class="text-white mb-2 text-uppercase">Projects</div>
                    <h4 class="number mb-0">N/A</h4>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-6">
        <div class="card top_widget" style="border: none; cursor:pointer;" id="card_tasks">
            <div class="body text-white" style="background: #962FC5;">
                <div class="icon"><i class="fa fa-tasks"></i> </div>
                <div class="content">
                    <div class="text mb-2 text-uppercase">Completed tasks</div>
                    <h4 class="number mb-0">N/A</h4>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-6">
        <div class="card top_widget" style="border: none; cursor:pointer;" id="card_tasks">
            <div class="body text-white" style="background: #3b0273;">
                <div class="icon"><i class="fa fa-tasks"></i> </div>
                <div class="content">
                    <div class="text mb-2 text-uppercase">Pending tasks</div>
                    <h4 class="number mb-0">N/A</h4>
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
        <div class="card pricing2" style="border: none;">
            <div class="body">
                <hr>
                <div class="pricing-plan">
                    <h2 class="pricing-header">Credits</h2>
                    <ul class="pricing-features">
                        <li>Total Credits</li>
                        <li><small>(for all modules)</small></li>
                    </ul>
                    <span class="pricing-price">N/A</span>
                    <a href="javascript:void(0);" class="btn btn-outline-primary">See Milestones</a>
                </div>
                <hr>
            </div>
        </div>
    </div>
</div>



{{-- Section Four --}}
{{-- <div class="row">
    <div class="col-lg-12">
        <div class="card" style="border: none;">
            <div class="header">
                <h2 class="text-muted"><b>Task Progress</b><small>(for the first 10 projects)</small></h2>
            </div>
            <div class="body">
                <div id="Google-Analytics-Dashboard" style="height: 16rem" class="c3"></div>
            </div>
        </div>
    </div>
</div>  --}}

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
                    ['data1', 55],
                    ['data2', 30],
                    ['data3', 20],
                ],
                type: 'donut', // default type of chart
                colors: {
                    'data1': '#962FC5',
                    'data2': '#3b0273',
                    'data3': '#3d4e5f'
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

    $(document).ready(function(){
        var chart = c3.generate({
            bindto: '#Google-Analytics-Dashboard', // id of chart wrapper
            data: {
                columns: [
                    // each columns data
                    ['data1', 11, 8, 22, 18, 19, 6, 17, 11, 17, 32, 9, 12],
                    ['data2', 7, 7, 5, 7, 9, 12, 8, 22, 18, 19, 6, 17],
                    ['data3', 1, 13, 15, 8, 9, 12, 8, 18, 11, 17, 6, 12],
                ],
                type: 'bar', // default type of chart
                colors: {
                    'data1': '#962FC5',
                    'data2': '#3b0273',
                    'data3': '#3d4e5f'
                },
                names: {
                    // name of each serie
                    'data1': 'Completed tasks',
                    'data2': 'In progress tasks',
                    'data3': 'Pending tasks',
                }
            },
            axis: {
                x: {
                    type: 'category',
                    // name of each category
                    categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'July', 'Aug', 'Sept', 'Oct', 'Nov', 'Dec']
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