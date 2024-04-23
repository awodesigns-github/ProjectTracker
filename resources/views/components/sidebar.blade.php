    <div id="left-sidebar" class="sidebar">
        <button type="button" class="btn-toggle-offcanvas"><i class="fa fa-arrow-left"></i></button>
        <div class="sidebar-scroll">
            <div class="user-account">
                <img src="assets/images/plane.png" class="rounded-circle user-photo" alt="User Profile Picture">
                <div class="dropdown">
                    <span>Welcome,</span><a href="javascript:void(0);" class="dropdown-toggle user-name" data-toggle="dropdown"><strong>{{ Auth::user()->name ?? '' }}</strong></a>
                    <ul class="dropdown-menu dropdown-menu-right account">
                        <li><a href="page-profile2.html"><i class="icon-user"></i>My Profile</a></li>
                        <li class="divider"></li>
                        <li><a href="page-login.html"><i class="icon-power"></i>Logout</a></li>
                    </ul>
                </div>
                <hr>
            </div>

            <!-- Tab panes -->
            <div class="tab-content padding-0">
                <div class="tab-pane active" id="menu">
                    <nav id="left-sidebar-nav" class="sidebar-nav">
                        <ul id="main-menu" class="metismenu li_animation_delay">
                            <li class="active">
                                <a href="#Dashboard" class="has-arrow"><i class="fa fa-dashboard"></i><span>Dashboard</span></a>
                                <ul>
                                    <li><a href="index.html">General Stats</a></li>
                                    <li><a href="h-menu.html">Server Dashboard</a></li>
                                    <li><a href="index9.html">Laptops & Desktops Stats</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#App" class="has-arrow"><i class="fa fa-cube"></i><span>Inventory</span></a>
                                <ul>
                                    <li><a href="#" class="has-arrow">Entry List</a>
                                        <ul>
                                            <li><a href="{{ route('infrastructure.index') }}">All</a></li>
                                            <li><a href="app-chat.html">Servers</a></li>
                                            <li><a href="app-calendar.html">Desktops</a></li>                                    
                                            <li><a href="app-contact.html">Laptops</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#">Bulk Attachment</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#Widgets" class="has-arrow"><i class="fa fa-hourglass"></i><span>PM Schedule</span></a>
                                <ul>
                                    <li><a href="javascript:void(0);" class="has-arrow"><span>Schedules</span></a>
                                        <ul>
                                            <li><a href="widgets-statistics.html">View all groups</a></li>
                                            <li><a href="widgets-data.html"> Create new group</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#uiElements" class="has-arrow"><i class="fa fa-gears"></i><span>Maintainance</span></a>
                                <ul>
                                    <li><a href="javascript:void(0);" class="has-arrow"><span>Service</span></a>
                                        <ul>
                                            <li><a href="file-dashboard.html">Issue maintainance service</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>        
            </div> 
        </div>         
    </div>

