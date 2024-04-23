<nav class="navbar navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-brand">
            <button type="button" class="btn-toggle-offcanvas"><i class="fa fa-bars"></i></button>
            <button type="button" class="btn-toggle-fullwidth"><i class="fa fa-bars"></i></button>
            <a href="#">Student Project Collaboration System</a>                
        </div>
        
        <div class="navbar-right">
            <div id="navbar-menu">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="{{ route('logout') }}" class="icon-menu" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();"><i class="fa fa-power-off"></i></a>
                        <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf 
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>