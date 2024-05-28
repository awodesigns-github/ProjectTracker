@extends('layouts.app')
@section('content')
<div class="row clearfix row-deck my-5"> 
    <div class="col-lg-12">
        <div class="card" style="border: 1px solid rgb(203, 202, 202);">
            <div class="header">
                <h2 class="text-muted"><b>Filter</b></h2>
            </div>
            <div class="body">
                <form action="" method="POST">
                    @csrf
                    @method("POST")
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="pb-2">
                                <div class="c_multiselect">
                                    <label for="status"><b>By Status</b></label>
                                    <select name="status" id="status_field" class="form-control unique-dropdown multiselect multiselect-custom" style="border: 1px solid rgb(216, 213, 213);">
                                        <option disabled selected>Choose a status</option>
                                        <option value="C">Closed</option>
                                        <option value="O">Open</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="card" style="border: 1px solid rgb(203, 202, 202);">
            <div class="header">
                <h2 class="text-muted"><b>Projects list</b></h2>
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
                                    <td>{{ $details->name }}</td>
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
@section('contentScripts')
<script>
    $(document).ready(function () {
        $('.unique-dropdown').multiselect({
            enableFiltering: true,
            enableCaseInsensitiveFiltering: true,
            maxHeight: 200
        });

        $(".form-control").on('change', function () {
            var status = $('#status_field').val();


            $.ajax({
                type: "GET",
                url: "{{ route('instructor-sorted-all') }}",
                data: {
                    _token: "{{ csrf_token() }}",
                    status: status
                },
                success: function (response) {
                    var projectData = response.data;

                    var html = '';

                    projectData = Object.values(projectData)

                    if (projectData.length > 0) {
                        for (let i = 0; i < projectData.length; i++) {
                            html += '<tr>\
                                <td>' + projectData[i]['name'] + '</td>\
                                <td>' + projectData[i]['description'] + '</td>\
                                <td>' + (projectData[i]['status'] === 'C' ? 'Closed' : 'Open') + '</td>\
                                </tr>';
                        }
                        
                    } else {
                        html += '<tr><td colspan="6" class="text-center">No data found</td></tr>';
                    }
                    $('#tbody').html(html);
                }
            });

        });
    });
</script>    
@endsection