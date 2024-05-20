<div id="left-sidebar" class="sidebar">
    <button type="button" class="btn-toggle-offcanvas"><i class="fa fa-arrow-left"></i></button>
    <div class="sidebar-scroll">
        <div class="user-account">
            <img src="{{ asset('assets/logo/avt.jpeg') }}" class="rounded-circle user-photo" alt="User">
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
                    {{-- <li><a href="{{ route('logout') }}"><i class="icon-power"></i>Logout</a></li> --}}
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
                                <li class="active"><a href="#" class="has-arrow">Entry List</a>
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
                                <li class="active"><a href="#" class="has-arrow">Entry List</a>
                                    <ul>
                                        @foreach ($cohortList as $cohorts)
                                            <li><a href="#">{{ $cohorts->name }}</a></li>
                                        @endforeach
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li><a href="#Logs"><i class="fa fa-clipboard"></i><span>Logs</span></a>
                        </li>
                        <li><a href="#Tasks" class="has-arrow"><i class="fa fa-gears"></i><span>Roles & Permissions</span></a>
                            <ul>
                                <li><a href="#">All</a></li>
                                <li><a href="#">Instructors</a></li>
                                <li><a href="#">Students</a></li>
                                <li><a href="#">Team leaders</a></li>
                            </ul>
                        </li>
                    </ul>
                        
                    @elseif($userRole == 'instructor')
                    {{-- Instructor Side bar --}}
                    <ul id="main-menu" class="metismenu li_animation_delay">
                        <li>
                            <a href="#Dashboard" class="has-arrow"><i class="fa fa-dashboard"></i><span>Dashboard</span></a>
                            <ul>
                                <li><a href="{{ route('spcs-dashboard') }}">Analytics</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#Projects" class="has-arrow"><i class="fa fa-cube"></i><span>Projects & Tasks</span></a>
                            <ul>
                                <li class="active"><a href="#" class="has-arrow">Entry List</a>
                                    <ul>
                                        <li><a href="#">All</a></li>
                                        <li><a href="#">Ongoing</a></li>
                                        <li><a href="#">Closed</a></li>                                    
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li><a href="#Tasks" class="has-arrow"><i class="fa fa-flag"></i><span>Students</span></a>
                            <ul>
                                <li><a href="#">All</a></li>
                                {{-- List respective cohorts --}}
                                <li><a href="#">Cohort 1</a></li>
                            </ul>
                        </li>
                        <li><a href="#Tasks" class="has-arrow"><i class="fa fa-gears"></i><span>Activity</span></a>
                            <ul>
                                <li><a href="#">Commits</a></li>
                                <li><a href="#">Pushes</a></li>
                                <li><a href="#">Issues</a></li>
                                <li><a href="#">Pulls</a></li>
                            </ul>
                        </li>
                    </ul>

                    @else
                    {{-- Student sidebar --}}
                    <ul id="main-menu" class="metismenu li_animation_delay">
                        <li>
                            <a href="#Dashboard" class="has-arrow"><i class="fa fa-dashboard"></i><span>Dashboard</span></a>
                            <ul>
                                <li><a href="{{ route('spcs-dashboard') }}">Analytics</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#Projects" class="has-arrow"><i class="fa fa-cube"></i><span>Projects & Tasks</span></a>
                            <ul>
                                <li class="active"><a href="#" class="has-arrow">Entry List</a>
                                    <ul>
                                        <li><a href="#">All</a></li>
                                        <li><a href="#">Ongoing</a></li>
                                        <li><a href="#">Closed</a></li>                                    
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li><a href="#Progress" class="has-arrow"><i class="fa fa-flag"></i><span>Progress Logs</span></a>
                            <ul>
                                <li><a href="#">yyyy-mm-dd</a></li>
                            </ul>
                        </li>
                        <li><a href="#TeamResources" class="has-arrow"><i class="fa fa-gears"></i><span>Team Resources</span></a>
                            <ul>
                                <li><a href="#">All</a></li>
                            </ul>
                        </li>
                        <li><a href="#TeamProfile"><i class="fa fa-gears"></i><span>Team Profile</span></a>
                        </li>
                    </ul>

                    {{-- Student sidebar --}}
                    {{-- <ul id="main-menu" class="metismenu li_animation_delay">
                        <li>
                            <a href="#Dashboard" class="has-arrow"><i class="fa fa-dashboard"></i><span>Dashboard</span></a>
                            <ul>
                                <li><a href="{{ route('spcs-dashboard') }}">Analytics</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#Teams"><i class="fa fa-users"></i><span>Teams</span></a>
                        </li>
                    </ul> --}}

                    @endif
                    {{-- <ul id="main-menu" class="metismenu li_animation_delay">
                        <li>
                            <a href="#Dashboard" class="has-arrow"><i class="fa fa-dashboard"></i><span>Dashboard</span></a>
                            <ul>
                                <li><a href="{{ route('spcs-dashboard') }}">Analytics</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#Projects" class="has-arrow"><i class="fa fa-cube"></i><span>Projects</span></a>
                            <ul>
                                <li class="active"><a href="#" class="has-arrow">Entry List</a>
                                    <ul>
                                        <li><a href="#">All</a></li>
                                        <li><a href="#">Ongoing</a></li>
                                        <li><a href="#">Closed</a></li>                                    
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li><a href="#Tasks" class="has-arrow"><i class="fa fa-tasks"></i><span>Tasks</span></a>
                            <ul>
                                <li><a href="#">Project 1</a></li>
                            </ul>
                        </li>
                        <li><a href="#Tasks" class="has-arrow"><i class="fa fa-flag"></i><span>Progress Logs</span></a>
                            <ul>
                                <li><a href="#">yyyy-mm-dd</a></li>
                            </ul>
                        </li>
                        <li><a href="#Tasks" class="has-arrow"><i class="fa fa-gears"></i><span>Team Resources</span></a>
                            <ul>
                                <li><a href="#">All</a></li>
                            </ul>
                        </li>
                    </ul> --}}
                </nav>
            </div>
        </div>          
    </div>
</div>