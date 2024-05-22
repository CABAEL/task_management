<nav class="navbar-default navbar-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav" id="main-menu">

            <li>
                <a class="active-menu" href="/"><i class="fa fa-home"></i> Home</a>
            </li>
            @if(request()->is('admin*'))
                <li>
                    <a href="#"><i class="fa fa-users"></i> Users</a>
                </li>
            @endif

        </ul>

    </div>

</nav>