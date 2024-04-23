<div class="mail-left collapse" id="email-nav" style="max-height: 80vh; overflow-y: scroll;scroll-behavior: smooth;">
    <div class="mail-compose m-b-20">
        @if ($user->role_id !== 1)
            @if ( $infrastructure->approval_status == "Awaiting EUT manager check")
            <span class="btn btn-dark btn-block"><i class="icon-note"></i> Menu</span>
            @else
            <span class="btn btn-primary btn-block" id="init_check"><i class="icon-note"></i> Perform Check</span>
            @endif
        @else
        <button class="btn btn-secondary btn-block" id="app_delete" data-id="{{ $infrastructure->id }}"><i class="icon-trash"></i> Delete</button>
        @endif
        
    </div>

    <div class="mail-side" id="preCheck">
        <h3 class="label"><a href="{{ route('infrastructure.show', $infrastructure->id) }}" class="text-dark">General Info<i class="icon-info float-right m-r-10"></i></a></h3>
        <hr>
        <ul class="nav metismenu li_animation_delay has-arrow list-unstyled chat-list">
           <li class="nav-li active"><a href="#details" data-toggle="tab">Infrastructure details</a></li>
        </ul>
        @if ($infrastructure->infrastructure_type == 'Server')
        <h3 class="label text-dark">Hardening<i class="icon-diamond float-right m-r-10"></i></h3>
        <hr>
        <ul class="nav">
            <li class="nav-li"><a href="#hardening" data-toggle="tab">Security</a></li>
        </ul>
        <h3 class="label text-dark">Data Center<i class="fa fa-server float-right m-r-10"></i></h3>
        <hr> 
        <ul class="nav">
            <li class="nav-li"><a href="#" data-toggle="tab">Rack Information</a></li>
        </ul>           
        @endif

        <h3 class="label"><a href="#" class="text-dark">Vendor<i class="icon-user float-right m-r-10"></i></a></h3>
        <hr>
        <ul class="nav">
           <li class="nav-li"><a href="#" data-toggle="tab">Primary Contact</a></li>
           <li class="nav-li"><a href="#" data-toggle="tab">Secondary Contact</a></li>
        </ul>
        <h3 class="label"><a href="#" class="text-dark">Owners<i class="icon-users float-right m-r-10"></i></a></h3>
        <hr>
        <ul class="nav">
           <li class="nav-li"><a href="#" data-toggle="tab">Primary Contact</a></li>
           <li class="nav-li"><a href="#" data-toggle="tab">Secondary Contact</a></li>
        </ul>
        <h3 class="label"><a href="#" class="text-dark">Support teams<i class="icon-wrench float-right m-r-10"></i></a></h3>
        <hr>
        <ul class="nav">
           <li class="nav-li"><a href="#" data-toggle="tab">Primary Contact</a></li>
           <li class="nav-li"><a href="#" data-toggle="tab">Secondary Contact</a></li>
        </ul>
    </div>
    <div class="mail-side" id="postCheck">

    </div>
</div>