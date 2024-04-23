<div class="card" style="border: 0px">
    <div class="header">
        <h2 class="text-bold d-flex justify-content-between"><b>{{ ($infrastructure->infrastructure_type !== null) ?  $infrastructure->infrastructure_type : 'Infrastructure'}}</b> {{ $infrastructure->asset_number }} </h2>
    </div>
    <div class="body">
        {{-- @switch($infrastructure->approval_status)
            @case("Approved")
                <h3 class="mb-0">Approval Status : <strong class="badge badge-primary" style="padding: 10px;">Approved</strong></h3>
                @break
            @case("Awaiting IT Procurement check")
                <h3 class="mb-0">Approval Status : <strong class="badge badge-warning" style="padding: 10px;">Awaiting IT Procurement Approval</strong></h3>
                @break

            @case("Awaiting EUT manager")
                <h3 class="mb-0">Approval Status : <strong class="badge badge-warning" style="padding: 10px;">Awaiting EUT manager Approval</strong></h3>
                @break

            @case("Awaiting EUT check")
                <h3 class="mb-0">Approval Status : <strong class="badge badge-danger" style="padding: 10px;">Awaiting EUT Check</strong></h3>
                @break
            @default
                <h3 class="mb-0">Approval Status : <strong class="badge badge-danger" style="padding: 10px;">Pending</strong></h3>
                @break
        @endswitch --}}

    </div>