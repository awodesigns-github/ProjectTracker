<div id="left-sidebar" class="sidebar">
    <button type="button" class="btn-toggle-offcanvas"><i class="fa fa-arrow-left"></i></button>
    <div class="sidebar-scroll">
        <div class="user-account">
            @if (Auth::user()->sex == 'M')
            <img src="{{ asset('assets/logo/avt.jpeg') }}" class="rounded-circle user-photo" alt="User">
            @else      
            <img src="{{ asset('assets/logo/avt2.jpg') }}" class="rounded-circle user-photo" alt="User">
            @endif
            <div class="dropdown">
                <span>Welcome {{ $userRole }}</span>
                <a href="javascript:void(0);" class="dropdown-toggle user-name" data-toggle="dropdown"><strong>{{ Auth::user()->name }}</strong></a>
                <ul class="dropdown-menu dropdown-menu-right account">
                    <li><a href="#"><i class="icon-user"></i>My Profile</a></li>
                    <li class="divider"></li>
                    <li>
                        <a href="{{ route('logout') }}" class="icon-menu" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();"><i class="fa fa-power-off"></i></a>
                        Logout
                        <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf 
                        </form>
                    </li>
                </ul>
            </div>
            <hr>
        </div>
            
        <!-- Tab panes -->
        <div class="tab-content padding-0">
            {{-- Left bar main components --}}
            <div class="tab-pane active" id="menu">
                <nav id="left-sidebar-nav" class="sidebar-nav">
                    {{-- Admin Side bar --}}
                    @if ($userRole == 'admin')
                    <ul id="main-menu" class="metismenu li_animation_delay">
                        <li>
                            <a href="#Dashboard" class="has-arrow"><i class="fa fa-dashboard"></i><span>Dashboard</span></a>
                            <ul>
                                <li><a href="{{ route('admin-dashboard') }}">Analytics</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#Projects" class="has-arrow"><i class="fa fa-user"></i><span>Instructors</span></a>
                            <ul>
                                <li class="active"><a href="#" class="has-arrow">Cohorts</a>
                                    <ul>
                                        @foreach ($cohortList as $cohorts)
                                            <li><a href="{{ route('admin-show-instructors', ['id' => $cohorts->id]) }}">{{ $cohorts->name }}</a></li>
                                        @endforeach
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li><a href="#Tasks" class="has-arrow"><i class="fa fa-users"></i><span>Students</span></a>
                            <ul>
                                <li class="active"><a href="#" class="has-arrow">Cohorts</a>
                                    <ul>
                                        @foreach ($cohortList as $cohorts)
                                            <li><a href="{{ route('admin-show-students', ['id' => $cohorts->id]) }}">{{ $cohorts->name }}</a></li>
                                        @endforeach
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li><a href="{{ route('admin-deleted-projects') }}"><i class="fa fa-trash"></i> Deleted Projects</a></li>
                    </ul>
                        
                    @elseif($userRole == 'instructor')
                    {{-- Instructor Side bar --}}
                    <ul id="main-menu" class="metismenu li_animation_delay">
                        <li>
                            <a href="#Dashboard" class="has-arrow"><i class="fa fa-dashboard"></i><span>Dashboard</span></a>
                            <ul>
                                <li><a href="{{ route('instructor-dashboard') }}">Analytics</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="{{ route('instructor-sorted-all') }}"><i class="fa fa-cube"></i><span>Projects</span></a>
                        </li>
                        <li><a href="{{ route('instructor-sorted-students') }}"><i class="fa fa-users"></i><span>Students</span></a></li>
                        {{-- <li><a href="#Tasks" class="has-arrow"><i class="fa fa-gears"></i><span>Activity</span></a>
                            <ul>
                                <li><a href="#">Commits</a></li>
                                <li><a href="#">Pushes</a></li>
                                <li><a href="#">Issues</a></li>
                                <li><a href="#">Pulls</a></li>
                            </ul>
                        </li> --}}
                    </ul>

                    @elseif($userRole == 'student')
                    {{-- Student sidebar --}}
                    <ul id="main-menu" class="metismenu li_animation_delay">
                        <li>
                            <a href="#Dashboard" class="has-arrow"><i class="fa fa-dashboard"></i><span>Dashboard</span></a>
                            <ul>
                                <li><a href="{{ route('student-dashboard') }}">Analytics</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#Projects" class="has-arrow"><i class="fa fa-cube"></i><span>Projects & Tasks</span></a>
                            <ul>
                                <li class="active"><a href="#" class="has-arrow">Modules</a>
                                    <ul>
                                        @foreach ($modules as $module)
                                        <li><a href="{{ route('student-sort-projects', ['id' => $module->id]) }}">{{ $module->name }}</a></li>  
                                        @endforeach                                 
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    @endif
                </nav>
            </div>
        </div>          
    </div>
</div>